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

$_lang["about_msg"] = 'Evolution CMS je <a href="https://evo-cms.com/" target="_blank">PHP Framework and systémy správy obsahu</a> licencován pod <a href="https://www.gnu.org/licenses/gpl-3.0.html">GNU GPL</a>.';
$_lang["about_title"] = 'O Evolution CMS';

// days
$_lang["monday"] = 'Pondělí';
$_lang["tuesday"] = 'Úterý';
$_lang["wednesday"] = 'Středa';
$_lang["thursday"] = 'Čtvrtek';
$_lang["friday"] = 'Pátek';
$_lang["saturday"] = 'Sobota';
$_lang["sunday"] = 'Neděle';

// templates
$_lang["template"] = 'Šablona';
$_lang["templates"] = 'Templates';
$_lang['templatecontroller'] = 'Template Controller';
$_lang["template_assignedtv_tab"] = 'Přiřazené Template Variables';
$_lang["template_code"] = 'Kód šablony (html)';
$_lang["template_desc"] = 'Popis';
$_lang["template_edit_tab"] = 'Upravit šablonu';
$_lang["template_inuse"] = 'This template is in use. Please set the documents using the template to another template. Documents using this template:';
$_lang["template_management_msg"] = 'Zde můžete zvolit šablonu, kterou chcete upravit.';
$_lang["template_msg"] = 'Zde můžete vytvářet/upravovat šablony. Nové anebo upravené šablony nebudou viditelné ve stránkach uložených v zásobníku až do jeho vyprázdnění. Můžete použít náhled stránek pro prohlédnutí šablony v činnosti.';
$_lang["template_name"] = 'Název šablony';
$_lang["template_no_tv"] = 'Žádná Template Variables nebyla přiřazena této šabloně.';
$_lang["template_notassigned_tv"] = 'These Template Variables are available for assigning.';
$_lang["template_reset_all"] = 'Vymazat všechny stránky pro použití základní šablony';
$_lang["template_reset_specific"] = 'Vymazat jen "%s" stránky';
$_lang["template_assigned_blade_file"] = 'Odpovídající soubor blade';
$_lang["template_create_blade_file"] = 'Po uložení vytvořte soubor šablony';
$_lang["template_selectable"] = 'Template selectable when creating or editing ressources.';
$_lang["template_title"] = 'Vytvořit/upravit šablonu';
$_lang["template_tv_edit"] = 'Upravit uspořádání Template Variables';
$_lang["template_tv_edit_message"] = 'Změnu pořadí Template Variables pro tuto šablonu je možné určit přetažením.';
$_lang["template_tv_edit_title"] = 'Pořadí Template Variable';
$_lang["template_tv_msg"] = 'Template Variables přiřazené této šabloně jsou uspořádány níže';

// tmplvars
$_lang["tv"] = 'TV';
$_lang["tmplvar"] = 'Template Variable';
$_lang["tmplvars"] = 'Template Variables';
$_lang["tmplvar_access_msg"] = 'Vyberte skupinu dokumentů, kterým bude povoleno měnit obsah nebo hodnotu této proměnné';
$_lang["tmplvar_change_template_msg"] = 'Změna této šablony zapříčiní znovunačtení Template Variables. Všechny neuložené změny budou ztraceny.\n\n Opravdu chcete změnit šablonu?';
$_lang["tmplvar_inuse"] = 'Následující dokument(y) používá(jí) tuto Template Variable. Pro pokračování smazání klikněte na tlačítko Smazat, zrušit mazání můžete pomocí tlačítka Zrušit.';
$_lang["tmplvar_tmpl_access"] = 'Přístup k šabloně';
$_lang["tmplvar_tmpl_access_msg"] = 'Vyberte šablony, které budou přístupné této proměnné';
$_lang["tmplvars_binding_msg"] = 'Toto pole podporuje zdroj dat vázaný na užití @ příkazů';
$_lang["tmplvars_caption"] = 'Hlavička';
$_lang["tmplvars_default"] = 'Původní hodnota';
$_lang["tmplvars_description"] = 'Popis';
$_lang["tmplvars_elements"] = 'Volba hodnoty vstupu';
$_lang["tmplvars_inherited"] = 'Value inherited';
$_lang["tmplvars_management_msg"] = 'Spravovat přidaná pole uživatelského obsahu (Template Variables) vašich dokumentů.';
$_lang["tmplvars_msg"] = 'Zde můžete přidávat a upravovat Template Variables. Každá Template Variable musí být zpřístupněna pro danou šablonu, aby mohla být přístupná, mj. z aktivních prvků a dokumentů, stejně jako jiné proměnné.';
$_lang["tmplvars_name"] = 'Jméno proměnné';
$_lang["tmplvars_novars"] = 'Žádné Template Variables nenalezeny';
$_lang["tmplvars_rank"] = 'Uspořádání';
$_lang["tmplvars_rank_edit_message"] = 'Drag to reorder the Template Variables.';
$_lang["tmplvars_reset_params"] = 'Resetovat parametery';
$_lang["tmplvars_title"] = 'Vytvořit/upravit Template Variable';
$_lang["tmplvars_type"] = 'Typ vstupu';
$_lang["tmplvars_widget"] = 'Výstup';
$_lang["tmplvars_widget_prop"] = 'Možnosti výstupu';
$_lang["role_no_tv"] = 'No Variables have been assigned to this Role yet.';
$_lang["role_notassigned_tv"] = 'These Variables are available for assigning.';
$_lang["role_tv_msg"] = 'The Variables assigned to this Role are listed below.';
$_lang["tmplvar_roles_access_msg"] = 'Select the Roles that are allowed to access/process this Template Variable';

// snippets
$_lang["snippet"] = 'Snippet';
$_lang["snippets"] = 'Snippets';
$_lang["snippet_code"] = 'Kód snippetu (php)';
$_lang["snippet_desc"] = 'Popis';
$_lang["snippet_execonsave"] = 'Provést snippet po uložení.';
$_lang["snippet_management_msg"] = 'Zde můžete zvolit snippet, který chcete upravit.';
$_lang["snippet_msg"] = 'Zde můžete přidávat anebo upravovat snippety. Pamatujte, že snippety jsou \'surové\' php skripty a když očekáváte výstup ze snippetu, který bude ukazovat na některé místo v šabloně, musí vracet hodnutu ze snippetu.';
$_lang["snippet_name"] = 'Název snippetu';
$_lang["snippet_properties"] = 'Výchozí vlastnosti';
$_lang["snippet_title"] = 'Vytvořit/upravit snippet';

// chunks
$_lang["htmlsnippet"] = 'Chunk';
$_lang["htmlsnippets"] = 'Chunks';
$_lang["htmlsnippet_desc"] = 'Popis';
$_lang["htmlsnippet_management_msg"] = 'Zde můžete zvolit chunk, který chcete upravit.';
$_lang["htmlsnippet_msg"] = 'Zde můžete přidávat nebo upravovat chunky. Pamatujte, chunk je \'surový\' HTML kód  nebo též část PHP kódu, který není možné samostatně spustit.';
$_lang["htmlsnippet_name"] = 'Název chunku';
$_lang["htmlsnippet_title"] = 'Tvorba/úprava chunku';
$_lang["chunk"] = 'Chunk';
$_lang["chunk_code"] = 'Kód chunku (html)';
$_lang["chunk_multiple_id"] = 'Chyba: Více Chunků sdílí unikátní ID.';
$_lang["chunk_no_exist"] = 'Chunk neexistuje.';

// plugins
$_lang["plugin"] = 'Plugin';
$_lang["plugins"] = 'Plugins';
$_lang["plugin_code"] = 'Kód pluginu (php)';
$_lang["plugin_config"] = 'Nastavení pluginu';
$_lang["plugin_desc"] = 'Popis';
$_lang["plugin_disabled"] = 'Plugin nepovolen';
$_lang["plugin_event_msg"] = 'Vyberte události, kterým bude tento plugin naslouchat.';
$_lang["plugin_management_msg"] = 'Zde si můžete vybrat, který plugin si přejete upravit.';
$_lang["plugin_msg"] = 'Zde můžete můžete přidat/upravit pluginy. Pluginy jsou "surové" PHP kódy, které se spouštějí při určitých Systémových událostech.';
$_lang["plugin_name"] = 'Název pluginu';
$_lang["plugin_priority"] = 'Upravit pořadí provedení pluginů podle události';
$_lang["plugin_priority_instructions"] = 'Pro změnu pořadí spouštěných Pluginů pro každou událost jej v rámci události přetáhněte. První spouštěný Plugin by měl být nahoře.';
$_lang["plugin_priority_title"] = 'Pořadí spouštěných Pluginů';
$_lang["purge_plugin"] = 'Purge obsolete plugins';
$_lang["purge_plugin_confirm"] = 'Are you sure you want to purge obsolete plugins?';
$_lang["plugin_title"] = 'Vytvořit/upravit plugin';

// categories
$_lang["category"] = 'Category';
$_lang["categories"] = 'Categories';
$_lang["category_heading"] = 'Kategorie';
$_lang["category_manager"] = 'Category Manager';
$_lang["category_management"] = 'Category management';
$_lang["category_msg"] = 'Tady můžete zobrazit a upravit všechny zdroje seskupené do kategorií.';

// file
$_lang["file_delete_file"] = 'Smazat soubor';
$_lang["file_delete_folder"] = 'Smazat složku';
$_lang["file_deleted"] = 'Proběhlo úspěšně!';
$_lang["file_download_file"] = 'Stáhnout soubor';
$_lang["file_download_unzip"] = 'Rozbalit soubor';
$_lang["file_folder_chmod_error"] = 'Není možné změnit práva, musíte změnit práva mimo Evolution CMS.';
$_lang["file_folder_created"] = 'Složka byla úspěšně vytvořena!';
$_lang["file_folder_deleted"] = 'Složka byla úspěšně smazána!';
$_lang["file_folder_not_created"] = 'Nebylo možné vytvořit složku';
$_lang["file_folder_not_deleted"] = 'Nebylo možné smazat složku. Ujistěte se, že je složka prázdná!';
$_lang["file_not_deleted"] = 'Selhalo!';
$_lang["file_not_saved"] = 'Nebylo možné uložit soubor, nastavte prosím přístupová práva, aby bylo možné do cílového adresáře zapisovat!';
$_lang["file_saved"] = 'Soubor byl úspěšně aktualizován!';
$_lang["file_unzip"] = 'Rozbalení bylo úspěšné!';
$_lang["file_unzip_fail"] = 'Rozbalení selhalo!';

// files
$_lang["files"] = 'Files';
$_lang["files_files"] = 'Soubory';
$_lang["files_access_denied"] = 'Přístup zamítnutý!';
$_lang["files_data"] = 'Data';
$_lang["files_dir_listing"] = 'Výpis adresáře:';
$_lang["files_directories"] = 'Adresáře';
$_lang["files_directory_is_empty"] = 'This directory is empty.';
$_lang["files_dirwritable"] = 'Zápis povolen?';
$_lang["files_editfile"] = 'Upravit soubor';
$_lang["files_file_type"] = 'Typ souboru: ';
$_lang["files_filename"] = 'Název';
$_lang["files_fileoptions"] = 'Možnosti';
$_lang["files_filesize"] = 'Velikost souboru';
$_lang["files_filetype_notok"] = 'Nahrání tohoto typu souboru není povoleno!';
$_lang["files_management"] = 'Manage Files';
$_lang["files_management_no_permission"] = 'You do not have enough permissions to view or edit these files. Ask the administrator to grant you access to <b>%s</b>.';
$_lang["files_modified"] = 'Změněno';
$_lang["files_top_level"] = 'Domovský adresář';
$_lang["files_up_level"] = 'Nadřazený adresář';
$_lang["files_upload_copyfailed"] = 'Chyba při kopírování do cílového adresáře - nahrání selhalo!';
$_lang["files_upload_error"] = 'Chyba';
$_lang["files_upload_error0"] = 'Vyskytnul se problém při nahrávání souboru.';
$_lang["files_upload_error1"] = 'Soubor je příliš velký.';
$_lang["files_upload_error2"] = 'Soubor je příliš velký.';
$_lang["files_upload_error3"] = 'Soubor byl nahrán jen částečně.';
$_lang["files_upload_error4"] = 'Nebyl zvolen soubor pro nahrání.';
$_lang["files_upload_error5"] = 'Vyskytnul se problém při nahrávání souboru.';
$_lang["files_upload_inhibited_msg"] = '<b>Do tohoto adresáře se nedají nahrávat soubory</b> - presvěčte se, zda jsou do tohoto adresáře nastavená práva pro zápis.<br />';
$_lang["files_upload_ok"] = 'Soubor byl úspěšně nahrán!';
$_lang["files_upload_permissions_error"] = 'Možný problém s oprávněním - adresář, do kterého chcete nahrávat soubory musí mít povoleno zapisování servrem.';
$_lang["files_uploadfile"] = 'Nahrát soubor';
$_lang["files_uploadfile_msg"] = 'Vybrat soubor pro nahrání:';
$_lang["files_uploading"] = 'Soubor <b>%s</b> nahrávám do adresáře <b>%s/</b><br />';
$_lang["files_viewfile"] = 'Zobrazit soubor';

// modules
$_lang["module"] = 'Module';
$_lang["modules"] = 'Moduly';
$_lang["module_code"] = 'Kód modulu (php)';
$_lang["module_config"] = 'Konfigurace modulu ';
$_lang["module_desc"] = 'Popis';
$_lang["module_disabled"] = 'Modul je zakázaný';
$_lang["module_edit_click_title"] = 'Pro úpravu tohoto modulu klikněte zde';
$_lang["module_group_access_msg"] = 'Zvolte skupiny uživatelů, které mají oprávnění spustit tento modul ve Správci obsahu.';
$_lang["module_management"] = 'Správa modulů';
$_lang["module_management_msg"] = 'Zde můžete zvolit modul, který byste chtěli spustit nebo upravit. Ke spuštění modulu klikněte na ikonu kostky. Pro úpravu modulu klikněte na název modulu.';
$_lang["module_msg"] = 'Zde můžete přidávat/upravovat moduly. Modul je sbírka zdrojů (např. pluginů, snippetů, atd.).';
$_lang["module_name"] = 'Název modulu';
$_lang["module_resource_msg"] = 'Zde můžete přidat nebo odebrat zdroje, na který tento modul závisí. Pro přidání nových zdrojů klikněte na tlačítko přidat.';
$_lang["module_resource_title"] = 'Závislosti modulu';
$_lang["module_title"] = 'Vytvořit/upravit modul';
$_lang["module_viewdepend_msg"] = 'Zde si můžete prohlédnout přiřazené zdroje, které modul požaduje. Klikněte na tlačítko \'Správce závislostí\' k úpravě závislostí';

