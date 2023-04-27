# (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMaxLength changelog


## Version 1.3.1 (2020-12-19)
* \* Critical JS misprint was fixed.
* \+ README_ru: Small improvements.


## Version 1.3 (2020-10-28)
* \+ Parameters → `$params->allowTypingOverLimit`: The new parameter. It allows to disable typing over limit.
* \* Refactoring:
	* \* `\DDTools\ObjectTools::extend` is used instead of `array_merge`.
	* \* `$modx->getConfig('site_url')` is used istead of `$modx->config['site_url']`.
	* \* `jQuery.ddMM.getFieldElems` is used.
* \* Repository structure was changed.
* \+ README.
* \+ README_ru.
* \+ CHANGELOG.
* \+ CHANGELOG_ru.
* \+ Composer.json.


## Version 1.2.1 (2016-12-06)
* \* Parameters → `$params->length`: Is cast to integer.


## Version 1.2 (2016-11-15)
* \* Attention! PHP >= 5.4 is required.
* \* Attention! (MODX)EvolutionCMS.plugins.ManagerManager >= 0.7 is required.
* \* Refactoring:
	* \* The widget now using named parameters (with backward compatibility).
	* \* `jQuery.ddMM.fields` is used istead of manually DOM finding.
	* \* File name refactoring.


## Version 1.1.1 (2013-12-10)
* \* The calls of the functions `includeJs` and `includeCss` were replaced by `includeJsCss`.
* \* The including of required JS and CSS files is currently being realized while occuring the event `OnDocFormPrerender`. The files are included as HTML.
* \* The JS code became a stand-alone file and was partially revised. It is convenient because of php code cleanness and it shortens the amount of code of a document edit frame.
* \- The `jQuery.ddTools` library is no longer included here because it is in `ManagerManager`.


## Version 1.1 (2013-10-02)
* \* Attention! (MODX)EvolutionCMS.plugins.ManagerManager >= 0.6 is required.
* \+ The widget now can also be applied to document fields.
* \* Parameters → `fields`: Was renamed from `tvs`.
* \* The file `jquery.ddmaxlength-1.0.min.js` has been deleted because the ManagerManager plugin already contains the `jQuery.ddTools` library including the `jQuery.fn.ddMaxLength` plugin.
* \* Misprints in classnames have been corrected.


## Version 1.0.1 (2012-01-13)
* \* Added checking of the `OnDocFormRender` event.


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />
<style>ul{list-style:none;}</style>