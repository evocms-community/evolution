<?php
/**
 * mm_default
 * @version 1.2.1 (2018-04-03)
 * 
 * @desc A widget for ManagerManager plugin that allows field (or TV) default value for a new document/folder to be set.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.plugins.ManagerManager >= 0.7 {@link http://code.divandesign.biz/modx/managermanager }.
 * @uses MODXEvo.plugins.ManagerManager.mm_ddSetFieldValue >= 1.2 {@link http://code.divandesign.biz/modx/mm_ddsetfieldvalue }.
 * 
 * @param $params {array_associative|stdClass} — The object of params. @required
 * @param $params['fields'] {string_commaSeparated} — The name(s) of the document fields (or TVs) for which value setting is required. @required
 * @param $params['value {string} — The default value for the field. The current date/time will be used for the fields equals 'pub_date' or 'unpup_date' with empty value. A static value can be supplied as a string, or PHP code (to calculate something) can be supplied if the eval parameter is set as true. Default: ''.
 * @param $params['roles'] {string_commaSeparated} — The roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * @param $params['templates'] {string_commaSeparated} — Id of the templates to which this widget is applied (when this parameter is empty then widget is applied to the all templates). Default: ''.
 * @param $params['needToEval'] {bollean} — Should the value be evaluated as PHP code? Default: false.
 * 
 * @event OnDocFormRender
 * 
 * @link http://code.divandesign.biz/modx/mm_default/1.2.1
 * 
 * @copyright 2012–2018
 */

function mm_default($params){
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
				'value',
				'roles',
				'templates',
				'needToEval'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge([
// 		'fields' => '',
		'value' => '',
		'roles' => '',
		'templates' => '',
		'needToEval' => false
	], (array) $params);
	
	if (!useThisRule($params->roles, $params->templates)){return;}
	
	global $modx;
	$e = &$modx->Event;
	
	// if we aren't creating a new document or folder, we don't want to do this
	// Which action IDs so we want to do this for?
	// 85 =
	// 4 =
	// 72 = Create new weblink
	if (!in_array(
		$modx->manager->action,
		['85', '4', '72']
	)){return;}
	
	if ($e->name == 'OnDocFormRender'){
		// What's the new value, and does it include PHP?
		if ($params->needToEval){$params->value = eval($params->value);}
		
		$output = '//---------- mm_default :: Begin -----'.PHP_EOL;
		
		mm_ddSetFieldValue($params);
		
		$output .= '//---------- mm_default :: End -----'.PHP_EOL;
		
		$e->output($output);
	}
}
?>