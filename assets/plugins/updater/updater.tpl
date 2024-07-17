<?php
function downloadFile(
    $url,
    $path
) {
    $newfname = $path;
    try {
        $file = fopen($newfname, "w");
        $ch = curl_init();
        if ($file === false || $ch === false) {
            throw new Exception("Failed to download update.");
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FILE, $file);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        fclose($file);
        if ($error) {
            throw new Exception("Failed to download update.");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

function removeFolder($path)
{
    $dir = realpath($path);
    if (!is_dir($dir)) {
        return;
    }

    $it = new RecursiveDirectoryIterator($dir);
    $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($files as $file) {
        if ($file->getFilename() === "." || $file->getFilename() === "..") {
            continue;
        }
        if ($file->isDir()) {
            rmdir($file->getRealPath());
        } else {
            unlink($file->getRealPath());
        }
    }
    rmdir($dir);
}

function copyFolder(
    $src,
    $dest
) {
    $path = realpath($src);
    $dest = realpath($dest);
    $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path),
        RecursiveIteratorIterator::SELF_FIRST);
    foreach ($objects as $name => $object) {

        $startsAt = substr(dirname($name), strlen($path));
        mmkDir($dest . $startsAt);
        if ($object->isDir()) {
            mmkDir($dest . substr($name, strlen($path)));
        }

        if (is_writable($dest . $startsAt) and $object->isFile()) {
            copy((string) $name, $dest . $startsAt . DIRECTORY_SEPARATOR . basename($name));
        }
    }
}

function mmkDir(
    $folder,
    $perm = 0777
) {
    if (!is_dir($folder)) {
        mkdir($folder, $perm);
    }
}

$url = "[+update_url+]";

downloadFile($url, "evo.zip");
$zip = new ZipArchive;
if (!$zip->open(__DIR__ . "/evo.zip") || !$zip->extractTo(__DIR__ . "/temp") || !$zip->close()) {
    echo "Failed to download update.";
    unlink(__DIR__ . "/evo.zip");
    exit;
}

if ($handle = opendir(__DIR__ . "/temp")) {
    while (false !== ($name = readdir($handle))) {
        if ($name != "." && $name != "..") {
            $dir = $name;
        }
    }
    closedir($handle);
}
removeFolder(__DIR__ . "/temp/" . $dir . "/install/assets/chunks");
removeFolder(__DIR__ . "/temp/" . $dir . "/install/assets/tvs");
removeFolder(__DIR__ . "/temp/" . $dir . "/install/assets/templates");
unlink(__DIR__ . "/temp/" . $dir . "/ht.access");
unlink(__DIR__ . "/temp/" . $dir . "/README.md");
unlink(__DIR__ . "/temp/" . $dir . "/sample-robots.txt");
unlink(__DIR__ . "/temp/" . $dir . "/composer.json");

if (is_file(__DIR__ . "/assets/cache/siteManager.php")) {

    unlink(__DIR__ . "/temp/" . $dir . "/assets/cache/siteManager.php");
    include_once(__DIR__ . "/assets/cache/siteManager.php");
    if (!defined("MGR_DIR")) {
        define("MGR_DIR", "manager");
    }
    if (MGR_DIR != "manager") {
        mmkDir(__DIR__ . "/temp/" . $dir . "/" . MGR_DIR);
        copyFolder(__DIR__ . "/temp/" . $dir . "/manager", __DIR__ . "/temp/" . $dir . "/" . MGR_DIR);
        removeFolder(__DIR__ . "/temp/" . $dir . "/manager");
    }
}
removeFolder(__DIR__ . "/core/vendor/");
removeFolder(__DIR__ . "/core/database/");
removeFolder(__DIR__ . "/core/factory/");
removeFolder(__DIR__ . "/core/functions/");
removeFolder(__DIR__ . "/core/includes/");
removeFolder(__DIR__ . "/core/lang/");
removeFolder(__DIR__ . "/core/modifiers/");
removeFolder(__DIR__ . "/core/src/");
removeFolder(__DIR__ . "/core/storage/");
copyFolder(__DIR__ . "/temp/" . $dir, __DIR__ . "/");
removeFolder(__DIR__ . "/temp");
unlink(__DIR__ . "/evo.zip");
unlink(__DIR__ . "/update.php");
header("Location: [+site_url+]install/index.php?action=mode");
