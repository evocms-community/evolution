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
$_lang["about_title"] = 'O Evolution';

// days
$_lang["monday"] = 'Poniedziałek';
$_lang["tuesday"] = 'Wtorek';
$_lang["wednesday"] = 'Środa';
$_lang["thursday"] = 'Czwartek';
$_lang["friday"] = 'Piątek';
$_lang["saturday"] = 'Sobota';
$_lang["sunday"] = 'Niedziela';

// templates
$_lang["template"] = 'Szablon';
$_lang["templates"] = 'Szablony';
$_lang['templatecontroller'] = 'Template Controller';
$_lang["template_assignedtv_tab"] = 'Zmienne szablonu';
$_lang["template_code"] = 'Kod szablonu (html)';
$_lang["template_desc"] = 'Opis';
$_lang["template_edit_tab"] = 'Edytuj szablon';
$_lang["template_inuse"] = 'This template is in use. Please set the documents using the template to another template. Documents using this template:';
$_lang["template_management_msg"] = 'Tutaj możesz wybrać, które szablony chcesz edytować.';
$_lang["template_msg"] = 'Tutaj możesz tworzyć/ edytować szablony. Zmienione/ nowe szablony nie będą widoczne na zcacheowanych stronach Twojej witryny dopóki cache nie zostanie wyczyszczony, jednakże, możesz użyć funkcji podglądu na stronie, aby zobaczyć szablon w działaniu.';
$_lang["template_name"] = 'Nazwa szablonu';
$_lang["template_no_tv"] = 'Do tego szablonu nie zostały jeszcze przypisane żadne zmienne.';
$_lang["template_notassigned_tv"] = 'Zmienne możliwe do przydzielenia.';
$_lang["template_reset_all"] = 'Zresetuj wszystkie strony i przypisz je do szablonu domyślnego';
$_lang["template_reset_specific"] = 'Zresetuj tylko \'%s\' stron';
$_lang["template_assigned_blade_file"] = 'Odpowiedni plik blade';
$_lang["template_create_blade_file"] = 'Utwórz plik szablonu przy zapisywaniu';
$_lang["template_selectable"] = 'Szablon dostępny podczas tworzenia lub edycji zasobu.';
$_lang["template_title"] = 'Utwórz/ edytuj szablon';
$_lang["template_tv_edit"] = 'Edytuj kolejność zmiennych szablonu';
$_lang["template_tv_edit_message"] = 'Przeciągnij aby zmienić kolejność Zmiennych Szablonu dla tego szablonu.';
$_lang["template_tv_edit_title"] = 'Kolejność Zmiennych Szablonu';
$_lang["template_tv_msg"] = 'Zmienne przypisane do tego szablonu są wymienione poniżej.';

// tmplvars
$_lang["tv"] = 'Zmienna Szablonu';
$_lang["tmplvar"] = 'Zmienna szablonu';
$_lang["tmplvars"] = 'Zmienne szablonu';
$_lang["tmplvar_access_msg"] = 'Wybierz grupy dokumentów, które mogą modyfikować zawartość lub wartość tej zmiennej';
$_lang["tmplvar_change_template_msg"] = 'Zmiana tego szablonu spowoduje przeładowanie Zmiennych Szablonu. Wszystkie niezapisane zmiany zostaną utracone. nn Czy na pewno chcesz zmienić szablon?';
$_lang["tmplvar_inuse"] = 'Poniższy dokument/y używają obecnie tej zmiennej szablonu. Aby kontynuować usuwane kliknij przycisk "Usuń", w przeciwnym razie kliknij "Anuluj".';
$_lang["tmplvar_tmpl_access"] = 'Dostęp Szablonów';
$_lang["tmplvar_tmpl_access_msg"] = 'Wybierz Szablony, które mogą odczytywać lub modyfikować tą zmienną';
$_lang["tmplvars_binding_msg"] = 'To pole obsługuje przypisanie danych źródłowych przy użyciu poleceń @';
$_lang["tmplvars_caption"] = 'Tytuł';
$_lang["tmplvars_default"] = 'Wartość domyślna';
$_lang["tmplvars_description"] = 'Opis';
$_lang["tmplvars_elements"] = 'Wartości opcji pola';
$_lang["tmplvars_inherited"] = 'Wartość dziedziczona';
$_lang["tmplvars_management_msg"] = 'Tutaj możesz zarządzać polami zmiennych dodatkowych w Twoich dokumentach.';
$_lang["tmplvars_msg"] = 'Tutaj możesz dodawać/edytować zmienne szablonu. Zmienne szablonu muszą być przydzielone do szablonów, aby były dostępne dla snippetów i dokumentów.';
$_lang["tmplvars_name"] = 'Nazwa zmiennej';
$_lang["tmplvars_novars"] = 'Nie znaleziono Zmiennych Szablonu';
$_lang["tmplvars_rank"] = 'Kolejność sortowania';
$_lang["tmplvars_rank_edit_message"] = 'Przeciągnij aby zmienić kolejność zmiennych szablonu.';
$_lang["tmplvars_reset_params"] = 'Zresetuj parametry';
$_lang["tmplvars_title"] = 'Utwórz/Edytuj Zmienną Szablonu';
$_lang["tmplvars_type"] = 'Typ pola';
$_lang["tmplvars_widget"] = 'Widget';
$_lang["tmplvars_widget_prop"] = 'Widget - właściwości';
$_lang["role_no_tv"] = 'No Variables have been assigned to this Role yet.';
$_lang["role_notassigned_tv"] = 'These Variables are available for assigning.';
$_lang["role_tv_msg"] = 'The Variables assigned to this Role are listed below.';
$_lang["tmplvar_roles_access_msg"] = 'Select the Roles that are allowed to access/process this Template Variable';

// snippets
$_lang["snippet"] = 'Snippet';
$_lang["snippets"] = 'Snippety';
$_lang["snippet_code"] = 'Kod snippetu (php)';
$_lang["snippet_desc"] = 'Opis';
$_lang["snippet_execonsave"] = 'Wykonaj snippet po zapisaniu.';
$_lang["snippet_management_msg"] = 'Tutaj możesz wybrać, które snippety chcesz edytować.';
$_lang["snippet_msg"] = 'Tutaj możesz dodawać/ edytować snippety. Pamiętaj, snippety to \'czysty\' kod PHP i jeśli oczekujesz, że dane zwracane przez snippet zostaną pokazane w określonym miejscu szablonu, musisz zwracać określoną wartość ze snippeta.';
$_lang["snippet_name"] = 'Nazwa snippeta';
$_lang["snippet_properties"] = 'Domyślne właściwości';
$_lang["snippet_title"] = 'Utwórz/ edytuj snippet';

// chunks
$_lang["htmlsnippet"] = 'Chunk';
$_lang["htmlsnippets"] = 'Chunki';
$_lang["htmlsnippet_desc"] = 'Opis';
$_lang["htmlsnippet_management_msg"] = 'Tutaj możesz wybrać, który chunk chcesz edytować.';
$_lang["htmlsnippet_msg"] = 'Tutaj możesz dodawać/edytować chunki. Pamiętaj, że chunki są \'czystym\' kodem HTML, więc skrypty PHP nie zostaną przetworzone.';
$_lang["htmlsnippet_name"] = 'Nazwa chunka';
$_lang["htmlsnippet_title"] = 'Utwórz/edytuj chunka';
$_lang["chunk"] = 'Chunk';
$_lang["chunk_code"] = 'Kod chunka (html)';
$_lang["chunk_multiple_id"] = 'Błąd: Wiele chunków posiada to samo ID.';
$_lang["chunk_no_exist"] = 'Chunk nie istnieje.';

// plugins
$_lang["plugin"] = 'Wtyczka';
$_lang["plugins"] = 'Wtyczki';
$_lang["plugin_code"] = 'Kod wtyczki (php)';
$_lang["plugin_config"] = 'Konfiguracja wtyczki';
$_lang["plugin_desc"] = 'Opis';
$_lang["plugin_disabled"] = 'Wtyczka wyłączona';
$_lang["plugin_event_msg"] = 'Wybierz zdarzenia, których chcesz by nasłuchiwała ta wtyczka.';
$_lang["plugin_management_msg"] = 'Tutaj możesz wybrać, którą wtyczkę chcesz edytować.';
$_lang["plugin_msg"] = 'Tutaj możesz dodawać/edytować wtyczki. Wtyczki to porcje kodu PHP, które wykonywane są podczas wybranych zdarzeń systemowych.';
$_lang["plugin_name"] = 'Nazwa wtyczki';
$_lang["plugin_priority"] = 'Edytuj kolejność wykonywania pluginów';
$_lang["plugin_priority_instructions"] = 'Przeciągnij aby zmienić kojejność pluginów w każdej z kategorii wydarzeń. Plugin który ma być uruchomiony jako pierwszy powinien być na szczycie listy.';
$_lang["plugin_priority_title"] = 'Kolejność wykonywania pluginów';
$_lang["purge_plugin"] = 'Usuń przestarzałe wtyczki';
$_lang["purge_plugin_confirm"] = 'Czy na pewno chcesz usunąć przestarzałe pluginy?';
$_lang["plugin_title"] = 'Stwórz/edytuj wtyczkę';

// categories
$_lang["category"] = 'Category';
$_lang["categories"] = 'Categories';
$_lang["category_heading"] = 'Kategoria';
$_lang["category_manager"] = 'Menadżer kategorii';
$_lang["category_management"] = 'Zarządzanie kategoriami';
$_lang["category_msg"] = 'Przeglądaj i edytuj wszystkie elementy pogrupowane w kategorie.';

// file
$_lang["file_delete_file"] = 'Usuń plik';
$_lang["file_delete_folder"] = 'Usuń folder';
$_lang["file_deleted"] = 'Powodzenie!';
$_lang["file_download_file"] = 'Ściągnij plik';
$_lang["file_download_unzip"] = 'Rozpakuj plik';
$_lang["file_folder_chmod_error"] = 'Nie można zmienić uprawnień, musisz je zmienić poza EVO.';
$_lang["file_folder_created"] = 'Folder został stworzony pomyślnie!';
$_lang["file_folder_deleted"] = 'Folder został usunięty!';
$_lang["file_folder_not_created"] = 'Nie można utworzyć folderu';
$_lang["file_folder_not_deleted"] = 'Nie można usunąć folderu. Upewnij się, że folder jest pusty przed jego usunięciem.';
$_lang["file_not_deleted"] = 'Błąd!';
$_lang["file_not_saved"] = 'Nie można zapisać pliku, upewnij się, że plik docelowy jest zapisywalny!';
$_lang["file_saved"] = 'Plik uaktualniony pomyślnie!';
$_lang["file_unzip"] = 'Rozpakowanie zakończone sukcesem!';
$_lang["file_unzip_fail"] = 'Błąd podczas rozpakowywania!';

// files
$_lang["files"] = 'Files';
$_lang["files_files"] = 'Pliki';
$_lang["files_access_denied"] = 'Brak dostępu!';
$_lang["files_data"] = 'Dane';
$_lang["files_dir_listing"] = 'Lista katalogu dla:';
$_lang["files_directories"] = 'Katalogi';
$_lang["files_directory_is_empty"] = 'Ten folder jest pusty.';
$_lang["files_dirwritable"] = 'Katalog zapisywalny?';
$_lang["files_editfile"] = 'Edycja pliku';
$_lang["files_file_type"] = 'Typ pliku: ';
$_lang["files_filename"] = 'Nazwa pliku';
$_lang["files_fileoptions"] = 'Opcje';
$_lang["files_filesize"] = 'Rozmiar pliku';
$_lang["files_filetype_notok"] = 'Wgrywanie plików tego typu nie jest dozwolone!';
$_lang["files_management"] = 'Zarządzaj plikami';
$_lang["files_management_no_permission"] = 'Nie masz wystarczających uprawnień do otwarcia lub edycji tych plików. Zapytaj administratora o dostęp do <b>%s</b>.';
$_lang["files_modified"] = 'Zmodyfikowany';
$_lang["files_top_level"] = 'Najwyższy poziom';
$_lang["files_up_level"] = 'Jeden poziom wyżej.';
$_lang["files_upload_copyfailed"] = 'Błąd w trakcie kopiowania pliku do katalogu docelowego - wgrywanie zakończone niepowodzeniem!';
$_lang["files_upload_error"] = 'Błąd';
$_lang["files_upload_error0"] = 'Wystąpił problem w trakcie wgrywania pliku.';
$_lang["files_upload_error1"] = 'Plik, który chcesz wgrać jest za duży.';
$_lang["files_upload_error2"] = 'Plik, który chcesz wgrać jest za duży.';
$_lang["files_upload_error3"] = 'Plik, który chcesz wgrać był tylko częściowo wgrany.';
$_lang["files_upload_error4"] = 'Musisz wybrać plik, który chcesz wgrać.';
$_lang["files_upload_error5"] = 'Wystąpił problem w trakcie wgrywania pliku.';
$_lang["files_upload_inhibited_msg"] = '<b>Funkcja wgrywania wstrzymana</b> - upewnij się, że wgrywanie plików jest obsługiwane i katalog jest zapisywalny dla PHP.<br />';
$_lang["files_upload_ok"] = 'Plik wgrany pomyślnie!';
$_lang["files_upload_permissions_error"] = 'Prawdopodobnie wystapiły problemy związane z prawami dostępu - folder do którego chcesz wgrać pliki musi być dostępny dla zapisu przez serwer.';
$_lang["files_uploadfile"] = 'Wgraj plik';
$_lang["files_uploadfile_msg"] = 'Wybierz plik, który chcesz wgrać:';
$_lang["files_uploading"] = 'Wgrywanie  <b>%s</b> do <b>%s/</b><br />';
$_lang["files_viewfile"] = 'Zobacz plik';

// modules
$_lang["module"] = 'Module';
$_lang["modules"] = 'Moduły';
$_lang["module_code"] = 'Kod modułu (php)';
$_lang["module_config"] = 'Konfiguracja modułu';
$_lang["module_desc"] = 'Opis';
$_lang["module_disabled"] = 'Moduł wyłączony';
$_lang["module_edit_click_title"] = 'Kliknij tutaj aby edytować moduł';
$_lang["module_group_access_msg"] = 'Wybierz grupy użytkowników, które mogą uruchamiać ten moduł z panelu administracji.';
$_lang["module_management"] = 'Zarządzenie modułami';
$_lang["module_management_msg"] = 'Tutaj możesz wybrać moduł, który chcesz wykonać lub zmodyfikować. Aby uruchomić moduł kliknij ikonę na siatce. Aby zmodyfikować moduł kliknij w jego nazwę.';
$_lang["module_msg"] = 'Dodawaj i edytuj moduły. Moduł jest zbiorem elementów (np. wtyczek, snippetów itp).';
$_lang["module_name"] = 'Nazwa modułu';
$_lang["module_resource_msg"] = 'Dodawaj lub usuwaj elementy z których korzysta moduł. Aby dodać nowy element, kliknij na jeden z poniższych przycisków.';
$_lang["module_resource_title"] = 'Zależności modułu';
$_lang["module_title"] = 'Utwórz/edytuj moduł';
$_lang["module_viewdepend_msg"] = 'Przeglądaj elementy, z których korzysta moduł. Kliknij na przycisk "Menedżera zależności" aby modyfikować te powiązania.';

// elements
$_lang["element"] = 'Zasób';
$_lang["elements"] = 'Elementy';
$_lang["element_categories"] = 'Widok połączony';
$_lang["element_filter_msg"] = 'Wyszukaj elementy';
$_lang["element_management"] = 'Zarządzanie elementami';
$_lang["element_name"] = 'Nazwa zasobu';
$_lang["element_selector_msg"] = 'Wybierz elementy z listy i kliknij przycisk \'Wstaw\'.';
$_lang["element_selector_title"] = 'Selektor zasobów';

// resource
$_lang["resource"] = 'Dokument';
$_lang["resource_alias"] = 'Alias URL';
$_lang["resource_alias_help"] = 'Tutaj możesz wybrać alias tego dokumentu. To spowoduje dostępność dokumentu poprzez: http://yourserver/alias Funkcja ta działa tylko, przy użyciu przyjaznych URL.';
$_lang["resource_content"] = 'Zawartość dokumentu';
$_lang["resource_description"] = 'Opis';
$_lang["resource_description_help"] = 'Możesz wprowadzić dodatkowy opis dokumentu.';
$_lang["resource_duplicate"] = 'Kopiuj dokument';
$_lang["resource_long_title_help"] = 'Tutaj możesz wprowadzić długi tytuł dla dokumentu. Ta opcja może być przydatna dla wyszukiwarek.';
$_lang["resource_metatag_help"] = 'Wybierz META tagi lub słowa kluczowe, które chcesz przypisać do tego dokumentu. Użyj klawisza CTRL aby wybrać kilka pozycji.';
$_lang["resource_opt_contentdispo"] = 'Przetwarzanie treści';
$_lang["resource_opt_contentdispo_help"] = 'Użyj pola przetwarzania treści, aby określić jak ten dokument zostanie obsłużony przez przeglądarkę internetową. Dla plików do pobrania wybierz opcję: załącznik.';
$_lang["resource_opt_emptycache"] = 'Opróżnij cache';
$_lang["resource_opt_emptycache_help"] = 'Zaznaczenie tego pola spowoduje opróżnienie cache po zapisaniu dokumentu. W ten sposób odwiedzający nie będą widzieli starszej wersji dokumentu.';
$_lang["resource_opt_folder"] = 'Folder?';
$_lang["resource_opt_folder_help"] = 'Zaznacz tę opcję, aby dokument pełnił również funkcję folderu dla innych dokumentów. Nie musisz się przejmować tą opcją, gdyż EVO z reguły zajmuje się ustawieniami folderów automatycznie.';
$_lang["resource_opt_menu_index"] = 'Pozycja w menu';
$_lang["resource_opt_menu_index_help"] = 'Indeks menu to pole, którego możesz użyć do sortowania dokumentów w snippecie menu. Możesz je również wykorzystać do innych celów w swoich snipetach.';
$_lang["resource_opt_menu_title"] = 'Tytuł menu';
$_lang["resource_opt_menu_title_help"] = 'Tytuł menu jest polem, które możesz użyć do wyświetlenia krótkiego tytułu dla dokumentu wewnątrz snippetów menu lub modułów.';
$_lang["resource_opt_published"] = 'Opublikowany';
$_lang["resource_opt_published_help"] = 'Zaznacz to pole, aby opublikować dokument natychmiast po jego zapisaniu.';
$_lang["resource_opt_richtext"] = 'Edytor RTE';
$_lang["resource_opt_richtext_help"] = 'Pozostaw tę opcję zaznaczoną, aby używać edytora RTE do edycji dokumentów. Jeśli dokument zawiera JavaScript i formularze, odznacz tę opcję, aby edytować w trybie HTML, tak by edytor nie zniszczył zawartości Twojego dokumentu.';
$_lang["resource_opt_show_menu"] = 'Pokaż w menu';
$_lang["resource_opt_show_menu_help"] = 'Wybierz tę opcję, żeby pokazać dokument w menu witryny. Niektóre funkcje budowy menu mogą ignorować tę opcję.';
$_lang["resource_opt_trackvisit_help"] = 'Zapisz w logu wizytę każdego użytkownika na stronie';
$_lang["resource_overview"] = 'Szczegóły dokumentu';
$_lang["resource_parent"] = 'Dokument nadrzędny';
$_lang["resource_parent_help"] = 'Kliknij na powyższej ikonie folderu aby włączyć (lub wyłączyć) wybór dokumentu nadrzędnego, a następnie kliknij na dokumencie w drzewie, żeby ustawić go jako nadrzędny dla tego dokumentu.';
$_lang["resource_permissions_error"] = 'Przypisz ten zasób przynajmniej do jednej grupy zasobów do której masz dostęp.';
$_lang["resource_setting"] = 'Ustawienia dokumentu';
$_lang["resource_summary"] = 'Wstęp';
$_lang["resource_summary_help"] = 'Wpisz krótki wstęp dla dokumentu';
$_lang["resource_title"] = 'Tytuł';
$_lang["resource_title_help"] = 'Wprowadź nazwę/ tytuł dokumentu. Staraj się unikać lewych ukośników w nazwie!';
$_lang["resource_to_be_moved"] = 'Dokument do przeniesienia';
$_lang["resource_type"] = 'Typ zasobu';
$_lang["resource_type_message"] = 'Linki odsyłają do zasobów w Internecie włączając w to również inne zasoby tej strony. Przykładowo: zewnętrzne strony internetowe, obrazy lub inne pliki znajdujące się w Internecie. Linki powinny być typu "text/html" oraz posiadać ustawiony sposób przetwarzania treści na "Inline".';
$_lang["resource_type_weblink"] = 'Link';
$_lang["resource_type_webpage"] = 'Dokument';
$_lang["resource_weblink_help"] = 'Podaj adres obiektu który chcesz połączyć z Weblinkiem. Możesz też wybrać plik z serwera lub zasób z drzewa.';
$_lang["resources_in_container"] = 'dokument(-y/-ów) w tym folderze';
$_lang["resources_in_container_no"] = 'Ten folder nie ma dokumentów podrzędnych.';

