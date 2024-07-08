<?php

class DATEPICKER {
	function __construct() {
	}

	function getDP() {
		$modx = evolutionCMS();

		$tpl = file_get_contents(__DIR__ . '/datepicker.tpl');
		return $modx->parseText($tpl, __('global'), '[%', '%]');
	}
}
