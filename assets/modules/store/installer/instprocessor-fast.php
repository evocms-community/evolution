<?php
if( ! defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true || ! $modx->hasPermission('exec_module')) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}

error_reporting(E_ALL & ~E_NOTICE);
define('MGR',MODX_BASE_PATH.MGR_DIR);
$moduleurl = 'assets/modules/store/installer/index.php';
$modulePath = dirname(__FILE__);
$self = $modulePath.'/index.php';
require_once($modulePath."/functions.php");

$_lang = array();
$_params = array();
require_once($modulePath."/lang/russian-UTF8.inc.php");

// start session
//session_start();
$_SESSION['test'] = 1;
install_sessionCheck();
$moduleName = "MODX";
include MODX_MANAGER_PATH . 'includes/version.inc.php';
$moduleVersion = $modx_branch.' '.$modx_version;
$moduleRelease = $modx_release_date;
$moduleSQLBaseFile = "setup.sql";
$moduleSQLDataFile = "setup.data.sql";
$installPath = MODX_BASE_PATH .'assets/cache/store/install';
if (is_file($installPath.'/'.$moduleSQLBaseFile)){ $moduleSQLDataFile = $moduleSQLBaseFile; }

$moduleChunks = array (); // chunks - array : name, description, type - 0:file or 1:content, file or content
$moduleTemplates = array (); // templates - array : name, description, type - 0:file or 1:content, file or content
$moduleSnippets = array (); // snippets - array : name, description, type - 0:file or 1:content, file or content,properties
$modulePlugins = array (); // plugins - array : name, description, type - 0:file or 1:content, file or content,properties, events,guid
$moduleModules = array (); // modules - array : name, description, type - 0:file or 1:content, file or content,properties, guid
$moduleTemplates = array (); // templates - array : name, description, type - 0:file or 1:content, file or content,properties
$moduleTVs = array (); // template variables - array : name, description, type - 0:file or 1:content, file or content,properties

$errors= 0;

// PHP8: valore del docblock come stringa ('' se manca o è null)
$instStr = function ($arr, $i) {
    return (isset($arr[$i]) && !is_array($arr[$i])) ? (string)$arr[$i] : '';
};
// PHP8: valore del docblock come array (installset: può mancare o essere false)
$instArr = function ($arr, $i) {
    return (isset($arr[$i]) && is_array($arr[$i])) ? $arr[$i] : array();
};
// PHP8: sostituisce mysql_error(), rimossa in PHP 7
$instDbError = function () use ($modx) {
    if (isset($modx->db->conn) && $modx->db->conn instanceof mysqli && $modx->db->conn->error !== '') {
        return htmlspecialchars($modx->db->conn->error, ENT_QUOTES, 'UTF-8');
    }
    return 'SQL error';
};

// get post back status
$isPostBack = (count($_POST));

$_POST['installmode'] = 1;
//$_POST['installdata'] = 0;
$sqlParser = '';
$create = false;

// set timout limit
@ set_time_limit(120); // used @ to prevent warning when using safe mode?


$installMode= (int)$_POST['installmode'];
$installData = 1;

// set session name variable
if (!isset ($site_sessionname)) {
    $site_sessionname = 'SN' . uniqid('');
}

// get base path and url
$a = explode("install", str_replace("\\", "/", dirname($_SERVER["PHP_SELF"])));
if (count($a) > 1)
    array_pop($a);
$url = implode("install", $a);
reset($a);
$a = explode("install", str_replace("\\", "/", realpath(dirname(__FILE__))));
if (count($a) > 1)
    array_pop($a);
$pth = implode("install", $a);
unset ($a);
$base_url = $url . (substr($url, -1) != "/" ? "/" : "");
$base_path = $pth . (substr($pth, -1) != "/" ? "/" : "");


