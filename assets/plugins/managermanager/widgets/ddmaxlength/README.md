# (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMaxLength

Widget for ManagerManager plugin allowing number limitation of chars inputing in document fields (including TVs).


## Requires

* PHP >= 5.4
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager) >= 0.7


## Documentation


### Installation

To install you must unzip the archive to `/assets/plungins/managermanager/widgets/ddmaxlength/`.


You may also read this documentation:
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager).
* [(MODX)EvolutionCMS.modules.ddMMEditor](https://code.divandesign.biz/modx/ddmmeditor).


### Parameters description

* `$params`
	* Desctription: Parameters, the pass-by-name style is used.
	* Valid values:
		* `stdClass`
		* `arrayAssociative`
	* **Required**
	
* `$params->fields`
	* Desctription: The names of TVs for which the widget is applied.  
	* Valid values: `stringCommaSeparated`
	* **Required**
	
* `$params->length`
	* Desctription: Maximum number of inputing chars.
	* Valid values: `integer`
	* Default value: `150`
	
* `$params->allowTypingOverLimit`
	* Desctription: Is typing over limit allowed?  
		In this case users can enter any length text but they can't save document if the limit is over.
	* Valid values: `boolean`
	* Default value: `true`
	
* `$params->roles`
	* Desctription: The CMS user roles that the widget is applied to.
	* Valid values:
		* `stringCommaSeparated`
		* `''` — when this parameter is empty then widget is applied to the all roles
	* Default value: `''`
	
* `$params->roles[i]`
	* Desctription: CMS user role.
	* Valid values: `integer`
	* **Required**
	
* `$params->templates`
	* Desctription: Document templates IDs for which the widget is applying to.
	* Valid values:
		* `stringCommaSeparated`
		* `''` — empty value means the widget is applying to all templates
	* Default value: `''`
	
* `$params->templates[i]`
	* Desctription: Templates ID.
	* Valid values: `integer`
	* **Required**


### CMS events

* `OnDocFormPrerender`
* `OnDocFormRender`


### Examples


#### Limit the number of inputting chars to 140 in `pagetitle` and `menutitle`

```
mm_ddMaxLength([
	'fields' => 'pagetitle,menutitle',
	'length' => 140
]);
```


## Links

* [Home page](https://code.divandesign.biz/modx/mm_ddmaxlength)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-plugins-managermanager-mm_ddmaxlength)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />