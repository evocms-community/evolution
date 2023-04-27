<?php
/**
 * mm_minimizableSections
 * @version 0.3 (2016-11-11)
 * 
 * @desc A widget for ManagerManager plugin that allows one, few or all sections to be minimizable on the document edit page.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.plugin.ManagerManager >= 0.7.
 * 
 * @param $params {array_associative|stdClass} — The object of params.
 * @param $params['sections'] {string_commaSeparated} — The id(s) of the sections this should apply to. Use '' for apply to all. Default: ''.
 * @param $params['minimizedByDefault'] {string_commaSeparated} — The id(s) of the sections this should be minimized by default. Default: ''.
 * @param $params['roles'] {string_commaSeparated} — The roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * @param $params['templates'] {string_commaSeparated} — Id of the templates to which this widget is applied (when this parameter is empty then widget is applied to the all templates). Default: ''.
 * 
 * @author Sergey Davydov <webmaster@sdcollection.com>
 * @author DivanDesign <code@DivanDesign.biz>
 * 
 * @link http://code.divandesign.biz/modx/mm_minimizablesections/0.3
 * 
 * @copyright 2015–2016
 */

function mm_minimizableSections($params = []){
	//For backward compatibility
	if (
		!is_array($params) &&
		!is_object($params)
	){
		//Convert ordered list of params to named
		$params = ddTools::orderedParamsToNamed([
			'paramsList' => func_get_args(),
			'compliance' => [
				'sections',
				'roles',
				'templates',
				'minimizedByDefault'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge([
		'sections' => '',
		'minimizedByDefault' => '',
		'roles' => '',
		'templates' => ''
	], (array) $params);
	
	if (!useThisRule($params->roles, $params->templates)){return;}
	
	global $modx;
	$e = &$modx->Event;
	
	$output = '';
	
	if ($e->name == 'OnDocFormPrerender'){
		$widgetDir = $modx->config['site_url'].'assets/plugins/managermanager/widgets/mm_minimizablesections/';
		
		$output .= includeJsCss($widgetDir.'mm_minimizableSections.css', 'html');
		$output .= includeJsCss($widgetDir.'jQuery.ddMM.mm_minimizableSections.js', 'html', 'jQuery.ddMM.mm_minimizableSections.js', '1.0');
		
		$e->output($output);
	}else if ($e->name == 'OnDocFormRender'){
		if ($params->sections == ''){$params->sections = '*';}
		
		$params->sections = makeArray($params->sections);
		$params->minimizedByDefault = makeArray($params->minimizedByDefault);
		
		$params->sections = array_map('mm_minimizableSections_prepareSectionHeaderSelector', $params->sections);
		$params->minimizedByDefault = array_map('mm_minimizableSections_prepareSectionHeaderSelector', $params->minimizedByDefault);
		
		$output .= '//---------- mm_minimizableSections :: Begin -----'.PHP_EOL;
		
		$output .= '
$j("'.implode(',', $params->sections).'", "#documentPane").mm_minimizableSections({
	minimizedByDefault: "'.implode(',', $params->minimizedByDefault).'"
});
';
		
		$output .= '//---------- mm_minimizableSections :: End -----'.PHP_EOL;
		
		$e->output($output);
	}
}

/**
 * mm_minimizableSections_prepareSectionHeaderSelector
 * @version 1.0.2 (2016-11-10)
 * 
 * @param $sectionId {string} — Section name. @required
 * 
 * @return {string}
 */
function mm_minimizableSections_prepareSectionHeaderSelector($sectionId){
	$result = '';
	
	switch ($sectionId){
		case 'access':
			$result = '#sectionAccessHeader';
		break;
		
		case '':
		//For backward compatibility
		case '*':
			$result = '.sectionHeader';
		break;
		
		default:
			$sectionId = prepareSectionId($sectionId);
			
			$result = '#'.$sectionId.'_header';
		break;
	}
	
	return $result;
}
?>