if(!function_exists('parseProperties')) {
    // parses a resource property string and returns the result as an array
    // duplicate of method in documentParser class
    // (non viene mai eseguita: parseProperties() è dichiarata in fondo al file)
    function parseProperties($propertyString) {
        $parameter= array ();
        if (!empty ($propertyString)) {
            $tmpParams= explode("&", $propertyString);
            for ($x= 0; $x < count($tmpParams); $x++) {
                if (strpos($tmpParams[$x], '=', 0)) {
                    $pTmp= explode("=", $tmpParams[$x]);
                    $pvTmp= explode(";", trim($pTmp[1]));
                    if ($pvTmp[1] == 'list' && $pvTmp[3] != "")
                        $parameter[trim($pTmp[0])]= $pvTmp[3]; //list default
                    else
                        if ($pvTmp[1] != 'list' && $pvTmp[2] != "")
                            $parameter[trim($pTmp[0])]= $pvTmp[2];
                }
            }
        }
        return $parameter;
    }
}
$table_prefix = $modx->db->config['table_prefix'];
$setupPath = $modulePath;
include "{$setupPath}/setup.info.php";
include "sqlParser.class.php";
$sqlParser = new SqlParser();
$sqlParser->mode = "upd";
$sqlParser->ignoreDuplicateErrors = true;

// Install Templates
if ( count($moduleTemplates )>0) {
    echo "<h3>" . $_lang['templates'] . ":</h3> ";
    $selTemplates = isset($_POST['template']) ? (array)$_POST['template'] : array();
    foreach ($moduleTemplates as $k=>$moduleTemplate) {
        $installSample = in_array('sample', $instArr($moduleTemplate, 6)) && $installData == 1;
      //  if(in_array($k, $selTemplates) || $installSample) {
            $name = $modx->db->escape($instStr($moduleTemplate, 0));
            $desc = $modx->db->escape($instStr($moduleTemplate, 1));
            $categoryName = $instStr($moduleTemplate, 4);
            $locked = (int)$instStr($moduleTemplate, 5);
            $filecontent = $instStr($moduleTemplate, 3);
            if ($filecontent === '' || !file_exists($filecontent)) {
                echo "<p>&nbsp;&nbsp;$name: <span class=\"notok\">" . $_lang['unable_install_template'] . " '$filecontent' " . $_lang['not_found'] . ".</span></p>";
            } else {
                // Create the category if it does not already exist
                $category_id = getCreateDbCategory($categoryName, $sqlParser);

                // Strip the first comment up top
                $template = preg_replace("/^.*?\/\*\*.*?\*\/\s+/s", '', file_get_contents($filecontent), 1);
                $template = $modx->db->escape((string)$template);

                // See if the template already exists
                $rs = $modx->db->query("SELECT * FROM `" . $table_prefix . "site_templates` WHERE templatename='$name'");

                if ($modx->db->getRecordCount($rs)) {
                    if (!@ $modx->db->query("UPDATE `" . $table_prefix . "site_templates` SET content='$template', description='$desc', category='$category_id', locked='$locked'  WHERE templatename='$name';")) {
                        $errors += 1;
                        echo "<p>" . $instDbError() . "</p>";
                        return;
                    }
                    echo "<p>&nbsp;&nbsp;$name: <span class=\"ok\">" . $_lang['upgraded'] . "</span></p>";
                } else {
                    if (!@ $modx->db->query("INSERT INTO `" . $table_prefix . "site_templates` (templatename,description,content,category,locked) VALUES('$name','$desc','$template','$category_id','$locked');")) {
                        $errors += 1;
                        echo "<p>" . $instDbError() . "</p>";
                        return;
                    }
                    echo "<p>&nbsp;&nbsp;$name: <span class=\"ok\">" . $_lang['installed'] . "</span></p>";
                }
            }
        //}
    }
}

// Install Template Variables
if (count($moduleTVs )>0) {
    echo "<h3>" . $_lang['tvs'] . ":</h3> ";
    $selTVs = isset($_POST['tv']) ? (array)$_POST['tv'] : array();
    foreach ($moduleTVs as $k=>$moduleTV) {
        $installSample = in_array('sample', $instArr($moduleTV, 12)) && $installData == 1;
        //if(in_array($k, $selTVs) || $installSample) {
            $name = $modx->db->escape($instStr($moduleTV, 0));
            $caption = $modx->db->escape($instStr($moduleTV, 1));
            $desc = $modx->db->escape($instStr($moduleTV, 2));
            $input_type = $modx->db->escape($instStr($moduleTV, 3));
            $input_options = $modx->db->escape($instStr($moduleTV, 4));
            $input_default = $modx->db->escape($instStr($moduleTV, 5));
            $output_widget = $modx->db->escape($instStr($moduleTV, 6));
            $output_widget_params = $modx->db->escape($instStr($moduleTV, 7));
            $filecontent = $instStr($moduleTV, 8);
            $assignments = $instStr($moduleTV, 9);
            $categoryName = $instStr($moduleTV, 10);
            $locked = (int)$instStr($moduleTV, 11);


            // Create the category if it does not already exist
            $category = getCreateDbCategory($categoryName, $sqlParser);

            $rs = $modx->db->query("SELECT * FROM `" . $table_prefix . "site_tmplvars` WHERE name='$name'");
            if ($modx->db->getRecordCount($rs)) {
                $insert = true;
                while($row = $modx->db->getRow($rs,'assoc')) {
                    if (!@ $modx->db->query("UPDATE `" . $table_prefix . "site_tmplvars` SET type='$input_type', caption='$caption', description='$desc', category='$category', locked='$locked', elements='$input_options', display='$output_widget', display_params='$output_widget_params', default_text='$input_default' WHERE id='{$row['id']}';")) {
                        echo "<p>" . $instDbError() . "</p>";
                        return;
                    }
                    $insert = false;
                }
                echo "<p>&nbsp;&nbsp;$name: <span class=\"ok\">" . $_lang['upgraded'] . "</span></p>";
            } else {
                //$q = "INSERT INTO `" . $table_prefix . "site_tmplvars` (type,name,caption,description,category,locked,elements,display,display_params,default_text) VALUES('$input_type','$name','$caption','$desc',(SELECT (CASE COUNT(*) WHEN 0 THEN 0 ELSE `id` END) `id` FROM `" . $table_prefix . "categories` WHERE `category` = '$category'),$locked,'$input_options','$output_widget','$output_widget_params','$input_default');";
                $q = "INSERT INTO `" . $table_prefix . "site_tmplvars` (type,name,caption,description,category,locked,elements,display,display_params,default_text) VALUES('$input_type','$name','$caption','$desc','$category','$locked','$input_options','$output_widget','$output_widget_params','$input_default');";
                if (!@ $modx->db->query($q)) {
                    echo "<p>" . $instDbError() . "</p>";
                    return;
                }
                echo "<p>&nbsp;&nbsp;$name: <span class=\"ok\">" . $_lang['installed'] . "</span></p>";
            }

            // add template assignments
            $assignments = array_filter(array_map('trim', explode(',', $assignments)), 'strlen');
            if (count($assignments) > 0) {

                $ds = $modx->db->query("SELECT id FROM `".$table_prefix."site_tmplvars` WHERE name='$name' AND description='$desc';",$sqlParser->conn);
                $row = $ds ? $modx->db->getRow($ds,'assoc') : false;
                $id = is_array($row) ? (int)$row['id'] : 0;

                if ($id > 0) {
                    // remove existing tv -> template assignments
                    // (prima: 'DELETE FROM ' . $dbase . '.`…`' con $dbase non definita → errore SQL)
                    $modx->db->query("DELETE FROM `" . $table_prefix . "site_tmplvar_templates` WHERE tmplvarid = '" . $id . "'");

                    // add tv -> template assignments ("*" = tutti i template)
                    foreach ($assignments as $assignment) {
                        $template = $modx->db->escape($assignment);
                        $where = ($template == '*') ? '' : "WHERE templatename='$template'";
                        $ts = $modx->db->query("SELECT id FROM `".$table_prefix."site_templates` ".$where.";" );
                        if ($ts) {
                            while ($tRow = $modx->db->getRow($ts,'assoc')) {
                                $templateId = (int)$tRow['id'];
                                $modx->db->query("INSERT IGNORE INTO `" . $table_prefix . "site_tmplvar_templates` (tmplvarid, templateid) VALUES('$id', '$templateId')");
                            }
                        }
                    }
                }
            }
        //}
    }
}

// Install Chunks
if (count($moduleChunks )>0) {
    echo "<h3>" . $_lang['chunks'] . ":</h3> ";
    $selChunks = isset($_POST['chunk']) ? (array)$_POST['chunk'] : array();
    foreach ($moduleChunks as $k=>$moduleChunk) {
        $installSample = in_array('sample', $instArr($moduleChunk, 5)) && $installData == 1;
        //if(in_array($k, $selChunks) || $installSample) {

            $name = $modx->db->escape($instStr($moduleChunk, 0));
            $desc = $modx->db->escape($instStr($moduleChunk, 1));
            $categoryName = $instStr($moduleChunk, 3);
            $overwrite = $modx->db->escape($instStr($moduleChunk, 4));
            $filecontent = $instStr($moduleChunk, 2);

            if ($filecontent === '' || !file_exists($filecontent))
                echo "<p>&nbsp;&nbsp;$name: <span class=\"notok\">" . $_lang['unable_install_chunk'] . " '$filecontent' " . $_lang['not_found'] . ".</span></p>";
            else {

                // Create the category if it does not already exist
                $category_id = getCreateDbCategory($categoryName, $sqlParser);

                $chunk = preg_replace("/^.*?\/\*\*.*?\*\/\s+/s", '', file_get_contents($filecontent), 1);
                $chunk = $modx->db->escape((string)$chunk);
                $rs = $modx->db->query("SELECT * FROM `" . $table_prefix . "site_htmlsnippets` WHERE name='$name'");
                $count_original_name = $modx->db->getRecordCount($rs);
                $count_new_name = 0;
                if($overwrite == 'false') {
                    $newname = $name . '-' . str_replace('.', '_', $modx_version);
                    $rs = $modx->db->query("SELECT * FROM `" . $table_prefix . "site_htmlsnippets` WHERE name='$newname'");
                    $count_new_name = $modx->db->getRecordCount($rs);
                }
                $update = $count_original_name > 0 && $overwrite == 'true';
                if ($update) {
                    if (!@ $modx->db->query("UPDATE `" . $table_prefix . "site_htmlsnippets` SET snippet='$chunk', description='$desc', category='$category_id' WHERE name='$name';")) {
                        $errors += 1;
                        echo "<p>" . $instDbError() . "</p>";
                        return;
                    }
                    echo "<p>&nbsp;&nbsp;$name: <span class=\"ok\">" . $_lang['upgraded'] . "</span></p>";
                } elseif($count_new_name == 0) {
                    if($count_original_name > 0 && $overwrite == 'false') {
                        $name = $newname;
                    }
                    if (!@ $modx->db->query("INSERT INTO `" . $table_prefix . "site_htmlsnippets` (name,description,snippet,category) VALUES('$name','$desc','$chunk','$category_id');")) {
                        $errors += 1;
                        echo "<p>" . $instDbError() . "</p>";
                        return;
                    }
                    echo "<p>&nbsp;&nbsp;$name: <span class=\"ok\">" . $_lang['installed'] . "</span></p>";
                }
            }
        //}
    }
}

// Install Modules
if (count($moduleModules )>0) {
    echo "<h3>" . $_lang['modules'] . ":</h3> ";
    $selModules = isset($_POST['module']) ? (array)$_POST['module'] : array();
    foreach ($moduleModules as $k=>$moduleModule) {
        $installSample = in_array('sample', $instArr($moduleModule, 7)) && $installData == 1;
        //if(in_array($k, $selModules) || $installSample) {
            $name = $modx->db->escape($instStr($moduleModule, 0));
            $desc = $modx->db->escape($instStr($moduleModule, 1));
            $filecontent = $instStr($moduleModule, 2);
            $properties = $instStr($moduleModule, 3);
            $guid = $modx->db->escape($instStr($moduleModule, 4));
            $shared = (int)$instStr($moduleModule, 5);
            $categoryName = $instStr($moduleModule, 6);
            if ($filecontent === '' || !file_exists($filecontent))
                echo "<p>&nbsp;&nbsp;$name: <span class=\"notok\">" . $_lang['unable_install_module'] . " '$filecontent' " . $_lang['not_found'] . ".</span></p>";
            else {

                // Create the category if it does not already exist
                $category = getCreateDbCategory($categoryName, $sqlParser);
                $tmp = preg_split("/(\/\/)?\s*\<\?php/", file_get_contents($filecontent), 2);
                $module = end($tmp);
                // remove installer docblock
                $module = preg_replace("/^.*?\/\*\*.*?\*\/\s+/s", '', $module, 1);
                $module = $modx->db->escape((string)$module);
                $rs = $modx->db->query("SELECT * FROM `" . $table_prefix . "site_modules` WHERE name='$name'");
                if ($modx->db->getRecordCount($rs)) {
                    $row = $modx->db->getRow($rs,'assoc');
                    $props = $modx->db->escape(propUpdate($properties, (string)$row['properties']));
                    if (!@ $modx->db->query("UPDATE `" . $table_prefix . "site_modules` SET modulecode='$module', description='$desc', properties='$props', enable_sharedparams='$shared' WHERE name='$name';")) {
                        echo "<p>" . $instDbError() . "</p>";
                        return;
                    }
                    echo "<p>&nbsp;&nbsp;$name: <span class=\"ok\">" . $_lang['upgraded'] . "</span></p>";
                } else {
                    $properties = $modx->db->escape((string)parseProperties($properties, true));
                    if (!@ $modx->db->query("INSERT INTO `" . $table_prefix . "site_modules` (name,description,modulecode,properties,guid,enable_sharedparams,category) VALUES('$name','$desc','$module','$properties','$guid','$shared', '$category');")) {
                        echo "<p>" . $instDbError() . "</p>";
                        return;
                    }
                    echo "<p>&nbsp;&nbsp;$name: <span class=\"ok\">" . $_lang['installed'] . "</span></p>";
                }
            }
        //}
    }
}

