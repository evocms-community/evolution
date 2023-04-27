# (MODX)EvolutionCMS.plugins.ManagerManager.mm_synch_fields

Widget for ManagerManager plugin that allows a few fields values to be synchronized while editing the document.
E. g. it`s required that page title and menu title have the same value.
It's especially useful when some values being synchronized are hidden.

Works only with the text inputs (`input`, `textarea`).


## Requires

* PHP >= 5.4
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager) >= 0.7


## Documentation


### Installation

To install you must unzip the archive to `/assets/plungins/managermanager/widgets/mm_synch_fields/`.


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
	* Desctription: The names of document fields or TVs that should be synched.  
		Requires a minimum of 2 field names.
	* Valid values: `stringCommaSeparated`
	* **Required**
	
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


#### Make the contents of these three fields always equal for all users and all documents

```
mm_synch_fields('pagetitle,menutitle,longtitle');
```


## Links

* [Home page](https://code.divandesign.biz/modx/mm_synch_fields)
* [Telegram chat](https://t.me/dd_code)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />