<?php
/** 
 * mm_ddCreateSection
 * @version 1.1 (2016-11-15)
 * 
 * @desc A widget for ManagerManager plugin that allows to create a new custom section within the document editing page.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.plugin.ManagerManager >= 0.7.
 * 
 * @param $params {array_associative|stdClass} — The object of params. @required
 * @param $params['sectionId'] {string} — A unique ID for this section. @required
 * @param $params['sectionTitle'] {string} — The display name of the new section. Default: $params['sectionId'].
 * @param $params['tabId'] {string} — The ID of the tab which the section should be inserted to. Can be one of the default tab IDs or a new custom tab created with mm_createTab. Default: 'general'.
 * @param $params['roles'] {string_commaSeparated} — The roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * @param $params['templates'] {string_commaSeparated} — Id of the templates to which this widget is applied (when this parameter is empty then widget is applied to the all templates). Default: ''.
 * 
 * @link http://code.divandesign.biz/modx/mm_ddcreatesection/1.1
 * 
 * @copyright 2013–2016 DivanDesign {@link http://www.DivanDesign.biz }
 */

function mm_ddCreateSection($params){
	//For backward compatibility
	if (
		!is_array($params) &&
		!is_object($params)
	){
		//Convert ordered list of params to named
		$params = ddTools::orderedParamsToNamed([
			'paramsList' => func_get_args(),
			'compliance' => [
				'sectionTitle',
				'sectionId',
				'tabId',
				'roles',
				'templates'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge([
		'sectionId' => '',
		'sectionTitle' => '',
		'tabId' => 'general',
		'roles' => '',
		'templates' => ''
	], (array) $params);
	
	global $modx;
	$e = &$modx->Event;
	
	if (
		$e->name == 'OnDocFormRender' &&
		useThisRule($params->roles, $params->templates) &&
		!empty($params->sectionId)
	){
		// We always put a JS comment, which makes debugging much easier
		$output = '//---------- mm_ddCreateSection :: Begin -----'.PHP_EOL;
		
		if ($params->sectionTitle == ''){$params->sectionTitle = $params->sectionId;}
		
		$params->sectionId = prepareSectionId($params->sectionId);
		$params->tabId = prepareTabId($params->tabId);
		
		$section = '
<div class="sectionHeader" id="'.$params->sectionId.'_header">'.$params->sectionTitle.'</div>
<div class="sectionBody" id="'.$params->sectionId.'_body"><table style="position:relative;" border="0" cellspacing="0" cellpadding="3" width="100%"></table></div>
		';
		//tabGeneral
		// Clean up for js output
		$section = str_replace(["\n", "\t", "\r"], '', $section);
		
		$output .= '$j("#'.$params->tabId.'").append(\''.$section.'\');';
		
		//JS comment for end of widget
		$output .= '//---------- mm_ddCreateSection :: End -----'.PHP_EOL;
		
		// Send the output to the browser
		$e->output($output);
	}
}
?>