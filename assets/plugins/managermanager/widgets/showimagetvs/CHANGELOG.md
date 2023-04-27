# (MODX)EvolutionCMS.plugins.ManagerManager.mm_widget_showimagetvs changelog


## Version 1.3 (2020-11-01)
* \* Attention! PHP >= 5.4 is required.
* \* Attention! (MODX)EvolutionCMS.plugins.ManagerManager >= 0.7 is required.
* \* Refactoring:
	* \* The repository structure was changed.
	* \* The widget now using named parameters (with backward compatibility).
	* \* `$modx->getConfig('site_url')` is used istead of `$modx->config['site_url']`.
	* \* `getTplMatchedFields` is used.
	* \* `jQuery.ddMM.getFieldElems` is used.
* \* `jQuery.ddMM.mm_widget_showimagetvs`:
	* \* Compatibility with `jQuery.ddTools` >= 2.0.
	* \* File name refactoring.
* \+ README.
* \+ README_ru.
* \+ CHANGELOG.
* \+ CHANGELOG_ru.
* \+ Composer.json.


## Version 1.2.1 (2014-05-07)
* \* The `jQuery.fn.mm_widget_showimagetvs` plugin has been updated to 1.0.2:
	* \* The `load` event instead of `change` is triggered for the first time.
	* \* `thumbnailerUrl` is used only if `src` of an image is not empty.
	* \* URLs of images are now always absolute (even if `thumbnailerUrl` is set).


## Version 1.2b (2014-03-01)
* \* The template id of a current document is set equally to `$mm_current_page['template']`.
* \* The js code was revised completely and became a stand-alone file. It is convenient because of php code cleanness and it shortens the amount of code of a document edit frame.
* \* The parameters `$w` and `$h` have been renamed as `$maxWidth` and `$maxHeight` respectively.


## Version 1.1 (2012-11-13)
* \* The bug that causes false `change` trigger because of empty `jQuery.fn.data('lastvalue')` has been fixed. In the beginning the last value was not initialized and then it would every 250 ms. The last value initialization was triggered by `change` that caused annoying pop-up window appearance with changes confirmation even there was no changes.
* \* Minor changes.


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />
<style>ul{list-style:none;}</style>