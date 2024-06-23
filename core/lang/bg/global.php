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
$modx_lang_attribute = 'bg'; // Manager HTML/XML Language Attribute see http://en.wikipedia.org/wiki/ISO_639-1
$modx_manager_charset = 'UTF-8';

$_lang["about_msg"] = 'Evolution CMS is a <a href="https://evo-cms.com/" target="_blank">PHP Application Framework and Content Management System</a> licensed under the <a href="https://www.gnu.org/licenses/gpl-3.0.html">GNU GPL</a>.';
$_lang["about_title"] = 'За Системата MODX';

// days
$_lang["monday"] = 'Понеделник';
$_lang["tuesday"] = 'Вторник';
$_lang["wednesday"] = 'Сряда';
$_lang["thursday"] = 'Четвъртък';
$_lang["friday"] = 'Петък';
$_lang["saturday"] = 'Събота';
$_lang["sunday"] = 'Неделя';

// templates
$_lang["template"] = 'Шаблон';
$_lang["templates"] = 'Templates';
$_lang['templatecontroller'] = 'Template Controller';
$_lang["template_assignedtv_tab"] = 'Присвоени Шаблонни Променливи (ШП)';
$_lang["template_code"] = 'Код на шаблона (html)';
$_lang["template_desc"] = 'Описание';
$_lang["template_edit_tab"] = 'Редактиране на Шаблон';
$_lang["template_inuse"] = 'This template is in use. Please set the documents using the template to another template. Documents using this template:';
$_lang["template_management_msg"] = 'Тук можете да изберете кой шаблон желаете да редактирате.';
$_lang["template_msg"] = 'Създаване и редактиране на шаблони. Променените или новите шаблони няма да бъдат видими на кешираните страници на сайта докато кеша не се изчисти. Обаче можете да използвате функцията за предварителен преглед на страницата, за да видите шаблона в действие.';
$_lang["template_name"] = 'Име на Шаблона';
$_lang["template_no_tv"] = 'На този шаблон няма присвоени все още никакви шаблонни променливи.';
$_lang["template_notassigned_tv"] = 'These Template Variables are available for assigning.';
$_lang["template_reset_all"] = 'Ресетване на всички страници към шаблона по подразбиране';
$_lang["template_reset_specific"] = 'Ресетване само на \'%s\' страници';
$_lang["template_assigned_blade_file"] = 'Съответстващ blade-файл';
$_lang["template_create_blade_file"] = 'Създайте файл с шаблон при запис';
$_lang["template_selectable"] = 'Template selectable when creating or editing ressources.';
$_lang["template_title"] = 'Създаване/редактиране на шаблон';
$_lang["template_tv_edit"] = 'Редактиране на реда за сортиране на шаблонните променливи (ШП)';
$_lang["template_tv_edit_message"] = 'Drag to reorder the Template Variables for this template.';
$_lang["template_tv_edit_title"] = 'Template Variable Sort Order';
$_lang["template_tv_msg"] = 'Шаблонните променливи, присвоени на този шаблон са изброени по-долу.';

// tmplvars
$_lang["tv"] = 'ШП';
$_lang["tmplvar"] = 'Template Variable';
$_lang["tmplvars"] = 'Шаблонни Променливи (ШП)';
$_lang["tmplvar_access_msg"] = 'Изберете Групата Документи, на които е позволено да бъде модифицирано съдържанието или стойността на тази променлива';
$_lang["tmplvar_change_template_msg"] = 'Промяната на този шаблон ще доведе до презареждане на Шаблонните Променливи (ШП), като всички несъхранени промени ще бъдат загубени.\n\n Сигурни ли сте, че желаете да промените този шаблон?';
$_lang["tmplvar_inuse"] = 'Следните документ(и) използват тази Шаблонни Променливи (ШП). За да продължите изтриването щракнете на бутона Изтриване, в противен случай щракнете бутона Отказ.';
$_lang["tmplvar_tmpl_access"] = 'Достъп до шаблона';
$_lang["tmplvar_tmpl_access_msg"] = 'Изберете шаблоните, към които е разрешен достъпа/изпълнението на тази променлива';
$_lang["tmplvars_binding_msg"] = 'Това поле поддържа свързване на данните в кода, като се използват @ команди';
$_lang["tmplvars_caption"] = 'Заглавие';
$_lang["tmplvars_default"] = 'Стойност по подразбиране';
$_lang["tmplvars_description"] = 'Описание';
$_lang["tmplvars_elements"] = 'Въвеждане на допълнителни стойности';
$_lang["tmplvars_inherited"] = 'Value inherited';
$_lang["tmplvars_management_msg"] = 'Управление на полетата за допълнително поотребителско съдържание (Шаблонни Променливи) за документите.';
$_lang["tmplvars_msg"] = 'Добавете или редактирайте Шаблонните Променливи тук. Шаблонните Променливи трябва да са присвоени към шаблон, за да бъдат достъпни от снипетите и документите.';
$_lang["tmplvars_name"] = 'Име на променлива';
$_lang["tmplvars_novars"] = 'Не са намерени Шаблонни Променливи';
$_lang["tmplvars_rank"] = 'Начин на сортиране';
$_lang["tmplvars_rank_edit_message"] = 'Drag to reorder the Template Variables.';
$_lang["tmplvars_reset_params"] = 'Ресет параметри';
$_lang["tmplvars_title"] = 'Create/edit Template Variable';
$_lang["tmplvars_type"] = 'Input Type';
$_lang["tmplvars_widget"] = 'Уиджет';
$_lang["tmplvars_widget_prop"] = 'Свойства на Уиджета';
$_lang["role_no_tv"] = 'No Variables have been assigned to this Role yet.';
$_lang["role_notassigned_tv"] = 'These Variables are available for assigning.';
$_lang["role_tv_msg"] = 'The Variables assigned to this Role are listed below.';
$_lang["tmplvar_roles_access_msg"] = 'Select the Roles that are allowed to access/process this Template Variable';

// snippets
$_lang["snippet"] = 'Снипет';
$_lang["snippets"] = 'Snippets';
$_lang["snippet_code"] = 'Код на снипета (php)';
$_lang["snippet_desc"] = 'Описание';
$_lang["snippet_execonsave"] = 'Изпълни снипета след съхранение.';
$_lang["snippet_management_msg"] = 'Тук можете да изберете кой снипет желаете да редактирате.';
$_lang["snippet_msg"] = 'Тук можете да добавяте/редактирате снипети. Запомнете, снипетите са \'суров\' PHP код, и ако желаете резултата от изпълнението на снипета да бъде изведено на определено място в шаблона, трябва да му зададете стойност.';
$_lang["snippet_name"] = 'Име на снипета';
$_lang["snippet_properties"] = 'Свойства по подразбиране';
$_lang["snippet_title"] = 'Създаване/редактиране на снипет';

// chunks
$_lang["htmlsnippet"] = 'Chunk';
$_lang["htmlsnippets"] = 'Chunks';
$_lang["htmlsnippet_desc"] = 'Описание';
$_lang["htmlsnippet_management_msg"] = 'Тук избирате кой чънк желаете да редактирате.';
$_lang["htmlsnippet_msg"] = 'Тук можете да добавяте/редактирате чънкове. Запомнете, че чънковете са \'суров\' HTML код, така, че няма да се изпълнява какъвто и да е PHP код.';
$_lang["htmlsnippet_name"] = 'Име на чънка';
$_lang["htmlsnippet_title"] = 'Създаване/Редактиране на чънк';
$_lang["chunk"] = 'Чънк';
$_lang["chunk_code"] = 'Код на Чънка (html)';
$_lang["chunk_multiple_id"] = 'Error: Multiple Chunks share the same unique ID.';
$_lang["chunk_no_exist"] = 'Chunk does not exist.';

// plugins
$_lang["plugin"] = 'Плъгин';
$_lang["plugins"] = 'Plugins';
$_lang["plugin_code"] = 'Код на плъгина (php)';
$_lang["plugin_config"] = 'Конфигурация на плъгин';
$_lang["plugin_desc"] = 'Описание';
$_lang["plugin_disabled"] = 'Плъгина не е разрешен';
$_lang["plugin_event_msg"] = 'Изберете събитията, за които желаете този плъгин да следи.';
$_lang["plugin_management_msg"] = 'Тук можете да изберете кой плъгин да редактирате.';
$_lang["plugin_msg"] = 'Тук можете да добавяте/редактирате плъгини. Плъгините са \'сурови\' PHP кодове, които се викат всеки път, когато избраното Системно Събитие е задействано.';
$_lang["plugin_name"] = 'Име на плъгин';
$_lang["plugin_priority"] = 'Редактирайте реда за изпълнение на плъгина по събитие';
$_lang["plugin_priority_instructions"] = 'Drag to reorder the Plugins under each Event header. The first plugin to execute should go at the top.';
$_lang["plugin_priority_title"] = 'Plugin Execution Order';
$_lang["purge_plugin"] = 'Purge obsolete plugins';
$_lang["purge_plugin_confirm"] = 'Are you sure you want to purge obsolete plugins?';
$_lang["plugin_title"] = 'Създаване/редактиране на плъгин';

// categories
$_lang["category"] = 'Category';
$_lang["categories"] = 'Categories';
$_lang["category_heading"] = 'Категория';
$_lang["category_manager"] = 'Category Manager';
$_lang["category_management"] = 'Category management';
$_lang["category_msg"] = 'Тук можете да разгледате и редактирате всички ресурси групирани по категория.';

// file
$_lang["file_delete_file"] = 'Изтриване на Файл';
$_lang["file_delete_folder"] = 'Изтриване на Папка';
$_lang["file_deleted"] = 'Успешно!';
$_lang["file_download_file"] = 'Даунлоудване на Файл';
$_lang["file_download_unzip"] = 'Разархивиране на Файл';
$_lang["file_folder_chmod_error"] = 'Неуспешна промяна на правата за достъп, трябва да ги смените извън EVO.';
$_lang["file_folder_created"] = 'Създаването на папката е успешно!';
$_lang["file_folder_deleted"] = 'Папката е успешно изтрита!';
$_lang["file_folder_not_created"] = 'Не може да бъде създадена папка';
$_lang["file_folder_not_deleted"] = 'Не може да бъде изтрита папка. Уверете се, че папката е празна преди да я изтриете!';
$_lang["file_not_deleted"] = 'Неуспешно!';
$_lang["file_not_saved"] = 'Файлът не може да бъде съхранен. Уверете се, че избраната директория е достъпна за запис!';
$_lang["file_saved"] = 'Файлът е обновен успешно!';
$_lang["file_unzip"] = 'Разархивирането е успешно!';
$_lang["file_unzip_fail"] = 'Грешка при разархивирането!';

// files
$_lang["files"] = 'Files';
$_lang["files_files"] = 'Файлове';
$_lang["files_access_denied"] = 'Достъпът забранен!';
$_lang["files_data"] = 'Данни';
$_lang["files_dir_listing"] = 'Списък на файловете в директорията за:';
$_lang["files_directories"] = 'Директории';
$_lang["files_directory_is_empty"] = 'This directory is empty.';
$_lang["files_dirwritable"] = 'Директорията разрешена ли е за писане?';
$_lang["files_editfile"] = 'Редактиране на файл';
$_lang["files_file_type"] = 'Тип на файл: ';
$_lang["files_filename"] = 'Име на файл';
$_lang["files_fileoptions"] = 'Опции';
$_lang["files_filesize"] = 'Размер на файл';
$_lang["files_filetype_notok"] = 'Ъплоудването на този тип файлове не е позволено!';
$_lang["files_management"] = 'Manage Files';
$_lang["files_management_no_permission"] = 'You do not have enough permissions to view or edit these files. Ask the administrator to grant you access to <b>%s</b>.';
$_lang["files_modified"] = 'Модифициран';
$_lang["files_top_level"] = 'Към най-горно ниво';
$_lang["files_up_level"] = 'Едно ниво нагоре';
$_lang["files_upload_copyfailed"] = 'Несполучлив опит за ъплоудване на файл в директорията - ъплоудването неуспешно!';
$_lang["files_upload_error"] = 'Грешка';
$_lang["files_upload_error0"] = 'Възникна проблем при ъплоудването.';
$_lang["files_upload_error1"] = 'Файлът, който се опитвате да ъплоуднете е твърде голям.';
$_lang["files_upload_error2"] = 'Файлът, който се опитвате да ъплоуднете е твърде голям.';
$_lang["files_upload_error3"] = 'Файлът, който се опитвате да ъплоуднете е частично ъплоуднат.';
$_lang["files_upload_error4"] = 'Трябва да изберете файл за ъплоудване.';
$_lang["files_upload_error5"] = 'Възникна проблем при ъплоудването.';
$_lang["files_upload_inhibited_msg"] = '<b>Опцията за ъплоудване е забранена</b> - уверете се, че се поддържа ъплоудване и директорията е достъпна за запис за PHP.<br />';
$_lang["files_upload_ok"] = 'Файлът е ъплоуднат успешно!';
$_lang["files_upload_permissions_error"] = 'Possible permission problems - the directory you want to upload to needs to be writable by your webserver.';
$_lang["files_uploadfile"] = 'Ъплоудване на файл';
$_lang["files_uploadfile_msg"] = 'Избор на файл за ъплоудване:';
$_lang["files_uploading"] = 'Ъплоудване на <b>%s</b> в <b>%s/</b><br />';
$_lang["files_viewfile"] = 'Разглеждане на файл';

// modules
$_lang["module"] = 'Module';
$_lang["modules"] = 'Модули';
$_lang["module_code"] = 'Код на модула (php)';
$_lang["module_config"] = 'Конфигурация на модул';
$_lang["module_desc"] = 'Описание';
$_lang["module_disabled"] = 'Модулът е спрян';
$_lang["module_edit_click_title"] = 'Щракнете тук, за да редактирате този модул';
$_lang["module_group_access_msg"] = 'Изберете потребителските групи, имащи права да стартират този модул от Мениджъра.';
$_lang["module_management"] = 'Управление на Модули';
$_lang["module_management_msg"] = 'Тук можете да изберете модула, който желаете да стартирате или модифицирате. За да стартирате модул, щракнете върху иконата в таблицата. За да модифицирате модул, кликнете върху името на модула.';
$_lang["module_msg"] = 'Тук можете да Добавяте/Редактирате Модули. Модулът представлява колекция от ресурси (т.е. плъгини, снипети, и др.).';
$_lang["module_name"] = 'Име на модул';
$_lang["module_resource_msg"] = 'Тук можете да добавяте или премахвате ресурсите, от които зависи този модул. За да добавите нов ресурс щракнете на един от бутоните за добавяне по-долу.';
$_lang["module_resource_title"] = 'Взаимовръзки на модула';
$_lang["module_title"] = 'Създаване/Редактиране на Модул';
$_lang["module_viewdepend_msg"] = 'Тук можете да видите съответните ресурси, от които той зависи. Щракнете на бутона \'Взаимовръзки\' , за да модифицирате взаимовръзките';

// elements
$_lang["element"] = 'Ресурс';
$_lang["elements"] = 'Ресурси';
$_lang["element_categories"] = 'Комбинирано разглеждане';
$_lang["element_filter_msg"] = 'Type here to filter list';
$_lang["element_management"] = 'Управление на Ресурсите';
$_lang["element_name"] = 'Име на ресурс';
$_lang["element_selector_msg"] = 'Изберете ресурс(и) от списъка по-долу и щракнете бутона \'Вмъкнете\'.';
$_lang["element_selector_title"] = 'Избор на ресурси';

// resource
$_lang["resource"] = 'Документ';
$_lang["resource_alias"] = 'Псевдоним на документа';
$_lang["resource_alias_help"] = 'Тук можете да изберете псевдоним за този Документ. Така ще можете да достъпвате документа по този начин:\n\nhttp://yourserver/alias\n\nТова работи само при условие, че използвате приятелски URL адрес.';
$_lang["resource_content"] = 'Съдържание на Документ';
$_lang["resource_description"] = 'Описание';
$_lang["resource_description_help"] = 'При желание, тук можете да въведете описание на документа.';
$_lang["resource_duplicate"] = 'Дублиране на Документ';
$_lang["resource_long_title_help"] = 'Тук можете да въведете дълго заглавие на вашия документ. Това е удобно за търсачките и може да бъде по-описателно.';
$_lang["resource_metatag_help"] = 'Изберете META таговете или ключовите думи, които желаете да присвоите на този документo. Задръжте натиснат клавиша CTRL, за да изберете повече ключови думи или мета тагове.';
$_lang["resource_opt_contentdispo"] = 'Разположение на съдържанието';
$_lang["resource_opt_contentdispo_help"] = 'Използвайте полето за разположение на съдържанието, за да определите как документа Ви да изглежда във браузера. За даунлоад на файлове, изберете опцията Прикрепен файл.';
$_lang["resource_opt_emptycache"] = 'Изчистване на кеша?';
$_lang["resource_opt_emptycache_help"] = 'Оставяйки това поле маркирано, ще накара EVO да изчисти кеша след съхраняване на документа. По този начин потребителите няма да видят някоя стара версия на документа.';
$_lang["resource_opt_folder"] = 'Контейнер?';
$_lang["resource_opt_folder_help"] = 'Маркирайте, за да може този документ да стане контейнер за други документи. \'Контейнерът\' прилича на папка, с разликата, че може също така да има и съдържание.';
$_lang["resource_opt_menu_index"] = 'Индекс на менюто';
$_lang["resource_opt_menu_index_help"] = 'Индекса на менюто е поле, което можете да използвате за сортиране на документ във Вашия меню снипет. Също така, можете да използвате полето и за други цели в снипета си.';
$_lang["resource_opt_menu_title"] = 'Заглавие на менюто';
$_lang["resource_opt_menu_title_help"] = 'Заглавието на Менюто е поле, което можете да използвате за показване на кратко заглавие за документа, вътре в меню снипета или модулите.';
$_lang["resource_opt_published"] = 'Публикуван?';
$_lang["resource_opt_published_help"] = 'Сложете отметка на полето, за да публикувате документа веднага след съхраняването му.';
$_lang["resource_opt_richtext"] = 'Редактор?';
$_lang["resource_opt_richtext_help"] = 'Оставете маркирано, за да използвате текстови редактор за редактиране на документите. В случай, че документите Ви съдържат JavaScript и форми, махнете отметката, за да редактирате в HTML режим, за да не Ви се прецака документа с редактора.';
$_lang["resource_opt_show_menu"] = 'Показване в менюто';
$_lang["resource_opt_show_menu_help"] = 'Изберете тази опция, за да се покаже документа вътре в уеб менюто. Имайте предвид, че някои програми за правене на менюта могат да игнорират тази опция.';
$_lang["resource_opt_trackvisit_help"] = 'Логване на посещения на потребителите на тази страница';
$_lang["resource_overview"] = 'Преглед на Документа';
$_lang["resource_parent"] = 'Родител на Документа';
$_lang["resource_parent_help"] = 'Щракнете на горната икона, за да разрешите (или забраните) избирането на родителя на този документ. След това, щракнете върху документ от дървото, за да укажете неговия нов родителски документ.';
$_lang["resource_permissions_error"] = 'Assign this Resource to at least one Resource Group to which you have access.';
$_lang["resource_setting"] = 'Настройки на Документа';
$_lang["resource_summary"] = 'Резюме (introtext)';
$_lang["resource_summary_help"] = 'Въведете кратко резюме за документа';
$_lang["resource_title"] = 'Заглавие';
$_lang["resource_title_help"] = 'Въведете името/заглавието на документа тук. Опитайте се да не използвате обратни наклонени черти в името!';
$_lang["resource_to_be_moved"] = 'Документ за преместване';
$_lang["resource_type"] = 'Resource Type';
$_lang["resource_type_message"] = 'Weblinks reference Resources on the Internet including another Evolution CMS Resource, an external page, or an image or other file on the Internet. Weblinks should have a text/html Internet Media Type and Inline Content-Disposition.';
$_lang["resource_type_weblink"] = 'Weblink';
$_lang["resource_type_webpage"] = 'Web page';
$_lang["resource_weblink_help"] = 'Въведете адреса на обекта, който желаете да отнесете към този уеблинк тук.';
$_lang["resources_in_container"] = 'документи в този контейнер';
$_lang["resources_in_container_no"] = 'Този контейнер няма никакви дъщерни документи.';

// role
$_lang["role"] = 'Роля';
$_lang["role_about"] = 'Преглед на страницата за самата система';
$_lang["role_actionok"] = 'Преглед на екрана с приключилите действия';
$_lang["role_assets_images"] = 'Manage assets/images';
$_lang["role_assets_files"] = 'Manage assets/files';
$_lang["role_bk_manager"] = 'Използване на Мениджъра за съхранение';
$_lang["role_cache_refresh"] = 'Изчистване на кеша на сайта';
$_lang["role_category_manager"] = 'Use the Category Manager';
$_lang["role_change_password"] = 'Смяна на паролата';
$_lang["role_change_resourcetype"] = 'Промяна Вид документ';
$_lang["role_chunk_management"] = 'Управление на чънковете';
$_lang["role_config_management"] = 'Управление на конфигурацията';
$_lang["role_content_management"] = 'Управление на съдържанието';
$_lang["role_create_chunk"] = 'Създаване на нови чънкове';
$_lang["role_create_doc"] = 'Създаване на нови документи';
$_lang["role_create_plugin"] = 'Създаване на нови плъгини';
$_lang["role_create_snippet"] = 'Създаване на нови снипети';
$_lang["role_create_template"] = 'Създаване на нови шаблони за сайта';
$_lang["role_credits"] = 'Преглед на страницата със заслугите';
$_lang["role_delete_chunk"] = 'Изтриване на чънкове';
$_lang["role_delete_doc"] = 'Изтриване на документи';
$_lang["role_delete_eventlog"] = 'Изтриване на Дневника на събитията';
$_lang["role_delete_module"] = 'Изтриване на модул';
$_lang["role_delete_plugin"] = 'Изтриване на плъгини';
$_lang["role_delete_role"] = 'Изтриване на роли';
$_lang["role_delete_snippet"] = 'Изтриване на снипети';
$_lang["role_delete_template"] = 'Изтриване на шаблони';
$_lang["role_delete_user"] = 'Изтриване на потребители';
$_lang["role_delete_web_user"] = 'Изтриване на уеб потребители';
$_lang["role_edit_chunk"] = 'Редактиране на чънкове';
$_lang["role_edit_doc"] = 'Редактиране на документ';
$_lang["role_edit_doc_metatags"] = 'Редактиране на META тагове и ключови думи на документ';
$_lang["role_edit_module"] = 'Редактиране на модул';
$_lang["role_edit_plugin"] = 'Редактиране на плъгини';
$_lang["role_edit_role"] = 'Редактиране на роли';
$_lang["role_edit_settings"] = 'Промяна на настройките на сайта';
$_lang["role_edit_snippet"] = 'Редактиране на снипети';
$_lang["role_edit_template"] = 'Редактиране на шаблоните на сайта';
$_lang["role_edit_user"] = 'Редактиране на потребители';
$_lang["role_edit_web_user"] = 'Редактиране на уеб потребители';
$_lang["role_empty_trash"] = 'Трайно изчистване на изтритите документи';
$_lang["role_errors"] = 'Преглед на грешките';
$_lang["role_eventlog_management"] = 'Управление на Дневника на събитията';
$_lang["role_export_static"] = 'Експорт в статичен HTML';
$_lang["role_file_management"] = 'File Management';
$_lang["role_file_manager"] = 'Използване на файлов мениджър';
$_lang["role_frames"] = 'Викане на мениджъра';
$_lang["role_help"] = 'Преглед на страниците Помощ';
$_lang["role_home"] = 'Викане на началната страница на мениджъра';
$_lang["role_import_static"] = 'Импорт на HTML';
$_lang["role_logout"] = 'Изход от мениджъра';
$_lang["role_list_module"] = 'List Module';
$_lang["role_manage_metatags"] = 'Управление на META тагове и ключови думи на сайта';
$_lang["role_management_msg"] = 'Тук можете да изберете коя роля да редактирате.';
$_lang["role_management_title"] = 'Роли';
$_lang["role_messages"] = 'Преглед и изпращане на съобщения';
$_lang["role_module_management"] = 'Управление на модул';
$_lang["role_name"] = 'Име на роля';
$_lang["role_new_module"] = 'Създаване на нов модул';
$_lang["role_new_role"] = 'Създаване на нова роля';
$_lang["role_new_user"] = 'Създаване на нови потребители';
$_lang["role_new_web_user"] = 'Създаване на нови уеб потребители';
$_lang["role_plugin_management"] = 'Управление на Плъгини';
$_lang["role_publish_doc"] = 'Публикуване на документ';
$_lang["role_remove_locks"] = 'Remove Locks';
$_lang["role_role_management"] = 'Роли';
$_lang["role_run_module"] = 'Стартиране на модул';
$_lang["role_save_chunk"] = 'Съхраняване на чънкове';
$_lang["role_save_doc"] = 'Съхраняване на документи';
$_lang["role_save_module"] = 'Съхраняване на модули';
$_lang["role_save_password"] = 'Съхраняване на парола';
$_lang["role_save_plugin"] = 'Съхраняване на плъгини';
$_lang["role_save_role"] = 'Съхраняване на роли';
$_lang["role_save_snippet"] = 'Съхраняване на снипети';
$_lang["role_save_template"] = 'Съхраняване на шаблони';
$_lang["role_save_user"] = 'Съхраняване на потребители';
$_lang["role_save_web_user"] = 'Съхраняване на уеб потребители';
$_lang["role_snippet_management"] = 'Управление на Снипети';
$_lang["role_template_management"] = 'Управление на Шаблони';
$_lang["role_title"] = 'Създаване/редактиране на роля';
$_lang["role_udperms"] = 'Управление на правата за достъп';
$_lang["role_user_management"] = 'Управление на потребителите';
$_lang["role_view_docdata"] = 'Преглед на данните в документа';
$_lang["role_view_eventlog"] = 'Преглед на Дневника на събитията';
$_lang["role_view_logs"] = 'Преглед на системните логове';
$_lang["role_view_unpublished"] = 'Преглед на непубликувани документи';
$_lang["role_web_access_persmissions"] = 'Права за уеб достъп';
$_lang["role_web_user_management"] = 'Управление на уеб потребителите';

// user
$_lang["user"] = 'Потребител';
$_lang["users"] = 'Сигурност';
$_lang["user_block"] = 'Блокиран';
$_lang["user_blockedafter"] = 'Блокиран след';
$_lang["user_blockeduntil"] = 'Блокиран до';
$_lang["user_changeddata"] = 'Вашите данни са променени. Моля, влезте отново.';
$_lang["user_country"] = 'Държава';
$_lang["user_dob"] = 'Дата на раждане';
$_lang["user_doesnt_exist"] = 'Потребителят не съществува';
$_lang["user_edit_self_msg"] = '<b>След съхраняване трябва да излезете и влезете в системата отново, за да се обнови информацията напълно.</b><br />Също така, ако изберете сами да си генерирате парола, тя ще бъде изпратена на пощата ви.';
$_lang["user_email"] = 'Емейл адрес';
$_lang["user_failedlogincount"] = 'Грешни влизания';
$_lang["user_fax"] = 'Факс';
$_lang["user_female"] = 'Жена';
$_lang["user_full_name"] = 'Пълно име';
$_lang["user_first_name"] = 'First name';
$_lang["user_last_name"] = 'Last Name';
$_lang["user_middle_name"] = 'Middle Name';
$_lang["user_gender"] = 'Пол';
$_lang["user_is_blocked"] = 'Този потребител е блокиран!';
$_lang["user_logincount"] = 'Брой на влизанията';
$_lang["user_male"] = 'Мъж';
$_lang["user_management_msg"] = 'Тук можете да изберете кой потребител на мениджъра желаете да редактирате. Потребители на Мениджъра са тези потребители, които имат права за достъп до Мениджъра';
$_lang["user_management_title"] = 'Потребители на Мениджъра';
$_lang["user_mobile"] = 'Мобилен телефон';
$_lang["user_phone"] = 'Телефонен номер';
$_lang["user_photo"] = 'Снимка';
$_lang["user_photo_message"] = 'Въведи URL адрес на файла със снимката на този потребител или използвай бутона за добавяне на съответния файл или ъплоудвай файла със снимката на сървъра.';
$_lang["user_prevlogin"] = 'Последно влизане';
$_lang["user_role"] = 'Роля на потребител';
$_lang["no_user_role"] = 'No user role';
$_lang["user_state"] = 'Състояние на потребител';
$_lang["user_title"] = 'Създаване/Редактиране на потребител';
$_lang["user_upload_message"] = ' В случай, че не желаете този потребител да уплоудва каквито и да е файлове в тази категория, проверете дали полето с отметката \'Използване на настройките на основната конфигурация\' не е маркирано, и ако е - махнете отметката.';
$_lang["user_use_config"] = 'Използване на настройките на основната конфигурация';
$_lang["user_verification"] = 'User is verified';
$_lang["user_zip"] = 'Архив';
$_lang["username"] = 'Име на потребител';
$_lang["username_unique"] = 'User name is already in use!';
$_lang["user_street"] = 'Street';
$_lang["user_city"] = 'City';
$_lang["user_other"] = 'Other';

// add
$_lang["add"] = 'Добави';
$_lang["add_chunk"] = 'Добави Чънк';
$_lang["add_doc"] = 'Добави Документ';
$_lang["add_folder"] = 'Нова Папка';
$_lang["add_plugin"] = 'Добави Плъгин';
$_lang["add_resource"] = 'Нов Документ';
$_lang["add_snippet"] = 'Добави Снипети';
$_lang["add_tag"] = 'Добави Таг';
$_lang["add_template"] = 'Добави Шаблон';
$_lang["add_tv"] = 'Добави ШП';
$_lang["add_weblink"] = 'Нова Препратка';

// new
$_lang["new_category"] = 'Нова Категория';
$_lang["new_file_permissions_message"] = 'При ъплоудване на нов файл във файловия мениджър, той ще се опита да промени правата за достъп до файловете, с тези, които са въведени тук. Тази настройка може да не работи с IIS, като тогава ще се наложи ръчно да смените правата за достъп.';
$_lang["new_file_permissions_title"] = 'Нов файл - Права за достъп';
$_lang["new_folder_permissions_message"] = 'При създаване на нова папка във Файловия мениджър, той ще се опита да смени правата за достъп до нея с тези, които са въведени в тази настройка. Тази настройка може да не работи с IIS, като тогава ще се наложи ръчно да смените правата за достъп.';
$_lang["new_folder_permissions_title"] = 'Нова Папка - Права за достъп';
$_lang["new_permission"] = 'New Permission';
$_lang["new_htmlsnippet"] = 'Нов чънк';
$_lang["new_keyword"] = 'Добавете нова ключова дума:';
$_lang["new_module"] = 'Нов Модул';
$_lang["new_parent"] = 'Нов Родител';
$_lang["new_plugin"] = 'Нов плъгин';
$_lang["new_role"] = 'Създайте Нова Роля';
$_lang["new_snippet"] = 'Нов снипет';
$_lang["new_template"] = 'Нов шаблон';
$_lang["new_tmplvars"] = 'Нова ШП (Шаблонна променлива)';
$_lang["new_user"] = 'Нов Потребител';
$_lang["new_web_user"] = 'Нов Уеб Потребител';
$_lang["new_resource"] = 'New Resource';

// manage
$_lang["manage_categories"] = 'Manage Categories';
$_lang["manage_depends"] = 'Управление на взаимовръзките';
$_lang["manage_files"] = 'Управление на файловете';
$_lang["manage_htmlsnippets"] = 'Manage Chunks';
$_lang["manage_metatags"] = 'Управление на META тагове и Ключови думи';
$_lang["manage_modules"] = 'Управление на модули';
$_lang["manage_plugins"] = 'Manage Plugins';
$_lang["manage_snippets"] = 'Manage Snippets';
$_lang["manage_templates"] = 'Manage Templates';
$_lang["manage_documents"] = 'Manage Documents';
$_lang["manage_permission"] = 'Manage Permissions';

// move
$_lang["move"] = 'Преместете';
$_lang["move_resource"] = 'Преместете документ';
$_lang["move_resource_message"] = 'Можете да преместите един документ и всичките му наследници чрез избиране на новия родител от дървото. В случай, че изберете документ, който все още не е контейнер, то той ще бъде променен като такъв. Щракнете, за да изберете новия родител от дървото.';
$_lang["move_resource_new_parent"] = 'Моля, изберете нов родител от дървото с документи.';
$_lang["move_resource_title"] = 'Преместване на документ';

$_lang["access_permissions"] = 'Права за достъп';
$_lang["access_permission_denied"] = 'Нямате Права за Достъп за този Документ.';
$_lang["access_permission_parent_denied"] = 'Нямате Права да създавате Документ тук!';
$_lang["access_permissions_add_resource_group"] = 'Създайте нова Група Документи';
$_lang["access_permissions_add_user_group"] = 'Създайте нова Група Потребители';
$_lang["access_permissions_docs_message"] = 'Тук можете да изберете към коя Група Документи принадлежи този документ';
$_lang["access_permissions_group_link"] = 'Създаване на връзка към Нова Група';
$_lang["access_permissions_introtext"] = 'Тук можете да управлявате правата за достъп на Групата Потребители и Групата Документи. Също така можете да добавите или редактирате потребител и да изберете на коя група да е член. За да добавите Документ към определена Група Потребители, редактирайте Документа и изберете Групата, на която той трябва да принадлежи.';
$_lang["access_permissions_link_to_group"] = 'на Група Документи';
$_lang["access_permissions_context"] = 'in context';
$_lang["access_permissions_link_user_group"] = 'Присъединяване на Група Потребители';
$_lang["access_permissions_links"] = 'Връзки на Група Потребител/Документ';
$_lang["access_permissions_links_tab"] = 'Тук е мястото, където се определя на кои Групи Потребители са дадени права за достъп към Групите Документи (т.е. потребителите могат да редактират или създават дъщерни документи). За да свържете Групата Документи към Групата Потребители, изберете Групата от падащото меню и щракнете на \'Връзка\'. За да премахнете връзката за дадената Група, натиснете \'Премахни ->\'. По този начин връзката се премахва веднага.';
$_lang["access_permissions_no_resources_in_group"] = 'Няма.';
$_lang["access_permissions_no_users_in_group"] = 'Няма.';
$_lang["access_permissions_off"] = '<span class="warning">Правата за Достъп не са активирани.</span> Това означава, че всички направени промени тук няма да влязат в сила, докато Правата за Достъп не се активират.';
$_lang["access_permissions_resource_groups"] = 'Групи Документи';
$_lang["access_permissions_resources_in_group"] = '<b>Документи в група:</b> ';
$_lang["access_permissions_resources_tab"] = 'Тук можете да видите коя Група Документи е настроена. Също така можете да създадете Нова Група, преименувате Групи, изтриете Групи и да видите кои Документи са в различните Групи (сложете мишката върху id на Документа, за да видите неговото име). За да добавите или махнете Документ от групата, редактирайте директно.';
$_lang["access_permissions_user_toggle"] = 'Toggle access permissions';
$_lang["access_permissions_user_groups"] = 'Потребителски групи';
$_lang["access_permissions_user_message"] = 'Тук можете да изберете към кои Потребителски Групи принадлежи този Потребител:';
$_lang["access_permissions_users_in_group"] = '<b>Потребители в група:</b> ';
$_lang["access_permissions_users_tab"] = 'Тук можете да видите коя Група Потребители е настроена. Можете също да създавате Нови Групи, да преименувате Групи, да изтривате Групи и да видите Потребителите в различните Групи. За да добавите или премахнете Нов Потребител в дадена Група, редактирайте Потребителя директно. Администраторите (потребители, които имам присвоена Роля с ID 1) винаги имат достъп до всички документи, така че не е необходимо те да бъдат добавяни в каквато и да е група.';

$_lang["users_list"] = 'Users list';
$_lang["documents_list"] = 'Resources list';

$_lang["account_email"] = 'Емейл на акаунта';
$_lang["actioncomplete"] = '<b>Действието завърши успешно!</b><br />.';
$_lang["activity_message"] = 'Този списък показва наскоро създадени или редактирани Документи:';
$_lang["activity_title"] = 'Наскоро редактирани/създадени документи';

$_lang["administrator_role_message"] = 'Тази роля не може да бъде редактирана или изтрита.';
$_lang["administrators"] = 'Administrators';
$_lang["after_saving"] = 'След съхранение';
$_lang["alert_delete_self"] = 'Не можете да изтриете себе си!';
$_lang["alias"] = 'Псевдоним';
$_lang["all_doc_groups"] = 'Всички Групи Документи (Публичен)';
$_lang["all_events"] = 'Всички събития';
$_lang["all_usr_groups"] = 'Всички Групи Потребители (Публичен)';
$_lang["allow_mgr_access"] = 'Права за Достъп до интерфейса на Мениджъра';
$_lang["allow_mgr_access_message"] = 'Изберете тази опция, за да разрешите или забраните Достъпа до интерфейса на Мениджъра. <b>ЗАБЕЛЕЖКА: В случай, че е избрано НЕ, потребителят ще бъде пренасочен към началния екран за влизане в Мениджъра или към началната страница на сайта.</b>';
$_lang["already_deleted"] = 'вече е изтрит.';
$_lang["attachment"] = 'Прикрепен файл';
$_lang["author_infos"] = 'Author information';
$_lang["automatic_alias_message"] = 'Изберете \'Да\' , за да може системата автоматично да генерира псевдоним, на базата на заглавието на документа при съхраняването му.';
$_lang["automatic_alias_title"] = 'Автоматично генериране на псевдоним:';
$_lang["backup"] = 'Архив';
$_lang["bk_manager"] = 'Архив';
$_lang["block_message"] = 'Потребителят ще бъде блокиран след съхраняване на данните за него!';
$_lang["blocked_minutes_message"] = 'Тук можете да въведете броя на минутите, за които един потребител ще бъде блокиран, след като е достигнал максимално позволения брой на грешни опити за влизане. Моля, въведете само цифра (без запетаи, празни интервали и др.)';
$_lang["blocked_minutes_title"] = 'Минути, за които е блокиран:';
$_lang["cache_files_deleted"] = 'Следните файлове бяха изтрити:';
$_lang["cancel"] = 'Отмяна';
$_lang["captcha_code"] = 'Защитен код';
$_lang["captcha_message"] = 'Разрешете това, за да засилите сигурността, като изисквате от потребителите да въвеждат код, нечетим за компютъра (и хакерски скриптове).';
$_lang["captcha_title"] = 'Използване на CAPTCHA код:';
$_lang["captcha_words_default"] = 'MODX,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join(),Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote';
$_lang["captcha_words_message"] = 'Тук можете да въведете списък от CAPTCHA думи, които ще се използват, ако опцията за използване на CAPTCHA кода е включена. Разделете думите със запетаи. Полето е с лимит до 255 символа.';
$_lang["captcha_words_title"] = 'CAPTCHA Думи';

$_lang["cfg_base_path"] = 'MODX_BASE_PATH';
$_lang["cfg_base_url"] = 'MODX_BASE_URL';
$_lang["cfg_manager_path"] = 'MODX_MANAGER_PATH';
$_lang["cfg_manager_url"] = 'MODX_MANAGER_URL';
$_lang["cfg_site_url"] = 'MODX_SITE_URL';

$_lang["change_name"] = 'Смяна на името';
$_lang["change_password"] = 'Смяна на паролата';
$_lang["change_password_confirm"] = 'Потвърждаване на паролата';
$_lang["change_password_message"] = 'Моля въведете нова парола и я потвърдете отново. Паролата трябва да бъде с дължина между 6 и 15 символа.';
$_lang["change_password_new"] = 'Нова парола';
$_lang["charset_message"] = 'Select the default character encoding for the [(modx_charset)] system variable. This does not affect the Manager.';
$_lang["charset_title"] = 'Character encoding';

$_lang["cleaningup"] = 'Изчистване';
$_lang["clean_uploaded_filename"] = 'Use Transliteration for File Uploads';
$_lang["clean_uploaded_filename_message"] = 'Use the default or transalias settings for the file name to clean special characters from uploaded file names, preserving dot-characters (periods)';
$_lang["clear_log"] = 'Изчистете лог';
$_lang["click_to_context"] = 'Щракнете, за да достъпите контекстното меню';
$_lang["click_to_edit_title"] = 'Щракнете, за да редактирате този запис';
$_lang["click_to_view_details"] = 'Щракнете, за да разгледате детайлите';
$_lang["close"] = 'Затваряне';
$_lang["code"] = 'Code';
$_lang["collapse_tree"] = 'Свийте дървото';
$_lang["comment"] = 'Коментар';

$_lang["configcheck_admin"] = 'Моля, свържете се със системния администратор и съобщете за тази грешка!';
$_lang["configcheck_cache"] = 'cache directory is not writable';
$_lang["configcheck_cache_msg"] = 'Evolution CMS cannot write to the cache directory. Evolution CMS will still function as expected, but no caching will take place. To solve this, make the \'cache\' directory writable.';
$_lang["configcheck_configinc"] = 'Config файла все още е разрешен за запис';
$_lang["configcheck_configinc_msg"] = 'Моля, направете config файла (/[+MGR_DIR+]/includes/config.inc.php) достъпен само за четене, за да не се създават предпоставки за потенциално увреждане на Вашия сайт и всичко, свързано с него!';
$_lang["configcheck_default_msg"] = 'Неопределена грешка.';
$_lang["configcheck_errorpage_unavailable"] = 'Страницата с грешката, указана в конфигурацията на Вашия сайт не е достъпна.';
$_lang["configcheck_errorpage_unavailable_msg"] = 'Това означава, че страницата с грешката не е достъпна за нормалните уеб потребители или не съществува. Това може да доведе до състояние на зацикляне и много грешки в логовете на сайта. Уверете се, че няма никакви Групи на уеб потребители, прикачени към страницата.';
$_lang["configcheck_errorpage_unpublished"] = 'Страницата с грешката, указана в конфигурацията на Вашия сайт не е публикувана или не съществува.';
$_lang["configcheck_errorpage_unpublished_msg"] = 'Това означава, че страницата с грешката не е публично достъпна. Публикувайте страницата и се уверете, че тя е прикачена към съществуващ документ в дървото на сайта като отидете на Инструменти &gt; в менюто Конфигурация.';
$_lang["configcheck_filemanager_path"] = 'The currently set <a href="index.php?a=17&tab=4">File Manager path</a> seems incorrect.';
$_lang["configcheck_filemanager_path_msg"] = 'This can happen for example by moving your installation to a different directory or server. Please check and update your Evolution CMS configuration.';
$_lang["configcheck_hide_warning"] = '<a href="javascript:hideConfigCheckWarning(\'%s\');"><em>Don\'t show this again.</em></a>';
$_lang["configcheck_images"] = 'Директорията Images не е позволена за писане';
$_lang["configcheck_images_msg"] = 'Директорията с изображенията не е достъпна за запис или не съществува. Това означава, че функцията на Мениджъра за изображенията в редактора няма да работи!';
$_lang["configcheck_installer"] = 'инсталационната директория все още съществува';
$_lang["configcheck_installer_msg"] = 'Директорията install/ съдържа инсталационните файлове на EVO. Някой може да злоупотреби с информацията вътре в нея, ето защо е препоръчително папката да бъде изтрита от сървъра.';
$_lang["configcheck_lang_difference"] = 'Грешен брой записи в езиковия файл';
$_lang["configcheck_lang_difference_msg"] = 'Текущо избрания езиков файл има различен брой записи от езиковия файл по подразбиране. Това не е проблем, тъй като EVO ще работи нормално, но означава, че езиковия файл трябва бъде обновен.';
$_lang["configcheck_notok"] = 'Конфигурацията съдържа грешки: ';
$_lang["configcheck_ok"] = 'Проверката мина успешно.';
$_lang["configcheck_php_gdzip"] = 'GD and/or Zip PHP extensions not found';
$_lang["configcheck_php_gdzip_msg"] = 'Evolution CMS needs the GD and Zip extension enabled for PHP. While Evolution CMS will work without them, you will not be able to take full advantage of the built-in File Manager, Image Editor or Captcha for logins.';
$_lang["configcheck_rb_base_dir"] = 'The currently set <a href="index.php?a=17&tab=5">File base path</a> seems incorrect.';
$_lang["configcheck_rb_base_dir_msg"] = 'This can happen for example by moving your installation to a different directory or server. Please check and update your Evolution CMS configuration.';
$_lang["configcheck_register_globals"] = 'register_globals е установено на ON във Вашия php.ini конфигурационен файл';
$_lang["configcheck_register_globals_msg"] = 'Тази конфигурация прави сайта ви податлив към Cross Site Scripting (XSS) атаки. Трябва да се обърнете към Вашия хостинг какво да направите, за да забраните тази настройка.';
$_lang["configcheck_title"] = 'Проверка на конфигурацията';
$_lang["configcheck_templateswitcher_present"] = 'TemplateSwitcher Plugin detected';
$_lang["configcheck_templateswitcher_present_delete"] = '<a href="javascript:deleteTemplateSwitcher();">Delete TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_disable"] = '<a href="javascript:disableTemplateSwitcher();">Disable TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_msg"] = 'The TemplateSwitcher plugin has been found to cause caching and performance problems, and should be used only the functionality is required in your site.';
$_lang["configcheck_unauthorizedpage_unavailable"] = 'Страницата, показваща Неоторизиран достъп не е публикувана или не съществува.';
$_lang["configcheck_unauthorizedpage_unavailable_msg"] = 'Това означава, че страницата с Неоторизиран достъп не е достъпна за нормалните уеб потребители или не съществува. Това може да доведе до състояние на зацикляне и много грешки в логовете на сайта. Уверете се, че няма никакви Групи на уеб потребители, прикачени към страницата.';
$_lang["configcheck_unauthorizedpage_unpublished"] = 'Страницата с Неоторизиран достъп, указана в конфигурацията на Вашия сайт не е публикувана или не съществува.';
$_lang["configcheck_unauthorizedpage_unpublished_msg"] = 'Това означава, че страницата с грешката не е публично достъпна. Публикувайте страницата и се уверете, че тя е прикачена към съществуващ документ в дървото на сайта като отидете на Инструменти Tools &gt; в менюто Конфигурация.';
$_lang["configcheck_validate_referer"] = 'Security Warning: HTTP Header Validation';
$_lang["configcheck_validate_referer_msg"] = 'The configuration setting <strong>Validate HTTP_REFERER headers?</strong> is Off. We recommend turning it On. <a href="index.php?a=17">Go to Configuration options</a>';
$_lang["configcheck_warning"] = 'Грешки в конфигурацията:';
$_lang["configcheck_what"] = 'Какво означава това?';

$_lang["safe_mode_warning"] = 'Safe mode is enabled. Manager functionality is limited.';

$_lang["confirm_block"] = 'Сигурни ли сте, че желаете да блокирате този потребител?';
$_lang["confirm_delete_category"] = 'Are you sure you want to delete this category?';
$_lang["confirm_delete_eventlog"] = 'Сигурни ли сте, че желаете да изтриете този Дневник на събитията?';
$_lang["confirm_delete_file"] = 'Сигурни ли сте, че желаете да изтриете файла?\n\nТова може да наруши работоспособността на сайта! Изтрийте този файл, САМО ако сте сигурни, че това което правите няма да развали нещо.';
$_lang["confirm_delete_group"] = 'Are you sure you want to delete this group?';
$_lang["confirm_delete_htmlsnippet"] = 'Сигурни ли сте, че желаете да изтриете този чънк?';
$_lang["confirm_delete_keywords"] = 'Сигурни ли сте, че желаете да изтриете тези ключови думи?';
$_lang["confirm_delete_module"] = 'Сигурни ли сте, че желаете да изтриете този модул?';
$_lang["confirm_delete_plugin"] = 'Сигурни ли сте, че желаете да изтриете този плъгин?';
$_lang["confirm_delete_record"] = 'Сигурни ли сте, че желаете да изтриете избрания запис(и)?';
$_lang["confirm_delete_resource"] = 'Сигурни ли сте, че желаете да изтриете този документ?\nВсички дъщерни документи също ще бъдат изтрити.';
$_lang["confirm_delete_role"] = 'Сигурни ли сте, че желаете да изтриете тази роля?';
$_lang["confirm_delete_snippet"] = 'Сигурни ли сте, че желаете да изтриете този снипет?';
$_lang["confirm_delete_tags"] = 'Сигурни ли сте, че желаете да изтриете избраните META тагове?';
$_lang["confirm_delete_template"] = 'Сигурни ли сте, че желаете да изтриете този шаблони?';
$_lang["confirm_delete_tmplvars"] = 'Сигурни ли сте, че желаете да премахнете тази шаблонна променлива и всичките й съхранени стойности?';
$_lang["confirm_delete_user"] = 'Сигурни ли сте, че желаете да изтриете този потребител?';

$_lang["delete_yourself"] = 'You can\'t delete yourself';
$_lang["delete_last_admin"] = 'You can\'t delete last admin user';

