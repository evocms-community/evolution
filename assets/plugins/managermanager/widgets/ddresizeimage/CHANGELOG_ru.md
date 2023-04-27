# (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddResizeImage changelog


## Версия 1.6.2 (2022-11-02)
* \* Улучшена совместимость с новыми версиями (MODX)EvolutionCMS.snippets.ddGetMultipleField.


## Версия 1.6.1 (2021-10-02)
* \* Внимание! Требуется (MODX)EvolutionCMS.snippets.ddGetMultipleField >= 3.6 (если требуется работа с полями mm_ddMultipleFields).
* \* `\DDTools\Snippet::runSnippet` используется вместо `$modx->runSnippet` для запуска (MODX)EvolutionCMS.snippets.ddGetMultipleField без DB и eval.


## Версия 1.6 (2020-07-29)
* \+ Добавлена поддержка GIF.
* \* Параметры:
	* \+ `$params->watermarkImageFullPathName`: Новый параметр. Задавайте, если вам нужно нанести водяные знаки на изображения.
	* \- `$params->croppingMode`: Параметр удалён (с обратной совместимостью).
	* \+ `$params->transformMode`: Новый параметр (с обратной совместимостью к `$params->croppingMode`).
* \* Refactoring:
		* \* Используется `\DDTools\FilesTools::modifyImage`.
		* \* Используется `\DDTools\ObjectTools::isPropExists` вместо `isset`.
		* \* Используется `\DDTools\ObjectTools::extend` вместо `array_merge`.
* \+ README.
* \+ README_ru.
* \+ CHANGELOG.
* \+ CHANGELOG_ru.
* \+ Composer.json.


## Версия 1.5 (2017-04-17)
* \* Совестимость с PHP 7.x.


## Версия 1.4 (2016-11-01)
* \* Внимание! Требуется PHP >= 5.4.
* \* Внимание! Требуется (MODX)EvolutionCMS.plugins.ManagerManager >= 0.7.
* \+ Добавлена возможность задавать качество JPEG (closes #1). Большое спасибо @Aharito за инициативу и терпение :pray:!
* \* Рефакторинг, виджет теперь использует именованные параметры (обратная совместимость сохранена).
* \* Используется короткий синтаксис массивов PHP, потому что это удобнее.
* \* Небольшие изменения для совместимости с (MODX)EvolutionCMS.snippets.ddGetMultipleField 3.3.
* \* phpthumb: Исправлено имя конструктора для совместимости с PHP 7.x (from 4bf5df5f14222d44de1ad78e71eedc3a8c7ade7a by @yama).


## Версия 1.3.5 (2014-05-21)
* \* Небольшие изменения для совместимости с (MODX)EvolutionCMS.snippets.ddGetMultipleField 3.x.
* \* Прочие незначительные изменения.


## Версия 1.3.4 (2013-07-19)
* \* Добавлена проверка пустоту поля с mm_ddMultipleFields.
* \* Добавлена проверка на наличие размеров у оригинального изображения (на случай, если это не изображение, например).
* \* Суффикс к имени файла не добавляется, если он там уже есть (раньше плодились копии при `$replaceFieldVal` == `1`).


## Версия 1.3.3 (2013-07-09)
* \* При получении TV при помощи `tplUseTvs` добавлена проверка на тип данных (массив).


## Версия 1.3.2 (2013-07-02)
* \* Исправлена ошибка с предопределённым форматом файлов (могли быть проблемы с прозрачностью, например).


## Версия 1.3.1 (2013-06-14)
* \* Правильный регистр для `$modx->runSnippet` (php не против любого, но лучше строго соблюдать).


## Версия 1.3 (2013-06-01)
* \+ Параметры → `allowEnlargement`: Новый параметр. Позволяет предотвратить увеличение изображения.
* \* Незначительные изменения.


## Версия 1.2b (2012-08-30)
* \* Библиотека EasyPhpThumbnail больше не используется, теперь используется phpThumb.
* \* Небольшие изменения в коде и исправление ошибок.


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />
<style>ul{list-style:none;}</style>