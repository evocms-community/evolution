<?php
/**
 * mm_synch_fields
 * @version 1.2 (2020-10-28)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.biz/modx/mm_synch_fields
 * 
 * @copyright 2012–2020 DD Group {@link https://DivanDesign.biz }
 */

function mm_synch_fields($params){
	//For backward compatibility
	if (
		!is_array($params) &&
		!is_object($params)
	){
		//Convert ordered list of params to named
		$params = \ddTools::orderedParamsToNamed([
			'paramsList' => func_get_args(),
			'compliance' => [
				'fields',
				'roles',
				'templates'
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
		//If the current page is being edited by someone in the list of roles, and uses a template in the list of templates
		!useThisRule(
			$params->roles,
			$params->templates
		)
	){
		return;
	}
	
	global
		$modx
	;
	
	$e = &$modx->Event;
	
	if ($e->name == 'OnDocFormPrerender'){
		//The main js file including
		$output = includeJsCss(
			$modx->getConfig('site_url') .
			'assets/plugins/managermanager/widgets/mm_synch_fields/jQuery.ddMM.mm_synch_fields.js',
			'html',
			'jQuery.ddMM.mm_synch_fields',
			'1.1'
		);
		
		$e->output($output);
	}else if ($e->name == 'OnDocFormRender'){
		$params->fields = getTplMatchedFields(
			$params->fields,
			//Make sure we're dealing with an input
			'text,email,textarea'
		);
		
		if (
			$params->fields === false ||
			//We need at least 2 values
			count($params->fields) < 2
		){
			return;
		}
		
		$output =
			'//---------- mm_synch_fields :: Begin -----' .
			PHP_EOL
		;
		
		$output .=
'
$j.ddMM
	.getFieldElems({
		fields: ' .
			\DDTools\ObjectTools::convertType([
				'object' => $params->fields,
				'type' => 'stringJsonArray'
			]) .
		'
	})
	.mm_synch_fields()
;
'
			;
		;
		
		$output .=
			'//---------- mm_synch_fields :: End -----' .
			PHP_EOL
		;
		
		$e->output($output);
	}
}
?>