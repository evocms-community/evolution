<?php
/**
 * mm_ddHTMLCleaner
 * @version 1.0.5 (2018-04-03)
 * 
 * @desc A widget for the plugin ManagerManager. It removes forbidden HTML attributes and styles from document fields and TVs when required.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.plugins.ManagerManager >= 0.7 {@link http://code.divandesign.biz/modx/managermanager }.
 * 
 * @param $params {array_associative|stdClass} — The object of params. @required
 * @param $params['fields'] {string_commaSeparated} — The name(s) of the document fields (or TVs) which the widget is applied to. @required
 * @param $params['validAttrs'] {string_JSON_object} — A JSON object containing valid attributes (set as comma separated values) which have not to be removed from corresponding HTML tags (set as keys). Default: '{"img":"src,alt,width,height","a":"href,target"}'.
 * @param $params['validAttrs'][tagName] {string_commaSeparated} — Valid attributes (set as comma separated values) which have not to be removed from corresponding HTML tags (set as keys). Default: '{"img":"src,alt,width,height","a":"href,target"}'.
 * @param $params['validAttrsForAllTags'] {string_commaSeparated} — Attributes that can be applied to all HTML tags. The others will be removed. Default: 'title,class'.
 * @param $params['validStyles'] {string_commaSeparated} — Valid styles that have not to be cut from the style attribute. Default: 'word-spacing'.
 * @param $params['roles'] {string_commaSeparated} — Roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * @param $params['templates'] {string_commaSeparated} — Templates IDs for which the widget is applying (empty value means the widget is applying to all templates). Default: ''.
 * 
 * @event OnDocFormPrerender
 * @event OnDocFormRender
 * 
 * @link http://code.divandesign.biz/modx/mm_ddhtmlcleaner/1.0.5
 * 
 * @copyright 2013–2018 DivanDesign {@link http://www.DivanDesign.biz }
 */

function mm_ddHTMLCleaner($params){
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
				'validAttrsForAllTags',
				'validStyles',
				'validAttrs'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge([
// 		'fields' => '',
		'validAttrs' => '{"img":"src,alt,width,height","a":"href,target"}',
		'validAttrsForAllTags' => 'title,class',
		'validStyles' => 'word-spacing,margin,margin-top,margin-right,margin-bottom,margin-left,display',
		'roles' => '',
		'templates' => ''
	], (array) $params);
	
	if (!useThisRule($params->roles, $params->templates)){return;}
	
	global $modx;
	$e = &$modx->Event;
	
	if ($e->name == 'OnDocFormPrerender'){
		$widgetDir = $modx->config['site_url'].'assets/plugins/managermanager/widgets/mm_ddhtmlcleaner/';
		
		$output = includeJsCss($widgetDir.'jQuery.ddHTMLCleaner-0.2.min.js', 'html', 'jQuery.ddHTMLCleaner', '0.2');
		$output .= includeJsCss($widgetDir.'jQuery.ddMM.mm_ddHTMLCleaner.js', 'html', 'jQuery.ddMM.mm_ddHTMLCleaner', '1.0.1');
		
		$e->output($output);
	}else if ($e->name == 'OnDocFormRender'){
		global $mm_fields, $content;
		
		if ($content['contentType'] != 'text/html'){return;}
		
		$params->fields = getTplMatchedFields($params->fields);
		if ($params->fields == false){return;}
		
		$selectors = array();
		
		foreach ($params->fields as $field){
			$selectors[] = $mm_fields[$field]['fieldtype'].'[name=\"'.$mm_fields[$field]['fieldname'].'\"]';
		}
		
		$output = '//---------- mm_ddHTMLCleaner :: Begin -----'.PHP_EOL;
		
		$output .=
'
$j.ddMM.mm_ddHTMLCleaner.addInstance("'.implode(',', $selectors).'", {
	validAttrsForAllTags: "'.$params->validAttrsForAllTags.'",
	validAttrs: '.$params->validAttrs.',
	validStyles: "'.$params->validStyles.'"
});
';
		
		$output .= '//---------- mm_ddHTMLCleaner :: End -----'.PHP_EOL;
		
		$e->output($output);
	}
}
?>