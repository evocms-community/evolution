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

$_lang["about_msg"] = 'Evolution CMS is a <a href="https://evo-cms.com/" target="_blank">PHP Application Framework and Content Management System</a> licensed under the <a href="https://www.gnu.org/licenses/gpl-3.0.html">GNU GPL</a>.';
$_lang["about_title"] = 'درباره مادایکس';

// days
$_lang["monday"] = 'دوشنبه';
$_lang["tuesday"] = 'سه شنبه';
$_lang["wednesday"] = 'چهارشنبه';
$_lang["thursday"] = 'پنجشنبه';
$_lang["friday"] = 'جمعه';
$_lang["saturday"] = 'شنبه';
$_lang["sunday"] = 'یکشنبه';

// templates
$_lang["template"] = 'پوسته یا قالب';
$_lang["templates"] = 'Templates';
$_lang['templatecontroller'] = 'Template Controller';
$_lang["template_assignedtv_tab"] = 'متغیرهای قالب';
$_lang["template_code"] = 'کدهای HTML قالب';
$_lang["template_desc"] = 'توضیحات';
$_lang["template_edit_tab"] = 'ویرایش پوسته یا قالب';
$_lang["template_inuse"] = 'This template is in use. Please set the documents using the template to another template. Documents using this template:';
$_lang["template_management_msg"] = 'در اینجا میتوانید پوسته یا قالب مورد نظر خود را برای ویرایش انتخاب کنید';
$_lang["template_msg"] = 'پوسته ها و قالبها را بسازید و ویرایش کنید. پوسته ها یا قالبهای دستکاری شده یا جدید در قسمت ذخیره یا کش وبگاه قابل مشاهده نخواهند بود تا زمانیکه ذخیره یا کش تخلیه شده باشد.به هر حال, شما میتوانید از قابلیت پیش نمایش در صفحه استفاده کنید تا پوسته و قالب دستکاری شده یا جدید خود را بصورت زنده و پویا مشاهده کنید';
$_lang["template_name"] = 'اسم پوسته یا قالب';
$_lang["template_no_tv"] = 'هنوز هیچ متغیری از متغیرهای قالبها و پوسته ها در این قالب یا پوسته تعریف و کاربردی نشده';
$_lang["template_notassigned_tv"] = 'These Template Variables are available for assigning.';
$_lang["template_reset_all"] = 'همه ی صفحات از پوسته و قالب پیشفرض مورد نظر استفاده کنند';
$_lang["template_reset_specific"] = 'صفر یا از نو کردن \'%s\' صفحه';
$_lang["template_assigned_blade_file"] = 'پرونده blade مربوطه:';
$_lang["template_create_blade_file"] = 'در ذخیره فایل الگوی ایجاد کنید';
$_lang["template_selectable"] = 'Template selectable when creating or editing ressources.';
$_lang["template_title"] = 'ایجاد / ویرایش پوسته یا قالب';
$_lang["template_tv_edit"] = 'ترتیب قرارگیری متغیرهای قالب یا پوسته را ویرایش کنید';
$_lang["template_tv_edit_message"] = 'Drag to reorder the Template Variables for this template.';
$_lang["template_tv_edit_title"] = 'Template Variable Sort Order';
$_lang["template_tv_msg"] = 'فهرست متغیرهای قالبی که برای این پوسته یا قالب بکاربرده شده اند.';

// tmplvars
$_lang["tv"] = 'متغیر پوسته یا قالب';
$_lang["tmplvar"] = 'Template Variable';
$_lang["tmplvars"] = 'متغیرهای پوسته یا قالب';
$_lang["tmplvar_access_msg"] = 'گروه پرونده هایی را که مجاز به ایجاد تغییر در محتوا یا مقدار این متغییر هستند را انتخاب کنید';
$_lang["tmplvar_change_template_msg"] = 'تغییر دادن این قالب یا پوسته باعث میشود صفحه مجددا متغیرهای قالب را بازخوانی کند, و تغییرات ذخیره نشده از دست خواهد رفت.\n\n آیا از تغییر این پوسته یا قالب اطمینان دارید؟';
$_lang["tmplvar_inuse"] = 'پرونده های زیر در حال حاضر از این متغیر پوسته یا قالب استفاده میکنند. برای حذف آن روی دکمه ی حذف و در غیر این صورت روی کنسل کلیک کنید .';
$_lang["tmplvar_tmpl_access"] = 'دسترسی قالب';
$_lang["tmplvar_tmpl_access_msg"] = 'پوسته ها یا قالبهایی که مجاز به دسترسی و انجام عملیات روی این متغیر هستند را انتخاب کنید';
$_lang["tmplvars_binding_msg"] = 'این فیلد فشردن و چسباندن منبع داده ها را از طریق استفاده از دستور @ فراهم می کند';
$_lang["tmplvars_caption"] = 'توضیح';
$_lang["tmplvars_default"] = 'مقدار پیشفرض';
$_lang["tmplvars_description"] = 'توضیحات';
$_lang["tmplvars_elements"] = 'تنظیم مقدار ورودی';
$_lang["tmplvars_inherited"] = 'Value inherited';
$_lang["tmplvars_management_msg"] = 'فیلدهای اضافی محتوای مخصوص خود (متغیرهای قالب) برای پرونده های خود را مدیریت کنید.';
$_lang["tmplvars_msg"] = 'متغیرهای پوسته یا قالب را اینجا اضافه یا ویرایش کنید. متغیرهای قالب بایستی در پوسته یا قالب قرار گیرند تا از طریق پرونده ها یا اسنیپتها بتوان به آنها دسترسی یافت.';
$_lang["tmplvars_name"] = 'نام متغیر';
$_lang["tmplvars_novars"] = 'هیچ متغیر قالبی یافت نشد';
$_lang["tmplvars_rank"] = 'تنظیم به ترتیب';
$_lang["tmplvars_rank_edit_message"] = 'Drag to reorder the Template Variables.';
$_lang["tmplvars_reset_params"] = 'صفر یا از نو کردن پارامترها';
$_lang["tmplvars_title"] = 'Create/edit Template Variable';
$_lang["tmplvars_type"] = 'نوع ورودی';
$_lang["tmplvars_widget"] = 'ابزار';
$_lang["tmplvars_widget_prop"] = 'مشخصات ویدگت';
$_lang["role_no_tv"] = 'No Variables have been assigned to this Role yet.';
$_lang["role_notassigned_tv"] = 'These Variables are available for assigning.';
$_lang["role_tv_msg"] = 'The Variables assigned to this Role are listed below.';
$_lang["tmplvar_roles_access_msg"] = 'Select the Roles that are allowed to access/process this Template Variable';

// snippets
$_lang["snippet"] = 'اسنیپت';
$_lang["snippets"] = 'Snippets';
$_lang["snippet_code"] = 'کدخام PHP اسنیپت';
$_lang["snippet_desc"] = 'توضیحات';
$_lang["snippet_execonsave"] = 'اجرای اسنیپت پس از ذخیره ی آن';
$_lang["snippet_management_msg"] = 'در اینجا میتوانید اسنیپت مورد نظر خود را برای ویرایش انتخاب نمایید :';
$_lang["snippet_msg"] = 'در اینجا شما میتوانید اسنیپتها را ایجاد / ویرایش کنید. به خاطر داشته باشید که اسنیپتها کد های خام PHP هستند و اگر شما تمایل دارید که خروجی یا نتیجه ی اسنیپت در بخش خاصی از پوسته یا قالب ویگاه شما به نمایش درآید شما بایستی مقدار آنرا در پوسته یا قالب وارد کنید';
$_lang["snippet_name"] = 'نام اسنیپت';
$_lang["snippet_properties"] = 'خصوصیات پیشفرض';
$_lang["snippet_title"] = 'ایجاد / ویرایش اسنیپت';

// chunks
$_lang["htmlsnippet"] = 'Chunk';
$_lang["htmlsnippets"] = 'Chunks';
$_lang["htmlsnippet_desc"] = 'توضیحات';
$_lang["htmlsnippet_management_msg"] = 'در اینجا شما میتوانید چانک مورد نظر خود را برای ویرایش انتخاب کنید.';
$_lang["htmlsnippet_msg"] = 'در اینجا شما میتوانید چانکها را ایجاد / ویرایش نمایید. به خاطر داشته باشید, چانکها فقط محتوای \'خالص\' کدهای HTML هستند, به همین ترتیب هیچ کد PHP قابل پردازش نخواهد بود.';
$_lang["htmlsnippet_name"] = 'اسم چانک';
$_lang["htmlsnippet_title"] = 'ایجاد / ویرایش چانک';
$_lang["chunk"] = 'چانک';
$_lang["chunk_code"] = 'کد چانک (HTML)';
$_lang["chunk_multiple_id"] = 'Error: Multiple Chunks share the same unique ID.';
$_lang["chunk_no_exist"] = 'Chunk does not exist.';

// plugins
$_lang["plugin"] = 'پلاگین';
$_lang["plugins"] = 'Plugins';
$_lang["plugin_code"] = 'کدهای پلاگین یا PHP';
$_lang["plugin_config"] = 'تنظیمات پلاگین ';
$_lang["plugin_desc"] = 'توضیحات ';
$_lang["plugin_disabled"] = 'غیر فعال کردن پلاگین';
$_lang["plugin_event_msg"] = 'فعالیتهایی  را که میخواهید این پلاگین به آنها پایبند باشد را مشخص کنید';
$_lang["plugin_management_msg"] = 'دراینجا میتوانید نوع پلاگین مورد نظر خود را برای اعمال تغییرات در آن انتخاب کنید';
$_lang["plugin_msg"] = 'در اینجا شما میتوانید پلاگینها را ایجاد / ویرایش کنید. پلاگینها در واقع کدهای خام و خالص PHP هستند که از فراخوانی دستوری مربوط به آن وظیفه ای مشخص در سیستم اعمال میشود';
$_lang["plugin_name"] = 'نام پلاگین ';
$_lang["plugin_priority"] = 'ویرایش ترتیب و نحوه اجرای پلاگینها به ترتیب وظیفه و دستور';
$_lang["plugin_priority_instructions"] = 'Drag to reorder the Plugins under each Event header. The first plugin to execute should go at the top.';
$_lang["plugin_priority_title"] = 'Plugin Execution Order';
$_lang["purge_plugin"] = 'Purge obsolete plugins';
$_lang["purge_plugin_confirm"] = 'Are you sure you want to purge obsolete plugins?';
$_lang["plugin_title"] = 'ایجاد / ویرایش پلاگین';

// categories
$_lang["category"] = 'Category';
$_lang["categories"] = 'Categories';
$_lang["category_heading"] = 'شاخه یا کتگوری';
$_lang["category_manager"] = 'Category Manager';
$_lang["category_management"] = 'Category management';
$_lang["category_msg"] = 'در اینجا شما میتوانید کلیه ی منابع جمعبندی شده بوسیله ی شاخه یا کتگوری را مرور کنید.';

// file
$_lang["file_delete_file"] = 'حذف فایل';
$_lang["file_delete_folder"] = 'حذف پوشه';
$_lang["file_deleted"] = 'موفقیت آمیز!';
$_lang["file_download_file"] = 'دانلود فایل';
$_lang["file_download_unzip"] = 'بازکردن فایل';
$_lang["file_folder_chmod_error"] = 'قادر به تغییر دسترسی نیست, شما بایستی سطوح دسترسی را خارج از سیستم مادایکس تعریف کنید.';
$_lang["file_folder_created"] = 'ایجاد پوشه موفقیت آمیز بود!';
$_lang["file_folder_deleted"] = 'حذف پوشه موفقیت آمیز بود!';
$_lang["file_folder_not_created"] = 'قادر به ایجاد پوشه نمی باشد';
$_lang["file_folder_not_deleted"] = 'قادر به حذف پوشه نمی باشد. از این اطمینان حاصل کنید که پیش از حذف پوشه محتویاتی داخل آن نمی باشد!';
$_lang["file_not_deleted"] = 'ناموفق!';
$_lang["file_not_saved"] = 'قادر به حفظ و ذخیره ی فایل نمی باشد, لطفا از این مموضوع اطمینان حاصل کنید که دایره یا دایرکتوری مقصد قابلیت نگارش را دارا می باشد!';
$_lang["file_saved"] = 'آپلود فایل موفقیت آمیز بود!';
$_lang["file_unzip"] = 'بازکردن فایل موفقیت آمیز بود!';
$_lang["file_unzip_fail"] = 'بازکردن فایل ناموفق بود!';

// files
$_lang["files"] = 'Files';
$_lang["files_files"] = 'فایل ها';
$_lang["files_access_denied"] = 'دسترسی شما محدود است';
$_lang["files_data"] = 'داده';
$_lang["files_dir_listing"] = 'تهیه ی فهرست از پوشه یا دایره به منظور :';
$_lang["files_directories"] = 'دایره یا دایرکتوری ها';
$_lang["files_directory_is_empty"] = 'This directory is empty.';
$_lang["files_dirwritable"] = 'پوشه یا دایره قابل نگارش باشد؟';
$_lang["files_editfile"] = 'ویرایش فایل';
$_lang["files_file_type"] = 'انواع فایل :';
$_lang["files_filename"] = 'اسم فایل';
$_lang["files_fileoptions"] = 'تنظیم حالات';
$_lang["files_filesize"] = 'اندازه ی فایل';
$_lang["files_filetype_notok"] = 'اجازه ی آپلود این نوع از فایلها سلب یا ممنوع می باشد!';
$_lang["files_management"] = 'Manage Files';
$_lang["files_management_no_permission"] = 'You do not have enough permissions to view or edit these files. Ask the administrator to grant you access to <b>%s</b>.';
$_lang["files_modified"] = 'تنظیمات انجام شده';
$_lang["files_top_level"] = 'به بالاترین درجه';
$_lang["files_up_level"] = 'یک پله بالاتر';
$_lang["files_upload_copyfailed"] = 'تهیه ی رونوشت و کپی فایل به دایره یا دایرکتوری مورد نظر موفق نبود - آپلود ناموفق!';
$_lang["files_upload_error"] = 'خطا';
$_lang["files_upload_error0"] = 'مشکلی به هنگام آپلود ایجاد شده است.';
$_lang["files_upload_error1"] = 'فایلی که قصد آپلود آنرا دارید بسیار حجیم است.';
$_lang["files_upload_error2"] = 'فایلی که قصد آپلود آنرا دارید بسیار حجیم است.';
$_lang["files_upload_error3"] = 'تنها بخشهایی از فایلی که قصد آپلود آنرا دارید آپلود شده است.';
$_lang["files_upload_error4"] = 'شما بایستی فایلی را برای آپلود انتخاب کنید.';
$_lang["files_upload_error5"] = 'مشکلی در عملیات آپلود فایل شما ایجاد شده است.';
$_lang["files_upload_inhibited_msg"] = '<b>قابلیت آپلود سلب شده است</b> - از این موضوع اطمینان حاصل کنید که قابلیت آپلود فراهم است و دایره یا دایرکتوری آن قابل نگارش است.<br />';
$_lang["files_upload_ok"] = 'آپلود فایل موفقیت آمیز بود!';
$_lang["files_upload_permissions_error"] = 'Possible permission problems - the directory you want to upload to needs to be writable by your webserver.';
$_lang["files_uploadfile"] = 'آپلود فایل';
$_lang["files_uploadfile_msg"] = 'انتخاب فایل برای آپلود :';
$_lang["files_uploading"] = 'در حال آپلود <b>%s</b> به <b>%s/</b><br />';
$_lang["files_viewfile"] = 'مرور فایل';

// modules
$_lang["module"] = 'Module';
$_lang["modules"] = 'ماژولها';
$_lang["module_code"] = 'کد PHP ماژول';
$_lang["module_config"] = 'تنظیمات ماژول';
$_lang["module_desc"] = 'توضیحات';
$_lang["module_disabled"] = 'تعلیق ماژول';
$_lang["module_edit_click_title"] = 'برای ویرایش ماژول اینجا کلیک کنید';
$_lang["module_group_access_msg"] = 'گروههای کاربری که مجاز به اجرای این ماژول در بخش مدیریت محتوا هستند را انتخاب کنید.';
$_lang["module_management"] = 'مدیریت ماژولها';
$_lang["module_management_msg"] = 'در اینجا شما میتوانید ماژول مورد نظر خود را برای اجرا یا تنظیم انتخاب کنید. برای اجرای ماژول روی نماد یا آیکون در داخل همان قسمت کلیک کنید. برای تنظیم ماژول روی اسم ان کلیک کنید.';
$_lang["module_msg"] = 'در اینجا شما میتوانید ماژولها را ایجاد / ویرایش کنید. ماژول مجموعه ای از منابعی همچون پلاگینها اسنیپتها و غیره می باشد.';
$_lang["module_name"] = 'اسم ماژول';
$_lang["module_resource_msg"] = 'در اینجا شما میتوانید منابعی را که این ماژول به آنها بستگی دارد را اضافه و کم کنید. برای افزودن منبعی جدید روی یکی از دکمه های اضافه کردن کلیک کنید.';
$_lang["module_resource_title"] = 'متعلقات ماژول';
$_lang["module_title"] = 'ایجاد / ویرایش ماژول';
$_lang["module_viewdepend_msg"] = 'در اینجا شما میتوانید منابعی که این ماژول به آنها وابسته است را مشاهده کنید. برای تنظیم ماژول روی دکمه ی \'متعلقات ماژول\' کلیک کنید';

