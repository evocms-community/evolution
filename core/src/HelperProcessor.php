<?php

namespace EvolutionCMS;

use PHPMailer\PHPMailer\Exception;
use phpthumb;
use WebPConvert\Convert\Exceptions\ConversionFailedException;
use WebPConvert\WebPConvert;

class HelperProcessor
{
    /**
     * @var Interfaces\CoreInterface
     */
    protected Interfaces\CoreInterface $core;

    public function __construct(Interfaces\CoreInterface $core)
    {
        $this->core = $core;
    }

    protected function makeFilename($pathinfo, $params)
    {
        return $pathinfo['filename'];
    }

    protected function makeFilePath($newFilename, $pathinfo, $params): array | string
    {
        return str_replace('assets/images', '', $pathinfo['dirname']);
    }

    /**
     * @param string $input
     * @param string $options
     * @param bool|array $params boolean value here means webp = true or false for backward compatibility
     *
     * @return string
     * @throws ConversionFailedException
     * @throws Exception
     */
    public function phpThumb($input = '', $options = '', $params = true)
    {
        if (is_bool($params)) {
            $params = ['webp' => $params];
        } elseif (!is_array($params)) {
            $params = ['webp' => true];
        }

        $newFolderAccessMode = $this->core->getConfig('new_folder_permissions');
        $newFolderAccessMode = empty($newFolderAccessMode) ? 0777 : octdec($newFolderAccessMode);

        $defaultCacheFolder = 'assets/cache/';
        $cacheFolder = $params['cacheFolder'] ?? ($defaultCacheFolder . 'images');

        $phpThumbNoImagePath = $params['phpThumbNoImagePath'] ?? 'assets/snippets/phpthumb/';
        $params['noImage'] = $params['noImage'] ?? ($phpThumbNoImagePath . 'noimage.svg');

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
            $input = $params['noImage'];
        }

        /**
         * allow read in phpthumb cache folder
         */
        if (!file_exists(MODX_BASE_PATH . $cacheFolder . '/.htaccess') &&
            $cacheFolder !== $defaultCacheFolder &&
            str_starts_with($cacheFolder, $defaultCacheFolder)
        ) {
            file_put_contents(
                MODX_BASE_PATH . $cacheFolder . '/.htaccess',
                "<ifModule mod_authz_core.c>\nRequire all granted\n</ifModule>\n<ifModule !mod_authz_core.c>\norder deny,allow\nallow from all\n</ifModule>\n"
            );
        }

        $path_parts = pathinfo($input);
        $ext = strtolower($path_parts['extension']);

        if ($ext == 'svg') {
            return $input;
        }

        $options = 'f=' . (in_array($ext, ['png', 'gif', 'jpeg']) ? $ext : 'jpg&q=85') . '&' .
            strtr($options, [',' => '&', '_' => '=', '{' => '[', '}' => ']']);

        parse_str($options, $params);

        $fName = $this->makeFilename($path_parts, $params);

        $tmpImagesFolder = $this->makeFilePath($fName, $path_parts, $params);
        $tmpImagesFolder = explode('/', $tmpImagesFolder);

        foreach ($tmpImagesFolder as $folder) {
            if (!empty($folder)) {
                $cacheFolder .= '/' . $folder;
                $path = MODX_BASE_PATH . $cacheFolder;
                if (!file_exists($path) && mkdir($path) && is_dir($path)) {
                    chmod($path, $newFolderAccessMode);
                }
            }
        }

        $fmtime = '';
        if (isset($filemtime)) {
            $fmtime = filemtime(MODX_BASE_PATH . $input);
        }

        $fNamePref = rtrim($cacheFolder, '/') . '/';
        $fNameSuf = '-' .
            ($params['w'] ?? '') . 'x' . ($params['h'] ?? '') . '-' .
            substr(md5(serialize($params) . $fmtime), 0, 3) .
            '.' . $params['f'];

        $fNameSuf = str_replace("ad", "at", $fNameSuf);

        $outputFilename = MODX_BASE_PATH . $fNamePref . $fName . $fNameSuf;
        if (!file_exists($outputFilename)) {
            $phpThumb = new phpthumb();
            $phpThumb->setParameter('config_cache_directory', MODX_BASE_PATH . $defaultCacheFolder);
            $phpThumb->setParameter('config_temp_directory', MODX_BASE_PATH . $defaultCacheFolder);
            $phpThumb->setParameter('config_document_root', MODX_BASE_PATH);
            $phpThumb->setCacheDirectory();
            $phpThumb->setSourceFilename(MODX_BASE_PATH . $input);
            foreach ($params as $key => $value) {
                $phpThumb->setParameter($key, $value);
            }
            if ($phpThumb->GenerateThumbnail()) {
                $phpThumb->RenderToFile($outputFilename);
            } else {
                $this->core->logEvent(0, 3, implode('<br/>', $phpThumb->debugmessages), 'phpthumb');
            }
        }

        if (isset($params['webp']) && $params['webp'] && class_exists('\WebPConvert\WebPConvert')) {
            if (isset($_SERVER['HTTP_ACCEPT']) && str_contains($_SERVER['HTTP_ACCEPT'], 'image/webp') &&
                pathinfo($outputFilename, PATHINFO_EXTENSION) != 'gif'
            ) {
                if (!file_exists($outputFilename . '.webp')) {
                    WebPConvert::convert($outputFilename, $outputFilename . '.webp');
                }
                $fNameSuf .= '.webp';
            }
        }

        return $fNamePref . rawurlencode($fName) . $fNameSuf;
    }
}