// Install Plugins
if (count($modulePlugins )>0) {
    echo "<h3>" . $_lang['plugins'] . ":</h3> ";
    foreach ($modulePlugins as $k=>$modulePlugin) {
        $installSample = in_array('sample', $instArr($modulePlugin, 8)) && $installData == 1;
       // if(in_array($k, $selPlugs) || $installSample) {
            $descRaw = $instStr($modulePlugin, 1);
            $name = $modx->db->escape($instStr($modulePlugin, 0));
            $desc = $modx->db->escape($descRaw);
            $filecontent = $instStr($modulePlugin, 2);
            $properties = $instStr($modulePlugin, 3);
            // eventi senza spazi e senza voci vuote ("OnA, OnB" prima dava " OnB", mai trovato)
            $events = array_values(array_filter(array_map('trim', explode(',', $instStr($modulePlugin, 4))), 'strlen'));
            $guid = $modx->db->escape($instStr($modulePlugin, 5));
            $categoryName = $instStr($modulePlugin, 6);
            $leg_names = '';
            $disabled = (int)$instStr($modulePlugin, 9);
            $legacy = trim($instStr($modulePlugin, 7));
            if($legacy !== '') {
                // parse comma-separated legacy names and prepare them for sql IN clause
                $leg_names = "'" . implode("','", preg_split('/\s*,\s*/', $modx->db->escape($legacy))) . "'";
            }
            if ($filecontent === '' || !file_exists($filecontent))
                echo "<p>&nbsp;&nbsp;$name: <span class=\"notok\">" . $_lang['unable_install_plugin'] . " '$filecontent' " . $_lang['not_found'] . ".</span></p>";
            else {

                // disable legacy versions based on legacy_names provided
                if(!empty($leg_names)) {
                    $update_query = "UPDATE `" . $table_prefix . "site_plugins` SET disabled='1' WHERE name IN ($leg_names);";
                    $rs = $modx->db->query($update_query);
                }

                // Create the category if it does not already exist
                $category = getCreateDbCategory($categoryName, $sqlParser);
                $tmp = preg_split("/(\/\/)?\s*\<\?php/", file_get_contents($filecontent), 2);
                $plugin = end($tmp);
                // remove installer docblock
                $plugin = preg_replace("/^.*?\/\*\*.*?\*\/\s+/s", '', $plugin, 1);
                $plugin = $modx->db->escape((string)$plugin);
                $rs = $modx->db->query("SELECT * FROM `" . $table_prefix . "site_plugins` WHERE name='$name' ORDER BY id");
                $prev_id = null;
                $props = '';

                if ($modx->db->getRecordCount($rs)) {
                    $insert = true;
                    while($row = $modx->db->getRow($rs,'assoc')) {
                        $props = $modx->db->escape(propUpdate($properties, (string)$row['properties']));
                        // confronto con la descrizione originale: con quella escapata un apostrofo o una virgolette
                        // nella descrizione facevano disattivare il plugin e inserirne una copia a ogni aggiornamento
                        if($row['description'] == $descRaw){
                            if (!@ $modx->db->query("UPDATE `" . $table_prefix . "site_plugins` SET plugincode='$plugin', description='$desc', properties='$props' WHERE id='{$row['id']}';")) {
                                echo "<p>" . $instDbError() . "</p>";
                                return;
                            }
                            $insert = false;
                        } else {
                            if (!@ $modx->db->query("UPDATE `" . $table_prefix . "site_plugins` SET disabled='1' WHERE id='{$row['id']}';")) {
                                echo "<p>". $instDbError() ."</p>";
                                return;
                            }
                        }
                        $prev_id = $row['id'];
                    }
                    if($insert === true) {
                        if(!@$modx->db->query("INSERT INTO `".$table_prefix."site_plugins` (name,description,plugincode,properties,moduleguid,disabled,category) VALUES('$name','$desc','$plugin','$props','$guid','0','$category');",$sqlParser->conn)) {
                            echo "<p>". $instDbError() ."</p>";
                            return;
                        }
                    }
                    echo "<p>&nbsp;&nbsp;$name: <span class=\"ok\">" . $_lang['upgraded'] . "</span></p>";
                } else {
                    $properties = $modx->db->escape((string)parseProperties($properties, true));
                    if (!@ $modx->db->query("INSERT INTO `" . $table_prefix . "site_plugins` (name,description,plugincode,properties,moduleguid,disabled,category) VALUES('$name','$desc','$plugin','$properties','$guid','$disabled','$category');")) {
                        echo "<p>" . $instDbError() . "</p>";
                        return;
                    }

                    echo "<p>&nbsp;&nbsp;$name: <span class=\"ok\">" . $_lang['installed'] . "</span></p>";
                }
                // add system events
                // (senza eventi dichiarati nel pacchetto, prima explode('') dava [''] e il DELETE
                //  sotto cancellava tutti gli eventi del plugin: ora gli eventi esistenti restano)
                if (count($events) > 0) {
                    $ds=$modx->db->query("SELECT id FROM `".$table_prefix."site_plugins` WHERE name='$name' AND description='$desc' ORDER BY id DESC LIMIT 1;",$sqlParser->conn);
                    $row = $ds ? $modx->db->getRow($ds,'assoc') : false;
                    $id = is_array($row) ? (int)$row['id'] : 0;
                    if ($id > 0) {
                        $_events = implode("','", array_map(array($modx->db, 'escape'), $events));

                        // add new events
                        if ($prev_id) {
                            $prev_id = (int)$prev_id;

                            $modx->db->query("INSERT IGNORE INTO `{$table_prefix}site_plugin_events` (`pluginid`, `evtid`, `priority`)
                                SELECT {$id} as 'pluginid', `se`.`id` AS `evtid`, COALESCE(`spe`.`priority`, MAX(`spe2`.`priority`) + 1, 0) AS `priority`
                                FROM `{$table_prefix}system_eventnames` `se`
                                LEFT JOIN `{$table_prefix}site_plugin_events` `spe` ON `spe`.`evtid` = `se`.`id` AND `spe`.`pluginid` = {$prev_id}
                                LEFT JOIN `{$table_prefix}site_plugin_events` `spe2` ON `spe2`.`evtid` = `se`.`id`
                                WHERE name IN ('{$_events}')
                                GROUP BY `se`.`id`
                            ");
                        } else {
                            $modx->db->query("INSERT IGNORE INTO `{$table_prefix}site_plugin_events` (`pluginid`, `evtid`, `priority`) SELECT {$id} as `pluginid`, `se`.`id` as `evtid`, COALESCE(MAX(`spe`.`priority`) + 1, 0) as `priority` FROM `{$table_prefix}system_eventnames` `se` LEFT JOIN `{$table_prefix}site_plugin_events` `spe` ON `spe`.`evtid` = `se`.`id` WHERE `name` IN ('{$_events}') GROUP BY `se`.`id`
                            ");
                        }

                        // remove existing events
                        $modx->db->query("DELETE `pe` FROM `{$table_prefix}site_plugin_events` `pe` LEFT JOIN `{$table_prefix}system_eventnames` `se` ON `pe`.`evtid`=`se`.`id` AND `name` IN ('{$_events}') WHERE ISNULL(`name`) AND `pluginid` = {$id}");
                    }
                }
            }
        //}
    }
}

// Install Snippets
if (count($moduleSnippets ) > 0) {
    echo "<h3>" . $_lang['snippets'] . ":</h3> ";
    $selSnips = isset($_POST['snippet']) ? (array)$_POST['snippet'] : array();
    foreach ($moduleSnippets as $k=>$moduleSnippet) {

        $installSample = in_array('sample', $instArr($moduleSnippet, 5)) && $installData == 1;
        //if(in_array($k, $selSnips) || $installSample) {
            $name = $modx->db->escape($instStr($moduleSnippet, 0));
            $desc = $modx->db->escape($instStr($moduleSnippet, 1));
            $filecontent = $instStr($moduleSnippet, 2);
            $properties = $instStr($moduleSnippet, 3);
            $categoryName = $instStr($moduleSnippet, 4);
            if ($filecontent === '' || !file_exists($filecontent))
                echo "<p>&nbsp;&nbsp;$name: <span class=\"notok\">" . $_lang['unable_install_snippet'] . " '$filecontent' " . $_lang['not_found'] . ".</span></p>";
            else {

                // Create the category if it does not already exist
                $category = getCreateDbCategory($categoryName, $sqlParser);
                $tmp = preg_split("/(\/\/)?\s*\<\?php/", file_get_contents($filecontent), 2);
                $snippet = end($tmp);
                // remove installer docblock
                $snippet = preg_replace("/^.*?\/\*\*.*?\*\/\s+/s", '', $snippet, 1);
                $snippet = $modx->db->escape((string)$snippet);
                $rs = $modx->db->query("SELECT * FROM `" . $table_prefix . "site_snippets` WHERE name='$name'");

                if ($modx->db->getRecordCount($rs)) {

                    $row = $modx->db->getRow($rs,'assoc');
                    $props = $modx->db->escape(propUpdate($properties, (string)$row['properties']));
                    if (!$modx->db->query("UPDATE `" . $table_prefix . "site_snippets` SET snippet='$snippet', description='$desc', properties='$props' WHERE name='$name';")) {
                        echo "<p>" . $instDbError() . "</p>";
                        return;
                    }
                    echo "<p>&nbsp;&nbsp;$name: <span class=\"ok\">" . $_lang['upgraded'] . "</span></p>";
                } else {
                    $properties = $modx->db->escape((string)parseProperties($properties, true));
                    if (!$modx->db->query("INSERT INTO `" . $table_prefix . "site_snippets` (name,description,snippet,properties,category) VALUES('$name','$desc','$snippet','$properties','$category');")) {
                        echo "<p>" . $instDbError() . "</p>";
                        return;
                    }
                    echo "<p>&nbsp;&nbsp;$name: <span class=\"ok\">" . $_lang['installed'] . "</span></p>";
                }
            }
        //}
    }
}

// install data

if (is_file($installPath.'/'.$moduleSQLDataFile)) {
    echo "<p>" . $_lang['installing_demo_site'];
    $sqlParser->process($installPath.'/'.$moduleSQLDataFile);
    // display database results
    if ($sqlParser->installFailed == true) {
        $errors += 1;
        echo "<span class=\"notok\"><b>" . $_lang['database_alerts'] . "</span></p>";
        echo "<p>" . $_lang['setup_couldnt_install'] . "</p>";
        echo "<p>" . $_lang['installation_error_occured'] . "<br /><br />";
        for ($i = 0; $i < count($sqlParser->mysqlErrors); $i++) {
            echo "<em>" . $sqlParser->mysqlErrors[$i]["error"] . "</em>" . $_lang['during_execution_of_sql'] . "<span class='mono'>" . strip_tags($sqlParser->mysqlErrors[$i]["sql"]) . "</span>.<hr />";
        }
        echo "</p>";
        echo "<p>" . $_lang['some_tables_not_updated'] . "</p>";
        return;
    } else {
        echo "<span class=\"ok\">".$_lang['ok']."</span></p>";
    }
}

// always empty cache after install

include_once MGR."/processors/cache_sync.class.processor.php";
$sync = new synccache();
$sync->setCachepath(MODX_BASE_PATH."assets/cache/");
$sync->setReport(false);
$sync->emptyCache(); // first empty the cache



// setup completed!
echo "<p><b>" . $_lang['installation_successful'] . "</b></p>";


// Property Update function
function propUpdate($new,$old){
    $newArr = parseProperties((string)$new);
    $oldArr = parseProperties((string)$old);
    // PHP8: con un valore non array l'operatore + darebbe un Fatal "Unsupported operand types"
    if (!is_array($newArr)) $newArr = array();
    if (!is_array($oldArr)) $oldArr = array();
    foreach ($oldArr as $k => $v){
        if (isset($v['0']['options']) && isset($newArr[$k]['0']['options'])){
            $oldArr[$k]['0']['options'] = $newArr[$k]['0']['options'];
        }
    }
    $return = $oldArr + $newArr;
    $return = json_encode($return, JSON_UNESCAPED_UNICODE);
    $return = ($return != '[]') ? $return : '';
    return (string)$return;
}

function parseProperties($propertyString, $json=false) {
    $propertyString = (string)$propertyString;
    $propertyString = str_replace('{}', '', $propertyString );
    $propertyString = str_replace('} {', ',', $propertyString );

    // con $json=true restituisce sempre una stringa ('' = nessuna proprietà), come si aspettano gli INSERT
    if(empty($propertyString)) return $json ? '' : array();
    if($propertyString=='{}' || $propertyString=='[]') return $json ? '' : array();

    $jsonFormat = isJson($propertyString, true);
    $property = array();
    // old format
    if ( $jsonFormat === false) {
        $props= explode('&', $propertyString);
        foreach ($props as $prop) {
            if (trim($prop) != ''){
                // PHP8: chiavi mancanti (proprietà senza "=" o senza ";tipo;valore") → '' invece di "Undefined array key"
                $arr = array_pad(explode(';', $prop), 4, '');
                $key = array_pad(explode('=', $arr['0'], 2), 2, '');
                if (trim($key['0']) === '') continue;
                $property[$key['0']]['0']['label'] = trim($key['1']);
                $property[$key['0']]['0']['type'] = trim($arr['1']);
                switch (trim($arr['1'])) {
                    case 'list':
                    case 'list-multi':
                    case 'checkbox':
                    case 'radio':
                    case 'menu':
                        $property[$key['0']]['0']['value'] = trim($arr['3']);
                        $property[$key['0']]['0']['options'] = trim($arr['2']);
                        $property[$key['0']]['0']['default'] = trim($arr['3']);
                        break;
                    default:
                        $property[$key['0']]['0']['value'] = trim($arr['2']);
                        $property[$key['0']]['0']['default'] = trim($arr['2']);
                }
                $property[$key['0']]['0']['desc'] = '';
            }

        }
    // new json-format
    } else if(!empty($jsonFormat) && is_array($jsonFormat)){
        $property = $jsonFormat;
    }
    if ($json) {
        $property = json_encode($property, JSON_UNESCAPED_UNICODE);
        $property = ($property != '[]') ? $property : '';
    }
    return $property;
}

function isJson($string, $returnData=false) {
    $data = json_decode($string, true);
    return (json_last_error() == JSON_ERROR_NONE) ? ($returnData ? $data : true) : false;
}

function getCreateDbCategory($category) {

    global $modx;
    $dbase = $modx->db->config['dbase'];
    $table_prefix = $modx->db->config['table_prefix'];
    $category_id = 0;
    $category = trim((string)$category);
    if(!empty($category)) {
        $category = $modx->db->escape($category);
        $rs = $modx->db->query("SELECT id FROM `".$table_prefix."categories` WHERE category = '".$category."'");
        if($modx->db->getRecordCount($rs) && ($row = $modx->db->getRow($rs,'assoc'))) {
            $category_id = $row['id'];
        } else {
            $q = "INSERT INTO `".$table_prefix."categories` (`category`) VALUES ('{$category}');";
            $rs = $modx->db->query($q);
            if($rs) {
                $category_id = $modx->db->getInsertId();
            }
        }
    }
    return $category_id;
}