// elements
$_lang["element"] = 'Zdroj';
$_lang["elements"] = 'Zdroje';
$_lang["element_categories"] = 'Všechny zdroje a moduly';
$_lang["element_filter_msg"] = 'Type here to filter list';
$_lang["element_management"] = 'Správa zdrojů';
$_lang["element_name"] = 'Název zdroje';
$_lang["element_selector_msg"] = 'Vyberte zdroj(e) z níže uvedeného seznamu a klikněte na tlačítko \'Vložit\'.';
$_lang["element_selector_title"] = 'Volič zdrojů';

// resource
$_lang["resource"] = 'Dokument';
$_lang["resource_alias"] = 'Zástupce dokumentu';
$_lang["resource_alias_help"] = 'Zde můžete zvolit zástupce pro tento dokument. Pro lehčí přístup k dokumentu použijte:

http://vase_domena/zastupce

Zástupce bude pracovat jen při aktivování funkce zjednodušených url adres.';
$_lang["resource_content"] = 'Obsah';
$_lang["resource_description"] = 'Popis';
$_lang["resource_description_help"] = 'Sem můžete zadat podrobný popis dokumentu.';
$_lang["resource_duplicate"] = 'Duplikovat dokument';
$_lang["resource_long_title_help"] = 'Zde můžete vložit dlouhý název vašeho dokumentu. Je to vhodné kvůli vyhledávání a mohl by víc charakterizovat váš dokument.';
$_lang["resource_metatag_help"] = 'Vyberte META tagy nebo klíčová slova, která si přejete přiřadit k tomuto dokumentu. Při výběru více klíčových slov nebo META tagů držte zmáčknutou klávesu CTRL.';
$_lang["resource_opt_contentdispo"] = 'Obsah uspořádání';
$_lang["resource_opt_contentdispo_help"] = 'Použít pole \'obsah uspořádání\' k bližšímu určení, jak tento dokument bude ovládán webovým prohlížečem. Pro stažení souboru vyberte volbu Příloha.';
$_lang["resource_opt_emptycache"] = 'Vyprázdnit zásobník?';
$_lang["resource_opt_emptycache_help"] = 'Vyberte tuto položku, jestliže chcete, aby Evolution CMS vyprázdnil zásobník po uložení dokumentu. Vaši návštěvníci tak neuvidí starší verze tohoto dokumentu.';
$_lang["resource_opt_folder"] = 'Složka?';
$_lang["resource_opt_folder_help"] = 'Určete, zda se tento vytvořený dokument bude chovat jako složka dokumentů nebo jako dokument. \'Složka\' může také mít obsah.';
$_lang["resource_opt_menu_index"] = 'Index&nbsp;(řazení)';
$_lang["resource_opt_menu_index_help"] = 'Řazení je funkce, kterou můžete použít pro řazení dokumentů ve Vašem snippetu, vytvářejícím menu. Můžete ho použít i pro další účely, jestliže je bude Váš snippet podporovat.';
$_lang["resource_opt_menu_title"] = 'Nadpis menu';
$_lang["resource_opt_menu_title_help"] = 'Nadpis menu je pole, které mužete použít ke znázornění krátkého nadpisu pro dokumet umístěný ve vašem snipettu menu nebo modulech.';
$_lang["resource_opt_published"] = 'Publikovat?';
$_lang["resource_opt_published_help"] = 'Zatržením této volby bude dokument publikovaný hned po uložení.';
$_lang["resource_opt_richtext"] = 'Externí editor?';
$_lang["resource_opt_richtext_help"] = 'Nechte tuto volbu zatrženou pro použití externího editoru k úpravě dokumentů. Jestliže vaše dokumenty obsahují Javaskripty anebo formuláře, zrušte označení a můžete upravovat dokument v HTML módu.';
$_lang["resource_opt_show_menu"] = 'Zobrazit v menu';
$_lang["resource_opt_show_menu_help"] = 'Výběr této volby zobrazuje dokument v menu. Prosím poznamenejte si, že některé snippety typu Menu Builders mohou mít nastavení, která ignoruje tuto volbu.';
$_lang["resource_opt_trackvisit_help"] = 'Zapisuj přístup každého návštěvníka na tuto stránku';
$_lang["resource_overview"] = 'Přehled dokumentu';
$_lang["resource_parent"] = 'Umístění dokumentu';
$_lang["resource_parent_help"] = 'Klikněte v adresářovém stromě na ikonku složky pro jeho otevření (zavření), a potom na dokument v stromu, který chcete nastavit jako umístění dokumentu.';
$_lang["resource_permissions_error"] = 'Přiřaďte tento dokument alespoň do jedné skupiny dokumentů, kterou můžete používat.';
$_lang["resource_setting"] = 'Nastavení dokumentu';
$_lang["resource_summary"] = 'Souhrn (introtext)';
$_lang["resource_summary_help"] = 'Model stručného souhrnu dokumentu';
$_lang["resource_title"] = 'Nadpis';
$_lang["resource_title_help"] = 'Sem napíšte název anebo titulek dokumentu. Pokuste se vyvarovat použití zpětných lomítek v názvu!';
$_lang["resource_to_be_moved"] = 'Dokument bude přesunut';
$_lang["resource_type"] = 'Typ zdroje';
$_lang["resource_type_message"] = 'Webové odkazy odkazují na internetové zdroje jako Evolution CMS stránky, externí stránky, obrázky nebo jiné soubory na internetu. Webové odkazy by měli obsahovat text/html Internet Media Type a Inline Content-Disposition.';
$_lang["resource_type_weblink"] = 'Webový odkaz';
$_lang["resource_type_webpage"] = 'Webová stránka';
$_lang["resource_weblink_help"] = 'Vložte adresu objektu, na který chcete odkazovat.';
$_lang["resources_in_container"] = 'dokumenty v této složce';
$_lang["resources_in_container_no"] = 'Tato složka nemá potomky';

// role
$_lang["role"] = 'Role';
$_lang["role_about"] = 'Zobrazení informací o stránkách';
$_lang["role_actionok"] = 'Prohlížení dokončené akce na obrazovce';
$_lang["role_assets_images"] = 'Manage assets/images';
$_lang["role_assets_files"] = 'Manage assets/files';
$_lang["role_bk_manager"] = 'Použít správce zálohy';
$_lang["role_cache_refresh"] = 'Vyprázdnit zásobník stránek (cache)';
$_lang["role_category_manager"] = 'Use the Category Manager';
$_lang["role_change_password"] = 'Změna hesla';
$_lang["role_change_resourcetype"] = 'Změnit typ zdroje';
$_lang["role_chunk_management"] = 'Správa chunků';
$_lang["role_config_management"] = 'Správa nastavení';
$_lang["role_content_management"] = 'Správa obsahu';
$_lang["role_create_chunk"] = 'Vytvořit nové chunky';
$_lang["role_create_doc"] = 'Vytvořit nové dokumenty';
$_lang["role_create_plugin"] = 'Vytvořit nové pluginy';
$_lang["role_create_snippet"] = 'Vytvořit nové snippety';
$_lang["role_create_template"] = 'Vytvořit novou šablonu stránek';
$_lang["role_credits"] = 'Zobrazení poděkování';
$_lang["role_delete_chunk"] = 'Smazat chunky';
$_lang["role_delete_doc"] = 'Smazat dokumenty';
$_lang["role_delete_eventlog"] = 'Smazat výpisy událostí';
$_lang["role_delete_module"] = 'Smazat modul';
$_lang["role_delete_plugin"] = 'Smazat pluginy';
$_lang["role_delete_role"] = 'Smazat oprávnění';
$_lang["role_delete_snippet"] = 'Smazat snippety';
$_lang["role_delete_template"] = 'Smazat šablony';
$_lang["role_delete_user"] = 'Smazat uživatele';
$_lang["role_delete_web_user"] = 'Smazat návštěvníka';
$_lang["role_edit_chunk"] = 'Upravit chunky';
$_lang["role_edit_doc"] = 'Upravit dokument';
$_lang["role_edit_doc_metatags"] = 'Upravit META tagy a klíčové slova dokumentu';
$_lang["role_edit_module"] = 'Upravit modul';
$_lang["role_edit_plugin"] = 'Upravit pluginy';
$_lang["role_edit_role"] = 'Upravit oprávnění';
$_lang["role_edit_settings"] = 'Změnit nastavení stránek';
$_lang["role_edit_snippet"] = 'Upravit snippety';
$_lang["role_edit_template"] = 'Upravit šablony stránek';
$_lang["role_edit_user"] = 'Upravit uživatele';
$_lang["role_edit_web_user"] = 'Upravit návštěvníky';
$_lang["role_empty_trash"] = 'Permanentně odstranit smazané dokumenty';
$_lang["role_errors"] = 'Zobrazit chybová hlášení';
$_lang["role_eventlog_management"] = 'Správa výpisu událostí';
$_lang["role_export_static"] = 'Exportovat statické HTML';
$_lang["role_file_management"] = 'File Management';
$_lang["role_file_manager"] = 'Použít správce souborů';
$_lang["role_frames"] = 'Použít rámy správce';
$_lang["role_help"] = 'Zobrazit pomocníka';
$_lang["role_home"] = 'Použít správce úvodní stránky';
$_lang["role_import_static"] = 'Importovat HTML';
$_lang["role_logout"] = 'Odhlásit se ze správce';
$_lang["role_list_module"] = 'List Module';
$_lang["role_manage_metatags"] = 'Upravit META tagy a klíčové slova celého webu';
$_lang["role_management_msg"] = 'Zde můžete zvolit oprávnění, které chcete upravit.';
$_lang["role_management_title"] = 'Oprávnění';
$_lang["role_messages"] = 'Číst a posílat zprávy';
$_lang["role_module_management"] = 'Správa modulů';
$_lang["role_name"] = 'Název oprávnění';
$_lang["role_new_module"] = 'Vytvořit nový modul';
$_lang["role_new_role"] = 'Vytvořit nová oprávnění';
$_lang["role_new_user"] = 'Vytvořit nové užívatele';
$_lang["role_new_web_user"] = 'Vytvořit nového návštěvníka';
$_lang["role_plugin_management"] = 'Správa pluginů';
$_lang["role_publish_doc"] = 'Publikované dokumenty';
$_lang["role_remove_locks"] = 'Odstranit zámky';
$_lang["role_role_management"] = 'Oprávnění';
$_lang["role_run_module"] = 'Spustit modul';
$_lang["role_save_chunk"] = 'Uložit chunky';
$_lang["role_save_doc"] = 'Uložit dokumenty';
$_lang["role_save_module"] = 'Uložit modul';
$_lang["role_save_password"] = 'Uložit heslo';
$_lang["role_save_plugin"] = 'Uložit pluginy';
$_lang["role_save_role"] = 'Uložit oprávnění';
$_lang["role_save_snippet"] = 'Uložit snippety';
$_lang["role_save_template"] = 'Uložit šablony';
$_lang["role_save_user"] = 'Uložit uživatele';
$_lang["role_save_web_user"] = 'Uložit návštěvníky';
$_lang["role_snippet_management"] = 'Správa snippetů';
$_lang["role_template_management"] = 'Správa šablon';
$_lang["role_title"] = 'Tvorba/úprava oprávnění';
$_lang["role_udperms"] = 'Správa práv';
$_lang["role_user_management"] = 'Správa užívatelů';
$_lang["role_view_docdata"] = 'Zobrazit data dokumentu';
$_lang["role_view_eventlog"] = 'Zobrazit výpis událostí';
$_lang["role_view_logs"] = 'Zobrazit systémové výpisy';
$_lang["role_view_unpublished"] = 'Zobrazit nepublikované dokumenty';
$_lang["role_web_access_persmissions"] = 'Webová přístupová práva';
$_lang["role_web_user_management"] = 'Správa návštěvníků';

// user
$_lang["user"] = 'Uživatel';
$_lang["users"] = 'Zabezpečení';
$_lang["user_block"] = 'Blokované';
$_lang["user_blockedafter"] = 'Zablokováno od';
$_lang["user_blockeduntil"] = 'Zablokováno do';
$_lang["user_changeddata"] = 'Vaše data byla změněna. Prosím přihlašte se znovu.';
$_lang["user_country"] = 'Země';
$_lang["user_dob"] = 'Datum narození';
$_lang["user_doesnt_exist"] = 'Uživatel neexistuje';
$_lang["user_edit_self_msg"] = '<b>Pravděpodobně se budete muset odhlásit a přihlásit znovu kvůli kompletní aktualizaci vaších informací.</b><br />Také byste si měli nechat vygenerovat nové heslo a nechat si ho poslat e-mailem.';
$_lang["user_email"] = 'Emailová adresa';
$_lang["user_failedlogincount"] = 'Chybná přihlášení';
$_lang["user_fax"] = 'Fax';
$_lang["user_female"] = 'Žena';
$_lang["user_full_name"] = 'Jméno a příjmení';
$_lang["user_first_name"] = 'First name';
$_lang["user_last_name"] = 'Last Name';
$_lang["user_middle_name"] = 'Middle Name';
$_lang["user_gender"] = 'Pohlaví';
$_lang["user_is_blocked"] = 'Tento uživatel byl zablokován!';
$_lang["user_logincount"] = 'Počet přihlášení';
$_lang["user_male"] = 'Muž';
$_lang["user_management_msg"] = 'Zde můžete zvolit uživatele Správce obsahu, kterého chcete upravit. Uživatelé Správce obsahu jsou takový uživatelé, kteří mají povolené přihlášení do administrační části.';
$_lang["user_management_title"] = 'Správa uživatelů';
$_lang["user_mobile"] = 'Mobil';
$_lang["user_phone"] = 'Telefonní číslo';
$_lang["user_photo"] = 'Fotografie uživatele';
$_lang["user_photo_message"] = 'Vložte URL obrázku uživatele nebo použijte tlačítko "Vložit" k výběru nebo uploadu souboru s obrázkem na server.';
$_lang["user_prevlogin"] = 'Poslední přihlášení';
$_lang["user_role"] = 'Uživatelské oprávnění';
$_lang["no_user_role"] = 'No user role';
$_lang["user_state"] = 'Kraj';
$_lang["user_title"] = 'Vytvořit/upravit uživatele';
$_lang["user_upload_message"] = 'Jestliže si přejete zastavit uživatele v nahrávání jakéhokoli typu souborů v této kategorii, ujistěte se, že zaškrtávací políčko v \'Užít hlavní konfigurační nastavení\' není zatrženo a nechte pole prázdné.';
$_lang["user_use_config"] = 'Užít hlavní konfigurační nastavení';
$_lang["user_verification"] = 'User is verified';
$_lang["user_zip"] = 'PSČ';
$_lang["username"] = 'Uživatel';
$_lang["username_unique"] = 'User name is already in use!';
$_lang["user_street"] = 'Street';
$_lang["user_city"] = 'City';
$_lang["user_other"] = 'Other';

