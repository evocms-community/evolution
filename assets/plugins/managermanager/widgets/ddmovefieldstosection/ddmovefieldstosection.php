<?php
/** 
 * mm_ddMoveFieldsToSection
 * @version 1.1 (2016-11-16)
 * 
 * @desc Widget allows document fields & TVs to be moved in an another section. However you can’t move the following fields: keywords, metatags, which_editor, show_in_menu, menuindex.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.plugin.ManagerManager >= 0.7.
 * 
 * @param $params {array_associative|stdClass} — The object of params. @required
 * @param $params['fields'] {string_commaSeparated} — The name(s) of the document fields (or TVs) this should apply to. @required
 * @param $params['sectionId'] {string} — The ID of the section which the fields should be moved to. @required
 * @param $params['roles'] {string_commaSeparated} — The roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * @param $params['templates'] {string_commaSeparated} — Id of the templates to which this widget is applied (when this parameter is empty then widget is applied to the all templates). Default: ''.
 * 
 * @link http://code.divandesign.biz/modx/mm_movefieldstosection/1.1
 * 
 * @copyright 2013–2016 DivanDesign {@link http://www.DivanDesign.biz }
 */

function mm_ddMoveFieldsToSection($params){
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
				'sectionId',
				'roles',
				'templates'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge([
// 		'fields' => '',
// 		'sectionId' => '',
		'roles' => '',
		'templates' => ''
	], (array) $params);
	
	global $modx;
	$e = &$modx->Event;
	
	if (
		$e->name == 'OnDocFormRender' &&
		useThisRule($params->roles, $params->templates)
	){
		$output = '//---------- mm_ddMoveFieldsToSection :: Begin -----'.PHP_EOL;
		
		$output .= '$j.ddMM.moveFields("'.$params->fields.'", "'.prepareSectionId($params->sectionId).'_body");'.PHP_EOL;
		
		$output .= '//---------- mm_ddMoveFieldsToSection :: End -----'.PHP_EOL;
		
		$e->output($output);
	}
}
?>