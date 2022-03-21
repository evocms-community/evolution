<?php
if( ! defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.");
}
?>
<p></p>
<p>EVO 1.4.18 introduces PHP 8.1 support as well as some fixes and improvements.</p>
<ul class="small">
	<li>broken manager password recovery fixed;</li>
	<li>wrong base path constant definition fixed;</li>
	<li>XSS at some manager pages fixed.</li>
</ul>
