<?php
/**
 * (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields
 * @version 4.12 (2023-04-16)
 * 
 * @link https://code.divandesign.ru/modx/mm_ddmultiplefields
 * 
 * @copyright 2012–2023 DD Group {@link http://DivanDesign.ru }
 */

function mm_ddMultipleFields($params){
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
				'columns',
				'columnsTitles',
				'columnsWidth',
				'rowDelimiter',
				'colDelimiter',
				'previewWidth',
				'previewHeight',
				'minRowsNumber',
				'maxRowsNumber',
				'columnsData'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge(
		[
			'fields' => '',
			'columns' => [
				[
					'type' => 'text'
				]
			],
			'minRowsNumber' => 0,
			'maxRowsNumber' => 0,
			'previewWidth' => 300,
			'previewHeight' => 100,
			'roles' => '',
			'templates' => '',
			//Deprecated
			'rowDelimiter' => '||',
			'colDelimiter' => '::',
			'columnsTitles' => '',
			'columnsWidth' => '180',
			'columnsData' => ''
		],
		(array) $params
	);
	
	if (!useThisRule(
		$params->roles,
		$params->templates
	)){
		return;
	}
	
	global $modx;
	
	$e = &$modx->Event;
	
	$output = '';
	
	$site = $modx->getConfig('site_url');
	$widgetDir =
		$site .
		'assets/plugins/managermanager/widgets/ddmultiplefields/'
	;
	
	if ($e->name == 'OnDocFormPrerender'){
		$output .= includeJsCss(
			(
				$site .
				'assets/plugins/managermanager/js/jquery-ui-1.10.3.min.js'
			),
			'html',
			'jquery-ui',
			'1.10.3'
		);
		$output .= includeJsCss(
			(
				$widgetDir .
				'ddmultiplefields.css'
			),
			'html'
		);
		$output .= includeJsCss(
			(
				$widgetDir .
				'jQuery.ddMM.mm_ddMultipleFields.js'
			),
			'html',
			'jQuery.ddMM.mm_ddMultipleFields',
			'2.8'
		);
		
		$e->output($output);
	}elseif ($e->name == 'OnDocFormRender'){
		global $mm_current_page;
		
		$params->fields = tplUseTvs(
			$mm_current_page['template'],
			$params->fields,
			'image,file,text,email,textarea',
			'type,name'
		);
		
		if ($params->fields == false){
			return;
		}
		
		//Колонки, заданные как «field», теперь их нужно будет заменить на «image» и «file» соответственно
		$columns_fieldKeyIndex = [];
		
		//Old columns format backward compatibility
		if (!is_array($params->columns)){
			$columnsTemp = makeArray($params->columns);
			$params->columnsTitles = makeArray($params->columnsTitles);
			$params->columnsWidth = makeArray($params->columnsWidth);
			
			//Prepare data
			if ($params->columnsData){
				$columnsDataTemp = explode(
					'||',
					$params->columnsData
				);
				$params->columnsData = [];
				
				foreach (
					$columnsDataTemp as
					$dataItem
				){
					//For backward compatibility '[["Value 1", "Title 1"], ["Value 2"]]' → '[{"value" => "Value 1", "title" => "Title 1"}, {"value" => "Value 2"}]'
					if ($dataItem != ''){
						$dataItemTemp = json_decode(
							$dataItem,
							true
						);
						$dataItem = [];
						
						//Build list
						foreach (
							$dataItemTemp as
							$dataItem_item_index =>
							$dataItem_item_value
						){
							$dataItem[$dataItem_item_index] = [];
							$dataItem[$dataItem_item_index]['value'] = $dataItem_item_value[0];
							
							//Title
							if (isset($dataItem_item_value[1])){
								$dataItem[$dataItem_item_index]['title'] = $dataItem_item_value[1];
							}
						}
						
						$dataItem = json_encode($dataItem);
					}
					
					$params->columnsData[] = $dataItem;
				}
			}else{
				$params->columnsData = [];
			}
			
			$params->columns = [];
			
			foreach (
				$columnsTemp as
				$index =>
				$value
			){
				//“field” value compatibility
				if ($value == 'field'){
					$columns_fieldKeyIndex[] = $index;
				}
				
				$value = ['type' => $value];
				
				if (isset($params->columnsTitles[$index])){
					$value['title'] = $params->columnsTitles[$index];
				}
				if (isset($params->columnsWidth[$index])){
					$value['width'] = $params->columnsWidth[$index];
				}
				if (isset($params->columnsData[$index])){
					$value['data'] = $params->columnsData[$index];
				}
				
				$params->columns[] = $value;
			}
		}
		
		//Default value for columns
		if (empty($params->columns)){
			$params->columns = [
				['type' => 'text']
			];
		}
		
		//Стиль превью изображения
		$previewStyle =
			'max-width:' .
			$params->previewWidth .
			'px; max-height:' .
			$params->previewHeight .
			'px; margin: 4px 0; cursor: pointer;'
		;
		
		$output .=
			'//---------- mm_ddMultipleFields :: Begin -----' .
			PHP_EOL
		;
		
		foreach (
			$params->fields as
			$field
		){
			//For backward compatibility
			if (
				$field['type'] == 'image' ||
				$field['type'] == 'file'
			){
				//Проходимся по всем колонкам «field» и заменяем на соответствующий тип
				foreach(
					$columns_fieldKeyIndex as
					$index
				){
					$params->columns[$index]['type'] = $field['type'];
				}
			}
			
			$output .=
'
$j.ddMM.fields.' . $field['name'] . '.$elem.mm_ddMultipleFields({
	columns: ' . json_encode(
		$params->columns,
		JSON_UNESCAPED_UNICODE
	) . ',
	previewStyle: "' . $previewStyle . '",
	minRowsNumber: "' . $params->minRowsNumber . '",
	maxRowsNumber: "' . $params->maxRowsNumber . '",
	
	rowDelimiter: "' . $params->rowDelimiter . '",
	colDelimiter: "' . $params->colDelimiter . '"
});
';
		}
		
		//Поругаемся
		if (!empty($columns_fieldKeyIndex)){
			$modx->logEvent(
				1,
				2,
				'<p>You are currently using the deprecated column type “field”. Please, replace it with “image” or “file” respectively.</p><p>The plugin has been called in the document with template id ' . $mm_current_page['template'] . '.</p>',
				'ManagerManager: mm_ddMultipleFields'
			);
		}
		
		$output .=
			'//---------- mm_ddMultipleFields :: End -----' .
			PHP_EOL
		;
		
		$e->output($output);
	}
}
?>