<?php

/**
 * Installer remover processor
 * --------------------------------
 * This little script will be used by the installer to remove
 * the install folder from the web root after an install. Having
 * the install folder present after an install is considered a
 * security risk
 *
 * This file is mormally called from the installer
 *
 */
if (!function_exists('rmdirRecursive')) {
    /**
     * rmdirRecursive - detects symbollic links on unix
     *
     * @param string $path
     * @param bool $followLinks
     *
     * @return bool
     */
    function rmdirRecursive(string $path, bool $followLinks = false): bool
    {
        $dir = opendir($path);
        while ($entry = readdir($dir)) {
            $pathEntry = $path . '/' . $entry;
            if (is_file($pathEntry) || ((!$followLinks) && is_link($pathEntry))) {
                @unlink($pathEntry);
            } elseif (is_dir($pathEntry) && $entry !== '.' && $entry !== '..') {
                rmdirRecursive($pathEntry); // recursive
            }
        }
        closedir($dir);

        return @rmdir($path);
    }
}

$msg = '';
$pth = dirname(__DIR__, 2) . '/install/';
$pth = str_replace('\\', '/', $pth);

if (isset($_GET['rminstall'])) {
    if (is_dir($pth)) {
        if (!rmdirRecursive($pth)) {
            $msg = 'An error occured while attempting to remove the install folder';
        }
    }
}
if ($msg) {
    echo "<script>alert('" . addslashes($msg) . "');</script>";
}

echo "<script>window.location='../#?a=2';</script>";
