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

$_lang["about_msg"] = 'Evolution CMS is een <a href="https://evo-cms.com/" target="_blank">PHP Application Framework en Content Management System</a> gelicenseerd onder <a href="https://www.gnu.org/licenses/gpl-3.0.html">GNU GPL</a>.';
$_lang["about_title"] = 'Over Evolution';

// days
$_lang["monday"] = 'Maandag';
$_lang["tuesday"] = 'Dinsdag';
$_lang["wednesday"] = 'Woensdag';
$_lang["thursday"] = 'Donderdag';
$_lang["friday"] = 'Vrijdag';
$_lang["saturday"] = 'Zaterdag';
$_lang["sunday"] = 'Zondag';

// templates
$_lang["template"] = 'Template';
$_lang["templates"] = 'Templates';
$_lang['templatecontroller'] = 'Sjablooncontroller';
$_lang["template_assignedtv_tab"] = 'Toegekende Template Variabelen';
$_lang["template_code"] = 'Template code (html)';
$_lang["template_desc"] = 'Beschrijving';
$_lang["template_edit_tab"] = 'Wijzig Template';
$_lang["template_inuse"] = 'Deze template is in gebruik. Pas de pagina\'s aan die de template gebruiken. Documenten die deze template gebruiken:';
$_lang["template_management_msg"] = 'Hier kunt u Templates toevoegen en bewerken.';
$_lang["template_msg"] = 'Template toevoegen of bewerken. Gewijzigde/nieuwe Templates zullen niet zichtbaar zijn in de gecachte Pagina\'s van uw website totdat de cache is leeggemaakt. U kunt echter de voorbeeldfunctie op een Pagina gebruiken om de Template te bekijken.';
$_lang["template_name"] = 'Naam Template';
$_lang["template_no_tv"] = 'Er zijn nog geen Template Variabelen aan deze Template toegewezen.';
$_lang["template_notassigned_tv"] = 'Deze Template variabelen zijn beschikbaar voor het toewijzen.';
$_lang["template_reset_all"] = 'Geef alle Pagina\'s het standaard Template';
$_lang["template_reset_specific"] = 'Geef alleen \'%s\' Pagina\'s het standaard Template:';
$_lang["template_assigned_blade_file"] = 'Overeenkomstig blade-bestand';
$_lang["template_create_blade_file"] = 'Maak een sjabloonbestand bij het opslaan';
$_lang["template_selectable"] = 'Template selecteerbaar bij aanmaken of aanpassen van pagina\'s';
$_lang["template_title"] = 'Maak/wijzig Template';
$_lang["template_tv_edit"] = 'Wijzig TV sorteer volgorde';
$_lang["template_tv_edit_message"] = 'Versleep om de volgorde van de Template Variabelen van deze Template te veranderen.';
$_lang["template_tv_edit_title"] = 'Template Variabele volgorde';
$_lang["template_tv_msg"] = 'De aan deze Template toegewezen Template Variabelen staan hieronder vermeld.';

// tmplvars
$_lang["tv"] = 'TV';
$_lang["tmplvar"] = 'Template Variabele';
$_lang["tmplvars"] = 'Template Variabelen';
$_lang["tmplvar_access_msg"] = 'Selecteer de Paginagroepen die de inhoud van deze Template Variabele mogen aanpassen';
$_lang["tmplvar_change_template_msg"] = 'Door het aanpassen van deze Template zal deze Pagina de Template Variabelen opnieuw moeten inlezen. Alle niet opgeslagen veranderingen zullen verloren gaan.\n\n Weet u zeker dat u deze Template aan wilt passen?';
$_lang["tmplvar_inuse"] = 'De volgende Pagina\'s gebruiken deze Template Variabele. Om door te gaan met het verwijderen van de Template Variabele klik op de knop Verwijderen, anders klik op Annuleren.';
$_lang["tmplvar_tmpl_access"] = 'Template toegang';
$_lang["tmplvar_tmpl_access_msg"] = 'Selecteer de Templates die deze Template Variabele mogen gebruiken';
$_lang["tmplvars_binding_msg"] = 'Dit veld ondersteund data bron verbindingen met behulp van @ commando\'s';
$_lang["tmplvars_caption"] = 'Titel';
$_lang["tmplvars_default"] = 'Standaard waarde';
$_lang["tmplvars_description"] = 'Beschrijving';
$_lang["tmplvars_elements"] = 'Invoer optie waarden';
$_lang["tmplvars_inherited"] = 'Geërfde waarde';
$_lang["tmplvars_management_msg"] = 'Beheer extra eigen content velden (Template Variabelen) voor uw Pagina\'s.';
$_lang["tmplvars_msg"] = 'Template Variabelen toevoegen of bewerken. De Template Variabelen moeten aan een Template toegekend worden om ze vanuit Snippets en Pagina\'s te kunnen benaderen net als andere content Variabelen.';
$_lang["tmplvars_name"] = 'Template Variabele naam';
$_lang["tmplvars_novars"] = 'Geen Template Variabelen gevonden.';
$_lang["tmplvars_rank"] = 'Sorteer volgorde';
$_lang["tmplvars_rank_edit_message"] = 'Versleep om volgorde van de Template variabelen aan te passen.';
$_lang["tmplvars_reset_params"] = 'Herstel parameters';
$_lang["tmplvars_title"] = 'Template Variable aanmaken/aanpassen';
$_lang["tmplvars_type"] = 'Invoer type';
$_lang["tmplvars_widget"] = 'Widget';
$_lang["tmplvars_widget_prop"] = 'Widget instellingen';
$_lang["role_no_tv"] = 'Er zijn nog geen variabelen toegewezen aan deze rol.';
$_lang["role_notassigned_tv"] = 'Deze variabelen zijn beschikbaar om toe te wijzen.';
$_lang["role_tv_msg"] = 'De variabelen die aan deze rol zijn toegewezen, worden hieronder vermeld.';
$_lang["tmplvar_roles_access_msg"] = 'Selecteer de rollen die deze Template variabele mogen openen / verwerken';

// snippets
$_lang["snippet"] = 'Snippet';
$_lang["snippets"] = 'Snippets';
$_lang["snippet_code"] = 'Snippet code (php)';
$_lang["snippet_desc"] = 'Beschrijving';
$_lang["snippet_execonsave"] = 'Snippet uitvoeren na opslaan.';
$_lang["snippet_management_msg"] = 'Hier kunt u Snippets toevoegen en bewerken.';
$_lang["snippet_msg"] = 'Snippet toevoegen of bewerken. LET OP, Snippets zijn \'ruwe\' PHP code, en als u verwacht dat de output van de Snippet op een specifiek punt binnen uw Template wordt getoond, dient u een waarde te retourneren binnen deze Snippet.';
$_lang["snippet_name"] = 'Naam Snippet';
$_lang["snippet_properties"] = 'Standaard instellingen';
$_lang["snippet_title"] = 'Maak/wijzig Snippet';

// chunks
$_lang["htmlsnippet"] = 'Chunk';
$_lang["htmlsnippets"] = 'Chunks';
$_lang["htmlsnippet_desc"] = 'Beschrijving';
$_lang["htmlsnippet_management_msg"] = 'Hier kunt u Chunks toevoegen en bewerken.';
$_lang["htmlsnippet_msg"] = 'Chunk toevoegen of bewerken. Denk eraan, Chunks zijn stukjes HTML code en kunnen geen PHP code bevatten.';
$_lang["htmlsnippet_name"] = 'Naam Chunk';
$_lang["htmlsnippet_title"] = 'Maak/wijzig Chunk';
$_lang["chunk"] = 'Chunk';
$_lang["chunk_code"] = 'Chunk code (html)';
$_lang["chunk_multiple_id"] = 'Fout: Meerdere Chunks delen deze unieke ID.';
$_lang["chunk_no_exist"] = 'Chunk bestaat niet.';

// plugins
$_lang["plugin"] = 'Plug-in';
$_lang["plugins"] = 'Plugins';
$_lang["plugin_code"] = 'Plug-in code (php)';
$_lang["plugin_config"] = 'Plug-in configuratie';
$_lang["plugin_desc"] = 'Beschrijving';
$_lang["plugin_disabled"] = 'Plug-in uitgeschakeld';
$_lang["plugin_event_msg"] = 'Selecteer de gebeurtenissen (events) waar deze Plug-in op moet reageren.';
$_lang["plugin_management_msg"] = 'Hier kunt u Plug-ins toevoegen of bewerken.';
$_lang["plugin_msg"] = 'Hier kunt u Plug-ins toevoegen of bewerken. Plug-ins zijn \'ruwe\' PHP instructies die uitgevoerd worden als de geselecteerde systeemgebeurtenissen (events) optreden.';
$_lang["plugin_name"] = 'Naam Plug-in';
$_lang["plugin_priority"] = 'Wijzig Plug-in event volgorde';
$_lang["plugin_priority_instructions"] = 'Om de volgorde van de Plug-ins te veranderen versleep onder elke gebeurtenis (event) de titel. De eerste Plug-in die uitgevoerd dient te worden dient bovenaan te staan.';
$_lang["plugin_priority_title"] = 'Plug-in uitvoer volgorde';
$_lang["purge_plugin"] = 'Verwijder verouderde Plug-ins';
$_lang["purge_plugin_confirm"] = 'Weet u zeker dat u verouderde plug-ins wilt verwijderen?';
$_lang["plugin_title"] = 'Aanmaken/bewerken Plug-in';

// categories
$_lang["category"] = 'Categorie';
$_lang["categories"] = 'Categorieën';
$_lang["category_heading"] = 'Categorie';
$_lang["category_manager"] = 'Categorie Manager';
$_lang["category_management"] = 'Categorie beheren';
$_lang["category_msg"] = 'Bekijk en wijzig hier alle Elementen gegroepeerd per categorie.';

// file
$_lang["file_delete_file"] = 'Verwijder bestand';
$_lang["file_delete_folder"] = 'Verwijder Map';
$_lang["file_deleted"] = 'Gelukt!';
$_lang["file_download_file"] = 'Bestand downloaden';
$_lang["file_download_unzip"] = 'Bestand uitpakken';
$_lang["file_folder_chmod_error"] = 'Geen rechten om machtigingen te wijzigen.';
$_lang["file_folder_created"] = 'Map is aangemaakt!';
$_lang["file_folder_deleted"] = 'Map is verwijderd!';
$_lang["file_folder_not_created"] = 'Kan Map niet aanmaken';
$_lang["file_folder_not_deleted"] = 'Map kan niet verwijderd worden. Zorg ervoor dat de Map leeg is alvorens deze te verwijderen!';
$_lang["file_not_deleted"] = 'Mislukt!';
$_lang["file_not_saved"] = 'Het bestand kan niet worden bewaard. Verzeker uzelf ervan dat u schijfrechten in deze Map heeft!';
$_lang["file_saved"] = 'Bestand succesvol bewaard!';
$_lang["file_unzip"] = 'Uitpakken is gelukt!';
$_lang["file_unzip_fail"] = 'Uitpakken is mislukt!';

// files
$_lang["files"] = 'Bestanden';
$_lang["files_files"] = 'Bestanden';
$_lang["files_access_denied"] = 'Toegang geweigerd!';
$_lang["files_data"] = 'Gegevens';
$_lang["files_dir_listing"] = 'Bestandenlijst voor:';
$_lang["files_directories"] = 'Mappen';
$_lang["files_directory_is_empty"] = 'Deze map is leeg';
$_lang["files_dirwritable"] = 'Map schrijfbaar?';
$_lang["files_editfile"] = 'Bestand bewerken';
$_lang["files_file_type"] = 'Bestandstype: ';
$_lang["files_filename"] = 'Bestandsnaam';
$_lang["files_fileoptions"] = 'Opties';
$_lang["files_filesize"] = 'Bestandsgrootte';
$_lang["files_filetype_notok"] = 'Het uploaden van dergelijke bestanden is niet toegestaan!';
$_lang["files_management"] = 'Bestandsbeheer';
$_lang["files_management_no_permission"] = 'Je hebt niet genoeg rechten om deze bestanden te bekijken of te bewerken. Vraag de beheerder toegang voor <b>%s</b>.';
$_lang["files_modified"] = 'Gewijzigd';
$_lang["files_top_level"] = 'Naar het hoogste niveau';
$_lang["files_up_level"] = 'Een niveau omhoog';
$_lang["files_upload_copyfailed"] = 'Het bestand kon niet naar de gewenste Map gekopieerd worden - uploaden mislukt!';
$_lang["files_upload_error"] = 'Fout';
$_lang["files_upload_error0"] = 'Er was een probleem bij het uploaden.';
$_lang["files_upload_error1"] = 'Het bestand dat u probeert te uploaden is te groot.';
$_lang["files_upload_error2"] = 'Het bestand dat u probeert te uploaden is te groot.';
$_lang["files_upload_error3"] = 'Het bestand dat u probeert te uploaden is slechts gedeeltelijk geupload.';
$_lang["files_upload_error4"] = 'Selecteer een bestand om te uploaden.';
$_lang["files_upload_error5"] = 'Er was een probleem bij het uploaden.';
$_lang["files_upload_inhibited_msg"] = '<b>Upload optie niet toegelaten</b> - controleer of uploaden ondersteund wordt en of de Map voor PHP schrijfbaar is.';
$_lang["files_upload_ok"] = 'Het uploaden van het bestand is succesvol verlopen!';
$_lang["files_upload_permissions_error"] = 'Mogelijk rechten probleem - de Map waar u naartoe wilt uploaden heeft schrijfrechten nodig van uw webserver.';
$_lang["files_uploadfile"] = 'Bestand uploaden';
$_lang["files_uploadfile_msg"] = 'Selecteer een bestand om te uploaden:';
$_lang["files_uploading"] = '<b>%s</b> naar <b>%s/</b> uploaden.';
$_lang["files_viewfile"] = 'Bestand weergeven';

// modules
$_lang["module"] = 'Module';
$_lang["modules"] = 'Modules';
$_lang["module_code"] = 'Module code (php)';
$_lang["module_config"] = 'Module configuratie';
$_lang["module_desc"] = 'Beschrijving';
$_lang["module_disabled"] = 'Module uitgeschakeld';
$_lang["module_edit_click_title"] = 'Klik hier om de Module te bewerken';
$_lang["module_group_access_msg"] = 'Selecteer de Gebruikersgroepen die deze Module binnen het Content Management Systeem mogen uitvoeren.';
$_lang["module_management"] = 'Modulebeheer';
$_lang["module_management_msg"] = 'Hier kunt u Modules toevoegen, bewerken en uitvoeren.<br />Klik op het icoon van de Module om de Module uit te voeren. Klik op de naam van de Module om de Module te bewerken.';
$_lang["module_msg"] = 'Module toevoegen of bewerken. Een Module is een verzameling van Elementen zoals Plug-ins, Snippets, etc.';
$_lang["module_name"] = 'Modulenaam';
$_lang["module_resource_msg"] = 'Elementen waarvan deze Module afhankelijk is kunnen hier worden aangepast. Kies de knop \'toevoegen\' hieronder om een Element toe te voegen.';
$_lang["module_resource_title"] = 'Module afhankelijkheden';
$_lang["module_title"] = 'Modules bewerken/toevoegen';
$_lang["module_viewdepend_msg"] = 'Een Module is afhankelijk van bepaalde Elementen. Klik op de knop \'Beheer afhankelijkheden\' om deze te bewerken.';

// elements
$_lang["element"] = 'Element';
$_lang["elements"] = 'Elementen';
$_lang["element_categories"] = 'Gecombineerde weergave';
$_lang["element_filter_msg"] = 'Zoek in lijst';
$_lang["element_management"] = 'Elementen beheren';
$_lang["element_name"] = 'Element naam';
$_lang["element_selector_msg"] = 'Selecteer de Element(en) uit onderstaande lijst en klik op de knop \'Toevoegen\'.';
$_lang["element_selector_title"] = 'Selecteer een Element';

// resource
$_lang["resource"] = 'Pagina';
$_lang["resource_alias"] = 'Pagina alias';
$_lang["resource_alias_help"] = 'Hier kunt u voor deze Pagina een alias invoeren. Dit zal de Pagina toegangelijk maken als u gebruik maakt van http://uwsite.nl/alias. Dit werkt alleen als u gebruik maakt van zoekmachine vriendelijke URL\'s.';
$_lang["resource_content"] = 'Paginainhoud';
$_lang["resource_description"] = 'Beschrijving';
$_lang["resource_description_help"] = 'Geef een eventuele beschrijving op van deze Pagina.';
$_lang["resource_duplicate"] = 'Dupliceer Pagina';
$_lang["resource_long_title_help"] = 'Geef een langere titel op van deze Pagina. Dit kan handig zijn voor zoekmachines en is misschien ook een betere beschrijving van uw Pagina.';
$_lang["resource_metatag_help"] = 'Selecteer de \'META tags\' of keywords die u aan de Pagina wilt toekennen. Met de CTRL-toets (cmd in Mac OS) kunnen meerdere META tags worden geselecteerd';
$_lang["resource_opt_contentdispo"] = 'Content-Disposition';
$_lang["resource_opt_contentdispo_help"] = 'Gebruik \'Content-Disposition\' om aan te geven hoe de Pagina wordt behandeld door de webbrowser. Gebruik \'Bijlage\' voor separate bestanden.';
$_lang["resource_opt_emptycache"] = 'Cache leegmaken?';
$_lang["resource_opt_emptycache_help"] = 'Als dit veld wordt aangevinkt, wordt de cache leeggemaakt nadat u de pagina hebt opgeslagen. Op deze manier zien uw bezoekers geen oudere versie van de pagina.';
$_lang["resource_opt_folder"] = 'Map?';
$_lang["resource_opt_folder_help"] = 'U kunt deze optie aanvinken om deze pagina als een map voor andere pagina\'s te gebruiken. U hoeft hier niet te veel aandacht aan te besteden, aangezien Evolution map instellingen over het algemeen automatisch verzorgt.';
$_lang["resource_opt_menu_index"] = 'Menu index';
$_lang["resource_opt_menu_index_help"] = 'De menu-index is een veld waarmee u het sorteren van Pagina\'s kunt be&iuml;nvloeden, voornamelijk in menu\'s en opsommingen. U kunt het ook voor andere doeleinden gebruiken in uw Snippets.';
$_lang["resource_opt_menu_title"] = 'Menu titel';
$_lang["resource_opt_menu_title_help"] = 'De menu titel is een optioneel veld dat gebruikt wordt om een korte titel te tonen in menu Snippet(s) of Modules.';
$_lang["resource_opt_published"] = 'Gepubliceerd';
$_lang["resource_opt_published_help"] = 'Vink deze optie aan zodat uw Pagina automatisch gepubliceerd wordt na het opslaan.';
$_lang["resource_opt_richtext"] = 'Teksteditor gebruiken?';
$_lang["resource_opt_richtext_help"] = 'Laat dit aangevinkt staan om de teksteditor voor geavanceerde tekstopmaak bij het bewerken Pagina\'s te gebruiken. Als uw Pagina Javascript code of formulieren bevat is het verstandig om deze optie uit te zetten, zodat u in HTML-modus kunt werken. Dit zorgt ervoor dat uw Pagina correct wordt weergegeven.';
$_lang["resource_opt_show_menu"] = 'Zichtbaar in menu';
$_lang["resource_opt_show_menu_help"] = 'Gebruikt door een aantal Plug-ins/Modules om deze Pagina niet te tonen in een menu.';
$_lang["resource_opt_trackvisit_help"] = 'Sla elke bezoeker op deze Pagina op in het logboek.';
$_lang["resource_overview"] = 'Pagina overzicht';
$_lang["resource_parent"] = 'Hoofdpagina';
$_lang["resource_parent_help"] = 'Selecteer een Pagina in de Website boomstructuur om het als Hoofdpagina van deze Pagina in te stellen.';
$_lang["resource_permissions_error"] = 'Koppel deze Pagina aan tenminste 1 Paginagroep waar u toegang tot heeft.';
$_lang["resource_setting"] = 'Pagina instellingen';
$_lang["resource_summary"] = 'Samenvatting (introductietekst)';
$_lang["resource_summary_help"] = 'Typ een korte beschrijving van de Pagina.';
$_lang["resource_title"] = 'Titel';
$_lang["resource_title_help"] = 'U kunt hier de titel van de Pagina opgeven. Vermijdt het gebruik van backslashes in de naam!';
$_lang["resource_to_be_moved"] = 'De te verplaatsen Pagina';
$_lang["resource_type"] = 'Resource Type';
$_lang["resource_type_message"] = 'Verwijzingen naar weblinks Bronnen op internet, inclusief een andere interne bron, een externe pagina of een afbeelding of ander bestand op internet. Webkoppelingen moeten een tekst/html internetmediatype en inline content afhandeling hebben.';
$_lang["resource_type_weblink"] = 'Weblink';
$_lang["resource_type_webpage"] = 'Webpagina';
$_lang["resource_weblink_help"] = 'Typ het adres van het object dat u wilt verwijzen met deze weblink. Als alternatief kunt u deze invoegen via de bestand browser of gebruik het selectie icoon en kies een bron van de site van de paginaboom aan de linker kant.';
$_lang["resources_in_container"] = 'Pagina\'s in deze Map';
$_lang["resources_in_container_no"] = 'Deze Map bevat geen Subpagina\'s.';

// role
$_lang["role"] = 'Rol';
$_lang["role_about"] = 'Infopagina weergeven';
$_lang["role_actionok"] = '\'Bewerking is voltooid\'-scherm weergeven';
$_lang["role_assets_images"] = 'Beheer afbeeldingen';
$_lang["role_assets_files"] = 'Beheer bestanden';
$_lang["role_bk_manager"] = 'Backupbeheer gebruiken';
$_lang["role_cache_refresh"] = 'De cache van de website leegmaken';
$_lang["role_category_manager"] = 'Gebruik de Categorie Manager';
$_lang["role_change_password"] = 'Wachtwoord wijzigen';
$_lang["role_change_resourcetype"] = 'Pagina type aanpassen';
$_lang["role_chunk_management"] = 'Chunk beheer';
$_lang["role_config_management"] = 'Configuratiebeheer';
$_lang["role_content_management"] = 'Inhoud beheer';
$_lang["role_create_chunk"] = 'Nieuwe Chunks maken';
$_lang["role_create_doc"] = 'Nieuwe Pagina\'s maken';
$_lang["role_create_plugin"] = 'Nieuwe Plug-ins maken';
$_lang["role_create_snippet"] = 'Nieuwe Snippets maken';
$_lang["role_create_template"] = 'Nieuwe website Templates maken';
$_lang["role_credits"] = 'Dankwoord weergeven';
$_lang["role_delete_chunk"] = 'Chunks verwijderen';
$_lang["role_delete_doc"] = 'Pagina\'s verwijderen';
$_lang["role_delete_eventlog"] = 'Verwijder logboek (events)';
$_lang["role_delete_module"] = 'Module verwijderen';
$_lang["role_delete_plugin"] = 'Plug-ins verwijderen';
$_lang["role_delete_role"] = 'Rollen verwijderen';
$_lang["role_delete_snippet"] = 'Snippets verwijderen';
$_lang["role_delete_template"] = 'Templates verwijderen';
$_lang["role_delete_user"] = 'Verwijder manager gebruikers';
$_lang["role_delete_web_user"] = 'Webgebruikers verwijderen';
$_lang["role_edit_chunk"] = 'Chunks bewerken';
$_lang["role_edit_doc"] = 'Een Pagina bewerken';
$_lang["role_edit_doc_metatags"] = '\'META tags\' en keywords van Pagina bewerken';
$_lang["role_edit_module"] = 'Module bewerken';
$_lang["role_edit_plugin"] = 'Plug-ins bewerken';
$_lang["role_edit_role"] = 'Rollen bewerken';
$_lang["role_edit_settings"] = 'Website instellingen veranderen';
$_lang["role_edit_snippet"] = 'Snippets bewerken';
$_lang["role_edit_template"] = 'Website Templates bewerken';
$_lang["role_edit_user"] = 'Bewerk manager gebruikers';
$_lang["role_edit_web_user"] = 'Webgebruikers bewerken';
$_lang["role_empty_trash"] = 'Verwijderde Pagina\'s permanent verwijderen';
$_lang["role_errors"] = 'Waarschuwingsvenster weergeven';
$_lang["role_eventlog_management"] = 'Logboek beheer (events)';
$_lang["role_export_static"] = 'Exporteer statische HTML';
$_lang["role_file_management"] = 'Bestandsbeheer';
$_lang["role_file_manager"] = 'Gebruik bestandsbeheer (volledige toegang)';
$_lang["role_frames"] = 'Verzoek om Content Management Systeem venster';
$_lang["role_help"] = 'Help Pagina\'s weergeven';
$_lang["role_home"] = 'Verzoek om Content Management Systeem Intropagina';
$_lang["role_import_static"] = 'Importeer HTML';
$_lang["role_logout"] = 'Afmelden uit de beheerder';
$_lang["role_list_module"] = 'Module lijst';
$_lang["role_manage_metatags"] = 'Beheer \'META tags\' en keywords';
$_lang["role_management_msg"] = 'Hier kunt u kiezen welke Rol u wenst te wijzigen.';
$_lang["role_management_title"] = 'Rollen';
$_lang["role_messages"] = 'Berichten weergeven/versturen';
$_lang["role_module_management"] = 'Modulebeheer';
$_lang["role_name"] = 'Naam Rol';
$_lang["role_new_module"] = 'Nieuwe Module maken';
$_lang["role_new_role"] = 'Nieuwe Rollen maken';
$_lang["role_new_user"] = 'Maak nieuwe manager gebruikers aan';
$_lang["role_new_web_user"] = 'Webgebruikers toevoegen';
$_lang["role_plugin_management"] = 'Plug-inbeheer';
$_lang["role_publish_doc"] = 'Pagina\'s publiceren';
$_lang["role_remove_locks"] = 'Blokkeringen opheffen';
$_lang["role_role_management"] = 'Rollen';
$_lang["role_run_module"] = 'Module uitvoeren';
$_lang["role_save_chunk"] = 'Chunks opslaan';
$_lang["role_save_doc"] = 'Pagina\'s opslaan';
$_lang["role_save_module"] = 'Module opslaan';
$_lang["role_save_password"] = 'Wachtwoord opslaan';
$_lang["role_save_plugin"] = 'Plug-ins opslaan';
$_lang["role_save_role"] = 'Rollen opslaan';
$_lang["role_save_snippet"] = 'Snippets opslaan';
$_lang["role_save_template"] = 'Templates opslaan';
$_lang["role_save_user"] = 'Manager gebruikers opslaan';
$_lang["role_save_web_user"] = 'Webgebruikers opslaan';
$_lang["role_snippet_management"] = 'Snippetbeheer';
$_lang["role_template_management"] = 'Templatebeheer';
$_lang["role_title"] = 'Rol aanmaken/bewerken';
$_lang["role_udperms"] = 'Toegangsrechtenbeheer';
$_lang["role_user_management"] = 'Manager gebruikersbeheer';
$_lang["role_view_docdata"] = 'Paginagegevens weergeven';
$_lang["role_view_eventlog"] = 'Bekijk logboek (events)';
$_lang["role_view_logs"] = 'Systeemlogboek weergeven';
$_lang["role_view_unpublished"] = 'Bekijk niet gepubliceerde Pagina\'s';
$_lang["role_web_access_persmissions"] = 'Webtoegangsbeheer';
$_lang["role_web_user_management"] = 'Webgebruikersbeheer';

// user
$_lang["user"] = 'Gebruiker';
$_lang["users"] = 'Gebruikers';
$_lang["user_block"] = 'Geblokkeerd';
$_lang["user_blockedafter"] = 'Geblokkeerd na';
$_lang["user_blockeduntil"] = 'Geblokkeerd tot';
$_lang["user_changeddata"] = 'Uw gegevens zijn gewijzigd. A.u.b. opnieuw aanmelden.';
$_lang["user_country"] = 'Land';
$_lang["user_dob"] = 'Geboortedatum';
$_lang["user_doesnt_exist"] = 'Gebruiker bestaat niet';
$_lang["user_edit_self_msg"] = '<b>Wellicht dient u na het opslaan eerst af te melden en dan weer aan te melden om uw gegevens volledig te actualiseren.</b><br />Nieuwe wachtwoorden worden via e-mail toegezonden of op het scherm getoond.';
$_lang["user_email"] = 'E-mail adres';
$_lang["user_failedlogincount"] = 'Aantal mislukte aanmeldpogingen';
$_lang["user_fax"] = 'Fax';
$_lang["user_female"] = 'Vrouw';
$_lang["user_full_name"] = 'Volledige naam';
$_lang["user_first_name"] = 'Voornaam';
$_lang["user_last_name"] = 'Achternaam';
$_lang["user_middle_name"] = 'Middennaam';
$_lang["user_gender"] = 'Geslacht';
$_lang["user_is_blocked"] = 'Deze Gebruiker is geblokkeerd!';
$_lang["user_logincount"] = 'Aantal keren aangemeld';
$_lang["user_male"] = 'Man';
$_lang["user_management_msg"] = 'Hier kunt u Gebruikers toevoegen en bewerken.';
$_lang["user_management_title"] = 'Gebruikers beheren';
$_lang["user_mobile"] = 'Mobiel telefoonnummer';
$_lang["user_phone"] = 'Telefoonnummer';
$_lang["user_photo"] = 'Pasfoto';
$_lang["user_photo_message"] = 'Voer een url voor de foto van deze Gebruiker in of gebruik de \'Invoegen\' knop om een foto te selecteren of te uploaden.';
$_lang["user_prevlogin"] = 'Laatste keer aangemeld';
$_lang["user_role"] = 'Rol';
$_lang["no_user_role"] = 'Geen gebruikersrol';
$_lang["user_state"] = 'Provincie';
$_lang["user_title"] = 'Manager gebruiker creëren/bewerken';
$_lang["user_upload_message"] = 'Als u wilt voorkomen dat deze Gebruiker bestanden in deze categorie kan uploaden, Zorg dan dat \'Gebruik Systeem Configuratie Instellingen\' niet is aangevinkt en laat het veld leeg.';
$_lang["user_use_config"] = 'Gebruik Systeem Configuratie Instellingen';
$_lang["user_verification"] = 'Gebruiker is geverifieerd';
$_lang["user_zip"] = 'Postcode';
$_lang["username"] = 'Gebruikersnaam';
$_lang["username_unique"] = 'Gebruikersnaam is al in gebruik!';
$_lang["user_street"] = 'Adres';
$_lang["user_city"] = 'Stad';
$_lang["user_other"] = 'Anders';

// add
$_lang["add"] = 'Toevoegen';
$_lang["add_chunk"] = 'Chunk toevoegen';
$_lang["add_doc"] = 'Pagina toevoegen';
$_lang["add_folder"] = 'Nieuwe Map';
$_lang["add_plugin"] = 'Plug-in toevoegen';
$_lang["add_resource"] = 'Nieuwe Pagina';
$_lang["add_snippet"] = 'Snippet toevoegen';
$_lang["add_tag"] = 'Tag toevoegen';
$_lang["add_template"] = 'Template toevoegen';
$_lang["add_tv"] = 'TV toevoegen';
$_lang["add_weblink"] = 'Nieuwe Weblink';

// new
$_lang["new_category"] = 'Nieuwe categorie';
$_lang["new_file_permissions_message"] = 'Bij het uploaden van een nieuw bestand in het Bestandsbeheer, zal het Bestandsbeheer proberen de bestandsrechten aan te passen volgens de instellingen die hier zijn opgegeven. Het kan zijn dat dit niet met alle installaties werkt, zoals met IIS, in welk geval u de rechten handmatig moet instellen.';
$_lang["new_file_permissions_title"] = 'Nieuwe bestandsrechten';
$_lang["new_folder_permissions_message"] = 'Als u een nieuwe Map aanmaakt in het Bestandsbeheer, zal het Bestandsbeheer proberen de Maprechten aan te passen volgens de instellingen die hier zijn opgegeven. Het kan zijn dat dit niet met alle installaties werkt, zoals met IIS, in welk geval u de rechten handmatig moet instellen.';
$_lang["new_folder_permissions_title"] = 'Nieuwe map rechten';
$_lang["new_permission"] = 'Nieuwe toegangsrechten';
$_lang["new_htmlsnippet"] = 'Nieuwe Chunk toevoegen';
$_lang["new_keyword"] = 'Voeg een keyword toe:';
$_lang["new_module"] = 'Nieuwe Module toevoegen';
$_lang["new_parent"] = 'Nieuwe Hoofdpagina toevoegen';
$_lang["new_plugin"] = 'Nieuwe Plug-in toevoegen';
$_lang["new_role"] = 'Nieuwe Rol';
$_lang["new_snippet"] = 'Nieuwe Snippet toevoegen';
$_lang["new_template"] = 'Nieuwe Template toevoegen';
$_lang["new_tmplvars"] = 'Nieuwe Template Variabele toevoegen';
$_lang["new_user"] = 'Nieuwe Manager gebruiker';
$_lang["new_web_user"] = 'Nieuwe Webgebruiker toevoegen';
$_lang["new_resource"] = 'Nieuwe pagina';

// manage
$_lang["manage_categories"] = 'Beheer categorieën';
$_lang["manage_depends"] = 'Beheer afhankelijkheden';
$_lang["manage_files"] = 'Bestandsbeheer';
$_lang["manage_htmlsnippets"] = 'Beheer chunks';
$_lang["manage_metatags"] = 'Beheer META tags en keywords';
$_lang["manage_modules"] = 'Modulebeheer';
$_lang["manage_plugins"] = 'Beheer plug-ins';
$_lang["manage_snippets"] = 'Beheer snippets';
$_lang["manage_templates"] = 'Beheer templates';
$_lang["manage_documents"] = 'Beheer documenten';
$_lang["manage_permission"] = 'Toegangsrechten beheren';

// move
$_lang["move"] = 'Verplaatsen';
$_lang["move_resource"] = 'Verplaats Pagina';
$_lang["move_resource_message"] = 'Verplaats een Pagina inclusief Subpagina\'s door een nieuw Hoofdpagina in de Website boomstructuur te selecteren. Als de geselecteerde Pagina geen Map is, wordt er een Map van gemaakt. Selecteer een nieuw Hoofdpagina in de Website boomstructuur.';
$_lang["move_resource_new_parent"] = 'Selecteer een nieuwe Hoofdpagina in de Website boomstructuur.';
$_lang["move_resource_title"] = 'Pagina verplaatsen';

$_lang["access_permissions"] = 'Toegangsrechten';
$_lang["access_permission_denied"] = 'U heeft niet de juiste toegangsrechten voor deze Pagina.';
$_lang["access_permission_parent_denied"] = 'U heeft niet genoeg toegangsrechten om hier een Pagina aan te maken of te verplaatsen! Kies a.u.b. een andere locatie.';
$_lang["access_permissions_add_resource_group"] = 'Maak een nieuwe Paginagroep';
$_lang["access_permissions_add_user_group"] = 'Maak een nieuwe Gebruikersgroep';
$_lang["access_permissions_docs_message"] = 'Geef aan tot welke Paginagroepen deze Pagina behoort';
$_lang["access_permissions_group_link"] = 'Maak een nieuwe groep koppeling';
$_lang["access_permissions_introtext"] = 'Dit is de beheermodule van Gebruikers- en Paginagroepen die worden gebruikt in het toegangsbeheer. Om een Gebruiker toe te voegen aan een groep, volstaat het deze te bewerken en de groepen te kiezen waartoe deze moet behoren. Om een Pagina toe te wijzen aan een Gebruikersgroep, kiest u tijdens het bewerken van de Pagina voor de groepen waartoe de Pagina moet behoren.';
$_lang["access_permissions_link_to_group"] = 'aan Paginagroep';
$_lang["access_permissions_context"] = 'in context';
$_lang["access_permissions_link_user_group"] = 'Koppel Gebruikersgroep';
$_lang["access_permissions_links"] = 'Gebruikersgroep of Paginagroep koppelingen';
$_lang["access_permissions_links_tab"] = 'Geef aan welke Gebruikersgroepen toegang hebben tot bepaalde Paginagroepen (m.a.w. welke groepen Subpagina\'s kunnen maken of bewerken). Om een Pagina toe te wijzen aan een groep kiest u de Pagina uit de lijst en klikt u daarna op \'Verzenden\'. Om een Pagina uit een groep te halen klikt u op \'Verwijder\'.';
$_lang["access_permissions_no_resources_in_group"] = 'Geen.';
$_lang["access_permissions_no_users_in_group"] = 'Geen.';
$_lang["access_permissions_off"] = '<span class="warning">Toegangsbeheer is niet geactiveerd.</span> Dit betekent dat wijzigingen die hier worden gemaakt geen effect hebben zolang toegangsbeheer niet is geactiveerd in uw Configuratie.';
$_lang["access_permissions_resource_groups"] = 'Paginagroepen';
$_lang["access_permissions_resources_in_group"] = '<b>Pagina\'s in deze groep:</b> ';
$_lang["access_permissions_resources_tab"] = 'Bekijk hier de Paginagroepen. U kunt ook nieuwe groepen maken, bestaande bewerken of verwijderen of nagaan welke Pagina deel uitmaakt van een groep. Door met de muis over de ID van de Pagina te bewegen, ziet u de naam ervan. Door de Pagina te bewerken kunt u de groepsrechten wijzigen.';
$_lang["access_permissions_user_toggle"] = 'Toegangsrechten aanpassen';
$_lang["access_permissions_user_groups"] = 'Gebruikersgroepen';
$_lang["access_permissions_user_message"] = 'Geef aan tot welke groepen deze Gebruiker behoort:';
$_lang["access_permissions_users_in_group"] = 'Gebruikers in deze groep:';
$_lang["access_permissions_users_tab"] = 'Bekijk de Gebruikersgroepen. U kunt ook nieuwe groepen maken, bestaande bewerken of verwijderen, of nagaan wie deel uitmaakt van een groep. Om een Gebruiker uit een groep te halen of aan een groep toe te wijzen, wijzigt u de gegevens van de Gebruiker. Beheerders (dit zijn Gebruikers met profiel ID 1) hebben altijd toegang tot alle Pagina\'s dus hoeft u hen niet toe te voegen aan een groep.';