// elements
$_lang["element"] = 'منبع';
$_lang["elements"] = 'منابع';
$_lang["element_categories"] = 'نمایش مخلوط';
$_lang["element_filter_msg"] = 'Type here to filter list';
$_lang["element_management"] = 'مدیریت منابع';
$_lang["element_name"] = 'نام منبع';
$_lang["element_selector_msg"] = 'منابع را از فهرست زیر انتخاب و روی \'وارد کردن\' کلیک کنید.';
$_lang["element_selector_title"] = 'انتخابگر منبع';

// resource
$_lang["resource"] = 'پرونده';
$_lang["resource_alias"] = 'آلایس پرونده';
$_lang["resource_alias_help"] = 'در اینجا شما میتوانید یک آلایس برای این پرونده انتخاب کنید. این حالت شما را قادر به دسترسی به پرونده از طریق:\n\nhttp://yourserver/alias می کند\n\nاین حالت فقط در صورتیکه شما از آدرسهای دوستانه استفاده کرده باشید فعال می شود.';
$_lang["resource_content"] = 'محتوای پرونده';
$_lang["resource_description"] = 'توضیحات';
$_lang["resource_description_help"] = 'شما میتوانید توضیحاتی را به دلخواه در مورد پرونده در اینجا وارد کنید.';
$_lang["resource_duplicate"] = 'پرونده ی مشابه';
$_lang["resource_long_title_help"] = 'در اینجا شما میتوانید عنوانی بلندتر را برای پرونده ی خود وارد کنید. این کمک کار موتورهای جستجو خواهد بود, و میتواند با توضیحاتی بیشتر برای شما بهتر یادآوری و یا تعریف شود.';
$_lang["resource_metatag_help"] = 'کلمات کلیدی و مشخصات کاربردی که تمایل دارید به این پرونده اختصاص یابد را وارد کنید. کلید کنترل صفحه کلید خود را پایین نگه داشته تا بتوانید همزمان چنیدین مشخصه ی کاربردی و کلمات کلیدی را انتخاب کنید.';
$_lang["resource_opt_contentdispo"] = 'ساختار محتوا';
$_lang["resource_opt_contentdispo_help"] = 'ساختار محتوایی را برای مشخص کردن نحوه ی پردازش مرورگر وب با محتوای مورد نظر خود مشخص کنید. برای فایلهای قابل دانلود میتوانید ساختار محتوایی را روی فایلهای پیوستی یا ضمیمه تنظیم کنید';
$_lang["resource_opt_emptycache"] = 'ذخیره یا کش خالی شود؟';
$_lang["resource_opt_emptycache_help"] = 'انتخاب این کزینه و فعالسازی آن سیستم را پس از ذخیره ی پرونده قادر به پاسکازی ذخیره یا کش میکند. در این صورت بازدید کنندگان وبگاه شما محتوای قدیمی این پرونده را مجددا مشاهده نخواهند کرد.';
$_lang["resource_opt_folder"] = 'حاوی یا محفظه؟';
$_lang["resource_opt_folder_help"] = 'این گزینه را انتخاب کنید تا این قابلیت را به این پرونده بدهید که بعنوان حاوی یا محفظه برای سایر پرونده ها عمل کند. این  \'حاوی یا محفظه\' شبیه یک پوشه است, با این تفاوت که میتواند شامل محتوا هم باشد.';
$_lang["resource_opt_menu_index"] = 'محتوای فهرست یا منو';
$_lang["resource_opt_menu_index_help"] = 'اجزای داخلی فهرست گزینه ای است که شما متوانید از آن به منظور ترتیب دادن به پرونده ها در اسنیپت منو یا فهرست خود استفاده کنید. همچنین میتوانید کاربردهای دیگری از آن در اسنیپت خود داشته باشید.';
$_lang["resource_opt_menu_title"] = 'عنوان در فهرست';
$_lang["resource_opt_menu_title_help"] = 'عنوان در فهرست قابلیتی است که به شما امکان استفاده از عنوان مختصر برای پرونده در داخل اسنیپتهای فهرست و یا ماژولها میدهد';
$_lang["resource_opt_published"] = 'انتشار یابد؟';
$_lang["resource_opt_published_help"] = 'این گزینه را انتخاب کنید تا پس از حفظ پرونده همزمان منتشر شود.';
$_lang["resource_opt_richtext"] = 'ویرایشگر متن؟';
$_lang["resource_opt_richtext_help"] = 'این گزینه را انتخاب کنید تا از ویرایشگر برای ویرایش متون پرونده ها استفاده شود. اگر پرونده های شما حاوی جاوا اسکریپت و فرم ها می باشد, این گزینه را غیر فعال کنید تا در محیط HTML ویرایش کنید و بدین ترتیب ویرایشگر اختلالی در محتوای اصلی شما ایجاد نمی کند.';
$_lang["resource_opt_show_menu"] = 'نمایش در فهرست';
$_lang["resource_opt_show_menu_help"] = 'این گزینه را انتخاب کنید تا پرونده در داخل فهرست وب نمایش داده شود. لطفا به خاطر داشته باشید تا برخی از ابزار تهیه ی فهرست یا به این گزینه ترتیب اثر نمی دهند.';
$_lang["resource_opt_trackvisit_help"] = 'دفعات بازدید هر یک از بازدیدکنندگان ثبت شود';
$_lang["resource_overview"] = 'بازخوانی پرونده';
$_lang["resource_parent"] = 'سرگروه پرونده';
$_lang["resource_parent_help"] = 'برای انتخاب یا مشخص کردن سرگروه این پرونده روی نماد یا آیکون بالا کلیک کنید سپس از طریق درختی روی پرونده کلیک کنید تا سرگروه جدید آنرا تعیین کنید';
$_lang["resource_permissions_error"] = 'Assign this Resource to at least one Resource Group to which you have access.';
$_lang["resource_setting"] = 'تنظیمات پرونده';
$_lang["resource_summary"] = 'خلاصه یا مقدمه ی کوتاه مطلب';
$_lang["resource_summary_help"] = 'خلاصه ای مختصر از پرونده را در اینجا ذکر کنید.';
$_lang["resource_title"] = 'عنوان';
$_lang["resource_title_help"] = 'اسم / عنوان پرونده را اینجا وارد کنید. لطفا از بک اسلش در انتخاب نامها استفاده نکنید!';
$_lang["resource_to_be_moved"] = 'پرونده ی مورد نظر برای انتقال';
$_lang["resource_type"] = 'Resource Type';
$_lang["resource_type_message"] = 'Weblinks reference Resources on the Internet including another Evolution CMS Resource, an external page, or an image or other file on the Internet. Weblinks should have a text/html Internet Media Type and Inline Content-Disposition.';
$_lang["resource_type_weblink"] = 'Weblink';
$_lang["resource_type_webpage"] = 'Web page';
$_lang["resource_weblink_help"] = 'آدرس شیء مورد نظر خود را که تمایل دارید این وب لینک به آن اشاره کند را در اینجا وارد کنید.';
$_lang["resources_in_container"] = 'پرونده های موجود در این پرونده ی حاوی';
$_lang["resources_in_container_no"] = 'این پرونده ی حاوی, هیچ زیر پرونده ای ندارد.';

// role
$_lang["role"] = 'نقش';
$_lang["role_about"] = 'مشاهده ی صفحه ی درباره و راهنما';
$_lang["role_actionok"] = 'مرور صفحه ی عملکردهای تکمیل شده';
$_lang["role_assets_images"] = 'Manage assets/images';
$_lang["role_assets_files"] = 'Manage assets/files';
$_lang["role_bk_manager"] = 'استفاده از مدیریت پشتیبانی داده';
$_lang["role_cache_refresh"] = 'تخلیه ی کامل ذخیره یا کش وبگاه';
$_lang["role_category_manager"] = 'Use the Category Manager';
$_lang["role_change_password"] = 'تغییر کلمه ی عبور';
$_lang["role_change_resourcetype"] = 'تغییر نوع منبع';
$_lang["role_chunk_management"] = 'مدیریت چانک';
$_lang["role_config_management"] = 'مدیریت تنظیمات';
$_lang["role_content_management"] = 'مدیریت محتوا';
$_lang["role_create_chunk"] = 'ایجاد چانک جدید';
$_lang["role_create_doc"] = 'ایجاد پرونده جدید';
$_lang["role_create_plugin"] = 'ایجاد پلاگین جدید';
$_lang["role_create_snippet"] = 'ایجاد اسنیپت جدید';
$_lang["role_create_template"] = 'ایجاد قالبهای جدید وبگاه';
$_lang["role_credits"] = 'نمایش جزییات';
$_lang["role_delete_chunk"] = 'حذف چانک';
$_lang["role_delete_doc"] = 'حذف پرونده ها';
$_lang["role_delete_eventlog"] = 'حذف آمار فعالیت';
$_lang["role_delete_module"] = 'حذف ماژولها';
$_lang["role_delete_plugin"] = 'حذف پلاگینها';
$_lang["role_delete_role"] = 'حذف نقش ها';
$_lang["role_delete_snippet"] = 'حذف اسنیپتها';
$_lang["role_delete_template"] = 'حذف پوسته ها';
$_lang["role_delete_user"] = 'حذف کاربران';
$_lang["role_delete_web_user"] = 'حذف کاربران وب';
$_lang["role_edit_chunk"] = 'ویرایش چانکها';
$_lang["role_edit_doc"] = 'ویرایش پرونده';
$_lang["role_edit_doc_metatags"] = 'ویرایش کلمات کلیدی و کاربردی';
$_lang["role_edit_module"] = 'ویرایش ماژول';
$_lang["role_edit_plugin"] = 'ویرایش پلاگین';
$_lang["role_edit_role"] = 'ئیرایش نقش ها';
$_lang["role_edit_settings"] = 'اعمال تغییر در تنظیمات وبگاه';
$_lang["role_edit_snippet"] = 'ویرایش اسنیپتها';
$_lang["role_edit_template"] = 'ویرایش پوسته یا قالب وبگاه';
$_lang["role_edit_user"] = 'ویرایش کاربران';
$_lang["role_edit_web_user"] = 'ویرایش کاربران وب';
$_lang["role_empty_trash"] = 'کلیه ی پرونده های حذف شده را دور بریز';
$_lang["role_errors"] = 'مشاهده ی پنجره ی خطا و اشتباه';
$_lang["role_eventlog_management"] = 'مدیریت آمار فعالیت ها';
$_lang["role_export_static"] = 'تهیه ی خروجی از صفحات استاتیک';
$_lang["role_file_management"] = 'File Management';
$_lang["role_file_manager"] = 'استفاده از قابلیت مدیریت فایل';
$_lang["role_frames"] = 'درخواست فریم های مدیریت';
$_lang["role_help"] = 'مشاهده ی صفحات راهنما';
$_lang["role_home"] = 'درخواست صفحه ی مقدمه ی مدیریت';
$_lang["role_import_static"] = 'واردسازی HTML';
$_lang["role_logout"] = 'خروج از مدیریت';
$_lang["role_list_module"] = 'List Module';
$_lang["role_manage_metatags"] = 'مدیریت کلمات شاخص و کلیدی وبگاه';
$_lang["role_management_msg"] = 'در اینجا شما میتوانید نقش مورد نظر خود را برای ویرایش انتخاب کنید.';
$_lang["role_management_title"] = 'نقش ها';
$_lang["role_messages"] = 'مرور و ارسال پیغامها';
$_lang["role_module_management"] = 'مدیریت ماژولها';
$_lang["role_name"] = 'نام نقش';
$_lang["role_new_module"] = 'ایجاد ماژول جدید';
$_lang["role_new_role"] = 'ایجاد نقش جدید';
$_lang["role_new_user"] = 'ایجاد کاربر جدید';
$_lang["role_new_web_user"] = 'ایجاد کاربر وب جدید';
$_lang["role_plugin_management"] = 'مدیریت پلاگینها';
$_lang["role_publish_doc"] = 'انتشار پرونده ها';
$_lang["role_remove_locks"] = 'Remove Locks';
$_lang["role_role_management"] = 'نقش ها';
$_lang["role_run_module"] = 'بکارگیری ماژول';
$_lang["role_save_chunk"] = 'ذخیره ی چانکها';
$_lang["role_save_doc"] = 'ذخیره ی پرونده ها';
$_lang["role_save_module"] = 'ذخیره ی ماژول';
$_lang["role_save_password"] = 'ذخیره ی کلمه ی عبور';
$_lang["role_save_plugin"] = 'ذخیره پلاگینها';
$_lang["role_save_role"] = 'ذخیره ی نقش ها';
$_lang["role_save_snippet"] = 'ذخیره ی اسنیپتها';
$_lang["role_save_template"] = 'ذخیره ی پوسته ها یا قالبها';
$_lang["role_save_user"] = 'ذخیره ی کاربران';
$_lang["role_save_web_user"] = 'ذخیره ی کاربران وب';
$_lang["role_snippet_management"] = 'مدیریت اسنیپت';
$_lang["role_template_management"] = 'مدیریت پوسته یا قالب';
$_lang["role_title"] = 'ایجاد / ویرایش نقش';
$_lang["role_udperms"] = 'مدیریت سطوح دسترسی';
$_lang["role_user_management"] = 'مدیریت کاربر';
$_lang["role_view_docdata"] = 'مرور محتویات پرونده';
$_lang["role_view_eventlog"] = 'مرور آمار فعالیت ها';
$_lang["role_view_logs"] = 'مرور ثبت یا لاگ سیستم';
$_lang["role_view_unpublished"] = 'مرور پرونده های منتشر نشده';
$_lang["role_web_access_persmissions"] = 'سطوح دسترسی وب';
$_lang["role_web_user_management"] = 'مدیریت کاربر وب';

// user
$_lang["user"] = 'کاربر ';
$_lang["users"] = 'حراست';
$_lang["user_block"] = 'ممنوع ';
$_lang["user_blockedafter"] = 'ممنوعیت از تاریخ ';
$_lang["user_blockeduntil"] = 'ممنوعیت تا تاریخ ';
$_lang["user_changeddata"] = 'اطلاعات شما تغییر کرده لذا مجددا وارد شوید';
$_lang["user_country"] = 'کشور ';
$_lang["user_dob"] = 'تاریخ تولد ';
$_lang["user_doesnt_exist"] = 'کاربر وجود ندارد';
$_lang["user_edit_self_msg"] = '<b>برای بروز رسانی کامل اطلاعات شما بایستی یک بار از سیستم خارج و مجددا به سیستم بازگردید</b><br />همچنین, میتوانید انتخاب کنید که یک کلمه ی عبور جدید برایتان ارسال شود, کلمه ی عبور جدید شما از طریق پست الکترونیک برای شما ارسال خواهد شد';
$_lang["user_email"] = 'آدرس پست الکترونیک ';
$_lang["user_failedlogincount"] = 'ورود ناموفق ';
$_lang["user_fax"] = 'دورنگار ';
$_lang["user_female"] = 'مونث - زن';
$_lang["user_full_name"] = 'نام و نام خانوادگی ';
$_lang["user_first_name"] = 'First name';
$_lang["user_last_name"] = 'Last Name';
$_lang["user_middle_name"] = 'Middle Name';
$_lang["user_gender"] = 'جنسیت ';
$_lang["user_is_blocked"] = 'این کاربر ممنوع شده است!';
$_lang["user_logincount"] = 'دفعات ورود ';
$_lang["user_male"] = 'مذکر - مرد';
$_lang["user_management_msg"] = 'در اینجا شما میتوانید کاربر مدیریت محتوایی مورد نظر خود را برای ویرایش انتخاب کنید.مدیران محتوایی آن دسته از کاربرانی هستند که قابلیت و اجازه دسترسی به بخش مدیریت محتوا را دارند';
$_lang["user_management_title"] = 'کاربران مدیریت';
$_lang["user_mobile"] = 'شماره همراه ';
$_lang["user_phone"] = 'شماره تلفن ';
$_lang["user_photo"] = 'تصویر کاربر';
$_lang["user_photo_message"] = 'آدرس اینترنتی تصویر کاربر را وارد کنید و یا برای ارسال مستقیم تصویر به سرور از دکمه " اضافه " استفاده کنید';
$_lang["user_prevlogin"] = 'آخرین ورود ';
$_lang["user_role"] = 'نقش کاربر ';
$_lang["no_user_role"] = 'No user role';
$_lang["user_state"] = 'استان ';
$_lang["user_title"] = 'ایجاد / ویرایش کاربر';
$_lang["user_upload_message"] = ' اگر شما قصد ممنوع کردن این کاربر برای آپلود هرنوع فایلی در این شاخه دارید از این مسئله اطمینان حاصل کنید که \'حالت استفاده از تنظیمات عمومی\' فعال نیست و تیک نخورده باشد و فیلد را خالی بگذارید';
$_lang["user_use_config"] = 'حالت استفاده از تنظیمات عمومی';
$_lang["user_verification"] = 'User is verified';
$_lang["user_zip"] = 'کدپستی ';
$_lang["username"] = 'نام کاربری ';
$_lang["username_unique"] = 'User name is already in use!';
$_lang["user_street"] = 'Street';
$_lang["user_city"] = 'City';
$_lang["user_other"] = 'Other';

// add
$_lang["add"] = 'اضافه کردن';
$_lang["add_chunk"] = 'اضافه کردن چانک';
$_lang["add_doc"] = 'اضافه کردن پرونده';
$_lang["add_folder"] = 'پوشه ی جدید';
$_lang["add_plugin"] = 'اضافه کردن پلاگین';
$_lang["add_resource"] = 'پرونده ی جدید';
$_lang["add_snippet"] = 'اضافه کردن اسنیپت';
$_lang["add_tag"] = 'اضافه کردن تگ';
$_lang["add_template"] = 'اضافه کردن پوسته یا قالب';
$_lang["add_tv"] = 'اضافه کردن متغیر های قالب';
$_lang["add_weblink"] = 'لینک جدید';

// new
$_lang["new_category"] = 'بخش جدید';
$_lang["new_file_permissions_message"] = 'زمانیکه فایل جدیدی را در بخش مدیریت فایل آپلود میکیند, مدیریت فایل تلاش خواهد کرد اختیارات و سطوح دسترسی به فایل را بر اساس تنظیمات تغییر دهد. این حالت در برخی از سرورهای میزبان فعال نمی شود, همچون ISS, که شما شخصا بایستی اختیارات و سطوح دسترسی فایل ها را تنظیم کنید.';
$_lang["new_file_permissions_title"] = 'اجازه ی دسترسی به فایل جدید :';
$_lang["new_folder_permissions_message"] = 'زمانیکه پوشه ی جدیدی را در بخش مدیریت فایل آپلود میکیند, مدیریت فایل تلاش خواهد کرد اختیارات و سطوح دسترسی به پوشه را بر اساس تنظیمات تغییر دهد. این حالت در برخی از سرورهای میزبان فعال نمی شود, همچون ISS, که شما شخصا بایستی اختیارات و سطوح دسترسی پوشه ها را تنظیم کنید.';
$_lang["new_folder_permissions_title"] = 'اجازه ی دسترسی به پرونده یا فولدر جدید :';
$_lang["new_permission"] = 'New Permission';
$_lang["new_htmlsnippet"] = 'چانک جدید';
$_lang["new_keyword"] = 'اضافه کردن کلمه ی کلیدی جدید : ';
$_lang["new_module"] = 'ماژول جدید';
$_lang["new_parent"] = 'سرگروه جدید';
$_lang["new_plugin"] = 'پلاگین جدید';
$_lang["new_role"] = 'ایجاد نقش جدید';
$_lang["new_snippet"] = 'اسنیپت جدید';
$_lang["new_template"] = 'پوسته یا قالب جدید';
$_lang["new_tmplvars"] = 'متغیر جدید پوسته یا قالب';
$_lang["new_user"] = 'کاربر جدید';
$_lang["new_web_user"] = 'کاربر وب جدید';
$_lang["new_resource"] = 'پرونده ی جدید';

// manage
$_lang["manage_categories"] = 'Manage Categories';
$_lang["manage_depends"] = 'مدیریت متعلقات';
$_lang["manage_files"] = 'مدیریت فایلها';
$_lang["manage_htmlsnippets"] = 'Manage Chunks';
$_lang["manage_metatags"] = 'مدیریت کلمات کلیدی و کلمات شاخص';
$_lang["manage_modules"] = 'مدیریت ماژولها';
$_lang["manage_plugins"] = 'Manage Plugins';
$_lang["manage_snippets"] = 'Manage Snippets';
$_lang["manage_templates"] = 'Manage Templates';
$_lang["manage_documents"] = 'Manage Documents';
$_lang["manage_permission"] = 'Manage Permissions';

// move
$_lang["move"] = 'انتقال';
$_lang["move_resource"] = 'انتقال پرونده';
$_lang["move_resource_message"] = 'انتقال پرونده و کلیه ی زیر گروههای آن را میتوانید از طریق انتخاب یک سرگروه جدید انجام دهید. اگر شما پرونده ای را انتخاب کنید که هنوز به عنوان محفظه شناخته نمی شو, تبدیل به محفظه خواهد شد. لطفا از طریق درختی روی سرگروه جدید کلیک کنید.';
$_lang["move_resource_new_parent"] = 'لطفا سرگروه جدیدی را از درختی پرونده انتخاب کنید.';
$_lang["move_resource_title"] = 'انتقال پرونده';

$_lang["access_permissions"] = 'سطوح دسترسی';
$_lang["access_permission_denied"] = 'شما دسترسی لازم را برای این پرونده ندارید.';
$_lang["access_permission_parent_denied"] = 'شما اجازه یا دسترسی ایجاد یا انتقال پرونده ای جدید در این مکان را ندارید!. لطفا مکان دیگری را انتخاب کنید.';
$_lang["access_permissions_add_resource_group"] = 'ایجاد یک گروه جدید برای پرونده ها';
$_lang["access_permissions_add_user_group"] = 'ایجاد یک گروه کاربری جدید';
$_lang["access_permissions_docs_message"] = 'در اینجا شما میتوانید انتخاب کنید که این پرونده جزو کدام گروه از پرونده هاست';
$_lang["access_permissions_group_link"] = 'ایجاد وب لینک گروهی';
$_lang["access_permissions_introtext"] = 'در اینجا شما میتوانید گروههای کاربری و گروههای پرونده ها را که برای اعمال در سطوح دسترسی کاربرد دارند را مدیریت کنید. برای افزودن کاربر به یک گروه کاربری , کاربر مورد نظر را ویرایش کرده و گروههایی را که این کاربر بایستی در آنها عضو باشد را انتخاب کنید. برای افزودن پرونده ای به یک گروه کاربری, پرونده را ویرایش کرده و گروههایی را که به متعلق به آنهاست را انتخاب کنید.';
$_lang["access_permissions_link_to_group"] = 'به گروه پرونده';
$_lang["access_permissions_context"] = 'in context';
$_lang["access_permissions_link_user_group"] = 'پیوند گروه کاربری';
$_lang["access_permissions_links"] = 'لینک گروههای پرونده ها / کاربران';
$_lang["access_permissions_links_tab"] = 'اینجا محلی است که ما تعیین میکنیم که کدام گروه کاربری دسترسی خواهد داشت(بنابرین میتوانید زیر مجموعه ایجاد یا ویرایش کنید) برای گروه پرونده ها. برای لینک کردن گروه پرونده ها به یک گروه کاربری, گروه را از فهرست کشویی انتخاب کنید, و روی \'لینک\' کلیک کنید. برای حذف لینک از گروه مورد نظرتان, بر روی گزینه ی \'حذف ->\' کلیک کنید. و لینک حذف خواهد شد.';
$_lang["access_permissions_no_resources_in_group"] = 'هیچکدام.';
$_lang["access_permissions_no_users_in_group"] = 'هیچکدام.';
$_lang["access_permissions_off"] = '<span class="warning">سطوح دسترسی فعال نشده است</span> این بدین معنی است که هر تغییری که در اینجا صورت گرفته هیچ تاثیری نخواهد داشت تا زمانیکه سطوح دسترسی فعال شوند.';
$_lang["access_permissions_resource_groups"] = 'گروههای پرونده';
$_lang["access_permissions_resources_in_group"] = '<b>پرونده های این گروه:</b> ';
$_lang["access_permissions_resources_tab"] = 'در اینجا شما میتوانید مشاهده کنید که چه گروههای پرونده ای تهیه شده است. همچنین شما قادر خواهید بود گروههای جدیدی را تعریف و ایجاد کنید, نام گروه ها را تغییر دهید, گروه ها را حذف کنید و ببنید که چه پرونده ای در چه چه گروهی قرار دارد (نشانگر موس را روی ردیف یا شناسه ی پرونده برانید تا اسم آنرا مشاهده کنید). برای افزودن پرونده به گروه یا حذف پرونده از یک گروه, پوشه ی پرونده را ویرایش کنید.';
$_lang["access_permissions_user_toggle"] = 'Toggle access permissions';
$_lang["access_permissions_user_groups"] = 'گروههای کاربرات';
$_lang["access_permissions_user_message"] = 'در اینجا میتوانید مشخص کنید که این کاربر به چه گروههایی از کاربری متعلق است:';
$_lang["access_permissions_users_in_group"] = '<b>کاربران در گروه:</b> ';
$_lang["access_permissions_users_tab"] = 'در اینجا شما میتوانید مشاهده کنید که چه گروههای کاربری تعریف شده اند. همچنین شما میتوانید گروههای جدیدی ایجاد نمایید, تغییر نام دهید, گروه ها را حذف کنید و ببینید که کدام کاربران عضو گروههای مختلف دیگر هستند. برای افزودن کاربر جدید به یک گروه یا حذف یک کاربر از یک گروه, خود کاربر را مستقیما ویرایش کنید. مدیران کل (کاربرانی که با نقش اول یا 1 تعریف شده اند) همیشه به کلیه ی پرونده ها دسترسی خواهند داشت, به همین دلیل نیازی نیست که آنها به گروه خاصی اضافه شوند.';

$_lang["users_list"] = 'Users list';
$_lang["documents_list"] = 'Resources list';

$_lang["account_email"] = 'حساب ایمیل';
$_lang["actioncomplete"] = '<b>عملیات با موفقیت کاما انجام شد</b><br /> - لطفا چند لحظه برای عملیات سیستم صبر کنید.';
$_lang["activity_message"] = 'این فهرست نمایشگر پرونده هایی است که به تازگی توسط شما ایجاد یا ویرایش شده است:';
$_lang["activity_title"] = 'پرونده هایی که به تازگی ایجاد / ویرایش شده اند';

$_lang["administrator_role_message"] = 'این نقش قابل حذف یا ویرایش نیست.';
$_lang["administrators"] = 'Administrators';
$_lang["after_saving"] = 'پس از ذخیره ';
$_lang["alert_delete_self"] = 'شما قابلیت حذف خود را ندارید!';
$_lang["alias"] = 'Alias';
$_lang["all_doc_groups"] = 'همه ی گروههای پرونده -عمومی';
$_lang["all_events"] = 'کلیه ی فعالیت ها';
$_lang["all_usr_groups"] = 'همه ی گروههای کاربری - عمومی';
$_lang["allow_mgr_access"] = 'دسترسی به محیط مدیریت';
$_lang["allow_mgr_access_message"] = 'این امکان را انتخاب کنید تا قابلیت دسیترسی یا عدم دسترسی به محیط مدیریتی وبگاه را تعیین کنید<b> تذکر: اگر این گزینه فعال شود کاربر پس از ورود به بخش مدیریت وبگاه هدایت خواهد شد.</b>';
$_lang["already_deleted"] = 'قبلا حذف شده است.';
$_lang["attachment"] = 'پیوستی یا ضمیمه';
$_lang["author_infos"] = 'Author information';
$_lang["automatic_alias_message"] = 'گزینه ی \'بلی\' امکان تهیه ی خودکار آلایس از روی عنوان یا موضوع پرونده به سیستم می دهد.';
$_lang["automatic_alias_title"] = 'تهیه ی خودکار آلایس:';
$_lang["backup"] = 'پشتیبانی';
$_lang["bk_manager"] = 'پشتیبانی';
$_lang["block_message"] = 'این کاربر پس از حفظ و ضبط داده های کاربری مسدود و ممنوع خواهد شد!';
$_lang["blocked_minutes_message"] = 'در اینجا میتوانید میزان دقایقی را که کاربر بایسیتی پس از تعداد دفعات معلوم ورود ناموفق صبر کند را تعیین کنید. لطفا مقدار آنرا عددی وارد کنید - بدون فاصله و کاما و غیره';
$_lang["blocked_minutes_title"] = 'دقایق ممنوعیت:';
$_lang["cache_files_deleted"] = 'فایلهای زیر حذف شد:';
$_lang["cancel"] = 'از نو';
$_lang["captcha_code"] = 'گزاره ی حفاظتی';
$_lang["captcha_message"] = 'این قابلیت حفاظتی را فعال کنید تا از کاربران درخواست شود گزاره هایی را وارد کنند که توسط ماشینها یا اسکریپتهای خرابکار قابل مشاهده و تشخیص نمی باشند.';
$_lang["captcha_title"] = 'استفاده از گزاره های حفاظتی:';
$_lang["captcha_words_default"] = 'MODX,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join(),Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote';
$_lang["captcha_words_message"] = 'در اینجا شما میتوانید فهرستی مرتب از گزاره های حفاظتی را برای استفاده از آنها در صورتیکه این امکان فعال شده باشد وارد کنید. گزاره ها را با کاما از هم جدا کنید. این قسمت سقف محدود بلندا تا میزان 255 گزاره را دارد.';
$_lang["captcha_words_title"] = 'کلمات حفاظتی';

$_lang["cfg_base_path"] = 'MODX_BASE_PATH';
$_lang["cfg_base_url"] = 'MODX_BASE_URL';
$_lang["cfg_manager_path"] = 'MODX_MANAGER_PATH';
$_lang["cfg_manager_url"] = 'MODX_MANAGER_URL';
$_lang["cfg_site_url"] = 'MODX_SITE_URL';

$_lang["change_name"] = 'تغییر نام';
$_lang["change_password"] = 'تغییر کلمه ی عبور';
$_lang["change_password_confirm"] = 'دوباره نگاری کلمه ی عبور';
$_lang["change_password_message"] = 'لطفا کلمه ی عبور جدید خود را وارد کنید, سپس برای اطمینان آنرا دوباره وارد کنید. کلمه ی عبور شما بایستی بین 6 و 15 بلندای حروف باشد.';
$_lang["change_password_new"] = 'کلمه ی عبور جدید';
$_lang["charset_message"] = 'لطفا مشخص بفرمایید تا تمایل دارید از کدام کاراکتر انکد برای بخش مدیریت استفاده شود. لطفا توجه داشته باشید که سیستم فعلی با  همه ی آنها آزمایش نشده و تنها برخی از این کاراکتر انکد آزمایش موفقیت آمیز داشته. برای اکثر زبانها, ترجیحا میتوان کاراکتر ست UTF-8 را انتخاب کرد.';
$_lang["charset_title"] = 'کاراکترست متون';

$_lang["cleaningup"] = 'در حال تمیز کردن';
$_lang["clean_uploaded_filename"] = 'Use Transliteration for File Uploads';
$_lang["clean_uploaded_filename_message"] = 'Use the default or transalias settings for the file name to clean special characters from uploaded file names, preserving dot-characters (periods)';
$_lang["clear_log"] = 'پاک کردن آمار';
$_lang["click_to_context"] = 'برای دسترسی به منو یا فهرست مرتبط اینجا کلیک کنید';
$_lang["click_to_edit_title"] = 'برای ویرایش این رکورد اینجا کلیک کنید';
$_lang["click_to_view_details"] = 'برای مرور جزییات اینجا کلیک کنید';
$_lang["close"] = 'ببند و خارج شو ';
$_lang["code"] = 'Code';
$_lang["collapse_tree"] = 'جمع کردن درختی';
$_lang["comment"] = 'یادداشت ';

$_lang["configcheck_admin"] = 'لطفا با پشتیبانی سیستم تماس بگیرید و این پیغام را به آنها گزارش دهید';
$_lang["configcheck_cache"] = 'cache directory is not writable';
$_lang["configcheck_cache_msg"] = 'Evolution CMS cannot write to the cache directory. Evolution CMS will still function as expected, but no caching will take place. To solve this, make the \'cache\' directory writable.';
$_lang["configcheck_configinc"] = 'فایل کانفیگ همچنان قابل نگارش است';
$_lang["configcheck_configinc_msg"] = 'انسانهای بی وجدان ممکن است از طریق این مسئله به وبگاه یا فایلهای مشترک با آن آسیب برسانند. <strong>حتما</strong> فایل کانفیگ خود را (/[+MGR_DIR+]/includes/config.inc.php) تنها قابل بازخوانی کنید و از این حالت با قابلیت نگارش خارج کنید.';
$_lang["configcheck_default_msg"] = 'به مشکلی برخوردید که توضیحی برای آن نداریم.';
$_lang["configcheck_errorpage_unavailable"] = 'صفحه ی ارور وبگاه شما در دسترس یا حاضر نیست.';
$_lang["configcheck_errorpage_unavailable_msg"] = 'به این معنی که صفحه ی ارور شما برای بازدیدکنندگان وبگاه شما قابل دسترس یا موجود نیست. این مسئله منجر به ارورهای دیگر و مشکلات عدیده ی دیگر در وبگاه شما خواهد شد. لطفا از این موضوع اطمینان حاصل کنید که هیچ گروه کاربری به این فایل دسترسی ندارد.';
$_lang["configcheck_errorpage_unpublished"] = 'صفحه ی ارور وبگاه شما همچنان منتشر نشده یا وجود ندارد.';
$_lang["configcheck_errorpage_unpublished_msg"] = 'این یعنی صفحه ی ارور شما قابل دسترسی برای عموم نیست. صفحه را منتشر کنید و یا از این موضوع اطمینان حاصل کنید این به پرونده ای موجود در وبگاه شما تعیین شده است با مراجعه به بخش ابزار و تنظیمات.';
$_lang["configcheck_filemanager_path"] = 'The currently set <a href="index.php?a=17&tab=4">File Manager path</a> seems incorrect.';
$_lang["configcheck_filemanager_path_msg"] = 'This can happen for example by moving your installation to a different directory or server. Please check and update your Evolution CMS configuration.';
$_lang["configcheck_hide_warning"] = '<a href="javascript:hideConfigCheckWarning(\'%s\');"><em>Don\'t show this again.</em></a>';
$_lang["configcheck_images"] = 'پرونده ی تصاویر قابل نگارش نمی باشد.';
$_lang["configcheck_images_msg"] = 'پوشه ی تصاویر قابل نگارش نمی باشد, و یا وجود ندارد. این یعنی قابلیتهای مدیریتی تصاویر در ویرایشگر فعال نخواهد بود.';
$_lang["configcheck_installer"] = 'نصّاب همچنان حضور دارد.';
$_lang["configcheck_installer_msg"] = 'پوشه ی نصّاب حاوی نصب کننده مادایکس می باشد. فقط این مسئله را تصور کنید که یک شخص مریض این پوشه را بیابد و نصّاب را دوباره اجرا کند هر چند کار بسیار نمیتواند انجام دهد, بدلیل اینکه او بایستی به برخی اطلاعات همچون دیتابیس و کاربری آن دسترسی داشته باشد, اما بهترین کار ممکن همچنان حذف نمودن این پوشه از سرور میزبان وبگاه است.';
$_lang["configcheck_lang_difference"] = 'فایل زان مخدوش شده است و تعداد ورودی ها و خروجی های نادرستی در آن بکار برده شده';
$_lang["configcheck_lang_difference_msg"] = 'فایل زبان منتخب فعلی تعداد متفاوتی از ورودیها و خروجیها را تعریف کرده که در فایل زبان پیشفرض موجود نمیباشد. اما مشکل خاصی نیست, این بدین معناست که فایل زبان شما نیاز به بروزرسانی دارد.';
$_lang["configcheck_notok"] = 'یک یا چند مورد از تنظیمات برای نصب کامل هنوز انجام نشده است: ';
$_lang["configcheck_ok"] = 'آزمایش موفقیت آمیز بود - هیچ خطایی برای گزارش یافت نشد.';
$_lang["configcheck_php_gdzip"] = 'GD and/or Zip PHP extensions not found';
$_lang["configcheck_php_gdzip_msg"] = 'Evolution CMS needs the GD and Zip extension enabled for PHP. While Evolution CMS will work without them, you will not be able to take full advantage of the built-in File Manager, Image Editor or Captcha for logins.';
$_lang["configcheck_rb_base_dir"] = 'The currently set <a href="index.php?a=17&tab=5">File base path</a> seems incorrect.';
$_lang["configcheck_rb_base_dir_msg"] = 'This can happen for example by moving your installation to a different directory or server. Please check and update your Evolution CMS configuration.';
$_lang["configcheck_register_globals"] = 'رجیستر_گلوبال در تنظیمات فایل اصلی PHP سرور میزبان روشن می باشد';
$_lang["configcheck_register_globals_msg"] = ' این تنظیمات وبگاه شما را در مقابل حملات کراس سایت اسکریپتها آسیب پذیر میکند. شما بایستی برای رفع این مورد با پشتیبانی سرور میزبان خود تماس بگیرید.';
$_lang["configcheck_title"] = 'آزمایش و تنظیمات ضروری پس از نصب';
$_lang["configcheck_templateswitcher_present"] = 'TemplateSwitcher Plugin detected';
$_lang["configcheck_templateswitcher_present_delete"] = '<a href="javascript:deleteTemplateSwitcher();">Delete TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_disable"] = '<a href="javascript:disableTemplateSwitcher();">Disable TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_msg"] = 'The TemplateSwitcher plugin has been found to cause caching and performance problems, and should be used only the functionality is required in your site.';
$_lang["configcheck_unauthorizedpage_unavailable"] = 'صفحه ی خارج از دسترس وبگاه شما منتشر نشده و یا وجود ندارد.';
$_lang["configcheck_unauthorizedpage_unavailable_msg"] = 'ایند به این معناست که صفحه ی خارج از دسترس شما قابل دسترسی برای بازدیدکنندگان عادی نمی باشد و یا و جود ندارد. این امکان دارد باعث ایجاد خطالهای پی در پی در وبگاه شود. از این موضوع اطمینان حاصل کنید که هیچ گروه از کاربر وب برای این صفحه تعیین نشده باشد.';
$_lang["configcheck_unauthorizedpage_unpublished"] = 'صفحه ی خارج از دسترس تعیین شده در تنظیمات مربوط به وبگاه همچنان منتشر نشده است.';
$_lang["configcheck_unauthorizedpage_unpublished_msg"] = 'این بدان معناست که صفحه ی خارج از دسترسی قابل دسترس عمومی نمی باشد. صفحه را منتشر کنید و یا مطمئن شوید که چنین صفحه منتهی به پرونده ای می شود که در درختی وبگاه در قسمت فهرست یا منوی ابزار و تنظیمات وجود دارد.';
$_lang["configcheck_validate_referer"] = 'Security Warning: HTTP Header Validation';
$_lang["configcheck_validate_referer_msg"] = 'The configuration setting <strong>Validate HTTP_REFERER headers?</strong> is Off. We recommend turning it On. <a href="index.php?a=17">Go to Configuration options</a>';
$_lang["configcheck_warning"] = 'خطای تنظیمات:';
$_lang["configcheck_what"] = 'معنای این چیست؟';

$_lang["safe_mode_warning"] = 'Safe mode is enabled. Manager functionality is limited.';

$_lang["confirm_block"] = 'آیا از ممنوعیت و تعلیق این کاربر اطمینان دارید؟';
$_lang["confirm_delete_category"] = 'Are you sure you want to delete this category?';
$_lang["confirm_delete_eventlog"] = 'آثا از حذف آمار این فعالیت اطمینان دارید؟';
$_lang["confirm_delete_file"] = 'آیا از حذف این فایل اطمینان دارید؟\n\n امکان دارد این موضوع اختلالی را در عمیلات سایت ایجاد کند! این کار را زمانی انجام دهید که از کاری که میکنید اطمینان دارید.';
$_lang["confirm_delete_group"] = 'Are you sure you want to delete this group?';
$_lang["confirm_delete_htmlsnippet"] = 'آیا از حذف این چانک اطمینان دارید؟';
$_lang["confirm_delete_keywords"] = 'آیا از حذف این کلمات کلیدی اطمینان دارید؟';
$_lang["confirm_delete_module"] = 'آیا از حذف ایم ماژول اطمینان دارید؟';
$_lang["confirm_delete_plugin"] = 'آیا از حذف این پلاگین اطمینان دارید؟';
$_lang["confirm_delete_record"] = 'آیا از حذف موارد انتخابی اطمینان دارید؟';
$_lang["confirm_delete_resource"] = 'آیا از حذف این پرونده اطمینان دارید؟ \n کلیه ی پرونده های زیر بخش این پرونده نیز حذف خواهند شد.';
$_lang["confirm_delete_role"] = 'آیا از حذف این نقش اطمینان دارید؟';
$_lang["confirm_delete_snippet"] = 'آیا از حذف این اسنیپت اطمینان دارید؟';
$_lang["confirm_delete_tags"] = 'آیا از حذف کلمات مشخصه و کاربردی اطمینان دارید؟';
$_lang["confirm_delete_template"] = 'آیا از حذف این قالب یا پوسته اطمینان دارید؟';
$_lang["confirm_delete_tmplvars"] = 'آیا از حذف این متغیر و تمامی مقدارهای مربوط به آن اطمینان دارید؟';
$_lang["confirm_delete_user"] = 'آیا از حذف این کاربر اطمینان دارید؟';

$_lang["delete_yourself"] = 'You can\'t delete yourself';
$_lang["delete_last_admin"] = 'You can\'t delete last admin user';

$_lang["confirm_delete_permission"] = 'Are you sure you want to delete this Permission?';
$_lang["confirm_duplicate_record"] = 'آیا شما مطمئن هستید که میخواهید مشابه این اطلاعات ایجاد شود؟';
$_lang["confirm_empty_trash"] = 'این عملیات تمامی پرونده های حذف شده را پاک میکند?\n\nدستور نهایی و اعمال شود?';
$_lang["confirm_load_depends"] = 'آیا شما اطمینان دارید که میخواهید صفحه ی متعلقات مدیریت را بدون حفظ تنظیمات انجام شده باز کنید؟';
$_lang["confirm_name_change"] = 'تغییر نام کاربری امکان ایجاد اختلال در سایر امکانات و یا تسهیلاتی که با این نام کاربری در محتوا ارتباط دارد ایجاد نماید. \n\n آیا از تغییر نام کاربری اطمینان دارید؟';
$_lang["confirm_publish"] = '\n\nانتشار این پرونده باعث عدم کارایی و حذف هرگونه زمانبندی برای عدم انتشار یا تعلیق آن خواهد شد. اگر شما تمایل دارید که زمانبدی انتشار یا تعلیق آنرا حفظ یا تنظیم کنید, لطفا پرونده را برای \'ویرایش\' انتخاب کنید.\n\nعملیات انجام و دستور اجرا شود؟';
$_lang["confirm_remove_locks"] = 'کاربران برخی مواقع مرورگر وب خود را به هنگام ویرایش پرونده ها می بندند, قالبها یا پوسته ها, اسنیپتها یا کدها, امکان دارد که ترک ویرایش آنها منجر به قفل شدن آنها شود. از طریق فشردن دکمه ی قبول شما میتوانید کلیه ی قفلهای ایجاد شده در این مکان را باز کنید.\n\nانجام دستور و اجرای عملیات؟';
$_lang["confirm_reset_sort_order"] = 'Are you sure you want to reset the \"sort order/index\" of all listed elements to 0 ?';
$_lang["confirm_resource_duplicate"] = 'آیا از مشابه سازی این پرونده اطمینان دارید؟ همه ی گزینه هایی که در بر دارد نیز مشابه سازی خواهد شد.';
$_lang["confirm_setting_language_change"] = 'You have modified the default value and will lose the changes. Proceed?';
$_lang["confirm_unblock"] = 'آیا شما از خارج کردن این کاربر از حالت تعلیق یا ممنوعیت اطمینان دارید؟';
$_lang["confirm_undelete"] = '\n\nدر صورت خروج این پرونده از حالت حذف هر پرونده ی زیر بخش این پرونده که همزمان حذف شده بوده نیز از حالت حذف خارج خواهد شد, اما پرونده های زیر بخش این پرونده اگر قبلا حذف شده باشند همچنان در حذفی ها خواهند ماند.';
$_lang["confirm_unpublish"] = '\n\nخارج کردن این پرونده از حالت تعلیق یا عدم انتشار باعث هرگونه زمانبندی تعیین شده برای خروج از عدم انتشار آن می شود. اگر شما تمایل به حفظ زمانبدی انتشار یا تعلیق آن دارید, لطفا گزینه ی \'ویرایش\' پرونده را انتخاب کنید.\n\nاعمال دستور و انجام عملیات؟';
$_lang["confirm_unzip_file"] = 'آیا اط خارج کردن فایل از حالت فشرده اطمینان دارید؟\n\فایلهای همنام موجود جایگزین قبلی ها خواهد شد.';

$_lang["could_not_find_user"] = 'قادر به یافتن کاربر نمی باشد.';

$_lang["create_folder_here"] = 'ایجاد پوشه در اینجا';
$_lang["create_resource_here"] = 'ایجاد پرونده در اینجا';
$_lang["create_resource_title"] = 'Create Resource';
$_lang["create_weblink_here"] = 'ایجاد وب لینک در اینجا';
$_lang["createdon"] = 'تاریخ ایجاد';
$_lang["create_new"] = 'Create new';

$_lang["credits"] = 'امکانات و قابلیتهای استفاده شده';
$_lang["credits_shouts_msg"] = '<p>Evolution CMS is managed and maintained at <a href="https://evo-cms.com/" target="_blank">evo-cms.com</a>.</p>';
$_lang["custom_contenttype_message"] = 'در اینجا شما میتوانید انواع مختلف و مخصوص از محتوا را اضافه کنید تا در پرونده های شما از آنها استفاده شوند. برای اضافه کردن ورودی جدید, نوع محتوا را در جعبه ی متنی وارد کنید و سپس روی گزینه ی \'اضافه کردن\' کلیک کنید.';
$_lang["custom_contenttype_title"] = 'انواع مختلف محتوا:';

$_lang["database_charset"] = 'کارست بانک اطلاعات';
$_lang["database_collation"] = 'کارست کالیژن بانک اطلاعاتی';
$_lang["database_name"] = 'نام دیتابیس';
$_lang["database_overhead"] = '<b style=\'color:#990033\'>تذکر:</b> حیاط خلوت فضای بی استفاده ای است که توسط ما یاس کیو ال رزرو شده. برای تخلیه ی این فضا, روی نماد حیات خلوت هر جدول کلیک کنید.';
$_lang["database_server"] = 'سرور دیتابیس';
$_lang["database_table_clickbackup"] = 'برای تهیه ی نسخه ی پشتیبان و دانلود و دخیره ی جداول انتخابی';
$_lang["database_table_clickhere"] = 'اینجا کلیک کنید';
$_lang["database_table_datasize"] = 'حجم داده';
$_lang["database_table_droptablestatements"] = 'حالت دراپ تیبل را اجرا کن.';
$_lang["database_table_effectivesize"] = 'حجم موثر';
$_lang["database_table_indexsize"] = 'حجم ایندکس';
$_lang["database_table_overhead"] = 'حیات خلوت';
$_lang["database_table_records"] = 'رکوردها';
$_lang["database_table_tablename"] = 'نام جدول';
$_lang["database_table_totals"] = 'مجموعا:';
$_lang["database_table_totalsize"] = 'حجم کامل';
$_lang["database_tables"] = 'جدولهای دیتابیس';
$_lang["database_version"] = 'نسخه دیتابیس:';

$_lang["date"] = 'تاریخ';
$_lang["datechanged"] = 'اطلاعات یا داده ها تغییر داده شد';
$_lang["datepicker_offset"] = 'Datepicker offset';
$_lang["datepicker_offset_message"] = 'The number of years to show in the past on the datepicker.';
$_lang["datetime_format"] = 'Date format';
$_lang["datetime_format_message"] = 'The format for dates in the Manager.';

$_lang["default"] = 'Default:';
$_lang["defaultcache_message"] = 'گزینه ی \'بلی\' را انتخاب کنید تا کلیه ی پرونده های جدید قابلیت ذخیره یا کش را به طور پیشفرض دارا باشند.';
$_lang["defaultcache_title"] = 'پیشفرض قابلیت ذخیره سازی یا کش';
$_lang["defaultmenuindex_message"] = 'گزینه ی  \'بلی\' را برای فعالسازی خودکار افزودن موارد به فهرست در حالت پیشفرض را انتخاب کنید.';
$_lang["defaultmenuindex_title"] = 'حالت پیشفرض برای تهیه ی فهرست';
$_lang["defaultpublish_message"] = 'گزینه ی  \'بلی\' را برای انتشار خودکار کلیه ی پرونده ها در حالت پیشفرض را انتخاب کنید.';
$_lang["defaultpublish_title"] = 'حالت پیشفرض انتشار';
$_lang["defaultsearch_message"] = 'گزینه ی  \'بلی \' را برای افزودن قابلیت جستجو به کلیه ی پرونده ها انتخاب کنید.';
$_lang["defaultsearch_title"] = 'حالت پیشفرض جستجو';
$_lang["defaulttemplate_message"] = 'پوسته یا قالبی را که تمایل دارید در حالت پیشفرض برای کلیه ی پرونده ها استفاده شود را انتخاب کنید. همچنان شما این قابلیت را خواهید داشت که در ویرایشگر پرونده ها پوسته یا قالبی متفاوت را انتخاب کنید, این تنظیم تنها کاری که میکند این است که یک قالب را بعنوان پیشفرض برای شما انتخاب میکند.';
$_lang["defaulttemplate_title"] = 'پوسته یا قالب پیشفرض';
$_lang["defaulttemplate_logic_title"] = 'Automatic Template Assignment';
$_lang["defaulttemplate_logic_general_message"] = 'New Resources will have the following templates, falling back to higher levels if not found:';
$_lang["defaulttemplate_logic_system_message"] = '<strong>System</strong>: the System Default Template.';
$_lang["defaulttemplate_logic_parent_message"] = '<strong>Parent</strong>: the same Template as the parent container.';
$_lang["defaulttemplate_logic_sibling_message"] = '<strong>Sibling</strong>: the same Template as other Resources in the same container.';

$_lang["delete"] = 'حذف';
$_lang["delete_resource"] = 'حذف پرونده';
$_lang["delete_tags"] = 'حذف تگها';
$_lang["deleting_file"] = 'حذف فایل `%s`: ';
$_lang["description"] = 'توضیحات';
$_lang["deselect_keywords"] = 'پاک کردن کلمات کلیدی';
$_lang["deselect_metatags"] = 'پاک کردن مشخصات کاربردی';
$_lang["disabled"] = 'از کار افتاده';
$_lang["doc_data_title"] = 'مرور محتوا و داده ی پرونده';
$_lang["documentation"] = 'Documentation';

$_lang["duplicate"] = 'المثنی';
$_lang["duplicate_alias_found"] = 'پرونده ی  \'%s\' همکنون در حال استفاده از آلایس \'%s\' است. لطفا یک آلایس مخصوص وارد کنید.';
$_lang["duplicate_template_alias_found"] = 'Template \'%s\' is already using the URL alias \'%s\'. Please enter a unique alias.';
$_lang["duplicate_alias_message"] = 'در اینجا شما میتوانید \'بلی\' را انتخاب کنید تا آلایس های مشابه حفظ شوند. <b>تذکر: این حالت بایستی به همراه \'مسیر دوستانه ی آلایس\' استفاده شود که آن هم روی \'بلی\' تنظیم شده باشد برای اینکه درذ زمان ارجاع به پرونده ها مشکلی ایجاد نشود.</b>';
$_lang["duplicate_alias_title"] = 'آلای های مشابه مجاز باشد:';
$_lang["duplicate_name_found_general"] = 'There is already a %s named \'%s\'. Please enter a unique name.';
$_lang["duplicate_name_found_module"] = 'There is already a Module named \'%s\'. Please enter a unique name.';
$_lang["duplicated_el_suffix"] = 'Duplicate';

$_lang["edit"] = 'ویرایش';
$_lang["edit_resource"] = 'ویرایش پرونده';
$_lang["edit_resource_title"] = 'ایجاد / ویرایش پرونده';
$_lang["edit_settings"] = 'تنظیمات';
$_lang["editedon"] = 'ویرایش تاریخ';
$_lang["editing_file"] = 'ویرایش فایل: ';
$_lang["editor_css_path_message"] = 'مسیری که فایل CSS شما در آن قرار دارد و تمایل به استفاده در ویرایشگر دارید را وارد کنید. بهترین راه وارد کردن مسیر فایل CSS از محل روت است, بعنوان مثال: /assets/site/style.css. اگر تمایلی به استفاده از فایل CSS در ویرایشگر ندارید, این قسمت را خالی بگذارید.';
$_lang["editor_css_path_title"] = 'مسیر فایل CSS:';

$_lang["email"] = 'پست الکترونیک';
$_lang["email_sent"] = 'پیغام ارسال شد';
$_lang["email_unique"] = 'Email is already in use!';
$_lang["emailsender_message"] = 'در اینجا شما میتوانید آدرس پست الکترونیکی را مشخص کنید که هنگام ارسال نام کاربری و کلمه ی عبور به کاربران از آن استفاده می شود';
$_lang["emailsender_title"] = 'آدرس پست الکترونیک :';
$_lang["emailsubject_default"] = 'Your login details';
$_lang["emailsubject_message"] = 'در اینجا شما میتوانید عنوان پیغام ارسالی برای کاربران را مشخص کنید';
$_lang["emailsubject_title"] = 'عنوان پیغام :';

$_lang["empty_folder"] = 'این پرونده یا فولدر خالی است';
$_lang["empty_recycle_bin"] = 'تخلیه ی پرونده های حذف شده';
$_lang["empty_recycle_bin_empty"] = 'پرونده ی حذف شده ای برای تخلیه موجود نیست.';
$_lang["enable_resource"] = 'فراهم کردن فایل منبع.';
$_lang["enable_sharedparams"] = 'به اشتراک گذاری پارامترها';
$_lang["enable_sharedparams_msg"] = '<b>تذکر:</b> شناسه ی مخصوص بالا اختصاصا به منظور شناسایی این ماژول و پارامترهای به اشتراک گذاشته شده از سوی آن تعلق داشته و استفاده خواهد شد. شناسه ی مخصوص همچنین برای تهیه ی رابط بین ماژول و پلاگینها یا اسنیپتهایی که به پارامترهای به اشتراک گذاشته ی آن دسترسی دارند استفاده می شود.';
$_lang["enabled"] = 'فراهم شده';
$_lang["error"] = 'خطا';
$_lang["error_sending_email"] = 'ارسال پیغام خطا';
$_lang["errorpage_message"] = 'شناسه یا شماره ی پرونده ای را وارد کنید که میخواهید برای کاربران ارسال شود زمانیکه آنها درخواست کنند پرونده ای را که موجود نمی باشد. <b>تذکر: از این موضوع اطمینان حاصل کنید که شناسه ای که برای این پرونده اختصاص میدهید وجود دارد, و قبلا منتشر شده باشد!</b>';
$_lang["errorpage_title"] = 'صفحه ی خطا :';
$_lang["event_id"] = 'شناسه';
$_lang["eventlog"] = 'آمار فعالیت';
$_lang["eventlog_msg"] = 'ثبت آمار فعالیت سیستم برای ثبت اطلاعات بکار میرود. پیغامهای اخطار و خطا که توسط سیستم نمایش داده شده را ثبت میکند. ستون  \'منبع یا عامل \' بخشی را که خطا در آن ثبت شده را نمایش میدهد';
$_lang["eventlog_viewer"] = 'آمار فعالیت سیستم';
$_lang["everybody"] = 'Everybody';
$_lang["existing_category"] = 'بخش یا مجموعه ی حاضر یا فعلی';
$_lang["expand_tree"] = 'باز کردن درختی';
$_lang["failed_login_message"] = 'در اینجا شما میتوانید مشخص کنید دفعاتی را که یک کاربر میتواند عمدا یا سهوا جزییات کاربری خود را برای ورود اشتباه وارد کرده باشد پیش از اینکه کاربر ممنوع یا به حالت تعلیق درآید.';
$_lang["failed_login_title"] = 'تعداد دفعات ناموق تلاش برای ورود :';
$_lang["fe_editor_lang_message"] = 'زبان مورد نظر خود را برای اعمال در ویرایشگر در بخش پشتیبانی جلویی یا فرانت-اند مشخص کنید.';
$_lang["fe_editor_lang_title"] = 'زبان ویرایشگر بخش پشتیبانی جلویی یا فرانت-اند';

$_lang["filemanager_path_message"] = 'آی آی اس اغلب مواقع تنظیمات مخصوص داکیومنت_روت را به درستی پر نمی کند, که این تنظیمات برای بخش مدیریت فایلها استفاده میشود تا مشخص کند شما چه چیزی را میتوانید مشاهده کنید. در صورتیکه در استفاده ی بخش مدیریت فایلها مشکلی داشتید, از این موضوع اطمینان حاصل کنید که این پت یا محل تعیین شده به درستی روی روت نصّاب مادایکس تنظیم شده است.';
$_lang["filemanager_path_title"] = 'محل مدیریت فایلها :';

$_lang["folder"] = 'پوشه';
$_lang["forgot_password_email_fine_print"] = '* آدرس لینک بالا پس از امروز و یا به محض تغییر کلمه ی عبور اعتبار خود را از دست خواهد داد.';
$_lang["forgot_password_email_instructions"] = 'از آنجا شما قادر خواهید بود که کلمه ی عبور خود را تغییر دهید از مسیر فهرست حساب کاربری خود.';
$_lang["forgot_password_email_intro"] = 'درخواست تغییر کلمه ی عبور حساب شما ایجاد شده است.';
$_lang["forgot_password_email_link"] = 'برای تکمیل عملیات اینجا کلیک کنید.';
$_lang["forgot_your_password"] = 'کلمه ی عبور فراموش شده؟';
$_lang["friendly_alias_message"] = 'اگر شما از آدرسهای دوستانه استفاده می کنید, و پرونده برای خود آلایس دارد, همیشه اولویت با آلایس خواهد بود در قیاس با آدرسهای دوستانه. با تنظیم این حالت روی \'بلی\', پیشفرض آدرسهای دوستانه و پسوند آنها بر روی آلایس ها نیز به کار برده خواهد شد. بعنوان مثال, اگر پرونده ی شما باشناسه ی 1 شامل آلایس `introduction` باشد, و شما پیشفرض را خالی گذاشته و پسوند آنرا روی `.html` گذاشته باشید, با تنظیم این حالت روی `بلی` آدرس شما بصورت `introduction.html` تهیه خواهد شد. و اگر آلایسی وجود ندارد, مادایکس به صورت خودکار `1.html` را بعنوان آدرس یا لینک پرونده بر می گزیند.';
$_lang["friendly_alias_title"] = 'آلایاسهای دوستانه:';
$_lang["friendlyurls_message"] = 'این شما را قادر میکند تا از آدرسهای دوستانه یا محبوب برای موتورهای جستجو را در مادایکس استفاده کنید. لطفا توجه بفرمایید, این فقط روی مادایکسی که بر روی سرور میزبان آپاچی نصب شده باشد کار میکند, و شما بایستی فایل .htaccess را قابل نگارش کنید تا فعال شود. لطفا برای اطلاعات بیشتر به فایل .htaccess ضمیمه ی مادایکس مراجعه کنید.';
$_lang["friendlyurls_title"] = 'استفاده از آدرسهای قابل درک و فهم :';
$_lang["friendlyurlsprefix_message"] = 'در اینجا شما میتوانید تعیین کنید که چه پیشفرضی برای آدرسهای دوستانه مورد استفاده قرار گیرد. بعنوان مثال, تنظیم پیفرض  \'صفحه\' آدرس صفحات را از این نوع /index.php?id=2 به نوع بهتر و دوستانه ی قابل تشخیص موتورهای جستجو همچون /page2.html تبدیل میکند (با فرض اینکه پسوند صفحات روی HTML تنظیم شده باشد). به این نحو شما میتوانید تعیین کنید که کاربران شما و مخصوصا موتورهای جستجو چگونه لینک ها و آدرسهای شما را بشناسند و به خاطر بسپارند.';
$_lang["friendlyurlsprefix_title"] = 'پیشفرض برای آدرس دوستانه:';
$_lang["friendlyurlsuffix_message"] = 'در اینحا شما میتوانید پسوند آدرسهای دوستانه را تعیین کنید. چنانچه پسوند روی \'.html\' تنظیم شود .html را به تمامی آدرسهای دوستانه ملحق می کند.';
$_lang["friendlyurlsuffix_title"] = 'پسوند برای آدرس دوستانه:';
$_lang["functionnotimpl"] = 'ببخشید!';
$_lang["functionnotimpl_message"] = 'این کارایی هنوز تهیه و فراهم نشده است.';
$_lang["further_info"] = 'Further information';
$_lang["global_tabs"] = 'Global Tabs';
$_lang["go"] = 'برو';
$_lang["group_access_permissions"] = 'سطح دسترسی گروه کاربری';
$_lang['group_tvs'] = 'Group TV';
$_lang["guid"] = 'شناسه ی خاص';
$_lang["help"] = 'راهنمای استفاده';
$_lang["help_msg"] = '<p>شما میتوانید بصورت رایگان  عضو <a href="http://forums.modx.com" target="_blank">انجمنهای رفع اشکال و راهنمایی مادایکس</a> شوید و به کمک سایر دوستان باتجربه در این زمینه پاسخ سوالات خود را در مورد مادایکس بیابید.<br />ضمنا میتوانید حجم بزرگی از <a href="http://rtfm.modx.com/evolution/1.0" target="_blank">راهنمایی ها و نحوه استفاده و پشتیبانی مادایکس </a> را در بخش راهنمایی و پشتیبانی استفاده از مادایکس بیابید</p><p>شما با پرداخت هزینه میتوانید از پشتیبانی و راهنمای اختصاصی و حرفه ای برای وبگاه (سایت) خود بهرهمند شوید برای این منظور لطفا از طریق پست الکترونیک با آدرس زیر تماس حاصل کنید<br />hello@modx.com';
$_lang["help_title"] = ' راهنما و توضیحات';
$_lang["hide_tree"] = 'مخفی کردن درختی';
$_lang["home"] = 'منزل';

$_lang["icon"] = 'نماد یا آیکون';
$_lang["icon_description"] = 'CSS class value. e.g. fa&nbsp;fa-star';
$_lang["id"] = 'شناسه';
$_lang["illegal_parent_child"] = 'اطلاق یا تعریف سرگروه:\n\nاین پرونده زیر مجموعه ی پرونده ی انتخابی شماست.';
$_lang["illegal_parent_self"] = 'اطلاق یا تعریف سرگروه:\n\nپرونده ی انتخابی شما به خودش نمیتواند ملحق شود.';
$_lang["images_management"] = 'Manage Images';
$_lang["import_files_found"] = '<b>تعداد %s پرونده برای وارد کردن یافت شد...</b>';
$_lang["import_params"] = 'پارامترهای مشترک ماژولها وارد شود';
$_lang["import_params_msg"] = 'شما میتوانید پارامترها و یا تنظیمات ماژول را وارد کنید از طریق انتخاب اسم ماژول از فهرست کشویی بالا. <b>تذکر:</b> برای نمایش ماژولها در داخل فهرست یا منو, این پلاگین / اسنیپت حتما باید به نحوی این قابلیت فهرست شدن را فراهم آورده باشد ضمن اینکه در تنظیمات ماژول بایستی اشتراک گذاری پارامترها فعال شده باشد یا پارامتری را برای اشتراک فراهم کرده باشد. ';
$_lang["import_parent_resource"] = 'پرونده ی سرگروه: ';
$_lang["update_tree"] = 'درخت را از نو بسازید';
$_lang["update_tree_description"] = '<ul>
<li>Closure table database design pattern that makes working with the document tree more convenient and fast </li>
<li>If the data in the tree is updated not through models, then there is a possibility of an incorrect linking of documents in the database </li>
<li>This operation fixes the problem when site_content is not updated through the model (save, create) and the links (Closure table) are not updated </li>
<li>It is also possible to perform this operation in CLI mode via the \'php artisan closuretable: rebuild\' command </li>
</ul>';
$_lang["update_tree_danger"] = 'If you have more than 1000 resources, it is better to perform this operation in CLI mode using the \'php artisan closuretable: rebuild command\'';
$_lang["update_tree_time"] = 'Rebuild tree finished. Documents processed: <b>%s</b><br>Import took <b>%s</b> seconds to complete.';
$_lang["info"] = 'مشخصات';
$_lang["information"] = 'اطلاعات';
$_lang["inline"] = 'این لاین یا داخل صفحه';
$_lang["insert"] = 'وارد شود';
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
$_lang["keyword"] = 'کلمات کلیدی';
$_lang["keywords"] = 'کلمات کلیدی';
$_lang["keywords_intro"] = 'برای ویرایش کلمات کلیدی, کافیست فقط کلمه ی کلیدی جدید را داخل فیلد متنی مقابل کلمه ی کلیدی که تمایل به تغییر ان دارید وارد کنید. برای حذف کلمه ی کلیدی, چک مارک \'حذف\' را برای آن کلمه انتخاب کنید. اگر شما مورد حذف را علامت زده باشید, و همچنین تغییر نام آنرا, آن حذف خواهد شد, و تغییر نام کلمه ی کلیدی عملی نمی شود';
$_lang["language_message"] = 'زبان مورد نظر خود را انتخاب کنید.';
$_lang["language_title"] = 'زبان : ';
$_lang["last_update"] = 'Last update';
$_lang["launch_site"] = 'مرور وبگاه';
$_lang["license"] = 'License';
$_lang["link_attributes"] = 'خصوصیات لینک';
$_lang["link_attributes_help"] = 'در اینجا شما میتوانید خصوصیات یک لینک را برای این صفحه تعیین کنید, خصوصیاتی همچون target= و یا rel=.';
$_lang["list_mode"] = 'فعال یا غیر فعال کردن حالت فهرستی - برای فهرست شدن کلیه ی ثبت ها در خط استفاده می شود.';
$_lang["loading_doc_tree"] = 'بازخوانی درختی مربوط به پرونده...';
$_lang["loading_menu"] = 'بازخوانی فهرست...';
$_lang["loading_page"] = 'لطفا تا زمانیکه سیستم اطلاعات را پردازش میکند صبر کنید...';
$_lang["localtime"] = 'ساعت محلی';

$_lang["lock_htmlsnippet"] = 'چانک برای ویرایش قفل شود';
$_lang["lock_htmlsnippet_msg"] = 'فقط مدیران کل (نقش شماره  اول یا یک) قابل ویرایش این چانک باشند.';
$_lang["lock_module"] = 'قفل کردن ماژول برای ویرایش';
$_lang["lock_module_msg"] = 'فقط مدیران کل (نقش شماره  اول یا یک) قابل ویرایش این ماژول باشند.';
$_lang["lock_msg"] = 'همکنون %s در حال ویرایش %s می باشد. لطفا پس از اتمام ویرایش کاربر دیگر مجددا امتحان کنید.';
$_lang["lock_plugin"] = 'پلاگین برای ویرایش قفل شود';
$_lang["lock_plugin_msg"] = 'فقط مدیران کل (نقش شماره  اول یا یک) قابل ویرایش این پلاگین باشند.';
$_lang["lock_settings_msg"] = 'همکنون %s در حال ویرایش این تنظیمات است. لطفا تا اتمام ویرایش کارر دیگر صبر کنید و مجددا امتحان کنید.';
$_lang["lock_snippet"] = 'اسنیپت برای ویرایش قفل شود';
$_lang["lock_snippet_msg"] = 'فقط مدیران کل (نقش شماره  اول یا یک) قابل ویرایش این اسنیپت باشند.';
$_lang["lock_template"] = 'قالب یا پوسته برای ویرایش قفل شود';
$_lang["lock_template_msg"] = 'فقط مدیران کل (نقش شماره  اول یا یک) قابل ویرایش این قالب یا پوسته باشند.';
$_lang["lock_tmplvars"] = 'متغیر برای ویرایش قفل شود';
$_lang["lock_tmplvars_msg"] = 'فقط مدیران کل (نقش شماره  اول یا یک) قابل ویرایش این متغیر باشند.';
$_lang["locked"] = 'قفل شده';

$_lang["login_allowed_days"] = 'روزهای مجاز';
$_lang["login_allowed_days_message"] = 'روزهایی را که این کاربر مجاز به ورود می باشد را انتخاب کنید.';
$_lang["login_allowed_ip"] = 'آی پی آدرس مجاز';
$_lang["login_allowed_ip_message"] = 'آی پی آدرسی را که این کاربر مجاز به ورود با آن می باشد را وارد کنید. <b>تذکر: آی پی آدرسهای مختلف را با کاما از یکدیگر جدا کنید (,)</b>';
$_lang["login_button"] = 'ورود';
$_lang["login_cancelled_install_in_progress"] = 'نصب/ارتقاء این وبگاه در حال انجام است. <br />لطفا چند دقیقه دیگر مراجعه کنید!<br />';
$_lang["login_cancelled_site_was_updated"] = 'نصب/ارتقاء وبگاه انجام شد, لطفا دوباره وارد شوید!<br />';
$_lang["login_captcha_message"] = 'لطفا کلمه ی امنیتی داخل تصویر را وارد کنید. چنانچه کد قابل تشخیص نیست, بر روی تصویر کلیک کنید تا کد جدیدی نمایش داده شود در غیر اینصورت با مدیر وبگاه تماس بگیرید.';
$_lang["login_homepage"] = 'صفحه ی ورود';
$_lang["login_homepage_message"] = 'شناسه ی پرونده ای را که تمایل دارید کاربران پس از ورود به سیستم به آن هدایت شوند را وارد کنید. <b>تذکر: توجه داشته باشید که شناسه ای که استفاده میکنید موجود باشد, و اینکه منتشر شده باشد و قابل دسترسی کاربر باشد!</b>';
$_lang["login_message"] = 'لطفا برای ورود به بخش مدیریت اطلاعات کاربری خود را وارد کنید. توجه داشته باشید که پردازشگر سیستم به بزرگی و کوچکی کلمات حساس است';
$_lang["logo_slogan"] = 'مدیریت محتوای مادایکس - \nبا حداقل امکان بسازید بلکه برتر از آن';
$_lang["logout"] = 'خروج از سیستم';
$_lang["long_title"] = 'عنوان بلند';

$_lang["manager"] = 'مدیر';
$_lang["manager_lockout_message"] = 'همکنون شما وارد بخش مدیریت محتوا شده اید. هر زمان که تمایل به خروج از این بخش دارید لطفا روی دکمه ی "خروج" کلیک کنید. <p />برای ارجاع به صفحه ی اصلی خود روی دکمه ی "منزل" کلیک کنید.';
$_lang["manager_permissions"] = 'سطوح دسترسی مدیر';
$_lang["manager_theme"] = 'پوسته یا قالب بخش مدیریت :';
$_lang["manager_theme_message"] = 'پوسته  یا قالب مورد علاقه ی خور برای بخش مدیریت محتوایی را انتخاب کنید';
$_lang["manager_theme_mode"] = 'Color Scheme:';
$_lang["manager_theme_mode1"] = 'everything is light';
$_lang["manager_theme_mode2"] = 'the header is dark';
$_lang["manager_theme_mode3"] = 'header and sidebar are dark';
$_lang["manager_theme_mode4"] = 'everything is dark';
$_lang['manager_theme_mode_message'] = 'This setting is used as the "default" and can be overridden by the manager when using the theme color mode switch button in the Resource Tree: <i class="fa fa-lg fa-adjust"></i>';
$_lang['manager_theme_mode_title'] = 'Theme color mode switch';

$_lang["meta_keywords"] = 'شاخصه و کلمات کلیدی';
$_lang["metatag_intro"] = 'در این صفحه شما میتوانید کلمات شاخص را حذف و یا ایجاد نمایید. برای ارتباط و لینک کلمات شاخص به پرونده ها, در زمان ویرایش پرونده ها بر روی <u>کلمات کاربردی و شاخص</u> کلیک کنید, و کلمه ی کاربردی و شاخص مرتبط با آنرا انتخاب کنید. برای افزودن شاخصهای جدید اسم و مقدار آنرا وارد کنید و سپس بر روی دکمه ی  \'افزودن شاخص\' کلیک کنید. برای ویرایش شاخص بر روی اسم شاخص روی همان قسمت مربوط به داده کلیک کنید';
$_lang["metatag_notice"] = 'در صورت تمایل برای اطلاعات بیشتر میتوانید به مرجع <a href="http://www.html-reference.com/META.asp" target="_blank">راهنمای HTML</a> مراجعه کنید. این لیست کاملی از شاخصای فراهم شده محسوب نمی شود.';
$_lang["metatags"] = 'کلمات شاخص';
$_lang["mgr_access_permissions"] = 'سطوح دسترسی مدیران';
$_lang["mgr_login_start"] = 'آغازین بخش ورودی مدیران';
$_lang["mgr_login_start_message"] = 'شناسه ی پرونده ای را که تمایل دارید کاربران پس از ورود به مدیریت به آنجا هدایت شوند را وارد کنید. <b>تذکر: لطفا اظمینان حاصل کنید که شناسه ی پرونده ای که وارد میکنید موجود باشد, و همچنین منتشر شده باشد و قابل دسترسی برای کاربر باشد.</b>';

$_lang["mgrlog_action"] = 'عملکرد';
$_lang["mgrlog_actionid"] = 'شناسه ی عملکرد';
$_lang["mgrlog_anyall"] = 'هر / همه';
$_lang["mgrlog_datecheckfalse"] = 'آزمایش تاریخ حاصلی نداشت.';
$_lang["mgrlog_datefr"] = 'از تاریخ';
$_lang["mgrlog_dateinvalid"] = 'ترکیب تاریخ غلط است';
$_lang["mgrlog_dateto"] = 'تا تاریخ';
$_lang["mgrlog_emptysrch"] = 'جستجو برای متن مورد نظر شما حاصلی در بر نداشت - بنابراین اطلاعاتی با این محتوا ثبت نشده است';
$_lang["mgrlog_field"] = 'فیلد';
$_lang["mgrlog_itemid"] = 'ردیف مورد';
$_lang["mgrlog_itemname"] = 'نام مورد';
$_lang["mgrlog_msg"] = 'پیغام';
$_lang["mgrlog_noquery"] = 'متنی برای جستجو وارد نشده است.';
$_lang["mgrlog_qresults"] = 'نتایج جستجو';
$_lang["mgrlog_query"] = 'متون ثبت شده';
$_lang["mgrlog_query_msg"] = 'لطفا موردی را برای مرور اطلاعات ثبت شده انتخاب کنید. شما میتوانید طبق تاریخ آنها را انتخاب کنید, اما توجه کنید که تاریخی که وارد میکنید طبق بازه ی زمانی است - برای انتخاب همه ی اطلاعات ثبت شده برای تاریخ 01-01-3386, اینگونه تنظیم کنید که \'از تاریخ\' به 01-01-3386 و \'تا تاریخ\' به 02-01-3386.<br /><br />پیغامها و نحوه عملکرد اغلب به یک نحو خواهد بود. اگر شما بدنبال پیغام مشخصی هستید, بهترین کار این است که عملکرد را روی \'هر / همه\' تنظیم کنید.';
$_lang["mgrlog_results"] = 'تعداد نتایج بدست آمده';
$_lang["mgrlog_searchlogs"] = 'بایگانی متون جستجو';
$_lang["mgrlog_sortinst"] = 'شما میتوانید ردیف جدول را با کلیک بر سرفصل ستونها تنظیم کنید. اگر اطلاعات یا ثبتی ها در حال حجیم شدن هستند, شما میتوانید آنها را حذف و <a href="index.php?a=55">خالی کنید</a>. با این کار کلیه ی اطلاعات ثبت شده تا کنون حذف میشود, و قابل بازگشت نمی باشد!';
$_lang["mgrlog_time"] = 'زمان';
$_lang["mgrlog_user"] = 'کاربر';
$_lang["mgrlog_username"] = 'نام کاربری';
$_lang["mgrlog_value"] = 'مقدار';
$_lang["mgrlog_view"] = 'مرور ثبت ورودی مدیران';

$_lang["modx_news"] = 'Evolution CMS News Notices';
$_lang["modx_news_tab"] = 'Evolution CMS News';
$_lang["modx_news_title"] = 'Evolution CMS News';
$_lang["modx_security_notices"] = 'Evolution CMS Security Notices';
$_lang["modx_version"] = 'نسخه مادایکس شما';

$_lang["name"] = 'نام';

$_lang["no"] = 'خیر';
$_lang["no_active_users_found"] = 'No active users found.';
$_lang["no_activity_message"] = 'شما تاکنون هیچ پرونده ای ایجاد و یا ویرایش نکرده اید.';
$_lang["no_category"] = 'دسته بندی نشده';
$_lang["no_docs_pending_publishing"] = 'هیچ پرونده ای در زمانبندی انتشار نیست.';
$_lang["no_docs_pending_pubunpub"] = 'هیچ مناسبتی یافت نشد';
$_lang["no_docs_pending_unpublishing"] = 'هیچ پرونده ای در زمانبندی تعلیق انتشار نیست.';
$_lang["no_edits_creates"] = 'No edits or creates found.';
$_lang["no_groups_found"] = 'هیچ گروهی یافت نشد';
$_lang["no_keywords_found"] = 'درحال حاضر کلمه کلیدی وارد نشده';
$_lang["no_records_found"] = 'هیچ داده ای یافت نشد..';
$_lang["no_results"] = 'نتیجه ای در بر نداشت';
$_lang["nologentries_message"] = 'تعداد اطلاعات ثبت شده که در یک صفحه نمایش داده می شود را مشخص کنید.';
$_lang["nologentries_title"] = 'تعداد دفعات ورود :';
$_lang["none"] = 'هیچکدام';
$_lang["noresults_message"] = 'تعداد نتایج و موارد را برای نمایش در فهرست نتایج جستجو ارائه می شود را وارد کنید.';
$_lang["noresults_title"] = 'تعداد نتایج :';
$_lang["not_deleted"] = 'حذف نشده است.';
$_lang["not_set"] = 'تنظیم نشده';

$_lang["offline"] = 'آفلاین و تعطیل';

$_lang["online"] = 'آنلاین و حاضر';
$_lang["onlineusers_action"] = 'درحال انجام یا مشغول';
$_lang["onlineusers_actionid"] = 'شناسه ی کاری که انجام میدهد';
$_lang["onlineusers_ipaddress"] = 'آی پی آدرس کاربر';
$_lang["onlineusers_lasthit"] = 'آخرین ثبتی';
$_lang["onlineusers_message"] = 'این فهرست تمامی کاربرانی که تا بیست دقیقه ی پیش در وبگاه حاضر و فعالیتی داشته اند را نمایش میدهد - ساعت همکنون ';
$_lang["onlineusers_title"] = 'کاربران حاضر در وبگاه یا سایت شما';
$_lang["onlineusers_user"] = 'نام کاربر';
$_lang["onlineusers_userid"] = 'شناسه ی کاربر';

$_lang["optimize_table"] = 'برای اصلاح این جدول اینجا کلیک کنید';

$_lang["page_data_alias"] = 'Alias';
$_lang["page_data_cacheable"] = 'قابل ذخیره یا  کش';
$_lang["page_data_cacheable_help"] = 'انتخاب این گزینه به پرونده اجازه میدهد تا در ذخیره یا کش وارد شود. اگر پرونده ی شما حاوی اسنیپت است, از عدم انتخاب این گزینه اطمینان حاصل کنید.';
$_lang["page_data_cached"] = '<b>بازخوانی منبع از ذخیره یا کش:</b>';
$_lang["page_data_changes"] = 'تغییرات';
$_lang["page_data_contentType"] = 'نوع محتوا';
$_lang["page_data_contentType_help"] = 'نوع محتوا را برای این پرونده مشخص کنید. اگر از نوع محتوای پرونده خود هنوز مطمئن نیستید آنرا روی تکست/HTML تنظیم کنید';
$_lang["page_data_created"] = 'ساخه شد';
$_lang["page_data_edited"] = 'ویرایش شد';
$_lang["page_data_editor"] = 'ویراش توسط ویرایشگر';
$_lang["page_data_folder"] = 'پرونده از نوع محفظه میباشد';
$_lang["page_data_general"] = 'عمومی - کلی';
$_lang["page_data_markup"] = 'آرایش / ساختار';
$_lang["page_data_mgr_access"] = 'سطح دسترسی مدیر';
$_lang["page_data_notcached"] = 'ای پرونده هنوز ذخیره یا کش نشده.';
$_lang["page_data_publishdate"] = 'تاریخ انتشار';
$_lang["page_data_publishdate_help"] = 'اگر شما تاریخ انتشار را مشخص کنید, پرونده دقیقا در همان تاریخ مشخص شده منتشر خواهد شد. برای انتخاب تاریخ انتشار روی نماد یا آیکون تقویم کلیک کنید, و یا برای حذف تاریخ انتشار روی نماد روبروی آن کلیک کنید. این به این معنا خواهد بود که پرونده هرگز بصورت خودکار منتشر نخواهد شد.';
$_lang["page_data_published"] = 'منتشر شد';
$_lang["page_data_searchable"] = 'قابل جستجو';
$_lang["page_data_searchable_help"] = 'انتخاب این گزینه پرونده را قابل جستجو می کند. همچنین شما میتوانید از این گزینه برای اهداف دیگری در اسنیپتها استفاده کنید.';
$_lang["page_data_source"] = 'منبع';
$_lang["page_data_status"] = 'حالت';
$_lang["page_data_template"] = 'استفاده از پوسته یا قالب';
$_lang["page_data_template_help"] = 'در اینجا میتوانید مشخص کنید که این پرونده از چه پوسته یا قالبی استفاده کند.';
$_lang["page_data_title"] = 'داده ی صفحه';
$_lang["page_data_unpublishdate"] = 'تاریخ تعلیق از انتشار';
$_lang["page_data_unpublishdate_help"] = 'در صورتیکه تاریخی را برای تعلیق تعیین کنید, پرونده دقیقا در تاریخ تعیین شده از حالت انتشار خارج و تعلیق می شود. برای انتخاب تاریخ روی نماد یا آیکون تقویم کلیک کنید, . یا برای حذف تاریخ تعلیق روی نماد روبروی آن کلیک کنید. و این بدین معنا خواهد بود که پرونده هرگز به صورت خودکار تعلیق نخواهد شد.';
$_lang["page_data_unpublished"] = 'معلق شد';
$_lang["page_data_web_access"] = 'سطح دسترسی وب';

$_lang["pagetitle"] = 'عنوان پرونده';
$_lang["pagination_table_first"] = 'نخست';
$_lang["pagination_table_gotopage"] = 'برو به صفحه';
$_lang["pagination_table_last"] = 'آخر';
$_lang["paging_first"] = 'نخست';
$_lang["paging_last"] = 'آخر';
$_lang["paging_next"] = 'بعد';
$_lang["paging_prev"] = 'قبل';
$_lang["paging_showing"] = 'در حال نمایش';
$_lang["paging_to"] = 'به';
$_lang["paging_total"] = 'مجموع';
$_lang["parameter"] = 'پارامتر';
$_lang["parse_docblock"] = 'Parse DocBlock';
$_lang["parse_docblock_msg"] = 'Attention (!): <b>Resets</b> actual name, configuration, description and category to install-defaults by parsing the source code.';

$_lang["password"] = 'کلمه ورود ';
$_lang["password_change_request"] = 'درخواست تغییر کلمه ی ورود';
$_lang["password_confirmed"] = 'Passwords doesn\'t match';
$_lang["password_gen_gen"] = 'انتخاب اتفاقی کلمه ی عبور توسط مادایکس ';
$_lang["password_gen_length"] = 'کلمه ی عبور انتخابی شما حداقل بایستی حاوی 6 کلمه باشد';
$_lang["password_gen_method"] = 'نحوه ی  انتخاب کلمه ی عبور';
$_lang["password_gen_specify"] = 'انتخاب کلمه ی عبور توسط شما';
$_lang["password_method"] = 'نحوه اطلاع از کلمه ی عبور جدید';
$_lang["password_method_email"] = 'کلمه ی عبور از طریق پست الکترونیک ارسال شود';
$_lang["password_method_screen"] = 'کلمه ی عبور جدید در صفحه نشان داده شود';
$_lang["password_msg"] = 'کلمهی عبور جدید برای <b>:password</b> این است: <b>:username</b><br>';

$_lang["php_version_check"] = 'مادایکس تنها بر روی نسخه ی PHP 7.4 و بالاتر اجرا می شود لطفا نسخه ی PHP خود را ارتقاء دهید';

$_lang["preview"] = 'نمایش وبگاه';
$_lang["preview_msg"] = 'این پیش نمایش آخرین تغییرات ذخیره شده ی شماست. برای ذخیره نهایی و بازخوانی تغییرات جدید<a href="#" onclick="saveRefreshPreview();">اینجا کلیک کنید</a>';
$_lang["preview_resource"] = 'نمایش پرونده';

$_lang["private"] = 'خصوصی';
$_lang["public"] = 'عمومی';
$_lang["publish_date"] = 'تاریخ انتشار';
$_lang["publish_events"] = 'انتشار فعالیت';
$_lang["publish_resource"] = 'انتشار پرونده';

