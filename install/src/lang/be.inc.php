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
$_lang["agree_to_terms"] = 'Agree to the License Terms and Install';
$_lang["alert_database_test_connection"] = 'You need to create your database or test the selection of your database!';
$_lang["alert_database_test_connection_failed"] = 'The test of your database selection has failed!';
$_lang["alert_enter_adminconfirm"] = 'The administrator password and the confirmation don\'t match!';
$_lang["alert_enter_adminlogin"] = 'You need to enter a username for the system admin account!';
$_lang["alert_enter_adminpassword"] = 'You need to enter a password for the system admin account!';
$_lang["alert_enter_database_name"] = 'You need to enter a value for database name!';
$_lang["alert_enter_host"] = 'You need to enter a value for database host!';
$_lang["alert_enter_login"] = 'You need to enter your database login name!';
$_lang["alert_server_test_connection"] = 'You need to test your server connection!';
$_lang["alert_server_test_connection_failed"] = 'The test of your server connection has failed!';
$_lang["alert_table_prefixes"] = 'Table prefixes must start with a letter!';
$_lang["all"] = 'All';
$_lang["and_try_again"] = ', and try again. If you need help figuring out how to fix the problem';
$_lang["and_try_again_plural"] = ', and try again. If you need help figuring out how to fix the problems';
$_lang["begin"] = 'Begin';
$_lang["btnback_value"] = 'Back';
$_lang["btnclose_value"] = 'Close';
$_lang["btnnext_value"] = 'Next';
$_lang["cant_write_config_file"] = 'Evolution CMS couldn\'t write the config file. Please copy the following into the file ';
$_lang["cant_write_config_file_note"] = 'Once that\'s been done, you can log into Evolution CMS Admin by pointing your browser at YourSiteName.com/[+MGR_DIR+]/.';
$_lang["checkbox_select_options"] = 'Checkbox select options:';
$_lang["checking_if_cache_exist"] = 'Checking if <span class="mono">/assets/cache</span> and <span class="mono">/assets/cache/rss</span> directories exist: ';
$_lang["checking_iconv"] = 'Checking if extension <span class="mono">iconv</span> is available: ';
$_lang["checking_iconv_note"] = 'It is important to install/enable extension iconv. Please speak to your host if you don´t know how to enable it.';
$_lang["checking_if_cache_file_writable"] = 'Checking if <span class="mono">/assets/cache/siteCache.idx.php</span> file is writable: ';
$_lang["checking_if_cache_file2_writable"] = 'Checking if <span class="mono">/assets/cache/sitePublishing.idx.php</span> file is writable: ';
$_lang["checking_if_cache_writable"] = 'Checking if <span class="mono">/assets/cache</span> and <span class="mono">/assets/cache/rss</span> directories are writable: ';
$_lang["checking_if_config_exist_and_writable"] = 'Checking if <span class="mono">/[+MGR_DIR+]/includes/config.inc.php</span> exists and is writable: ';
$_lang["checking_if_export_exists"] = 'Checking if <span class="mono">/assets/export</span> directory exists: ';
$_lang["checking_if_export_writable"] = 'Checking if <span class="mono">/assets/export</span> directory is writable: ';
$_lang["checking_if_images_exist"] = 'Checking if <span class="mono">/assets/images</span>, <span class="mono">/assets/files</span>,  <span class="mono">/assets/backup</span> and <span class="mono">/assets/.thumbs</span> directories exists: ';
$_lang["checking_if_images_writable"] = 'Checking if <span class="mono">/assets/images</span>, <span class="mono">/assets/files</span>,  <span class="mono">/assets/backup</span> and <span class="mono">/assets/.thumbs</span> directories are writable: ';
$_lang["checking_mysql_strict_mode"] = 'Checking MySQL for strict sql_mode: ';
$_lang["checking_mysql_version"] = 'Checking MySQL version: ';
$_lang["checking_pgsql_version"] = 'Checking PostgeSQL version: ';
$_lang["checking_php_version"] = 'Checking PHP version: ';
$_lang["checking_registerglobals"] = 'Checking if Register_Globals is off: ';
$_lang["checking_registerglobals_note"] = 'This configuration makes your site much more susceptible to Cross Site Scripting (XSS) attacks. You should speak to your host about disabling this setting, usually by one of three ways: modifying the global php.ini file, adding rules to a .htaccess file in the root of your Evolution CMS install, or adding custom php.ini override files in every directory on your install (and there\'s a lot of them). You will still be able to install Evolution CMS, but consider yourself warned.';
$_lang["checking_sessions"] = 'Checking if sessions are properly configured: ';
$_lang["checking_table_prefix"] = 'Checking table prefix `';
$_lang["choose_language"] = 'Choose language';
$_lang["chunks"] = 'Chunks';
$_lang["config_permissions_note"] = 'For new Linux/Unix installs, please create a blank file named <span class="mono">config.inc.php</span> in the <span class="mono">/[+MGR_DIR+]/includes/</span> directory with file permissions set to 0666.';
$_lang["connection_screen_collation"] = 'Collation:';
$_lang["connection_screen_connection_method"] = 'Connection method:';
$_lang["connection_screen_database_connection_information"] = 'Database information';
$_lang["connection_screen_database_connection_note"] = 'Enter the database name to use or which you wish to create for this Evolution CMS install. If no database exists, the installer will attempt to create one. This may fail depending on the MySQL user permissions.';
$_lang["connection_screen_database_host"] = 'Database host:';
$_lang["connection_screen_database_type"] = 'Database type:';
$_lang["connection_screen_database_info"] = 'Database Information';
$_lang["connection_screen_database_login"] = 'Database login name:';
$_lang["connection_screen_database_name"] = 'Database name:';
$_lang["connection_screen_database_pass"] = 'Database password:';
$_lang["connection_screen_database_test_connection"] = 'Create or test selection of your database.';
$_lang["connection_screen_default_admin_email"] = 'Administrator email:';
$_lang["connection_screen_default_admin_login"] = 'Administrator username:';
$_lang["connection_screen_default_admin_note"] = 'Now you\'ll need to enter some details for the main administrator account. You can fill in your own name here, and a password you\'re not likely to forget. You\'ll need these to log into Admin once setup is complete.';
$_lang["connection_screen_default_admin_password"] = 'Administrator password:';
$_lang["connection_screen_default_admin_password_confirm"] = 'Confirm password:';
$_lang["connection_screen_default_admin_user"] = 'Default Admin User';
$_lang["connection_screen_defaults"] = 'Default Manager Settings';
$_lang["connection_screen_server_connection_information"] = 'Server connection and login information';
$_lang["connection_screen_server_connection_note"] = 'Enter the database host (server name or IP address), the username and password before testing the connection.';
$_lang["connection_screen_server_test_connection"] = 'Test database server connection and view collations.';
$_lang["connection_screen_table_prefix"] = 'Table prefix:';
$_lang["creating_database_connection"] = 'Creating connection to the database: ';
$_lang["database_alerts"] = 'Database Alerts!';
$_lang["database_connection_failed"] = 'Database connection failed!';
$_lang["database_connection_failed_note"] = 'Please check the database login details and try again.';
$_lang["database_use_failed"] = 'Database could not be selected!';
$_lang["database_use_failed_note"] = 'Please check the database permissions for the specified user and try again.';
$_lang["default_language"] = 'Default Manager Language';
$_lang["default_language_description"] = 'This is the default language that will be used in the Evolution CMS Manager back end control panel.';
$_lang["depedency_create"] = 'Depedency created';
$_lang["depedency_update"] = 'Depedency updated';
$_lang["during_execution_of_sql"] = ' during the execution of SQL statement ';
$_lang["encoding"] = 'iso-8859-1';
$_lang["error"] = 'error';
$_lang["errors"] = 'errors';
$_lang["failed"] = 'FAILED!';
$_lang["guid_set"] = 'GUID set';
$_lang["help"] = 'Help!';
$_lang["help_link"] = 'http://forums.modx.com/';
$_lang["help_title"] = 'Installation assistance in the Evolution CMS forums';
$_lang["iagree_box"] = 'I agree to the terms of <a href="../assets/docs/license.txt" target="_blank">the Evolution CMS license</a>. For translations of the GPL version 2 license, please visit the <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0-translations.html" target="_blank">GNU Operating System website</a>.';
$_lang["install"] = 'Install';
$_lang["install_overwrite"] = 'Install/Overwrite';
$_lang["install_results"] = 'Install results';
$_lang["install_update"] = 'Install/Update';
$_lang["installation_error_occured"] = 'The following errors had occurred during installation';
$_lang["installation_install_new_copy"] = 'Install a new copy of ';
$_lang["installation_install_new_note"] = 'Please note this option may overwrite any data inside your database.';
$_lang["installation_mode"] = 'Installation Mode';
$_lang["installation_new_installation"] = 'New Installation';
$_lang["installation_note"] = '<strong>Note:</strong> After logging into the manager you should edit and save your System Configuration settings before browsing the site by choosing <strong>Tools</strong> -> System Configuration in the Evolution CMS Manager.';
$_lang["installation_successful"] = 'Installation was successful!';
$_lang["installation_upgrade_advanced"] = 'Advanced Upgrade';
$_lang["installation_upgrade_advanced_note"] = 'For advanced database admins or moving to servers with a different database connection character set.<br /><b>You will need to know your full database name, user, password and connection/collation details.</b>';
$_lang["installation_upgrade_existing"] = 'Upgrade Existing Install';
$_lang["installation_upgrade_existing_note"] = 'Upgrade your current files and database.';
$_lang["installed"] = 'Installed';
$_lang["installing_demo_site"] = 'Installing demo site: ';
$_lang["language_code"] = 'en';
$_lang["loading"] = 'Loading...';
$_lang["modules"] = 'Modules';
$_lang["modx_footer1"] = '&copy; 2005-[+current_year+] the <a href="http://evo.im/" target="_blank" style="color: green; text-decoration:underline">Evolution CMS</a> Content Management Framework (CMF) project. All rights reserved. Evolution CMS is licensed under the GNU GPL.';
$_lang["modx_footer2"] = 'Evolution CMS is free software.  We encourage you to be creative and make use of Evolution CMS in any way you see fit. Just make sure that if you do make changes and decide to redistribute your modified EVO, that you keep the source code free!';
$_lang["modx_install"] = 'Evolution CMS &raquo; Install';
$_lang["modx_requires_php"] = ', and Evolution CMS requires PHP [+min_version+] or later';
$_lang["mysql_5051"] = ' MySQL server version is 5.0.51!';
$_lang["mysql_5051_warning"] = 'There are known issues with MySQL 5.0.51. It is recommended that you upgrade before continuing.';
$_lang["mysql_old_version"] = 'When you use version oldest then 5.7.6 engine will be MyISAM in newest version use engine InnoDB.<br> We recommend that you update your MySQL';
$_lang["mysql_version_is"] = ' Your MySQL version is: ';
$_lang["mysql_version_is"] = ' Your MySQL version is: ';
$_lang["no"] = 'No';
$_lang["none"] = 'None';
$_lang["not_found"] = 'not found';
$_lang["ok"] = 'OK!';
$_lang["optional_items"] = 'Optional Items';
$_lang["optional_items_note"] = 'Please choose your installation options and click Install:';
$_lang["php_security_notice"] = '<legend>Security notice</legend><p>While Evolution CMS will work on your PHP version, usage of Evolution CMS on this version is not recommended. Your version of PHP is vulnerable to numerous security holes. Please upgrade to PHP version is 5.6 or higher, which patches these holes. It is recommended you upgrade to this version for the security of your own website.</p>';
$_lang["please_correct_error"] = '. Please correct the error';
$_lang["please_correct_errors"] = '. Please correct the errors';
$_lang["plugins"] = 'Plugins';
$_lang["preinstall_validation"] = 'Pre-install validation';
$_lang["recommend_collation"] = 'utf8mb4_general_ci';
$_lang["recommend_collations_order"] = 'utf8mb4_unicode_ci,utf8mb4_general_ci,utf8_unicode_ci,utf8_general_ci,utf8mb4_bin,utf8_bin,utf8mb4_unicode_520_ci,utf8_unicode_520_ci,utf8_general_mysql500_ci';
$_lang["recommend_setting_change_title"] = 'Recommended Setting Change';
$_lang["recommend_setting_change_validate_referer_confirmation"] = 'Setting change: <em>Validate HTTP_REFERER headers?</em>';
$_lang["recommend_setting_change_validate_referer_description"] = 'Your site is not configured to validate the HTTP_REFERER of incoming requests to the Manager. We strongly recommend enabling this setting to reduce the risk of a CSRF (Cross Site Request Forgery) attack.';
$_lang["remove_install_folder_auto"] = 'Remove the install folder and files from my website <br />&nbsp;(This operation requires delete permission to the granted to the install folder).';
$_lang["remove_install_folder_manual"] = 'Please remember to remove the &quot;<b>install</b>&quot; folder before you log into the Content Manager.';
$_lang["resetting_database"] = 'Resetting database for demo-site: ';
$_lang["retry"] = 'Retry';
$_lang["running_database_updates"] = 'Running database updates: ';
$_lang["sample_web_site"] = 'Sample Web Site';
$_lang["sample_web_site_note"] = 'Please note that this will <b>overwrite</b> existing documents and resources.';
$_lang["session_problem"] = 'A problem was detected with your server sessions. Please consult your server admin to correct this problem.';
$_lang["session_problem_try_again"] = 'Try again?';
$_lang["setup_cannot_continue"] = 'Unfortunately, Setup cannot continue at the moment, due to the above ';
$_lang["setup_couldnt_install"] = 'Evolution CMS setup couldn\'t install/alter some tables inside the selected database.';
$_lang["setup_database"] = 'Setup will now attempt to setup the database:<br />';
$_lang["setup_database_create_connection"] = 'Creating connection to the database: ';
$_lang["setup_database_create_connection_failed"] = 'Database connection failed!';
<?php
/**
 * EVO Installer language file
 *
 * @author davaeron
 * @version 1.5.0
 * @date 2018/02/23
 *
 * @language Belorussian
 * @package evo
 * @subpackage installer
 *
 */

