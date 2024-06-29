<?php
/**
 * EVO Manager language file
 *
 * @version 3.1.x
 * @date 2023/11/28
 * @author The EVO Project Team
 *
 * @language English
 * @package modx
 * @subpackage manager
 *
 * Please commit your language changes on Transifex (https://www.transifex.com/projects/p/modx-evolution/) or on GitHub (https://github.com/modxcms/evolution).
 */
//$modx_textdir = 'rtl'; // uncomment this line for RTL languages
$modx_lang_attribute = 'en'; // Manager HTML/XML Language Attribute see http://en.wikipedia.org/wiki/ISO_639-1
$modx_manager_charset = 'UTF-8';

$_lang["about_msg"] = 'Evolution CMS - це <a href="https://evo-cms.com/" target="_blank">PHP Application Framework і система керування вмістом</a> ліцензія <a href="https://www.gnu.org/licenses/gpl-3.0.html">GNU GPL</a>.';
$_lang["about_title"] = 'Про EVO';

// days
$_lang["monday"] = 'Понеділок';
$_lang["tuesday"] = 'Вівторок';
$_lang["wednesday"] = 'Середа';
$_lang["thursday"] = 'Четвер';
$_lang["friday"] = 'П\'ятниця';
$_lang["saturday"] = 'Субота';
$_lang["sunday"] = 'Неділя';

// templates
$_lang["template"] = 'Шаблон';
$_lang["templates"] = 'Шаблони';
$_lang['templatecontroller'] = 'Контролер шаблону';
$_lang["template_assignedtv_tab"] = 'Призначені параметри (TV)';
$_lang["template_code"] = 'Код шаблона (HTML)';
$_lang["template_desc"] = 'Опис';
$_lang["template_edit_tab"] = 'Редагувати шаблон';
$_lang["template_inuse"] = 'Цей шаблон використовується. Будь ласка, налаштуйте документи, що використовують цей шаблон, на інший шаблон. Документи, що використовують цей шаблон:';
$_lang["template_management_msg"] = '<b>Шаблони</b> - це (X)HTML-розмітка сторінок сайту. Шаблон визначає структуру і дизайн відображення елементів сторінки (статичних і генеруються). Шаблон може містити виклики <i>сніпетів</i>, <i>чанків</i>, <i>параметрів (TV)</i>,а також посилання на CSS-файли та інші об\'єкти, що визначають візуальне відображення сторінки і її елементів.<p><b>Використання:</b> призначте шаблон будь-якого ресурсу.</p><p><br />Виберіть шаблон для редагування або створіть новий.';
$_lang["template_msg"] = 'Тут ви можете створити / відредагувати шаблон.';
$_lang["template_name"] = 'Ім\'я шаблону';
$_lang["template_no_tv"] = 'Цьому шаблону не присвоєно ніякі параметри (TV).';
$_lang["template_notassigned_tv"] = 'Ці TV доступні для вибору.';
$_lang["template_reset_all"] = 'Скинути всі шаблони (буде встановлено шаблон за замовчуванням)';
$_lang["template_reset_specific"] = 'Скинути тільки сторінки з шаблоном \'%s\'';
$_lang["template_assigned_blade_file"] = 'Відповідний blade-файл';
$_lang["template_create_blade_file"] = 'Створити файл шаблону при збереженні
';
$_lang["template_selectable"] = 'Шаблон вибирається при створенні або редагуванні ресурсів.';
$_lang["template_title"] = 'Створити / редагувати шаблон';
$_lang["template_tv_edit"] = 'Редагувати порядок TV';
$_lang["template_tv_edit_message"] = 'Перетягніть мишею для зміни порядку параметрів (TV) для цього шаблону.';
$_lang["template_tv_edit_title"] = 'Порядок сортування параметрів (TV)';
$_lang["template_tv_msg"] = 'Нижче виводяться параметри (TV), призначені цим шаблоном.';

// tmplvars
$_lang["tv"] = 'Параметр (TV)';
$_lang["tmplvar"] = 'Додаткові поля';
$_lang["tmplvars"] = 'Параметри (TV)';
$_lang["tmplvar_access_msg"] = 'Виберіть групи ресурсів, в яких дозволена зміна цього Додаткового Параметра (TV)';
$_lang["tmplvar_change_template_msg"] = 'Зміна шаблону потягне перезавантаження сторінки. Всі незбережені зміни будуть втрачені. \n\nВи впевнені в тому, що хочете змінити шаблон?';
$_lang["tmplvar_inuse"] = 'Цей параметр (TV) використовують такі шаблони. Щоб продовжити процес видалення, натисніть \'Видалити\', для скасування - натисніть \'Відміна\'.';
$_lang["tmplvar_tmpl_access"] = 'Доступ шаблонів';
$_lang["tmplvar_tmpl_access_msg"] = 'Вкажіть шаблони, які можуть використовувати цей параметр (TV)';
$_lang["tmplvars_binding_msg"] = 'Це поле підтримує прив\'язку даних з використанням @-команда';
$_lang["tmplvars_caption"] = 'Заголовок';
$_lang["tmplvars_default"] = 'Значення за замовчуванням';
$_lang["tmplvars_description"] = 'Опис';
$_lang["tmplvars_elements"] = 'Можливі значення';
$_lang["tmplvars_inherited"] = 'Value inherited';
$_lang["tmplvars_management_msg"] = '<b>Параметри (TV)</b> - це динамічні елементи шаблону, які отримують своє значення з якогось <i>джерела даних</i>. Існують також параметри, зумовлені для кожного конкретного ресурсу (наприклад, зумовлений параметр <code>[\'pagetitle\']</code> містить заголовок сторінки). Параметри можуть мати різний тип даних і різне значення на різних сторінках сайту.<p><b>Використання:</b> вставте де-небудь в <i>шаблоні</i> або в <i>області контента</i> вираз <code>[\'tvName\']</code></p> <p><b>Виклик через EVO API:</b> <code>$modx-&gt;documentObject[\'variable-name\']</code></p><p><br />Виберіть параметр для редагування або створіть новий.';
$_lang["tmplvars_msg"] = 'Тут ви можете створити / відредагувати параметр (TV). <br /> Пам\'ятайте, параметри повинні бути доступні для обраних шаблонів, щоб їх можна було використовувати.';
$_lang["tmplvars_name"] = 'Ім\'я параметра';
$_lang["tmplvars_novars"] = 'Параметрів (TV), не знайдено';
$_lang["tmplvars_rank"] = 'Порядок в списку';
$_lang["tmplvars_rank_edit_message"] = 'Перетягніть, щоб змінити порядок TV.';
$_lang["tmplvars_reset_params"] = 'Скинути параметри';
$_lang["tmplvars_title"] = 'Створити / редагувати параметр (TV)';
$_lang["tmplvars_type"] = 'Тип вводу';
$_lang["tmplvars_widget"] = 'Візуальний компонент';
$_lang["tmplvars_widget_prop"] = 'Властивості компонента (widget)';
$_lang["role_no_tv"] = 'Цій ролі ще не призначено жодної змінної.';
$_lang["role_notassigned_tv"] = 'Ці змінні доступні для призначення.';
$_lang["role_tv_msg"] = 'Змінні, призначені цій ролі, перераховані нижче.';
$_lang["tmplvar_roles_access_msg"] = 'Виберіть ролі, яким дозволено доступ до цієї змінної шаблону та її обробка';

// snippets
$_lang["snippet"] = 'Снiпет';
$_lang["snippets"] = 'Снипети';
$_lang["snippet_code"] = 'Код сніпета (php)';
$_lang["snippet_desc"] = 'Опис';
$_lang["snippet_execonsave"] = 'Виконати сніпет після збереження';
$_lang["snippet_management_msg"] = '<b>Сніпети</b> - це чистий PHP-код, що забезпечує динамічну логіку. Сніппети дозволяють відокремити бізнес-логіку від структури і представлення даних на веб-сторінці. Вони можуть використовуватися для генерації динамічних меню, виведення контенту з бази даних по якомусь умові (наприклад, тільки для зареєстрованих користувачів), взагалі, для будь-яких дій, доступних через EVO API. Сніппети можуть (але не зобов\'язані) приймати параметри і виводити якийсь результат (наприклад, генерувати HTML-код).<p/><p><b>Використання:</b> вставте <code>[[snippetName]]</code> або <code>[!snippetName!]</code> де-небудь в <i>шаблоні</i>, в <i>області контента</i>, в <i>чанку</i> або в <i>параметрі (TV)</i>. Формат <code>[[snippetName]]</code> дозволяє кешування результатів виконання сниппета, якщо для сторінки включено кешування. Формат <code>[!snippetName!]</code> використовується для виконання PHP-коду сниппета при кожному Перегляд сторінки, навіть якщо для сторінки дозволено кешування. Щоб при виклику PHP-коду сниппета передати в нього параметри, використовуйте формат <code>[[snippetName? &amp;param1=\'value1\' &amp;param2=\'value2\' .. &amp;paramN=\'valueN\']]</code> (або <code>[!snippetName? &amp;param1=\'value1\' &amp;param2=\'value2\' .. &amp;paramN=\'valueN\'!]</code>). Як параметри виклику сниппета можна використовувати виклик інших фрагментів (також з параметрами) або <i>чанків</i>.</p><p><b>Виклик через EVO API:</b> <code>$modx->runSnippet(\'snippetName\');</code></p><p><br /> Виберіть сніпет для редагування або створіть новий.';
$_lang["snippet_msg"] = '<p>Тут ви можете створити або відредагувати сниппет. Код сниппета повинен починатися з<code>&lt;?php</code></p> <p>Пам\'ятайте, сніпети - це чистий PHP-код, і якщо ви хочете вивести дані сниппета в певному місці в шаблоні, вам необхідно повертати дані з самого сниппета.</p>';
$_lang["snippet_name"] = 'Назва сніпета';
$_lang["snippet_properties"] = 'Параметри за замовчуванням';
$_lang["snippet_title"] = 'Створити / редагувати сніпет';

// chunks
$_lang["htmlsnippet"] = 'Чанк';
$_lang["htmlsnippets"] = 'Чанки';
$_lang["htmlsnippet_desc"] = 'Опис';
$_lang["htmlsnippet_management_msg"] = '<b>Чанки</b> - це шматки (X)HTML-коду, використовувані в незмінному вигляді в декількох місцях. Щоб мати можливість централізовано Редагувати повторюваний код, винесіть його в чанк. Чанки не можуть прямо містити виконуваний код, проте можуть включати в себе виклики <i>сніпетів</i> і / або  <i>параметрів (TV)</i>, забезпечують динамічну логіку.</p><p><b>Використання:</b> вставте <code>{{chunkName}}</code> де-небудь в <i>шаблоне</i>, в <i>області контенту</i>, в коді іншого чанка або в <i>параметрі (TV)</i>.</p><p><b>Виклик через EVO API:</b> <code>$modx->getChunk(\'chunkName\'); $modx->putChunk(\'chunkName\');</code></p><p><br />Оберіть чанк для редагування або створити новий.';
$_lang["htmlsnippet_msg"] = 'Тут ви можете створити/редагувати чанк. <br /> Пам\'ятайте, чанки - чистий HTML-код, і будь-які php-скрипти виконуватися в них не будуть.';
$_lang["htmlsnippet_name"] = 'Назва чанка';
$_lang["htmlsnippet_title"] = 'Створити / Редагувати чанк';
$_lang["chunk"] = 'Чанк (HTML-елемент шаблону)';
$_lang["chunk_code"] = 'Код чанку (HTML)';
$_lang["chunk_multiple_id"] = 'Помилка: Кілька чанків мають однаковий ідентифікатор.';
$_lang["chunk_no_exist"] = 'Чанк не знайдено.';

// plugins
$_lang["plugin"] = 'Плагін';
$_lang["plugins"] = 'Плагіни';
$_lang["plugin_code"] = 'Код плагіна (php)';
$_lang["plugin_config"] = 'Конфигурація плагіна';
$_lang["plugin_desc"] = 'Опис';
$_lang["plugin_disabled"] = 'Плагін відключений';
$_lang["plugin_event_msg"] = 'Виберіть події, які повинен відслідковувати плагін.';
$_lang["plugin_management_msg"] = '<b>Плагіни</b> - це інтерактивні PHP-скрипти, що запускаються при настанні події, яке вони відстежують. </p> <p> Виберіть плагін для редагування або створіть новий. Також ви можете задати порядок виклику плагінів при настанні подій, які вони обробляють.';
$_lang["plugin_msg"] = 'Тут ви можете створити / відредагувати плагін.';
$_lang["plugin_name"] = 'Назва плагіна';
$_lang["plugin_priority"] = 'Редагувати порядок виклику плагінів';
$_lang["plugin_priority_instructions"] = 'Перетягніть мишею для визначення порядку виконання плагінів для кожної події. Спочатку виконується перший в списку плагін.';
$_lang["plugin_priority_title"] = 'Порядок виклику плагінів';
$_lang["purge_plugin"] = 'Видалення старих плагінів';
$_lang["purge_plugin_confirm"] = 'Ви дійсно хочете видалити застарілі плагіни?';
$_lang["plugin_title"] = 'Створити / редагувати плагін';

// categories
$_lang["category"] = 'Категорія';
$_lang["categories"] = 'Категорії';
$_lang["category_heading"] = 'Категорія';
$_lang["category_manager"] = 'Менеджер категорій';
$_lang["category_management"] = 'Управління категоріями';
$_lang["category_msg"] = 'Тут ви можете переглядати і редагувати всі елементи, згруповані за категоріями.';

// file
$_lang["file_delete_file"] = 'Видалити файл';
$_lang["file_delete_folder"] = 'Видалити папку';
$_lang["file_deleted"] = 'Видалено';
$_lang["file_download_file"] = 'Скачати файл';
$_lang["file_download_unzip"] = 'Розпакувати файл';
$_lang["file_folder_chmod_error"] = 'Не вдалося змінити права, необхідно встановити потрібні права поза EVO.';
$_lang["file_folder_created"] = 'Папка успішно створена';
$_lang["file_folder_deleted"] = 'Папка успішно видалена';
$_lang["file_folder_not_created"] = 'Неможливо створити папку';
$_lang["file_folder_not_deleted"] = 'Неможливо видалити папку. Переконайтеся в тому, що вона порожня';
$_lang["file_not_deleted"] = 'Помилка';
$_lang["file_not_saved"] = 'Неможливо зберегти файл';
$_lang["file_saved"] = 'Файл збережений';
$_lang["file_unzip"] = 'Архів успішно розпакований';
$_lang["file_unzip_fail"] = 'Архів не вдалося розпакувати';

// files
$_lang["files"] = 'Файли';
$_lang["files_files"] = 'Файли';
$_lang["files_access_denied"] = 'Доступ заборонено';
$_lang["files_data"] = 'Сумарний обсяг';
$_lang["files_dir_listing"] = 'Список файлів в папці: ';
$_lang["files_directories"] = 'Папки';
$_lang["files_directory_is_empty"] = 'У цій папці немає файлів.';
$_lang["files_dirwritable"] = 'Дозволена запис в папку?';
$_lang["files_editfile"] = 'Редагувати файл';
$_lang["files_file_type"] = 'Тип файла: ';
$_lang["files_filename"] = 'Ім\'я файла';
$_lang["files_fileoptions"] = 'Параметри';
$_lang["files_filesize"] = 'Розмір файла';
$_lang["files_filetype_notok"] = 'Завантаження файлів такого типу заборонена';
$_lang["files_management"] = 'Керування файлами';
$_lang["files_management_no_permission"] = 'У вас немає достатньо прав для перегляду або редагування цих файлів. Зверніться до адміністратора, щоб надати вам доступ до <b>%s</b>.';
$_lang["files_modified"] = 'Змінено';
$_lang["files_top_level"] = 'На кореневий рівень';
$_lang["files_up_level"] = 'На рівень вище';
$_lang["files_upload_copyfailed"] = 'Не вдалося скопіювати файл в потрібну папку - завантаження перерване!';
$_lang["files_upload_error"] = 'Помилка';
$_lang["files_upload_error0"] = 'Виникла проблема під час завантаження.';
$_lang["files_upload_error1"] = 'Файл, який ви намагаєтеся завантажити, занадто великий.';
$_lang["files_upload_error2"] = 'Файл, який ви намагаєтеся завантажити, занадто великий.';
$_lang["files_upload_error3"] = 'Файл, який ви намагалися завантажити, завантажений лише частково.';
$_lang["files_upload_error4"] = 'Ви повинні вибрати файл для завантаження.';
$_lang["files_upload_error5"] = 'Виникли проблеми із завантаженням.';
$_lang["files_upload_inhibited_msg"] = '<b>Функція завантаження файлів на сервер файлів недоступна</b> - переконайтеся, що папка доступна PHP для запису.';
$_lang["files_upload_ok"] = 'Файл успішно завантажений';
$_lang["files_upload_permissions_error"] = 'Можливо помилка прав доступу - папка, в яку ви хочете завантажити дані, недоступна для запису на вашому сервері.';
$_lang["files_uploadfile"] = 'Завантажити';
$_lang["files_uploadfile_msg"] = 'Оберіть файли для завантаження:';
$_lang["files_uploading"] = 'Завантажується файл <b>%s</b> в <b>%s/</b><br />';
$_lang["files_viewfile"] = 'Перегляд файла';