$_lang["rb_base_dir_message"] = 'مسیر فیزیکال یا حقیقی منتهی به دایره یا دایرکتوری منبع را وارد کنید. این تنظیمات به طور خودکار انجام شده است. اگر شما از آی آی اس استفاده می کنید, به هر حال, مادایکس به خودی خود قادر به تنظیم آدرس نخواهد بود, و باعث نمایش خطا در پنجره ی منابع میگردد. در این صورت, شما قادر به ویرایش آدرس و وارد کردن آدرس دایره یا دایرکتوی تصاویر در اینجا هستید (دقیقا همان آدرسی که شما در اینترنت اکسپلوورر وارد می کنید). <b>تذکر:</b> دایره یا دایرکتوری منبع بایستی شامل زیر مجموعه یا ساب فولدرهای تصاویر, فایلها, فلش و چند رسانه ای باشد تا جستجو و انتخابگر منبع به درستی کار کند.';
$_lang["rb_base_dir_title"] = 'مسیر منبع:';
$_lang["rb_base_url_message"] = 'مسیر مجازی منتهی به دایره یا دایرکتوری منبع را وارد کنید. این تنظیمات به طور خودکار انجام شده است. اگر شما از آی آی اس استفاده می کنید, به هر حال, مادایکس به خودی خود قادر به تنظیم آدرس نخواهد بود, و باعث نمایش خطا در پنجره ی منابع میگردد. در این صورت, شما قادر به ویرایش آدرس و وارد کردن آدرس دایره یا دایرکتوی تصاویر در اینجا هستید (دقیقا همان آدرسی که شما در اینترنت اکسپلوورر وارد می کنید).';
$_lang["rb_base_url_title"] = 'آدرس منبع:';
$_lang["rb_message"] = 'برای فعال سازی جستجو و انتخابگر منبع گزینه ی بلی را انتخاب کنید. این به کاربران شما اجازه می دهد تا منابعی همچون تصاویر , فلش و یا منابع چند رسانه ای را از سیستم خود جستجو و برای آپلود به سرور میزبان وبگاه انتخاب کنند.';
$_lang["rb_title"] = 'فعالسازی جستجو و انتخاب منبع:';
$_lang["rb_webuser_message"] = 'آیا مایلید که کاربر وب را قادر به استفاده از مرورگر منابع کنید <b>اخطار:</b> ایجاد این امکان دسترسی ایشان را به منابعی که کاربران مدیریت دارند فراهم می کند، تنها به کاربران قابل اعتماد این قابلیت را اعطا کنید.';
$_lang["rb_webuser_title"] = 'کاربران وب؟';
$_lang["recent_docs"] = 'پرونده های جدید';
$_lang["recommend_setting_change_title"] = 'Recommended Setting Change';
$_lang["recommend_setting_change_description"] = 'Your site is not configured to validate the HTTP_REFERER of incoming requests to the Manager. We strongly recommend enabling this setting to reduce the risk of a CSRF (Cross Site Request Forgery) attack.';
$_lang["references"] = 'References';
$_lang["refresh_cache"] = 'ذخیره یا کش: تعداد<b>%s</b> فایل در دایره ی ذخایر یا  کش یافت و تعداد <b>%d</b> فایل ذخیره یا کش  حذف شده<p> فایل ذخیره یا کش مجددا زمانی ایجاد خواهد شد که پرونده ها مرور شوند ';
$_lang["refresh_published"] = '<b>%s</b> پرونده منتشر شد';
$_lang["refresh_site"] = 'بازخوانی ذخایر';
$_lang["refresh_title"] = 'بازخوانی وبگاه';
$_lang["refresh_tree"] = 'بازخوانی درختی';
$_lang["refresh_unpublished"] = '<b>%s</b> پرونده که انتشار آن تعلیق شده';
$_lang["release_date"] = 'Release date';
$_lang["remember_last_tab"] = 'Remember tabs';
$_lang["remember_last_tab_message"] = 'Tabbed Manager pages load with the last tab viewed instead of defaulting to the first tab';
$_lang["remember_username"] = 'به خاطر سپردن';
$_lang["remove"] = 'حذف';
$_lang["remove_date"] = 'حذف تاریخ';
$_lang["remove_locks"] = 'حذف قفلها';
$_lang["rename"] = 'تغییرنام';
$_lang["reports"] = 'گزارشات';
$_lang["report_issues"] = 'Report issues';
$_lang["required_field"] = 'Field :field is required';
$_lang["require_tagname"] = 'نام شاخص لازم است';
$_lang["require_tagvalue"] = 'مقدار شاخص لازم است';
$_lang["reserved_name_warning"] = 'You have used a reserved name.';
$_lang["reset"] = 'از نو';
$_lang["reset_failedlogins"] = 'صفر یا از نو';
$_lang["reset_sort_order"] = 'Reset sort order';

$_lang["manager_access_permissions"] = 'Manager access permission';
$_lang["manage_groups"] = 'Manage document and user groups';
$_lang["manage_document_permissions"] = 'Manage document permissions';
$_lang["manage_module_permissions"] = 'Manage module permissions';
$_lang["manage_tv_permissions"] = 'Manage TV permissions';

$_lang["rss_url_news_default"] = 'https://github.com/evocms-community/evolution/releases.atom';
$_lang["rss_url_news_message"] = 'URL منبع آخرین اخبار مادایکس.';
$_lang["rss_url_news_title"] = 'RSS اخبار';
$_lang["rss_url_security_default"] = 'https://github.com/extras-evolution/security-fix/releases.atom';
$_lang["rss_url_security_message"] = 'URL منبع اخبار امنیتی.';
$_lang["rss_url_security_title"] = 'RSS امنیتی';

$_lang["run_module"] = 'اجرای ماژول';
$_lang["save"] = 'ذخیره';
$_lang["save_all_changes"] = 'ذخیره ی کلیه ی تغییرات';
$_lang["save_tag"] = 'حفظ تگ';
$_lang["saving"] = 'در حال ذخیره, لطفا چند لحظه تحمل بفرمایید...';

$_lang["search"] = 'جستجو';
$_lang["search_criteria"] = 'جستجوی محتوایی';
$_lang["search_criteria_content"] = 'جستجو در محتوا';
$_lang["search_criteria_content_msg"] = 'جستجوی متنی در بین همه پرونده ها و محتویاتی که شامل متن مورد نظر شماست';
$_lang["search_criteria_id"] = 'جستجو از طریق شناسه یا ردیف';
$_lang["search_criteria_id_msg"] = 'شناسه یا ردیف پرونده مورد نظر خود را وارد کنید تا به سرعت پرونده را پیدا کنید';
$_lang["search_criteria_top"] = 'Search in main fields';
$_lang["search_criteria_top_msg"] = 'Pagetitle, Longtitle, Alias, ID';
$_lang["search_criteria_template_id"] = 'Search by template ID';
$_lang["search_criteria_template_id_msg"] = 'Find all Resources using the specified template.';
$_lang["search_criteria_url_msg"] = 'Find Resource by exact URL.';
$_lang["search_criteria_longtitle"] = 'جستجو در عنوان بلند مطالب';
$_lang["search_criteria_longtitle_msg"] = 'پیدا کردن کلیه ی پرونده هایی که حاوی متن مورد نظر در عنوان بلند خود هستند';
$_lang["search_criteria_title"] = 'جستجو در عناوین';
$_lang["search_criteria_title_msg"] = 'پیدا کردن کلیه ی پرونده هایی که حاوی متن مورد نظر در عناوین خود هستند';
$_lang["search_empty"] = 'جستجوی شما نتیجه ای در بر نداشت. لطفا کلیات بیشتری را در نظر بگیرید و مجددا امتحان کنید';
$_lang["search_item_deleted"] = 'این مورد حذف شده است';
$_lang["search_results"] = 'نتایج جستجو';
$_lang["search_results_returned_desc"] = 'توضیحات';
$_lang["search_results_returned_id"] = 'ردیف';
$_lang["search_results_returned_msg"] = 'Your search criteria returned <b>%s</b> Resources. If a lot of results are being returned, try to enter a more specific search.';
$_lang["search_results_returned_title"] = 'عنوان';
$_lang["search_view_docdata"] = 'مشاهده و مرور این مورد';

$_lang["security"] = 'حراست';
$_lang["security_notices_tab"] = 'Security Notices';
$_lang["security_notices_title"] = 'Security Notices';

$_lang["select_date"] = 'انتخاب تاریخ';
$_lang["send"] = 'ارسال';
$_lang["server_protocol_http"] = 'http';
$_lang["server_protocol_https"] = 'https';
$_lang["server_protocol_message"] = 'در صورتیکه وبگاه شما از اتصال ایمن استفاده میکند در اینجا آنرا وارد کنید';
$_lang["server_protocol_title"] = 'نوع سرور یا میزبان :';
$_lang["serveroffset"] = 'اختلاف ساعت سرور میزبان';
$_lang["serveroffset_message"] = 'اختلاف ساعت بین محلی که سکونت دارید و محلی که سرور میزبان وبگاه وجود دارد را انتخاب کنید. ساعت محلی سرور میزبان شما همکنون <b>[%s]</b> می باشد, و ساعت محلی سرور میزبان بر اساس اختلاف زمان تعیین شده <b>[%s]</b> می باشد.';
$_lang["serveroffset_title"] = 'اختلاف ساعت سرور:';
$_lang["servertime"] = 'ساعت سرور میزبان';
$_lang["set_automatic"] = 'Set automatic';
$_lang["set_default"] = 'Set default';
$_lang["set_default_all"] = 'Set defaults';

$_lang["settings_after_install"] = 'از آنجا که این یک نصب جدید است, از شما خواسته میشود تا این تنظیمات را انجام دهید, و هر کدام را که تمایل دارید تغییر دهید. پس از آنکه تنظیمات را انجام دادید, بر روی \'حفظ\' کلیک کنید تا تنظیمات شما بروز رسانی شود.<br /><br />';
$_lang["settings_config"] = 'تنظیمات';
$_lang["settings_dependencies"] = 'متعلقات';
$_lang["settings_events"] = 'فعالیت های  سیستم';
$_lang["settings_furls"] = 'آدرس قابل درک و فهم';
$_lang["settings_general"] = 'کلیات';
$_lang["settings_group_tv_message"] = 'Choose if Template Variables should be grouped in sections or tabs (named by TV category) when editing a Resource';
$_lang["settings_group_tv_options"] = 'No,Sections in General tab,Tabs in General tab,Sections in new tab,Tabs in new tab,New tabs';
$_lang["settings_misc"] = 'مدیریت فایل';
$_lang["settings_security"] = 'Security';
$_lang["settings_KC"] = 'File Browser';
$_lang["settings_page_settings"] = 'تنظیمات در صفحه';
$_lang["settings_photo"] = 'عکس';
$_lang["settings_properties"] = 'تنظیمات';
$_lang["settings_site"] = 'وبگاه';
$_lang["settings_strip_image_paths_message"] = 'اگر این بر روی \'خیر\' تنظیم شده باشد, مد ایکس آدرسها را بازنگاری میکند (تصاویر, فایلها, فلش ها, و غیره.) و به صورت آدرس دهی محلی استفاده میکند. این نوع از آدرسها زمانی به کار می آیند که شما بعنون مثال قصد انتقال کامل این نسخه ی نصب شده خود بر روی وبگاه دیگری داشته باشید, بعنوان مثال, از وبگاه شخصی به وبگاه تجاری منتقل کنید و یا تغییر دهید. اگر همچنان متوجه این امکان نشده اید, بهتر است این تنظیم را روی \'بلی\' بگذارید.';
$_lang["settings_strip_image_paths_title"] = 'بازنگاری آدرس مرورگر?';
$_lang["settings_templvars"] = 'متغیرهای قالب یا پوسته';
$_lang["settings_title"] = 'تنظیمات سیستم';
$_lang["settings_ui"] = 'ظاهر و امکانات';
$_lang["settings_users"] = 'کاربر';
$_lang["settings_email_templates"] = 'Email & Templates';

$_lang["show_fullscreen_btn_message"] = 'Show Menu toggle Fullscreen button';
$_lang["show_newresource_btn_message"] = 'Show Menu New Resource button';
$_lang["settings_show_picker_message"] = 'Customize manager theme and save to localstorage';
$_lang["show_fullscreen_btn"] = 'Toggle Fullscreen button';
$_lang["show_newresource_btn"] = 'New Resource button';

$_lang["show_meta"] = 'Show META Keywords tab';
$_lang["show_meta_message"] = 'Show the deprecated META Keywords tab when editing Resources in the Manager.';
$_lang["show_tree"] = 'نمایش درختی';
$_lang["show_picker"] = 'Show Color Switcher';
$_lang["showing"] = 'در حال نمایش';
$_lang["signupemail_message"] = 'در اینجا شما میتوانید پیغامی را که پس از ایجاد حساب کاربری قصد ارسال به کاربر را دارید وارد کنید و اجازه دهید سسیتم مادایکس آنرا بهمراه نام کاربری و کلمه ی عبور حساب کاربری آنها ارسال کند. <br /><b>تذکر:</b> متغیرهایی زیر در محتویا پیغام با اطلاعات لازم و ضروری از طرف سیستم تکمیل و ارسال می شود: <br /><br />[+sname+] - اسم وبگاه شما, <br />[+saddr+] - پست الکترونیک وبگاه شما, <br />[+surl+] - آدرس وبگاه شما, <br />[+uid+] - شناسه یا نام کاربری کاربران, <br />[+pwd+] - کلمه ی عبور کاربران, <br />[+ufn+] - نام کامل کاربر. <br /><br /><bمتغیرهای [+uid+] و [+pwd+] را حتما در پیغام داشته باشید, در غیر اینصورت نام کاربری و کامه ی عبور حساب کاربران ارسال نمی شود و آنها از اطلاعات حساب کاربری خود مطلع نمیشوند!</b>';
$_lang["signupemail_title"] = 'محتوای پیغام ارسالی به اعضاء :';
$_lang["site"] = 'وبگاه';
$_lang["site_schedule"] = 'زمانبندی';
$_lang["sitename_message"] = 'اسم وبگاه (سایت) خود را در اینجا وارد کنید';
$_lang["sitename_title"] = 'اسم وبگاه :';
$_lang["sitestart_message"] = 'شناسه ی پرونده ای که تمایل دارید بعنوان صفحه ی اصلی در استفاده شود را وارد کنید. <b>تذکر: از این مطئله اطمینان حاصل کنید که شناسه ای که وارد میکنید را به پرونده ای منتهی شود که موجود است, و منتشر شده باشد!</b>';
$_lang["sitestart_title"] = 'آغازگه وبگاه:';
$_lang["sitestatus_message"] = 'گزینه ی \'آنلاین\' را انتخاب کنید تا وبگاه شما در وب منتشر شود. اگر گزینهی \'تعلیق\' را انتخاب کنید, بازدیدکنندگان وبگاه شما پیام ضروری شما در بخش وبگاه تعلیقی را مشاهده خواهند کرد, و طبیعتا قادر به مرور صفحات یا مطالب وبگاه شما نخواهند بود.';
$_lang["sitestatus_title"] = 'وضعیت وبگاه:';
$_lang["siteunavailable_message"] = 'پیامی که در زمان تعلیق و یا بروز اشکال در ویگاه قصد نمایش به بازدیدکنندگان را دارید. <b>تذکر: این پیغام تنها زمانی نمایش داده خواهد شد که تنظیمات مربوط به تعلیق ویگاه فعال شده باشد و حالت وبگاه در حالت تعلیق تنظیم شده باشد.</b>';
$_lang["siteunavailable_message_default"] = 'The site is currently unavailable.';
$_lang["siteunavailable_page_message"] = 'شناسه ی پرونده ای را که قصد استفاده از آن را بعنوان صفحه ی تعلیق وبگاه استفاده کنید را در اینجا وارد کنید. <b>تذکر: از این اطمینان حاصل کنید که شناسه ای که وارد کرده اید موجود می باشد, و پرونده ی مورد نظر منتشر شده باشد!</b>';
$_lang["siteunavailable_page_title"] = 'صفحه ی وبگاه تعطیل موقت یا در حال تعمیر';
$_lang["siteunavailable_title"] = 'پیغام وبگاه در حالت تعلیق یا تعطیلی : ';
$_lang["controller_namespace"] = 'Controller Namespace';
$_lang["controller_namespace_message"] = 'Specify the full Namespace from which it is worth taking controllers, for example: <b>EvolutionCMS\\Main\\Controllers\\</b>';
$_lang["update_repository"] = 'GitHub repository path';
$_lang["update_repository_message"] = 'Enter GitHub repository path for example: <b>evocms-community/evolution</b>';

$_lang["sort_alphabetically"] = 'Sort alphabetically';
$_lang["sort_asc"] = 'افزایشی';
$_lang["sort_desc"] = 'کاهشی';
$_lang["sort_menuindex"] = 'Sort menu index';
$_lang["sort_tree"] = 'درختی را ترتیب بده';
$_lang['sort_updating'] = 'Updating ...';
$_lang['sort_updated'] = 'Updated!';
$_lang['sort_nochildren'] = 'Parent does not have any children';
$_lang["sort_elements_msg"] = 'Drag to reorder the listed elements.';

$_lang["source"] = 'سورس یا منبع';
$_lang["stay"] = 'ویرایش را ادامه بده';
$_lang["stay_new"] = 'یکی دیگه اضافه کن';
$_lang["submit"] = 'ارسال';
$_lang["sys_alert"] = 'اخطار سیستم';
$_lang["sysinfo_activity_message"] = 'این فهرست نمایانگر پرونده هایی است که اخیرا توسط کاربران شما ویرایش شده است';
$_lang["sysinfo_userid"] = 'کاربر';
$_lang["system"] = 'System';
$_lang["system_email_signup"] = 'Hello [+uid+]

