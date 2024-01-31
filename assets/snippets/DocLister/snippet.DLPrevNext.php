<?php
if (! defined('MODX_BASE_PATH')) {
    die('HACK???');
}

$ID = $modx->documentIdentifier;
$params = array_merge($params, [
    'returnDLObject' => 1,
    'debug' => '0',
    'parents' => $parents ?? $modx->documentObject['parent'],
]);
$loop = $loop ?? 0;
$dl = $modx->runSnippet("DocLister", array_merge($params, ['selectFields' => 'c.id']));
$children = $dl->getDocs();

if(count($children) < 2) return isset($api) && $api == 1 ? [] : '';

$self = $prev = $next = null;
foreach ($children as $key => $data) {
    if (! empty($self)) {
        $next = $key;
        break;
    }
    if ($key == $ID) {
        $self = $key;
        if (empty($prev) && $loop != '0') {
            $prev = end($children);
            $prev = $prev['id'];
        }
    } else {
        $prev = $key;
    }
}
if (empty($next) && $loop != '0') {
    reset($children);
    $next = current($children);
    $next = $next['id'];
}
if ($next == $prev) {
    $next = '';
}

$dl->config->setConfig(array_merge($params, [
    'idType' => 'documents',
    'selectFields' => $params['selectFields'] ?? 'c.*'
]));
$dl->setIDs([$next, $prev]);
$children = $dl->getJSON($dl->getDocs($tvList ?? ''), ($api ?? 1));
$children = json_decode($children, true);

$prevnextTPL = $prevnextTPL ?? '@CODE: [+prev+] | [+next+]';
$prevTPL = $prevTPL ?? '@CODE: <a href="[+url+]">&larr; [+title+]</a>';
$nextTPL = $nextTPL ?? '@CODE: <a href="[+url+]">[+title+] &rarr;</a>';
if(isset($api) && $api == 1) {
    $out = ['prev' => empty($prev) ? '' : $children[$prev], 'next' => empty($next) ? '' : $children[$next]];
} else {
    $out = $dl->parseChunk($prevnextTPL, [
        'prev' => empty($prev) ? '' : $dl->parseChunk($prevTPL, $children[$prev]),
        'next' => empty($next) ? '' : $dl->parseChunk($nextTPL, $children[$next]),
    ]);
}

return $out;