// role
$_lang["role"] = 'Rola';
$_lang["role_about"] = 'Pokazuj stronę \'O EVO\'';
$_lang["role_actionok"] = 'Pokazuj ekran zakończenia zadania';
$_lang["role_assets_images"] = 'Zarządzanie assets/images';
$_lang["role_assets_files"] = 'Zarządzanie assets/files';
$_lang["role_bk_manager"] = 'Użyj menedżera backup-u';
$_lang["role_cache_refresh"] = 'Czyszczenie cache\'u witryny';
$_lang["role_category_manager"] = 'Użyj Menadżera kategorii';
$_lang["role_change_password"] = 'Zmienianie hasła';
$_lang["role_change_resourcetype"] = 'Zmiana Typu Zasobu';
$_lang["role_chunk_management"] = 'Zarządzanie chunkami';
$_lang["role_config_management"] = 'Zarządzanie konfiguracją';
$_lang["role_content_management"] = 'Zarządzanie zawartością';
$_lang["role_create_chunk"] = 'Tworzenie nowych chunków';
$_lang["role_create_doc"] = 'Tworzenie nowych dokumentów';
$_lang["role_create_plugin"] = 'Utwórz nowe wtyczki';
$_lang["role_create_snippet"] = 'Tworzenie snippetów';
$_lang["role_create_template"] = 'Tworzenie nowych szablonów';
$_lang["role_credits"] = 'Pokazuj stronę \'Zasłużeni\'';
$_lang["role_delete_chunk"] = 'Usuwanie chunków';
$_lang["role_delete_doc"] = 'Usuwanie dokumentów';
$_lang["role_delete_eventlog"] = 'Czyszczenie dziennika zdarzeń';
$_lang["role_delete_module"] = 'Usuń moduł';
$_lang["role_delete_plugin"] = 'Usuń wtyczki';
$_lang["role_delete_role"] = 'Usuwanie ról';
$_lang["role_delete_snippet"] = 'Usuwanie snippetów';
$_lang["role_delete_template"] = 'Usuwanie szablonów';
$_lang["role_delete_user"] = 'Usuń użytkowników Menedżera';
$_lang["role_delete_web_user"] = 'Usuń użytkowników web';
$_lang["role_edit_chunk"] = 'Edytowanie chunków';
$_lang["role_edit_doc"] = 'Edytowanie dokumentu';
$_lang["role_edit_doc_metatags"] = 'Edytuj META tagi i słowa kluczowe dokumentu';
$_lang["role_edit_module"] = 'Edytuj moduł';
$_lang["role_edit_plugin"] = 'Edytuj wtyczki';
$_lang["role_edit_role"] = 'Edytowanie ról';
$_lang["role_edit_settings"] = 'Zmiana ustawień witryny';
$_lang["role_edit_snippet"] = 'Edytowanie snippetów';
$_lang["role_edit_template"] = 'Edytowanie szablonów';
$_lang["role_edit_user"] = 'Edytuj użytkowników Menedżera';
$_lang["role_edit_web_user"] = 'Edytuj użytkowników web';
$_lang["role_empty_trash"] = 'Trwałe kasowanie usuniętych dokumentów';
$_lang["role_errors"] = 'Pokazuj okno dialogowe błędów';
$_lang["role_eventlog_management"] = 'Logowanie zdarzeń';
$_lang["role_export_static"] = 'Eksportowanie statycznego HTML';
$_lang["role_file_management"] = 'Zarządzanie plikami';
$_lang["role_file_manager"] = 'Dostęp zarządzania wszystkimi plikami (root)';
$_lang["role_frames"] = 'Pokaż ramki menedżera';
$_lang["role_help"] = 'Przeglądanie stron pomocy';
$_lang["role_home"] = 'Pokaż stronę wprowadzającą menedżera';
$_lang["role_import_static"] = 'Import HTML';
$_lang["role_logout"] = 'Wylogowanie z menedżera';
$_lang["role_list_module"] = 'List Module';
$_lang["role_manage_metatags"] = 'Zarządzaj META tagami i słowami kluczowymi witryny';
$_lang["role_management_msg"] = 'Tutaj możesz wybrać, którą rolę chcesz edytować.';
$_lang["role_management_title"] = 'Zarządzanie rolami';
$_lang["role_messages"] = 'Przeglądanie i wysyłanie wiadomości';
$_lang["role_module_management"] = 'Zarządzanie modułem';
$_lang["role_name"] = 'Nazwa roli';
$_lang["role_new_module"] = 'Utwórz nowy moduł';
$_lang["role_new_role"] = 'Tworzenie ról';
$_lang["role_new_user"] = 'Dodaj nowych użytkowników Menedżera';
$_lang["role_new_web_user"] = 'Dodaj użytkownika Web';
$_lang["role_plugin_management"] = 'Zarządzenie wtyczkami';
$_lang["role_publish_doc"] = 'Publikowanie dokumentów';
$_lang["role_remove_locks"] = 'Usuń blokady';
$_lang["role_role_management"] = 'Role użytkowników';
$_lang["role_run_module"] = 'Uruchom moduł';
$_lang["role_save_chunk"] = 'Zapisywanie chunków';
$_lang["role_save_doc"] = 'Zapisywanie dokumentów';
$_lang["role_save_module"] = 'Zapisz moduł';
$_lang["role_save_password"] = 'Zapisywanie hasła';
$_lang["role_save_plugin"] = 'Zapisz wtyczki';
$_lang["role_save_role"] = 'Zapisywanie ról';
$_lang["role_save_snippet"] = 'Zapisywanie snippetów';
$_lang["role_save_template"] = 'Zapisywanie szablonów';
$_lang["role_save_user"] = 'Zapisz użytkowników Menedżera';
$_lang["role_save_web_user"] = 'Zapisz użytkowników web';
$_lang["role_snippet_management"] = 'Zarządzanie snippetami';
$_lang["role_template_management"] = 'Zarządzanie szablonami';
$_lang["role_title"] = 'Utwórz/ edytuj rolę';
$_lang["role_udperms"] = 'Zarządzanie uprawnieniami';
$_lang["role_user_management"] = 'Zarządzanie użytkownikami Menedżera';
$_lang["role_view_docdata"] = 'Przeglądanie danych dokumentu';
$_lang["role_view_eventlog"] = 'Przeglądanie dziennika zdarzeń';
$_lang["role_view_logs"] = 'Przeglądanie dziennika menadżera';
$_lang["role_view_unpublished"] = 'Pokaż nieopublikowane dokumenty';
$_lang["role_web_access_persmissions"] = 'Uprawnienia dostępu web';
$_lang["role_web_user_management"] = 'Zarządzanie użytkownikami web';

// user
$_lang["user"] = 'Użytkownik';
$_lang["users"] = 'Użytkownicy';
$_lang["user_block"] = 'Zablokowany';
$_lang["user_blockedafter"] = 'Zablokowane po';
$_lang["user_blockeduntil"] = 'Zablokowane do';
$_lang["user_changeddata"] = 'Twoje dane zmieniły się. Zaloguj się ponownie.';
$_lang["user_country"] = 'Kraj';
$_lang["user_dob"] = 'Data urodzenia';
$_lang["user_doesnt_exist"] = 'Uzytkownik nie istnieje';
$_lang["user_edit_self_msg"] = 'Aby w pełni zaktualizować swoje dane wymagane jest przelogowanie się.</b><br />Możesz również wygenerować dla siebie nowe hasło, zostanie ono przesłane do Ciebie poprzez email.';
$_lang["user_email"] = 'Adres email';
$_lang["user_failedlogincount"] = 'Nieudane próby logowania';
$_lang["user_fax"] = 'Fax';
$_lang["user_female"] = 'Kobieta';
$_lang["user_full_name"] = 'Pełna nazwa';
$_lang["user_first_name"] = 'First name';
$_lang["user_last_name"] = 'Last Name';
$_lang["user_middle_name"] = 'Middle Name';
$_lang["user_gender"] = 'Płeć';
$_lang["user_is_blocked"] = 'Ten użytkownik jest zablokowany!';
$_lang["user_logincount"] = 'Liczba logowań';
$_lang["user_male"] = 'Mężczyzna';
$_lang["user_management_msg"] = 'Tutaj możesz wybrać, którego użytkownika administracyjnego chcesz edytować. Użytkownicy administracyjni są to użytkownicy, którzy mogą logować się do Panelu Administracyjnego';
$_lang["user_management_title"] = 'Użytkownicy Menedżera';
$_lang["user_mobile"] = 'Numer telefonu komórkowego';
$_lang["user_phone"] = 'Numer telefonu';
$_lang["user_photo"] = 'Zdjęcie użytkownika';
$_lang["user_photo_message"] = 'Wprowadź url do obrazka albo użyj przycisku "wstaw" aby wybrać lub załadować plik na serwer.';
$_lang["user_prevlogin"] = 'Ostatnie logowanie';
$_lang["user_role"] = 'Rola użytkownika';
$_lang["no_user_role"] = 'No user role';
$_lang["user_state"] = 'Województwo';
$_lang["user_title"] = 'Dodaj/edytuj użytkownika Menedżera';
$_lang["user_upload_message"] = 'Jeśli chcesz zabronić temu użytkownikowi ładowania dowolnych typów plików z tej kategorii, upewnij się że opcja "Używaj ustawień konfiguracji systemu" jest odznaczona i pozostaw to pole puste.';
$_lang["user_use_config"] = 'Używaj ustawień konfiguracji systemu';
$_lang["user_verification"] = 'User is verified';
$_lang["user_zip"] = 'Kod pocztowy';
$_lang["username"] = 'Nazwa użytkownika';
$_lang["username_unique"] = 'User name is already in use!';
$_lang["user_street"] = 'Ulica';
$_lang["user_city"] = 'Miasto';
$_lang["user_other"] = 'Inne';

// add
$_lang["add"] = 'Dodaj';
$_lang["add_chunk"] = 'Dodaj chunk';
$_lang["add_doc"] = 'Dodaj dokument';
$_lang["add_folder"] = 'Nowy folder';
$_lang["add_plugin"] = 'Dodaj wtyczkę';
$_lang["add_resource"] = 'Nowy dokument';
$_lang["add_snippet"] = 'Dodaj snippet';
$_lang["add_tag"] = 'Dodaj tag';
$_lang["add_template"] = 'Dodaj szablon';
$_lang["add_tv"] = 'Dodaj TV';
$_lang["add_weblink"] = 'Nowy link';

// new
$_lang["new_category"] = 'Nowa kategoria';
$_lang["new_file_permissions_message"] = 'Przy ładowaniu nowego pliku w Menadżerze Plików, system spróbuje zmienić uprawnienia pliku na podane. Może to nie działać w pewnych przypadkach, np. na serwerze IIS - w takim przypadku musisz zmienić uprawnienia ręcznie.';
$_lang["new_file_permissions_title"] = 'Uprawnienia nowych plików';
$_lang["new_folder_permissions_message"] = 'Przy tworzeniu nowego folderu w Menadżerze Plików, system spróbuje zmienić uprawnienia folderu na podane. Może to nie działać w pewnych przypadkach, np. na serwerze IIS - w takim przypadku musisz zmienić uprawnienia ręcznie.';
$_lang["new_folder_permissions_title"] = 'Uprawnienia nowych folderów';
$_lang["new_permission"] = 'New Permission';
$_lang["new_htmlsnippet"] = 'Nowy chunk';
$_lang["new_keyword"] = 'Dodaj nowe słowo kluczowe:';
$_lang["new_module"] = 'Nowy moduł';
$_lang["new_parent"] = 'Nowy dokument nadrzędny';
$_lang["new_plugin"] = 'Nowa wtyczka';
$_lang["new_role"] = 'Nowa rola';
$_lang["new_snippet"] = 'Nowy snippet';
$_lang["new_template"] = 'Nowy szablon';
$_lang["new_tmplvars"] = 'Nowa zmienna szablonu';
$_lang["new_user"] = 'Nowy użytkownik Menedżera';
$_lang["new_web_user"] = 'Nowy użytkownik Web';
$_lang["new_resource"] = 'Nowy dokument';

// manage
$_lang["manage_categories"] = 'Zarządzanie kategoriami';
$_lang["manage_depends"] = 'Menedżer zależności';
$_lang["manage_files"] = 'Zarządzanie plikami';
$_lang["manage_htmlsnippets"] = 'Manage Chunks';
$_lang["manage_metatags"] = 'Zarządzanie META tagami i słowami kluczowymi';
$_lang["manage_modules"] = 'Zarządzanie modułami';
$_lang["manage_plugins"] = 'Manage Plugins';
$_lang["manage_snippets"] = 'Manage Snippets';
$_lang["manage_templates"] = 'Manage Templates';
$_lang["manage_documents"] = 'Manage Documents';
$_lang["manage_permission"] = 'Manage Permissions';

// move
$_lang["move"] = 'Przenieś';
$_lang["move_resource"] = 'Przenieś dokument';
$_lang["move_resource_message"] = 'Możesz przenieść dokument wraz z dokumentami podrzędnymi poprzez zaznaczenie nowego dokumentu nadrzędnego w drzewie. Jeśli wybierzesz dokument, który nie jest folderem, zostanie on w niego zmieniony. Proszę kliknąć na nowym dokumencie nadrzędnym w drzewie.';
$_lang["move_resource_new_parent"] = 'Proszę wybrać nowy dokument nadrzędny w drzewie dokumentów.';
$_lang["move_resource_title"] = 'Przenieś dokument';

$_lang["access_permissions"] = 'Uprawnienia dostępu';
$_lang["access_permission_denied"] = 'Nie masz właściwych uprawnień do tego dokumentu.';
$_lang["access_permission_parent_denied"] = 'Nie masz uprawnień do tworzenia lub przenoszenia dokumentu tutaj. Proszę wybrać inną lokację.';
$_lang["access_permissions_add_resource_group"] = 'Utwórz nową grupę dokumentów';
$_lang["access_permissions_add_user_group"] = 'Utwórz nową grupę użytkowników';
$_lang["access_permissions_docs_message"] = 'Tutaj możesz wybrać, do których grup dokumentów należy ten dokument';
$_lang["access_permissions_group_link"] = 'Utwórz nowe powiązanie z grupą';
$_lang["access_permissions_introtext"] = 'Tutaj możesz zarządzać uprawnieniami dostępu grup użytkowników i grup dokumentów. Żeby dodać użytkownika do grupy edytuj użytkownika i wybierz grupę (grupy) do których powinien należeć. Aby dodać dokument do grupy użytkowników, edytuj dokument i wybierz grupę (grupy) do których powinien należeć.';
$_lang["access_permissions_link_to_group"] = 'z grupą dokumentów';
$_lang["access_permissions_context"] = 'in context';
$_lang["access_permissions_link_user_group"] = 'Powiąż grupę użytkowników';
$_lang["access_permissions_links"] = 'Linki grup użytkowników/dokumentów';
$_lang["access_permissions_links_tab"] = 'Tutaj określamy, które grupy użytkowników mają dostęp do określonych grup dokumentów. Aby połączyć grupę dokumentów z grupą użytkowników, wybierz grupę z listy rozwijalnej i kliknij "Połącz". Aby usunąć połączenie dla danej grupy kliknij \'Usuń ->\'. Spowoduje to usunięcie połączenia.';
$_lang["access_permissions_no_resources_in_group"] = 'Brak.';
$_lang["access_permissions_no_users_in_group"] = 'Brak.';
$_lang["access_permissions_off"] = '<span class=\'warning\'>Uprawnienia Dostępu są wyłączone.</span> Oznacza to, że wszystkie zmiany dokonane tutaj nie będą miały efektu dopóki Uprawnienia Dostępu zostaną włączone.';
$_lang["access_permissions_resource_groups"] = 'Grupy dokumentów';
$_lang["access_permissions_resources_in_group"] = '<b>Dokumenty w grupie:</b> ';
$_lang["access_permissions_resources_tab"] = 'Tutaj możesz zobaczyć jakie grupy dokumentów zostały stworzone. Możesz także stworzyć nowe grupy, zmieniać nazwy, usuwać i sprawdzać które dokumenty należą do danej grupy (najedź kursorem na ID dokumentu, aby zobaczyć jego nazwę). Aby dodać dokument do grupy albo usunąć go z grupy, edytuj dokument bezpośrednio.';
$_lang["access_permissions_user_toggle"] = 'Toggle access permissions';
$_lang["access_permissions_user_groups"] = 'Grupy użytkowników';
$_lang["access_permissions_user_message"] = 'Wybierz do których grup należy ten użytkownik:';
$_lang["access_permissions_users_in_group"] = '<b>Użytkownicy w grupie:</b> ';
$_lang["access_permissions_users_tab"] = 'Tutaj możesz zobaczyć jakie grupy użytkowników zostały stworzone. Możesz także stworzyć nowe grupy, zmieniać nazwy, usuwać i sprawdzać którzy użytkownicy należą do danej grupy. Aby dodać nowego użytkownika do grupy albo usunać go z grupy, edytuj tego użytkownika bezpośrednio. Administratorzy (ID Roli 1) zawsze mają dostęp do wszystkich dokumentów, więc nie muszą być przypisani do żadnej grupy.';

