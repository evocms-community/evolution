<?php
/**
 * mm_widget_tags
 * @version 1.2 (2016-09-26)
 * 
 * @desc A widget for ManagerManager plugin allowing tags to be added to the documents (the tag list creates automatically for the required TV with all written tags; new tags may be written right in the tag list) on the document edit page.
 * 
 * @uses ManagerManager plugin 0.6.2.
 * 
 * @param $fields {comma separated string} - The name(s) of the template variables this should apply to. @required
 * @param $tagDelimiter {string} - The sign that separates tags in the field. Default: ','.
 * @param $sourceFields {comma separated string} - The names(s) of the template variables the list of tags should come from. This allows the list of tags to come from a different field than the widget. By default it uses all the TVs listed in “fields” parameter. Default: =$fields.
 * @param $displayCount {boolean} - Display the number of documents using each tag (in brackets after it). Default: false.
 * @param $roles {comma separated string} - The roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * @param $templates {comma separated string} - The templates that the widget is applied to (when this parameter is empty then widget is applied to the all templates). Default: ''.
 * 
 * @event OnDocFormPrerender
 * @event OnDocFormRender
 * 
 * @link http://code.divandesign.biz/modx/mm_widget_tags/1.2
 * 
 * @copyright 2012–2016
 */

function mm_widget_tags($fields, $tagDelimiter = ',', $sourceFields = '', $displayCount = false, $roles = '', $templates = ''){
	if (!useThisRule($roles, $templates)){return;}
	
	global $modx;
	$e = &$modx->Event;
	
	$output = '';
	
	if ($e->name == 'OnDocFormPrerender'){
		$output .= includeJsCss($modx->config['base_url'].'assets/plugins/managermanager/widgets/tags/tags.js', 'html', 'mm_widget_tags', '1.0');
		$output .= includeJsCss($modx->config['base_url'].'assets/plugins/managermanager/widgets/tags/tags.css', 'html');
		
		$e->output($output);
	}else if ($e->name == 'OnDocFormRender'){
		global $mm_current_page, $mm_fields;
		
		// if we've been supplied with a string, convert it into an array
		$fields = makeArray($fields);
		
		// And likewise for the data source (if supplied)
		$sourceFields = empty($sourceFields) ? $fields : makeArray($sourceFields);
		
		$sourceFields = tplUseTvs($mm_current_page['template'], $sourceFields);
		if ($sourceFields == false){return;}
		
		$output .= '//---------- mm_widget_tags :: Begin -----'.PHP_EOL;
		
		// Go through each of the fields supplied
		foreach ($fields as $fields_item){
			$fields_item_id = $mm_fields[$fields_item]['fieldname'];
			
			// Get the list of current values for this TV
			$tagsFromAllDocs = $modx->db->getColumn('value', $modx->db->select(
				'value',
				ddTools::$tables['site_tmplvar_contentvalues'],
				'tmplvarid IN ('.implode(',', ddTools::unfoldArray($sourceFields)).')'
			));
			
			$tagsToOutput = array();
			foreach ($tagsFromAllDocs as $tagsFromAllDocs_item){
				$tagsFromAllDocs_item = explode($tagDelimiter, $tagsFromAllDocs_item);
				
				foreach ($tagsFromAllDocs_item as $tagsFromAllDocs_item_item){
					$tagsToOutput[trim($tagsFromAllDocs_item_item)]++;
				}
			}
			
			// Sort the TV values (case insensitively)
			uksort($tagsToOutput, 'strcasecmp');
			
			$htmlTagList = '';
			foreach($tagsToOutput as $tagsToOutput_item_name => $tagsToOutput_item_count){
				$htmlTagList .= '<li title="Used '.$tagsToOutput_item_count.' times">'.jsSafe($tagsToOutput_item_name).($displayCount ? ' ('.$tagsToOutput_item_count.')' : '').'</li>';
			}
			
			$htmlTagList = '<ul class="mmTagList" id="'.$fields_item_id.'_tagList">'.$htmlTagList.'</ul>';
			
			// Insert the list of tags after the field
			$output .=
'
//mm_widget_tags for “'.$fields_item.'” ('.$fields_item_id.')
$j("#'.$fields_item_id.'").after(\''.$htmlTagList.'\');
';
			
			// Initiate the tagCompleter class for this field
			$output .= 'var '.$fields_item_id.'_tags = new TagCompleter("'.$fields_item_id.'", "'.$fields_item_id.'_tagList", "'.$tagDelimiter.'");'."\n";
		}
		
		$output .= '//---------- mm_widget_tags :: End -----'.PHP_EOL;
		
		$e->output($output);
	}
}
?>