// modules
$_lang["module"] = 'Модуль';
$_lang["modules"] = 'Модулі';
$_lang["module_code"] = 'Код модуля (php)';
$_lang["module_config"] = 'Конфігурація модуля';
$_lang["module_desc"] = 'Опис';
$_lang["module_disabled"] = 'Модуль відключений';
$_lang["module_edit_click_title"] = 'Натисніть для редагування модуля';
$_lang["module_group_access_msg"] = 'Оберіть групи користувачів, які можуть запускати цей модуль.';
$_lang["module_management"] = 'Керування модулями';
$_lang["module_management_msg"] = '<b>Модуль</b> - це додаток, засноване на архітектурі EVO і розширює можливості системи управління. Модуль може групувати набір елементів (<i>сніппети</i>, <i>чанки</i>, <i>дані</i>), реалізуючи принцип інкапсуляції через поділ інтерфейсу і реалізації.</p><p>Оберіть модуль, який ви хочете запустити або змінити, або створіть новий модуль. Для запуску модуля натисніть на значок поруч з його ім\'ям, для редагування модуля натисніть на його назву.';
$_lang["module_msg"] = 'Тут ви можете створювати / Редагуваті модулі. Модуль - це набір елементів (плагінів, сніпетів і т. д.).';
$_lang["module_name"] = 'Назва модуля';
$_lang["module_resource_msg"] = 'Тут ви можете додати / видалити елементи, від яких залежить цей модуль. Щоб додати новий елемент, натисніть одну з кнопок внизу.';
$_lang["module_resource_title"] = 'Залежності модуля';
$_lang["module_title"] = 'Створити / Редагуваті модуль';
$_lang["module_viewdepend_msg"] = 'Тут ви можете Переглянути, від яких елементів залежить цей модуль. Щоб змінити залежності, натисніть на \'Керування залежностями\'.';

// elements
$_lang["element"] = 'Елемент';
$_lang["elements"] = 'Елементи';
$_lang["element_categories"] = 'Загальний Перегляд';
$_lang["element_filter_msg"] = 'Введіть тут, щоб відфільтрувати список';
$_lang["element_management"] = 'Керування елементами';
$_lang["element_name"] = 'Назва елемента';
$_lang["element_selector_msg"] = 'Оберіть елемент (и) зі списку внизу та натисніть кнопку "Вставити".';
$_lang["element_selector_title"] = 'Вибір елемента';

// resource
$_lang["resource"] = 'Ресурс';
$_lang["resource_alias"] = 'Псевдонім';
$_lang["resource_alias_help"] = 'Тут ви можете вибрати псевдонім для ресурсу. Ім\'я користувача дозволяє звертатися до ресурсу за адресою: http://example.com/псевдоним. Увага: функція буде працювати тільки при включених \ `дружніх URL\'.';
$_lang["resource_content"] = 'Вміст ресурсу';
$_lang["resource_description"] = 'Опис';
$_lang["resource_description_help"] = 'Тут ви можете ввести опис ресурсу.';
$_lang["resource_duplicate"] = 'Зробити копію';
$_lang["resource_long_title_help"] = 'Тут ви можете ввести розширений заголовок вашого ресурсу, що може бути корисно для пошукових систем.';
$_lang["resource_metatag_help"] = 'Виберіть META-теги і ключові слова, які ви хочете привласнити цього ресурсу. Для вибору декількох ключових слів або МЕТА-тегів натискайте на них мишею, утримуючи Ctrl.';
$_lang["resource_opt_contentdispo"] = 'Місцезнаходження вмісту';
$_lang["resource_opt_contentdispo_help"] = 'Цей параметр визначає, як браузер повинен обробити ресурс. Для того, щоб ресурс став доступним для скачування, а не відображався у вікні браузера, виберіть \'Прикріплене\'.';
$_lang["resource_opt_emptycache"] = 'Очистити кеш';
$_lang["resource_opt_emptycache_help"] = 'Відзначте для того, щоб очистити кеш після збереження змін цього ресурсу. В цьому випадку відвідувачі побачать свіжу версію ресурсу.';
$_lang["resource_opt_folder"] = 'Контейнер (містить дочірні ресурси)';
$_lang["resource_opt_folder_help"] = 'Відзначте, щоб ресурс виконував також роль папки (одного з батьків) для інших ресурсів. Не варто особливо загострювати увагу на цьому параметрі - EVO автоматично встановить для ресурсу режим папки, якщо всередині нього почнуть створюватися ресурси.';
$_lang["resource_opt_menu_index"] = 'Позиція в меню';
$_lang["resource_opt_menu_index_help"] = 'Позиція (індекс) в меню - це порядковий номер ресурсу в меню. Цю величину можна також використовувати в розробці фрагментів.';
$_lang["resource_opt_menu_title"] = 'Пункт меню';
$_lang["resource_opt_menu_title_help"] = 'Пункт меню - це параметр, який можна використовувати для відображення короткого заголовка ресурсу в меню.';
$_lang["resource_opt_published"] = 'Опублікувати';
$_lang["resource_opt_published_help"] = 'Відзначте, щоб опублікувати ресурс відразу після збереження.';
$_lang["resource_opt_richtext"] = 'Використовувати HTML-редактор';
$_lang["resource_opt_richtext_help"] = 'Відзначте, щоб для редагування ресурсу використовувався HTML-редактор. Якщо ресурс містить JavaScript або форми - зніміть галочку, щоб редагувати його в режимі HTML-коду (щоб HTML-редактор не вносив жодних змін в код).';
$_lang["resource_opt_show_menu"] = 'Показувати в меню';
$_lang["resource_opt_show_menu_help"] = 'Увімкніть цей параметр для відображення ресурсу в будь-якому меню сайту. Майте на увазі, деякі сніпети можуть ігнорувати цей параметр.';
$_lang["resource_opt_trackvisit_help"] = 'Відзначте, щоб показувати дочірні ресурси в дереві документів';
$_lang["resource_overview"] = 'Огляд ресурсу';
$_lang["resource_parent"] = 'Папка';
$_lang["resource_parent_help"] = 'Клацніть мишею на значку контейнера вгорі, щоб включити (виключити) режим вибору батьківського ресурсу, потім виберіть його в дереві сайту зліва.';
$_lang["resource_permissions_error"] = 'Зв\'яжіть цей ресурс принаймні з однією групою ресурсів, до якої у Вас є доступ.';
$_lang["resource_setting"] = 'Налаштування ресурса';
$_lang["resource_summary"] = 'Анотація (введення)';
$_lang["resource_summary_help"] = 'Введіть короткий опис ресурсу';
$_lang["resource_title"] = 'Заголовок';
$_lang["resource_title_help"] = 'Введіть ім\'я / заголовок ресурсу. Небажано використовувати при цьому зворотний слеш (\)';
$_lang["resource_to_be_moved"] = 'Переміщуваний ресурс';
$_lang["resource_type"] = 'Тип ресурса';
$_lang["resource_type_message"] = 'Веб-посилання на ресурс в інтернеті, включаючи інші ресурси EVO, зовнішні веб-сторінки, зображення або інші файли в інтернеті. Для ресурсу повинен бути заданий тип вмісту text / html, а в місцезнаходження вмісту - відображається.';
$_lang["resource_type_weblink"] = 'Веб-посилання';
$_lang["resource_type_webpage"] = 'Веб-сторінка';
$_lang["resource_weblink_help"] = 'Введіть адресу (URI) об\'єкта в мережі, на який повинна вказувати веб-посилання.';
$_lang["resources_in_container"] = '- кількість ресурсів в контейнері';
$_lang["resources_in_container_no"] = 'Поточний контейнер не містить дочірніх ресурсів.';

// role
$_lang["role"] = 'Роль';
$_lang["role_about"] = 'Перегляд інформації про систему';
$_lang["role_actionok"] = 'Перегляд сторінки підтвердження завершення дії';
$_lang["role_assets_images"] = 'Доступ к assets/images';
$_lang["role_assets_files"] = 'Доступ к assets/files';
$_lang["role_bk_manager"] = 'Використовувати резервне копіювання';
$_lang["role_cache_refresh"] = 'Очистка кешу';
$_lang["role_category_manager"] = 'Використовувати менеджер категорій';
$_lang["role_change_password"] = 'Зміна пароля';
$_lang["role_change_resourcetype"] = 'Зміна типу ресурса';
$_lang["role_chunk_management"] = 'Управління чанками';
$_lang["role_config_management"] = 'Зміна конфігурації';
$_lang["role_content_management"] = 'Управління вмістом';
$_lang["role_create_chunk"] = 'Створення нових чанків';
$_lang["role_create_doc"] = 'Створення нових ресурсів';
$_lang["role_create_plugin"] = 'Створення нових плагінів';
$_lang["role_create_snippet"] = 'Створення нових снипетів';
$_lang["role_create_template"] = 'Створення нових шаблонів';
$_lang["role_credits"] = 'Перегляд списку розробників';
$_lang["role_delete_chunk"] = 'Видалення чанков';
$_lang["role_delete_doc"] = 'Видалення ресурсов';
$_lang["role_delete_eventlog"] = 'Видалення протоколу подій';
$_lang["role_delete_module"] = 'Видалення модулів';
$_lang["role_delete_plugin"] = 'Видалення плагінів';
$_lang["role_delete_role"] = 'Видалення ролей';
$_lang["role_delete_snippet"] = 'Видалення снипетів';
$_lang["role_delete_template"] = 'Видалення шаблонів';
$_lang["role_delete_user"] = 'Видалення користувачів';
$_lang["role_delete_web_user"] = 'Видалення веб-користувачів';
$_lang["role_edit_chunk"] = 'Редагування чанків';
$_lang["role_edit_doc"] = 'Редагування ресурсів';
$_lang["role_edit_doc_metatags"] = 'Редагувати META-теги і ключові слова';
$_lang["role_edit_module"] = 'Редагування модулів';
$_lang["role_edit_plugin"] = 'Редагування плагінів';
$_lang["role_edit_role"] = 'Редагування ролей';
$_lang["role_edit_settings"] = 'Змінювати конфігурацію сайта';
$_lang["role_edit_snippet"] = 'Редагування сниппетов';
$_lang["role_edit_template"] = 'Редагування шаблонов';
$_lang["role_edit_user"] = 'Редагування пользователей';
$_lang["role_edit_web_user"] = 'Редагування веб-пользователей';
$_lang["role_empty_trash"] = 'Очищення кошика';
$_lang["role_errors"] = 'Перегляд діалогу помилки';
$_lang["role_eventlog_management"] = 'Управління протоколом подій';
$_lang["role_export_static"] = 'Експорт статичних сторінок в HTML';
$_lang["role_file_management"] = 'Управління файлами';
$_lang["role_file_manager"] = 'Використання файл-менеджера';
$_lang["role_frames"] = 'Запит менеджерських фреймів';
$_lang["role_help"] = 'Перегляд сторінок допомоги';
$_lang["role_home"] = 'Запит вхідної сторінки менеджера';
$_lang["role_import_static"] = 'Імпорт HTML';
$_lang["role_logout"] = 'Вихід з системи управління';
$_lang["role_list_module"] = 'Список модулів';
$_lang["role_manage_metatags"] = 'Управління META-тегами і ключовими словами';
$_lang["role_management_msg"] = '<b>Роль</b> - це набір прав здійснювати певні дії. Ролі призначаються користувачам. Типові ролі:</p> <ul> <li><b>Адміністратори сайту</b> - керують користувачами і загальними налаштуваннями;</li> <li><b>Розробники</b> - пишуть код і, відповідно, мають набір прав на створення / редагування / знищення <i>модулів</i>, <i>плагінів</i>, <i>сніпетів</i>, <i>чанків</i>, <i>параметрів (TV)</i>;</li> <li><b>Дизайнери</b> - відповідають за зовнішній вигляд і верстку сторінок сайту, мають набір прав на створення / редагування / видалення <i> шаблонів </i> і <i> чанкі </i>; </li> <li> <b> Редактори </и>- відповідають за зміст сторінок сайту, створюють, редагують і видаляють ресурси;</li> <li><b>Коректори</b> - читають і коригують ресурси, але не мають прав на їх створення і видалення;</li> <li><b>Головний редактор</b> - приймає рішення про публікацію нових ресурсів, управляє розкладом публікації.</li> </ul><br /><p>Виберіть роль для редагування або створіть нову роль.';
$_lang["role_management_title"] = 'Керування ролями';
$_lang["role_messages"] = 'Читати і відправляти повідомлення';
$_lang["role_module_management"] = 'Керування модулями';
$_lang["role_name"] = 'Назва ролі';
$_lang["role_new_module"] = 'Створення нових модулів';
$_lang["role_new_role"] = 'Створення нових ролей';
$_lang["role_new_user"] = 'Створення нових користувачів';
$_lang["role_new_web_user"] = 'Створення веб-користувачів';
$_lang["role_plugin_management"] = 'Керування плагінами';
$_lang["role_publish_doc"] = 'Публикація ресурсів';
$_lang["role_remove_locks"] = 'Видалити блокування';
$_lang["role_role_management"] = 'Керування ролями';
$_lang["role_run_module"] = 'Запуск модулів';
$_lang["role_save_chunk"] = 'Збереження чанків';
$_lang["role_save_doc"] = 'Збереження ресурсів';
$_lang["role_save_module"] = 'Збереження модулів';
$_lang["role_save_password"] = 'Збереження пароля';
$_lang["role_save_plugin"] = 'Збереження плагінів';
$_lang["role_save_role"] = 'Збереження ролей';
$_lang["role_save_snippet"] = 'Збереження сніпетів';
$_lang["role_save_template"] = 'Збереження шаблонів';
$_lang["role_save_user"] = 'Збереження користувачів';
$_lang["role_save_web_user"] = 'Збереження веб-користувачів';
$_lang["role_snippet_management"] = 'Керування сніпетами';
$_lang["role_template_management"] = 'Керування шаблонами';
$_lang["role_title"] = 'Створити / редагувати роль';
$_lang["role_udperms"] = 'Керування доступом';
$_lang["role_user_management"] = 'Керування користувачами';
$_lang["role_view_docdata"] = 'Перегляд інформації про ресурс';
$_lang["role_view_eventlog"] = 'Перегляд протоколу подій';
$_lang["role_view_logs"] = 'Перегляд системного протоколу';
$_lang["role_view_unpublished"] = 'Перегляд неопублікованих ресурсів';
$_lang["role_web_access_persmissions"] = 'Права веб-доступа';
$_lang["role_web_user_management"] = 'Керування веб-користувачами';

// user
$_lang["user"] = 'Користувач';
$_lang["users"] = 'Користувачі';
$_lang["user_block"] = 'Заблокований';
$_lang["user_blockedafter"] = 'Заблокований після';
$_lang["user_blockeduntil"] = 'Заблокований до';
$_lang["user_changeddata"] = 'Дані вашої реєстрації змінені. Будь ласка, заново авторизуйтесь в системі.';
$_lang["user_country"] = 'Країна';
$_lang["user_dob"] = 'Дата народження';
$_lang["user_doesnt_exist"] = 'Користувач не існує';
$_lang["user_edit_self_msg"] = '<b>Рекомендується вийти і знову авторизуватися для того, щоб всі зміни почали діяти. </b> <br /> Також, якщо ви вирішили згенерувати новий пароль для себе, він буде відправлений вам по e-mail.';
$_lang["user_email"] = 'E-mail адреса';
$_lang["user_failedlogincount"] = 'Відмови авторизації';
$_lang["user_fax"] = 'Факс';
$_lang["user_female"] = 'Жіночий';
$_lang["user_full_name"] = 'Повне ім\'я';
$_lang["user_first_name"] = 'Ім\'я';
$_lang["user_last_name"] = 'Прізвище';
$_lang["user_middle_name"] = 'По батькові';
$_lang["user_gender"] = 'Стать';
$_lang["user_is_blocked"] = 'Цей користувач заблокований';
$_lang["user_logincount"] = 'Кількість авторизаций';
$_lang["user_male"] = 'Чоловічій';
$_lang["user_management_msg"] = '<b>Менеджери </b> - це користувачі з правом авторизації в системі управління сайтом. <br /> <br /> Виберіть менеджера, настройки якого ви хочете редагувати, або створіть нового менеджера.';
$_lang["user_management_title"] = 'Управління менеджерами';
$_lang["user_mobile"] = 'Номер мобільного телефону';
$_lang["user_phone"] = 'Номер телефону';
$_lang["user_photo"] = 'Фото користувача';
$_lang["user_photo_message"] = 'Введіть адресу (URL) зображення для цього користувача або натисніть кнопку вставки, щоб завантажити його на сервер.';
$_lang["user_prevlogin"] = 'Остання авторизація';
$_lang["user_role"] = 'Роль користувача';
$_lang["no_user_role"] = 'Немає ролі користувача';
$_lang["user_state"] = 'регіон/провінція/область/район';
$_lang["user_title"] = 'Створити/редагувати користувача';
$_lang["user_upload_message"] = 'Якщо ви хочете заборонити цьому учаснику завантаження будь-яких файлів даної категорії, переконайтеся, що прапорець \'Використовувати загальні настройки\' не встановлено, і залиште це поле порожнім.';
$_lang["user_use_config"] = 'Використовувати системні настройки';
$_lang["user_verification"] = 'Користувача перевірено';
$_lang["user_zip"] = 'Поштовий індекс';
$_lang["username"] = 'Користувач';
$_lang["username_unique"] = 'Ім\'я користувача вже використовується!';
$_lang["user_street"] = 'Вулиця';
$_lang["user_city"] = 'Город';
$_lang["user_other"] = 'Інше';

// add
$_lang["add"] = 'Створити';
$_lang["add_chunk"] = 'Чанк';
$_lang["add_doc"] = 'Ресурс';
$_lang["add_folder"] = 'Нова папка';
$_lang["add_plugin"] = 'Плагін';
$_lang["add_resource"] = 'Новий ресурс';
$_lang["add_snippet"] = 'Сніпет';
$_lang["add_tag"] = 'Створити тег';
$_lang["add_template"] = 'Шаблон';
$_lang["add_tv"] = 'Параметр (TV)';
$_lang["add_weblink"] = 'Нове посилання';

