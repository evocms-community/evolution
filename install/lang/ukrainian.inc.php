<?php
/**
 * EVO Installer language file
 *
 * @author davaeron
 * @version 1.5.0
 * @date 2018/02/23
 *
 * @language English
 * @package evo
 * @subpackage installer
 *
 * Please commit your language changes on Transifex (https://www.transifex.com/projects/p/modx-evolution/) or on GitHub (https://github.com/modxcms/evolution).
 */
$_lang["agree_to_terms"] = 'Погодитись з умовами ліцензії та розпочати встановлення';
$_lang["alert_database_test_connection"] = 'Ви повинні створити базу даних або вибрати базу даних для перевірки!';
$_lang["alert_database_test_connection_failed"] = 'Невдала перевірка вибраної бази даних!';
$_lang["alert_enter_adminconfirm"] = 'Пароль адміністратора та підтвердження пароля не збігаються!';
$_lang["alert_enter_adminlogin"] = 'Введіть ім\'я адміністратора!';
$_lang["alert_enter_adminpassword"] = 'Введіть пароль адміністратора!';
$_lang["alert_enter_database_name"] = 'Введіть ім\'я бази даних!';
$_lang["alert_enter_host"] = 'Введіть хост бази даних!';
$_lang["alert_enter_login"] = 'Введіть ім\'я користувача бази даних!';
$_lang["alert_server_test_connection"] = 'Перевірте з\'єднання з сервером бази даних!';
$_lang["alert_server_test_connection_failed"] = 'З\'єднатися з сервером бази даних не вдалося!';
$_lang["alert_table_prefixes"] = 'Префікс таблиць повинен починатися з літери!';
$_lang["all"] = 'Всі';
$_lang["and_try_again"] = ', і спробуйте знову. Якщо вам потрібна допомога щодо виправлення цієї помилки';
$_lang["and_try_again_plural"] = ', і спробуйте знову. Якщо вам потрібна допомога у виправленні цих помилок';
$_lang["begin"] = 'Почати';
$_lang["btnback_value"] = 'Назад';
$_lang["btnclose_value"] = 'Закрити';
$_lang["btnnext_value"] = 'Далі';
$_lang["cant_write_config_file"] = 'Програма інсталяції не змогла записати файл конфігурації. Скопіюйте вищезгадане у файл ';
$_lang["cant_write_config_file_note"] = 'Як тільки ви це зробите, ви можете увійти до панелі керування, перейшовши в браузері за адресою Адреса_Вашого_Сайта/[+MGR_DIR+]/.';
$_lang["checkbox_select_options"] = 'Параметри вибору прапорців:';
$_lang["checking_if_cache_exist"] = 'Перевірка існування папок <span class="mono">/assets/cache</span> та <span class="mono">/assets/cache/rss</span>: ';
$_lang["checking_iconv"] = 'Перевірка доступності <span class="mono">iconv</span>: ';
$_lang["checking_iconv_note"] = 'Необхідно встановити/включити розширення iconv. Будь ласка, зверніться до адміністратора сервера, щоб зробити це.';
$_lang["checking_if_cache_file_writable"] = 'Перевірка можливості запису у файл <span class="mono">/assets/cache/siteCache.idx.php</span>: ';
$_lang["checking_if_cache_file2_writable"] = 'Перевірка можливості запису у файл <span class="mono">/assets/cache/sitePublishing.idx.php</span>: ';
$_lang["checking_if_cache_writable"] = 'Перевірка можливості запису в папки <span class="mono">/assets/cache</span> та <span class="mono">/assets/cache/rss</span>: ';
$_lang["checking_if_config_exist_and_writable"] = 'Перевірка існування та можливості запису у файл <span class="mono">/[+MGR_DIR+]/includes/config.inc.php</span>: ';
$_lang["checking_if_export_exists"] = 'Перевірка існування папки <span class="mono">/assets/export</span>: ';
$_lang["checking_if_export_writable"] = 'Перевірка можливості запису в папку <span class="mono">/assets/export</span>: ';
$_lang["checking_if_images_exist"] = 'Перевірка існування папок <span class="mono">/assets/images</span>, <span class="mono">/assets/files</span>, <span class= "mono">/assets/backup</span> та <span class="mono">/assets/.thumbs</span>: ';
$_lang["checking_if_images_writable"] = 'Перевірка можливості запису в папки <span class="mono">/assets/images</span>, <span class="mono">/assets/files</span>, <span class="mono">/assets/backup</span> та <span class="mono">/assets/.thumbs</span>: ';
$_lang["checking_mysql_strict_mode"] = 'Перевірка MySQL на строгий режим strict sql_mode: ';
$_lang["checking_mysql_version"] = 'Перевірка версії MySQL: ';
$_lang["checking_php_version"] = 'Перевірка версії PHP:';
$_lang["checking_registerglobals"] = 'Перевірка PHP-параметра Register_Globals: ';
$_lang["checking_registerglobals_note"] = 'Конфігурація PHP робить ваш сайт більш сприйнятливим до XSS-атак. Ви повинні самостійно або зв\'язавшись з адміністрацією хостингу, вимкнути Register_Globals. Зазвичай це робиться одним з наступних шляхів: вносяться виправлення до php.ini файлу, додаються правила у файл .htaccess, який знаходиться в корені папки EVO, або додаванням свого php.ini до кожної папки всередині папки EVO (їх дуже багато). Ви можете продовжити встановлення EVO, але обміркуйте це попередження.';
$_lang["checking_sessions"] = 'Перевірка налаштувань сесій: ';
$_lang["checking_table_prefix"] = 'Перевірка префікса таблиць';
$_lang["choose_language"] = 'Виберіть мову';
$_lang["chunks"] = 'Чанки';
$_lang["config_permissions_note"] = 'При новому Linux/Unix установці створіть порожній файл <span class="mono">config.inc.php</span> у папці <span class="mono">/[+MGR_DIR+ ]/includes/</span> з правами 0666.';
$_lang["connection_screen_collation"] = 'Зіставлення:';
$_lang["connection_screen_connection_method"] = 'Метод зіставлення:';
$_lang["connection_screen_database_connection_information"] = 'Параметри бази даних';
$_lang["connection_screen_database_connection_note"] = 'Введіть ім\'я бази даних для EVO. Якщо у вас ще немає бази даних, програма установки спробує створити базу даних для вас. Залежно від конфігурації MySQL або прав користувача бази даних, процес може завершитися невдачею.';
$_lang["connection_screen_database_host"] = 'Хост бази даних:';
$_lang["connection_screen_database_info"] = 'Інформація бази даних';
$_lang["connection_screen_database_login"] = 'Ім\'я користувача:';
$_lang["connection_screen_database_name"] = 'Ім\'я бази даних:';
$_lang["connection_screen_database_pass"] = 'Пароль:';
$_lang["connection_screen_database_test_connection"] = 'Натисніть тут для створення бази даних або для перевірки, що така база існує';
$_lang["connection_screen_default_admin_email"] = 'E-mail адміністратора:';
$_lang["connection_screen_default_admin_login"] = 'Ім\'я адміністратора:';
$_lang["connection_screen_default_admin_note"] = 'Тепер ви повинні ввести дані про головний запис адміністратора. Ви можете ввести своє ім\'я та пароль, який ви навряд чи забудете. Вам знадобляться ці дані, щоб увійти до панелі керування після закінчення установки.';
$_lang["connection_screen_default_admin_password"] = 'Пароль адміністратора:';
$_lang["connection_screen_default_admin_password_confirm"] = 'Підтвердити пароль:';
$_lang["connection_screen_default_admin_user"] = 'Адміністратор за замовчуванням';
$_lang["connection_screen_defaults"] = 'Налаштування за замовчуванням менеджера';
$_lang["connection_screen_server_connection_information"] = 'Параметри підключення та входу на сервер бази даних';
$_lang["connection_screen_server_connection_note"] = 'Введіть дані хоста (назва сервера або IP адреса), ім\'я користувача та пароль для входу в базу даних, а потім перевірте з\'єднання.';
$_lang["connection_screen_server_test_connection"] = 'Натисніть тут для перевірки з\'єднання з вашим сервером бази даних та отримання зіставлення кодування';
$_lang["connection_screen_table_prefix"] = 'Префікс таблиць:';
$_lang["creating_database_connection"] = 'Перевірка з\'єднання з базою даних: ';
$_lang["database_alerts"] = 'Увага помилка бази даних!';
$_lang["database_connection_failed"] = 'Помилка з\'єднання з базою даних!';
$_lang["database_connection_failed_note"] = 'Перевірте параметри \'єднання і спробуйте ще раз.';
$_lang["database_use_failed"] = 'Неможливо вибрати базу даних!';
$_lang["database_use_failed_note"] = 'Перевірте, чи є у вас необхідні права на доступ до бази даних.';
$_lang["default_language"] = 'Мова за замовчуванням менеджера';
$_lang["default_language_description"] = 'Ця мова, яка за промовчанням використовуватиметься менеджером в адміністративній панелі EVO.';
$_lang["depedency_create"] = 'Залежності створені';
$_lang["depedency_update"] = 'Залежність оновлено';
$_lang["during_execution_of_sql"] = 'під час виконання SQL запиту';
$_lang["encoding"] = 'utf-8';
$_lang["error"] = 'помилки';
$_lang["errors"] = 'помилок';
$_lang["failed"] = 'ПОМИЛКА!';
$_lang["guid_set"] = 'GUID ключ';
$_lang["help"] = 'Допомога!';
$_lang["help_link"] = 'http://modx.im';
$_lang["help_title"] = 'Допомога в установці на форумах EVO';
$_lang["iagree_box"] = 'Я погоджуюсь з умовами <a href="../assets/docs/license.txt" target="_blank">ліцензії</a>. З українським перекладом тексту ліцензії можна познайомитись на сторінці <a href="http://uk.wikipedia.org/wiki/GPL" target="_blank">GNU General Public License</a>.';
$_lang["install"] = 'Встановити';
$_lang["install_overwrite"] = 'Встановити/Переписати';
$_lang["install_results"] = 'Результати встановлення';
$_lang["install_update"] = 'Встановити/Оновити';
$_lang["installation_error_occured"] = 'Наступна помилка виникла під час встановлення';
$_lang["installation_install_new_copy"] = 'Встановити нову копію';
$_lang["installation_install_new_note"] = 'Увага, вибір цього варіанта може перезаписати дані у вашій базі даних.';
$_lang["installation_mode"] = 'Режим установки';
$_lang["installation_new_installation"] = 'Нова установка';
$_lang["installation_note"] = '<strong>Увага:</strong> Після входу в панель керування ви повинні відредагувати та зберегти системну конфігурацію EVO, перш ніж дивитися сайт, вибравши <strong>Інструменти</strong> -> Конфігурація в панелі керування.';
$_lang["installation_successful"] = 'Установка успішно завершена!';
$_lang["installation_upgrade_advanced"] = 'Розширене оновлення установки';
$_lang["installation_upgrade_advanced_note"] = 'Для розширеного керування базою даних з різним набором символів.<br /><b>Ви повинні знати повну назву вашої бази даних, ім\'я користувача, пароль, деталі підключення та таблицю зіставлення.</b> ';
$_lang["installation_upgrade_existing"] = 'Оновлення існуючої установки';
$_lang["installation_upgrade_existing_note"] = 'Оновлення ваших файлів та бази даних.';
$_lang["installed"] = 'Встановлено';
$_lang["installing_demo_site"] = 'Встановлення прикладу веб-сайту: ';
$_lang["language_code"] = 'ru';
$_lang["loading"] = 'Завантажується...';
$_lang["modules"] = 'Модулі';
$_lang["modx_footer1"] = '&copy; 2005-[+current_year+] <a href="http://evo.im/" target="_blank" style="color: green; text-decoration:underline">EVO</a> Content Management Framework (CMF) проект. Всі права захищені. EVO ліцензовано GNU GPL.';
$_lang["modx_footer2"] = 'EVO &mdash; вільне програмне забезпечення. Ми заохочуємо вас бути творчими та використовувати EVO як ви вважаєте за доцільне. Якщо ви внесете зміни та вирішите розповсюджувати ваш змінений варіант EVO, то повинні зберігати та розповсюджувати вихідний код безкоштовно.';
$_lang["modx_install"] = 'EVO &raquo; Встановлення';
$_lang["modx_requires_php"] = ', а EVO необхідний PHP [+min_version+] або пізніший';
$_lang["mysql_5051"] = 'версія MySQL - 5.0.51!';
$_lang["mysql_5051_warning"] = 'Відомі проблеми з MySQL 5.0.51. Рекомендуємо оновити базу даних перед продовженням установки.';
$_lang["mysql_version_is"] = ' Ваша версія MySQL: ';
$_lang["no"] = 'Ні';
$_lang["none"] = 'Жоден';
$_lang["not_found"] = 'не знайдено';
$_lang["ok"] = 'ОК!';
$_lang["optional_items"] = 'Додаткові елементи';
$_lang["optional_items_note"] = 'Будь ласка, виберіть параметри встановлення та натисніть кнопку `Встановити`:';
$_lang["php_security_notice"] = '<legend>Повідомлення безпеки</legend><p>Незважаючи на те, що EVO буде працювати на вашій версії PHP, використовувати його з цією версією PHP вкрай не рекомендується. Ваша версія PHP уразлива через численні проломи в захисті. Оновіть PHP до 5.6 або пізнішої безпеки для вашого сайту.</p>';
$_lang["please_correct_error"] = '. Виправте цю помилку';
$_lang["please_correct_errors"] = '. Виправте ці помилки';
$_lang["plugins"] = 'Плагіни';
$_lang["preinstall_validation"] = 'Перевірка перед встановленням';
$_lang["recommend_collation"] = 'utf8_general_ci';
$_lang["recommend_collations_order"] = 'utf8mb4_unicode_ci,utf8mb4_general_ci,utf8_unicode_ci,utf8_general_ci,utf8mb4_bin,utf8_bin,utf8mb4_unicode_520_ci,utf8_unicode_520_ci,utf8_general_mysql500_ci';
$_lang["recommend_setting_change_title"] = 'Рекомендована зміна налаштування';
$_lang["recommend_setting_change_validate_referer_confirmation"] = 'Змінити установку: <em>Перевіряти заголовки HTTP_REFERER?</em>';
$_lang["recommend_setting_change_validate_referer_description"] = 'Ваш сайт не налаштований на перевірку серверних заголовків HTTP_REFERER у вхідних запитах до системи керування. Ми рекомендуємо включити цей параметр, щоб знизити ризик CSRF (Cross Site Request Forgery - підробка міжсайтових запитів) атак.';
$_lang["remove_install_folder_auto"] = 'Видалити папку та файли програми встановлення з мого сайту <br />&nbsp;(Для виконання цієї операції необхідні права на запис до папки install).';
$_lang["remove_install_folder_manual"] = 'Будь ласка, видаліть папку &quot;<b>install</b>&quot; перш ніж увійти до панелі керування.';
$_lang["resetting_database"] = 'Оновити базу даних демо-сайту: ';
$_lang["retry"] = 'Повторити';
$_lang["running_database_updates"] = 'Оновлення бази даних: ';
$_lang["sample_web_site"] = 'Приклад веб-сайту';
$_lang["sample_web_site_note"] = 'Обережно! Встановлення цього параметра <b>перепише</b> існуючі ресурси та елементи.';
$_lang["session_problem"] = 'Була виявлена ​​проблема в сесії сервера. Будь ласка, зв\'яжіться з адміністратором сервера для її усунення.';
$_lang["session_problem_try_again"] = 'Повторити?';
$_lang["setup_cannot_continue"] = 'На жаль, установка не може бути продовжена через ';
$_lang["setup_couldnt_install"] = 'Програма установки EVO не змогла встановити/змінити деякі таблиці бази даних.';
$_lang["setup_database"] = 'Програма інсталяції зараз спробує встановити базу даних:<br />';
$_lang["setup_database_create_connection"] = 'Створення підключення до бази даних: ';
$_lang["setup_database_create_connection_failed"] = 'Не вдалося з\'єднатися з базою даних!';
$_lang["setup_database_create_connection_failed_note"] = 'Перевірте параметри підключення і спробуйте знову.';
$_lang["setup_database_creating_tables"] = 'Створення таблиць бази даних: ';
$_lang["setup_database_creation"] = 'Створення бази даних';
$_lang["setup_database_creation_failed"] = 'Не вдалося створити базу даних!';
$_lang["setup_database_creation_failed_note"] = ' - програма установки не змогла створити базу даних!';
$_lang["setup_database_creation_failed_note2"] = 'Програма інсталяції не змогла створити базу даних, і немає бази даних з таким ім\'ям. Можливо, у вас немає прав на створення бази. Перевірте параметри бази даних і спробуйте ще раз.';
$_lang["setup_database_selection"] = 'Вибір бази даних';
$_lang["setup_database_selection_failed"] = 'Помилка вибору бази даних...';
$_lang["setup_database_selection_failed_note"] = 'База даних не існує. Програма інсталяції спробує її створити.';
$_lang["snippets"] = 'Cніпети';
$_lang["some_tables_not_updated"] = 'Деякі таблиці не були оновлені. Можливо через попередні модифікації';
$_lang["status_checking_database"] = 'Перевірка бази даних: ';
$_lang["status_connecting"] = 'Підключення: ';
$_lang["status_failed"] = 'помилка!';
$_lang["status_failed_could_not_create_database"] = 'помилка - не вдається створити базу даних';
$_lang["status_failed_database_collation_does_not_match"] = 'помилка - зіставлення бази даних не відповідає; використовуйте SET NAMES або виберіть %s';
$_lang["status_failed_table_prefix_already_in_use"] = 'помилка - префікс таблиці вже використовується!';
$_lang['status_failed_mysqli'] = 'помилка - розширення mysqli для php не встановлено';
$_lang["status_passed"] = 'успіх - база даних обрана';
$_lang["status_passed_database_created"] = 'успіх - база даних створена';
$_lang["status_passed_server"] = 'успіх - зіставлення бази даних доступне';
$_lang["strict_mode"] = 'сервер MySQL працює в строгому режимі strict sql_mode!';
$_lang["strict_mode_error"] = 'Деякі можливості EVO не можуть працювати належним чином, якщо режим sql_mode STRICT_TRANS_TABLES не вимкнено. Ви можете задати режим через внесення змін до файлу my.cnf або зв\'язатися з адміністратором бази даних.';
$_lang["summary_setup_check"] = 'Програма інсталяції виконає кілька тестів, щоб переконатися, що все готове до встановлення.';
$_lang["system_configuration"] = 'Конфігурація системи';
$_lang["system_configuration_validate_referer_description"] = 'Рекомендується встановлення <strong>Перевіряти заголовки HTTP_REFERER</strong>, яка може захистити ваш сайт від атак CSRF, але при деяких конфігураціях сервера система управління може бути недоступна.';
$_lang["table_prefix_already_inuse"] = ' - такий префікс таблиць вже використовується в базі даних!';
$_lang["table_prefix_already_inuse_note"] = 'Продовження установки неможливе. Вже існують таблиці із зазначеним префіксом, змініть префікс таблиць і спробуйте знову.';
$_lang["table_prefix_not_exist"] = ' - немає такого префікса таблиць у базі даних!';
$_lang["table_prefix_not_exist_note"] = 'Продовження установки неможливе, оскільки немає таблиць із зазначеним префіксом, змініть префікс таблиць і спробуйте знову.';
$_lang["templates"] = 'Шаблони';
$_lang["to_log_into_content_manager"] = 'Щоб увійти до панелі керування ([+MGR_DIR+]/index.php) натисніть кнопку `Закрити`.';
$_lang["toggle"] = 'Переключити';
$_lang['tvs'] = 'Параметри (TV)';
$_lang["unable_install_chunk"] = 'Неможливо встановити чанк. Файл';
$_lang["unable_install_module"] = 'Неможливо встановити модуль. Файл';
$_lang["unable_install_plugin"] = 'Неможливо встановити плагін. Файл';
$_lang["unable_install_snippet"] = 'Неможливо встановити сніпет. Файл';
$_lang["unable_install_template"] = 'Неможливо встановити шаблон. Файл';
$_lang["upgrade_note"] = '<strong>Увага:</strong> Перш ніж відкрити ваш сайт, вам необхідно увійти в панель керування, потім переглянути та зберегти системну конфігурацію.';
$_lang["upgraded"] = 'Оновлено';
$_lang["validate_referer_title"] = 'Перевіряти серверні заголовки HTTP_REFERER?';
$_lang["visit_forum"] = ', відвідайте <a href="http://modx.im" target="_blank">форум EVO</a>.';
$_lang["warning"] = 'Попередження!';
$_lang["welcome_message_start"] = 'Виберіть тип установки:';
$_lang["welcome_message_text"] = 'Ця програма проведе вас через весь процес встановлення.';
$_lang["welcome_message_welcome"] = 'Ласкаво просимо до програми установки EVO.';
$_lang["writing_config_file"] = 'Запис конфігураційного файлу: ';
$_lang["yes"] = 'Так';
$_lang["you_running_php"] = ' - ви використовуєте PHP';
?>