<?php
/**
 * mm_widget_accessdenied
 * @version 1.2 (2016-11-14)
 * 
 * @desc A widget for ManagerManager plugin that allows access to specific documents (by ID) to be denied without inheritance on the document editing page.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.plugin.ManagerManager >= 0.7.
 * 
 * @param $params {array_associative|stdClass} — The object of params. @required
 * @param $params['documentIds'] {string_commaSeparated} — List of documents ID to prevent access. @required
 * @param $params['message'] {string} — HTML formatted message. Default: '<span>Access denied</span>Access to current document closed for security reasons.'.
 * @param $params['roles'] {string_commaSeparated} — The roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * 
 * @event OnDocFormPrerender
 * @event OnDocFormRender
 * 
 * @link http://code.divandesign.biz/modx/mm_widget_accessdenied/1.2
 * 
 * @author Icon by designmagus.com
 * @author Originally written by Metaller
 * @author DivanDesign
 * 
 * @copyright 2012–2016
 */

function mm_widget_accessdenied($params){
	//For backward compatibility
	if (
		!is_array($params) &&
		!is_object($params)
	){
		//Convert ordered list of params to named
		$params = ddTools::orderedParamsToNamed([
			'paramsList' => func_get_args(),
			'compliance' => [
				'documentIds',
				'message',
				'roles'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge([
		'documentIds' => '',
		'message' => '<span>Access denied</span>Access to current document closed for security reasons.',
		'roles' => ''
	], (array) $params);
	
	if (!useThisRule($params->roles)){return;}
	
	global $modx;
	$e = &$modx->Event;
	
	if ($e->name == 'OnDocFormPrerender'){
		$widgetDir = $modx->config['site_url'].'assets/plugins/managermanager/widgets/accessdenied/';
		
		$output = includeJsCss($widgetDir.'accessdenied.css', 'html');
		
		$e->output($output);
	}else if ($e->name == 'OnDocFormRender'){
		$docId = (int)$_GET[id];
		
		$params->documentIds = makeArray($params->documentIds);
		
		$output = '//---------- mm_widget_accessdenied :: Begin -----'.PHP_EOL;
		
		if (in_array($docId, $params->documentIds)){
			$output .=
'
// Remove all content from the page
$j("input, div").remove();
$j("body").prepend(\'<div id="aback"><div id="amessage">'.$params->message.'</div></div>\');
$j("#aback").css({
	height: Math.max($j("body").height(), $j(document).height())
});
';
		}
		
		$output .= '//---------- mm_widget_accessdenied :: End -----'.PHP_EOL;
		
		$e->output($output);
	}
}
?>