// new
$_lang["new_category"] = 'Нова категорія';
$_lang["new_file_permissions_message"] = 'При завантаженні нового файлу за допомогою файл-менеджера буде зроблена спроба встановити права на файл відповідно до зазначеного тут значенням. На деяких системах автоматична установка прав може бути недоступна (зокрема, при використанні IIS) - в такому випадку необхідно буде встановити відповідні права вручну.';
$_lang["new_file_permissions_title"] = 'Права на новий файл:';
$_lang["new_folder_permissions_message"] = 'При створенні нової папки за допомогою файл-менеджера буде зроблена спроба встановити права на папку відповідно до зазначеного тут значенням. На деяких системах автоматична установка прав може бути недоступна (зокрема, при використанні IIS) - в такому випадку необхідно буде встановити відповідні права вручну.';
$_lang["new_folder_permissions_title"] = 'Права на нову папку:';
$_lang["new_permission"] = 'Нове право доступу';
$_lang["new_htmlsnippet"] = 'Новий чанк';
$_lang["new_keyword"] = 'Добавити ключове слово:';
$_lang["new_module"] = 'Новий модуль';
$_lang["new_parent"] = 'Новий батьківський ресурс';
$_lang["new_plugin"] = 'Новий плагін';
$_lang["new_role"] = 'Нова роль';
$_lang["new_snippet"] = 'Новий сніпет';
$_lang["new_template"] = 'Новий шаблон';
$_lang["new_tmplvars"] = 'Новий параметр (TV)';
$_lang["new_user"] = 'Новий користувач';
$_lang["new_web_user"] = 'Новий веб-користувач';
$_lang["new_resource"] = 'Новий ресурс';

// manage
$_lang["manage_categories"] = 'Управління категоріями';
$_lang["manage_depends"] = 'Керування залежностями';
$_lang["manage_files"] = 'Керування файлами';
$_lang["manage_htmlsnippets"] = 'Чанки';
$_lang["manage_metatags"] = 'Керування META-тегами и ключовими словами';
$_lang["manage_modules"] = 'Керування модулями';
$_lang["manage_plugins"] = 'Плагіни';
$_lang["manage_snippets"] = 'Сніппети';
$_lang["manage_templates"] = 'Шаблони';
$_lang["manage_documents"] = 'Документи';
$_lang["manage_permission"] = 'Права доступу';

// move
$_lang["move"] = 'Перемістити';
$_lang["move_resource"] = 'Перемістити';
$_lang["move_resource_message"] = 'Ви можете перемістити ресурс і всі його дочірні ресурси, вибравши новий \'батьківський\' ресурс. Якщо ви виберете в якості батьківського ресурсу, що не є папкою, EVO автоматично зробить його папкою. Виберіть новий \'батьківський ресурс\' в дереве сайту наліво.';
$_lang["move_resource_new_parent"] = 'Виберіть новий \'батьківський\' ресурс в дереві сайту зліва.';
$_lang["move_resource_title"] = 'Перемістити';

$_lang["access_permissions"] = 'Права доступу';
$_lang["access_permission_denied"] = 'У вас недостатньо прав для перегляду даного ресурсу.';
$_lang["access_permission_parent_denied"] = 'У вас недостатньо прав для створення ресурсу в даному розділі';
$_lang["access_permissions_add_resource_group"] = 'Створити нову групу ресурсів';
$_lang["access_permissions_add_user_group"] = 'Створити нову групу користувачів';
$_lang["access_permissions_docs_message"] = 'Тут ви можете вибрати, до яких груп ресурсів належить цей ресурс.';
$_lang["access_permissions_group_link"] = 'Створити новий зв\'язов групи користувачів і групи ресурсів';
$_lang["access_permissions_introtext"] = 'Тут ви можете керувати доступом груп користувачів до груп ресурсів. Щоб додати користувача до групи, при редагуванні його виберіть групу, до якої він буде належати. Ресурс також можна додати в групу при його редагуванні.';
$_lang["access_permissions_link_to_group"] = 'з групою ресурсів';
$_lang["access_permissions_context"] = 'в контексті';
$_lang["access_permissions_link_user_group"] = 'Зв\'язати групу користувачів';
$_lang["access_permissions_links"] = 'Зв\'язки груп користувачів і груп ресурсів';
$_lang["access_permissions_links_tab"] = 'Тут можна задати, які групи користувачів мають доступ (тобто створювати і редагувати) до груп ресурсів. Щоб прив\'язати групу ресурсів до групи користувачів, виберіть групу зі списку і натисніть \'Виконати\'. Щоб видалити прив\'язку до групи, натисніть \'Видалити\'.';
$_lang["access_permissions_no_resources_in_group"] = 'Немає ресурсів.';
$_lang["access_permissions_no_users_in_group"] = 'Немає користувачів.';
$_lang["access_permissions_off"] = '<span class="warning">Права доступу не активовані.</span> Це означає, що ніякі зміни не вступлять в силу, до тих пір поки ви не зміните налаштування.';
$_lang["access_permissions_resource_groups"] = 'Групи ресурсів';
$_lang["access_permissions_resources_in_group"] = '<b>ресурсів в групі:</b> ';
$_lang["access_permissions_resources_tab"] = 'Тут ви можете побачити всі групи ресурсів. Також, тут ви можете створити, перейменувати, видалити групу, переглянути ресурси в групі. Для додавання або видалення ресурсу з групи перейдіть в редагування ресурсу.';
$_lang["access_permissions_user_toggle"] = 'Перемкнути права доступу';
$_lang["access_permissions_user_groups"] = 'Групи користувачів';
$_lang["access_permissions_user_message"] = 'Тут ви можете вибрати, до якої групи користувачів належить цей користувач:';
$_lang["access_permissions_users_in_group"] = 'Користувачів в групі:';
$_lang["access_permissions_users_tab"] = 'Тут ви можете побачити всі групи користувачів. Також, тут ви можете створити, перейменувати, видалити групу, переглянути членів групи. Щоб додати або видалити користувача з групи редагуйте користувача безпосередньо. Менеджери завжди мають доступ до всіх ресурсів.';

$_lang["users_list"] = 'Список користувачів';
$_lang["documents_list"] = 'Список ресурсів';

$_lang["account_email"] = 'E-mail облікового запису';
$_lang["actioncomplete"] = '<b>Дія успішно завершена</b><br />Будь ласка, зачекайте, поки EVO зробить очистку.';
$_lang["activity_message"] = 'Цей список показує недавно створені або відредаговані ресурси:';
$_lang["activity_title"] = 'Нещодавно створені / відредаговані ресурси';

$_lang["administrator_role_message"] = 'Цю роль неможливо редагувати або видалити.';
$_lang["administrators"] = 'Адміністраторам';
$_lang["after_saving"] = 'Після збереження';
$_lang["alert_delete_self"] = 'Ви не можете видалити себе :)';
$_lang["alias"] = 'Псевдонім';
$_lang["all_doc_groups"] = 'Без групи (доступний для всіх)';
$_lang["all_events"] = 'Всі події';
$_lang["all_usr_groups"] = 'Всі групи (доступний для всіх)';
$_lang["allow_mgr_access"] = 'Доступ до інтерфейсу системи управління сайтом';
$_lang["allow_mgr_access_message"] = 'Виберіть цей параметр для дозволу / заборони доступу до системи управління сайтом.<br /><b>Примітка:</b> якщо параметр відключений, користувач буде спрямований на стартову сторінку системи управління або на початкову сторінку сайту.';
$_lang["already_deleted"] = 'вже видалений.';
$_lang["attachment"] = 'Прикріплене';
$_lang["author_infos"] = 'Інформація про авторів';
$_lang["automatic_alias_message"] = 'Оберіть \'Так\' для того, щоб система автоматично генерувала псевдоніми на основі заголовків сторінок (для транслітерації російських символів налаштуйте TransAlias).';
$_lang["automatic_alias_title"] = 'Автоматично генерувати псевдонім:';
$_lang["backup"] = 'Бекап';
$_lang["bk_manager"] = 'Резервне копіювання';
$_lang["block_message"] = 'Після збереження користувач буде заблокований.';
$_lang["blocked_minutes_message"] = 'Тут ви можете ввести час в хвилинах, на який користувач буде заблокований, якщо він досягне максимальної кількості дозволених невдалих спроб входу в систему. Будь ласка, введіть це значення як число (не використовуйте розділових знаків, пробілів і т.д.)';
$_lang["blocked_minutes_title"] = 'Час блокування:';
$_lang["cache_files_deleted"] = 'Наступні файли були видалені:';
$_lang["cancel"] = 'Скасувати';
$_lang["captcha_code"] = 'Код підтвердження';
$_lang["captcha_message"] = 'Увімкніть для посилення безпеки. Для авторизації необхідно буде ввести код, який не можуть розпізнати різного роду скрипти (показаний у вигляді графічного зображення).';
$_lang["captcha_title"] = 'Використовувати код CAPTCHA:';
$_lang["captcha_words_default"] = 'EVO,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join(),Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote';
$_lang["captcha_words_message"] = 'Тут ви можете задати список слів для генерування коду CAPTCHA. Слова в списку повинні бути розділені комами.';
$_lang["captcha_words_title"] = 'Слова для генерації CAPTCHA-кодів:';

$_lang["cfg_base_path"] = 'MODX_BASE_PATH';
$_lang["cfg_base_url"] = 'MODX_BASE_URL';
$_lang["cfg_manager_path"] = 'MODX_MANAGER_PATH';
$_lang["cfg_manager_url"] = 'MODX_MANAGER_URL';
$_lang["cfg_site_url"] = 'MODX_SITE_URL';

$_lang["change_name"] = 'Змінити ім\'я';
$_lang["change_password"] = 'змінити пароль';
$_lang["change_password_confirm"] = 'Підтвердити пароль';
$_lang["change_password_message"] = 'Введіть новий пароль, а потім введіть його ще раз для підтвердження. Довжина пароля повинна складати від 6 до 15 символів.';
$_lang["change_password_new"] = 'Новий пароль';
$_lang["charset_message"] = 'Виберіть кодування сторінок сайту. Пам\'ятайте, що EVO тестувався не на всіх кодуваннях. Для більшості мов підходить кодування UTF-8.';
$_lang["charset_title"] = 'Кодування:';

$_lang["cleaningup"] = 'Очищення...';
$_lang["clean_uploaded_filename"] = 'Використовувати транслітерацію при завантаженні файлів.';
$_lang["clean_uploaded_filename_message"] = 'Використовувати налаштування плагіна transalias для транслітерації імен файлів, що завантажуються із збереженням крапок і ком.';
$_lang["clear_log"] = 'Очистити протокол';
$_lang["click_to_context"] = 'Контекстне меню';
$_lang["click_to_edit_title"] = 'Редагувати запис';
$_lang["click_to_view_details"] = 'Деталі';
$_lang["close"] = 'Закрити';
$_lang["code"] = 'Код';
$_lang["collapse_tree"] = 'Згорнути дерево';
$_lang["comment"] = 'Коментар';

$_lang["configcheck_admin"] = 'Будь ласка, зверніться до системного адміністратора і повідомте про цю помилку';
$_lang["configcheck_cache"] = 'неможливо записати в папку кешування';
$_lang["configcheck_cache_msg"] = 'EVO не в змозі записувати дані в папку кешування. Система буде працювати нормально, але кешування відбуватися не буде. Для вирішення проблеми дозвольте запис в папку <b>/assets/cache<b>.';
$_lang["configcheck_configinc"] = 'Файл конфігурації все ще доступний для запису';
$_lang["configcheck_configinc_msg"] = 'Зловмисники потенційно можуть завдати шкоди вашому сайту. <strong>Серйозно.</strong> Будь ласка, встановіть права доступу до файлу конфігурації (/[+MGR_DIR+]/includes/config.inc.php) в режим \'Тільки для читання\'';
$_lang["configcheck_default_msg"] = 'Невизначена помилка.';
$_lang["configcheck_errorpage_unavailable"] = 'Сторінка повідомлення про помилку, зазначена в конфігурації сайту, недоступна.';
$_lang["configcheck_errorpage_unavailable_msg"] = 'Це означає, що вона не існує або недоступна звичайним відвідувачам сайту. Це може привести до циклічного виклику функції \'повідомлення про помилку\' і великій кількості записів в журналі сайту. Переконайтеся, що немає груп веб-користувачів, яким призначено цю сторінку.';
$_lang["configcheck_errorpage_unpublished"] = 'Сторінка \'повідомлення про помилку\', зазначена в конфігурації сайту, не опублікована.';
$_lang["configcheck_errorpage_unpublished_msg"] = 'Це означає, що вона недоступна відвідувачам сайту. Необхідно опублікувати сторінку \'повідомлення про помилку\', щоб ця функція працювала правильно.';
$_lang["configcheck_filemanager_path"] = 'Введено невірний <a href="/[+MGR_DIR+]/?a=17&amp;tab=4">шлях для файлового менеджера</a>';
$_lang["configcheck_filemanager_path_msg"] = 'Це може статися, наприклад, після переміщення вашого сайту в інший каталог або на інший сервер. Будь ласка, перевірте і обновіть настройки вашої системи EvolutionCMS';
$_lang["configcheck_hide_warning"] = '<a href="javascript:hideConfigCheckWarning(\'%s\');"><em>Більше не показувати це повідомлення.</em></a>';
$_lang["configcheck_images"] = 'Папка зображень (images) недоступна для запису';
$_lang["configcheck_images_msg"] = 'Папка зображень (images) недоступна для запису або не існує на сервері. З цього випливає, що управління зображеннями працювати не буде';
$_lang["configcheck_installer"] = 'Не видалена папка з файлами, які використовувались в процесі установки';
$_lang["configcheck_installer_msg"] = 'Папка /install містить інсталяційні файли системи EVO. Зловмисники можуть скористатися цими файлами для злому / пошкодження сайту, так що краще видалити папку з сервера.';
$_lang["configcheck_lang_difference"] = 'Неправильне кількість записів в мовному пакеті.';
$_lang["configcheck_lang_difference_msg"] = 'Поточний мовний пакет має кількість записів, відмінне від необхідного. Незважаючи на те, що система буде працювати нормально, можливо, мовний пакет потребує доопрацювання.';
$_lang["configcheck_notok"] = 'Конфігурація містить помилки.';
$_lang["configcheck_ok"] = 'Конфігурація не містить помилок.';
$_lang["configcheck_php_gdzip"] = 'GD і/або Zip PHP розширення не знайдені';
$_lang["configcheck_php_gdzip_msg"] = 'ля нормальної роботи EVO необхідно, щоб були дозволені GD і Zip розширення для PHP. EVO буде працювати і без цих розширень, але ви не зможете використовувати всі можливості вбудованого файл-менеджера, редактора зображень або код CAPTCHA для авторизації.';
$_lang["configcheck_rb_base_dir"] = 'Введено невірний <a href="/[+MGR_DIR+]/?a=17&amp;tab=5">шлях для файл-браузера</a>';
$_lang["configcheck_rb_base_dir_msg"] = 'Це може статися, наприклад, після переміщення вашого сайту в інший каталог або на інший сервер. Будь ласка, перевірте і обновіть налаштування вашої системи EvolutionCMS';
$_lang["configcheck_register_globals"] = 'Параметр \'register_globals\' має значення \'ON\' в файлі конфігурації \'php.ini\'.';
$_lang["configcheck_register_globals_msg"] = 'Така конфігурація робить ваш сайт значно більш уразливим для Cross Site Scripting (XSS) атак. Зверніться в службу підтримки вашого хостингу за інформацією, яким чином вимкнути цей параметр.';
$_lang["configcheck_title"] = 'Перевірка конфігурації';
$_lang["configcheck_templateswitcher_present"] = 'Виявлено плагін TemplateSwitcher';
$_lang["configcheck_templateswitcher_present_delete"] = '<a href="javascript:deleteTemplateSwitcher();">Видалити плагін TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_disable"] = '<a href="javascript:disableTemplateSwitcher();">Відключити плагін TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_msg"] = 'Виявлено проблеми з кешуванням і продуктивністю при використанні плагіна TemplateSwitcher';
$_lang["configcheck_unauthorizedpage_unavailable"] = 'Сторінка повідомлення про обмежений доступ, зазначена в конфігурації сайту, не опублікована або не існує.';
$_lang["configcheck_unauthorizedpage_unavailable_msg"] = 'Це означає, що вона не існує або недоступна звичайним відвідувачам сайту. Це може привести до рекурсивного виклику функції \'повідомлення про помилку\' і великій кількості записів в журналі сайту. Переконайтеся, що немає груп веб-користувачів, яким призначена ця сторінка.';
$_lang["configcheck_unauthorizedpage_unpublished"] = 'Сторінка повідомлення про обмежений доступ, зазначена в конфігурації сайту, не опублікована.';
$_lang["configcheck_unauthorizedpage_unpublished_msg"] = 'Це означає, що вона недоступна відвідувачам сайту. Необхідно опублікувати сторінку повідомлення про обмеження доступу, щоб ця функція працювала правильно.';
$_lang["configcheck_validate_referer"] = 'Попередження безпеки: перевірка заголовка HTTP';
$_lang["configcheck_validate_referer_msg"] = 'У конфігурації параметр<strong>Перевіряти серверні заголовки HTTP_REFERER?</strong> відключений. Ми рекомендуємо його ввімкнути. <a href="index.php?a=17">Перейти до налаштування конфігурації</a>';
$_lang["configcheck_warning"] = 'Помилка конфігурації:';
$_lang["configcheck_what"] = 'Що це означає?';

$_lang["safe_mode_warning"] = 'Безпечний режим увімкнено. Функціонал менеджера обмежений.';

$_lang["confirm_block"] = 'Ви впевнені, що хочете заблокувати користувача?';
$_lang["confirm_delete_category"] = 'Ви впевнені, що хочете видалити цю категорію?';
$_lang["confirm_delete_eventlog"] = 'Ви впевнені, що хочете видалити протокол подій?';
$_lang["confirm_delete_file"] = 'Ви впевнені, що хочете видалити файл?\n\nЦе може викликати проблеми з роботою сайту. Видаляйте файл, тільки якщо ви на 100% впевнені, що робота сайту не постраждає.';
$_lang["confirm_delete_group"] = 'Ви впевнені, що хочете видалити цю групу?';
$_lang["confirm_delete_htmlsnippet"] = 'Ви впевнені, що хочете видалити цей чанк?';
$_lang["confirm_delete_keywords"] = 'Ви впевнені, що хочете видалити ці ключові слова?';
$_lang["confirm_delete_module"] = 'Ви впевнені, що хочете видалити цей модуль?';
$_lang["confirm_delete_plugin"] = 'Ви впевнені, що хочете видалити цей плагін?';
$_lang["confirm_delete_record"] = 'Ви впевнені, що хочете видалити ці записи?';
$_lang["confirm_delete_resource"] = 'Ви впевнені, що хочете видалити цей ресурс? \nВсі дочірні ресурси будуть також видалені.';
$_lang["confirm_delete_role"] = 'Ви впевнені, що хочете видалити цю роль?';
$_lang["confirm_delete_snippet"] = 'Ви впевнені, що хочете видалити цей сніпет?';
$_lang["confirm_delete_tags"] = 'Ви впевнені, що хочете видалити вибрані META-теги?';
$_lang["confirm_delete_template"] = 'Ви впевнені, що хочете видалити цей шаблон?';
$_lang["confirm_delete_tmplvars"] = 'Ви впевнені, що хочете видалити цей параметр (TV) і всі збережені в ньому дані?';
$_lang["confirm_delete_user"] = 'Ви впевнені, що хочете видалити цього користувача?';

$_lang["delete_yourself"] = 'Ви не можете видалити  самі себе';
$_lang["delete_last_admin"] = 'Ви не можете видалити останнього адміністратора';

$_lang["confirm_delete_permission"] = 'Ви впевнені, що бажаєте видалити це право доступу?';
$_lang["confirm_duplicate_record"] = 'Ви впевнені, що хочете зробити копію цього запису?';
$_lang["confirm_empty_trash"] = 'Видалити ВСІ помічені на видалення файли назавжди? \n\nПродовжити?';
$_lang["confirm_load_depends"] = 'Ви впевнені, що хочете завантажити панель Управління залежностями без збереження змін?';
$_lang["confirm_name_change"] = 'Зміна імені користувача може вплинути на роботу деяких доповнень системи EVO. \n\nВи впевнені, що хочете змінити ім\'я користувача?';
$_lang["confirm_publish"] = '\n\Публікація цього ресурсу зараз видалить всі встановлені розклади публікації. Якщо ви хочете встановити новий розклад або залишити старий - виберіть пункт \'Редагувати\'.\n\Продовжити?';
$_lang["confirm_remove_locks"] = 'Користувачі іноді закривають браузер в процесі редагування ресурсів, шаблонів, сніпетів і т.д., залишаючи їх заблокованими. Нажимаючи \'ОК\', ви видаляєте всі поточні блокування. \n\Прожовжити?';
$_lang["confirm_reset_sort_order"] = 'Ви впевнені, що хочете скинути \"sort order/index\" з усіх перерахованих елементів до 0?';
$_lang["confirm_resource_duplicate"] = 'Ви впевнені, що хочете зробити копію цього ресурсу? \nВсі дочірні ресурси будуть також скопійовані.';
$_lang["confirm_setting_language_change"] = 'Ви змінили значення за замовчуванням, виконані раніше виправлення будуть втрачені. Продовжити?';
$_lang["confirm_unblock"] = 'Ви впевнені, що хочете розблокувати цього користувача?';
$_lang["confirm_undelete"] = '\n\nВсі дочірні ресурси, видалені разом з цим ресурсом, будуть відновлені. Однак ресурси, видалені раніше, не будуть відновлені.';
$_lang["confirm_unpublish"] = '\n\nСкасування публікації цього ресурсу зараз видалить всі встановлені розкладу публікації. Якщо ви хочете встановити новий розклад або залишити старий - виберіть пункт \'Редагувати\'.\n\Продовжити?';
$_lang["confirm_unzip_file"] = 'Ви впевнені, що хочете розпакувати архів? \n\nІснуючі файли будуть перезаписані.';

$_lang["could_not_find_user"] = 'Не можу знайти користувача';

$_lang["create_folder_here"] = 'Дочірній контейнер';
$_lang["create_resource_here"] = 'Дочірній ресурс';
$_lang["create_resource_title"] = 'Створити ресурс';
$_lang["create_weblink_here"] = 'Дочірнє веб-посилання';
$_lang["createdon"] = 'Дата створення';
$_lang["create_new"] = 'Створити';

$_lang["credits"] = 'EVO використовує';
$_lang["credits_shouts_msg"] = '<p>EVO підтримується на сайті<a href="http://evo.im/" target="_blank">evo.im</a>.</p>';
$_lang["custom_contenttype_message"] = 'Тут ви можете додати типи вмісту (Content-Type) для сайту. Для цього введіть тип вмісту і натисніть \'Добавити\'.';
$_lang["custom_contenttype_title"] = 'Типи вмісту (Content-Type):';

$_lang["database_charset"] = 'Кодування бази даних';
$_lang["database_collation"] = 'Зіставлення бази даних';
$_lang["database_name"] = 'Ім\'я бази даних';
$_lang["database_overhead"] = '<b style="color:#990033;">Примітка:</b> \'перевитрата\' – це неиспользуемое, але зарезервоване MySQL простір. Щоб звільнити це місце, натисніть \'Перевитрата\' в таблиці (таблицях).';
$_lang["database_server"] = 'Сервер бази даних';
$_lang["database_table_clickbackup"] = ' створити і завантажити резервну копію обраних таблиць';
$_lang["database_table_clickhere"] = 'Натисніть тут,';
$_lang["database_table_datasize"] = 'Обсяг даних';
$_lang["database_table_droptablestatements"] = 'Включати в дамп інструкцію \'DROP TABLE\'';
$_lang["database_table_effectivesize"] = 'Займаний обсяг';
$_lang["database_table_indexsize"] = 'Обсяг індекса';
$_lang["database_table_overhead"] = 'Перевитрата';
$_lang["database_table_records"] = 'Записи';
$_lang["database_table_tablename"] = 'Назва таблиці';
$_lang["database_table_totals"] = 'Всього:';
$_lang["database_table_totalsize"] = 'Загальний обсяг';
$_lang["database_tables"] = 'Таблиці бази даних';
$_lang["database_version"] = 'Версія бази даних:';

$_lang["date"] = 'дата';
$_lang["datechanged"] = 'дата зміни';
$_lang["datepicker_offset"] = 'Зсув років: ';
$_lang["datepicker_offset_message"] = 'Число минулих років, яке буде показано у вікні вибору дати.';
$_lang["datetime_format"] = 'Формат дати:';
$_lang["datetime_format_message"] = 'Виберіть формат дати, який буде використаний в системі управління.';

$_lang["default"] = 'За замовчуванням:';
$_lang["defaultcache_message"] = 'Виберіть \'Так\', щоб нові ресурси після створення кешувалися за замовчуванням.';
$_lang["defaultcache_title"] = '\'Кешована\' за замовчуванням:';
$_lang["defaultmenuindex_message"] = 'Оберіть \'Так\', для автоматичного збільшення позиції в меню для нових ресурсів.';
$_lang["defaultmenuindex_title"] = '\'Індексація меню\' за замовчуванням:';
$_lang["defaultpublish_message"] = 'Оберіть \'Так\', щоб нові ресурси після створення публікувалися за замовчуванням.';
$_lang["defaultpublish_title"] = '\'Опублікувати\' за замовчуванням:';
$_lang["defaultsearch_message"] = 'Оберіть \'Так\', щоб нові ресурси після створення були доступні для пошуку за замовчуванням.';
$_lang["defaultsearch_title"] = '\'Доступний для пошуку\' за замовчуванням:';
$_lang["defaulttemplate_message"] = 'Оберіть шаблон, який буде застосовуватися до нових ресурсів за замовчуванням. При редагувань ресурсу ви можете встановити будь-який шаблон.';
$_lang["defaulttemplate_title"] = 'Шаблон за замовчуванням:';
$_lang["defaulttemplate_logic_title"] = 'Автоматичне призначення шаблону';
$_lang["defaulttemplate_logic_general_message"] = 'Шаблон, який призначається нових ресурсів:';
$_lang["defaulttemplate_logic_system_message"] = '<strong>Системний</strong>: такий же шаблон, як в системних налаштуваннях.';
$_lang["defaulttemplate_logic_parent_message"] = '<strong>Батьківський</strong>: такий же шаблон, як у батька (якщо ресурс в корені сайту, шаблон Системний).';
$_lang["defaulttemplate_logic_sibling_message"] = '<strong>Сусідній</strong>: такий же шаблон, як у сусідніх ресурсів в цьому контейнері (якщо сусідніх ресурсів немає, шаблон Батьківський).';

$_lang["delete"] = 'Видалити';
$_lang["delete_resource"] = 'Видалити';
$_lang["delete_tags"] = 'Видалити теги';
$_lang["deleting_file"] = 'Видаляється файл `%s`: ';
$_lang["description"] = 'Опис';
$_lang["deselect_keywords"] = 'Видалити ключові слова';
$_lang["deselect_metatags"] = 'Видалити META-теги';
$_lang["disabled"] = 'Відключений';
$_lang["doc_data_title"] = 'Обзор ресурса';
$_lang["documentation"] = 'Документація';

$_lang["duplicate"] = 'Зробити копію';
$_lang["duplicate_alias_found"] = 'Ресурс \'%s\' вже використовує псевдонім \'%s\'. Введіть унікальний псевдонім.';
$_lang["duplicate_template_alias_found"] = 'Шаблон\'%s\' вже використовує URL псевдонім \'%s\'. Введіть унікальний псевдонім.';
$_lang["duplicate_alias_message"] = 'Оберіть \'Так\', щоб дозволити повторення псевдонімів.<br /><b>Примітка:</b> цей параметр повинен використовуватися разом з активним з\'єднанням \'Використовувати вкладені URL\'.';
$_lang["duplicate_alias_title"] = 'Дозволити повторювані псевдоніми:';
$_lang["duplicate_name_found_general"] = 'Об\'єкт %s з ім\'ям  \'%s\' вже існує. Будь ласка, введіть інше ім\'я.';
$_lang["duplicate_name_found_module"] = 'Модуль з ім\'ям \'%s\' вже існує. Будь ласка, введіть інше ім\'я.';
$_lang["duplicated_el_suffix"] = 'Копія';

$_lang["edit"] = 'Редагувати';
$_lang["edit_resource"] = 'Редагувати';
$_lang["edit_resource_title"] = 'Редагувати ресурс';
$_lang["edit_settings"] = 'Конфігурація';
$_lang["editedon"] = 'Редагувати дату';
$_lang["editing_file"] = 'Редагований файл: ';
$_lang["editor_css_path_message"] = 'Введіть шлях до CSS-файлу, який ви хочете використовувати для редактора. Рекомендується вводити шлях від кореня сайту, наприклад: /assets/site/style.css. Якщо ви не хочете використовувати CSS-файл для редактора, залиште це поле порожнім.';
$_lang["editor_css_path_title"] = 'Шлях до CSS файлу:';

$_lang["email"] = 'E-mail';
$_lang["email_sent"] = 'Лист відправлено';
$_lang["email_unique"] = 'Цей Email вже використовуєтся';
$_lang["emailsender_message"] = 'Вкажіть адресу e-mail, яка буде відображена в листі підтвердження реєстрації в полі \'Від\'.';
$_lang["emailsender_title"] = 'Зворотна адреса e-mail:';
$_lang["emailsubject_default"] = 'Дані для авторизації';
$_lang["emailsubject_message"] = 'Вкажіть текст, який буде відображений в листі підтвердження реєстрації в поле \'Тема\'.';
$_lang["emailsubject_title"] = 'Тема листа підтвердження реєстрації:';

$_lang["empty_folder"] = 'Папка пуста';
$_lang["empty_recycle_bin"] = 'Очистити корзину';
$_lang["empty_recycle_bin_empty"] = 'Немає ресурсів, помічених на видалення.';
$_lang["enable_resource"] = 'Підключити файл елементів.';
$_lang["enable_sharedparams"] = 'Увімкнути \'загальні\' параметри';
$_lang["enable_sharedparams_msg"] = '<b>Примітка:</b> вищевказаний унікальний глобальний ідентифікатор (GUID) буде використаний для ідентифікації цього модуля і загальних параметрів. GUID також використовується для формування зв\'язку модуля, плагінів або фрагментів, які використовують його загальні параметри.';
$_lang["enabled"] = 'Включено';
$_lang["error"] = 'Помилка';
$_lang["error_sending_email"] = 'Помилка відправка e-mail';
$_lang["errorpage_message"] = 'Введіть ID ресурсу, який ви хочете використовувати як сторінку помилки (404 - ресурс не знайдений).<br /><b>Примітка:</b> переконайтеся, що цей ID належить існуючому ресурсу, і що цей ресурс опублікований';
$_lang["errorpage_title"] = 'Сторінка помилки \'404\':';
$_lang["event_id"] = 'ID події';
$_lang["eventlog"] = 'Протокол подій';
$_lang["eventlog_msg"] = 'Протокол подій використовується для відображення системних інформаційних повідомлень, попереджень і повідомлень про помилки. У колонці \'Код\' показаний розділ системи управління, де відбулася подія.';
$_lang["eventlog_viewer"] = 'Перегляд подій';
$_lang["everybody"] = 'Всім';
$_lang["existing_category"] = 'Існуючі категорії';
$_lang["expand_tree"] = 'Розкрити дерево';
$_lang["failed_login_message"] = 'Тут ви можете ввести кількість невдалих спроб входу в систему, які дозволені, перш ніж користувач буде заблокований.';
$_lang["failed_login_title"] = 'Ліміт невдалих спроб входу в систему:';
$_lang["fe_editor_lang_message"] = 'Оберіть мову редактора, який буде використовуватися під фронтенді.';
$_lang["fe_editor_lang_title"] = 'Мова фронтенд-редактора:';

$_lang["filemanager_path_message"] = 'Часто IIS неправильно виводить параметр document_root, який використовується файл-менеджером. Встановіть правильний шлях, щоб уникнути проблем з файл-менеджером.';
$_lang["filemanager_path_title"] = 'Шлях для файл-менеджера:';

$_lang["folder"] = 'Папка';
$_lang["forgot_password_email_fine_print"] = '\' Зазначена адреса стане недійсною, як тільки ви поміняєте пароль (або автоматично післязавтра).';
$_lang["forgot_password_email_instructions"] = 'Ви можете змінити свій пароль, редагуючи обліковий запис.';
$_lang["forgot_password_email_intro"] = 'Був зроблений запит на зміну пароля вашого профілю.';
$_lang["forgot_password_email_link"] = 'Натисніть тут для завершення процесу.';
$_lang["forgot_your_password"] = 'Забули свій пароль?';
$_lang["friendly_alias_message"] = 'Якщо сайт використовує дружні URL, і ресурс має псевдонім, то при включенні цього параметра URL ресурсу матиме вигляд: \'http://mysite.com/псевдонім\'. Якщо визначені суфікс (наприклад \'.html\') і / або префікс (наприклад \'page-\') дружніх URL, адреса сторінки буде наступний: \'http://mysite.com/page-псевдонім.html\'. Якщо не задані псевдоніми, суфікси і префікси, EVO згенерує такий URL: \'http://mysite.com/2\', де 2 - ID ресурса.';
$_lang["friendly_alias_title"] = 'Використовувати псевдоніми в URL:';
$_lang["friendlyurls_message"] = 'Даний параметр дозволяє дозволити використання дружніх URL на сайті. Пам\'ятайте, що дана можливість доступна лише тоді, коли ЄВО працює на сервері Apache з встановленим mod_rewrite; крім того, необхідно змінити файл .htaccess. Для інформації по докладним налаштувань подивіться файл .htaccess, що входить в дистрибутив EVO.';
$_lang["friendlyurls_title"] = 'Використовувати дружні URL:';
$_lang["friendlyurlsprefix_message"] = 'Тут ви можете вказати особливий префікс для дружніх URL. Наприклад, якщо в якості такого префікса ви вкажете слово \'page\', то URL типу /index.php?id=2 буде перетворений в /page2.html (в якості суфікса URL тут виступає \'.html\').';
$_lang["friendlyurlsprefix_title"] = 'Префікс для дружніх URL:';
$_lang["friendlyurlsuffix_message"] = 'Тут ви можете вказати суфікс для дружніх URL. Вказавши \'.html\', ви додасте .html до всіх дружніх URL.';
$_lang["friendlyurlsuffix_title"] = 'Суфікс для дружніх URL:';
$_lang["functionnotimpl"] = 'Уви';
$_lang["functionnotimpl_message"] = 'Ця функція не використовується цією версією EVO.';
$_lang["further_info"] = 'Детальна інформація';
$_lang["global_tabs"] = 'Глобальні вкладки';
$_lang["go"] = 'Перейти';
$_lang["group_access_permissions"] = 'Доступ груп користувачів';
$_lang['group_tvs'] = 'Групувати ТВ параметри';
$_lang["guid"] = 'GUID';
$_lang["help"] = 'Допомога';
$_lang["help_msg"] = '<p>Ви можете отримати безкоштовну Допомогу спільноти EVO <a href="http://modx.im" target="_blank">на форумах EVO</a>. Дивіться також <a href="http://docs.evolution-cms.com" target="_blank">\'Документація і уроки по EVO\'</a>, де докладно описано кожен аспект системи.</p>';
$_lang["help_title"] = 'Допомога';
$_lang["hide_tree"] = 'Сховати дерево';
$_lang["home"] = 'Головна';

$_lang["icon"] = 'Значок';
$_lang["icon_description"] = 'CSS клас';
$_lang["id"] = 'ID';
$_lang["illegal_parent_child"] = 'Зміна батьківського ресурсу: \n\n ресурс є дочірнім до вибраного.';
$_lang["illegal_parent_self"] = 'Зміна батьківського ресурсу: \n\n обраний ресурс не може бути присвоєний як батько самому собі.';
$_lang["images_management"] = 'Керування зображеннями';
$_lang["import_files_found"] = '<b>Знайдено %s ресурсів для імпорту...</b>';
$_lang["import_params"] = 'Імпортувати загальні параметри модуля';
$_lang["import_params_msg"] = 'Ви можете імпортувати параметри і установки модуля, вибравши його назву зі списку вгорі.<br /><b>Примітка:</b> для того, щоб модулі відображалися в меню, цей плагін / сніпет повинен бути однією з залежностей модуля і у модуля повинні бути включені загальні параметри.';
$_lang["import_parent_resource"] = 'Батьківський ресурс:';
$_lang["update_tree"] = 'Перестроїть дерево';
$_lang["update_tree_description"] = '<ul>
                   <li> - Closure table патерн проектування, що покращує та пришвидшує роботу з деревом документів </li>
                     <li> - Якщо дані в дереві оновлюються не через models, є вірогідність некоректного зв\'язку документів в базі
                     <li> - Ця операція виправляє проблему, коли site_content оновлюється не через модель (save, create) і зв\'язки  (Closure table) не оновлюються </li>
                     <li> - Також можливо виконати цю операцію в режимі CLI  командою \'php artisan closuretable: rebuild \' </li>
                     </ul>';
$_lang["update_tree_danger"] = 'Якщо маєте більш ніж 1000 ресурсів, краще виконати цю операцію в режимі CLI командою   \'php artisan closuretable: rebuild\'';
$_lang["update_tree_time"] = 'Перебудову дерева закінчено. Оброблено документів: <b>%s</b><br>Импорт виконано за  <b>%s</b> секунд.';
$_lang["info"] = 'Інформація';
$_lang["information"] = 'Інформація';
$_lang["inline"] = 'Відображення';
$_lang["insert"] = 'Вставити';
$_lang["maxImageWidth"] = 'Максимальна ширина зображення';
$_lang["maxImageHeight"] = 'Максимальна висота зображення';
$_lang["clientResize"] = 'Зміна розміру зображень на стороні клієнта';
$_lang["clientResize_message"] = 'Якщо включено, зображення будуть змінюватися браузером до завантаження на сервер';
$_lang["noThumbnailsRecreation"] = 'Створення ескізів тільки при завантаженні зображення';
$_lang["noThumbnailsRecreation_message"] = 'Файловий менеджер буде створювати ескізи тільки при завантаженні; якщо для деяких зображень немає ескізів, вони не будуть створені';
$_lang["thumbWidth"] = 'Максимальна ширина превью';
$_lang["thumbHeight"] = 'Максимальна висота превью';
$_lang["thumbsDir"] = 'Папка для хранения превью';
$_lang["jpegQuality"] = 'Ступінь стиснення JPEG';
$_lang["denyZipDownload"] = 'Заборонити скачування zip-архівів';
$_lang["denyExtensionRename"] = 'Заборонити перейменування розширень файлів';
$_lang["maxImageWidth_message"] = 'Якщо зображення ширше, ніж вказано, то воно буде зменшено. Вкажіть 0, щоб не змінювати ширину зображення при завантаженні.';
$_lang["maxImageHeight_message"] = 'Якщо зображення вище, ніж вказано, то воно буде зменшено. Вкажіть 0, щоб не змінювати висоту зображення при завантаженні.';
$_lang["thumbWidth_message"] = 'Максимальна ширина превью';
$_lang["thumbHeight_message"] = 'Максимальна висота превью';
$_lang["thumbsDir_message"] = 'Назва папки, в якій будуть зберігатися превью';
$_lang["jpegQuality_message"] = 'Ступінь стиснення зображень і превью JPEG-формату';
$_lang["showHiddenFiles"] = 'Показувати приховані файли';
$_lang["keyword"] = 'Ключове слово';
$_lang["keywords"] = 'Ключові слова';
$_lang["keywords_intro"] = 'Для редагування ключового слова просто введіть нове значення поряд з існуючим. Для видалення - поставте галочку в поле \'видалити\'.';
$_lang["language_message"] = 'Оберіть мову системи управління сайтом.';
$_lang["language_title"] = 'Мова системи управління:';
$_lang["last_update"] = 'Останні оновлення';
$_lang["launch_site"] = 'Запустити сайт';
$_lang["license"] = 'Ліцензія';
$_lang["link_attributes"] = 'Атрибути посилання';
$_lang["link_attributes_help"] = 'Тут ви можете ввести атрибути посилання для цієї сторінки, наприклад target=&quot;_blank&quot; або rel=&quot;external&quot;.';
$_lang["list_mode"] = 'Включити / виключити режим списку - використовується для виведення списку записів.';
$_lang["loading_doc_tree"] = 'Завантажується дерево сайту...';
$_lang["loading_menu"] = 'Завантажується меню...';
$_lang["loading_page"] = 'Будь ласка зачекайте...';
$_lang["localtime"] = 'Місцевий час';

$_lang["lock_htmlsnippet"] = 'Обмежити доступ до редагування чанка';
$_lang["lock_htmlsnippet_msg"] = 'Тільки адміністратори (ID ролі - 1) можуть редагувати цей чанк.';
$_lang["lock_module"] = 'Обмежити доступ до редагування модуля';
$_lang["lock_module_msg"] = 'Тільки адміністратори (ID ролі - 1) можуть редагувати цей модуль.';
$_lang["lock_msg"] = '%s зараз редагує %s. Будь ласка, зачекайте, поки інший користувач закінчить з редагуванням, і спробуйте знову.';
$_lang["lock_plugin"] = 'Обмежити доступ до редагування плагіна';
$_lang["lock_plugin_msg"] = 'Тільки адміністратори (ID ролі - 1) можуть редагувати цей плагін.';
$_lang["lock_settings_msg"] = '%s Зараз редагує системні установки. Будь ласка, зачекайте, поки інший користувач закінчить редагування, і спробуйте знову.';
$_lang["lock_snippet"] = 'Обмежити доступ до редагування сніпета';
$_lang["lock_snippet_msg"] = 'Тільки адміністратори (ID ролі - 1) можуть редагувати цей сніпет.';
$_lang["lock_template"] = 'Обмежити доступ до редагування шаблону';
$_lang["lock_template_msg"] = 'Тільки адміністратори (ID ролі - 1) можуть редагувати цей шаблон.';
$_lang["lock_tmplvars"] = 'Обмежити доступ до редагування параметра';
$_lang["lock_tmplvars_msg"] = 'Тільки адміністратори (ID ролі - 1) можуть редагувати цей параметр.';
$_lang["locked"] = 'Заблокований';

$_lang["login_allowed_days"] = 'Дозволені дні';
$_lang["login_allowed_days_message"] = 'Оберіть дні, в які цей користувач може входити.';
$_lang["login_allowed_ip"] = 'Дозволений IP-адрес';
$_lang["login_allowed_ip_message"] = 'Введіть IP-адресу, з якого дозволено заходити цьому користувачу.<br /><b>Примітка:</b> кілька IP-адрес розділяйте комами (,)';
$_lang["login_button"] = 'Увійти';
$_lang["login_cancelled_install_in_progress"] = 'В Даний момент виконується установка / оновлення сайту. <br />Спробуйте ще раз за пару хвилин!<br />';
$_lang["login_cancelled_site_was_updated"] = 'Процес установки / оновлення сайту завершено успішно. Покупцю доведеться авторизація в системі!<br />';
$_lang["login_captcha_message"] = 'Введіть код підтвердження. \n\n Якщо у вас виникли труднощі з прочитанням коду, натисніть на нього, щоб згенерувати новий варіант.';
$_lang["login_homepage"] = 'Сторінка успішної авторизації';
$_lang["login_homepage_message"] = 'Введіть ID ресурсу, який завантажиться після успішної авторизації користувача.<br /><b>Примітка:</b> переконайтеся, що цей ID належить існуючому ресурсу, що цей ресурс опублікований і що він доступний для даного користувача';
$_lang["login_message"] = 'Введіть ваше ім\'я користувача та пароль. Зверніть увагу - малі та великі літери розрізняються.';
$_lang["logo_slogan"] = 'Створюйте більше з меншими зусиллями - \n Система управління сайтом EVO';
$_lang["logout"] = 'Вийти';
$_lang["long_title"] = 'Розширений заголовок';

$_lang["manager"] = 'Менеджер';
$_lang["manager_lockout_message"] = 'В даний момент ви знаходитесь в режимі управління сайтом. Щоб закінчити сеанс адміністрування, натисніть кнопку \'Вийти\'. <p />Щоб перейти на головну або стартову сторінку, натисніть кнопку \'Додому\'.';
$_lang["manager_permissions"] = 'Права менеджерів';
$_lang["manager_theme"] = 'Шаблон системи управління:';
$_lang["manager_theme_message"] = 'Оберіть шаблон для системи управління.';
$_lang["manager_theme_mode"] = 'Схема кольорів:';
$_lang["manager_theme_mode1"] = 'все світле';
$_lang["manager_theme_mode2"] = 'шапка темна';
$_lang["manager_theme_mode3"] = 'шапка і дерево темні';
$_lang["manager_theme_mode4"] = 'все темне';
$_lang['manager_theme_mode_message'] = 'Цей параметр використовується як «за замовчуванням» і може бути перевизначений при перемикання режиму кольору теми в дереві документів: <i class="fa fa-lg fa-adjust"></i>';
$_lang['manager_theme_mode_title'] = 'Перемикач колірної гами';

$_lang["meta_keywords"] = 'Ключові слова';
$_lang["metatag_intro"] = 'На этой странице вы можете создавать/Редагувати/удалять META-теги. Чтобы привязать META-теги к ресурсам, нажмите на вкладку <u>Ключевые слова</u>, когда редактируете ресурс, и Оберіть нужные ключевые слова и META-теги. Для создания нового тега введите его имя и значение и нажмите \'Создать тэг\'. Для редактирования нажмите на название тега.';
$_lang["metatag_notice"] = 'Это <b>не полный</b> список возможных мета-тегов. Подробную информацию по использованию мета-тегов вы можете получить здесь: <a href="http://www.html-reference.com/META.asp" target="_blank">HTML Reference Guide</a>.';
$_lang["metatags"] = 'META-теги';
$_lang["mgr_access_permissions"] = 'Права доступу менеджерів';
$_lang["mgr_login_start"] = 'Авторизація менеджера сайту';
$_lang["mgr_login_start_message"] = 'Введіть ID ресурсу, який ви хочете послати користувачеві після авторизації в системі управління сайтом.<br /><b>Примітка:</b> переконайтеся в тому, що ID належить існуючому ресурсу, який опублікований і доступний цьому користувачеві';

$_lang["mgrlog_action"] = 'Дія:';
$_lang["mgrlog_actionid"] = 'ID дії:';
$_lang["mgrlog_anyall"] = 'Будь які / Всі';
$_lang["mgrlog_datecheckfalse"] = 'Функція checkdate() повернула значення false.';
$_lang["mgrlog_datefr"] = 'Починаючи з дати';
$_lang["mgrlog_dateinvalid"] = 'Помилковий формат дати.';
$_lang["mgrlog_dateto"] = 'Закінчуючи датою';
$_lang["mgrlog_emptysrch"] = 'За вашим запитом нічого не знайдено (немає записів, які відповідають заданим критеріям).';
$_lang["mgrlog_field"] = 'Поле';
$_lang["mgrlog_itemid"] = 'ID ресурсу';
$_lang["mgrlog_itemname"] = 'Назва ресурсу';
$_lang["mgrlog_msg"] = 'Повідомлення';
$_lang["mgrlog_noquery"] = 'Ви не ввели запит. Вкажіть критерії запиту.';
$_lang["mgrlog_qresults"] = 'Результати запиту';
$_lang["mgrlog_query"] = 'Протокол запитів до бази';
$_lang["mgrlog_query_msg"] = 'Будь ласка, задайте критерії Перегляд записів.</p><p><b>Увага:</b> вказаний діапазон дат не включає результати за дату, зазначену в поле \'Закінчуючи датою\'. Наприклад, щоб зробити вибірку за 03-12-2009, вкажіть в полі \'Починаючи з дати\' значення 03-12-2009, а в поле \'Закінчуючи датою\' - значення 03-12-2009.</p><p>Повідомлення і дія зазвичай однакові. Якщо ви хочете знайти якесь конкретне повідомлення, зазвичай найкраще встановити дію \'Будь-яке / Всі\'.';
$_lang["mgrlog_results"] = 'Відображати результати частинами по';
$_lang["mgrlog_searchlogs"] = 'Знайти записи протоколу';
$_lang["mgrlog_sortinst"] = 'Ви можете впорядкувати таблицю, вибравши мишею заголовок будь-колонки. Якщо записів стане занадто багато, ви можете <a href="index.php?a=55">очистити протокол</a>. <i>УВАГА: це призведе до видалення всіх записів протоколу по сьогоднішній момент!</i>';
$_lang["mgrlog_time"] = 'Час';
$_lang["mgrlog_user"] = 'Користувач';
$_lang["mgrlog_username"] = 'І\'мя користувача';
$_lang["mgrlog_value"] = 'ЗНачення';
$_lang["mgrlog_view"] = 'Перегляд записів протоколу системи управління сайтом';

$_lang["modx_news"] = 'Новини EVO';
$_lang["modx_news_tab"] = 'Новини EVO';
$_lang["modx_news_title"] = 'Новини EVO';
$_lang["modx_security_notices"] = 'Повідомлення безпеки EVO';
$_lang["modx_version"] = 'Версія EVO';

$_lang["name"] = 'Назва';

$_lang["no"] = 'Ні';
$_lang["no_active_users_found"] = 'Не знайдено активних користувачів.';
$_lang["no_activity_message"] = 'Ви не створили або не відредагували жодного ресурсу.';
$_lang["no_category"] = 'Без категорії';
$_lang["no_docs_pending_publishing"] = 'Немає ресурсів, які очікують публікації.';
$_lang["no_docs_pending_pubunpub"] = 'Події не знайдені.';
$_lang["no_docs_pending_unpublishing"] = 'Немає ресурсів, які очікують скасування публікації.';
$_lang["no_edits_creates"] = 'Створених або відредагованих ресурсів не виявлено.';
$_lang["no_groups_found"] = 'Груп не знайдено.';
$_lang["no_keywords_found"] = 'Ключових слів немає.';
$_lang["no_records_found"] = 'Не знайдено записів.';
$_lang["no_results"] = 'Нічого не знайдено';
$_lang["nologentries_message"] = 'Виберіть кількість записів протоколу на сторінці при його перегляді.';
$_lang["nologentries_title"] = 'Кількість записів протоколу:';
$_lang["none"] = 'Нічого';
$_lang["noresults_message"] = 'Введіть кількість елементів, що відображаються в списках і результатах пошуку.';
$_lang["noresults_title"] = 'Кількість результатів:';
$_lang["not_deleted"] = 'не видалений.';
$_lang["not_set"] = 'нема даних';

$_lang["offline"] = 'Оффлайн';

$_lang["online"] = 'Онлайн';
$_lang["onlineusers_action"] = 'Дія';
$_lang["onlineusers_actionid"] = 'ID дія';
$_lang["onlineusers_ipaddress"] = 'IP-адреса відвідувача сайту';
$_lang["onlineusers_lasthit"] = 'Момент останньої дії';
$_lang["onlineusers_message"] = 'Цей список показує всіх користувачів, активних за останні 20 хвилин (поточний час - ';
$_lang["onlineusers_title"] = 'Користувачі онлайн';
$_lang["onlineusers_user"] = 'Користувач';
$_lang["onlineusers_userid"] = 'ID користувача';

$_lang["optimize_table"] = 'Натисніть для оптимізації таблиці';

$_lang["page_data_alias"] = 'Псевдонім';
$_lang["page_data_cacheable"] = 'Кешований';
$_lang["page_data_cacheable_help"] = 'Відзначте для того, щоб дозволити кешування ресурсу. Будьте уважні в тому випадку, якщо ресурс містить виклики сніпетів - можливо, краще скасувати кешування.';
$_lang["page_data_cached"] = '<b>Код взятий з кешу:</b>';
$_lang["page_data_changes"] = 'Створення та зміна';
$_lang["page_data_contentType"] = 'Тип вмісту';
$_lang["page_data_contentType_help"] = 'Виберіть тип вмісту для ресурсу. Якщо ви не впевнені в тому, який тип даних повинен бути у ресурсу, залиште text / html.';
$_lang["page_data_created"] = 'Створено';
$_lang["page_data_edited"] = 'Редагувався';
$_lang["page_data_editor"] = 'Використовувати HTML-редактор';
$_lang["page_data_folder"] = 'Ресурс є контейнером';
$_lang["page_data_general"] = 'Загальні';
$_lang["page_data_markup"] = 'Розмітка/структура';
$_lang["page_data_mgr_access"] = 'Менеджерський доступ';
$_lang["page_data_notcached"] = 'Ресурс ще не кешувався.';
$_lang["page_data_publishdate"] = 'Дата публикації';
$_lang["page_data_publishdate_help"] = 'Якщо ви встановите дату публікації, ресурс буде опублікований після настання цієї дати. Натисніть на значок календаря, щоб вибрати дату, або на значок поруч, щоб видалити дату публікації. Це буде означати, що ресурс не буде опубліковано автоматично.';
$_lang["page_data_published"] = 'Опублікований';
$_lang["page_data_searchable"] = 'Доступний для пошуку';
$_lang["page_data_searchable_help"] = 'Відзначте для того, щоб дозволити пошук у вмісті цього ресурсу (внутрішньої пошуковою машиною). Цей параметр можна також використовувати в розробці фрагментів.';
$_lang["page_data_source"] = 'Код';
$_lang["page_data_status"] = 'Статус';
$_lang["page_data_template"] = 'Шаблон';
$_lang["page_data_template_help"] = 'Тут ви можете вказати, який шаблон повинен використовувати ресурс. Виберіть (blank), якщо хочете, щоб ресурс не використовував ніяких шаблонів (рекомендується для порожніх ресурсів, що виконують тільки роль контейнера).';
$_lang["page_data_title"] = 'Дані ресурса (сторінки)';
$_lang["page_data_unpublishdate"] = 'Дата скасування публікації';
$_lang["page_data_unpublishdate_help"] = 'Якщо ви встановите дату скасування публікації, ресурс буде знятий з публікації по настанню цієї дати. Натисніть на значок календаря, щоб вибрати дату, або на значок поруч, щоб видалити дату скасування публікації. Це буде означати, що ресурс не буде знятий з публікації автоматично.';
$_lang["page_data_unpublished"] = 'Не опублікований';
$_lang["page_data_web_access"] = 'Веб-доступ';

$_lang["pagetitle"] = 'Тема ресурсу';
$_lang["pagination_table_first"] = 'Перший';
$_lang["pagination_table_gotopage"] = 'Перейти на';
$_lang["pagination_table_last"] = 'Останній';
$_lang["paging_first"] = 'В початок';
$_lang["paging_last"] = 'В кінець';
$_lang["paging_next"] = 'Дальше';
$_lang["paging_prev"] = 'Назад';
$_lang["paging_showing"] = 'Відображувати всю інформацію з';
$_lang["paging_to"] = 'по';
$_lang["paging_total"] = 'всього';
$_lang["parameter"] = 'Параметр';
$_lang["parse_docblock"] = 'Аналізувати DocBlock';
$_lang["parse_docblock_msg"] = 'Увага (!): <b> Скидання </b> актуального імені, конфігурації, опису та категорії для установки дефолту шляхом аналізу вихідного коду.';

$_lang["password"] = 'Пароль';
$_lang["password_change_request"] = 'Запит на зміну пароля';
$_lang["password_confirmed"] = 'Паролі не співпадають';
$_lang["password_gen_gen"] = 'Дозволити EVO згенерувати пароль.';
$_lang["password_gen_length"] = 'Пароль повинен містити не менше 6 символів.';
$_lang["password_gen_method"] = 'Спосіб задання нового пароля';
$_lang["password_gen_specify"] = 'Я сам задам пароль:';
$_lang["password_method"] = 'Спосіб повідомлення про новий пароль';
$_lang["password_method_email"] = 'Надіслати новий пароль по e-mail.';
$_lang["password_method_screen"] = 'Показати новий пароль на екрані.';
$_lang["password_msg"] = 'Для користувача <b>:username</b> заданий новий пароль - <b>:password</b><br>';

$_lang["php_version_check"] = 'Система EVO працює з PHP версії 7.4 або вище. Будь ласка, поновіть PHP';

$_lang["preview"] = 'Перегляд';
$_lang["preview_msg"] = 'Перегляд останніх змін. <a href="javascript:;" onclick="saveRefreshPreview();">Зберегти і оновити</a> останні зміни';
$_lang["preview_resource"] = 'Перегляд';

$_lang["private"] = 'Особистий';
$_lang["public"] = 'Доступний для всіх';
$_lang["publish_date"] = 'Дата публікації';
$_lang["publish_events"] = 'Події, зв\'язані з публікацією ресурсів.';
$_lang["publish_resource"] = 'Опублікувати';

$_lang["rb_base_dir_message"] = 'Введіть фізичний шлях до папки файлів. Зазвичай цей шлях встановлюється автоматично. Якщо ви використовуєте сервер IIS, цього може і не статися. У такому випадку введіть шлях, як він відображається в адресному рядку Internet Explorer. <br/> <b> Примітка: </b> для коректної роботи браузера папка файлів повинна містити вкладені папки: images, files, flash і media.';
$_lang["rb_base_dir_title"] = 'Шлях до файлів:';
$_lang["rb_base_url_message"] = 'Введіть адресу (URL) папки файлів. Зазвичай цей шлях встановлюється автоматично. Якщо ви використовуєте сервер IIS, цього може і не статися. У такому випадку введіть шлях, як він відображається в Internet Explorer.';
$_lang["rb_base_url_title"] = 'URL до файлів:';
$_lang["rb_message"] = 'Виберіть \ `Так \', щоб включити браузер файлів. Це дозволить менеджерам завантажувати файли (зображення, медіа-файли) на сервер.';
$_lang["rb_title"] = 'Включити файл-менеджер:';
$_lang["rb_webuser_message"] = 'Чи хочете ви, щоб веб-користувачі використовували файл-менеджер? <B> Попередження: </b> Дозволяючи веб-користувачам використовувати файл-менеджер, ви робите доступ для всіх файлів, які доступні менеджерам. Використовуйте цей параметр тільки для перевірених веб-користувачів.';
$_lang["rb_webuser_title"] = 'Користувачі?';
$_lang["recent_docs"] = 'Останні зміни';
$_lang["recommend_setting_change_title"] = 'Рекомендована зміна настройки';
$_lang["recommend_setting_change_description"] = 'Ваш сайт не налаштований на перевірку серверних заголовків HTTP_REFERER у вхідних запитах в систему управління. Ми настійно рекомендуємо включити цей параметр, щоб знизити ризик CSRF (Cross Site Request Forgery - підробка міжсайтових запитів) атак.';
$_lang["references"] = 'Рекомендації';
$_lang["refresh_cache"] = 'Кеш: знайдено <b>%s</b> файлів в папці кешування і видалено <b>%d</b> кеш-файлів.<p>Нові кеш-файли будуть створені при запитах сторінок.';
$_lang["refresh_published"] = '<b>%s</b> ресурсів опубліковано.';
$_lang["refresh_site"] = 'Очистити кеш';
$_lang["refresh_title"] = 'Оновити сайт';
$_lang["refresh_tree"] = 'Оновити дерево';
$_lang["refresh_unpublished"] = '<b>%s</b> ресурсів знято з публикації.';
$_lang["release_date"] = 'Дата випуска';
$_lang["remember_last_tab"] = 'Запам`ятовувати вкладки';
$_lang["remember_last_tab_message"] = 'Відкривається не перша вкладка, а використовувана при останньому відвідуванні';
$_lang["remember_username"] = 'Запам`ятати мене';
$_lang["remove"] = 'Видалити';
$_lang["remove_date"] = 'Видалити дату';
$_lang["remove_locks"] = 'Видалити блокування';
$_lang["rename"] = 'Перейменувати';
$_lang["reports"] = 'Звіти';
$_lang["report_issues"] = 'Повідомити про проблеми';
$_lang["required_field"] = 'Поле :field є обов\'язковим';
$_lang["require_tagname"] = 'Назва тега обов\'язково';
$_lang["require_tagvalue"] = 'Значення тега обов\'язково';
$_lang["reserved_name_warning"] = 'Ви використовували зарезервоване ім\'я.';
$_lang["reset"] = 'Скидання';
$_lang["reset_failedlogins"] = 'скидання';
$_lang["reset_sort_order"] = 'Скидання сортування';

$_lang["manager_access_permissions"] = 'Права доступу менеджера';
$_lang["manage_groups"] = 'Керування документами та групами користувачів';
$_lang["manage_document_permissions"] = 'Керування правами доступу до документів';
$_lang["manage_module_permissions"] = 'Керування правами доступу до модулів';
$_lang["manage_tv_permissions"] = 'Керування правами доступу до TV-параметрів';

$_lang["rss_url_news_default"] = 'https://github.com/evocms-community/evolution/releases.atom';
$_lang["rss_url_news_message"] = 'Введіть адресу (URL) RSS-смужки новин EVO.';
$_lang["rss_url_news_title"] = 'Смужка RSS новин';
$_lang["rss_url_security_default"] = 'https://github.com/extras-evolution/security-fix/releases.atom';
$_lang["rss_url_security_message"] = 'Введіть адресу (URL) RSS-стрічки безпеки EVO.';
$_lang["rss_url_security_title"] = 'Смужка RSS безпеки';

$_lang["run_module"] = 'Запуск модуля';
$_lang["save"] = 'Зберегти';
$_lang["save_all_changes"] = 'Зберегти зміни';
$_lang["save_tag"] = 'Зберегти тег';
$_lang["saving"] = 'Збереження ресурса, зачекайте будь ласка...';

$_lang["search"] = 'Пошук';
$_lang["search_criteria"] = 'Критерій пошука';
$_lang["search_criteria_content"] = 'Шукати у вмісті';
$_lang["search_criteria_content_msg"] = 'Знайти всі ресурси, що містять введений текст в своєму тілі.';
$_lang["search_criteria_id"] = 'Шукати по ID';
$_lang["search_criteria_id_msg"] = 'Введіть ID ресурсу, щоб швидко знайти його.';
$_lang["search_criteria_top"] = 'Шукати по основних полях';
$_lang["search_criteria_top_msg"] = 'Заголовок, Розширений заголовок, Псевдонім, ID';
$_lang["search_criteria_template_id"] = 'Шукати по ID шаблона';
$_lang["search_criteria_template_id_msg"] = 'Найти все документы использующие указанный шаблон.';
$_lang["search_criteria_url_msg"] = 'Найти ресурс по полному URL или ID.';
$_lang["search_criteria_longtitle"] = 'Шукати в розширених заголовках';
$_lang["search_criteria_longtitle_msg"] = 'Знайти всі ресурси, що містять текст в розширених заголовках.';
$_lang["search_criteria_title"] = 'Шукати в заголовках';
$_lang["search_criteria_title_msg"] = 'Знайти всі ресурси, що містять введений текст в заголовку.';
$_lang["search_empty"] = 'За вашим запитом нічого не знайдено. Спробуйте розширити критерій пошуку.';
$_lang["search_item_deleted"] = 'Вилучено';
$_lang["search_results"] = 'Результати пошуку';
$_lang["search_results_returned_desc"] = 'Опис';
$_lang["search_results_returned_id"] = 'ID';
$_lang["search_results_returned_msg"] = 'За Вашими критеріями пошуку знайдено <b>%s</b> ресурсів. Якщо їх занадто багато - спробуйте задати детальніший запит.';
$_lang["search_results_returned_title"] = 'Заголовок';
$_lang["search_view_docdata"] = 'Переглянути';

$_lang["security"] = 'Менеджери';
$_lang["security_notices_tab"] = 'Повідомлення про безпеку';
$_lang["security_notices_title"] = 'Повідомлення про безпеку';

$_lang["select_date"] = 'Вибрати дату';
$_lang["send"] = 'Відправити';
$_lang["server_protocol_http"] = 'http';
$_lang["server_protocol_https"] = 'https';
$_lang["server_protocol_message"] = 'Якщо ваш сайт використовує https-з\'єднання, вкажіть це тут.';
$_lang["server_protocol_title"] = 'Тип сервера:';
$_lang["serveroffset"] = 'Поправка до часу на сервері';
$_lang["serveroffset_message"] = 'Виберіть поправку (кількість годин) між часом на місці вашого перебування та на місці знаходження сервера. Поточний час на сервері - <b>[%s]</b>, поточний час на сервері з урахуванням часової поправки - <b>[%s]</b>.';
$_lang["serveroffset_title"] = 'Різниця в часі:';
$_lang["servertime"] = 'Час на сервері';
$_lang["set_automatic"] = 'Автоматично';
$_lang["set_default"] = 'За замовчуванням';
$_lang["set_default_all"] = 'Все за замовчуванням';

$_lang["settings_after_install"] = 'Так як ви тільки що встановили систему, слід задати основні параметри. Внесіть бажані зміни і натисніть \'Зберегти\' для вступу змін в силу.<br /><br />';
$_lang["settings_config"] = 'Конфігурація';
$_lang["settings_dependencies"] = 'Залежності';
$_lang["settings_events"] = 'Системні події';
$_lang["settings_furls"] = 'Дружні URL';
$_lang["settings_general"] = 'Загальні';
$_lang["settings_group_tv_message"] = 'Виберіть тип угруповання ТВ параметрів при редагуванні документа.';
$_lang["settings_group_tv_options"] = 'Ні, Секціями на вкладці Загальні, Табами на вкладці Загальні, Секціями на новій вкладці, Табами на новій вкладці, На нових вкладках';
$_lang["settings_misc"] = 'Файл-менеджер';
$_lang["settings_security"] = 'Безпека';
$_lang["settings_KC"] = 'Файл-браузер';
$_lang["settings_page_settings"] = 'Налаштування сторінки';
$_lang["settings_photo"] = 'Фото';
$_lang["settings_properties"] = 'Властивості';
$_lang["settings_site"] = 'Сайт';
$_lang["settings_strip_image_paths_message"] = 'Якщо встановлено значення \'Ні\', EVO буде використовувати абсолютні посилання для зображень, файлів, анімація і тому подібного. Відносні посилання зручніше, якщо ви в майбутньому збираєтеся перемістити свій сайт, наприклад, з тестового сервера на кінцевий. Якщо ви не знаєте, про що мова, залиште значення \'Так\'.';
$_lang["settings_strip_image_paths_title"] = 'Переписывать пути для браузера?';
$_lang["settings_templvars"] = 'Параметри (TV)';
$_lang["settings_title"] = 'Системна конфігурація';
$_lang["settings_ui"] = 'Інтерфейс і представлення';
$_lang["settings_users"] = 'Користувачі';
$_lang["settings_email_templates"] = 'Email та шаблони';

$_lang["show_fullscreen_btn_message"] = 'Показувати на головному меню кнопку "На весь екран"';
$_lang["show_newresource_btn_message"] = 'Показувати на головному меню кнопку "Новий ресурс"';
$_lang["settings_show_picker_message"] = 'Налаштувати тему панелі адміністрування і зберегти в localstorage';
$_lang["show_fullscreen_btn"] = 'Кнопка "На весь екран"';
$_lang["show_newresource_btn"] = 'Кнопка "Новий ресурс"';

$_lang["show_meta"] = 'Показувати вкладку з META-тегами і ключовими словами';
$_lang["show_meta_message"] = 'Показувати не рекомендовану вкладку з META-тегами і ключовими словами при редагуванні ресурсів.';
$_lang["show_tree"] = 'Показати дерево';
$_lang["show_picker"] = 'Показати перемикач кольору';
$_lang["showing"] = 'Показано';
$_lang["signupemail_message"] = 'Тут ви можете створити повідомлення, яке надсилатиметься менеджерам, коли створюється обліковий запис нового менеджера. Лист повинен містити ім\'я користувача та пароль.<br /><b>Примітка:</b> наступні \'поля виводу\' відобразять відповідні дані при відправленні листа: <br /><br />[+sname+] - назва сайта, <br />[+saddr+] - e-mail адреса сайта, <br />[+surl+] - адреса (URL) сайта, <br />[+uid+] – ім\'я користувача або id користувача, <br />[+pwd+] - пароль користувача, <br />[+ufn+] - повне ім\'я користувача. <br /><br /><b>Переконайтеся, що в повідомленні присутні поля [+uid+] і [+pwd+], інакше користувач не дізнається свої ім\'я користувача та пароль</b>';
$_lang["signupemail_title"] = 'Реєстрація менеджера:';
$_lang["site"] = 'Сайт';
$_lang["site_schedule"] = 'Розклад сайту';
$_lang["sitename_message"] = 'Введіть заголовок вашого сайту.';
$_lang["sitename_title"] = 'Заголовок сайту:';
$_lang["sitestart_message"] = 'Введіть ID ресурсу, який ви хочете використовувати як стартову (домашню) сторінку.<br /><b>Примітка:</b> переконайтеся, що цей ID належить існуючому ресурсу, і що цей ресурс опублікований';
$_lang["sitestart_title"] = 'Перша сторінка:';
$_lang["sitestatus_message"] = 'Оберіть \'Онлайн\' для опублікування вашого сайту. Якщо ви виберете \'Оффлайн\', відвідувачі сайту побачать повідомлення про недоступність сайту і не зможуть переглянити сам сайт.';
$_lang["sitestatus_title"] = 'Статус сайта:';
$_lang["siteunavailable_message"] = 'Повідомлення, виведене в разі недоступності сайту (коли обраний статус \'Оффлайн\') або в разі виникнення помилки.<br /><b>Примітка:</b> це повідомлення виводиться тільки в тому випадку, коли не вибрана сторінка \'Сайт недоступний\'.';
$_lang["siteunavailable_message_default"] = 'В даний час сайт недоступний.';
$_lang["siteunavailable_page_message"] = 'Введіть ID ресурсу, який повинні будуть побачити відвідувачі, якщо спробують зайти на сайт, коли він недоступний.<br /><b>Примітка:</b> переконайтеся, що цей ID належить існуючому ресурсу, і що цей ресурс опублікований';
$_lang["siteunavailable_page_title"] = 'Сторінка  \'Сайт недоступний\':';
$_lang["siteunavailable_title"] = 'Повідомлення про недоступність сайту:';
$_lang["controller_namespace"] = 'Controller Namespace';
$_lang["controller_namespace_message"] = 'Вкажіть повний Namespace звідки треба брати контролери, наприклад: <b>EvolutionCMS\\Main\\Controllers\\</b>';
$_lang["update_repository"] = 'Шлях до репозиторію GitHub';
$_lang["update_repository_message"] = 'Введіть шлях до репозиторію GitHub, наприклад: <b>evocms-community/evolution</b>';

$_lang["sort_alphabetically"] = 'Сортувати за алфавітом';
$_lang["sort_asc"] = 'Зростання';
$_lang["sort_desc"] = 'По спаданню';
$_lang["sort_menuindex"] = 'Сортувати по позиції в меню';
$_lang["sort_tree"] = 'Сортувати дерево';
$_lang['sort_updating'] = 'Оновлення ...';
$_lang['sort_updated'] = 'Оновлено!';
$_lang['sort_nochildren'] = 'Документ не містить дочірніх документів';
$_lang["sort_elements_msg"] = 'Перетягніть, щоб змінити порядок обраних елементів.';

$_lang["source"] = 'Код';
$_lang["stay"] = 'Продовжити';
$_lang["stay_new"] = 'Створити новий';
$_lang["submit"] = 'Виконати';
$_lang["sys_alert"] = 'Системне попередження';
$_lang["sysinfo_activity_message"] = 'Цей список показує останні створені / відредаговані ресурси.';
$_lang["sysinfo_userid"] = 'Користувач';
$_lang["system"] = 'Службове';
$_lang["system_email_signup"] = 'Привіт, [+uid+]!

Ваші дані для авторизації в системі управління сайтом [+sname+]:

Ім\'я користувача: [+uid+]
Пароль: [+pwd+]

Після успішної авторизації в системі управління сайтом ([+surl+]), ви зможете змінити свій пароль.

З повагою, Адміністрація';
$_lang["system_email_webreminder"] = 'Доброго дня, [+uid+]!

Щоб активувати ваш новий пароль, перейдіть за наступним посиланням:

[+surl+]

Пізніше ви зможете використовувати наступний пароль для авторизації: [+pwd+]

Якщо цей лист прийшло до вас помилково, будь ласка, ігноруйте його.

