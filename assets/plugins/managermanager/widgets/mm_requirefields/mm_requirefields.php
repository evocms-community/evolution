<?php
/**
 * mm_requireFields
 * @version 1.2.6 (2023-04-27)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.ru/modx/mm_requirefields
 * 
 * @copyright 2011–2023
 */

function mm_requireFields($params){
	//For backward compatibility
	if (
		func_num_args() > 1 ||
		!is_array($params) &&
		!is_object($params)
	){
		//Convert ordered list of params to named
		$params = \ddTools::orderedParamsToNamed([
			'paramsList' => func_get_args(),
			'compliance' => [
				'fields',
				'roles',
				'templates',
			]
		]);
	}
	
	//Defaults
	$params = \DDTools\ObjectTools::extend([
		'objects' => [
			(object) [
				'fields' => '',
				'roles' => '',
				'templates' => ''
			],
			$params
		]
	]);
	
	if (
		!useThisRule(
			$params->roles,
			$params->templates
		)
	){
		return;
	}
	
	global
		$mm_fields,
		$modx
	;
	
	if ($modx->Event->name == 'OnDocFormRender'){
		$params->fields = getTplMatchedFields($params->fields);
		
		if (empty($params->fields)){
			return;
		}
		
		$output = '//---------- mm_requireFields :: Begin -----' . PHP_EOL;
		
		$output .= '
			$j("head").append("<style>.mmRequired { background-image: none !important; background-color: #ff9999 !important; } .requiredIcon { color: #ff0000; font-weight: bold; margin-left: 3px; cursor: help; }</style>");
			var requiredHTML = "<span class=\"requiredIcon\" title=\"Required\">*</span>";
		';
		
		$submit_js = '';
		$load_js = '';
		
		foreach (
			$params->fields as
			$field
		){
			//Ignore for now
			switch ($field){
				//Fields for which this doesn't make sense
				case 'keywords':
				case 'metatags':
				case 'hidemenu':
				case 'which_editor':
				case 'template':
				case 'menuindex':
				case 'show_in_menu':
				case 'parent':
				case 'is_folder':
				case 'alias_visible':
				case 'is_richtext':
				case 'log':
				case 'searchable':
				case 'cacheable':
				case 'clear_cache':
				case 'content_type':
				case 'content_dispo':
					$output .= '';
				break;
				
				//Pub/unpub dates don't have a type attribute on their input tag in 1.0.2, so add this. Won't do any harm to other versions
				case 'pub_date':
				case 'unpub_date':
					$load_js .= '
						//Cant use jQuery attr function as datepicker class clashes with jQuery methods
						$j("#pub_date, #unpub_date").each(function(){this.type = "text";});
					';
				//No break, because we want to do the things below too.
				
				//Ones that follow the regular pattern
				default:
					//What type is this field?
					$fieldname = $mm_fields[$field]['fieldname'];
					
					//What jQuery selector should we use for this fieldtype?
					switch ($mm_fields[$field]['fieldtype']){
						case 'textarea':
							$selector = 'textarea[name=' . $fieldname . ']';
						break;
						
						//If it's an input, we only want to do something if it's a text field
						case 'input':
							$selector = 'input[type=text][name=' . $fieldname . '],input[type=email][name=' . $fieldname. ']';
						break;
						
						//All other input types, do nothing
						default:
							$selector = '';
						break;
					}
					
					//If we've found something we want to use
					if (!empty($selector)){
						if ($field == 'content'){
							$label = '$j("#content_header")';
							$tinymcefix = 'if (typeof(tinyMCE) != "undefined" && typeof(tinyMCE.triggerSave) != "undefined"){tinyMCE.triggerSave();}';
						}else{
							$label = '$sel.parents("td:first").prev("td").children("span.warning")';
							$tinymcefix = '';
						}
						
						$submit_js .= '

// The element we are targetting (' . $fieldname . ')
var $sel = $j("' . $selector . '");

' . $tinymcefix . '
// Check if its valid
if($j.trim($sel.val()) == ""){// If it is empty
	// Find the label (this will be easier in Evo 1.1 with more semantic code)
	var lbl = ' . $label . '.text().replace($j(requiredHTML).text(), "");
		
	// Add the label to the errors array. Would be nice to say which tab it is on, but no
	// easy way of doing this in 1.0.x as no semantic link between tabs and tab body
	errors.push(lbl);
		
	// Add an event so the hilight is removed upon focussing
	$sel.addClass("mmRequired").focus(function(){
		$j(this).removeClass("mmRequired");
	});
}
						';
						
						$load_js .= '

// Add an indicator this is required (' . $fieldname . ')
var $sel = $j("' . $selector . '");

// Find the label (this will be easier in Evo 1.1 with more semantic code)
var $lbl = ' . $label . '.append(requiredHTML);

						';
					}
				break;
			}
		}
		
		$output .= $load_js . '
$j("#mutate").submit(function(){
	var errors = [];
	
' . $submit_js . '
	
	if(errors.length > 0){
		var errMsg = errors.length + " required fields are missing:\n\n ";
		
		for (var i = 0; i < errors.length; i++){
			errMsg += " - " + errors[i] + " \n";
		}
		errMsg += " \nPlease correct the indicated fields.";
		
		alert(errMsg);
		return false;
	}else{
		return true;
	}
});
		';
		
		$output .= '//---------- mm_requireFields :: End -----' . PHP_EOL;
		
		$modx->Event->output($output);
	}
}
?>