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

if (!class_exists('Laminas\Feed\Reader\Reader')) {
    require_once(MODX_MANAGER_PATH . 'media/rss/vendor/autoload.php');
}
$cache = new Laminas\Cache\Storage\Adapter\Filesystem();
$cache->getOptions()->setCacheDir(MODX_BASE_PATH . 'assets/cache/rss/')->setTtl(60 * 60);
Laminas\Feed\Reader\Reader::useHttpConditionalGet();
Laminas\Feed\Reader\Reader::setCache($cache);
// create Feed
foreach ($urls as $section => $url) {
    $output = '';
    try {
        $rss = Laminas\Feed\Reader\Reader::import($url);
        $output .= '<ul>';
        foreach ($rss as $i => $item) {
            if ($i == $itemsNumber) break;
            $href = $item->getLink();
            $title = $item->getTitle();
            $pubdate = $item->getDateModified();
            $pubdate = $modx->toDateFormat($pubdate->getTimestamp());
            $description = strip_tags($item->getContent());
            if (strlen($description) > 199) {
                $description = substr($description, 0, 200);
                $description .= '...<br />Read <a href="' . $href . '" target="_blank">more</a>.';
            }
            $output .= '<li><a href="' . $href . '" target="_blank">' . $title . '</a> - <b>' . $pubdate . '</b><br />' . $description . '</li>';
        }

        $output .= '</ul>';
        $feedData[$section] = $output;
    } catch (Laminas\Feed\Reader\Exception\RuntimeException $e) {
        // feed import failed
        $feedData[$section] = 'Failed to retrieve ' . $url . ': ' . $e->getMessage();
        continue;
    }
}