// add
$_lang["add"] = 'Přidat skupinu';
$_lang["add_chunk"] = 'Přidat chunk';
$_lang["add_doc"] = 'Přidat dokument';
$_lang["add_folder"] = 'Nová složka';
$_lang["add_plugin"] = 'Přidat Plugin';
$_lang["add_resource"] = 'Nový dokument';
$_lang["add_snippet"] = 'Přidat snippet';
$_lang["add_tag"] = 'Přidat tag (značku)';
$_lang["add_template"] = 'Přidat šablonu';
$_lang["add_tv"] = 'Přidat TV';
$_lang["add_weblink"] = 'Nový odkaz';

// new
$_lang["new_category"] = 'Nová kategorie';
$_lang["new_file_permissions_message"] = 'Jestliže nahráváte nový soubor ve Správci souborů, bude se Správce souborů snažit změnit atributy souboru podle tohoto nastavení. Toto nastavevní nemusí fungovat v některých případech. Např. u IIS, zde musíte práva nastavit ručně.';
$_lang["new_file_permissions_title"] = 'Atributy nového souboru';
$_lang["new_folder_permissions_message"] = 'Jestliže zakládáte novou složku ve Správci souborů, bude se Správce souborů snažit změnit atributy souboru podle tohoto nastavení. Toto nastavevní nemusí fungovat v některých případech. Např. u IIS, zde musíte práva nastavit ručně.';
$_lang["new_folder_permissions_title"] = 'Atributy nové složky';
$_lang["new_permission"] = 'New Permission';
$_lang["new_htmlsnippet"] = 'Nový chunk';
$_lang["new_keyword"] = 'Přidat nové klíčové slovo:';
$_lang["new_module"] = 'Nový modul';
$_lang["new_parent"] = 'Nový rodič';
$_lang["new_plugin"] = 'Nový plugin';
$_lang["new_role"] = 'Vytvořit nové oprávnění';
$_lang["new_snippet"] = 'Nový snippet';
$_lang["new_template"] = 'Nová šablona';
$_lang["new_tmplvars"] = 'Nová Template Variable';
$_lang["new_user"] = 'Nový uživatel';
$_lang["new_web_user"] = 'Nový návštěvník';
$_lang["new_resource"] = 'Nový dokument';

// manage
$_lang["manage_categories"] = 'Manage Categories';
$_lang["manage_depends"] = 'Správa závislostí';
$_lang["manage_files"] = 'Správa souborů';
$_lang["manage_htmlsnippets"] = 'Manage Chunks';
$_lang["manage_metatags"] = 'Správa META tagů a klíčových slov';
$_lang["manage_modules"] = 'Správa modulů';
$_lang["manage_plugins"] = 'Manage Plugins';
$_lang["manage_snippets"] = 'Manage Snippets';
$_lang["manage_templates"] = 'Manage Templates';
$_lang["manage_documents"] = 'Manage Documents';
$_lang["manage_permission"] = 'Manage Permissions';

// move
$_lang["move"] = 'Přesunout';
$_lang["move_resource"] = 'Přesunout dokument';
$_lang["move_resource_message"] = 'Můžete přesunout dokument a všechny jeho potomky do nového umístění v adresářovém stromu. Jestliže vyberete dokument, který není složkou, bude změněn na složku. Klikněte na nové umístění v adresářovém stromu.';
$_lang["move_resource_new_parent"] = 'Vyberte nové umístění v adresářovém stromu';
$_lang["move_resource_title"] = 'Přesunout dokument';

$_lang["access_permissions"] = 'Přístupová práva';
$_lang["access_permission_denied"] = 'Nemáte potřebná oprávnění pro tento dokument.';
$_lang["access_permission_parent_denied"] = 'Nemáte oprávnění pro vytvoření nebo přesun dokumentu na toto místo! Vyberte jiné umístění.';
$_lang["access_permissions_add_resource_group"] = 'Vytvořit skupinu dokumentů';
$_lang["access_permissions_add_user_group"] = 'Vytvořit skupinu uživatelů';
$_lang["access_permissions_docs_message"] = 'Tady můžete vybrat, ke kterým skupinám dokumentů bude tento dokument patřit';
$_lang["access_permissions_group_link"] = 'Vytvořit propojení skupin';
$_lang["access_permissions_introtext"] = 'Manage the User Groups and Resource Groups used for access permissions. To add a user to a User Group, edit the user and select the groups (s)he should be a member of. To add a Resource to a User Group, edit the Resource and select the groups it should belong to.';
$_lang["access_permissions_link_to_group"] = 'do skupiny dokumentů';
$_lang["access_permissions_context"] = 'in context';
$_lang["access_permissions_link_user_group"] = 'Link User Group';
$_lang["access_permissions_links"] = 'User/Resource Group links';
$_lang["access_permissions_links_tab"] = 'Tady určujete, která skupina užívatelů bude mít přístup, ke které skupině dokumentů (např. můžete měnit nebo vytvořit sdílené dokumenty - potomky). Propojit skupinu dokumentů se skupinou uživatelů uděláte výběrem skupiny z roletového menu a stlačením \'Přidat\'. Tlačítkem \'Odebrat\' propojení obou skupín odstraníte.';
$_lang["access_permissions_no_resources_in_group"] = 'Žádný.';
$_lang["access_permissions_no_users_in_group"] = 'Žádný.';
$_lang["access_permissions_off"] = '<span class="warning">Přístupová práva nejsou aktivována.</span> To znamená, že žádné změny nebudou mít efekt, jestliže přístupová práva neaktivujete v nastavení.';
$_lang["access_permissions_resource_groups"] = 'Skupiny dokumentů';
$_lang["access_permissions_resources_in_group"] = '<b>Dokumenty ve skupině:</b> ';
$_lang["access_permissions_resources_tab"] = 'Tady můžete vidět, které skupiny dokumentů jsou nastavené. Můžete vytvářet nové skupiny, přejmenovávat je, mazat je a procházet, které dokumenty se nacházejí, v kterých skupinách (po přesunu kurzoru myši na ID dokumentu se zobrazí jeho název). Přidat dokument do skupiny nebo ho odstranit se da jen prímou změnou v samotném dokumentu.';
$_lang["access_permissions_user_toggle"] = 'Toggle access permissions';
$_lang["access_permissions_user_groups"] = 'Skupiny návštěvníků';
$_lang["access_permissions_user_message"] = 'Tady můžete zvolit, který uživatel patří, do které skupiny:';
$_lang["access_permissions_users_in_group"] = '<b>Uživatelé ve skupině:</b> ';
$_lang["access_permissions_users_tab"] = 'Tady můžete vidět, které skupiny uživatelů jsou nastavené. Můžete vytvářet nové skupiny, přejmenovávat je a prohlížet, kteří uživatelé jsou ve skupinách registrováni. Jestliže chcete přidat nového uživatele do skupiny nebo ho odstranit, musíte upravit nastavení konkrétního uživatele ve "Správě uživatelů". Administrátoři (užívatelé s přiděleným ID 1) mají vždy přístup ke všem dokumentům a není potřeba je přidávat do kterékoli skupiny.';

$_lang["users_list"] = 'Users list';
$_lang["documents_list"] = 'Resources list';

$_lang["account_email"] = 'Email účtu';
$_lang["actioncomplete"] = '<b>Akce byla úspešně dokončena!</b><br /> - Počkejte prosím, Evolution CMS se čistí.';
$_lang["activity_message"] = 'Tento seznam vypisuje poslední vytvořené nebo upravené dokumenty.';
$_lang["activity_title"] = 'Naposledy vytvořené nebo upravené dokumenty';

$_lang["administrator_role_message"] = 'S vašemi pravomocemi nemůžete upravovat ani mazat.';
$_lang["administrators"] = 'Administrátoři';
$_lang["after_saving"] = 'Po uložení';
$_lang["alert_delete_self"] = 'Nemůžete odstranit sám sebe!';
$_lang["alias"] = 'Alias';
$_lang["all_doc_groups"] = 'Všechny skupiny dokumentů (Veřejné)';
$_lang["all_events"] = 'Všechny události';
$_lang["all_usr_groups"] = 'Všechny skupiny uživatelů (Veřejné)';
$_lang["allow_mgr_access"] = 'Správce přístupového rozhraní';
$_lang["allow_mgr_access_message"] = 'Zvolením tohoto výběru umožníte nebo znemožníte přístup do správcovského rozhraní. <b>POZNÁMKA: Jestliže je v této volbě nastaveno NE, potom uživatel bude přesměrován do Správce úvodního přihlášení nebo na úvodní stránku.</b>';
$_lang["already_deleted"] = 'už byl vymazán.';
$_lang["attachment"] = 'Příloha';
$_lang["author_infos"] = 'Author information';
$_lang["automatic_alias_message"] = 'Volbou \'ano\' je systémem automaticky generován alias založený na nadpisu stránky dokumentu, když je uložen.';
$_lang["automatic_alias_title"] = 'Automaticky vytvořený alias:';
$_lang["backup"] = 'Záloha';
$_lang["bk_manager"] = 'Záloha';
$_lang["block_message"] = 'Tento uživatel bude po uložení dat zablokován.';
$_lang["blocked_minutes_message"] = 'Zde můžete zadat dobu (počet minut), po kterou bude uživatel blokován, pokud přesáhne maximálního počtu chybných přihlášení. Prosím zadejte pouze číselnou hodnotu (bez čárek, mezer atd.).';
$_lang["blocked_minutes_title"] = 'Blokované minuty:';
$_lang["cache_files_deleted"] = 'Následující soubory jsou smazány:';
$_lang["cancel"] = 'Zrušit';
$_lang["captcha_code"] = 'Bezpečnostní kód';
$_lang["captcha_message"] = 'Zapnutím zvýšíte bezpečnost, protože požadujete po uživatelích opsání kódu, který je strojově nečitelný (slouží jako ochrana před roboty, scriptkiddies nebo hackerskými útoky).';
$_lang["captcha_title"] = 'Použít generovaný obrázkový<br /> (CAPTCHA) kód:';
$_lang["captcha_words_default"] = 'EVO,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join(),Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote';
$_lang["captcha_words_message"] = 'Zde můžete zadat seznam CAPTCHA slov, které se používají při povolené CAPTCHA. Oddělte slova čárkami. Toto pole je limitované max. počtem 255 znaků.';
$_lang["captcha_words_title"] = 'CAPTCHA slova';

$_lang["cfg_base_path"] = 'MODX_BASE_PATH';
$_lang["cfg_base_url"] = 'MODX_BASE_URL';
$_lang["cfg_manager_path"] = 'MODX_MANAGER_PATH';
$_lang["cfg_manager_url"] = 'MODX_MANAGER_URL';
$_lang["cfg_site_url"] = 'MODX_SITE_URL';

$_lang["change_name"] = 'Změna jména';
$_lang["change_password"] = 'Změna hesla';
$_lang["change_password_confirm"] = 'Potvrzení hesla';
$_lang["change_password_message"] = 'Vložte prosím Vaše nové heslo a v následujícím řádku heslo zopakujte znovu z důvodu kontroly překlepu. Heslo by mělo mít délku 6 - 15 znaků.';
$_lang["change_password_new"] = 'Nové heslo';
$_lang["charset_message"] = 'Vyberte výchozí kódování znaků pro [(modx_charset)] systemové proměnné. Volba nemá vliv na Manager.';
$_lang["charset_title"] = 'Kódování znaků:';

$_lang["cleaningup"] = 'Čistím / Odstraňuji';
$_lang["clean_uploaded_filename"] = 'Přepisovat názvy nahrávaných souborů';
$_lang["clean_uploaded_filename_message"] = 'Je-li aktivní bude využito výchozího nastavení nebo nastavení pro transalias, které odstraní speciální znaky (např. diakritiku, ...) z názvů nahrávaných souborů, tečky budou zachovány.';
$_lang["clear_log"] = 'Vyčistit výpis';
$_lang["click_to_context"] = 'Kliknutím získáte přístup do kontextového menu';
$_lang["click_to_edit_title"] = 'Zde klikněte pro úpravu tohoto záznamu';
$_lang["click_to_view_details"] = 'Zde klikněte pro zobrazení detailů';
$_lang["close"] = 'Uzavřít';
$_lang["code"] = 'Kód';
$_lang["collapse_tree"] = 'Sbalit';
$_lang["comment"] = 'Poznámka';

$_lang["configcheck_admin"] = 'Kontaktujte prosím administrátora systému a upozorněte ho na tuto zprávu!';
$_lang["configcheck_cache"] = 'cache directory is not writable';
$_lang["configcheck_cache_msg"] = 'Evolution CMS cannot write to the cache directory. Evolution CMS will still function as expected, but no caching will take place. To solve this, make the \'cache\' directory writable.';
$_lang["configcheck_configinc"] = 'Do konfiguračního souboru je stále možno zapisovat.';
$_lang["configcheck_configinc_msg"] = 'Velmi neslušní lidé mohou potenciálně způsobit pěkný nepořádek na vašich stránkách a čemkoli spojeném s nimi. <strong>Opravdu.</strong> Prosím nastavte váš konfigurační soubor (/[+MGR_DIR+]/includes/config.inc.php) jen pro čtení!';
$_lang["configcheck_default_msg"] = 'Byla nalezena nespecifikovaná výstraha. Pro další postup použíjte křišťálovou kouli. :-)';
$_lang["configcheck_errorpage_unavailable"] = 'Vaše Chybová stránka (error 404) není dostupná.';
$_lang["configcheck_errorpage_unavailable_msg"] = 'To znamená, že vaše Chybová stránka není dostupná normálním internetovým uživatelům nebo neexistuje. To může vést k mnoha chybovým zápisům do logů. Ujistěte se zda žádná ze skupin návštěvníků nemá přístup k této stránce.';
$_lang["configcheck_errorpage_unpublished"] = 'Vaše Chybová stránka (error 404) není publikována nebo neexistuje.';
$_lang["configcheck_errorpage_unpublished_msg"] = 'To znamená, že vaše Chybová stránka je nedostupná širolé veřejnosti. Publikujte stránku nebo se přesvědčte, že stránka existuje a je umístěna ve stromu dokumentů v Nástrojích &gt; Konfigurační menu';
$_lang["configcheck_filemanager_path"] = 'The currently set <a href="index.php?a=17&tab=4">File Manager path</a> seems incorrect.';
$_lang["configcheck_filemanager_path_msg"] = 'This can happen for example by moving your installation to a different directory or server. Please check and update your Evolution CMS configuration.';
$_lang["configcheck_hide_warning"] = '<a href="javascript:hideConfigCheckWarning(\'%s\');"><em>Tuto zprávu již nezobrazovat.</em></a>';
$_lang["configcheck_images"] = 'Do adresáře pro obrázky nelze zapisovat';
$_lang["configcheck_images_msg"] = 'Adresář pro obrázky neexistuje nebo nemá povoleno právo k zápisu. Je potřeba pro funkčnost WYSIWYG editoru.';
$_lang["configcheck_installer"] = 'Instalátor nebyl smazán.';
$_lang["configcheck_installer_msg"] = 'Adresář /install obsahuje instalátor systému Evolution CMS. Pomocí něj může nepovolaná osoba vymazat databázi. Prosím kontaktujte administrátora, aby urychleně odstránil tento problém.';
$_lang["configcheck_lang_difference"] = 'Nesprávný počet položek v souboru jazykové lokalizace.';
$_lang["configcheck_lang_difference_msg"] = 'Právě vybraný jazyk má rozdílný počet položek než výchozí jazyk (angličtina). Pravděpodobně používate zastaralý nebo nekorektně upravený lokalizační soubor. I když se neobjeví problémy, bude asi potřeba udělat jeho aktualizaci.';
$_lang["configcheck_notok"] = 'Byly nalezeny následující problémy: ';
$_lang["configcheck_ok"] = 'Kontola proběhla úspěšně - žádná varovavání nejsou třeba.';
$_lang["configcheck_php_gdzip"] = 'GD a/nebo Zip PHP extenze nenalezena';
$_lang["configcheck_php_gdzip_msg"] = 'Evolution CMS potřebuje aktivní extenzi GD a Zip v PHP. Dokud bude Evolution CMS bežet bez nich, nebude možno používat všech výhod vestavěného správce souborů, editoru obrázků nebo captcha.';
$_lang["configcheck_rb_base_dir"] = 'The currently set <a href="index.php?a=17&tab=5">File base path</a> seems incorrect.';
$_lang["configcheck_rb_base_dir_msg"] = 'This can happen for example by moving your installation to a different directory or server. Please check and update your Evolution CMS configuration.';
$_lang["configcheck_register_globals"] = 'register_globals je nastaven na zapnuto (ON) v konfiguračním souboru php.ini';
$_lang["configcheck_register_globals_msg"] = 'Tato konfigurace dělá Vaše stránky více citlivé na útoky typu Cross Site Scripting (XSS). ';
$_lang["configcheck_title"] = 'Kontrola konfigurace';
$_lang["configcheck_templateswitcher_present"] = 'Detekován plugin TemplateSwitcher';
$_lang["configcheck_templateswitcher_present_delete"] = '<a href="javascript:deleteTemplateSwitcher();">Odstranit TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_disable"] = '<a href="javascript:disableTemplateSwitcher();">Vypnout TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_msg"] = 'Bylo zjištěno, že plugin zapříčiňuje problémy s ukládáním do vyrovnávací paměti a způsobuje problémy s výkonem, měli by jste využít pouze funkcionalit nutných pro chod stránek.';
$_lang["configcheck_unauthorizedpage_unavailable"] = 'Stránka o neautorizovaném přístupu není publikována nebo neexistuje.';
$_lang["configcheck_unauthorizedpage_unavailable_msg"] = 'To znamená, že Stránka o neautorizovaném přístupu není dostupná normálním internetovým uživatelům nebo neexistuje. To může vést k mnoha chybovým zápisům do logů. Ujistěte se zda žádná ze skupin návštěvníků nemá přístup k této stránce.';
$_lang["configcheck_unauthorizedpage_unpublished"] = 'Stránka o neautorizovaném přístupu definovaná v nastavení webu není publikována.';
$_lang["configcheck_unauthorizedpage_unpublished_msg"] = 'To znamená, že vaše Stránka o neautorizovaném přístupu je nedostupná širolé veřejnosti. Publikujte stránku nebo se přesvědčte, že stránka existuje a je umístěna ve stromu dokumentů v Nástrojích &gt; Konfigurační menu.';
$_lang["configcheck_validate_referer"] = 'Bezpečnostní upozornění: Validace HTTP hlaviček';
$_lang["configcheck_validate_referer_msg"] = 'Nastavení <strong>Ověřit hlavičky HTTP_REFERER</strong> v konfiguraci systému je vypnuté. Doporučujeme jej zapnout. <a href="index.php?a=17">Přejít na konfiguraci systému</a><br /><a href="javascript:hideHeaderVerificationWarning();"><em>Nezobrazovat to znovu.</em></a>';
$_lang["configcheck_warning"] = 'Výstraha konfigurace:';
$_lang["configcheck_what"] = 'Co to znamená?';

$_lang["safe_mode_warning"] = 'Safe mode is enabled. Manager functionality is limited.';

$_lang["confirm_block"] = 'Opravdu chcete zablokovat tohoto uživatele?';
$_lang["confirm_delete_category"] = 'Are you sure you want to delete this category?';
$_lang["confirm_delete_eventlog"] = 'Skutečně chcete smazat tento výpis událostí?';
$_lang["confirm_delete_file"] = 'Jste si jistí, že chcete odstranit soubor?\n\nMůže to narušit činnost stránek! Soubor odstraňte jen tehdy, jestliže víte, na co slouží a jste si jistý, že jeho odstranění nemůže ohrozit nebo narušit činnost stránky.';
$_lang["confirm_delete_group"] = 'Are you sure you want to delete this group?';
$_lang["confirm_delete_htmlsnippet"] = 'Jste si jistí, že chcete odstranit chunk?';
$_lang["confirm_delete_keywords"] = 'Jste si jisti, že chcete smazat tato klíčová slova?';
$_lang["confirm_delete_module"] = 'Opravdu chcete tento modul smazat?';
$_lang["confirm_delete_plugin"] = 'Jste si jisti, že chcete smazat tento plugin?';
$_lang["confirm_delete_record"] = 'Opravdu chcete smazat vybraný záznam/vybrané záznamy?';
$_lang["confirm_delete_resource"] = 'Skutečně chcete smazat tento dokument?\nPotomci tohto dokumentu budu také smazáni!';
$_lang["confirm_delete_role"] = 'Skutečně chcete odstranit toto oprávnění?';
$_lang["confirm_delete_snippet"] = 'Opravdu chcete odstranit tento snippet?';
$_lang["confirm_delete_tags"] = 'Opravdu chcete smazat vybrané META tagy?';
$_lang["confirm_delete_template"] = 'Opravdu chcete odstranit tuto šablonu?';
$_lang["confirm_delete_tmplvars"] = 'Opravdu chcete odstranit tuto proměnnou a všechny uložené hodnoty?';
$_lang["confirm_delete_user"] = 'Opravdu chcete odstranit tohoto uživatele?';

$_lang["delete_yourself"] = 'You can\'t delete yourself';
$_lang["delete_last_admin"] = 'You can\'t delete last admin user';

$_lang["confirm_delete_permission"] = 'Are you sure you want to delete this Permission?';
$_lang["confirm_duplicate_record"] = 'Opravdu chcete zkopírovat tento záznam?';
$_lang["confirm_empty_trash"] = 'Chcete trvale odstranit všechny vymazané dokumenty?\n\nPokračovat?';
$_lang["confirm_load_depends"] = 'Opravdu chcete nahrát Správu závislostí bez uložení vašich změn?';
$_lang["confirm_name_change"] = 'Změna uživatelského jména může ovlivnit jiné aplikace, které jsou provázané se Správcem obsahu. \n\n Skutečně chcete změnit toto uživatelské jméno?';
$_lang["confirm_publish"] = '\n\nPublikováním tohoto dokumentu odstraníte nastavené datumy ukončení publikování. Jestli chcete nastavené datum začátku nebo ukončení publikace zachovat, zvolte prosím místo této volby \'Upravit dokument\'.\n\nPokračovať?';
$_lang["confirm_remove_locks"] = 'Užívatelé někdy vypnou svůj prohlížeč v průběhu úprav dokumentů, šablon, snippetů nebo opustí složku, případně příspěvek v uzamknutém stavu v průběhu úpravy. Stisknutím OK můžete odstranit VŠECHNY zámky, které jsou aktivovní.\n\nPokračovat?';
$_lang["confirm_reset_sort_order"] = 'Are you sure you want to reset the \"sort order/index\" of all listed elements to 0 ?';
$_lang["confirm_resource_duplicate"] = 'Opravdu chcete zkopírovat tento dokument/složku?\nPodsložky a dokumenty budou také zkopírovány.';
$_lang["confirm_setting_language_change"] = 'Změnili jste výchozí hodnotu a přijdete o provedené změny. Pokračovat?';
$_lang["confirm_unblock"] = 'Opravdu chcete odblokovat tohoto uživatele?';
$_lang["confirm_undelete"] = '\n\nPotomci tohoto dokumentu budou obnoveni zároveň s tímto dokumentem. Sdílené dokumenty, smazané dříve než rodičovský dokument, zůstanou smazány.';
$_lang["confirm_unpublish"] = '\n\nUkončením publikace tohoto dokumentu odstraníte data začátku publikace a ukončení publikace tohoto dokumentu. Jestli chcete nastavené datum začátku nebo ukončení publikace zachovat, zvolte prosím místo této volby \'Upravit dokument\'.\n\nPokračovat?';
$_lang["confirm_unzip_file"] = 'Opravdu chcete rozbalit tento soubor?\n\nExistující soubory budou přepsány.';

$_lang["could_not_find_user"] = 'Nemohu nalézt uživatele';

$_lang["create_folder_here"] = 'Zde vytvoř složku';
$_lang["create_resource_here"] = 'Zde vytvořit dokument';
$_lang["create_resource_title"] = 'Vytvořit dokument';
$_lang["create_weblink_here"] = 'Zde vytvořit link';
$_lang["createdon"] = 'Vytvořeno dne:';
$_lang["create_new"] = 'Create new';

$_lang["credits"] = 'Poděkování';
$_lang["credits_shouts_msg"] = '<p>Evolution CMS je spravován a udržován na <a href="https://evo-cms.com/" target="_blank">evo-cms.com</a>.</p>';
$_lang["custom_contenttype_message"] = 'Tady můžete přidat uživatelské typy obsahu užité ve vašich dokumentech. Pro přidání nového vstupu, zadejte typ obsahu v textovém poli, potom klikněte na tlačítko \'Přidat\'.';
$_lang["custom_contenttype_title"] = 'Uživatelské typy obsahu:';

$_lang["database_charset"] = 'Znaková sada databáze';
$_lang["database_collation"] = 'Výchozí znaková sada porovnávání';
$_lang["database_name"] = 'Jméno databáze';
$_lang["database_overhead"] = '<b style="color:#990033;">Poznámka:</b> Navíc je nevyužité místo rezervované MySQL. Pro uvolnění místa klikněte v tabulce na číslo v sloupci Navíc.';
$_lang["database_server"] = 'Databázový server';
$_lang["database_table_clickbackup"] = 'pro zálohu a stažení vybraných tabulek';
$_lang["database_table_clickhere"] = 'Klikněte zde';
$_lang["database_table_datasize"] = 'Velikost dat';
$_lang["database_table_droptablestatements"] = 'Generuj příkaz DROP TABLE.';
$_lang["database_table_effectivesize"] = 'Skutečná velikost';
$_lang["database_table_indexsize"] = 'Velikost indexu';
$_lang["database_table_overhead"] = 'Navíc';
$_lang["database_table_records"] = 'Záznamy';
$_lang["database_table_tablename"] = 'Jméno tabulky';
$_lang["database_table_totals"] = 'Celkem:';
$_lang["database_table_totalsize"] = 'Celková velikost';
$_lang["database_tables"] = 'Databázové tabulky';
$_lang["database_version"] = 'Verze databáze:';

$_lang["date"] = 'Datum';
$_lang["datechanged"] = 'Datum bylo změněno';
$_lang["datepicker_offset"] = 'Počet let v minulosti: ';
$_lang["datepicker_offset_message"] = 'Kolik předchozích let má být zobrazeno ve výběru data.';
$_lang["datetime_format"] = 'Format datumu';
$_lang["datetime_format_message"] = 'Formát datumu v Manager.';

$_lang["default"] = 'Výchozí:';
$_lang["defaultcache_message"] = 'Označte \'Ano\' pro předvolené načtení dokumentů do zásobníku.';
$_lang["defaultcache_title"] = 'Ukládání do zásobníku';
$_lang["defaultmenuindex_message"] = 'Volbou \'Ano\' zapnete automatický menu index přidaný do jádra (základu).';
$_lang["defaultmenuindex_title"] = 'Přednastavený menu indexing';
$_lang["defaultpublish_message"] = 'Označte \'Ano\' pro předvolené automatické publikování nových dokumentů.';
$_lang["defaultpublish_title"] = 'Přednastavené publikování';
$_lang["defaultsearch_message"] = 'Označte \'Ano\' pro předvolené vyhledávání v nových dokumentech.';
$_lang["defaultsearch_title"] = 'Přednastavené vyhledávání';
$_lang["defaulttemplate_message"] = 'Vyberte přednastavenou šablonu, kterou chcete používat v nových dokumentech. Stále můžete vybrat odlišnou šablonu v editoru dokumentů, toto nastavení definuje jednu ze šablon jako výchozí.';
$_lang["defaulttemplate_title"] = 'Přednastavená šablona';
$_lang["defaulttemplate_logic_title"] = 'Automatické nastavování šablon';
$_lang["defaulttemplate_logic_general_message"] = 'Novým dokumentům budou přiřazovány šablony dle následujících pravidel, pokud to nebude možné použije se šablona jako v nadřazeném dokumentu:';
$_lang["defaulttemplate_logic_system_message"] = '<strong>Systémová</strong>: výchozí šablona systému.';
$_lang["defaulttemplate_logic_parent_message"] = '<strong>Nadřazená</strong>: stejná šablona jako u nadřazeného dokumentu.';
$_lang["defaulttemplate_logic_sibling_message"] = '<strong>Sourozenecká</strong>: stejná šablona jako ostatní dokumenty na dané úrovni.';

$_lang["delete"] = 'Smazat';
$_lang["delete_resource"] = 'Smazat dokument';
$_lang["delete_tags"] = 'Smazat tagy';
$_lang["deleting_file"] = 'Odstraňuji soubor `%s`: ';
$_lang["description"] = 'Popis';
$_lang["deselect_keywords"] = 'Smazat klíčová slova';
$_lang["deselect_metatags"] = 'Smazat META tagy';
$_lang["disabled"] = 'Zakázaný';
$_lang["doc_data_title"] = 'Náhled na data dokumentu';
$_lang["documentation"] = 'Documentation';

