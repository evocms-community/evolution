# (MODX)EvolutionCMS.plugins.ManagerManager.mm_hideEmpty

A widget for ManagerManager plugin that allows to hide all empty sections and tabs.


## Requires

* PHP >= 5.4
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager) >= 0.7


## Installation

To install you must unzip the archive to `/assets/plungins/managermanager/widgets/mm_hideempty/`.


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

* `OnDocFormPrerender`
* `OnDocFormRender`


## Examples


### Apply for all roles and templates

```php
mm_hideEmpty();
```


## Links

* [Home page](https://code.divandesign.biz/modx/mm_hideempty)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/mm_hideempty)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />