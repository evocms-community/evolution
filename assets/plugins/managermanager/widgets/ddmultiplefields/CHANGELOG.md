# (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields changelog


## Version 4.12 (2023-04-16)
* \+ Parameters → `$params->columns[i]['defaultValue']`: The new optional parameter. Provides the ability to set a custom value that will be used to check when deleting empty rows.


## Version 4.11 (2023-03-11)
* \* Richtext editor window:
	* \+ Widget version has been added to included CSS and JS to prevent browser cache after updates.
	* \* Style has been improved.
* \+ README → Links → GitHub.


## Version 4.10 (2023-03-11)
* \* Richtext editor window: Style has been improved.


## Version 4.9 (2022-05-26)
* \+ Parameters → `$params->columns[i]['alias']`:
	* \+ The new optional parameter. Provides the ability to set a custom result key for each column instead of simple numeric index.
	* \+ The widget also supports changing indexes to aliases for TVs already filled with existing values.
* \* Missed icon in the “add” button has been fixed. Many thanks to @byscrimm.
* \+ Composer.json:
	* \+ `support` → `chat`.
	* \+ `authors` → author → `homepage`.


## Version 4.8.6 (2021-10-04)
* \* Improved working with deprecated `id` columns.
* \* Improved working with invalid JSON field values.


## Version 4.8.5 (2021-10-03)
* \* (MODX)EvolutionsCMS.libraries.ddTools is including from `assets/libs/ddTools/`, because ManagerManager does not contain the library files anymore.


## Version 4.8.4 (2021-01-15)
* \* `jQuery.ddMM.mm_ddMultipleFields.init`: Missing table header was fixed.
* \+ README → Links → Packagist.


## Version 4.8.3 (2020-12-19)
* \* Richtext column: TinyMCE uses CMS config.
* \* The repository structure was changed.


## Version 4.8.2 (2020-05-26)
* \* Richtext column: **All** `<`, `>` and `&` are not replaced to HTML entities (`&lt;`, `&gt;` and `&amp;` respectively).


## Version 4.8.1 (2020-05-25)
* \* Improved uniqueness row ID while it is used for backward compatibility.
* \* `jQuery.ddMM.mm_ddMultipleFields.init`: Fixed deprecated ID column using.


## Version 4.8 (2020-05-25)
* \* Richtext column: `<`, `>` and `&` are not replaced to HTML entities (`&lt;`, `&gt;` and `&amp;` respectively).
* \* TV value stores as a JSON object, no more separated strings (with backward compatibility).
* \+ The widget always generates an unique ID for each row and save it as a row key in result object (see README).
* \* Parameters → `$params->columns[i]['type']`: The `'id'` value is deprecated (with backward compatibility).
* \* It is strongly recommend to use (MODX)EvolutionCMS.snippets.ddGetMultipleField >= 3.5 for rendering TVs on site.
* \+ Empty rows (rows objects with empty column values) will not be saved.
* \+ README.
* \+ README_ru.
* \+ CHANGELOG.
* \+ CHANGELOG_ru.
* \+ Composer.json.


## Version 4.7.4 (2019-06-23)
* \* New path of (MODX)EvolutionCMS.libraries.ddTools for compatibility with the new ManagerManager version.


