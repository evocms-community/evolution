<?php
/** 
 * ddSetFieldValue
 * @version 1.2 (2016-11-21)
 * 
 * @desc A widget for ManagerManager plugin allowing ducument fields values (or TV fields values) to be strongly defined (reminds of mm_default but field value assignment is permanent).
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.plugin.ManagerManager >= 0.7.
 * 
 * @param $params {array_associative|stdClass} — The object of params. @required
 * @param $params['fields'] {string_commaSeparated} — The name(s) of the document fields (or TVs) for which value setting is required. @required
 * @param $params['value'] {string} — Required value. Default: ''.
 * @param $params['roles'] {string_commaSeparated} — The roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * @param $params['templates'] {string_commaSeparated} — Id of the templates to which this widget is applied. Default: ''.
 * 
 * @event OnDocFormRender
 * 
 * @link http://code.divandesign.biz/modx/mm_ddsetfieldvalue/1.2
 * 
 * @copyright 2012–2016 DivanDesign {@link http://www.DivanDesign.biz }
 */

function mm_ddSetFieldValue($params){
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
				'value',
				'roles',
				'templates'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge([
// 		'fields' => '',
		'value' => '',
		'roles' => '',
		'templates' => ''
	], (array) $params);
	
	global $modx;
	$e = &$modx->Event;
	
	if (
		$e->name == 'OnDocFormRender' &&
		useThisRule($params->roles, $params->templates)
	){
		$output = '//---------- mm_ddSetFieldValue :: Begin -----'.PHP_EOL;
		
		$dateFormat = '';
		
		//Подбираем правильный формат даты в соответствии с конфигурацией
		switch($modx->config['datetime_format']){
			case 'dd-mm-YYYY':
				$dateFormat = 'd-m-Y';
			break;
			case 'mm/dd/YYYY':
				$dateFormat = 'm/d/Y';
			break;
			case 'YYYY/mm/dd':
				$dateFormat = 'Y/m/d';
			break;
		}
		
		$params->fields = getTplMatchedFields($params->fields);
		if ($params->fields == false){return;}
		
		foreach ($params->fields as $field){
			//Результирующее значение для выставления через $.fn.val
			$setValue = $params->value;
			//Значение для чекбоксов
			$checkValue = (bool)$params->value;
			
			//Селектор для выставления через $.fn.val
			$setElem = '$j.ddMM.fields.'.$field.'.$elem';
			//Селектор для чекбоксов
			$checkElem = false;
			
			//Некоторые поля документа требуют дополнительной обработки
			switch ($field){
				//Дата публикации
				case 'pub_date':
				//Дата отмены публикации
				case 'unpub_date':
					$setValue = ($setValue == '') ? jsSafe(date($dateFormat.' H:i:s')) : jsSafe($setValue);
				break;
				
				//Аттрибуты ссылки
				case 'link_attributes':
					//Обработаем кавычки
					$setValue = str_replace(["'", '"'], '\"', $setValue);
				break;
				
				//Признак папки
				case 'is_folder':
					$checkElem = $setElem;
					$setElem = false;
				break;
				
				//Чекбоксы с прямой логикой
				//Признак публикации
				case 'published':
				//Признак доступности для поиска
				case 'searchable':
				//Признак кэширования
				case 'cacheable':
				//Признак очистки кэша
				case 'clear_cache':
				//Участвует в URL
				case 'alias_visible':
					//Если не 1, значит 0, другого не быть не может
					if ($setValue != '1'){
						$setValue = '0';
					}
					
					$checkElem = $setElem;
					
					//Не очень красиво if внутри case, ровно так же, как и 'clear_cache' == 'syncsite', что поделать
					if ($field == 'clear_cache'){
						$setElem = '$j("input[name=\'syncsite\']")';
					}else{
						$setElem = '$j("input[name=\''.$field.'\']")';
					}
				break;
				
				//Признак отображения в меню
				case 'show_in_menu':
					// Note these are reversed from what you'd think
					$setValue = ($setValue == '1') ? '0' : '1';
					
					$checkElem = $setElem;
					$setElem = '$j("input[name=\'hidemenu\']")';
				break;
				
				//Признак скрытия из меню (аналогично show_in_menu, только наоборот)
				case 'hide_menu':
					if ($setValue != '0'){
						$setValue = '1';
					}
					
					$checkValue = !$checkValue;
					
					$checkElem = $setElem;
					$setElem = '$j("input[name=\'hidemenu\']")';
				break;
				
				//Признак использованшия визуального редактора
				case 'is_richtext':
					$output .= 'var originalRichtextValue = $j("#which_editor:first").val();'.PHP_EOL;
					
					if ($setValue != '1'){
						$setValue = '0';
						$output .= '
							// Make the RTE displayed match the default value that has been set here
							if (originalRichtextValue != "none"){
								$j("#which_editor").val("none");
								changeRTE();
							}
						';
						$output .= PHP_EOL;
					}
					
					$checkElem = $setElem;
					$setElem = '$j("input[name=\'richtext\']")';
				break;
				
				//Признак логирования
				case 'log':
					//Note these are reversed from what you'd think
					$setValue = ($setValue == '1') ? '0' : '1';
					$checkValue = !$checkValue;
					
					$checkElem = $setElem;
					$setElem = '$j("input[name=\'donthit\']")';
				break;
			}
			
			//Если это чекбокс
			if ($checkElem !== false){
				if ($checkValue){
					$output .= $checkElem.'.attr("checked", "checked");'.PHP_EOL;
				}else{
					$output .= $checkElem.'.removeAttr("checked");'.PHP_EOL;
				}
			}
			
			//Если нужно задавать значение
			if ($setElem !== false){
				$output .= $setElem.'.val("'.$setValue.'");'.PHP_EOL;
			}
		}
		
		$output .= '//---------- mm_ddSetFieldValue :: End -----'.PHP_EOL;
		
		$e->output($output);
	}
}
?>