$_lang["users_list"] = 'Gebruikerslijst';
$_lang["documents_list"] = 'Pagina\'s lijst';

$_lang["account_email"] = 'E-mail account';
$_lang["actioncomplete"] = '<b>Actie is succesvol afgerond!</b><br /> - Moment geduld. EVO wordt opgeschoond.';
$_lang["activity_message"] = 'Deze lijst toont de laatst bewerkte/gemaakte pagina\'s:';
$_lang["activity_title"] = 'Recent gemaakte/bewerkte Pagina\'s';

$_lang["administrator_role_message"] = 'Dit profiel kan niet worden bewerkt of verwijderd.';
$_lang["administrators"] = 'Administrators';
$_lang["after_saving"] = 'Na opslaan';
$_lang["alert_delete_self"] = 'U kunt uzelf niet verwijderen!';
$_lang["alias"] = 'Alias';
$_lang["all_doc_groups"] = 'Alle Paginagroepen (onbeveiligd)';
$_lang["all_events"] = 'Alle gebeurtenissen';
$_lang["all_usr_groups"] = 'Alle Gebruikersgroepen (onbeveiligd)';
$_lang["allow_mgr_access"] = 'Toegang tot het Content Management Systeem';
$_lang["allow_mgr_access_message"] = 'Deze optie geeft de gebruiker toegang tot het Content Management Systeem. <b>NB: \'Nee\' betekent dat de gebruiker wordt doorverwezen naar de login pagina of de eerste pagina van de website.</b>';
$_lang["already_deleted"] = 'is reeds verwijderd.';
$_lang["attachment"] = 'Bijlage';
$_lang["author_infos"] = 'Auteur informatie';
$_lang["automatic_alias_message"] = 'Kies \'Ja\' om het systeem automatisch een alias op basis van de titel van de Pagina te laten genereren wanneer de Pagina wordt opgeslagen.';
$_lang["automatic_alias_title"] = 'Genereer automatisch een alias';
$_lang["backup"] = 'Backup';
$_lang["bk_manager"] = 'Backup';
$_lang["block_message"] = 'Deze Gebruiker zal geblokkeerd worden na het opslaan van zijn Gebruikersgegevens!';
$_lang["blocked_minutes_message"] = 'Geef hier het aantal minuten op dat een Gebruiker geblokkeerd zal worden als hij zijn maximaal aantal toegestane aanmeldpogingen heeft bereikt. A.u.b. alleen getallen gebruiken (geen komma\'s, spaties etc.)';
$_lang["blocked_minutes_title"] = 'Minuten geblokkeerd';
$_lang["cache_files_deleted"] = 'Deze bestanden werden verwijderd:';
$_lang["cancel"] = 'Annuleren';
$_lang["captcha_code"] = 'Beveiligingscode';
$_lang["captcha_message"] = 'Door CAPTCHA aan te zetten, worden Gebruikers verplicht een beveiligingscode over te typen. Deze code is in een Afbeelding verwerkt en is daardoor onleesbaar voor machines en automatische programma\'s die erop uit zijn in te breken op uw website.';
$_lang["captcha_title"] = 'CAPTCHA codes gebruiken';
$_lang["captcha_words_default"] = 'EVO,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join,Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote';
$_lang["captcha_words_message"] = 'Vul hier een lijst van woorden in, van elkaar gescheiden door komma\'s, die gebruikt zal worden indien CAPTCHA is ingeschakeld. Het veld kan maximaal 255 tekens bevatten.';
$_lang["captcha_words_title"] = 'CAPTCHA woorden';

$_lang["cfg_base_path"] = 'MODX_BASE_PATH';
$_lang["cfg_base_url"] = 'MODX_BASE_URL';
$_lang["cfg_manager_path"] = 'MODX_MANAGER_PATH';
$_lang["cfg_manager_url"] = 'MODX_MANAGER_URL';
$_lang["cfg_site_url"] = 'MODX_SITE_URL';

$_lang["change_name"] = 'Naam wijzigen';
$_lang["change_password"] = 'Wachtwoord wijzigen';
$_lang["change_password_confirm"] = 'Wachtwoord bevestigen';
$_lang["change_password_message"] = 'Voer uw nieuwe wachtwoord in en voer het nogmaals in om te bevestigen. Uw wachtwoord moet minimaal 6 tekens lang zijn.';
$_lang["change_password_new"] = 'Nieuw wachtwoord';
$_lang["charset_message"] = 'Kies de standaard karakterset codering voor de [(modx_charset)] systeem variabele. Dit be&iuml;nvloed niet het Content Management Systeem.';
$_lang["charset_title"] = 'Karakterset codering';

$_lang["cleaningup"] = 'Opschonen';
$_lang["clean_uploaded_filename"] = 'Gebruik Transliteratie voor Bestanden Uploaden';
$_lang["clean_uploaded_filename_message"] = 'Gebruik de standaard of transalias instelling voor de bestandsnaam om speciale karakters op te schonen';
$_lang["clear_log"] = 'Logboek leegmaken';
$_lang["click_to_context"] = 'Klik om het context menu te openen';
$_lang["click_to_edit_title"] = 'Klik hier om deze regel te bewerken';
$_lang["click_to_view_details"] = 'Klik hier voor details';
$_lang["close"] = 'Sluiten';
$_lang["code"] = 'Code';
$_lang["collapse_tree"] = 'Website boomstructuur inschuiven';
$_lang["comment"] = 'Opmerking';

$_lang["configcheck_admin"] = 'Neem a.u.b. contact op met een systeembeheerder en geef deze melding door!';
$_lang["configcheck_cache"] = 'Kan niet schrijven in de cache Map';
$_lang["configcheck_cache_msg"] = 'EVO kan niet naar de cache map schrijven. EVO functioneert nog steeds zoals verwacht, maar er vindt geen caching plaats. Om dit op te lossen, maak de /cache/ map schrijfbaar.';
$_lang["configcheck_configinc"] = 'Configuratiebestand heeft nog schrijfrechten';
$_lang["configcheck_configinc_msg"] = 'Kwaadwillenden zouden mogelijk schade aan uw website kunnen toebrengen met alle gevolgen van dien. Zet uw configuratiebestand (/[+MGR_DIR+]/includes/config.inc.php) op alleen-lezen!';
$_lang["configcheck_default_msg"] = 'Er is een ongedefinieerde waarschuwing gevonden. Dit is zeer vreemd.';
$_lang["configcheck_errorpage_unavailable"] = 'Er is geen \'Fout\'-pagina voor uw website beschikbaar.';
$_lang["configcheck_errorpage_unavailable_msg"] = 'Dit houdt in dat uw \'Fout\'-pagina niet toegankelijk is voor normale Webgebruikers of niet bestaat. Dit kan leiden tot een oneindige lus en veel foutmeldingen in uw logbestand. Zorg ervoor dat de Pagina niet aan een Webgebruikersgroep is toegewezen.';
$_lang["configcheck_errorpage_unpublished"] = 'De \'Fout\'-pagina voor uw website is niet gepubliceerd of bestaat niet.';
$_lang["configcheck_errorpage_unpublished_msg"] = 'Dit houdt in dat uw \'Fout\'-pagina niet toegankelijk is voor bezoekers. Publiceer de Pagina of zorg ervoor dat het is toegewezen aan een bestaande Pagina in de inhoudsopgave van uw website met het Beheer &gt; Configuratie menu.';
$_lang["configcheck_filemanager_path"] = 'Het momenteel ingestelde <a href="/[+MGR_DIR+]/?a=17&amp;tab=4">Bestandsbeheer pad</a> lijkt onjuist te zijn.';
$_lang["configcheck_filemanager_path_msg"] = 'Dit kan bijvoorbeeld gebeuren door uw installatie naar een andere directory of server te verhuizen. Controleer en update uw Evo systeemconfiguratie.';
$_lang["configcheck_hide_warning"] = '<a href="javascript:hideConfigCheckWarning(\'%s\');"><em>Niet meer tonen.</em></a>';
$_lang["configcheck_images"] = 'De Map images is niet schrijfbaar';
$_lang["configcheck_images_msg"] = 'De Map images is niet schrijfbaar of bestaat niet. Dit betekent dat de Afbeeldingen beheer opties in de teksteditor niet werken!';
$_lang["configcheck_installer"] = 'Het installatiebestand is nog niet verwijderd';
$_lang["configcheck_installer_msg"] = 'De map /install bevat het installatieprogramma voor EVO. Stelt u zich eens voor wat er zou kunnen gebeuren als een boosaardig persoon deze map vindt en het installatieprogramma uitvoert! Ze komen waarschijnlijk niet te ver, omdat ze wat gebruikersinformatie voor de database moeten invoeren, maar het is nog steeds het beste om deze map van je server te verwijderen.';
$_lang["configcheck_lang_difference"] = 'Ongeldig aantal regels in het vertaalbestand';
$_lang["configcheck_lang_difference_msg"] = 'De taal die u heeft geselecteerd (Nederlands) heeft een verschillend aantal eenheden ten opzichte van de standaardtaal. Dit hoeft niet tot problemen te leiden, maar het is wel aan te raden om het huidige vertaalbestand te updaten.';
$_lang["configcheck_notok"] = '&Eacute;&eacute;n of meer configuratie opties zijn onjuist gebleken: ';
$_lang["configcheck_ok"] = 'Controle is geslaagd - er zijn geen onjuistheden gevonden.';
$_lang["configcheck_php_gdzip"] = 'GD en/of Zip PHP extensies niet gevonden';
$_lang["configcheck_php_gdzip_msg"] = 'EVO heeft de GD- en Zip-extensie ingeschakeld voor PHP. Hoewel EVO zonder deze functies werkt, kunt u niet volledig profiteren van de ingebouwde bestandsbeheerder, afbeeldingseditor of Captcha voor aanmeldingen.';
$_lang["configcheck_rb_base_dir"] = 'Het momenteel ingestelde basis <a href="/[+MGR_DIR+]/?a=17&amp;tab=5">Bestandsbeheer pad</a> lijkt onjuist te zijn.';
$_lang["configcheck_rb_base_dir_msg"] = 'Dit kan bijvoorbeeld gebeuren door uw installatie naar een andere directory of server te verplaatsen. Controleer en update uw Evo systeemconfiguratie.';
$_lang["configcheck_register_globals"] = 'register_globals staat op AAN in uw php.ini configuratiebestand';
$_lang["configcheck_register_globals_msg"] = 'Deze instelling maakt uw website veel gevoeliger voor Cross Site Scripting (XSS) aanvallen. Neem contact op met uw host over hoe u deze instelling kunt uitzetten.';
$_lang["configcheck_title"] = 'Configuratietest';
$_lang["configcheck_templateswitcher_present"] = 'TemplateSwitcher Plugin gevonden';
$_lang["configcheck_templateswitcher_present_delete"] = '<a href="javascript:deleteTemplateSwitcher();">Verwijder TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_disable"] = '<a href="javascript:disableTemplateSwitcher();">TemplateSwitcher uitschakelen</a>';
$_lang["configcheck_templateswitcher_present_msg"] = 'De TemplateSwitcher plugin geeft cache en prestatie problemen en er zou alleen gebruik van gemaakt moeten worden wanneer deze functie echt nodig is voor uw website.';
$_lang["configcheck_unauthorizedpage_unavailable"] = 'Uw \'Niet Gemachtigd\'-pagina is niet gepubliceerd of bestaat niet.';
$_lang["configcheck_unauthorizedpage_unavailable_msg"] = 'Dit houdt in dat uw \'Niet Gemachtigd\'-pagina niet toegankelijk is voor normale Webgebruikers of niet bestaat. Dit kan leiden tot een oneindige lus en veel foutmeldingen in uw logbestand. Zorg ervoor dat de Pagina niet aan een Webgebruikersgroep is toegewezen.';
$_lang["configcheck_unauthorizedpage_unpublished"] = 'De \'Niet Gemachtigd\'-pagina die in de configuratie instellingen is aangegeven is niet gepubliceerd.';
$_lang["configcheck_unauthorizedpage_unpublished_msg"] = 'Dit houdt in dat uw \'Niet Gemachtigd\'-pagina niet toegankelijk is voor bezoekers. Publiceer de Pagina of zorg ervoor dat het is toegewezen aan een bestaande Pagina in de inhoudsopgave van uw website met het Beheer &gt; Configuratie menu.';
$_lang["configcheck_validate_referer"] = 'Beveiliging Waarschuwing: HTTP Header Validatie';
$_lang["configcheck_validate_referer_msg"] = 'De configuratie instelling <strong>Validate HTTP_REFERER headers?</strong> staat UIT. We raden aan deze AAN te zetten. <a href="index.php?a=17">Ga naar de Configuratie opties</a>';
$_lang["configcheck_warning"] = 'Configuratie waarschuwing:';
$_lang["configcheck_what"] = 'Wat betekent dit?';

$_lang["safe_mode_warning"] = 'Veilige modus is ingeschakeld. Manager functionaliteit is beperkt.';

$_lang["confirm_block"] = 'Weet u zeker dat u deze Gebruiker wilt blokkeren?';
$_lang["confirm_delete_category"] = 'Weet u zeker dat u deze categorie wilt verwijderen?';
$_lang["confirm_delete_eventlog"] = 'Weet u zeker dat u het logboek (events) wilt leegmaken?';
$_lang["confirm_delete_file"] = 'Weet u zeker dat u dit bestand wilt verwijderen?\n\nHet zou kunnen dat hierdoor uw website niet meer werkt! Verwijder dit bestand uitsluitend indien u zeker bent dat u hiermee niks stuk maakt.';
$_lang["confirm_delete_group"] = 'Weet u zeker dat u deze Groep wilt verwijderen?';
$_lang["confirm_delete_htmlsnippet"] = 'Weet u zeker dat u deze Chunk wilt verwijderen?';
$_lang["confirm_delete_keywords"] = 'Weet u zeker dat u deze keywords wilt verwijderen?';
$_lang["confirm_delete_module"] = 'Weet u zeker dat u deze Module wilt verwijderen?';
$_lang["confirm_delete_plugin"] = 'Weet u zeker dat u deze Plug-in wilt verwijderen?';
$_lang["confirm_delete_record"] = 'Weet u zeker dat u de geselecteerde regels wilt verwijderen?';
$_lang["confirm_delete_resource"] = 'Weet u zeker dat u deze Pagina wilt verwijderen?\nDan worden tevens alle Subpagina\'s verwijderd.';
$_lang["confirm_delete_role"] = 'Weet u zeker dat u deze Rol wilt verwijderen?';
$_lang["confirm_delete_snippet"] = 'Weet u zeker dat u deze Snippet wilt verwijderen?';
$_lang["confirm_delete_tags"] = 'Weet u zeker dat u de geselecteerde \'META tags\' wilt verwijderen?';
$_lang["confirm_delete_template"] = 'Weet u zeker dat u deze Template wilt verwijderen?';
$_lang["confirm_delete_tmplvars"] = 'Weet u zeker dat u deze Template Variabele en alle opgeslagen waarden wilt verwijderen?';
$_lang["confirm_delete_user"] = 'Weet u zeker dat u deze Gebruiker wilt verwijderen?';

$_lang["delete_yourself"] = 'Je kunt jezelf niet verwijderen';
$_lang["delete_last_admin"] = 'U kunt de laatste Admin gebruiker niet verwijderen';

$_lang["confirm_delete_permission"] = 'Weet u zeker dat u deze toestemming wilt verwijderen?';
$_lang["confirm_duplicate_record"] = 'Weet u zeker dat u deze regel wilt dupliceren?';
$_lang["confirm_empty_trash"] = 'Als u de prullenbak leegmaakt worden alle gemarkeerde Pagina\'s permanent verwijderd!\n\nDoorgaan?';
$_lang["confirm_load_depends"] = 'Weet u zeker dat u dit scherm wilt verlaten? De afhankelijkheden van deze Module gaan daarbij verloren!';
$_lang["confirm_name_change"] = 'Het veranderen van de Gebruikersnaam kan invloed hebben op gekoppelde applicaties.\n\n Weet u zeker dat u de Gebruikersnaam wilt veranderen?';
$_lang["confirm_publish"] = '\n\nAls u deze Pagina nu publiceert, dan zal eventuele data van deze publicatie verloren gaan. Als u data t.a.v. (geen) publicatie wilt instellen of behouden, bewerk dan het bestand via de optie \'bewerken\'.\n\nDoorgaan?';
$_lang["confirm_remove_locks"] = 'Soms sluiten Gebruikers hun browservenster gedurende het bewerken van Pagina\'s, Templates, Snippets of parsers. Het gevolg hiervan is dat het item waaraan ze aan het werken waren, geblokkeerd worden voor andere gebruikers. Door op OK te drukken worden alle blokkeringen opgeheven.\n\nDoorgaan?';
$_lang["confirm_reset_sort_order"] = 'Weet u zeker dat u de \"sorteervolgorde/index\" van alle vermelde elementen naar 0 wilt resetten?';
$_lang["confirm_resource_duplicate"] = 'Weet u zeker dat u deze Pagina wilt dupliceren?\nSubmappen en Pagina\'s zullen ook gedupliceerd worden.\n\n NB: Externe gegevens (bijv. keywords, aangepaste Template Variabelen, enz...) worden niet gedupliceerd.';
$_lang["confirm_setting_language_change"] = 'U heeft de standaard waarde gewijzigd en zal de wijzigingen verliezen. Doorgaan?';
$_lang["confirm_unblock"] = 'Weet u zeker dat u voor deze Gebruiker de blokkering wilt opheffen?';
$_lang["confirm_undelete"] = '\n\nVan alle Subpagina\'s die gelijktijdig met deze Pagina verwijderd zijn, zal de verwijdering ongedaan worden gemaakt! Alle Subpagina\'s die eerder verwijderd zijn zullen verwijderd blijven.';
$_lang["confirm_unpublish"] = '\n\nAls u de publicatie van deze Pagina ongedaan wilt maken, dan zal eventuele data van deze publicatie verloren gaan. Als u data van deze publicatie wilt behouden, bewerk dan het bestand met de optie \'bewerken\'.\n\nDoorgaan?';
$_lang["confirm_unzip_file"] = 'Weet u zeker dat dit bestand uitgepakt moet worden?\n\nBestaande bestanden zullen overschreven worden.';

$_lang["could_not_find_user"] = 'Gebruiker niet gevonden';

$_lang["create_folder_here"] = 'Nieuwe Map hier aanmaken';
$_lang["create_resource_here"] = 'Nieuwe Pagina';
$_lang["create_resource_title"] = 'Nieuw Element';
$_lang["create_weblink_here"] = 'Nieuwe Weblink';
$_lang["createdon"] = 'Datum aangemaakt';
$_lang["create_new"] = 'Nieuwe aanmaken';

$_lang["credits"] = 'Dankwoord';
$_lang["credits_shouts_msg"] = '<p>EVO wordt beheerd en bijgehouden op <a href="http://evo.im/" target="_blank">evo.im</a>.</p>';
$_lang["custom_contenttype_message"] = 'Voeg eigen \'content types\' toe. Vul een nieuw type in en klik op de knop \'Toevoegen\' om een nieuw type toe te voegen';
$_lang["custom_contenttype_title"] = 'Toegevoegde content types';

$_lang["database_charset"] = 'Database Karakterset';
$_lang["database_collation"] = 'Database Collatie Karakterset';
$_lang["database_name"] = 'Database naam';
$_lang["database_overhead"] = '<b style="color:#990033;">Opmerking:</b> Overhead is ongebruikte ruimte gereserveerd door MySQL. Om deze ruimte vrij te maken klikt u op de link in de kolom Overhead van de tabel.';
$_lang["database_server"] = 'Database server';
$_lang["database_table_clickbackup"] = 'Backup &amp; download';
$_lang["database_table_clickhere"] = 'Klik hier';
$_lang["database_table_datasize"] = 'Bestandsgrootte';
$_lang["database_table_droptablestatements"] = 'Genereer DROP TABLE commando\'s.';
$_lang["database_table_effectivesize"] = 'Effectieve grootte';
$_lang["database_table_indexsize"] = 'Index grootte';
$_lang["database_table_overhead"] = 'Overhead';
$_lang["database_table_records"] = 'Rijen';
$_lang["database_table_tablename"] = 'Tabel naam';
$_lang["database_table_totals"] = 'Totaal';
$_lang["database_table_totalsize"] = 'Totale grootte';
$_lang["database_tables"] = 'Database tabellen';
$_lang["database_version"] = 'Database versie';

$_lang["date"] = 'Datum';
$_lang["datechanged"] = 'Wijzigingsdatum';
$_lang["datepicker_offset"] = 'Kalender verschil';
$_lang["datepicker_offset_message"] = 'Het aantal jaar in het verleden dat getoond dient te worden in de kalender.';
$_lang["datetime_format"] = 'Datum formaat';
$_lang["datetime_format_message"] = 'Het formaat van de datums in het Content Management Systeem.';

$_lang["default"] = 'Standaard:';
$_lang["defaultcache_message"] = 'Kies \'Ja\' om alle nieuwe Pagina\'s standaard cachebaar te maken.';
$_lang["defaultcache_title"] = 'Standaard cachebaar';
$_lang["defaultmenuindex_message"] = 'Kies \'Ja\' om automatisch verhogen van de menu-index standaard te maken.';
$_lang["defaultmenuindex_title"] = 'Standaard menu indexering';
$_lang["defaultpublish_message"] = 'Kies \'Ja\' om alle nieuwe Pagina\'s standaard te publiceren.';
$_lang["defaultpublish_title"] = 'Standaard gepubliceerd';
$_lang["defaultsearch_message"] = 'Kies \'Ja\' om alle nieuwe Pagina\'s standaard doorzoekbaar te maken.';
$_lang["defaultsearch_title"] = 'Standaard doorzoekbaar';
$_lang["defaulttemplate_message"] = 'Kies hier de standaard Template voor nieuwe Pagina\'s. In de Pagina-editor kunt u eventueel een andere Template kiezen; de keuze die u hier maakt bepaalt louter welke template standaard ingesteld staat.';
$_lang["defaulttemplate_title"] = 'Standaard template';
$_lang["defaulttemplate_logic_title"] = 'Automatisch Template toewijzen';
$_lang["defaulttemplate_logic_general_message"] = 'Nieuwe pagina\'s zullen de volgende template hebben, en terugvallen op hogere niveau\'s:';
$_lang["defaulttemplate_logic_system_message"] = '<strong>Systeem</strong>: Systeem Standaard Template.';
$_lang["defaulttemplate_logic_parent_message"] = '<strong>Onderliggend</strong>: dezelfde template als de onderliggende map.';
$_lang["defaulttemplate_logic_sibling_message"] = '<strong>Zelfde niveau</strong>: dezelfde template als andere pagina\'s in de zelfde map.';

$_lang["delete"] = 'Verwijderen';
$_lang["delete_resource"] = 'Verwijder Pagina';
$_lang["delete_tags"] = 'Tags verwijderen';
$_lang["deleting_file"] = 'Verwijderen bestand `%s`: ';
$_lang["description"] = 'Beschrijving';
$_lang["deselect_keywords"] = 'Zoekwoorden opschonen';
$_lang["deselect_metatags"] = 'Verwijder \'META tags\'';
$_lang["disabled"] = 'Uitgeschakeld';
$_lang["doc_data_title"] = 'Paginadata weergeven';
$_lang["documentation"] = 'Documentatie';

$_lang["duplicate"] = 'Dupliceren';
$_lang["duplicate_alias_found"] = 'Pagina \'%s\' heeft de alias \'%s\' al in gebruik. Kies een unieke alias voor deze Pagina.';
$_lang["duplicate_template_alias_found"] = 'Template \'%s\' is gebruikt al de URL alias \'%s\'. Voer een unieke alias in.';
$_lang["duplicate_alias_message"] = 'Kies \'Ja\' om dubbele aliassen toe te staan wanneer een Pagina wordt opgeslagen. <b>NB: Deze optie kan niet worden gebruikt in combinatie met \'Zoekmachine vriendelijke URL\'s\'.</b>';
$_lang["duplicate_alias_title"] = 'Dubbele aliassen toestaan';
$_lang["duplicate_name_found_general"] = 'Er is al een %s genaamd \'%s\'. Geef a.u.b. een unieke naam op.';
$_lang["duplicate_name_found_module"] = 'Er is al een Module genaamd \'%s\'. Geef a.u.b. een unieke naam op.';
$_lang["duplicated_el_suffix"] = 'Dupliceer';

$_lang["edit"] = 'Bewerk';
$_lang["edit_resource"] = 'Bewerk Pagina';
$_lang["edit_resource_title"] = 'Maak/wijzig Pagina';
$_lang["edit_settings"] = 'Configuratie';
$_lang["editedon"] = 'Datum wijziging';
$_lang["editing_file"] = 'Bewerkt bestand: ';
$_lang["editor_css_path_message"] = 'Geef het pad op naar het CSS-bestand dat u wilt gebruiken binnen de teksteditor. De beste manier om dit pad op te geven is vanaf de \'root\' (basismap) van de server, bijvoorbeeld: /assets/site/style.css. Laat dit veld leeg indien u geen CSS-bestand wilt gebruiken in de teksteditor.';
$_lang["editor_css_path_title"] = 'Pad naar CSS-bestand';

$_lang["email"] = 'E-mail adres';
$_lang["email_sent"] = 'E-mail verzonden';
$_lang["email_unique"] = 'E-mail is al in gebruik!';
$_lang["emailsender_message"] = 'Het e-mailadres van de beheerder van deze site. Dit e-mailadres zal worden gebruikt voor systeem notificaties ed.';
$_lang["emailsender_title"] = 'E-mail adres';
$_lang["emailsubject_default"] = 'Uw inloggegevens';
$_lang["emailsubject_message"] = 'Specificeer het onderwerp van de aanmeldings e-mail.';
$_lang["emailsubject_title"] = 'Onderwerp e-mail';

$_lang["empty_folder"] = 'Deze Map is leeg';
$_lang["empty_recycle_bin"] = 'Prullenbak leegmaken';
$_lang["empty_recycle_bin_empty"] = 'Er zijn geen verwijderde Pagina\'s om permanent te verwijderen.';
$_lang["enable_resource"] = 'Elementen inschakelen';
$_lang["enable_sharedparams"] = 'Delen van parameters inschakelen';
$_lang["enable_sharedparams_msg"] = '<b>NB:</b> Bovenstaande \'Globally Unique ID (GUID)\' wordt gebruikt om deze Module en de gedeelde parameters uniek te identificeren. De GUID wordt ook gebruikt om een link te cre&#235;eren tussen de Module en Plug-ins of Snippets die de gedeelde parameters gebruiken. ';
$_lang["enabled"] = 'Ingeschakeld';
$_lang["error"] = 'Fout';
$_lang["error_sending_email"] = 'Fout bij verzenden e-mail';
$_lang["errorpage_message"] = 'Vul hier een gepubliceerde en publiek toegankelijke Pagina ID in waar u Gebruikers naar wilt doorsturen als ze een niet-bestaande Pagina willen bekijken.';
$_lang["errorpage_title"] = 'Fout pagina';
$_lang["event_id"] = 'Gebeurtenis (event) Id';
$_lang["eventlog"] = 'Logboek (gebeurtenissen)';
$_lang["eventlog_msg"] = 'In het logboek voor gebeurtenissen worden informatie, waarschuwingen en foutmeldingen opgeslagen van het \'Content Management Systeem\'. De kolom \'bron\' geeft het onderdeel van het \'Content Management Systeem\' waarop het bericht betrekking heeft.';
$_lang["eventlog_viewer"] = 'Systeem gebeurtenissen';
$_lang["everybody"] = 'Iedereen';
$_lang["existing_category"] = 'Bestaande categorie';
$_lang["expand_tree"] = 'Website boomstructuur uitklappen';
$_lang["failed_login_message"] = 'Geef het maximum aantal aanmeldpogingen op voordat een Gebruiker geblokkeerd wordt.';
$_lang["failed_login_title"] = 'Mislukte aanmeldpogingen';
$_lang["fe_editor_lang_message"] = 'Kies een taal die de editor gebruikt als front-end editor taal.';
$_lang["fe_editor_lang_title"] = 'Front-end editor taal';

$_lang["filemanager_path_message"] = 'In IIS wordt de instelling document root vaak niet correct ingevuld. Deze wordt door de bestandsbeheerder gebruikt om te bepalen wat u kunt zien. Als u problemen ondervindt bij het gebruik van Bestandsbeheer, zorg er dan voor dat dit pad naar de hoofdmap van uw EVO installatie wijst.';
$_lang["filemanager_path_title"] = 'Pad naar de bestanden';

$_lang["folder"] = 'Map';
$_lang["forgot_password_email_fine_print"] = '* De URL hierboven verloopt als u uw wachtwoord verandert of na vandaag.';
$_lang["forgot_password_email_instructions"] = 'Daar kunt u uw wachtwoord wijzigen via de menu-optie Mijn Profiel.';
$_lang["forgot_password_email_intro"] = 'Er is een verzoek gedaan om het wachtwoord van uw account te wijzigen.';
$_lang["forgot_password_email_link"] = 'Klik hier om het proces af te ronden.';
$_lang["forgot_your_password"] = 'Wachtwoord vergeten?';
$_lang["friendly_alias_message"] = 'Wanneer \'Friendly URLs\' is ingeschakeld wordt er een pagina URL gebruikt in plaats van het pagina ID. Dit wordt voor zoekoptimalisatie aangeraden.';
$_lang["friendly_alias_title"] = 'Gebruik zoekmachine vriendelijke URL\'s';
$_lang["friendlyurls_message"] = 'Gebruik zoekmachine vriendelijke URL\'s op Apache webservers met mod_rewrite of IIS met externe Plug-ins. Zie voor meer informatie het bij de distributie toegevoegde .htaccess bestand.';
$_lang["friendlyurls_title"] = 'Zoekmachine vriendelijke URL\'s';
$_lang["friendlyurlsprefix_message"] = 'Een voorvoegsel van \'pagina\' zorgt ervoor dat de normale URL /index.php?id=2 naar de zoekmachine vriendelijke URL /pagina2.html wordt omgezet (ervan uitgaande dat het achtervoegsel op .html staat ingesteld!).';
$_lang["friendlyurlsprefix_title"] = 'Voorvoegsel zoekmachine vriendelijke URL\'s';
$_lang["friendlyurlsuffix_message"] = 'Elk achtervoegsel die u invoert zal werken, inclusief een leeg achtervoegsel. Bijvoorbeeld \'.html\' zorgt ervoor dat er achter alle zoekmachine vriendelijke URL\'s \'.html\' wordt toegevoegd.';
$_lang["friendlyurlsuffix_title"] = 'Achtervoegsel zoekmachine vriendelijke URL\'s';
$_lang["functionnotimpl"] = 'Sorry!';
$_lang["functionnotimpl_message"] = 'Deze functie is nog niet ontwikkeld.';
$_lang["further_info"] = 'Meer informatie';
$_lang["global_tabs"] = 'Algemene tabbladen';
$_lang["go"] = 'Start';
$_lang["group_access_permissions"] = 'Groepstoegang';
$_lang['group_tvs'] = 'TV groep';
$_lang["guid"] = 'GUID';
$_lang["help"] = 'Help';
$_lang["help_msg"] = '<p>U kunt ondersteuning verkrijgen door <a href="http://forums.modx.com/" target="_blank">de EVO-forums te bezoeken</a> of bekijk de <a href="http://evolution-docs.com" target="_blank">EVO documentatie site.</a></p>';
$_lang["help_title"] = 'Help';
$_lang["hide_tree"] = 'Website boomstructuur verbergen';
$_lang["home"] = 'Start';

$_lang["icon"] = 'Icoon';
$_lang["icon_description"] = 'CSS class b.v. \'fa fa-star\'';
$_lang["id"] = 'ID';
$_lang["illegal_parent_child"] = 'Hoofdpagina toekenning:\n\nPagina is een kind van de geselecteerde Pagina.';
$_lang["illegal_parent_self"] = 'Hoofdpagina toekenning::\n\nDe geselecteerde Pagina kan niet zijn eigen Hoofdpagina zijn.';
$_lang["images_management"] = 'Beheer afbeeldingen';
$_lang["import_files_found"] = '<b>%s Pagina\'s gevonden om te importeren...</b>';
$_lang["import_params"] = 'Gedeelde Module parameters importeren';
$_lang["import_params_msg"] = 'De parameters en instellingen van een Module kunnen worden ge&iuml;mporteerd door de naam van de Module te selecteren uit het bovenstaande menu. <b>NB:</b> Modules verschijnen in het menu wanneer de Module is ingesteld voor het \'delen van parameters\' en wanneer bij de Module is opgegeven dat de Module afhankelijk is van deze Snippet/Plug-in.';
$_lang["import_parent_resource"] = 'Hoofdpagina:';
$_lang["update_tree"] = 'Herbouw de boom';
$_lang["update_tree_description"] = '<ul>
                   <li> - Closure table database design pattern maakt het werken met de boomstructuur handiger en sneller </li>
                     <li> - Als de gegevens in de boomstructuur niet via modellen worden bijgewerkt, bestaat de kans op een onjuiste koppeling van documenten in de database </li>
                     <li> - Deze bewerking lost het probleem op wanneer site_content niet wordt bijgewerkt via het model (opslaan, maken) en de links (afsluitingstabel) niet worden bijgewerkt </li>
                     <li> - Het is ook mogelijk om deze bewerking in CLI-modus uit te voeren via de opdracht \'php artisan closuretable: rebuild\' </li>
                     </ul>';
