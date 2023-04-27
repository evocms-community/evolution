<?php
/**
 * mm_widget_colors
 * @version 1.3 (2016-11-14)
 * 
 * @desc A widget for ManagerManager plugin that allows text field to be turned into a color picker storing a chosen hex value in the field on the document editing page.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.plugin.ManagerManager >= 0.7.
 * 
 * @param $params {array_associative|stdClass} — The object of params. @required
 * @param $params['fields'] {comma separated string} — The name(s) of the template variables this should apply to. @required
 * @param $params['defaultColor'] {string} — Which color in hex format should be selected by default in new documents. This is only used in situations where the TV does not have a default value specified in the TV definition. Default: '#ffffff'.
 * @param $params['roles'] {comma separated string} — The roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * @param $params['templates'] {comma separated string} — Id of the templates to which this widget is applied (when this parameter is empty then widget is applied to the all templates). Default: ''.
 * 
 * @event OnDocFormPrerender
 * @event OnDocFormRender
 * 
 * @link http://code.divandesign.biz/modx/mm_widget_colors/1.3
 * 
 * @copyright 2012–2016
 */

function mm_widget_colors($params){
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
				'defaultColor',
				'roles',
				'templates'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge([
// 		'fields' => '',
		'defaultColor' => '#ffffff',
		'roles' => '',
		'templates' => ''
	], (array) $params);
	
	if (!useThisRule($params->roles, $params->templates)){return;}
	
	global $modx;
	$e = &$modx->Event;
	
	$output = '';
	
	if ($e->name == 'OnDocFormPrerender'){
		$output .= includeJsCss($modx->config['base_url'] .'assets/plugins/managermanager/widgets/colors/farbtastic.js', 'html', 'farbtastic', '1.2');
		$output .= includeJsCss($modx->config['base_url'] .'assets/plugins/managermanager/widgets/colors/farbtastic.css', 'html');
		
		$e->output($output);
	}else if ($e->name == 'OnDocFormRender'){
		global $mm_current_page, $mm_fields;
		
		// if we've been supplied with a string, convert it into an array
		$params->fields = makeArray($params->fields);
		
		// Does this page's template use any of these TVs? If not, quit.
		$tvCount = tplUseTvs($mm_current_page['template'], $params->fields);
		
		if ($tvCount === false){return;}
		
		$output .= '//---------- mm_widget_colors :: Begin -----'.PHP_EOL;
		
		// Go through each of the fields supplied
		foreach ($params->fields as $tv){
			$tv_id = $mm_fields[$tv]['fieldname'];
			
			$output .=
'
$j("#'.$tv_id.'").css("background-image","none");
$j("#'.$tv_id.'").after(\'<div id="colorpicker'.$tv_id.'"></div>\').queue(function() {$j("#colorpicker'.$tv_id.'").farbtastic("#'.$tv_id.'");});
if ($j("#'.$tv_id.'").val() == ""){
	$j("#'.$tv_id.'").val("'.$params->defaultColor.'");
}
$j("#colorpicker'.$tv_id.'").mouseup(function(){
	// mark the document as dirty, or the value wont be saved
	$j("#'.$tv_id.'").trigger("change");
});
';
		}
		
		$output .= '//---------- mm_widget_colors :: End -----'.PHP_EOL;
		
		$e->output($output);
	}
}
?>