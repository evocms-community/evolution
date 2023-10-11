<?php

use EvolutionCMS\Facades\ManagerTheme;

if (!function_exists('add_dot')) {
    /**
     * @param array $array
     *
     * @return array
     */
    function add_dot(array $array): array
    {
        $count = count($array);
        for ($i = 0; $i < $count; $i++) {
            $array[$i] = '.' . strtolower(trim($array[$i])); // add a dot :)
        }

        return $array;
    }
}

if (!function_exists('determineIcon')) {
    /**
     * @param string $file
     * @param string $selFile
     * @param string $mode
     *
     * @return string
     */
    function determineIcon(string $file, string $selFile, string $mode): string
    {
        $icons = [
            'default' => ManagerTheme::getStyle('icon_file'),
            'edit' => ManagerTheme::getStyle('icon_edit'),
            'view' => ManagerTheme::getStyle('icon_eye'),
        ];

        $icon = $icons['default'];

        if ($file == $selFile) {
            $icon = $icons[$mode] ?? $icons['default'];
        }

        return '<i class="' . $icon . ' FilesPage"></i>';
    }
}

if (!function_exists('markRow')) {
    /**
     * @param string $file
     * @param string $selFile
     * @param string $mode
     *
     * @return string
     */
    function markRow(string $file, string $selFile, string $mode): string
    {
        $classNames = [
            'default' => '',
            'edit' => 'editRow',
            'view' => 'viewRow',
        ];

        if ($file == $selFile) {
            $class = $classNames[$mode] ?? $classNames['default'];

            return ' class="' . $class . '"';
        }

        return '';
    }
}

