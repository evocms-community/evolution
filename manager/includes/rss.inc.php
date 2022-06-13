<?php
/*
*  MODX Manager Home Page Implmentation by pixelchutes (www.pixelchutes.com)
*  Based on kudo's kRSS Module v1.0.72
*
*  Written by: kudo, based on MagpieRSS
*  Contact: kudo@kudolink.com
*  Created: 11/05/2006 (November 5)
*  For: MODX cms (modx.com)
*  Name: kRSS
*  Version (MODX Module): 1.0.72
*  Version (Magpie): 0.72
*/

/* Configuration
---------------------------------------------- */
// Here you can set the urls to retrieve the RSS from. Simply add a $urls line following the numbering progress in the square brakets.

$urls['modx_news_content'] = $rss_url_news;
$urls['modx_security_notices_content'] = $rss_url_security;

// How many items per Feed?
$itemsNumber = '3';

/* End of configuration
NO NEED TO EDIT BELOW THIS LINE
---------------------------------------------- */

if (!class_exists('SimplePie\SimplePie')) {
    require_once(MODX_MANAGER_PATH . 'media/rss/vendor/autoload.php');
}
$feed = new SimplePie\SimplePie();
$feedCache = MODX_BASE_PATH . 'assets/cache/rss';
if (!is_dir($feedCache)) {
    @mkdir($feedCache, intval($modx->getConfig('new_folder_permissions'), 8), true);
}
$feed->set_cache_location($feedCache);
// create Feed
foreach ($urls as $section => $url) {
    $output = '';
    $feed->set_feed_url($url);
    $feed->init();
    $items = $feed->get_items(0, $itemsNumber);
    if (empty($items)) {
        $feedData[$section] = 'Failed to retrieve ' . $url;
        continue;
    }
    $output .= '<ul>';
    foreach ($items as $item) {
        $href = $item->get_link();
        $title = $item->get_title();
        $pubdate = $item->get_date();
        $pubdate = $modx->toDateFormat(strtotime($pubdate));
        $description = strip_tags($item->get_content());
        if (strlen($description) > 199) {
            $description = substr($description, 0, 200);
            $description .= '...<br />Read <a href="' . $href . '" target="_blank">more</a>.';
        }
        $output .= '<li><a href="' . $href . '" target="_blank">' . $title . '</a> - <b>' . $pubdate . '</b><br />' . $description . '</li>';
    }

    $output .= '</ul>';
    $feedData[$section] = $output;
}
