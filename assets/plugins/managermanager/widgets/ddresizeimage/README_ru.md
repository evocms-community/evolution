# (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddResizeImage

Виджет для плагина ManagerManager, позволяющий изменять размеры изображений (TV), например: делать маленькие превьюшки (thumbs).

Виджет срабатывает только в момент сохранения документов (событие `OnBeforeDocFormSave`) и не создаёт изображений повторно, что обеспечивает минимальный расход ресурсов сервера.


## Использует

* PHP >= 5.4
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager) >= 0.7
* [(MODX)EvolutionCMS.snippets.ddGetMultipleField](https://code.divandesign.biz/modx/ddgetmultipleField) >= 3.6 (if mm_ddMultipleFields fields unparse is required)


## Установка

Для установки распакуйте архив в `/assets/plungins/managermanager/widgets/ddresizeimage/`.


Смотрите также документацию:
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager).
* [(MODX)EvolutionCMS.modules.ddMMEditor](https://code.divandesign.biz/modx/ddmmeditor).
* [(MODX)EvolutionCMS.snippets.ddGetMultipleField](https://code.divandesign.biz/modx/ddgetmultiplefield).


## Описание параметров

* `$params`
	* Описание: Параметры, используется стиль именованных параметров.
	* Допустимые значения:
		* `stdClass`
		* `arrayAssociative`
	* **Обязателен**
	
* `$params->fields`
	* Описание: Имена TV, для которых необходимо применить виджет.
	* Допустимые значения: `stringCommaSeparated`
	* **Обязателен**
	
* `$params->width`
	* Описание: Ширина создаваемого изображения в px.  
		Пустое значение — автоматический расчёт исходя из высоты.  
		Обязателен хотя бы один размер.
	* Допустимые значения: `integer`
	* **Обязателен**
	
* `$params->height`
	* Описание: Высота создаваемого изображения в px.  
		Пустое значение — автоматический расчёт исходя из ширины.  
		Обязателен хотя бы один размер.
	* Допустимые значения: `integer`
	* **Обязателен**
	
* `$params->filenameSuffix`
	* Описание: Суффикс для имен создаваемых изображений.  
		При пустом значении заменяются исходные изображения!
	* Допустимые значения: `string`
	* Значение по умолчанию: `'_ddthumb'`
	
* `$params->transformMode`
	* Описание: Режим изменения изображения.
	* Допустимые значения:
		* `'resize'` — только ресайз, изображение будет вписано в заданные размеры с сохранением оригинальных пропорций
		* `'crop'` — просто обрезать (не изменяя масштаб)
		* `'resizeAndCrop'` — ресайзить по меньшей стороне, затем обрезать по большей стороне до заданного значения
		* `'resizeAndFill'` — вписать изображение в заданные размеры и заполнить пустое пространство заданным фоном (see `$params->backgroundColor`)
	* Значение по умолчанию: `'resizeAndCrop'`
	
* `$params->backgroundColor`
	* Описание: Цвет фона результирующего изображения в HEX (используется только при `$params->transformMode` == `'resizeAndFill'`).
	* Допустимые значения: `string`
	* Значение по умолчанию: `'#ffffff'`
	
* `$params->allowEnlargement`
	* Описание: Разрешить увеличение изображения?
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `true`
	
* `$params->quality`
	* Описание: Уровень сжатия JPEG.
	* Допустимые значения: `integer`
	* Значение по умолчанию: `$modx->getConfig('jpegQuality')`
	
* `$params->watermarkImageFullPathName`
	* Desctription: Нанести водяные знаки на изображения.  
		Вы можете передавать также относительные пути (например, `assets/images/some.jpg`), виджет автоматически добавит `base_path`, если нужно.
	* Valid values: `string`
	* Default value: —
	
* `$params->replaceDocFieldVal`
	* Описание: Нужно ли переписывать значения в TV на имена созданных изображений?  
		Обратите внимание, что параметр не используется, если `$params->ddMultipleField_isUsed` == `1`!
	* Допустимые значения:
		* `0`
		* `1` — значения TV будут переписаны именами созданных виджетом изображений
	* Значение по умолчанию: `0`
	
* `$params->ddMultipleField_isUsed`
	* Описание: Является ли поле множественным (для использования с (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields).
	* Допустимые значения:
		* `0`
		* `1`
	* Значение по умолчанию: `0`
	
* `$params->ddMultipleField_columnNumber`
	* Описание: Номер колонки, в которой находится изображение (для использования с (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields).
	* Допустимые значения: `integer`
	* Значение по умолчанию: `0`
	
* `$params->ddMultipleField_rowNumber`
	* Описание: Номер строки, которую надо обрабатывать (для использования с (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields).
	* Допустимые значения:
		* `integer`
		* `'all'`
	* Значение по умолчанию: `'all'`
	
* `$params->ddMultipleField_rowDelimiter`
	* Описание: Разделитель строк (для использования с (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields).
	* Допустимые значения: `string`
	* Значение по умолчанию: `'||'`
	
* `$params->ddMultipleField_colDelimiter`
	* Описание: Разделитель колонок (для использования с (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields).
	* Допустимые значения: `string`
	* Значение по умолчанию: `'::'`
	
* `$params->roles`
	* Описание: Роли пользователей CMS, для которых необходимо применить виждет.
	* Допустимые значения:
		* `stringCommaSeparated`
		* `''` — применяется для всех ролей при пустом значении.
	* Значение по умолчанию: `''`
	
* `$params->roles[i]`
	* Desctription: Роль пользователя CMS.
	* Valid values: `integer`
	* **Required**
	
* `$params->templates`
	* Описание: ID шаблонов документов, для которых необходимо применить виджет
	* Допустимые значения:
		* `stringCommaSeparated`
		* `''` — применяется для всех шаблонов при пустом значении
	* Значение по умолчанию: `''`
	
* `$params->templates[i]`
	* Desctription: ID шаблона документа.
	* Valid values: `integer`
	* **Required**


## События CMS

* `OnBeforeDocFormSave`


## Примеры


### Создание превьюшек размером 200 × авто px

Ширина должна быть равна 200 px, а высота должна рассчитаться автоматически соответственно оригинальным пропорциям.

```
mm_ddResizeImage([
	'fields' => 'imageTV',
	'width' => 200
]);
```


### Создание превьюшек размером 200 × 100 px

Ширина должна быть равна 200 px, а высота — 100 px.

```
mm_ddResizeImage([
	'fields' => 'imageTV',
	'width' => 200,
	'height' => 100
]);
```


### Перезаписать значения TV созданными виджетом изображенями (`$params->replaceDocFieldVal` == `1`)

```
mm_ddResizeImage([
	'fields' => 'imageTV',
	'width' => 200,
	'height' => 100,
	'replaceDocFieldVal' => 1
]);
```

Пользователь загрузил и вставил в TV `'assets/images/some.jpg'`, а после сохранения документа сделалась превьюшка и значение TV стало `'assets/images/some_ddthumb.jpg'`.


### Обеспечить, чтобы пользователи загружали изображения в TV строго размером 125 × 68 px (`$params->transformMode` == `'resizeAndFill'`)

Всё, что загружается, должно быть пропорционально уменьшено до заданного размера, а если пропорции не верные, то свободное пространство должно быть залито цветом `#686868`.

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


### Нанести водяные знаки на изображения (`$params->watermarkImageFullPathName`)

```
mm_ddResizeImage([
	'fields' => 'general_photo',
	'width' => 1920,
	'height' => 1080,
	'watermarkImageFullPathName' => 'assets/images/logo.png'
]);
```


## Ссылки

* [Home page](https://code.divandesign.biz/modx/mm_ddresizeimage)
* [Telegram chat](https://t.me/dd_code)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />