# (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddSelectDocuments

Виджет для плагина ManagerManager, предназначен для выбора id определённых документов в удобном виде.


## Использует

* PHP >= 5.4
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.ru/modx/managermanager) >= 0.7


## Установка

Для установки распакуйте архив в `/assets/plungins/managermanager/widgets/ddselectdocuments/`.


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
	* Описание: Имена TV, для которых необходимо применить виджет.
	* Допустимые значения: `stringCommaSeparated`
	* **Обязателен**
	
* `$params->parentIds`
	* Описание: ID родительских документов, дочерние документы которых необходимо выбирать.
	* Допустимые значения:
		* `array`
		* `stringCommaSeparated`
	* Значение по умолчанию: `[0]`
	
* `$params->parentIds[$i]`
	* Описание: ID документа
	* Допустимые значения:
		* `integer`
		* `'current'` — ID текущего документа (для выбора дочерних)
	* **Обязателен**
	
* `$params->depth`
	* Описание: Глубина поиска дочерних документов.
	* Допустимые значения: `integer`
	* Значение по умолчанию: `1`
	
* `$params->filter`
	* Описание: Условия фильтрации документов, разделённые через `'&'` между парами и через `'='` между ключом и значением.  
		Например: `'template=15&published=1'`, — получим только опубликованные документы с ID шаблона 15.
	* Допустимые значения: `stringSeparated`
	* Значение по умолчанию: —
	
* `$params->listItemLabelMask`
	* Описание: Шаблон отображения элемента в списке выбора документов.  
		Задаётся как строка, содержащая плэйсхолдеры с полями документа (и TV).  
		Также доступен дополнительный плэйсхолдер `[+title+]`, в который будет подставлено значение поля `menutitle`, а если оно не заполнено, то `pagetitle`.
	* Допустимые значения: `string`
	* Значение по умолчанию: `'[+title+] ([+id+])'`
	
* `$params->maxSelectedItems`
	* Описание: Максимальное количество документов, которое пользователь может выбрать.
	* Допустимые значения:
		* `integer`
		* `0` — без ограничений
	* Значение по умолчанию: `0`
	
* `$params->allowDuplicates`
	* Описание: Разрешает выбор дубликатов.
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `false`
	
* `$params->roles`
	* Описание: Роли пользователей CMS, для которых необходимо применить виждет.
	* Допустимые значения:
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
		* `stringCommaSeparated`
		* `''` — применяется для всех шаблонов при пустом значении
	* Значение по умолчанию: `''`
	
* `$params->templates[$i]`
	* Описание: ID шаблона документа.
	* Допустимые значения: `integer`
	* **Обязателен**


## События CMS

* `OnDocFormPrerender`
* `OnDocFormRender`


## Примеры


### Выбор 3 избранных опубликованных товара

```php
mm_ddSelectDocuments([
	//TV, для которой применить виджет
	'fields' => 'favoriteProducts',
	//Пусть 314 — это ID документа-каталога, содержащего дочерние документы-товары
	'parentIds' => [314],
	//Ищем на 3 уровня вложенности
	'depth' => 3,
	//Отображаем только опубликованные документы с ID шаблона == 42
	'filter' => 'template=42&published=1',
	//Только 3 или меньше товара может быть выбрано
	'maxSelectedItems' => 3
]);
```


## Ссылки

* [Home page](https://code.divandesign.ru/modx/mm_ddselectdocuments)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-plugins-managermanager-mm_ddselectdocuments)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />