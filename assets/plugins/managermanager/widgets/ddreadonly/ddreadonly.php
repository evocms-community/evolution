<?php
/**
 * MODXEvo.plugin.ManagerManager.mm_ddReadonly
 * @version 1.1.1 (2016-12-16)
 * 
 * @desc A widget for ManagerManager allowing read-only mode for fields and TVs (their values are still visible but can not be changed).
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.plugin.ManagerManager >= 0.7.
 * 
 * @param $params {array_associative|stdClass} — The object of params. @required
 * @param $params['fields'] {string_commaSeparated} — The name(s) of the document fields (or TVs) for which the widget is applying. @required
 * @param $params['roles'] {string_commaSeparated} — The roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * @param $params['templates'] {string_commaSeparated} — Templates IDs for which the widget is applying (empty value means the widget is applying to all templates). Default: ''.
 * 
 * @event OnBeforeDocFormSave
 * @event OnDocFormSave
 * @event OnDocDuplicate
 * @event OnDocFormRender
 * 
 * @link http://code.divandesign.biz/modx/mm_ddreadonly/1.1.1
 * 
 * @copyright 2013–2016 DivanDesign {@link http://www.DivanDesign.biz }
 */

function mm_ddReadonly($params){
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
				'roles',
				'templates'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge([
// 		'fields' => '',
		'roles' => '',
		'templates' => ''
	], (array) $params);
	
	global $modx, $mm_fields, $mm_current_page;
	$e = &$modx->Event;
	
	if (!useThisRule($params->roles, $params->templates)){return;}
	
	//Перед сохранением документа
	if ($e->name == 'OnBeforeDocFormSave'){
		if (
			//Sometimes it is not set O_o
			!is_array($e->params) ||
			//Если создаётся новый документ, у него нет никакого id ещё (да и нам без разницы, т.к. никто ничего с ним всё равно не мог сделать до первого сохранения)
			$e->params['mode'] == 'new'
		){
			return;
		}
		
		//ID документа
		$docId = $e->params['id'];
		
		//Если нужная переменная в сессии не определена, определим
		if (!is_array($_SESSION['mm_ddReadonly'])){
			$_SESSION['mm_ddReadonly'] = [];
		}
		
		//Разбиваем переданные поля в массивчик
		$params->fields = makeArray($params->fields);
		//Получаем id TV. TODO: Оптимизировать, чтобы всё было в один запрос
		$tvs = tplUseTvs($mm_current_page['template'], $params->fields, '', 'id,name');
		
		//Результат
		$resultFields = [];
		
		//Если что-то оплучили
		if (
			is_array($tvs) &&
			count($tvs) > 0
		){
			$tvsNames = [];
			
			//Пробежимся, переделаем под удобный нам формат
			foreach ($tvs as $val){
				$tvsNames[$val['id']] = $val['name'];
			}
			
			//Получаем значения TV
			$tvs = $modx->db->makeArray($modx->db->select(
				'value,tmplvarid AS id',
				ddTools::$tables['site_tmplvar_contentvalues'],
				'contentid='.$docId.' AND tmplvarid IN '.makeSqlList(array_keys($tvsNames))
			));
			
			//Если что-то нашлось
			if (count($tvs) > 0){
				//Пробежимся
				foreach ($tvs as $val){
					//Если значение не пустое
					if ($val['value'] != ''){
						//Запишем значения
						$resultFields[$tvsNames[$val['id']]] = $val['value'];
					}
				}
			}
		}
		
		//Перебираем поля
		foreach ($params->fields as $key => $val){
			//Если такого поля нет или это TV
			if (
				!isset($mm_fields[$val]) ||
				$mm_fields[$val]['tv'] == 1
			){
				//Снесём
				unset($params->fields[$key]);
			}
		}
		
		if (count($params->fields) > 0){
			//Получаем значения необходимых полей
			$params->fields = $modx->db->getRow($modx->db->select(
				implode(',', $params->fields),
				ddTools::$tables['site_content'],
				'id='.$docId
			));
			
			//Переберём
			foreach($params->fields as $key => $val){
				if ($val != ''){
					$resultFields[$key] = $val;
				}
			}
		}
		
		//Если хоть что-то осталось
		if (count($resultFields) > 0){
			//Сохраним значения в сессию, они нам ещё понадобятся
			$_SESSION['mm_ddReadonly'][$docId] = $resultFields;
		}
	//После сохранения документа
	}else if ($e->name == 'OnDocFormSave'){
		//Если создаётся новый документ, у него нет никакого id ещё, да и нам пофиг, т.к. никто ничего с ним всё равно не мог сделать до сохранения
		if ($e->params['mode'] == 'new'){return;}
		
		//ID документа
		$docId = $e->params['id'];
		
		//Если данные о текущем документе есть
		if (
			is_array($_SESSION['mm_ddReadonly']) &&
			is_array($_SESSION['mm_ddReadonly'][$docId]) &&
			count($_SESSION['mm_ddReadonly'][$docId]) > 0
		){
			//Обновляем данные документа в соответствии с тем, что было раньше
			ddTools::updateDocument($docId, $_SESSION['mm_ddReadonly'][$docId]);
			
			//Сносим за ненадобностью
			unset($_SESSION['mm_ddReadonly'][$docId]);
		}
	//При копировании документа
	}else if ($e->name == 'OnDocDuplicate'){
		//Получаем id TV
		$tvs = tplUseTvs($mm_current_page['template'], $params->fields);
		
		//Если что-то оплучили
		if (
			is_array($tvs) &&
			count($tvs) > 0
		){
			$tvIds = [];
			foreach ($tvs as $val){$tvIds[] = $val['id'];}
			
			//Удаляем значение TV для данного документа
			$modx->db->delete(
				ddTools::$tables['site_tmplvar_contentvalues'],
				'`contentid` = '.$e->params['new_id'].' AND `tmplvarid` IN('.implode(',', $tvIds).')'
			);
		}
	//При рендере документа
	}else if ($e->name == 'OnDocFormRender'){
		$output = '//---------- mm_ddReadonly :: Begin -----'.PHP_EOL;
		
		$output .=
'
$j.ddMM.getFieldElems({fields: "'.$params->fields.'"}).each(function(){
 	var $this = $j(this);
	
 	$this.before($this.val()).hide();
});
';
		
		$output .= '//---------- mm_ddReadonly :: End -----'.PHP_EOL;
		
		$e->output($output);
	}
}
?>