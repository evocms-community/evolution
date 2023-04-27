<?php
/**
 * (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMaxLength
 * @version 1.3.1 (2020-12-19)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.biz/modx/mm_ddmaxlength
 * 
 * @copyright 2012–2020 DD Group {@link https://DivanDesign.biz }
 */

function mm_ddMaxLength($params){
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
				'templates',
				'length'
			]
		]);
	}
	
	//Defaults
	$params = \DDTools\ObjectTools::extend([
		'objects' => [
			(object) [
				'fields' => '',
				'length' => 150,
				'allowTypingOverLimit' => true,
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
	
	global $modx;
	$e = &$modx->Event;
	
	$output = '';
	
	if ($e->name == 'OnDocFormPrerender'){
		$widgetDir =
			$modx->getConfig('site_url') .
			'assets/plugins/managermanager/widgets/ddmaxlength/'
		;
		
		$output .= includeJsCss(
			(
				$widgetDir .
				'ddmaxlength.css'
			),
			'html'
		);
		$output .= includeJsCss(
			(
				$widgetDir .
				'jQuery.ddMM.mm_ddMaxLength.js'
			),
			'html',
			'jQuery.ddMM.mm_ddMaxLength',
			'1.0.1'
		);
		
		$e->output($output);
	}else if ($e->name == 'OnDocFormRender'){
		$params->fields = getTplMatchedFields(
			$params->fields,
			'text,textarea'
		);
		
		if ($params->fields == false){
			return;
		}
		
		$output .=
			'//---------- mm_ddMaxLength :: Begin -----' .
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
	.addClass("ddMaxLengthField")
	.each(function(){
		$j(this)
			.parent()
			.append("<div class=\"ddMaxLengthCount\"><span></span></div>")
		;
	})
	.ddMaxLength({
		max: ' . intval($params->length) . ',
		canWriteError: ' . intval($params->allowTypingOverLimit) . ',
		containerSelector: "div.ddMaxLengthCount span",
		warningClass: "maxLengthWarning"
	})
;
'
		;
		
		$output .=
			'//---------- mm_ddMaxLength :: End -----' .
			PHP_EOL
		;
		
		$e->output($output);
	}
}
?>