$_lang["update_tree_danger"] = 'Als je meer dan 1000 bronnen hebt, is het beter om deze operatie uit te voeren in CLI-modus met behulp van de \'php artisan closuretable: rebuild commando\'';
$_lang["update_tree_time"] = 'Rebuild tree voltooid. Documenten verwerkt: <b>%s</b><br>Import nam <b>%s</b> seconden in beslag.';
$_lang["info"] = 'Info';
$_lang["information"] = 'Informatie';
$_lang["inline"] = 'Ge&iuml;ntegreerd';
$_lang["insert"] = 'Invoegen';
$_lang["maxImageWidth"] = 'Maximum afbeelding breedte';
$_lang["maxImageHeight"] = 'Maximum afbeelding hoogte';
$_lang["clientResize"] = 'Formaat van afbeeldingen bijwerken \'on client-side\'';
$_lang["clientResize_message"] = 'Indien ingeschakeld, worden afbeeldingen door de browser verkleind voordat ze naar de server worden geupload';
$_lang["noThumbnailsRecreation"] = 'Genereer thumbnails alleen bij uploaden';
$_lang["noThumbnailsRecreation_message"] = 'De bestandsbrowser maakt alleen thumbnails bij het uploaden; als er voor sommige afbeeldingen geen thumbnails zijn, worden ze niet gemaakt';
$_lang["thumbWidth"] = 'Maximum thumbnail breedte';
$_lang["thumbHeight"] = 'Maximum thumbnail hoogte';
$_lang["thumbsDir"] = 'Thumbnail locatie';
$_lang["jpegQuality"] = 'JPEG compressie';
$_lang["denyZipDownload"] = 'Zip bestanden downloaden uitschakelen';
$_lang["denyExtensionRename"] = 'Uitschakelen hernoemen van bestandsextenties';
$_lang["maxImageWidth_message"] = 'Bij het uploaden van een afbeelding met een te grootte resolutie wordt deze automatisch verkleind. Stel 0 in om dit te vermijden.';
$_lang["maxImageHeight_message"] = 'Bij het uploaden van een afbeelding met een te grootte resolutie wordt deze automatisch verkleind. Stel 0 in om dit te vermijden.';
$_lang["thumbWidth_message"] = 'Maximum thumbnail breedte.';
$_lang["thumbHeight_message"] = 'Maximum thumbnail hoogte.';
$_lang["thumbsDir_message"] = 'De naam van de map (preview).';
$_lang["jpegQuality_message"] = 'JPEG compressie kwaliteit van thumbnails en verschaalde afbeeldingen';
$_lang["showHiddenFiles"] = 'Toon verborgen bestanden in de Bestandsbrowser';
$_lang["keyword"] = 'Keyword';
$_lang["keywords"] = 'Keywords (sleutelwoorden)';
$_lang["keywords_intro"] = 'Een keyword kan worden veranderd door in het invulveld naast het keyword de nieuwe waarde op te geven. Vink \'verwijder keyword\' aan om een keyword te verwijderen. Let erop dat verwijderen voorrang heeft op bewerken.';
$_lang["language_message"] = 'Selecteer de taal voor de Manager.';
$_lang["language_title"] = 'Manager taalkeuze';
$_lang["last_update"] = 'Laatste update';
$_lang["launch_site"] = 'Website bekijken';
$_lang["license"] = 'Licentie';
$_lang["link_attributes"] = 'Link attributen';
$_lang["link_attributes_help"] = 'Hier kunt u attributen opgeven voor de link naar deze Pagina, zoals target=&quot;_blank&quot; of rel=&quot;external&quot;.';
$_lang["list_mode"] = 'Lijst weergave aan/uit - geeft alle rijen in de tabel weer.';
$_lang["loading_doc_tree"] = 'Website boomstructuur wordt geladen...';
$_lang["loading_menu"] = 'Menu wordt geladen...';
$_lang["loading_page"] = 'Even geduld, de pagina wordt geladen..';
$_lang["localtime"] = 'Lokale tijd';

$_lang["lock_htmlsnippet"] = 'Blokkeer Chunk wijzigingen.';
$_lang["lock_htmlsnippet_msg"] = 'Alleen beheerders (profiel ID 1) kunnen deze Chunk wijzigen.';
$_lang["lock_module"] = 'Blokkeer Module wijzigingen.';
$_lang["lock_module_msg"] = 'Alleen beheerders (profiel ID 1) kunnen deze Module bewerken.';
$_lang["lock_msg"] = '%s bewerkt nu %s. Bewerking is niet mogelijk totdat deze Gebruiker klaar is.';
$_lang["lock_plugin"] = 'Blokkeer Plug-in wijzigingen.';
$_lang["lock_plugin_msg"] = 'Alleen beheerders (profiel ID 1) kunnen deze Plug-in wijzigen.';
$_lang["lock_settings_msg"] = '%s is deze instellingen aan het bewerken. Bewerking is niet mogelijk totdat deze Gebruiker klaar is.';
$_lang["lock_snippet"] = 'Blokkeer Snippet wijzigingen.';
$_lang["lock_snippet_msg"] = 'Alleen beheerders (profiel ID 1) kunnen deze Snippet wijzigen.';
$_lang["lock_template"] = 'Blokkeer Template wijzigingen.';
$_lang["lock_template_msg"] = 'Alleen beheerders (profiel ID 1) kunnen deze Template wijzigen.';
$_lang["lock_tmplvars"] = 'Blokkeer Template Variabele wijzigingen.';
$_lang["lock_tmplvars_msg"] = 'Alleen beheerders (profiel ID 1) kunnen deze Template Variabele wijzigen.';
$_lang["locked"] = 'Geblokkeerd';

$_lang["login_allowed_days"] = 'Toegestane dagen';
$_lang["login_allowed_days_message"] = 'Selecteer de dagen dat deze Gebruiker mag inloggen.';
$_lang["login_allowed_ip"] = 'Toegestane IP Adressen';
$_lang["login_allowed_ip_message"] = 'Voer de IP adressen in waarop deze Gebruiker zich mag aanmelden. <b>NB: Meerdere IP adressen worden gescheiden met een komma (,)</b>';
$_lang["login_button"] = 'Aanmelden';
$_lang["login_cancelled_install_in_progress"] = 'Installatie / update van deze website is momenteel in gang gezet. Probeer het a.u.b. nogmaals over een paar minuten!';
$_lang["login_cancelled_site_was_updated"] = 'Installatie / update op deze website is uitgevoerd, meld u a.u.b. nogmaals aan!';
$_lang["login_captcha_message"] = ' De beheerder heeft de Captcha validatie ingeschakeld. Dit betekent dat u deze beveiligingscode hier moet ingeven.\n\nIndien de code slecht leesbaar is, kan u op de code zelf klikken om een nieuwe code te laten aanmaken.';
$_lang["login_homepage"] = 'Login Startpagina';
$_lang["login_homepage_message"] = 'Voer de ID in van de Pagina waarnaar Gebruikers worden verwezen als ze aangemeld zijn. <b>NB: Zorg ervoor dat de ID dat u invoert een bestaand, gepubliceerd en voor deze Gebruiker toegankelijke Pagina is!</b>';
$_lang["login_message"] = 'Om Evolution te gebruiken dient u zich eerst aan te melden. Let op: hierbij wordt onderscheid gemaakt tussen hoofd- en kleine letters!';
$_lang["logo_slogan"] = 'EVO Content Manager - \nCreate and do more with less';
$_lang["logout"] = 'Afmelden';
$_lang["long_title"] = 'Uitgebreide titel';

$_lang["manager"] = 'Content Management Systeem';
$_lang["manager_lockout_message"] = 'U bent momenteel aangemeld bij het Content Management Systeem. Als u uw sessie wilt sluiten, klik dan a.u.b. op de knop "Afmelden". <p />Wilt u naar uw start- of homepage klik dan op de knop "Start".';
$_lang["manager_permissions"] = 'Toegangsbeheer';
$_lang["manager_theme"] = 'Manager thema';
$_lang["manager_theme_message"] = 'Selecteer een thema voor het Content Management Systeem.';
$_lang["manager_theme_mode"] = 'Kleurenschema';
$_lang["manager_theme_mode1"] = 'Manager kleurschema in lichte kleuren';
$_lang["manager_theme_mode2"] = 'Topmenu balk is in donkere kleuren';
$_lang["manager_theme_mode3"] = 'Topmenu balk en boomstructuur zijn in donkere kleuren';
$_lang["manager_theme_mode4"] = 'Manager kleurschema in donkere kleuren';
$_lang['manager_theme_mode_message'] = 'Deze instelling wordt gebruikt als de "standaard" en kan worden overschreven door de manager bij gebruik van de thema kleurmodus omschakel knop in de boomstructuur: <i class="fa fa-lg fa-adjust"></i>';
$_lang['manager_theme_mode_title'] = 'Kleurschema omzetten';

$_lang["meta_keywords"] = 'META keywords';
$_lang["metatag_intro"] = 'Op deze Pagina kunt u \'META tags\' toevoegen, verwijderen en bewerken. De \'META tags\' kunt u aan Pagina\'s toevoegen op de <u>META keywords</u> tab bij het bewerken van een Pagina. Vul een naam en een waarde in voor een nieuwe tag en klik op de \'Tag toevoegen\' knop om een nieuwe \'tag\' toe te voegen. Klik op de naam van een \'tag\' om deze te bewerken.';
$_lang["metatag_notice"] = 'Misschien wilt u een <a href="http://www.html-reference.com/META.asp" target="_blank">HTML Reference Guide</a> raadplegen voor meer informatie. Dit is geen complete lijst van mogelijke Meta Tags.';
$_lang["metatags"] = 'META tags';
$_lang["mgr_access_permissions"] = 'Content Management Systeem toegangsbeheer';
$_lang["mgr_login_start"] = 'Content Management Systeem Login Startpagina';
$_lang["mgr_login_start_message"] = 'Geef de ID van de Pagina dat wordt getoond nadat een Gebruiker is ingelogd. <b>NB: Let erop dat de ID bestaat, dat de Pagina gepubliceerd is en dat de Pagina toegankelijk is voor de Gebruiker!</b>';

$_lang["mgrlog_action"] = 'Handeling';
$_lang["mgrlog_actionid"] = 'Handeling ID';
$_lang["mgrlog_anyall"] = 'Enkele/Alles';
$_lang["mgrlog_datecheckfalse"] = 'checkdate() retourneerde \'false\'.';
$_lang["mgrlog_datefr"] = 'Datum van';
$_lang["mgrlog_dateinvalid"] = 'Onjuiste datumindeling.';
$_lang["mgrlog_dateto"] = 'Datum tot';
$_lang["mgrlog_emptysrch"] = 'Uw zoekopdracht gaf geen resultaten (d.w.z. geen overeenkomstige loggegevens gevonden).';
$_lang["mgrlog_field"] = 'Veld';
$_lang["mgrlog_itemid"] = 'Item ID';
$_lang["mgrlog_itemname"] = 'Item naam';
$_lang["mgrlog_msg"] = 'Bericht';
$_lang["mgrlog_noquery"] = 'Nog geen zoekopdracht opgegeven.';
$_lang["mgrlog_qresults"] = 'Zoekresultaten';
$_lang["mgrlog_query"] = 'Zoek loggegevens';
$_lang["mgrlog_query_msg"] = 'Maak a.u.b. een selectie om de logboeken te bekijken. U kunt log regels op datum selecteren, maar let erop dat de ingegeven einddatums niet inbegrepen zijn - om elke log regel te selecteren van 01-01-2004, vul bij \'datum van\' 01-01-2004 in en bij \'datum tot\' 02-01-2004.<br /><br />Melding en aktie zijn meestal hetzelfde. Als u een specifieke melding zoekt, kunt u het beste de aktie op \'Enkele/Alles\' zetten.';
$_lang["mgrlog_results"] = 'Aantal gevonden';
$_lang["mgrlog_searchlogs"] = 'Logboeken doorzoeken';
$_lang["mgrlog_sortinst"] = 'Sorteer de tabel door op de kolom-kop te klikken. Als de logboeken te groot worden, <a href="index.php?a=55">leeg de logfile</a> om alle huidige loggegevens te wissen. Dit kan niet ongedaan gemaakt worden!';
$_lang["mgrlog_time"] = 'Tijd';
$_lang["mgrlog_user"] = 'Gebruiker';
$_lang["mgrlog_username"] = 'Gebruikersnaam';
$_lang["mgrlog_value"] = 'waarde';
$_lang["mgrlog_view"] = 'Bekijk Content Management Systeem logboeken';

$_lang["modx_news"] = 'Nieuwsmeldingen';
$_lang["modx_news_tab"] = 'EVO Nieuws';
$_lang["modx_news_title"] = 'EVO Nieuws';
$_lang["modx_security_notices"] = 'Beveiligingswaarschuwingen';
$_lang["modx_version"] = 'EVO versie';

$_lang["name"] = 'Naam';

$_lang["no"] = 'Nee';
$_lang["no_active_users_found"] = 'Geen actieve Gebruikers gevonden.';
$_lang["no_activity_message"] = 'U heeft nog geen Pagina\'s gemaakt/gewijzigd.';
$_lang["no_category"] = 'Niet gecategoriseerd';
$_lang["no_docs_pending_publishing"] = 'Geen Pagina\'s om te publiceren.';
$_lang["no_docs_pending_pubunpub"] = 'Geen gebeurtenissen gevonden.';
$_lang["no_docs_pending_unpublishing"] = 'Geen Pagina\'s om publicatie te be&#235;indigen.';
$_lang["no_edits_creates"] = 'Geen wijzigingen of toevoegingen gevonden.';
$_lang["no_groups_found"] = 'Geen groepen gevonden.';
$_lang["no_keywords_found"] = 'Er zijn momenteel geen keywords.';
$_lang["no_records_found"] = 'Geen resultaten gevonden.';
$_lang["no_results"] = 'Geen resultaten gevonden.';
$_lang["nologentries_message"] = 'Voer hier het aantal logresultaten in dat per Pagina in het logboek moet worden weergegeven.';
$_lang["nologentries_title"] = 'Aantal log resultaten';
$_lang["none"] = 'Geen';
$_lang["noresults_message"] = 'Het aantal regels dat wordt weergegeven in lijsten met bijvoorbeeld zoekresultaten';
$_lang["noresults_title"] = 'Aantal regels';
$_lang["not_deleted"] = 'is niet verwijderd!';
$_lang["not_set"] = 'Niet ingesteld';

$_lang["offline"] = 'Offline';

$_lang["online"] = 'Online';
$_lang["onlineusers_action"] = 'Handeling';
$_lang["onlineusers_actionid"] = 'Handeling ID';
$_lang["onlineusers_ipaddress"] = 'IP adres Gebruiker';
$_lang["onlineusers_lasthit"] = 'Laatste bezoek';
$_lang["onlineusers_message"] = 'In deze lijst vindt u de actieve Gebruikers van de laatste 20 minuten (De huidige tijd is ';
$_lang["onlineusers_title"] = 'Gebruikers online';
$_lang["onlineusers_user"] = 'Gebruiker';
$_lang["onlineusers_userid"] = 'Gebruikers ID';

$_lang["optimize_table"] = 'Klik hier om deze tabel te optimaliseren';

$_lang["page_data_alias"] = 'Alias';
$_lang["page_data_cacheable"] = 'Cache-baar';
$_lang["page_data_cacheable_help"] = 'Dit zorgt ervoor dat deze Pagina in de cache opgeslagen kan worden. Zorg dat deze optie niet aangevinkt is als uw Pagina Snippets bevat!';
$_lang["page_data_cached"] = '<b>Bron uit cache gehaald:</b>';
$_lang["page_data_changes"] = 'Veranderingen';
$_lang["page_data_contentType"] = 'Soort inhoud';
$_lang["page_data_contentType_help"] = 'Kies de soort van inhoud voor deze Pagina. Bent u hierover onzeker, laat dan de keuze op text/html.';
$_lang["page_data_created"] = 'Gemaakt';
$_lang["page_data_edited"] = 'Gewijzigd';
$_lang["page_data_editor"] = 'Bewerk met de geavanceerde teksteditor';
$_lang["page_data_folder"] = 'Pagina is een Map';
$_lang["page_data_general"] = 'Algemeen';
$_lang["page_data_markup"] = 'Opmaak/structuur';
$_lang["page_data_mgr_access"] = 'Content Management Systeem toegang';
$_lang["page_data_notcached"] = 'Deze Pagina is (nog) niet gecached.';
$_lang["page_data_publishdate"] = 'Publicatiedatum';
$_lang["page_data_publishdate_help"] = 'Wanneer u een publicatiedatum instelt, wordt de Pagina vanaf deze datum gepubliceerd. Klik op het kalenderpictogram om een datum te selecteren, of op het pictogram ernaast om de publicatiedatum te verwijderen. Dit houdt in dat de Pagina niet automatisch wordt gepubliceerd.';
$_lang["page_data_published"] = 'Gepubliceerd';
$_lang["page_data_searchable"] = 'Doorzoekbaar';
$_lang["page_data_searchable_help"] = 'U kunt deze optie aanvinken om het doorzoeken van de Pagina toe te staan. U kunt het ook voor andere doeleinden gebruiken in uw Snippets.';
$_lang["page_data_source"] = 'Bron';
$_lang["page_data_status"] = 'Status';
$_lang["page_data_template"] = 'Template';
$_lang["page_data_template_help"] = 'Hier kunt u de Template voor de Pagina selecteren.';
$_lang["page_data_title"] = 'Pagina gegevens';
$_lang["page_data_unpublishdate"] = 'Datum einde publicatie';
$_lang["page_data_unpublishdate_help"] = 'Wanneer u een datum einde publicatie instelt, wordt vanaf deze datum de publicatie be&#235;indigd. Klik op het kalenderpictogram om een datum te selecteren, of op het pictogram ernaast om de datum waarop de publicatie be&#235;indigd wordt, te verwijderen. Dit houdt in dat de publicatie van de Pagina niet automatisch be&#235;indigd wordt.';
$_lang["page_data_unpublished"] = 'Niet-gepubliceerd';
$_lang["page_data_web_access"] = 'Webtoegang';

$_lang["pagetitle"] = 'Titel van de Pagina';
$_lang["pagination_table_first"] = 'Eerste';
$_lang["pagination_table_gotopage"] = 'Ga naar Pagina';
$_lang["pagination_table_last"] = 'Laatste';
$_lang["paging_first"] = 'eerste';
$_lang["paging_last"] = 'laatste';
$_lang["paging_next"] = 'volgende';
$_lang["paging_prev"] = 'vorige';
$_lang["paging_showing"] = 'Toon';
$_lang["paging_to"] = 'tot';
$_lang["paging_total"] = 'totaal';
$_lang["parameter"] = 'Parameter';
$_lang["parse_docblock"] = 'Parse DocBlock';
$_lang["parse_docblock_msg"] = 'Let op (!): <b>Hersteld</b> de oorspronkelijke naam, configuratie, beschrijving en categorie naar standaard instellingen door het parsen van de broncode.';

$_lang["password"] = 'Wachtwoord';
$_lang["password_change_request"] = 'Verzoek wachtwoord wijzigen';
$_lang["password_confirmed"] = 'Wachtwoord komt niet overeen';
$_lang["password_gen_gen"] = 'Wachtwoord laten genereren';
$_lang["password_gen_length"] = 'Het wachtwoord moet minstens 6 karakters lang zijn.';
$_lang["password_gen_method"] = 'Hoe wilt u het wachtwoord voor deze Gebruiker aanmaken?';
$_lang["password_gen_specify"] = 'Laat mij het wachtwoord specificeren:';
$_lang["password_method"] = 'Hoe wilt u deze Gebruiker op de hoogte stellen van het nieuwe wachtwoord?';
$_lang["password_method_email"] = 'Verstuur het nieuwe wachtwoord via e-mail.';
$_lang["password_method_screen"] = 'Geef het nieuwe wachtwoord op het beeldscherm weer.';
$_lang["password_msg"] = 'Het nieuwe wachtwoord voor <b>:username</b> is <b>:password</b><br>';