$_lang["users_list"] = 'Users list';
$_lang["documents_list"] = 'Resources list';

$_lang["account_email"] = 'Konto e-mail';
$_lang["actioncomplete"] = 'Akcja zakończona powodzeniem!</b><br />Proszę zaczekać, aż EVO zakończy porządkowanie.';
$_lang["activity_message"] = 'Ta lista pokazuje ostatnie dokumenty, jakie utworzyłeś lub edytowałeś:';
$_lang["activity_title"] = 'Ostatnio edytowane dokumenty';

$_lang["administrator_role_message"] = 'Ta rola nie może być edytowana ani usunięta.';
$_lang["administrators"] = 'Administratorzy';
$_lang["after_saving"] = 'Po zapisaniu';
$_lang["alert_delete_self"] = 'Nie możesz usunąć swojego konta!';
$_lang["alias"] = 'Alias URL';
$_lang["all_doc_groups"] = 'Wszystkie grupy dokumentów (Publiczne)';
$_lang["all_events"] = 'Wszystkie wydarzenia';
$_lang["all_usr_groups"] = 'Wszystkie grupy użytkowników (Publiczne)';
$_lang["allow_mgr_access"] = 'Pozwól na dostęp do interfejsu administracyjnego';
$_lang["allow_mgr_access_message"] = 'Użyj tej opcji aby włączyć lub wyłączyć dostęp do interfejsu administracyjnego. <b>Uwaga: Jeśli ta opcja zostanie ustawiona na \'nie\' użytkownik zostanie przekierowany do dokumentu startowego dla Menedżera lub do strony startowej witryny.</b>';
$_lang["already_deleted"] = 'został już skasowany.';
$_lang["attachment"] = 'Załącznik';
$_lang["author_infos"] = 'Informacje o autorze';
$_lang["automatic_alias_message"] = 'Wybierz \'tak\' aby system automatycznie generował alias przy zapisie, bazując na tytule dokumentu.';
$_lang["automatic_alias_title"] = 'Automatycznie generuj alias URL';
$_lang["backup"] = 'Kopia zapasowa';
$_lang["bk_manager"] = 'Kopia zapasowa';
$_lang["block_message"] = 'Ten użytkownik zostanie zablokowany po zapisaniu jego danych!';
$_lang["blocked_minutes_message"] = 'Tutaj możesz podać czas blokowania użytkownika, który przekroczy dozwoloną liczbę błędnych logowań. Podaj wartość w minutach.';
$_lang["blocked_minutes_title"] = 'Czas blokowania';
$_lang["cache_files_deleted"] = 'Usunięto następujące pliki:';
$_lang["cancel"] = 'Anuluj';
$_lang["captcha_code"] = 'Kod bezpieczeństwa';
$_lang["captcha_message"] = 'Włącz tę opcję, aby wzmocnić zabezpieczenia i wymóc na użytkownikach wprowadzanie kodu, który jest nieczytelny dla maszyn (i innych niebezpiecznych skryptów).';
$_lang["captcha_title"] = 'Używaj kodów CAPTCHA';
$_lang["captcha_words_default"] = 'EVO,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join(),Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote';
$_lang["captcha_words_message"] = 'Tutaj możesz wprowadzić listę słów CAPTCHA do użycia jeśli system CAPTCHA jest włączony. Oddziel słowa przecinkiem. Możesz wprowadzić maksymalnie 255 znaków.';
$_lang["captcha_words_title"] = 'Słowa CAPTCHA';

$_lang["cfg_base_path"] = 'MODX_BASE_PATH';
$_lang["cfg_base_url"] = 'MODX_BASE_URL';
$_lang["cfg_manager_path"] = 'MODX_MANAGER_PATH';
$_lang["cfg_manager_url"] = 'MODX_MANAGER_URL';
$_lang["cfg_site_url"] = 'MODX_SITE_URL';

$_lang["change_name"] = 'Zmień nazwę użytkownika';
$_lang["change_password"] = 'Zmień hasło';
$_lang["change_password_confirm"] = 'Potwierdź hasło';
$_lang["change_password_message"] = 'Proszę wprowadzić nowe hasło, następnie ponowić je i zatwierdzić. Hasło musi mieć minimum 6 znaków. ';
$_lang["change_password_new"] = 'Nowe hasło';
$_lang["charset_message"] = 'Proszę wybrać, którego kodowania znaków chcesz używać w menadżerze. EVO był testowany z wieloma zestawami znaków, ale nie ze wszystkimi. Dla większości języków, wystarczające jest domyślne kodowanie ISO-8859-1.';
$_lang["charset_title"] = 'Kodowanie znaków';

$_lang["cleaningup"] = 'Czyszczenie';
$_lang["clean_uploaded_filename"] = 'Używaj transliteracji dla plików';
$_lang["clean_uploaded_filename_message"] = 'Użyj domyślnych ustawień Transalias aby generować nazwy ładowanych plików oczyszczone ze znaków specjalnych.';
$_lang["clear_log"] = 'Wyczyść log';
$_lang["click_to_context"] = 'Kliknij aby otworzyć menu kontekstowe';
$_lang["click_to_edit_title"] = 'Kliknij tutaj aby edytować rekord';
$_lang["click_to_view_details"] = 'Kliknij tutaj, żeby wyświetlić szczegóły';
$_lang["close"] = 'Zamknij';
$_lang["code"] = 'Kod';
$_lang["collapse_tree"] = 'Zwiń drzewo';
$_lang["comment"] = 'Komentarz';

$_lang["configcheck_admin"] = 'Proszę skontaktować się z administratorem systemu, aby powiadomić go o tym komunikacie!';
$_lang["configcheck_cache"] = 'cache directory is not writable';
$_lang["configcheck_cache_msg"] = 'Evolution CMS cannot write to the cache directory. Evolution CMS will still function as expected, but no caching will take place. To solve this, make the \'cache\' directory writable.';
$_lang["configcheck_configinc"] = 'Plik konfiguracyjny jest zapisywalny';
$_lang["configcheck_configinc_msg"] = 'Dla większego bezpieczeństwa ustaw prawa dostępu do pliku konfiguracji (/[+MGR_DIR+]/includes/config.inc.php) na tylko do odczytu.';
$_lang["configcheck_default_msg"] = 'Wystąpił nieokreślony błąd.';
$_lang["configcheck_errorpage_unavailable"] = 'Strona błędu Twojego serwisu jest niedostępna.';
$_lang["configcheck_errorpage_unavailable_msg"] = 'Oznacza to, że Twoja strona błędu jest niedostępna dla użytkowników albo nie istnieje. Może to powodować niestabilność i wiele błędnych wpisów w logach serwisu. Upewnij się, że żadna grupa użytkowników nie jest przypisana do strony.';
$_lang["configcheck_errorpage_unpublished"] = 'Strona błędu Twojego serwisu jest nieopublikowana lub nie istnieje.';
$_lang["configcheck_errorpage_unpublished_msg"] = 'Oznacza to, że strona błędu Twojego serwisu jest niedostępna dla odwiedzających. Opublikuj tą stronę albo upewnij się, że jest ona przypisana do istniejącego dokumentu w drzewie zawartości Twojej strony.';
$_lang["configcheck_filemanager_path"] = 'Obecne ustawienie <a href="/[+MGR_DIR+]/?a=17&amp;tab=4">File Manager path</a> wygląda nieprawidłowo.';
$_lang["configcheck_filemanager_path_msg"] = 'To może się zdarzyć np. po przeniesieniu instalacji do innego katalogu lub innego serwera. Proszę sprawdzić i zapisać Konfigurację EVO.';
$_lang["configcheck_hide_warning"] = '<a href="javascript:hideConfigCheckWarning(\'%s\');"><em>Nie pokazuj tego ponownie.</em></a>';
$_lang["configcheck_images"] = 'Katalog obrazów nie jest zapisywalny';
$_lang["configcheck_images_msg"] = 'Katalog z obrazkami nie jest zapisywalny, lub nie istnieje. Oznacza to, że funkcje menadżera obrazków w edytorze nie będą działać!';
$_lang["configcheck_installer"] = 'instalator wciąż obecny';
$_lang["configcheck_installer_msg"] = 'Katalog /install zawiera instalator EVO. Wyobraź sobie co może nastąpić jeśli niepowołana osoba odkryje ten folder i uruchomi instalator! Prawdopodobnie nie zajdzie za daleko, ponieważ będzie musiała wprowadź informacje dostępu do bazy danych, ale wciąż najlepszym rozwiązaniem jest usunięcie tego katalogu z serwera.';
$_lang["configcheck_lang_difference"] = 'niepoprawna ilość wpisów w pliku językowym';
$_lang["configcheck_lang_difference_msg"] = 'Aktualnie wybrany język posiada inną liczbę wpisów niż język domyślny. Niekoniecznie stanowi to problem, jednakże może to oznaczać, że plik języka wymaga aktualizacji.';
$_lang["configcheck_notok"] = 'Jedno lub więcej z ustawień konfiguracyjnych nie zostało zweryfikowane: ';
$_lang["configcheck_ok"] = 'Sprawdzanie przebiegło pomyślnie - brak ostrzeżeń.';
$_lang["configcheck_php_gdzip"] = 'Rozszerzenia GD i/albo Zip PHP nie zostały znalezione.';
$_lang["configcheck_php_gdzip_msg"] = 'Do poprawnego działania EVO potrzebuje włączonych w konfiguracji PHP rozszerzeń GD oraz Zip. EVO będzie wciąż działał poprawnie, jednak nie będzie możliwe korzystanie z wszystkich jego funkcji: managera plików, edytora obrazów oraz Captcha przy logowaniu.';
$_lang["configcheck_rb_base_dir"] = 'Obecne ustawienie <a href="/[+MGR_DIR+]/?a=17&amp;tab=5">File base path</a> wygląda nieprawidłowo.';
$_lang["configcheck_rb_base_dir_msg"] = 'To może się zdarzyć np. po przeniesieniu instalacji do innego katalogu lub innego serwera. Proszę sprawdzić i zapisać Konfigurację EVO.';
$_lang["configcheck_register_globals"] = 'register_globals jest włączona w konfiguracji PHP';
$_lang["configcheck_register_globals_msg"] = 'Taka konfiguracja może zagrozić bezpieczeństwu strony, ponieważ powoduje większą wrażliwość na ataki typu XSS.';
$_lang["configcheck_title"] = 'Sprawdzenie konfiguracji';
$_lang["configcheck_templateswitcher_present"] = 'TemplateSwitcher Plugin wykryty';
$_lang["configcheck_templateswitcher_present_delete"] = '<a href="javascript:deleteTemplateSwitcher();">Usuń TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_disable"] = '<a href="javascript:disableTemplateSwitcher();">Wyłącz TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_msg"] = 'TemplateSwitcher plugin powoduje problemy z cache i wydajnością.';
$_lang["configcheck_unauthorizedpage_unavailable"] = 'Strona Braku Autoryzacji Twojego serwisu jest nieopublikowana lub nieistnieje.';
$_lang["configcheck_unauthorizedpage_unavailable_msg"] = 'Oznacza to, że Strona Braku Autoryzacji jest niedostępna dla odwiedzających.  Może to powodować niestabilność i wiele błędnych wpisów w logach serwisu. Upewnij się, że żadna grupa użytkowników nie jest przypisana do strony.';
$_lang["configcheck_unauthorizedpage_unpublished"] = 'Strona Braku Konfiguracji zdefiniowana w ustawieniach jest nieopublikowana.';
$_lang["configcheck_unauthorizedpage_unpublished_msg"] = 'Oznacza to, że Strona Braku Autoryzacji serwisu jest niedostępna dla odwiedzających. Opublikuj tą stronę albo upewnij się, że jest ona przypisana do istniejącego dokumentu w drzewie zawartości Twojej strony.';
$_lang["configcheck_validate_referer"] = 'Ostrzeżenie odnośnie bezpieczeństwa: Weryfikacja nagłówków HTTP_REFERER';
$_lang["configcheck_validate_referer_msg"] = 'Ustawienie konfiguracyjne <strong>Weryfikuj nagłówki HTTP_REFERER</strong> jest wyłączone. Zalecamy aby było ono włączone. <a href="index.php?a=17">Przejdź do konfiguracji systemu</a><br /><a href="javascript:hideHeaderVerificationWarning();"><em>Nie pokazuj tego komunikatu ponownie./em></a>';
$_lang["configcheck_warning"] = 'Ostrzeżenia konfiguracji:';
$_lang["configcheck_what"] = 'Co to oznacza?';

$_lang["safe_mode_warning"] = 'Safe mode is enabled. Manager functionality is limited.';

$_lang["confirm_block"] = 'Czy na pewno chcesz zablokować tego użytkownika?';
$_lang["confirm_delete_category"] = 'Na pewno chcesz usunąć tę kategorię?';
$_lang["confirm_delete_eventlog"] = 'Czy na pewno chcesz usunąć log zdarzeń?';
$_lang["confirm_delete_file"] = 'Czy na pewno chcesz usunąć ten plik?\n\nMoże to spowodować nieprawidłowe działanie Twojej strony! Usuwaj tylko te pliki, co do których jesteś pewien, że można je bezpiecznie usunąć.';
$_lang["confirm_delete_group"] = 'Czy jesteś pewien że chcesz usunąć tę grupę?';
$_lang["confirm_delete_htmlsnippet"] = 'Czy na pewno chcesz usunąć tego chunka?';
$_lang["confirm_delete_keywords"] = 'Czy na pewno chcesz usunąć te słowa kluczowe?';
$_lang["confirm_delete_module"] = 'Czy na pewno chcesz usunąć ten moduł?';
$_lang["confirm_delete_plugin"] = 'Czy na pewno chcesz usunąć tą wtyczkę?';
$_lang["confirm_delete_record"] = 'Czy na pewno chcesz usunąć zaznaczone rekordy?';
$_lang["confirm_delete_resource"] = 'Czy na pewno chcesz usunąć ten dokument?nWszystkie podrzędne dokumenty zostaną również usunięte.';
$_lang["confirm_delete_role"] = 'Czy na pewno chcesz usunąć tę rolę?';
$_lang["confirm_delete_snippet"] = 'Czy na pewno chcesz usunąć ten snippet?';
$_lang["confirm_delete_tags"] = 'Czy na pewno chcesz usunąć wybrane META tagi?';
$_lang["confirm_delete_template"] = 'Czy na pewno chcesz usunąć ten szablon?';
$_lang["confirm_delete_tmplvars"] = 'Czy na pewno chcesz usunąć tą zmienną i wszystkie przechowywane wartości?';
$_lang["confirm_delete_user"] = 'Czy na pewno chcesz usunąć tego użytkownika?';

$_lang["delete_yourself"] = 'You can\'t delete yourself';
$_lang["delete_last_admin"] = 'You can\'t delete last admin user';

$_lang["confirm_delete_permission"] = 'Are you sure you want to delete this Permission?';
$_lang["confirm_duplicate_record"] = 'Czy na pewno chcesz zduplikować ten rekord?';
$_lang["confirm_empty_trash"] = 'Opróżnienie kosza spowoduje całkowite usunięcie wcześniej skasowanych dokumentów?nnKontynuować?';
$_lang["confirm_load_depends"] = 'Czy na pewno chcesz załadować ekran Menedżera zależności bez zapisywania zmian?';
$_lang["confirm_name_change"] = 'Zmiana nazwy użytkownika może wpłynąć na inne aplikacje podłączone do panelu administracji.\n\nCzy na pewno chcesz zmienić tę nazwę użytkownika?';
$_lang["confirm_publish"] = '\n\nOpublikowanie tego dokumentu spowoduje usunięcie wcześniejszych dat publikacji/zamknięcia publikacji, które mogły być ustawione. Jeśli chcesz zachować te daty wybierz \'edycję\' dokumentu.nnKontynuować?';
$_lang["confirm_remove_locks"] = 'Użytkownicy czasami zamykają przeglądarkę podczas edycji dokumentu, szablonu, snippeta lub parsera. W ten sposób pozostawiają edytowane pozycje zablokowane. Naciskając OK możesz zdjąć wszystkie aktualne blokady.nnKontynuować?';
$_lang["confirm_reset_sort_order"] = 'Czy jesteś pewien że chcesz zresetować \"sort order/index\" wszystkich wyświetlonych elementów do 0?';
$_lang["confirm_resource_duplicate"] = 'Czy na pewno chcesz zduplikować ten dokument/folder?n Podkatalogi i dokumenty również zostaną zduplikowane.';
$_lang["confirm_setting_language_change"] = 'Zmodyfikowałeś wartość domyślną i utracisz wprowadzone zmiany. Czy chcesz kontynuować?';
$_lang["confirm_unblock"] = 'Czy na pewno chcesz odblokować tego użytkownika?';
$_lang["confirm_undelete"] = '\n\nWszystkie podrzędne dokumenty skasowane razem z tym dokumentem zostaną również odzyskane, lecz dokumenty podrzędne skasowane wcześniej pozostaną nadal skasowane.';
$_lang["confirm_unpublish"] = '\n\nZamknięcie publikacji tego dokumentu spowoduje usunięcie wcześniejszych dat publikacji/zamknięcia publikacji, które mogły być ustawione. Jeśli chcesz zachować te daty wybierz \'edycję\' dokumentu.\n\nKontynuować?';
$_lang["confirm_unzip_file"] = 'Czy na pewno chcesz rozpakować ten plik? \n\n Istniejące pliki zostaną nadpisane.';

$_lang["could_not_find_user"] = 'Nie odnaleziono użytkownika';

$_lang["create_folder_here"] = 'Utwórz folder w tym miejscu';
$_lang["create_resource_here"] = 'Utwórz dokument';
$_lang["create_resource_title"] = 'Utwórz dokument w tym miejscu';
$_lang["create_weblink_here"] = 'Utwórz link';
$_lang["createdon"] = 'Data utworzenia';
$_lang["create_new"] = 'Utwórz nowy';

$_lang["credits"] = 'Autorzy';
$_lang["credits_shouts_msg"] = '<p>EVO jest zarządzane i utrzymywane przez <a href="http://evo.im/" target="_blank">evo.im</a>.</p>';
$_lang["custom_contenttype_message"] = 'Tutaj możesz dodać własne typy treści, które zostaną użyte w dokumentach. Aby dodać nową pozycję wprowadź typ treści w polu tekstowym i naciśnij przycisk \'Dodaj\'.';
$_lang["custom_contenttype_title"] = 'Własne typy treści';

$_lang["database_charset"] = 'Baza danych - zestaw znaków';
$_lang["database_collation"] = 'Baza danych - zestaw znaków dla porównań';
$_lang["database_name"] = 'Baza danych - nazwa bazy';
$_lang["database_overhead"] = '<b style=\'color:#990033\'>Wyjaśnienie:</b> Nadmiar to nieużywane miejsce zarezerwowane przez MySQL na przyszłe dane. Aby zwolnić to miejsce, kliknij na liczbę je reprezentującą.';
$_lang["database_server"] = 'Baza danych - serwer';
$_lang["database_table_clickbackup"] = 'Pobierz kopię zapasową';
$_lang["database_table_clickhere"] = 'Kliknij tutaj';
$_lang["database_table_datasize"] = 'Rozmiar danych';
$_lang["database_table_droptablestatements"] = 'Generuj instrukcje DROP TABLE.';
$_lang["database_table_effectivesize"] = 'Rozmiar efektywny';
$_lang["database_table_indexsize"] = 'Rozmiar indeksów';
$_lang["database_table_overhead"] = 'Nadmiar';
$_lang["database_table_records"] = 'Ilość rekordów';
$_lang["database_table_tablename"] = 'Nazwa tabeli';
$_lang["database_table_totals"] = 'Razem:';
$_lang["database_table_totalsize"] = 'Rozmiar całkowity';
$_lang["database_tables"] = 'Baza danych - tabele';
$_lang["database_version"] = 'Wersja bazy danych:';

$_lang["date"] = 'Data';
$_lang["datechanged"] = 'Data zmiany';
$_lang["datepicker_offset"] = 'Zakres datepicker\'a';
$_lang["datepicker_offset_message"] = 'Liczba lat wstecz wyświetlanych w datepickerze.';
$_lang["datetime_format"] = 'Format daty';
$_lang["datetime_format_message"] = 'Format w którym będą wyświetlane daty w menedżerze.';

$_lang["default"] = 'Domyślnie:';
$_lang["defaultcache_message"] = 'Wybierz \'Tak\' aby domyślnie umożliwić zapis w cache wszystkich nowych dokumentów.';
$_lang["defaultcache_title"] = 'Domyślnie zapisywać w cache';
$_lang["defaultmenuindex_message"] = 'Wybierz \'Tak\' aby domyślnie włączyć automatyczne zwiększanie indeksu menu.';
$_lang["defaultmenuindex_title"] = 'Domyślne indeksowanie menu';
$_lang["defaultpublish_message"] = 'Wybierz \'Tak\' aby każdy nowy dokument był od razu publikowany.';
$_lang["defaultpublish_title"] = 'Domyślnie publikować';
$_lang["defaultsearch_message"] = 'Wybierz \'Tak\' aby umożliwić przeszukiwanie wszystkich nowych dokumentów.';
$_lang["defaultsearch_title"] = 'Domyślnie umożliwiać przeszukiwanie';
$_lang["defaulttemplate_message"] = 'Wybierz domyślny szablon, który chcesz używać dla nowych dokumentów. Możesz potem przypisać dokumentowi inny szablon.';
$_lang["defaulttemplate_title"] = 'Szablon domyślny';
$_lang["defaulttemplate_logic_title"] = 'Przypisywanie szablonów';
$_lang["defaulttemplate_logic_general_message"] = 'Nowe zasoby użyją poniższego ustawienia lub szablonu rodzica jeśli żaden nie zostanie znaleziony:';
$_lang["defaulttemplate_logic_system_message"] = '<strong>System</strong>: domyślny szablon systemu.';
$_lang["defaulttemplate_logic_parent_message"] = '<strong>Rodzic</strong>: taki sam szablon jak dokumentu nadrzędnego (rodzica).';
$_lang["defaulttemplate_logic_sibling_message"] = '<strong>Rodzeństwo</strong>: taki sam szablon jak inne dokumenty tego samego poziomu.';

$_lang["delete"] = 'Usuń';
$_lang["delete_resource"] = 'Usuń dokument';
$_lang["delete_tags"] = 'Usuń tagi';
$_lang["deleting_file"] = 'Usuwam plik `%s`: ';
$_lang["description"] = 'Opis';
$_lang["deselect_keywords"] = 'Wyczyść słowa kluczowe';
$_lang["deselect_metatags"] = 'Wyczyść META tagi';
$_lang["disabled"] = 'Wyłączony';
$_lang["doc_data_title"] = 'Pokaż dane dokumentu';
$_lang["documentation"] = 'Dokumentacja';

$_lang["duplicate"] = 'Kopiuj';
$_lang["duplicate_alias_found"] = 'Dokument \'%s\' już używa aliasu \'%s\'. Proszę wprowadzić unikalny alias.';
$_lang["duplicate_template_alias_found"] = 'Template \'%s\' is already using the URL alias \'%s\'. Please enter a unique alias.';
$_lang["duplicate_alias_message"] = 'Wybierz \'tak\' aby pozwolić na zapisywanie takich samych aliasów. <b>Uwaga: Ta opcja powinna być używana z opcją \'Przyjazne ścieżki aliasów\' ustawioną na \'tak\' aby uniknąć problemów przy odwołaniach do dokumentów.</b>';
$_lang["duplicate_alias_title"] = 'Zezwalaj na identyczne aliasy';
$_lang["duplicate_name_found_general"] = 'Istnieje już %s o nazwie \'%s\'. Wybierz inną nazwę.';
$_lang["duplicate_name_found_module"] = 'Istnieje już moduł o nazwie \'%s\'. Wybierz inną nazwę.';
$_lang["duplicated_el_suffix"] = 'Kopia';

$_lang["edit"] = 'Edytuj';
$_lang["edit_resource"] = 'Edytuj dokument';
$_lang["edit_resource_title"] = 'Utwórz/ edytuj dokument';
$_lang["edit_settings"] = 'Konfiguracja systemu';
$_lang["editedon"] = 'Data edycji';
$_lang["editing_file"] = 'Edytuje plik: ';
$_lang["editor_css_path_message"] = 'Podaj ścieżkę do pliku CSS, który chcesz użyć w edytorze. Najlepszym sposobem wprowadzenia ścieżki jest podanie jej z katalogu głównego serwera, np. /assets/site/style.css. Jeśli nie chcesz ładować pliku CSS do edytora pozostaw to pole puste.';
$_lang["editor_css_path_title"] = 'Ścieżka do pliku CSS';

$_lang["email"] = 'Email';
$_lang["email_sent"] = 'E-mail wysłany';
$_lang["email_unique"] = 'Email is already in use!';
$_lang["emailsender_message"] = 'Adres e-mail administratora. Ten adres będzie używany na przykład do powiadomień systemowych itp.';
$_lang["emailsender_title"] = 'Adres e-mail';
$_lang["emailsubject_default"] = 'Informacje o założonym koncie użytkownika';
$_lang["emailsubject_message"] = 'Tutaj możesz określić temat e-maila rejestrującego.';
$_lang["emailsubject_title"] = 'Temat e-maila';

$_lang["empty_folder"] = 'Ten folder jest pusty';
$_lang["empty_recycle_bin"] = 'Opróżnij usunięte dokumenty';
$_lang["empty_recycle_bin_empty"] = 'Nie ma żadnych usuniętych dokumentów w koszu.';
$_lang["enable_resource"] = 'Udostępnij plik zasobu.';
$_lang["enable_sharedparams"] = 'Włącz udostępnianie parametrów';
$_lang["enable_sharedparams_msg"] = '<b>Uwaga:</b> Powyższy GUID (Globally Unique ID) będzie używany aby jednoznacznie identyfikować ten moduł i udostępniane przez niego parametry. GUID jest także używany to stworzenia połączenia pomiędzy modułem i wtyczkami lub snippetami korzystającymi z udostępnianych parametrów.';
$_lang["enabled"] = 'Włączone';
$_lang["error"] = 'Błąd';
$_lang["error_sending_email"] = 'Błąd przy wysyłaniu e-maila';
$_lang["errorpage_message"] = 'Podaj ID dokumentu, do którego chcesz odesłać użytkowników, jeśli zażądają dokumentu który aktualnie nie istnieje. <b>UWAGA: upewnij się, że ID należy do istniejącego dokumentu, oraz że dokument jest opublikowany!</b>';
$_lang["errorpage_title"] = 'Strona błędu';
$_lang["event_id"] = 'ID zdarzenia';
$_lang["eventlog"] = 'Log zdarzeń';
$_lang["eventlog_msg"] = 'Log zdarzeń jest używany do wyświetlania informacji, ostrzeżeń i błędów generowanych przez system. Kolumna \'źródło\' pokazuje sekcję systemu z której pochodzi wpis.';
$_lang["eventlog_viewer"] = 'Dziennik zdarzeń';
$_lang["everybody"] = 'Wszyscy';
$_lang["existing_category"] = 'Istniejąca kategoria';
$_lang["expand_tree"] = 'Rozwiń drzewo';
$_lang["failed_login_message"] = 'Tutaj ustaw dozwoloną liczbę prób logowania użytkownika.';
$_lang["failed_login_title"] = 'Liczba prób logowania';
$_lang["fe_editor_lang_message"] = 'Wybierz język, który będzie używany przez edytor podczas edycji z poziomu frontu serwisu.';
$_lang["fe_editor_lang_title"] = 'Język edytora dla części frontowej';

$_lang["filemanager_path_message"] = 'IIS często błędnie określa ustawienie document_root, które jest używane przez menedżer plików do określenia co może być widoczne dla ciebie. Jeśli masz problemy z menadżerem plików, upewnij się, że ta ścieżka wskazuje na katalog główny instalacji EVO.';
$_lang["filemanager_path_title"] = 'Ścieżka menadżera plików';

$_lang["folder"] = 'Folder';
$_lang["forgot_password_email_fine_print"] = '* Powyższy adres straci ważność kiedy zmienisz swoje hasło, lub po dniu dzisiejszym.';
$_lang["forgot_password_email_instructions"] = 'Tam możesz zmienić swoje hasło w menu Moje konto.';
$_lang["forgot_password_email_intro"] = 'Zgłoszono żądanie zmiany hasła do Twojego konta.';
$_lang["forgot_password_email_link"] = 'Kliknij tutaj, aby zakończyć proces.';
$_lang["forgot_your_password"] = 'Zapomniane hasło?';
$_lang["friendly_alias_message"] = 'Jeżeli używasz przyjaznych URL\'i i dokument posiada alias, będzie on miał zawsze pierwszeństwo przed przyjaznym adresem URL. Ustawiając tę opcję na \'tak\', prefiks i sufiks przyjaznego URL\'u zostanie również użyty z aliasem dokumentu. Na przykład, jeżeli dokument z ID 1 ma alias "wprowadzenie" i prefiks nie jest ustawiony (pusty) oraz sufiks na ".html", ustawiając tę opcję na "tak" otrzymamy "wprowadzenie.html". Jeżeli nie będzie aliasu, EVO wygeneruje "1.html" jako odsyłacz.';
$_lang["friendly_alias_title"] = 'Używaj aliasów URL';
$_lang["friendlyurls_message"] = 'Opcja ta pozwala na używanie przyjaznych dla wyszukiwarek adresów URL z EVO. Proszę zwrócić uwagę, że opcja ta działa jedynie dla instalacji EVO na serwerze Apache i wymaga odpowiednio przygotowanego pliku .htaccess. Zapoznaj się z plikiem .htaccess zawartym w dystrybucji, aby uzyskać dodatkowe informacje.';
$_lang["friendlyurls_title"] = 'Włącz przyjazny URL';
$_lang["friendlyurlsprefix_message"] = 'Opcja ta umożliwia określenie prefiksu dla przyjaznych adresów URL. Na przykład, prefiks ustawiony na \'strona\' zmieni adres URL /index.php?id=2 na przyjazny adres URL /strona2.html (zakładając, że sufiks jest ustawiony na .html). W ten sposób możesz określić co użytkownicy (i wyszukiwarki) widzą jako odsyłacze na Twojej stronie.';
$_lang["friendlyurlsprefix_title"] = 'Prefiks URL';
$_lang["friendlyurlsuffix_message"] = 'Opcja ta umożliwia określenie sufiksu dla przyjaznych adresów URL. Ustawienie \'.html\' doda .html do wszystkich przyjaznych adresów URL.';
$_lang["friendlyurlsuffix_title"] = 'Sufiks URL';
$_lang["functionnotimpl"] = 'Przepraszam!';
$_lang["functionnotimpl_message"] = 'Ta funkcja nie została jeszcze zaimplementowana.';
$_lang["further_info"] = 'Pozostałe informacje';
$_lang["global_tabs"] = 'Global Tabs';
$_lang["go"] = 'Dalej';
$_lang["group_access_permissions"] = 'Dostęp grup użytkowników';
$_lang['group_tvs'] = 'Grupowanie Zmiennych Szablonu';
$_lang["guid"] = 'GUID';
$_lang["help"] = 'Pomoc';
$_lang["help_msg"] = '<p>Możesz uzyskać darmową pomoc poprzez <a href="http://forums.modx.com/" target="_blank">odwiedzenie Forum EVO</a>. Istnieje również wciąż rozwijana <a href="http://evolution-docs.com" target="_blank">Dokumentacja i Instrukcje dla EVO</a>, dotyczące praktycznie wszystkich aspektów pracy z EVO.</p><p>Planujemy również usługę wsparcia komercyjnego dla EVO. <a href="mailto:dmi3yy@evo.im?subject=EVO Commercial Support Inquiry">Zainteresowanych prosimy o kontakt mailowy</a>.</p>';
$_lang["help_title"] = 'Pomoc';
$_lang["hide_tree"] = 'Ukryj drzewo';
$_lang["home"] = 'Start';

$_lang["icon"] = 'Ikona';
$_lang["icon_description"] = 'Klasa CSS np. fa&nbsp;fa-star';
$_lang["id"] = 'ID';
$_lang["illegal_parent_child"] = 'Przypisanie nadrzędne:\n\nDokument jest dzieckiem wybranego dokumentu.';
$_lang["illegal_parent_self"] = 'Przypisanie nadrzędne:\n\nWybrany dokument nie może być przypisany do samego siebie.';
$_lang["images_management"] = 'Zarządzaj obrazami';
$_lang["import_files_found"] = '<b>Znaleziono %s dokumentów do importu...</b><p />';
$_lang["import_params"] = 'Importuj parametry udostępniane przez moduł';
$_lang["import_params_msg"] = 'Możesz zaimportować parametry i ustawienia modułu wybierając nazwę modułu z menu rozwijalnego.<br /><b>Uwaga:</b> Aby moduł pojawił się na liści ta wtyczka/snippet musi być częścią listy zależności modułu oraz moduł musi mieć włączone udostępnianie parametrów. ';
$_lang["import_parent_resource"] = 'Dokument nadrzędny:';
$_lang["update_tree"] = 'Odbuduj drzewo';
$_lang["update_tree_description"] = '<ul>
<li>Closure table database design pattern that makes working with the document tree more convenient and fast </li>
<li>If the data in the tree is updated not through models, then there is a possibility of an incorrect linking of documents in the database </li>
<li>This operation fixes the problem when site_content is not updated through the model (save, create) and the links (Closure table) are not updated </li>
<li>It is also possible to perform this operation in CLI mode via the \'php artisan closuretable: rebuild\' command </li>
</ul>';
$_lang["update_tree_danger"] = 'If you have more than 1000 resources, it is better to perform this operation in CLI mode using the \'php artisan closuretable: rebuild command\'';
$_lang["update_tree_time"] = 'Rebuild tree finished. Documents processed: <b>%s</b><br>Import took <b>%s</b> seconds to complete.';
$_lang["info"] = 'Info';
$_lang["information"] = 'Informacja';
$_lang["inline"] = 'Inline';
$_lang["insert"] = 'Wstaw';
$_lang["maxImageWidth"] = 'Maksymalna szerokość obrazu';
$_lang["maxImageHeight"] = 'Maksymalna wysokość obrazu';
$_lang["clientResize"] = 'Zmień rozmiar obrazów po stronie użytkownika';
$_lang["clientResize_message"] = 'Gdy włączone, rozmiar obrazów zostanie zmieniony przez przeglądarkę, przed wysłaniem na serwer';
$_lang["noThumbnailsRecreation"] = 'Generuj miniaturki tylko podczas wysyłania';
$_lang["noThumbnailsRecreation_message"] = 'Przeglądarka plików EVO stworzy miniaturki tylko podczas wysyłania; Jeśli  niektóre pliki nie mają miniaturek, miniaturki dla nich nie zostaną stworzone';
$_lang["thumbWidth"] = 'Maksymalna szerokość miniatury';
$_lang["thumbHeight"] = 'Maksymalna wysokość miniatury';
$_lang["thumbsDir"] = 'Położenie katalogu miniatur';
$_lang["jpegQuality"] = 'Kompresja JPEG';
$_lang["denyZipDownload"] = 'Wyłącz pobieranie archiwów ZIP';
$_lang["denyExtensionRename"] = 'Wyłącz zmienianie rozszerzeń plików';
$_lang["maxImageWidth_message"] = 'Jeśli rozdzielczość załadowanego obrazu przekracza to ustawienie, obraz zostanie automatycznie zmniejszony. Ustaw na 0 aby tego uniknąć.';
$_lang["maxImageHeight_message"] = 'Jeśli rozdzielczość załadowanego obrazu przekracza to ustawienie, obraz zostanie automatycznie zmniejszony. Ustaw na 0 aby tego uniknąć.';
$_lang["thumbWidth_message"] = 'Maksymalna szerokość miniatury.';
$_lang["thumbHeight_message"] = 'Maksymalna wysokość miniatury.';
$_lang["thumbsDir_message"] = 'Nazwa katalogu miniatur.';
$_lang["jpegQuality_message"] = 'Jakość kompresji JPEG dla miniatur oraz zmniejszonych obrazów';
$_lang["showHiddenFiles"] = 'Pokaż ukryte pliki w eksploratorze plików';
$_lang["keyword"] = 'Słowo kluczowe';
$_lang["keywords"] = 'Słowa kluczowe';
$_lang["keywords_intro"] = 'Aby edytować słowo kluczowe wpisz nowe słowo w polu tekstowym obok słowa, które chcesz zmienić. Aby usunąć słowo kluczowe, zaznacz pole \'usuń\' dla danego słowa. Jeśli zaznaczysz pole usunięcia i zmienisz nazwę pola zostanie ono usunięte!';
$_lang["language_message"] = 'Wybierz język dla Menedżera EVO.';
$_lang["language_title"] = 'Język Managera';
$_lang["last_update"] = 'Ostatnia aktualizacja';
$_lang["launch_site"] = 'Uruchom stronę';
$_lang["license"] = 'Licencja';
$_lang["link_attributes"] = 'Atrybuty linku';
$_lang["link_attributes_help"] = 'Tu możesz wprowadzić atrybuty łącza, takie jak rel= lub href=.';
$_lang["list_mode"] = 'Włącz/wyłącz tryb listy - używany to wyświetlenia listy wszystkich rekordów w tabeli.';
$_lang["loading_doc_tree"] = 'Ładowanie drzewa dokumentów...';
$_lang["loading_menu"] = 'Ładowanie menu...';
$_lang["loading_page"] = 'Proszę czekać, EVO ładuje stronę...';
$_lang["localtime"] = 'Czas lokalny';

