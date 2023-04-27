<?php
/**
 * mm_ddNumericFields
 * @version 1.2 (2016-11-20)
 * 
 * @desc A widget for ManagerManager plugin denying using any chars in TV fields but numeric.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.plugin.ManagerManager >= 0.7.
 * 
 * @param $params {array_associative|stdClass} — The object of params. @required
 * @param $params['fields'] {string_commaSeparated} — TV names to which the widget is applied. @required
 * @param $params['allowFloat'] {boolean} — Float number availability status (true — float numbers may be used, false — float numbers using is not available). Default: true.
 * @param $params['decimals'] {integer} — Number of chars standing after comma (0 — any). Default: 0.
 * @param $params['roles'] {string_commaSeparated} — The roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * @param $params['templates'] {string_commaSeparated} — Id of the templates to which this widget is applied. Default: ''.
 * 
 * @link http://code.divandesign.biz/modx/mm_ddnumericfields/1.2
 * 
 * @copyright 2012–2016 DivanDesign {@link http://www.DivanDesign.biz }
 */

function mm_ddNumericFields($params){
	//For backward compatibility
	if (
		!is_array($params) &&
		!is_object($params)
	){
		//Convert ordered list of params to named
		$params = ddTools::orderedParamsToNamed([
			'paramsList' => func_get_args(),
			'compliance' => [
				'fields',
				'roles',
				'templates',
				'allowFloat',
				'decimals'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge([
// 		'fields' => '',
		'allowFloat' => true,
		'decimals' => 0,
		'roles' => '',
		'templates' => ''
	], (array) $params);
	
	global $modx;
	$e = &$modx->Event;
	
	if (
		$e->name == 'OnDocFormRender' &&
		useThisRule($params->roles, $params->templates)
	){
		$params->fields = getTplMatchedFields($params->fields);
		if ($params->fields == false){return;}
		
		$output = '';
		
		$output .= '//---------- mm_ddNumericFields :: Begin -----'.PHP_EOL;
		
		$output .=
'
$j.ddMM.getFieldElems({fields: "'.implode(',', $params->fields).'"}).ddNumeric({
	allowFloat: '.intval($params->allowFloat).',
	decimals: '.intval($params->decimals).'
});
';
		
		$output .= '//---------- mm_ddNumericFields :: End -----'.PHP_EOL;
		
		$e->output($output);
	}
}
?>