Here are your login details for [+sname+] Content Manager:

Username: [+uid+]
Password: [+pwd+]

Once you log into the Content Manager ([+surl+]), you can change your password.

Regards,
Site Administrator';
$_lang["system_email_webreminder"] = 'با سلام [+uid+]

برای فعالسازی کلمه ی عبور جدید خود روی لینک زیر کلیک کنید:

[+surl+]

در صورتیکه این کار موفقیت آمیز بود شما میتوانید از کلمه عبور جدیدی که در زیر آمده استفاده کنید:

کلمه ی عبور:[+pwd+]

اگر شما ارسال این ایمیل را درخواست نکرده اید کافیست به آن توجهی نکنید.

با اترام,
مدیریت وبگاه';
$_lang["system_email_websignup"] = 'با سلام [+uid+]

اطلاعات حساب کاربری شما در وبگاه [+sname+]:

نام کاربری: [+uid+]
کلمه ی عبور: [+pwd+]

پس از ورود به حساب کاربری خود در وبگاه [+sname+] ([+surl+]), شما قادر به تغییر کلمه ی عبور خود خواهید بود.

با احترام,
مدیریت وبگاه';
$_lang["table_hoverinfo"] = 'برای مشاهده ی توضیح مختصری از قابلیت هر جدول نشانگر موس را روی اسم جدول هدایت کنید (همه ی جدول ها <i>توضیح و تشریح</i> ندارند).';
$_lang["table_prefix"] = 'پیشفرض جدول';
$_lang["tag"] = 'تگ یا بر چسب';

$_lang["to"] = 'به';
$_lang["toggle_fullscreen"] = 'Toggle Fullscreen';
$_lang["tools"] = 'ابزارها';
$_lang["top_howmany_message"] = 'وقتیکه گزارشات را مرور می کنید, بزرگی فهرست \'بالاترین ها ...\' چقدر باشد؟';
$_lang["top_howmany_title"] = 'چه میزان بالاتر';
$_lang["total"] = 'مجموع';
$_lang["track_visitors_message"] = 'این حالت هیچ کاربردی نخواهد داشت تا زمانیکه شما ابزار آماری یا ثبت آمار بازدید در وبگاه خود فراهم داشته باشید که این حالت را پشتیبانی کند. ثبت آمار بازدید وبگاه به شما قابلیت درک بهتر از نحوه و میزان استفاده بازدید کنندگان وبگاه به شما میدهد';
$_lang["track_visitors_title"] = 'ثبت بازدیدها - آمار';
$_lang["tree_page_click"] = 'Page Click Behavior';
$_lang["tree_page_click_message"] = 'The default behavior when clicking on a page in the site tree.';
$_lang["use_breadcrumbs"] = 'Show navigation';
$_lang["use_breadcrumbs_message"] = 'Show the navigation when creating or editing Resource in the Manager';
$_lang["tree_show_protected"] = 'نمایش صفحات محافظت شده';
$_lang["tree_show_protected_message"] = 'زمانیکه روی "خیر" تنظیم شده باشد, صفحات محافظت شده (و همه ی پرونده های زیر دستی آن) در فهرست درختی ظاهر نخواهد شد. گزینه ی "خیر" از تنظیمات پیشفرض مادایکس است.';
$_lang["truncate_table"] = 'برای کوتاه کردن این جدول اینجا کلیک کنید';
$_lang["type"] = 'نوع';
$_lang["udperms_allowroot_message"] = 'آیا شما تمایل دارید تا کاربران قابلیت ایجاد پرونده جدید را در صفحه اصلی وبگاه شما داشته باشند؟';
$_lang["udperms_allowroot_title"] = 'اجازه ی صفحه ی اصلی : ';
$_lang["udperms_message"] = 'بخش سطوح دسترسی این امکان را به شما میدهد تا تعیین کنید کاربران شما قادر به ویرایش کدامیک از صفحات هستند. شما بایستی کاربران را در گروههای کاربری دسته بندی کنید, پرونده ها را به گروه پرونده ها, و نهایتا بایستی مشخص کنید کدام گروه کاربری دسترسی به کدام گروه پرونده ها را دارد. وقتی که برای اولین بار این گزینه را فعال کنید, فقط مدیران کل مجاز به ویرایش هر پرونده ای خواهند بود.';
$_lang["udperms_title"] = 'از سطوح دسترسی استفاده کند :';
$_lang["unable_set_link"] = 'قادر به ایجاد لینک نمیباشد';
$_lang["unable_set_parent"] = 'قادر به ایجاد سرگروه جدید نمی باشد!';
$_lang["unauthorizedpage_message"] = 'شناسه ی پرونده ای را که تمایل دارید کاربران در صورت درخواست دسترسی به پرونده ای خارج از سطح دسترسی ایشان به آن هدایت شوند را وارد کنید. <b>تذکر: از این مطمئن شوید که شناسه ی پرونده ای که وارد می کنید موجود است, همچنین منتشر شده باشد و قابل دسترسی باشد!</b>';
$_lang["unauthorizedpage_title"] = 'صفحه ی غیر قابل دسترسی:';
$_lang["unblock_message"] = 'این کاربر پس از ذخیره ی داده ها ممنوع نمیشود';
$_lang["undelete_resource"] = 'بازگردانی پرونده از حذفی ها';
$_lang["unpublish_date"] = 'تاریخ تعلیق انتشار';
$_lang["unpublish_events"] = 'معلق کردن فعالیت ها';
$_lang["unpublish_resource"] = 'تعلیق انتشار پرونده';
$_lang["untitled_resource"] = 'پرونده بدون عنوان';
$_lang["untitled_weblink"] = 'لینک بدون عنوان';
$_lang["update_params"] = 'نمایش گزینه ی بروز رسانی شده';
$_lang["update_settings_from_language"] = 'Replace current with:';

$_lang["upload_maxsize_message"] = 'نهایت اندازه مجاز فایل برای آپلود بوسیله ی بخش فایلها را به بایت در اینجا وارد کنید. <b>تذکر : فایلهای بزرگ زمان بیشتری را برای آپلود میطلبد!</b>';
$_lang["upload_maxsize_title"] = 'نهایت اندازه برای آپلود :';
$_lang["uploadable_files_message"] = 'در اینجا شما میتوانید فهرستی از فایلهایی که اجازه ی آپلود به این بخش \'assets/files/\' از طریق مدیریت منابع را مشخص میکنید.لطفا پسوند نوع فایلها را مشخص کنید,پسوند ها را بوسیله ی کاما از هم جدا کنید';
$_lang["uploadable_files_title"] = 'انواع فایلهای قابل آپلود : ';
$_lang["uploadable_flash_message"] = 'در اینجا شما میتوانید فهرستی از فایلهایی که اجازه ی آپلود به این بخش \'assets/flash/\' ز طریق مدیریت منابع را مشخص میکنید.لطفا پسوند نوع فایلها ی فلش را مشخص کنید,پسوند ها را بوسیله ی کاما از هم جدا کنید';
$_lang["uploadable_flash_title"] = 'انواع فایلهای فلش قابل آپلود : ';
$_lang["uploadable_images_message"] = 'در اینجا شما میتوانید فهرستی از فایلهایی که اجازه ی آپلود به این بخش \'assets/images/\' ز طریق مدیریت منابع را مشخص میکنید.لطفا پسوند نوع فایلها ی تصویری را مشخص کنید,پسوند ها را بوسیله ی کاما از هم جدا کنید';
$_lang["uploadable_images_title"] = 'انواع فایلهای تصویری قابل آپلود : ';
$_lang["uploadable_media_message"] = 'در اینجا شما میتوانید فهرستی از فایلهایی که اجازه ی آپلود به این بخش \'assets/media/\' ز طریق مدیریت منابع را مشخص میکنید.لطفا پسوند نوع فایلها ی چند رسانه ای را مشخص کنید,پسوند ها را بوسیله ی کاما از هم جدا کنید';
$_lang["uploadable_media_title"] = 'انواع فایلهای چند رسانه ای قابل آپلود : ';
$_lang["use_alias_path_message"] = 'تنظیم کردن این حالت به  \'بله\' مسیر کامل به پرونده را نمایش میدهد. اگر پرونده همراه آدرس باشد.به عنوان مثال,اگر پرونده در داخل آدرس به این عنوان خوانده شود \'child\' واقع شده باشد در داخلپرونده ی حاوی آن با این آدرس خوانده میشود \'parent\', بنابراین آدرس کامل به پرونده به این صورت نمایش داده خواهد شد \'/parent/child.html\'.<br /><b>تذکر: وقتی که این حالت را \'فعال\' (آدرس دهی را روشن نمایید), آیتمهای مرجع (مثل عکس یا تصویر یا فایلهای CSS و جاوا اسکریپتها و غیره) با اشتفاده از مکان معلوم و مشخص : بعنوان مثال \'/assets/images\' به جای استفاده از \'assets/images\'. با استفاده از این حالت درواقع شما مرورگر یا بازدیدکننده را ببه محل اصلی آن ارجاع میدهید</b>';
$_lang["use_alias_path_title"] = 'آدرس مکانی قابل فهم:';
$_lang["use_editor_message"] = 'آیا شما تمایلی برای فراهم کردن امکان ویرایشگر متون دارید؟,اگر شما راحتی بیشتری برای استفاده از کدهای HTML دارید میتوانید ویرایشگر متون را از طریق همین تنظیمات خاموش کنید توجه داشته باشید که این حالت برای کلیه ی پرونده ها و کلیه ی کاربران لحاظ خواهد شد.';
$_lang["use_editor_title"] = 'استفاده از ویرایشگر:';
$_lang["use_global_tabs"] = 'Use global Tabs';

$_lang["valid_hostnames_message"] = 'Help prevent XSS exploits misusing the site_url system setting by providing a comma separated list of valid hostnames for this installation. This is important for some types of shared hosts or hosts direct accessible via an IP address. First hostname in the list is used if the HTTP_HOST does not match any valid hostname.';
$_lang["valid_hostnames_title"] = 'Valid hostnames';
$_lang["validate_referer_message"] = 'انجام ارزیابی HTTP_REFERER باعث کاهش خطر احتمال بروز رفتارهای ناخواسته ویراستارهای شما از بخش مدیریت به عنوان قربانیان حمله CSRF (Cross Site Request Forgery - جعل درخواست) شوید. اگر سرور HTTP_REFERER را ارسال نکند ممکن است برخی از تنظیمات قادر به استفاده از این حالت نباشد.';
$_lang["validate_referer_title"] = 'ارزیابی HTTP_REFERER انجام شود؟';
$_lang["value"] = 'Value';
$_lang["version"] = 'Version';
$_lang["view"] = 'View';
$_lang["view_child_resources_in_container"] = 'مرور پرونده ی زیر دست';
$_lang["view_log"] = 'مرور آمار ثبتی';
$_lang["view_logging"] = 'کاربری مدیر';
$_lang["view_sysinfo"] = 'اطلاعات سیستم';
$_lang["warning"] = 'هشدار!';
$_lang["warning_not_saved"] = 'تغییراتی که انجام گرفته همچنان ذخیره نشده است.شما میتوانید همچنان در همین صفحه بمانید بمنظور ذخیره ی تغییرات (\'از نو\'), و یا میتوانید این صفحه را ترک کنید, و کلیه ی تغییرات انجام شده اعمال نشود (\'قبول\')';
$_lang["warning_visibility"] = 'Configuration Warnings visible to';
$_lang["warning_visibility_message"] = 'Control the visibility of the configuration warnings shown on the Manager welcome page';
$_lang["web_access_permissions"] = 'سطوح دسترسی وب';
$_lang["web_access_permissions_user_groups"] = 'گروههای کاربری وب';
$_lang["web_permissions"] = 'سطوح دسترسی وب';
$_lang["web_user_management_msg"] = 'در این قسمت شما میتوانید کاربر وب مورد نظر خود را برای ویرایش انتخاب کنید. منظور از کاربران وب در اینجا اشخاصی هستند که میتوانند به وبگاه وارد شوند.';
$_lang["web_user_management_title"] = 'کاربران وب';
$_lang["web_user_management_select_role"] = 'All roles';
$_lang["web_user_title"] = 'ایجاد/ویرایش کاربران وب';
$_lang["web_users"] = 'کاربران وب';
$_lang["weblink"] = 'وب لینک';
$_lang["webpwdreminder_message"] = 'پیغامی را وارد کنید که به کاربران شما در زمانیکه که آنها درخواست ارسال کلمه ی عبور میکنند از طریق پست الکترونیک ارسال شود. پس از آن سیستم به صورت خودکار کلمه ی عبور جدید و تایید آنرا برای کابران ارسال میکند <br /><b>تذکر:</b>متغیر هایی که در زیر مشاهده میکنید زمانیکه پست الکترونیک توسط سیستم ارسال شود با معادل مورد نظر آن جایگزین و ارسال میشود: <br /><br />[+sname+] - اسم وبگاه شما, <br />[+saddr+] - آدرس پست الکترونیک وبگاه شما, <br />[+surl+] - Your site url, <br />[+uid+] - نام کاربری یا شناسه, <br />[+pwd+] - کلمه ی عبور کاربر, <br />[+ufn+] - نام و نام خانوادگی کاربر. <br /><br /><b>متغیر [+uid+] and [+pwd+]را در پست الکترونیک بگذارید, و یا در غیر اینصورت نام کاربری و کلمه ی عبور کاربران برای آنها ارسال نخواهد شد و نام کاربری و کلمه ی عبور خود را نخواهند دانست</b>';
$_lang["webpwdreminder_title"] = 'پست الکترونیک یادآوری: ';
$_lang["websignupemail_message"] = 'در اینجا شما میتوانید پیغام ارسالی به کاربران زمانی که یک کاربری وب برای آنها تهیه میکنید ارسال کنید و این اجازه را به سیستم بدهید تا به آنها پیغام ارسال کند که شامل نام کاربری و کلمه ی عبور آنها باشد.<br /><b>تذکر:</b> زمانی که پیغام ارسال میشود متغیرهایی که همکنون به صورت کد میبینید با متغیرهای تولیدی از سوی سیستم جایگزین میشود و به دست کاربر میرسد <br /><br />[+sname+] - اسم وبگاه شما, <br />[+saddr+] - پست الکترونیک وبگاه شما, <br />[+surl+] - آدرس وبگاه, <br />[+uid+] - نام کاربری یا شناسه ی کاربر, <br />[+pwd+] - کلمه ی عبور کاربر, <br />[+ufn+] - نام و نام خانوادگی کاربر. <br /><br /><b>متغیر [+uid+] و [+pwd+] را در پست الکترونیک بگذارید, و یا در غیر اینصورت نام کاربری و کلمه ی عبور کاربران برای آنها ارسال نخواهد شد و نام کاربری و کلمه ی عبور خود را نخواهند دانست</b>';
$_lang["websignupemail_title"] = 'آدرس پست الکترونیک عضویت :';
$_lang["allow_multiple_emails_title"] = 'Duplicate Web User email address';
$_lang["allow_multiple_emails_message"] = 'Allows Web Users to share the same email address for situations when a member may not have their own email address or there is just one family email address.<br/>Note: Any password reminder and registration logic will need to account for this option if set to yes.';
$_lang["welcome_title"] = 'به سیستم مدیریت محتوای وبگاه مادایکس خود خوش آمدید';
$_lang["which_editor_message"] = 'در اینجا شما میتوانید "ویرایشگر متن "مورد نظر خود را برای استفاده خود انتخاب کنید. همچنین شما میتوانید ویرایشگر متون مختلفی را در بخش دانلود مادایکس تهیه و نصب کنید';
$_lang["which_editor_title"] = 'انتخاب ویرایشگر :';
$_lang["working"] = 'در حال پردازش... ';
$_lang["wrap_lines"] = 'تنظیم خطوط';
$_lang["xhtml_urls_message"] = 'مقدار صحیح HTML کلمه ی (&) را که &<!-- -->amp; باشد را توسط مادایکس در آدرس یا url وبگاه استفاده استفاده می کند ';
$_lang["xhtml_urls_title"] = 'XHTML URLs';
$_lang["yes"] = 'بله';
$_lang["you_got_mail"] = 'شما پیغام دارید';

$_lang["yourinfo_message"] = 'این قسمت برخی اطلاعات مربوط به شما را نشان میدهد';
$_lang["yourinfo_previous_login"] = 'تاریخ آخرین ورود شما :';
$_lang["yourinfo_role"] = 'نقش کاربری :';
$_lang["yourinfo_title"] = 'اطلاعات شما';
$_lang["yourinfo_total_logins"] = 'مجموع دفعات ورود شما :';
$_lang["yourinfo_username"] = 'شناسه ای که با آن وارد شده اید :';

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
$_lang["enable_filter_phx_warning"] = 'When PHx plugin enabled, built-in filters are disabled by default';

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
$_lang["bkmgr_restore_submit"] = 'Revert this data';
$_lang["bkmgr_restore_confirm"] = 'Are you sure you want to revert backup\n[+filename+] ?';
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
$_lang['resource_opt_is_published'] = 'انتشار یابد؟';

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