$_lang["lock_htmlsnippet"] = 'Zablokuj możliwość edycji chunka';
$_lang["lock_htmlsnippet_msg"] = 'Tylko Administrator (ID Roli 1) może edytować tego chunka.';
$_lang["lock_module"] = 'Blokada modułu do edycji';
$_lang["lock_module_msg"] = 'Tylko Administratorzy (ID Roli 1) mogą edytować ten moduł.';
$_lang["lock_msg"] = '%s w tej chwili edytuje %s. Proszę poczekać, aż inny użytkownik zakończy i spróbować ponownie.';
$_lang["lock_plugin"] = 'Zablokuj możliwość edycji pluginu';
$_lang["lock_plugin_msg"] = 'Tylko administrator (ID Roli 1) może edytować tą wtyczkę.';
$_lang["lock_settings_msg"] = '%s w tej chwili edytuje te ustawienia. Proszę poczekać, aż inny użytkownik zakończy i spróbować ponownie.';
$_lang["lock_snippet"] = 'Zablokuj możliwość edycji snippetu';
$_lang["lock_snippet_msg"] = 'Tylko administratorzy (ID roli 1) mogą edytować ten snippet.';
$_lang["lock_template"] = 'Zablokuj możliwość edycji szablonu';
$_lang["lock_template_msg"] = 'Tylko administratorzy (ID roli 1) mogą edytować ten szablon.';
$_lang["lock_tmplvars"] = 'Blokada zmiennej do edycji';
$_lang["lock_tmplvars_msg"] = 'Tylko Administratorzy (ID Roli 1) mogą edytować tą zmienną.';
$_lang["locked"] = 'Zablokowany';

$_lang["login_allowed_days"] = 'Dozwolone dni';
$_lang["login_allowed_days_message"] = 'Wybierz dni, w które użytkownik może się logować.';
$_lang["login_allowed_ip"] = 'Dozwolone adresy IP';
$_lang["login_allowed_ip_message"] = 'Wprowadź adresy IP z których też użytkownik może się logować. <b>Uwaga: oddziel kilka adresów przecinkiem (,)</b>';
$_lang["login_button"] = 'Zaloguj';
$_lang["login_cancelled_install_in_progress"] = 'W tej chwili trwa instalacja/aktualizacja tego serwisu.<br />Spróbuj ponownie za kilka minut!<br />';
$_lang["login_cancelled_site_was_updated"] = 'Instalacja/aktualizacja tego serwisu została zakończona, zaloguj się ponownie!<br />';
$_lang["login_captcha_message"] = ' Administrator włączył walidację kodów Captcha, więc będziesz musiał także wprowadzić kod bezpieczeństwa. Jeśli masz problem z odczytaniem kodu, kliknij na nim w celu wygenerowania nowego.';
$_lang["login_homepage"] = 'Strona po zalogowaniu';
$_lang["login_homepage_message"] = 'Wprowadź ID dokumentu, który chcesz pokazać użytkownikowi po jego zalogowaniu. <b>Uwaga! Upewnij się, że ID, które wprowadziłeś jest przypisane do istniejącego dokumentu oraz, że jest opublikowane i dostępne dla danego użytkownika!</b>';
$_lang["login_message"] = 'Proszę podać swoje dane uwierzytelniające, aby się zalogować. Podając nazwę użytkownika oraz hasło zwróć szczególną uwagę na wielkość znaków!';
$_lang["logo_slogan"] = 'EVO System Zarządzania Treścią - \nTwórz więcej robiąc mniej';
$_lang["logout"] = 'Wyloguj się';
$_lang["long_title"] = 'Długi tytuł';

$_lang["manager"] = 'Menedżer';
$_lang["manager_lockout_message"] = 'Jesteś obecnie zalogowany do Menadżera treści. W celu zakończenia sesji kliknij przycisk "Wyloguj". Aby przejść do strony głównej, kliknij przycisk "Start".';
$_lang["manager_permissions"] = 'Uprawnienia Menedżera';
$_lang["manager_theme"] = 'Motyw Managera';
$_lang["manager_theme_message"] = 'Wybierz motyw panelu administracji.';
$_lang["manager_theme_mode"] = 'Schemat kolorów';
$_lang["manager_theme_mode1"] = 'Wszystko jasne';
$_lang["manager_theme_mode2"] = 'Ciemna nawigacja';
$_lang["manager_theme_mode3"] = 'Ciemna nawigacja i drzewo zasobów';
$_lang["manager_theme_mode4"] = 'Wszystko ciemne';
$_lang['manager_theme_mode_message'] = 'Ustawienie jest traktowane jako domyślne i może być ominięte, gdy użyto przycisku zmiany motywu w drzewie zasobów: <i class="fa fa-lg fa-adjust"></i>';
$_lang['manager_theme_mode_title'] = 'Motyw kolorystyczny';

$_lang["meta_keywords"] = 'Słowa kluczowe';
$_lang["metatag_intro"] = 'Na tej stronie możesz tworzyć, dodawać, edytować i usuwać META tagi. Aby przypisać META tagi do dokumentów, kliknij na zakładce \'META słowa kluczowe\' podczas edycji dokumentu i wybierz potrzebne META tagi i słowa kluczowe. Aby dodać nowy tag wprowadź jego nazwę i wartość, a następnie kliknij przycisk \'Dodaj tag\'. Aby edytować tag kliknij jego nazwę na liście.';
$_lang["metatag_notice"] = 'Możesz odwiedzić stronę <a href="http://www.html-reference.com/META.asp" target="_blank">HTML Reference Guide</a>, aby uzyskać więcej informacji. To nie jest kompletna lista META tagów.';
$_lang["metatags"] = 'Tagi META';
$_lang["mgr_access_permissions"] = 'Uprawnienia dostępu menedżera';
$_lang["mgr_login_start"] = 'Dokument startowy dla Menedżera';
$_lang["mgr_login_start_message"] = 'Wprowadź ID dokumentu, który chcesz wyświetlić po zalogowaniu do panelu administracyjnego. <b>Upewnij się, że istnieje dokument o podanym ID, oraz że jest opublikowany i dostępny dla danego użytkownika!</b>';

$_lang["mgrlog_action"] = 'Akcja';
$_lang["mgrlog_actionid"] = 'ID akcji';
$_lang["mgrlog_anyall"] = 'Dowolne/wszystkie';
$_lang["mgrlog_datecheckfalse"] = 'checkdate() zwróciła fałsz';
$_lang["mgrlog_datefr"] = 'Data od';
$_lang["mgrlog_dateinvalid"] = 'Nieprawidłowy format daty.';
$_lang["mgrlog_dateto"] = 'Data do';
$_lang["mgrlog_emptysrch"] = 'Zapytanie nie zwróciło żadnych wyników spełniających podane kryteria.';
$_lang["mgrlog_field"] = 'Pole';
$_lang["mgrlog_itemid"] = 'ID rzeczy';
$_lang["mgrlog_itemname"] = 'Nazwa rzeczy';
$_lang["mgrlog_msg"] = 'Komunikat';
$_lang["mgrlog_noquery"] = 'Nie wprowadzono jeszcze żadnych kryteriów zapytania.';
$_lang["mgrlog_qresults"] = 'Wyniki zapytania';
$_lang["mgrlog_query"] = 'Kryteria przeglądania';
$_lang["mgrlog_query_msg"] = 'Wprowadź kryteria przeglądania dziennika. Możesz wybrać wpisy wg daty, ale miej na uwadze, że wprowadzone daty nie są zawierane - aby wybrać wszystkie wpisy z 01-01-2004, ustaw "datę od" na 01-01-2004, a "datę do" na 02-01-2004.<br /><br />Komunikat i Akcja z reguły są takie same. Jeżeli szukasz konkretnego komunikatu, najlepiej ustaw akcję na "Dowolne/wszystkie".';
$_lang["mgrlog_results"] = 'Ilość wyników';
$_lang["mgrlog_searchlogs"] = 'Szukaj w dzienniku';
$_lang["mgrlog_sortinst"] = 'Możesz posortować tabelę klikając nagłówki kolumn. Jeżeli dziennik staje się zbyt obszerny, możesz go <a href="index.php?a=55">opróżnić</a>. Usunie to wszystkie wpisy aż do chwili obecnej. Tej czynności nie można cofnąć!';
$_lang["mgrlog_time"] = 'Data';
$_lang["mgrlog_user"] = 'Użytkownik';
$_lang["mgrlog_username"] = 'Nazwa użytkownika';
$_lang["mgrlog_value"] = 'Wartość';
$_lang["mgrlog_view"] = 'Dziennik menadżera';

$_lang["modx_news"] = 'EVO Powiadomienia';
$_lang["modx_news_tab"] = 'Wiadomości';
$_lang["modx_news_title"] = 'Wiadomości';
$_lang["modx_security_notices"] = 'EVO Powiadomienia bezpieczeństwa';
$_lang["modx_version"] = 'Wersja EVO';

$_lang["name"] = 'Nazwa użytkownika';

$_lang["no"] = 'Nie';
$_lang["no_active_users_found"] = 'Nie znaleziono aktywnych użytkowników.';
$_lang["no_activity_message"] = 'Jeszcze nie utworzyłeś lub edytowałeś żadnego dokumentu.';
$_lang["no_category"] = 'bez kategorii';
$_lang["no_docs_pending_publishing"] = 'Brak dokumentów oczekujących na publikację.';
$_lang["no_docs_pending_pubunpub"] = 'Brak wydarzeń';
$_lang["no_docs_pending_unpublishing"] = 'Brak dokumentów przeznaczonych do zamknięcia publikacji';
$_lang["no_edits_creates"] = 'Nie znaleziono żadnych edycji ani utworzeń.';
$_lang["no_groups_found"] = 'Nie znaleziono grup.';
$_lang["no_keywords_found"] = 'Obecnie nie ma słów kluczowych.';
$_lang["no_records_found"] = 'Nie znaleziono rekordów.';
$_lang["no_results"] = 'Brak wyników';
$_lang["nologentries_message"] = 'Wprowadź liczbę wpisów dziennika pokazywanych na stronie w trakcie przeglądania Audytu (Dziennika kontroli).';
$_lang["nologentries_title"] = 'Liczba wpisów dziennika';
$_lang["none"] = 'Brak';
$_lang["noresults_message"] = 'Podaj liczbę wyników wyświetlanych na listach i w wynikach wyszukiwania.';
$_lang["noresults_title"] = 'Liczba wyników';
$_lang["not_deleted"] = 'nie został skasowany.';
$_lang["not_set"] = 'Nieustawione';

$_lang["offline"] = 'Offline';

$_lang["online"] = 'Online';
$_lang["onlineusers_action"] = 'Akcja';
$_lang["onlineusers_actionid"] = 'ID akcji';
$_lang["onlineusers_ipaddress"] = 'Adres IP';
$_lang["onlineusers_lasthit"] = 'Ostatnio odwiedzone';
$_lang["onlineusers_message"] = 'Użytkownicy aktywni w ostatnich 20 minutach (';
$_lang["onlineusers_title"] = 'Zalogowani użytkownicy';
$_lang["onlineusers_user"] = 'Nazwa użytkownika';
$_lang["onlineusers_userid"] = 'ID Użytkownika';

$_lang["optimize_table"] = 'Kliknij tutaj, aby zoptymalizować tabelę';

$_lang["page_data_alias"] = 'Alias';
$_lang["page_data_cacheable"] = 'Włącz cache';
$_lang["page_data_cacheable_help"] = 'Zaznaczenie tego pola pozwoli na zapisywanie tego dokumentu w cache\'u. Jeśli dokument zawiera snippety, upewnij się że pole jest odznaczone.';
$_lang["page_data_cached"] = '<b>Źródło pobrane z cache\'u:</b>';
$_lang["page_data_changes"] = 'Zmiany';
$_lang["page_data_contentType"] = 'Typ zawartości';
$_lang["page_data_contentType_help"] = 'Wybierz typ zawartości dla tego dokumentu. Jeśli nie jesteś pewien jaki typ powinien posiadać dokument pozostaw text/html.';
$_lang["page_data_created"] = 'Utworzono';
$_lang["page_data_edited"] = 'Edytowano';
$_lang["page_data_editor"] = 'Używaj edytora wizualnego';
$_lang["page_data_folder"] = 'Dokument jest folderem';
$_lang["page_data_general"] = 'Ogólne';
$_lang["page_data_markup"] = 'Znacznik/ struktura';
$_lang["page_data_mgr_access"] = 'Dostęp menedżera';
$_lang["page_data_notcached"] = 'Ten dokument nie został (jeszcze) zcacheowany.';
$_lang["page_data_publishdate"] = 'Data publikacji';
$_lang["page_data_publishdate_help"] = 'Jeśli ustawisz datę publikacji, dokument zostanie opublikowany tak szybko jak data zostanie osiągnięta. Kliknij na ikonie kalendarza, aby wybrać datę lub na ikonie obok niej, aby usunąć datę publikacji. Usunięcie tej daty będzie oznaczało, że dokument nie będzie automatycznie opublikowany.';
$_lang["page_data_published"] = 'Opublikowano';
$_lang["page_data_searchable"] = 'Wyszukiwalny';
$_lang["page_data_searchable_help"] = 'Zaznaczenie tego pola pozwoli na wyszukiwanie tego dokumentu. Możesz je również wykorzystać do innych celów w swoich snippetach.';
$_lang["page_data_source"] = 'Źródło';
$_lang["page_data_status"] = 'Status';
$_lang["page_data_template"] = 'Szablon';
$_lang["page_data_template_help"] = 'W tym miejscu możesz wybrać jakiego szablonu będzie używał ten dokument.';
$_lang["page_data_title"] = 'Dane strony';
$_lang["page_data_unpublishdate"] = 'Koniec publikacji';
$_lang["page_data_unpublishdate_help"] = 'Jeśli ustawisz datę zamknięcia publikacji, publikacja dokumentu zostanie zakończona po osiągnięciu wskazanej daty. Kliknij na ikonie kalendarza, aby wybrać datę lub na ikonie obok niej, aby usunąć datę zamknięcia publikacji. Usunięcie tej daty będzie oznaczało, że publikacja dokumentu nie będzie automatycznie zamykana.';
$_lang["page_data_unpublished"] = 'Publikacja zamknięta';
$_lang["page_data_web_access"] = 'Dostęp web';

$_lang["pagetitle"] = 'Tytuł dokumentu';
$_lang["pagination_table_first"] = 'Pierwsza';
$_lang["pagination_table_gotopage"] = 'Idź do strony';
$_lang["pagination_table_last"] = 'Ostatnia';
$_lang["paging_first"] = 'pierwsza';
$_lang["paging_last"] = 'ostatnia';
$_lang["paging_next"] = 'następna';
$_lang["paging_prev"] = 'poprzednia';
$_lang["paging_showing"] = 'Pokazuję';
$_lang["paging_to"] = 'do';
$_lang["paging_total"] = 'wszystkich';
$_lang["parameter"] = 'Parametr';
$_lang["parse_docblock"] = 'Przetwórz DocBlock';
$_lang["parse_docblock_msg"] = 'Uwaga (!): To <b>zresetuje</b> nazwę, konfigurację, opis oraz kategorię do wartości domyślnych poprzez ponowne skanowanie kodu źródłowego.';

$_lang["password"] = 'Hasło';
$_lang["password_change_request"] = 'Żądanie zmiany hasła';
$_lang["password_confirmed"] = 'Passwords doesn\'t match';
$_lang["password_gen_gen"] = 'Pozwól EVO wygenerować hasło.';
$_lang["password_gen_length"] = 'Hasło, które podałeś musi mieć przynajmniej 6 znaków.';
$_lang["password_gen_method"] = 'Metoda generowania nowego hasła';
$_lang["password_gen_specify"] = 'Pozwól mi wprowadzić hasło:';
$_lang["password_method"] = 'Metoda powiadamiania o haśle';
$_lang["password_method_email"] = 'Wyślij nowe hasło emailem.';
$_lang["password_method_screen"] = 'Pokaż nowe hasło na ekranie.';
$_lang["password_msg"] = 'Nowym hasłem dla <b>:username</b> jest <b>:password</b><br>';

$_lang["php_version_check"] = 'EVO jest kompatybilne z wersją PHP 7.4 i wyższą. Ten serwer używa wersji %s%. Zaktualizuj swoją wersję PHP!';

$_lang["preview"] = 'Podgląd';
$_lang["preview_msg"] = 'To jest podgląd twoich ostatnio zapisanych zmian. Kliknij tutaj aby <a href="javascript:;" onclick="saveRefreshPreview();">zapisać i odświeżyć</a> obecne zmiany';
$_lang["preview_resource"] = 'Podgląd dokumentu';

$_lang["private"] = 'Prywatny';
$_lang["public"] = 'Publiczny';
$_lang["publish_date"] = 'Data publikacji';
$_lang["publish_events"] = 'Wydarzenia publikacji';
$_lang["publish_resource"] = 'Publikuj dokument';

$_lang["rb_base_dir_message"] = 'Wprowadź fizyczną ścieżkę do katalogu zasobów. To ustawienie jest zwykle generowane automatycznie. Może nie działać na serwerze IIS. <b>Uwaga: </b> katalog zasobów musi zawierać podkatalogi: images, files, flash, media aby przeglądarka zasobów działała poprawnie.';
$_lang["rb_base_dir_title"] = 'Ścieżka do plików';
$_lang["rb_base_url_message"] = 'Podaj URL do katalogu zasobów. To ustawienia jest zwykle generowane automatycznie. Może nie działać na serwerze IIS.';
$_lang["rb_base_url_title"] = 'URL przeglądarki plików';
$_lang["rb_message"] = 'Ustaw \'tak\', żeby włączyć przeglądarkę zasobów. Pozwoli to użytkownikom na przeglądanie i ładowanie plików takich jak obrazki, pliki flash, pliki multimedialne na serwer.';
$_lang["rb_title"] = 'Włącz przeglądarkę plików';
$_lang["rb_webuser_message"] = 'Czy chcesz udostępnić użytkownikom web możliwość korzystania z przeglądarki zasobów? <b>UWAGA:</b> Zezwolenie użytkownikom web na korzystanie z przeglądarki zasobów ujawnia dostępne pliki również użytkownikom Menadżera. Zezwalaj na tą możliwość tylko zaufanym użytkownikom web.';
$_lang["rb_webuser_title"] = 'Użytkownicy Web';
$_lang["recent_docs"] = 'Ostatnio używane';
$_lang["recommend_setting_change_title"] = 'Rekomendowana zmiana ustawień';
$_lang["recommend_setting_change_description"] = 'Strona nie została skonfigurowana aby walidować nagłówki HTTP_REFERER. Zalecamy włączenie tej opcji aby zmniejszyć ryzyko ataków CSRF (Cross Site Request Forgery).';
$_lang["references"] = 'Odniesienia';
$_lang["refresh_cache"] = 'Cache: Znaleziono <b>%s</b> plików w katalogu cache i usunięto z niego <b>%d</b> plików.<p>Nowe pliki cache\'u zostaną utworzone podczas wysyłania zapytań o strony.';
$_lang["refresh_published"] = '<b>%s</b> dokument/y/ów zostało opublikowanych.';
$_lang["refresh_site"] = 'Wyczyść cache';
$_lang["refresh_title"] = 'Odśwież stronę';
$_lang["refresh_tree"] = 'Odśwież drzewo';
$_lang["refresh_unpublished"] = '<b>%s</b> dokument/y/ów zostało zdjętych z publikacji.';
$_lang["release_date"] = 'Data wydania';
$_lang["remember_last_tab"] = 'Pamiętaj zakładki';
$_lang["remember_last_tab_message"] = 'Strony menedżera wykorzystujące zakładki wyświetlane będą z ostatnio używaną zakładką zamiast z pierwszą.';
$_lang["remember_username"] = 'Zapamiętaj mnie';
$_lang["remove"] = 'Usuń';
$_lang["remove_date"] = 'Data usunięcia';
$_lang["remove_locks"] = 'Zdejmij blokady';
$_lang["rename"] = 'Zmień nazwę';
$_lang["reports"] = 'Raporty';
$_lang["report_issues"] = 'Zgłaszanie problemów';
$_lang["required_field"] = 'Field :field is required';
$_lang["require_tagname"] = 'Nazwa tagu jest wymagana';
$_lang["require_tagvalue"] = 'Wartość tagu jest wymagana';
$_lang["reserved_name_warning"] = 'Użyłeś zarezerwowanej nazwy.';
$_lang["reset"] = 'Reset';
$_lang["reset_failedlogins"] = 'reset';
$_lang["reset_sort_order"] = 'Resetuj kolejność sortowania';

$_lang["manager_access_permissions"] = 'Manager access permission';
$_lang["manage_groups"] = 'Manage document and user groups';
$_lang["manage_document_permissions"] = 'Manage document permissions';
$_lang["manage_module_permissions"] = 'Manage module permissions';
$_lang["manage_tv_permissions"] = 'Manage TV permissions';

$_lang["rss_url_news_default"] = 'https://github.com/evocms-community/evolution/releases.atom';
$_lang["rss_url_news_message"] = 'Wprowadź URL źródła wiadomości EVO.';
$_lang["rss_url_news_title"] = 'Żródło RSS wiadomości';
$_lang["rss_url_security_default"] = 'https://github.com/extras-evolution/security-fix/releases.atom';
$_lang["rss_url_security_message"] = 'Wprowadź URL powiadomień bezpieczeństwa EVO.';
$_lang["rss_url_security_title"] = 'Źródło RSS bezpieczeństwa';

$_lang["run_module"] = 'Uruchom moduł';
$_lang["save"] = 'Zapisz';
$_lang["save_all_changes"] = 'Zapisz wszystkie zmiany';
$_lang["save_tag"] = 'Zapisz tag';
$_lang["saving"] = 'Trwa zapisywanie, proszę czekać...';

$_lang["search"] = 'Szukaj';
$_lang["search_criteria"] = 'Kryteria wyszukiwania';
$_lang["search_criteria_content"] = 'Szukaj po zawartości';
$_lang["search_criteria_content_msg"] = 'Znajdź wszystkie dokumenty zawierające w zawartości wpisany tekst.';
$_lang["search_criteria_id"] = 'Szukaj po ID';
$_lang["search_criteria_id_msg"] = 'Wpisz ID dokumentu, aby go szybko zlokalizować.';
$_lang["search_criteria_top"] = 'Szukaj w głównych polach';
$_lang["search_criteria_top_msg"] = 'Tytuł, Długi tytuł, Alias, ID';
$_lang["search_criteria_template_id"] = 'Szukaj po ID szablonu';
$_lang["search_criteria_template_id_msg"] = 'Znajdź wszystkie dokumenty używające określonego szablonu.';
$_lang["search_criteria_url_msg"] = 'Znajdź zasób za pomocą dokładnego URL.';
$_lang["search_criteria_longtitle"] = 'Szukaj w długich tytułach';
$_lang["search_criteria_longtitle_msg"] = 'Znajdź wszystkie dokumenty posiadające wyszukiwane słowo w długim tytul.';
$_lang["search_criteria_title"] = 'Szukaj po tytule';
$_lang["search_criteria_title_msg"] = 'Znajdź wszystkie dokumenty zawierające w tytule wpisany tekst.';
$_lang["search_empty"] = 'Twoje wyszukiwanie nie dało żadnych wyników. Rozszerz kryteria wyszukiwania i spróbuj ponownie.';
$_lang["search_item_deleted"] = 'Ta pozycja została usunięta';
$_lang["search_results"] = 'Wyniki wyszukiwania';
$_lang["search_results_returned_desc"] = 'Opis';
$_lang["search_results_returned_id"] = 'ID';
$_lang["search_results_returned_msg"] = 'Twoje kryteria wyszukiwania zwróciły <b>%s</b> dokumentów. Jeżeli wyników wyszukiwania jest bardzo dużo, spróbuj wpisać bardziej szczegółowe kryteria wyszukiwania.';
$_lang["search_results_returned_title"] = 'Tytuł';
$_lang["search_view_docdata"] = 'Zobacz tą pozycję';

$_lang["security"] = 'Użytkownicy ';
$_lang["security_notices_tab"] = 'Powiadomienia bezpieczeństwa';
$_lang["security_notices_title"] = 'Powiadomienia bezpieczeństwa';

$_lang["select_date"] = 'Wybierz datę';
$_lang["send"] = 'Wyślij';
$_lang["server_protocol_http"] = 'http';
$_lang["server_protocol_https"] = 'https';
$_lang["server_protocol_message"] = 'Jeżeli twój serwis używa połączenia https, określ to tutaj.';
$_lang["server_protocol_title"] = 'Typ serwera';
$_lang["serveroffset"] = 'Przesunięcie czasu serwera';
$_lang["serveroffset_message"] = 'Wybierz różnicę czasu pomiędzy lokalizacją Twoją, a serwera. Aktualny czas na serwerze wynosi <b>[%s]</b>, aktualny czas na serwerze z uwzględnieniem różnicy czasu wynosi <b>[%s]</b>.';
$_lang["serveroffset_title"] = 'Różnica czasowa serwera';
$_lang["servertime"] = 'Czas serwera';
$_lang["set_automatic"] = 'Ustaw automatycznie';
$_lang["set_default"] = 'Ustaw domyślne';
$_lang["set_default_all"] = 'Ustaw domyślne';

$_lang["settings_after_install"] = 'Ponieważ jest to nowa instalacja, wymagane jest abyś sprawdził ustawienia i zmienił te, które ci nie odpowiadają. Po sprawdzeniu ustawień, naciśnij \'Zapisz\' aby zaktualizować ustawienia w bazie.';
$_lang["settings_config"] = 'Konfiguracja';
$_lang["settings_dependencies"] = 'Zależności';
$_lang["settings_events"] = 'Zdarzenia systemowe';
$_lang["settings_furls"] = 'Przyjazny URL';
$_lang["settings_general"] = 'Ogólne';
$_lang["settings_group_tv_message"] = 'Wybierz czy Zmienne Szablonu (TV) mają być grupowane w przypisane im kategorie podczas edycji zasobu';
$_lang["settings_group_tv_options"] = 'Nie grupuj,Sekcje w głównej karcie,Karty w głównej karcie,Sekcje w osobnej karcie,Karty w osobnej karcie,Osobne karty';
$_lang["settings_misc"] = 'Pliki';
$_lang["settings_security"] = 'Bezpieczeństwo';
$_lang["settings_KC"] = 'Przeglądarka plików';
$_lang["settings_page_settings"] = 'Ustawienia';
$_lang["settings_photo"] = 'Zdjęcie';
$_lang["settings_properties"] = 'Właściwości';
$_lang["settings_site"] = 'Strona';
$_lang["settings_strip_image_paths_message"] = 'Jeśli wybrano "Nie", EVO będzie tworzyć ścieżki do plików (obrazów, plików, filmów itd.) jako absolutne URL. Z kolei URL relatywne są pomocne gdy np. chcesz przenieść swoje EVO z domeny tymczasowej na docelową. Jeśli nie wiesz co to oznacza, wybierz opcję "Tak".';
$_lang["settings_strip_image_paths_title"] = 'Przepisuj ścieżki przeglądarki';
$_lang["settings_templvars"] = 'Zmienne szablonu';
$_lang["settings_title"] = 'Konfiguracja systemu';
$_lang["settings_ui"] = 'Interfejs i edytor';
$_lang["settings_users"] = 'Użytkownik';
$_lang["settings_email_templates"] = 'E-mail i szablony';

$_lang["show_fullscreen_btn_message"] = 'Pokaż w nawigacji przełącznik pełnego ekranu';
$_lang["show_newresource_btn_message"] = 'Pokaż w nawigacji przycisk nowego zasobu';
$_lang["settings_show_picker_message"] = 'Zmienia wygląd Menedżera i zapisuje w localstorage';
$_lang["show_fullscreen_btn"] = 'Przełącznik pełnego ekranu';
$_lang["show_newresource_btn"] = 'Przycisk nowego zasobu';

$_lang["show_meta"] = 'Pokazuj zakładkę META tagów i słów kluczowych';
$_lang["show_meta_message"] = 'Pokazuj zakładkę META tagów i słów kluczowych podczas edycji dokumentu.';
$_lang["show_tree"] = 'Pokaż drzewo';
$_lang["show_picker"] = 'Pokaż przełącznik kolorów';
$_lang["showing"] = 'Pokazuje';
$_lang["signupemail_message"] = 'Tutaj możesz ustawić treść wiadomości wysyłanej użytkownikom w momencie utworzenia im konta, pozwalającej EVO na wysłanie im e-maila z nazwą użytkownika i hasłem. <br /><b>Uwaga:</b> Następujące zmienne są zamieniane przez Panel Administracyjny kiedy wiadomość jest wysyłana: <br /><br />[+sname+] - Nazwa twojej strony, <br />[+saddr+] - Adres e-mail twojej strony, <br />[+surl+] - Adres url strony, <br />[+uid+] - Nazwa lub Id użytkownika, <br />[+pwd+] - Hasło użytkownika, <br />[+ufn+] - Pełna nazwa użytkownika. <br /><br /><b>Pozostaw [+uid+] i [+pwd+] w treści e-maila, ponieważ w przeciwnym wypadku nazwa użytkownika oraz hasło nie zostanie wysłane w wiadomości i użytkownicy nie poznają swojej nazwy lub hasła!</b>';
$_lang["signupemail_title"] = 'E-mail rejestracyjny';
$_lang["site"] = 'Strona';
$_lang["site_schedule"] = 'Harmonogram strony';
$_lang["sitename_message"] = 'Wprowadź nazwę swojej strony.';
$_lang["sitename_title"] = 'Nazwa strony';
$_lang["sitestart_message"] = 'Podaj ID dokumentu, który ma być stroną główną. <b>UWAGA: upewnij się, że ID należy do istniejącego dokumentu, oraz że dokument jest opublikowany!</b>';
$_lang["sitestart_title"] = 'Strona startowa';
$_lang["sitestatus_message"] = 'Wybierz \'online\' aby opublikować stronę w sieci. Jeśli wybierzesz \'Offline\', użytkownicy zobaczą \'Wiadomość o niedostępności strony\' i nie będą mogli przeglądać strony.';
$_lang["sitestatus_title"] = 'Status strony';
$_lang["siteunavailable_message"] = 'Wiadomość pokazywana w przypadku, gdy strona jest niedostępna lub wystąpił błąd. <b>Uwaga: Wiadomość zostanie pokazana tylko wtedy, gdy nie jest ustawiona opcja Strony niedostępnej.</b>';
$_lang["siteunavailable_message_default"] = 'Strona jest aktualnie niedostępna.';
$_lang["siteunavailable_page_message"] = 'Podaj ID dokumentu, który chcesz użyć gdy strona jest wyłączona. <b>Uwaga! Upewnij się, że ID, które wprowadziłeś jest przypisane do istniejącego dokumentu oraz, że jest opublikowane!</b>';
$_lang["siteunavailable_page_title"] = 'Strona wyłączonego serwisu';
$_lang["siteunavailable_title"] = 'Wiadomość o wyłączonej stronie';
$_lang["controller_namespace"] = 'Controller Namespace';
$_lang["controller_namespace_message"] = 'Specify the full Namespace from which it is worth taking controllers, for example: <b>EvolutionCMS\\Main\\Controllers\\</b>';
$_lang["update_repository"] = 'GitHub repository path';
$_lang["update_repository_message"] = 'Enter GitHub repository path for example: <b>evocms-community/evolution</b>';

$_lang["sort_alphabetically"] = 'Sortuj alfabetycznie';
$_lang["sort_asc"] = 'Rosnąco';
$_lang["sort_desc"] = 'Malejąco';
$_lang["sort_menuindex"] = 'Sortuj pozycje menu';
$_lang["sort_tree"] = 'Sortuj drzewo';
$_lang['sort_updating'] = 'Aktualizowanie...';
$_lang['sort_updated'] = 'Zaktualizowano!';
$_lang['sort_nochildren'] = 'Dokument nie ma żadnych pod-dokumentów';
$_lang["sort_elements_msg"] = 'Przeciągnij aby zmienić kolejność elementów.';

$_lang["source"] = 'Źródło';
$_lang["stay"] = 'Kontynuuj edycję';
$_lang["stay_new"] = 'Dodaj kolejny';
$_lang["submit"] = 'Wyślij';
$_lang["sys_alert"] = 'Alarm systemowy';
$_lang["sysinfo_activity_message"] = 'Ta lista zawiera wykaz dokumentów, które były ostatnio edytowane.';
$_lang["sysinfo_userid"] = 'Użytkownik';
$_lang["system"] = 'System';
$_lang["system_email_signup"] = 'Hello [+uid+]

Here are your login details for [+sname+] Content Manager:

Username: [+uid+]
Password: [+pwd+]

Once you log into the Content Manager ([+surl+]), you can change your password.

Regards,
Site Administrator';
$_lang["system_email_webreminder"] = 'Witaj [+uid+]

Aby uaktywnić nowe hasło kliknij na poniższy link:

[+surl+]

Po zakończeniu możesz użyć następującego hasła do zalogowania się:

Hasło: [+pwd+]

Jeśli nie zgłaszałeś zmiany hasła zignoruj ten e-mail.

Pozdrawiam,
Administrator witryny';
$_lang["system_email_websignup"] = 'Witaj [+uid+]

Poniżej znajdują się szczegóły logowania do strony [+sname+]:

Login: [+uid+]
Hasło: [+pwd+]

Po zalogowaniu do [+sname+] ([+surl+]), możesz zmienić swoje hasło.

Pozdrawiam,
Administrator witryny';
$_lang["table_hoverinfo"] = 'Zatrzymaj kursor myszy nad nazwą tabeli aby zobaczyć krótki opis jej funkcji (nie wszystkie tabele są opatrzone <i>komentarzami</i>.)';
$_lang["table_prefix"] = 'Prefiks tabel';
$_lang["tag"] = 'Tag';

