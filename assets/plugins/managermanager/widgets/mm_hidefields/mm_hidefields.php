<?php
/**
 * mm_hideFields
 * @version 1.2.1 (2018-04-03)
 * 
 * @desc A widget for ManagerManager plugin that allows one or more of the default document fields or template variables to be hidden within the manager.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo >= 1.1.
 * @uses MODXEvo.plugins.ManagerManager >= 0.7 {@link http://code.divandesign.biz/modx/managermanager }.
 * 
 * @param $params {array_associative|stdClass} — The object of params. @required
 * @param $params['fields'] {string_commaSeparated} — The name(s) of the document fields (or TVs) this should apply to. @required
 * @param $params['roles'] {string_commaSeparated} — The roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * @param $params['templates'] {string_commaSeparated} — Id of the templates to which this widget is applied (when this parameter is empty then widget is applied to the all templates). Default: ''.
 * 
 * @link http://code.divandesign.biz/modx/mm_hidefields/1.2.1
 * 
 * @copyright 2012–2018
 */

function mm_hideFields($params){
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
				'templates'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge([
// 		'fields' => '',
		'roles' => '',
		'templates' => ''
	], (array) $params);
	
	if (!useThisRule($params->roles, $params->templates)){return;}
	
	global $modx;
	$e = &$modx->Event;
	
	if ($e->name == 'OnDocFormRender'){
		$output = '//---------- mm_hideFields :: Begin -----'.PHP_EOL;
		
		$output .= '$j.ddMM.hideFields("'.$params->fields.'");'.PHP_EOL;
		
		$output .= '//---------- mm_hideFields :: End -----'.PHP_EOL;
		
		$e->output($output);
	}
}
?>