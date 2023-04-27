<?php
/**
 * mm_widget_showimagetvs
 * @version 1.3 (2020-11-01)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.biz/modx/mm_widget_showimagetvs
 * 
 * @copyright 2014–2020 DD Group {@link https://DivanDesign.biz }
 */

function mm_widget_showimagetvs($params){
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
				'maxWidth',
				'maxHeight',
				'thumbnailerUrl',
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
				'maxWidth' => 300,
				'maxHeight' => 100,
				'thumbnailerUrl' => '',
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
	
	if ($e->name == 'OnDocFormPrerender'){
		//The main js file including
		$output = includeJsCss(
			(
				$modx->getConfig('site_url') .
				'assets/plugins/managermanager/widgets/showimagetvs/jQuery.ddMM.mm_widget_showimagetvs.js'
			),
			'html',
			'jQuery.ddMM.mm_widget_showimagetvs',
			'1.0.3'
		);
		
		$e->output($output);
	}else if ($e->name == 'OnDocFormRender'){
		$output = '';
		
        //Does this page's template use any image TVs? If not, quit now!
		$params->fields = getTplMatchedFields(
			$params->fields,
			'image'
		);
		
		if ($params->fields === false){
			return;
		}
		
		$output .= 
'
//---------- mm_widget_showimagetvs :: Begin -----
$j.ddMM
	.getFieldElems({
		fields: ' .
			\DDTools\ObjectTools::convertType([
				'object' => $params->fields,
				'type' => 'stringJsonArray'
			]) .
		'
	})
	.mm_widget_showimagetvs({
		thumbnailerUrl: "' . trim($params->thumbnailerUrl) . '",
		width: ' . intval($params->maxWidth) . ',
		height: ' . intval($params->maxHeight) . ',
	})
;
//---------- mm_widget_showimagetvs :: End -----
'
		;
		
		$e->output($output);
	}
}
?>