$_lang["confirm_delete_permission"] = 'Are you sure you want to delete this Permission?';
$_lang["confirm_duplicate_record"] = 'Сигурни ли сте, че желаете да дублирате този запис?';
$_lang["confirm_empty_trash"] = 'ВСИЧКИ изтрити документи ще бъдат премахнати?\n\nЖелаете ли да продължите?';
$_lang["confirm_load_depends"] = 'Сигурни ли сте, че желаете да заредите екрана за управление на взаимовръзките без да съхраните вашите модификации?';
$_lang["confirm_name_change"] = 'Смяната на потребителското име може да окаже влияние на други приложения, които са свързани с Мениджъра. \n\n Сигурни ли сте, че желаете да смените това потребителско име?';
$_lang["confirm_publish"] = '\n\nПубликуването на този документ сега ще премахне всякакви предварително установени настройки на датата за публикуването или отмяна на публикуването му. В случай, че желаете да укажете нова дата за публикуване или не на документа, или да запазите старата дата - изберете \'Редактиране\' на документа.\n\nЖелаете ли да продължите?';
$_lang["confirm_remove_locks"] = 'Понякога потребителите затварят бразерите си докато редактират документи, шаблони, снипети или парсери, оставяйки елемента, който редактират в заключено състояние. Натискайки OK можете да премахнете ВСИЧКИ текущи блокировки.\n\nЖелаете ли да продължите?';
$_lang["confirm_reset_sort_order"] = 'Are you sure you want to reset the \"sort order/index\" of all listed elements to 0 ?';
$_lang["confirm_resource_duplicate"] = 'Сигурни ли сте, че желаете да дублирате този документ? Съдържанието му също ще бъде дублирано.';
$_lang["confirm_setting_language_change"] = 'You have modified the default value and will lose the changes. Proceed?';
$_lang["confirm_unblock"] = 'Сигурни ли сте, че желаете да отблокирате този потребител?';
$_lang["confirm_undelete"] = '\n\nВсички дъщерни документи, изтрити заедно с този документ, ще бъдат възстановени. Дъщерните документи, изтрити по-рано няма да бъдат възстановени.';
$_lang["confirm_unpublish"] = '\n\nОтмяната за публикуване на този документ сега, ще изтрие всички предварително указани дати за публикуването или отмяната му. В случай, че желаете да укажете нова дата за публикуване или не на документа, или да запазите старата дата - изберете  \'Редактиране\' на документа.\n\nЖелаете ли да продължите?';
$_lang["confirm_unzip_file"] = 'Сигурни ли сте, че желаете да разархивирате този файл?\n\nСъществуващите файлове ще бъдат презаписани.';

$_lang["could_not_find_user"] = 'Потребителят не може да бъде намерен';

$_lang["create_folder_here"] = 'Създайте папка тук';
$_lang["create_resource_here"] = 'Създайте документ тук';
$_lang["create_resource_title"] = 'Create Resource';
$_lang["create_weblink_here"] = 'Създайте препратка тук';
$_lang["createdon"] = 'Дата на създаване';
$_lang["create_new"] = 'Create new';

$_lang["credits"] = 'Екипът на EVO';
$_lang["credits_shouts_msg"] = '<p>Evolution CMS is managed and maintained at <a href="https://evo-cms.com/" target="_blank">evo-cms.com</a>.</p>';
$_lang["custom_contenttype_message"] = 'Тук можете да добавите типовете потребителско съдържание, които могат да бъдат използвани във Вашите документи. За да добавите нов запис, въведете типа на съдържанието в текстовото поле и след това щракнете на бутона \'Добавяне\'.';
$_lang["custom_contenttype_title"] = 'Потребителски типове съдържание:';

$_lang["database_charset"] = 'Кодова таблица на базата от данни';
$_lang["database_collation"] = 'Кодова таблица на Колациите на базата от данни';
$_lang["database_name"] = 'Име на базата от данни';
$_lang["database_overhead"] = '<b style=\'color:#990033\'>ЗАБЕЛЕЖКА:</b> Загубеното място е неизползвано пространство, резервирано от MySQL. За да освободите това пространство, щракнете върху картинката на загубеното място в таблицата.';
$_lang["database_server"] = 'Сървъра, където е базата от данни';
$_lang["database_table_clickbackup"] = 'за архивиране & даунлоудване на избраните таблици';
$_lang["database_table_clickhere"] = 'Щракнете тук';
$_lang["database_table_datasize"] = 'Големина на данните';
$_lang["database_table_droptablestatements"] = 'Генерирайте DROP TABLE отчет.';
$_lang["database_table_effectivesize"] = 'Действителен размер';
$_lang["database_table_indexsize"] = 'Размер на индекса';
$_lang["database_table_overhead"] = 'Загубено място';
$_lang["database_table_records"] = 'Записи';
$_lang["database_table_tablename"] = 'Име на таблица';
$_lang["database_table_totals"] = 'Общо:';
$_lang["database_table_totalsize"] = 'Общ размер';
$_lang["database_tables"] = 'Таблиците на базата от данни';
$_lang["database_version"] = 'Версия на базата от данни:';

$_lang["date"] = 'Дата';
$_lang["datechanged"] = 'Датата е сменена';
$_lang["datepicker_offset"] = 'Datepicker offset';
$_lang["datepicker_offset_message"] = 'The number of years to show in the past on the datepicker.';
$_lang["datetime_format"] = 'Date format';
$_lang["datetime_format_message"] = 'The format for dates in the Manager.';

$_lang["default"] = 'Default:';
$_lang["defaultcache_message"] = 'Изберете \'Да\', за да направите всички нови документи да се кешират по подразбиране.';
$_lang["defaultcache_title"] = 'Кеширане по подразбиране';
$_lang["defaultmenuindex_message"] = 'Изберете \'Да\', за да включите автоматично нарастване на индекса в менюто по подразбиране.';
$_lang["defaultmenuindex_title"] = 'Индексиране на менюто по подразбиране';
$_lang["defaultpublish_message"] = 'Изберете \'Да\', за да може всички нови документи да се публикуват по подразбиране.';
$_lang["defaultpublish_title"] = 'Публикуван по подразбиране';
$_lang["defaultsearch_message"] = 'Изберете \'Да\', за да може всички нови документи да са достъпни за търсене по подразбиране.';
$_lang["defaultsearch_title"] = 'Достъпен за търсене по подразбиране';
$_lang["defaulttemplate_message"] = 'Изберете шаблон, който ще се прилага в нов документ по подразбиране. Можете да изберете различен шаблон за редактора на документа, тази настройка ще преизбере един от вашите шаблони.';
$_lang["defaulttemplate_title"] = 'Шаблон по подразбиране';
$_lang["defaulttemplate_logic_title"] = 'Automatic Template Assignment';
$_lang["defaulttemplate_logic_general_message"] = 'New Resources will have the following templates, falling back to higher levels if not found:';
$_lang["defaulttemplate_logic_system_message"] = '<strong>System</strong>: the System Default Template.';
$_lang["defaulttemplate_logic_parent_message"] = '<strong>Parent</strong>: the same Template as the parent container.';
$_lang["defaulttemplate_logic_sibling_message"] = '<strong>Sibling</strong>: the same Template as other Resources in the same container.';

$_lang["delete"] = 'Изтриване';
$_lang["delete_resource"] = 'Изтриване на Документ';
$_lang["delete_tags"] = 'Изтриване на тагове';
$_lang["deleting_file"] = 'Изтриване на файл `%s`: ';
$_lang["description"] = 'Описание';
$_lang["deselect_keywords"] = 'Премахване на ключовите думи';
$_lang["deselect_metatags"] = 'Изчистване на META таговете';
$_lang["disabled"] = 'Изключен';
$_lang["doc_data_title"] = 'Преглед на данните в документа';
$_lang["documentation"] = 'Documentation';

$_lang["duplicate"] = 'Дублирайте';
$_lang["duplicate_alias_found"] = 'Документ \'%s\' използва вече псевдоним \'%s\'. Моля, въведете уникален псевдоним.';
$_lang["duplicate_template_alias_found"] = 'Template \'%s\' is already using the URL alias \'%s\'. Please enter a unique alias.';
$_lang["duplicate_alias_message"] = 'Тук можете да изберете \'Да\' , за да разрешите съхранението на дублирани псевдоними. <b>ЗАБЕЛЕЖКА: Тази опция трябва да се използва след избирането на  \'Да\' на \'Път на псевдонима\', за да се избегнат проблемите при обръщение към документа.</b>';
$_lang["duplicate_alias_title"] = 'Разрешете дублиране на псевдонимите:';
$_lang["duplicate_name_found_general"] = 'There is already a %s named \'%s\'. Please enter a unique name.';
$_lang["duplicate_name_found_module"] = 'There is already a Module named \'%s\'. Please enter a unique name.';
$_lang["duplicated_el_suffix"] = 'Duplicate';

$_lang["edit"] = 'Редактиране';
$_lang["edit_resource"] = 'Редактиране на Документ';
$_lang["edit_resource_title"] = 'Създаване/Редактиране на Документ';
$_lang["edit_settings"] = 'Конфигурация';
$_lang["editedon"] = 'Редактиране на дата';
$_lang["editing_file"] = 'Редактиране на файл: ';
$_lang["editor_css_path_message"] = 'Въведете пътя към Вашия CSS файл, който желаете да използвате в редактора. Най-добрият начин да направите това е да въведете пътя от основната директория на Вашия сървър, например: /assets/site/style.css. В случай, че не желаете да зареждате CSS файл в редактора, оставете полето празно.';
$_lang["editor_css_path_title"] = 'Път към CSS файла:';

$_lang["email"] = 'Em@il';
$_lang["email_sent"] = 'Емейлът е изпратен';
$_lang["email_unique"] = 'Email is already in use!';
$_lang["emailsender_message"] = 'Тук можете да въведете емейл адреса, който ще използвате, за да изпращате на потребителите техните потребителски имена и пароли.';
$_lang["emailsender_title"] = 'Емейл адрес:';
$_lang["emailsubject_default"] = 'Your login details';
$_lang["emailsubject_message"] = 'Тук можете да въведете темата на емейла за регистрация.';
$_lang["emailsubject_title"] = 'Тема на емейла:';

$_lang["empty_folder"] = 'Тази папка е празна';
$_lang["empty_recycle_bin"] = 'Изчистване на изтритите документи';
$_lang["empty_recycle_bin_empty"] = 'Няма изтрити документи за изчистване.';
$_lang["enable_resource"] = 'Разрешаване на ресурс.';
$_lang["enable_sharedparams"] = 'Разрешаване споделянето на параметър';
$_lang["enable_sharedparams_msg"] = '<b>ЗАБЕЛЕЖКА:</b> Горният глобален идентификатор (GUID) ще бъде използван за идентификация на този модул и неговите споделени параметри. Глобалният идентификатор GUID също се използва за осъществяване на връзка между модула и плъгините или снипетите, достъпващи неговите споделени параметри. ';
$_lang["enabled"] = 'Разрешено';
$_lang["error"] = 'Грешка';
$_lang["error_sending_email"] = 'Грешка при изпращане на емейла';
$_lang["errorpage_message"] = 'Въведете ID на документа, който искате да изпратите на потребителите, в отговор на обръщението им към документ, който всъщност не съществува. <b>ЗАБЕЛЕЖКА: Уверете се, че въведеното ID е на съществуващ документ и той е публикуван!</b>';
$_lang["errorpage_title"] = 'Страница за грешки:';
$_lang["event_id"] = 'Id на събитие';
$_lang["eventlog"] = 'Дневник на събитията';
$_lang["eventlog_msg"] = 'Дневникът на Събитията се използва за показване на информация, предупреждения и съобщения за грешки, генерирани от Мениджъра. Колоната \'Източник\' показва секцията от Мениджъра, където е възникнала грешката.';
$_lang["eventlog_viewer"] = 'Системни събития';
$_lang["everybody"] = 'Everybody';
$_lang["existing_category"] = 'Съществуваща категория';
$_lang["expand_tree"] = 'Разширете дървото';
$_lang["failed_login_message"] = 'Тук можете да въведете броя на позволените грешни опити за влизане преди потребителя да бъде блокиран.';
$_lang["failed_login_title"] = 'Неуспешни опити за влизане:';
$_lang["fe_editor_lang_message"] = 'Изберете езика за редактора.';
$_lang["fe_editor_lang_title"] = 'Език на редактора:';

$_lang["filemanager_path_message"] = 'IIS много често не интерпретира правилно настройките на document_root , който се използва от файловия мениджър за определяне какво да виждате. В случай, че имате проблеми при използването на файловия мениджър, уверете се, че пътя сочи към root на EVO инсталацията.';
$_lang["filemanager_path_title"] = 'Път на Файловия Мениджър:';

$_lang["folder"] = 'Папка';
$_lang["forgot_password_email_fine_print"] = '* Горният URL адрес ще изтече веднага след като смените паролата си или утре.';
$_lang["forgot_password_email_instructions"] = 'От тук имате възможност да смените паролата си в менюто Моят акаунт.';
$_lang["forgot_password_email_intro"] = 'Направена е заявка за смяна на паролата на акаунта ви.';
$_lang["forgot_password_email_link"] = 'Щракни тук, за завършване на процеса.';
$_lang["forgot_your_password"] = 'Забравихте паролата си?';
$_lang["friendly_alias_message"] = 'В случай, че използвате приятелски URL адреси, и документът има псевдоним, псевдонимът винаги има предимство пред приятелския URL адрес. Посредством yстановяване на тази опция в \'Да\', префикса и суфикса на приятелския  URL адрес ще бъдат приложени и към псевдонима. Например, ако документът с ID 1 има псевдоним  `introduction`, и сте настроили префикс `` и суфикс `.html`, установяването на тази опция в `Да` ще генерира `introduction.html`. Ако няма никакъв псевдоним, EVO ще генерира `1.html` като връзка.';
$_lang["friendly_alias_title"] = 'Използване на приятелски псевдоними:';
$_lang["friendlyurls_message"] = 'Дадената опция позволява да разрешите използването на приятелски URL адреси на сайта. Запомнете, че дадената възможност е достъпна само тогава, когато EVO е инсталиран на сървър Apache, освен това ще е необходимо да промените файла .htaccess. За подробна информация разгледайте файла  .htaccess от дистрибутивния пакет на EVO.';
$_lang["friendlyurls_title"] = 'Използвайте приятелски URL адреси:';
$_lang["friendlyurlsprefix_message"] = 'Тук можете да укажете префикса за приятелски URL адреси. Например, ако в качеството на префикс укажете \'page\',  то URL адрес от типа /index.php?id=2 ще бъде преобразуван на приятелски URL от типа /page2.html (приемаме, че суфикса е .html). По този начин можете да укажете как потребителите (и търсачките) ще виждат линковете на сайта.';
$_lang["friendlyurlsprefix_title"] = 'Префикс за приятелски URL адреси:';
$_lang["friendlyurlsuffix_message"] = 'Тук можете да определите суфикса за приятелски URL адреси. Указвайки \'.html\' ще бъде добавено .html към всички приятелски URL адреси.';
$_lang["friendlyurlsuffix_title"] = 'Суфикс за приятелски URL адреси:';
$_lang["functionnotimpl"] = 'Съжаляваме!';
$_lang["functionnotimpl_message"] = 'Тази функция все още не е завършена.';
$_lang["further_info"] = 'Further information';
$_lang["global_tabs"] = 'Global Tabs';
$_lang["go"] = 'Отиди';
$_lang["group_access_permissions"] = 'Права за достъп на Група Потребители';
$_lang['group_tvs'] = 'Group TV';
$_lang["guid"] = 'GUID';
$_lang["help"] = 'Помощ';
$_lang["help_msg"] = '<p>Можете да получите безплатна помощ на <a href="http://forums.modx.com" target="_blank">адреса на Форума на EVO. Също така можете да посетите и EVO Документация и Ръководства</a> , където са засегнати почти всички аспекти на EVO.</p><p>Екипът планира да предложи и платена помощ като услуга също. Моля да се информирате за платената помощ на адрес <a href="mailto:modx@vertexworks.com?subject=MODX Commercial Support Inquiry"></a>.';
$_lang["help_title"] = 'Помощ';
$_lang["hide_tree"] = 'Скриване на дървото';
$_lang["home"] = 'Начало';

$_lang["icon"] = 'Икона';
$_lang["icon_description"] = 'CSS class value. e.g. fa&nbsp;fa-star';
$_lang["id"] = 'ID';
$_lang["illegal_parent_child"] = 'Присвояване на родител:\n\nДокументът е дъщерен на избрания документ.';
$_lang["illegal_parent_self"] = 'Присвояване на родител:\n\nИзбраният документ не може да бъде присвоен на себе си.';
$_lang["images_management"] = 'Manage Images';
$_lang["import_files_found"] = '<b>Намерени са %s документа за импорт...</b>';
$_lang["import_params"] = 'Импортване на споделени параметри на модул';
$_lang["import_params_msg"] = 'Импортването на параметри или настройки става, чрез избиране на името на модула от горното падащо меню. <b>ЗАБЕЛЕЖКА:</b> За да се появи модула вътре в менюто, този плъгин/снипет трябва да е част от списъка със зависещите от него и да му е разрешено споделянето на параметър. ';
$_lang["import_parent_resource"] = 'Родителски документ:';
$_lang["update_tree"] = 'Възстановете дървото';
$_lang["update_tree_description"] = '<ul>
<li>Closure table database design pattern that makes working with the document tree more convenient and fast </li>
<li>If the data in the tree is updated not through models, then there is a possibility of an incorrect linking of documents in the database </li>
<li>This operation fixes the problem when site_content is not updated through the model (save, create) and the links (Closure table) are not updated </li>
<li>It is also possible to perform this operation in CLI mode via the \'php artisan closuretable: rebuild\' command </li>
</ul>';
$_lang["update_tree_danger"] = 'If you have more than 1000 resources, it is better to perform this operation in CLI mode using the \'php artisan closuretable: rebuild command\'';
$_lang["update_tree_time"] = 'Rebuild tree finished. Documents processed: <b>%s</b><br>Import took <b>%s</b> seconds to complete.';
$_lang["info"] = 'Инфо';
$_lang["information"] = 'Информация';
$_lang["inline"] = 'Вътрешен';
$_lang["insert"] = 'Вмъкнете';
$_lang["maxImageWidth"] = 'Maximum image width';
$_lang["maxImageHeight"] = 'Maximum image height';
$_lang["clientResize"] = 'Resize images on client-side';
$_lang["clientResize_message"] = 'If enabled then images will be resized by browser before upload to the server';
$_lang["noThumbnailsRecreation"] = 'Create thumbnails on upload only';
$_lang["noThumbnailsRecreation_message"] = 'File browser will create thumbnails only on upload; if there\'s no thumbnails for some images, they will not be created';
$_lang["thumbWidth"] = 'Maximum thumbnail width';
$_lang["thumbHeight"] = 'Maximum thumbnail height';
$_lang["thumbsDir"] = 'Thumbnails directory location';
$_lang["jpegQuality"] = 'JPEG compression';
$_lang["denyZipDownload"] = 'Disable zip-archives downloading';
$_lang["denyExtensionRename"] = 'Disable renaming of file extensions';
$_lang["maxImageWidth_message"] = 'If uploaded image resolution exceeds this setting it will be automatically resized. Set 0 to avoid.';
$_lang["maxImageHeight_message"] = 'If uploaded image resolution exceeds this setting it will be automatically resized. Set 0 to avoid.';
$_lang["thumbWidth_message"] = 'Maximum thumbnail width.';
$_lang["thumbHeight_message"] = 'Maximum thumbnail height.';
$_lang["thumbsDir_message"] = 'The name of thumbnail directory.';
$_lang["jpegQuality_message"] = 'JPEG compression quality of thumbnails and resized images';
$_lang["showHiddenFiles"] = 'Show hidden files in file browser';
$_lang["keyword"] = 'Ключова дума';
$_lang["keywords"] = 'Ключови думи';
$_lang["keywords_intro"] = 'За да редактирате ключова дума, просто въведете новата дума в текстовото поле, намиращо се до това на думата,  която желаете да промените. За да изтриете дума, сложете отметка на бокса \'Изтриване\' за съответната дума. Ако сложите отметка на бокса на изтриване на думата и също така смените името й, тя ще бъде изтрита, а не преименувана!';
$_lang["language_message"] = 'Изберете език за EVO Мениджъра.';
$_lang["language_title"] = 'Език:';
$_lang["last_update"] = 'Last update';
$_lang["launch_site"] = 'Разгледайте Сайта';
$_lang["license"] = 'License';
$_lang["link_attributes"] = 'Атрибути на връзката';
$_lang["link_attributes_help"] = 'Тук можете да въведете атрибутите за връзката на тази страница, като target= или rel=.';
$_lang["list_mode"] = 'Включи/Изключи режим списък - използва се за извеждане на всички записи като списък в таблицата.';
$_lang["loading_doc_tree"] = 'Зареждане на дървото с документите...';
$_lang["loading_menu"] = 'Зареждане на менюто...';
$_lang["loading_page"] = 'Моля изчакайте, докато EVO зареди страницата...';
$_lang["localtime"] = 'Локално време';

$_lang["lock_htmlsnippet"] = 'Заключване на чънк за редактиране';
$_lang["lock_htmlsnippet_msg"] = 'Само Администраторите (Роля с ID 1) могат да редактират този чънк.';
$_lang["lock_module"] = 'Заключване на модул за редкатиране';
$_lang["lock_module_msg"] = 'Само Администраторите (Роля с ID 1) могат да редактират този модул.';
$_lang["lock_msg"] = '%s в момента редактира %s. Моля, изчакайте докато другия потребител приключи и опитайте отново.';
$_lang["lock_plugin"] = 'Заключете плъгина за редактиране';
$_lang["lock_plugin_msg"] = 'Само Администраторите (Роля с ID 1) могат да редактират този плъгин.';
$_lang["lock_settings_msg"] = '%s в момента редактира тези настройки. Моля, изчакайте докато другия потребител приключи и опитайте отново.';
$_lang["lock_snippet"] = 'Заключете снипета за редактиране';
$_lang["lock_snippet_msg"] = 'Само Администраторите (Роля с ID 1) могат да редактират този снипет.';
$_lang["lock_template"] = 'Заключете шаблона за редактиране';
$_lang["lock_template_msg"] = 'Само Администраторите (Роля с ID 1) могат да редактират този шаблон.';
$_lang["lock_tmplvars"] = 'Заключете променливата за редактиране';
$_lang["lock_tmplvars_msg"] = 'Само Администраторите (Роля с ID 1) могат да редактират тази променлива.';
$_lang["locked"] = 'Заключен';

$_lang["login_allowed_days"] = 'Позволени Дни';
$_lang["login_allowed_days_message"] = 'Изберете дните, в които е позволено на този потребител да влиза.';
$_lang["login_allowed_ip"] = 'Позволен IP адрес';
$_lang["login_allowed_ip_message"] = 'Въведете IP адреса, от който е позволено на този потребител да влиза. <b>ЗАБЕЛЕЖКА: Ако IP адресите са повече от един ги разделете със запетая (,)</b>';
$_lang["login_button"] = 'Вход';
$_lang["login_cancelled_install_in_progress"] = 'В момента тече Инсталация/Обновяване на този сайт. <br />Моля, опитайте отново след няколко минути!<br />';
$_lang["login_cancelled_site_was_updated"] = 'Беше изпълнено Инсталиране/Обновяване на този сайт, моля, логнете се отново!<br />';
$_lang["login_captcha_message"] = 'Моля, въведете Кода за Сигурност показан на графиката. Ако не можете да го разчетете, щракнете върху картинката, за да бъде генериран нов или се свържете с администратора на сайта.';
$_lang["login_homepage"] = 'Вход в начална страница';
$_lang["login_homepage_message"] = 'Въведете ID на Документа, който желаете да изпратите на потребителя след влизането му. <b>ЗАБЕЛЕЖКА: Уверете се, че ID, което сте въвели принадлежи на съществуващ документ, както и че той е публикуван и достъпен за този потребител!</b>';
$_lang["login_message"] = 'Моля, въведете Потребителско име и Парола. Внимание - големи и малки букви са от значение!';
$_lang["logo_slogan"] = 'EVO Content Manager - \nCreate and do more with less';
$_lang["logout"] = 'Изход';
$_lang["long_title"] = 'Дълго заглавие';

$_lang["manager"] = 'Мениджър';
$_lang["manager_lockout_message"] = 'В момента сте влезли в Мениджъра. Ако желаете да прекратите сесията си, моля щракнете върху бутона "Изход" . <p />За да отидете във Вашата начална страница щракнете върху бутона "Начало" .';
$_lang["manager_permissions"] = 'Права за достъп до Мениджъра';
$_lang["manager_theme"] = 'Тема на Мениджъра:';
$_lang["manager_theme_message"] = 'Избор на Тема за Мениджъра.';
$_lang["manager_theme_mode"] = 'Color Scheme:';
$_lang["manager_theme_mode1"] = 'everything is light';
$_lang["manager_theme_mode2"] = 'the header is dark';
$_lang["manager_theme_mode3"] = 'header and sidebar are dark';
$_lang["manager_theme_mode4"] = 'everything is dark';
$_lang['manager_theme_mode_message'] = 'This setting is used as the "default" and can be overridden by the manager when using the theme color mode switch button in the Resource Tree: <i class="fa fa-lg fa-adjust"></i>';
$_lang['manager_theme_mode_title'] = 'Theme color mode switch';

$_lang["meta_keywords"] = 'META Ключови думи';
$_lang["metatag_intro"] = 'На тази страница можете да изтривате, създавате или редактирате META тагове. За да свържете META таговете към документи, щракнете на бутона <u>META Ключови думи</u> при редактиране на документа и изберете желаните META тагове и ключови думи. За да добавите нов таг въведете името и стойността и щракнете върху бутона \'Добави таг\' . За да редактирате таг щракнете върху името му в таблицата с данните.';
$_lang["metatag_notice"] = 'За повече информация можете да направите справка на адрес <a href="http://www.html-reference.com/META.asp" target="_blank">HTML Reference Guide</a> . Това не е пълен списък с възможните Meta Тагове.';
$_lang["metatags"] = 'META тагове';
$_lang["mgr_access_permissions"] = 'Права за достъп до Мениджъра';
$_lang["mgr_login_start"] = 'Начално влизане в Мениджъра';
$_lang["mgr_login_start_message"] = 'Въведете ID на документа, който ще се вижда при влизането си в Мениджъра потребителя. <b>ЗАБЕЛЕЖКА: Уверете се, че ID е на съществуващ документ и той е публикуван и достъпен за този потребител!</b>';

$_lang["mgrlog_action"] = 'Действие';
$_lang["mgrlog_actionid"] = 'ID на действието';
$_lang["mgrlog_anyall"] = 'Всеки/Всички';
$_lang["mgrlog_datecheckfalse"] = 'checkdate() върна false.';
$_lang["mgrlog_datefr"] = 'От дата';
$_lang["mgrlog_dateinvalid"] = 'Невалиден формат за дата.';
$_lang["mgrlog_dateto"] = 'До дата';
$_lang["mgrlog_emptysrch"] = 'Заявката за търсене върна като резултат празен сет (т.е. няма съответстващи логове).';
$_lang["mgrlog_field"] = 'Поле';
$_lang["mgrlog_itemid"] = 'ID на Елемента';
$_lang["mgrlog_itemname"] = 'Име на Елемента';
$_lang["mgrlog_msg"] = 'Съобщение';
$_lang["mgrlog_noquery"] = 'Няма подадена заявка за търсене все още.';
$_lang["mgrlog_qresults"] = 'Резултати от заявката';
$_lang["mgrlog_query"] = 'Заявка за лог-ване';
$_lang["mgrlog_query_msg"] = 'Моля, изберете да преглеждате логовете. Можете да сортирате лога по дати, но имайте впредвид, че датите, които въведете не са включени в сортирането - за да изберете записи в лога от 01-01-2004, въведете в полето \'От дата\' 01-01-2004 и в полето \'До дата\' 02-01-2004.<br /><br />Съобщенията и действията обикновено са еднакви като записи. Ако желаете да търсите точно определено съобщение, най-добре е да изберете действие от \'Всеки/Всички\'.';
$_lang["mgrlog_results"] = 'No. резултати';
$_lang["mgrlog_searchlogs"] = 'Търсене в логовете';
$_lang["mgrlog_sortinst"] = 'Можете да сортирате таблица чрез щракане в антетката на съответната колона. Ако логовете започнат да стават особено големи, можете да ги <a href="index.php?a=55">изчистите</a>. Това ще изтрие всички записи в лога и те няма да могат да бъдат възстановявани!';
$_lang["mgrlog_time"] = 'Време';
$_lang["mgrlog_user"] = 'Потребител';
$_lang["mgrlog_username"] = 'Име на потребител';
$_lang["mgrlog_value"] = 'Стойност';
$_lang["mgrlog_view"] = 'Преглед на лог-овете на Мениджъра';

$_lang["modx_news"] = 'Evolution CMS News Notices';
$_lang["modx_news_tab"] = 'Evolution CMS News';
$_lang["modx_news_title"] = 'Evolution CMS News';
$_lang["modx_security_notices"] = 'Evolution CMS Security Notices';
$_lang["modx_version"] = 'Версия на EVO';

$_lang["name"] = 'Име';

$_lang["no"] = 'Не';
$_lang["no_active_users_found"] = 'No active users found.';
$_lang["no_activity_message"] = 'Все още не сте създали или редактирали никакъв документ.';
$_lang["no_category"] = 'некатегоризиран';
$_lang["no_docs_pending_publishing"] = 'Няма документи, чакащи за публикуване.';
$_lang["no_docs_pending_pubunpub"] = 'Няма събития';
$_lang["no_docs_pending_unpublishing"] = 'Няма документи, чакащи за отмяна на публикуването.';
$_lang["no_edits_creates"] = 'No edits or creates found.';
$_lang["no_groups_found"] = 'Няма Групи.';
$_lang["no_keywords_found"] = 'Няма ключови думи.';
$_lang["no_records_found"] = 'Няма записи.';
$_lang["no_results"] = 'Няма резултати';
$_lang["nologentries_message"] = 'Въведете броя на записите в лог-а, които ще се показват при разглеждането му.';
$_lang["nologentries_title"] = 'Брой записи в лог-а:';
$_lang["none"] = 'Няма';
$_lang["noresults_message"] = 'Въведете броя на резултатите, които да се показват в таблицата при разглеждане или търсене.';
$_lang["noresults_title"] = 'Брой резултати:';
$_lang["not_deleted"] = 'не е изтрит.';
$_lang["not_set"] = 'Неустановен';

$_lang["offline"] = 'Неактивен';

$_lang["online"] = 'Активен';
$_lang["onlineusers_action"] = 'Действие';
$_lang["onlineusers_actionid"] = 'ID на действие';
$_lang["onlineusers_ipaddress"] = 'IP адрес на потребител';
$_lang["onlineusers_lasthit"] = 'Последна активност';
$_lang["onlineusers_message"] = 'Този списък показва всички активни потребители през последните 20 минути (времето сега е ';
$_lang["onlineusers_title"] = 'Активни потребители';
$_lang["onlineusers_user"] = 'Потребител';
$_lang["onlineusers_userid"] = 'ID на потребител';

$_lang["optimize_table"] = 'Щракнете, за да опитимизирате тази таблица';

$_lang["page_data_alias"] = 'Alias';
$_lang["page_data_cacheable"] = 'Кешируем';
$_lang["page_data_cacheable_help"] = 'Ако оставите това поле маркирано, се разрешава съхранението на документа в кеша. В случай, че документа съдържа снипети, уверете се, че полето няма отметка.';
$_lang["page_data_cached"] = '<b>Код, извлечен от кеша:</b>';
$_lang["page_data_changes"] = 'Промени';
$_lang["page_data_contentType"] = 'Тип на съдържание';
$_lang["page_data_contentType_help"] = 'Изберете тип на съдържанието за този документ. Ако не сте сигурни кой тип съдържание да използвате, просто го оставете като text/html.';
$_lang["page_data_created"] = 'Създаден';
$_lang["page_data_edited"] = 'Редактиран';
$_lang["page_data_editor"] = 'Редактирайте с текстови редактор';
$_lang["page_data_folder"] = 'Документът е контейнер';
$_lang["page_data_general"] = 'Общи данни';
$_lang["page_data_markup"] = 'Оценка/структура';
$_lang["page_data_mgr_access"] = 'Достъп до Мениджъра';
$_lang["page_data_notcached"] = 'Документът (все още) не е кеширан.';
$_lang["page_data_publishdate"] = 'Дата на публикуване';
$_lang["page_data_publishdate_help"] = 'Ако укажете дата на публикуване, документът ще бъде публикуван, когато датата настъпи. Щракнете на иконата на календара, за да изберете дата или на съседната икона, за да махнете датата на публикуване. Това означава, че документът никога няма да бъде публикуван автоматично.';
$_lang["page_data_published"] = 'Публикуван';
$_lang["page_data_searchable"] = 'Достъпен за търсене';
$_lang["page_data_searchable_help"] = 'Маркирането на това поле ще направи документа възможен за търсене. Това поле може да бъде използвано и за други цели във вашите снипети.';
$_lang["page_data_source"] = 'Код';
$_lang["page_data_status"] = 'Статус';
$_lang["page_data_template"] = 'Шаблони за документа';
$_lang["page_data_template_help"] = 'Тук можете да изберете кой шаблон да използва документа.';
$_lang["page_data_title"] = 'Данни за страницата';
$_lang["page_data_unpublishdate"] = 'Дата на отмяната на публикуване';
$_lang["page_data_unpublishdate_help"] = 'Ако укажете дата за отмяна на публикуването, документът ще бъде отменен за публикуване с настъпването й. Щракнете на иконата на календара, за да изберете дата, или на съседната икона, за да махнете датата за отмяна на публикуването. Това означава, че документът никога няма да бъде автоматично отменен за публикуване.';
$_lang["page_data_unpublished"] = 'Непубликуван';
$_lang["page_data_web_access"] = 'Уеб достъп';

$_lang["pagetitle"] = 'Заглавие на документ';
$_lang["pagination_table_first"] = 'Първи';
$_lang["pagination_table_gotopage"] = 'Отиди на страница';
$_lang["pagination_table_last"] = 'Последен';
$_lang["paging_first"] = 'първи';
$_lang["paging_last"] = 'последен';
$_lang["paging_next"] = 'следващ';
$_lang["paging_prev"] = 'предишен';
$_lang["paging_showing"] = 'Показване';
$_lang["paging_to"] = 'до';
$_lang["paging_total"] = 'общо';
$_lang["parameter"] = 'Параметър';
$_lang["parse_docblock"] = 'Parse DocBlock';
$_lang["parse_docblock_msg"] = 'Attention (!): <b>Resets</b> actual name, configuration, description and category to install-defaults by parsing the source code.';

$_lang["password"] = 'Парола';
$_lang["password_change_request"] = 'Заявка за смяна на парола';
$_lang["password_confirmed"] = 'Passwords doesn\'t match';
$_lang["password_gen_gen"] = 'Нека EVO да генерира парола.';
$_lang["password_gen_length"] = 'Паролата трябва да бъде с дължина минимум 6 знака.';
$_lang["password_gen_method"] = 'Метод за генериране на нова парола';
$_lang["password_gen_specify"] = 'Нека аз да определя паролата:';
$_lang["password_method"] = 'Метод за оповестяване на нова парола';
$_lang["password_method_email"] = 'Изпрати новата парола на емейл адрес.';
$_lang["password_method_screen"] = 'Покажи новата парола на екран.';
$_lang["password_msg"] = 'Новата парола на <b>:username</b> е <b>:password</b><br>';

$_lang["php_version_check"] = 'MODX е съвместим с PHP версия 7.4 и по-високи. Ъпгрейдвайте PHP инсталацията си!';

$_lang["preview"] = 'Преглед';
$_lang["preview_msg"] = 'Това е преглед на последно съхранените промени. Щракнете <a href="javascript:;" onclick="saveRefreshPreview();">Съхранение и Обновяване</a> на текущите промени';
$_lang["preview_resource"] = 'Преглед на документ';

$_lang["private"] = 'Частен';
$_lang["public"] = 'Публичен';
$_lang["publish_date"] = 'Дата на публикуване';
$_lang["publish_events"] = 'Публикувайте Събитие';
$_lang["publish_resource"] = 'Публикувайте Документ';

$_lang["rb_base_dir_message"] = 'Въведете физическия път към директорията с ресурсите. Тази настройка се генерира обикновено автоматично. Ако ползвате IIS, обаче, EVO може и да не намери сам пътя, което води до показване на грешка в браузера на ресурсите. В този случай, можете да въведете пътя към директорията images тук (пътя, така както го виждате в Windows Explorer). <b>ЗАБЕЛЕЖКА:</b> Директорията с ресурсите трябва да съдържа поддиректории images, files, flash и media , за да може браузера на ресурсите да функционира правилно.';
$_lang["rb_base_dir_title"] = 'Път на ресурса:';
$_lang["rb_base_url_message"] = 'Въведете виртуален път до директорията с ресурсите. Тази настройка се генерира обикновено автоматично. Ако ползвате IIS, обаче, EVO може и да не намери сам URL адрес, което води до показване на грешка в браузера на ресурсите. В този случай, можете да въведете URL адресакъм директорията images тук (URL адреса, така както го виждате в Internet Explorer).';
$_lang["rb_base_url_title"] = 'URL адрес на ресурса:';
$_lang["rb_message"] = 'Изберете Да, за да разрешите браузера на ресурсите. Това ще даде възможност на потребителите да разглеждат и ъплоудват ресурси като images, flash и media файлове на сървъра.';
$_lang["rb_title"] = 'Разрешаване на браузера на ресурси:';
$_lang["rb_webuser_message"] = 'Желаете ли да разрешите на web потребител възможността да използва браузера на ресурси? <b>ВНИМАНИЕ:</b> Разрешаването на web потребители да използват браузера на ресурси им дава възможност да виждат файловете, които са достъпни на потребителите на мениджъра.  Тази опция използвайте само за доверени web потребители.';
$_lang["rb_webuser_title"] = 'Web Потребители?';
$_lang["recent_docs"] = 'Последно отваряни документи';
$_lang["recommend_setting_change_title"] = 'Recommended Setting Change';
$_lang["recommend_setting_change_description"] = 'Your site is not configured to validate the HTTP_REFERER of incoming requests to the Manager. We strongly recommend enabling this setting to reduce the risk of a CSRF (Cross Site Request Forgery) attack.';
$_lang["references"] = 'References';
$_lang["refresh_cache"] = 'Кеш: Намерени са <b>%s</b> файла в кеш директорията и са изтрити <b>%d</b> кеш файла.<p>Нови кеш файлове ще се създадат при викане на страниците.';
$_lang["refresh_published"] = '<b>%s</b> документа са публикувани.';
$_lang["refresh_site"] = 'Изчистете Кеша';
$_lang["refresh_title"] = 'Обновяване на сайта';
$_lang["refresh_tree"] = 'Обновете дървото';
$_lang["refresh_unpublished"] = '<b>%s</b> документа не са публикувани.';
$_lang["release_date"] = 'Release date';
$_lang["remember_last_tab"] = 'Remember tabs';
$_lang["remember_last_tab_message"] = 'Tabbed Manager pages load with the last tab viewed instead of defaulting to the first tab';
$_lang["remember_username"] = 'Запомни ме';
$_lang["remove"] = 'Премахни';
$_lang["remove_date"] = 'Дата на премахване';
$_lang["remove_locks"] = 'Премахни блокировките';
$_lang["rename"] = 'Преименувай';
$_lang["reports"] = 'Доклади';
$_lang["report_issues"] = 'Report issues';
$_lang["required_field"] = 'Field :field is required';
$_lang["require_tagname"] = 'Необходимо е име на таг';
$_lang["require_tagvalue"] = 'Необходима е стойност на таг';
$_lang["reserved_name_warning"] = 'You have used a reserved name.';
$_lang["reset"] = 'Ресет';
$_lang["reset_failedlogins"] = 'ресет';
$_lang["reset_sort_order"] = 'Reset sort order';

$_lang["manager_access_permissions"] = 'Manager access permission';
$_lang["manage_groups"] = 'Manage document and user groups';
$_lang["manage_document_permissions"] = 'Manage document permissions';
$_lang["manage_module_permissions"] = 'Manage module permissions';
$_lang["manage_tv_permissions"] = 'Manage TV permissions';

$_lang["rss_url_news_default"] = 'https://github.com/evocms-community/evolution/releases.atom';
$_lang["rss_url_news_message"] = 'Въвеждане на URL адрес за EVO Новините.';
$_lang["rss_url_news_title"] = 'RSS на Новините';
$_lang["rss_url_security_default"] = 'https://github.com/extras-evolution/security-fix/releases.atom';
$_lang["rss_url_security_message"] = 'Въвеждане на URL адрес за EVO Сигурността.';
$_lang["rss_url_security_title"] = 'RSS на Сигурността';

$_lang["run_module"] = 'Стартиране на модул';
$_lang["save"] = 'Съхранете';
$_lang["save_all_changes"] = 'Съхранете всички промени';
$_lang["save_tag"] = 'Съхранете тага';
$_lang["saving"] = 'Съхранение, изчакайте...';

$_lang["search"] = 'Търсене';
$_lang["search_criteria"] = 'Критерии за търсене';
$_lang["search_criteria_content"] = 'Търсете по съдържание';
$_lang["search_criteria_content_msg"] = 'Намиране на всички документи със зададения текст в тяхното съдържание.';
$_lang["search_criteria_id"] = 'Търсете по ID';
$_lang["search_criteria_id_msg"] = 'Въведете ID на документ за по-бързото му намиране.';
$_lang["search_criteria_top"] = 'Search in main fields';
$_lang["search_criteria_top_msg"] = 'Pagetitle, Longtitle, Alias, ID';
$_lang["search_criteria_template_id"] = 'Search by template ID';
$_lang["search_criteria_template_id_msg"] = 'Find all Resources using the specified template.';
$_lang["search_criteria_url_msg"] = 'Find Resource by exact URL.';
$_lang["search_criteria_longtitle"] = 'Търсете по дълго заглавие';
$_lang["search_criteria_longtitle_msg"] = 'Намиране на всички документи със зададения текст в тяхното дълго заглавие.';
$_lang["search_criteria_title"] = 'Търсете по заглавие';
$_lang["search_criteria_title_msg"] = 'Намиране на всички документи със зададения текст в тяхното заглавие.';
$_lang["search_empty"] = 'Търсенето няма резултати. Моля, разширете критериите за търсене и опитайте отново.';
$_lang["search_item_deleted"] = 'Темата е изтрита';
$_lang["search_results"] = 'Резултати от търсенето';
$_lang["search_results_returned_desc"] = 'Описание';
$_lang["search_results_returned_id"] = 'ID';
$_lang["search_results_returned_msg"] = 'Your search criteria returned <b>%s</b> Resources. If a lot of results are being returned, try to enter a more specific search.';
$_lang["search_results_returned_title"] = 'Заглавие';
$_lang["search_view_docdata"] = 'Преглед на тема';

$_lang["security"] = 'Сигурност';
$_lang["security_notices_tab"] = 'Security Notices';
$_lang["security_notices_title"] = 'Security Notices';

$_lang["select_date"] = 'Изберете дата';
$_lang["send"] = 'Изпратете';
$_lang["server_protocol_http"] = 'http';
$_lang["server_protocol_https"] = 'https';
$_lang["server_protocol_message"] = 'В случай, че сървъра използва https, моля укажете това тук.';
$_lang["server_protocol_title"] = 'Тип на сървъра:';
$_lang["serveroffset"] = 'Времево отместване за сървъра';
$_lang["serveroffset_message"] = 'Изберете колко е разликата във времето, там където сте вие и където се намира сървъра. Текущото сървърно време е <b>[%s]</b>, текущо време на сървъра с използване на отместване е <b>[%s]</b>.';
$_lang["serveroffset_title"] = 'Отместване спрямо времето на сървъра:';
$_lang["servertime"] = 'Време на сървъра';
$_lang["set_automatic"] = 'Set automatic';
$_lang["set_default"] = 'Set default';
$_lang["set_default_all"] = 'Set defaults';

$_lang["settings_after_install"] = 'Тъй като това е нова инсталация, необходимо е да прегледате настройките и да направите нужните промени. След проверка на настройките, натиснете бутона \'Съхранете\', за да обновите базата от данни.<br /><br />';
$_lang["settings_config"] = 'Конфигурация';
$_lang["settings_dependencies"] = 'Взаимовъзки';
$_lang["settings_events"] = 'Системни събития';
$_lang["settings_furls"] = 'Приятелски URL адреси';
$_lang["settings_general"] = 'Общи настройки';
$_lang["settings_group_tv_message"] = 'Choose if Template Variables should be grouped in sections or tabs (named by TV category) when editing a Resource';
$_lang["settings_group_tv_options"] = 'No,Sections in General tab,Tabs in General tab,Sections in new tab,Tabs in new tab,New tabs';
$_lang["settings_misc"] = 'Файлов мениджър';
$_lang["settings_security"] = 'Security';
$_lang["settings_KC"] = 'File Browser';
$_lang["settings_page_settings"] = 'Настройки на страница';
$_lang["settings_photo"] = 'Снимка';
$_lang["settings_properties"] = 'Свойства';
$_lang["settings_site"] = 'Сайт';
$_lang["settings_strip_image_paths_message"] = 'Ако това е указано \'Не\', EVO  ще запише ресурсите на файловия браузер (изображения, файлове, флаш, и др.) като абсолютни URL адреси. Относителните URL адреси са много полезни, когато решите да местите инсталацията на EVO, т.е. от тестови в продуктивен сайт. Ако нямате никаква идея какво означава това, най-добре е да оставите тази настройка на \'Да\'.';
$_lang["settings_strip_image_paths_title"] = 'Да презапиша ли пътя от браузера?';
$_lang["settings_templvars"] = 'Шаблонна променлива (ШП)';
$_lang["settings_title"] = 'Системна конфигурация';
$_lang["settings_ui"] = 'Интерфейс & Особености';
$_lang["settings_users"] = 'Потребител';
$_lang["settings_email_templates"] = 'Email & Templates';

$_lang["show_fullscreen_btn_message"] = 'Show Menu toggle Fullscreen button';
$_lang["show_newresource_btn_message"] = 'Show Menu New Resource button';
$_lang["settings_show_picker_message"] = 'Customize manager theme and save to localstorage';
$_lang["show_fullscreen_btn"] = 'Toggle Fullscreen button';
$_lang["show_newresource_btn"] = 'New Resource button';

$_lang["show_meta"] = 'Show META Keywords tab';
$_lang["show_meta_message"] = 'Show the deprecated META Keywords tab when editing Resources in the Manager.';
$_lang["show_tree"] = 'Покажи дървото';
$_lang["show_picker"] = 'Show Color Switcher';
$_lang["showing"] = 'Показване';
$_lang["signupemail_message"] = 'Тук можете да настроите съобщението, което ще бъде изпращано на потребителите при създаване на акаунт и да разрешите на EVO да им изпраща емейл, съдържащ името и паролата. <br /><b>ЗАБЕЛЕЖКА:</b> При изпращане на съобщението Мениджъра замества следните placeholders: <br /><br />[+sname+] - Име на уеб сайта, <br />[+saddr+] - Емейл адрес в сайта, <br />[+surl+] - URL адрес на сайта, <br />[+uid+] - Потребителско име или id, <br />[+pwd+] - Потребителска парола, <br />[+ufn+] - Пълно име на потребителя. <br /><br /><b>Оставете [+uid+] и [+pwd+] в емейла, защото в противен случай потребителското име и парола няма да бъдат изпратени по пощата и потребителя няма да го знае!</b>';
$_lang["signupemail_title"] = 'Емейл за регистрация:';
$_lang["site"] = 'Сайт';
$_lang["site_schedule"] = 'График';
$_lang["sitename_message"] = 'Въведете името на сайта.';
$_lang["sitename_title"] = 'Име на сайта:';
$_lang["sitestart_message"] = 'Въведете ID на документа, който желаете да използвате за начална страница. <b>ЗАБЕЛЕЖКА: Уверете се, че това ID принадлежи на съществуващ документ и той е публикуван!</b>';
$_lang["sitestart_title"] = 'Начална страница на сайта:';
$_lang["sitestatus_message"] = 'Изберете \'Активен\', за да публикувате сайта. В случай, че изберете \'Неактивен\', Вашите посетители ще видят \'Съобщение, когато сайта е недостъпен\', и няма да могат да го посетят.';
$_lang["sitestatus_title"] = 'Статус на сайта:';
$_lang["siteunavailable_message"] = 'Съобщение, което ще се извежда, когато сайта не е активен или при възникване на грешка. <b>ЗАБЕЛЕЖКА: Това съобщение ще се извежда само, когато опцията, че сайта е недостъпен не е маркирана.</b>';
$_lang["siteunavailable_message_default"] = 'The site is currently unavailable.';
$_lang["siteunavailable_page_message"] = 'Тук въведете ID на документа, който желаете да използвате като неактивна страница. <b>ЗАБЕЛЕЖКА: Уверете се, че това ID принадлежи на съществуващ документ и той е публикуван!</b>';
$_lang["siteunavailable_page_title"] = 'Страница, когато сайта е недостъпен:';
$_lang["siteunavailable_title"] = 'Съобщение, когато сайта е недостъпенe:';
$_lang["controller_namespace"] = 'Controller Namespace';
$_lang["controller_namespace_message"] = 'Specify the full Namespace from which it is worth taking controllers, for example: <b>EvolutionCMS\\Main\\Controllers\\</b>';
$_lang["update_repository"] = 'GitHub repository path';
$_lang["update_repository_message"] = 'Enter GitHub repository path for example: <b>evocms-community/evolution</b>';

$_lang["sort_alphabetically"] = 'Sort alphabetically';
$_lang["sort_asc"] = 'Във възходящ ред';
$_lang["sort_desc"] = 'В низходящ ред';
$_lang["sort_menuindex"] = 'Sort menu index';
$_lang["sort_tree"] = 'Сортиране на дървото';
$_lang['sort_updating'] = 'Updating ...';
$_lang['sort_updated'] = 'Updated!';
$_lang['sort_nochildren'] = 'Parent does not have any children';
$_lang["sort_elements_msg"] = 'Drag to reorder the listed elements.';

$_lang["source"] = 'Код';
$_lang["stay"] = 'Продължи редактирането';
$_lang["stay_new"] = 'Добави друг';
$_lang["submit"] = 'Изпрати';
$_lang["sys_alert"] = 'Системен сигнал';
$_lang["sysinfo_activity_message"] = 'Този списък показва кои документи са били редактирани напоследък от потребителите.';
$_lang["sysinfo_userid"] = 'Потребител';
$_lang["system"] = 'System';
$_lang["system_email_signup"] = 'Hello [+uid+]

