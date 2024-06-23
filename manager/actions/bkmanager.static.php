<?php

use EvolutionCMS\Facades\ManagerTheme;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('bk_manager')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

$dbase = evo()->getDatabase()->getConfig('database');

if (!evo()->getConfig('snapshot_path')) {
    if (is_dir(MODX_BASE_PATH . 'temp/backup/')) {
        evo()->setConfig('snapshot_path', MODX_BASE_PATH . 'temp/backup/');
    } else {
        evo()->setConfig('snapshot_path', MODX_BASE_PATH . 'assets/backup/');
    }
}

$tempFile = evo()->getConfig('snapshot_path') . 'temp.php';
if (file_exists($tempFile)) {
    unlink($tempFile);
}

// Backup Manager by Raymond:
$mode = $_POST['mode'] ?? '';
$driver = evo()->getDatabase()->getConfig('driver');

if ($mode == 'restore1') {
    if (!empty($_POST['textarea'])) {
        $source = trim($_POST['textarea']);
        $_SESSION['textarea'] = $source . "\n";
        switch ($driver) {
            case 'pgsql':
                DB::raw($source);
                break;
            default:
                import_sql($source);
                break;
        }
    } else {
        switch ($driver) {
            case 'pgsql':
                $tempfile_path = MODX_BASE_PATH . 'assets/backup/temp.php';
                file_put_contents($tempfile_path, file_get_contents($_FILES['sqlfile']['tmp_name']));

                $dump_request = 'PGPASSWORD="' . evo()->getDatabase()->getConfig('password') . '" psql --host ' .
                    evo()->getDatabase()->getConfig('host') . ' --username ' .
                    evo()->getDatabase()->getConfig('username') . ' --dbname ' . $dbase . ' < ' . $tempfile_path;
                exec($dump_request, $data, $data_second);
                unlink($tempfile_path);
                break;
            default:
                import_sql_from_file($_FILES['sqlfile']['tmp_name']);
                break;
        }
    }

    header('Location: index.php?r=9&a=93');
    exit;
} elseif ($mode == 'restore2') {
    $path = evo()->getConfig('snapshot_path') . $_POST['filename'];
    if (file_exists($path)) {
        switch ($driver) {
            case 'pgsql':

                $dump_request = 'PGPASSWORD="' . evo()->getDatabase()->getConfig('password') . '" psql --host ' .
                    evo()->getDatabase()->getConfig('host') . ' --username ' .
                    evo()->getDatabase()->getConfig('username') . ' --dbname ' . $dbase . ' < ' . $path;
                exec($dump_request, $data, $data_second);

                break;
            default :
                import_sql_from_file($path);
                break;
        }
        if (headers_sent()) {
            echo "<script>document.location.href='index.php?r=9&a=93';</script>\n";
        } else {
            header('Location: index.php?r=9&a=93');
        }
    }

    exit;
} elseif ($mode == 'backup') {
    $tables = $_POST['chk'] ?? '';
    if (!is_array($tables)) {
        evo()->webAlertAndQuit('Please select a valid table from the list below.');
    }

    /*
    * Code taken from Ralph A. Dahlgren MySQLdumper Snippet - Etomite 0.6 - 2004-09-27
    * Modified by Raymond 3-Jan-2005
    * Perform MySQLdumper data dump
    */

    @set_time_limit(120); // set timeout limit to 2 minutes
    switch ($driver) {
        case 'pgsql':
            $tempfile_path = MODX_BASE_PATH . 'assets/backup/temp.php';
            $clean = '';
            if ($_POST['droptables'] == 'on') {
                $clean = '--clean';
            }
            $table_str = ' -t ' . implode(' -t ', $tables);

            $dump_request = 'pg_dump postgresql://' . evo()->getDatabase()->getConfig('username') . ':' .
                evo()->getDatabase()->getConfig('password') . '@' . evo()->getDatabase()->getConfig('host') . '/' .
                $dbase . ' --clean --inserts --no-owner --no-privileges ' . $table_str . '> ' . $tempfile_path;

            exec($dump_request, $data, $data_second);
            dumpSql($tempfile_path);

            break;
        default:
            $dumper = new \EvolutionCMS\Support\MysqlDumper($dbase);
            $dumper->setDBtables($tables);

            $dumper->setDroptables(isset($_POST['droptables']));
            $dumpfinished = $dumper->createDump('dumpSql');
            if ($dumpfinished) {
                exit;
            } else {
                evo()->webAlertAndQuit('Unable to Backup Database');
            }
            break;
    }
// MySQLdumper class can be found below
} elseif ($mode == 'snapshot') {
    if (!is_dir(rtrim(evo()->getConfig('snapshot_path'), '/'))) {
        mkdir(rtrim(evo()->getConfig('snapshot_path'), '/'));
        @chmod(rtrim(evo()->getConfig('snapshot_path'), '/'), 0777);
    }
    if (!is_file(evo()->getConfig('snapshot_path') . '.htaccess')) {
        $htaccess = "order deny,allow\ndeny from all\n";
        file_put_contents(evo()->getConfig('snapshot_path') . '.htaccess', $htaccess);
    }
    if (!is_writable(rtrim(evo()->getConfig('snapshot_path'), '/'))) {
        evo()->webAlertAndQuit(
            parsePlaceholder(
                __('global.bkmgr_alert_mkdir'),
                ['snapshot_path' => evo()->getConfig('snapshot_path')]
            )
        );
    }
    $dumpfinished = false;
    $today = date('Y-m-d_H-i-s');
    global $path;
    $path = evo()->getConfig('snapshot_path') . "$today.sql";
    switch ($driver) {
        case 'pgsql':
//            $lf = "\n";
//            $version = evo()->getVersionData();
//            $output = "# " . addslashes(evo()->getPhpCompat()->entities(evo()->getConfig('site_name'))) . " Database Dump{$lf}";
//            $output .= "# Evolution CMS Version:{$version['version']}{$lf}";
//            $output .= "# {$lf}";
//            $output .= "# Host: {evo()->getDatabase()->getConfig('host')}{$lf}";
//            $output .= "# Generation Time: " . evo()->toDateFormat(time()) . $lf;
//            $output .= "# Server version: " . evo()->getDatabase()->getVersion() . $lf;
//            $output .= "# PHP Version: " . phpversion() . $lf;
//            $output .= "# Database: `{evo()->getDatabase()->getConfig('database')}`{$lf}";
//            $output .= "# Description: " . trim($_REQUEST['backup_title']) . "{$lf}";
//            $output .= "#";
            $dump_request = 'pg_dump postgresql://' . evo()->getDatabase()->getConfig('username') . ':' .
                evo()->getDatabase()->getConfig('password') . '@' . evo()->getDatabase()->getConfig('host') . '/' .
                $dbase . ' --clean --inserts --no-owner --no-privileges > ' . $path;

            exec($dump_request, $data, $data_second);
            if ($data_second == 0) {
                $output = file_get_contents($path);
                file_put_contents($path, $output);
                $dumpfinished = true;
            }
            break;
        default:
            $sql = "SHOW TABLE STATUS FROM `$dbase` LIKE '" .
                evo()->getDatabase()->escape(evo()->getDatabase()->getConfig('prefix')) . "%'";
            $rs = evo()->getDatabase()->query($sql);
            $tables = evo()->getDatabase()->getColumn('Name', $rs);

            @set_time_limit(120); // set timeout limit to 2 minutes
            $dumper = new \EvolutionCMS\Support\MysqlDumper($dbase);
            $dumper->setDBtables($tables);
            $dumper->setSnapshotFile($path);
            $dumper->setDroptables(true);
            $dumpfinished = $dumper->createDump('snapshot');

            $pattern = evo()->getConfig('snapshot_path') . '*.sql';
            $files = glob($pattern, GLOB_NOCHECK);
            $total = ($files[0] !== $pattern) ? count($files) : 0;
            $limit = 0;
            arsort($files);
            while (10 < $total && $limit < 50) {
                $del_file = array_pop($files);
                unlink($del_file);
                $total = count($files);
                $limit++;
            }
            break;
    }

    if ($dumpfinished) {
        $_SESSION['result_msg'] = 'snapshot_ok';
        header('Location: index.php?a=93');
        exit;
    } else {
        evo()->webAlertAndQuit('Unable to Backup Database');
    }
} else {
    include_once MODX_MANAGER_PATH . 'includes/header.inc.php';  // start normal header
}

