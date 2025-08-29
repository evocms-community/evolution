<?php
if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.");
}

// Определяем тип ресурса и проверяем права
$resourceType = isset($_GET['type']) ? $_GET['type'] : (isset($_POST['type']) ? $_POST['type'] : '');
$id = isset($_GET['id']) ? (int) $_GET['id'] : (isset($_POST['id']) ? (int) $_POST['id'] : 0);

if ($id == 0) {
    $modx->webAlertAndQuit($_lang["error_no_id"]);
}

// Маппинг типов ресурсов и необходимых прав
$resourceTypeMap = [
    'module' => [
        'permission' => 'delete_module',
        'model' => 'SiteModule',
        'event_before' => 'OnBeforeModFormDelete',
        'event_after' => 'OnModFormDelete',
        'redirect' => 'index.php?a=76&r=2&tab=5'
    ],
    'snippet' => [
        'permission' => 'delete_snippet',
        'model' => 'SiteSnippet',
        'event_before' => 'OnBeforeSnipFormDelete',
        'event_after' => 'OnSnipFormDelete',
        'redirect' => 'index.php?a=76&r=2&tab=3'
    ],
    'plugin' => [
        'permission' => 'delete_plugin',
        'model' => 'SitePlugin',
        'event_before' => 'OnBeforePlugFormDelete',
        'event_after' => 'OnPlugFormDelete',
        'redirect' => 'index.php?a=76&r=2&tab=4'
    ],
    'template' => [
        'permission' => 'delete_template',
        'model' => 'SiteTemplate',
        'event_before' => 'OnBeforeTempFormDelete',
        'event_after' => 'OnTempFormDelete',
        'redirect' => 'index.php?a=76&r=2&tab=1'
    ],
    'tv' => [
        'permission' => 'delete_template',
        'model' => 'SiteTmplvar',
        'event_before' => 'OnBeforeTVFormDelete',
        'event_after' => 'OnTVFormDelete',
        'redirect' => 'index.php?a=76&r=2&tab=2'
    ],
    'chunk' => [
        'permission' => 'delete_chunk',
        'model' => 'SiteHtmlsnippet',
        'event_before' => 'OnBeforeChunkFormDelete',
        'event_after' => 'OnChunkFormDelete',
        'redirect' => 'index.php?a=76&r=2&tab=0'
    ]
];

// Проверяем валидность типа ресурса
if (!array_key_exists($resourceType, $resourceTypeMap)) {
    $modx->webAlertAndQuit("Неверный тип ресурса ".$resourceType);
}

// Проверяем права доступа
if (!$modx->hasPermission($resourceTypeMap[$resourceType]['permission'])) {
    $modx->webAlertAndQuit($_lang["error_no_privileges"]);
}

// ================== ВСПОМОГАТЕЛЬНЫЕ ФУНКЦИИ ==================

// Вспомогательная функция для рекурсивного удаления директории
function deleteDirectory($dir) {
    if (!is_dir($dir)) {
        return false;
    }
    
    $files = array_diff(scandir($dir), array('.', '..'));
    foreach ($files as $file) {
        $path = $dir . '/' . $file;
        if (is_dir($path)) {
            deleteDirectory($path);
        } else {
            unlink($path);
        }
    }
    return rmdir($dir);
}

// Функция для удаления файлов ресурса (универсальная)
function deleteResourceFiles($resource, $type) {
    $deletedFiles = [];
    
    switch ($type) {
        case 'module':
            // Удаляем файл ресурса модуля
            if (!empty($resource->resourcefile) && file_exists($resource->resourcefile)) {
                if (unlink($resource->resourcefile)) {
                    $deletedFiles[] = $resource->resourcefile;
                }
            }
            
            // Удаляем иконку модуля
            if (!empty($resource->icon) && file_exists($resource->icon)) {
                if (unlink($resource->icon)) {
                    $deletedFiles[] = $resource->icon;
                }
            }
            
            // Анализируем код модуля на наличие require/include
            if (!empty($resource->modulecode)) {
                preg_match_all('/\b(?:require|include)(?:_once)?\s*[\'"]\s*([^\'"]+)\s*[\'"]/i', $resource->modulecode, $matches);
                
                if (!empty($matches[1])) {
                    foreach ($matches[1] as $filePath) {
                        if (strpos($filePath, MODX_BASE_PATH) === false) {
                            $fullPath = MODX_BASE_PATH . ltrim($filePath, '/');
                        } else {
                            $fullPath = $filePath;
                        }
                        
                        if (file_exists($fullPath) && strpos($fullPath, MODX_BASE_PATH) === 0) {
                            if (unlink($fullPath)) {
                                $deletedFiles[] = $fullPath;
                            }
                        }
                    }
                }
                
                // Пытаемся определить папку модуля
                preg_match_all('/[\'"]assets\/modules\/([^\/\'"]+)/i', $resource->modulecode, $dirMatches);
                if (!empty($dirMatches[1])) {
                    foreach ($dirMatches[1] as $dirName) {
                        $moduleDir = MODX_BASE_PATH . 'assets/modules/' . $dirName;
                        if (is_dir($moduleDir)) {
                            if (deleteDirectory($moduleDir)) {
                                $deletedFiles[] = $moduleDir . ' (directory)';
                            }
                        }
                    }
                }
            }
            break;
            
        case 'snippet':
            // Для сниппетов ищем файлы в коде сниппета
            if (!empty($resource->snippet)) {
                preg_match_all('/[\'"]\s*(assets\/[^\'"]+\.(php|js|css|html?))[\'"]/i', $resource->snippet, $matches);
                
                if (!empty($matches[1])) {
                    foreach ($matches[1] as $filePath) {
                        $fullPath = MODX_BASE_PATH . $filePath;
                        if (file_exists($fullPath) && unlink($fullPath)) {
                            $deletedFiles[] = $fullPath;
                        }
                    }
                }
            }
            break;

        case 'plugin':
            // Для плагинов ищем файлы в коде плагина  
            if (!empty($resource->plugincode)) {
                preg_match_all('/[\'"]\s*(assets\/[^\'"]+\.(php|js|css|html?))[\'"]/i', $resource->plugincode, $matches);
                
                if (!empty($matches[1])) {
                    foreach ($matches[1] as $filePath) {
                        $fullPath = MODX_BASE_PATH . $filePath;
                        if (file_exists($fullPath) && unlink($fullPath)) {
                            $deletedFiles[] = $fullPath;
                        }
                    }
                }
            }
            break;
    }
    
    return $deletedFiles;
}

// Функция для очистки кода от комментариев и строковых литералов
function cleanCodeForAnalysis($code) {
    // Удаляем однострочные комментарии
    $code = preg_replace('/\/\/.*?$/m', '', $code);
    
    // Удаляем многострочные комментарии
    $code = preg_replace('/\/\*.*?\*\//s', '', $code);
    
    // Удаляем HTML комментарии
    $code = preg_replace('/<!--.*?-->/s', '', $code);
    
    // Удаляем строковые литералы (сохраняем только код)
    $code = preg_replace('/[\'"].*?[\'"]/s', '""', $code);
    
    return $code;
}

