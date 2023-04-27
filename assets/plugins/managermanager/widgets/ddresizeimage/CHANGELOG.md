# (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddResizeImage changelog


## Version 1.6.2 (2022-11-02)
* \* Better compatibility with new versions of (MODX)EvolutionCMS.snippets.ddGetMultipleField.


## Version 1.6.1 (2021-10-02)
* \* Attention! (MODX)EvolutionCMS.snippets.ddGetMultipleField >= 3.6 is required (if mm_ddMultipleFields fields unparse is required).
* \* `\DDTools\Snippet::runSnippet` is used instead of `$modx->runSnippet` to run (MODX)EvolutionCMS.snippets.ddGetMultipleField without DB and eval.


## Version 1.6 (2020-07-29)
* \+ Added GIF support.
* \* Parameters:
	* \+ `$params->watermarkImageFullPathName`: The new parameter. Specify if you want to overlay your image with watermark.
	* \- `$params->croppingMode`: The parameter was removed (with backward compatibility).
	* \+ `$params->transformMode`: The new parameter (with backward compatibility to `$params->croppingMode`).
* \* Refactoring:
	* \* `\DDTools\FilesTools::modifyImage` is used.
	* \* `\DDTools\ObjectTools::isPropExists` is used instead of `isset`.
	* \* `\DDTools\ObjectTools::extend` is used instead of `array_merge`.
* \+ README.
* \+ README_ru.
* \+ CHANGELOG.
* \+ CHANGELOG_ru.
* \+ Composer.json.


## Version 1.5 (2017-04-17)
* \* PHP 7.x compatibility.


## Version 1.4 (2016-11-01)
* \* Attention! PHP >= 5.4 is required.
* \* Attention! (MODX)EvolutionCMS.plugins.ManagerManager >= 0.7 is required.
* \+ Added the ability to set output image quality level (closes #1). Many thanks to @Aharito for initiative and patiance :pray:!
* \* Refactoring, the widget now using named parameters (with backward compatibility).
* \* Short array syntax is used because it's more convenient.
* \* Minor changes for compatibility with (MODX)EvolutionCMS.snippets.ddGetMultipleField 3.3.
* \* phpthumb: Fixed constructor name for compatibility with PHP7 (from 4bf5df5f14222d44de1ad78e71eedc3a8c7ade7a by @yama).


## Version 1.3.5 (2014-05-21)
* \* Minor changes for compatibility with (MODX)EvolutionCMS.snippets.ddGetMultipleField 3.x.
* \* Other minor changes.


## Version 1.3.4 (2013-07-19)
* \* The mm_ddMultipleFields fields empty check has been added.
* \* The images dimension check has been added (to exclude the situations when the input data is not an image).
* \* A suffix is not added to a file name if it already has one (it used to happen if `$replaceFieldVal` == `1`).


## Version 1.3.3 (2013-07-09)
* \* Checking for the datatype of result of function `tplUseTvs` has been added.


## Version 1.3.2 (2013-07-02)
* \* Predefined file format bug fix.


## Version 1.3.1 (2013-06-14)
* \* Strict case for `$modx->runSnippet`.


## Version 1.3 (2013-06-01)
* \+ Parameters → `allowEnlargement`: The new parameter allowing image enlargement to be forbidden.
* \* Minor changes.


## Version 1.2b (2012-08-30)
* \* The EasyPhpThumbnail library is no longer being used, it was replaced by phpThumb.
* \* Small changes in the code and errors elimination.


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />
<style>ul{list-style:none;}</style>