<?php
/**
 * mm_ddResizeImage
 * @version 1.6.2 (2022-11-02)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.biz/modx/mm_ddresizeimage
 * 
 * @copyright 2012–2022 DD Group {@link https://DivanDesign.biz }
 */

function mm_ddResizeImage($params){
	global $modx;
	
	$e = &$modx->Event;
	
	//For backward compatibility
	if (func_num_args() > 1){
		//Convert ordered list of params to named
		$params = \ddTools::orderedParamsToNamed([
			'paramsList' => func_get_args(),
			'compliance' => [
				'fields',
				'roles',
				'templates',
				'width',
				'height',
				'transformMode',
				'filenameSuffix',
				'replaceDocFieldVal',
				'backgroundColor',
				'ddMultipleField_isUsed',
				'ddMultipleField_columnNumber',
				'ddMultipleField_rowDelimiter',
				'ddMultipleField_colDelimiter',
				'ddMultipleField_rowNumber',
				'allowEnlargement'
			]
		]);
	}
	
	//For backward compatibility
	$params = \DDTools\ObjectTools::extend([
		'objects' => [
			$params,
			\ddTools::verifyRenamedParams(
				$params,
				[
					'transformMode' => 'croppingMode'
				]
			)
		]
	]);
	
	//Defaults
	$params = \DDTools\ObjectTools::extend([
		'objects' => [
			(object) [
// 				'fields' => '',
				'width' => '',
				'height' => '',
				'filenameSuffix' => '_ddthumb',
				'transformMode' => 'resizeAndCrop',
				'backgroundColor' => '#FFFFFF',
				'allowEnlargement' => 1,
				'quality' => $modx->getConfig('jpegQuality'),
// 				'watermarkImageFullPathName' => '',
				'replaceDocFieldVal' => 0,
				'ddMultipleField_isUsed' => 0,
				'ddMultipleField_columnNumber' => 0,
				'ddMultipleField_rowDelimiter' => '||',
				'ddMultipleField_colDelimiter' => '::',
				'ddMultipleField_rowNumber' => 'all',
				'roles' => '',
				'templates' => ''
			],
			$params
		]
	]);
	
	//For backward compatibility
	switch ($params->transformMode){
		case '0':
			$params->transformMode = 'resize';
		break;
		
		case '1':
			$params->transformMode = 'crop';
		break;
		
		case 'crop_resized':
			$params->transformMode = 'resizeAndCrop';
		break;
		
		case 'fill_sized':
			$params->transformMode = 'resizeAndFill';
		break;
	}
	
	//Проверим, чтобы было нужное событие, чтобы были заполнены обязательные параметры и что правило подходит под роль
	if (
		$e->name == 'OnBeforeDocFormSave' &&
		//Required parameter
		\DDTools\ObjectTools::isPropExists([
			'object' => $params,
			'propName' => 'fields'
		]) &&
		(
			$params->width != '' ||
			$params->height != ''
		) &&
		useThisRule(
			$params->roles,
			$params->templates
		)
	){
		global
			$mm_current_page,
			$tmplvars
		;
		
		//Получаем необходимые tv для данного шаблона (т.к. в mm_ddMultipleFields тип может быть любой, получаем все, а не только изображения)
		$params->fields = tplUseTvs(
			$mm_current_page['template'],
			$params->fields,
			'',
			'id,name'
		);
		
		//Если что-то есть
		if (
			is_array($params->fields) &&
			count($params->fields) > 0
		){
			//Обработка параметров
			$params->replaceDocFieldVal =
				$params->replaceDocFieldVal == '1' ?
				true :
				false
			;
			$params->ddMultipleField_isUsed =
				$params->ddMultipleField_isUsed == '1' ?
				true :
				false
			;
			
			//Перебираем их
			foreach (
				$params->fields as
				$field
			){
				//Если в значении tv что-то есть
				if (
					\DDTools\ObjectTools::isPropExists([
						'object' => $tmplvars,
						'propName' => $field['id']
					]) &&
					trim($tmplvars[$field['id']][1]) != ''
				){
					$image = trim($tmplvars[$field['id']][1]);
					
					//Если это множественное поле
					if ($params->ddMultipleField_isUsed){
						//Получим массив изображений
						$images = \DDTools\Snippet::runSnippet([
							'name' => 'ddGetMultipleField',
							'params' => [
								'inputString' => $image,
								'rowDelimiter' => $params->ddMultipleField_rowDelimiter,
								'colDelimiter' => $params->ddMultipleField_colDelimiter,
								'startRow' =>
									$params->ddMultipleField_rowNumber == 'all' ?
									0 :
									$params->ddMultipleField_rowNumber
								,
								'totalRows' =>
									$params->ddMultipleField_rowNumber == 'all' ?
									'all' :
									1
								,
								'outputFormat' => 'JSON',
								'columns' => $params->ddMultipleField_columnNumber,
								//For backward compatibility with < 3.3
								'string' => $image,
								//For backward compatibility with < 3.0b
								'field' => $image,
								'splY' => $params->ddMultipleField_rowDelimiter,
								'splX' => $params->ddMultipleField_colDelimiter,
								'num' =>
									$params->ddMultipleField_rowNumber == 'all' ?
									0 :
									$params->ddMultipleField_rowNumber
								,
								'count' =>
									$params->ddMultipleField_rowNumber == 'all' ?
									'all' :
									1
								,
								'format' => 'JSON',
								'colNum' => $params->ddMultipleField_columnNumber
							]
						]);
						
						//Если пришла пустота (ни одного изображения заполнено не было)
						if (trim($images) == ''){
							$images = [];
						}else{
							$images = json_decode(
								$images,
								true
							);
						}
					}else{
						//Запишем в массив одно изображение
						$images = [$image];
					}
					
					foreach (
						$images as
						$image
					){
						//Если есть лишний слэш в начале, убьём его
						if (strpos(
							$image,
							'/'
						) === 0){
							$image = substr(
								$image,
								1
							);
						}
						
						//На всякий случай проверим, что файл существует
						if (file_exists(
							$modx->config['base_path'] .
							$image
						)){
							//Полный путь изображения
							$imageFullPath = pathinfo(
								$modx->config['base_path'] .
								$image
							);
							
							//Если имя файла уже заканчивается на суффикс (необходимо при $params->replaceDocFieldVal == 1), не будем его добавлять
							if (
								substr(
									$imageFullPath['filename'],
									strlen($params->filenameSuffix) * -1
								) ==
								$params->filenameSuffix
							){
								$params->filenameSuffix = '';
							}
							
							//Имя нового изображения
							$newImageName =
								$imageFullPath['filename'] .
								$params->filenameSuffix .
								'.' .
								$imageFullPath['extension']
							;
							
							$modifyImageParams = (object) [
								//Ссылка на оригинальное изображение
								'sourceFullPathName' =>
									$modx->config['base_path'] .
									$image
								,
								//Формируем новое имя изображения (полный путь)
								'outputFullPathName' =>
									$imageFullPath['dirname'] .
									'/' .
									$newImageName
								,
								//Режим обрезания
								'transformMode' => $params->transformMode,
								//Ширина превьюшки
								'width' => $params->width,
								//Высота превьюшки
								'height' => $params->height,
								//Разрешить ли увеличение изображения
								'allowEnlargement' => $params->allowEnlargement,
								//Фон превьюшки (может понадобиться для заливки пустых мест)
								'backgroundColor' => $params->backgroundColor,
								//Output image quality level
								'quality' => $params->quality
							];
							
							if (\DDTools\ObjectTools::isPropExists([
								'object' => $params,
								'propName' => 'watermarkImageFullPathName'
							])){
								$modifyImageParams->watermarkImageFullPathName = $params->watermarkImageFullPathName;
							}
							
							//Делаем превьюшку
							\DDTools\FilesTools::modifyImage($modifyImageParams);
							
							//Если нужно заменить оригинальное значение TV на вновь созданное и это не $params->ddMultipleField_isUsed
							if (
								$params->replaceDocFieldVal &&
								!$params->ddMultipleField_isUsed
							){
								$tmplvars[$field['id']][1] =
									dirname($tmplvars[$field['id']][1]) .
									'/' .
									$newImageName
								;
							}
						}
					}
				}
			}
		}
	}
}
?>