# (MODX)EvolutionCMS.plugins.ManagerManager.mm_renameField

Виджет для плагина ManagerManager, позволяющий скрыть все пустые секции и вкладки.


## Использует

* PHP >= 5.4
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.ru/modx/managermanager) >= 0.7


## Установка

Для установки распакуйте архив в `/assets/plungins/managermanager/widgets/mm_renamefield/`.


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
	* Описание: Поля документа или TV, которые необходимо переименовать.
	* Допустимые значения:
		* `stringCommaSeparated`
		* `array`
	* **Обязателен**
	
* `$params->fields[$i]`
	* Описание: Название поля документа или TV.
	* Допустимые значения: `string`
	* **Обязателен**
	
* `$params->newLabel`
	* Описание: Новый текст для отображения.
	* Допустимые значения: `string`
	* **Обязателен**
	
* `$params->newHelp`
	* Описание: Новый текст подсказки, всплывающей при наведении на иконку рядом с полем, или описания для TV.
	* Допустимые значения: `string`
	* Значение по умолчанию: — (не менять текст подсказки)
	
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


### Переименовать поле `longtitle` у всех документов для всех пользователей

```php
mm_renameField([
	'fields' => 'longtitle',
	'newLabel' => 'Расширенный заголовок (meta «title»)'
]);
```


### Переименовать поле `pagetitle` у документов с ID шаблона = `3` для всех пользователей

```php
mm_renameField([
	'fields' => 'pagetitle',
	'newLabel' => 'ФИО',
	'templates' => '3'
]);
```


## Ссылки

* [Home page](https://code.divandesign.ru/modx/mm_renamefield)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-plugins-managermanager-mm_renamefield)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />