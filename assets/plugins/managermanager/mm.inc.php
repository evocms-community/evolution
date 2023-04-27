<?php
/**
 * ManagerManager
 * @version 0.6.2 (2014-05-28)
 * 
 * @desc Used to manipulate the display of document fields in the manager.
 * 
 * @uses PHP >= 5.4.
 * @uses (MODX)EvolutionCMS >= 1.1 {@link https://github.com/evolution-cms/evolution }
 * 
 * @author DivanDesign studio {@link www.DivanDesign.biz }
 * @author Nick Crossland {@link www.rckt.co.uk }
 * 
 * @inspiration HideEditor plugin by Timon Reinhard and Gildas; HideManagerFields by Brett @ The Man Can!
 * 
 * @license Released under the GNU General Public License: http://creativecommons.org/licenses/GPL/2.0/
 * 
 * @link http://code.divandesign.biz/modx/managermanager/0.6.2
 * 
 * @copyright 2012–2016
 */

// Set variables
global
	$content,
	$template,
	$default_template,
	$mm_pluginDir,
	$mm_version,
	$mm_current_page,
	$mm_fields,
	$mm_includedJsCss,
	// Current event
	$e
;

$mm_version = '0.6.2';
$mm_pluginDir =
	$modx->getConfig('base_path') .
	'assets/plugins/managermanager/'
;

$e = &$modx->Event;

// Bring in some preferences which have been set on the configuration tab of the plugin, and normalise them

if (!isset($e->params['config_chunk'])){
	$e->params['config_chunk'] = '';
}

if (!is_array($mm_includedJsCss)){
	$mm_includedJsCss = [];
}

$mm_current_page = [];

//Get page template
if (isset($e->params['template'])){
	$mm_current_page['template'] = $e->params['template'];
}elseif (isset($_POST['template'])){
	$mm_current_page['template'] = $_POST['template'];
}elseif (isset($content['template'])){
	$mm_current_page['template'] = $content['template'];
}elseif (isset($template)){
	$mm_current_page['template'] = $template;
}else{
	$mm_current_page['template'] = $default_template;
}

$mm_current_page['role'] = $_SESSION['mgrRole'];

$jsUrls = [
	'jq' => [
		'url' =>
			$modx->getConfig('site_url') .
			'assets/plugins/managermanager/js/jQuery-3.1.1.min.js'
		,
		'name' => 'jquery',
		'version' => '3.1.1'
	],
	'mm' => [
		'url' =>
			$modx->getConfig('site_url') .
			'assets/plugins/managermanager/js/jquery.ddMM.js'
		,
		'name' => 'ddMM',
		'version' => '1.2.1'
	],
	'ddTools' => [
		'url' =>
			$modx->getConfig('site_url') .
			'assets/plugins/managermanager/js/jQuery.ddTools-2.3.1.min.js'
		,
		'name' => 'jquery.ddTools',
		'version' => '2.3.1'
	],
	'ddUI' => [
		'url' =>
			$modx->getConfig('site_url') .
			'assets/plugins/managermanager/js/jQuery.ddUI-0.16.min.js'
		,
		'name' => 'jquery.ddUI',
		'version' => '0.16.0'
	],
	'ddUICSS' => [
		'url' =>
			$modx->getConfig('site_url') .
			'assets/plugins/managermanager/js/jQuery.ddUI-0.16.min.css'
		,
		'name' => 'jquery.ddUI',
		'version' => '0.16.0'
	]
];

//Include (MODX)EvolutionCMS.libraries.ddTools (needed for some widgets)
require_once(
	//path to `assets`
	dirname(
		__DIR__,
		2
	) .
	'/libs/ddTools/modx.ddtools.class.php'
);
//Include Utilites
include_once(
	$mm_pluginDir .
	'utilities.inc.php'
);

// When loading widgets, ignore folders / files beginning with these chars
$ignore_first_chars = [
	'.',
	'_',
	'!'
];

// Include widgets
// We look for a PHP file with the same name as the directory - e.g.
// /widgets/widgetname/widgetname.php
$widget_dir =
	$mm_pluginDir .
	'widgets'
;

if ($handle = opendir($widget_dir)){
	while (($file = readdir($handle)) !== false){
		if (
			!in_array(
				substr(
					$file,
					0,
					1
				),
				$ignore_first_chars
			) &&
			$file != '..' &&
			is_dir(
				$widget_dir .
				'/' .
				$file
			)
		){
			include_once(
				$widget_dir .
				'/' .
				$file .
				'/' .
				$file .
				'.php'
			);
		}
	}
	
	closedir($handle);
}

// What are the fields we can change, and what types are they?
$mm_fields = [
	'pagetitle' => [
		'fieldtype' => 'input',
		'fieldname' => 'pagetitle',
		'dbname' => 'pagetitle',
		'tv' => false
	],
	'longtitle' => [
		'fieldtype' => 'input',
		'fieldname' => 'longtitle',
		'dbname' => 'longtitle',
		'tv' => false
	],
	'description' => [
		'fieldtype' => 'input',
		'fieldname' => 'description',
		'dbname' => 'description',
		'tv' => false
	],
	'alias' => [
		'fieldtype' => 'input',
		'fieldname' => 'alias',
		'dbname' => 'alias',
		'tv' => false
	],
	'link_attributes' => [
		'fieldtype' => 'input',
		'fieldname' => 'link_attributes',
		'dbname' => 'link_attributes',
		'tv' => false
	],
	'introtext' => [
		'fieldtype' => 'textarea',
		'fieldname' => 'introtext',
		'dbname' => 'introtext',
		'tv' => false
	],
	'template' => [
		'fieldtype' => 'select',
		'fieldname' => 'template',
		'dbname' => 'template',
		'tv' => false
	],
	'menutitle' => [
		'fieldtype' => 'input',
		'fieldname' => 'menutitle','dbname' => 'menutitle',
		'tv' => false
	],
	'menuindex' => [
		'fieldtype' => 'input',
		'fieldname' => 'menuindex',
		'dbname' => 'menuindex',
		'tv' => false
	],
	'show_in_menu' => [
		'fieldtype' => 'input',
		'fieldname' => 'hidemenucheck','dbname' => 'hidemenu',
		'tv' => false
	],
	// synonym for show_in_menu
	'hide_menu' => [
		'fieldtype' => 'input',
		'fieldname' => 'hidemenucheck',
		'dbname' => 'hidemenu',
		'tv' => false
	],
	'parent' => [
		'fieldtype' => 'input',
		'fieldname' => 'parent',
		'dbname' => 'parent',
		'tv' => false
	],
	'is_folder' => [
		'fieldtype' => 'input',
		'fieldname' => 'isfoldercheck',
		'dbname' => 'isfolder',
		'tv' => false
	],
	'alias_visible' => [
		'fieldtype' => 'input',
		'fieldname' => 'alias_visible_check',
		'dbname' => 'alias_visible',
		'tv' => false
	],
	'is_richtext' => [
		'fieldtype' => 'input',
		'fieldname' => 'richtextcheck','dbname' => 'richtext',
		'tv' => false
	],
	'donthit' => [
		'fieldtype' => 'input',
		'fieldname' => 'donthitcheck',
		'dbname' => 'donthit',
		'tv' => false
	],
	'published' => [
		'fieldtype' => 'input',
		'fieldname' => 'publishedcheck','dbname' => 'published',
		'tv' => false
	],
	'pub_date' => [
		'fieldtype' => 'input',
		'fieldname' => 'pub_date',
		'dbname' => 'pub_date',
		'tv' => false
	],
	'unpub_date' => [
		'fieldtype' => 'input',
		'fieldname' => 'unpub_date',
		'dbname' => 'unpub_date',
		'tv' => false
	],
	'searchable' => [
		'fieldtype' => 'input',
		'fieldname' => 'searchablecheck','dbname' => 'searchable',
		'tv' => false
	],
	'cacheable' => [
		'fieldtype' => 'input',
		'fieldname' => 'cacheablecheck',
		'dbname' => 'cacheable',
		'tv' => false
	],
	'clear_cache' => [
		'fieldtype' => 'input',
		'fieldname' => 'syncsitecheck','dbname' => '',
		'tv' => false
	],
	'content_type' => [
		'fieldtype' => 'select',
		'fieldname' => 'contentType',
		'dbname' => 'contentType',
		'tv' => false
	],
	'content_dispo' => [
		'fieldtype' => 'select',
		'fieldname' => 'content_dispo',
		'dbname' => 'content_dispo',
		'tv' => false
	],
	'keywords' => [
		'fieldtype' => 'select',
		'fieldname' => 'keywords[]',
		'dbname' => '',
		'tv' => false
	],
	'metatags' => [
		'fieldtype' => 'select',
		'fieldname' => 'metatags[]',
		'dbname' => '',
		'tv' => false
	],
	'content' => [
		'fieldtype' => 'textarea',
		'fieldname' => 'ta',
		'dbname' => 'content',
		'tv' => false
	],
	'which_editor' => [
		'fieldtype' => 'select',
		'fieldname' => 'which_editor','dbname' => '',
		'tv' => false
	],
	'resource_type' => [
		'fieldtype' => 'select',
		'fieldname' => 'type',
		'dbname' => 'isfolder',
		'tv' => false
	],
	'weblink' => [
		'fieldtype' => 'input',
		'fieldname' => 'ta',
		'dbname' => 'content',
		'tv' => false
	]
];

// Add in TVs to the list of available fields
$allTvs = $modx->db->makeArray($modx->db->select(
	'name,type,id',
	\ddTools::$tables['site_tmplvars'],
	'',
	'name ASC'
));
foreach (
	$allTvs as
	$thisTv
){
	// What is the field name?
	$fieldName = $thisTv['name'];
	
	// Checkboxes place an underscore in the ID, so accommodate this...
	$fieldName_suffix = '';
	
	// What fieldtype is this TV type?
	// fix for MODX EVO 1.1 by Dmi3yy
	$thisTvI = explode(
		':',
		$thisTv['type']
	);
	
	switch ($thisTvI[0]){
		case 'textarea':
		case 'rawtextarea':
		case 'textareamini':
		case 'richtext':
		case 'custom_tv':
			$fieldType = 'textarea';
		break;
		
		case 'dropdown':
		case 'listbox':
			$fieldType = 'select';
		break;
		
		case 'listbox-multiple':
			$fieldType = 'select';
			$fieldName_suffix = '[]';
		break;
		
		case 'checkbox':
			$fieldType = 'input';
			$fieldName_suffix = '[]';
		break;
		
		default:
			$fieldType = 'input';
		break;
	}
	
	// check if there are any name clashes between TVs and default field names? If there is, preserve the default field
	if (!isset($mm_fields[$fieldName])){
		$mm_fields[$fieldName] = [
			'fieldtype' => $fieldType,
			'fieldname' =>
				'tv' .
				$thisTv['id'] .
				$fieldName_suffix
			,
			'dbname' => '',
			'tv' => true
		];
	}
}

if (!function_exists('ManagerManager_includeRules')){
	/**
	 * ManagerManager_includeRules
	 * @version 1.0.2 (2020-07-29)
	 * 
	 * @desc Include the rules.
	 * 
	 * @param $chunkName {string} — Chunk that contains rules. Default: —.
	 * 
	 * @return {string} — Including status message.
	 */
	function ManagerManager_includeRules($chunkName){
		//Global modx object & $content for rules
		global
			$modx,
			$content
		;
		
		$result = '';
		
		$configFilePath =
			$modx->getConfig('base_path') .
			'assets/plugins/managermanager/mm_rules.inc.php'
		;
		
		//See if there is any chunk output (e.g. it exists, and is not empty)
		$chunkContent = $modx->getChunk($chunkName);
		
		if (!empty($chunkContent)){
			// If there is, run it.
			eval($chunkContent);
			
			$result =
				'// Getting rules from chunk: ' .
				$chunkName
			;
		//If there's no chunk output, read in the file.
		}elseif (is_readable($configFilePath)){
			include($configFilePath);
			
			$result =
				'// Getting rules from file: ' .
				$configFilePath
			;
		}else{
			$result = '// No rules found';
		}
		
		return
			$result .
			PHP_EOL .
			PHP_EOL
		;
	}
}

