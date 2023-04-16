<?php
/**
 * Document Manager Module
 * 
 * Purpose: Contains the language strings for use in the module.
 * Author: Garry Nutting
 * Language: English
 * Date: 2014/02/24
 */
// titles
$_lang['DM_module_title'] = 'Менеджер документів';
$_lang['DM_action_title'] = 'Виберіть дію';
$_lang['DM_range_title'] = 'Вказати діапазон ідентифікаторів документів';
$_lang['DM_tree_title'] = 'Виберіть документи з дерева';
$_lang['DM_update_title'] = 'Оновлення завершено';
$_lang['DM_sort_title'] = 'Редактор покажчика меню';

// tabs
$_lang['DM_doc_permissions'] = 'Дозволи для документів';
$_lang['DM_template_variables'] = 'Змінні шаблону (TV)';
$_lang['DM_sort_menu'] = 'Сортувати пункти меню';
$_lang['DM_change_template'] = 'Змінити шаблон';
$_lang['DM_publish'] = 'Опублікувати/Скасувати публікацію';
$_lang['DM_other'] = 'Інші властивості';

// buttons
$_lang['DM_close'] = 'Закрити менеджер документів';
$_lang['DM_cancel'] = 'Повернутися';
$_lang['DM_go'] = 'Перейти';
$_lang['DM_save'] = 'Зберегти';
$_lang['DM_sort_another'] = 'Відсортувати інше';

// templates tab
$_lang['DM_tpl_desc'] = 'Оберіть необхідний шаблон із таблиці нижче, а потім вкажіть ідентифікатори документів, які потрібно змінити. Або вказавши діапазон ідентифікаторів, або використовуючи опцію дерева нижче.';
$_lang['DM_tpl_no_templates'] = 'Шаблони не знайдено';
$_lang['DM_tpl_column_id'] = 'Ідентифікатор';
$_lang['DM_tpl_column_name'] = 'Назва';
$_lang['DM_tpl_column_description'] = 'Опис';
$_lang['DM_tpl_blank_template'] = 'Порожній шаблон';
$_lang['DM_tpl_results_message'] = 'Використовуйте кнопку "Назад", якщо вам потрібно внести додаткові зміни. Кеш сайту автоматично очищено.';

// template variables tab
$_lang['DM_tv_desc'] = 'Вкажіть ідентифікатори документів, які потрібно змінити, вказавши діапазон ідентифікаторів або використовуючи опцію дерева нижче, потім виберіть потрібний шаблон із таблиці, і відповідні змінні шаблону (TV) будуть завантажені . Введіть потрібні значення змінної шаблону та надішліть на обробку.';
$_lang['DM_tv_template_mismatch'] = 'Цей документ не використовує вибраний шаблон.';
$_lang['DM_tv_doc_not_found'] = 'Цей документ не знайдено в базі даних.';
$_lang['DM_tv_no_tv'] = 'Не знайдено змінних шаблону для шаблону.';
$_lang['DM_tv_no_docs'] = 'Не вибрано документів для оновлення.';
$_lang['DM_tv_no_template_selected'] = 'Жоден шаблон не вибрано.';
$_lang['DM_tv_loading'] = 'Змінні шаблону завантажуються...';
$_lang['DM_tv_ignore_tv'] = 'Ігнорувати ці змінні шаблону (значення, розділені комами):';
$_lang['DM_tv_ajax_insertbutton'] = 'Вставити';

// document permissions tab
$_lang['DM_doc_desc'] = 'Виберіть необхідну групу документів із таблиці нижче та виберіть, чи бажаєте ви додати або видалити групу. Потім вкажіть ідентифікатори документів, які потрібно змінити. Або вказавши діапазон ідентифікаторів, або використовуючи опцію дерева нижче.';
$_lang['DM_doc_no_docs'] = 'Групи документів не знайдено';
$_lang['DM_doc_column_id'] = 'Ідентифікатор';
$_lang['DM_doc_column_name'] = 'Ім\'я';
$_lang['DM_doc_radio_add'] = 'Додати групу документів';
$_lang['DM_doc_radio_remove'] = 'Видалити групу документів';

$_lang['DM_doc_skip_message1'] = 'Документ з ідентифікатором';
$_lang['DM_doc_skip_message2'] = 'вже є частиною вибраної групи документів (пропускається)';

// other tab
$_lang['DM_other_header'] = 'Різні налаштування документа';
$_lang['DM_misc_label'] = 'Доступні налаштування:';
$_lang['DM_misc_desc'] = 'Будь ласка, виберіть налаштування зі спадного меню, а потім потрібний параметр. Зауважте, що одночасно можна змінити лише одне налаштування.';

$_lang['DM_other_dropdown_publish'] = 'Опублікувати/Скасувати публікацію';
$_lang['DM_other_dropdown_show'] = 'Показати/Сховати в меню';
$_lang['DM_other_dropdown_search'] = 'Пошук доступний/неможливий для пошуку';
$_lang['DM_other_dropdown_cache'] = 'Кешувати/Не кешувати';
$_lang['DM_other_dropdown_richtext'] = 'Richtext/Без редактора Richtext';
$_lang['DM_other_dropdown_delete'] = 'Видалити/Відновити';

