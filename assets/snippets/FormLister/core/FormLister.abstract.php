<?php namespace FormLister;

use APIHelpers;
use Closure;
use DLTemplate;
use DocumentParser;
use Helpers\Config;
use Helpers\FS;
use Helpers\Lexicon;
use Helpers\Debug;
use Helpers\Gpc;
use jsonHelper;
use ReflectionClass;

/**
 * Class FormLister
 * @package FormLister
 */
abstract class Core
{
    /**
     * @var array
     */
    protected $_rq = [];
    /**
     * @var DocumentParser
     */
    protected $modx;
    /**
     * @var FS
     */
    public $fs;
    /**
     * @var Debug
     */
    public $debug;
    /**
     * @var string
     */
    protected $formid = '';
    /**
     * @var Config
     */
    public $config;
    /**
     * @var string
     * Шаблон по умолчанию для вывода
     */
    public $renderTpl = '';
    /**
     * @var array
     * Данные формы
     * fields - значения полей
     * errors - ошибки (поле => сообщение)
     * messages - сообщения
     * status - для api-режима, результат использования формы
     */
    private $formData = [
        'fields'   => [],
        'errors'   => [],
        'messages' => [],
        'files'    => [],
        'status'   => false
    ];
    /**
     * @var bool
     * Разрешает обработку формы
     */
    private $valid = true;
    /**
     * @var Validator
     */
    protected $validator;

    /**
     * @var array
     * Массив с именами полей, которые можно отправлять в форме
     * По умолчанию все поля разрешены
     */
    public $allowedFields = [];

    /**
     * @var array
     * Значения для пустых элементов управления, например чекбоксов
     */
    public $forbiddenFields = [];

    /**
     * @var array
     */
    protected $placeholders = [];

    /**
     * @var array
     */
    protected $emptyFormControls = [];

    /**
     * @var Lexicon
     */
    public $lexicon;

    /**
     * @var CaptchaInterface
     */
    public $captcha;

    /**
     * @var array
     */
    protected $plhCache = [];

    /**
     * @var DLTemplate
     */
    protected $DLTemplate;
    /**
     * @var Gpc
     */
    protected $gpc;

    /**
     * @var array
     */
    protected $fieldAliases = [];
    /**
     * @var array
     */
    protected $aliasFields = [];
    /**
     * @var array
     */
    protected $rules = [];

    /**
     * Core constructor.
     * @param  DocumentParser  $modx
     * @param  array  $cfg
     */
    public function __construct(DocumentParser $modx, $cfg = [])
    {
        $this->modx = $modx;
        $this->config = new Config();
        $this->config->setPath(dirname(__DIR__));
        $this->fs = FS::getInstance();
        if (isset($cfg['config'])) {
            $this->config->loadConfig($cfg['config']);
        }
        $this->config->setConfig($cfg);
        if (isset($cfg['debug']) && $cfg['debug'] > 0) {
            $this->debug = new Debug($modx, [
                'caller' => 'FormLister\\\\' . $cfg['controller']
            ]);
        }
        $this->lexicon = new Lexicon($modx, [
            'langDir' => 'assets/snippets/FormLister/core/lang/',
            'lang'    => $this->getCFGDef('lang', $this->modx->getConfig('lang_code')),
            'handler' => $this->getCFGDef('lexiconHandler', '\\Helpers\\Lexicon\\EvoBabelLexiconHandler')
        ]);
        $this->DLTemplate = DLTemplate::getInstance($modx);
        $this->DLTemplate->setTemplatePath($this->getCFGDef('templatePath'));
        $this->DLTemplate->setTemplateExtension($this->getCFGDef('templateExtension'));
        $this->formid = $this->getCFGDef('formid');
        $this->getRequest();
        if ($removeGpc = $this->getCFGDef('removeGpc', 0)) {
            $this->gpc = new Gpc(is_numeric($removeGpc) && $removeGpc == '1' ? array_keys($this->_rq) : $this->config->loadArray($removeGpc));
        }
        $this->fieldAliases = $this->config->loadArray($this->getCFGDef('fieldAliases'), '');
        $this->aliasFields = array_flip($this->fieldAliases);
    }

    /**
     * @return $this
     */
    public function getRequest()
    {
        $disableSubmit = $this->getCFGDef('disableSubmit', 0);
        if (!$disableSubmit) {
            $method = $this->getCFGDef('formMethod', 'post');
            if ((is_object($method) && ($method instanceof Closure)) || is_callable($method)) {
                $result = call_user_func($method);
                $this->_rq = is_array($result) ? $result : [];
            } else {
                switch (strtolower($method)) {
                    case 'post':
                        $this->_rq = $_POST;
                        break;
                    case 'get':
                        $this->_rq = $_GET;
                        break;
                    default:
                        $this->_rq = $_REQUEST;
                }
                $this->setFiles($this->filesToArray($_FILES));
            }
        }

        return $this;
    }

    /**
     * Установка значений в formData, загрузка пользовательских лексиконов
     * Установка шаблона формы
     * Загрузка капчи
     */
    public function initForm()
    {
        $lexicon = $this->getCFGDef('lexicon');
        if ($lexicon) {
            $_lexicon = $this->config->loadArray($lexicon);
            if (isset($_lexicon[0])) {
                $lang = $this->getCFGDef('lang', $this->modx->getConfig('lang_code'));
                $langDir = $this->getCFGDef('langDir', 'assets/snippets/FormLister/core/lang/');
                foreach ($_lexicon as $item) {
                    $this->lexicon->fromFile($item, $lang, $langDir);
                }
            } else {
                $this->lexicon->fromArray($_lexicon);
            }
            $this->log('Lexicon loaded', ['lexicon' => $this->lexicon->getLexicon()]);
        }
        $this->allowedFields = array_merge($this->allowedFields,
            $this->config->loadArray($this->getCFGDef('allowedFields')));
        $this->forbiddenFields = array_merge($this->forbiddenFields,
            $this->config->loadArray($this->getCFGDef('forbiddenFields')));
        $this->emptyFormControls = array_merge(
            $this->emptyFormControls,
            $this->config->loadArray($this->getCFGDef('emptyFormControls'),
                ''
            ));
        $this->setRequestParams()
            ->setExternalFields($this->getCFGDef('defaultsSources', 'array'))
            ->sanitizeForm();
        $this->renderTpl = $this->getCFGDef('formTpl'); //Шаблон по умолчанию
        $this->rules = $this->getValidationRules();
        $this->initCaptcha();
        $this->runPrepare('prepare');

        return $this;
    }

    /**
     * Загружает в formData данные не из формы
     * @param  string  $sources  список источников
     * @param  string  $arrayParam  название параметра с данными
     * @return $this
     */
    public function setExternalFields($sources = 'array', $arrayParam = 'defaults')
    {
        $keepDefaults = $this->getCFGDef('keepDefaults', 0);
        $submitted = $this->isSubmitted();
        if ($submitted && !$keepDefaults) {
            return $this;
        }
        $sources = array_filter($this->config->loadArray($sources, ';'));
        foreach ($sources as $source) {
            $fields = [];
            $prefix = '';
            $_source = explode(':', $source);
            switch ($_source[0]) {
                //Массив значений указывается в параметре defaults
                case 'array':
                    if ($arrayParam) {
                        $fields = $this->config->loadArray($this->getCFGDef($arrayParam));
                    }
                    break;
                //Массив значений указывается в произвольном параметре
                case 'param':
                {
                    if (!empty($_source[1])) {
                        $fields = $this->config->loadArray($this->getCFGDef($_source[1]));
                        if (isset($_source[2])) {
                            $prefix = $_source[2];
                        }
                    }
                    break;
                }
                //Значения из $_GET
                case 'get':
                {
                    if (!empty($_source[1])) {
                        $keys = explode(',', $_source[1]);
                        $fields = $this->getDefaultsSourceValues($_GET, $keys);
                        if (isset($_source[2])) {
                            $prefix = $_source[2];
                        }
                    }
                    break;
                }
                //Массив значений указывается в параметре сессии
                case 'session':
                    if (!empty($_source[1])) {
                        $keys = explode(',', $_source[1]);
                        $fields = $this->getDefaultsSourceValues($_SESSION, $keys);
                        if (isset($_source[2])) {
                            $prefix = $_source[2];
                        }
                    }
                    break;
                //Значение поля берется из плейсхолдера MODX
                case 'plh':
                case 'aplh':
                    if (!empty($_source[1])) {
                        $keys = explode(',', $_source[1]);
                        $fields = $this->getDefaultsSourceValues($this->modx->placeholders, $keys);
                        if (isset($_source[2])) {
                            $prefix = $_source[2];
                        }
                    }
                    break;
                case 'config':
                    $fields = $this->modx->config;
                    if (isset($_source[1])) {
                        $prefix = $_source[1];
                    }
                    break;
                //Загружает значения из кук (перечисляются через запятую)
                case 'cookie':
                    if (!empty($_source[1])) {
                        $keys = explode(',', $_source[1]);
                        $fields = $this->getDefaultsSourceValues($_COOKIE, $keys, true);
                        if (isset($_source[2])) {
                            $prefix = $_source[2];
                        }
                    }
                    break;
                case 'user':
                case 'document':
                    //Загружает поля документа
                    if ($_source[0] == 'document') {
                        $_source[0] = class_exists('Pathologic\EvolutionCMS\MODxAPI\modResource')
                            ? 'Pathologic\EvolutionCMS\MODxAPI\modResource'
                            : '\modResource';
                        if ($this->modx->documentIdentifier) {
                            if (isset($_source[1])) {
                                $_source[2] = $_source[1];
                            }
                            $_source[1] = (int)$this->modx->documentIdentifier;
                        } else {
                            break;
                        }
                    } else {
                        //Загружает данные авторизованного пользователя, user:web:user
                        if (!empty($_source[1])) {
                            $_source[0] = class_exists('Pathologic\EvolutionCMS\MODxAPI\modUsers')
                                ? 'Pathologic\EvolutionCMS\MODxAPI\modUsers'
                                : '\modUsers';
                            $_source[1] = (int)$this->modx->getLoginUserID($_source[1]);
                            if (!$_source[1]) {
                                break;
                            }
                        }
                    }
                //Загружает данные из произвольной модели MODxAPI
                default:
                    if (!empty($_source[0])) {
                        $classname = $_source[0];
                        if (!is_null($model = $this->loadModel($classname)) && isset($_source[1])) {
                            /** @var \autoTable $model */
                            if ($model->edit((int)$_source[1])->getID()) {
                                $fields = $model->toArray();
                                if (isset($_source[2])) {
                                    $prefix = $_source[2];
                                }
                            }
                        }
                    }
            }
            if (is_array($fields)) {
                if (!is_numeric($keepDefaults)) {
                    $allowed = $submitted ? $this->config->loadArray($keepDefaults) : [];
                    $fields = $this->filterFields($fields, $allowed);
                }
                $this->setFields($fields, $prefix);
                if ($fields) {
                    $this->log('Set external fields from ' . $_source[0], $fields);
                }
            }
        }

        return $this;
    }

    /**
     * @param  array  $source
     * @param  array  $keys
     * @param  bool   $json
     * @return array
     */
    protected function getDefaultsSourceValues($source = [], $keys = [], $json = false)
    {
        $fields = [];
        if (!is_array($source)) return [];
        foreach ($keys as $key) {
            $key = trim($key);
            if (isset($source[$key])) {
                $value = $source[$key];
                if (is_scalar($value)) {
                    if ($json) {
                        $_value = $this->config->loadArray($value, '');
                        if (!empty($_value)) {
                            $value = $_value;
                        }
                    } else {
                        $value = [$key => $value];
                    }
                }
                if (is_array($value)) {
                    if (array_keys($value) === range(0, count($value) - 1)) {
                        $value = [$key => $value];
                    }
                    $fields = array_merge($fields, $value);
                }
            }
        }

        return $fields;
    }

    /**
     * Сохранение массива $_REQUEST
     */
    public function setRequestParams()
    {
        if ($this->isSubmitted()) {
            if (!is_null($this->gpc)) {
                $this->gpc->removeGpc($this->_rq);
            }
            $this->setFields($this->_rq);
            if ($emptyFields = $this->emptyFormControls) {
                foreach ($emptyFields as $field => $value) {
                    if (!isset($this->_rq[$field])) {
                        $this->setField($field, $value);
                    }
                }
            }
            $this->log('Set fields from $_REQUEST', $this->_rq);
        }

        return $this;
    }

    /**
     * Фильтрация полей по спискам разрешенных и запрещенных
     * @param  array  $fields
     * @param  array  $allowedFields
     * @param  array  $forbiddenFields
     * @return array
     */
    public function filterFields(array $fields = [], array $allowedFields = [], array $forbiddenFields = [])
    {
        $out = [];
        foreach ($fields as $key => $value) {
            //список рарешенных полей существует и поле в него входит; или списка нет, тогда пофиг
            $allowed = !empty($allowedFields) ? in_array($key, $allowedFields) : true;
            //поле входит в список запрещенных полей
            $forbidden = !empty($forbiddenFields) ? in_array($key, $forbiddenFields) : false;
            if (($allowed && !$forbidden) && ($value !== '' || $this->getCFGDef('allowEmptyFields', 1))) {
                $out[$key] = $value;
            }
        }

        return $out;
    }

    /**
     * @return bool
     */
    public function isSubmitted()
    {
        return $this->formid && (APIhelpers::getkey($this->_rq, 'formid') === $this->formid);
    }

    /**
     * Получение информации из конфига
     *
     * @param  string  $name  имя параметра в конфиге
     * @param  mixed  $def  значение по умолчанию, если в конфиге нет искомого параметра
     * @return mixed значение из конфига
     */
    public function getCFGDef($name, $def = null)
    {
        return $this->config->getCFGDef($name, $def);
    }

    /**
     * Сценарий работы
     * Если форма отправлена, то проверяем данные
     * Если проверка успешна, то обрабатываем данные
     * Выводим шаблон
     *
     * @return string
     */
    public function render()
    {
        if ($this->isSubmitted()) {
            $this->validateForm();
            if ($this->isValid()) {
                $this->runPrepare('prepareProcess');
                if ($this->isValid()) {
                    $this->process();
                    $this->log('Form procession complete', $this->getFormData());
                }
            }
        }

        return $this->renderForm();
    }

    /**
     * Готовит данные для вывода в шаблоне
     * @param  bool  $convertArraysToStrings
     * @return array
     */
    public function prerenderForm($convertArraysToStrings = false)
    {
        if (empty($this->plhCache) || !$convertArraysToStrings) {
            $this->plhCache = array_merge(
                $this->fieldsToPlaceholders(
                    $this->getFormData('fields'), 'value',
                    $this->getFormData('status') || $convertArraysToStrings
                ),
                $this->controlsToPlaceholders(),
                $this->errorsToPlaceholders(),
                ['form.messages' => $this->renderMessages()]
            );
        }

        return $this->plhCache;
    }

    /**
     * Вывод шаблона
     *
     * @return null|string
     */
    public function renderForm()
    {
        $api = (int) $this->getCFGDef('api', 0);
        /*
        * Если api = 0, то возвращается шаблон
        * Если api = 1, то возвращаются данные формы
        * Если api = 2, то возвращаются данные формы и шаблон
        * Если api = 3, то возвращается объект
        */
        if ($api == 3) {
            return $this;
        }

        $data = $this->getFormData();
        unset($data['files']);
        $data['captcha'] = $this->getPlaceholder('captcha');
        if ($api == 1) {
            $out = $data;
        } else {
            $skipPrerender = $this->getCFGDef('skipPrerender', 0);
            $prerenderErrors = $this->getCFGDef('prerenderErrors', 0);
            if ($skipPrerender && $prerenderErrors) {
                $plh = $this->errorsToPlaceholders();
                $this->placeholders = array_merge($plh, $this->placeholders);
            }
            $plh = $skipPrerender ? $this->getFormData('fields') : $this->prerenderForm($this->getFormStatus());
            $this->log('Render output', ['template' => $this->renderTpl, 'data' => $plh]);
            $form = $this->parseChunk($this->renderTpl, $plh);
            if (!$api) {
                $out = $form;
            } else {
                $out = $data;
                $out['output'] = $form;
            }
        }
        if ($api) {
            $allowed = $this->config->loadArray($this->getCFGDef('allowedApiFields'));
            $forbidden = $this->config->loadArray($this->getCFGDef('forbiddenApiFields'));
            $out['fields'] = $this->filterFields($out['fields'], $allowed, $forbidden);
            $out = $this->getCFGDef('apiFormat', 'json') == 'json' ? jsonHelper::toJson($out) : $out;
        }

        $this->log('Output', $out);

        return $out;
    }

    /**
     * Загружает данные в formData
     * @param  array  $fields  массив полей
     * @param  string  $prefix  добавляет префикс к имени поля
     * Если префикс заканчивается на подчеркивание(_), то префикс и имя разделяются подчеркиванием, иначе - точкой
     * @return $this
     */
    public function setFields(array $fields = [], $prefix = '')
    {
        $prefix = trim($prefix);
        if (!empty($prefix) && substr($prefix, -1) != '_') {
            $prefix = $prefix . '.';
        }
        foreach ($fields as $key => $value) {
            if (is_int($key)) {
                continue;
            }
            $this->setField($prefix . $key, $value);
        }

        return $this;
    }

    /**
     * Обработка значений по предопределенным правилам
     * @return $this
     */
    public function sanitizeForm()
    {
        $filterer = $this->getCFGDef('filterer', '\FormLister\Filters');
        $filterer = $this->loadModel($filterer, '', []);
        $filterSet = $this->config->loadArray($this->getCFGDef('filters', ''), '');
        foreach ($filterSet as $field => $filters) {
            if (!$this->fieldExists($field)) {
                continue;
            }
            $value = $this->getField($field);
            if (!is_array($filters)) {
                $filters = [$filters];
            }
            foreach ($filters as $filter) {
                if (method_exists($filterer, $filter)) {
                    $value = call_user_func(
                        [$filterer, $filter],
                        $value
                    );
                }
            }
            $this->setField($field, $value);
        }

        return $this;
    }

    /**
     * Возвращает результат проверки формы
     * @return bool
     */
    public function validateForm()
    {
        $validator = $this->getCFGDef('validator', '\FormLister\Validator');
        $validator = $this->loadModel($validator, '', []);
        $fields = $this->getFormData('fields');
        $rules = $this->getValidationRules();
        $this->log('Prepare to validate fields', ['fields' => $fields, 'rules' => $rules]);
        $result = $this->validate($validator, $rules, $fields);
        if ($result !== true) {
            foreach ($result as $item) {
                $this->addError($item[0], $item[1], $item[2]);
            }
            $this->log('Validation errors', $this->getFormData('errors'));
        }
        $this->validateFiles();

        return $this->isValid();
    }

    /**
     * @return bool
     */
    public function validateFiles()
    {
        $validator = $this->getCFGDef('fileValidator', '\FormLister\FileValidator');
        $validator = $this->loadModel($validator, '', []);
        $fields = $this->getFormData('files');
        $rules = $this->getValidationRules('fileRules');
        $this->log('Prepare to validate files', ['fields' => $fields, 'rules' => $rules]);
        /* workaround to keep deprecated 'optional' rule working */
        $rulesFields = array_keys($rules);
        foreach ($rulesFields as $key => &$value) {
            if (isset($rules[$value]['optional']) && substr($value, 0, 1) !== '!') {
                $value = '!' . $value;
            }
        }
        unset($value);
        $rules = array_combine($rulesFields, array_values($rules));
        $result = $this->validate($validator, $rules, $fields);
        if ($result !== true) {
            foreach ($result as $item) {
                $this->addError($item[0], $item[1], $item[2]);
            }
            $this->log('File validation errors', $this->getFormData('errors'));
        }

        return $this->isValid();
    }

    /**
     * Возвращает результаты выполнения правил валидации
     * @param  object  $validator
     * @param  array  $rules
     * @param  array  $fields
     * @return bool|array
     */
    public function validate($validator, array $rules, array $fields)
    {
        if (empty($rules) || is_null($validator)) {
            return true;
        } //если правил нет, то не проверяем
        //применяем правила
        $errors = [];
        $reflection = new ReflectionClass($validator);
        foreach ($rules as $field => $ruleSet) {
            $skipFlag = substr($field, 0, 1) == '!' ? true : false;
            if ($skipFlag) {
                $field = substr($field, 1);
            }
            $value = APIHelpers::getkey($fields, $field);
            if ($skipFlag && empty($value)) {
                continue;
            }
            foreach ($ruleSet as $rule => $description) {
                $inverseFlag = substr($rule, 0, 1) == '!' ? true : false;
                if ($inverseFlag) {
                    $rule = substr($rule, 1);
                }
                $result = true;
                $params = [$value];
                if (is_array($description)) {
                    if (isset($description['params'])) {
                        if (is_array($description['params'])) {
                            $params = array_merge($params, $description['params']);
                        } else {
                            $params[] = $description['params'];
                        }
                    }
                    if (isset($description['@params'])) {
                        if (is_array($description['@params'])) {
                            $params = array_merge($params, $this->parseValidationRuleParams($description['@params']));
                        } else {
                            $params[] = $this->parseValidationRuleParams($description['@params']);
                        }
                    }
                    $message = isset($description['message']) ? $description['message'] : '';
                } else {
                    $message = $description;
                }
                if (method_exists($validator, $rule)) {
                    $result = count($params) >= $reflection->getMethod($rule)->getNumberOfRequiredParameters() && call_user_func_array(
                        [$validator, $rule],
                        $params
                    );
                } else {
                    if (isset($description['function'])) {
                        $customRule = $description['function'];
                        if (is_callable($customRule)) {
                            $result = call_user_func_array($customRule, array_merge([$this], $params));
                        }
                    } elseif (isset($description['snippet'])) {
                        $customRule = $description['snippet'];
                        $result = $this->modx->runSnippet($customRule, [
                            'FormLister' => $this,
                            'value' => $value
                        ]);
                        if ($result === '' || $result === '1') $result = (bool)$result;
                    }
                }
                if (is_string($result)) {
                    $message = $result;
                    $result = false;
                }
                if ($inverseFlag) {
                    $result = !$result;
                }
                if ((int) $this->getCFGDef('api', 0) > 0 && $this->lexicon->isReady()) {
                    $message = $this->lexicon->parse($message);
                }
                if (!$result) {
                    $errors[] = [
                        $field,
                        $rule,
                        $message
                    ];
                    break;
                }
            }
        }

        return empty($errors) ? true : $errors;
    }

    /**
     * @param $params
     * @return array|string
     */
    protected function parseValidationRuleParams($params) {
        if (is_array($params)) {
            foreach ($params as &$param) {
                if (strpos($param, '@') === 0) {
                    $param = $this->getField(substr($param, 1));
                }
            }
            unset($param);
        } else {
            if (strpos($params, '@') === 0) {
                $params = $this->getField(substr($params, 1));
            }
        }

        return $params;
    }

    /**
     * Возвращает массив formData или его часть
     * @param  string  $section
     * @return array
     */
    public function getFormData($section = '')
    {
        if ($section && isset($this->formData[$section])) {
            $out = $this->formData[$section];
        } else {
            $out = $this->formData;
        }

        return $out;
    }

    /**
     * Устанавливает статус формы, если true, то форма успешно обработана
     * @param  bool  $status
     * @return $this
     */
    public function setFormStatus($status)
    {
        $this->formData['status'] = (bool) $status;

        return $this;
    }

    /**
     * Возращвет статус формы
     * @return bool
     */
    public function getFormStatus()
    {
        return $this->formData['status'];
    }

    /**
     * Возвращает значение поля из formData
     * @param  string  $field
     * @param  mixed  $default
     * @return mixed
     */
    public function getField($field, $default = '')
    {
        return APIhelpers::getkey($this->formData['fields'], $field, $default);
    }

    /**
     * Проверяет существование поля в formData
     * @param  string  $field
     * @return bool
     */
    public function fieldExists($field)
    {
        if (!is_scalar($field)) {
            return false;
        }
        $alias  = $field;
        if (isset($this->fieldAliases[$field])) {
            $alias = $this->fieldAliases[$field];
        }

        return isset($this->formData['fields'][$field]) || isset($this->formData['fields'][$alias]);
    }

    /**
     * Сохраняет значение поля в formData
     * @param  string  $field  имя поля
     * @param $value
     * @return $this
     */
    public function setField($field, $value)
    {
        if ($value !== '' || $this->getCFGDef('allowEmptyFields', 1)) {
            if (isset($this->fieldAliases[$field])) {
                $alias = $this->fieldAliases[$field];
                $this->formData['fields'][$alias] = $value;
            } elseif (isset($this->aliasFields[$field])) {
                $alias = $this->aliasFields[$field];
                $this->formData['fields'][$alias] = $value;
            }
            $this->formData['fields'][$field] = $value;
            $this->plhCache = [];
        }

        return $this;
    }

    /**
     * @param  string  $placeholder
     * @param $value
     * @return $this
     */
    public function setPlaceholder($placeholder, $value)
    {
        $this->placeholders[$placeholder] = $value;
        $this->plhCache = [];

        return $this;
    }

    /**
     * @param $placeholder
     * @param  string  $default
     * @return mixed
     */
    public function getPlaceholder($placeholder, $default = '')
    {
        return APIhelpers::getkey($this->placeholders, $placeholder, $default);
    }

    /**
     * Удаляет поле из formData
     * @param  string  $field
     * @param  bool  $checkAlias
     * @return $this
     */
    public function unsetField($field, $checkAlias = true)
    {
        if (isset($this->formData['fields'][$field])) {
            unset($this->formData['fields'][$field]);
            if ($checkAlias) {
                if (isset($this->fieldAliases[$field])) {
                    $alias = $this->fieldAliases[$field];
                    unset($this->formData['fields'][$alias]);
                } elseif (isset($this->aliasFields[$field])) {
                    $alias = $this->aliasFields[$field];
                    unset($this->formData['fields'][$alias]);
                }
            }

            $this->plhCache = [];
        }

        return $this;
    }

    /**
     * @param  array  $fields
     * @param  bool  $checkAlias
     * @return $this
     */
    public function unsetFields(array $fields, $checkAlias = true)
    {
        foreach ($fields as $field) {
            $this->unsetField($field, $checkAlias);
        }

        return $this;
    }

    /**
     * Добавляет в formData информацию об ошибке
     * @param  string  $field  имя поля
     * @param  string  $type  тип ошибки
     * @param  string  $message  сообщение об ошибке
     * @return $this
     */
    public function addError($field, $type, $message)
    {
        if ($this->lexicon->isReady()) {
            $message = $this->lexicon->parse($message);
        }
        $this->formData['errors'][$field][$type] = $message;

        return $this;
    }

    /**
     * Добавляет сообщение в formData
     * @param  string  $message
     * @return $this
     */
    public function addMessage($message = '')
    {
        if ($message) {
            if ($this->lexicon->isReady()) {
                $message = $this->lexicon->parse($message);
            }
            $this->formData['messages'][] = $message;
            $this->plhCache = [];
        }

        return $this;
    }

    /**
     * Готовит данные для вывода в шаблон
     * @param  array  $fields  массив с данными
     * @param  string  $suffix  добавляет суффикс к имени поля
     * @param  bool  $split  преобразование массивов в строки
     * @return array
     */
    public function fieldsToPlaceholders(array $fields = [], $suffix = '', $split = false)
    {
        $plh = [];
        if (is_array($fields)) {
            $plh = $fields;
            $sanitarTagFields = is_null($this->gpc) ? [] : $this->gpc->getFields();
            $defaultSplitter = $this->getCFGDef('arraySplitter', '; ');
            foreach ($fields as $field => $value) {
                $sanitizeTags = in_array($field, $sanitarTagFields);
                if (is_array($value)) {
                    foreach ($value as $key => &$_value) {
                        if (empty($_value) || !is_scalar($_value)) {
                            unset($value[$key]);
                            continue;
                        }
                        if ($sanitizeTags) {
                            $_value = APIhelpers::sanitarTag($_value);
                        }
                        $_value = APIhelpers::e($_value);
                    }
                    unset($_value);
                    if ($split) {
                        $arraySplitter = $this->getCFGDef($field . '.arraySplitter',
                            $defaultSplitter);
                        $value = implode($arraySplitter, $value);
                    }
                } else {
                    if ($sanitizeTags) {
                        $value = APIhelpers::sanitarTag($value);
                    }
                    $value = APIhelpers::e($value);
                }
                $field = [$field, $suffix];
                $field = implode('.', array_filter($field));
                $plh[$field] = $value;
            }
        }
        if (!empty($this->placeholders)) {
            $plh = array_merge($plh, $this->placeholders);
        }

        return $plh;
    }

    /**
     * Готовит сообщения об ошибках для вывода в шаблон
     * @return array
     */
    public function errorsToPlaceholders()
    {
        $plh = [];
        foreach ($this->getFormData('errors') as $field => $error) {
            foreach ($error as $type => $message) {
                $classType = ($type == 'required') ? 'required' : 'error';
                if (!empty($message)) {
                    $plh[$field . '.error'] = $this->parseChunk($this->getCFGDef('errorTpl',
                        '@CODE:<div class="error">[+message+]</div>'), ['message' => $message]);
                }
                $plh[$field . '.' . $classType . 'Class'] = $this->getCFGDef($field . '.' . $classType . 'Class',
                    $this->getCFGDef($classType . 'Class', $classType));
                $plh[$field . '.class'] = "class=\"{$plh[$field . '.' . $classType . 'Class']}\"";
                $plh[$field . '.classname'] = "{$plh[$field . '.' . $classType . 'Class']}";
            }
        }

        return $plh;
    }

    /**
     * Обработка чекбоксов, селектов, радио-кнопок перед выводом в шаблон
     * @return array
     */
    public function controlsToPlaceholders()
    {
        $plh = [];
        $formControls = $this->config->loadArray($this->getCFGDef('formControls'));
        foreach ($formControls as $field) {
            $value = $this->getField($field);
            if ($value === '') {
                continue;
            } elseif (is_array($value)) {
                foreach ($value as $_value) {
                    $plh["s.{$field}.{$_value}"] = 'selected';
                    $plh["c.{$field}.{$_value}"] = 'checked';
                }
            } else {
                $plh["s.{$field}.{$value}"] = 'selected';
                $plh["c.{$field}.{$value}"] = 'checked';
            }
        }

        return $plh;
    }

    /**
     * Загрузка правил валидации
     * @param  string  $param
     * @return array
     */
    public function getValidationRules($param = 'rules')
    {
        $rules = $this->getCFGDef($param);
        if (empty($rules)) {
            $this->log('No validation rules defined in ' . $param . ' parameter');

            return [];
        }
        $rules = $this->config->loadArray($rules, '');
        if ($param === 'rules' && !empty($this->rules)) {
            $rules = array_merge($this->rules, $rules);
        }
        if (empty($rules)) {
            $this->log('Validation rules failed to load');
        }

        return $rules;
    }

    /**
     * Готовит сообщения из formData для вывода в шаблон
     * @return string
     */
    public function renderMessages()
    {
        $out = '';
        $wrapper = $this->getCFGDef('messagesTpl', '@CODE:<div class="form-messages">[+messages+]</div>');
        $formMessages = array_filter($this->getFormData('messages'));
        $plh = [];
        $plh['messages'] = $this->renderMessagesGroup(
            $formMessages,
            'messagesOuterTpl',
            'messagesSplitter'
        );
        $renderErrors = strpos($wrapper, '[+errors+]') !== false || strpos($wrapper, '[+required+]') !== false;
        if ($renderErrors) {
            $formErrors = array_filter($this->getFormData('errors'));
            $requiredMessages = $errorMessages = [];
            foreach ($formErrors as $field => $error) {
                $type = key($error);
                if ($type == 'required') {
                    $requiredMessages[] = $error[$type];
                } else {
                    $errorMessages[] = $error[$type];
                }
            }
            if (!empty($requiredMessages)) {
                $plh['required'] = $this->renderMessagesGroup(
                    $requiredMessages,
                    'messagesRequiredOuterTpl',
                    'messagesRequiredSplitter'
                );
            }
            if (!empty($errorMessages)) {
                $plh['errors'] = $this->renderMessagesGroup(
                    $errorMessages,
                    'messagesErrorOuterTpl',
                    'messagesErrorSplitter'
                );
            }
        }
        if (!empty($plh['messages']) || !empty($plh['errors']) || !empty($plh['required'])) {
            $out = $this->parseChunk($wrapper, $plh);
        }

        return $out;
    }

    /**
     * @param  array  $messages
     * @param  string  $wrapper
     * @param  string  $splitter
     * @return string
     */
    public function renderMessagesGroup(array $messages, $wrapper, $splitter)
    {
        $out = '';
        if (is_array($messages) && !empty($messages)) {
            $out = implode($this->getCFGDef($splitter, '<br>'), $messages);
            $wrapperChunk = $this->getCFGDef($wrapper, '@CODE: [+messages+]');
            $out = $this->parseChunk($wrapperChunk, ['messages' => $out]);
        }

        return $out;
    }

    /**
     * @param $name
     * @param array $data
     * @param  bool  $parseDocumentSource
     * @return string
     */
    public function parseChunk($name, array $data, $parseDocumentSource = false)
    {
        $isModxChunk = !preg_match('/^@[A-Z]_/', $name);
        $parseDocumentSource = $isModxChunk && ($parseDocumentSource || $this->getCFGDef('parseDocumentSource', 0));
        $rewriteUrls = $this->getCFGDef('rewriteUrls', 1);
        $templateData = [
            'FormLister' => $this,
            'errors'     => $this->getFormData('errors'),
            'messages'   => $this->getFormData('messages'),
            'plh'        => $this->placeholders
        ];
        $this->DLTemplate->setTemplateData($templateData);
        $out = $this->DLTemplate->parseChunk($name, $data, $parseDocumentSource,
            $isModxChunk && !$this->getCFGDef('disablePhx', 1));
        if ($isModxChunk) {
            if ($this->lexicon->isReady()) {
                $out = $this->lexicon->parse($out);
            }
            if (!$parseDocumentSource && $rewriteUrls) {
                $out = $this->modx->rewriteUrls($out);
            }
            if ($this->getCFGDef('removeEmptyPlaceholders', 1)) {
                preg_match_all('~\[(\+|\*|\(|%)([^:\+\[\]]+)([^\[\]]*?)(\1|\)|%)\]~s', $out, $matches);
                if ($matches[0]) {
                    $out = str_replace($matches[0], '', $out);
                }
            }
        }

        return $out;
    }

    /**
     * Получение значения из лексикона
     * @param $name
     * @param  string  $default
     * @return string
     */
    public function translate($name, $default = '')
    {
        $out = $this->lexicon->get($name, $default);

        return $out;
    }

    /**
     * Загружает класс капчи
     */
    public function initCaptcha()
    {
        if ($captcha = $this->getCFGDef('captcha')) {
            $captcha = preg_replace('/[^a-zA-Z]/', '', $captcha);
            $className = ucfirst($captcha . 'Wrapper');
            $cfg = $this->config->loadArray($this->getCFGDef('captchaParams', []));
            $cfg['id'] = $this->getFormId();
            $captcha = $this->loadModel($className,
                MODX_BASE_PATH . "assets/snippets/FormLister/lib/captcha/{$captcha}/wrapper.php",
                [$this->modx, $cfg]);

            if (!is_null($captcha) && $captcha instanceof CaptchaInterface) {
                $captcha->init();
                $this->rules[$this->getCFGDef('captchaField', 'vericode')] = [
                    "captcha" => [
                        "function" => "{$className}::validate",
                        "params"   => [$captcha]
                    ]
                ];
                $this->captcha = $captcha;
                $this->setPlaceholder('captcha', $captcha->getPlaceholder());
            }

        }

        return $this;
    }

    /**
     * @return DocumentParser|null
     */
    public function getMODX()
    {
        return $this->modx;
    }

    /**
     * @return mixed|string
     */
    public function getFormId()
    {
        return $this->formid;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        $this->setValid(!count($this->getFormData('errors')));

        return (bool) $this->valid;
    }

    /**
     * Вызов prepare-сниппетов
     * @param  string  $paramName
     * @return $this
     */
    public function runPrepare($paramName = 'prepare')
    {
        if (($prepare = $this->getCFGDef($paramName)) != '') {
            $names = $this->config->loadArray($prepare);
            foreach ($names as $item) {
                $this->callPrepare($item, [
                    'modx'       => $this->modx,
                    'data'       => $this->getFormData('fields'),
                    'FormLister' => $this,
                    'name'       => $paramName
                ]);
            }
            $this->log('Prepare finished', $this->getFormData('fields'));
        }

        return $this;
    }

    /**
     * @param $name
     * @param  array  $params
     * @return $this
     */
    public function callPrepare($name, array $params = [])
    {
        if (!empty($name)) {
            if ((is_object($name) && ($name instanceof Closure)) || is_callable($name)) {
                $result = call_user_func_array($name, $params);
            } else {
                $result = $this->modx->runSnippet($name, $params);
            }
            if (is_array($result)) {
                $this->setFields($result);
            }
        }

        return $this;
    }