if (!function_exists('ls')) {
    /**
     * @param string $currentPath
     * @param array $options
     *
     * @return array|void
     */
    function ls(string $currentPath, array $options = [])
    {
        extract($options);

        $dirCounter = 0;
        $fileCounter = 0;
        $fileSizes = 0;
        $dirs_array = [];
        $files_array = [];
        $currentPath = str_replace('//', '/', $currentPath . '/');

        if (!is_dir($currentPath)) {
            echo 'Invalid path "', $currentPath, '"<br />';

            return;
        }
        $dir = scandir($currentPath);

        // first, get info
        foreach ($dir as $file) {
            $newPath = $currentPath . $file;
            if ($file === '..' || $file === '.') {
                continue;
            }
            if (is_dir($newPath)) {
                $dirs_array[$dirCounter]['dir'] = $newPath;
                $dirs_array[$dirCounter]['stats'] = lstat($newPath);
                if ($file == '..' || $file == '.') {
                    continue;
                } elseif (!in_array($file, $excludes) && !in_array($newPath, $protected_path)) {
                    $dirs_array[$dirCounter]['text'] = '<i class="' . ManagerTheme::getStyle('icon_folder') .
                        ' FilesFolder"></i> <a href="index.php?a=31&mode=drill&path=' . urlencode($newPath) . '"><b>' .
                        $file . '</b></a>';

                    $deletedFiles = scandir($newPath);
                    foreach ($deletedFiles as $i => $infile) {
                        switch ($infile) {
                            case '..':
                            case '.':
                            unset($deletedFiles[$i]);
                                break;
                        }
                    }
                    $file_exists = (0 < count($deletedFiles)) ? 'file_exists' : '';

                    $dirs_array[$dirCounter]['delete'] =
                        is_writable($currentPath) ? '<a href="javascript: deleteFolder(\'' . urlencode($file) .
                            '\',\'' .
                            $file_exists . '\');"><i class="' . ManagerTheme::getStyle('icon_trash') . '" title="' .
                            ManagerTheme::getLexicon('file_delete_folder') . '"></i></a>' : '';
                } else {
                    $dirs_array[$dirCounter]['text'] =
                        '<span><i class="' . ManagerTheme::getStyle('icon_folder') . ' FilesDeletedFolder"></i> ' . $file . '</span>';
                    $dirs_array[$dirCounter]['delete'] =
                        is_writable($currentPath) ? '<span class="disabled"><i class="' . ManagerTheme::getStyle('icon_trash') .
                            '" title="' . ManagerTheme::getLexicon('file_delete_folder') . '"></i></span>' : '';
                }

                $dirs_array[$dirCounter]['rename'] =
                    is_writable($currentPath) ? '<a href="javascript:renameFolder(\'' . urlencode($file) .
                        '\');"><i class="' . ManagerTheme::getStyle('icon_i_cursor') . '" title="' . ManagerTheme::getLexicon('rename') . '"></i></a> '
                        : '';

                // increment the counter
                $dirCounter++;
            } else {
                $type = getExtension($newPath);
                $files_array[$fileCounter]['file'] = $newPath;
                $files_array[$fileCounter]['stats'] = lstat($newPath);
                $files_array[$fileCounter]['text'] =
                    determineIcon($newPath, get_by_key($_REQUEST, 'path', ''), get_by_key($_REQUEST, 'mode', '')) .
                    ' ' . $file;
                $files_array[$fileCounter]['view'] = (in_array(
                    $type,
                    $viewablefiles
                ))
                    ? '<a href="javascript:;" onclick="viewfile(\'' . $webstart_path . substr(
                        $newPath,
                        $len,
                        strlen($newPath)
                    ) . '\');"><i class="' . ManagerTheme::getStyle('icon_eye') . '" title="' . ManagerTheme::getLexicon('files_viewfile') . '"></i></a>'
                    : (($enablefiledownload && in_array(
                            $type,
                            $uploadablefiles
                        ))
                        ? '<a href="' . $webstart_path . implode(
                            '/',
                            array_map(
                                'rawurlencode',
                                explode(
                                    '/',
                                    substr(
                                        $newPath,
                                        $len,
                                        strlen($newPath)
                                    )
                                )
                            )
                        ) . '" style="cursor:pointer;" download><i class="' . ManagerTheme::getStyle('icon_download') . '" title="' .
                        ManagerTheme::getLexicon('file_download_file') . '"></i></a>'
                        : '<span class="disabled"><i class="' . ManagerTheme::getStyle('icon_eye') . '" title="' .
                        ManagerTheme::getLexicon('files_viewfile') . '"></i></span>');
                $files_array[$fileCounter]['view'] = (in_array(
                    $type,
                    $inlineviewablefiles
                )) ? '<a href="index.php?a=31&mode=view&path=' . urlencode($newPath) . '"><i class="' .
                    ManagerTheme::getStyle('icon_eye') . '" title="' . ManagerTheme::getLexicon('files_viewfile') . '"></i></a>'
                    : $files_array[$fileCounter]['view'];
                $files_array[$fileCounter]['unzip'] =
                    ($enablefileunzip && $type == '.zip') ? '<a href="javascript:unzipFile(\'' . urlencode($file) .
                        '\');"><i class="' . ManagerTheme::getStyle('icon_archive') . '" title="' . ManagerTheme::getLexicon('file_download_unzip') .
                        '"></i></a>' : '';
                $files_array[$fileCounter]['edit'] = (in_array(
                        $type,
                        $editablefiles
                    ) && is_writable($currentPath) && is_writable($newPath))
                    ? '<a href="index.php?a=31&mode=edit&path=' .
                    urlencode($newPath) . '#file_editfile"><i class="' . ManagerTheme::getStyle('icon_edit') . '" title="' .
                    ManagerTheme::getLexicon('files_editfile') . '"></i></a>'
                    : '<span class="disabled"><i class="' . ManagerTheme::getStyle('icon_edit') . '" title="' .
                    ManagerTheme::getLexicon('files_editfile') . '"></i></span>';
                $files_array[$fileCounter]['duplicate'] = (in_array(
                        $type,
                        $editablefiles
                    ) && is_writable($currentPath) && is_writable($newPath))
                    ? '<a href="javascript:duplicateFile(\'' .
                    urlencode($file) . '\');"><i class="' . ManagerTheme::getStyle('icon_clone') . '" title="' . ManagerTheme::getLexicon('duplicate') .
                    '"></i></a>'
                    : '<span class="disabled"><i class="' . ManagerTheme::getStyle('icon_clone') . '" align="absmiddle" title="' .
                    ManagerTheme::getLexicon('duplicate') . '"></i></span>';
                $files_array[$fileCounter]['rename'] = (in_array(
                        $type,
                        $editablefiles
                    ) && is_writable($currentPath) && is_writable($newPath))
                    ? '<a href="javascript:renameFile(\'' .
                    urlencode($file) . '\');"><i class="' . ManagerTheme::getStyle('icon_i_cursor') . '" align="absmiddle" title="' .
                    ManagerTheme::getLexicon('rename') . '"></i></a>'
                    : '<span class="disabled"><i class="' . ManagerTheme::getStyle('icon_i_cursor') . '" align="absmiddle" title="' .
                    ManagerTheme::getLexicon('rename') . '"></i></span>';
                $files_array[$fileCounter]['delete'] =
                    is_writable($currentPath) && is_writable($newPath)
                        ? '<a href="javascript:deleteFile(\'' .
                        urlencode($file) . '\');"><i class="' . ManagerTheme::getStyle('icon_trash') . '" title="' .
                        ManagerTheme::getLexicon('file_delete_file') . '"></i></a>'
                        : '<span class="disabled"><i class="' . ManagerTheme::getStyle('icon_trash') . '" title="' .
                        ManagerTheme::getLexicon('file_delete_file') . '"></i></span>';

                // increment the counter
                $fileCounter++;
            }
        }

        // dump array entries for directories
        $folders = count($dirs_array);
        sort($dirs_array); // sorting the array alphabetically (Thanks pxl8r!)
        for ($i = 0; $i < $folders; $i++) {
            $fileSizes += $dirs_array[$i]['stats']['7'];
            echo '<tr>';
            echo '<td>' . $dirs_array[$i]['text'] . '</td>';
            echo '<td class="text-nowrap">' . evo()->toDateFormat($dirs_array[$i]['stats']['9']) . '</td>';
            echo '<td class="text-right">' . nicesize($dirs_array[$i]['stats']['7']) . '</td>';
            echo '<td class="actions text-right">';
            echo $dirs_array[$i]['rename'];
            echo $dirs_array[$i]['delete'];
            echo '</td>';
            echo '</tr>';
        }

        // dump array entries for files
        $files = count($files_array);
        sort($files_array); // sorting the array alphabetically (Thanks pxl8r!)
        for ($i = 0; $i < $files; $i++) {
            $fileSizes += $files_array[$i]['stats']['7'];
            echo '<tr ' .
                markRow($files_array[$i]['file'], get_by_key($_REQUEST, 'path'), get_by_key($_REQUEST, 'mode')) . '>';
            echo '<td>' . $files_array[$i]['text'] . '</td>';
            echo '<td class="text-nowrap">' . evo()->toDateFormat($files_array[$i]['stats']['9']) . '</td>';
            echo '<td class="text-right">' . nicesize($files_array[$i]['stats']['7']) . '</td>';
            echo '<td class="actions text-right">';
            echo $files_array[$i]['unzip'];
            echo $files_array[$i]['view'];
            echo $files_array[$i]['edit'];
            echo $files_array[$i]['duplicate'];
            echo $files_array[$i]['rename'];
            echo $files_array[$i]['delete'];
            echo '</td>';
            echo '</tr>';
        }

        return compact('fileSizes', 'files', 'folders');
    }
}

if (!function_exists('removeLastPath')) {
    /**
     * @param string $string
     *
     * @return bool|string
     */
    function removeLastPath(string $string)
    {
        $pos = strrpos($string, '/');
        if ($pos !== false) {
            $path = substr($string, 0, $pos);
        } else {
            $path = false;
        }

        return $path;
    }
}

if (!function_exists('getExtension')) {
    /**
     * @param string $string
     *
     * @return bool|string
     *
     * @TODO: not work if $string contains folder name with dot
     */
    function getExtension(string $string)
    {
        $pos = strrpos($string, '.');
        if ($pos !== false) {
            $ext = substr($string, $pos);
            $ext = strtolower($ext);
        } else {
            $ext = false;
        }

        return $ext;
    }
}

if (!function_exists('checkExtension')) {
    /**
     * @param string $path
     *
     * @return bool
     */
    function checkExtension(string $path = ''): bool
    {
        $upload_files = explode(',', evo()->getConfig('upload_files', ''));
        $upload_images = explode(',', evo()->getConfig('upload_images', ''));
        $upload_media = explode(',', evo()->getConfig('upload_media', ''));
        // now merge them
        $uploadFiles = array_merge($upload_files, $upload_images, $upload_media);
        $uploadFiles = add_dot($uploadFiles);

        return in_array(getExtension($path), $uploadFiles);
    }
}

if (!function_exists('mkdirs')) {
    /**
     * recursive mkdir function
     *
     * @param string $strPath
     * @param int $mode
     *
     * @return bool
     */
    function mkdirs(string $strPath, int $mode): bool
    {
        if (is_dir($strPath)) {
            return true;
        }

        $pStrPath = dirname($strPath);
        if (!mkdirs($pStrPath, $mode)) {
            return false;
        }

        return mkdir($strPath);
    }
}

if (!function_exists('logFileChange')) {
    /**
     * @param string $type
     * @param string $filename
     */
    function logFileChange(string $type, string $filename)
    {
        //global $_lang;

        $log = new EvolutionCMS\Legacy\LogHandler();

        switch ($type) {
            case 'upload':
                $string = 'Uploaded File';
                break;
            case 'delete':
                $string = 'Deleted File';
                break;
            case 'modify':
                $string = 'Modified File';
                break;
            default:
                $string = 'Viewing File';
                break;
        }

        $string = sprintf($string, $filename);
        $log->initAndWriteLog($string, '', '', '', $type, $filename);

        // HACK: change the global action to prevent double logging
        // @see index.php @ 915
        global $action;
        $action = 1;
    }
}

if (!function_exists('unzip')) {
    /**
     * by patrick_allaert - php user notes
     *
     * @param string $file
     * @param string $path
     *
     * @return bool|int
     */
    function unzip(string $file, string $path)
    {
        global $newfolderaccessmode, $token_check;

        if (!$token_check) {
            return false;
        }

        // added by Raymond
        if (!extension_loaded('zip')) {
            return 0;
        }
        // end mod
        $zip = zip_open($file);
        if ($zip) {
            $old_umask = umask(0);
            $path = rtrim($path, '/') . '/';
            while ($zip_entry = zip_read($zip)) {
                if (zip_entry_filesize($zip_entry) > 0) {
                    // str_replace must be used under windows to convert "/" into "\"
                    $zip_entry_name = zip_entry_name($zip_entry);
                    $complete_path = $path . str_replace('\\', '/', dirname($zip_entry_name));
                    $complete_name = $path . str_replace('\\', '/', $zip_entry_name);
                    if (!file_exists($complete_path)) {
                        $tmp = '';
                        foreach (explode('/', $complete_path) as $k) {
                            $tmp .= $k . '/';
                            if (!is_dir($tmp)) {
                                mkdir($tmp);
                            }
                        }
                    }
                    if (zip_entry_open($zip, $zip_entry, 'r')) {
                        file_put_contents($complete_name, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)));
                        zip_entry_close($zip_entry);
                    }
                }
            }
            umask($old_umask);
            zip_close($zip);

            return true;
        }
        zip_close($zip);
    }
}

if (!function_exists('rrmdir')) {
    /**
     * @param string $dir
     *
     * @return bool
     */
    function rrmdir(string $dir): bool
    {
        foreach (glob($dir . '/*') as $file) {
            if (is_dir($file)) {
                rrmdir($file);
            } else {
                unlink($file);
            }
        }

        return rmdir($dir);
    }
}

if (!function_exists('fileupload')) {
    /**
     * @return string
     */
    function fileupload(): string
    {
        $modx = evo();
        $startPath = is_dir($_REQUEST['path']) ? $_REQUEST['path'] : removeLastPath($_REQUEST['path']);
        $filemanager_path = evo()->getConfig('filemanager_path', MODX_BASE_PATH);
        $new_file_permissions = octdec(evo()->getConfig('new_file_permissions', '0666'));
        global $_lang, $uploadablefiles;
        $msg = '';
        foreach ($_FILES['userfile']['name'] as $i => $name) {
            if (empty($_FILES['userfile']['tmp_name'][$i])) {
                continue;
            }
            $userFile = [];

            $userFile['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
            $userFile['error'] = $_FILES['userfile']['error'][$i];
            $name = $_FILES['userfile']['name'][$i];
            if ($modx->getConfig('clean_uploaded_filename') == 1) {
                $nameParts = explode('.', $name);
                $nameParts = array_map([
                    $modx,
                    'stripAlias',
                ], $nameParts, ['file_manager']);
                $name = implode('.', $nameParts);
            }
            $userFile['name'] = $name;
            $userFile['type'] = $_FILES['userfile']['type'][$i];

            // this seems to be an upload action.
            $path = MODX_SITE_URL . substr($startPath, strlen($filemanager_path), strlen($startPath));
            $path = rtrim($path, '/') . '/' . $userFile['name'];
            $msg .= $path;
            if ($userFile['error'] == 0) {
                $img = (strpos(
                        $userFile['type'],
                        'image'
                    ) !== false) ? '<br /><img src="' . $path . '" height="75" />' : '';
                $msg .= "<p>" . ManagerTheme::getLexicon('files_file_type') . $userFile['type'] . ", " .
                    nicesize(filesize($userFile['tmp_name'])) . $img . '</p>';
            }

            $userFilename = $userFile['tmp_name'];

            if (is_uploaded_file($userFilename)) {
                // file is uploaded file, process it!
                if (!checkExtension($userFile['name'])) {
                    $msg .= '<p><span class="warning">' . ManagerTheme::getLexicon('files_filetype_notok') . '</span></p>';
                } else {
                    if (@move_uploaded_file($userFile['tmp_name'], $_POST['path'] . '/' . $userFile['name'])) {
                        // Ryan: Repair broken permissions issue with file manager
                        if (strtoupper(substr(PHP_OS, 0, 3)) != 'WIN') {
                            @chmod($_POST['path'] . "/" . $userFile['name'], $new_file_permissions);
                        }
                        // Ryan: End
                        $msg .= '<p><span class="success">' . ManagerTheme::getLexicon('files_upload_ok') . '</span></p><hr/>';

                        // invoke OnFileManagerUpload event
                        $modx->invokeEvent('OnFileManagerUpload', [
                            'filepath' => $_POST['path'],
                            'filename' => $userFile['name'],
                        ]);
                        // Log the change
                        logFileChange('upload', $_POST['path'] . '/' . $userFile['name']);
                    } else {
                        $msg .= '<p><span class="warning">' . ManagerTheme::getLexicon('files_upload_copyfailed') . '</span> ' .
                            ManagerTheme::getLexicon('files_upload_permissions_error') . '</p>';
                    }
                }
            } else {
                $msg .= '<br /><span class="warning"><b>' . ManagerTheme::getLexicon('files_upload_error') . ':</b>';
                switch ($userFile['error']) {
                    case 0: //no error; possible file attack!
                        $msg .= ManagerTheme::getLexicon('files_upload_error0');
                        break;
                    case 1: //uploaded file exceeds the upload_max_filesize directive in php.ini
                        $msg .= ManagerTheme::getLexicon('files_upload_error1');
                        break;
                    case 2: //uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the html form
                        $msg .= ManagerTheme::getLexicon('files_upload_error2');
                        break;
                    case 3: //uploaded file was only partially uploaded
                        $msg .= ManagerTheme::getLexicon('files_upload_error3');
                        break;
                    case 4: //no file was uploaded
                        $msg .= ManagerTheme::getLexicon('files_upload_error4');
                        break;
                    default: //a default error, just in case!  :)
                        $msg .= ManagerTheme::getLexicon('files_upload_error5');
                        break;
                }
                $msg .= '</span><br />';
            }
        }

        return $msg . '<br/>';
    }
}

if (!function_exists('textsave')) {
    /**
     * @return string
     */
    function textsave(): string
    {
        global $_lang;

        $msg = ManagerTheme::getLexicon('editing_file');
        $filename = $_POST['path'];
        $content = $_POST['content'];

        // Write $content to our opened file.
        if (file_put_contents($filename, $content) === false) {
            $msg .= '<span class="warning"><b>' . ManagerTheme::getLexicon('file_not_saved') . '</b></span><br /><br />';
        } else {
            $msg .= '<span class="success"><b>' . ManagerTheme::getLexicon('file_saved') . '</b></span><br /><br />';
            $_REQUEST['mode'] = 'edit';
        }
        // Log the change
        logFileChange('modify', $filename);

        return $msg;
    }
}

if (!function_exists('delete_file')) {
    /**
     * @return string
     */
    function delete_file(): string
    {
        global $_lang;

        $msg = sprintf(ManagerTheme::getLexicon('deleting_file'), str_replace('\\', '/', $_REQUEST['path']));

        $file = $_REQUEST['path'];
        if (!evo()->hasPermission('file_manager') || !@unlink($file)) {
            $msg .= '<span class="warning"><b>' . ManagerTheme::getLexicon('file_not_deleted') . '</b></span><br /><br />';
        } else {
            $msg .= '<span class="success"><b>' . ManagerTheme::getLexicon('file_deleted') . '</b></span><br /><br />';
        }

        // Log the change
        logFileChange('delete', $file);

        return $msg;
    }
}

if (!function_exists('parsePlaceholder')) {
    /**
     * @param string $tpl
     * @param array $ph
     *
     * @return string
     */
    function parsePlaceholder(string $tpl, array $ph): string
    {
        foreach ($ph as $k => $v) {
            $k = "[+$k+]";
            $tpl = str_replace($k, $v, $tpl);
        }

        return $tpl;
    }
}

if (!function_exists('checkToken')) {
    /**
     * @return bool
     */
    function checkToken(): bool
    {
        if (!empty($_POST['token'])) {
            $token = $_POST['token'];
        } elseif (!empty($_GET['token'])) {
            $token = $_GET['token'];
        } else {
            $token = false;
        }

        if (!empty($_SESSION['token']) && $_SESSION['token'] === $token) {
            $rs = true;
        } else {
            $rs = false;
        }

        $_SESSION['token'] = '';

        return $rs;
    }
}

if (!function_exists('makeToken')) {
    /**
     * @return string
     */
    function makeToken(): string
    {
        $newToken = uniqid();
        $_SESSION['token'] = $newToken;

        return $newToken;
    }
}
