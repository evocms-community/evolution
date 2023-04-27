<?php
/**
 * mm_renameField
 * @version 1.3 (2022-05-24)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.biz/modx/mm_renamefield
 * 
 * @copyright 2011–2022
 */

function mm_renameField($params){
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
				'newLabel',
				'roles',
				'templates',
				'newHelp'
			]
		]);
	}
	
	$params = \DDTools\ObjectTools::extend([
		'objects' => [
			//Defaults
			(object) [
				'roles' => '',
				'templates' => '',
				'newHelp' => ''
			],
			$params
		]
	]);
	
	global $modx;
	$e = &$modx->Event;
	
	// if the current page is being edited by someone in the list of roles, and uses a template in the list of templates
	if (
		$e->name == 'OnDocFormRender' &&
		useThisRule(
			$params->roles,
			$params->templates
		)
	){
		$params->fields = makeArray($params->fields);
		if (count($params->fields) == 0){
			return;
		}
		
		$output = '//---------- mm_renameField :: Begin -----' . PHP_EOL;
		
		foreach (
			$params->fields as
			$field
		){
			$element = '';
			
			switch ($field){
				// Exceptions
				case 'which_editor':
					$element = '$j("#which_editor").prev("span.warning")';
				break;
				
				case 'content':
					$element = '$j("#content_header")';
				break;
				
				// Ones that follow the regular pattern
				default:
					global $mm_fields;
					
					if (isset($mm_fields[$field])){
						$element = '$j.ddMM.fields.' . $field . '.$elem.parents("td:first").prev("td").children("span.warning")';
					}
				break;
			}
			
			if ($element != ''){
				$output .= $element . '.contents().filter(function(){return this.nodeType === 3;}).replaceWith("' . \ddTools::escapeForJS($params->newLabel) . '");' . PHP_EOL;
			}
			
			// If new help has been supplied, do that too
			if ($params->newHelp != ''){
				mm_changeFieldHelp([
					'fields' => $field,
					'helpText' => $params->newHelp,
					'roles' => $params->roles,
					'templates' => $params->templates
				]);
			}
		}
		
		$output .= '//---------- mm_renameField :: End -----' . PHP_EOL;
		
		$e->output($output);
	}
}
?>