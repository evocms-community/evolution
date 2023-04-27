# (MODX)EvolutionCMS.plugins.ManagerManager.mm_widget_showimagetvs

Виджет для плагина ManagerManager, позволяющий показать превьюшки изображений, выбранных в TV на странице редактирования документа.

Аналогичен плагину ShowImageTVs, который не совместим с ManagerManager.


## Использует

* PHP >= 5.4
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.ru/modx/managermanager) >= 0.7


## Документация


### Установка

Для установки распакуйте архив в `/assets/plungins/managermanager/widgets/showimagetvs/`.


Смотрите также документацию:
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.ru/modx/managermanager).
* [(MODX)EvolutionCMS.modules.ddMMEditor](https://code.divandesign.ru/modx/ddmmeditor).


### Описание параметров

* `$params`
	* Описание: Параметры, используется стиль именованных параметров.
	* Допустимые значения:
		* `stdClass`
		* `arrayAssociative`
	* Значение по умолчанию: `[]`
	
* `$params->fields`
	* Описание: TV, для которых необходимо отобразить превьюшки.  
	* Допустимые значения:
		* `stringCommaSeparated`
		* `''` — применяется для всех TV при пустом значении
	* Значение по умолчанию: `''`
	
* `$params->maxWidth`
	* Описание: Максимальная ширина превьюшки в px.
	* Допустимые значения: `integer`
	* Значение по умолчанию: `300`
	
* `$params->maxHeight`
	* Описание: Максимальная высота превьюшки в px.
	* Допустимые значения: `integer`
	* Значение по умолчанию: `100`
	
* `$params->thumbnailerUrl`
	* Описание: Если у вас установлен PHPThumb, вы можете указать url, где он находится, адрес превью будет обращён к нему с передачей URL исходной картинки, ширины и высоты.
	* Допустимые значения: `string`
	* Значение по умолчанию: —
	
* `$params->roles`
	* Описание: Роли пользователей CMS, для которых необходимо применить виждет.
	* Допустимые значения:
		* `stringCommaSeparated`
		* `''` — применяется для всех ролей при пустом значении
	* Значение по умолчанию: `''`
	
* `$params->roles[i]`
	* Описание: Роль пользователя CMS.
	* Допустимые значения: `integer`
	* **Обязателен**
	
* `$params->templates`
	* Описание: ID шаблонов документов, для которых необходимо применить виджет
	* Допустимые значения:
		* `stringCommaSeparated`
		* `''` — применяется для всех шаблонов при пустом значении
	* Значение по умолчанию: `''`
	
* `$params->templates[i]`
	* Описание: ID шаблона документа.
	* Допустимые значения: `integer`
	* **Обязателен**


### События CMS

* `OnDocFormPrerender`
* `OnDocFormRender`


### Примеры


#### Показать превью для всех TV-изображений

```php
mm_widget_showimagetvs();
```


#### Показать превью для всех TV-изображений, максимальным размером 150 × 150 px

```php
mm_widget_showimagetvs([
	'maxWidth' => 150,
	'maxHeight' => 150
]);
```


#### Показать превью для TV `mypic` у документов с id шаблона = `2` и отправить за одно на генерацию в phpThumb для получения превьюшек размером 300 × 200 px

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

* [Home page](https://code.divandesign.ru/modx/mm_widget_showimagetvs)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-plugins-managermanager-mm_widget_showimagetvs)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />