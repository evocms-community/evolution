<?php
$lang = $modx->getConfig('lang_code');
$path = MODX_BASE_PATH . 'assets/plugins/aboutevo/lang/' . $lang . '.php';
if (file_exists($path)) {
    $links = include $path;
} else {
    $links = include MODX_BASE_PATH . 'assets/plugins/aboutevo/lang/en.php';
}
$body = '';
if(!empty($links)) {
    foreach ($links as $link) {
        $body .= '<span class="wm_button"><a href="' . $link['link'] . '" target="_blank"><i class="fa fa-2x fa-fw ' . $link['icon'] . '"></i><span>' . $link['title'] . '</span></a></span>';
    }
}
if(empty($body)) return;

$params = $modx->event->params;
$col_lg = isset($params["col_lg"]) ? (int)$params["col_lg"] : 6;
$menu_index = isset($params["col_lg"]) ? (int)$params["menu_index"] : 10;
$hide_menu = isset($params["hide_menu"]) ? (int)$params["hide_menu"] : 0;

$body .= "<style>
.widgets #about .wm_buttons {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding: 0;
    text-align: center;
}

.widgets #about .wm_button {
    max-width: 50%;
    min-width: 120px;
    flex: 0 0 50%
}

.widgets #about .wm_button a {
    display: block;
    height: 100%;
    padding: 1rem 1rem .5rem;
    text-decoration: none;
    color: #646b7b;
    box-shadow: none;
    transition-duration: .5s
}

.widgets #about .wm_button a:hover {
    color: #373b46;
    background-color: rgba(93,109,202,0.16)
}

.widgets #about .wm_button a .fa {
    display: inline-block
}

.widgets #about .wm_button a .fa + span {
    display: block;
    padding: .5em 0;
    line-height: 1em;
    font-size: .7rem;
    word-wrap: normal
}
@media (min-width: 568px) {
    .widgets #about .wm_button {
        max-width:25%;
        flex: 0 0 25%
    }
}

@media (min-width: 768px) {
    .widgets #about .wm_button {
        max-width:12.5%;
        flex: 0 0 12.5%
    }
}

@media (min-width: 992px) {
    .widgets #about .wm_button {
        max-width:25%;
        flex: 0 0 25%
    }
}

@media (min-width: 1400px) {
    .widgets #about .wm_button {
        max-width:12.5%;
        flex: 0 0 12.5%
    }
}</style>";
$body = '<div class="wm_buttons card-body">' . $body . '</div>';
$widgets['about'] = [
    'menuindex' => $menu_index,
    'id'        => 'about',
    'cols'      => 'col-lg-' . $col_lg,
    'icon'      => 'fa-info-circle',
    'title'     => '[%about_title%]',
    'body'      => $body,
    'hide'      => $hide_menu
];

$modx->event->addOutput(serialize($widgets));
