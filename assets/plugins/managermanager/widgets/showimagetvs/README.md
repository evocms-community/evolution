# (MODX)EvolutionCMS.plugins.ManagerManager.mm_widget_showimagetvs

A widget for ManagerManager plugin that allows the preview of images chosen in image TVs to be shown on the document editing page.

Emulates the ShowImageTVs plugin, which is not compatible with ManagerManager.


## Requires

* PHP >= 5.4
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager) >= 0.7


## Documentation


### Installation

To install you must unzip the archive to `/assets/plungins/managermanager/widgets/showimagetvs/`.


You may also read this documentation:
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager).
* [(MODX)EvolutionCMS.modules.ddMMEditor](https://code.divandesign.biz/modx/ddmmeditor).


### Parameters description

* `$params`
	* Desctription: Parameters, the pass-by-name style is used.
	* Valid values:
		* `stdClass`
		* `arrayAssociative`
	* Default value: `[]`
	
* `$params->fields`
	* Desctription: The names of TVs for which the widget is applied.  
	* Valid values:
		* `stringCommaSeparated`
		* `''` — empty value means the widget is applying to all TVs
	* Default value: `''`
	
* `$params->maxWidth`
	* Desctription: Preferred maximum width of the preview.
	* Valid values: `integer`
	* Default value: `300`
	
* `$params->maxHeight`
	* Desctription: Preferred maximum height of the preview.
	* Valid values: `integer`
	* Default value: `100`
	
* `$params->thumbnailerUrl`
	* Desctription: If you have PHPThumb installed (for example through Maxigallery or phpthumb plugins/snippets), use this to make thumbnails rather than resizing the image previews via CSS.  
		Particularly useful if you are using very large pictures, which would take a long time to download.
	* Valid values: `string`
	* Default value: —
	
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


#### Add an image preview to every image-type template variable

```php
mm_widget_showimagetvs();
```


#### Add a 150 × 150 px image preview to every image-type template variable

```php
mm_widget_showimagetvs([
	'maxWidth' => 150,
	'maxHeight' => 150
]);
```


#### Add an image preview to the `mypic` template variables in template `2`, resized to 300 × 200 px using phpthumb at the URL supplied

```php
mm_widget_showimagetvs([
	'fields' => 'mypic',
	'maxWidth' => 300,
	'maxHeight' => 200,
	'thumbnailerUrl' => '/assets/snippets/phpthumb/phpThumb.php',
	'templates' => '2'
]);
```


## Links

* [Home page](https://code.divandesign.biz/modx/mm_widget_showimagetvs)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-plugins-managermanager-mm_widget_showimagetvs)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />