<?php
/**
 * mm_ddFillMenuindex
 * @version 1.3 (2018-05-03)
 * 
 * @desc A widget for the ManagerManager plugin that was made to keep “menuindex” in order:
 * 1. “menuindex” of a new document is set equal to a free minimal value within its parent (“menuindex”, by default, used to be the number of siblings which was not always preferred).
 * 2. “menuindex” is incremented automatically by 1 on document duplicate.
 * 3. “menuindex” of the following siblings will be incremented automatically by 1 when doc will be saved if siblings with equal menuindex are exist.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.plugins.ManagerManager >= 0.7 {@link http://code.divandesign.biz/modx/managermanager }.
 * 
 * @param $params {array_associative|stdClass} — The object of params. @required
 * @param $params['parentId'] {integer|''} — Id of parent document. Default: '' (all parents).
 * 
 * @event OnDocFormPrerender
 * @event OnDocFormSave
 * @event OnDocDuplicate
 * 
 * @link http://code.divandesign.biz/modx/mm_ddfillmenuindex/1.3
 * 
 * @copyright 2013–2018 DivanDesign {@link http://www.DivanDesign.biz }
 */

function mm_ddFillMenuindex($params = []){
	//For backward compatibility
	if (
		!is_array($params) &&
		!is_object($params)
	){
		//Convert ordered list of params to named
		$params = ddTools::orderedParamsToNamed([
			'paramsList' => func_get_args(),
			'compliance' => [
				'parentId'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge([
		'parentId' => ''
	], (array) $params);
	
	global $modx, $content;
	$e = &$modx->Event;
	
	//Если у нас правильное событие и это создание документа
	if (
		$e->name == 'OnDocFormPrerender' &&
		$_REQUEST['a'] == 4
	){
		$documentParentId = intval($_REQUEST['pid']);
		
		//Если задан конкретный родитель, для которого должен работать виджет и он не совпадает с тем, что сейчас
		if (
			$params->parentId !== '' &&
			$params->parentId != $documentParentId
		){
			//Давай, до свидания!
			return;
		}
		
		//Получаем наименьший свободный menuindex у документов данного родителя. Кхэм, запрос писался глубокой ночью, так что за его оптимальность отвечать сложно ;-)
		$freeMenuIndex = $modx->db->getValue('
			SELECT
				min(`sc`.`menuindex`)
			FROM '.ddTools::$tables['site_content'].' AS `sc`
				LEFT JOIN (
					SELECT `sc1`.`menuindex`
					FROM '.ddTools::$tables['site_content'].' AS `sc1`, '.ddTools::$tables['site_content'].' AS `sc2`
					WHERE `sc1`.`menuindex` + 1 = `sc2`.`menuindex` AND `sc1`.`parent` = '.$documentParentId.' AND `sc2`.`parent` = '.$documentParentId.'
				) AS `z`
				ON `sc`.`menuindex` = `z`.`menuindex`
			WHERE
				`z`.`menuindex` IS NULL AND
				`sc`.`parent` = '.$documentParentId.'
		');
		
		//Если такового нет (дочерних вообще нет). P.S.: Если он пуст, то переопределять нет смысла, там всё хорошо и так поставится.
		if (!is_null($freeMenuIndex)){
			//Задаём следующим
			$content['menuindex'] = $freeMenuIndex + 1;
		}
	//When doc is saved
	}else if ($e->name == 'OnDocFormSave'){
		//Get its menuindex and parent ID
		$docData = ddTools::getDocument(
			$e->params['id'],
			'menuindex,parent',
			//Include unpublished and deleted
			'all',
			'all'
		);
		
		//Try to get siblings with equal menu index
		$docSiblingsWighEqualMenuIndex = ddTools::getDocumentChildren(
			$docData['parent'],
			//Include unpublished and deleted
			'all',
			'all',
			//Just something
			'id',
			'
				`sc`.`id` != '.$e->params['id'].' AND
				`sc`.`menuindex` = '.$docData['menuindex'].'
			'
		);
		
		if (count($docSiblingsWighEqualMenuIndex) > 0){
			//Increace menuindex in following siblings
			$modx->db->update(
				'`menuindex` = `menuindex` + 1',
				ddTools::$tables['site_content'],
				'
					`parent` = '.$docData['parent'].' AND
					`menuindex` >= '.$docData['menuindex'].'
				'
			);
		}
	//When doc is duplicated
	}else if ($e->name == 'OnDocDuplicate'){
		//Инкрементируем menuindex при копировании
		$modx->db->query('
			UPDATE
				'.ddTools::$tables['site_content'].'
			SET
				`menuindex` = `menuindex` + 1
			WHERE
				`id` = '.$e->params['new_id'].'
		');
	}
}
?>