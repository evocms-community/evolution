# (MODX)EvolutionCMS.plugins.ManagerManager.mm_requireFields

<p>Виджет для плагина ManagerManager, позволяющий сделать поля документа или TV обязательными для заполнения.
Добавляет звёздочку красного цвета рядом с именем обязательного для заполнения поля, выдаёт сообщение при попытке сохранить не заполнив обязательные поля, предотвращая сохранение.


## Использует

* PHP >= 5.4
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.ru/modx/managermanager) >= 0.7


## Установка

Для установки распакуйте архив в `/assets/plungins/managermanager/widgets/mm_requirefields/`.


Смотрите также документацию:
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.ru/modx/managermanager).
* [(MODX)EvolutionCMS.modules.ddMMEditor](https://code.divandesign.ru/modx/ddmmeditor).


## Описание параметров

* `$params`
	* Описание: Параметры, используется стиль именованных параметров.
	* Допустимые значения:
		* `stdClass`
		* `arrayAssociative`
	* **Обязателен**
	
* `$params->fields`
	* Описание: Поля документа (или TV), которые должны быть обязательными.
	* Допустимые значения:
		* `stringCommaSeparated`
		* `array`
	* **Обязателен**
	
* `$params->fields[$i]`
	* Описание: Название поля документа или TV.
	* Допустимые значения: `string`
	* **Обязателен**
	
* `$params->roles`
	* Описание: Роли пользователей CMS, для которых необходимо применить виждет.
	* Допустимые значения:
		* `array`
		* `stringCommaSeparated`
		* `''` — применяется для всех ролей при пустом значении
	* Значение по умолчанию: `''`
	
* `$params->roles[$i]`
	* Описание: Роль пользователя CMS.
	* Допустимые значения: `integer`
	* **Обязателен**
	
* `$params->templates`
	* Описание: ID шаблонов документов, для которых необходимо применить виджет.
	* Допустимые значения:
		* `array`
		* `stringCommaSeparated`
		* `''` — применяется для всех шаблонов при пустом значении
	* Значение по умолчанию: `''`
	
* `$params->templates[$i]`
	* Описание: ID шаблона документа.
	* Допустимые значения: `integer`
	* **Обязателен**


## События CMS

* `OnDocFormRender`


## Примеры


### Сделать обязательным для заполнения заголовки и даты публикации всех документов и пользователей

```php
mm_requireFields([
	'fields' => 'pagetitle,pub_date'
]);
```


## Ссылки

* [Home page](https://code.divandesign.ru/modx/mm_requirefields)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-plugins-managermanager-mm_requirefields)
* [GitHub](https://github.com/DivanDesign/EvolutionCMS.plugins.ManagerManager.mm_requireFields)


<link rel="stylesheet" type="text/css" href="https://raw.githack.com/DivanDesign/CSS.ddMarkdown/master/style.min.css" />