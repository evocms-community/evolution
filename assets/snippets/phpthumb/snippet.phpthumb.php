<?php
use WebPConvert\WebPConvert;

if (!defined('MODX_BASE_PATH')) {
    die('What are you doing? Get out of here!');
}

$newFolderAccessMode = $modx->getConfig('new_folder_permissions');
$newFolderAccessMode = empty($new) ? 0777 : octdec($newFolderAccessMode);

$defaultCacheFolder = 'assets/cache/';
$cacheFolder = isset($cacheFolder) ? $cacheFolder : $defaultCacheFolder . 'images';
$phpThumbPath = isset($phpThumbPath) ? $phpThumbPath : 'assets/snippets/phpthumb/';

/**
 * @see: https://github.com/kalessil/phpinspectionsea/blob/master/docs/probable-bugs.md#mkdir-race-condition
 */
$path = MODX_BASE_PATH . $cacheFolder;
if (!file_exists($path) && mkdir($path) && is_dir($path)) {
    chmod($path, $newFolderAccessMode);
}

if (!empty($input)) {
    $input = rawurldecode($input);
}

if (empty($input) || !file_exists(MODX_BASE_PATH . $input)) {
    $input = isset($noImage) ? $noImage : $phpThumbPath . 'noimage.svg';
}

/**
 * allow read in phpthumb cache folder
 */
if (!file_exists(MODX_BASE_PATH . $cacheFolder . '/.htaccess') &&
    $cacheFolder !== $defaultCacheFolder &&
    strpos($cacheFolder, $defaultCacheFolder) === 0
) {
    file_put_contents(MODX_BASE_PATH . $cacheFolder . '/.htaccess', "<ifModule mod_authz_core.c>\nRequire all granted\n</ifModule>\n<ifModule !mod_authz_core.c>\norder deny,allow\nallow from all\n</ifModule>\n");
}

$path_parts = pathinfo($input);
$tmpImagesFolder = str_replace('assets/images', '', $path_parts['dirname']);
$tmpImagesFolder = explode('/', $tmpImagesFolder);
$ext = strtolower($path_parts['extension']);

if($ext == 'svg') return $input;

$options = 'f=' . (in_array($ext, array('png', 'gif', 'jpeg')) ? $ext : 'jpg&q=85') . '&' .
    strtr($options, array(',' => '&', '_' => '=', '{' => '[', '}' => ']'));

parse_str($options, $params);
foreach ($tmpImagesFolder as $folder) {
    if (!empty($folder)) {
        $cacheFolder .= '/' . $folder;
        $path = MODX_BASE_PATH . $cacheFolder;
        if (!file_exists($path) && mkdir($path) && is_dir($path)) {
            chmod($path, $newFolderAccessMode);
        }
    }
}

$fNamePref = rtrim($cacheFolder, '/') . '/';
$fName = $path_parts['filename'];
$fNameSuf = '-' .
    (isset($params['w']) ? $params['w'] : '') . 'x' . (isset($params['h']) ? $params['h'] : '') . '-' .
    substr(md5(serialize($params) . filemtime(MODX_BASE_PATH . $input)), 0, 3) .
    '.' . $params['f'];

if (isset($adBlockFix) && $adBlockFix === '1')
    $fNameSuf = str_replace('ad', 'at', $fNameSuf);

$outputFilename = MODX_BASE_PATH . $fNamePref . $fName . $fNameSuf;
if (!file_exists($outputFilename)) {
    if (!class_exists('phpthumb')) {
        require_once MODX_BASE_PATH . $phpThumbPath . '/vendor/autoload.php';
    }
    $phpThumb = new phpthumb();
    $phpThumb->config_cache_directory = MODX_BASE_PATH . $defaultCacheFolder;
    $phpThumb->config_temp_directory = $defaultCacheFolder;
    $phpThumb->config_document_root = MODX_BASE_PATH;
    $phpThumb->setSourceFilename(MODX_BASE_PATH . $input);
    foreach ($params as $key => $value) {
        $phpThumb->setParameter($key, $value);
    }
    if ($phpThumb->GenerateThumbnail()) {
        $phpThumb->RenderToFile($outputFilename);
    } else {
        $modx->logEvent(0, 3, implode('<br/>', $phpThumb->debugmessages), 'phpthumb');
    }
}

if (isset($webp) && class_exists('\WebPConvert\WebPConvert')) {
    if( isset( $_SERVER['HTTP_ACCEPT'] ) && strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false && pathinfo($outputFilename, PATHINFO_EXTENSION) != 'gif') {
        if (file_exists($outputFilename . '.webp')) {
            $fNameSuf .= '.webp';
        } else {
            WebPConvert::convert($outputFilename, $outputFilename . '.webp', ['quality' => 90]);
            $fNameSuf .= '.webp';
        }
    }
}

return $fNamePref . rawurlencode($fName) . $fNameSuf;
