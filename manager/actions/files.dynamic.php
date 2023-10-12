<?php

use EvolutionCMS\Facades\ManagerTheme;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('file_manager')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}
$token_check = checkToken();
$newToken = makeToken();

// settings
$theme_image_path = MODX_MANAGER_URL . 'media/style/' . evo()->getConfig('manager_theme') . '/images/';
$excludes = [
    '.',
    '..',
    '.svn',
    '.git',
    '.idea',
];
$alias_suffix = (!empty($friendly_url_suffix)) ? ',' . ltrim($friendly_url_suffix, '.') : '';
$editablefiles =
    explode(',', 'txt,php,tpl,less,sass,scss,shtml,html,htm,xml,js,css,pageCache,htaccess,json,ini' . $alias_suffix);
$inlineviewablefiles =
    explode(',', 'txt,php,tpl,less,sass,scss,html,htm,xml,js,css,pageCache,htaccess,json,ini' . $alias_suffix);
$viewablefiles = explode(',', 'jpg,gif,png,ico');

$editablefiles = add_dot($editablefiles);
$inlineviewablefiles = add_dot($inlineviewablefiles);
$viewablefiles = add_dot($viewablefiles);

$protected_path = [];
/* jp only
if($_SESSION['mgrRole']!=1)
{
*/
$protected_path[] = MODX_MANAGER_PATH;
$protected_path[] = MODX_BASE_PATH . 'temp/backup';
$protected_path[] = MODX_BASE_PATH . 'assets/backup';

if (!evo()->hasPermission('save_plugin')) {
    $protected_path[] = MODX_BASE_PATH . 'assets/plugins';
}
if (!evo()->hasPermission('save_snippet')) {
    $protected_path[] = MODX_BASE_PATH . 'assets/snippets';
}
if (!evo()->hasPermission('save_template')) {
    $protected_path[] = MODX_BASE_PATH . 'assets/templates';
}
if (!evo()->hasPermission('save_module')) {
    $protected_path[] = MODX_BASE_PATH . 'assets/modules';
}
if (!evo()->hasPermission('empty_cache')) {
    $protected_path[] = MODX_BASE_PATH . 'assets/cache';
}
if (!evo()->hasPermission('import_static')) {
    $protected_path[] = MODX_BASE_PATH . 'temp/import';
    $protected_path[] = MODX_BASE_PATH . 'assets/import';
}
if (!evo()->hasPermission('export_static')) {
    $protected_path[] = MODX_BASE_PATH . 'temp/export';
    $protected_path[] = MODX_BASE_PATH . 'assets/export';
}
/*
}
*/

// Mod added by Raymond
$enablefileunzip = true;
$enablefiledownload = true;
$newfolderaccessmode = octdec(evo()->getConfig('new_folder_permissions', '0777'));
$new_file_permissions = octdec(evo()->getConfig('new_file_permissions', '0666'));
// End Mod -  by Raymond
// make arrays from the file upload settings
$upload_files = explode(',', evo()->getConfig('upload_files', ''));
$upload_images = explode(',', evo()->getConfig('upload_images', ''));
$upload_media = explode(',', evo()->getConfig('upload_media', ''));
// now merge them
$uploadablefiles = array_merge($upload_files, $upload_images, $upload_media);
$uploadablefiles = add_dot($uploadablefiles);
$filemanager_path = evo()->getConfig('filemanager_path', MODX_BASE_PATH);

// end settings

// get the current work directory
if (!empty($_REQUEST['path'])) {
    $_REQUEST['path'] = str_replace('..', '', $_REQUEST['path']);
    $startPath = is_dir($_REQUEST['path']) ? $_REQUEST['path'] : removeLastPath($_REQUEST['path']);
} else {
    $startPath = $filemanager_path;
}
$startPath = rtrim($startPath, '/');

if (!is_readable($startPath)) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('not_readable_dir'));
}

// Raymond: get web start path for showing pictures
$rf = realpath($filemanager_path);
$rw = realpath('../');
$webStartPath = str_replace('\\', '/', str_replace($rw, '', $rf));
if (substr($webStartPath, 0, 1) == '/') {
    $webStartPath = '..' . $webStartPath;
} else {
    $webStartPath = '../' . $webStartPath;
}

?>
    <script>

      var current_path = '<?= $startPath;?>'

      function viewfile (url) {
        var el = document.getElementById('imageviewer')
        el.innerHTML = '<img src="' + url + '" />'
        el.style.display = 'block'
      }

      function setColor (o, state) {
        if (!o) {
          return
        }
        if (state && o.style) {
          o.style.backgroundColor = '#eee'
        } else if (o.style) {
          o.style.backgroundColor = 'transparent'
        }
      }

      function confirmDelete () {
        return confirm('<?= ManagerTheme::getLexicon('confirm_delete_file') ?>')
      }

      function confirmDeleteFolder (status) {
        if (status !== 'file_exists') return confirm(
          "<?= ManagerTheme::getLexicon('confirm_delete_dir') ?>") else return confirm(
          "<?= ManagerTheme::getLexicon('confirm_delete_dir_recursive') ?>")
      }

      function confirmUnzip () {
        return confirm('<?= ManagerTheme::getLexicon('confirm_unzip_file') ?>')
      }

      function unzipFile (file) {
        if (confirmUnzip()) {
          window.location.href = 'index.php?a=31&mode=unzip&path=' + current_path + '/&file=' + file +
            "&token=<?= $newToken;?>"
          return false
        }
      }

      function getFolderName (a) {
        var f = window.prompt('<?= ManagerTheme::getLexicon('files_dynamic_new_file_name') ?>', '')
        if (f) a.href += encodeURI(f)
        return !!(f)
      }

      function getFileName (a) {
        var f = window.prompt('<?= ManagerTheme::getLexicon('files_dynamic_new_file_name') ?>', '')
        if (f) a.href += encodeURI(f)
        return !!(f)
      }

      function deleteFolder (folder, status) {
        if (confirmDeleteFolder(status)) {
          window.location.href = 'index.php?a=31&mode=deletefolder&path=' + current_path + '&folderpath=' +
            current_path + '/' + folder + "&token=<?= $newToken;?>"
          return false
        }
      }

      function deleteFile (file) {
        if (confirmDelete()) {
          window.location.href = 'index.php?a=31&mode=delete&path=' + current_path + '/' + file +
            "&token=<?= $newToken;?>"
          return false
        }
      }

      function duplicateFile (file) {
        var newFilename = prompt('<?= ManagerTheme::getLexicon('files_dynamic_new_file_name') ?>', file)
        if (newFilename !== null && newFilename !== file) {
          window.location.href = 'index.php?a=31&mode=duplicate&path=' + current_path + '/' + file + '&newFilename=' +
            newFilename + "&token=<?= $newToken;?>"
        }
      }

      function renameFolder (dir) {
        var newDirname = prompt('<?= ManagerTheme::getLexicon('files_dynamic_new_folder_name') ?>', dir)
        if (newDirname !== null && newDirname !== dir) {
          window.location.href = 'index.php?a=31&mode=renameFolder&path=' + current_path + '&dirname=' + dir +
            '&newDirname=' + newDirname + "&token=<?= $newToken;?>"
        }
      }

      function renameFile (file) {
        var newFilename = prompt('<?= ManagerTheme::getLexicon('files_dynamic_new_file_name') ?>', file)
        if (newFilename !== null && newFilename !== file) {
          window.location.href = 'index.php?a=31&mode=renameFile&path=' + current_path + '/' + file + '&newFilename=' +
            newFilename + "&token=<?= $newToken;?>"
        }
      }

    </script>

    <h1>
        <i class="<?= ManagerTheme::getStyle('icon_folder_open') ?>"></i><?= ManagerTheme::getLexicon('manage_files') ?>
    </h1>

    <div id="actions">
        <div class="btn-group">
            <?php
            if (get_by_key($_POST, 'mode') == 'save' || get_by_key($_GET, 'mode') == 'edit') : ?>
                <a class="btn btn-success" href="javascript:;"
                   onclick="documentDirty=false;document.editFile.submit();">
                    <i class="<?= ManagerTheme::getStyle('icon_save') ?>"></i><span><?= ManagerTheme::getLexicon(
                            'save'
                        ) ?></span>
                </a>
            <?php
            endif ?>
            <?php
            if (isset($_GET['mode']) && $_GET['mode'] !== 'drill') {
                $href = 'a=31&path=' . urlencode($_REQUEST['path']);
            } else {
                $href = 'a=2';
            }
            if (is_writable($startPath)) {
                $ph = [];
                $ph['style_path'] = $theme_image_path;
                $tpl =
                    '<a class="btn btn-secondary" href="[+href+]" onclick="return getFolderName(this);"><i class="[+image+]"></i><span>[+subject+]</span></a>';
                $ph['image'] = ManagerTheme::getStyle('icon_folder_open');
                $ph['subject'] = ManagerTheme::getLexicon('add_folder');
                $ph['href'] = 'index.php?a=31&mode=newfolder&path=' . urlencode($startPath) . '&name=';
                $_ = parsePlaceholder($tpl, $ph);

                $tpl =
                    '<a class="btn btn-secondary" href="[+href+]" onclick="return getFileName(this);"><i class="[+image+]"></i><span>' .
                    ManagerTheme::getLexicon('files.dynamic.php1') . '</span></a>';
                $ph['image'] = ManagerTheme::getStyle('icon_document');
                $ph['href'] = 'index.php?a=31&mode=newfile&path=' . urlencode($startPath) . '&name=';
                $_ .= parsePlaceholder($tpl, $ph);
                echo $_;
            }
            ?>
            <a id="Button5" class="btn btn-secondary" href="javascript:;"
               onclick="documentDirty=false;document.location.href='index.php?<?= $href ?>';">
                <i class="<?= ManagerTheme::getStyle('icon_cancel') ?>"></i><span><?= ManagerTheme::getLexicon(
                        'cancel'
                    ) ?></span>
            </a>
        </div>
    </div>

    <div id="ManageFiles">
        <div class="container breadcrumbs">
            <?php
            if (!empty($_FILES['userfile'])) {
                $information = fileupload();
            } elseif (get_by_key($_POST, 'mode') == 'save') {
                echo textsave();
            } elseif (get_by_key($_REQUEST, 'mode') == 'delete') {
                echo delete_file();
            }

            if (in_array($startPath, $protected_path)) {
                evo()->webAlertAndQuit(ManagerTheme::getLexicon('files.dynamic.php2'));
            }

            $tpl = '<i class="[+image+] FilesTopFolder"></i>[+subject+]';
            $ph = [];
            $ph['style_path'] = $theme_image_path;
            $ph['image'] = '' . ManagerTheme::getStyle('icon_folder_open');
            // To Top Level with folder icon to the left
            if ($startPath == $filemanager_path || $startPath . '/' == $filemanager_path) {
                $ph['subject'] = '<span>Top</span>';
            } else {
                $ph['subject'] = '<a href="index.php?a=31&mode=drill&path=' . $filemanager_path . '">Top</a>/';
            }

            echo parsePlaceholder($tpl, $ph);

            $len = strlen($filemanager_path);
            if (substr($startPath, $len, strlen($startPath)) == '') {
                $topic_path = '/';
            } else {
                $topic_path = substr($startPath, $len, strlen($startPath));
                $pieces = explode('/', rtrim($topic_path, '/'));
                $path = '';
                $count = count($pieces);
                foreach ($pieces as $i => $v) {
                    if (empty($v)) {
                        continue;
                    }
                    $path .= rtrim($v, '/') . '/';
                    if (1 < $count) {
                        $href = 'index.php?a=31&mode=drill&path=' . urlencode($filemanager_path . $path);
                        $pieces[$i] = '<a href="' . $href . '">' . trim($v, '/') . '</a>';
                    } else {
                        $pieces[$i] = '<span>' . trim($v, '/') . '</span>';
                    }
                    $count--;
                }
                $topic_path = implode('/', $pieces);
            }

            echo $topic_path;

            ?>
        </div>
        <?php
        // check to see user isn't trying to move below the document_root
        if (substr(strtolower(str_replace('//', '/', $startPath . "/")), 0, $len) !=
            strtolower(str_replace('//', '/', $filemanager_path . '/'))
        ) {
            evo()->webAlertAndQuit(ManagerTheme::getLexicon('files_access_denied'));
        }

        // Unzip .zip files - by Raymond
        if ($enablefileunzip && get_by_key($_REQUEST, 'mode') == 'unzip' && is_writable($startPath)) {
            if (!$err = unzip(realpath($startPath . '/' . $_REQUEST['file']), realpath($startPath))) {
                echo '<span class="warning"><b>' . ManagerTheme::getLexicon('file_unzip_fail') .
                    ($err === 0 ? 'Missing zip library (php_zip.dll / zip.so)' : '') . '</b></span><br /><br />';
            } else {
                echo '<span class="success"><b>' . ManagerTheme::getLexicon('file_unzip') . '</b></span><br /><br />';
            }
        }
        // End Unzip - Raymond

        // New Folder & Delete Folder option - Raymond
        if (is_writable($startPath)) {
            // Delete Folder
            if (get_by_key($_REQUEST, 'mode') == 'deletefolder') {
                $folder = $_REQUEST['folderpath'];
                if (!$token_check || !@rrmdir($folder)) {
                    echo '<span class="warning"><b>' . ManagerTheme::getLexicon('file_folder_not_deleted') .
                        '</b></span><br /><br />';
                } else {
                    echo '<span class="success"><b>' . ManagerTheme::getLexicon('file_folder_deleted') .
                        '</b></span><br /><br />';
                }
            }

            // Create folder here
            if (get_by_key($_REQUEST, 'mode') == 'newfolder') {
                $old_umask = umask(0);
                $foldername = str_replace('..\\', '', str_replace('../', '', $_REQUEST['name']));
                if (!mkdirs($startPath . '/' . $foldername, 0777)) {
                    echo '<span class="warning"><b>', ManagerTheme::getLexicon(
                        'file_folder_not_created'
                    ), '</b></span><br /><br />';
                } else {
                    if (!@chmod($startPath . '/' . $foldername, $newfolderaccessmode)) {
                        echo '<span class="warning"><b>' . ManagerTheme::getLexicon('file_folder_chmod_error') .
                            '</b></span><br /><br />';
                    } else {
                        echo '<span class="success"><b>' . ManagerTheme::getLexicon('file_folder_created') .
                            '</b></span><br /><br />';
                    }
                }
                umask($old_umask);
            }
            // Create file here
            if (get_by_key($_REQUEST, 'mode') == 'newfile') {
                $old_umask = umask(0);
                $filename = str_replace('..\\', '', str_replace('../', '', $_REQUEST['name']));

                if (!checkExtension($filename)) {
                    echo '<span class="warning"><b>' . ManagerTheme::getLexicon('files_filetype_notok') .
                        '</b></span><br /><br />';
                } elseif (preg_match('@(\\\\|\/|\:|\;|\,|\*|\?|\"|\<|\>|\||\?)@', $filename) !== 0) {
                    echo ManagerTheme::getLexicon('files.dynamic.php3');
                } else {
                    $rs = file_put_contents($startPath . '/' . $filename, '');
                    if ($rs === false) {
                        echo '<span class="warning"><b>', ManagerTheme::getLexicon(
                            'file_folder_not_created'
                        ), '</b></span><br /><br />';
                    } else {
                        echo ManagerTheme::getLexicon('files.dynamic.php4');
                    }
                    umask($old_umask);
                }
            }
            // Duplicate file here
            if (get_by_key($_REQUEST, 'mode') == 'duplicate') {
                $old_umask = umask(0);
                $filename = $_REQUEST['path'];
                $newFilename = str_replace('..\\', '', str_replace('../', '', $_REQUEST['newFilename']));

                if (!checkExtension($newFilename)) {
                    echo '<span class="warning"><b>' . ManagerTheme::getLexicon('files_filetype_notok') .
                        '</b></span><br /><br />';
                } elseif (preg_match('@(\\\\|\/|\:|\;|\,|\*|\?|\"|\<|\>|\||\?)@', $newFilename) !== 0) {
                    echo ManagerTheme::getLexicon('files.dynamic.php3');
                } else {
                    if (!copy($filename, MODX_BASE_PATH . $newFilename)) {
                        echo ManagerTheme::getLexicon('files.dynamic.php5');
                    }
                    umask($old_umask);
                }
            }
            // Rename folder here
            if (get_by_key($_REQUEST, 'mode') == 'renameFolder') {
                $old_umask = umask(0);
                $dirname = $_REQUEST['path'] . '/' . $_REQUEST['dirname'];
                $newDirname = str_replace([
                    '..\\',
                    '../',
                    '\\',
                    '/',
                ], '', $_REQUEST['newDirname']);

                if (preg_match('@(\\\\|\/|\:|\;|\,|\*|\?|\"|\<|\>|\||\?)@', $newDirname) !== 0) {
                    echo ManagerTheme::getLexicon('files.dynamic.php3');
                } else {
                    if (!rename($dirname, $_REQUEST['path'] . '/' . $newDirname)) {
                        echo '<span class="warning"><b>', ManagerTheme::getLexicon(
                            'file_folder_not_created'
                        ), '</b></span><br /><br />';
                    }
                }
                umask($old_umask);
            }
            // Rename file here
            if (get_by_key($_REQUEST, 'mode') == 'renameFile') {
                $old_umask = umask(0);
                $path = dirname($_REQUEST['path']);
                $filename = $_REQUEST['path'];
                $newFilename = str_replace([
                    '..\\',
                    '../',
                    '\\',
                    '/',
                ], '', $_REQUEST['newFilename']);

                if (!checkExtension($newFilename)) {
                    echo '<span class="warning"><b>' . ManagerTheme::getLexicon('files_filetype_notok') .
                        '</b></span><br /><br />';
                } elseif (preg_match('@(\\\\|\/|\:|\;|\,|\*|\?|\"|\<|\>|\||\?)@', $newFilename) !== 0) {
                    echo ManagerTheme::getLexicon('files.dynamic.php3');
                } else {
                    if (!rename($filename, $path . '/' . $newFilename)) {
                        echo ManagerTheme::getLexicon('files.dynamic.php5');
                    }
                    umask($old_umask);
                }
            }
        }
        // End New Folder - Raymond

        if (strlen(MODX_BASE_PATH) < strlen($filemanager_path)) {
            $len--;
        }

        ?>
        <div class="table-responsive">
            <table id="FilesTable" class="table data">
                <thead>
                <tr>
                    <th><?= ManagerTheme::getLexicon('files_filename') ?></th>
                    <th style="width: 1%;"><?= ManagerTheme::getLexicon('files_modified') ?></th>
                    <th style="width: 1%;"><?= ManagerTheme::getLexicon('files_filesize') ?></th>
                    <th style="width: 1%;" class="text-nowrap"><?= ManagerTheme::getLexicon('files_fileoptions') ?></th>
                </tr>
                </thead>
                <?php
                extract(
                    ls(
                        $startPath,
                        compact(
                            'len',
                            'webStartPath',
                            'editablefiles',
                            'enablefileunzip',
                            'inlineviewablefiles',
                            'uploadablefiles',
                            'enablefiledownload',
                            'viewablefiles',
                            'protected_path',
                            'excludes'
                        )
                    )
                );
                echo "\n\n\n";
                if ($folders == 0 && $files == 0) {
                    echo '<tr><td colspan="4"><i class="' . ManagerTheme::getStyle('icon_folder') .
                        ' FilesDeletedFolder"></i> <span style="color:#888;cursor:default;"> ' .
                        ManagerTheme::getLexicon('files_directory_is_empty') . ' </span></td></tr>';
                }
                ?>
            </table>
        </div>

        <div class="container">
            <p>
                <?php
                echo ManagerTheme::getLexicon('files_directories') . ': <b>' . $folders . '</b> ';
                echo ManagerTheme::getLexicon('files_files') . ': <b>' . $files . '</b> ';
                echo ManagerTheme::getLexicon('files_data') . ': <b><span dir="ltr">' . nicesize($fileSizes) .
                    '</span></b> ';
                echo ManagerTheme::getLexicon('files_dirwritable') . ' <b>' . (is_writable($startPath) == 1
                        ? ManagerTheme::getLexicon('yes') . '.'
                        : ManagerTheme::getLexicon(
                            'no'
                        )) . '.</b>'
                ?>
            </p>

            <?php
            if ((@ini_get('file_uploads') || get_cfg_var('file_uploads') == 1) && is_writable($startPath)) {
                @ini_set('upload_max_filesize', $upload_maxsize ?? 0); // modified by raymond
                ?>

                <form name="upload" enctype="multipart/form-data" action="index.php" method="post">
                    <input type="hidden" name="MAX_FILE_SIZE"
                           value="<?= $upload_maxsize ?? 3145728 ?>">
                    <input type="hidden" name="a" value="31">
                    <input type="hidden" name="path" value="<?= $startPath ?>">

                    <?php
                    if (isset($information)) {
                        echo $information;
                    } ?>

                    <div id="uploader">
                        <input type="file" name="userfile[]" onchange="document.upload.submit();" multiple>
                        <a class="btn btn-secondary" href="javascript:;"
                           onclick="document.upload.submit()"><?= ManagerTheme::getLexicon('files_uploadfile') ?></a>
                    </div>
                </form>
                <?php
            } else {
                echo "<p>" . ManagerTheme::getLexicon('files_upload_inhibited_msg') . "</p>";
            }
            ?>
            <div id="imageviewer"></div>
        </div>

    </div>
<?php

if (get_by_key($_REQUEST, 'mode') == "edit" || get_by_key($_REQUEST, 'mode') == "view") {
    ?>

    <div class="section" id="file_editfile">
        <div class="navbar navbar-editor"><?= $_REQUEST['mode'] == "edit" ? ManagerTheme::getLexicon('files_editfile')
                : ManagerTheme::getLexicon('files_viewfile') ?></div>
        <?php
        $filename = $_REQUEST['path'];
        $buffer = file_get_contents($filename);
        // Log the change
        logFileChange('view', $filename);
        if ($buffer === false) {
            evo()->webAlertAndQuit('Error opening file for reading.');
        }
        ?>
        <form action="index.php" method="post" name="editFile">
            <input type="hidden" name="a" value="31"/>
            <input type="hidden" name="mode" value="save"/>
            <input type="hidden" name="path" value="<?= $_REQUEST['path'] ?>"/>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <textarea dir="ltr" name="content" id="content" class="phptextarea"><?= htmlentities(
                                $buffer,
                                ENT_COMPAT,
                                ManagerTheme::getCharset()
                            ) ?></textarea>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    $pathinfo = pathinfo($filename);
    switch ($pathinfo['extension']) {
        case 'css':
            $contentType = 'text/css';
            break;
        case 'js':
            $contentType = 'text/javascript';
            break;
        case 'json':
            $contentType = 'application/json';
            break;
        case 'php':
            $contentType = 'application/x-httpd-php';
            break;
        default:
            $contentType = 'htmlmixed';
    }
    $evtOut = evo()->invokeEvent('OnRichTextEditorInit', [
        'editor' => 'Codemirror',
        'elements' => [
            'content',
        ],
        'contentType' => $contentType,
        'readOnly' => !($_REQUEST['mode'] == 'edit'),
    ]);
    if (is_array($evtOut)) {
        echo implode('', $evtOut);
    }
}

