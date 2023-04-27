# (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddResizeImage

A widget for ManagerManager plugin that allows image size to be changed (TV) so it is possible to create a little preview (thumb).

The widget activates as documents are saved (event `OnBeforeDocFormSave`) and it does not recreate images so server load is minimal.


## Requires

* PHP >= 5.4
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager) >= 0.7
* [(MODX)EvolutionCMS.snippets.ddGetMultipleField](https://code.divandesign.biz/modx/ddgetmultipleField) >= 3.6 (if mm_ddMultipleFields fields unparse is required)


## Installation

To install you must unzip the archive to `/assets/plungins/managermanager/widgets/ddresizeimage/`.


You may also read this documentation:
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager).
* [(MODX)EvolutionCMS.modules.ddMMEditor](https://code.divandesign.biz/modx/ddmmeditor).
* [(MODX)EvolutionCMS.snippets.ddGetMultipleField](https://code.divandesign.biz/modx/ddgetmultiplefield).


## Parameters description

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
	
* `$params->width`
	* Desctription: Width of the image being created (in px).  
		Empty value means width calculating automatically according to height.  
		At least one of the two parameters must be defined.
	* Valid values: `integer`
	* **Required**
	
* `$params->height`
	* Desctription: Height of the image being created (in px).  
		Empty value means height calculating automatically according to width.  
		At least one of the two parameters must be defined.
	* Valid values: `integer`
	* **Required**
	
* `$params->filenameSuffix`
	* Desctription: The suffix for the images being created.  
		Its empty value makes initial images to be rewritten!
	* Valid values: `string`
	* Default value: `'_ddthumb'`
	
* `$params->transformMode`
	* Desctription: Transform mode.
	* Valid values:
		* `'resize'` — resize only, the image will be inscribed into the specified sizes with the same proportions
		* `'crop'` — crop only
		* `'resizeAndCrop'` — resize small side then crop big side to the specified value
		* `'resizeAndFill'` — inscribe image into the specified sizes and fill empty space with the specified background (see `$params->backgroundColor`)
	* Default value: `'resizeAndCrop'`
	
* `$params->backgroundColor`
	* Desctription: Result image background color in HEX (used only for `$params->transformMode` == `'resizeAndFill'`).
	* Valid values: `string`
	* Default value: `'#ffffff'`
	
* `$params->allowEnlargement`
	* Desctription: Allow output enlargement.
	* Valid values: `boolean`
	* Default value: `true`
	
* `$params->quality`
	* Desctription: JPEG compression level.
	* Valid values: `integer`
	* Default value: `$modx->getConfig('jpegQuality')`
	
* `$params->watermarkImageFullPathName`
	* Desctription: Specify if you want to overlay your image with watermark.  
		You can pass a relative path too (e. g. `assets/images/some.jpg`), the widget will automatically add `base_path` if needed.
	* Valid values: `string`
	* Default value: —
	
* `$params->replaceDocFieldVal`
	* Desctription: TV values rewriting status.  
		Note that the parameter isn't used if `$params->ddMultipleField_isUsed` == `1`!
	* Valid values:
		* `0`
		* `1` — tv values are replaced by the names of the created images
	* Default value: `0`
	
* `$params->ddMultipleField_isUsed`
	* Desctription: Multiple field status (for using with (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields).
	* Valid values:
		* `0`
		* `1`
	* Default value: `0`
	
* `$params->ddMultipleField_columnNumber`
	* Desctription: The number of the column in which the image is located (for using with (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields).
	* Valid values: `integer`
	* Default value: `0`
	
* `$params->ddMultipleField_rowNumber`
	* Desctription: The number of the row that will be processed (for using with (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields).
	* Valid values:
		* `integer`
		* `'all'`
	* Default value: `'all'`
	
* `$params->ddMultipleField_rowDelimiter`
	* Desctription: The row delimiter (for using with (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields).
	* Valid values: `string`
	* Default value: `'||'`
	
* `$params->ddMultipleField_colDelimiter`
	* Desctription: The column delimiter (for using with (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields).
	* Valid values: `string`
	* Default value: `'::'`
	
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


## CMS events

* `OnBeforeDocFormSave`


## Examples


### Creating thumbnails 200 × auto px

The width must be equal to 200 px and the height must be calculated automatically.

```
mm_ddResizeImage([
	'fields' => 'imageTV',
	'width' => 200
]);
```


### Creating thumbnails 200 × 100 px

The width must be equal to 200 px and the height must be equal to 100 px.

```
mm_ddResizeImage([
	'fields' => 'imageTV',
	'width' => 200,
	'height' => 100
]);
```


### Overwrite TV values with resized images (`$params->replaceDocFieldVal` == `1`)

```
mm_ddResizeImage([
	'fields' => 'imageTV',
	'width' => 200,
	'height' => 100,
	'replaceDocFieldVal' => 1
]);
```

The images will uploaded and after document saving the TV values was changed fom `'assets/images/some.jpg'` to `'assets/images/some_ddthumb.jpg'`.


### Providing the images that was uploaded to be limited to 125 × 68 px (`$params->transformMode` == `'resizeAndFill'`)

All that is uploading must be limited to the size and when proportions does not match then blank space must be filled with `#686868` color.

```
mm_ddResizeImage([
	'fields' => 'imageTV',
	'width' => 125,
	'height' => 68,
	'transformMode' => `'resizeAndFill'`,
	'filenameSuffix' => '',
	'backgroundColor' => '#686868'
]);
```


### Overlay images with watermark (`$params->watermarkImageFullPathName`)

```
mm_ddResizeImage([
	'fields' => 'general_photo',
	'width' => 1920,
	'height' => 1080,
	'watermarkImageFullPathName' => 'assets/images/logo.png'
]);
```


## Links

* [Home page](https://code.divandesign.biz/modx/mm_ddresizeimage)
* [Telegram chat](https://t.me/dd_code)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />