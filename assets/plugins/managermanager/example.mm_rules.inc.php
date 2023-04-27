<?php
// These are some example ManagerManager rules. They can be located in a file or in a chunk - specify these 
// in the plugin configuration tab.

// If you want to refer to a role of template, you can define it in a variable to make your 
// rules more readable, and more easily maintainable.
// Here, we have a role set up for News Editors - the ID of this role is 3
$newsRole = '3';

// Our news editors are non-technical, so hide some fields which may scare them
mm_hideFields(
	'pagetitle,menutitle,link_attributes,template,menuindex,description,show_in_menu,which_editor,is_folder,is_richtext,log,searchable,cacheable,clear_cache',
	$newsRole
);
// Rename the settings tab for news editors to make it clearer
mm_renameTab(
	'settings',
	'Publication settings',
	$newsRole
);
// Rename the longtitle firled to make it more appropriate for news editors
mm_renameField(
	'longtitle',
	'Headline',
	$newsRole,
	'',
	'This will be displayed at the top of each page'
);

// We'd like to treat our news stories differently from other documents, so let's customise them. They use a specific
// template (ID 10) so let's set a variable with this ID in.
$newsTpl = '10';

// We categorise our news stories with a TV (news_category), so let's put this on a new tab to make it obvious to editors
mm_createTab(
	'Categories',
	'cats',
	'',
	$newsTpl,
	'',
	'600'
);
mm_moveFieldsToTab(
	'news_category',
	'cats',
	'',
	$newsTpl
);
// Some of our field names could be clarified for news stories...
mm_changeFieldHelp(
	'longtitle',
	'The story\'s headline',
	'',
	$newsTpl
);
mm_changeFieldHelp(
	'introtext',
	'A short summary of the story',
	'',
	$newsTpl
);
// We don't need to show these, as news stories aren't shown in menus
mm_hideFields(
	'menuindex,show_in_menu',
	'',
	$newsTpl
);
// Always make the page, menu and long titles the same
mm_synch_fields(
	'pagetitle,menutitle,longtitle',
	'',
	$newsTpl
);

// Set some defaults for everyone

// Always set the default publication date to today
mm_default('pub_date');
// Change the introtext field name to something more plain English
mm_renameField(
	'introtext',
	'Summary'
);
// and do the same for some of the help messages
mm_changeFieldHelp(
	'alias',
	'The URL that will be used to reach this story. Only numbers, letters and hyphens can be used'
);

// Add some widgets to certain TVs
// Give blog tag editing capabilities to the 'blogTags' TV
mm_widget_tags('blogTags');
// make a color selector widget for the 'colour' TV
mm_widget_colors(
	'colour',
	'#666666'
);
// Always give a preview of Image TVs
mm_widget_showimagetvs();

// For everyone except administrators - this field doesn't mean much to anyone else
mm_hideFields(
	'link_attributes',
	'!1'
);
?>