$_lang["duplicate"] = 'Kopírovat';
$_lang["duplicate_alias_found"] = 'Dokument \'%s\' již používá alias \'%s\'. Prosím zadejte jednoznačný alias.';
$_lang["duplicate_template_alias_found"] = 'Template \'%s\' is already using the URL alias \'%s\'. Please enter a unique alias.';
$_lang["duplicate_alias_message"] = 'Zde můžete zvolit \'ano\' k povolení duplicity aliasů, které byly uloženy. <b>POZNÁMKA: Tato volba by měla být použita s volbou "Cesta ke zjednodušenému aliasu" nastavenou na \'Ano\', aby se vyhnulo problémům při odkazování na dokument.</b>';
$_lang["duplicate_alias_title"] = 'Povolit duplicitu aliasů:';
$_lang["duplicate_name_found_general"] = '%s s názvem \'%s\' již existuje. Zadejte ještě nepoužitý název.';
$_lang["duplicate_name_found_module"] = 'Modul s názvem \'%s\' již existuje. Zadejte ještě nepoužitý název.';
$_lang["duplicated_el_suffix"] = 'Duplicate';

$_lang["edit"] = 'Upravit';
$_lang["edit_resource"] = 'Upravit dokument';
$_lang["edit_resource_title"] = 'Upravit dokument';
$_lang["edit_settings"] = 'Konfigurace systému';
$_lang["editedon"] = 'Datum úprav';
$_lang["editing_file"] = 'Úprava souboru: ';
$_lang["editor_css_path_message"] = 'Zadejte cestu k Vašemu CSS souboru, jestliže si přejete ho používat editorem. Nejlepší ke vložení cesty k rootu vašeho serveru, např.: /assets/site/style.css. Jestliže si nepřejete nahrát kaskádový styl do editoru, nechejte pole prázdné.';
$_lang["editor_css_path_title"] = 'Cesta k CSS souboru:';

$_lang["email"] = 'Email';
$_lang["email_sent"] = 'Email poslán';
$_lang["email_unique"] = 'Email is already in use!';
$_lang["emailsender_message"] = 'Zde můžete zadat emailovu adresu použitou při odesílání uživatelských jmén a hesel.';
$_lang["emailsender_title"] = 'Emailová adresa:';
$_lang["emailsubject_default"] = 'Vaše přihlašovací údaje';
$_lang["emailsubject_message"] = 'Zde můžete zadat předmět odesílaného emailu.';
$_lang["emailsubject_title"] = 'Předmět emailu:';

$_lang["empty_folder"] = 'Tato složka je prázdná';
$_lang["empty_recycle_bin"] = 'Odstranit smazané dokumenty';
$_lang["empty_recycle_bin_empty"] = 'Nejsou žádné smazané dokumenty na odstranění.';
$_lang["enable_resource"] = 'Povolit zdrojový soubor.';
$_lang["enable_sharedparams"] = 'Umožnit sdílení parametru';
$_lang["enable_sharedparams_msg"] = '<b>POZNÁMKA:</b> celkově jedinečné id (GUID) bude použito pro jedinečnou identifikaci tohoto modulu a jeho sdílených parametrů. GUID je také používáno k vytvoření odkazu mezi modulem a pluginy nebo snippety přistupujícími ke sdíleným parametrům.';
$_lang["enabled"] = 'Povoleno';
$_lang["error"] = 'Chyba';
$_lang["error_sending_email"] = 'Chyba při odesílání emailu';
$_lang["errorpage_message"] = 'Zde zadejte ID dokumentu, který se bude zobrazovat uživatelům, když budou chtít zobrazit stránku, která neexistuje. <b>Poznámka: Je nutné vložit ID existujícího dokumentu, který musí být publikován!</b>';
$_lang["errorpage_title"] = 'Chybová stránka:';
$_lang["event_id"] = 'ID události';
$_lang["eventlog"] = 'Zápis událostí';
$_lang["eventlog_msg"] = 'Zápis událostí je používán k zobrazení informativních, varovných a chybových zpráv vytvořených správcem obsahu. Sloupec "zdroj" zobrazuje část správce obsahu, kde zpráva nastala.';
$_lang["eventlog_viewer"] = 'Prohlížeč událostí';
$_lang["everybody"] = 'Všichni';
$_lang["existing_category"] = 'Existující kategorie';
$_lang["expand_tree"] = 'Rozbalit';
$_lang["failed_login_message"] = 'Zde můžete zadat počet špatných pokusů přihlášení, které budou předcházet před zablokováním uživatele.';
$_lang["failed_login_title"] = 'Špatné pokusy přihlášení:';
$_lang["fe_editor_lang_message"] = 'Vyberte jazyk editoru, který bude používán v WYSIWYG editoru.';
$_lang["fe_editor_lang_title"] = 'Jazyk WYSIWYG editoru:';

$_lang["filemanager_path_message"] = 'IIS občas nedokáže správně pracovat s nastaveným koreňovým adresářem dokumentů, který používá souborový správce. Jestliže máte problémy s jeho používaním, nadefinujte tuto cestu do kořenového adresáře ve vaší instalaci Evolution CMS.';
$_lang["filemanager_path_title"] = 'Umístění souborového správce:';

$_lang["folder"] = 'Složka';
$_lang["forgot_password_email_fine_print"] = '* Uvedená URL expiruje dnes nebo po prvním pokusu změnit heslo.';
$_lang["forgot_password_email_instructions"] = 'Odtud můžete změnit heslo v menu Můj účet.';
$_lang["forgot_password_email_intro"] = 'Požadavek na změnu hesla k vašemu účtu.';
$_lang["forgot_password_email_link"] = 'Klikněte sem pro dokončení procesu.';
$_lang["forgot_your_password"] = 'Zapomněli jste heslo?';
$_lang["friendly_alias_message"] = 'Jestliže používáte zjednodušené URL, a dokument má nadefinovaný alias, bude mít vždy přednost před zjednodušenou URL. Jestliže nastavíte volbu na `Ano`, předpona a přípona zjednodušených url budou také aplikované na aliasy. Například když Váš dokument s ID 1 má alias `uvod`, máte nastavenou předponu na `` a příponu na `.html`, a nastavíte tuto volbu na `Ano` bude generovaný dokument `uvod.html`. Jestliže alias nemáte definován, Evolution CMS bude generovat dokument `1.html` jako odkaz.';
$_lang["friendly_alias_title"] = 'Použít zjednodušené aliasy:';
$_lang["friendlyurls_message"] = 'Use Search Engine Friendly URLs on Apache webservers with mod_rewrite or IIS with third-party plugins. See the .htaccess file in the site root of the distribution for more info.';
$_lang["friendlyurls_title"] = 'Jednoduché URL adresy:';
$_lang["friendlyurlsprefix_message"] = 'Zde můžete nastavit předponu pro použití jednoduchých URL adres. Například, předponu nastavte na \'stranka\', což způsobí, že URL adresa /index.php?id=2 se změní na zjednodušenou adresu /stranka2.html (za předpokladu, že přípona je nastavená na .html). Pro odkazy na vaší stránce takto můžete specifikovat, co Vaši užívatelé (a vyhledávače) uvidí.';
$_lang["friendlyurlsprefix_title"] = 'Předpona jednoduchých URL:';
$_lang["friendlyurlsuffix_message"] = 'Zde můžete nastavit příponu pro jednoduché URL adresy. Zadaním \'.html\' se přidá přípona .html ke všem vašim zjednodušeným URL.';
$_lang["friendlyurlsuffix_title"] = 'Přípona jednoduchých URL:';
$_lang["functionnotimpl"] = 'Sakrblééé?!';
$_lang["functionnotimpl_message"] = 'Tato funkce ještě nebyla implementovaná';
$_lang["further_info"] = 'Further information';
$_lang["global_tabs"] = 'Global Tabs';
$_lang["go"] = 'Hledej';
$_lang["group_access_permissions"] = 'Přístupová práva skupiny uživatelů';
$_lang['group_tvs'] = 'Group TV';
$_lang["guid"] = 'GUID';
$_lang["help"] = 'Pomoc';
$_lang["help_msg"] = '<p>You can obtain free community support by <a href="http://forums.modx.com/" target="_blank">visiting the Evolution CMS Forums</a>. There is also a growing body of <a href="http://evolution-docs.com" target="_blank">Evolution CMS Documentation and Guides</a> that touch on virtually every aspect of Evolution CMS.</p><p>We are planning to offer commercial support services for Evolution CMS as well. Please <a href="mailto:dmi3yy@evo.im?subject=Evolution CMS Commercial Support Inquiry">email us if you\'re interested</a>.</p>';
$_lang["help_title"] = 'Pomoc';
$_lang["hide_tree"] = 'Skrýt';
$_lang["home"] = 'Domů';

$_lang["icon"] = 'Ikona';
$_lang["icon_description"] = 'CSS class value. e.g. fa&nbsp;fa-star';
$_lang["id"] = 'ID';
$_lang["illegal_parent_child"] = 'Nadřazení:\n\nDokument je potomek vybraného dokumentu.';
$_lang["illegal_parent_self"] = 'Nadřazení:\n\nVybraný dokument nemůže být podřízen sám sobě.';
$_lang["images_management"] = 'Manage Images';
$_lang["import_files_found"] = '<b>Nalezeno %s dokument(y/ů) k importu...</b>';
$_lang["import_params"] = 'Importovat sdílené parametry modulu';
$_lang["import_params_msg"] = 'Můžete importovat parametery nebo nastavení modulu výběrem jména modulu z menu. <b>POZNÁMKA:</b> Aby se moduly objevily v menu, musí být tento plugin/snippet součástí seznam závislostí modulu a modul musí mít povolen parametr sdílení. ';
$_lang["import_parent_resource"] = 'Nadřízený dokument:';
$_lang["update_tree"] = 'Přestavět strom';
$_lang["update_tree_description"] = '<ul>
<li>Closure table database design pattern that makes working with the document tree more convenient and fast </li>
<li>If the data in the tree is updated not through models, then there is a possibility of an incorrect linking of documents in the database </li>
<li>This operation fixes the problem when site_content is not updated through the model (save, create) and the links (Closure table) are not updated </li>
<li>It is also possible to perform this operation in CLI mode via the \'php artisan closuretable: rebuild\' command </li>
</ul>';
$_lang["update_tree_danger"] = 'If you have more than 1000 resources, it is better to perform this operation in CLI mode using the \'php artisan closuretable: rebuild command\'';
$_lang["update_tree_time"] = 'Rebuild tree finished. Documents processed: <b>%s</b><br>Import took <b>%s</b> seconds to complete.';
$_lang["info"] = 'Informace';
$_lang["information"] = 'Informace';
$_lang["inline"] = 'V řadě';
$_lang["insert"] = 'Vložit';
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
$_lang["keyword"] = 'Klíčové slovo';
$_lang["keywords"] = 'Klíčová slova';
$_lang["keywords_intro"] = 'Pro úpravu klíčového slova, jednoduše napište do textového pole vedle původního slova nové klíčové slovo. Pro smazání klíčového slova, označte \'vymazávací\' box před klíčovým slovem. Jestliže označíte vymazávací pole a také změníte jeho název, klíčové slovo bude smazáno a přejmenování klíčového slova nebude uskutečněno!';
$_lang["language_message"] = 'Vyberte jazyk, který chcete používat v administrační části Evolution CMS.';
$_lang["language_title"] = 'Jazyk:';
$_lang["last_update"] = 'Last update';
$_lang["launch_site"] = 'Spustit stránky';
$_lang["license"] = 'License';
$_lang["link_attributes"] = 'Vlastnosti odkazu';
$_lang["link_attributes_help"] = 'Zde můžete zadat vlastnosti odkazu pro tuto stránku, jako target= nebo rel=.';
$_lang["list_mode"] = 'Zapnutí/vypnutí seznam režimu - používate-li seznam všech záznamů v tabulce.';
$_lang["loading_doc_tree"] = 'Načítám strukturu...';
$_lang["loading_menu"] = 'Načítám menu...';
$_lang["loading_page"] = 'Čekejte prosím, než Evolution CMS načte stránku...';
$_lang["localtime"] = 'Místní čas';

$_lang["lock_htmlsnippet"] = 'Zamknout chunk pro úpravu';
$_lang["lock_htmlsnippet_msg"] = 'Jen Administrátor (uživatel s ID 1) může upravovat tento chunk.';
$_lang["lock_module"] = 'Zamknout modul pro úpravu';
$_lang["lock_module_msg"] = 'Jen Administrátor (uživatel s ID 1) může upravovat tento modul.';
$_lang["lock_msg"] = '%s právě upravuje tento %s. Prosím počkejte dokud jiný uživatel práci neskončí a zkuste to znovu.';
$_lang["lock_plugin"] = 'Zamknout plugin pro úpravu';
$_lang["lock_plugin_msg"] = 'Jen Administrátor (uživatel s ID 1) může upravovat tento snippet.';
$_lang["lock_settings_msg"] = '%s právě upravuje tato nastavení. Prosím počkejte dokud jiný uživatel práci neskončí a zkuste to znovu.';
$_lang["lock_snippet"] = 'Zamknout snippet pro úpravu';
$_lang["lock_snippet_msg"] = 'Jen Administrátor (uživatel s ID 1) může upravovat tento snippet.';
$_lang["lock_template"] = 'Zamknout šablonu proti úpravě';
$_lang["lock_template_msg"] = 'Jen Administrátor (uživatel s ID 1) může upravovat tuto šablonu.';
$_lang["lock_tmplvars"] = 'Uzamčení proměnné pro úpravu';
$_lang["lock_tmplvars_msg"] = 'Pouze Administrátoři (Role ID 1) můžou měnit tuto proměnnou.';
$_lang["locked"] = 'Uzamčen';

$_lang["login_allowed_days"] = 'Povolené dny';
$_lang["login_allowed_days_message"] = 'Vyberte dny, kdy se může uživatel přihlásit.';
$_lang["login_allowed_ip"] = 'Povolená IP adresa';
$_lang["login_allowed_ip_message"] = 'Zadejte IP adresy, ze kterých může uživatel přistupovat. <b>POZNÁMKA: Více IP adres oddělujte čárkou (,).</b>';
$_lang["login_button"] = 'Přihlásit';
$_lang["login_cancelled_install_in_progress"] = 'Právě probíhá instalace/aktualizace této stránky. <br />Prosím zkuste to za chvíli znovu!<br />';
$_lang["login_cancelled_site_was_updated"] = 'Instalace/aktualizace této stránky byla dokončena, prosím přihlašte se znovu!<br />';
$_lang["login_captcha_message"] = 'Prosím vložte bezpečnostní kód zobrazený v kresbě. Jestliže nemůžete kód přečíst, klepněte obrázek s kódem a bude vygenerovát nový nebo kontaktujte administrátora webu.';
$_lang["login_homepage"] = 'Domovská přihlašovací stránka';
$_lang["login_homepage_message"] = 'Zadejte ID dokumentu, který chcete uživaleti zobrazit po jeho přihlášení. <b>POZNÁMKA: Ujistěte se,že ID dokumentu, které zadáte, patří existojícímu dokumentu, a že byli publikovány a jsou přístupné tomuto uživateli!</b>';
$_lang["login_message"] = 'Vložte prosím své přihlasovací jméno a heslo pro vstup do administrační části. Vaše jméno a heslo je citlivé na velikost písmen a na případné nepřesné zadání anebo překlepy, proto je vložte pozorně!';
$_lang["logo_slogan"] = 'EVO Content Manager - \nCreate and do more with less';
$_lang["logout"] = 'Odhlásit';
$_lang["long_title"] = 'Dlouhý název';

$_lang["manager"] = 'Správce';
$_lang["manager_lockout_message"] = 'Jste přihlášen do Správce obsahu. Pokud chcete opustit Evolution CMS, klikněte na tlačítko "Ohlásit". <p />Pro spuštění nebo přechod na domovskou stránku klikněte na tlačítko "Domů".';
$_lang["manager_permissions"] = 'Správa přístupových práv';
$_lang["manager_theme"] = 'Vzhled správce:';
$_lang["manager_theme_message"] = 'Zvolit vzhled Správce obsahu.';
$_lang["manager_theme_mode"] = 'Color Scheme:';
$_lang["manager_theme_mode1"] = 'everything is light';
$_lang["manager_theme_mode2"] = 'the header is dark';
$_lang["manager_theme_mode3"] = 'header and sidebar are dark';
$_lang["manager_theme_mode4"] = 'everything is dark';
$_lang['manager_theme_mode_message'] = 'This setting is used as the "default" and can be overridden by the manager when using the theme color mode switch button in the Resource Tree: <i class="fa fa-lg fa-adjust"></i>';
$_lang['manager_theme_mode_title'] = 'Theme color mode switch';

$_lang["meta_keywords"] = 'META klíčová slova';
$_lang["metatag_intro"] = 'Na této stránce můžete mazat, tvořit nebo měnit META tagy. K propojení META tagů s dokumenty, klikněte na tabulku <u>META klíčová slova</u>, když upravujete dokument, a vybíráte požadované META tagy a klíčová slova. Pro přidání nového tagu zadejte název a hodnotu a klikněte na tlačítko \'Přidat tag\'. Pro úpravu tagu klikněte na název tagu v tabulce.';
$_lang["metatag_notice"] = 'Můžete si prohlédnout stránku <a href="http://www.html-reference.com/META.htm" target="_blank">HTML referenční příručka</a> a získat více informací. Toto není kompletní výčet možných Meta Tagů.';
$_lang["metatags"] = 'META tagy';
$_lang["mgr_access_permissions"] = 'Správce přístupových práv';
$_lang["mgr_login_start"] = 'Správce úvodního přihlášení';
$_lang["mgr_login_start_message"] = 'Zadejte ID dokumentu, který chcete uživateli zobrazit po jeho přihlášení do správce. <b>POZNÁMKA: ujistěte se, že zadané ID náleží existujícímu dokument a že byl publikován a je přístupný tomuto uživateli!</b>';

$_lang["mgrlog_action"] = 'Proces';
$_lang["mgrlog_actionid"] = 'ID procesu';
$_lang["mgrlog_anyall"] = 'Jakékoliv/Vše';
$_lang["mgrlog_datecheckfalse"] = 'checkdate() vrací chybu.';
$_lang["mgrlog_datefr"] = 'Datováno od';
$_lang["mgrlog_dateinvalid"] = 'Chybný formát data.';
$_lang["mgrlog_dateto"] = 'Datováno do';
$_lang["mgrlog_emptysrch"] = 'Váš hledaný dotaz vrátil prázdnou sadu výsledků (např. žádný záznam nebyl nalezen).';
$_lang["mgrlog_field"] = 'Pole';
$_lang["mgrlog_itemid"] = 'ID položky';
$_lang["mgrlog_itemname"] = 'Název položky';
$_lang["mgrlog_msg"] = 'Zpráva';
$_lang["mgrlog_noquery"] = 'Žádný hledaný dotaz nebyl dosud zadán.';
$_lang["mgrlog_qresults"] = 'Výsledky dotazu';
$_lang["mgrlog_query"] = 'Zaznamenávání dotazu';
$_lang["mgrlog_query_msg"] = 'Prosím vyberte možnost, jak znázornit záznamy. Můžete vybrat záznam položek podle data, ale uvědomte si, že vložená data nejsou zahrnuta - pro zvolení každého záznamu z 01-01-2004, nastavte \'datováno od\' na 01-01-2004 a \'datováno do\' na 02-01-2004.<br /><br />Zpráva a událost jsou obvykle stejné. Jestliže hledáte určitou zprávu, je nejlepší nastavit proces na \'Jakýkoli / Všechno\'.';
$_lang["mgrlog_results"] = 'Počet výsledků';
$_lang["mgrlog_searchlogs"] = 'Hledej záznamy';
$_lang["mgrlog_sortinst"] = 'Tabulku můžete setřídit kliknutím na hlavičky sloupců. Jestliže je mnoho záznamů, můžete záznamy <a href="index.php?a=55">smazat</a>. To odstraní všechny záznamy, které nemohou být uvolněny!';
$_lang["mgrlog_time"] = 'Čas';
$_lang["mgrlog_user"] = 'Uživatel';
$_lang["mgrlog_username"] = 'Uživatelské jméno';
$_lang["mgrlog_value"] = 'Hodnota';
$_lang["mgrlog_view"] = 'Správce zobrazení záznamů';

$_lang["modx_news"] = 'Oznamování Evolution CMS novinek';
$_lang["modx_news_tab"] = 'Evolution CMS novinky';
$_lang["modx_news_title"] = 'Evolution CMS novinky';
$_lang["modx_security_notices"] = 'Evolution CMS bezpečnostní oznámení';
$_lang["modx_version"] = 'Evolution CMS verze';

$_lang["name"] = 'Název';

$_lang["no"] = 'Ne';
$_lang["no_active_users_found"] = 'Nenalezeni aktivní uživatelé.';
$_lang["no_activity_message"] = 'Ještě jste nevytvořil ani neupravil žádný dokument.';
$_lang["no_category"] = 'nezařazeno';
$_lang["no_docs_pending_publishing"] = 'Žádný dokument nečeká na publikování.';
$_lang["no_docs_pending_pubunpub"] = 'Žádné události nebyly nalezeny.';
$_lang["no_docs_pending_unpublishing"] = 'Žádný dokument nečeká na ukončení publikování.';
$_lang["no_edits_creates"] = 'Nenalezeny žádné změny.';
$_lang["no_groups_found"] = 'Nebyla nalezena žádná skupina.';
$_lang["no_keywords_found"] = 'Nejsou zde žádná klíčová slova.';
$_lang["no_records_found"] = 'Žádný záznam nenalezen.';
$_lang["no_results"] = 'Nebyli nalezeny žádné výsledky.';
$_lang["nologentries_message"] = 'Zadejte počet záznamů na stránce při Výpisu akcí.';
$_lang["nologentries_title"] = 'Počet záznamů:';
$_lang["none"] = 'Žádný';
$_lang["noresults_message"] = 'Zadejte počet výsledků, které se zobrazí v tabulce, když prohlížíte výpisy a hledáte výsledky.';
$_lang["noresults_title"] = 'Počet výsledků:';
$_lang["not_deleted"] = 'nebyl smazán';
$_lang["not_set"] = 'Nenastaveno';

$_lang["offline"] = 'Offline';

$_lang["online"] = 'Online';
$_lang["onlineusers_action"] = 'Činnost';
$_lang["onlineusers_actionid"] = 'ID činnosti';
$_lang["onlineusers_ipaddress"] = 'IP adresa uživatele';
$_lang["onlineusers_lasthit"] = 'Poslední přihlášení';
$_lang["onlineusers_message"] = 'Zde jsou vypsaní všichni aktívní užívatelé v průběhu 20-ti minut (aktuální čas je ';
$_lang["onlineusers_title"] = 'Uživatelé online';
$_lang["onlineusers_user"] = 'Uživatel';
$_lang["onlineusers_userid"] = 'ID uživatele';

$_lang["optimize_table"] = 'Klikněte zde pro optimalizaci této tabulky.';

$_lang["page_data_alias"] = 'Alias';
$_lang["page_data_cacheable"] = 'Ukládání do zásobníku (cache)';
$_lang["page_data_cacheable_help"] = 'Zatrhněte tuto položku, jestliže budete chtít povolit ukládání dokumentů do zásobníku. Jestliže váš dokument obsahuje snippety, nechejte tuto položku neoznačenou.';
$_lang["page_data_cached"] = '<b>Zdroj vyvolaný ze zásobníku:</b>';
$_lang["page_data_changes"] = 'Změny';
$_lang["page_data_contentType"] = 'Typ obsahu';
$_lang["page_data_contentType_help"] = 'Zvolte typ obsahu dokumentu. Pokud si nejste jistí, jaký bude obsah dokumentu, zvolte "text/html".';
$_lang["page_data_created"] = 'Vytvořené';
$_lang["page_data_edited"] = 'Upravené';
$_lang["page_data_editor"] = 'Upravit pomocí rozšířeného WYSIWYG editoru';
$_lang["page_data_folder"] = 'Dokument je složkou';
$_lang["page_data_general"] = 'Všeobecné';
$_lang["page_data_markup"] = 'Označení/struktura';
$_lang["page_data_mgr_access"] = 'Správce přístupů';
$_lang["page_data_notcached"] = 'Tento dokument není (doposud) uložen v zásobníku.';
$_lang["page_data_publishdate"] = 'Datum publikování';
$_lang["page_data_publishdate_help"] = 'Jestliže nastavíte datum publikování, dokument bude publikovaný až od určitého datumu. Pro výběr data klikněte na ikonku kalendáře, pro odstranění data na vedlejší ikonku. Jestliže použijete tuto možnost, publikování určujete vy - tzn. dokument nemůže být publikovaný automaticky.';
$_lang["page_data_published"] = 'Publikovaný';
$_lang["page_data_searchable"] = 'Vyhledávání';
$_lang["page_data_searchable_help"] = 'Zatrhněte tuto volbu, jestliže budete chtít umožnit vyhledávání v dokumentu. Dá sa také použít pro další účely, jestliže je budou vaše snippety podporovat.';
$_lang["page_data_source"] = 'Zdroj';
$_lang["page_data_status"] = 'Stav';
$_lang["page_data_template"] = 'Použitá šablona';
$_lang["page_data_template_help"] = 'Zde můžete vybrat šablonu, která bude v dokumentu použitá.';
$_lang["page_data_title"] = 'Data stránky';
$_lang["page_data_unpublishdate"] = 'Datum ukončení publikování';
$_lang["page_data_unpublishdate_help"] = 'Jestliže nastavíte datum ukončení publikování dokumentu, jeho zveřejnění bude ukončené k určitému datu. Pro výběr data klikněte na ikonku kalendáře, pro odstranění data na ikonku vedle. Jestliže použijete tuto možnost, ukončení publikování dokumentu určujete vy - publikování nemůže být ukončené automaticky.';
$_lang["page_data_unpublished"] = 'Ukončení publikování';
$_lang["page_data_web_access"] = 'Přístup z webu';

$_lang["pagetitle"] = 'Název dokumentu';
$_lang["pagination_table_first"] = 'První';
$_lang["pagination_table_gotopage"] = 'Jdi na stranu';
$_lang["pagination_table_last"] = 'Poslední';
$_lang["paging_first"] = 'první';
$_lang["paging_last"] = 'poslední';
$_lang["paging_next"] = 'následující';
$_lang["paging_prev"] = 'předcházející';
$_lang["paging_showing"] = 'Zobrazuji';
$_lang["paging_to"] = 'až';
$_lang["paging_total"] = 'celkem';
$_lang["parameter"] = 'Parametr';
$_lang["parse_docblock"] = 'Parse DocBlock';
$_lang["parse_docblock_msg"] = 'Attention (!): <b>Resets</b> actual name, configuration, description and category to install-defaults by parsing the source code.';

$_lang["password"] = 'Heslo';
$_lang["password_change_request"] = 'Požadována změna hesla';
$_lang["password_confirmed"] = 'Passwords doesn\'t match';
$_lang["password_gen_gen"] = 'Nechat Evolution CMS vygenerovat heslo.';
$_lang["password_gen_length"] = 'Heslo, které zadáváte musí být delší jak 6 znaků.';
$_lang["password_gen_method"] = 'Způsob tvorby nového hesla';
$_lang["password_gen_specify"] = 'Zde zadejte své heslo:';
$_lang["password_method"] = 'Způsob oznámení hesla';
$_lang["password_method_email"] = 'Poslat nové heslo emailem.';
$_lang["password_method_screen"] = 'Zobrazit nové heslo na monitoru.';
$_lang["password_msg"] = 'Nové heslo pro <b>:username</b> je <b>:password</b><br>';

$_lang["php_version_check"] = 'Evolution CMS je kompatibilní jen s verzí PHP 7.4 a vyšší. Tento server používá verzi %s%.  Aktualizujte prosím svou PHP instalaci!';

$_lang["preview"] = 'Náhled';
$_lang["preview_msg"] = 'Tohle je náhled na vaše poslední uložené změny. Kliknutím zde na <a href="javascript:;" onclick="saveRefreshPreview();">Uložit a obnovit</a> uložíte vaše současné změny';
$_lang["preview_resource"] = 'Náhled dokumentu';

$_lang["private"] = 'Soukromý';
$_lang["public"] = 'Veřejný';
$_lang["publish_date"] = 'Datum publikování';
$_lang["publish_events"] = 'Události - publikování';
$_lang["publish_resource"] = 'Publikovat dokument';

$_lang["rb_base_dir_message"] = 'Zadejte fyzickou cestu ke zdrojovému adresáři. Toto nastavení je obvykle generováno automaticky. Jestliže používate IIS, Evolution CMS může zpracovat cestu nesprávně, což může způsobit, že prohlížeč zdrojů zobrazí chybu. V takovéto případě můžete vložit cestu k adresáři obrázků sem (cesta, kterou byste viděli ve Windows Exploreru). <b>Poznámka:</b> Zdrojový adresář musí obsahovat podsložky images, files, flash a media, aby prohlížeč zdrojů fungoval správně.';
$_lang["rb_base_dir_title"] = 'Cesta ke zdrojům:';
$_lang["rb_base_url_message"] = 'Zadejte virtuální cestu ke zdrojovému adresáři. Toto nastavení je obvykle vytvořeno automaticky. Jestliže používate IIS, Evolution CMS může zpracovat URL nesprávně, což může způsobit, že prohlížeč zdrojů zobrazí chybu. V takovéto případě můžete vložit URL k adresáři obrázků sem (URL, kterou byste viděli ve Internet Exploreru).';
$_lang["rb_base_url_title"] = 'URL zdrojů:';
$_lang["rb_message"] = 'Vyberte Ano k povolení prohlížeče zdrojů. Toto nastavení povolí uživatelům prohlížet a nahrávat zdroje jako obrázky, flash a ostatní soubory na server.';
$_lang["rb_title"] = 'Povolit prohlížeč zdrojů:';
$_lang["rb_webuser_message"] = 'Chcete návětevníkům povolit používat Správce souborů? <b>POZOR:</b> Povolením Návštěvníkům používat Správce souborů vystavujete Vaše soubory bezpečnostnímu riziku. Tuto volbu zvolte pouze pro důvěryhodné Návštěvníky.';
$_lang["rb_webuser_title"] = 'Návštěvník?';
$_lang["recent_docs"] = 'Poslední dokumenty';
$_lang["recommend_setting_change_title"] = 'Doporučena změna nastavení';
$_lang["recommend_setting_change_description"] = 'Váš web není nastaven pro ověřování HTTP_REFERER příchozích dotazů do Manager. Doporučejeme Vám zapnutí tohoto nastavení, předejdete tím možnému CSRF (Cross Site Request Forgery) útoku.';
$_lang["references"] = 'References';
$_lang["refresh_cache"] = 'Vyrovnávací paměť (cache): Počet souborů umístěných v adresáři cache <b>%s</b> a smazáno <b>%d</b> vyrovnávacích souborů.<p>Nové vyrovnávací soubory budou vytvořeny až to budou stránky vyžadovat.';
$_lang["refresh_published"] = 'Počet publikovaných dokumentů: <b>%s</b>';
$_lang["refresh_site"] = 'Vyrovnávací paměť';
$_lang["refresh_title"] = 'Obnovení stránek';
$_lang["refresh_tree"] = 'Obnovit adresářový strom';
$_lang["refresh_unpublished"] = 'Počet dokumentů s ukončenou dobou publikování: <b>%s</b>';
$_lang["release_date"] = 'Datum vydání';
$_lang["remember_last_tab"] = 'Pamatovat záložky';
$_lang["remember_last_tab_message"] = 'Stránky manažeru se záložkami se budou nahrávat s naposledy otevřenými záložkami, normálně se zobrazuje první záložka.';
$_lang["remember_username"] = 'Zapamatovat si heslo';
$_lang["remove"] = 'Odstranit';
$_lang["remove_date"] = 'Odstranit datum';
$_lang["remove_locks"] = 'Odstranit zámky';
$_lang["rename"] = 'Přejmenovat';
$_lang["reports"] = 'Hlášení';
$_lang["report_issues"] = 'Report issues';
$_lang["required_field"] = 'Field :field is required';
$_lang["require_tagname"] = 'Je požadován název značky';
$_lang["require_tagvalue"] = 'Je požadována hodnota tagu';
$_lang["reserved_name_warning"] = 'Tento název nelze použít. Jedná se o název, který je vyhrazen systému.';
$_lang["reset"] = 'Vymazat';
$_lang["reset_failedlogins"] = 'reset';
$_lang["reset_sort_order"] = 'Reset sort order';

$_lang["manager_access_permissions"] = 'Manager access permission';
$_lang["manage_groups"] = 'Manage document and user groups';
$_lang["manage_document_permissions"] = 'Manage document permissions';
$_lang["manage_module_permissions"] = 'Manage module permissions';
$_lang["manage_tv_permissions"] = 'Manage TV permissions';

$_lang["rss_url_news_default"] = 'https://github.com/evocms-community/evolution/releases.atom';
$_lang["rss_url_news_message"] = 'Zadejte URL adresu pro načítání Evolution CMS novinek.';
$_lang["rss_url_news_title"] = 'RSS novinky';
$_lang["rss_url_security_default"] = 'https://github.com/extras-evolution/security-fix/releases.atom';
$_lang["rss_url_security_message"] = 'Zadejte URL adresu pro načítání Evolution CMS bezpečnostních zpráv.';
$_lang["rss_url_security_title"] = 'RSS bezpečnostní zprávy';

$_lang["run_module"] = 'Spustit modul';
$_lang["save"] = 'Uložit';
$_lang["save_all_changes"] = 'Uložit všechny změny';
$_lang["save_tag"] = 'Uložit tag';
$_lang["saving"] = 'Ukládám, prosím čekejte...';

$_lang["search"] = 'Hledat';
$_lang["search_criteria"] = 'Vyhledávací kritéria';
$_lang["search_criteria_content"] = 'Hledat v obsahu';
$_lang["search_criteria_content_msg"] = 'Najít všechny dokumenty obsahující zadaný text.';
$_lang["search_criteria_id"] = 'Hledat podle ID';
$_lang["search_criteria_id_msg"] = 'Zadajte ID dokumentu rychlého vyhledávání.';
$_lang["search_criteria_top"] = 'Search in main fields';
$_lang["search_criteria_top_msg"] = 'Pagetitle, Longtitle, Alias, ID';
$_lang["search_criteria_template_id"] = 'Search by template ID';
$_lang["search_criteria_template_id_msg"] = 'Find all Resources using the specified template.';
$_lang["search_criteria_url_msg"] = 'Find Resource by exact URL.';
$_lang["search_criteria_longtitle"] = 'Hledat podle dlouhého názvu';
$_lang["search_criteria_longtitle_msg"] = 'Najít všechny dokumenty s vloženým textem v dlouhém názvu.';
$_lang["search_criteria_title"] = 'Hledat podle názvu';
$_lang["search_criteria_title_msg"] = 'Najít všechny dokumenty se zadaným textem v nadpise.';
$_lang["search_empty"] = 'Zadaným vyhledávacím kritériům neodpovídá žádný dokument.';
$_lang["search_item_deleted"] = 'Tento dokument byl smazán';
$_lang["search_results"] = 'Výsledky vyhledávání';
$_lang["search_results_returned_desc"] = 'Popis';
$_lang["search_results_returned_id"] = 'ID';
$_lang["search_results_returned_msg"] = 'Your search criteria returned <b>%s</b> Resources. If a lot of results are being returned, try to enter a more specific search.';
$_lang["search_results_returned_title"] = 'Nadpis';
$_lang["search_view_docdata"] = 'Zobrazit tuto položku';

$_lang["security"] = 'Zabezpečení';
$_lang["security_notices_tab"] = 'Bezpečnostní oznámení';
$_lang["security_notices_title"] = 'Bezpečnostní oznámení';

$_lang["select_date"] = 'Vybrat datum';
$_lang["send"] = 'Poslat';
$_lang["server_protocol_http"] = 'http';
$_lang["server_protocol_https"] = 'https';
$_lang["server_protocol_message"] = 'Jestliže vaše stránky používají zabezpečený přístup https, zde můžete tento způsob zadat.';
$_lang["server_protocol_title"] = 'Typ serveru:';
$_lang["serveroffset"] = 'Časový posun oproti serveru';
$_lang["serveroffset_message"] = 'Vyberte hodnotu rozdílu času mezi vaším časovým pásmem s pásmem nastaveným na serveru. Současný čas na serveru je <b>[%s]</b>, čas na serveru po použití a uložení kompenzace je <b>[%s]</b>.';
$_lang["serveroffset_title"] = 'Časový posun oproti serveru:';
$_lang["servertime"] = 'Čas serveru';
$_lang["set_automatic"] = 'Set automatic';
$_lang["set_default"] = 'Set default';
$_lang["set_default_all"] = 'Set defaults';

$_lang["settings_after_install"] = 'Protože jde o novou instalaci, bude potřeba zkontrolovat nastavení Evolution CMS nebo ho upravit. Po kontrole nastavení kliněte na \'Uložit\' pro aktulizaci nastavení v databázi.';
$_lang["settings_config"] = 'Konfigurace';
$_lang["settings_dependencies"] = 'Závislosti';
$_lang["settings_events"] = 'Systemové události';
$_lang["settings_furls"] = 'Zjednodušené URL';
$_lang["settings_general"] = 'Všeobecné';
$_lang["settings_group_tv_message"] = 'Choose if Template Variables should be grouped in sections or tabs (named by TV category) when editing a Resource';
$_lang["settings_group_tv_options"] = 'No,Sections in General tab,Tabs in General tab,Sections in new tab,Tabs in new tab,New tabs';
$_lang["settings_misc"] = 'Správce souborů';
$_lang["settings_security"] = 'Security';
$_lang["settings_KC"] = 'File Browser';
$_lang["settings_page_settings"] = 'Nastavení stránky';
$_lang["settings_photo"] = 'Foto';
$_lang["settings_properties"] = 'Vlastnosti';
$_lang["settings_site"] = 'Web';
$_lang["settings_strip_image_paths_message"] = 'Jestliže nastavíte \'Ne\', Evolution CMS zapíše cestu ke zdroji (obrázek, soubor, flash atd.) jako absolutní. Relativní adresy jsou dobré, jestliže budete přesouvat vaši instalaci Evolution CMS. Jestliže si nejste jistí, co to znamená, je nejlepší nastavit volbu na \'Ano\'.';
$_lang["settings_strip_image_paths_title"] = 'Přepsat cestu k obrázkům?';
$_lang["settings_templvars"] = 'Template Variables';
$_lang["settings_title"] = 'Konfigurace systému';
$_lang["settings_ui"] = 'Rozhraní & vzhled';
$_lang["settings_users"] = 'Uživatel';
$_lang["settings_email_templates"] = 'Email & Templates';

$_lang["show_fullscreen_btn_message"] = 'Show Menu toggle Fullscreen button';
$_lang["show_newresource_btn_message"] = 'Show Menu New Resource button';
$_lang["settings_show_picker_message"] = 'Customize manager theme and save to localstorage';
$_lang["show_fullscreen_btn"] = 'Toggle Fullscreen button';
$_lang["show_newresource_btn"] = 'New Resource button';

$_lang["show_meta"] = 'Zobrazit záložku META klíčových slov';
$_lang["show_meta_message"] = 'Zobrazit zastaralou editaci META klíčových slov při editaci dokumentu v Manager.';
$_lang["show_tree"] = 'Ukázat strom dokumentů';
$_lang["show_picker"] = 'Show Color Switcher';
$_lang["showing"] = 'Zobrazení';
$_lang["signupemail_message"] = 'Zde můžete nastavit zprávu odesílanou uživatelům po vytvoření účtu. Evolution CMS potom odešle email obsahujíci jejich uživatelské jméno a heslo.<br /><b>Poznámka:</b> Následující rezervovaná místa (placeholders) budou nahrazena Správcem obsahu, když pošle zprávu: <br /><br />[+sname+] - Jméno Vaší webové stránky, <br />[+saddr+] - Emailová adresa Vašich stránek, <br />[+surl+] - URL Vašich stránek, <br />[+uid+] - Uživatelské přihlašovací jméno nebo id, <br />[+pwd+] - Uživatelské heslo, <br />[+ufn+] - Celé uživatelovo jméno. <br />[+u_first_name+] - Uživatelovo první jméno. <br />[+u_last_name+] - Uživatelovo příjmení . <br />[+u_middle_name+] - Uživatelovo druhé jméno. <b>Vynecháním [+uid+] a [+pwd+] v emailu způsobíte, že se uživatel nedozví své uživatelské jméno a heslo!</b>';
$_lang["signupemail_title"] = 'Obsah emailu:';
$_lang["site"] = 'Web';
$_lang["site_schedule"] = 'Program';
$_lang["sitename_message"] = 'Zde zadejte název Vašich stránek.';
$_lang["sitename_title"] = 'Název stránky:';
$_lang["sitestart_message"] = 'Zde zadejte ID dokumentu, který budete chtít použít jako svojí úvodní stránku webu. <b>Poznámka: Je nutné vložit ID existujícího dokumentu, který musí být publikován!</b>';
$_lang["sitestart_title"] = 'Úvodní stránka:';
$_lang["sitestatus_message"] = 'Vyberte \'Online\' pro publikování vašich stránek na webu. Jestliže vyberete \'Offline\', návštěvníci uvidí pouze nadpis stránky \'Stránky jsou nedostupné\' a nebudou moci si je prohlížet.';
$_lang["sitestatus_title"] = 'Status webu:';
$_lang["siteunavailable_message"] = 'Tato zpráva se objeví, když jsou stránky ve stavu offline, anebo když dojde k chybě. <b>Poznámka: Tato zpráva se zobrazí jen tehdy, když není nastavena chybová stránka.</b>';
$_lang["siteunavailable_message_default"] = 'Stránky jsou v současné chvíli nedostupné.';
$_lang["siteunavailable_page_message"] = 'Zadejte ID dokumentu, který chcete zobrazit, když jsou stránky offline. <b>POZNÁMKA: Ujistěte se, že ID dokumentu patří existujícímu dokumentu, a že je publikován!</b>';
$_lang["siteunavailable_page_title"] = 'Stránka při nedosažitelnosti webu:';
$_lang["siteunavailable_title"] = 'Stránky jsou nedostupné:';
$_lang["controller_namespace"] = 'Controller Namespace';
$_lang["controller_namespace_message"] = 'Specify the full Namespace from which it is worth taking controllers, for example: <b>EvolutionCMS\\Main\\Controllers\\</b>';
$_lang["update_repository"] = 'GitHub repository path';
$_lang["update_repository_message"] = 'Enter GitHub repository path for example: <b>evocms-community/evolution</b>';

$_lang["sort_alphabetically"] = 'Sort alphabetically';
$_lang["sort_asc"] = 'Vzestupně';
$_lang["sort_desc"] = 'Sestupně';
$_lang["sort_menuindex"] = 'Sort menu index';
$_lang["sort_tree"] = 'Uspořádat strom';
$_lang['sort_updating'] = 'Updating ...';
$_lang['sort_updated'] = 'Updated!';
$_lang['sort_nochildren'] = 'Parent does not have any children';
$_lang["sort_elements_msg"] = 'Drag to reorder the listed elements.';