Here are your login details for [+sname+] Content Manager:

Username: [+uid+]
Password: [+pwd+]

Once you log into the Content Manager ([+surl+]), you can change your password.

Regards,
Site Administrator';
$_lang["system_email_webreminder"] = 'Здравей [+uid+]

За да активираш новата си парола, щракни на следния линк:

[+surl+]

Ако всичко е нормално, можеш да използващ следната парола за влизане:

Парола:[+pwd+]

В случай, че този емейл не е за теб, просто го игнорирай.

С уважение,
Администратор';
$_lang["system_email_websignup"] = 'Здравей [+uid+]

Ето детайлите за акаунта ти в [+sname+]:

Потребителско име: [+uid+]
Парола: [+pwd+]

Веднъж след като влезеш в [+sname+] ([+surl+]), можеш да смениш паролата си.

С уважение,
Администратор';
$_lang["table_hoverinfo"] = 'Постави курсора на мишката върху името на таблицата, за да видиш кратко описание на функцията на таблицата (не всички таблици съдържат <i>коментари</i>).';
$_lang["table_prefix"] = 'Префикс на таблицата';
$_lang["tag"] = 'Таг';

$_lang["to"] = 'на';
$_lang["toggle_fullscreen"] = 'Toggle Fullscreen';
$_lang["tools"] = 'Инструменти';
$_lang["top_howmany_message"] = 'При разглеждане на докладите, колко трябва да е голям списъка \'ТОП ...\'?';
$_lang["top_howmany_title"] = 'Колко ТОП';
$_lang["total"] = 'общо';
$_lang["track_visitors_message"] = 'Тази настройка не е ефективна при проследяване на потребител или инсталираните статистики, които поддържат тази настройка. Лог-ването на посещенията ще позволи да разглеждате употребата на сайта чрез статистиката на сайта.';
$_lang["track_visitors_title"] = 'Лог-ване на посещенията (статистика)';
$_lang["tree_page_click"] = 'Page Click Behavior';
$_lang["tree_page_click_message"] = 'The default behavior when clicking on a page in the site tree.';
$_lang["use_breadcrumbs"] = 'Show navigation';
$_lang["use_breadcrumbs_message"] = 'Show the navigation when creating or editing Resource in the Manager';
$_lang["tree_show_protected"] = 'Показване на защитените страници';
$_lang["tree_show_protected_message"] = 'Когато е "Не", защитените страници (и техните дъщерни документи) не се показват в дървото с документите. "Не" е настройката за EVO.';
$_lang["truncate_table"] = 'Щракнете тук, за да съкратите тази таблица';
$_lang["type"] = 'Тип';
$_lang["udperms_allowroot_message"] = 'Желаете ли да позволите на потребителите да създават нови документи/папки в основната директория на сайта? ';
$_lang["udperms_allowroot_title"] = 'Създаване на документи в основната директория:';
$_lang["udperms_message"] = 'Правата ви за достъп позволяват да определите кои страници могат потребителите да редактират. За целта е необходимо потребителите да принадлежат към Група Потребители, документите - към Група Документи, като по този начин ще можете да определите коя Група потребители коя Група Документи има права да редактира. При начално включване на тази функция само Администраторите имат права да редактират какъвто да е документ.';
$_lang["udperms_title"] = 'Използвай права за достъп:';
$_lang["unable_set_link"] = 'Не може да бъде настроен линка!';
$_lang["unable_set_parent"] = 'Не може да бъде настроен нов родителски документ!';
$_lang["unauthorizedpage_message"] = 'Въведете ID на документа, който ще се изпраща на потребителите при неоторизиран достъп от тяхна страна. <b>ЗАБЕЛЕЖКА: Уверете се, че ID , което сте въвели принадлежи на съществуващ документ, както и че той е публикуван и публично достъпен!</b>';
$_lang["unauthorizedpage_title"] = 'Страница за неоторизиран достъп:';
$_lang["unblock_message"] = 'Този потребител няма да бъде блокиран след съхраняване на потребителските данни.';
$_lang["undelete_resource"] = 'Възстановяване на документ';
$_lang["unpublish_date"] = 'Дата на отмяна на публикуването';
$_lang["unpublish_events"] = 'Отмяна на публикуването на събития';
$_lang["unpublish_resource"] = 'Отмяна на публикуването на документ';
$_lang["untitled_resource"] = 'Ненаименуван документ';
$_lang["untitled_weblink"] = 'Ненаименуван уеблинк';
$_lang["update_params"] = 'Обновяване на параметър';
$_lang["update_settings_from_language"] = 'Replace current with:';

$_lang["upload_maxsize_message"] = 'Въведете максималния размер на файла, който може да бъде ъплоуднат с файловия мениджър. Размера на файла за ъплоудване трябва да бъде написан в байтове. <b>ЗАБЕЛЕЖКА: Големите файлове ще се ъплоудват по-дълго време!</b>';
$_lang["upload_maxsize_title"] = 'Максимален размер на файла за ъплоудване';
$_lang["uploadable_files_message"] = 'Тук въвеждате списъка с файловете, които можете да ъплоуднете в \'assets/files/\' с Мениджъра на ресурсите. Разширенията за файловете въведете разделени със запетая.';
$_lang["uploadable_files_title"] = 'Видове файлове, които могат да се ъплоудват:';
$_lang["uploadable_flash_message"] = 'Тук въвеждате списъка с флаш файловете, които можете да ъплоуднете в \'assets/flash/\' с Мениджъра на ресурсите. Разширенията за типовете флаш файлове въведете разделени със запетая.';
$_lang["uploadable_flash_title"] = 'Видове флаш файлове, които могат да се уплоудват:';
$_lang["uploadable_images_message"] = 'Тук въвеждате списъка с файлове с изображения, които могат да се ъплоуднат в \'assets/images/\' с Мениджъра на ресурсите. Разширенията за изображенията въведете разделени със запетая.';
$_lang["uploadable_images_title"] = 'Видове файлове с изображения, които могат да се ъплоудват:';
$_lang["uploadable_media_message"] = 'Тук въвеждате списъка с медийните файлове, които могат да се ъплоуднат в \'assets/media/\' с Мениджъра на ресурсите. Разширенията за медийните файлове въведете разделени със запетая.';
$_lang["uploadable_media_title"] = 'Видове медийни файлове, които могат да се ъплоуднат:';
$_lang["use_alias_path_message"] = 'Ако тази настройка е \'Да\' ще се показва пълния път към документа, ако той има псевдоним. Например, ако документ с псевдоним \'child\' се намира вътре в документ, който е контейнер и има псевдоним \'parent\', тогава пълния път към документа с псевдоним ще се показва като \'/parent/child.html\'.<br /><b>ЗАБЕЛЕЖКА: При избиране на \'Да\' за тази опция (включване на пътя с използване на псевдоними), съответния елемент, за който се отнася (като изображения, css, javascripts, и др.), използва абсолютен път: т.е. \'/assets/images\' вместо \'assets/images\'. Това ще предпази браузера ви от прикачане на относителен път към пътя с използване на псевдоним.</b>';
$_lang["use_alias_path_title"] = 'Използване на път с псевдоним:';
$_lang["use_editor_message"] = 'Желаете ли да включите редактор? Ако ви е по-удобно да пишете HTML, можете да изключите редактора от тази настройка. Имайте предвид, че тази настройка се прилага на всички документи и всички потребители!';
$_lang["use_editor_title"] = 'Разрешаване на редактор:';
$_lang["use_global_tabs"] = 'Use global Tabs';

$_lang["valid_hostnames_message"] = 'Help prevent XSS exploits misusing the site_url system setting by providing a comma separated list of valid hostnames for this installation. This is important for some types of shared hosts or hosts direct accessible via an IP address. First hostname in the list is used if the HTTP_HOST does not match any valid hostname.';
$_lang["valid_hostnames_title"] = 'Valid hostnames';
$_lang["validate_referer_message"] = 'Проверка на HTTP_REFERER headers за намаляне на риска редакторите на съдържание да бъдат измамени да изпълняват непреднамерени действия в мениджъра като следствие от CSRF (Cross Site Request Forgery) атака. Възможно е някои конфигурации да не могат да използват тази опция, ако сървъра не изпраща HTTP_REFERER headers.';
$_lang["validate_referer_title"] = 'Проверка на HTTP_REFERER headers?';
$_lang["value"] = 'Стойност';
$_lang["version"] = 'Version';
$_lang["view"] = 'Преглед';
$_lang["view_child_resources_in_container"] = 'Разглеждане на дъщерните документи';
$_lang["view_log"] = 'Разглеждане на лог-а';
$_lang["view_logging"] = 'Действия на Мениджъра';
$_lang["view_sysinfo"] = 'Системна Информация';
$_lang["warning"] = 'ВНИМАНИЕ!';
$_lang["warning_not_saved"] = 'Промените, които сте направили все още не са съхранени. Имате възможност да останете на текущата страница, за да съхраните промените (\'Отказ\'), или да отидете на друга, като изгубите всички направени промени (\'ОК\').';
$_lang["warning_visibility"] = 'Configuration Warnings visible to';
$_lang["warning_visibility_message"] = 'Control the visibility of the configuration warnings shown on the Manager welcome page';
$_lang["web_access_permissions"] = 'Права за уеб достъп';
$_lang["web_access_permissions_user_groups"] = 'Групи Уеб Потребители';
$_lang["web_permissions"] = 'Права за уеб достъп';
$_lang["web_user_management_msg"] = 'Тук можете да изберете кой Уеб Потребител желаете да редактирате. Уеб Потребители са тези потребители, на които е позволен лог-ването в уеб сайта';
$_lang["web_user_management_title"] = 'Уеб Потребители';
$_lang["web_user_management_select_role"] = 'All roles';
$_lang["web_user_title"] = 'Създаване/Редактиране на Уеб Потребител';
$_lang["web_users"] = 'Уеб Потребители';
$_lang["weblink"] = 'Уеблинк';
$_lang["webpwdreminder_message"] = 'Въведете съобщението, което ще изпращате на уеб потребителите, когато изискат нова парола по пощата. Мениджърът ще им изпрати емейл, съдържащ новата им парола и информация за активирането й. <br /><b>ЗАБЕЛЕЖКА:</b> След изпращането на съобщението, Мениджърът подменя следните placeholders: <br /><br />[+sname+] - Име на уебсайта, <br />[+saddr+] - Em@il адрес на уебсайта, <br />[+surl+] - URL адреса на уебсайта, <br />[+uid+] - Потребителското име, <br />[+pwd+] - Парола, <br />[+ufn+] - Пълно име на потребителя. <br /><br /><b>Включете в съобщението [+uid+] и [+pwd+], защото в противен случай Потребителското име и Парола няма да бъдат изпратени и потребителите няма да ги знаят!</b>';
$_lang["webpwdreminder_title"] = 'Напомнителен Емейл:';
$_lang["websignupemail_message"] = 'Въведете съобщението, което ще изпращате на уеб потребителите, когато им създадете уеб акаунт и позволете на Мениджъра да им изпрати емейл, съдържащ тяхното Потребителско име и Парола. <br /><b>ЗАБЕЛЕЖКА:</b> След изпращането на съобщението, Мениджърът подменя следните placeholders: <br /><br />[+sname+] - Име на уебсайта, <br />[+saddr+] - Em@il адрес на уебсайта, <br />[+surl+] - URL адреса на уебсайта, <br />[+uid+] - Потребителското име, <br />[+pwd+] - Парола, <br />[+ufn+] - Пълно име на потребителя. <br /><br /><b>Включете в съобщението [+uid+] и [+pwd+], защото в противен случай Потребителското име и Парола няма да бъдат изпратени и потребителите няма да ги знаят!</b>';
$_lang["websignupemail_title"] = 'Емейл за уеб регистрация:';
$_lang["allow_multiple_emails_title"] = 'Duplicate Web User email address';
$_lang["allow_multiple_emails_message"] = 'Allows Web Users to share the same email address for situations when a member may not have their own email address or there is just one family email address.<br/>Note: Any password reminder and registration logic will need to account for this option if set to yes.';
$_lang["welcome_title"] = 'ДОБРЕ ДОШЪЛ в Мениджъра на EVO';
$_lang["which_editor_message"] = 'Тук можете да изберете кой редкатор ще използвате. Можете също така да даунлоуднете и инсталирате допълнителен редактор от секцията за даунлоуд на EVO.';
$_lang["which_editor_title"] = 'Редактор, който ще използваш:';
$_lang["working"] = 'Зарежда се...';
$_lang["wrap_lines"] = 'Пренасяне на нов ред';
$_lang["xhtml_urls_message"] = 'Заменя символа ampersand (&) в URL адресите, генерирани от EVO с валидното &<!-- -->amp; htmlentity';
$_lang["xhtml_urls_title"] = 'XHTML URL адреси';
$_lang["yes"] = 'Да';
$_lang["you_got_mail"] = 'Имаш поща';

$_lang["yourinfo_message"] = 'Тази секция съдържа информация за Вас:';
$_lang["yourinfo_previous_login"] = 'Вашето последно влизане:';
$_lang["yourinfo_role"] = 'Вашата роля е:';
$_lang["yourinfo_title"] = 'Вашата информация';
$_lang["yourinfo_total_logins"] = 'Общ брой на влизанията:';
$_lang["yourinfo_username"] = 'Влязал си като:';

$_lang["a17_error_reporting_title"] = 'Detection level of PHP errors';
$_lang["a17_error_reporting_msg"] = 'Set the detection level of the PHP errors.';
$_lang["a17_error_reporting_opt0"] = 'Ignore all';
$_lang["a17_error_reporting_opt1"] = 'Ignore warnings of a slight notice level (<a href="https://www.google.com/search?q=E_DEPRECATED+E_STRICT" target="_blank">E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT</a>)';
$_lang["a17_error_reporting_opt2"] = 'Detect all errors except E_NOTICE and E_USER_DEPRECATED';
$_lang["a17_error_reporting_opt99"] = 'Detect all except E_USER_DEPRECATED';
$_lang["a17_error_reporting_opt199"] = 'Detect all';

$_lang["pwd_hash_algo_title"] = 'Hash algorithm';
$_lang["pwd_hash_algo_message"] = 'Password hash algorithm.';

$_lang["enable_bindings_title"] = 'Enable @Bindings commands';
$_lang["enable_bindings_message"] = 'Prevents the execution of PHP functions through TV @Bindings. Useful if you have Manager users who should not be able to create PHP code but need to be able to create or edit TVs. The output of any TV with an @Binding will be "@Bindings disabled".';
$_lang["enable_filter_title"] = 'Enable filters';
$_lang["enable_filter_message"] = 'Filters allow you to manipulate the way data is presented or parsed in a tag. They allow you to modify values from inside your templates. This is analogous to PHx. <a href="https://github.com/modxcms/evolution/issues/623" target="ext_help">More info</a>'; // todo: change link to documentation
$_lang["enable_filter_phx_warning"] = 'При активиране РНх плъгин, вградени филтри са изключени по подразбиране';

$_lang["enable_at_syntax_title"] = 'Enable &lt;@SYNTAX&gt;';
$_lang["enable_at_syntax_message"] = '&lt;@SYNTAX&gt;(atmark syntax) is simple and lightweight template syntax. This is designed to consider coexistence with HTML tags and content strings.';

$_lang["bkmgr_alert_mkdir"] = 'A file cannot be created in a directory.  Please check the permission of [+snapshot_path+]';
$_lang["bkmgr_restore_msg"] = '<p>Database tables could be restored by SQL:</p>';
$_lang["bkmgr_restore_title"] = 'Restore';
$_lang["bkmgr_import_ok"] = 'SQL recovery was performed normally.';
$_lang["bkmgr_snapshot_ok"] = 'The snapshot was saved normally.';
$_lang["bkmgr_run_sql_file_label"] = 'Execute by SQL file';
$_lang["bkmgr_run_sql_direct_label"] = 'Direct execute SQL commands';
$_lang["bkmgr_run_sql_submit"] = 'Execute restore';
$_lang["bkmgr_run_sql_result"] = 'Result';
$_lang["bkmgr_snapshot_title"] = 'Snapshot save and recovery';
$_lang["bkmgr_snapshot_msg"] = '<p>The contents of the database are saved in and restored from a server directory.<br />Location: [+snapshot_path+] ($modx->config[\'snapshot_path\'])</p>';
$_lang["bkmgr_snapshot_submit"] = 'Add Snapshot';
$_lang["bkmgr_snapshot_list_title"] = 'List of snapshots';
$_lang["bkmgr_restore_submit"] = 'Връщане на тези данни';
$_lang["bkmgr_restore_confirm"] = 'Сигурни ли сте, че искате да се върнете архивиране\n[+filename+] ?';
$_lang["bkmgr_snapshot_nothing"] = 'No snapshots available';

