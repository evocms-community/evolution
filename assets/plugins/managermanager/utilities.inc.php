<?php
/**
 * useThisRule
 * @version 1.1.3 (2022-05-22)
 * 
 * @desc Pass useThisRule a comma separated list of allowed roles and templates, and it will return TRUE or FALSE to indicate whether this rule should be run on this page.
 * 
 * @param $roles {array|stringCommaSeparated} — Roles. You can also set the '!' prefix to exclude values (e. g. '!1,3'). Default: ''.
 * @param $templates {array|stringCommaSeparated} — Templates. You can also set the '!' prefix to exclude values (e. g. '!1,3'). Default: ''.
 * 
 * @return {boolean}
 */
function useThisRule(
	$roles = '',
	$templates = ''
){
	global
		$mm_current_page,
		$modx
	;
	
	$e = &$modx->Event;
	
	$result = false;
	
	$excludeRoles = false;
	$excludeTemplates = false;
	
	//Are they negative roles?
	if (
		is_string($roles) &&
		substr(
			$roles,
			0,
			1
		) == '!'
	){
		$roles = substr(
			$roles,
			1
		);
		$excludeRoles = true;
	}
	
	//Are they negative templates?
	if (
		is_string($templates) &&
		substr(
			$templates,
			0,
			1
		) == '!'
	){
		$templates = substr(
			$templates,
			1
		);
		$excludeTemplates = true;
	}
	
	//Make the lists into arrays
	$roles = makeArray($roles);
	$templates = makeArray($templates);
	
	//Does the current role match the conditions supplied?
	$matchRoleList =
		$excludeRoles ?
		!in_array(
			$mm_current_page['role'],
			$roles
		) :
		in_array(
			$mm_current_page['role'],
			$roles
		)
	;
	
	//Does the current template match the conditions supplied?
	$matchTemplateList =
		$excludeTemplates ?
		!in_array(
			$mm_current_page['template'],
			$templates
		) :
		in_array(
			$mm_current_page['template'],
			$templates
		)
	;
	
	//If we've matched either list in any way, return true	
	if (
		(
			$matchRoleList ||
			count($roles) == 0
		) &&
		(
			$matchTemplateList ||
			count($templates) == 0
		)
	){
		$result = true;
	}
	
	return $result;
}

/**
 * makeArray
 * @version 1.1.2 (2020-11-01)
 * 
 * @desc Makes a commas separated list into an array.
 * 
 * @param $csv {array|stringCommaSeparated} — List. @required
 * 
 * @return {array}
 */
function makeArray($csv){
	$result = [];
	
	//If we've already been supplied an array, just return it
	if (is_array($csv)){
		$result = $csv;
	}else{
		//Else if we have an not empty string
		if (trim($csv) != ''){
			//Otherwise, turn it into an array
			$result = explode(
				',',
				$csv
			);
			//Remove any whitespace
			array_walk(
				$result,
				create_function(
					'$v, $k',
					'return trim($v);'
				)
			);
		}
	}
	
	return $result;
}

/**
 * jsSafe
 * @version 1.0.2 (2018-11-10)
 * 
 * @desc Make an output JS safe.
 * 
 * @param $str {string} — String to prepare. @required
 * 
 * @return {string}
 */
function jsSafe($str){
	global $modx;
	
	return htmlentities(
		$str,
		ENT_QUOTES,
		$modx->getConfig('modx_charset'),
		false
	);
}

/**
 * tplUseTvs
 * @version 1.3.2 (2020-11-01)
 * 
 * @desc Does the specified template use the specified TVs?
 * 
 * @param $templateId {integer} — Template ID.
 * @param $tvs {stringCommaSeparated|array} — TV names. Default: ''.
 * @param $types {stringCommaSeparated|array} — TV types, e.g. image. Default: ''.
 * @param $dbFields {stringCommaSeparated} — DB fields which get from 'site_tmplvars' table. Default: 'id'.
 * @param $resultKey {string|false} — DB field, which values are keys of result array. Keys of result array will be numbered if the parameter equals false. Default: false.
 * 
 * @return {array|false}
 */
function tplUseTvs(
	$templateId,
	$tvs = '',
	$types = '',
	$dbFields = 'id',
	$resultKey = false
){
	$result = false;
	
	//If it's a blank template, it can't have TVs
	if($templateId != 0){
		global $modx;
		
		//Make the TVs, field types and DB fields into an array
		$fields = makeArray($tvs);
		$types = makeArray($types);
		$dbFields = makeArray($dbFields);
		
		//Add the result key in DB fields if return of an associative array is required & result key is absent there
		if (
			$resultKey !== false &&
			!in_array(
				$resultKey,
				$dbFields
			)
		){
			$dbFields[] = $resultKey;
		}
		
		$where = [];
		//Are we looking at specific TVs, or all?
		if (!empty($fields)){
			$where[] =
				'tvs.name IN ' .
				makeSqlList($fields)
			;
		}
		
		//Are we looking at specific TV types, or all?
		if (!empty($types)){
			$where[] =
				'type IN ' .
				makeSqlList($types)
			;
		}
		
		//Make the SQL for this template
		if (!empty($templateId)){
			$where[] =
				'rel.templateid = ' .
				$templateId
			;
		}
		
		//Execute the SQL query
		$dbResult = $modx->db->select(
			implode(
				',',
				$dbFields
			),
			(
				ddTools::$tables['site_tmplvars'] .
				' AS tvs LEFT JOIN ' .
				ddTools::$tables['site_tmplvar_templates'] .
				' AS rel ON rel.tmplvarid = tvs.id'
			),
			implode(
				' AND ',
				$where
			)
		);
		
		$recordCount = $modx->db->getRecordCount($dbResult);
		
		//If we have results, return them, otherwise return false
		if ($recordCount > 0){
			//If return of an associative array is required
			if ($resultKey !== false){
				$rsArray = [];
				
				while ($row = $modx->db->getRow($dbResult)){
					//If result contains the result key
					if (
						array_key_exists(
							$resultKey,
							$row
						)
					){
						$rsArray[$row[$resultKey]] = $row;
					}else{
						$rsArray[] = $row;
					}
				}
				
				$result = $rsArray;
			}else{
				$result = $modx->db->makeArray($dbResult);
			}
		}
	}
	
	return $result;
}

/**
 * getTplMatchedFields
 * @version 1.2 (2020-11-01)
 * 
 * @desc Returns the array that contains only those of passed fields/TVs which are used in the template.
 * 
 * @param $fields {stringCommaSeparated|array} — Document fields or TVs names. Default: ''.
 * @param $tvTypes {stringCommaSeparated|array} — TVs types, e.g. image, text. Default: ''.
 * @param $tempaleId {integer} — Template ID. Default: $mm_current_page['template'].
 * 
 * @return {array|false}
 */
function getTplMatchedFields(
	$fields = '',
	$tvTypes = '',
	$tempaleId = ''
){
	$result = false;
	
	$fields = makeArray($fields);
	
	global $mm_fields;
	
	//Template of current document by default
	if (empty($tempaleId)){
		global $mm_current_page;
		
		$tempaleId = $mm_current_page['template'];
	}
	
	$docFields = [];
	
	//Only document fields
	foreach (
		$fields as
		$field
	){
		if (
			isset($mm_fields[$field]) &&
			!$mm_fields[$field]['tv']
		){
			$docFields[] = $field;
		}
	}
	
	if (
		//If $fields set as an empty string, we need to get only TVs 
		!empty($fields) &&
		//If $fields contains no TVs
		count($docFields) == count($fields)
	){
		$result = $docFields;
	}else{
		//Get specified TVs for this template
		$fields = tplUseTvs(
			$tempaleId,
			$fields,
			$tvTypes,
			'name',
			'name'
		);
		
		//If there are no appropriate TVs
		if ($fields == false){
			if (!empty($docFields)){
				$result = $docFields;
			}
		}else{
			$result = array_merge(
				array_keys($fields),
				$docFields
			);
		}
	}
	
	return $result;
}

/**
 * makeSqlList
 * @version 1.0.5 (2020-11-01)
 * 
 * @desc Create a MySQL-safe list from an array.
 * 
 * @param $fieldsArray {arrayAssociative|stringCommaSeparated} — Values, key — name, value — value. @required
 * 
 * @return {string}
 */
function makeSqlList($fieldsArray){
	global $modx;
	
	$fieldsArray = makeArray($fieldsArray);
	
	foreach(
		$fieldsArray as
		$name =>
		$value
	){
		//if (substr($value, 0, 2) == 'tv'){$value = substr($value, 2);}
		//Escape them for MySQL
		$fieldsArray[$name] =
			"'" .
			$modx->db->escape($value) .
			"'"
		;
	}
	
	return
		" (" .
		implode(
			',',
			$fieldsArray
		) .
		") "
	;
}

/**
 * includeJsCss
 * @version 1.3.7 (2020-11-01)
 * 
 * @desc Generates the code needed to include an external script file.
 * 
 * @param $source {string} — The URL of the external script or code (if $plaintext == true). @required
 * @param $outputType {'js'|'html'} — Either js or html - depending on where the output is appearing. Default: 'js'.
 * @param $name {string} — Script name. Default: ''.
 * @param $version {string} — Script version. Default: ''.
 * @param $plaintext {boolean} — Is this plaintext? Default: false.
 * @param $type {''|'js'|'css'} — Type of source (required if $plaintext == true). Default: ''.
 * 
 * @return {string} — Code.
 */