// Функция для проверки реальной зависимости
function isRealDependency($code, $resourceName, $resourceType) {
    $cleanCode = cleanCodeForAnalysis($code);
    $searchPattern = preg_quote($resourceName, '/');
    
    switch($resourceType) {
        case 'plugin':
            // Проверяем вызовы плагинов через MODX API
            $pluginPatterns = [
                '/\$modx->runPlugin\(\s*[\'"]' . $searchPattern . '[\'"]/i',
                '/\brunPlugin\(\s*[\'"]' . $searchPattern . '[\'"]/i',
                '/PluginEvents\s*\[[\'"]' . $searchPattern . '[\'"]/i',
                '/\b' . $searchPattern . '\s*::/i',
                '/\bnew\s+' . $searchPattern . '\b/i',
                '/\bextends\s+' . $searchPattern . '\b/i',
                '/\bimplements\s+' . $searchPattern . '\b/i'
            ];
            
            foreach ($pluginPatterns as $pattern) {
                if (preg_match($pattern, $cleanCode)) {
                    return true;
                }
            }
            break;
            
        case 'snippet':
            // Проверяем вызовы сниппетов
            $snippetPatterns = [
                '/\$modx->runSnippet\(\s*[\'"]' . $searchPattern . '[\'"]/i',
                '/\brunSnippet\(\s*[\'"]' . $searchPattern . '[\'"]/i',
                '/\[\[\s*!' . $searchPattern . '\s*[?!]?\]\]/i',
                '/\[\[\s*' . $searchPattern . '\s*[?!]?\]\]/i',
                '/\b' . $searchPattern . '\s*\(/i'
            ];
            
            foreach ($snippetPatterns as $pattern) {
                if (preg_match($pattern, $cleanCode)) {
                    return true;
                }
            }
            break;
            
        case 'module':
            // Проверяем использование модулей
            $modulePatterns = [
                '/\$modx->runModule\(\s*[\'"]' . $searchPattern . '[\'"]/i',
                '/\brunModule\(\s*[\'"]' . $searchPattern . '[\'"]/i',
                '/\bincludeModule\(\s*[\'"]' . $searchPattern . '[\'"]/i',
                '/\b' . $searchPattern . '\\\\(?:[a-zA-Z0-9_]+)/i' // namespace usage
            ];
            
            foreach ($modulePatterns as $pattern) {
                if (preg_match($pattern, $cleanCode)) {
                    return true;
                }
            }
            break;
            
        case 'chunk':
            // Проверяем использование чанков
            $chunkPatterns = [
                '/\$modx->getChunk\(\s*[\'"]' . $searchPattern . '[\'"]/i',
                '/\bgetChunk\(\s*[\'"]' . $searchPattern . '[\'"]/i',
                '/\[\[\s*' . $searchPattern . '\s*\]\]/i',
                '/\$\w+\s*\.\s*' . $searchPattern . '\b/i' // для шаблонизаторов
            ];
            
            foreach ($chunkPatterns as $pattern) {
                if (preg_match($pattern, $cleanCode)) {
                    return true;
                }
            }
            break;
            
        case 'tv':
            // Проверяем использование TV параметров
            $tvPatterns = [
                '/\$modx->getTemplateVar\(\s*[\'"]' . $searchPattern . '[\'"]/i',
                '/\bgetTemplateVar\(\s*[\'"]' . $searchPattern . '[\'"]/i',
                '/\b' . $searchPattern . '\s*=/i',
                '/\[\[\s*' . $searchPattern . '\s*\]\]/i'
            ];
            
            foreach ($tvPatterns as $pattern) {
                if (preg_match($pattern, $cleanCode)) {
                    return true;
                }
            }
            break;
            
        default:
            // Общий паттерн для других типов
            return preg_match('/\b(?:use|call|run|get|include|require|extends|implements)\s+[\'"]?' . $searchPattern . '[\'"]?/i', $cleanCode);
    }
    
    return false;
}

// Функция для поиска обратных зависимостей
function findReverseDependencies($resourceName, $resourceId, $currentResourceType) {
    $dependencies = [
        'plugins' => [],
        'snippets' => [],
        'tvs' => [],
        'chunks' => [],
        'templates' => [],
        'modules' => []
    ];

    // Общая функция для поиска зависимостей в коде
    $findInCode = function($code, $resId, $resName, $resType) use ($resourceName, $currentResourceType, &$dependencies) {
        if (empty($code)) {
            return false;
        }
        
        // Проверяем реальную зависимость
        if (isRealDependency($code, $resourceName, $currentResourceType)) {
            $dependencies[$resType.'s'][] = [
                'id' => $resId,
                'name' => $resName,
                'type' => $resType,
                'reason' => 'использование в коде'
            ];
            return true;
        }
        
        return false;
    };

    // Поиск в плагинах
    $plugins = EvolutionCMS\Models\SitePlugin::all();
    foreach ($plugins as $plugin) {
        if ($plugin->id != $resourceId || $currentResourceType != 'plugin') {
            $findInCode($plugin->plugincode, $plugin->id, $plugin->name, 'plugin');
        }
    }

    // Поиск в сниппетах
    $snippets = EvolutionCMS\Models\SiteSnippet::all();
    foreach ($snippets as $snippet) {
        if ($snippet->id != $resourceId || $currentResourceType != 'snippet') {
            $findInCode($snippet->snippet, $snippet->id, $snippet->name, 'snippet');
        }
    }

    // Поиск в чанках
    $chunks = EvolutionCMS\Models\SiteHtmlsnippet::all();
    foreach ($chunks as $chunk) {
        if ($chunk->id != $resourceId || $currentResourceType != 'chunk') {
            $findInCode($chunk->snippet, $chunk->id, $chunk->name, 'chunk');
        }
    }

    // Поиск в TV-параметрах
    $tvs = EvolutionCMS\Models\SiteTmplvar::all();
    foreach ($tvs as $tv) {
        if ($tv->id != $resourceId || $currentResourceType != 'tv') {
            $fieldsToCheck = [
                $tv->default_text,
                $tv->display_params,
                $tv->input_properties,
                $tv->output_properties
            ];
            
            foreach ($fieldsToCheck as $fieldValue) {
                if (!empty($fieldValue) && $findInCode($fieldValue, $tv->id, $tv->name, 'tv')) {
                    break;
                }
            }
        }
    }

    // Поиск в шаблонах
    $templates = EvolutionCMS\Models\SiteTemplate::all();
    foreach ($templates as $template) {
        if ($template->id != $resourceId || $currentResourceType != 'template') {
            if (!empty($template->content) && $findInCode($template->content, $template->id, $template->templatename, 'template')) {
                continue;
            }
            
            if (!empty($template->properties)) {
                $findInCode($template->properties, $template->id, $template->templatename, 'template');
            }
        }
    }

    // Поиск в модулях
    if ($currentResourceType !== 'module') {
        $modules = EvolutionCMS\Models\SiteModule::all();
        foreach ($modules as $module) {
            if ($module->id != $resourceId) {
                if (!empty($module->modulecode) && $findInCode($module->modulecode, $module->id, $module->name, 'module')) {
                    continue;
                }
            }
        }
    }

    // Удаляем дубликаты
    foreach ($dependencies as &$depArray) {
        $depArray = array_unique($depArray, SORT_REGULAR);
    }

    return $dependencies;
}

// Функция для удаления зависимостей
function deleteDependencies($dependenciesToDelete, $reverseDeps) {
    $deleted = [];
    
    foreach ($dependenciesToDelete as $type => $resources) {
        foreach ($resources as $index => $resourceId) {
            // Находим информацию о ресурсе
            $resourceInfo = null;
            foreach ($reverseDeps[$type] as $resource) {
                if ($resource['id'] == $resourceId) {
                    $resourceInfo = $resource;
                    break;
                }
            }
            
            if ($resourceInfo) {
                $modelClass = 'EvolutionCMS\Models\\';
                switch ($resourceInfo['type']) {
                    case 'plugin':
                        $modelClass .= 'SitePlugin';
                        break;
                    case 'snippet':
                        $modelClass .= 'SiteSnippet';
                        break;
                    case 'chunk':
                        $modelClass .= 'SiteHtmlsnippet';
                        break;
                    case 'tv':
                        $modelClass .= 'SiteTmplvar';
                        break;
                    case 'template':
                        $modelClass .= 'SiteTemplate';
                        break;
                    case 'module':
                        $modelClass .= 'SiteModule';
                        break;
                }
                
                if (class_exists($modelClass)) {
                    $modelClass::destroy($resourceId);
                    $deleted[] = ucfirst($resourceInfo['type']) . ": " . $resourceInfo['name'];
                }
            }
        }
    }
    
    return $deleted;
}

// ================== ОСНОВНАЯ ЛОГИКА ==================

// Получаем информацию о ресурсе
$modelClass = 'EvolutionCMS\Models\\' . $resourceTypeMap[$resourceType]['model'];
$resource = $modelClass::findOrFail($id);
$name = $resource->name;
$_SESSION['itemname'] = $name;

// Вызываем событие Before
$modx->invokeEvent(
    $resourceTypeMap[$resourceType]['event_before'],
    array(
        "id" => $id,
    )
);

// Проверяем зависимости
$reverseDeps = findReverseDependencies($name, $id, $resourceType);

// Обработка POST-запроса с выбранными опциями удаления
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deleteMain = isset($_POST['delete_main']) && $_POST['delete_main'] == '1';
    $deleteDeps = isset($_POST['delete_deps']) ? $_POST['delete_deps'] : [];
    
    $deletedDependencies = [];
    $logMessage = '';
    
    // Удаляем выбранные зависимости
    if (!empty($deleteDeps)) {
        $deletedDependencies = deleteDependencies($deleteDeps, $reverseDeps);
    }
    
    // Удаляем основной ресурс, если выбрано
    if ($deleteMain) {
        // Удаляем файлы ресурса
        $deletedFiles = deleteResourceFiles($resource, $resourceType);
        
        // Удаляем сам ресурс
        $modelClass::destroy($id);
        
        // Дополнительные действия для определенных типов ресурсов
        switch ($resourceType) {
            case 'module':
                // Удаляем зависимости модуля
                EvolutionCMS\Models\SiteModuleDepobj::where('module', $id)->delete();
                // Удаляем доступ к модулю для групп пользователей
                EvolutionCMS\Models\SiteModuleAccess::where('module', $id)->delete();
                break;
                
            case 'tv':
                // Удаляем связи TV с шаблонами
                EvolutionCMS\Models\SiteTmplvarTemplate::where('tmplvarid', $id)->delete();
                // Удаляем значения TV для документов
                EvolutionCMS\Models\SiteTmplvarContentvalue::where('tmplvarid', $id)->delete();
                break;
                
            case 'plugin':
                // Удаляем связи плагина с событиями
                EvolutionCMS\Models\SitePluginEvent::where('pluginid', $id)->delete();
                break;
        }
        
        $logMessage = "Ресурс '{$name}' ({$resourceType}) удален";
    } else {
        $logMessage = "Основной ресурс сохранен";
    }
    
    // Добавляем информацию о зависимостях в лог
    if (!empty($deletedDependencies)) {
        $logMessage .= $deleteMain ? " вместе с зависимостями: " : "Удалены зависимости: ";
        $logMessage .= implode(', ', $deletedDependencies);
    }
    
    // Пишем в лог
    $modx->logEvent(0, 2, $logMessage, ucfirst($resourceType) . " Delete Info");

    // Вызываем событие After
    $modx->invokeEvent(
        $resourceTypeMap[$resourceType]['event_after'],
        array(
            "id" => $id,
            "deleted_files" => isset($deletedFiles) ? $deletedFiles : []
        )
    );

    // Очищаем кэш
    $modx->clearCache('full');

    // Перенаправляем
    $header = "Location: " . $resourceTypeMap[$resourceType]['redirect'];
    header($header);
    exit;
}

// Если есть зависимости, показываем форму выбора
$hasDependencies = array_sum(array_map('count', $reverseDeps)) > 0;
$dependencyList = [];
$dependencyCount = 0;

foreach ($reverseDeps as $type => $resources) {
    foreach ($resources as $resource) {
        $dependencyList[] = $resource['type'] . ': ' . $resource['name'];
        $dependencyCount++;
    }
}

if ($hasDependencies) {
    $dependenciesWarning = "Ресурс '{$name}' ({$resourceType}) имеет обратные ссылки в следующих ресурсах:";
    $logMessage = "Ресурс '{$name}' ({$resourceType}) удален, но имеет зависимости: " . implode(', ', $dependencyList);
}

