<?php
/**
 * mm_ddAutoFolders
 * @version 1.4 (2017-03-30)
 * 
 * @desc Automatically move documents (OnBeforeDocFormSave event) based on their date (publication date; any date in tv) into folders of year and month (like 2012/02/). If folders (documents) of year and month doesn`t exist they are created automatically OnBeforeDocFormSave event.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.plugin.ManagerManager >= 0.7.
 * 
 * @param $params {array_associative|stdClass} — The object of params. @required
 * @param $params['yearsParents'] {comma separated string} — IDs of ultimate parents (parents of the years). @required
 * @param $params['roles'] {comma separated string} — List of role IDs this should be applied to. Leave empty (or omit) for all roles. Default: ''.
 * @param $params['templates'] {comma separated string} — List of template IDs this should be applied to. Leave empty (or omit) for all templates. Default: ''.
 * @param $params['dateSourceField'] {string} — Name of template variable which contains the date. Default: 'pub_date'.
 * @param $params['yearData'] {string_JSON} — Document fields and/or TVs that are required to be assigned to year documents. An associative array in JSON where the keys and values correspond field names and values respectively. Default: '{"template":0,"published":0}'.
 * @param $params['monthData'] {string_JSON} — Document fields and/or TVs that are required to be assigned to month documents. An associative array in JSON where the keys and values correspond field names and values respectively. Default: '{"template":0,"published":0}'.
 * @param $params['numericMonthAliases'] {boolean} — Numeric aliases for month documents. Default: false.
 * @deprecated @param $params['yearData_published'] {0|1} — Note this is a deprecated parameter, please, use “$params['yearData']”. Whether the year documents should be published? Default: —.
 * @deprecated @param $params['monthData_published'] {0|1} — Note this is a deprecated parameter, please, use “$params['monthData']”. Whether the month documents should be published? Default: —.
 * 
 * @link http://code.divandesign.biz/modx/mm_ddautofolders/1.4
 * 
 * @copyright 2012–2016 DivanDesign {@link http://www.DivanDesign.biz }
 */

function mm_ddAutoFolders($params){
	//For backward compatibility
	if (
		!is_array($params) &&
		!is_object($params)
	){
		//Convert ordered list of params to named
		$params = ddTools::orderedParamsToNamed([
			'paramsList' => func_get_args(),
			'compliance' => [
				'roles',
				'templates',
				'yearsParents',
				'dateSourceField',
				'yearData',
				'monthData',
				'yearData_published',
				'monthData_published',
				'numericMonthAliases'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge([
		'yearsParents' => '',
		'roles' => '',
		'templates' => '',
		'dateSourceField' => 'pub_date',
		'yearData' => '{"template":0,"published":0}',
		'monthData' => '{"template":0,"published":0}',
		'numericMonthAliases' => false,
		//Deprecated
		'yearData_published' => NULL,
		'monthData_published' => NULL
	], (array) $params);
	
	global $modx, $pub_date, $parent, $mm_current_page, $tmplvars, $modx_lang_attribute;
	$e = &$modx->Event;
	
	//$params->yearsParents is required
	if (
		$params->yearsParents != '' &&
		$e->name == 'OnBeforeDocFormSave' &&
		useThisRule($params->roles, $params->templates)
	){
		$defaultFields = [
			'template' => 0,
			'published' => 0
		];
		
		//Функция аналогична методу «$modx->getParentIds» за исключением того, что родитель = 0 тоже выставляется
		function getParentIds($id){
			global $modx;
			
			$parents = $modx->getParentIds($id);
			
			//Если текущего id нет в массиве, значит его родитель = 0
			if (!isset($parents[$id])){
				$parents[$id] = 0;
			//Если текущий документ есть, а его родителя нет, значит родитель родителя = 0
			}else if(!isset($parents[$parents[$id]])){
				$parents[$parents[$id]] = 0;
			}
			
			//Вернем массив со значениями и ключами в нём
			return array_merge($parents, array_keys($parents));
		}
		
		//Получаем всех родителей текущего документа (или его родителя, если это новый документ)
		$allParents = getParentIds(is_numeric($e->params['id']) ? $e->params['id'] : $parent);
		
		$params->yearsParents = makeArray($params->yearsParents);
		
		//Перебираем переданных родителей
		foreach($params->yearsParents as $key => $val){
			//Если текущий документ не принадлежит к переданному родителю, значит этот родитель лишний
			if (!in_array($val, $allParents)){
				unset($params->yearsParents[$key]);
			}
		}
		
		//Если остался хоть один родитель (а остаться должен только один)
		if (count($params->yearsParents) > 0){
			//Сбрасываем ключи
			$params->yearsParents = array_values($params->yearsParents);
		//Если документ не относится ни к одному переданному родителю, то ничего делать не нужно
		}else{
			return;
		}
		
		//Текущее правило
		$rule = [];
		//Дата
		$ddDate = [];
		
		//Если задано, откуда брать дату и это не дата публикации, пытаемся найти в tv`шках
		if (
			$params->dateSourceField &&
			$params->dateSourceField != 'pub_date'
		){
			//Получаем tv с датой для данного шаблона
			$dateTv = tplUseTvs($mm_current_page['template'], $params->dateSourceField);
			
			//Если tv удалось получить, такая tv есть и есть её значение
			if (
				$dateTv &&
				$dateTv[0]['id'] &&
				$tmplvars[$dateTv[0]['id']] &&
				$tmplvars[$dateTv[0]['id']][1]
			){
				//Если дата в юникс-времени
				if (is_numeric($tmplvars[$dateTv[0]['id']][1])){
					$ddDate['date'] = $tmplvars[$dateTv[0]['id']][1];
				}else{
					//Пытаемся преобразовать в unix-время
					$ddDate['date'] = strtotime($tmplvars[$dateTv[0]['id']][1]);
				}
			}
		}else{
			$ddDate['date'] = $pub_date;
		}
		
		//Если не задана дата, выбрасываем
		if (!$ddDate['date']){return;}
		
		//Псевдонимы родителей (какие должны быть)
		//Год в формате 4 цифры
		$ddDate['y'] = date('Y', $ddDate['date']);
		//Псевдоним месяца (порядковый номер номер с ведущим нолём или название на английском)
		$ddDate['m'] = $params->numericMonthAliases ? date('m', $ddDate['date']) : strtolower(date('F', $ddDate['date']));
		//Порядковый номер месяца
		$ddDate['n'] = date('n', $ddDate['date']);
		
		//Если язык админки — русский
		if (strtolower($modx_lang_attribute) == 'ru'){
			//Все месяцы на русском
			$ruMonthes = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
			
			//Название месяца на русском
			$ddDate['mTitle'] = $ruMonthes[$ddDate['n'] - 1];
		}else{
			//Просто запишем на английском
			$ddDate['mTitle'] = date('F', $ddDate['date']);
		}
		
		//Получаем список групп документов родителя (пригодится при создании годов и месяцев)
		$docGroups = $modx->db->getColumn('document_group', $modx->db->select(
			'`document_group`',
			ddTools::$tables['document_groups'],
			'`document` = '.$params->yearsParents[0]
		));
		
		$yearId = 0;
		$monthId = 0;
		
		//Получаем годы (непосредственных детей корневого родителя)
		$years = ddTools::getDocumentChildrenTVarOutput(
			$params->yearsParents[0],
			['id'],
			false,
			'menuindex',
			'ASC',
			'',
			'alias'
		);
		
		if (isset($years[$ddDate['y']])){
			//Получаем id нужного нам года
			$yearId = $years[$ddDate['y']]['id'];
		}
		
		//For backward compatibility
		if (is_numeric($params->yearData)){$params->yearData = '{"template":'.$params->yearData.',"published":0}';}
		if (is_numeric($params->monthData)){$params->monthData = '{"template":'.$params->monthData.',"published":0}';}
		
		$params->yearData = json_decode($params->yearData, true);
		$params->monthData = json_decode($params->monthData, true);
		
		if (!is_array($params->yearData)){$params->yearData = $defaultFields;}
		if (!is_array($params->monthData)){$params->monthData = $defaultFields;}
		
		//For backward compatibility too
		if ($params->yearData_published !== NULL){$params->yearData['published'] = $params->yearData_published;}
		if ($params->monthData_published !== NULL){$params->monthData['published'] = $params->monthData_published;}
		
		//Если нужный год существует
		if ($yearId != 0){
			//Проставим году нужные параметры
			ddTools::updateDocument($yearId, array_merge($params->yearData, [
				'isfolder' => 1
			]));
			//Получаем месяцы (непосредственных детей текущего года)
			$months = ddTools::getDocumentChildrenTVarOutput(
				$yearId,
				['id'],
				false,
				'menuindex',
				'ASC',
				'',
				'alias'
			);
			if (isset($months[$ddDate['m']])){
				//Получаем id нужного нам месяца
				$monthId = $months[$ddDate['m']]['id'];
			}
		//Если нужный год не существует
		}else{
			//Создадим его
			$yearId = ddTools::createDocument(array_merge($params->yearData, [
				'pagetitle' => $ddDate['y'],
				'alias' => $ddDate['y'],
				'parent' => $params->yearsParents[0],
				'isfolder' => 1,
				//Да пусть будут тупо по году, сортироваться нормально зато будут
				'menuindex' => $ddDate['y'] - 2000
			]), $docGroups);
		}
		
		//Если нужный месяц существует
		if ($monthId != 0){
			//Проставим месяцу нужные параметры
			ddTools::updateDocument($monthId, array_merge($params->monthData, [
				'isfolder' => 1
			]));
			//Если нужный месяц не существует (на всякий случай проверим ещё и год)
		}else if($yearId){
			$monthId = ddTools::createDocument(array_merge($params->monthData, [
				'pagetitle' => $ddDate['mTitle'],
				'alias' => $ddDate['m'],
				'parent' => $yearId,
				'isfolder' => 1,
				//Для месяца выставляем menuindex в соответствии с его порядковым номером
				'menuindex' => $ddDate['n'] - 1
			]), $docGroups);
		}
		
		//Ещё раз на всякий случай проверим, что с месяцем всё хорошо
		if (
			$monthId &&
			$monthId != $parent
		){
			$parent = $monthId;
		}
	}
}
?>