$_lang["to"] = 'do';
$_lang["toggle_fullscreen"] = 'Przełącz pełny ekran';
$_lang["tools"] = 'Narzędzia';
$_lang["top_howmany_message"] = 'Przeglądając raporty, jak duża powinna być lista pierwszych pozycji?';
$_lang["top_howmany_title"] = 'Liczba pierwszych pozycji';
$_lang["total"] = 'razem';
$_lang["track_visitors_message"] = 'Zaznacz aby wyświetlać dokumenty folderów w drzewie';
$_lang["track_visitors_title"] = 'Pokaż dokumenty folderów';
$_lang["tree_page_click"] = 'Po kliknięciu na dokument';
$_lang["tree_page_click_message"] = 'Domyślna akcja wykonywana po kliknięciu na dokument w drzewie dokumentów.';
$_lang["use_breadcrumbs"] = 'Pokaż nawigację';
$_lang["use_breadcrumbs_message"] = 'Pokaż ścieżkę dokumentu podczas tworzenia lub edycji zasobu';
$_lang["tree_show_protected"] = 'Pokazuj chronione dokumenty';
$_lang["tree_show_protected_message"] = 'Kiedy ta opcja jest ustawiona na "Nie", chronione dokumenty (i wszystkie ich dokumenty) nie będą wyświetlane na drzewie dokumentów. "Nie" jest starym ustawieniem dla EVO.';
$_lang["truncate_table"] = 'Kliknij tu, aby skrócić tabelę';
$_lang["type"] = 'Typ';
$_lang["udperms_allowroot_message"] = 'Czy chcesz pozwolić użytkownikom na tworzenie nowych dokumentów/ folderów w głównym folderze serwisu? ';
$_lang["udperms_allowroot_title"] = 'Dostęp do głównego folderu';
$_lang["udperms_message"] = 'Uprawnienia dostępu pozwalają określić, które strony mogą być edytowane przez użytkowników. Wymagane jest przypisanie użytkowników do grup użytkowników, dokumentów do grup dokumentów, wówczas będziesz mógł wskazać, która grupa użytkowników ma dostęp do której grupy dokumentów. Pierwsze włączenie tej opcji spowoduje, że tylko administrator będzie mógł edytować dokumenty.';
$_lang["udperms_title"] = 'Użyj uprawnień dostępu';
$_lang["unable_set_link"] = 'Nie można ustawić łącza!';
$_lang["unable_set_parent"] = 'Nie można ustawić nowego dokumentu nadrzęśdnego!';
$_lang["unauthorizedpage_message"] = 'Wprowadź ID dokumentu, który chcesz pokazać użytkownikowi przy próbie odwołania do zasobu, do którego nie ma dostępu. <b>Uwaga! Upewnij się, że ID, które wprowadziłeś jest przypisane do istniejącego dokumentu oraz, że jest opublikowane i dostępne dla danego użytkownika!</b>';
$_lang["unauthorizedpage_title"] = 'Strona o braku dostępu';
$_lang["unblock_message"] = 'Ten użytkownik nie zostanie zablokowany po zapisaniu jego danych.';
$_lang["undelete_resource"] = 'Przywróć dokument';
$_lang["unpublish_date"] = 'Koniec publikacji';
$_lang["unpublish_events"] = 'Wydarzenia zamknięcia publikacji';
$_lang["unpublish_resource"] = 'Zakończ publikację';
$_lang["untitled_resource"] = 'Dokument bez nazwy';
$_lang["untitled_weblink"] = 'Link bez tytułu';
$_lang["update_params"] = 'Aktualizuj wyświetlanie parametrów';
$_lang["update_settings_from_language"] = 'Zmień na język:';

$_lang["upload_maxsize_message"] = 'Wprowadź maksymalny rozmiar pliku, który może zostać załadowany przez menedżera plików. Wartość musi być podana w bajtach. <b>Uwaga: Ładowanie dużych plików może zająć bardzo dużo czasu!</b>';
$_lang["upload_maxsize_title"] = 'Maksymalny rozmiar pliku';
$_lang["uploadable_files_message"] = 'Tutaj podaj listę typów plików, które mogą zostać załadowane przez menedżera plików. Wprowadź same rozszerzenia oddzielone przecinkami.';
$_lang["uploadable_files_title"] = 'Dozwolone typy plików';
$_lang["uploadable_flash_message"] = 'Tutaj możesz podać listę rozszerzeń plików flash, które można będzie załadować do katalogu \'assets/flash/\' używając Menedżera Zasobów. Podaj listę oddzieloną przecinkami.';
$_lang["uploadable_flash_title"] = 'Dozwolone pliki Flash';
$_lang["uploadable_images_message"] = 'Tutaj możesz podać listę rozszerzeń plików graficznych, które można będzie załadować do katalogu \'assets/images/\' używając Menedżera Zasobów. Podaj listę oddzieloną przecinkami.';
$_lang["uploadable_images_title"] = 'Dozwolone typy obrazów';
$_lang["uploadable_media_message"] = 'Tutaj możesz podać listę rozszerzeń plików multimedialnych, które można będzie załadować do katalogu \'assets/media/\' używając Menedżera Zasobów. Podaj listę oddzieloną przecinkami.';
$_lang["uploadable_media_title"] = 'Dozwolone pliki multimedialne';
$_lang["use_alias_path_message"] = 'Ustawienie tej opcji na \'tak\' spowoduje wyświetlenie pełnej ścieżki do dokumentu, jeśli dokument będzie posiadał alias. Np. jeśli dokument z aliasem \'dziecko\' jest umieszczony w katalogu o aliasie \'rodzic\' wtedy pełny, wyświetlany alias będzie wyglądał tak: \'/rodzic/dziecko.html\'. <br /><b>Uwaga: Po ustawieniu tej opcji na \'tak\' musisz linkować rzeczy (obazki, css, skrypty JS itp.) używając adresów bezwzględnych np. \'/pliki/obrazki\' a nie \'pliki/obrazki\'. W ten sposób zapobiegniesz uzupełnianiu przez przeglądarkę lub serwer przed uzupełnianiem adresów względnych.</b>';
$_lang["use_alias_path_title"] = 'Pełna ścieżka URL';
$_lang["use_editor_message"] = 'Czy chcesz udostępnić edytor RTE? Jeżeli wygodniej ci pisać w HTML, możesz wyłączyć edytor za pomocą tych ustawień. Pamiętaj, że ta opcja dotyczy wszystkich dokumentów i wszystkich użytkowników!';
$_lang["use_editor_title"] = 'Włącz edytor';
$_lang["use_global_tabs"] = 'Użyj Global Tabs';

$_lang["valid_hostnames_message"] = 'Pomóż zapobiegać atakom XSS wykorzystującym ustawienie systemowe site_url. Wprowadź listę prawidłowych nazw hosta dla tej instalacji, oddzielonych przecinkami. Jest to ważne na niektórych typach hostów współdzielonych i hostach dostępnych bezpośrednio pod adresem IP. Pierwsza nazwa hosta na liście zostanie użyta, jeśli HTTP_HOST nie będzie odpowiadał żadnej z prawidłowych nazw hosta na liście.';
$_lang["valid_hostnames_title"] = 'Prawidłowe nazwy hosta';
$_lang["validate_referer_message"] = 'Możesz weryfikować nagłówki HTTP_REFERER aby zmniejszyć ryzyko ataków typu CSRF (Cross Site Request Forgery). Niektóre konfiguracje mogą nie mieć możliwości korzystania z tej opcji, jeżeli serwer nie wysyła nagłówków HTTP_REFERER.';
$_lang["validate_referer_title"] = 'Weryfikuj nagłówki HTTP_REFERER';
$_lang["value"] = 'Wartość';
$_lang["version"] = 'Wersja';
$_lang["view"] = 'Pokaż';
$_lang["view_child_resources_in_container"] = 'Dokumenty w folderze';
$_lang["view_log"] = 'Wyświetl log';
$_lang["view_logging"] = 'Dziennik menadżera';
$_lang["view_sysinfo"] = 'Informacje o systemie';
$_lang["warning"] = 'Ostrzeżenie!';
$_lang["warning_not_saved"] = 'Zmiany, których dokonałeś nie zostały jeszcze zapisane. Możesz pozostać na bieżącej stronie, aby zapisać zmiany (\'Anuluj\') lub opuścić ją, tracąc wszystkie dokonane przez Ciebie zmiany (\'OK\').';
$_lang["warning_visibility"] = 'Widoczność ostrzeżeń konfiguracji';
$_lang["warning_visibility_message"] = 'Pozwala kontrolować wyświetlanie zakładki z ostrzeżeniami związanymi z konfiguracją systemu na stronie powitalnej menedżera';
$_lang["web_access_permissions"] = 'Uprawnienia dostępu web';
$_lang["web_access_permissions_user_groups"] = 'Grupy użytkowników web';
$_lang["web_permissions"] = 'Uprawnienia Web';
$_lang["web_user_management_msg"] = 'Tutaj możesz wybrać, którego użytkownika Web chcesz edytować. Użytkownicy Web to ci użytkownicy, którzy mogą się logować tylko na części frontowej serwisu.';
$_lang["web_user_management_title"] = 'Użytkownicy Web';
$_lang["web_user_management_select_role"] = 'All roles';
$_lang["web_user_title"] = 'Utwórz/edytuj użytkownika web';
$_lang["web_users"] = 'Użytkownicy Web';
$_lang["weblink"] = 'Link';
$_lang["webpwdreminder_message"] = 'Ustaw treść wiadomości z przypomnieniem hasła. Jest ona wysyłana kiedy użytkownik poprosi o przesłanie nowego hasła. System wyśle wiadomość zawierającą nowe hasło i informacje o aktywacji. <br /><b>Uwaga:</b> Poniższe znaczniki zostaną zamienione na tekst przy wysyłaniu wiadomości: <br /><br />[+sname+] - Nazwa Twojej strony, <br />[+saddr+] - Adres e-mail, <br />[+surl+] - URL Twojej strony, <br />[+uid+] - Nazwa lub ID użytkownika, <br />[+pwd+] - Hasło użytkownika, <br />[+ufn+] - Pełna nazwa użytkownika. <br /><br /><b>Pozostaw [+uid+] i [+pwd+] w treści wiadomości, ponieważ w przeciwnym razie użytkownik nie będzie w stanie zalogować się do serwisu!</b>';
$_lang["webpwdreminder_title"] = 'E-mail przypomnienia Web';
$_lang["websignupemail_message"] = 'Tutaj możesz ustawić treść wiadomości wysyłanej użytkownikowi po utworzeniu dla niego nowego konta. Wiadomość będzie zawierać nazwę użytkownika i hasło. <br /><b>Uwaga:</b> Poniższe znaczniki zostaną zamienione na tekst przy wysyłaniu wiadomości: <br /><br />[+sname+] - Nazwa Twojej strony, <br />[+saddr+] - Adres e-mail, <br />[+surl+] - URL Twojej strony, <br />[+uid+] - Nazwa lub ID użytkownika, <br />[+pwd+] - Hasło użytkownika, <br />[+ufn+] - Pełna nazwa użytkownika. <br /><br /><b>Pozostaw [+uid+] i [+pwd+] w treści wiadomości, ponieważ w przeciwnym razie użytkownik nie będzie w stanie zalogować się do serwisu!</b>';
$_lang["websignupemail_title"] = 'E-mail rejestracyjny Web';
$_lang["allow_multiple_emails_title"] = 'Pozwalaj użytkownikom mieć ten sam e-mail';
$_lang["allow_multiple_emails_message"] = 'Pozwala użytkownikom Web korzystać z tego samego adresu e-mail. Uwaga: logika snippetów rejestrowania użytkownika i resetowania hasła, będzie musiała wziąć to ustawienie pod uwagę, jeśli wybrano "Tak".';
$_lang["welcome_title"] = 'Witaj w swoim systemie EVO';
$_lang["which_editor_message"] = 'Tutaj możesz wybrać którego edytora Rich Text (RTE) chcesz używać. Możesz ściągnąć i zainstalować dodatkowe edytory ze strony EVO.';
$_lang["which_editor_title"] = 'Edytor';
$_lang["working"] = 'Przetwarzanie...';
$_lang["wrap_lines"] = 'Zawijaj wiersze';
$_lang["xhtml_urls_message"] = 'Zamienia znaki ampersand (&amp;) w URL generowanych przez EVO na walidujące &amp;<!-- -->amp; htmlentity';
$_lang["xhtml_urls_title"] = 'URL XHTML';
$_lang["yes"] = 'Tak';
$_lang["you_got_mail"] = 'Masz wiadomość';

$_lang["yourinfo_message"] = 'Ta sekcja pokazuje informacje o Tobie:';
$_lang["yourinfo_previous_login"] = 'Ostatnie logowanie:';
$_lang["yourinfo_role"] = 'Twoja rola:';
$_lang["yourinfo_title"] = 'Twoje info';
$_lang["yourinfo_total_logins"] = 'Ilość logowań:';
$_lang["yourinfo_username"] = 'Zalogowany jako:';

$_lang["a17_error_reporting_title"] = 'Poziom wykrywania błędów PHP';
$_lang["a17_error_reporting_msg"] = 'Ustaw poziom wykrywania błędów PHP.';
$_lang["a17_error_reporting_opt0"] = 'Ignoruj wszystko';
$_lang["a17_error_reporting_opt1"] = 'Ignoruj ostrzeżenia niskiego poziomu (<a href="https://www.google.com/search?q=E_DEPRECATED+E_STRICT" target="_blank">E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT</a>)';
$_lang["a17_error_reporting_opt2"] = 'Wykrywaj wszystkie błędy poza E_NOTICE';
$_lang["a17_error_reporting_opt99"] = 'Wykrywaj wszystko';
$_lang["a17_error_reporting_opt199"] = 'Detect all';

$_lang["pwd_hash_algo_title"] = 'Algorytm haszowania';
$_lang["pwd_hash_algo_message"] = 'Algorytm haszowania hasła.';

$_lang["enable_bindings_title"] = 'Włącz komendy @Bindings';
$_lang["enable_bindings_message"] = 'Zapobiega wykonywaniu funkcji PHP poprzez TV @Bindings. Użyteczny gdy istnieją użytkownicy Managera, którzy nie powinni mieć dostępu do tworzenia kodu PHP, ale potrzebują tworzyć lub edytować TV. Wynikiem każdej TV która zawiera @Binding będzie "@Bindings disabled".';
$_lang["enable_filter_title"] = 'Włącz filtry';
$_lang["enable_filter_message"] = 'Filtry pozwalają na manipulowanie pokazywaniem lub przetwarzaniem tagów. Pozwalają zmodyfikować wartości na poziomie szablonu analogicznie jak PHx. <a href="https://github.com/modxcms/evolution/issues/623" target="ext_help">Więcej informacji</a>.'; // todo: change link to documentation
$_lang["enable_filter_phx_warning"] = 'Jeśli wtyczka PHx zostanie wykryta, wbudowane filtry będą domyślnie wyłączone';

$_lang["enable_at_syntax_title"] = 'Włącz &lt;@SYNTAX&gt;';
$_lang["enable_at_syntax_message"] = '&lt;@SYNTAX&gt;(atmark syntax) to prosta i lekka składnia szablonów. Została zaprojektowania aby wziąć pod uwagę współistnienie tagów HTML oraz ciągów danych treści.';

$_lang["bkmgr_alert_mkdir"] = 'Plik nie mógł zostać utworzony w katalogu. Proszę sprawdzić uprawnienia [+snapshot_path+]';
$_lang["bkmgr_restore_msg"] = '<p>Serwis może zostać przywrócony używając pliku SQL.</p>';
$_lang["bkmgr_restore_title"] = 'Przywróć';
$_lang["bkmgr_import_ok"] = 'Przywracanie SQL przebiegło pomyślnie.';
$_lang["bkmgr_snapshot_ok"] = 'Zrzut został zapisany poprawnie.';
$_lang["bkmgr_run_sql_file_label"] = 'Plik SQL';
$_lang["bkmgr_run_sql_direct_label"] = 'Polecenie SQL';
$_lang["bkmgr_run_sql_submit"] = 'Przywróć';
$_lang["bkmgr_run_sql_result"] = 'Wynik';
$_lang["bkmgr_snapshot_title"] = 'Zapisywanie i przywracanie zrzutu';
$_lang["bkmgr_snapshot_msg"] = '<p>Zawartość bazy danych zostanie zapisana na serwerze i w razie potrzeby przywrócona.<br />Miejsce przechowywania: [+snapshot_path+] ($modx->config[\'snapshot_path\'])</p>';
$_lang["bkmgr_snapshot_submit"] = ' Dodaj zrzut';
$_lang["bkmgr_snapshot_list_title"] = 'Lista zrzutów';
$_lang["bkmgr_restore_submit"] = 'Przywróć te dane';
$_lang["bkmgr_restore_confirm"] = 'Czy jesteś pewien, że chcesz przywrócić kopię zapasową\n[+filename+] ?';
$_lang["bkmgr_snapshot_nothing"] = 'Brak zrzutów';

$_lang["files.dynamic.php1"] = 'Nowy plik';
$_lang["files.dynamic.php2"] = 'Ten katalog nie może zostać wyświetlony.';
$_lang["files.dynamic.php3"] = 'Wystąpił problem z nazwą pliku.';
$_lang["files.dynamic.php4"] = 'Plik tekstowy został utworzony.';
$_lang["files.dynamic.php5"] = 'Nie udało się duplikować pliku.';
$_lang["files.dynamic.php6"] = 'Nie udało się zmienić nazwy pliku lub katalogu.';
$_lang["files_dynamic_new_folder_name"] = 'Podaj nazwę nowego katalogu:';
$_lang["files_dynamic_new_file_name"] = 'Podaj nową nazwę pliku:';
$_lang["not_readable_dir"] = 'Nie można odczytać katalogu.';
$_lang["confirm_delete_dir"] = 'Czy na pewno chcesz usunąć ten katalog?';
$_lang["confirm_delete_dir_recursive"] = 'Czy na pewno chcesz usunąć ten katalog?\n\nWszystkie jego pliki również zostaną usunięte.';

$_lang["make_folders_title"] = 'Ukośnik na końcach folderów';
$_lang["make_folders_message"] = 'Ukośnik będzie dodany do dokumentów oznaczonych jako foldery, gdy używa się przyjaznych URL.';

$_lang["check_files_onlogin_title"] = 'Sprawdzaj ważne pliki przy logowaniu';
$_lang["check_files_onlogin_message"] = 'Włączając tę opcję, ważne pliki systemowe będą sprawdzane pod kątem niechcianych modyfikacji typowych dla ataków na stronę www. Chociaż nie jest to 100% zabezpieczenie, to może zaalarmować Cię o zmodyfikowanych plikach EVO.';

$_lang["configcheck_sysfiles_mod"] = 'Ważne pliki systemowe zostały zmienione.';
$_lang["configcheck_sysfiles_mod_msg"] = 'EVO zostało skonfigurowany tak, aby sprawdzać ważne pliki systemowe pod kątem ataków. To ostrzeżenie niekoniecznie oznacza że strona została zaatakowana, jednakże powinno się sprawdzić analizowane pliki (Konfiguracja systemu -> Bezpieczeństwo -> Sprawdzaj ważne pliki przy logowaniu). Jeśli pliki są niezmienione lub utworzone przez administratora, przejdź do Konfiguracji systemu i zapisz ponownie ustawienia. Zmiany wykryto w następujących plikach:';