// radio button text
$_lang['DM_other_publish_radio1'] = 'Опублікувати';
$_lang['DM_other_publish_radio2'] = 'Скасувати публікацію';
$_lang['DM_other_show_radio1'] = 'Сховати в меню';
$_lang['DM_other_show_radio2'] = 'Показати в меню';
$_lang['DM_other_search_radio1'] = 'Можна шукати';
$_lang['DM_other_search_radio2'] = 'Неможливо для пошуку';
$_lang['DM_other_cache_radio1'] = 'Кешувати';
$_lang['DM_other_cache_radio2'] = 'Неможливо кешувати';
$_lang['DM_other_richtext_radio1'] = 'Розширений текст';
$_lang['DM_other_richtext_radio2'] = 'Немає форматованого тексту';
$_lang['DM_other_delete_radio1'] = 'Видалити';
$_lang['DM_other_delete_radio2'] = 'Відновити';

// adjust dates
$_lang['DM_adjust_dates_header'] = 'Установити дати документів';
$_lang['DM_adjust_dates_desc'] = 'Можна змінити будь-які з наведених нижче налаштувань дати документа. Використовуйте опцію «Переглянути календар», щоб встановити дати.';
$_lang['DM_view_calendar'] = 'Переглянути календар';
$_lang['DM_clear_date'] = 'Очистити дату';

// adjust authors
$_lang['DM_adjust_authors_header'] = 'Установити авторів';
$_lang['DM_adjust_authors_desc'] = 'Використовуйте розкривні списки, щоб встановити нових авторів для документа.';
$_lang['DM_adjust_authors_createdby'] = 'Створено:';
$_lang['DM_adjust_authors_editedby'] = 'Редагував:';
$_lang['DM_adjust_authors_noselection'] = 'Без змін';

// labels
$_lang['DM_date_pubdate'] = 'Дата публікації:';
$_lang['DM_date_unpubdate'] = 'Дата скасування публікації:';
$_lang['DM_date_createdon'] = 'Дата створення:';
$_lang['DM_date_editedon'] = 'Змінено в дату:';
$_lang['DM_date_notset'] = '(не встановлено)';
$_lang['DM_date_dateselect_label'] = 'Виберіть дату: ';

// document select section
$_lang['DM_select_submit'] = 'Надіслати';
$_lang['DM_select_range'] = 'Повернутися до встановлення діапазону ідентифікаторів документа';
$_lang['DM_select_range_text'] = '<p><strong>Ключ (де n — ідентифікаційний номер документа):</strong><br /><br />
n* - Змінити налаштування для цього документа та безпосередніх дочірніх елементів<br />
n** - Змінити налаштування для цього документа та ВСІХ дітей<br />
n-n2 - Змінити налаштування для цього діапазону документів<br />
n – змінити налаштування для окремого документа</p>
<p>Приклад: 1*,4**,2-20,25 – це змінить вибране налаштування
для документів 1 і його дітей, документ 4 і всіх дітей, документи 2
через 20 і документ 25.</p>';
$_lang['DM_select_tree'] = 'Перегляд і вибір документів за допомогою дерева документів';

// process tree/range messages
$_lang['DM_process_noselection'] = 'Вибір не зроблено. ';
$_lang['DM_process_novalues'] = 'Жодних значень не вказано.';
$_lang['DM_process_limits_error'] = 'Верхня межа менша за нижню:';
$_lang['DM_process_invalid_error'] = 'Недійсне значення:';
$_lang['DM_process_update_success'] = 'Оновлення завершено успішно, без помилок.';
$_lang['DM_process_update_error'] = 'Оновлення завершено, але виявлено помилки:';
$_lang['DM_process_back'] = 'Назад';

// manager access logging
$_lang['DM_log_template'] = 'Менеджер документів: шаблони змінено.';
$_lang['DM_log_templatevariables'] = 'Менеджер документів: змінені змінні шаблону.';
$_lang['DM_log_docpermissions'] = 'Менеджер документів: права доступу до документів змінено.';
$_lang['DM_log_sortmenu'] = 'Менеджер документів: операцію індексу меню завершено.';
$_lang['DM_log_publish'] = 'Менеджер документів: Менеджер документів: змінено параметри опублікованих/неопублікованих документів.';
$_lang['DM_log_hidemenu'] = 'Менеджер документів: змінено параметри приховування/показу документів у меню.';
$_lang['DM_log_search'] = 'Менеджер документів: змінено параметри документів, доступних/неможливих для пошуку.';
$_lang['DM_log_cache'] = 'Менеджер документів: змінено налаштування документів, які можна кешувати/не кешувати.';
$_lang['DM_log_richtext'] = 'Менеджер документів: змінено параметри використання редактора Richtext для документів.';
$_lang['DM_log_delete'] = 'Менеджер документів: параметри видалення/відновлення документів змінено.';
$_lang['DM_log_dates'] = 'Менеджер документів: параметри дати документів змінено.';
$_lang['DM_log_authors'] = 'Менеджер документів: змінено параметри автора документів.';
?>
