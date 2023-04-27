# (MODX)EvolutionCMS.plugins.ManagerManager.mm_renameField

A widget for ManagerManager plugin that allows one of the default document fields or template variables to be renamed within the manager.


## Requires

* PHP >= 5.4
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager) >= 0.7


## Installation

To install you must unzip the archive to `/assets/plungins/managermanager/widgets/mm_renamefield/`.


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
	* Desctription: The name(s) of the document fields (or TVs) for which the widget is applied to.
	* Valid values:
		* `stringCommaSeparated`
		* `array`
	* **Required**
	
* `$params->fields[$i]`
	* Desctription: The name of the document field or TV.
	* Valid values: `string`
	* **Required**
	
* `$params->newLabel`
	* Desctription: The new text for the field label.  
		You can also use HTML tags.
	* Valid values: `string`
	* **Required**
	
* `$params->newHelp`
	* Desctription: New text for the help icon with this field or for comment with TV.  
		The same restriction apply as when using `mm_changeFieldHelp` directly.
	* Valid values: `string`
	* Default value: — (don't change help text)
	
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


### Rename the `longtitle` field to `Page heading` for all users

```php
mm_renameField([
	'fields' => 'longtitle',
	'newLabel' => 'Page heading'
]);
```


### Rename the `pagetitle` field to `Case study name` for documents using template ID `3`

```php
mm_renameField([
	'fields' => 'pagetitle',
	'newLabel' => 'Case study name',
	'templates' => '3'
]);
```


## Links

* [Home page](https://code.divandesign.biz/modx/mm_renamefield)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-plugins-managermanager-mm_renamefield)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />