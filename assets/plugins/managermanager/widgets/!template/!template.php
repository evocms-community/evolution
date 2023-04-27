<?php
/**
 * mm_widget_template
 * @version 1.0.1 (2021-03-09)
 * 
 * @desc A template for creating new widgets.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.plugin.ManagerManager >= 0.7.
 * 
 * @param $params {array_associative|stdClass} — The object of params. @required
 * @param $params['fields'] {string_commaSeparated} — TV names to which the widget is applied. @required
 * @param $params['otherParam'] {string} — Some parameter. Default: 'defaultValue'.
 * @param $params['roles'] {string_commaSeparated} — The roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * @param $params['templates'] {string_commaSeparated} — Id of the templates to which this widget is applied (when this parameter is empty then widget is applied to the all templates). Default: ''.
 * 
 * @event OnDocFormPrerender
 * @event OnDocFormRender
 * 
 * @link http://
 * 
 * @copyright 2016
 */

function mm_widget_template($params){
	//Defaults
	$params = (object) array_merge([
		//Required params have no defaults
// 		'fields' => '',
		'otherParam' => 'defaultValue',
		'roles' => '',
		'templates' => ''
	], (array) $params);
	
	if (!useThisRule($params->roles, $params->templates)){return;}
	
	global $modx;
	$e = &$modx->Event;
	
	$output = '';
	
	if ($e->name == 'OnDocFormPrerender'){
		// We have functions to include JS or CSS external files you might need
		// The standard ModX API methods don't work here
		$output .= includeJsCss($modx->getConfig('base_url').'assets/plugins/managermanager/widgets/template/javascript.js', 'html');
		$output .= includeJsCss($modx->getConfig('base_url').'assets/plugins/managermanager/widgets/template/styles.css', 'html');
		
		$e->output($output);
	}elseif ($e->name == 'OnDocFormRender'){
		$params->fields = getTplMatchedFields($params->fields);
		if ($params->fields == false){return;}
		
		// Your output should be stored in a string, which is outputted at the end
		// It will be inserted as a Javascript block (with jQuery), which is executed on document ready
		// We always put a JS comment, which makes debugging much easier
		$output .= '//---------- mm_widget_template :: Begin -----'.PHP_EOL;
		
		// Do something for each of the fields supplied
		foreach ($params->fields as $field){
			//“$j.ddMM.fields.'.$field.'.$elem” contains jQuery DOM element
			$output .=
'
$j.ddMM.fields.'.$field.'.$elem;
';
		}
		
		//JS comment for end of widget
		$output .= '//---------- mm_widget_template :: End -----'.PHP_EOL;
		
		// Send the output to the browser
		$e->output($output);
	}
}
?>