## Version 4.7.3 (2018-11-22)
* \* Style: Improved input height.
* \* The `$modx->getConfig` method is used instead of the `$modx->config` property.
* \* Richtext pupup window (_Many thanks to [@MrSwed](https://github.com/MrSwed)._):
	* \+ Textarea autofocus.
	* \* No scrolls in the window.
	* \* Correct window and element sizes.


## Version 4.7.2 (2018-03-29)
* \* `jQuery.ddMM.mm_ddMultipleFields`:
	* \* Datepicker now gets the value of day and months from MODX config.
	* \* `makeSelect`: Set field width using the parameter.


## Version 4.7.1 (2017-05-03)
* \* Richtext editor is used from `$modx->config['which_editor']`. _Many thanks to [@MrSwed](https://github.com/MrSwed)._
* \* Rich text field in popup window is now working correctly even TinyMCE is not installed.


## Version 4.7 (2016-11-19)
* \* Attention! PHP >= 5.4 is required.
* \* Attention! (MODX)EvolutionCMS.plugins.ManagerManager >= 0.7 is required.
* \* PHP short array syntax is used because it's more convenient.
* \* Refactoring, the widget now using named parameters (with backward compatibility).
* \* Refactoring: `jQuery.ddMM.fields` is used istead of manually DOM finding.
* \* `jQuery.ddMM.mm_ddMultipleFields`:
	* \* Refactoring, the plugin now using named parameters.
	* \* Refactoring `jQuery.ddMM.mm_ddMultipleFields.instances`:
		* \* Items is pushed by `jQuery.ddMM.mm_ddMultipleFields.init`.
		* \* `currentField` was renamed as `$currentField`.
		* \+ `$parent`, `$originalField` and `$table` ware added.
* \* The `$params->columns` parameter now must be an array. Items contain type, title, width and data. `$params->columnsTitles`, `$params->columnsWidth` and `$params->columnsData` are deprecated. Of course, with backward compatibility.
* \+ Add button is inserted in every row (closes #7).
* \* Small style changes.


## Version 4.6 (2014-10-24)
* \* Attention! (MODX)EvolutionCMS.plugins.ManagerManager >= 0.6.3 is required.
* \* Be advised! You should use the `image` and / or `file` column types instead of `field` (backward compatibility maintained).
* \* The `$dir` variable was renamed as `$richtextIncludeDirectory` because of some namespace troubles.
* \* The `textarea` input type is now required for TVs with multiple fields regardless of what their field types are.
* \* `$.ddMM.mm_ddMultipleFields` has been updated to 1.2:
	* \* You should use the `image` and / or `file` column types instead of `field`.
	* \- The parameters `makeFieldFunction` and `browseFuntion` were removed as unnecessary.
	* \- The method `maskQuoutes` has been removed. Therefore, quotes are not now converted to html-entities.
	* \* Values of inputs are assigned via `$.fn.val`.
	* \* Added initializations of the following functions `OpenServerBrowser`, `BrowseServer`, `BrowseFileServer`, `SetUrlChange`, `SetUrl` if required (it's a copy from the MODX kernel).
	* \* Modification of `SetUrl` is performed only for old versions of MODX (if the function `SetUrlChange` is absent).


## Version 4.5.1 (2014-05-15)
* \* `jQuery.fn.mm_ddMultipleFields` has been updated to 1.0.1:
	* \* Removing events of the (MODX)EvolutionCMS.plugins.ManagerManager.mm_widget_showimagetvs plugin has been added.
* \* `richtext/index.php`:
	* \* The redundant slash has been removed from the include statements.
	* \* The `manager/includes/protect.inc.php` file is icluded before `manager/includes/config.inc.php`.
	* \* The relative path and `MGR_DIR` are used in include statements instead of `MODX_MANAGER_PATH` (needed if the site is not located in `$_SERVER['DOCUMENT_ROOT']`).


## Version 4.5 (2013-12-10)
* \* Attention! (MODX)EvolutionCMS.plugins.ManagerManager >= 0.6 is required.
* \+ The new `richtext` type of `$coloumns` has been added.
* \+ Support of the `textarea` and `email` TV types has been added.
* \* The three calls of `tplUseTvs` were replaced by the single one with arguments.
* \* JS and CSS files are currently included via `includeJsCss` to avoid occuring of duplicates.
* \* The JS code became a stand-alone file and was partially revised. It is convenient because of PHP code cleanness and it shortens the amount of code of a document edit frame.
* \* The including of required JS and CSS files is currently being realized while occuring the event `OnDocFormPrerender`. The files are included as HTML.
* \* Special chars are currently escaped during parsing of `columnsData` regardless of eval use.
* \* The title and width of the column `id` are set as `''` and `0` respectively due to redundancy of the data because the column is hidden.
* \* The exception for outputting of columns of the `id` type while iterating over their headers has been created. They are currently rendered as empty undisplayed `<th>`.


## Version 4.4.2 (2013-07-02)
* \* The template ID of a current document is set equally to `$mm_current_page['template']`.


## Version 4.4.1 (2013-06-18)
* \* The `+` button bug while initializing the widget has been fixed.


## Version 4.4b (2013-05-20)
* \+ The new types of `$columns` were added (`textarea`, `date`).
* \* The number of titles in `$columnsTitle` can be smaller than the number of columns. In that case the extra-columns titles will be empty.
* \* jQuery-UI has been removed from the widget folder (because it is located in `/assets/plugins/managermanager/js/` as well as jQuery).
* \* Optimization for the new version of jQuery.
* \* The updating of an original field takes place while saving of a whole document document (it really makes everything simplier).
* \* Widget appearance was simplified.
* \* The `+` button is no longer active when the rows maximum is reached.
* \* The errors in the parameters names have been eliminated.
* \* Refactoring for optimization.


## Version 4.3.4 (2012-12-20)
* \* The minimal number of rows bug has been fixed. The array used to be filled by `undefined` values so the error of `replace` method occurred.


## Version 4.3.3 (2012-09-17)
* \* The error of `id` field has been eliminated. The last `id` value used to be deleted and used not to be created again.


## Version 4.3.2 (2012-05-04)
* \* Premature initialization of field with image error has been eliminated (the `change.ddEvents` event).
* \* Minor code changes.


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />
<style>ul{list-style:none;}</style>