З повагою, Адміністрація';
$_lang["system_email_websignup"] = 'Доброго дня, [+uid+]!

Ваші дані для авторизації на [+sname+]:

Ім\'я користувача: [+uid+]
Пароль: [+pwd+]

Після успішної авторизації на [+sname+] ([+surl+]), ви зможете змінити свій пароль.

З повагою, Адміністрація';
$_lang["table_hoverinfo"] = 'Затримайте вказівник над рядком таблиці, щоб побачити коротке пояснення призначення таблиці (коментарі є не у всіх таблиць).';
$_lang["table_prefix"] = 'Префікс таблиць бази даних';
$_lang["tag"] = 'Тег';

$_lang["to"] = 'до';
$_lang["toggle_fullscreen"] = 'Розгорнути на весь екран';
$_lang["tools"] = 'Інструменти';
$_lang["top_howmany_message"] = 'Кількість кращих показників в звітах статистики. наприклад, \'10 найпопулярніших...\'';
$_lang["top_howmany_title"] = 'Кількість найкращих показників:';
$_lang["total"] = 'всього';
$_lang["track_visitors_message"] = 'Надає дані для плагіна аналітики, наприклад, прапорець, що визначає, чи враховувати перегляди конкретного ресурсу.';
$_lang["track_visitors_title"] = 'Показувати дочірні ресурси';
$_lang["tree_page_click"] = 'Режим клацання мишею на ресурсі';
$_lang["tree_page_click_message"] = 'Дія за замовчуванням при натисканні мишею на ресурсі в дереві сайту.';
$_lang["use_breadcrumbs"] = 'Показати навігацію';
$_lang["use_breadcrumbs_message"] = 'Показувати навігацію, при створенні або редагуванні ресурсу';
$_lang["tree_show_protected"] = 'Показувати захищені ресурси в дереві сайту:';
$_lang["tree_show_protected_message"] = 'Якщо включено \'Ні\', то захищені ресурси (включаючи їх дочірні ресурси) не показуються в дереві сайту.';
$_lang["truncate_table"] = 'Натисніть для усічення таблиці (TRUNCATE)';
$_lang["type"] = 'Тип';
$_lang["udperms_allowroot_message"] = 'Дозволити користувачам створювати ресурси в кореневій папці.';
$_lang["udperms_allowroot_title"] = 'Дозволити доступ до кореневої папки:';
$_lang["udperms_message"] = 'Права доступу дозволяють вам визначити, які сторінки можуть редагувати користувачі. Для цього необхідно, щоб користувачі належали до групи користувачів, а ресурси до групи ресурсів, і далі ви можете вибрати, які групи ресурсів може редагувати та чи інша група користувачів. При першому включенні цієї функції редагувати ресурси можуть тільки менеджери.';
$_lang["udperms_title"] = 'Використовувати права доступу:';
$_lang["unable_set_link"] = 'Неможливо встановити посилання';
$_lang["unable_set_parent"] = 'Неможливо встановити новий батьківський ресурс';
$_lang["unauthorizedpage_message"] = 'Введіть ID ресурсу, який повинні будуть побачити відвідувачі, якщо спробують зайти на закриту сторінку (403 - доступ заборонений). <br /> <b> Примітка: </b> переконайтеся, що цей ID належить існуючому ресурсу, і що цей ресурс опублікований';
$_lang["unauthorizedpage_title"] = 'Сторінка \'Доступ заборонено\':';
$_lang["unblock_message"] = 'Після збереження користувач буде розблокован.';
$_lang["undelete_resource"] = 'Відновити';
$_lang["unpublish_date"] = 'Дата скасування публікації';
$_lang["unpublish_events"] = 'Події, пов\'язані зі скасуванням публікації ресурсів.';
$_lang["unpublish_resource"] = 'Скасувати публікацію';
$_lang["untitled_resource"] = 'Новий ресурс';
$_lang["untitled_weblink"] = 'Нове веб-посилання';
$_lang["update_params"] = 'Оновити параметри';
$_lang["update_settings_from_language"] = 'Змінити на:';

$_lang["upload_maxsize_message"] = 'Задайте максимальний розмір файлів. Значення має бути в байтах. <br /> <b> Примітка: </b> великі файли завантажуються, як правило, ДУЖЕ довго';
$_lang["upload_maxsize_title"] = 'Максимальний розмір завантаження:';
$_lang["uploadable_files_message"] = 'Тут ви можете вказати, які типи файлів можуть бути завантажені на сервер через файл-менеджер. Задайте список розширень через кому.';
$_lang["uploadable_files_title"] = 'Дозволені до завантаження файли:';
$_lang["uploadable_flash_message"] = 'Тут ви можете ввести список файлів, які можуть бути завантажені в \'assets/flash/\' за допомогою файл-менеджера. Введіть розширення дозволених типів флеш-файлів, розділяючи їх комами.';
$_lang["uploadable_flash_title"] = 'Дозволені до завантаження flash-файли:';
$_lang["uploadable_images_message"] = 'Тут ви можете ввести список файлів, які можуть бути завантажені в \'assets/images/\' за допомогою файл-менеджера. Введіть розширення дозволених типів графічних файлів, розділяючи їх комами.';
$_lang["uploadable_images_title"] = 'Дозволені до завантаження зображення:';
$_lang["uploadable_media_message"] = 'Тут ви можете ввести список файлів, які можуть бути завантажені в \'assets/media/\' за допомогою файл-менеджера. Введіть розширення дозволених типів медіа-файлів, розділяючи їх комами.';
$_lang["uploadable_media_title"] = 'Дозволені до завантаження медіа-файли:';
$_lang["use_alias_path_message"] = 'Включивши цю функцію, ви отримаєте вкладену структуру URL. Наприклад, якщо дочірній ресурс називається \'дочірній\', а батьківський ресурс називається \'батьківський\', ми отримаємо URL такого типу: http://example.com/батьківський/дочірній. <br /> <b> Увага: < / b> якщо ця функція активована, переконайтеся, що всі шляхи до зображень, css, java-скриптів мають шлях типу \'/assets/images/...\', а не \'assets/images/...\', або ви завжди можете використовувати приставку [(site_url)] для правильного розуміння сервером шляху, наприклад, \'[(site_url)]assets/images/...\'. Також можна використовувати HTML-тег &lt;base href=\'[(site_url)]\' &gt; в HEAD-секції <i> кожної </i> сторінки сайту, тоді всі відносні шляхи будуть працювати правильно.';
$_lang["use_alias_path_title"] = 'Використовувати вкладені URL:';
$_lang["use_editor_message"] = 'Хочете використовувати HTML-редактор? Якщо ви звикли писати HTML-теги вручну, вимкніть цю функцію. Майте на увазі, що це налаштування застосовується до всіх ресурсів для всіх менеджерів';
$_lang["use_editor_title"] = 'Використовувати HTML-редактор:';
$_lang["use_global_tabs"] = 'Використовувати глобальні вкладки';

$_lang["valid_hostnames_message"] = 'Допомагає запобігти XSS уразливості в системній налаштування site_url надаючи розділений комами список доступних імен хостів для цієї установки. Це важливо для деяких типів шаред-хостингів або хостів, що доступни за конкретною IP-адресою. Перше ім\'я хоста в списку використовується, якщо HTTP_HOST не збігається ні з одним доступним ім\'ям хоста зі списку.';
$_lang["valid_hostnames_title"] = 'Допустимі імена хостів';
$_lang["validate_referer_message"] = 'Перевіряти серверні заголовки HTTP_REFERER для захисту від вразливостей CSRF (Cross Site Request Forgery). Якщо сервер не використовує заголовки HTTP_REFERER ця функція не буде працювати.';
$_lang["validate_referer_title"] = 'Перевіряти серверні заголовки HTTP_REFERER?';
$_lang["value"] = 'Значення';
$_lang["version"] = 'Версія';
$_lang["view"] = 'Перегляд';
$_lang["view_child_resources_in_container"] = 'Перегляд дочірніх ресурсів';
$_lang["view_log"] = 'Переглянути протокол';
$_lang["view_logging"] = 'Протокол системи управління';
$_lang["view_sysinfo"] = 'Системна інформація';
$_lang["warning"] = 'Попередження';
$_lang["warning_not_saved"] = 'Зміни не були збережені. Ви можете залишитися на цій сторінці для того, щоб зберегти зміни (\'Скасування\'), або покинути її, втративши всі зміни (\'OK\').';
$_lang["warning_visibility"] = 'Показувати попередження';
$_lang["warning_visibility_message"] = 'Показувати звіт про перевірку конфігурації на сторінці привітання менеджера';
$_lang["web_access_permissions"] = 'Права доступу для веб-користувачів';
$_lang["web_access_permissions_user_groups"] = 'Групи веб-користувачів';
$_lang["web_permissions"] = 'Права веб-користувачів';
$_lang["web_user_management_msg"] = '<b>Користувачі</b> - це зареєстровані відвідувачі сайту (не менеджер). <br /> <br /> Виберіть веб-користувача, настройки якого ви хочете редагувати, або створіть нового веб-користувача.';
$_lang["web_user_management_title"] = 'Управління веб-користувачами';
$_lang["web_user_management_select_role"] = 'Всі ролі';
$_lang["web_user_title"] = 'Створити / редагувати веб-користувача';
$_lang["web_users"] = 'Користувачі';
$_lang["weblink"] = 'Веб-посилання';
$_lang["webpwdreminder_message"] = 'Тут ви можете створити повідомлення, яке надсилатиметься користувачам, коли вони запитують нагадування пароля. Лист повинен містити ім\'я користувача та пароль. <br /> <b> Примітка: </b> наступні \'поля виведення\' відобразять відповідні дані при відправленні листа: <br /> <br /> [+sname+] - назва сайту, <br /> [+saddr+] - e-mail адресу сайту, <br /> [+surl+] - адреса (URL) сайту, <br /> [+uid+] - ім\'я користувача або id користувача, <br /> [+pwd+] - пароль користувача, <br /> [+ufn+] - повне ім\'я користувача. <br /> <br /> <b>Переконайтеся, що в повідомленні присутні поля [+uid+] та [+pwd+], інакше користувач не отримає ці данні в листі</b>';
$_lang["webpwdreminder_title"] = 'Нагадування пароля:';
$_lang["websignupemail_message"] = 'Тут ви можете створити повідомлення, яке надсилатиметься веб-користувачам, коли створюється обліковий запис нового веб-користувача. Лист повинен містити ім\'я користувача та пароль. <br /> <b> Примітка: </b> наступні \'поля виведення\' відобразять відповідні дані при відправленні листа: <br /> <br /> [+sname+] - назва сайту , <br /> [+saddr+] - e-mail адресу сайту, <br /> [+surl+] - URL сайту, <br /> [+uid+] - ім\'я користувача або id користувача, <br /> [+pwd+] - пароль користувача, <br /> [+ufn+] - повне ім\'я користувача. <br /> <br /> <b> Переконайтеся, що в повідомленні присутні поля [+uid+] та [+ pwd +], інакше користувач не дізнається свої ім\'я користувача та пароль </b>';
$_lang["websignupemail_title"] = 'Реєстрація веб-користувача:';
$_lang["allow_multiple_emails_title"] = 'Однакові email у веб-користувачів';
$_lang["allow_multiple_emails_message"] = 'Дозволяє веб-користувачам використовувати одну і ту саму адресу електронної пошти для ситуацій, коли у користувачів може бути відсутньою власна адреса електронної пошти або є тільки одна адреса електронної пошти. <br/> Note: Будь-які нагадування про пароль і логіка реєстрації повинні враховувати цей параметр, якщо він встановлений на «Так».';
$_lang["welcome_title"] = 'Ласкаво просимо в систему управління сайтом';
$_lang["which_editor_message"] = 'Виберіть HTML-редактор. Ви також можете завантажити і встановити редактори зі списку доступних на сайті EVO.';
$_lang["which_editor_title"] = 'Редактор:';
$_lang["working"] = 'Обробка даних...';
$_lang["wrap_lines"] = 'Переносити рядки по ширині вікна';
$_lang["xhtml_urls_message"] = 'При виборі цього параметрe всі амперсанди (&) в посиланнях будуть замінені на конструкцію &<!-- -->amp; відповідно до формату XHTML.';
$_lang["xhtml_urls_title"] = 'Посилання в форматі XHTML:';
$_lang["yes"] = 'Так';
$_lang["you_got_mail"] = 'Нове повідомлення';

$_lang["yourinfo_message"] = 'Цей розділ містить деякі дані про вас:';
$_lang["yourinfo_previous_login"] = 'Остання авторизація:';
$_lang["yourinfo_role"] = 'Ваша роль:';
$_lang["yourinfo_title"] = 'Інформація про вас';
$_lang["yourinfo_total_logins"] = 'Всього авторизаций:';
$_lang["yourinfo_username"] = 'Ви авторизовані як:';

$_lang["a17_error_reporting_title"] = 'Виявлення рівня помилки РНР';
$_lang["a17_error_reporting_msg"] = 'Набір виявлення рівня помилок РНР';
$_lang["a17_error_reporting_opt0"] = 'Ігнорувати все';
$_lang["a17_error_reporting_opt1"] = 'Ігнорувати попередження про незначні помилки (<a href="https://www.google.com/search?q=E_DEPRECATED+E_STRICT" target="_blank">E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT</a>)';
$_lang["a17_error_reporting_opt2"] = 'Виявити всі помилки крім E_NOTICE and E_USER_DEPRECATED';
$_lang["a17_error_reporting_opt99"] = 'Виявити всі крім E_USER_DEPRECATED';
$_lang["a17_error_reporting_opt199"] = 'Виявити всі';

$_lang["pwd_hash_algo_title"] = 'Алгоритм шифрування';
$_lang["pwd_hash_algo_message"] = 'Алгоритм шифрування паролів.';

$_lang["enable_bindings_title"] = 'Дозволити @-прив\'язки';
$_lang["enable_bindings_message"] = 'Запобігає виконання PHP-коду через використання @-прив\'язок в TV-параметрах. Потрібно, якщо у вас є користувачі, які не повинні мати можливість створювати PHP-код, але можуть створювати або редагувати TV-параметри. При спробі воводу будь-якого TV-параметра з @-прив\'язкою буде показно повідомлення "@-прив\'язки заборонені".';
$_lang["enable_filter_title"] = 'Увімкнути фільтри';
$_lang["enable_filter_message"] = 'Фільтри дозволяють управляти вихідними даними, перетворюючи їх прямо в тезі усередині шаблону. Аналог PHx. <a href="https://github.com/modxcms/evolution/issues/623" target="ext_help">Більше інформації</a>'; // todo: change link to documentation
$_lang["enable_filter_phx_warning"] = 'Коли плагін PHx включений, вбудовані фільтри відключені за замовчуванням';

$_lang["enable_at_syntax_title"] = 'Увімкнути &lt;@SYNTAX&gt;';
$_lang["enable_at_syntax_message"] = '&lt;@SYNTAX&gt;(не рекомендуються до використання). Додає підтримку умовних операторів прямо в HTML коді';

$_lang["bkmgr_alert_mkdir"] = 'Файл не може бути створений. Перевірте права на теку assets/backup';
$_lang["bkmgr_restore_msg"] = '<p>Сайт може бути відновлений за допомогою файлу SQL. </p>';
$_lang["bkmgr_restore_title"] = 'Відновити';
$_lang["bkmgr_import_ok"] = 'SQL відновлення було виконано нормально.';
$_lang["bkmgr_snapshot_ok"] = 'Резервна копія була збережена.';
$_lang["bkmgr_run_sql_file_label"] = 'Виконати SQL файл';
$_lang["bkmgr_run_sql_direct_label"] = 'Виконати довільну команду SQL';
$_lang["bkmgr_run_sql_submit"] = 'Надіслати';
$_lang["bkmgr_run_sql_result"] = 'Результат';
$_lang["bkmgr_snapshot_title"] = 'Резервне копіювання';
$_lang["bkmgr_snapshot_msg"] = '<p>Резервні копії зберігаються і відновлюються на сервері. <br /> Шлях до резервних копій: /assets/backup/</p>';
$_lang["bkmgr_snapshot_submit"] = 'Створити резервну копію';
$_lang["bkmgr_snapshot_list_title"] = 'Список резервних копій';
$_lang["bkmgr_restore_submit"] = 'Відновити резервну копію';
$_lang["bkmgr_restore_confirm"] = 'Ви впевнені, що хочете відновити резервну копію\n[+filename+].  ?';
$_lang["bkmgr_snapshot_nothing"] = 'Немає резервних копій';

$_lang["files.dynamic.php1"] = 'Створити файл';
$_lang["files.dynamic.php2"] = 'files.dynamic.php2';
$_lang["files.dynamic.php3"] = 'files.dynamic.php3';
$_lang["files.dynamic.php4"] = 'files.dynamic.php4';
$_lang["files.dynamic.php5"] = 'Файл не може бути дубльований.';
$_lang["files.dynamic.php6"] = 'Файл або директорія не можуть бути перейменовані.';
$_lang["files_dynamic_new_folder_name"] = 'Вкажіть нове ім\'я для теки:';
$_lang["files_dynamic_new_file_name"] = 'Вкажіть нове ім\'я для файлу:';
$_lang["not_readable_dir"] = 'Директорія недоступна для запису';
$_lang["confirm_delete_dir"] = 'Ви впевнені, що хочете видалити папку? \n\n Це може викликати проблеми з роботою сайту. Видаляйте папку, тільки якщо ви на 100% впевнені, що робота сайту не постраждає.';
$_lang["confirm_delete_dir_recursive"] = 'Ви впевнені, що хочете видалити папку з усім її вмістом? \n\n Це може викликати проблеми з роботою сайту. Видаляйте папку, тільки якщо ви на 100% впевнені, що робота сайту не постраждає.';

$_lang["make_folders_title"] = 'Додавати слеш до контейнера';
$_lang["make_folders_message"] = 'При використанні дружніх URL до ресурсу, який є контейнером, додається слеш.';

