<?php

use FormLister\CaptchaInterface;
use FormLister\Core;

/**
 * Class ReCaptchaWrapper
 */
class YandexCaptchaWrapper implements CaptchaInterface
{
    /**
     * @var array $cfg
     * id, secretKey, siteKey
     */
    public $cfg = null;
    protected $modx = null;

    /**
     * modxCaptchaWrapper constructor.
     * @param $modx
     * @param $cfg
     */
    public function __construct(\DocumentParser $modx, $cfg = [])
    {
        $this->cfg = $cfg;
        $this->modx = $modx;
    }

    /**
     * Устанавливает значение капчи
     * @return mixed
     */
    public function init()
    {
        return;
    }

    /**
     * Плейсхолдер капчи для вывода в шаблон
     * Может быть ссылкой на коннектор (чтобы можно было обновлять c помощью js), может быть сразу картинкой в base64
     * @return string
     */
    public function getPlaceholder()
    {
        $siteKey = \APIhelpers::getkey($this->cfg, 'siteKey');
        $id = \APIhelpers::getkey($this->cfg, 'id');
        $id = $id ? ('id="' . $id . '-captcha"') : '';
        $out = '';
        if (!empty($siteKey)) {
            $out = "<div {$id} data-sitekey=\"{$siteKey}\" class=\"smart-captcha\"></div>";
        }

        return $out;
    }

    /**
     * @param  \FormLister\Core  $FormLister
     * @param $value
     * @param  \FormLister\CaptchaInterface  $captcha
     * @return bool|string
     */
    public static function validate(Core $FormLister, $value, CaptchaInterface $captcha)
    {
        $secretKey = \APIhelpers::getkey($captcha->cfg, 'secretKey');
        $params = http_build_query([
           'secret' => $secretKey,
           'token' => $value,
           'ip' => \APIhelpers::getUserIP()
        ]);
        $url = "https://smartcaptcha.yandexcloud.net/validate?{$params}";
        $out = false;
        if (!empty($value)) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            curl_setopt($curl, CURLOPT_USERAGENT,
                "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response, true) ?? [];
            $out = isset($response['status']) && $response['status'] === 'ok';
        }
        if (!$out) {
            $out = \APIhelpers::getkey($captcha->cfg, 'errorCodeFailed', 'Вы не прошли проверку');
        }
        $FormLister->log('YandexCaptcha validation result: ' . $out);

        return $out;
    }
}
