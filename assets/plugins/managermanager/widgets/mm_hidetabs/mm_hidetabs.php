<?php
/**
 * mm_hideTabs
 * @version 1.2.1 (2016-07-08)
 * 
 * @desc A widget for ManagerManager plugin that allows one or a few tabs to be hidden on the document edit page.
 * 
 * @uses ManagerManager plugin 0.6.2.
 * 
 * @param $tabs {comma separated string} - The id(s) of the tab(s) this should apply to. Default MODX tabs: 'general', 'settings', 'access'. @required
 * @param $roles {comma separated string} - Role IDs for which the widget is applying (empty value means the widget is applying to all roles). Default: ''.
 * @param $templates {comma separated string} - Templates IDs for which the widget is applying (empty value means the widget is applying to all templates). Default: ''.
 * 
 * @event OnDocFormRender
 * 
 * @link http://code.divandesign.biz/modx/mm_hidetabs/1.2.1
 * 
 * @copyright 2012–2016 DivanDesign {@link http://www.DivanDesign.biz }
 */

function mm_hideTabs($tabs, $roles = '', $templates = ''){
	global $modx;
	$e = &$modx->Event;
	
	// if the current page is being edited by someone in the list of roles, and uses a template in the list of templates
	if ($e->name == 'OnDocFormRender' && useThisRule($roles, $templates)){
		$output = '//---------- mm_hideTabs :: Begin -----'.PHP_EOL;
		
		// if we've been supplied with a string, convert it into an array
		$tabs = makeArray($tabs);
		
		foreach($tabs as $tab){
			//meta for =< v1.0.0 only
			if (
				$tab != 'meta' ||
				(
					$modx->hasPermission('edit_doc_metatags') &&
					$modx->config['show_meta'] != '0'
				)
			){
				$output .=
'
var $mm_hideTabs_tabElement = $j("#'.prepareTabId($tab).'");

//If the element exists
if ($mm_hideTabs_tabElement.length > 0){
	//Hide the tab element
	$mm_hideTabs_tabElement.hide();
	//Hide the tab link
	$j($mm_hideTabs_tabElement.get(0).tabPage.tab).hide();
}
';
			}
		}
		
		$output .=
'
//All tabs
var $mm_hideTabs_allTabs = $j();

for (var i = 0; i < tpSettings.pages.length - 1; i++){
	$mm_hideTabs_allTabs = $mm_hideTabs_allTabs.add(tpSettings.pages[i].tab);
}

//If the active tab is hidden
if (
	//Tab exists (may not exist if it`s created by “mm_createTab”, which called later than “mm_hideTabs”)
	$j.type(tpSettings.pages[tpSettings.getSelectedIndex()]) != "undefined" &&
	//And hidden
	$j(tpSettings.pages[tpSettings.getSelectedIndex()].tab).is(":hidden")
){
	//Activate the first visible tab
	$mm_hideTabs_allTabs.filter(":visible").eq(0).trigger("click");
}
';
		
		$output .= '//---------- mm_hideTabs :: End -----'.PHP_EOL;
		
		$e->output($output);
	}
}
?>