# (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddSelectDocuments

A widget for ManagerManager that makes selection of documents IDs easier.


## Requires

* PHP >= 5.4
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager) >= 0.7


## Installation

To install you must unzip the archive to `/assets/plungins/managermanager/widgets/ddselectdocuments/`.


You may also read this documentation:
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager).
* [(MODX)EvolutionCMS.modules.ddMMEditor](https://code.divandesign.biz/modx/ddmmeditor).


## Parameters description

* `$params`
	* Desctription: Parameters, the pass-by-name style is used.
	* Valid values:
		* `stdClass`
		* `arrayAssociative`
	* **Required**
	
* `$params->fields`
	* Desctription: The names of TVs for which the widget is applied to.
	* Valid values: `stringCommaSeparated`
	* **Required**
	
* `$params->parentIds`
	* Desctription: Parent documents IDs.
	* Valid values:
		* `array`
		* `stringCommaSeparated`
	* Default value: `[0]`
	
* `$params->parentIds[$i]`
	* Desctription: Document ID.
	* Valid values:
		* `integer`
		* `'current'` — current document ID (for select children)
	* **Required**
	
* `$params->depth`
	* Desctription: Depth of search.
	* Valid values: `integer`
	* Default value: `1`
	
* `$params->filter`
	* Desctription: Filter clauses, separated by `'&'` between pairs and by `'='` or `'!='` between keys and values.  
		For example, `'template=15&published=1'` means to choose the published documents with template ID == 15.
	* Valid values: `stringSeparated`
	* Default value: —
	
* `$params->listItemLabelMask`
	* Desctription: Template to be used while rendering elements of the document selection list.  
		It is set as a string containing placeholders of document fields and TVs.  
		Also, there is the additional placeholder `[+title+]` that is substituted with either `menutitle` (if defined) or `pagetitle`.
	* Valid values: `string`
	* Default value: `'[+title+] ([+id+])'`
	
* `$params->maxSelectedItems`
	* Desctription: The largest number of elements that can be selected by user.
	* Valid values:
		* `integer`
		* `0` — means selection without a limit
	* Default value: `0`
	
* `$params->allowDuplicates`
	* Desctription: Allows to select duplicates values.
	* Valid values: `boolean`
	* Default value: `false`
	
* `$params->roles`
	* Desctription: The CMS user roles that the widget is applied to.
	* Valid values:
		* `stringCommaSeparated`
		* `''` — when this parameter is empty then widget is applied to the all roles
	* Default value: `''`
	
* `$params->roles[$i]`
	* Desctription: CMS user role ID.
	* Valid values: `integer`
	* **Required**
	
* `$params->templates`
	* Desctription: Document templates IDs for which the widget is applied to.
	* Valid values:
		* `stringCommaSeparated`
		* `''` — empty value means the widget is applying to all templates
	* Default value: `''`
	
* `$params->templates[$i]`
	* Desctription: Template ID.
	* Valid values: `integer`
	* **Required**


## CMS events

* `OnDocFormPrerender`
* `OnDocFormRender`


## Examples


### Select 3 favorite published products

```php
mm_ddSelectDocuments([
	//TV for which the widget is applied to
	'fields' => 'favoriteProducts',
	//Let 314 is ID of catalog document, that contains children-products
	'parentIds' => [314],
	//Search in 3 levels
	'depth' => 3,
	//Display only published documents with template ID == 42
	'filter' => 'template=42&published=1',
	//Only 3 or less products can be selected
	'maxSelectedItems' => 3
]);
```


## Links

* [Home page](https://code.divandesign.biz/modx/mm_ddselectdocuments)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-plugins-managermanager-mm_ddselectdocuments)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />