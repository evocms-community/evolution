# (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields

Виджет для плагина ManagerManager, позволяющий добавлять произвольное количество значений полей (TV) к одному документу (значения записываются в одно поле в формате JSON объекта), например: несколько изображений.

Возможности:
* Добавление к одному документу произвольного количества изображений, текстовых полей, списков (с возможностью выбора значений).
* Задание нескольких колонок разных типов (или одинаковых), например: изображения и подписи к ним (`$params->columns`).
* Количество значений (строк) может быть как фиксированным, динамичным, так и в определённых диапазонах (`$params->minRowsNumber`, `$params->maxRowsNumber`).
* Сортировка (перетаскивание) строк между собой.
* Генерация уникального идентификатора каждой строки.
* Вывод предопределённых списков значений (`$params->columns[i]['type']` == `'select'`).


## Использует

* PHP >= 5.4
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.ru/modx/managermanager) >= 0.7


## Установка

Для установки распакуйте архив в `/assets/plungins/managermanager/widgets/ddmultiplefields/`.


Смотрите также документацию:
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.ru/modx/managermanager).
* [(MODX)EvolutionCMS.modules.ddMMEditor](https://code.divandesign.ru/modx/ddmmeditor).
* [(MODX)EvolutionCMS.snippets.ddGetMultipleField](https://code.divandesign.ru/modx/ddgetmultiplefield).


Тип TV, к которой применяется виджет, должен быть `textarea`.


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
	
* `$params->columns`
	* Описание: Колонки таблицы.
	* Допустимые значения: `array`
	* Значение по умолчанию: `[ ['type' => 'text'] ]`
	
* `$params->columns[i]`
	* Описание: Колонка.
	* Допустимые значения: `arrayAssociative`
	* **Обязателен**
	
* `$params->columns[i]['type']`
	* Описание: Тип колонки.
	* Допустимые значения:
		* `'text'` — колонка `<input type="text">`
		* `'textarea'` — колонка `<textarea>`
		* `'richtext'` — колонка c полнотекстовым редактором (TinyMCE, например)
		* `'image'` — колонка-изображение
		* `'file'` — колонка-файл
		* `'date'` — колонка-дата
		* `'select'` — колонка `<select>` (см. `$params->columns[i]['data']`)
	* **Обязателен**
	
* `$params->columns[i]['title']`
	* Описание: Заголовок колонки.
	* Допустимые значения: `string`
	* Значение по умолчанию: `''`
	
* `$params->columns[i]['alias']`
	* Описание: Псевдоним колонки (должен быть уникальным в пределах поля). Если не задан, будет использован обычный нумерованный индекс.
	* Допустимые значения: `string`
	* Значение по умолчанию: —
	
* `$params->columns[i]['width']`
	* Описание: Ширина колонки в px.
	* Допустимые значения: `integer`
	* Значение по умолчанию: `180`
	
* `$params->columns[i]['data']`
	* Описание: Допустимые значения (для колонки типа `'select'`)
	* Допустимые значения: `stringJsonArray`
	* Значение по умолчанию: —
	
* `$params->columns[i]['data'][i]`
	* Описание: Элемент.
	* Допустимые значения: `arrayAssociative`
	* **Обязателен**
	
* `$params->columns[i]['data'][i]['value']`
	* Описание: Значение элемента.
	* Допустимые значения: `string`
	* **Обязателен**
	
* `$params->columns[i]['data'][i]['title']`
	* Описание: Заголовок элемента.
	* Допустимые значения: `string`
	* Значение по умолчанию: == `$params->columns[i]['data'][i]['value']`
	
* `$params->columns[i]['defaultValue']`
	* Описание: Значение колонки по умолчанию.  
		Сейчас используется только для проверки при удалении пустых строк.
	* Допустимые значения: `string`
	* Значение по умолчанию: `''`
	
* `$params->minRowsNumber`
	* Описание: Минимальное количество строк.
	* Допустимые значения: `integer`
	* Значение по умолчанию: `0`
	
* `$params->maxRowsNumber`
	* Описание: Максимальное количество строк.
	* Допустимые значения:
		* `integer`
		* `0` — без лимита
	* Значение по умолчанию: `0`
	
* `$params->previewWidth`
	* Описание: Максимальная ширина превьюшки (для колонок типа `'image'`).
	* Допустимые значения: `integer`
	* Значение по умолчанию: `300`
	
* `$params->previewHeight`
	* Описание: Максимальная высота превьюшки (для колонок типа `'image'`).
	* Допустимые значения: `integer`
	* Значение по умолчанию: `100`
	
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

* `OnDocFormPrerender`
* `OnDocFormRender`


## Формат вывода

Виджет сохраняет значение в TV в виде объекта JSON со следующей структурой:

```json
{
	"1590412453247": {
		"0": "First row, first column value",
		"customAlias": "First row, second column value"
	},
	"1590412497589": {
		"0": "Second row, first column value",
		"customAlias": "Second row, Second column value"
	}
}
```

Где:
* `1590412453247`, `1590412497589` — уникальные автоматически сгенерированные ID строк (используется `(new Date).getTime()` в JS при создании строк).
* `0`, `customAlias` — индекс или псевдоним (если задан) колонки.

Объекты строк с пустыми значениями колонок не будут сохранены.
Если все строки и все колонки пустые, будет сохранена пустая строка (`''`) вместо пустого JSON объекта (`'{}'`).

Настоятельно рекомендуется использовать [(MODX)EvolutionCMS.snippets.ddGetMultipleField](https://code.divandesign.ru/modx/ddgetmultiplefield) >= 3.5 для вывода TV на сайте.


## Примеры


### Сделать возможность добавления нескольких изобрежний в TV `someImages`

Создаём TV `someImages`, выставляем тип `textarea`.

```php
mm_ddMultipleFields([
	'fields' => 'someImages',
	'columns' => [
		//Будет всего одна колонка
		[
			'type' => 'image'
		]
	]
]);
```


### Создать 2 колонки: изображения и заголовки

```php
mm_ddMultipleFields([
	'fields' => 'someImage',
	'columns' => [
		[
			'type' => 'image',
			'title' => 'Фото'
		],
		[
			'type' => 'text',
			'title' => 'Заголовок'
		]
	]
]);
```


### Использование псеводнимов колонок (`$params->columns[i]['alias']`)

```php
mm_ddMultipleFields([
	'fields' => 'photos',
	'columns' => [
		[
			'type' => 'image',
			'title' => 'Фото',
			'alias' => 'src'
		],
		[
			'type' => 'text',
			'title' => 'Подпись'
			'alias' => 'alt'
		],
		//И здесь же мы можем задавать колонки без псевдонимов, в этом случае будет просто использован нумерованный индекс
		[
			'type' => 'textarea'
			'title' => 'Заметки'
		]
	]
]);
```

Сохранит что-то такое:

```json
{
	"1590412453247": {
		"src": "assets/images/ElonMusk.jpg",
		"alt": "Илон Рив Маск",
		"2": "Бизнес-магнат и инвестор"
	},
	"1590412497589": {
		"src": "assets/images/YuryDud.jpg",
		"alt": "Юрий Александрович Дудь",
		"2": "Российский журналист и Ютубер"
	}
}
```


### Таблица контактов сотрудников

Создаём TV `employees`, выставляем тип `textarea`.

```php
mm_ddMultipleFields([
	'fields' => 'employees',
	'columns' => [
		[
			'type' => 'text',
			'title' => 'Имя',
			'width' => 250
		],
		[
			'type' => 'text',
			'title' => 'Телефон'
			'width' => 100
		],
		[
			'type' => 'text',
			'title' => 'Должность'
			'width' => 200
		]
	],
	//Обяжем заполнить минимум двух сотрудников
	'minRowsNumber' => 2,
	//И максимум 10
	'maxRowsNumber' => 10
]);
```


### Колонка типа `<select>`

```php
mm_ddMultipleFields([
	'fields' => 'employees',
	'columns' => [
		[
			'type' => 'text',
			'title' => 'Имя',
			'width' => 250
		],
		[
			'type' => 'text',
			'title' => 'Телефон'
			'width' => 100
		],
		[
			'type' => 'select',
			'title' => 'Должость'
			'data' => '[
				{
					"value": "Учредитель"
				},
				{
					"value": "Директор"
				},
				{
					"value": "Дизайнер"
				},
				{
					"value": "Менеджер проектов"
				},
				{
					"value": "Разработчик"
				}
			]'
		]
	]
]);
```


## Ссылки

* [Home page](https://code.divandesign.ru/modx/mm_ddmultiplefields)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-plugins-managermanager-mm_ddmultiplefields)
* [GitHub](https://github.com/DivanDesign/EvolutionCMS.plugins.ManagerManager.mm_ddMultipleFields)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />