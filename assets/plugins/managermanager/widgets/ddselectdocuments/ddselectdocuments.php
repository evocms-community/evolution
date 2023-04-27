<?php
/**
 * mm_ddSelectDocuments
 * @version 1.6 (2022-04-14)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.biz/modx/mm_ddselectdocuments
 * 
 * @copyright 2013–2022 DD Group {@link https://DivanDesign.biz }
 */

function mm_ddSelectDocuments($params){
	//For backward compatibility
	if (
		//The only one required “fields” parameter
		is_string($params) ||
		//Or not
		func_num_args() > 1
	){
		//Convert ordered list of params to named
		$params = \ddTools::orderedParamsToNamed([
			'paramsList' => func_get_args(),
			'compliance' => [
				'fields',
				'roles',
				'templates',
				'parentIds',
				'depth',
				'filter',
				'maxSelectedItems',
				'listItemLabelMask',
				'allowDuplicates'
			]
		]);
	}
	
	$params = \DDTools\ObjectTools::extend([
		'objects' => [
			//Defaults
			(object) [
				'fields' => '',
				'parentIds' => '0',
				'depth' => 1,
				'filter' => '',
				'listItemLabelMask' => '[+title+] ([+id+])',
				'maxSelectedItems' => 0,
				'allowDuplicates' => false,
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
		$pluginDir = $modx->getConfig('site_url') . 'assets/plugins/managermanager/';
		$widgetDir = $pluginDir . 'widgets/ddselectdocuments/';
		
		$output .= includeJsCss(
			$widgetDir . 'ddselectdocuments.css',
			'html'
		);
		$output .= includeJsCss(
			$widgetDir . 'jquery-migrate-3.0.0.min.js',
			'html',
			'jquery-migrate',
			'3.0.0'
		);
		$output .= includeJsCss(
			$pluginDir . 'js/jquery-ui-1.10.3.min.js',
			'html',
			'jquery-ui',
			'1.10.3'
		);
		$output .= includeJsCss(
			$widgetDir . 'jQuery.ddMultipleInput-1.3.2.min.js',
			'html',
			'jquery.ddMultipleInput',
			'1.3.2'
		);
		
		$e->output($output);
	}else if ($e->name == 'OnDocFormRender'){
		global $mm_current_page;
		
		$params->fields = tplUseTvs(
			$mm_current_page['template'],
			$params->fields
		);
		
		if ($params->fields == false){
			return;
		}
		
		$params->parentIds = makeArray($params->parentIds);
		//Если используется current, то сделаем id текущего документа
		foreach (
			$params->parentIds as
			$key =>
			$id
		){
			if ($id == 'current'){
				if (
					is_array($e->params) &&
					isset($e->params['id']) &&
					is_numeric($e->params['id'])
				){
					$params->parentIds[$key] = $e->params['id'];
				}else{
					unset($params->parentIds[$key]);
				}
			}
		}
		
		//Может быть пустым если указан current и создаем новый документ
		if (count($params->parentIds) == 0){
			return;
		}
		
		$params->filter =
			!empty($params->filter) ?
			explode(
				"&",
				$params->filter
			) :
			[]
		;
		
		$filter_TVnames = [];
		
		foreach(
			$params->filter as
			$key =>
			$val
		){
			$preg = preg_split(
				"/(!=)|(=)/",
				$val
			);
			
			if(!empty(trim($preg[0]))){
				$params->filter[$key] = [
					'key' => trim($preg[0]),
					'value' => trim($preg[1]),
					'equal' => true
				];
				
				if(strrpos($val, '!=')){
					$params->filter[$key]['equal'] = false;
				}
				
				array_push(
					$filter_TVnames,
					$params->filter[$key]['key']
				);
			}
		}
		
		//Необходимые поля
		preg_match_all(
			'~\[\+([^\+\]]*?)\+\]~',
			$params->listItemLabelMask,
			$matchField
		);
		
		$listDocs_fields = array_unique(array_merge(
			$filter_TVnames,
			[
				'pagetitle',
				'id'
			],
			$matchField[1]
		));
		
		//Если среди полей есть ключевое слово «title»
		if (
			(
				$listDocs_fields_titlePos = array_search(
					'title',
					$listDocs_fields
				)
			) !==
			false
		){
			//Удалим его, добавим «menutitle»
			unset($listDocs_fields[$listDocs_fields_titlePos]);
			
			$listDocs_fields = array_unique(array_merge(
				$listDocs_fields,
				['menutitle']
			));
		}
		
		//Получаем все дочерние документы
		$listDocs = mm_ddSelectDocuments_getDocsList([
			'parentIds' => $params->parentIds,
			'filter' => $params->filter,
			'depth' => $params->depth,
			'listItemLabelMask' => $params->listItemLabelMask,
			'docFields' => $listDocs_fields
		]);
		
		if (count($listDocs) == 0){
			return;
		}
		
		$listDocs = \DDTools\ObjectTools::convertType([
			'object' => $listDocs,
			'type' => 'stringJsonAuto'
		]);
		
		$output .= '//---------- mm_ddSelectDocuments :: Begin -----' . PHP_EOL;
		
		foreach (
			$params->fields as
			$field
		){
			$output .=
'
$j("#tv' . $field['id'] . '").ddMultipleInput({
	source: ' . $listDocs . ',
	max: ' . (int) $params->maxSelectedItems . ',
	allowDoubling: ' . (int) $params->allowDuplicates . '
});
';
		}
		
		$output .= '//---------- mm_ddSelectDocuments :: End -----' . PHP_EOL;
		
		$e->output($output);
	}
}

/**
 * mm_ddSelectDocuments_getDocsList
 * @version 2.0.2 (2022-04-14)
 * 
 * @desc Рекурсивно получает все необходимые документы.
 * 
 * @param $params {stdClass|arrayAssociative} — Parameters, the pass-by-name style is used. @required
 * @param $params->parentIds {array} — ID документов-родителей. Default: [0]. 
 * @param $params->filter {arrayAssociative} — Фильтр. Default: []. 
 * @param $params->depth {integer} — Глубина поиска. Default: 1. 
 * @param $params->listItemLabelMask {string} — Маска заголовка. Default: '[+pagetitle+] ([+id+])'. 
 * @param $params->docFields {string} — Поля, которые надо получать. Default: ['pagetitle', 'id']. 
 * 
 * @return $result {array} — Список документов
 * @return $result[$i] {arrayAssociative} — Элемент списка.
 * @return $result[$i]['label'] {string} — Заголовок.
 * @return $result[$i]['value'] {integer} — ID документа.
 */
function mm_ddSelectDocuments_getDocsList($params = []){
	$params = \DDTools\ObjectTools::extend([
		'objects' => [
			//Defaults
			(object) [
				'parentIds' => [0],
				'filter' => [],
				'depth' => 1,
				'listItemLabelMask' => '[+pagetitle+] ([+id+])',
				'docFields' => ['pagetitle', 'id']
			],
			$params
		]
	]);
	
	//Получаем дочерние документы текущего уровня
	$docs = [];
	
	//Перебираем всех родителей
	foreach (
		$params->parentIds as
		$parent
	){
		//Получаем документы текущего родителя
		$tekDocs = \ddTools::getDocumentChildrenTVarOutput(
			$parent,
			$params->docFields,
			'all'
		);
		
		//Если что-то получили
		if (is_array($tekDocs)){
			//Запомним
			$docs = array_merge(
				$docs,
				$tekDocs
			);
		}
	}
	
	$result = [];
	
	//Если что-то есть
	if (count($docs) > 0){
		//Перебираем полученные документы
		foreach (
			$docs as
			$val
		){
			//Если фильтр не пустой
			if (!empty($params->filter)){
				$filterCount = 0;
				
				//Удовлетворяет ли документ всем условиям фильтра
				foreach(
					$params->filter as
					$filter
				){
					if(
						$filter['equal'] &&
						$val[$filter['key']] == $filter['value']
					){
						$filterCount++;
					}elseif(
						!$filter['equal'] &&
						$val[$filter['key']] != $filter['value']){
						$filterCount++;
					}
				}
				
				if($filterCount == count($params->filter)){
					$val['title'] =
						empty($val['menutitle']) ?
						$val['pagetitle'] :
						$val['menutitle']
					;
					
					//Записываем результат
					$tmp = \ddTools::parseText([
						'text' => $params->listItemLabelMask,
						'data' => $val,
						'mergeAll' => false
					]);
					
					if(strlen(trim($tmp)) == 0){
						$tmp = \ddTools::parseText([
							'text' => '[+pagetitle+] ([+id+])',
							'data' => $val,
							'mergeAll' => false
						]);
					}
					
					$result[] = [
						'label' => $tmp,
						'value' => $val['id']
					];
				}
			}
			
			//Если ещё надо двигаться глубже
			if ($params->depth > 1){
				//Сливаем результат с дочерними документами
				$result = array_merge(
					$result,
					mm_ddSelectDocuments_getDocsList([
						'parentIds' => [$val['id']],
						'filter' => $params->filter,
						'depth' => $params->depth - 1,
						'listItemLabelMask' => $params->listItemLabelMask,
						'docFields' => $params->docFields
					])
				);
			}
		}
	}
	
	return $result;
}
?>