if (isset($_SESSION['result_msg']) && $_SESSION['result_msg'] != '') {
    switch ($_SESSION['result_msg']) {
        case 'import_ok':
            $ph['result_msg_import'] =
                '<div class="alert alert-success">' . __('global.bkmgr_import_ok') . '</div>';
            $ph['result_msg_snapshot'] =
                '<div class="alert alert-success">' . __('global.bkmgr_import_ok') . '</div>';
            break;
        case 'snapshot_ok':
            $ph['result_msg_import'] = '';
            $ph['result_msg_snapshot'] =
                '<div class="alert alert-success">' . __('global.bkmgr_snapshot_ok') . '</div>';
            break;
    }
    $_SESSION['result_msg'] = '';
} else {
    $ph['result_msg_import'] = '';
    $ph['result_msg_snapshot'] = '';
}
?>
    <script>
      var actions = {
        cancel: function () {
          documentDirty = false
          document.location.href = 'index.php?a=2'
        }
      }

      function selectAll () {
        var f = document.forms['frmdb']
        var c = f.elements['chk[]']
        for (var i = 0; i < c.length; i++) {
          c[i].checked = f.chkselall.checked
        }
      }

      function backup () {
        var f = document.forms['frmdb']
        f.mode.value = 'backup'
        f.target = 'fileDownloader'
        f.submit()
        return false
      }

      function confirmRevert (filename) {
        var m = '<?= __('global.bkmgr_restore_confirm') ?>'
        m = m.replace('[+filename+]', filename)
        if (confirm(m) === true) {
          document.restore2.filename.value = filename
          document.restore2.save.click()
        }
      }

      function showhide (a) {
        var f = document.getElementById('sqlfile')
        var t = document.getElementById('textarea')
        if (a === 'file') {
          f.style.display = 'block'
          t.style.display = 'none'
        } else {
          t.style.display = 'block'
          f.style.display = 'none'
        }
      }

      <?= (isset($_REQUEST['r']) ? ' doRefresh(' . $_REQUEST['r'] . ');' : '') ?>
    </script>

    <h1>
        <i class="<?= ManagerTheme::getStyle('icon_database') ?>"></i><?= __('global.bk_manager') ?>
    </h1>

<?= ManagerTheme::getStyle('actionbuttons.static.cancel') ?>

    <div class="tab-pane" id="dbmPane">
        <script>
          tpDBM = new WebFXTabPane(document.getElementById('dbmPane'))
        </script>

        <div class="tab-page" id="tabBackup">
            <h2 class="tab"><?= __('global.backup') ?></h2>
            <script>tpDBM.addTabPage(document.getElementById('tabBackup'))</script>

            <div class="container container-body">
                <form name="frmdb" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="mode" value=""/>
                    <p>
                        <a href="javascript:;" class="btn btn-primary" onclick="backup();return false;">
                            <i class="<?= ManagerTheme::getStyle('icon_save') ?>"></i>
                            <?= __('global.database_table_clickbackup') ?>
                        </a>
                        <label>
                            <input type="checkbox" name="droptables" checked="checked"/>
                            <?= __('global.database_table_droptablestatements') ?>
                        </label>
                    </p>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table data nowrap">
                                <thead>
                                <tr>
                                    <td>
                                        <label class="form-check form-check-label">
                                            <input type="checkbox"
                                                   name="chkselall"
                                                   class="form-check-input"
                                                   onclick="selectAll();"
                                                   title="Select All Tables"/>
                                            <?= __('global.database_table_tablename') ?>
                                        </label>
                                    </td>
                                    <td width="1%"></td>
                                    <td class="text-xs-center">
                                        <?= __('global.database_table_records') ?>
                                    </td>
                                    <td class="text-xs-center">
                                        <?= __('global.database_collation') ?>
                                    </td>
                                    <td class="text-xs-center">
                                        <?= __('global.database_table_datasize') ?>
                                    </td>
                                    <td class="text-xs-center">
                                        <?= __('global.database_table_overhead') ?>
                                    </td>
                                    <td class="text-xs-center">
                                        <?= __('global.database_table_effectivesize') ?>
                                    </td>
                                    <td class="text-xs-center">
                                        <?= __('global.database_table_indexsize') ?>
                                    </td>
                                    <td class="text-xs-center">
                                        <?= __('global.database_table_totalsize') ?>
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $prefix = evo()->getDatabase()->escape(evo()->getDatabase()->getConfig('prefix'));

                                switch (evo()->getDatabase()->getConfig()['driver']) {
                                    case 'pgsql':
                                        $sql = "SELECT *, tablename as Name
                 FROM pg_catalog.pg_tables WHERE
            schemaname != 'information_schema' AND tablename LIKE '%" . $prefix . "%'";

                                        $array = evo()->getDatabase()->makeArray(
                                            evo()->getDatabase()->query($sql)
                                        );
                                        break;

                                    case 'mysql':
                                        $q = evo()->getDatabase()->query(
                                            "SHOW VARIABLES LIKE 'information_schema_stats_expiry'"
                                        );
                                        $mysql8 = evo()->getDatabase()->getRow($q);
                                        if ($mysql8) {
                                            evo()->getDatabase()->query(
                                                "SET @STATS_EXPIRY = @@SESSION.information_schema_stats_expiry, @@SESSION.information_schema_stats_expiry = 0"
                                            );
                                        }

                                        $sql =
                                            'SHOW TABLE STATUS FROM `' . evo()->getDatabase()->getConfig('database') .
                                            '` LIKE "' . $prefix . '%"';
                                        $array = evo()->getDatabase()->makeArray(
                                            evo()->getDatabase()->query($sql)
                                        );

                                        if ($mysql8) {
                                            evo()->getDatabase()->query(
                                                "SET @@SESSION.information_schema_stats_expiry = @STATS_EXPIRY"
                                            );
                                        }
                                        break;
                                    default:
                                        $array = [];
                                        break;
                                }
                                $i = 0;
                                $total = 0;
                                $totaloverhead = 0;
                                foreach ($array as $db_status) {
                                    if (isset($db_status['tablename'])) {
                                        $db_status['Name'] = $db_status['tablename'];
                                    }
                                    if (isset($tables)) {
                                        $table_string = implode(',', $tables);
                                    } else {
                                        $table_string = '';
                                    }

                                    echo '<tr>' . "\n" .
                                        '<td><label class="form-check form-check-label"><input type="checkbox" name="chk[]" class="form-check-input" value="' .
                                        $db_status['Name'] . '"' .
                                        (strstr($table_string, $db_status['Name']) === false ? ''
                                            : ' checked="checked"') . ' /><b class="text-primary">' .
                                        $db_status['Name'] . '</b></label></td>' . "\n";
                                    echo '<td class="text-xs-center">' .
                                        (!empty($db_status['Comment']) ? '<i class="' . ManagerTheme::getStyle('icon_info_circle') .
                                            '" data-tooltip="' . $db_status['Comment'] . '"></i>' : '') . '</td>' .
                                        "\n";
                                    echo '<td class="text-xs-right">' . $db_status['Rows'] . '</td>' . "\n";
                                    echo '<td class="text-xs-right">' . $db_status['Collation'] . '</td>' . "\n";

                                    // Enable record deletion for certain tables (TRUNCATE TABLE) if they're not already empty
                                    $truncateable = [
                                        evo()->getDatabase()->getConfig('prefix') . 'event_log',
                                        evo()->getDatabase()->getConfig('prefix') . 'manager_log',
                                    ];
                                    if (evo()->hasPermission('settings') &&
                                        in_array($db_status['Name'], $truncateable) && $db_status['Rows'] > 0
                                    ) {
                                        echo '<td class="text-xs-right"><a class="text-danger" href="index.php?a=54&mode=93&u=' .
                                            $db_status['Name'] . '" title="' .
                                            __('global.truncate_table') . '">' .
                                            nicesize($db_status['Data_length'] + $db_status['Data_free']) . '</a>' .
                                            '</td>' . "\n";
                                    } else {
                                        echo '<td class="text-xs-right">' .
                                            nicesize($db_status['Data_length'] + $db_status['Data_free']) . '</td>' .
                                            "\n";
                                    }

                                    if (evo()->hasPermission('settings')) {
                                        echo '<td class="text-xs-right">' . ($db_status['Data_free'] > 0
                                                ? '<a class="text-danger" href="index.php?a=54&mode=93&t=' .
                                                $db_status['Name'] . '" title="' .
                                                __('global.optimize_table') . '">' .
                                                nicesize($db_status['Data_free']) . '</a>' : '-') . '</td>' . "\n";
                                    } else {
                                        echo '<td class="text-xs-right">' .
                                            ($db_status['Data_free'] > 0 ? nicesize($db_status['Data_free']) : '-') .
                                            '</td>' . "\n";
                                    }

                                    echo '<td class="text-xs-right">' .
                                        nicesize($db_status['Data_length'] - $db_status['Data_free']) . '</td>' . "\n" .
                                        '<td class="text-xs-right">' . evo()->nicesize($db_status['Index_length']) .
                                        '</td>' . "\n" . '<td class="text-xs-right">' . evo()->nicesize(
                                            $db_status['Index_length'] + $db_status['Data_length'] +
                                            $db_status['Data_free']
                                        ) . '</td>' . "\n" . "</tr>";

                                    $total += $db_status['Index_length'] + $db_status['Data_length'];
                                    $totaloverhead += $db_status['Data_free'];
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td class="text-xs-right"><?= __('global.database_table_totals') ?></td>
                                    <td colspan="4">&nbsp;</td>
                                    <td class="text-xs-right"><?= $totaloverhead > 0 ? '<b class="text-danger">' .
                                            nicesize($totaloverhead) . '</b><br />(' . number_format($totaloverhead) .
                                            ' B)' : '-' ?></td>
                                    <td colspan="2">&nbsp;</td>
                                    <td class="text-xs-right"><?= '<b>' . nicesize($total) . '</b><br />(' .
                                        number_format($total) . ' B)' ?></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <?php
                    if ($totaloverhead > 0) { ?>
                        <br>
                        <p class="alert alert-danger"><?= __('global.database_overhead') ?></p>
                        <?php
                    } ?>
                </form>
            </div>
        </div>
        <!-- This iframe is used when downloading file backup file -->
        <iframe name="fileDownloader" width="1" height="1" style="display:none; width:1px; height:1px;"></iframe>
        <div class="tab-page" id="tabRestore">
            <h2 class="tab"><?= __('global.bkmgr_restore_title') ?></h2>
            <script>tpDBM.addTabPage(document.getElementById('tabRestore'))</script>

            <div class="container container-body">
                <?= $ph['result_msg_import'] ?>
                <div class="element-edit-message-tab alert alert-warning">
                    <?= __('global.bkmgr_restore_msg') ?>
                </div>
                <form method="post" name="mutate" enctype="multipart/form-data" action="index.php">
                    <?= csrf_field() ?>
                    <input type="hidden" name="a" value="93"/>
                    <input type="hidden" name="mode" value="restore1"/>
                    <?php
                    if (!empty($_SESSION['textarea'])) {
                        $value = $_SESSION['textarea'];
                        unset($_SESSION['textarea']);
                        $_SESSION['console_mode'] = 'text';
                        $f_display = 'none';
                        $t_display = 'block';
                    } else {
                        $value = '';
                        $_SESSION['console_mode'] = 'file';
                        $f_display = 'block';
                        $t_display = 'none';
                    }

                    if (isset($_SESSION['last_result'])) {
                        $last_result = $_SESSION['last_result'];
                        unset($_SESSION['last_result']);
                        if (count($last_result) < 1) {
                            $result = '';
                        } else {
                            $last_result = array_merge([], array_diff($last_result, ['']));
                            foreach ($last_result['0'] as $k => $v) {
                                $title[] = $k;
                            }
                            $result = '<thead><tr><th>' . implode('</th><th>', $title) . '</th></tr></thead>';
                            $result .= '<tbody>';
                            foreach ($last_result as $row) {
                                $result_value = [];
                                if ($row) {
                                    foreach ($row as $k => $v) {
                                        $result_value[] = $v;
                                    }
                                    $result .= '<tr><td>' . implode('</td><td>', $result_value) . '</td></tr>';
                                }
                            }
                            $result .= '</tbody>';
                            $result = '<table class="table data">' . $result . '</table>';
                        }
                    }

                    function checked($cond)
                    {
                        if ($cond) {
                            return ' checked';
                        }
                    }

                    ?>
                    <p>
                        <label><input type="radio" name="sel"
                                      onclick="showhide('file');" <?= checked(
                                !isset($_SESSION['console_mode']) || $_SESSION['console_mode'] !== 'text'
                            ) ?> /> <?= __('global.bkmgr_run_sql_file_label') ?>
                        </label>
                        <label><input type="radio" name="sel"
                                      onclick="showhide('textarea');" <?= checked(
                                isset($_SESSION['console_mode']) && $_SESSION['console_mode'] === 'text'
                            ) ?> /> <?= __('global.bkmgr_run_sql_direct_label') ?>
                        </label>
                    </p>
                    <div class="form-group"><input type="file" name="sqlfile" id="sqlfile"
                                                   style="display:<?= $f_display ?>;"/></div>
                    <div id="textarea" style="display:<?= $t_display ?>;">
                        <textarea name="textarea" rows="10"><?= $value ?></textarea>
                    </div>
                    <a href="javascript:;" class="btn btn-primary" onclick="document.mutate.save.click();"> <i
                                class="<?= ManagerTheme::getStyle('icon_save') ?>"></i> <?= __('global.bkmgr_run_sql_submit') ?></a>
                    <input type="submit" name="save" style="display:none;"/>
                </form>
                <?php
                if (isset($result)): ?>
                    <b><?= __('global.bkmgr_run_sql_result') ?></b>
                    <div class="row">
                        <div class="table-responsive"><?= $result ?></div>
                    </div>
                <?php
                endif; ?>
            </div>
        </div>

        <div class="tab-page" id="tabSnapshot">
            <h2 class="tab"><?= __('global.bkmgr_snapshot_title') ?></h2>
            <script>tpDBM.addTabPage(document.getElementById('tabSnapshot'))</script>

            <div class="container container-body">
                <?= $ph['result_msg_snapshot'] ?>
                <div class="element-edit-message-tab alert alert-warning">
                    <?= parsePlaceholder(
                        __('global.bkmgr_snapshot_msg'),
                        ['snapshot_path' => "snapshot_path={evo()->getConfig('snapshot_path')}"]
                    ) ?>
                </div>
                <form method="post" name="snapshot" action="index.php">
                    <?= csrf_field() ?>
                    <input type="hidden" name="a" value="93"/>
                    <input type="hidden" name="mode" value="snapshot"/>
                    <?= __('global.description') ?>
                    <div class="form-group input-group">
                        <input type="text" name="backup_title" class="form-control" maxlength="350"/>
                        <div class="input-group-btn">
                            <a href="javascript:;" class="btn btn-success" onclick="document.snapshot.save.click();">
                                <i class="<?= ManagerTheme::getStyle('icon_save') ?>"></i>
                                <?= __('global.bkmgr_snapshot_submit') ?>
                            </a>
                        </div>
                    </div>
                    <input type="submit" name="save" style="display:none;"/>
                </form>
                <div>
                    <b><?= __('global.bkmgr_snapshot_list_title') ?></b>
                </div>
                <form method="post" name="restore2" action="index.php">
                    <?= csrf_field() ?>
                    <input type="hidden" name="a" value="93"/>
                    <input type="hidden" name="mode" value="restore2"/>
                    <input type="hidden" name="filename" value=""/>
                    <?php
                    $pattern = evo()->getConfig('snapshot_path') . '*.sql';
                    $files = glob($pattern, GLOB_NOCHECK);
                    $total = ($files[0] !== $pattern) ? count($files) : 0;
                    $detailFields = [
                        'Evolution CMS Version',
                        'Host',
                        'Generation Time',
                        'Server version',
                        'PHP Version',
                        'Database',
                        'Description',
                    ];
                    if (is_array($files) && 0 < $total) {
                        ?>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table data nowrap">
                                    <thead>
                                    <tr>
                                        <th><?= __('global.files_filename') ?></th>
                                        <th width="1%"></th>
                                        <th><?= __('global.files_filesize') ?></th>
                                        <th><?= __('global.description') ?></th>
                                        <th><?= __('global.modx_version') ?></th>
                                        <th><?= __('global.database_name') ?></th>
                                        <th width="1%"><?= __('global.onlineusers_action') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    arsort($files);
                                    while ($file = array_shift($files)) {
                                        $filename = substr($file, strrpos($file, '/') + 1);
                                        $filesize = nicesize(filesize($file));

                                        $file = fopen($file, "r");
                                        $count = 0;
                                        $details = [];
                                        while ($count < 11) {
                                            $line = fgets($file);
                                            foreach ($detailFields as $label) {
                                                $fileLabel = '# ' . $label;
                                                if (strpos($line, $fileLabel) !== false) {
                                                    $details[$label] = htmlentities(
                                                        trim(
                                                            str_replace([
                                                                $fileLabel,
                                                                ':',
                                                                '`',
                                                            ], '', $line)
                                                        ),
                                                        ENT_QUOTES,
                                                        ManagerTheme::getCharset()
                                                    );
                                                }
                                            }
                                            $count++;
                                        };
                                        fclose($file);

                                        $tooltip = 'Generation Time: ' . $details['Generation Time'] . "\n";
                                        $tooltip .= 'Server version: ' . $details['Server version'] . "\n";
                                        $tooltip .= 'PHP Version: ' . $details['PHP Version'] . "\n";
                                        $tooltip .= 'Host: ' . $details['Host'] . "\n";
                                        ?>
                                        <tr>
                                            <td><?= $filename ?></td>
                                            <td><i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                                   data-tooltip="<?= $tooltip ?>"></i></td>
                                            <td><?= $filesize ?></td>
                                            <td><?= $details['Description'] ?></td>
                                            <td><?= $details['Evolution CMS Version'] ?></td>
                                            <td><?= $details['Database'] ?></td>
                                            <td>
                                                <a href="javascript:;" onclick="confirmRevert('<?= $filename ?>');"
                                                   title="<?= $tooltip ?>">
                                                    <?= __('global.bkmgr_restore_submit') ?>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                    } else {
                        echo __('global.bkmgr_snapshot_nothing');
                    }
                    ?>
                    <input type="submit" name="save" style="display:none;"/>
                </form>
            </div>
        </div>

    </div>
<?php

$tab = get_by_key($_GET, 'tab', false);
if (is_numeric($tab)) {
    echo '<script>tpDBM.setSelectedIndex( ' . $_GET['tab'] . ' );</script>';
}

include_once MODX_MANAGER_PATH . 'includes/footer.inc.php'; // send footer
?>

<?php

/**
 * @deprecated use EvolutionCMS\Support\MysqlDumper
 */
class Mysqldumper extends EvolutionCMS\Support\MysqlDumper
{
}