// Показываем форму выбора даже если нет зависимостей, но только для основного ресурса
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>EVO :: Удаление ресурса</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="csrf-token" content="<?php echo csrf_token() ?>">
    <style>
        .warning { color: #856404; background-color: #fff3cd; border-color: #ffeaa7; padding: 10px; border-radius: 5px; margin-bottom: 20px; }
        .dependency-group { margin: 15px 0; padding: 10px; border-left: 3px solid #007bff; background: #f8f9fa; }
        ul { margin-left: 20px; }
        form { margin-top: 20px; }
        button { background-color: #dc3545; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #c82333; }
        .cancel { margin-left: 10px; text-decoration: none; color: #007bff; }
        .cancel:hover { text-decoration: underline; }
        .loading { display: none; margin-left: 10px; }
        .select-all { margin-bottom: 10px; font-weight: bold; }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        const form = document.getElementById('deleteForm');
        const submitBtn = form.querySelector('button[type="submit"]');
        const loading = document.getElementById('loading');
        
        // Обработчик для "Выбрать все"
        const selectAll = document.getElementById('select_all');
        if (selectAll) {
            selectAll.addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('input[name^="delete_deps"]');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });
        }
        
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const deleteMain = document.querySelector('input[name="delete_main"]').checked;
            const anyDepsSelected = document.querySelectorAll('input[name^="delete_deps"]:checked').length > 0;
            
            if (!deleteMain && !anyDepsSelected) {
                alert('Выберите хотя бы один элемент для удаления!');
                return;
            }
            
            if (confirm('Вы уверены, что хотите удалить выбранные элементы?')) {
                submitBtn.disabled = true;
                loading.style.display = 'inline-block';
                
                const formData = new FormData(this);
                formData.append('_token', csrfToken);
                
                fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-Token': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(response => {
                    if (response.status === 403) {
                        throw new Error('Ошибка безопасности. Обновите страницу и попробуйте снова.');
                    }
                    
                    const contentType = response.headers.get('content-type');
                    
                    if (contentType && contentType.includes('application/json')) {
                        return response.json();
                    } else if (response.redirected) {
                        return {
                            success: true,
                            redirect: response.url
                        };
                    } else {
                        return response.text().then(text => {
                            console.log('Non-JSON response:', text);
                            if (response.ok) {
                                return { success: true };
                            }
                            throw new Error('Неожиданный формат ответа от сервера');
                        });
                    }
                })
                .then(data => {
                    console.log('Response data:', data);
                    
                    if (data.success) {
                        window.location.href = data.redirect || 'index.php?a=76';
                    } else {
                        throw new Error(data.message || 'Ошибка при удалении ресурса');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert(error.message || 'Произошла ошибка при удалении ресурса');
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    loading.style.display = 'none';
                });
            }
        });
    });
    </script>
</head>
<body>
<div class="container">
    <h1>Удаление <?php echo $resourceType; ?> "<?php echo $name; ?>"</h1>

    <?php if ($hasDependencies): ?>
    <div class="warning">
        <strong>Внимание!</strong> <?php echo $dependenciesWarning; ?>
    </div>
    <?php endif; ?>

    <form action="" method="post" id="deleteForm">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="type" value="<?php echo $resourceType; ?>">
        
        <p><strong>Выберите, что удалить:</strong></p>
        <input type="checkbox" name="delete_main" value="1" checked id="delete_main"> 
        <label for="delete_main">Удалить основной ресурс "<?php echo $name; ?>"</label><br>

        <?php if ($hasDependencies): ?>
        <hr>
        <p><strong>Зависимости (<?php echo $dependencyCount; ?>):</strong></p>
        
        <div class="select-all">
            <input type="checkbox" id="select_all"> 
            <label for="select_all">Выбрать все зависимости</label>
        </div>

        <?php foreach ($reverseDeps as $type => $resources): ?>
            <?php if (!empty($resources)): ?>
            <div class="dependency-group">
                <h4><?php echo ucfirst($type); ?> (<?php echo count($resources); ?>):</h4>
                <?php foreach ($resources as $index => $resource): ?>
                    <input type="checkbox" name="delete_deps[<?php echo $type; ?>][<?php echo $index; ?>]" 
                           value="<?php echo $resource['id']; ?>" id="dep_<?php echo $type; ?>_<?php echo $index; ?>"> 
                    <label for="dep_<?php echo $type; ?>_<?php echo $index; ?>">
                        <?php echo $resource['name']; ?> 
                        <small>(<?php echo $resource['reason']; ?>)</small>
                    </label><br>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>

        <br>
        <button type="submit">Удалить выбранное</button>
        <span id="loading" class="loading">Загрузка...</span>
        <a class="cancel" href="index.php?a=76">Отмена</a>
    </form>

</div>
</body>
</html>
<?php
// Завершаем выполнение если показываем форму
exit;
?>