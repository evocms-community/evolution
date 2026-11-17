<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

 
 

// load version
if (!isset($moduleVersion) && file_exists('../' . MGR_DIR . '/includes/version.inc.php')) {
    require_once '../' . MGR_DIR . '/includes/version.inc.php';
    $moduleName = 'Evolution CMS';
    $moduleVersion = $modx_branch . ' ' . $modx_version;
}

// create placeholders
$ph = array_merge(ph(), $_lang);
 
 
$ph['link_install_now'] = $ph['install_now'];
$ph['module_name'] = $moduleName;
$ph['module_version'] = $moduleVersion;
$ph['language_code'] = $install_language || 'en';
 
 

header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Status: 503 Service Temporarily Unavailable');
header('Retry-After: 3600');
header('Content-Type: text/html; charset=utf-8');


$tplPath = __DIR__ . '/../template/not_installed.tpl';
if (file_exists($tplPath)) {
    $tpl = file_get_contents($tplPath);
    echo parse($tpl, $ph);
} else {
    // fallback
    echo '<h3>System not installed</h3><p><a href="install/">Run installer</a></p>';
}
exit;