$_lang["files.dynamic.php1"] = 'New File';
$_lang["files.dynamic.php2"] = 'This directory cannot be displayed.';
$_lang["files.dynamic.php3"] = 'There is a problem in a file name.';
$_lang["files.dynamic.php4"] = 'The text file was created.';
$_lang["files.dynamic.php5"] = 'File could not be duplicated.';
$_lang["files.dynamic.php6"] = 'File or directory could not be renamed.';
$_lang["files_dynamic_new_folder_name"] = 'Enter new directory name:';
$_lang["files_dynamic_new_file_name"] = 'Enter new file name:';
$_lang["not_readable_dir"] = 'Can not read this directory.';
$_lang["confirm_delete_dir"] = 'Are you sure you want to delete the directory?';
$_lang["confirm_delete_dir_recursive"] = 'Are you sure you want to delete this directory?\n\nAll files inside this directory will also be deleted.';

$_lang["make_folders_title"] = 'End Container URL with Slash';
$_lang["make_folders_message"] = 'Append trailing slash to Resources that are set as containers when using Friendly URLs.';

$_lang["check_files_onlogin_title"] = 'Check core files on login';
$_lang["check_files_onlogin_message"] = 'By enabling this option, important system files will be checked for modification typical of scripted website attacks. While not a foolproof guarantee, it may alert you to a compromised Evolution CMS file and website.';

$_lang["configcheck_sysfiles_mod"] = 'Important System Files have been modified.';
$_lang["configcheck_sysfiles_mod_msg"] = 'You have configured Evolution CMS to check important system files for possible website script attacks. This warning does not necessarily mean your site has been compromised, however, you should review the watched files in your installation (set in System configuration -> User -> Check core files on login). If you find your files unaltered or changes were made by site administrators, go to System Configuration and click to re-save settings to dismiss this message. Changes in the following files have been found:';

$_lang['email_method_title'] = 'Sendmail method';
$_lang['email_method_mail'] = 'PHP mail() function';
$_lang['email_method_smtp'] = 'SMTP Server';
$_lang['smtp_auth_title'] = 'SMTP－AUTH';
$_lang['smtp_autotls_title'] = 'SMTPAutoTLS';
$_lang['smtp_host_title'] = 'SMTP host';
$_lang['smtp_secure_title'] = 'Encrypted SMTP';
$_lang['smtp_username_title'] = 'SMTP username';
$_lang['smtp_password_title'] = 'SMTP password';
$_lang['smtp_port_title'] = 'SMTP port';

$_lang["setting_resource_tree_node_name"] = 'Display Name in Resource Tree';
$_lang["setting_resource_tree_node_name_desc"] = 'Select the Resource field to show as the Resource name in the Resource Tree. The default setting is pagetitle.';
$_lang["setting_resource_tree_node_name_desc_add"] = 'Note: Since Evolution CMS 1.1 you can change this Display Name within Resource-Tree´s sorting option. This setting is used when Display Name in Resource Tree is set to &quot;Default&quot;.';

$_lang["resource_opt_alvisibled"] = 'Use current alias in alias path';
$_lang["resource_opt_alvisibled_help"] = 'The alias of this Resource is inserted in Friendly URL alias path';
$_lang['resource_opt_is_published'] = 'Published';

$_lang["enable_cache_title"] = 'Document caching';
$_lang["disable_chunk_cache_title"] = 'Disable chunk caching';
$_lang["disable_snippet_cache_title"] = 'Disable snippet caching';
$_lang["disable_plugins_cache_title"] = 'Disable plugins caching';
$_lang["disabled_at_login"] = 'Disabled at login';

$_lang["cache_type_title"] = 'Document caching type';
$_lang["cache_type_1"] = 'Cache is based only on Resource ID (standard)';
$_lang["cache_type_2"] = 'Cache is based on Resource ID and $_GET parameters';
$_lang["seostrict_title"] = 'Use SEO Strict URLs';
$_lang["seostrict_message"] = 'Enforces the use of strict URLs to prevent duplicate content (if needed)';

$_lang["alias_listing_title"] = 'Use AliasListing cache';
$_lang["alias_listing_message"] = 'Caching page aliases, have to be disabled if a site have huge amount of resources. "Disabled" reduces memory consumption when site have large number of resources.';
$_lang["alias_listing_disabled"] = 'Disabled';
$_lang["alias_listing_folders"] = 'Only for folders';
$_lang["alias_listing_enabled"] = 'Enabled';

$_lang["settings_friendlyurls_alert"] = 'It is necessary to rename the ht.access file in the Evolution CMS installation directory at .htaccess to use the Friendly URL function.';
$_lang["settings_friendlyurls_alert2"] = 'Since Evolution CMS was installed in a subdirectory, it is necessary to change the content of .htaccess.';

$_lang["mutate_settings.dynamic.php6"] = 'Send mail on Evolution CMS errors';
$_lang["mutate_settings.dynamic.php7"] = 'not notify';
$_lang["mutate_settings.dynamic.php8"] = 'A mail with the error source will be sent to [(emailsender)] ([+emailsender+]) if a Evolution CMS error occurs. The details of the error could be seen in the Evolution CMS events log.';

$_lang["error_no_privileges"] = "You don't have enough privileges for this action!";
$_lang["error_no_optimise_tablename"] = "Table to optimise not found in request!";
$_lang["error_no_truncate_tablename"] = "Table to truncate not found in request!";
$_lang["error_double_action"] = "Double action (GET & POST) posted!";
$_lang["error_no_id"] = "ID not passed in request!";
$_lang["error_id_nan"] = "ID passed in request is NaN!";
$_lang["error_parent_deleted"] = "Failed because resource parent is deleted!";
$_lang["error_no_parent"] = "Couldn't find parent document's name!";
$_lang["error_many_results"] = "Too many results returned from database!";
$_lang["error_no_results"] = "Not enough/ no results returned from database!";
$_lang["error_no_user_selected"] = "No user selected as recipient of this message!";
$_lang["error_no_group_selected"] = "No group selected as recipient of this message!";
$_lang["error_movedocument1"] = "Document cannot be it's own parent!";
$_lang["error_movedocument2"] = "Document's ID not passed in request!";
$_lang["error_movedocument3"] = "New parent not set in request!";
$_lang["error_internet_connection"] = "Server isn't available. Check your internet connection!";

$_lang["login_processor_unknown_user"] = "Incorrect username or password entered!";
$_lang["login_processor_wrong_password"] = "Incorrect username or password entered!";
$_lang["login_processor_many_failed_logins"] = "Due to too many failed logins, you have been blocked!";
$_lang["login_processor_verified"] = "User verification required!";
$_lang["login_processor_blocked1"] = "You are blocked and cannot log in!";
$_lang["login_processor_blocked2"] = "You are blocked and cannot log in! Please try again later.";
$_lang["login_processor_blocked3"] = "You are blocked automatic after a specified date and you cannot log in anymore!";
$_lang["login_processor_bad_code"] = "The security code you entered didn't validate! Please try to login again!";
$_lang["login_processor_remotehost_ip"] = "Your hostname doesn't point back to your IP!";
$_lang["login_processor_remote_ip"] = "You are not allowed to login from this location.";
$_lang["login_processor_date"] = "You are not allowed to login at this time. Please try again later.";
$_lang["login_processor_captcha_config"] = "Captcha is not configured properly.";

$_lang["dp_dayNames"] = "['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']";
$_lang["dp_monthNames"] = "['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']";
$_lang["dp_startDay"] = "1";

$_lang["check_all"] = "Select all";
$_lang["check_none"] = "Select none";
$_lang["check_toggle"] = "Toggle selection";

$_lang["version_notices"] = "Version Notices";

$_lang["em_button_shift"] = " (Shift-Mouseclick to open multiple windows)";

$_lang["reset_sysfiles_checksum_button"] = "Rebuild Checksums";
$_lang["reset_sysfiles_checksum_alert"] = "Are you sure you want to reset the system files checksums?";

$_lang["file_browser_disabled_msg"] = "The File Browser Feature is not enabled.";
$_lang["which_browser_default_title"] = "Default File Browser";
$_lang["which_browser_default_msg"] = "Choose the File Browser you prefer as default. In User-Settings you can choose a Custom Browser per User, or leave it on &quot;default&quot;.";
$_lang["which_browser_title"] = "File Browser";
$_lang["which_browser_msg"] = "You can choose a custom File Browser for this user. To use the System´s default Browser, leave it on &quot;Default&quot;.";
$_lang["option_default"] = "Default";
$_lang["position"] = "Position";
$_lang["are_you_sure"] = "Are you sure?";

$_lang['evo_downloads_title'] = "Evolution CMS Downloads";
$_lang['help_translating_title'] = "Help translating Evolution CMS";
$_lang['download'] = "Download";
$_lang['downloads'] = "Downloads";
$_lang["previous_releases"] = "Previous Releases";
$_lang["extras"] = "Extras";

$_lang["display_locks"] = "Display Locks";
$_lang["role_display_locks"] = "Display Locks";
$_lang["session_timeout"] = "Session Timeout";
$_lang["session_timeout_msg"] = "Evolution CMS will ping the server, if the last ping exceeds this setting, the associated session will be considered invalid and all related locks will be removed automatically. Set value in minutes (>2min, default 15min).";
$_lang["unlock_element_id_warning"] = "Are you sure you want to unlock this [+element_type+] (ID [+id+])?";
$_lang["lock_element_type_1"] = "Template";
$_lang["lock_element_type_2"] = "Template-Variable";
$_lang["lock_element_type_3"] = "Chunk";
$_lang["lock_element_type_4"] = "Snippet";
$_lang["lock_element_type_5"] = "Plugin";
$_lang["lock_element_type_6"] = "Module";
$_lang["lock_element_type_7"] = "Resource";
$_lang["lock_element_type_8"] = "Role";
$_lang["lock_element_editing"] = "You are editing this [+element_type+] since\n[+lasthit_df+]";
$_lang["lock_element_locked_by"] = "This [+element_type+] is locked by user\n[+username+] since [+lasthit_df+]";

$_lang["minifyphp_incache_title"] = 'Minify php code in site cache';
$_lang["minifyphp_incache_message"] = 'Minify php code (snippets and plugins) and store in the site cache file, ref:<a href="https://github.com/modxcms/evolution/issues/938" target="_blank">#938</a>';

$_lang["logout_reminder_msg"] = "Reminder: It seems on [+date+] you forgot to logout. Please pay attention in future to do so after your work is finished.";

$_lang["allow_eval_title"] = "Eval php code in snippet call";
$_lang["allow_eval_msg"] = "For developer : Please use \$modx-&gt;safeEval().";
$_lang["allow_eval_with_scan"] = "Execute only permitted functions";
$_lang["allow_eval_with_scan_at_post"] = "Execute all. However, at POST, only permitted functions";
$_lang["allow_eval_everytime_eval"] = "Unlimited (Use only for debugging)";
$_lang["allow_eval_dont_eval"] = "Do not allow all functions";

$_lang["safe_functions_at_eval_title"] = "Functions to allow eval";
$_lang["safe_functions_at_eval_msg"] = "Comma separated list";

$_lang["multiple_sessions_msg"] = "Information: Multiple active user sessions (total [+total+]) found for user <b>[+username+]</b>.";
$_lang["iconv_not_available"] = "It is important to install/enable extension iconv. Please speak to your host if you don´t know how to enable it.";

$_lang["cm_create_new_category"] = "Create the new category";
$_lang["cm_category_name"] = "Category name";
$_lang["cm_category_position"] = "Category position";
$_lang["cm_no_x_assigned"] = "No %s assigned";
$_lang["cm_save_categorization"] = "Save categorization";
$_lang["cm_update_categories"] = "Update categories";
$_lang["cm_assigned_elements"] = "Assigned elements";
$_lang["cm_edit_name"] = "Edit name";
$_lang["cm_mark_for_deletion"] = "Mark for deletion";
$_lang["cm_delete_now"] = "Delete immediately";
$_lang["cm_delete_element_x_now"] = "Delete &quot;%s&quot; immediately";
$_lang["cm_select_element_group"] = "Select an element group";
$_lang["cm_global_messages"] = "Global Messages";
$_lang["cm_add_new_category"] = "Add a new category";
$_lang["cm_edit_categories"] = "Edit categories";
$_lang["cm_sort_categories"] = "Sort categories";
$_lang["cm_categorize_elements"] = "Categorize elements";
$_lang["cm_translation"] = "Translation";
$_lang["cm_translations"] = "Translations";
$_lang["cm_categorize_x"] = "Categorize <span class=\"highlight\">%s</span>";
$_lang["cm_unknown_error"] = "Something went wrong.";
$_lang["cm_x_assigned_to_category_y"] = "<span class=\"highlight\">%s(%s)</span> has been assigned to category <span class=\"highlight\">%s(%s)</span>";
$_lang["cm_no_categorization"] = "No categorization made.";
$_lang["cm_no_changes"] = "Nothing to change, so no changes made.";
$_lang["cm_x_changes_made"] = "<span class=\"highlight\">%s</span> changes made";
$_lang["cm_enter_name_for_category"] = "Please enter a name for the new category.";
$_lang["cm_category_x_exists"] = "Category <span class=\"highlight\">%s</span> already exists.";
$_lang["cm_category_x_saved_at_position_y"] = "The new category <span class=\"highlight\">%s</span> was saved at position <span class=\"highlight\">%s</span>.";
$_lang["cm_category_x_moved_to_position_y"] = "Category <span class=\"highlight\">%s</span> was moved to position <span class=\"highlight\">%s</span>";
$_lang["cm_category_x_deleted"] = "Category <span class=\"highlight\">%s</span> has been deleted";
$_lang["cm_category_x_renamed_to_y"] = "Category <span class=\"highlight\">%s</span> was renamed to <span class=\"highlight\">%s</span>";
$_lang["cm_translation_for_x_empty"] = "Translation for <span class=\"highlight\">%s</span> was empty";
$_lang["cm_translation_for_x_to_y_success"] = "Translation for <span class=\"highlight\">%s</span> to <span class=\"highlight\">%s</span> successfully saved";
$_lang["cm_save_new_sorting"] = "Save new sorting";
$_lang["cm_translate_phrases"] = "Translate phrases";
$_lang["cm_translate_module_phrases"] = "Translate module-phrases";
$_lang["cm_native_phrase"] = "Native phrase";

$_lang["btn_view_options"] = 'View Options';
$_lang["view_options_msg"] = 'The display & listing of elements can be customized via &quot;View Options&quot;-button. Settings are saved and restored per Browser using HTML5´s localStorage.';
$_lang["viewopts_title"] = 'View Options';
$_lang["viewopts_cb_buttons"] = 'Buttons';
$_lang["viewopts_cb_descriptions"] = 'Descriptions';
$_lang["viewopts_cb_icons"] = 'Icons';
$_lang["viewopts_radio_list"] = 'List';
$_lang["viewopts_radio_inline"] = 'Inline';
$_lang["viewopts_radio_flex"] = 'Flex';
$_lang["viewopts_fontsize"] = 'Font-Size';
$_lang["viewopts_cb_alltabs"] = 'All Tabs';

$_lang['email_sender_method'] = 'The envelope sender of the message';
$_lang['auto'] = 'Auto-detect';
$_lang['use_emailsender'] = 'Use [(emailsender)] value';
$_lang['email_sender_method_message'] = 'The envelope sender of the message. This will usually be turned into a Return-Path header by the receiver, and is the address that bounces will be sent to. Auto-detect will work in most cases.';

$_lang['login_form_position_title'] = 'Login form postiton';
$_lang['login_form_position_left'] = 'left';
$_lang['login_form_position_center'] = 'center';
$_lang['login_form_position_right'] = 'right';
$_lang["login_form_style"] = 'Login form style:';
$_lang["login_form_style_dark"] = 'dark';
$_lang["login_form_style_light"] = 'light';
$_lang['login_logo_title'] = 'Login page logo image';
$_lang['login_logo_message'] = 'Recomended login logo image width: 360px, type .png';
$_lang['login_bg_title'] = 'Login page background image';
$_lang['login_bg_message'] = 'Recomended login page background image width: 1920px  ';

$_lang['manager_menu_position_title'] = 'Main menu position';
$_lang['manager_menu_position_top'] = 'top';
$_lang['manager_menu_position_left'] = 'left';

$_lang['invalid_event_response'] = 'The %s event has ivalid output';

$_lang['chunk_processor'] = 'Chunks processing class';

$_lang["permission_title"] = 'Create / edit permission';
$_lang["groups_permission_title"] = 'Create / edit category';
$_lang["lang_key_desc"] = 'Key language from array $_lang';
$_lang["key_desc"] = 'Key for checked permission';

$_lang["setting_from_file"] = '<strong class="text-danger">Parameter value is defined in core/custom/config/cms/settings</strong>';
$_lang['disable'] = 'Disable';
$_lang['enable'] = 'Enable';

return $_lang;