$_lang["php_version_check"] = 'Je gebruikt PHP versie %s%. Voer een upgrade van uw PHP-installatie uit!';

$_lang["preview"] = 'Voorbeeld';
$_lang["preview_msg"] = 'Dit is een voorbeeld van uw laatst opgeslagen wijzigingen. Klik hier om uw huidige wijzigingen <a href="javascript:;" onclick="saveRefreshPreview();">op te slaan en te vernieuwen</a>.';
$_lang["preview_resource"] = 'Pagina voorbeeld';

$_lang["private"] = 'Gesloten';
$_lang["public"] = 'Open';
$_lang["publish_date"] = 'Publicatiedatum';
$_lang["publish_events"] = 'Publiceer gebeurtenissen';
$_lang["publish_resource"] = 'Publiceer Pagina';

$_lang["rb_base_dir_message"] = 'Voer het fysieke pad naar de map Bestandsbrowser in. Deze instelling wordt meestal automatisch gegenereerd. Als u IIS echter gebruikt, is het mogelijk dat EVO het pad niet zelfstandig kan bewerken, waardoor de bestandsbrowser een foutmelding geeft.';
$_lang["rb_base_dir_title"] = 'Pad naar de bestanden';
$_lang["rb_base_url_message"] = 'Voer de virtuele pad naar de bestanden map in. Deze instelling wordt meestal automatisch gegenereerd. Als u IIS echter gebruikt, is het mogelijk dat EVO de URL niet zelf kan bewerken, waardoor de bestandsbrowser een foutmelding vertoont. In dat geval kunt u hier de URL van de afbeeldingenlijst invoeren.';
$_lang["rb_base_url_title"] = 'URL naar de bestanden';
$_lang["rb_message"] = 'Kies \'ja\' om de bestandsbeheer in te schakelen. Met bestandsbeheer is het voor Gebruikers eenvoudig mogelijk om bestanden zoals afbeeldingen, flash en media op de server te plaatsen.';
$_lang["rb_title"] = 'Bestandsbeheer inschakelen';
$_lang["rb_webuser_message"] = 'Wilt u de Webgebruikers toestaan de bestanden op de server te beheren? <b>WAARSCHUWING:</b> Door dit toe te staan kunnen Webgebruikers dezelfde bestanden beheren als de website beheerder(s). Gebruik dit alleen voor Webgebruikers die u vertrouwd.';
$_lang["rb_webuser_title"] = 'Webgebruikers';
$_lang["recent_docs"] = 'Recente Pagina\'s';
$_lang["recommend_setting_change_title"] = 'Aan te raden aangepaste instelling ';
$_lang["recommend_setting_change_description"] = 'Uw website is niet geconfigureerd om de HTTP_REFERER te valideren voor inkomende Manager aanvragen. We raden aan deze instelling aan te zetten om CSRF (Cross Site Request Forgery) aanvallen te minimaliseren.';
$_lang["references"] = 'Referenties';
$_lang["refresh_cache"] = 'Cache: <b>%s</b> bestanden in cache-map gevonden en <b>%d</b> bestanden verwijderd.<p>Nieuwe cache-bestanden worden aangemaakt wanneer Pagina\'s worden opgevraagd.';
$_lang["refresh_published"] = '<b>%s</b> Pagina\'s zijn gepubliceerd.';
$_lang["refresh_site"] = 'Cache legen';
$_lang["refresh_title"] = 'Website vernieuwen';
$_lang["refresh_tree"] = 'Website boomstructuur vernieuwen';
$_lang["refresh_unpublished"] = '<b>%s</b> Pagina\'s zijn niet gepubliceerd.';
$_lang["release_date"] = 'Publicatie datum';
$_lang["remember_last_tab"] = 'Tabs onthouden';
$_lang["remember_last_tab_message"] = 'Manager pagina\'s met Tabs laden met de laatst bekeken tab in plaats van standaard de eerst bekeken tab';
$_lang["remember_username"] = 'Onthoud mij';
$_lang["remove"] = 'Verwijderen';
$_lang["remove_date"] = 'Verwijder datum';
$_lang["remove_locks"] = 'Blokkeringen opheffen';
$_lang["rename"] = 'Hernoem';
$_lang["reports"] = 'Rapportage';
$_lang["report_issues"] = 'Problemen rapporteren';
$_lang["required_field"] = 'Veld :veld is verplicht';
$_lang["require_tagname"] = 'Een naam voor de \'tag\' is vereist.';
$_lang["require_tagvalue"] = 'Een waarde voor de \'tag\' is vereist.';
$_lang["reserved_name_warning"] = 'U heeft een gereserveerde naam gebruikt.';
$_lang["reset"] = 'Reset';
$_lang["reset_failedlogins"] = 'reset';
$_lang["reset_sort_order"] = 'Herstel sorteer instellingen';

$_lang["manager_access_permissions"] = 'Manager toegangsrechten';
$_lang["manage_groups"] = 'Beheer document- en gebruikersgroepen';
$_lang["manage_document_permissions"] = 'Beheer documenten toegang';
$_lang["manage_module_permissions"] = 'Beheer module toegang';
$_lang["manage_tv_permissions"] = 'Beheer Template Variabelen toegang';

$_lang["rss_url_news_default"] = 'https://github.com/evocms-community/evolution/releases.atom';
$_lang["rss_url_news_message"] = 'Voer de URL in voor de Nieuws Feed.';
$_lang["rss_url_news_title"] = 'RSS nieuws feed';
$_lang["rss_url_security_default"] = 'https://github.com/extras-evolution/security-fix/releases.atom';
$_lang["rss_url_security_message"] = 'Voer de URL in voor de beveiligingsfeed.';
$_lang["rss_url_security_title"] = 'RSS Beveiliging Feed';

$_lang["run_module"] = 'Module uitvoeren';
$_lang["save"] = 'Opslaan';
$_lang["save_all_changes"] = 'Bewaar alle wijzigingen';
$_lang["save_tag"] = 'Tag opslaan';
$_lang["saving"] = 'Bezig met opslaan, een moment geduld a.u.b...';

$_lang["search"] = 'Zoeken';
$_lang["search_criteria"] = 'Zoekcriteria';
$_lang["search_criteria_content"] = 'Op inhoud zoeken';
$_lang["search_criteria_content_msg"] = 'Zoek alle Pagina\'s met de ingevoerde tekst in de inhoud.';
$_lang["search_criteria_id"] = 'Op ID zoeken';
$_lang["search_criteria_id_msg"] = 'Voer de ID van de Pagina in om de Pagina snel te vinden.';
$_lang["search_criteria_top"] = 'Zoeken in belangrijkste velden';
$_lang["search_criteria_top_msg"] = 'Pagetitel, Uitgebreide titel, URL, ID';
$_lang["search_criteria_template_id"] = 'Op template ID zoeken';
$_lang["search_criteria_template_id_msg"] = 'Zoek alle pagina\'s die de gekozen template gebruikt.';
$_lang["search_criteria_url_msg"] = 'Zoek pagina met exacte URL.';
$_lang["search_criteria_longtitle"] = 'Zoek op uitgebreide titel';
$_lang["search_criteria_longtitle_msg"] = 'Zoek alle Pagina\'s met de ingevoerde tekst in hun uitgebreide titel.';
$_lang["search_criteria_title"] = 'Op titel zoeken';
$_lang["search_criteria_title_msg"] = 'Zoek alle Pagina\'s met de ingevoerde tekst in hun titel.';
$_lang["search_empty"] = 'Uw zoekopdracht heeft geen resultaten opgeleverd. Verruim uw zoekcriteria en probeer het nogmaals.';
$_lang["search_item_deleted"] = 'Dit item is verwijderd';
$_lang["search_results"] = 'Zoekresultaten';
$_lang["search_results_returned_desc"] = 'Beschrijving';
$_lang["search_results_returned_id"] = 'ID';
$_lang["search_results_returned_msg"] = 'Uw zoekcriteria toont<b>%s</b> pagina\'s. Als er veel resultaten worden getoond, probeer dan een meer specifieke zoekopdracht in te voeren.';
$_lang["search_results_returned_title"] = 'Titel';
$_lang["search_view_docdata"] = 'Geef dit item weer';

$_lang["security"] = 'Gebruikers';
$_lang["security_notices_tab"] = 'Beveiligingswaarschuwingen';
$_lang["security_notices_title"] = 'Beveiligingswaarschuwingen';

$_lang["select_date"] = 'Selecteer een datum';
$_lang["send"] = 'Verzenden';
$_lang["server_protocol_http"] = 'http';
$_lang["server_protocol_https"] = 'https';
$_lang["server_protocol_message"] = 'Geef hier aan of uw website gebruik maakt van een https verbinding.';
$_lang["server_protocol_title"] = 'Server type';
$_lang["serveroffset"] = 'Server verschil';
$_lang["serveroffset_message"] = 'Selecteer hier het aantal uren tijdsverschil tussen uw huidige locatie en de servertijd. De huidige tijd op de server is <b>[%s]</b>, de huidige tijd op de server rekening houdend met het op dit moment opgeslagen tijdsverschil is <b>[%s]</b>.';
$_lang["serveroffset_title"] = 'Server tijdsverschil';
$_lang["servertime"] = 'Server tijd';
$_lang["set_automatic"] = 'Stel in als automatisch';
$_lang["set_default"] = 'Stel in als standaard';
$_lang["set_default_all"] = 'Stel standaarden in';

$_lang["settings_after_install"] = 'Omdat dit een nieuwe installatie is, moet u deze instellingen bekijken en wijzigen waar nodig. Nadat u de instellingen hebt bekeken, drukt u op \'Opslaan\' om de instellingen bij te werken.';
$_lang["settings_config"] = 'Configuratie';
$_lang["settings_dependencies"] = 'Afhankelijkheden';
$_lang["settings_events"] = 'Systeemgebeurtenissen';
$_lang["settings_furls"] = 'Zoekmachine vriendelijke URL\'s';
$_lang["settings_general"] = 'Algemeen';
$_lang["settings_group_tv_message"] = 'Kies of Template Variabelen moeten worden gegroepeerd in secties of tabbladen (benoemd door tv-categorie) bij het bewerken van een pagina';
$_lang["settings_group_tv_options"] = 'Nee, secties op het tabblad Algemeen, tabbladen op het tabblad Algemeen, secties op nieuw tabblad, tabbladen op nieuw tabblad, nieuwe tabbladen';
$_lang["settings_misc"] = 'Overige';
$_lang["settings_security"] = 'Beveiliging';
$_lang["settings_KC"] = 'Bestandsbrowser';
$_lang["settings_page_settings"] = 'Pagina instellingen';
$_lang["settings_photo"] = 'Foto';
$_lang["settings_properties"] = 'Instellingen';
$_lang["settings_site"] = 'Website';
$_lang["settings_strip_image_paths_message"] = 'Als dit op \'Nee\' staat zal de bestandsbrowser src\'s (afbeeldingen, bestanden, enz.) als absolute URL\'s worden geplaatst. Relatieve URL\'s zijn handig als u uw installatie wilt verplaatsen, bijvoorbeeld van een demosite naar een productiesite. Als je geen idee hebt wat dit betekent, kun je het het beste gewoon laten staan op \'Ja\'.';
$_lang["settings_strip_image_paths_title"] = 'Browserpaden herschrijven?';
$_lang["settings_templvars"] = 'Template Variabelen';
$_lang["settings_title"] = 'Systeem configuratie';
$_lang["settings_ui"] = 'Interface & mogelijkheden';
$_lang["settings_users"] = 'Gebruiker';
$_lang["settings_email_templates"] = 'E-mail & Templates';

$_lang["show_fullscreen_btn_message"] = 'Toon Volledig scherm knop';
$_lang["show_newresource_btn_message"] = 'Toon Nieuwe pagina knop';
$_lang["settings_show_picker_message"] = 'Pas het thema van de manager aan en sla op in de lokale opslag';
$_lang["show_fullscreen_btn"] = 'Volledig scherm switchen';
$_lang["show_newresource_btn"] = 'Nieuwe pagina knop';

$_lang["show_meta"] = 'Toon META Keywords tab';
$_lang["show_meta_message"] = 'Toon de verouderde META Keywords tab wanneer Pagina\'s worden aangepast in the Manager.';
$_lang["show_tree"] = 'Website boomstructuur weergeven';
$_lang["show_picker"] = 'Toon manager kleurenpalet';
$_lang["showing"] = 'Weergeven';
$_lang["signupemail_message"] = 'Hier kunt u het bericht instellen die naar uw gebruikers verstuurd wordt wanneer u voor hun een account heeft aangemaakt en Evolution een e-mail laat sturen met hun gebruikersnaam en wachtwoord. <br /><br />De volgende codes worden door Evolution vervangen als het bericht verstuurd wordt: <br /><br /> [+sname+] - naam van uw website, <br />[+saddr+] - e-mail adres van uw website, <br />[+surl+] - adres van de website, <br />[+uid+] - gebruikersnaam of id, <br />[+pwd+] - wachtwoord, <br />[+ufn+] - volledige naam. <br /><br /><b>Laat de [+uid+] en [+pwd+] codes in de e-mail staan, omdat de gebruikersnaam en het wachtwoord anders niet in de e-mail komen te staan en uw gebruikers daardoor hun aanmeldgegevens niet ontvangen!</b>';
$_lang["signupemail_title"] = 'Registratie e-mail';
$_lang["site"] = 'Website';
$_lang["site_schedule"] = 'Website planning';
$_lang["sitename_message"] = 'Vul hier de naam van uw website in.';
$_lang["sitename_title"] = 'Naam website';
$_lang["sitestart_message"] = 'Vul hier de ID van de Pagina in dat u als startpagina wilt gebruiken. <br /><b>NB: Let op dat dit de ID van een bestaande Pagina is en het tevens gepubliceerd is!</b>';
$_lang["sitestart_title"] = 'Startpagina website';
$_lang["sitestatus_message"] = 'Kies \'Online\' om uw website op het web te publiceren. Als u de optie \'Offline\' selecteerd, dan zullen uw bezoekers de \'Website niet beschikbaar\' bericht te zien krijgen. Ze kunnen uw website dan niet bekijken!';
$_lang["sitestatus_title"] = 'Website status';
$_lang["siteunavailable_message"] = 'Dit bericht krijgen Gebruikers te zien als de website offline is of als er een fout mocht optreden. <b>NB: Dit bericht wordt enkel getoond indien de \'Website niet beschikbaar\'-pagina niet is ingesteld</b>.';
$_lang["siteunavailable_message_default"] = 'Deze website is momenteel niet beschikbaar.';
$_lang["siteunavailable_page_message"] = 'Geef de ID van de Pagina dat wordt weergegeven wanneer de website niet beschikbaar (offline) is. <b>NB: Let erop dat de ID bestaat en dat de Pagina gepubliceerd is!</b>';
$_lang["siteunavailable_page_title"] = 'Website niet beschikbaar pagina';
$_lang["siteunavailable_title"] = 'Website niet beschikbaar bericht';
$_lang["controller_namespace"] = 'Controller Namespace';
$_lang["controller_namespace_message"] = 'Specificeer de volledige Namespace waarvan het bijvoorbeeld de moeite waard is om controllers te gebruiken, bijvoorbeeld: <b>EvolutionCMS\\Main\\Controllers\\</b>';
$_lang["update_repository"] = 'GitHub repository path';
$_lang["update_repository_message"] = 'Voer GitHub repository path in, bijvoorbeeld: <b>evocms-community/evolution</b>';

$_lang["sort_alphabetically"] = 'Sorteer alfabetisch';
$_lang["sort_asc"] = 'Oplopend';
$_lang["sort_desc"] = 'Aflopend';
$_lang["sort_menuindex"] = 'Sorteer menu index';
$_lang["sort_tree"] = 'Sorteer de Website boomstructuur';
$_lang['sort_updating'] = 'Bijwerken ...';
$_lang['sort_updated'] = 'Bijgewerkt!';
$_lang['sort_nochildren'] = 'Deze map bevat geen subpagina\'s.';
$_lang["sort_elements_msg"] = 'Versleep om de volgorde van de getoonde elementen te veranderen.';

$_lang["source"] = 'Bron';
$_lang["stay"] = 'Doorgaan met bewerken';
$_lang["stay_new"] = 'Nog &eacute;&eacute;n toevoegen';
$_lang["submit"] = 'Verzenden';
$_lang["sys_alert"] = 'Systeem waarschuwing';
$_lang["sysinfo_activity_message"] = 'Deze lijst toont de Pagina\'s die recent door uw Gebruikers werden gewijzigd.';
$_lang["sysinfo_userid"] = 'Gebruiker';
$_lang["system"] = 'Systeem';
$_lang["system_email_signup"] = 'Hallo [+uid+]

Hier zijn uw inloggegevens voor [+sname+] Content Manager:

Gebruikersnaam: [+uid+]
Wachtwoord: [+pwd+]

Zodra u zich aanmeldt bij Content Manager ([+surl+]), kunt u uw wachtwoord wijzigen.

Met vriendelijke groet,
Website Admin';
$_lang["system_email_webreminder"] = 'Hallo [+uid+]

Klik op de volgende link om uw nieuwe wachtwoord te activeren:

[+surl+]

Als dit lukt, kunt u het volgende wachtwoord gebruiken om in te loggen:

Wachtwoord:[+pwd+]

Als u deze e-mail niet heeft aangevraagd, negeert u deze.

Met vriendelijke groet,
Website Admin';
$_lang["system_email_websignup"] = 'Hallo [+uid+]

Hier zijn uw inloggegevens voor [+sname+]:

Gebruikersnaam: [+uid+]
Wachtwoord: [+pwd+]

Nadat u zich hebt aangemeld bij [+sname+] ([+surl+]), kunt u uw wachtwoord wijzigen.

Met vriendelijke groet,
Website Admin';
$_lang["table_hoverinfo"] = 'Beweeg de muiscursor over een tabelnaam om een korte beschrijving te zien van de funktie van de tabel (niet voor alle tabellen is <i>informatie</i> beschikbaar).';
$_lang["table_prefix"] = 'Tabel voorvoegsel (prefix)';
$_lang["tag"] = 'Tag';

$_lang["to"] = 'naar';
$_lang["toggle_fullscreen"] = 'Volledig scherm switchen';
$_lang["tools"] = 'Beheer';
$_lang["top_howmany_message"] = 'Wanneer u de statistieken bekijkt, hoe lang wilt u de \'Top ...\' lijst hebben?';
$_lang["top_howmany_title"] = 'Toon aantal statistieken';
$_lang["total"] = 'totaal';
$_lang["track_visitors_message"] = 'Vink aan om de onderliggende bronnen in de documentenstructuur weer te geven';
$_lang["track_visitors_title"] = 'Toon onderliggende pagina\'s';
$_lang["tree_page_click"] = 'Pagina klik gedrag';
$_lang["tree_page_click_message"] = 'Het standaard gedrag bij het klikken op een pagina in de boomstructuur.';
$_lang["use_breadcrumbs"] = 'Toon navigatie';
$_lang["use_breadcrumbs_message"] = 'Toon de navigatie bij het maken of bewerken van pagina\'s in de Manager';
$_lang["tree_show_protected"] = 'Toon beschermde pagina\'s';
$_lang["tree_show_protected_message"] = 'Wanneer ingesteld op "Nee", worden beschermde bronnen (en al hun onderliggende bronnen) niet weergegeven in de boomstructuur.';
$_lang["truncate_table"] = 'Klik hier om deze tabel in te korten';
$_lang["type"] = 'Soort';
$_lang["udperms_allowroot_message"] = 'Sta Gebruikers toe om nieuwe Pagina\'s en Mappen in de \'root\' (basismap) van de website te maken.';
$_lang["udperms_allowroot_title"] = 'Rootmap toestaan';
$_lang["udperms_message"] = 'Be&iuml;nvloed toegangsrechten tot Pagina\'s via Gebruikersgroepen en Paginagroepen.';
$_lang["udperms_title"] = 'Toegangsrechten gebruiken';
$_lang["unable_set_link"] = 'Niet mogelijk de link te maken!';
$_lang["unable_set_parent"] = 'Het Hoofdpagina kon niet worden aangemaakt!';
$_lang["unauthorizedpage_message"] = 'Voer een gepubliceerde en publiek toegankelijke Pagina ID in waarnaar Gebruikers worden doorgestuurd wanneer ze een beveiligde/ongeautoriseerde Pagina opvragen.';
$_lang["unauthorizedpage_title"] = 'Geen toegang pagina';
$_lang["unblock_message"] = 'Deze Gebruiker zal niet geblokkeerd zijn na het opslaan van zijn Gebruikersgegevens.';
$_lang["undelete_resource"] = 'Herstel Pagina';
$_lang["unpublish_date"] = 'Niet-publiceren datum';
$_lang["unpublish_events"] = 'Niet-publiceren gebeurtenissen';
$_lang["unpublish_resource"] = 'Publicatie ongedaan maken';
$_lang["untitled_resource"] = 'Naamloze Pagina';
$_lang["untitled_weblink"] = 'Naamloze Weblink';
$_lang["update_params"] = 'Parameter weergave bijwerken';
$_lang["update_settings_from_language"] = 'Vervangen met';

$_lang["upload_maxsize_message"] = 'Voer de maximale bestandsgrootte in voor bestanden die via Bestandsbeheer geupload kunnen worden. De bestandsgrootte wordt opgegeven in bytes. <br /><b>NB: Het kan enige tijd duren om grote bestanden te uploaden!</b>';
$_lang["upload_maxsize_title"] = 'Maximale upload bestandsgrootte';
$_lang["uploadable_files_message"] = 'Hier kunt u een lijst van bestanden opgeven die geupload kunnen worden naar \'assets/files/\' vanuit Bestandsbeheer. Voer de bestandsextensies in, gescheiden door een komma. ';
$_lang["uploadable_files_title"] = 'Uploadbare bestandstypes';
$_lang["uploadable_flash_message"] = 'Hier kunt u een lijst van bestanden opgeven die geupload kunnen worden naar \'assets/flash/\' vanuit Bestandsbeheer. Voer de bestandsextensies in voor de Flash types, van elkaar gescheiden door een komma. ';
$_lang["uploadable_flash_title"] = 'Uploadbare Flash bestandstypes';
$_lang["uploadable_images_message"] = 'Hier kunt u een lijst van bestanden opgeven die ge-upload kunnen worden naar \'assets/images/\' vanuit Bestandsbeheer. Voer de bestandsextensies in voor de Afbeelding types, van elkaar gescheiden door een komma. ';
$_lang["uploadable_images_title"] = 'Uploadbare afbeelding bestandstypes';
$_lang["uploadable_media_message"] = 'Hier kunt u een lijst van bestanden opgeven die ge-upload kunnen worden naar \'assets/media/\' vanuit Bestandsbeheer. Voer de bestandsextensies in voor de media types, van elkaar gescheiden door een komma. ';
$_lang["uploadable_media_title"] = 'Uploadbare Media bestandstypes';
$_lang["use_alias_path_message"] = 'Door \'Ja\' te selecteren wordt er een virtueel pad gegenereerd naar de Pagina. Bijvoorbeeld, als een Pagina "kind.html" in de Container "ouder" staat, dan wordt de volledige zoekmachine vriendelijke URL "/ouder/kind.html".';
$_lang["use_alias_path_title"] = 'Gebruik gebruiksvriendelijke alias paden';
$_lang["use_editor_message"] = 'Bewerken met de geavanceerde teksteditor aanzetten. Deze setting geld voor alle Pagina\'s, maar kan worden overschreven in de instellingen van de Gebruiker.';
$_lang["use_editor_title"] = 'Teksteditor aan/uitzetten';
$_lang["use_global_tabs"] = 'Gebruik de algemene tabbladen';

$_lang["valid_hostnames_message"] = 'Help XSS exploits misbruik te voorkomen met de systeem instelling site_url  door een komma gescheiden lijst van geldige hostnamen voor deze installatie te gebruiken. Dit is belangrijk voor bepaalde typen gedeelde hosts of hosts rechtstreeks via een IP-adres te benaderen. De eerste hostnaam in de lijst wordt gebruikt als de HTTP_HOST wanneer deze niet overeenkomt met een geldige hostnaam.';
$_lang["valid_hostnames_title"] = 'Geldige hostnamen';
$_lang["validate_referer_message"] = 'Valideer de HTTP_REFERER headers om het risico te verkleinen dat uw website beheerders bedonderd worden door een CSRF (Cross Site Request Forgery) aanval. Soms is dit echter niet mogelijk als uw server geen HTTP_REFERER headers verzend.';
$_lang["validate_referer_title"] = 'Valideer HTTP_REFERER headers';
$_lang["value"] = 'Waarde';
$_lang["version"] = 'Versie';
$_lang["view"] = 'Bekijken';
$_lang["view_child_resources_in_container"] = 'Bekijk Subpagina\'s in Map';
$_lang["view_log"] = 'Bekijk logboek';
$_lang["view_logging"] = 'CMS logboek';
$_lang["view_sysinfo"] = 'Systeem Info';
$_lang["warning"] = 'Waarschuwing!';
$_lang["warning_not_saved"] = 'U heeft de wijzigingen nog niet opgeslagen! U kunt op deze Pagina blijven om de wijzigingen op te slaan (\'Annuleren\'), of u kunt deze Pagina verlaten, waardoor eventuele wijzigingen verloren gaan (\'OK\').';
$_lang["warning_visibility"] = 'Configuratie meldingen zichtbaar voor';
$_lang["warning_visibility_message"] = 'Bepaal de zichtbaarheid van de waarschuwingen op de Manager welkoms pagina';
$_lang["web_access_permissions"] = 'Webgebruiker toegangsrechten';
$_lang["web_access_permissions_user_groups"] = 'Webgebruikers groepen';
$_lang["web_permissions"] = 'Toegangsbeheer (web)';
$_lang["web_user_management_msg"] = 'Hier kunt u kiezen welke Webgebruiker u wilt bewerken. Webgebruikers zijn Gebruikers die alleen op de website kunnen aanmelden (en dus niet op het Content Management Systeem)';
$_lang["web_user_management_title"] = 'Webgebruikers';
$_lang["web_user_management_select_role"] = 'Alle rollen';
$_lang["web_user_title"] = 'Aanmaken/bewerken Webgebruiker';
$_lang["web_users"] = 'Webgebruikers';
$_lang["weblink"] = 'Weblink';
$_lang["webpwdreminder_message"] = 'Hier kunt u de boodschap instellen die naar uw gebruikers verstuurd wordt als zij een nieuw wachtwoord aanvragen per e-mail. Evolution zal een e-mail sturen met het nieuwe wachtwoord en activeringsinformatie.<br /><br />De volgende codes worden door Evolution vervangen als het bericht verstuurd wordt: <br /><br /> [+sname+] - naam van uw website, <br />[+saddr+] - e-mail adres van uw website, <br />[+surl+] - adres van de website, <br />[+uid+] - aanmeld naam of id, <br />[+pwd+] - wachtwoord, <br />[+ufn+] - volledige naam. <br /><br /><b>Laat de [+uid+] en [+pwd+] codes in de e-mail staan, omdat de gebruikersnaam en het wachtwoord anders niet in de e-mail komen te staan en uw gebruikers daardoor hun aanmeld gegevens niet ontvangen!</b>';
$_lang["webpwdreminder_title"] = 'Herinnering e-mailadres';
$_lang["websignupemail_message"] = 'Hier kunt u de boodschap instellen die naar uw gebruikers verstuurd wordt wanneer u voor hen een web account heeft aangemaakt en Evolution een e-mail laat sturen met hun gebruikersnaam en wachtwoord. <br /><br />De volgende codes worden door Evolution vervangen als het bericht verstuurd wordt: <br /><br /> [+sname+] - naam van uw website, <br />[+saddr+] - e-mail adres van uw website, <br />[+surl+] - adres van de website, <br />[+uid+] - aanmeld naam of id, <br />[+pwd+] - wachtwoord, <br />[+ufn+] - volledige naam. <br /><br /><b>Laat de [+uid+] en [+pwd+] codes in de e-mail staan, omdat de gebruikersnaam en het wachtwoord anders niet in de e-mail komen te staan en uw gebruikers daardoor hun aanmeld gegevens niet ontvangen!</b>';
$_lang["websignupemail_title"] = 'Bevestiging e-mail bij aanmelding:<br />(Webgebruiker)';
$_lang["allow_multiple_emails_title"] = 'Dupliceer e-mailadres van webgebruiker';
$_lang["allow_multiple_emails_message"] = 'Hiermee kunnen internetgebruikers hetzelfde e-mailadres delen voor situaties waarin een lid mogelijk geen eigen e-mailadres heeft of er slechts één familie-e-mailadres is.<br/>Notitie: Elke wachtwoordherinnering en registratielogica moet rekening houden met deze optie als deze is ingesteld op ja.';
$_lang["welcome_title"] = 'Welkom bij uw Evolution CMS Content Manager';
$_lang["which_editor_message"] = 'Selecteer uw Texteditor (RTE). U kunt extra RTE\'s downloaden en installeren vanaf de downloadpagina.';
$_lang["which_editor_title"] = 'Kies uw teksteditor';
$_lang["working"] = 'Wordt verwerkt...';
$_lang["wrap_lines"] = 'Regels afbreken';
$_lang["xhtml_urls_message"] = 'Vervangt ampersand (&amp;) tekens in urls die worden gegenereerd door EVO met de validatie &amp;<!-- -->amp; htmlentity';
$_lang["xhtml_urls_title"] = 'XHTML URL\'s';
$_lang["yes"] = 'Ja';
$_lang["you_got_mail"] = 'U heeft een nieuw bericht';

$_lang["yourinfo_message"] = 'In deze sectie wordt uw persoonlijke informatie weergegeven:';
$_lang["yourinfo_previous_login"] = 'De laatste keer dat u zich heeft aangemeld:';
$_lang["yourinfo_role"] = 'Uw rol is:';
$_lang["yourinfo_title"] = 'Uw info';
$_lang["yourinfo_total_logins"] = 'Aantal keer aangemeld:';
$_lang["yourinfo_username"] = 'U bent aangemeld als:';

$_lang["a17_error_reporting_title"] = 'Detectie level van de PHP foutmelding';
$_lang["a17_error_reporting_msg"] = 'Bepaal het level van de PHP foutmelding.';
$_lang["a17_error_reporting_opt0"] = 'Negeer alle';
$_lang["a17_error_reporting_opt1"] = 'Negeer de waarschuwing van een melding met laag niveau (<a href="https://www.google.com/search?q=E_DEPRECATED+E_STRICT" target="_blank">deprecated</a>)';
$_lang["a17_error_reporting_opt2"] = 'Detecteer alle foutmeldingen behalve E_NOTICE and E_USER_DEPRECATED';
$_lang["a17_error_reporting_opt99"] = 'Detecteer alle foutmeldingen behalve E_USER_DEPRECATED';
$_lang["a17_error_reporting_opt199"] = 'Detecteer alle';

$_lang["pwd_hash_algo_title"] = 'Hash algoritme';
$_lang["pwd_hash_algo_message"] = 'Wachtwoord hash algoritme.';

$_lang["enable_bindings_title"] = '@Bindings commando\'s aanzetten';
$_lang["enable_bindings_message"] = 'Voorkom het uitvoeren van PHP-functies via TV @Bindings. Handig wanneer u Manager gebruikers heeft die niet PHP-code kunnen creëren, maar wel in staat zijn om TV\'s te maken of te bewerken. Het tonen van een TV met een @Binding zal worden uitgeschakeld.';
$_lang["enable_filter_title"] = 'Filters aanzetten';
$_lang["enable_filter_message"] = 'Filters kunt u manipuleren van de manier waarop gegevens worden gepresenteerd of geparsed in een tag. Ze laten u waarden wijzigen vanuit uw Template. Dit is gelijk aan PHx. <a href="https://github.com/modxcms/evolution/issues/623" target="ext_help">Meer info</a>'; // todo: change link to documentation
$_lang["enable_filter_phx_warning"] = 'Wanneer de PHx plugin is ingeschakeld staan de ingebouwde filters standaard uitgeschakeld';

$_lang["enable_at_syntax_title"] = '&lt;@SYNTAX&gt; aanzetten';
$_lang["enable_at_syntax_message"] = '&lt;@SYNTAX&gt; is een eenvoudig en lichtgewicht. Dit is ontworpen om mede-existentie met HTML-tags en inhoudstrings te overwegen.';

$_lang["bkmgr_alert_mkdir"] = 'Een bestand kan niet worden gemaakt in een directory. Kijk wat de toestemming (permission) is van [+snapshot_path+]';
$_lang["bkmgr_restore_msg"] = '<p>Een website kan worden hersteld door het gebruik van een SQL bestand.</p>';
$_lang["bkmgr_restore_title"] = 'Herstellen';
$_lang["bkmgr_import_ok"] = 'SQL herstel is op de Standaard manier uitgevoerd.';
$_lang["bkmgr_snapshot_ok"] = 'De snapshot is als Standaard opgeslagen.';
$_lang["bkmgr_run_sql_file_label"] = 'Uitvoeren door SQL bestand';
$_lang["bkmgr_run_sql_direct_label"] = 'Direct uitvoeren van SQL commando strings';
$_lang["bkmgr_run_sql_submit"] = 'Herstellen uitvoeren';
$_lang["bkmgr_run_sql_result"] = 'Resultaat';
$_lang["bkmgr_snapshot_title"] = 'Snapshot opgeslagen en hersteld';
$_lang["bkmgr_snapshot_msg"] = '<p>De inhoud van de database is opgeslagen en hersteld op de server.<br />Opgeslagen locatie: [+snapshot_path+] ($modx->config[\'snapshot_path\'])</p>';
$_lang["bkmgr_snapshot_submit"] = 'Snapshot toevoegen';
$_lang["bkmgr_snapshot_list_title"] = 'Lijst van Snapshots';
$_lang["bkmgr_restore_submit"] = 'Deze gegevens (data) terugzetten';
$_lang["bkmgr_restore_confirm"] = 'Weet je zeker dat je backup\n[+filename+] wilt terugzetten?';
$_lang["bkmgr_snapshot_nothing"] = 'Geen Snapshot';

$_lang["files.dynamic.php1"] = 'Maak tekstbestand aan';
$_lang["files.dynamic.php2"] = 'Deze locatie kan niet worden getoond.';
$_lang["files.dynamic.php3"] = 'Er is een probleem in een bestandsnaam.';
$_lang["files.dynamic.php4"] = 'Het tekstbestand is gemaakt.';
$_lang["files.dynamic.php5"] = 'Bestand kan niet worden gedupliceerd.';
$_lang["files.dynamic.php6"] = 'Bestand of map kan niet worden hernoemd.';
$_lang["files_dynamic_new_folder_name"] = 'Voeg een nieuwe map naam toe:';
$_lang["files_dynamic_new_file_name"] = 'Voeg een nieuwe bestandsnaam toe:';
$_lang["not_readable_dir"] = 'Deze locatie kan niet gelezen worden.';
$_lang["confirm_delete_dir"] = 'Weet u zeker dat u deze locatie wilt verwijderen?';
$_lang["confirm_delete_dir_recursive"] = 'Weet u zeker dat u de locatie wilt verwijderen? \ N \ nAlle onderliggende bestanden worden ook verwijderd.';

$_lang["make_folders_title"] = 'Voeg eind slash toe aan de URL';
$_lang["make_folders_message"] = 'Een slash toevoegen aan Pagina\'s die als mappen worden gebruikt wanneer u gebruik maakt van FURLs.';

$_lang["check_files_onlogin_title"] = 'Bekijk Core bestanden bij inloggen';
$_lang["check_files_onlogin_message"] = 'Door deze optie in te schakelen, worden belangrijke systeembestanden gecontroleerd op aanpassingen die kenmerkend zijn voor gescripte website-aanvallen. Hoewel het geen garantie is, kan het u waarschuwen voor een aangetast systeembestand en website.';

$_lang["configcheck_sysfiles_mod"] = 'Belangrijke Systeem bestanden zijn aangepast!';
$_lang["configcheck_sysfiles_mod_msg"] = 'U hebt EVO geconfigureerd om belangrijke systeembestanden te controleren op mogelijke website-scriptaanvallen. Deze waarschuwing betekent niet noodzakelijk dat uw site is gehackt, maar u moet de gecontroleerde bestanden in uw installatie bekijken (ingesteld in Systeemconfiguratie -> Gebruiker -> Controleer kernbestanden bij inloggen). Als u merkt dat uw bestanden ongewijzigd blijven of wijzigingen zijn aangebracht door sitebeheerders, gaat u naar Systeemconfiguratie en klikt u op om instellingen opnieuw op te slaan om dit bericht te sluiten. Wijzigingen in de volgende bestanden zijn gevonden:';