if (!function_exists('ManagerManger_initJQddMM')){
	/**
	 * ManagerManger_initJQddMM
	 * @version 1.1.2 (2020-07-29)
	 * 
	 * @desc jQuery.ddMM initialization.
	 * 
	 * @return {string_js}
	 */
	function ManagerManger_initJQddMM(){
		global
			$modx,
			$_lang,
			$mm_fields
		;
		
		$result =
'
$j.ddMM.config.site_url = "' . $modx->getConfig('site_url') . '";
$j.ddMM.config.datetime_format = "' . $modx->getConfig('datetime_format') . '";
$j.ddMM.config.datepicker_offset = ' . $modx->getConfig('datepicker_offset') . ';

$j.ddMM.lang.dp_dayNames = ' . $_lang['dp_dayNames'] . ';
$j.ddMM.lang.dp_monthNames = ' . $_lang['dp_monthNames'] . ';
$j.ddMM.lang.dp_startDay = ' . $_lang['dp_startDay'] . ';
$j.ddMM.lang.edit = "' . $_lang['edit'] . '";

$j.ddMM.urls.manager = "' . MODX_MANAGER_URL . '";

$j.ddMM.fields = $j.parseJSON(\'' . json_encode($mm_fields) . '\');
';
		
		return $result;
	}
}

// The start of adding or editing a document (before the main form)
switch ($e->name){
	case 'OnDocFormPrerender':
		$e->output(
			'<!-- Begin ManagerManager output -->' .
			PHP_EOL
		);
		
		// Load the js libraries
		if(empty($modx->config['mgr_jquery_path'])){
			$e->output(includeJsCss(
				$jsUrls['jq']['url'],
				'html',
				$jsUrls['jq']['name'],
				$jsUrls['jq']['version']
			));
		}
		
		$e->output(includeJsCss(
			$jsUrls['mm']['url'],
			'html',
			$jsUrls['mm']['name'],
			$jsUrls['mm']['version']
		));
		
		$e->output(includeJsCss(
			$jsUrls['ddTools']['url'],
			'html',
			$jsUrls['ddTools']['name'],
			$jsUrls['ddTools']['version']
		));
		
		$e->output(includeJsCss(
			$jsUrls['ddUI']['url'],
			'html',
			$jsUrls['ddUI']['name'],
			$jsUrls['ddUI']['version']
		));
		
		$e->output(includeJsCss(
			$jsUrls['ddUICSS']['url'],
			'html',
			$jsUrls['ddUICSS']['name'],
			$jsUrls['ddUICSS']['version']
		));
		
		
		// Create a mask to cover the page while the fields are being rearranged
		$e->output(
'
<div id="loadingmask">&nbsp;</div>
<script type="text/javascript">
window.$j = jQuery.noConflict();
' . ManagerManger_initJQddMM() . '
$j("#loadingmask").css({
	width: "100%",
	minHeight: "100%",
	position: "absolute",
	zIndex: "1000",
	backgroundColor: "#ffffff"
});

$j(function(){
	$j("#loadingmask").css({height: $j("body").height()});
});
</script>
');
		
		//Just run widgets
		ManagerManager_includeRules($e->params['config_chunk']);
		
		$e->output(
			'<!-- End ManagerManager output -->' .
			PHP_EOL
		);
	break;
	
	// The main document editing form
	case 'OnDocFormRender':
		// Include the JQuery call
		$e->output('
<!-- ManagerManager Plugin :: ' . $mm_version . ' -->
<!-- This document is using template: ' . $mm_current_page['template']  . ' -->
<!-- You are logged into the following role: ' . $mm_current_page['role']  . ' -->

<script type="text/javascript" charset="' . $modx->getConfig('modx_charset') . '">
	var mm_lastTab = "tabGeneral";
	var mm_sync_field_count = 0;
	var synch_field = new Array();
	
	$j(document).ready(function(){
		// Lets handle errors nicely...
		try {
			// Change section index depending on Content History running or not
			//ch-body is the CH id name (currently at least)
			var sidx = ($j("div.sectionBody:eq(1)").attr("id") == "ch-body") ? 1 : 0;
			
			// Give IDs to the sections of the form
			// This assumes they appear in a certain order
			$j("div.sectionHeader:eq(sidx)").attr("id", "sectionContentHeader");
			$j("div.sectionHeader:eq(sidx+1)").attr("id", "sectionTVsHeader");
			
			$j("div.sectionBody:eq(sidx+1)").attr("id", "sectionContentBody");
			$j("div.sectionBody:eq(sidx+2)").attr("id", "sectionTVsBody");
		');
		
		// Get the JS for the changes & display the status
		$e->output(ManagerManager_includeRules($e->params['config_chunk']));
		
		// Close it off
		$e->output('
			// Misc tidying up
			
			// General tab table container is too narrow for receiving TVs -- make it a bit wider
			$j("div#tabGeneral table").attr("width", "100%");
			
			// if template variables containers are empty, remove their section
			if ($j("div.tmplvars :input").length == 0){
				// Still contains an empty table and some dividers
				$j("div.tmplvars").hide();
				// Still contains an empty table and some dividers
				$j("div.tmplvars").prev("div").hide();
				//$j("#sectionTVsHeader").hide();
			}
			
			// If template category is empty, hide the optgroup
			$j("#template optgroup").each(function(){
				var $this = $j(this),
					visibleOptions = 0;
				
				$this.find("option").each(function(){
					if ($j(this).css("display") != "none"){visibleOptions++;}
				});
				
				if (visibleOptions == 0){$this.remove();}
			});
		}catch(e){
			// If theres an error, fail nicely
			alert("ManagerManager: An error has occurred: " + e.name + " - " + e.message);
		}finally{
			// Whatever happens, hide the loading mask
			$j("#loadingmask").hide();
		}
	});
</script>
<!-- ManagerManager Plugin :: End -->
		');
	break;
	
	case 'OnTVFormRender':
		// Should we remove deprecated Template variable types from the TV creation list?
		$removeDeprecatedTvTypes =
			$e->params['remove_deprecated_tv_types_pref'] == 'yes' ?
			true :
			false
		;
		
		if ($removeDeprecatedTvTypes){
			// Load the jquery library
			echo '<!-- Begin ManagerManager output -->';
			
			if(empty($modx->getConfig('mgr_jquery_path'))){
				echo includeJsCss(
					$jsUrls['jq']['url'],
					'html',
					$jsUrls['jq']['name'],
					$jsUrls['jq']['version']
				);
			}
			
			// Create a mask to cover the page while the fields are being rearranged
			echo '
<script type="text/javascript">
	var $j = jQuery.noConflict();
	
	$j("select[name="type"] option").each(function(){
		var $this = $j(this);
		if(!($this.text().match("deprecated") == null)){
			$this.remove();
		}
	});
</script>
			';
			
			echo '<!-- End ManagerManager output -->';
		}
	break;
	
	case 'OnDocDuplicate':
		//Get document template from db
		$mm_current_page['template'] = $modx->db->getValue($modx->db->select(
			'template',
			\ddTools::$tables['site_content'],
			'`id` = ' . $e->params['new_id']
		));
		
		//Just run widgets
		ManagerManager_includeRules($e->params['config_chunk']);
	break;
	
	case 'OnDocFormSave':
	case 'OnBeforeDocFormSave':
		//Just run widgets
		ManagerManager_includeRules($e->params['config_chunk']);
	break;
}
?>