    /**
     * В api-режиме редирект не выполняется, но ссылка доступна в formData
     * @param  string  $param  имя параметра с id документа для редиректа
     * @param  array  $_query
     */
    public function redirect($param = 'redirectTo', array $_query = [])
    {
        if ($redirect = $this->getCFGDef($param, 0)) {
            $header = '';
            $query = http_build_query($_query);
            if (is_numeric($redirect) || filter_var($redirect, FILTER_VALIDATE_URL) !== false) {
                $page = $redirect;
            } else {
                $redirect = $this->config->loadArray($redirect, '');
                if (filter_var($redirect, FILTER_VALIDATE_URL) !== false) {
                    $page = $redirect;
                } else {
                    if (isset($redirect['query']) && is_array($redirect['query'])) {
                        $query = http_build_query(array_merge($redirect['query'], $_query));
                    }
                    if (isset($redirect['header'])) {
                        $header = $redirect['header'];
                    }
                    $page = isset($redirect['page']) ? $redirect['page'] : $this->modx->getConfig('site_start');
                }
            }
            if (is_numeric($page)) {
                $redirect = $this->modx->makeUrl($page, '', $query, 'full');
            } else {
                $redirect = $page . (empty($query) ? '' : '?' . $query);
            }
            $this->setField($param, $redirect);
            $this->saveRedirect($redirect);
            $this->log('Redirect (' . $param . ') to' . $redirect, ['data' => $this->getFormData('fields')]);
            $this->sendRedirect($redirect, $header);
        }
    }

    /**
     * @param $redirect
     * @return Core
     */
    public function saveRedirect($redirect)
    {
        $this->formData['redirect'] = $redirect;

        return $this;
    }

    /**
     * @param $url
     * @param $header
     */
    public function sendRedirect($url, $header = 'HTTP/1.1 307 Temporary Redirect')
    {
        if (!$this->getCFGDef('api', 0)) {
            $header = $header ? $header : 'HTTP/1.1 307 Temporary Redirect';
            if (!is_null($this->debug)) {
                $this->debug->saveLog();
            }
            $this->modx->sendRedirect($url, 0, 'REDIRECT_HEADER', $header);
        }
    }

    /**
     * Обработка формы, определяется контроллерами
     *
     * @return mixed
     */
    abstract public function process();

    /**
     * @param  boolean  $valid
     * @return Core
     */
    public function setValid($valid)
    {
        $this->valid &= $valid;

        return $this;
    }

    /**
     * @param  array  $files
     * @return Core
     */
    public function setFiles($files)
    {
        if (is_array($files)) {
            $this->formData['files'] = $files;
        }

        return $this;
    }

    /**
     * @param  string  $message
     * @param  array  $data
     * @return Core
     */
    public function log($message, $data = [])
    {
        if (!is_null($this->debug)) {
            $this->debug->log($message, $data);
        }

        return $this;
    }

    /**
     * @param $model
     * @param  string  $path
     * @param  string  $init
     * @return object
     */
    public function loadModel($model, $path = '', $init = '')
    {
        $out = null;
        if (!class_exists($model) && $path && $this->fs->checkFile($path)) {
            include_once(MODX_BASE_PATH . $this->fs->relativePath($path));
        }
        if (class_exists($model)) {
            if (!is_array($init)) {
                $init = [$this->modx];
            }
            $out = new $model(...$init);
        }

        return $out;
    }

    /**
     * @param  array  $_files
     * @param  array  $allowed
     * @param  bool  $flag
     * @return array
     */
    public function filesToArray(array $_files, array $allowed = [], $flag = true)
    {
        $files = [];
        foreach ($_files as $name => $file) {
            if (!empty($allowed) && !in_array($name, $allowed) && !is_int($name)) {
                continue;
            }
            if ($flag) {
                $sub_name = $file['name'];
            } else {
                $sub_name = $name;
            }
            if (is_array($sub_name)) {
                foreach (array_keys($sub_name) as $key) {
                    if ($file['error'][$key] === 4) {
                        continue;
                    }
                    $files[$name][] = [
                        'name'     => $file['name'][$key],
                        'type'     => $file['type'][$key],
                        'tmp_name' => $file['tmp_name'][$key],
                        'error'    => $file['error'][$key],
                        'size'     => $file['size'][$key],
                    ];
                    $files[$name] = $this->filesToArray($files[$name], $allowed, false);
                }
            } elseif ($file['error'] !== 4) {
                $files[$name] = $file;
            }
        }

        return $files;
    }

    /**
     * Возвращает сообщения об ошибках для указанного поля
     * @param  string  $field
     * @return array
     */
    public function getErrorMessage($field)
    {
        $out = [];
        if (!empty($field) && isset($this->formData['errors'][$field]) && is_array($this->formData['errors'][$field])) {
            $out = array_values($this->formData['errors'][$field]);
        }

        return $out;
    }

    /**
     * Возвращает типы ошибок для указанного поля
     * @param  string  $field
     * @return array
     */
    public function getErrorType($field)
    {
        $out = [];
        if (!empty($field) && isset($this->formData['errors'][$field]) && is_array($this->formData['errors'][$field])) {
            $out = array_keys($this->formData['errors'][$field]);
        }

        return $out;
    }
}