$_lang['email_method_title'] = 'Sendmail methode';
$_lang['email_method_mail'] = 'mail() PHP functie';
$_lang['email_method_smtp'] = 'SMTP Server';
$_lang['smtp_auth_title'] = 'SMTP-AUTH';
$_lang['smtp_autotls_title'] = 'SMTPAutoTLS';
$_lang['smtp_host_title'] = 'SMTP host';
$_lang['smtp_secure_title'] = 'Gecodeerde SMTP';
$_lang['smtp_username_title'] = 'SMTP gebruikersnaam';
$_lang['smtp_password_title'] = 'SMTP wachtwoord';
$_lang['smtp_port_title'] = 'SMTP poort';

$_lang["setting_resource_tree_node_name"] = 'De hoofdnaam van de boomstructuur';
$_lang["setting_resource_tree_node_name_desc"] = 'Specificeer het paginaveld om gebruik te maken van de hoofdnaam in de boomstructuur bij het renderen. Standaard staat deze op Pagina Titel, hoewel elk Pagina veld kan worden gebruikt, zoals menutitel en alias.';
$_lang["setting_resource_tree_node_name_desc_add"] = 'Opmerking: U kunt deze weergavenaam wijzigen in de sorteeroptie van de boomstructuur. Deze instelling wordt gebruikt wanneer Display Name in boomstructuur is ingesteld op Standaard.';

$_lang["resource_opt_alvisibled"] = 'Gebruik huidige alias als alias pad';
$_lang["resource_opt_alvisibled_help"] = 'The alias of this Resource is inserted in Friendly URL alias path';
$_lang['resource_opt_is_published'] = 'Gepubliceerd';

$_lang["enable_cache_title"] = 'Document caching';
$_lang["disable_chunk_cache_title"] = 'Chunk caching uitzetten';
$_lang["disable_snippet_cache_title"] = 'Snippet caching uitzetten';
$_lang["disable_plugins_cache_title"] = 'Plugin caching uitzetten';
$_lang["disabled_at_login"] = 'Uitgeschakeld bij inloggen';

$_lang["cache_type_title"] = 'Document cache type';
$_lang["cache_type_1"] = 'Cache is gebaseerd op document id (standaard)';
$_lang["cache_type_2"] = 'Cache is gebaseerd op document id en $_GET parameters';
$_lang["seostrict_title"] = 'Gebruik SEO Strict URLs';
$_lang["seostrict_message"] = 'Gebruik van strikte URL\'s om dubbele inhoud te voorkomen (wanneer dit plaatsvindt)';

$_lang["alias_listing_title"] = 'Gebruik AliasListing cache';
$_lang["alias_listing_message"] = 'Caching pagina aliassen moeten worden uitgeschakeld als een site een enorme hoeveelheid bronnen heeft. "Uitgeschakeld" vermindert het geheugen verbruik wanneer de site een groot aantal bronnen heeft.';
$_lang["alias_listing_disabled"] = 'Uitgeschakeld';
$_lang["alias_listing_folders"] = 'Alleen voor mappen';
$_lang["alias_listing_enabled"] = 'Ingeschakeld';

$_lang["settings_friendlyurls_alert"] = 'Het is noodzakelijk om het ht.access bestand in de EVO-installatiemap naar .htaccess te hernoemen voor het gebruik van de Friendly URL-functie.';
$_lang["settings_friendlyurls_alert2"] = 'Omdat EVO in een submap is geïnstalleerd, is het noodzakelijk om de inhoud van .htaccess te wijzigen.';

$_lang["mutate_settings.dynamic.php6"] = 'Verzend e-mail bij fouten';
$_lang["mutate_settings.dynamic.php7"] = 'not notify';
$_lang["mutate_settings.dynamic.php8"] = 'Een e-mail met de foutbron wordt verzonden naar [(emailsender)] ([+emailsender+]) als er een fout optreedt. De details van de fout zijn te zien in het gebeurtenissenlogboek van de manager.';

$_lang["error_no_privileges"] = "Je hebt niet genoeg rechten hebt voor deze actie!";
$_lang["error_no_optimise_tablename"] = "Tabel optimaliseren niet gevonden in aanvraag!";
$_lang["error_no_truncate_tablename"] = "Tabel voor truncate niet gevonden!";
$_lang["error_double_action"] = "Dubbele actie (GET & POST) geplaatst!";
$_lang["error_no_id"] = "Document ID niet doorgegeven in aanvraag!";
$_lang["error_id_nan"] = "Doorgegeven ID is NaN!";
$_lang["error_parent_deleted"] = "Mislukt omdat bovenliggende resource is verwijderd!";
$_lang["error_no_parent"] = "Kon naam bovenliggende document niet vinden!";
$_lang["error_many_results"] = "Te veel resultaten uit de database!";
$_lang["error_no_results"] = "Te weinig / geen resultaten terug van database!";
$_lang["error_no_user_selected"] = "Geen gebruiker geselecteerd als ontvanger van dit bericht!";
$_lang["error_no_group_selected"] = "Geen groep geselecteerd als ontvanger van dit bericht!";
$_lang["error_movedocument1"] = "Document kan niet zijn eigen onderliggende document zijn!";
$_lang["error_movedocument2"] = "Document ID niet doorgegeven in aanvraag!";
$_lang["error_movedocument3"] = "Nieuwe onderliggende document niet in aanvraag!";
$_lang["error_internet_connection"] = "Server is niet beschikbaar. Controleer je internetverbinding!";

$_lang["login_processor_unknown_user"] = "Onjuiste gebruikersnaam of wachtwoord ingevoerd!";
$_lang["login_processor_wrong_password"] = "Onjuiste gebruikersnaam of wachtwoord ingevoerd!";
$_lang["login_processor_many_failed_logins"] = "Wegens te veel mislukte aanmeldingen ben je geblokkeerd!";
$_lang["login_processor_verified"] = "Gebruikersverificatie vereist!";
$_lang["login_processor_blocked1"] = "U bent geblokkeerd en kan niet inloggen!";
$_lang["login_processor_blocked2"] = "U bent geblokkeerd en kan niet inloggen! Probeer het later opnieuw.";
$_lang["login_processor_blocked3"] = "U wordt automatisch geblokkeerd na een bepaalde datum en kunt niet meer inloggen!";
$_lang["login_processor_bad_code"] = "De veiligheidscode klopt niet! Probeer het opnieuw!";
$_lang["login_processor_remotehost_ip"] = "Uw hostnaam verwijst niet terug naar uw IP!";
$_lang["login_processor_remote_ip"] = "Het is niet toegestaan ​​om in te loggen vanaf deze locatie.";
$_lang["login_processor_date"] = "Het is niet toegestaan ​​om in te loggen op dit moment. Probeer het later opnieuw.";
$_lang["login_processor_captcha_config"] = "Captcha is niet correct geconfigureerd.";

$_lang["dp_dayNames"] = "['Zondag', 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag']";
$_lang["dp_monthNames"] = "['Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December']";
$_lang["dp_startDay"] = "1";

$_lang["check_all"] = "Selecteer alle";
$_lang["check_none"] = "Deselecteer alle";
$_lang["check_toggle"] = "Selectie aan/uit";

$_lang["version_notices"] = "Meldingen over versies";

$_lang["em_button_shift"] = "(Shift+muiseklik om meerdere vensters te openen)";

$_lang["reset_sysfiles_checksum_button"] = "Heropbouw Checksums";
$_lang["reset_sysfiles_checksum_alert"] = "Weet u zeker dat u de systeembestanden checksums wil resetten?";

$_lang["file_browser_disabled_msg"] = "De Bestandsbrowser custom optie staat niet aangeschakeld.";
$_lang["which_browser_default_title"] = "Standaard bestandsbrowser";
$_lang["which_browser_default_msg"] = "Kies de Bestandsbrowser welke u liever als standaard gebruikt. Bij de gebruikers instellingen kunt u kiezen voor een custom Bestandsbrowser per gebruiker.";
$_lang["which_browser_title"] = "Bestandsbrowser";
$_lang["which_browser_msg"] = "U kunt kiezen om een aangepaste Bestandsbrowser te gebruiken voor deze gebruiker.";
$_lang["option_default"] = "Standaard";
$_lang["position"] = "Positie";
$_lang["are_you_sure"] = "Weet u het zeker?";

$_lang['evo_downloads_title'] = "Evolution Downloads";
$_lang['help_translating_title'] = "Help Evolution vertalen";
$_lang['download'] = "Download";
$_lang['downloads'] = "Downloads";
$_lang["previous_releases"] = "Vorige versies";
$_lang["extras"] = "Add-ons";

$_lang["display_locks"] = "Toon geblokkeerde";
$_lang["role_display_locks"] = "Toon geblokkeerde";
$_lang["session_timeout"] = "Sessie timeout";
$_lang["session_timeout_msg"] = "Evolution CMS pingt de server, als de laatste ping deze instelling overschrijdt, wordt de bijbehorende sessie als ongeldig beschouwd en worden alle gerelateerde vergrendelingen automatisch verwijderd. Ingestelde waarde in minuten (>2min, standaard 15min).";
$_lang["unlock_element_id_warning"] = "Weet u zeker dat je [+element_type+] (ID [+id+]) wilt vrijgeven voor bewerken?";
$_lang["lock_element_type_1"] = "Template";
$_lang["lock_element_type_2"] = "Template Variabele";
$_lang["lock_element_type_3"] = "Chunk";
$_lang["lock_element_type_4"] = "Snippet";
$_lang["lock_element_type_5"] = "Plug-in";
$_lang["lock_element_type_6"] = "Module";
$_lang["lock_element_type_7"] = "Pagina";
$_lang["lock_element_type_8"] = "Rol";
$_lang["lock_element_editing"] = "U past element [+element_type+] aan sinds\n[+lasthit_df+]";
$_lang["lock_element_locked_by"] = "[+element_type+] is geblokkeerd door gebruiker\n[+username+] sinds [+lasthit_df+]";

$_lang["minifyphp_incache_title"] = 'Minify php code in de site cache';
$_lang["minifyphp_incache_message"] = 'Minify php code (snippets en plugins) en sla op in het site cache bestand. Zie: <a href="https://github.com/modxcms/evolution/issues/938" target="_blank">#938</a>';

$_lang["logout_reminder_msg"] = "Ter herinnering: Het lijkt er op dat op [+datum+] je vergeten bent om uit te loggen. In de toekomst kun je dit beter wel doen na je werk!";

$_lang["allow_eval_title"] = "Eval php code in je snippet";
$_lang["allow_eval_msg"] = "Voor ontwikkelaars: Gebruik \$modx-&gt;safeEval().";
$_lang["allow_eval_with_scan"] = "Alleen functies uitvoeren die worden toegestaan";
$_lang["allow_eval_with_scan_at_post"] = "Alles uitvoeren. Echter met POST alleen toegestaande functies uitvoeren";
$_lang["allow_eval_everytime_eval"] = "Ongelimiteerd (gebruik alleen bij debugging)";
$_lang["allow_eval_dont_eval"] = "Niet alle functies toelaten";

$_lang["safe_functions_at_eval_title"] = "Functies die eval mogen toestaan";
$_lang["safe_functions_at_eval_msg"] = "Met komma's gescheiden lijst";

$_lang["multiple_sessions_msg"] = "Ter informatie: Meerdere actieve gebruiker sessies (in totaal [+totaal+]) gevonden voor de gebruiker <b>[+gebruikersnaam+]</b>.";
$_lang["iconv_not_available"] = "Heb is belangrijk om de extentie iconv te installeren of aan te zetten. Ga na bij uw hostingpartij om deze aan te zetten mocht u hier geen kaas van hebben gegeten.";

$_lang["cm_create_new_category"] = "Creëer een nieuwe categorie";
$_lang["cm_category_name"] = "Categorie naam";
$_lang["cm_category_position"] = "Categorie positie";
$_lang["cm_no_x_assigned"] = "Geen %s toegewezen";
$_lang["cm_save_categorization"] = "Sla categorisering op";
$_lang["cm_update_categories"] = "Categorieën updaten";
$_lang["cm_assigned_elements"] = "Toegekende elementen";
$_lang["cm_edit_name"] = "Naam aanpassen";
$_lang["cm_mark_for_deletion"] = "Aanvinken voor verwijdering";
$_lang["cm_delete_now"] = "Verwijder direct";
$_lang["cm_delete_element_x_now"] = "Verwijder &quot;%s&quot; direct";
$_lang["cm_select_element_group"] = "Selecteer een elementengroep";
$_lang["cm_global_messages"] = "Globale meldingen";
$_lang["cm_add_new_category"] = "Nieuwe categorie toevoegen";
$_lang["cm_edit_categories"] = "Categorieën wijzigen";
$_lang["cm_sort_categories"] = "Sorteer categorieën";
$_lang["cm_categorize_elements"] = "Elementen categoriseren ";
$_lang["cm_translation"] = "Vertaling";
$_lang["cm_translations"] = "Vertalingen";
$_lang["cm_categorize_x"] = "Categoriseer <span class=\"highlight\">%s</span>";
$_lang["cm_unknown_error"] = "Er is iets niet goed gegaan.";
$_lang["cm_x_assigned_to_category_y"] = "<span class=\"highlight\">%s(%s)</span> is toegewezen aan categorie <span class=\"highlight\">%s(%s)</span>";
$_lang["cm_no_categorization"] = "Geen indeling gemaakt.";
$_lang["cm_no_changes"] = "Niets te veranderen, dus geen wijzigingen.";
$_lang["cm_x_changes_made"] = "<span class=\"highlight\">%s</span> aanpassingen gemaakt";
$_lang["cm_enter_name_for_category"] = "Geef een naam voor de nieuwe categorie.";
$_lang["cm_category_x_exists"] = "Categorie <span class=\"highlight\">%s</span> bestaat al.";
$_lang["cm_category_x_saved_at_position_y"] = "De nieuwe caterogie <span class=\"highlight\">%s</span> is opgeslagen op positie <span class=\"highlight\">%s</span>.";
$_lang["cm_category_x_moved_to_position_y"] = "Categorie <span class=\"highlight\">%s</span> is verplaatst naar positie <span class=\"highlight\">%s</span>";
$_lang["cm_category_x_deleted"] = "Categorie <span class=\"highlight\">%s</span> is verwijderd";
$_lang["cm_category_x_renamed_to_y"] = "Categorie <span class=\"highlight\">%s</span> is hernoemd naar <span class=\"highlight\">%s</span>";
$_lang["cm_translation_for_x_empty"] = "Vertaling voor <span class=\"highlight\">%s</span> is leeg";
$_lang["cm_translation_for_x_to_y_success"] = "Vertaling van <span class=\"highlight\">%s</span> naar <span class=\"highlight\">%s</span> is succesvol opgeslagen";
$_lang["cm_save_new_sorting"] = "Bewaar nieuwe volgorde";
$_lang["cm_translate_phrases"] = "Vertaal zinnen";
$_lang["cm_translate_module_phrases"] = "Vertaal module-zinnen";
$_lang["cm_native_phrase"] = "Inheemse zin";

$_lang["btn_view_options"] = 'Toon opties';
$_lang["view_options_msg"] = 'Tonen van elementen kan worden aangepast via &quot;Toon opties&quot; knop. Instellingen worden opgeslagen en bijgewerkt per browser door gebruik van HTML5 localStorage.';
$_lang["viewopts_title"] = 'Toon opties';
$_lang["viewopts_cb_buttons"] = 'Knoppen';
$_lang["viewopts_cb_descriptions"] = 'Omschrijvingen';
$_lang["viewopts_cb_icons"] = 'Iconen';
$_lang["viewopts_radio_list"] = 'Lijst';
$_lang["viewopts_radio_inline"] = 'Inline';
$_lang["viewopts_radio_flex"] = 'Flex';
$_lang["viewopts_fontsize"] = 'Fontgrootte';
$_lang["viewopts_cb_alltabs"] = 'Alle tabs';

$_lang['email_sender_method'] = 'De afzender van het bericht';
$_lang['auto'] = 'Automatische detectie';
$_lang['use_emailsender'] = 'Gebruik [(emailsender)] inhoud';
$_lang['email_sender_method_message'] = 'De afzender van het bericht. Dit wordt meestal door de ontvanger omgezet in een Return-Path-header en is het adres waarnaar bounces worden verzonden. Automatische detectie werkt in de meeste gevallen.';

$_lang['login_form_position_title'] = 'Positie inlogformulier';
$_lang['login_form_position_left'] = 'links';
$_lang['login_form_position_center'] = 'midden';
$_lang['login_form_position_right'] = 'rechts';
$_lang["login_form_style"] = 'Login formulier kleurthema:';
$_lang["login_form_style_dark"] = 'donker';
$_lang["login_form_style_light"] = 'licht';
$_lang['login_logo_title'] = 'Logo afbeelding inlogpagina';
$_lang['login_logo_message'] = 'Aanbevolen login logo breedte 360px en .png extensie (transparant)';
$_lang['login_bg_title'] = 'Achtergrondafbeelding inlogpagina';
$_lang['login_bg_message'] = 'Aanbevolen inlogpagina achtergrond afbeelding breedte 1920px';

$_lang['manager_menu_position_title'] = 'Hoofdmenu positie';
$_lang['manager_menu_position_top'] = 'boven';
$_lang['manager_menu_position_left'] = 'links';

$_lang['invalid_event_response'] = 'Het %s event heeft ongeldige uitvoer';

$_lang['chunk_processor'] = 'Chunks processing class';

$_lang["permission_title"] = 'Toestemming aanmaken / bewerken';
$_lang["groups_permission_title"] = 'Categorie aanmaken / bewerken';
$_lang["lang_key_desc"] = 'Toegangstaal van array $_lang';
$_lang["key_desc"] = 'Toegangstaal voor gecontroleerde toestemming';

$_lang["setting_from_file"] = '<strong class="text-danger">Parameter waarde wordt defined in core/custom/config/cms/settings</strong>';
$_lang['disable'] = 'Uitschakelen';
$_lang['enable'] = 'Inschakelen';

return $_lang;
