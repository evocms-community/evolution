<?php
/*
@TODO:
— auto backup system files
— rollback option for updater
*/

use Illuminate\Support\Facades\Http;

if (!defined('MODX_BASE_PATH')) {
    die('What are you doing? Get out of here!');
}

if (empty($_SESSION['mgrInternalKey'])) {
    return;
}
// get manager role
$role = isset($_SESSION['mgrRole']) ? $_SESSION['mgrRole'] : '';
$user = isset($_SESSION['mgrShortname']) ? $_SESSION['mgrShortname'] : '';
$wdgVisibility = isset($wdgVisibility) ? $wdgVisibility : '';
$ThisRole = isset($ThisRole) ? $ThisRole : '';
$ThisUser = isset($ThisUser) ? $ThisUser : '';
$showButton = isset($showButton) ? $showButton : 'AdminOnly';
$result = '';

if ($role != 1 && $wdgVisibility == 'AdminOnly') {

} else if ($role == 1 && $wdgVisibility == 'AdminExcluded') {

} else if ($role != $ThisRole && $wdgVisibility == 'ThisRoleOnly') {

} else if ($user != $ThisUser && $wdgVisibility == 'ThisUserOnly') {

} else {

    //lang
    $_lang = array();
    $plugin_path = MODX_BASE_PATH . "assets/plugins/updater/";
    include($plugin_path . 'lang/en.php');
    if (file_exists($plugin_path . 'lang/' . evo()->getConfig('manager_language') . '.php')) {
        include($plugin_path . 'lang/' . evo()->getConfig('manager_language') . '.php');
    }

    $e = evo()->event;
    if ($e->name == 'OnSiteRefresh') {
        cache()->store('updater')->flush();
    }

    if ($e->name == 'OnManagerWelcomeHome') {
        $_SESSION['updatelink'] = md5(time());

        $output = '';

        $currentVersion = evo()->getVersionData()['version'];
        $_currentVersion = explode('.', $currentVersion);

        $info = cache()->store('updater')->remember('updatedata', 3600, function() {
            $updateRepository = evo()->getConfig('UpgradeRepository', 'evocms-community/evolution');
            $response = Http::get('https://api.github.com/repos/' . $updateRepository . '/releases');
            if (!$response->successful() || empty($response->json())) {

                return [];
            }
            return $response->json();
        });
        if(empty($info)) return;
        $updateData = [];

        foreach ($info as $item) {
            $_version = explode('.', $item['tag_name']);
            if ($_version[0] !== $_currentVersion[0] || $_version[1] !== $_currentVersion[1]) {
                continue;
            }
            if (strpos($item['tag_name'], 'alpha') !== false || strpos($item['tag_name'],
                    'beta') !== false || strpos($item['tag_name'], 'RC') !== false) {
                continue;
            }
            if (version_compare($currentVersion, $item['tag_name'], '<')) {
                $url = "https://github.com/" . evo()->getConfig('UpgradeRepository', 'evocms-community/evolution') . "/archive/" . $item['tag_name'] . ".zip";
                if(!empty($item['assets'])) {
                    foreach ($item['assets'] as $asset) {
                        if($asset['name'] == 'release.zip') {
                            $url = $asset['browser_download_url'];
                            break;
                        }
                    }
                }
                $updateData = [
                    'version' => $item['tag_name'],
                    'url'     => $url,
                ];
                break;
            }
        }

        if(!empty($updateData)) {
            $_SESSION['updatedata'] = $updateData;
            $role = $_SESSION['mgrRole'];
            if (file_exists(MODX_BASE_PATH.'core/custom/composer.json') || ($role != 1 && $showButton == 'AdminOnly') || $showButton == 'hide') {
                if (file_exists(MODX_BASE_PATH.'core/custom/composer.json')) {
                    $updateButton = '<div class="alert alert-danger" role="alert">'.$_lang['artisan_update'].'</div>';
                }else{
                    $updateButton = '';
                }

            } else {
                $updateButton = '<a target="_parent" onclick="return confirm(\'' . $_lang['are_you_sure_update'] . '\')" href="' . MODX_SITE_URL . $_SESSION['updatelink'] . '" class="btn btn-sm btn-danger">' . $_lang['updateButton_txt'] . ' ' . $updateData['version'] . '</a><br><br>';
            }
            $output = '<div class="card-body">' . $_lang['cms_outdated_msg'] . ' <strong>' . $updateData['version'] . '</strong> <br><br>
                ' . $updateButton . '
                <small style="color:red;font-size:10px"> ' . $_lang['bkp_before_msg'] . '</small>';

            $widgets['updater'] = array(
                'menuindex' => '1',
                'id' => 'updater',
                'cols' => 'col-sm-12',
                'icon' => 'fa-exclamation-triangle',
                'title' => $_lang['system_update'],
                'body' => $output
            );

            $e->output(serialize($widgets));
        }
    }

    if ($e->name == 'OnPageNotFound' && isset($_GET['q'])) {
        if (empty($_SESSION['mgrInternalKey']) || empty($_SESSION['updatelink']) || empty($_SESSION['updatedata'])) {
            return;
        }
        if ($_GET['q'] == $_SESSION['updatelink']) {
           file_put_contents(MODX_BASE_PATH . 'update.php', '<?php
function downloadFile(
    $url,
    $path
) {
    $newfname = $path;
    $newf = null;
    try {
            $file = fopen($newfname, "w");
            $ch = curl_init();
            if($file === false || $ch === false){
                throw new Exception("Failed to download update.");
            }
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FILE, $file);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_exec($ch);
            $error = curl_error($ch);
            curl_close($ch);
            fclose($file);
            if($error) {
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
    $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
    foreach ($objects as $name => $object) {

        $startsAt = substr(dirname($name), strlen($path));
        mmkDir($dest . $startsAt);
        if ($object->isDir()) {
            mmkDir($dest . substr($name, strlen($path)));
        }

        if (is_writable($dest . $startsAt) and $object->isFile()) {
            copy((string)$name, $dest . $startsAt . DIRECTORY_SEPARATOR . basename($name));
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

$url = "' . $_SESSION['updatedata']['url'] . '";

downloadFile($url, "evo.zip");
$zip = new ZipArchive;
if(!$zip->open(__DIR__ . "/evo.zip") || !$zip->extractTo(__DIR__ . "/temp") || !$zip->close()) {
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
    // echo __DIR__."/temp/".$dir."/".MGR_DIR;
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
header("Location: ' . MODX_SITE_URL . 'install/index.php?action=mode");');
            if ($result === false) {
                echo 'Update failed: cannot write to ' . MODX_BASE_PATH . 'update.php';
            } else {
                $version = $_SESSION['updatedata']['version'];
                echo '<html><head></head><body><h2>Evolution Updater</h2>
                  <p>Downloading version: <strong>' . $version . '</strong>.</p>
                  <p>You will be redirected to the update wizard shortly.</p>
                  <p>Please wait...</p>
                  <script>window.location = "' . MODX_SITE_URL . 'update.php?version=' . $version . '";</script>
                  </body></html>';
            }
            die();
        }
    }
}