$_lang["check_files_onlogin_title"] = 'Перевіряти системні файли на наявність змін';
$_lang["check_files_onlogin_message"] = 'При включенні цієї опції, важливі системні файли будуть перевірятися на наявність змін, типових для зламаних сайтів. Це не гарантує повний захист, але може допомогти в запобіганні злому.';

$_lang["configcheck_sysfiles_mod"] = 'Системні файли були змінені.';
$_lang["configcheck_sysfiles_mod_msg"] = 'Ви включили перевірку системних файлів на наявність змін, характерних для зламаних сайтів. Це не означає, що сайт був зламаний, але бажано переглянути змінені файли.(index.php, .htaccess, [+MGR_DIR+]/index.php, [+MGR_DIR+]/includes/config.inc.php)';

$_lang['email_method_title'] = 'Метод відправки листів';
$_lang['email_method_mail'] = 'MAIL - повідомлення відправляються за допомогою функції mail().';
$_lang['email_method_smtp'] = 'Через SMTP-сервер';
$_lang['smtp_auth_title'] = 'SMTP авторизація';
$_lang['smtp_autotls_title'] = 'SMTPAutoTLS';
$_lang['smtp_host_title'] = 'Адреса SMTP-сервера';
$_lang['smtp_secure_title'] = 'Захист SMTP';
$_lang['smtp_username_title'] = 'SMTP пошта';
$_lang['smtp_password_title'] = 'SMTP пароль';
$_lang['smtp_port_title'] = 'SMTP порт';

$_lang["setting_resource_tree_node_name"] = 'Назва ресурсу в дереві';
$_lang["setting_resource_tree_node_name_desc"] = 'Виберіть поле ресурсу, яке буде використовуватися в якості назви ресурсу в дереві. За замовчуванням використовується поле "заголовок"; можна використовувати будь-яке інше поле, наприклад, "пункт меню", "псевдонім".';
$_lang["setting_resource_tree_node_name_desc_add"] = 'Увага: Починаючи з версії EVO 1.1 Ви можете змінити ім\'я ресурсу через опцію "Сортувати дерево". Цей параметр використовується, якщо коротке ім\'я в дереві ресурсів встановлюється за& &quot;замовчуванням&quot;.';

$_lang["resource_opt_alvisibled"] = 'Відображається в URL';
$_lang["resource_opt_alvisibled_help"] = 'Для участі даного документа в адресному рядку треба поставити пташку, і навпаки - зніміть, якщо псевдонім цього документа потрібно прибрати з URL.';
$_lang['resource_opt_is_published'] = 'Опублікований';

$_lang["enable_cache_title"] = 'Спосіб кешування';
$_lang["disable_chunk_cache_title"] = 'Заборонити кешування чанків';
$_lang["disable_snippet_cache_title"] = 'Заборонити кешування сніпетів';
$_lang["disable_plugins_cache_title"] = 'Заборонити кешування плагінів';
$_lang["disabled_at_login"] = 'Відключити для адміністраторів';

$_lang["cache_type_title"] = 'Спосіб кешування сторінок ';
$_lang["cache_type_1"] = 'Тільки з урахуванням ID (стандартний метод)';
$_lang["cache_type_2"] = 'З урахуванням ID та $_GET';
$_lang["seostrict_title"] = 'Використовувати SEO Strict URLs';
$_lang["seostrict_message"] = 'використання strict URLs видаляє дублі сторінок за різними посиланнями';

$_lang["alias_listing_title"] = 'Використовуйте кеш AliasListing';
$_lang["alias_listing_message"] = 'Кешування псевдонімів сторінок потрібно вимкнути, якщо сайт має величезну кількість ресурсів. «Вимкнено» зменшує споживання пам’яті, коли сайт має велику кількість ресурсів.';
$_lang["alias_listing_disabled"] = 'Вимкнено';
$_lang["alias_listing_folders"] = 'Тільки для папок';
$_lang["alias_listing_enabled"] = 'Увімкнено';

$_lang["settings_friendlyurls_alert"] = 'Для використання дружніх URL, необхідно змінити ім\'я файлу ht.access в папці, в яку встановлений EVO, на .htaccess.';
$_lang["settings_friendlyurls_alert2"] = 'При встановленні EVO в підпапку необхідно внести зміни в файл .htaccess.';

$_lang["mutate_settings.dynamic.php6"] = 'Повідомлення про системні помилки';
$_lang["mutate_settings.dynamic.php7"] = 'Не повідомляти';
$_lang["mutate_settings.dynamic.php8"] = 'Повідомлення приходять на <b> [+emailsender+] </b> (задається налаштуванням [(emailsender)]) в момент генеріціі помилки. Деталі можна побачити в журналі помилок.';

$_lang["error_no_privileges"] = "У вас немає відповідних прав для додавання коментарів.";
$_lang["error_no_optimise_tablename"] = "Немає таблиць, що потребують оптимізації!";
$_lang["error_no_truncate_tablename"] = "Таблиця для очищення не знайдена!";
$_lang["error_double_action"] = "Подвійна дія (GET & POST) надіслана!";
$_lang["error_no_id"] = "Не вірно вказаний ID у вашому запиті!";
$_lang["error_id_nan"] = "ID переданого запиту порожній!";
$_lang["error_parent_deleted"] = "Помилка, оскільки батьківський ресурс видалено!";
$_lang["error_no_parent"] = "Не вдалося знайти ім'я батьківського документа!";
$_lang["error_many_results"] = "Занадто багато результатів повертається з бази даних!";
$_lang["error_no_results"] = "Результати з бази даних не повернулися або повернулися не в повному обсязі!";
$_lang["error_no_user_selected"] = "Не вказаний одержувач цього повідомлення!";
$_lang["error_no_group_selected"] = "Не вказана група одержувачів для цього повідомлення!";
$_lang["error_movedocument1"] = "Документ не може бути своїм батьківським ресурсом!";
$_lang["error_movedocument2"] = "ID документа не пройшов в запиті!";
$_lang["error_movedocument3"] = "Новий батьківський ресурс не вказано!";
$_lang["error_internet_connection"] = "Сервер недоступний, перевірте підключення до інтернету!";

$_lang["login_processor_unknown_user"] = "Невірно вказано логін або пароль!";
$_lang["login_processor_wrong_password"] = "Невірно вказано логін або пароль!";
$_lang["login_processor_many_failed_logins"] = "Дуже багато невдалих спроб увійти, ви заблоковані!";
$_lang["login_processor_verified"] = "Потрібна перевірка користувача!";
$_lang["login_processor_blocked1"] = "Ви заблоковані і не можете увійти!";
$_lang["login_processor_blocked2"] = "Ви заблоковані і не можете увійти! Спробуйте увійти пізніше.";
$_lang["login_processor_blocked3"] = "Ви автоматично блокуватися після зазначеної дати, і ви не можете увійти!";
$_lang["login_processor_bad_code"] = "Перевірочний код введено неправильно! Спробуйте ще раз!";
$_lang["login_processor_remotehost_ip"] = "Ваше ім'я хоста не вказує на ваш IP!";
$_lang["login_processor_remote_ip"] = "Ви не можете увійти в систему з цього місця.";
$_lang["login_processor_date"] = "Ви не можете зараз увійти. Будь ласка, спробуйте ще раз пізніше.";
$_lang["login_processor_captcha_config"] = "Капча ще ненастроєні належним чином.";

$_lang["dp_dayNames"] = "['Неділя', 'Понеділок', 'Вівторок', 'Середа', 'Четвер', 'П\'ятниця', 'Субота']";
$_lang["dp_monthNames"] = "['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень']";
$_lang["dp_startDay"] = "1";

$_lang["check_all"] = "Включити всі";
$_lang["check_none"] = "Вимкнути всі";
$_lang["check_toggle"] = "Переключити";

$_lang["version_notices"] = "Повідомлення про версії";

$_lang["em_button_shift"] = "(Shift + клік, щоб відкрити кілька вікон)";

$_lang["reset_sysfiles_checksum_button"] = "Оновити контрольну суму";
$_lang["reset_sysfiles_checksum_alert"] = "Ви впевнені, що хочете скинути контрольну суму системних файлів?";

$_lang["file_browser_disabled_msg"] = "Файл-браузер відключений.";
$_lang["which_browser_default_title"] = "Файл-браузер за замовчуванням";
$_lang["which_browser_default_msg"] = "Вкажіть Файл-браузер за замовчуванням. В налаштуваннях менеджерів ви можете вказати файл-браузер відмінний від системного.";
$_lang["which_browser_title"] = "Файл-браузер";
$_lang["which_browser_msg"] = "Ви можете вибрати файл-браузер для цього користувача. Або залиште за замовчуванням.";
$_lang["option_default"] = "За замовчуванням";
$_lang["position"] = "Позиція";
$_lang["are_you_sure"] = "Ви впевнені?";

$_lang['evo_downloads_title'] = "Evolution Downloads";
$_lang['help_translating_title'] = "Допомогти з перекладом Evolution CMS";
$_lang['download'] = "Завантажити";
$_lang['downloads'] = "Завантаження";
$_lang["previous_releases"] = "Попередній реліз";
$_lang["extras"] = "Extras";

$_lang["display_locks"] = "Відображати блокування";
$_lang["role_display_locks"] = "Відображати блокування";
$_lang["session_timeout"] = "Тайм-аут сесії";
$_lang["session_timeout_msg"] = "EVO буде пінгувати сервер раз в хвилину, щоб оновити сеанс (сесію). Якщо останній пінг перевищує цей параметр, пов'язаний з ним сеанс буде вважатися недійсним, і всі пов'язані з ним блокування будуть автоматично видалені. Задана в хвилинах (> 2 хв, за замовчуванням 15хв).";
$_lang["unlock_element_id_warning"] = "Вы уверенны что хотите разблокировать [+element_type+] (ID [+id+])?";
$_lang["lock_element_type_1"] = "Шаблон";
$_lang["lock_element_type_2"] = "Параметр (TV)";
$_lang["lock_element_type_3"] = "Чанк";
$_lang["lock_element_type_4"] = "Сніпет";
$_lang["lock_element_type_5"] = "Плагін";
$_lang["lock_element_type_6"] = "Модуль";
$_lang["lock_element_type_7"] = "Ресурс";
$_lang["lock_element_type_8"] = "Роль";
$_lang["lock_element_editing"] = "Ви редагуєте  [+element_type+] з \n[+lasthit_df+]";
$_lang["lock_element_locked_by"] = "Цей [+element_type+] заблокований користувачем [+username+], з ";

$_lang["minifyphp_incache_title"] = 'Стиснути код php в файлі кеша';
$_lang["minifyphp_incache_message"] = 'Стиснення PHP коду (сніпетів і плагінів) і збереження в файл кеша, реф:<a href="https://github.com/modxcms/evolution/issues/938" target="_blank">#938</a> ';

$_lang["logout_reminder_msg"] = "Нагадування: Схоже [+date+] Ви забули вийти з системи. Будь ласка, зверніть увагу в майбутньому, потрібно виходити з системи після того як закінчили роботу.";

$_lang["allow_eval_title"] = "Використання функції eval ";
$_lang["allow_eval_msg"] = "Для розробників: використовуйте \$modx-&gt;safeEval().";
$_lang["allow_eval_with_scan"] = "Виконувати тільки дозволені функції зазначені нижче";
$_lang["allow_eval_with_scan_at_post"] = "Дозволені всі. Але при POST тільки зазначені нижче";
$_lang["allow_eval_everytime_eval"] = "Дозволені всі (використовувати тільки для налагодження)";
$_lang["allow_eval_dont_eval"] = "Не показувати всі функції";

$_lang["safe_functions_at_eval_title"] = "Дозволені функції в EVAL";
$_lang["safe_functions_at_eval_msg"] = "Список розділений комами";

$_lang["multiple_sessions_msg"] = "Інформація: Кілька активних сесій (всього [+total+]) знайдено для користувача <b>[+username+]</b>.";
$_lang["iconv_not_available"] = "Важливо встановити/включити розширення iconv. Будь ласка, зв'яжіться зі своїм провайдером, якщо Ви не знаєте, як його включити.";

$_lang["cm_create_new_category"] = "Створити нову категорію";
$_lang["cm_category_name"] = "Назва категорії";
$_lang["cm_category_position"] = "Позиція категорії";
$_lang["cm_no_x_assigned"] = "
Не %s присвоєно";
$_lang["cm_save_categorization"] = "Зберегти список категорій";
$_lang["cm_update_categories"] = "Оновити категорії";
$_lang["cm_assigned_elements"] = "Призначені елементи";
$_lang["cm_edit_name"] = "Редагувати ім'я";
$_lang["cm_mark_for_deletion"] = "Відзначити до видалення";
$_lang["cm_delete_now"] = "Видалити негайно";
$_lang["cm_delete_element_x_now"] = "
Видалити &quot;%s&quot; негайно";
$_lang["cm_select_element_group"] = "Вибрати елемент групи";
$_lang["cm_global_messages"] = "Глобальні повідомлення";
$_lang["cm_add_new_category"] = "Додати нову категорію";
$_lang["cm_edit_categories"] = "Редагувати категорії";
$_lang["cm_sort_categories"] = "Сортувати категорії";
$_lang["cm_categorize_elements"] = "Класифікувати елементи";
$_lang["cm_translation"] = "Переклад";
$_lang["cm_translations"] = "Переклади";
$_lang["cm_categorize_x"] = "Класифікувати <span class=\"highlight\">%s</span>";
$_lang["cm_unknown_error"] = "Щось пішло не так.";
$_lang["cm_x_assigned_to_category_y"] = "<span class=\"highlight\">%s(%s)</span> присвоєно категорії <span class=\"highlight\">%s(%s)</span>";
$_lang["cm_no_categorization"] = "Класифікація не проводилася.";
$_lang["cm_no_changes"] = "Нічого міняти, тому змін не було.";
$_lang["cm_x_changes_made"] = "<span class=\"highlight\">%s</span> змін зроблено";
$_lang["cm_enter_name_for_category"] = "Будь ласка, введіть ім'я для нової категорії";
$_lang["cm_category_x_exists"] = "Категорія <span class=\"highlight\">%s</span> вже існує.";
$_lang["cm_category_x_saved_at_position_y"] = "Нова категорія <span class=\"highlight\">%s</span> збережена на позиції <span class=\"highlight\">%s</span>.";
$_lang["cm_category_x_moved_to_position_y"] = "Категорія <span class=\"highlight\">%s</span> переміщена до позиції <span class=\"highlight\">%s</span>";
$_lang["cm_category_x_deleted"] = "Категорія <span class=\"highlight\">%s</span> видалена";
$_lang["cm_category_x_renamed_to_y"] = "Категорія <span class=\"highlight\">%s</span> перейменована в <span class=\"highlight\">%s</span>";
$_lang["cm_translation_for_x_empty"] = "Переклад для <span class=\"highlight\">%s</span> порожній";
$_lang["cm_translation_for_x_to_y_success"] = "Переклад для <span class=\"highlight \">% s </span> до <span class=\"highlight\">% s </span> успішно збережено";
$_lang["cm_save_new_sorting"] = "Зберегти нове сортування";
$_lang["cm_translate_phrases"] = "Перекласти фрази";
$_lang["cm_translate_module_phrases"] = "Перекласти фрази модуля";
$_lang["cm_native_phrase"] = "Рідна фраза";

$_lang["btn_view_options"] = 'Показати параметри';
$_lang["view_options_msg"] = 'Відображення і перерахування елементів можна налаштувати за допомогою кнопки «Перегляд параметрів». Налаштування зберігаються і відновлюються в кожному браузері за допомогою локального сховища HTML5.';
$_lang["viewopts_title"] = 'Показати параметри';
$_lang["viewopts_cb_buttons"] = 'Кнопки';
$_lang["viewopts_cb_descriptions"] = 'Описи';
$_lang["viewopts_cb_icons"] = 'Іконки';
$_lang["viewopts_radio_list"] = 'Список';
$_lang["viewopts_radio_inline"] = 'Інлайн';
$_lang["viewopts_radio_flex"] = 'Флекс';
$_lang["viewopts_fontsize"] = 'Розмір шрифту';
$_lang["viewopts_cb_alltabs"] = 'Всі вкладки';

$_lang['email_sender_method'] = 'Відправник повідомлення';
$_lang['auto'] = 'Автовизначення';
$_lang['use_emailsender'] = 'Використовуйте значення [(emailsender)]';
$_lang['email_sender_method_message'] = 'Return-Path - адреса, на якиу буде відправлено відмову. Автоматичне виявлення буде працювати в більшості випадків.';

$_lang['login_form_position_title'] = 'Положення форми авторизації';
$_lang['login_form_position_left'] = 'зліва';
$_lang['login_form_position_center'] = 'по центру';
$_lang['login_form_position_right'] = 'справа';
$_lang["login_form_style"] = 'Стиль форми авторизації:';
$_lang["login_form_style_dark"] = 'Темний';
$_lang["login_form_style_light"] = 'Cвітлий';
$_lang['login_logo_title'] = 'Логотип на сторінці авторизації';
$_lang['login_logo_message'] = 'Рекомендований розмір логотипу по ширині: 360px, тип .png';
$_lang['login_bg_title'] = 'Фонове зображення на сторінці авторизації';
$_lang['login_bg_message'] = 'Рекомендований розмір фонового зображення по ширині: 1920px';

$_lang['manager_menu_position_title'] = 'Розташування основного меню';
$_lang['manager_menu_position_top'] = 'вгорі';
$_lang['manager_menu_position_left'] = 'зліва';

$_lang['invalid_event_response'] = 'Подія %s повернула невірний результат';

$_lang['chunk_processor'] = 'Клас обробки чанків';

$_lang["permission_title"] = 'Створити / редагувати права доступу';
$_lang["groups_permission_title"] = 'Створити / редагувати категорії';
$_lang["lang_key_desc"] = 'Ключ мови з масиву $_lang';
$_lang["key_desc"] = 'Ключ перевірки прав доступу';

$_lang["setting_from_file"] = '<strong class="text-danger">Значення параметра визначено в core/custom/config/cms/settings</strong>';
$_lang['disable'] = 'Вимкнути';
$_lang['enable'] = 'Включити';

return $_lang;