function includeJsCss(
	$source,
	$outputType = 'js',
	$name = '',
	$version = '',
	$plaintext = false,
	$type = ''
){
	global
		$modx,
		$mm_includedJsCss
	;
	
	$useThisVer = true;
	$result = '';
	
	if ($plaintext){
		if (
			empty($name) ||
			empty($version) ||
			empty($type)
		){
			return $result;
		}
		
		$nameVersion = [
			'name' => $name,
			'version' => $version,
			'extension' => $type
		];
	}else{
		if (
			empty($name) ||
			empty($version)
		){
			$nameVersion = ddTools::parseFileNameVersion($source);
		}else{
			$temp = pathinfo($source);
			
			$nameVersion = [
				'name' => $name,
				'version' => $version,
				'extension' =>
					!empty($type) ?
					$type :
					(
						$temp['extension'] ?
						$temp['extension'] :
						'js'
					)
			];
		}
	}
	
	//If this script is already included
	if (isset($mm_includedJsCss[$nameVersion['name']])){
		//If old < new, use new, else — old
		$useThisVer = version_compare(
			$mm_includedJsCss[$nameVersion['name']]['version'],
			$nameVersion['version'],
			'<'
		);
	}else{
		//Add
		$mm_includedJsCss[$nameVersion['name']] = [];
	}
	
	//If the new version is used
	if ($useThisVer){
		//Save the new version
		$mm_includedJsCss[$nameVersion['name']]['version'] = $nameVersion['version'];
		
		$result = $source;
		
		if (!$plaintext){
			$result .=
				strrpos(
					$result,
					'?'
				) !== false ?
				'&' :
				'?'
			;
			//Version was added at the end of path (“path/to/file.js?version=1.0”) to avoid browser cache.
			$result .=
				'version=' .
				$nameVersion['version']
			;
		}
		
		if ($nameVersion['extension'] == 'css'){
			if ($plaintext){
				$result =
					'<style type="text/css">' .
					$result .
					'</sty\'+\'le>'
				;
			}else{
				$result =
					'<link href="' .
					$result .
					'" rel="stylesheet" type="text/css" />'
				;
			}
		}else{
			if ($plaintext){
				$result =
					'<script type="text/javascript" charset="' .
					$modx->getConfig('modx_charset') .
					'">' .
					$result .
					'</script>'
				;
			}else{
				$result =
					'<script src="' .
					$result .
					'" type="text/javascript"></script>'
				;
			}
			
			if ($outputType == 'js'){
				$result = str_replace(
					'</script>',
					'</scr\'+\'ipt>',
					$result
				);
			}
		}
		
		if ($outputType == 'js'){
			$result =
				'$j("head").append(\'' .
				$result .
				'\');'
			;
		}
		
		$result =
			$result .
			PHP_EOL
		;
	}
	
	return $result;
}

/**
 * @deprecated, use the includeJsCss()
 */
function includeJs($url, $outputType = 'js', $name = '', $version = ''){
	return includeJsCss($url, $outputType, $name, $version);
}

/**
 * @deprecated, use the includeJsCss()
 */
function includeCss($url, $outputType = 'js'){
	return includeJsCss($url, $outputType);
}

/**
 * prepareTabId
 * @version 1.0.2 (2020-11-01)
 * 
 * @desc Prepare id of a tab.
 * 
 * @param $id {string} — Tab ID. Default: 'general'.
 * 
 * @return {string} — Tab ID.
 */
function prepareTabId($id){
	//General tab by default
	if ($id == ''){
		$id = 'general';
	}
	
	//If it's one of the default tabs, we need to get the capitalisation right
	switch ($id){
		case 'general':
		case 'settings':
		case 'access':
		//version 1.0.0 only, removed in 1.0.1
		case 'meta':
			$id = ucfirst($id);
		break;
	}
	
	return
		'tab' .
		$id
	;
}

/**
 * prepareSectionId
 * @version 1.1.1 (2020-11-01)
 * 
 * @desc Prepare id of a section.
 * 
 * @param $id {string} — Section ID.
 * 
 * @return {string} — Section ID.
 */
function prepareSectionId($id){
	switch ($id){
		case 'content':
			$id = 'content';
		break;
		
		case 'tvs':
			$id = 'tv';
		break;
		
		default:
			$id =
				'ddSection' .
				$id
			;
		break;
	}
	
	return $id;
}
?>