$_lang["agree_to_terms"] = 'Пагадзіцеся з умовамі ліцэнзіі і ўсталюйце'; //Agree to the License Terms and Install
$_lang["alert_database_test_connection"] = 'Вам трэба стварыць сваю базу дадзеных або праверыць выбар вашай базы дадзеных!'; //You need to create your database or test the selection of your database!
$_lang["alert_database_test_connection_failed"] = 'Тэст выбару вашай базы дадзеных не прайшоў!'; //The test of your database selection has failed!
$_lang["alert_enter_adminconfirm"] = 'Пароль адміністратара і пацвярджэнне не супадаюць!'; //The administrator password and the confirmation don't match!
$_lang["alert_enter_adminlogin"] = 'Вам неабходна ўвесці імя карыстальніка для ўліковага запісу сістэмнага адміністратара!'; //You need to enter a username for the system admin account!
$_lang["alert_enter_adminpassword"] = 'Вам неабходна ўвесці пароль для ўліковага запісу сістэмнага адміністратара!'; //You need to enter a password for the system admin account!
$_lang["alert_enter_database_name"] = 'Вам неабходна ўвесці значэнне імя базы дадзеных!'; //You need to enter a value for database name!
$_lang["alert_enter_host"] = 'Вам трэба ўвесці значэнне для хоста базы дадзеных!'; //You need to enter a value for database host!
$_lang["alert_enter_login"] = 'Вам трэба ўвесці імя для ўваходу ў базу дадзеных!'; //You need to enter your database login name!
$_lang["alert_server_test_connection"] = 'Вам трэба праверыць падключэнне да сервера!'; //You need to test your server connection!
$_lang["alert_server_test_connection_failed"] = 'Тэст злучэння з вашым серверам не прайшоў!'; //The test of your server connection has failed!
$_lang["alert_table_prefixes"] = 'Прэфіксы табліц павінны пачынацца з літары!'; //Table prefixes must start with a letter!
$_lang["all"] = 'Усе'; //All
$_lang["and_try_again"] = 'і паўтарыце спробу. Калі вам патрэбна дапамога, каб высветліць, як выправіць праблему'; //, and try again. If you need help figuring out how to fix the problem
$_lang["and_try_again_plural"] = 'і паўтарыце спробу. Калі вам патрэбна дапамога, каб высветліць, як вырашыць праблемы'; //, and try again. If you need help figuring out how to fix the problems
$_lang["begin"] = 'Пачаць'; //Begin
$_lang["btnback_value"] = 'Назад'; //Back
$_lang["btnclose_value"] = 'Блізка'; //Close
$_lang["btnnext_value"] = 'Далей'; //Next
$_lang["cant_write_config_file"] = 'Evolution CMS не можа запісаць файл канфігурацыі. Калі ласка, скапіруйце наступнае ў файл'; //Evolution CMS couldn't write the config file. Please copy the following into the file 
$_lang["cant_write_config_file_note"] = 'Пасля таго, як гэта будзе зроблена, вы можаце ўвайсці ў Evolution CMS Admin, указаўшы ў браўзеры YourSiteName.com/[+MGR_DIR+]/.'; //Once that's been done, you can log into Evolution CMS Admin by pointing your browser at YourSiteName.com/[+MGR_DIR+]/.
$_lang["checkbox_select_options"] = 'Сцяжок выбару опцый:'; //Checkbox select options:
$_lang["checking_if_cache_exist"] = 'Праверка наяўнасці каталогаў <span class="mono">/assets/cache</span> і <span class="mono">/assets/cache/rss</span>:'; //Checking if <span class="mono">/assets/cache</span> and <span class="mono">/assets/cache/rss</span> directories exist: 
$_lang["checking_iconv"] = 'Праверка даступнасці пашырэння <span class="mono">iconv</span>:'; //Checking if extension <span class="mono">iconv</span> is available: 
$_lang["checking_iconv_note"] = 'Важна ўсталяваць/уключыць пашырэнне iconv. Калі ласка, звярніцеся да хоста, калі вы не ведаеце, як гэта ўключыць.'; //It is important to install/enable extension iconv. Please speak to your host if you don´t know how to enable it.
$_lang["checking_if_cache_file_writable"] = 'Праверка, ці даступны файл <span class="mono">/assets/cache/siteCache.idx.php</span> для запісу:'; //Checking if <span class="mono">/assets/cache/siteCache.idx.php</span> file is writable: 
$_lang["checking_if_cache_file2_writable"] = 'Праверка, ці даступны файл <span class="mono">/assets/cache/sitePublishing.idx.php</span> для запісу:'; //Checking if <span class="mono">/assets/cache/sitePublishing.idx.php</span> file is writable: 
$_lang["checking_if_cache_writable"] = 'Праверка даступнасці для запісу каталогаў <span class="mono">/assets/cache</span> і <span class="mono">/assets/cache/rss</span>:'; //Checking if <span class="mono">/assets/cache</span> and <span class="mono">/assets/cache/rss</span> directories are writable: 
$_lang["checking_if_config_exist_and_writable"] = 'Праверка, ці існуе <span class="mono">/[+MGR_DIR+]/includes/config.inc.php</span> і ці даступны для запісу:'; //Checking if <span class="mono">/[+MGR_DIR+]/includes/config.inc.php</span> exists and is writable: 
$_lang["checking_if_export_exists"] = 'Праверка, ці існуе каталог <span class="mono">/assets/export</span>:'; //Checking if <span class="mono">/assets/export</span> directory exists: 
$_lang["checking_if_export_writable"] = 'Праверка, ці даступны для запісу каталог <span class="mono">/assets/export</span>:'; //Checking if <span class="mono">/assets/export</span> directory is writable: 
$_lang["checking_if_images_exist"] = 'Праверка наяўнасці каталогаў <span class="mono">/assets/images</span>, <span class="mono">/assets/files</span>, <span class="mono">/assets/backup</span> і <span class="mono">/assets/.thumbs</span>:'; //Checking if <span class="mono">/assets/images</span>, <span class="mono">/assets/files</span>,  <span class="mono">/assets/backup</span> and <span class="mono">/assets/.thumbs</span> directories exists: 
$_lang["checking_if_images_writable"] = 'Праверка даступнасці для запісу каталогаў <span class="mono">/assets/images</span>, <span class="mono">/assets/files</span>, <span class="mono">/assets/backup</span> і <span class="mono">/assets/.thumbs</span>:'; //Checking if <span class="mono">/assets/images</span>, <span class="mono">/assets/files</span>,  <span class="mono">/assets/backup</span> and <span class="mono">/assets/.thumbs</span> directories are writable: 
$_lang["checking_mysql_strict_mode"] = 'Праверка MySQL на строгі sql_mode:'; //Checking MySQL for strict sql_mode: 
$_lang["checking_mysql_version"] = 'Праверка версіі MySQL:'; //Checking MySQL version: 
$_lang["checking_pgsql_version"] = 'Праверка версіі PostgreSQL:'; //Checking PostgeSQL version: 
$_lang["checking_php_version"] = 'Праверка версіі PHP:'; //Checking PHP version: 
$_lang["checking_registerglobals"] = 'Праверка, ці адключаны Register_Globals:'; //Checking if Register_Globals is off: 
$_lang["checking_registerglobals_note"] = 'Гэтая канфігурацыя робіць ваш сайт значна больш успрымальным да нападаў міжсайтавага сцэнарыя (XSS). Вы павінны пагаварыць са сваім хостам аб адключэнні гэтай налады, як правіла, адным з трох спосабаў: змяніўшы глабальны файл php.ini, дадаўшы правілы ў файл .htaccess у корані вашай ўстаноўкі Evolution CMS або дадаўшы карыстальніцкія файлы перавызначэння php.ini у кожным каталогу пры ўсталёўцы (а іх шмат). Вы па-ранейшаму зможаце ўсталяваць Evolution CMS, але папярэдзьце сябе.'; //This configuration makes your site much more susceptible to Cross Site Scripting (XSS) attacks. You should speak to your host about disabling this setting, usually by one of three ways: modifying the global php.ini file, adding rules to a .htaccess file in the root of your Evolution CMS install, or adding custom php.ini override files in every directory on your install (and there's a lot of them). You will still be able to install Evolution CMS, but consider yourself warned.
$_lang["checking_sessions"] = 'Праверка правільнасці наладкі сеансаў:'; //Checking if sessions are properly configured: 
$_lang["checking_table_prefix"] = 'Праверка прэфікса табліцы `'; //Checking table prefix `
$_lang["choose_language"] = 'Выберыце мову'; //Choose language
$_lang["chunks"] = 'Кавалачкі'; //Chunks
$_lang["config_permissions_note"] = 'Для новых усталяванняў Linux/Unix стварыце пусты файл з імем <span class="mono">config.inc.php</span> у каталогу <span class="mono">/[+MGR_DIR+]/includes/</span> з правамі доступу да файла 0666.'; //For new Linux/Unix installs, please create a blank file named <span class="mono">config.inc.php</span> in the <span class="mono">/[+MGR_DIR+]/includes/</span> directory with file permissions set to 0666.
$_lang["connection_screen_collation"] = 'Супастаўленне:'; //Collation:
$_lang["connection_screen_connection_method"] = 'Спосаб падлучэння:'; //Connection method:
$_lang["connection_screen_database_connection_information"] = 'Інфармацыя базы дадзеных'; //Database information
$_lang["connection_screen_database_connection_note"] = 'Увядзіце назву базы дадзеных, якую вы хочаце выкарыстоўваць або якую хочаце стварыць для гэтай устаноўкі Evolution CMS. Калі базы дадзеных не існуе, праграма ўстаноўкі паспрабуе яе стварыць. Гэта можа не атрымацца ў залежнасці ад правоў карыстальніка MySQL.'; //Enter the database name to use or which you wish to create for this Evolution CMS install. If no database exists, the installer will attempt to create one. This may fail depending on the MySQL user permissions.
$_lang["connection_screen_database_host"] = 'Хост базы даных:'; //Database host:
$_lang["connection_screen_database_type"] = 'Тып базы дадзеных:'; //Database type:
$_lang["connection_screen_database_info"] = 'Інфармацыя базы даных'; //Database Information
$_lang["connection_screen_database_login"] = 'Імя для ўваходу ў базу даных:'; //Database login name:
$_lang["connection_screen_database_name"] = 'Назва базы дадзеных:'; //Database name:
$_lang["connection_screen_database_pass"] = 'Пароль базы дадзеных:'; //Database password:
$_lang["connection_screen_database_test_connection"] = 'Стварыце або праверце выбар вашай базы дадзеных.'; //Create or test selection of your database.
$_lang["connection_screen_default_admin_email"] = 'Электронная пошта адміністратара:'; //Administrator email:
$_lang["connection_screen_default_admin_login"] = 'Імя карыстальніка адміністратара:'; //Administrator username:
$_lang["connection_screen_default_admin_note"] = 'Цяпер вам трэба будзе ўвесці некаторыя дадзеныя для галоўнага ўліковага запісу адміністратара. Вы можаце ўвесці тут сваё імя і пароль, які вы наўрад ці забудзеце. Яны спатрэбяцца вам для ўваходу ў сістэму адміністратара пасля завяршэння наладкі.'; //Now you'll need to enter some details for the main administrator account. You can fill in your own name here, and a password you're not likely to forget. You'll need these to log into Admin once setup is complete.
$_lang["connection_screen_default_admin_password"] = 'Пароль адміністратара:'; //Administrator password:
$_lang["connection_screen_default_admin_password_confirm"] = 'Пацвердзіце пароль:'; //Confirm password:
$_lang["connection_screen_default_admin_user"] = 'Карыстальнік адміністратара па змаўчанні'; //Default Admin User
$_lang["connection_screen_defaults"] = 'Налады дыспетчара па змаўчанні'; //Default Manager Settings
$_lang["connection_screen_server_connection_information"] = 'Падключэнне да сервера і інфармацыя для ўваходу'; //Server connection and login information
$_lang["connection_screen_server_connection_note"] = 'Перш чым праверыць злучэнне, увядзіце хост базы дадзеных (імя сервера або IP-адрас), імя карыстальніка і пароль.'; //Enter the database host (server name or IP address), the username and password before testing the connection.
$_lang["connection_screen_server_test_connection"] = 'Праверка падключэння да сервера базы дадзеных і прагляд супастаўлення.'; //Test database server connection and view collations.
$_lang["connection_screen_table_prefix"] = 'Прэфікс табліцы:'; //Table prefix:
$_lang["creating_database_connection"] = 'Стварэнне падлучэння да базы дадзеных:'; //Creating connection to the database: 
$_lang["database_alerts"] = 'Абвесткі базы дадзеных!'; //Database Alerts!
$_lang["database_connection_failed"] = 'Збой падключэння да базы даных!'; //Database connection failed!
$_lang["database_connection_failed_note"] = 'Праверце дадзеныя для ўваходу ў базу дадзеных і паўтарыце спробу.'; //Please check the database login details and try again.
$_lang["database_use_failed"] = 'База даных не можа быць выбрана!'; //Database could not be selected!
$_lang["database_use_failed_note"] = 'Калі ласка, праверце правы доступу да базы дадзеных для пазначанага карыстальніка і паўтарыце спробу.'; //Please check the database permissions for the specified user and try again.
$_lang["default_language"] = 'Мова дыспетчара па змаўчанні'; //Default Manager Language
$_lang["default_language_description"] = 'Гэта мова па змаўчанні, якая будзе выкарыстоўвацца ў задняй панэлі кіравання Evolution CMS Manager.'; //This is the default language that will be used in the Evolution CMS Manager back end control panel.
$_lang["depedency_create"] = 'Створана залежнасць'; //Depedency created
$_lang["depedency_update"] = 'Абнаўленне залежнасці'; //Depedency updated
$_lang["during_execution_of_sql"] = 'падчас выканання аператара SQL'; // during the execution of SQL statement 
$_lang["encoding"] = 'ISO-8859-1'; //iso-8859-1
$_lang["error"] = 'памылка'; //error
$_lang["errors"] = 'памылкі'; //errors
$_lang["failed"] = 'НЕ ВЫДАЛОСЯ!'; //FAILED!
$_lang["guid_set"] = 'Усталяваны GUID'; //GUID set
$_lang["help"] = 'Дапамажыце!'; //Help!
$_lang["help_link"] = 'http://forums.modx.com/'; //http://forums.modx.com/
$_lang["help_title"] = 'Дапамога па ўстаноўцы на форумах Evolution CMS'; //Installation assistance in the Evolution CMS forums
$_lang["iagree_box"] = 'Я згодны з умовамі <a href="../assets/docs/license.txt" target="_blank">ліцэнзіі Evolution CMS</a>. Каб атрымаць пераклад ліцэнзіі GPL версіі 2, наведайце вэб-сайт аперацыйнай сістэмы GNU.'; //I agree to the terms of <a href="../assets/docs/license.txt" target="_blank">the Evolution CMS license</a>. For translations of the GPL version 2 license, please visit the <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0-translations.html" target="_blank">GNU Operating System website</a>.
$_lang["install"] = 'Усталяваць'; //Install
$_lang["install_overwrite"] = 'Усталяваць/перазапісаць'; //Install/Overwrite
$_lang["install_results"] = 'Вынікі ўстаноўкі'; //Install results
$_lang["install_update"] = 'Усталяваць/Абнавіць'; //Install/Update
$_lang["installation_error_occured"] = 'Падчас усталёўкі адбыліся наступныя памылкі'; //The following errors had occurred during installation
$_lang["installation_install_new_copy"] = 'Усталюйце новую копію'; //Install a new copy of 
$_lang["installation_install_new_note"] = 'Калі ласка, звярніце ўвагу, што гэты параметр можа перазапісаць любыя дадзеныя ў вашай базе дадзеных.'; //Please note this option may overwrite any data inside your database.
$_lang["installation_mode"] = 'Рэжым ўстаноўкі'; //Installation Mode
$_lang["installation_new_installation"] = 'Новая ўстаноўка'; //New Installation
$_lang["installation_note"] = '<strong>Заўвага:</strong> пасля ўваходу ў дыспетчар вы павінны адрэдагаваць і захаваць налады канфігурацыі сістэмы перад праглядам сайта, выбраўшы Інструменты -> Канфігурацыя сістэмы ў Evolution CMS Manager.'; //<strong>Note:</strong> After logging into the manager you should edit and save your System Configuration settings before browsing the site by choosing <strong>Tools</strong> -> System Configuration in the Evolution CMS Manager.
$_lang["installation_successful"] = 'Ўстаноўка прайшла паспяхова!'; //Installation was successful!
$_lang["installation_upgrade_advanced"] = 'Пашыранае абнаўленне'; //Advanced Upgrade
$_lang["installation_upgrade_advanced_note"] = 'Для прасунутых адміністратараў баз дадзеных або для пераходу на серверы з іншым наборам сімвалаў падключэння да базы дадзеных. <br /><b>Вам трэба будзе ведаць поўнае імя базы дадзеных, карыстальніка, пароль і звесткі аб злучэнні/супастаўленні</b>.'; //For advanced database admins or moving to servers with a different database connection character set.<br /><b>You will need to know your full database name, user, password and connection/collation details.</b>
$_lang["installation_upgrade_existing"] = 'Абнавіць існуючую ўстаноўку'; //Upgrade Existing Install
$_lang["installation_upgrade_existing_note"] = 'Абнавіце свае бягучыя файлы і базу дадзеных.'; //Upgrade your current files and database.
$_lang["installed"] = 'Усталяваны'; //Installed
$_lang["installing_demo_site"] = 'Устаноўка дэма-сайта:'; //Installing demo site: 
$_lang["language_code"] = 'ан'; //en
$_lang["loading"] = 'Загрузка...'; //Loading...
$_lang["modules"] = 'Модулі'; //Modules
$_lang["modx_footer1"] = '© 2005-[+current_year+] праект <a href="http://evo.im/" target="_blank" style="color: green; text-decoration:underline">Evolution CMS Content Management Framework (CMF)</a>. Усе правы ахоўваюцца. Evolution CMS мае ліцэнзію GNU GPL.'; //&copy; 2005-[+current_year+] the <a href="http://evo.im/" target="_blank" style="color: green; text-decoration:underline">Evolution CMS</a> Content Management Framework (CMF) project. All rights reserved. Evolution CMS is licensed under the GNU GPL.
$_lang["modx_footer2"] = 'Evolution CMS - бясплатная праграма. Мы рэкамендуем вам быць крэатыўнымі і выкарыстоўваць Evolution CMS так, як лічыце патрэбным. Проста пераканайцеся, што калі вы ўнясеце змены і вырашыце распаўсюджваць зменены EVO, зыходны код будзе бясплатным!'; //Evolution CMS is free software.  We encourage you to be creative and make use of Evolution CMS in any way you see fit. Just make sure that if you do make changes and decide to redistribute your modified EVO, that you keep the source code free!
$_lang["modx_install"] = 'Evolution CMS » Усталяваць'; //Evolution CMS &raquo; Install
$_lang["modx_requires_php"] = ', а Evolution CMS патрабуе PHP [+min_version+] або больш позняй версіі'; //, and Evolution CMS requires PHP [+min_version+] or later
$_lang["mysql_5051"] = 'Версія сервера MySQL - 5.0.51!'; // MySQL server version is 5.0.51!
$_lang["mysql_5051_warning"] = 'Ёсць вядомыя праблемы з MySQL 5.0.51. Рэкамендуецца абнавіць, перш чым працягваць.'; //There are known issues with MySQL 5.0.51. It is recommended that you upgrade before continuing.
$_lang["mysql_old_version"] = 'Калі вы выкарыстоўваеце самую старую версію, то рухавік 5.7.6 будзе MyISAM, у апошняй версіі выкарыстоўвайце механізм InnoDB. <br>Мы рэкамендуем вам абнавіць MySQL'; //When you use version oldest then 5.7.6 engine will be MyISAM in newest version use engine InnoDB.<br> We recommend that you update your MySQL
$_lang["mysql_version_is"] = 'Ваша версія MySQL:'; // Your MySQL version is: 
$_lang["no"] = 'няма'; //No
$_lang["none"] = 'Няма'; //None
$_lang["not_found"] = 'не знойдзены'; //not found
$_lang["ok"] = 'ДОБРА!'; //OK!
$_lang["optional_items"] = 'Дадатковыя прадметы'; //Optional Items
$_lang["optional_items_note"] = 'Калі ласка, абярыце параметры ўстаноўкі і націсніце Усталяваць:'; //Please choose your installation options and click Install:
$_lang["php_security_notice"] = '<legend>Заўвага аб бяспецы </legend><p>Хоць Evolution CMS будзе працаваць на вашай версіі PHP, выкарыстанне Evolution CMS у гэтай версіі не рэкамендуецца. Ваша версія PHP уразлівая да шматлікіх дзірак у бяспецы. Калі ласка, абнавіце PHP да версіі 5.6 або вышэй, якая ліквідуе гэтыя дзіркі. Рэкамендуецца абнавіць да гэтай версіі для бяспекі вашага вэб-сайта.</p>'; //<legend>Security notice</legend><p>While Evolution CMS will work on your PHP version, usage of Evolution CMS on this version is not recommended. Your version of PHP is vulnerable to numerous security holes. Please upgrade to PHP version is 5.6 or higher, which patches these holes. It is recommended you upgrade to this version for the security of your own website.</p>
$_lang["please_correct_error"] = '. Калі ласка, выпраўце памылку'; //. Please correct the error
$_lang["please_correct_errors"] = '. Калі ласка, выпраўце памылкі'; //. Please correct the errors
$_lang["plugins"] = 'Убудовы'; //Plugins
$_lang["preinstall_validation"] = 'Праверка перад устаноўкай'; //Pre-install validation
$_lang["recommend_collation"] = 'utf8mb4_general_ci'; //utf8mb4_general_ci
$_lang["recommend_collations_order"] = 'utf8mb4_unicode_ci,utf8mb4_general_ci,utf8_unicode_ci,utf8_general_ci,utf8mb4_bin,utf8_bin,utf8mb4_unicode_520_ci,utf8_unicode_520_ci,utf8_general_mysql500_ci'; //utf8mb4_unicode_ci,utf8mb4_general_ci,utf8_unicode_ci,utf8_general_ci,utf8mb4_bin,utf8_bin,utf8mb4_unicode_520_ci,utf8_unicode_520_ci,utf8_general_mysql500_ci
$_lang["recommend_setting_change_title"] = 'Рэкамендаванае змяненне налад'; //Recommended Setting Change
$_lang["recommend_setting_change_validate_referer_confirmation"] = 'Змена налад: <em>спраўдзіць загалоўкі HTTP_REFERER?</em>'; //Setting change: <em>Validate HTTP_REFERER headers?</em>
$_lang["recommend_setting_change_validate_referer_description"] = 'Ваш сайт не сканфігураваны для праверкі HTTP_REFERER ўваходных запытаў да Менеджара. Мы настойліва рэкамендуем уключыць гэты параметр, каб знізіць рызыку атакі CSRF (Cross Site Request Forgery).'; //Your site is not configured to validate the HTTP_REFERER of incoming requests to the Manager. We strongly recommend enabling this setting to reduce the risk of a CSRF (Cross Site Request Forgery) attack.
$_lang["remove_install_folder_auto"] = 'Выдаліце ​​папку ўсталявання і файлы з майго вэб-сайта <br /> &nbsp;(Гэтая аперацыя патрабуе дазволу на выдаленне папкі ўсталявання).'; //Remove the install folder and files from my website <br />&nbsp;(This operation requires delete permission to the granted to the install folder).
$_lang["remove_install_folder_manual"] = 'Калі ласка, не забудзьцеся выдаліць папку <b>"ўсталяваць"</b> перад уваходам у Content Manager.'; //Please remember to remove the &quot;<b>install</b>&quot; folder before you log into the Content Manager.
$_lang["resetting_database"] = 'Скід базы дадзеных для дэма-сайта:'; //Resetting database for demo-site: 
$_lang["retry"] = 'Паўтарыць'; //Retry
$_lang["running_database_updates"] = 'Запуск абнаўлення базы дадзеных:'; //Running database updates: 
$_lang["sample_web_site"] = 'Прыклад вэб-сайта'; //Sample Web Site
$_lang["sample_web_site_note"] = 'Звярніце ўвагу, што гэта <b>перазапіша</b> існуючыя дакументы і рэсурсы.'; //Please note that this will <b>overwrite</b> existing documents and resources.
$_lang["session_problem"] = 'Выяўлена праблема з вашымі сеансамі сервера. Каб выправіць гэтую праблему, звярніцеся да адміністратара сервера.'; //A problem was detected with your server sessions. Please consult your server admin to correct this problem.
$_lang["session_problem_try_again"] = 'Паспрабуй яшчэ?'; //Try again?
$_lang["setup_cannot_continue"] = 'На жаль, наладжванне не можа быць працягнута ў дадзены момант з-за вышэйзгаданага'; //Unfortunately, Setup cannot continue at the moment, due to the above 
$_lang["setup_couldnt_install"] = 'Праграме ўстаноўкі Evolution CMS не ўдалося ўсталяваць/змяніць некаторыя табліцы ў выбранай базе дадзеных.'; //Evolution CMS setup couldn't install/alter some tables inside the selected database.
$_lang["setup_database"] = 'Цяпер праграма ўстаноўкі паспрабуе наладзіць базу дадзеных:<br />'; //Setup will now attempt to setup the database:<br />
$_lang["setup_database_create_connection"] = 'Стварэнне падлучэння да базы дадзеных:'; //Creating connection to the database: 
$_lang["setup_database_create_connection_failed"] = 'Збой падключэння да базы даных!'; //Database connection failed!
$_lang["setup_database_create_connection_failed_note"] = 'Праверце дадзеныя для ўваходу ў базу дадзеных і паўтарыце спробу.'; //Please check the database login details and try again.
$_lang["setup_database_creating_tables"] = 'Стварэнне табліц базы дадзеных:'; //Creating database tables: 
$_lang["setup_database_creation"] = 'Стварэнне базы дадзеных `'; //Creating database `
$_lang["setup_database_creation_failed"] = 'Не атрымалася стварыць базу даных!'; //Database creation failed!
$_lang["setup_database_creation_failed_note"] = '- Праграма ўстаноўкі не можа стварыць базу дадзеных!'; // - Setup could not create the database!
$_lang["setup_database_creation_failed_note2"] = 'Праграме ўстаноўкі не ўдалося стварыць базу дадзеных, і існуючая база дадзеных з такой жа назвай не знойдзена. Цалкам верагодна, што бяспека вашага хостынг-правайдэра не дазваляе знешнім сцэнарыям ствараць базу дадзеных. Калі ласка, стварыце базу дадзеных у адпаведнасці з працэдурай вашага хостынг-правайдэра і зноў запусціце ўстаноўку.'; //Setup could not create the database, and no existing database with the same name was found. It is likely that your hosting provider's security does not allow external scripts to create a database. Please create a database according to your hosting provider's procedure, and run Setup again.
$_lang["setup_database_selection"] = 'Выбар базы дадзеных `'; //Selecting database `
$_lang["setup_database_selection_failed"] = 'Не атрымалася выбраць базу даных...'; //Database selection failed...
$_lang["setup_database_selection_failed_note"] = 'База дадзеных не існуе. Праграма ўстаноўкі паспрабуе яго стварыць.'; //The database does not exist. Setup will attempt to create it.
$_lang["snippets"] = 'Фрагменты'; //Snippets
$_lang["some_tables_not_updated"] = 'Некаторыя табліцы не былі абноўлены. Гэта можа быць звязана з папярэднімі мадыфікацыямі.'; //Some tables were not updated. This might be due to previous modifications.
$_lang["status_checking_database"] = 'Праверка базы дадзеных:'; //Checking database: 
$_lang["status_connecting"] = 'Падключэнне да хоста:'; // Connection to host: 
$_lang["status_failed"] = 'не атрымалася!'; //failed!
$_lang["status_failed_could_not_create_database"] = 'не атрымалася - не атрымалася стварыць базу дадзеных'; //failed - could not create database
$_lang["status_failed_database_collation_does_not_match"] = 'failed - неадпаведнасць сартавання базы дадзеных; выкарыстоўвайце SET NAMES або абярыце %s'; //failed - database collation mismatch; use SET NAMES or choose %s
$_lang["status_failed_table_prefix_already_in_use"] = 'не атрымалася - прэфікс табліцы ўжо выкарыстоўваецца!'; //failed - table prefix already in use!
$_lang["status_failed_mysqli"] = 'памылка - пашырэнне mysqli для PHP не ўстаноўлена!'; //error - mysqli extension for PHP is not installed!
$_lang["status_passed"] = 'пройдзена - выбрана база дадзеных'; //passed - database selected
$_lang["status_passed_database_created"] = 'пройдзена - база дадзеных створана'; //passed - database created
$_lang["status_passed_server"] = 'пройдзена - цяпер даступныя сартаванні'; //passed - collations now available
$_lang["strict_mode"] = 'Сервер MySQL строгі sql_mode уключаны!'; // MySQL server strict sql_mode is enabled!
$_lang["strict_mode_error"] = 'Некаторыя функцыі Evolution CMS могуць не працаваць належным чынам, калі STRICT_TRANS_TABLES sql_mode не адключаны. Вы можаце ўсталяваць рэжым MySQL, адрэдагаваўшы файл my.cnf або звязаўшыся з адміністратарам сервера.'; //Certain features of Evolution CMS may not work properly unless the STRICT_TRANS_TABLES sql_mode is disabled. You can set the MySQL mode by editing the my.cnf file or contact your server administrator.
$_lang["summary_setup_check"] = 'Праграма ўстаноўкі правяла некалькі праверак, каб убачыць, ці ўсё гатова для пачатку ўстаноўкі.'; //Setup has carried out a number of checks to see if everything's ready to start the setup.
$_lang["system_configuration"] = 'Канфігурацыя сістэмы'; //System Configuration
$_lang["system_configuration_validate_referer_description"] = 'Налада <strong>праверкі загалоўкаў HTTP_REFERER</strong> рэкамендуецца і можа абараніць ваш сайт ад атак CSRF, але ў некаторых канфігурацыях сервера можа зрабіць ваш менеджэр недаступным.'; //The <strong>Validate HTTP_REFERER headers</strong> setting is recommended and can protect your site from CSRF attacks, but in some server configurations, can make your manager inaccessible.
$_lang["table_prefix_already_inuse"] = '- Прэфікс табліцы ўжо выкарыстоўваецца ў гэтай базе дадзеных!'; // - Table prefix is already in use in this database!
$_lang["table_prefix_already_inuse_note"] = 'Праграма ўстаноўкі не можа ўсталяваць у выбраную базу дадзеных, бо яна ўжо ўтрымлівае табліцы з указаным вамі прэфіксам. Калі ласка, абярыце новы прэфікс табліцы і зноў запусціце ўстаноўку.'; //Setup couldn't install into the selected database, as it already contains tables with the prefix you specified. Please choose a new table prefix, and run Setup again.
$_lang["table_prefix_not_exist"] = '- Прэфікс табліцы не існуе ў гэтай базе!'; // - Table prefix does not exist in this database!
$_lang["table_prefix_not_exist_note"] = 'Праграму ўстаноўкі не ўдалося ўсталяваць у выбраную базу дадзеных, бо яна не ўтрымлівае існуючых табліц з прэфіксам, які вы ўказалі для абнаўлення. Калі ласка, абярыце існуючы прэфікс табліцы і зноў запусціце ўстаноўку.'; //Setup couldn't install into the selected database, as it does not contain existing tables with the prefix you specified to be upgraded. Please choose an existing table prefix, and run Setup again.
$_lang["templates"] = 'Шаблоны'; //Templates
$_lang["to_log_into_content_manager"] = 'Каб увайсці ў Content Manager ([+MGR_DIR+]/index.php), вы можаце націснуць кнопку `Зачыніць`.'; //To log into the Content Manager ([+MGR_DIR+]/index.php) you can click on the `Close` button.
$_lang["toggle"] = 'Пераключыць'; //Toggle
$_lang["tvs"] = 'Зменныя шаблону'; //Template Variables
$_lang["unable_install_chunk"] = 'Немагчыма ўсталяваць чанк. Файл'; //Unable to install chunk.  File
$_lang["unable_install_module"] = 'Немагчыма ўсталяваць модуль. Файл'; //Unable to install module.  File
$_lang["unable_install_plugin"] = 'Немагчыма ўсталяваць плагін. Файл'; //Unable to install plugin.  File
$_lang["unable_install_snippet"] = 'Немагчыма ўсталяваць сніпет. Файл'; //Unable to install snippet.  File
$_lang["unable_install_template"] = 'Немагчыма ўсталяваць шаблон. Файл'; //Unable to install template.  File
$_lang["upgrade_note"] = '<strong>Заўвага</strong>: перад праглядам вашага сайта вы павінны ўвайсці ў менеджэр з уліковым запісам адміністратара, затым праглядзець і захаваць налады канфігурацыі сістэмы.'; //<strong>Note:</strong> Before browsing your site you should log into the manager with an administrative account, then review and save your System Configuration settings.
$_lang["upgraded"] = 'Мадэрнізаваны'; //Upgraded
$_lang["validate_referer_title"] = 'Праверыць загалоўкі HTTP_REFERER?'; //Validate HTTP_REFERER headers?
$_lang["visit_forum"] = ', наведайце <a href="http://forums.modx.com/" target="_blank">форумы Evolution CMS</a>.'; //, visit the <a href="http://forums.modx.com/" target="_blank">Evolution CMS Forums</a>.
$_lang["warning"] = 'ПАПЯРЭДЖАННЕ!'; //WARNING!
$_lang["welcome_message_start"] = 'Спачатку абярыце тып ўстаноўкі для выканання:'; //First, choose the type of installation to perform:
$_lang["welcome_message_text"] = 'Гэтая праграма правядзе вас праз астатнюю частку ўстаноўкі.'; //This program will guide you through the rest of the installation.
$_lang["welcome_message_welcome"] = 'Сардэчна запрашаем у праграму ўстаноўкі Evolution CMS.'; //Welcome to the Evolution CMS installation program.
$_lang["writing_config_file"] = 'Запіс файла канфігурацыі:'; //Writing configuration file: 
$_lang["yes"] = 'так'; //Yes
$_lang["you_running_php"] = '- Вы працуеце на PHP'; // - You are running on PHP 
?>
