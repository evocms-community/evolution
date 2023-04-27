# (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMaxLength

Виджет для плагина ManagerManager, позволяющий ограничить количество вводимых символов в поле документа (включая TV).


## Использует

* PHP >= 5.4
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.ru/modx/managermanager) >= 0.7


## Документация


### Установка

Для установки распакуйте архив в `/assets/plungins/managermanager/widgets/ddmaxlength/`.


Смотрите также документацию:
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.ru/modx/managermanager).
* [(MODX)EvolutionCMS.modules.ddMMEditor](https://code.divandesign.ru/modx/ddmmeditor).


### Описание параметров

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
	
* `$params->length`
	* Описание: Максимальное количество символов, которые можно ввести.
	* Допустимые значения: `integer`
	* Значение по умолчанию: `150`
	
* `$params->allowTypingOverLimit`
	* Описание: Разрешить вводить текст больше лимита?  
		В этом случае пользователи смогут вводить текст любой длины, но не смогут сохранить документ, если заданный лимит привышен.
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `true`
	
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


#### Ограничить максимальное количество вводимых символов до 140 для `pagetitle` и `menutitle`

```
mm_ddMaxLength([
	'fields' => 'pagetitle,menutitle',
	'length' => 140
]);
```


## Links

* [Home page](https://code.divandesign.ru/modx/mm_ddmaxlength)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-plugins-managermanager-mm_ddmaxlength)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />