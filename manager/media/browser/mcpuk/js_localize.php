<?php

/** This file is part of KCFinder project
  *
  *      @desc Load language labels into JavaScript
  *   @package KCFinder
  *   @version 2.54
  *    @author Pavel Tzonkov <sunhater@sunhater.com>
  * @copyright 2010-2014 KCFinder Project
  *   @license http://www.opensource.org/licenses/gpl-2.0.php GPLv2
  *   @license http://www.opensource.org/licenses/lgpl-2.1.php LGPLv2
  *      @link http://kcfinder.sunhater.com
  */

require "core/autoload.php";
$input = new input();
if (!isset($input->get['lng']) || ($input->get['lng'] == 'en')) {
    header("Content-Type: text/javascript");
    die;
}
$file = "lang/" . $input->get['lng'] . ".php";
$files = dir::content("lang", [
    'types' => "file",
    'pattern' => '/^.*\.php$/'
]);
if (!in_array($file, $files)) {
    header("Content-Type: text/javascript");
    die;
}
$mtime = @filemtime($file);
if ($mtime) httpCache::checkMTime($mtime);
require $file;
header("Content-Type: text/javascript; charset={$lang['_charset']}");
foreach ($lang as $english => $native)
    if (substr($english, 0, 1) != "_")
        echo "browser.labels['" . text::jsValue($english) . "']=\"" . text::jsValue($native) . "\";";
