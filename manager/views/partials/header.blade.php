<?php

use EvolutionCMS\Facades\ManagerTheme;
use Tracy\Debugger;

?><!DOCTYPE html>
<html lang="{{ ManagerTheme::getLang() }}" dir="{{ ManagerTheme::getTextDir() }}">
<head>
    <title>Evolution CMS</title>
    <base href="{{ MODX_MANAGER_URL }}">
    <meta http-equiv="Content-Type" content="text/html; charset={{ ManagerTheme::getCharset() }}"/>
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width"/>
    <meta name="theme-color" content="#1d2023"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    @if(class_exists(Debugger::class) && evo()->get('config')->get('tracy.active'))
        {!! Debugger::renderLoader() !!}
    @endif
    <link rel="stylesheet" type="text/css" href="{{ ManagerTheme::css() }}"/>
    <script src="media/script/tabpane.js"></script>
    <script src="{{ evo()->getConfig('mgr_jquery_path') }}"></script>
    @if (evo()->getConfig('show_picker') === true)
        <script src="{{ ManagerTheme::getThemeUrl() }}/js/color.switcher.js"></script>
    @endif

    {!! ManagerTheme::getMainFrameHeaderHTMLBlock() !!}

    <script>
      if (!evo) {
        var evo = {}
      }
      if (!evo.config) {
        evo.config = {}
      }
      var actions,
        actionStay = [],
        dontShowWorker = false,
        documentDirty = false,
        timerForUnload,
        managerPath = ''

      evo.lang = {!! json_encode(Illuminate\Support\Arr::only(
            ManagerTheme::getLexicon(),
            ['saving', 'error_internet_connection', 'warning_not_saved']
        )) !!};
      evo.style = {!! json_encode(Illuminate\Support\Arr::only(
            ManagerTheme::getStyle(),
            ['icon_file', 'icon_pencil', 'icon_reply', 'icon_plus']
        )) !!};
      evo.MODX_MANAGER_URL = '{{  MODX_MANAGER_URL }}'
      evo.config.which_browser = '{{ evo()->getConfig('which_browser') }}'
    </script>
    <script src="media/script/main.js"></script>

    @if(!empty($elementType))
        <script>
          // Trigger unlock when leaving window
          var form_save = false

          window.addEventListener('unload', unlockThisElement, false)

          function unlockThisElement () {
            var stay = document.getElementById('stay')
            // Trigger unlock
            if ((stay && stay.value !== '2') || !form_save) {
              var url = '<?php
                             echo MODX_MANAGER_URL; ?>?a=67&type={{ $elementType }}&id={{ $data->getKey() }}&o=' +
                Math.random()
              if (navigator.sendBeacon) {
                navigator.sendBeacon(url)
              } else {
                var xhr = new XMLHttpRequest()
                xhr.open('GET', url, false)
                xhr.send()
              }
              if (top.mainMenu) top.mainMenu.reloadtree()
            }
          }
        </script>
    @endif

    @if (get_by_key($_REQUEST, 'r', '', 'is_numeric'))
        <script>doRefresh({{ $_REQUEST['r'] }})</script>
    @endif
    @stack('scripts.top')
    {!! evo()->getRegisteredClientStartupScripts() !!}
</head>

<body class="{{ ManagerTheme::getTextDir() }} {{ ManagerTheme::getThemeStyle() }}" data-evocp="color">
