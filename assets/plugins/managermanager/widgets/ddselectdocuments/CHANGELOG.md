# (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddSelectDocuments changelog


## Version 1.6 (2022-04-14)
* \+ Parameters → `filter`: Supports the not-equal-to operator.
* \* Refactoring:
	* \* `\DDTools\ObjectTools::extend` is used instead of `array_merge`.
	* \* `\DDTools\ObjectTools::convertType` is used instead of `json_encode`.
* \+ Composer.json.
* \+ README.
* \+ README_ru.
* \+ CHANGELOG.
* \+ CHANGELOG_ru.


## Version 1.5 (2016-12-20)
* \+ Parameters → `$params->parentIds[$i]`: Can be equal to `'current'` for using ID of current document.


## Version 1.4 (2016-11-04)
* \* Attention! PHP >= 5.4 is required.
* \* Attention! (MODX)EvolutionCMS.plugins.ManagerManager >= 0.7 is required.
* \* The widget now uses named parameters (with backward compatibility).
* \* jQuery.migrate 3.0 is used.
* \* jQuery.ddMultipleInput has been updated to 1.3.2.


## Version 1.3 (2016-06-06)
* \* The `$max` parameter became less fragile (closes #4).
* \* The `$parentIds` parameter can be equal `0` and `0` by default (closes #1).
* \+ The `$allowDoubling` parameter which allows to select duplicates values were added (closes #5).


## Version 1.2.2 (2014-02-14)
* \* The jQuery.ddMultipleInput plugin has been updated to 1.2.1 (minor style changes).


## Version 1.2.1 (2014-01-09)
* \* Small changes for compatibility with PHP < 5.3.


## Version 1.2 (2013-12-11)
* \* Attention! (MODX)EvolutionCMS.plugins.ManagerManager >= 0.6 is required.
* \+ The ability to use output templates for the document selection list elements (see the parameter `$labelMask`) has been added.
* \+ Suggested results can currenly be filtered by TV's values (see the parameter `$filter`).
* \+ An ability to sort selected elements has been added.
* \* Parsing of `jQuery.parseJSON` function was removed, because the JSON is a correct js-object.
* \* Multibyte encoding Unicode characters of the JSON string has been removed.
* \* Minor optimization: JSON encoding has been taken away from the cycle.
* \* The including of required js and css files is currently being realized while occuring the event `OnDocFormPrerender`. The files are included as html.
* \* The calls of the functions `includeJs` and `includeCss` were replaced by `includeJsCss`.
* \- The jQuery.ddTools library is no longer included here because it is in ManagerManager.


## Version 1.1b (2013-08-09)
* \+ The capability of selecting child documents from several parents has been added (`parentIds` is now a comma separated string).


## Version 1.0b (2013-05-30)
* \+ The first release.


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />
<style>ul{list-style:none;}</style>