$_lang["source"] = 'Zdroj';
$_lang["stay"] = 'Pokračovat v úpravách';
$_lang["stay_new"] = 'Přidat další';
$_lang["submit"] = 'Potvrdit';
$_lang["sys_alert"] = 'Výstraha systému';
$_lang["sysinfo_activity_message"] = 'Tento výpis informuje, které dokumenty byli nedávno upravované uživateli.';
$_lang["sysinfo_userid"] = 'Uživatel';
$_lang["system"] = 'System';
$_lang["system_email_signup"] = 'Hello [+uid+]

Here are your login details for [+sname+] Content Manager:

Username: [+uid+]
Password: [+pwd+]

Once you log into the Content Manager ([+surl+]), you can change your password.

Regards,
Site Administrator';
$_lang["system_email_webreminder"] = 'Dobrý den [+uid+]

K aktivaci nového hesla klikněte na následující odkaz:

[+surl+]

Jestliže vše proběhlo v pořádku, můžete užívat následující heslo k přihlášení:

Heslo:[+pwd+]

Jestliže jste si tento e-mail nevyžádali, tak ho prosím ignorujte.

S pozdravem,
správce stránek';
$_lang["system_email_websignup"] = 'Dobrý den [+uid+]

Zde jsou podrobnosti k vašemu přihlášení do [+sname+]:

Uživatel: [+uid+]
Heslo: [+pwd+]

Při prvním přihlášení do [+sname+] si můžete změnit heslo.

S pozdravem,
správce stránek';
$_lang["table_hoverinfo"] = 'Zastavením kurzoru myši nad jménem tabulky zobrazí se krátký popis funkce tabulky (ne všechny tabulky mají nastaveny <i>komentáře</i>).';
$_lang["table_prefix"] = 'Předpona tabulek';
$_lang["tag"] = 'Značka';

$_lang["to"] = 'do';
$_lang["toggle_fullscreen"] = 'Toggle Fullscreen';
$_lang["tools"] = 'Nástroje';
$_lang["top_howmany_message"] = 'Když prohlížíte výpisy ve statistikách, určujete počet položek zobrazených v seznamech "Nejlepších ..."?';
$_lang["top_howmany_title"] = 'Kolik "Nejlepších ...." položek';
$_lang["total"] = 'celkem';
$_lang["track_visitors_message"] = 'Toto nastavení nemá žádný efekt, pokud máte nainstalováno sledování návštěvníků nebo statistiky, které podporují toto nastavení. Logování návštěv vám umožní zobrazit uživatelské statistiky vašich stránek.';
$_lang["track_visitors_title"] = 'Logování návštěv (statistiky)';
$_lang["tree_page_click"] = 'Chování stránky při kliknutí';
$_lang["tree_page_click_message"] = 'Výchozí chování při kliknutí na stránku ve stromu dokumentů.';
$_lang["use_breadcrumbs"] = 'Show navigation';
$_lang["use_breadcrumbs_message"] = 'Show the navigation when creating or editing Resource in the Manager';
$_lang["tree_show_protected"] = 'Ukázat chráněné stránky';
$_lang["tree_show_protected_message"] = 'Pokud nastavíte "Ne", chráněné stránky (a žádní jejich potomci) se nezobrazí ve stromu dokumentů. "Ne" je výchozím nastavením Evolution CMS.';
$_lang["truncate_table"] = 'Klikněte sem pro vyprázdnění této tabulky';
$_lang["type"] = 'Typ';
$_lang["udperms_allowroot_message"] = 'Chcete povolit Vašim užívatelům vytvářet nové dokumenty/složky v kořenovém adresáři stránek? Bez tohoto povolení nebudou moci dokument/složku vytvořit!';
$_lang["udperms_allowroot_title"] = 'Povolit kořenový adresář (root):';
$_lang["udperms_message"] = 'Pomocí přístupových oprávnění určujete stránky, které Vaši uživatelé můžou editovat. Bude potřeba přidělit Vašim uživatelům uživatelské skupiny a dokumentům skupiny dokumentů. Dál musíte určit, kterým užívatelským skupinám povolíte přístup do stanovených skupin dokumentů. Jestliže poprvé tuto funkci zapnete, jen administrátor bude moci upravovat dokumenty.';
$_lang["udperms_title"] = 'Přístupová práva:';
$_lang["unable_set_link"] = 'Nemožné nastavit odkaz!';
$_lang["unable_set_parent"] = 'Není možné nastavit novou nadřazenou složku!';
$_lang["unauthorizedpage_message"] = 'Zadejte ID dokumentu, který chcete zobrazit uživatelům, jestliže požadujete zabezpečený nebo neautorizovaný dokument. <b>POZNÁMKA: Ujistěte se, že zadané ID dokumentu náleží existujícímu dokumentu, a že je publikován a veřejně přístupný!</b>';
$_lang["unauthorizedpage_title"] = 'Stránka neautorizovaného přístupu:';
$_lang["unblock_message"] = 'Tento uživatel nebude zablokován po uložení jeho dat.';
$_lang["undelete_resource"] = 'Obnovit dokument';
$_lang["unpublish_date"] = 'Datum ukončení publikování';
$_lang["unpublish_events"] = 'Události - ukončení publikování';
$_lang["unpublish_resource"] = 'Ukončit publikaci';
$_lang["untitled_resource"] = 'Dokument bez názvu';
$_lang["untitled_weblink"] = 'Odkaz bez názvu';
$_lang["update_params"] = 'Aktualizovat parametr zobrazení';
$_lang["update_settings_from_language"] = 'Nahradit současný s:';

$_lang["upload_maxsize_message"] = 'Zadejte maximální velikost souboru, který může být nahrán prostřednictvím souborového správce. Velikost nahraného souboru musí být zadána v bajtech. <b>POZNÁMKA: Velké soubory se můžou nahrávat velmi dlohou dobu!</b>';
$_lang["upload_maxsize_title"] = 'Maximální velikost nahrávaného souboru';
$_lang["uploadable_files_message"] = 'Zde můžete zadat seznam souborů, které mohou být načtené do \'assets/files/\' použitím souborového správce. Přípony prosím oddělte čárkou.';
$_lang["uploadable_files_title"] = 'Typy souborů, které je možno nahrávat:';
$_lang["uploadable_flash_message"] = 'Zde můžete zadat seznam souborů, které mohou být načtené do \'assets/flash/\' použitím souborového správce. Přípony prosím oddělte čárkou.';
$_lang["uploadable_flash_title"] = 'Typy flash souborů, které je možno nahrávat:';
$_lang["uploadable_images_message"] = 'Zde můžete zadat seznam souborů, které mohou být načtené do \'assets/images/\' použitím souborového správce. Přípony prosím oddělte čárkou.';
$_lang["uploadable_images_title"] = 'Typy obrázků, které je možno nahrávat:';
$_lang["uploadable_media_message"] = 'Zde můžete zadat seznam souborů, které mohou být načtené do \'assets/media/\' použitím souborového správce. Přípony prosím oddělte čárkou.';
$_lang["uploadable_media_title"] = 'Typy médií, které je možno nahrávat:';
$_lang["use_alias_path_message"] = 'Nastavení této volby na \'Ano\' znázorní celou cestu k dokumentu, jestliže dokument má alias. Například, když dokument s aliasem \'podřízený\' je umístěn ve složce s aliasem \'nadřízený\', potom úplá cesta k dokumentu bude znázorněna jako \'/nadřízený/podřížený.html\'.<br /><b>Poznámka: Jestliže nastavíte tuto volbu na \'Ano\' (zapnete cestu k aliasu), musíte pro odkazované věci (jako obrázky, css, javascripty, atd.) používat absolutní cestu:  např., \'/assets/images\' oproti \'assets/images\'.</b>';
$_lang["use_alias_path_title"] = 'Cesta ke zjednodušenému aliasu:';
$_lang["use_editor_message"] = 'Chcete umožnit používání rozšíreného kontextového editoru? Můžete pohodlně navrhovat stránky v režimu WYSIWYG, anebo psát kód HTML. Také můžete editor střídavě vypínat výběrem této volby. Pamatujte, že toto nastavení je použité pro všechnu dokumenty a všechny uživatele!';
$_lang["use_editor_title"] = 'Povolit editor';
$_lang["use_global_tabs"] = 'Use global Tabs';

$_lang["valid_hostnames_message"] = 'Help prevent XSS exploits misusing the site_url system setting by providing a comma separated list of valid hostnames for this installation. This is important for some types of shared hosts or hosts direct accessible via an IP address. First hostname in the list is used if the HTTP_HOST does not match any valid hostname.';
$_lang["valid_hostnames_title"] = 'Valid hostnames';
$_lang["validate_referer_message"] = 'Ověření hlaviček HTTP_REFERER z důvodů snížení nebezpečí, že by Váš editor mohl způsobit neúmyslé postupy ve správci jako oběť CSRF (Cross Site Request Forgery) útoku. Některé nastavení nemusí být použitelné pokud servr neposílá HTTP_REFERER hlavičky.';
$_lang["validate_referer_title"] = 'Ověřit hlavičky HTTP_REFERER';
$_lang["value"] = 'Hodnota';
$_lang["version"] = 'Version';
$_lang["view"] = 'Zobrazit';
$_lang["view_child_resources_in_container"] = 'Zobrazit potomky';
$_lang["view_log"] = 'Zobrazit výpis';
$_lang["view_logging"] = 'Správce procesů';
$_lang["view_sysinfo"] = 'Systémové informace';
$_lang["warning"] = 'Varování!';
$_lang["warning_not_saved"] = 'Změny, které jste v dokumentu provedli, nebudou uložené. Můžete zvolit zda chcete na stránce setrvat a uložit změny (\'Storno\'), nebo stránku opustit a ztratit všechny změny, které jste udělali (\'OK\').';
$_lang["warning_visibility"] = 'Varování konfigurace viditelné pro';
$_lang["warning_visibility_message"] = 'Ovladač viditelnosti varování konfigurace zobrazeného na úvodní stránce manageru';
$_lang["web_access_permissions"] = 'Webová přístupová práva';
$_lang["web_access_permissions_user_groups"] = 'Skupiny návštěvníků';
$_lang["web_permissions"] = 'Webová práva';
$_lang["web_user_management_msg"] = 'Zde si můžete vybrat, kterého webového uživatele si přejete upravit. Pouze weboví uživatelé uvedení zde budou mít přístup do zabezpečené části webových stránek.';
$_lang["web_user_management_title"] = 'Návštěvníci';
$_lang["web_user_management_select_role"] = 'All roles';
$_lang["web_user_title"] = 'Vytvořit/upravit návštěvníka';
$_lang["web_users"] = 'Návštěvníci';
$_lang["weblink"] = 'Hypertextový odkaz';
$_lang["webpwdreminder_message"] = 'Zde napište zprávu, která bude odeslána vašim uživatelům, kteří požádají o přidělení nového hesla e-mailem. Správce obsahu odešle e-mail obsahující nové heslo a aktivační informace. <br /><b>Poznámka:</b> Následující značky (placeholders) budou nahrazeny při odesílání nahrazeny Správcem obsahu: <br /><br />[+sname+] - Jméno vaší webové stránky, <br />[+saddr+] - E-mailová adresa vašich stránek, <br />[+surl+] - URL vašich stránek, <br />[+uid+] - Uživatelské přihlašovací jméno nebo id, <br />[+pwd+] - Uživatelské heslo, <br />[+ufn+] - Celé uživatelovo jméno. <br /><br /><b>Vynecháním [+uid+] a [+pwd+] v e-mailu způsobíte, že se uživatel své uživatelské jméno a heslo!</b>';
$_lang["webpwdreminder_title"] = 'Nastavení emailu při zapomenutém hesle:';
$_lang["websignupemail_message"] = 'Zde můžete nastavit zprávu, která bude zaslána vašim uživatelům webu, když jim vytvoříte webový účet a necháte Správce obsahuzaslat jim e-mail obsahující jejich přístupové jméno a heslo. <br /><b>Poznámka:</b> Následující značky (placeholders) budou nahrazeny při odesílání nahrazeny Správcem obsahu: <br /><br />[+sname+] - Jméno vaší webové stránky, <br />[+saddr+] - E-mailová adresa vašich stránek, <br />[+surl+] - URL vašich stránek, <br />[+uid+] - Uživatelské přihlašovací jméno nebo id, <br />[+pwd+] - Uživatelské heslo, <br />[+ufn+] - Celé uživatelovo jméno. <br /><br /><b>Vynecháním [+uid+] a [+pwd+] v e-mailu způsobíte, že se uživatel své uživatelské jméno a heslo!</b>';
$_lang["websignupemail_title"] = 'Nastavení emailu pro webové přihlášení:';
$_lang["allow_multiple_emails_title"] = 'Duplicate Web User email address';
$_lang["allow_multiple_emails_message"] = 'Allows Web Users to share the same email address for situations when a member may not have their own email address or there is just one family email address.<br/>Note: Any password reminder and registration logic will need to account for this option if set to yes.';
$_lang["welcome_title"] = 'Vítejte v Evolution CMS správci obsahu';
$_lang["which_editor_message"] = 'Zde můžete zvolit, který rozšířený textový editor chcete používat. Můžete si stáhnout a nainstalovat další editory ze stránek Evolution CMS.';
$_lang["which_editor_title"] = 'Použít editor:';
$_lang["working"] = 'Pracuji...';
$_lang["wrap_lines"] = 'Zalomit řádky';
$_lang["xhtml_urls_message"] = 'Nahradí znak ampersand (&amp;) v URL adresách, které jsou generovány Evolution CMS za jejich validní zápis &amp;<!-- -->amp; htmlentity';
$_lang["xhtml_urls_title"] = 'XHTML URL adresy';
$_lang["yes"] = 'Ano';
$_lang["you_got_mail"] = 'Dostali jste poštu';

$_lang["yourinfo_message"] = 'Toto místo zobrazí informace o Vaší osobě';
$_lang["yourinfo_previous_login"] = 'Vaše poslední přihlášení:';
$_lang["yourinfo_role"] = 'Vaše oprávnění je:';
$_lang["yourinfo_title"] = 'Vaše informace';
$_lang["yourinfo_total_logins"] = 'Celkový počet přihlášení:';
$_lang["yourinfo_username"] = 'Jste přihlášen jako:';

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
$_lang["enable_filter_phx_warning"] = 'Pokud je povoleno PHX plugin, vestavěné filtry jsou ve výchozím nastavení zakázány';

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
$_lang["bkmgr_restore_submit"] = 'Vrátit tato data';
$_lang["bkmgr_restore_confirm"] = 'Jste si jisti, že chcete vrátit zálohu\n[+filename+] ?';
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
