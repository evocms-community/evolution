# (MODX)EvolutionCMS.plugins.ManagerManager.mm_requireFields

A widget for ManagerManager plugin that allows document fields (or TVs) to become required.
The widget appends a red asterisk to a field to indicate it is required, and alerts users if they save the document without completing all required fields.


## Requires

* PHP >= 5.4
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.ru/modx/managermanager) >= 0.7


## Installation

To install you must unzip the archive to `/assets/plungins/managermanager/widgets/mm_requirefields/`.


You may also read this documentation:
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.ru/modx/managermanager).
* [(MODX)EvolutionCMS.modules.ddMMEditor](https://code.divandesign.ru/modx/ddmmeditor).


## Parameters description

* `$params`
	* Desctription: Parameters, the pass-by-name style is used.
	* Valid values:
		* `stdClass`
		* `arrayAssociative`
	* **Required**
	
* `$params->fields`
	* Desctription: The name(s) of the document fields (or TVs) that are required.
	* Valid values:
		* `stringCommaSeparated`
		* `array`
	* **Required**
	
* `$params->fields[$i]`
	* Desctription: The name of the document field or TV.
	* Valid values: `string`
	* **Required**
	
* `$params->roles`
	* Desctription: The CMS user roles that the widget is applied to.
	* Valid values:
		* `array`
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
		* `array`
		* `stringCommaSeparated`
		* `''` — empty value means the widget is applying to all templates
	* Default value: `''`
	
* `$params->templates[$i]`
	* Desctription: Template ID.
	* Valid values: `integer`
	* **Required**


## CMS events

* `OnDocFormRender`


## Examples


### Make the page title and publication date fields required for all docs and users

```php
mm_requireFields([
	'fields' => 'pagetitle,pub_date'
]);
```


## Links

* [Home page](https://code.divandesign.ru/modx/mm_requirefields)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-plugins-managermanager-mm_requirefields)
* [GitHub](https://github.com/DivanDesign/EvolutionCMS.plugins.ManagerManager.mm_requireFields)


<link rel="stylesheet" type="text/css" href="https://raw.githack.com/DivanDesign/CSS.ddMarkdown/master/style.min.css" />