$_lang['email_method_title'] = 'Metoda wysyłania poczty';
$_lang['email_method_mail'] = 'Funkcja PHP mail()';
$_lang['email_method_smtp'] = 'Serwer SMTP';
$_lang['smtp_auth_title'] = 'SMTP-AUTH';
$_lang['smtp_autotls_title'] = 'SMTPAutoTLS';
$_lang['smtp_host_title'] = 'SMTP host';
$_lang['smtp_secure_title'] = 'Zaszyfrowane SMTP';
$_lang['smtp_username_title'] = 'Nazwa użytkownika SMTP';
$_lang['smtp_password_title'] = 'Hasło SMTP';
$_lang['smtp_port_title'] = 'Port SMTP';

$_lang["setting_resource_tree_node_name"] = 'Nazwa węzła drzewa zasobów';
$_lang["setting_resource_tree_node_name_desc"] = 'Określ pole zasobu, które zostanie użyte w czasie renderowania węzłów w drzewie zasobów. Domyślnie to pagetitle, jednakże każde pole zasobu może zostać wykorzystane np. menutitle, alias.';
$_lang["setting_resource_tree_node_name_desc_add"] = 'Informacja: Od wydania EVO 1.1 możesz zmienić wyświetlaną nazwę w opcjach sortowania drzewa zasobów. To ustawienie jest używane gdy wyświetlana nazwa w drzewie jest ustawiona na &quot;Domyślnie&quot;.';

$_lang["resource_opt_alvisibled"] = 'Uwzględnij alias w URL';
$_lang["resource_opt_alvisibled_help"] = 'Alias tego zasobu zostanie dołączony do ścieżki przyjaznego URL';
$_lang['resource_opt_is_published'] = 'Published';

$_lang["enable_cache_title"] = 'Cache dokumentu';
$_lang["disable_chunk_cache_title"] = 'Disable chunk caching';
$_lang["disable_snippet_cache_title"] = 'Disable snippet caching';
$_lang["disable_plugins_cache_title"] = 'Disable plugins caching';
$_lang["disabled_at_login"] = 'Wyłącz po zalogowaniu';

$_lang["cache_type_title"] = 'Metoda działania cache';
$_lang["cache_type_1"] = 'Cache bazuje tylko na ID zasobu (standardowe)';
$_lang["cache_type_2"] = 'Cache bazuje na ID zasobu oraz parametrach $_GET';
$_lang["seostrict_title"] = 'Używaj SEO Strict URL';
$_lang["seostrict_message"] = 'Jeśli potrzeba, wymuś używanie strict URLs aby zapobiec duplikowaniu treści';

$_lang["alias_listing_title"] = 'Use AliasListing cache';
$_lang["alias_listing_message"] = 'Caching page aliases, have to be disabled if a site have huge amount of resources. "Disabled" reduces memory consumption when site have large number of resources.';
$_lang["alias_listing_disabled"] = 'Disabled';
$_lang["alias_listing_folders"] = 'Only for folders';
$_lang["alias_listing_enabled"] = 'Enabled';

$_lang["settings_friendlyurls_alert"] = 'Aby używać przyjaznych adresów, wymagana jest zmiana nazwy pliku ht.access na .htaccess.';
$_lang["settings_friendlyurls_alert2"] = 'Ponieważ EVO zainstalowano w podkatalogu, wymagana jest zmiana zawartości pliku .htaccess.';

$_lang["mutate_settings.dynamic.php6"] = 'Wyślij e-mail w przypadku błędu EVO';
$_lang["mutate_settings.dynamic.php7"] = 'Nie wysyłaj';
$_lang["mutate_settings.dynamic.php8"] = 'Gdy wystąpi błąd EVO, na adres [(emailsender)] ([+emailsender+]) zostanie wysłana wiadomość. Szczegóły błędu można sprawdzić w Dzienniku zdarzeń.';

$_lang["error_no_privileges"] = "Nie posiadasz wystarczających uprawnień!";
$_lang["error_no_optimise_tablename"] = "Nie znaleziono tabeli do zoptymalizowania w zapytaniu!";
$_lang["error_no_truncate_tablename"] = "Nie znaleziono tabeli do skrócenia w zapytaniu!";
$_lang["error_double_action"] = "Wysłano podwójną akcję (GET & POST)!";
$_lang["error_no_id"] = "Nie przekazano ID w zapytaniu!";
$_lang["error_id_nan"] = "ID przekazane w zapytaniu jest NaN!";
$_lang["error_parent_deleted"] = "Failed because resource parent is deleted!";
$_lang["error_no_parent"] = "Nie znaleziono nazwy dokumentu nadrzędnego!";
$_lang["error_many_results"] = "Baza danych zwróciła zbyt wiele wyników!";
$_lang["error_no_results"] = "Baza danych zwróciła za mało/brak wyników!";
$_lang["error_no_user_selected"] = "Nie wybrano adresata tej wiadomości!";
$_lang["error_no_group_selected"] = "Nie wybrano grupy odbiorców tej wiadomości!";
$_lang["error_movedocument1"] = "Dokument nie może być swoim rodzicem!";
$_lang["error_movedocument2"] = "W zapytaniu nie przekazano ID dokumentu!";
$_lang["error_movedocument3"] = "Nowy rodzic nie został ustawiony w zapytaniu!";
$_lang["error_internet_connection"] = "Serwer jest niedostępny. Sprawdź swoje połączenie z internetem!";

$_lang["login_processor_unknown_user"] = "Podano błędną nazwę użytkownika lub hasło!";
$_lang["login_processor_wrong_password"] = "Podano błędną nazwę użytkownika lub hasło!";
$_lang["login_processor_many_failed_logins"] = "Zostałeś zablokowany z powodu zbyt wielu nieudanych prób zalogowania się!";
$_lang["login_processor_verified"] = "User verification required!";
$_lang["login_processor_blocked1"] = "Zostałeś zablokowany i nie możesz się zalogować!";
$_lang["login_processor_blocked2"] = "Zostałeś zablokowany i nie możesz się zalogować! Proszę spróbować później.";
$_lang["login_processor_blocked3"] = "Jesteś blokowany od określonej daty i nie możesz się zalogować.";
$_lang["login_processor_bad_code"] = "Podany kod bezpieczeństwa nie zgadza się! Proszę spróbować ponownie.";
$_lang["login_processor_remotehost_ip"] = "Twój hostname nie wskazuje na Twoje IP!";
$_lang["login_processor_remote_ip"] = "Nie masz zezwolenia na logowanie z tej lokalizacji.";
$_lang["login_processor_date"] = "Nie masz zezwolenia na logowanie w tej chwili. Proszę spróbować później.";
$_lang["login_processor_captcha_config"] = "Captcha jest źle skonfigurowana.";

$_lang["dp_dayNames"] = "['Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota']";
$_lang["dp_monthNames"] = "['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień']";
$_lang["dp_startDay"] = "1";

$_lang["check_all"] = "Wybierz wszystko";
$_lang["check_none"] = "Żaden";
$_lang["check_toggle"] = "Odwróć zaznaczenie";

$_lang["version_notices"] = "Uwagi do wydania";

$_lang["em_button_shift"] = "(Shift + kliknięcie otwiera w wielu oknach)";

$_lang["reset_sysfiles_checksum_button"] = "Odbuduj sumy kontrolne";
$_lang["reset_sysfiles_checksum_alert"] = "Czy jesteś pewien że chcesz odbudować sumy kontrolne?";

$_lang["file_browser_disabled_msg"] = "Przeglądarka plików nie została włączona.";
$_lang["which_browser_default_title"] = "Domyślna przeglądarka plików";
$_lang["which_browser_default_msg"] = "Wybierz przeglądarkę plików, która ma być domyślna. W ustawieniach użytkownikach możesz ominąć domyślne ustawienie dla danego użytkownika.";
$_lang["which_browser_title"] = "Przeglądarka plików";
$_lang["which_browser_msg"] = "Możesz wybrać inną przeglądarkę plików dla tego użytkownika. Aby użyć ustawień systemowych zostaw wartość &quot;Domyślne&quot;.";
$_lang["option_default"] = "Domyślne";
$_lang["position"] = "Pozycja";
$_lang["are_you_sure"] = "Jesteś pewien?";

$_lang['evo_downloads_title'] = "Pobierania Evolution";
$_lang['help_translating_title'] = "Pomóż przetłumaczyć Evolution";
$_lang['download'] = "Pobierz";
$_lang['downloads'] = "Pobierania";
$_lang["previous_releases"] = "Poprzednie wydania";
$_lang["extras"] = "Extras";

$_lang["display_locks"] = "Wyświetlaj blokady";
$_lang["role_display_locks"] = "Wyświetlaj blokady";
$_lang["session_timeout"] = "Wygaśnięcie sesji";
$_lang["session_timeout_msg"] = "EVO będzie pingować serwer podobnie jak ustawienie &quot;Okres sprawdzania wiadomości&quot;. Jeśli ostatni ping przewyższy ustawienie, powiązana sesja będzie uznana za nieważną i wszystkie powiązane blokady zostaną automatycznie zdjęte. Ustaw wartość w minutach (>2 minuty, domyślnie 15 minut).";
$_lang["unlock_element_id_warning"] = "Czy jesteś pewien że chcesz odblokować ten [+element_type+] (ID [+id+])?";
$_lang["lock_element_type_1"] = "Szablon";
$_lang["lock_element_type_2"] = "Zmienna szablonu";
$_lang["lock_element_type_3"] = "Chunk";
$_lang["lock_element_type_4"] = "Snippet";
$_lang["lock_element_type_5"] = "Wtyczka";
$_lang["lock_element_type_6"] = "Moduł";
$_lang["lock_element_type_7"] = "Zasób";
$_lang["lock_element_type_8"] = "Rola";
$_lang["lock_element_editing"] = "Edytujesz ten [+element_type+] od\n[+lasthit_df+]";
$_lang["lock_element_locked_by"] = "Ten [+element_type+] jest zablokowany przez użytkownika\n[+username+] od [+lasthit_df+]";

$_lang["minifyphp_incache_title"] = 'Zmniejsz kod PHP w cache';
$_lang["minifyphp_incache_message"] = 'Zmniejsz kod PHP (snippetów i wtyczek) i przechowuj go w pliku cache serwisu. Więcej informacji: <a href="https://github.com/modxcms/evolution/issues/938" target="_blank">#938</a>';

$_lang["logout_reminder_msg"] = "Przypomnienie: Wygląda na to że [+date+] zapomniałeś się wylogować. Proszę zwrócić w przyszłości uwagę na to aby poprawnie się wylogować po zakończeniu pracy.";

$_lang["allow_eval_title"] = "Kod PHP eval w snippetach";
$_lang["allow_eval_msg"] = "Dla developerów: Proszę używać \$modx-&gt;safeEval().";
$_lang["allow_eval_with_scan"] = "Wykonuj tylko dozwolone funkcje";
$_lang["allow_eval_with_scan_at_post"] = "Wykonuj wszystko. Jednakże tylko dozwolone funkcje przy POST";
$_lang["allow_eval_everytime_eval"] = "Bez ograniczeń (używaj tylko do debugowania)";
$_lang["allow_eval_dont_eval"] = "Nie zezwalaj na wszystkie funkcje";

$_lang["safe_functions_at_eval_title"] = "Funkcje zezwalające na eval";
$_lang["safe_functions_at_eval_msg"] = "Lista oddzielona przecinkami";

$_lang["multiple_sessions_msg"] = "Informacja: Wykryto wiele aktywnych sesji (w sumie [+total+]) dla użytkownika <b>[+username+]</b>.";
$_lang["iconv_not_available"] = "Ważne jest zainstalowanie/włączenie rozszerzenia iconv. Skontaktuj się się z hostingiem jeśli nie wiesz jak włączyć iconv.";

$_lang["cm_create_new_category"] = "Utwórz nową kategorię";
$_lang["cm_category_name"] = "Nazwa kategorii";
$_lang["cm_category_position"] = "Pozycja kategorii";
$_lang["cm_no_x_assigned"] = "Numer %s przypisany";
$_lang["cm_save_categorization"] = "Zapisz kategoryzację";
$_lang["cm_update_categories"] = "Zaktualizuj kategorie";
$_lang["cm_assigned_elements"] = "Przypisane elementy";
$_lang["cm_edit_name"] = "Edytuj nazwę";
$_lang["cm_mark_for_deletion"] = "Zaznacz do usunięcia";
$_lang["cm_delete_now"] = "Usuń natychmiast";
$_lang["cm_delete_element_x_now"] = "Usuń &quot;%s&quot; natychmiast";
$_lang["cm_select_element_group"] = "Wybierz grupę elementów";
$_lang["cm_global_messages"] = "Wiadomości globalne";
$_lang["cm_add_new_category"] = "Dodaj nową kategorię";
$_lang["cm_edit_categories"] = "Edytuj kategorie";
$_lang["cm_sort_categories"] = "Sortuj kategorie";
$_lang["cm_categorize_elements"] = "Kategoryzuj elementy";
$_lang["cm_translation"] = "Tłumaczenie";
$_lang["cm_translations"] = "Tłumaczenia";
$_lang["cm_categorize_x"] = "Kategoryzuj <span class=\"highlight\">%s</span>";
$_lang["cm_unknown_error"] = "Coś poszło nie tak.";
$_lang["cm_x_assigned_to_category_y"] = "<span class=\"highlight\">%s(%s)</span> został przypisany do kategorii <span class=\"highlight\">%s(%s)</span>";
$_lang["cm_no_categorization"] = "Nie wykonano żadnej kategoryzacji.";
$_lang["cm_no_changes"] = "Nic do zmiany, więc nie wprowadzono żadnych zmian.";
$_lang["cm_x_changes_made"] = "<span class=\"highlight\">%s</span> dokonano zmiany";
$_lang["cm_enter_name_for_category"] = "Proszę wprowadzić nazwę nowej kategorii.";
$_lang["cm_category_x_exists"] = "Kategoria <span class=\"highlight\">%s</span> już istnieje.";
$_lang["cm_category_x_saved_at_position_y"] = "Nowa kategoria <span class=\"highlight\">%s</span> została zapisana na pozycji <span class=\"highlight\">%s</span>.";
$_lang["cm_category_x_moved_to_position_y"] = "Kategoria <span class=\"highlight\">%s</span> została przeniesiona na pozycję <span class=\"highlight\">%s</span>";
$_lang["cm_category_x_deleted"] = "Kategoria <span class=\"highlight\">%s</span> została usunięta";
$_lang["cm_category_x_renamed_to_y"] = "Nazwa kategorii <span class=\"highlight\">%s</span> została zmieniona na <span class=\"highlight\">%s</span>";
$_lang["cm_translation_for_x_empty"] = "Tłumaczenie dla <span class=\"highlight\">%s</span> było puste";
$_lang["cm_translation_for_x_to_y_success"] = "Tłumaczenie z <span class=\"highlight\">%s</span> na <span class=\"highlight\">%s</span> pomyślnie zapisane";
$_lang["cm_save_new_sorting"] = "Zapisz nową kolejność";
$_lang["cm_translate_phrases"] = "Tłumacz frazy";
$_lang["cm_translate_module_phrases"] = "Tłumacz frazy modułu";
$_lang["cm_native_phrase"] = "Fraza natywna";

$_lang["btn_view_options"] = 'Opcje wyświetlania';
$_lang["view_options_msg"] = 'Wyświetlanie i listowanie elementów może zostać dostosowane przez &quot;Opcje wyświetlania&quot;. Ustawienia będą zapisywane i odczytywane z przeglądarki używając HTML5 localStorage.';
$_lang["viewopts_title"] = 'Opcje wyświetlania';
$_lang["viewopts_cb_buttons"] = 'Przyciski';
$_lang["viewopts_cb_descriptions"] = 'Opisy';
$_lang["viewopts_cb_icons"] = 'Ikony';
$_lang["viewopts_radio_list"] = 'Lista';
$_lang["viewopts_radio_inline"] = 'Obok siebie';
$_lang["viewopts_radio_flex"] = 'Flex';
$_lang["viewopts_fontsize"] = 'Rozmiar tekstu';
$_lang["viewopts_cb_alltabs"] = 'Wszystkie karty';

$_lang['email_sender_method'] = 'Nadawca wiadomości';
$_lang['auto'] = 'Wykryj automatycznie';
$_lang['use_emailsender'] = 'Użyj wartości [(emailsender)]';
$_lang['email_sender_method_message'] = 'Nadawca koperty wiadomości. Zwykle zostanie zamieniony na nagłówek Return-Path przez odbiorcę i jest to adres, do którego zostaną wysłane odrzucone wiadomości. Automatyczne wykrywanie będzie działać w większości przypadków.';

$_lang['login_form_position_title'] = 'Pozycja formularza logowania';
$_lang['login_form_position_left'] = 'Lewa strona';
$_lang['login_form_position_center'] = 'Wyśrodkowany';
$_lang['login_form_position_right'] = 'Prawa strona';
$_lang["login_form_style"] = 'Styl formularza logowania';
$_lang["login_form_style_dark"] = 'Ciemny';
$_lang["login_form_style_light"] = 'Jasny';
$_lang['login_logo_title'] = 'Logo strony logowania';
$_lang['login_logo_message'] = 'Zalecana szerokość to 360px i typ pliku PNG';
$_lang['login_bg_title'] = 'Tło strony logowania';
$_lang['login_bg_message'] = 'Zalecana szerokość to 1920px';

$_lang['manager_menu_position_title'] = 'Położenie głównej nawigacji';
$_lang['manager_menu_position_top'] = 'Góra';
$_lang['manager_menu_position_left'] = 'Lewa';

$_lang['invalid_event_response'] = 'Zdarzenie %s ma nieprawidłowy wynik';

$_lang['chunk_processor'] = 'Chunks processing class';

$_lang["permission_title"] = 'Create / edit permission';
$_lang["groups_permission_title"] = 'Create / edit category';
$_lang["lang_key_desc"] = 'Key language from array $_lang';
$_lang["key_desc"] = 'Key for checked permission';

$_lang["setting_from_file"] = '<strong class="text-danger">Parameter value is defined in core/custom/config/cms/settings</strong>';
$_lang['disable'] = 'Disable';
$_lang['enable'] = 'Enable';

return $_lang;
