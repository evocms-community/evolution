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
$_lang["about_title"] = 'Om Evolution CMS';

// days
$_lang["monday"] = 'Mandag';
$_lang["tuesday"] = 'Tirsdag';
$_lang["wednesday"] = 'Onsdag';
$_lang["thursday"] = 'Torsdag';
$_lang["friday"] = 'Fredag';
$_lang["saturday"] = 'Lørdag';
$_lang["sunday"] = 'Søndag';

// templates
$_lang["template"] = 'Skabelon';
$_lang["templates"] = 'Templates';
$_lang['templatecontroller'] = 'Template Controller';
$_lang["template_assignedtv_tab"] = 'Tildelte skabelon variabler';
$_lang["template_code"] = 'Skabelon kode (HTML)';
$_lang["template_desc"] = 'Beskrivelse';
$_lang["template_edit_tab"] = 'Rediger skabelon';
$_lang["template_inuse"] = 'This template is in use. Please set the documents using the template to another template. Documents using this template:';
$_lang["template_management_msg"] = 'Vælg skabelonen der skal redigeres.';
$_lang["template_msg"] = 'Opret og rediger skabeloner. Nye eller ændrede skabeloner vil ikke være synlige, før websites cache er nulstillet. Man kan dog bruge preview funktionen på en ressource for at se resultatet af skabelonen.';
$_lang["template_name"] = 'Skabelon navn';
$_lang["template_no_tv"] = 'Der er endnu ikke tildelt nogle skabelon variabler til denne skabelon.';
$_lang["template_notassigned_tv"] = 'These Template Variables are available for assigning.';
$_lang["template_reset_all"] = 'Nulstil alle ressourcer så de bruger standard skabelonen';
$_lang["template_reset_specific"] = 'Nulstil kun ressourcer der bruger: \'%s\' skabelonen';
$_lang["template_assigned_blade_file"] = 'Tilsvarende blade-fil';
$_lang["template_create_blade_file"] = 'Opret skabelonfil ved gem';
$_lang["template_selectable"] = 'Template selectable when creating or editing ressources.';
$_lang["template_title"] = 'Opret eller rediger skabelon';
$_lang["template_tv_edit"] = 'Sorter skabelon variabler';
$_lang["template_tv_edit_message"] = 'Klik-træk for at sortere denne skabelons variabler.';
$_lang["template_tv_edit_title"] = 'Rækkefølge for skabelon variabler';
$_lang["template_tv_msg"] = 'Oversigt over denne skabelons tildelte variabler.';

// tmplvars
$_lang["tv"] = 'TV';
$_lang["tmplvar"] = 'Template Variable';
$_lang["tmplvars"] = 'Skabelon variabler';
$_lang["tmplvar_access_msg"] = 'Vælg de ressource grupper som skal have tilladelse til at ændre indholdet eller værdier i denne skabelon variabel';
$_lang["tmplvar_change_template_msg"] = 'Udskiftning af denne skabelon medfører, at siden genindlæser skabelon variablerne. Dette vil resultere i, at man mister eventuelle ændringer, der ikke er gemt.\n\n Er du sikker på, at du vil skifte skabelonen?';
$_lang["tmplvar_inuse"] = 'De følgende ressourcer bruger i øjeblikket denne skabelon variabel. For at gennemføre sletningen klik på \'Slet\' knappen - eller klik på \'Fortryd\' knappen for at annullere sletningen.';
$_lang["tmplvar_tmpl_access"] = 'Skabelon adgang';
$_lang["tmplvar_tmpl_access_msg"] = 'Vælg de skabeloner som har tilladelse til at tilgå og bruge denne skabelon variabel';
$_lang["tmplvars_binding_msg"] = 'Dette felt understøtter data kilde bindinger ved brug af @ kommandoer';
$_lang["tmplvars_caption"] = 'Overskrift';
$_lang["tmplvars_default"] = 'Standard værdi';
$_lang["tmplvars_description"] = 'Beskrivelse';
$_lang["tmplvars_elements"] = 'Værdier for input valgmuligheder';
$_lang["tmplvars_inherited"] = 'Value inherited';
$_lang["tmplvars_management_msg"] = 'Vælg den skabelon variabel der skal redigeres.';
$_lang["tmplvars_msg"] = 'Tilføj eller rediger skabelon variabler. Skabelon variabler skal være tildelt skabeloner, for at disse kan tilgås af ressourcer og snippets.';
$_lang["tmplvars_name"] = 'Skabelon variabel navn';
$_lang["tmplvars_novars"] = 'Der blev ikke fundet nogle skabelon variabler';
$_lang["tmplvars_rank"] = 'Sorteringsrækkefølge';
$_lang["tmplvars_rank_edit_message"] = 'Drag to reorder the Template Variables.';
$_lang["tmplvars_reset_params"] = 'Nulstil parametrer';
$_lang["tmplvars_title"] = 'Tilføj eller rediger skabelon variabel';
$_lang["tmplvars_type"] = 'Input type';
$_lang["tmplvars_widget"] = 'Komponent';
$_lang["tmplvars_widget_prop"] = 'Komponent egenskaber';
$_lang["role_no_tv"] = 'No Variables have been assigned to this Role yet.';
$_lang["role_notassigned_tv"] = 'These Variables are available for assigning.';
$_lang["role_tv_msg"] = 'The Variables assigned to this Role are listed below.';
$_lang["tmplvar_roles_access_msg"] = 'Select the Roles that are allowed to access/process this Template Variable';

// snippets
$_lang["snippet"] = 'Snippet';
$_lang["snippets"] = 'Snippets';
$_lang["snippet_code"] = 'Snippet kode (PHP)';
$_lang["snippet_desc"] = 'Beskrivelse';
$_lang["snippet_execonsave"] = 'Eksekver snippet efter den er gemt.';
$_lang["snippet_management_msg"] = 'Vælg den snippet der skal redigeres.';
$_lang["snippet_msg"] = 'Tilføj/rediger snippets. Husk at snippets er \'rå\' PHP kode, samt hvis den skal vise et output i en skabelon, skal den aflevere (return) en værdi i den enkelte snippet.';
$_lang["snippet_name"] = 'Snippet navn';
$_lang["snippet_properties"] = 'Standard egenskaber';
$_lang["snippet_title"] = 'Opret/rediger snippet';

// chunks
$_lang["htmlsnippet"] = 'Chunk';
$_lang["htmlsnippets"] = 'Chunks';
$_lang["htmlsnippet_desc"] = 'Beskrivelse';
$_lang["htmlsnippet_management_msg"] = 'Vælg det chunk der skal redigeres.';
$_lang["htmlsnippet_msg"] = 'Tilføj og rediger chunks. Husk at chunks er \'almindeligt\' HTML kode, og kan derfor ikke indeholde PHP kode.';
$_lang["htmlsnippet_name"] = 'Navn på chunk';
$_lang["htmlsnippet_title"] = 'Opret/rediger chunk';
$_lang["chunk"] = 'Chunk';
$_lang["chunk_code"] = 'Chunk kode (html)';
$_lang["chunk_multiple_id"] = 'Fejl: Flere chunks har det samme unikke ID.';
$_lang["chunk_no_exist"] = 'Chunk eksisterer ikke.';

// plugins
$_lang["plugin"] = 'Plugin';
$_lang["plugins"] = 'Plugins';
$_lang["plugin_code"] = 'Plugin kode (PHP)';
$_lang["plugin_config"] = 'Plugin konfiguration';
$_lang["plugin_desc"] = 'Beskrivelse';
$_lang["plugin_disabled"] = 'Plugin deaktiveret';
$_lang["plugin_event_msg"] = 'Vælg de systemhændelser som denne plugin skal overvåge.';
$_lang["plugin_management_msg"] = 'Vælg hvilken plugin der skal redigeres.';
$_lang["plugin_msg"] = 'Tilføj eller rediger plugins. Plugins indeholder PHP kode, der udføres ved en eller flere specifikke systemhændelser.';
$_lang["plugin_name"] = 'Plugin navn';
$_lang["plugin_priority"] = 'Rediger eksekveringsrækkefølgen af de enkelte plugins sorteret efter systemhændelse';
$_lang["plugin_priority_instructions"] = 'Klik-træk for at ændre rækkefølgen under den enkelte systemhændelse. Den første plugin, som står under den enkelte systemhændelse, bliver eksekveret først.';
$_lang["plugin_priority_title"] = 'Eksekveringsrækkefølge for plugins';
$_lang["purge_plugin"] = 'Purge obsolete plugins';
$_lang["purge_plugin_confirm"] = 'Are you sure you want to purge obsolete plugins?';
$_lang["plugin_title"] = 'Opret eller rediger plugin';

// categories
$_lang["category"] = 'Category';
$_lang["categories"] = 'Categories';
$_lang["category_heading"] = 'Kategori';
$_lang["category_manager"] = 'Category Manager';
$_lang["category_management"] = 'Category management';
$_lang["category_msg"] = 'Se og rediger alle elementer, grupperet efter kategori.';

// file
$_lang["file_delete_file"] = 'Slet fil';
$_lang["file_delete_folder"] = 'Slet mappe';
$_lang["file_deleted"] = 'Gennemført!';
$_lang["file_download_file"] = 'Hent fil';
$_lang["file_download_unzip"] = 'Udpak fil';
$_lang["file_folder_chmod_error"] = 'Det var ikke muligt at ændre rettigheder på filen eller mappen. Ændringen skal gennemføres udenfor EVO.';
$_lang["file_folder_created"] = 'Mappen blev oprettet!';
$_lang["file_folder_deleted"] = 'Mappen blev slettet!';
$_lang["file_folder_not_created"] = 'Det var ikke muligt at oprette mappen';
$_lang["file_folder_not_deleted"] = 'Det var ikke muligt at slette mappen. Kontroller at den er tom før sletning.';
$_lang["file_not_deleted"] = 'Mislykket!';
$_lang["file_not_saved"] = 'Kan ikke gemme filen. Kontroller at mappen er skrivbar!';
$_lang["file_saved"] = 'Filen blev opdateret!';
$_lang["file_unzip"] = 'Filen blev udpakket!';
$_lang["file_unzip_fail"] = 'Udpakningen mislykkedes!';

// files
$_lang["files"] = 'Files';
$_lang["files_files"] = 'Filer';
$_lang["files_access_denied"] = 'Adgang nægtet!';
$_lang["files_data"] = 'Data';
$_lang["files_dir_listing"] = 'Sti:';
$_lang["files_directories"] = 'Mapper';
$_lang["files_directory_is_empty"] = 'This directory is empty.';
$_lang["files_dirwritable"] = 'Mappe er skrivbar?';
$_lang["files_editfile"] = 'Rediger fil';
$_lang["files_file_type"] = 'Fil type: ';
$_lang["files_filename"] = 'Fil navn';
$_lang["files_fileoptions"] = 'Muligheder';
$_lang["files_filesize"] = 'Fil størrelse';
$_lang["files_filetype_notok"] = 'Det er ikke tilladt at uploade denne filtype!';
$_lang["files_management"] = 'Manage Files';
$_lang["files_management_no_permission"] = 'You do not have enough permissions to view or edit these files. Ask the administrator to grant you access to <b>%s</b>.';
$_lang["files_modified"] = 'Redigeret';
$_lang["files_top_level"] = 'Til roden';
$_lang["files_up_level"] = 'Et niveau op';
$_lang["files_upload_copyfailed"] = 'Der opstod en fejl ved kopiering til destinationsmappen - upload fejlede!';
$_lang["files_upload_error"] = 'Fejl';
$_lang["files_upload_error0"] = 'Der opstod et problem under upload.';
$_lang["files_upload_error1"] = 'Filen du forsøger at uploade er for stor.';
$_lang["files_upload_error2"] = 'Filen du forsøger at uploade er for stor.';
$_lang["files_upload_error3"] = 'Filen du forsøger at uploade blev kun delvist uploadet.';
$_lang["files_upload_error4"] = 'Du skal vælge en fil, der skal uploades.';
$_lang["files_upload_error5"] = 'Der opstod et problem under upload.';
$_lang["files_upload_inhibited_msg"] = '<b>Upload funktionen er deaktiveret</b> - kontroller at upload er understøttet, samt at mappen er skrivbar for PHP.';
$_lang["files_upload_ok"] = 'Upload blev gennemført!';
$_lang["files_upload_permissions_error"] = 'Problem med rettigheder. Mappen, som der uploades til, skal være skrivbar af webserveren.';
$_lang["files_uploadfile"] = 'Upload fil';
$_lang["files_uploadfile_msg"] = 'Vælg en fil til upload:';
$_lang["files_uploading"] = 'Uploader <b>%s</b> af <b>%s/</b>';
$_lang["files_viewfile"] = 'Se fil';

// modules
$_lang["module"] = 'Module';
$_lang["modules"] = 'Moduler';
$_lang["module_code"] = 'Modul kode (php)';
$_lang["module_config"] = 'Modul konfiguration';
$_lang["module_desc"] = 'Beskrivelse';
$_lang["module_disabled"] = 'Modulet deaktiveret';
$_lang["module_edit_click_title"] = 'Klik her for at redigere dette modul';
$_lang["module_group_access_msg"] = 'Vælg den eller de brugergrupper som har rettigheder til at eksekvere dette modul indefra CMS\'et.';
$_lang["module_management"] = 'Administrer moduler';
$_lang["module_management_msg"] = 'Vælg det modul du vil eksekvere eller redigere. For at køre modulet skal man klikke på ikonet i oversigten. For at redigere modulet skal man klikke på modulets navn.';
$_lang["module_msg"] = 'Tilføj eller rediger moduler. Et modul er en samling af elementer (Dvs: plugins, snippets, osv.)';
$_lang["module_name"] = 'Modul navn';
$_lang["module_resource_msg"] = 'Tilføj eller fjern elementer som dette modul afhænger af. For at tilføje et nyt element skal man klikke på en af de nedenstående "Tilføj... " knapper.';
$_lang["module_resource_title"] = 'Modulets afhængigheder';
$_lang["module_title"] = 'Tilføj eller rediger modul';
$_lang["module_viewdepend_msg"] = 'Se de tildelte elementer som dette modul er afhængigt af. Klik på "Administrer afhængigheder" knappen for at redigere afhængighederne';

// elements
$_lang["element"] = 'Element';
$_lang["elements"] = 'Elementer';
$_lang["element_categories"] = 'Kombineret visning';
$_lang["element_filter_msg"] = 'Type here to filter list';
$_lang["element_management"] = 'Element administration';
$_lang["element_name"] = 'Element navn';
$_lang["element_selector_msg"] = 'Vælg elementerne fra nedestående liste, og klik på \'Indsæt\'.';
$_lang["element_selector_title"] = 'Vælg element';

// resource
$_lang["resource"] = 'Ressource';
$_lang["resource_alias"] = 'URL alias';
$_lang["resource_alias_help"] = 'Indtast URL aliaset så ressoursen kan ses på f.eks. http://domæne.tld/alias. Dette virker kun såfremt, at søgevenlige URL\'er er aktiveret i websitets konfiguration.';
$_lang["resource_content"] = 'Ressourcens indhold';
$_lang["resource_description"] = 'Beskrivelse';
$_lang["resource_description_help"] = 'Indtast en beskrivelse for denne ressource.';
$_lang["resource_duplicate"] = 'Kopier ressourcen';
$_lang["resource_long_title_help"] = 'Indtast en lang titel for denne ressource. Den kan f.eks. blive brugt i meta tags i ressourcens header, og kan være mere beskrivende end f.eks. det almindelige titel felt.';
$_lang["resource_metatag_help"] = 'Vælg de META tags eller keywords som du vil tildele denne ressource. Hold Ctrl tasten nede for at vælge flere.';
$_lang["resource_opt_contentdispo"] = 'Indholdsdisposition';
$_lang["resource_opt_contentdispo_help"] = 'Brug indholdsdispositionen for at angive hvordan denne ressource håndteres af en web browser. Hvis det er en fil skal \'Vedhæftet fil\' vælges.';
$_lang["resource_opt_emptycache"] = 'Tøm cache?';
$_lang["resource_opt_emptycache_help"] = 'Hvis feltet er markeret, vil EVO tømme cachen, efter at ressourcen er blevet gemt. Dette er for at undgå, at besøgende ser en forældet version af ressourcen.';
$_lang["resource_opt_folder"] = 'Kontainer?';
$_lang["resource_opt_folder_help"] = 'Marker feltet hvis denne ressource også fungere som en kontainer for andre ressourcer. En  \'Kontainer\' fungerer som en mappe, men kan også have indhold som en normal ressource.';
$_lang["resource_opt_menu_index"] = 'Menu indeks';
$_lang["resource_opt_menu_index_help"] = 'Menu Indekset kan kontrollere sorteringer af ressourcer f.eks. i snippets, der genererer menuer. Dog kan den også bruges til andet, hvilket afhænger af den enkelte snippet.';
$_lang["resource_opt_menu_title"] = 'Menu titel';
$_lang["resource_opt_menu_title_help"] = 'Menu titel er valgfrit, og indeholder en kort titel, der bruges ved visning af snippets, der genererer f.eks. menuer eller i moduler.';
$_lang["resource_opt_published"] = 'Publiceret?';
$_lang["resource_opt_published_help"] = 'Marker dette felt såfremt ressourcen skal publiceres så snart den er blevet gemt.';
$_lang["resource_opt_richtext"] = 'Formateret tekst?';
$_lang["resource_opt_richtext_help"] = 'Marker \'Formateret tekst\' for at redigere teksten normalt. Hvis ressourcen indeholder JavaScript, snippets eller lignende, skal markeringen fjernes for at undgå, at editoren ødelægger indholdet. Indholdet bliver derfor vist som kode';
$_lang["resource_opt_show_menu"] = 'Vis i menu';
$_lang["resource_opt_show_menu_help"] = 'Marker dette for at få ressourcen vist i en menu. Bemærk at nogle menu snippets ignorerer dette.';
$_lang["resource_opt_trackvisit_help"] = 'Log besøgende på denne ressource';
$_lang["resource_overview"] = 'Ressource information';
$_lang["resource_parent"] = 'Ovenstående ressource';
$_lang["resource_parent_help"] = 'Klik på ikonet for at aktivere funktionen. Klik derefter på den ressource i website træet som denne ressource fremover skal være under.';
$_lang["resource_permissions_error"] = 'Tilføj denne ressource til mindst én ressource gruppe du selv har rettigheder til.';
$_lang["resource_setting"] = 'Ressource redigering';
$_lang["resource_summary"] = 'Introduktion';
$_lang["resource_summary_help"] = 'Indtast et kort resume for denne ressource';
$_lang["resource_title"] = 'Titel';
$_lang["resource_title_help"] = 'Indtast navnet/titlen for denne ressource. Må ikke indeholde \ (backslash).';
$_lang["resource_to_be_moved"] = 'Ressourcen der skal flyttes';
$_lang["resource_type"] = 'Ressource type';
$_lang["resource_type_message"] = 'Weblinks er en henvisning til en ressource på internettet, eller til en ressource i EVO. Dette kan være en henvisning til en side, et billede eller en fil. Weblinks bør have text/html som indholdstype og indholdsdispositionen sat til inline.';
$_lang["resource_type_weblink"] = 'Weblink';
$_lang["resource_type_webpage"] = 'Internet side';
$_lang["resource_weblink_help"] = 'Indtast adressen på det objekt som weblinket skal henvise til.';
$_lang["resources_in_container"] = 'Ressourcer i denne kontainer';
$_lang["resources_in_container_no"] = 'Denne kontainer har ingen underliggende ressourcer.';

// role
$_lang["role"] = 'Rolle';
$_lang["role_about"] = 'Se siden om';
$_lang["role_actionok"] = 'Vis oversigt over handlinger';
$_lang["role_assets_images"] = 'Manage assets/images';
$_lang["role_assets_files"] = 'Manage assets/files';
$_lang["role_bk_manager"] = 'Brug backup værktøjet';
$_lang["role_cache_refresh"] = 'Nulstil websitets cache';
$_lang["role_category_manager"] = 'Use the Category Manager';
$_lang["role_change_password"] = 'Skift kodeord';
$_lang["role_change_resourcetype"] = 'Skift ressourcetype';
$_lang["role_chunk_management"] = 'Chunk administration';
$_lang["role_config_management"] = 'Konfigurationsindstillinger';
$_lang["role_content_management"] = 'Indholdsadministration';
$_lang["role_create_chunk"] = 'Opret nye chunks';
$_lang["role_create_doc"] = 'Opret nye ressourcer';
$_lang["role_create_plugin"] = 'Opret nye plugins';
$_lang["role_create_snippet"] = 'Opret nye snippets';
$_lang["role_create_template"] = 'Opret nye ressource skabeloner';
$_lang["role_credits"] = 'Se kreditering';
$_lang["role_delete_chunk"] = 'Slette chunks';
$_lang["role_delete_doc"] = 'Slette ressourcer';
$_lang["role_delete_eventlog"] = 'Slette hændelsesloggen';
$_lang["role_delete_module"] = 'Slette moduler';
$_lang["role_delete_plugin"] = 'Slette plugins';
$_lang["role_delete_role"] = 'Slette roller';
$_lang["role_delete_snippet"] = 'Slette snippets';
$_lang["role_delete_template"] = 'Slette skabeloner';
$_lang["role_delete_user"] = 'Slette brugere';
$_lang["role_delete_web_user"] = 'Slette webbrugere';
$_lang["role_edit_chunk"] = 'Redigere chunks';
$_lang["role_edit_doc"] = 'Redigere en ressource';
$_lang["role_edit_doc_metatags"] = 'Redigere en ressources META tags og keywords';
$_lang["role_edit_module"] = 'Redigere moduler';
$_lang["role_edit_plugin"] = 'Redigere plugins';
$_lang["role_edit_role"] = 'Redigere roller';
$_lang["role_edit_settings"] = 'Skifte websitets indstillinger';
$_lang["role_edit_snippet"] = 'Rediger snippets';
$_lang["role_edit_template"] = 'Redigere ressource skabeloner';
$_lang["role_edit_user"] = 'Redigere brugere';
$_lang["role_edit_web_user"] = 'Redigere webbrugere';
$_lang["role_empty_trash"] = 'Tømme papirkurven';
$_lang["role_errors"] = 'Se oplysninger om fejl';
$_lang["role_eventlog_management"] = 'Administrere hændelsesloggen';
$_lang["role_export_static"] = 'Eksportere statisk HTML';
$_lang["role_file_management"] = 'File Management';
$_lang["role_file_manager"] = 'Bruge filhåndteringen';
$_lang["role_frames"] = 'Se administrationssiderne';
$_lang["role_help"] = 'Se hjælpe siderne';
$_lang["role_home"] = 'Må se CMS\'ets introduktionsside';
$_lang["role_import_static"] = 'Importere HTML';
$_lang["role_logout"] = 'Log ud af CMS\'et';
$_lang["role_list_module"] = 'List Module';
$_lang["role_manage_metatags"] = 'Administrere websitets META tags og keywords';
$_lang["role_management_msg"] = 'Vælg rollen der skal redigeres.';
$_lang["role_management_title"] = 'Roller';
$_lang["role_messages"] = 'Se og send beskeder';
$_lang["role_module_management"] = 'Modul administration';
$_lang["role_name"] = 'Rolle navn';
$_lang["role_new_module"] = 'Oprette nyt modul';
$_lang["role_new_role"] = 'Oprette nye roller';
$_lang["role_new_user"] = 'Oprette nye brugere';
$_lang["role_new_web_user"] = 'Oprette nye webbrugere';
$_lang["role_plugin_management"] = 'Plugin administration';
$_lang["role_publish_doc"] = 'Publicere ressourcer';
$_lang["role_remove_locks"] = 'Fjern låse';
$_lang["role_role_management"] = 'Roller';
$_lang["role_run_module"] = 'Køre moduler';
$_lang["role_save_chunk"] = 'Gemme chunks';
$_lang["role_save_doc"] = 'Gemme ressourcer';
$_lang["role_save_module"] = 'Gemme moduler';
$_lang["role_save_password"] = 'Gemme kodeord';
$_lang["role_save_plugin"] = 'Gemme plugins';
$_lang["role_save_role"] = 'Gemme roller';
$_lang["role_save_snippet"] = 'Gemme snippets';
$_lang["role_save_template"] = 'Gemme skabeloner';
$_lang["role_save_user"] = 'Gemme brugere';
$_lang["role_save_web_user"] = 'Gemme webbrugere';
$_lang["role_snippet_management"] = 'Snippet administration';
$_lang["role_template_management"] = 'Skabelon administration';
$_lang["role_title"] = 'Opret og redigering af roller';
$_lang["role_udperms"] = 'Administration af rettigheder';
$_lang["role_user_management"] = 'Bruger administration';
$_lang["role_view_docdata"] = 'Se en ressources indhold';
$_lang["role_view_eventlog"] = 'Se hændelsesloggen';
$_lang["role_view_logs"] = 'Se system log';
$_lang["role_view_unpublished"] = 'Se ikke-publicerede ressourcer';
$_lang["role_web_access_persmissions"] = 'Webbruger rettigheder';
$_lang["role_web_user_management"] = 'Webbruger administration';

// user
$_lang["user"] = 'Bruger';
$_lang["users"] = 'Sikkerhed';
$_lang["user_block"] = 'Blokeret';
$_lang["user_blockedafter"] = 'Blokeret efter';
$_lang["user_blockeduntil"] = 'Blokeret indtil';
$_lang["user_changeddata"] = 'Dine oplysninger er ændret. Log venligst ind igen.';
$_lang["user_country"] = 'Land';
$_lang["user_dob"] = 'Fødselsdato';
$_lang["user_doesnt_exist"] = 'Bruger eksisterer ikke';
$_lang["user_edit_self_msg"] = '<b>Du skal logge ud og ind igen for at opdatere alle dine informationer.</b> Det nye kodeord vil enten blive sent til den registrerede e-mail adresse eller blive vist på skærmen.';
$_lang["user_email"] = 'E-mail adresse';
$_lang["user_failedlogincount"] = 'Fejlede log ind forsøg';
$_lang["user_fax"] = 'Fax';
$_lang["user_female"] = 'Kvinde';
$_lang["user_full_name"] = 'Fulde navn';
$_lang["user_first_name"] = 'First name';
$_lang["user_last_name"] = 'Last Name';
$_lang["user_middle_name"] = 'Middle Name';
$_lang["user_gender"] = 'Køn';
$_lang["user_is_blocked"] = 'Denne bruger er blokeret!';
$_lang["user_logincount"] = 'Antal af log ind';
$_lang["user_male"] = 'Mand';
$_lang["user_management_msg"] = 'Vælg CMS brugeren der skal redigeres. CMS brugere er dem, der har tilladelse til at logge ind i CMS\'et';
$_lang["user_management_title"] = 'Administrer CMS\'ets brugere';
$_lang["user_mobile"] = 'Mobiltelefon nummer';
$_lang["user_phone"] = 'Telefon nummer';
$_lang["user_photo"] = 'Brugerens foto';
$_lang["user_photo_message"] = 'Indtast URL\'en til billedet af denne bruger eller brug \'Indsæt\' knappen for at vælge eller uploade et billede på serveren.';
$_lang["user_prevlogin"] = 'Sidste log ind';
$_lang["user_role"] = 'Brugerens rolle';
$_lang["no_user_role"] = 'No user role';
$_lang["user_state"] = 'Stat';
$_lang["user_title"] = 'Opret/rediger bruger';
$_lang["user_upload_message"] = ' Hvis man ikke ønsker, at denne bruger kan uploade filer i denne katagori, skal man kontrollere at \'Brug system konfigurationsindstillingerne\' ikke er markeret samt lade det tilhørende tekstfelt være tomt.';
$_lang["user_use_config"] = 'Brug system konfigurationsindstillingerne';
$_lang["user_verification"] = 'User is verified';
$_lang["user_zip"] = 'Postnummer';
$_lang["username"] = 'Brugernavn';
$_lang["username_unique"] = 'User name is already in use!';
$_lang["user_street"] = 'Street';
$_lang["user_city"] = 'City';
$_lang["user_other"] = 'Other';

// add
$_lang["add"] = 'Opret';
$_lang["add_chunk"] = 'Tilføj chunk';
$_lang["add_doc"] = 'Tilføj ressource';
$_lang["add_folder"] = 'Tilføj mappe';
$_lang["add_plugin"] = 'Tilføj plugin';
$_lang["add_resource"] = 'Tilføj ressource';
$_lang["add_snippet"] = 'Tilføj snippet';
$_lang["add_tag"] = 'Tilføj tag';
$_lang["add_template"] = 'Tilføj skabelon';
$_lang["add_tv"] = 'Tilføj TV';
$_lang["add_weblink"] = 'Tilføj weblink';

// new
$_lang["new_category"] = 'Ny kategori';
$_lang["new_file_permissions_message"] = 'Når man uploader en ny fil med filhåndteringen, vil denne prøve at ændre rettighederne til det indtastede i indstillingen. Dette virker dog ikke i alle opsætninger. Til eksempel skal man i IIS manuelt ændre rettighederne.';
$_lang["new_file_permissions_title"] = 'Nye fil rettigheder';
$_lang["new_folder_permissions_message"] = 'Når man opretter en ny mappe i filhåndteringen, vil denne prøve at ændre rettighederne til det indtastede i indstillingen. Dette virker dog ikke i alle opsætninger. Til eksempel skal man i IIS manuelt ændre rettighederne.';
$_lang["new_folder_permissions_title"] = 'Nye mappe rettigheder';
$_lang["new_permission"] = 'New Permission';
$_lang["new_htmlsnippet"] = 'Nyt chunk';
$_lang["new_keyword"] = 'Tilføj nyt keyword:';
$_lang["new_module"] = 'Nyt modul';
$_lang["new_parent"] = 'Ny overstående ressource';
$_lang["new_plugin"] = 'Ny plugin';
$_lang["new_role"] = 'Opret en ny rolle';
$_lang["new_snippet"] = 'Ny snippet';
$_lang["new_template"] = 'Ny skabelon';
$_lang["new_tmplvars"] = 'Ny skabelon variabel';
$_lang["new_user"] = 'Ny bruger';
$_lang["new_web_user"] = 'Ny webbruger';
$_lang["new_resource"] = 'Tilføj ressource';

// manage
$_lang["manage_categories"] = 'Manage Categories';
$_lang["manage_depends"] = 'Administrer afhængigheder';
$_lang["manage_files"] = 'Filhåndtering';
$_lang["manage_htmlsnippets"] = 'Manage Chunks';
$_lang["manage_metatags"] = 'Administrer META tags og keywords';
$_lang["manage_modules"] = 'Administrer Moduler';
$_lang["manage_plugins"] = 'Manage Plugins';
$_lang["manage_snippets"] = 'Manage Snippets';
$_lang["manage_templates"] = 'Manage Templates';
$_lang["manage_documents"] = 'Manage Documents';
$_lang["manage_permission"] = 'Manage Permissions';

// move
$_lang["move"] = 'Flyt';
$_lang["move_resource"] = 'Flyt ressourcen';
$_lang["move_resource_message"] = 'Flyt en ressource og alle dens underliggende ressourcer ved at vælge en ny ovenstående ressource i website træet. Hvis man vælger en ressource, der ikke allerede er en kontainer, vil den automatisk blive det. Klik på den nye ovenstående ressource i website træet.';
$_lang["move_resource_new_parent"] = 'Vælg en ny ovenstående ressource i website træet.';
$_lang["move_resource_title"] = 'Flyt ressourcen';

$_lang["access_permissions"] = 'Adgangsrettigheder';
$_lang["access_permission_denied"] = 'Du har ikke rettigheder til denne ressource.';
$_lang["access_permission_parent_denied"] = 'Du har ikke rettigheder til at oprette eller flytte en ressource hertil! Vælg venligst en anden placering.';
$_lang["access_permissions_add_resource_group"] = 'Opret en ny ressourcegruppe';
$_lang["access_permissions_add_user_group"] = 'Opret en ny brugergruppe';
$_lang["access_permissions_docs_message"] = 'Vælg hvilke ressource grupper denne ressource tilhører';
$_lang["access_permissions_group_link"] = 'Opret sammenkædning mellem grupper';
$_lang["access_permissions_introtext"] = 'Administrer bruger grupper og ressource grupper, der bliver brugt til adgangsstyring. For at tilføje en bruger til en bruger gruppe, skal du redigere brugeren og vælge gruppen eller grupperne som brugeren skal tilhøre. For at tilføje en ressource til en bruger gruppe, skal du redigere ressourcen, og vælge gruppen eller grupperne som den skal tilhøre.';
$_lang["access_permissions_link_to_group"] = 'med ressource gruppen';
$_lang["access_permissions_context"] = 'in context';
$_lang["access_permissions_link_user_group"] = 'Sammenkæd bruger gruppen';
$_lang["access_permissions_links"] = 'Bruger og ressource gruppe sammenkædninger';
$_lang["access_permissions_links_tab"] = 'Angiv hvilke bruger grupper der har adgang (dvs. som kan redigere eller oprette undergrupper) til ressource grupperne. For at sammenkæde en ressource gruppe til en bruger gruppe, skal du vælge den pågældende gruppe fra menuen, og klikke på \'Godkend\'. For at fjerne en sammenkædning til en specifik gruppe, skal du klikke på  \'Fjern\'. Dette vil øjeblikkeligt ophæve sammenkædningen.';
$_lang["access_permissions_no_resources_in_group"] = 'Ingen.';
$_lang["access_permissions_no_users_in_group"] = 'Ingen.';
$_lang["access_permissions_off"] = '<span class="warning">Adgangsstyringen er ikke aktiveret.</span> Det betyder, at alle ændringer først vil træde i kraft når adgangsstyringen er aktiveret i konfigurationsindstillingerne.';
$_lang["access_permissions_resource_groups"] = 'Ressource grupper';
$_lang["access_permissions_resources_in_group"] = '<b>Ressourcer i gruppen:</b> ';
$_lang["access_permissions_resources_tab"] = 'Se hvilke ressource grupper der er oprettet. Du kan også oprette nye grupper, omdøbe grupper, slette grupper, samt se hvilke ressourcer der er i de respektive grupper. (Hold musen over ressourcens ID for at se dets navn). For at tilføje eller fjerne en ressource til en gruppe, skal du redigere selve ressourcen.';
$_lang["access_permissions_user_toggle"] = 'Toggle access permissions';
$_lang["access_permissions_user_groups"] = 'Bruger grupper';
$_lang["access_permissions_user_message"] = 'Vælg bruger gruppen som denne bruger skal tilhøre:';
$_lang["access_permissions_users_in_group"] = 'Brugere i gruppen:';
$_lang["access_permissions_users_tab"] = 'Se hvilke bruger grupper der er oprettet. Du kan også oprette nye bruger grupper, omdøbe grupper, slette grupper, samt se hvilke brugere der tilhører de forskellige grupper. For at tilføje en ny bruger til en brugergruppe, eller fjerne en bruger i en brugergruppe, skal du redigere den specifikke bruger. Administratoren (dvs. den der har ID nr. 1) har altid adgang til alle ressourcer, så derfor skal  administratoren ikke tilføjes til nogen af grupperne.';

$_lang["users_list"] = 'Users list';
$_lang["documents_list"] = 'Resources list';

$_lang["account_email"] = 'E-mail konto';
$_lang["actioncomplete"] = '<b>Handlingen blev gennemført korrekt!</b><br /> - Vent til Evolution CMS er færdig med at rydde op.';
$_lang["activity_message"] = 'Denne oversigt viser de seneste ressourcer du har oprettet eller redigeret:';
$_lang["activity_title"] = 'Seneste redigerede eller oprettede ressourcer';

$_lang["administrator_role_message"] = 'Denne brugerrolle kan ikke redigeres eller slettes.';
$_lang["administrators"] = 'Administratorer';
$_lang["after_saving"] = 'Efter ressourcen er gemt';
$_lang["alert_delete_self"] = 'Du kan ikke slette dig selv!';
$_lang["alias"] = 'Alias';
$_lang["all_doc_groups"] = 'Alle ressource grupper (Offentlige)';
$_lang["all_events"] = 'Alle handlinger';
$_lang["all_usr_groups"] = 'Alle bruger grupper (Offentlige)';
$_lang["allow_mgr_access"] = 'Adgang til CMS\'et';
$_lang["allow_mgr_access_message"] = 'Vælg dette for at give adgang til CMS\'et. <b>Bemærk: Hvis \'Nej\' er valgt vil brugeren blive omdirigeret til log ind siden for CMS\'et eller til websitets forside.</b>';
$_lang["already_deleted"] = 'er allerede blevet slettet.';
$_lang["attachment"] = 'Vedhæftet fil';
$_lang["author_infos"] = 'Author information';
$_lang["automatic_alias_message"] = ' Hvis du vælger \'Ja\' vil CMS\'et automatisk generere et alias baseret på ressourcens side titel når du gemmer.';
$_lang["automatic_alias_title"] = 'Genererer automatisk et alias:';
$_lang["backup"] = 'Backup';
$_lang["bk_manager"] = 'Backup';
$_lang["block_message"] = 'Denne bruger vil blive blokeret efter du har gemt!';
$_lang["blocked_minutes_message"] = 'Angiv antallet af minutter en bruger skal blokeres, hvis denne har overskredet det maksimale antal af log ind forsøg uden held. Skriv kun tal uden kommaer, mellemrum osv.)';
$_lang["blocked_minutes_title"] = 'Blokeret i minutter:';
$_lang["cache_files_deleted"] = 'De følgende filer er slettet:';
$_lang["cancel"] = 'Fortryd';
$_lang["captcha_code"] = 'Sikkerhedskode';
$_lang["captcha_message"] = 'Aktiver dette for at forbedre sikkerheden ved at tvinge brugerne til at indtaste en kode, der er ulæselig for maskiner (og script-kiddy hacking scripts).';
$_lang["captcha_title"] = 'Brug følgende CAPTCHA koder:';
$_lang["captcha_words_default"] = 'MODX,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join(),Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote';
$_lang["captcha_words_message"] = 'Indtast en liste af CAPTCHA ord som bliver brugt såfremt CAPTCHA er aktiveret. Adskil de enkelte ord med komma. Feltet kan maksimalt indeholde 255 karakterer.';
$_lang["captcha_words_title"] = 'CAPTCHA ord';

$_lang["cfg_base_path"] = 'MODX_BASE_PATH';
$_lang["cfg_base_url"] = 'MODX_BASE_URL';
$_lang["cfg_manager_path"] = 'MODX_MANAGER_PATH';
$_lang["cfg_manager_url"] = 'MODX_MANAGER_URL';
$_lang["cfg_site_url"] = 'MODX_SITE_URL';

$_lang["change_name"] = 'Rediger navn';
$_lang["change_password"] = 'Skift kodeord';
$_lang["change_password_confirm"] = 'Godkend kodeord';
$_lang["change_password_message"] = 'Indtast dit nye kodeord og indtast det igen for at godkende det. Dit kodeord skal være mellem 6 og 15 karakterer langt.';
$_lang["change_password_new"] = 'Nyt kodeord';
$_lang["charset_message"] = 'Vælg karakter encoding til [(modx_charset)] system variablen. Dette har ingen betydning for CMS administrationen.';
$_lang["charset_title"] = 'Karakter encoding:';

$_lang["cleaningup"] = 'Rydder op';
$_lang["clean_uploaded_filename"] = 'Brug omskrivning af filnavne ved upload';
$_lang["clean_uploaded_filename_message"] = 'Vil du bruge standardindstillingerne, eller vil du bruge omskrivningsindstillingerne så filnavne ikke indeholder specialtegn efter upload. (Omskrivningen af filnavne bevare punktummer)';
$_lang["clear_log"] = 'Slet log';
$_lang["click_to_context"] = 'Klik for at se menuen';
$_lang["click_to_edit_title"] = 'Klik for at redigere denne post';
$_lang["click_to_view_details"] = 'Klik for at se detaljer';
$_lang["close"] = 'Luk';
$_lang["code"] = 'Kode';
$_lang["collapse_tree"] = 'Luk website træet';
$_lang["comment"] = 'Kommentar';

$_lang["configcheck_admin"] = 'Kontakt en system administrator, og advar om denne besked!';
$_lang["configcheck_cache"] = 'cache directory is not writable';
$_lang["configcheck_cache_msg"] = 'Evolution CMS cannot write to the cache directory. Evolution CMS will still function as expected, but no caching will take place. To solve this, make the \'cache\' directory writable.';
$_lang["configcheck_configinc"] = 'Konfigurationsfilen er stadigvæk skrivbar';
$_lang["configcheck_configinc_msg"] = 'Det betyder at hackere kan ødelægge alt indholdet i websitet. Du <strong>skal</strong> ændre (/[+MGR_DIR+]/includes/config.inc.php) så den kun er read-only!';
$_lang["configcheck_default_msg"] = 'Der er opstået en uspecificeret fejl. Dette er så underligt at du bør informere en system administrator.';
$_lang["configcheck_errorpage_unavailable"] = 'Websitets fejlside er ikke til rådighed.';
$_lang["configcheck_errorpage_unavailable_msg"] = 'Det betyder at fejlsiden enten ikke eksisterer eller, at den ikke kan tilgås af normale besøgende. Det kan medføre, at systemet omstiller uden at stoppe, og vil samtidig resultere i, at websitets logfiler til sidst vil fylde for meget. Husk at kontrollere, at der ikke er nogle web bruger grupper, der er sammenkædet med siden.';
$_lang["configcheck_errorpage_unpublished"] = 'Websitets fejlside er enten ikke oprettet eller ikke publiceret.';
$_lang["configcheck_errorpage_unpublished_msg"] = 'Det betyder, at websitets fejlside ikke kan tilgås af normale besøgende. Publicer siden eller kontroller, at siden er tildelt en eksisterende ressource under Værktøjer &gt; Konfiguration.';
$_lang["configcheck_filemanager_path"] = 'The currently set <a href="index.php?a=17&tab=4">File Manager path</a> seems incorrect.';
$_lang["configcheck_filemanager_path_msg"] = 'This can happen for example by moving your installation to a different directory or server. Please check and update your Evolution CMS configuration.';
$_lang["configcheck_hide_warning"] = '<a href="javascript:hideConfigCheckWarning(\'%s\');"><em>Vis ikke dette igen.</em></a>';
$_lang["configcheck_images"] = 'Images mappen er ikke skrivbar';
$_lang["configcheck_images_msg"] = 'Images mappen er ikke oprettet, eller er ikke skrivbar. Det betyder, at du ikke kan indsætte billeder!';
$_lang["configcheck_installer"] = 'Install mappen eksisterer stadig';
$_lang["configcheck_installer_msg"] = 'Det betyder, at /install mappen, som indeholder filerne til at installere Evolution CMS, stadigvæk eksisterer. Prøv at forestille dig hvad en hacker kan bruge den til! De vil sandsynligvis ikke komme så langt, men det er bedre at være på den sikre side, så slet hellere mappen.';
$_lang["configcheck_lang_difference"] = 'Sprogfilen indeholder ikke det korrekte antal linier';
$_lang["configcheck_lang_difference_msg"] = 'Det nuværende valgte sprog indeholder ikke det samme som indholdet i standard sproget. Dette er ikke nødvendigvis et problem, men betyder bare, at sprogfilen trænger til at blive opdateret.';
$_lang["configcheck_notok"] = 'Der er en eller flere fejl i konfigurationen: ';
$_lang["configcheck_ok"] = 'Checket er gennemført korrekt - uden advarsler.';
$_lang["configcheck_php_gdzip"] = 'GD og/eller Zip udvidelserne i PHP blev ikke fundet';
$_lang["configcheck_php_gdzip_msg"] = 'EVO behøver GD og Zip udvidelserne i PHP. Selvom EVO vil kunne bruges uden disse, vil du ikke få det fulde udbytte af den indbyggede filbrowser, billede editeringen eller Captcha til brug ved login.';
$_lang["configcheck_rb_base_dir"] = 'The currently set <a href="index.php?a=17&tab=5">File base path</a> seems incorrect.';
$_lang["configcheck_rb_base_dir_msg"] = 'This can happen for example by moving your installation to a different directory or server. Please check and update your Evolution CMS configuration.';
$_lang["configcheck_register_globals"] = 'register_globals er sat til ON i din php.ini fil';
$_lang["configcheck_register_globals_msg"] = 'Det betyder, at websitet kan blive mere udsat for "Cross Site Scripting" (XSS) angreb. Du bør kontakte system administratoren eller hosting firmaet for at deaktivere dette, såfremt du ikke selv kan gøre det.';
$_lang["configcheck_title"] = 'Konfigurationscheck';
$_lang["configcheck_templateswitcher_present"] = 'TemplateSwitcher plugin\'en er fundet';
$_lang["configcheck_templateswitcher_present_delete"] = '<a href="javascript:deleteTemplateSwitcher();">Slet TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_disable"] = '<a href="javascript:disableTemplateSwitcher();">Deaktiver TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_msg"] = 'TemplateSwitcher plugin\'en er kendt for at forårsage problemer med cashing og hastighed, og bør kun bruges såfremt at funktionaliteten er påkrævet på websitet.';
$_lang["configcheck_unauthorizedpage_unavailable"] = 'Websitets "Ikke autoriseret" side er ikke publiceret eller er ikke oprettet.';
$_lang["configcheck_unauthorizedpage_unavailable_msg"] = 'Det betyder, at den "ikke autoriseret" side ikke kan tilgås af almindelige besøgende eller ikke eksisterer. Det kan medføre, at systemet omstiller uden at stoppe, og vil samtidigt resultere i, at websitets logfiler til sidst vil fylde for meget. Kontroller også at der ikke er tildelt nogle web bruger grupper til siden.';
$_lang["configcheck_unauthorizedpage_unpublished"] = 'Den "ikke autoriseret" side, som er defineret i konfigurationsindstillingerne er ikke publiceret.';
$_lang["configcheck_unauthorizedpage_unpublished_msg"] = 'Det betyder at den "ikke autoriseret" side ikke kan tilgås af normale besøgende. Publicer siden eller tildel den til en eksisterende ressource under Værktøjer &gt; Konfiguration.';
$_lang["configcheck_validate_referer"] = 'Sikkerhedsadvarsel: HTTP Header validering';
$_lang["configcheck_validate_referer_msg"] = 'Konfigurationsindstillingen for <strong>Valider HTTP_REFERER headers?</strong> er slået fra. Det anbefales at slå den til. <a href="index.php?a=17">Gå til konfigurationsindstillingerne</a>';
$_lang["configcheck_warning"] = 'Konfigurationsadvarsel:';
$_lang["configcheck_what"] = 'Hvad betyder dette?';

$_lang["safe_mode_warning"] = 'Safe mode is enabled. Manager functionality is limited.';

$_lang["confirm_block"] = 'Er du sikker på, at du vil blokere denne bruger?';
$_lang["confirm_delete_category"] = 'Are you sure you want to delete this category?';
$_lang["confirm_delete_eventlog"] = 'Er du sikker på, at du vil slette Handlingsloggen?';
$_lang["confirm_delete_file"] = 'Er du sikker på, at du vil slette denne fil?\n\n Dette kan resultere i at, websitet efterfølgende ikke virker korrekt! Slet kun filer hvis du er sikker på, at det ikke ødelægger noget.';
$_lang["confirm_delete_group"] = 'Are you sure you want to delete this group?';
$_lang["confirm_delete_htmlsnippet"] = 'Er du sikker på, at du vil slette denne chunk?';
$_lang["confirm_delete_keywords"] = 'Er du sikker på, at du vil slette disse keywords?';
$_lang["confirm_delete_module"] = 'Er du sikker på, at du vil slette dette modul?';
$_lang["confirm_delete_plugin"] = 'Er du sikker på, at du vil slette denne?';
$_lang["confirm_delete_record"] = 'Er du sikker på, at du vil slette det valgte database indhold?';
$_lang["confirm_delete_resource"] = 'Er du sikker på, at du vil slette denne ressource?\nAlle underliggende ressourcer vil også blive slettet.';
$_lang["confirm_delete_role"] = 'Er du sikker på, at du vil slette denne rolle?';
$_lang["confirm_delete_snippet"] = 'Er du sikker på, at du vil slette denne snippet?';
$_lang["confirm_delete_tags"] = 'Er du sikker på, at du vil slette disse META tags?';
$_lang["confirm_delete_template"] = 'Er du sikker på, at du vil slette denne skabelon?';
$_lang["confirm_delete_tmplvars"] = 'Er du sikker på, at du vil slette denne skabelon variabel samt alle de tilhørende værdier?';
$_lang["confirm_delete_user"] = 'Er du sikker på, at du vil slette denne bruger?';

$_lang["delete_yourself"] = 'You can\'t delete yourself';
$_lang["delete_last_admin"] = 'You can\'t delete last admin user';

$_lang["confirm_delete_permission"] = 'Are you sure you want to delete this Permission?';
$_lang["confirm_duplicate_record"] = 'Er du sikker på, at du vil kopiere dette indhold?';
$_lang["confirm_empty_trash"] = 'Dette vil definitivt slette alt i papirkurven og kan derfor ikke fortrydes!\n\nVil du fortsætte?';
$_lang["confirm_load_depends"] = 'Er du sikker på, at du vil se vinduet med CMS\'ets afhængigheder, uden at gemme dine ændringer?';
$_lang["confirm_name_change"] = 'Ændring af brugernavnet kan medføre, at programmer, der er kædet sammen med CMS\'et, bliver påvirket.\n\nEr du sikker på at du vil ændre dette brugernavn?';
$_lang["confirm_publish"] = '\n\nPublicering af denne ressource vil fjerne alle indstillinger vedr. publicering eller afpublicering. Hvis du ønsker at redigere eller bibeholde disse indstillinger, skal du vælge at redigere denne ressource i stedet.\n\nVil du fortsætte?';
$_lang["confirm_remove_locks"] = 'Nogle gange er der brugere der lukker deres browser, når de er i gang med at redigere ressourcer, skabeloner, snippets eller parsers, hvilket medfølger, at denne er blevet låst. Ved at klikke på \'Godkend\' bliver disse låse ophævet.\n\nVil du fortsætte?';
$_lang["confirm_reset_sort_order"] = 'Are you sure you want to reset the \"sort order/index\" of all listed elements to 0 ?';
$_lang["confirm_resource_duplicate"] = 'Er du sikker på, at du vil kopiere denne ressource? Alle underliggende ressourcer vil også blive kopieret.';
$_lang["confirm_setting_language_change"] = 'Du har ændret standard indholdet, og vil derfor miste eventuelle ændringer.\n\nVil du fortsætte?';
$_lang["confirm_unblock"] = 'Er du sikker på, at du ophæve blokeringen af denne bruger?';
$_lang["confirm_undelete"] = '\n\nAlle underliggende ressourcer, der blev slettet samtidig med denne, vil også blive genskabt. De underliggende ressourcer, der blev slettet på et tidligere tidspunkt, vil ikke blive genskabt.';
$_lang["confirm_unpublish"] = '\n\nAfpublicering af denne ressource vil fjerne alle indstillinger vedr. publicering eller afpublicering. Hvis du ønsker at bibeholde eller rette disse indstillinger, skal du redigere denne ressource i stedent.\n\nVil du fortsætte?';
$_lang["confirm_unzip_file"] = 'Er du sikker på, at du vil udpakke denne fil?\n\nEksisterende filer vil blive overskrevet.';

$_lang["could_not_find_user"] = 'Kunne ikke finde bruger';

$_lang["create_folder_here"] = 'Opret kontainer her';
$_lang["create_resource_here"] = 'Opret ressource her';
$_lang["create_resource_title"] = 'Opret ressource';
$_lang["create_weblink_here"] = 'Opret weblink her';
$_lang["createdon"] = 'Oprettelsesdato';
$_lang["create_new"] = 'Create new';

$_lang["credits"] = 'Krediteringer';
$_lang["credits_shouts_msg"] = 'EVO bliver administreret og vedligeholdt af <a href="https://evo-cms.com//" target="_blank">modx.com</a>.</p>';
$_lang["custom_contenttype_message"] = 'Opret specielle indholdstype for ressourcer. For at oprette en ny; indtast indholdstypen i tekst feltet og klik på  \'Opret\'.';
$_lang["custom_contenttype_title"] = 'Specielle indholdstyper:';

$_lang["database_charset"] = 'Database karaktersæt';
$_lang["database_collation"] = 'Database collations karaktersæt';
$_lang["database_name"] = 'Database navn';
$_lang["database_overhead"] = '<b style="color:#990033;">Bemærk:</b> Overhead er ubrugt men reserveret plads i MySQL databasen. For at fjerne denne, skal du klikke på angivelsen af størrelsen i ovenstående tabels Overhead kolonne.';
$_lang["database_server"] = 'Database server';
$_lang["database_table_clickbackup"] = 'for at udføre en backup og hente de valgte tabeller i databasen';
$_lang["database_table_clickhere"] = 'Klik her';
$_lang["database_table_datasize"] = 'Data størrelse';
$_lang["database_table_droptablestatements"] = 'Generer \'DROP TABLE\' kommandoer.';
$_lang["database_table_effectivesize"] = 'Effektiv størrelse';
$_lang["database_table_indexsize"] = 'Indeks størrelse';
$_lang["database_table_overhead"] = 'Overhead';
$_lang["database_table_records"] = 'Poster';
$_lang["database_table_tablename"] = 'Tabel navn';
$_lang["database_table_totals"] = 'Totalt:';
$_lang["database_table_totalsize"] = 'Total størrelse';
$_lang["database_tables"] = 'Database tabeller';
$_lang["database_version"] = 'Database version:';

$_lang["date"] = 'Dato';
$_lang["datechanged"] = 'Ændret dato';
$_lang["datepicker_offset"] = 'Tidligere år i datovælgeren: ';
$_lang["datepicker_offset_message"] = 'Antallet af tidligere år som datovælgeren skal vise.';
$_lang["datetime_format"] = 'Dato format:';
$_lang["datetime_format_message"] = 'Dato formatet der bruges i CMS\'et.';

$_lang["default"] = 'Standard:';
$_lang["defaultcache_message"] = 'Vælg \'Ja\' for at gøre alle ressourcer cache-bare som standard.';
$_lang["defaultcache_title"] = 'Standard for cache';
$_lang["defaultmenuindex_message"] = 'Vælg \'Ja\' for at slå automatisk menu indeks forøgelse til.';
$_lang["defaultmenuindex_title"] = 'Standard for menu indeks';
$_lang["defaultpublish_message"] = 'Vælg \'Ja\' for at publicere alle ressourcer som stadard.';
$_lang["defaultpublish_title"] = 'Standard for publicering';
$_lang["defaultsearch_message"] = 'Vælg \'Ja\' for at gøre alle ressourcer søgbare som standard.';
$_lang["defaultsearch_title"] = 'Standard for søgbarhed';
$_lang["defaulttemplate_message"] = 'Vælg den skabelon som skal være standard for nye ressourcer. Man har stadigvæk mulighed for at ændre skabelonen for den enkelte ressource, når den redigeres Denne indstilling forudvælger blot en skabelon.';
$_lang["defaulttemplate_title"] = 'Standard skabelon';
$_lang["defaulttemplate_logic_title"] = 'Automatisk tildeling af skabelon';
$_lang["defaulttemplate_logic_general_message"] = 'Nye ressourcer vil blive tildelt følgende skabelon, såfremt denne findes. Hvis ikke vil en skabelon fra det overstående niveau blive brugt:';
$_lang["defaulttemplate_logic_system_message"] = '<strong>Systemet</strong>: systemets standard skabelon.';
$_lang["defaulttemplate_logic_parent_message"] = '<strong>Overstående ressource</strong>: den samme skabelon, som den overstående ressource kontainer.';
$_lang["defaulttemplate_logic_sibling_message"] = '<strong>Samme niveau</strong>: den samme skabelon som de øvrige ressoucer i samme kontainer bruger.';

$_lang["delete"] = 'Slet';
$_lang["delete_resource"] = 'Slet ressourcen';
$_lang["delete_tags"] = 'Slet tags';
$_lang["deleting_file"] = 'Sletter filen: `%s`: ';
$_lang["description"] = 'Beskrivelse';
$_lang["deselect_keywords"] = 'Fjern keywords';
$_lang["deselect_metatags"] = 'Fjern META tags';
$_lang["disabled"] = 'Deaktiveret';
$_lang["doc_data_title"] = 'Se information om ressourcen';
$_lang["documentation"] = 'Documentation';

$_lang["duplicate"] = 'Kopier';
$_lang["duplicate_alias_found"] = 'Ressourcen \'%s\' bruger allerede dette alias \'%s\'. Indtast et unikt alias';
$_lang["duplicate_template_alias_found"] = 'Template \'%s\' is already using the URL alias \'%s\'. Please enter a unique alias.';
$_lang["duplicate_alias_message"] = 'Vælg \'Ja\' for at tillade, at gentagelse af et allerede brugt alias bliver gemt. <b>Bemærk: Denne mulighed bør vælges såfremt,  \'Brug søgevenlig alias sti\' er sat til \'Ja\' for at undgå problemer ved henvisning til en ressource.</b>';
$_lang["duplicate_alias_title"] = 'Tillad gentagelse af alias:';
$_lang["duplicate_name_found_general"] = 'Der eksisterer allerede en %s med navnet \'%s\'. Indtast et unikt navn.';
$_lang["duplicate_name_found_module"] = 'Der eksisterer allerede et modul med navnet \'%s\'. Indtast et unikt navn.';
$_lang["duplicated_el_suffix"] = 'Duplicate';

$_lang["edit"] = 'Rediger';
$_lang["edit_resource"] = 'Rediger ressourcen';
$_lang["edit_resource_title"] = 'Rediger ressourcen';
$_lang["edit_settings"] = 'Konfiguration';
$_lang["editedon"] = 'Sidst redigeret';
$_lang["editing_file"] = 'Redigerer fil: ';
$_lang["editor_css_path_message"] = 'Indtast stien til CSS filen du vil bruge i editoren. Det anbefales, at det er stien fra roden at websitet der angives f.eks: /assets/site/style.css. Feltet skal være tomt, såfremt du ikke vil bruge en CSS fil i editoren.';
$_lang["editor_css_path_title"] = 'Sti til CSS fil:';

$_lang["email"] = 'E-mail';
$_lang["email_sent"] = 'E-mailen er sendt';
$_lang["email_unique"] = 'Email is already in use!';
$_lang["emailsender_message"] = 'Indtast e-mail adressen der bruges til afsendelse af brugernavne og kodeord.';
$_lang["emailsender_title"] = 'E-mail adresse:';
$_lang["emailsubject_default"] = 'Dine log ind oplysninger';
$_lang["emailsubject_message"] = 'Indtast teksten der skal stå i Vedr. feltet i den e-mail, der sendes til dem, der tilmelder sig.';
$_lang["emailsubject_title"] = 'Information vedr.:';

$_lang["empty_folder"] = 'Kontaineren er tom';
$_lang["empty_recycle_bin"] = 'Slet resssourcer i papirkurven';
$_lang["empty_recycle_bin_empty"] = 'Der er ingen ressourcer i papirkurven.';
$_lang["enable_resource"] = 'Aktiver element fil.';
$_lang["enable_sharedparams"] = 'Aktiver parameter deling';
$_lang["enable_sharedparams_msg"] = '<b>Bemærk:</b> Ovenstående globale unikke ID (GUID) identificerer dette modul og dets delte parametere. GUID bliver også brugt til sammenkædning mellem modulet, plugins eller snippets, der bruger de delte parametre. ';
$_lang["enabled"] = 'Slået til';
$_lang["error"] = 'Fejl';
$_lang["error_sending_email"] = 'Fejl ved afsendelse af e-mail';
$_lang["errorpage_message"] = 'Indtast det publicerede og offentligt tilgængelige ressource ID der skal henvises til, såfremt der forespørges til en ikke eksisterende ressource.';
$_lang["errorpage_title"] = 'Fejl side:';
$_lang["event_id"] = 'Hændelse ID';
$_lang["eventlog"] = 'Hændelsesoversigt';
$_lang["eventlog_msg"] = 'Hændelsesloggen indeholder information, advarsler og fejlbeskeder genereret af CMS\'et. \'Kilde\' kolonnen viser den del af CMS\'et der har genereret informationen.';
$_lang["eventlog_viewer"] = 'System handlinger';
$_lang["everybody"] = 'Alle';
$_lang["existing_category"] = 'Eksisterende kategori';
$_lang["expand_tree"] = 'Udvid website træet';
$_lang["failed_login_message"] = 'Indtast antallet af mislykkede log ind forsøg, før brugeren bliver blokeret.';
$_lang["failed_login_title"] = 'Mislykkedes log ind forsøg:';
$_lang["fe_editor_lang_message"] = 'Vælg sproget som front-end editoren skal vise.';
$_lang["fe_editor_lang_title"] = 'Front-end editor sprog:';

$_lang["filemanager_path_message"] = 'Ofte udfylder IIS ikke \'document_root\' indstillingen korrekt. Denne bliver brugt af fil browseren til at angive, hvad man kan se. Hvis der er problemer med fil browseren, så kontroller om denne sti henviser til roden af EVO installationen.';
$_lang["filemanager_path_title"] = 'Fil browser sti:';

$_lang["folder"] = 'Mappe';
$_lang["forgot_password_email_fine_print"] = '* Ovenstående URL udløber, når du har skiftet dit kodeord eller indenfor en dag.';
$_lang["forgot_password_email_instructions"] = 'Der vil du have mulighed for at skifte dit kodeord i konto menuen.';
$_lang["forgot_password_email_intro"] = 'Der er lavet en forespørgelse på at ændre kodeordet til din brugerkonto.';
$_lang["forgot_password_email_link"] = 'Klik her for at gennemføre handlingen.';
$_lang["forgot_your_password"] = 'Har du glemt dit kodeord?';
$_lang["friendly_alias_message"] = 'Med søgevenlige URL aliaser aktiveret, vil ressourcens alias blive brugt i stedet for ressoursens ID, såfremt dette er udfyldt. Det betyder, at en ressource med ID = 1, og som har et alias =  "forside", uden et præfiks (tomt) og en endelse sat til  ".html", vil resultere i følgende: alias = "forside.html". Hvis der ikke er indtastet et alias, vil det resultere i dette alias = "1.html".';
$_lang["friendly_alias_title"] = 'Brug søgevenlige aliaser:';
$_lang["friendlyurls_message"] = 'Brug søgevenlige URLs på Apache webservere med \'mod_rewrite\', eller IIS med tredieparts udvidelser. Se ht.access filen i websitets rod for mere information. Rediger den og gem den i rodmappen som .htaccess';
$_lang["friendlyurls_title"] = 'Brug søgevenlige aliaser:';
$_lang["friendlyurlsprefix_message"] = 'Et præfiks som "side" vil ændre URL\'en /index.php?id=2 til aliaset  "side2.html" - såfremt at URL endelsen er indstillet til  ".html"';
$_lang["friendlyurlsprefix_title"] = 'Søgevenlige URL præfiks:';
$_lang["friendlyurlsuffix_message"] = 'Alle URL endelser, der angives, vil virke. Dette gælder også ingen endelser. Til eksempel. vil ".aspx" tilføje .aspx til alle aliaser.';
$_lang["friendlyurlsuffix_title"] = 'Søgevenlige URL endelse:';
$_lang["functionnotimpl"] = 'Beklager!';
$_lang["functionnotimpl_message"] = 'Denne funktion er endnu ikke implimenteret.';
$_lang["further_info"] = 'Further information';
$_lang["global_tabs"] = 'Global Tabs';
$_lang["go"] = 'Gennemfør';
$_lang["group_access_permissions"] = 'Bruger gruppe adgang';
$_lang['group_tvs'] = 'Group TV';
$_lang["guid"] = 'GUID';
$_lang["help"] = 'Hjælp';
$_lang["help_msg"] = '<p>Du kan få fri og frivillig support <a href="http://forums.modx.com" target="_blank">hvis du besøger EVO\'s Fora</a>. Der er også en større samling af <a href="http://rtfm.modx.com/evolution/1.0" target="_blank">dokumentation og guider til EVO som beskriver stort set alle facetter af EVO.</p><p>Desuden planlægger vi at tilbyde kommerciel service og support til EVO. Kontakt os på <a href="mailto:hello@modx.com?subject=MODX Commercial Support Inquiry">e-mail, hvis dette har din interesse (Skriv venligst på engelsk)</a>.</p>';
$_lang["help_title"] = 'Hjælp';
$_lang["hide_tree"] = 'Skjul website træet';
$_lang["home"] = 'Startside';

$_lang["icon"] = 'Ikon';
$_lang["icon_description"] = 'CSS class value. e.g. fa&nbsp;fa-star';
$_lang["id"] = 'ID';
$_lang["illegal_parent_child"] = 'Tildeling af overstående ressource:\n\nRessourcen er allerede en underliggende ressource af den valgte.';
$_lang["illegal_parent_self"] = 'Tildeling af overstående ressource:\n\nDen valgte resssource kan ikke tildeles til sig selv.';
$_lang["images_management"] = 'Manage Images';
$_lang["import_files_found"] = '<b>Fandt %s ressourcer til importering...</b>';
$_lang["import_params"] = 'Importer modulets delte parametere';
$_lang["import_params_msg"] = 'Du kan importere et moduls parametre eller indstillinger ved at vælge modulets navn fra overstående dropdown menu.<b>Bemærk:</b>For at moduler kan vises i menuen, skal denne plugin/snippet være en del af modulets liste over afhængigheder, og modulet skal have parameter deling aktiveret. ';
$_lang["import_parent_resource"] = 'Start ressource:';
$_lang["update_tree"] = 'Genopbyg træet';
$_lang["update_tree_description"] = '<ul>
<li>Closure table database design pattern that makes working with the document tree more convenient and fast </li>
<li>If the data in the tree is updated not through models, then there is a possibility of an incorrect linking of documents in the database </li>
<li>This operation fixes the problem when site_content is not updated through the model (save, create) and the links (Closure table) are not updated </li>
<li>It is also possible to perform this operation in CLI mode via the \'php artisan closuretable: rebuild\' command </li>
</ul>';
$_lang["update_tree_danger"] = 'If you have more than 1000 resources, it is better to perform this operation in CLI mode using the \'php artisan closuretable: rebuild command\'';
$_lang["update_tree_time"] = 'Rebuild tree finished. Documents processed: <b>%s</b><br>Import took <b>%s</b> seconds to complete.';
$_lang["info"] = 'Information';
$_lang["information"] = 'Information';
$_lang["inline"] = 'Inline';
$_lang["insert"] = 'Indsæt';
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
$_lang["keyword"] = 'Keyword';
$_lang["keywords"] = 'Keywords';
$_lang["keywords_intro"] = 'For at omdøbe et keyword skal du indtaste det nye keyword i tekstfeltet ud for det keyword, der skal omdøbes. For at slette et keyword skal du markere \'Slet\' feltet ud for det pågældende keyword. Hvis man sletter og omdøber samtidigt, vil det pågældende keyword blive slettet!';
$_lang["language_message"] = 'Vælg det sprog der skal vises i CMS\'et.';
$_lang["language_title"] = 'Sprog:';
$_lang["last_update"] = 'Last update';
$_lang["launch_site"] = 'Se website';
$_lang["license"] = 'License';
$_lang["link_attributes"] = 'Link attributer';
$_lang["link_attributes_help"] = 'Indtast de valgfrie attributter for sidens link, f.eks: target=&quot;_blank&quot; eller rel=&quot;external&quot;.';
$_lang["list_mode"] = 'Skift visningstype - for at se alle poster i oversigten.';
$_lang["loading_doc_tree"] = 'Indlæser website træet...';
$_lang["loading_menu"] = 'Indlæser menu...';
$_lang["loading_page"] = 'Vent venligt mens EVO indlæser siden...';
$_lang["localtime"] = 'Lokal tid';

$_lang["lock_htmlsnippet"] = 'Beskyt mod redigering af chunk.';
$_lang["lock_htmlsnippet_msg"] = 'Kun administratorer (med rolle ID = 1) kan redigere denne chunk.';
$_lang["lock_module"] = 'Beskyt mod redigering af dette modul.';
$_lang["lock_module_msg"] = 'Kun administratorer (med rolle ID = 1) kan redigere dette modul.';
$_lang["lock_msg"] = '%s er i øjeblikket igang med at redigere %s. Vent til brugeren er færdig og prøv igen.';
$_lang["lock_plugin"] = 'Beskyt mod redigering af denne plugin.';
$_lang["lock_plugin_msg"] = 'Kun administratorer (med rolle ID = 1) kan redigere denne plugin.';
$_lang["lock_settings_msg"] = '%s er i øjeblikket igang med at redigere disse indstillinger. Vent til brugeren er færdig og prøv igen.';
$_lang["lock_snippet"] = 'Beskyt mod redigering af denne snippet.';
$_lang["lock_snippet_msg"] = 'Kun administratorer (med rolle ID = 1) kan redigere denne snippet.';
$_lang["lock_template"] = 'Beskyt mod redigering af denne skabelon.';
$_lang["lock_template_msg"] = 'Kun administratorer (med rolle ID = 1) kan redigere denne skabelon.';
$_lang["lock_tmplvars"] = 'Beskyt mod redigering af denne skabelon variabel (TV)';
$_lang["lock_tmplvars_msg"] = 'Kun administratorer (med rolle ID = 1) kan redigere denne skabelon variabel.';
$_lang["locked"] = 'Beskyttet';

$_lang["login_allowed_days"] = 'Tilladte dage';
$_lang["login_allowed_days_message"] = 'Vælg de dage som denne bruger har tilladelse til at logge ind i CMS\'et.';
$_lang["login_allowed_ip"] = 'Tilladte IP adresser';
$_lang["login_allowed_ip_message"] = 'Indtast de IP adresser som denne bruger må logge ind fra. <b>Bemærk: Adskil flere IP adresser med komma (,)</b>';
$_lang["login_button"] = 'Log ind';
$_lang["login_cancelled_install_in_progress"] = 'Installation/opdatering af websitet er i gang. Prøv igen om et par minutter!';
$_lang["login_cancelled_site_was_updated"] = 'Installation/opdatering af websitet er udført, du kan nu logge ind igen!';
$_lang["login_captcha_message"] = 'Indtast sikkerhedskoden som er vist i grafikken. Hvis du ikke kan læse koden, skal du klikke på grafikken for at generere en ny kode eller kontakt systemadministratoren.';
$_lang["login_homepage"] = 'Start side efter log ind';
$_lang["login_homepage_message"] = 'Indtast ID nummeret til den ressource brugeren skal henvises til efter log ind. <b>Bemærk: Kontroller at ID\'et henviser til en eksisterende og publiceret ressource, som brugeren har rettigheder til!</b>';
$_lang["login_message"] = 'Indtast brugernavn og kodeord for at få adgang til CMS\'et. Der er forskel på store og små karakterer så vær omhyggelig med indtastningen!';
$_lang["logo_slogan"] = 'EVO Content Manager - \nSkab og gør mere med mindre';
$_lang["logout"] = 'Log ud';
$_lang["long_title"] = 'Lang titel';

$_lang["manager"] = 'Administration';
$_lang["manager_lockout_message"] = 'Du er i øjeblikket logget ind i CMS\'et. Hvis du vil afslutte dit log ind, skal du klikke på  "Log ud" knappen. <p />For at komme til startsiden, skal du klikke på "Startside" knappen.';
$_lang["manager_permissions"] = 'Adgangstilladelser for CMS\'ets brugere';
$_lang["manager_theme"] = 'Administrer tema:';
$_lang["manager_theme_message"] = 'Vælg temaet for CMS\'et.';
$_lang["manager_theme_mode"] = 'Color Scheme:';
$_lang["manager_theme_mode1"] = 'everything is light';
$_lang["manager_theme_mode2"] = 'the header is dark';
$_lang["manager_theme_mode3"] = 'header and sidebar are dark';
$_lang["manager_theme_mode4"] = 'everything is dark';
$_lang['manager_theme_mode_message'] = 'This setting is used as the "default" and can be overridden by the manager when using the theme color mode switch button in the Resource Tree: <i class="fa fa-lg fa-adjust"></i>';
$_lang['manager_theme_mode_title'] = 'Theme color mode switch';

$_lang["meta_keywords"] = 'META Keywords';
$_lang["metatag_intro"] = 'Her kan man oprette, redigere eller slette META tags. For at sammenkæde META tags til ressourcer, kan man under redigering af en ressource tilføje disse på <u>META Keywords</u> fanen. For at tilføje et nyt tag, skal navnet og værdien indtastes. Derefter klikkes på  \'Tilføj tag\' knappen. For at redigere et tag skal man klikke på det pågældende tags navn i oversigten.';
$_lang["metatag_notice"] = 'Som reference kan <a href="http://www.html-reference.com/META.asp" target="_blank">HTML Reference Guide</a> bruges til yderligere information. Dette er dog ikke en komplet liste over META tags og deres brug.';
$_lang["metatags"] = 'META tags';
$_lang["mgr_access_permissions"] = 'Adgangsrettigheder';
$_lang["mgr_login_start"] = 'Manager Login Startup';
$_lang["mgr_login_start_message"] = 'Indtast ressourcens ID som brugeren skal henvises til, efter at denne er logget ind. <b>Bemærk: Kontroller at ID\'et henviser til en eksisterende og publiceret ressource, som brugeren har rettigheder til!</b>';

$_lang["mgrlog_action"] = 'Handling';
$_lang["mgrlog_actionid"] = 'Handling ID';
$_lang["mgrlog_anyall"] = 'Alle';
$_lang["mgrlog_datecheckfalse"] = 'checkdate() returnerede false.';
$_lang["mgrlog_datefr"] = 'Fra dato';
$_lang["mgrlog_dateinvalid"] = 'Der er angivet et forkert dato format.';
$_lang["mgrlog_dateto"] = 'Til dato';
$_lang["mgrlog_emptysrch"] = 'Der var ingen resultater der matchede forespørgelsen.';
$_lang["mgrlog_field"] = 'Felt';
$_lang["mgrlog_itemid"] = 'Element eller ressource ID';
$_lang["mgrlog_itemname"] = 'Element eller ressource navn';
$_lang["mgrlog_msg"] = 'Besked';
$_lang["mgrlog_noquery"] = 'Ingen søgning er indtastet.';
$_lang["mgrlog_qresults"] = 'Søge resultater';
$_lang["mgrlog_query"] = 'Søg i log';
$_lang["mgrlog_query_msg"] = 'Angiv søgekriterierne for at se loggen. Man kan vælge at se loggens indhold i en given periode, men vær opmærksom på, at de valgte datoer er eksklusive. For at se indholdet af loggen i perioden 01-01-2004, skal \'Fra dato\' sættes til 01-01-2004 og \'Til dato\' til 02-01-2004.<br /><br />Beskeder og handlinger er normalt det samme. Hvis man søger en specifik besked, er det bedst at stille handlingen til \'Alle\'.';
$_lang["mgrlog_results"] = 'Antal resultater';
$_lang["mgrlog_searchlogs"] = 'Søg i loggene';
$_lang["mgrlog_sortinst"] = 'Sorter tabellen ved at klikke på overskriften i den enkelte kolonne. Hvis loggen er for stor, <a href="index.php?a=55">skal man klikke her for at tømme den</a>. Dette vil fjerne alt indhold i loggen, og kan ikke fortrydes!';
$_lang["mgrlog_time"] = 'Tidspunkt';
$_lang["mgrlog_user"] = 'Bruger';
$_lang["mgrlog_username"] = 'Brugernavn';
$_lang["mgrlog_value"] = 'Værdi';
$_lang["mgrlog_view"] = 'Se administrationsloggene';

$_lang["modx_news"] = 'EVO Nyhedsbeskeder ';
$_lang["modx_news_tab"] = 'Nyheder fra EVO';
$_lang["modx_news_title"] = 'Nyheder fra EVO';
$_lang["modx_security_notices"] = 'EVO sikkerhedsinformation';
$_lang["modx_version"] = 'EVO version';

$_lang["name"] = 'Navn';

$_lang["no"] = 'Nej';
$_lang["no_active_users_found"] = 'Ingen aktive brugere blev fundet.';
$_lang["no_activity_message"] = 'Du har endnu ikke oprettet eller redigeret nogle ressourcer.';
$_lang["no_category"] = 'Ikke kategoriseret';
$_lang["no_docs_pending_publishing"] = 'Ingen ressourcer venter på at blive publiceret.';
$_lang["no_docs_pending_pubunpub"] = 'Ingen hændelser blev fundet';
$_lang["no_docs_pending_unpublishing"] = 'Ingen ressourcer venter på at blive afpubliceret.';
$_lang["no_edits_creates"] = 'Ingen redigeringer eller tilføjelser blev fundet.';
$_lang["no_groups_found"] = 'Der blev ikke fundet nogle grupper.';
$_lang["no_keywords_found"] = 'Der er i øjeblikket ingen keywords.';
$_lang["no_records_found"] = 'Ingen fundet.';
$_lang["no_results"] = 'Ingen resultater blev fundet';
$_lang["nologentries_message"] = 'Indtast antallet af log poster der skal vises af hændelsesforløbet.';
$_lang["nologentries_title"] = 'Antal af log poster:';
$_lang["none"] = 'Ingen';
$_lang["noresults_message"] = 'Indtast antallet af resultater der skal vises i oversigter og søgeresultater.';
$_lang["noresults_title"] = 'Antallet af resultater:';
$_lang["not_deleted"] = 'er ikke blevet slettet.';
$_lang["not_set"] = 'Ingen';

$_lang["offline"] = 'Offline';

$_lang["online"] = 'Online';
$_lang["onlineusers_action"] = 'Handling';
$_lang["onlineusers_actionid"] = 'Handling ID';
$_lang["onlineusers_ipaddress"] = 'Brugerens IP adresse';
$_lang["onlineusers_lasthit"] = 'Sidste handling';
$_lang["onlineusers_message"] = 'Denne oversigt viser de brugere, der har været aktive indenfor de sidste 20 minutter. (Klokken er nu ';
$_lang["onlineusers_title"] = 'Online brugere';
$_lang["onlineusers_user"] = 'Bruger';
$_lang["onlineusers_userid"] = 'Bruger ID';

$_lang["optimize_table"] = 'Klik her for at optimere denne tabel';

$_lang["page_data_alias"] = 'Alias';
$_lang["page_data_cacheable"] = 'Cachebar';
$_lang["page_data_cacheable_help"] = 'Dette tillader ressourcen at blive cached, og påvirker alle snippets i ressourcen.';
$_lang["page_data_cached"] = '<b>Kilden hentet fra cache:</b>';
$_lang["page_data_changes"] = 'Ændringer';
$_lang["page_data_contentType"] = 'Indholdstype';
$_lang["page_data_contentType_help"] = 'Vælg indholdstypen for denne ressource. Hvis man er i tvivl, bør man lade den stå på \'text/html\'.';
$_lang["page_data_created"] = 'Oprettet';
$_lang["page_data_edited"] = 'Redigeret';
$_lang["page_data_editor"] = 'Bruger formateringseditor';
$_lang["page_data_folder"] = 'Er ressourcen en kontainer';
$_lang["page_data_general"] = 'Generelt';
$_lang["page_data_markup"] = 'Markup/struktur';
$_lang["page_data_mgr_access"] = 'Administrer adgang';
$_lang["page_data_notcached"] = 'Denne ressource er endnu ikke blevet cached.';
$_lang["page_data_publishdate"] = 'Dato for publicering';
$_lang["page_data_publishdate_help"] = 'Hvis der angives en publiceringsdato og et tidspunkt, bliver ressourcen publiceret når tidspunket er nået. Klik i feltet for at skrive et tidspunkt i den viste kalender og vælg derefter datoen. For at fjerne et tidspunkt klikkes på ikonet. Dette medfører, at ressourcen ikke automatisk bliver publiceret.';
$_lang["page_data_published"] = 'Publiceret';
$_lang["page_data_searchable"] = 'Søgbar';
$_lang["page_data_searchable_help"] = 'Hvis feltet er markeret kan ressourcen medtages ved søgning. Det kan dog have en anden betydning, som er afhængig af indstillingerne i forskellige snippets.';
$_lang["page_data_source"] = 'Kilde';
$_lang["page_data_status"] = 'Status';
$_lang["page_data_template"] = 'Bruger skabelonen';
$_lang["page_data_template_help"] = 'Vælg skabelonen som denne ressource skal bruge.';
$_lang["page_data_title"] = 'Side data';
$_lang["page_data_unpublishdate"] = 'Afpubliceringsdato';
$_lang["page_data_unpublishdate_help"] = 'Hvis der angives en afpubliceringsdato, bliver ressourcen automatisk afpubliceret når tidspunktet er nået. Klik i feltet for at skrive et tidspunkt i den viste kalender og vælg derefter datoen. For at fjerne en dato og et tidspunkt klikkes på ikonet. Dette medfører, at ressourcen ikke automatisk bliver afpubliceret';
$_lang["page_data_unpublished"] = 'Afpubliceret';
$_lang["page_data_web_access"] = 'Web adgang';

$_lang["pagetitle"] = 'Ressourcens titel';
$_lang["pagination_table_first"] = 'Første';
$_lang["pagination_table_gotopage"] = 'Gå til side';
$_lang["pagination_table_last"] = 'Sidste';
$_lang["paging_first"] = 'Første';
$_lang["paging_last"] = 'Sidste';
$_lang["paging_next"] = 'Næste';
$_lang["paging_prev"] = 'Forrige';
$_lang["paging_showing"] = 'Viser';
$_lang["paging_to"] = 'til';
$_lang["paging_total"] = 'totalt';
$_lang["parameter"] = 'Parameter';
$_lang["parse_docblock"] = 'Parse DocBlock';
$_lang["parse_docblock_msg"] = 'Attention (!): <b>Resets</b> actual name, configuration, description and category to install-defaults by parsing the source code.';

$_lang["password"] = 'Kodeord';
$_lang["password_change_request"] = 'Ændring af kodeord';
$_lang["password_confirmed"] = 'Passwords doesn\'t match';
$_lang["password_gen_gen"] = 'Lad EVO generere et nyt kodeord.';
$_lang["password_gen_length"] = 'Det angivne kodeord skal indeholde mindst 6 karakterer.';
$_lang["password_gen_method"] = 'Genereringsmetode for kodeord';
$_lang["password_gen_specify"] = 'Indtaster kodeordet manuelt:';
$_lang["password_method"] = 'Kodeordet skal:';
$_lang["password_method_email"] = 'Sendes som e-mail.';
$_lang["password_method_screen"] = 'Vises på skærmen.';
$_lang["password_msg"] = 'Det nye kodeord for <b>:username</b> er <b>:password</b><br>';

$_lang["php_version_check"] = 'MODX er kompatibelt med PHP version 7.4 og nyere. Opgrader venligst PHP installationen!';

$_lang["preview"] = 'Preview';
$_lang["preview_msg"] = 'Dette er et preview af de sidste gemte ændringer. Klik her for at <a href="javascript:;" onclick="saveRefreshPreview();">gemme og opdatere</a> ændringerne';
$_lang["preview_resource"] = 'Preview ressourcen';

$_lang["private"] = 'Privat';
$_lang["public"] = 'Offentligt';
$_lang["publish_date"] = 'Publiceringsdato';
$_lang["publish_events"] = 'Publicer hændelser';
$_lang["publish_resource"] = 'Publicer ressourcen';

$_lang["rb_base_dir_message"] = 'Indtast den fysiske sti til brug for filbrowseren. Denne indstilling bliver normalt automatisk indsat. Dog kan IIS ikke finde ud af denne indstilling selv, hvilket medfører, at filbrowseren viser en fejl. Hvis det er tilfældet, kan man indtaste stien til images mappen her (som den vises i Windows Stifinder). <b>Bemærk:</b> Mappen skal indeholde mapperne; images, files, flash og media for at filbrowseren virker korrekt.';
$_lang["rb_base_dir_title"] = 'Fil base sti:';
$_lang["rb_base_url_message"] = 'Indtast den virtuelle sti til fil mappen. Denne indstilling bliver normalt automatisk indsat. Dog kan IIS ikke finde ud af denne indstilling selv, hvilket medfører, at filbrowseren viser en fejl. Hvis det er tilfældet, kan man indtaste URL\'en til images mappen her (som den vises i Internet Explorer).';
$_lang["rb_base_url_title"] = 'Filbrowser URL:';
$_lang["rb_message"] = 'Vælg \'Ja\' for at aktivere filbrowseren. Dette vil tillade brugerne at gennemse og uploade filer såsom billeder, flash-filer og øvrige media filer på serveren.';
$_lang["rb_title"] = 'Aktiver filbrowser:';
$_lang["rb_webuser_message"] = 'Tillad at webbruger må bruge filbrowseren? <b>Advarsel:</b> Hvis man tillader dette, vil webbrugerne have adgang til filer, som CMS\'ets brugere har adgang til. Brug kun denne indstilling når det er webbrugere, der er tillid til!';
$_lang["rb_webuser_title"] = 'Webbrugere?';
$_lang["recent_docs"] = 'Seneste redigerede ressourcer';
$_lang["recommend_setting_change_title"] = 'Anbefalet konfigurationsændring';
$_lang["recommend_setting_change_description"] = 'Dit website er ikke konfigureret til at validere indgående HTTP_REFERER forespørgelser til administrationsmodulet. Det anbefales på det kraftigeste at aktivere denne indstilling, for at nedsætte risici for CSRF (Cross Site Request Forgery) angreb.';
$_lang["references"] = 'References';
$_lang["refresh_cache"] = 'Cache: Fandt <b>%s</b> filer i cache mappen og slettede <b>%d</b> cache filer.<p>Nye cache filer bliver oprettet når de enkelte ressourcer tilgås.';
$_lang["refresh_published"] = '<b>%s</b> ressourcer blev publiceret.';
$_lang["refresh_site"] = 'Nulstil cachen';
$_lang["refresh_title"] = 'Opdater websitet';
$_lang["refresh_tree"] = 'Opdater website træet';
$_lang["refresh_unpublished"] = '<b>%s</b> ressourcer blev afpubliceret.';
$_lang["release_date"] = 'Udgivelsesdato';
$_lang["remember_last_tab"] = 'Husk fane';
$_lang["remember_last_tab_message"] = 'Sider i administrationsmodulet med faner, vil blive vist med den sidst brugte fane, i stedent for den første fane som der ellers er standard';
$_lang["remember_username"] = 'Husk mig på denne computer';
$_lang["remove"] = 'Fjern';
$_lang["remove_date"] = 'Fjern dato';
$_lang["remove_locks"] = 'Fjern låse';
$_lang["rename"] = 'Omdøb';
$_lang["reports"] = 'Rapporter';
$_lang["report_issues"] = 'Report issues';
$_lang["required_field"] = 'Field :field is required';
$_lang["require_tagname"] = 'Et navn på tag\'et er påkrævet';
$_lang["require_tagvalue"] = 'En værdi på tag\'et er påkrævet';
$_lang["reserved_name_warning"] = 'Du har brugt et navn der er reserveret.';
$_lang["reset"] = 'Nulstil';
$_lang["reset_failedlogins"] = 'nulstil';
$_lang["reset_sort_order"] = 'Reset sort order';

$_lang["manager_access_permissions"] = 'Manager access permission';
$_lang["manage_groups"] = 'Manage document and user groups';
$_lang["manage_document_permissions"] = 'Manage document permissions';
$_lang["manage_module_permissions"] = 'Manage module permissions';
$_lang["manage_tv_permissions"] = 'Manage TV permissions';

$_lang["rss_url_news_default"] = 'https://github.com/evocms-community/evolution/releases.atom';
$_lang["rss_url_news_message"] = 'Indtast URL\'en til EVO nyheds feed.';
$_lang["rss_url_news_title"] = 'RSS nyheds Feed';
$_lang["rss_url_security_default"] = 'https://github.com/extras-evolution/security-fix/releases.atom';
$_lang["rss_url_security_message"] = 'Indtast URL\'en til EVO feed om sikkerhed.';
$_lang["rss_url_security_title"] = 'RSS feed om sikkerhed';

$_lang["run_module"] = 'Kør modulet';
$_lang["save"] = 'Gem';
$_lang["save_all_changes"] = 'Gem alle ændringer';
$_lang["save_tag"] = 'Gem tag';
$_lang["saving"] = 'Gemmer, vent venligst...';

$_lang["search"] = 'Søg';
$_lang["search_criteria"] = 'Søgekriterie';
$_lang["search_criteria_content"] = 'Søg i indhold';
$_lang["search_criteria_content_msg"] = 'Find alle ressourcer med denne tekst i indholdet.';
$_lang["search_criteria_id"] = 'Søg efter ID';
$_lang["search_criteria_id_msg"] = 'Indtast en ressources ID for at kunne finde den hurtigt.';
$_lang["search_criteria_top"] = 'Search in main fields';
$_lang["search_criteria_top_msg"] = 'Pagetitle, Longtitle, Alias, ID';
$_lang["search_criteria_template_id"] = 'Search by template ID';
$_lang["search_criteria_template_id_msg"] = 'Find all Resources using the specified template.';
$_lang["search_criteria_url_msg"] = 'Find Resource by exact URL.';
$_lang["search_criteria_longtitle"] = 'Søg i ressourcens lange titel';
$_lang["search_criteria_longtitle_msg"] = 'Find alle ressourcer med denne tekst i den lange titel.';
$_lang["search_criteria_title"] = 'Søg i titlen';
$_lang["search_criteria_title_msg"] = 'Find alle ressourcer med denne tekst i titlen.';
$_lang["search_empty"] = 'Søgningen gav ikke nogle resultater. Prøv at være mindre specifik, og søg igen.';
$_lang["search_item_deleted"] = 'Dette er blevet slettet';
$_lang["search_results"] = 'Søgeresultater';
$_lang["search_results_returned_desc"] = 'Beskrivelse';
$_lang["search_results_returned_id"] = 'ID';
$_lang["search_results_returned_msg"] = 'Your search criteria returned <b>%s</b> Resources. If a lot of results are being returned, try to enter a more specific search.';
$_lang["search_results_returned_title"] = 'Titel';
$_lang["search_view_docdata"] = 'Se denne';

$_lang["security"] = 'Sikkerhed';
$_lang["security_notices_tab"] = 'Sikkerhedsinformation';
$_lang["security_notices_title"] = 'Sikkerhedsinformation fra EVO';

$_lang["select_date"] = 'Vælg en dato';
$_lang["send"] = 'Send';
$_lang["server_protocol_http"] = 'http';
$_lang["server_protocol_https"] = 'https';
$_lang["server_protocol_message"] = 'Hvis websitet bruger en krypteret forbindelse, skal det angives her.';
$_lang["server_protocol_title"] = 'Server type:';
$_lang["serveroffset"] = 'Serverens tidsforskel';
$_lang["serveroffset_message"] = 'Vælg antallet af timer der er mellem lokal tid og serverens tid. Klokken på serveren er pt: <b>[%s]</b>. Klokken på serveren med den valgte og gemte tidsforskel er pt: <b>[%s]</b>.';
$_lang["serveroffset_title"] = 'Serverens tidsforskel:';
$_lang["servertime"] = 'Server tid';
$_lang["set_automatic"] = 'Set automatic';
$_lang["set_default"] = 'Set default';
$_lang["set_default_all"] = 'Set defaults';

$_lang["settings_after_install"] = 'Da dette er en ny installation, skal disse indstillinger kontrolleres og eventuelt ændres. Når indstillingerne er kontrolleret skal man klikke på \'Gem\' for at opdatere indstillingerne i databasen.';
$_lang["settings_config"] = 'Konfiguration';
$_lang["settings_dependencies"] = 'Afhængigheder';
$_lang["settings_events"] = 'System hændelser';
$_lang["settings_furls"] = 'Søgevenlige URLs';
$_lang["settings_general"] = 'Generelt';
$_lang["settings_group_tv_message"] = 'Choose if Template Variables should be grouped in sections or tabs (named by TV category) when editing a Resource';
$_lang["settings_group_tv_options"] = 'No,Sections in General tab,Tabs in General tab,Sections in new tab,Tabs in new tab,New tabs';
$_lang["settings_misc"] = 'Filstyring';
$_lang["settings_security"] = 'Security';
$_lang["settings_KC"] = 'File Browser';
$_lang["settings_page_settings"] = 'Sideindstillinger';
$_lang["settings_photo"] = 'Billede';
$_lang["settings_properties"] = 'Egenskaber';
$_lang["settings_site"] = 'Website';
$_lang["settings_strip_image_paths_message"] = 'Hvis \'Nej\' er valgt, vil EVO udskrive henvisninger til filer (billeder, filer, flash-filer, osv..) som absolute URL\'s. Relative URLs er derimod en fordel, hvis man på et tidspunkt skal flytte EVO installationen f.eks. fra en udviklingsserver til en produktionsserver. I tvivlstilfælde er det bedst at lade indstillingen stå til \'Ja\'.';
$_lang["settings_strip_image_paths_title"] = 'Omskriv browser stier?';
$_lang["settings_templvars"] = 'Skabelon variabler';
$_lang["settings_title"] = 'System konfiguration';
$_lang["settings_ui"] = 'Interface og muligheder';
$_lang["settings_users"] = 'Indstillinger for brugeren';
$_lang["settings_email_templates"] = 'Email & Templates';

$_lang["show_fullscreen_btn_message"] = 'Show Menu toggle Fullscreen button';
$_lang["show_newresource_btn_message"] = 'Show Menu New Resource button';
$_lang["settings_show_picker_message"] = 'Customize manager theme and save to localstorage';
$_lang["show_fullscreen_btn"] = 'Toggle Fullscreen button';
$_lang["show_newresource_btn"] = 'New Resource button';

$_lang["show_meta"] = 'Vis fanen med META Keywords';
$_lang["show_meta_message"] = 'Vis fanen med META Keywords under redigering af ressourcen. Bemærk at denne funktion bliver afviklet';
$_lang["show_tree"] = 'Vis website træet';
$_lang["show_picker"] = 'Show Color Switcher';
$_lang["showing"] = 'Viser';
$_lang["signupemail_message"] = 'Indtast beskeden der bliver sent som e-mail  til brugere, når de opretter en konto.Beskeden skal indeholde brugernavn og kodeord<br /><b>Bemærk:</b> De følgende pladsholdere bliver udskiftet af CMS\'et, når den enkelte e-mail bliver afsendt: <br /><br />[+sname+] - Navnet på websitet, <br />[+saddr+] - Websitets e-mail adresse, <br />[+surl+] - Websitets URL, <br />[+uid+] - Brugernavnet eller id, <br />[+pwd+] - Brugerens kodeord, <br />[+ufn+] - Brugerens fulde navn.<br /><br /><b>Husk at lade [+uid+] og [+pwd+] stå i e-mailen, idet brugeren ellers ikke modtager brugernavnet og kodeordet!</b>';
$_lang["signupemail_title"] = 'Kontooprettelse:';
$_lang["site"] = 'Websitet';
$_lang["site_schedule"] = 'Planlagte handlinger';
$_lang["sitename_message"] = 'Indtast navet på websitet.';
$_lang["sitename_title"] = 'Websitets navn:';
$_lang["sitestart_message"] = 'Indtast ressourcens ID for at angive startsiden på websitet. <b>Bemærk: ID\'et, der angives, skal tilhøre en eksisterende ressource, som er publiceret!</b>';
$_lang["sitestart_title"] = 'Websitets startside:';
$_lang["sitestatus_message"] = 'Vælg \'Online\' for at websitet er publiceret. Såfremt man vælger \'Offline\', vil de besøgende se  \'Websitet er pt. ikke tilgængeligt\' beskeden, og vil ikke have mulighed for at se andre ressourcer på websitet.';
$_lang["sitestatus_title"] = 'Websitets status:';
$_lang["siteunavailable_message"] = 'Den besked der vises, såfremt websitet er offline eller, at der er opstået en fejl. <b>Bemærk: Denne besked bliver kun vist, såfremt der ikke er angivet en specifik side for \'Websitet er ikke tilgængeligt\'.</b>';
$_lang["siteunavailable_message_default"] = 'Websitet er pt. ikke tilgængeligt pga. systemarbejde.';
$_lang["siteunavailable_page_message"] = 'Indtast ressourcens ID for at angive en specifik side der skal vises, såfremt websitet ikke er tilgængeligt. <b>Bemærk: ID\'et der angives skal tilhøre en eksisterende ressource, som er publiceret!</b>';
$_lang["siteunavailable_page_title"] = 'Websitet er ikke tilgængeligt:';
$_lang["siteunavailable_title"] = 'Websitets besked såfremt det ikke er tilgængeligt:';
$_lang["controller_namespace"] = 'Controller Namespace';
$_lang["controller_namespace_message"] = 'Specify the full Namespace from which it is worth taking controllers, for example: <b>EvolutionCMS\\Main\\Controllers\\</b>';
$_lang["update_repository"] = 'GitHub repository path';
$_lang["update_repository_message"] = 'Enter GitHub repository path for example: <b>evocms-community/evolution</b>';

$_lang["sort_alphabetically"] = 'Sort alphabetically';
$_lang["sort_asc"] = 'Sorter stigende';
$_lang["sort_desc"] = 'Sorter faldende';
$_lang["sort_menuindex"] = 'Sort menu index';
$_lang["sort_tree"] = 'Sorter website træet';
$_lang['sort_updating'] = 'Updating ...';
$_lang['sort_updated'] = 'Updated!';
$_lang['sort_nochildren'] = 'Parent does not have any children';
$_lang["sort_elements_msg"] = 'Drag to reorder the listed elements.';

$_lang["source"] = 'Kilde';
$_lang["stay"] = 'Fortsæt redigering';
$_lang["stay_new"] = 'Tilføj ny';
$_lang["submit"] = 'Godkend';
$_lang["sys_alert"] = 'System advarsel';
$_lang["sysinfo_activity_message"] = 'Denne liste viser hvilke ressourcer der fornyligt er blevet redigeret af brugerne.';
$_lang["sysinfo_userid"] = 'Bruger';
$_lang["system"] = 'System';
$_lang["system_email_signup"] = 'Hello [+uid+]

Here are your login details for [+sname+] Content Manager:

Username: [+uid+]
Password: [+pwd+]

Once you log into the Content Manager ([+surl+]), you can change your password.

Regards,
Site Administrator';
$_lang["system_email_webreminder"] = 'Hej [+uid+]

For at aktivere dit nye kodeord, skal du klikke her:

[+surl+]

Efterfølgende kan du bruge dette kodeord til at logge ind:

Password:[+pwd+]

Hvis du ikke har bedt om et nyt kodeord, skal du bare ignorere denne e-mail.

Hilsen,
Websitets administrator';
$_lang["system_email_websignup"] = 'Hej [+uid+]

Her er dine oplysninger om log ind i [+sname+]:

Brugernavn: [+uid+]
Kodeord: [+pwd+]

Når du er logget ind i [+sname+] ([+surl+]), kan du eventuelt selv skifte dit kodeord.

Hilsen,
Websitets administrator';
$_lang["table_hoverinfo"] = 'Hold musen henover et navn i tabellen for at se en kort beskrivelse af tabellens funktion (Det er dog ikke alle tabeller der har denne beskrivelse).';
$_lang["table_prefix"] = 'Tabel præfiks';
$_lang["tag"] = 'Tag';

$_lang["to"] = 'til';
$_lang["toggle_fullscreen"] = 'Toggle Fullscreen';
$_lang["tools"] = 'Værktøjer';
$_lang["top_howmany_message"] = 'Hvor mange poster skal vises i rapporter?';
$_lang["top_howmany_title"] = 'Antal poster';
$_lang["total"] = 'totalt';
$_lang["track_visitors_message"] = 'Dette aktiverer muligheden for at bruge statistik plugins, som giver mulighed for, at informationen om de besøgende bliver logget.';
$_lang["track_visitors_title"] = 'Aktiver statistik sporing';
$_lang["tree_page_click"] = 'Side klik hændelse';
$_lang["tree_page_click_message"] = 'Standard hændelse, når der klikkes på en ressource i website træet.';
$_lang["use_breadcrumbs"] = 'Show navigation';
$_lang["use_breadcrumbs_message"] = 'Show the navigation when creating or editing Resource in the Manager';
$_lang["tree_show_protected"] = 'Vis beskyttede sider';
$_lang["tree_show_protected_message"] = 'Hvis \'Nej\' er valgt, vil beskyttede ressoucer (og eventuelle underliggende ressourcer) ikke vises i website træet. \'Nej\' er den normale indstilling i EVO.';
$_lang["truncate_table"] = 'Klik her for at forkorte tabellen';
$_lang["type"] = 'Type';
$_lang["udperms_allowroot_message"] = 'Tillad brugere at oprette nye ressourcer i roden af websitet.';
$_lang["udperms_allowroot_title"] = 'Tillad rodadgang:';
$_lang["udperms_message"] = 'Kontroller adgang til ressourcer med brugergrupper og ressource grupper.';
$_lang["udperms_title"] = 'Brug adgangsrettigheder:';
$_lang["unable_set_link"] = 'Det var ikke muligt at oprette linket!';
$_lang["unable_set_parent"] = 'Det var ikke muligt at oprette en ny ovenstående ressource!';
$_lang["unauthorizedpage_message"] = 'Indtast et eksisterende og publiceret ressouce ID som brugere henvises til, såfremt der forspørges til en beskyttet side, de ikke har rettigheder til at se.';
$_lang["unauthorizedpage_title"] = 'Ikke autoriseret side:';
$_lang["unblock_message"] = 'Denne bruger bliver ikke blokeret efter brugeren er gemt.';
$_lang["undelete_resource"] = 'Fortryd sletning';
$_lang["unpublish_date"] = 'Afpubliceringsdato';
$_lang["unpublish_events"] = 'Afpublicer hændelser';
$_lang["unpublish_resource"] = 'Afpublicer ressourcen';
$_lang["untitled_resource"] = 'Ikke-navngivet ressource';
$_lang["untitled_weblink"] = 'Ikke-navngivet weblink';
$_lang["update_params"] = 'Opdater parameter visning';
$_lang["update_settings_from_language"] = 'Udskift dette med indholdet i:';

$_lang["upload_maxsize_message"] = 'Indtast den maksimale filstørrelse som der må uploades med filbrowseren. Størrelsen skal angives i bytes. <b>Bemærk: Det kan tage lang tid at uploade store filer!</b>';
$_lang["upload_maxsize_title"] = 'Maksimal filstørrelse ved upload';
$_lang["uploadable_files_message"] = 'Indtast en liste af filtyper der må uploades til \'assets/files/\' med filbrowseren. Angiv endelserne på filtyperne adskilt af komma. (,)';
$_lang["uploadable_files_title"] = 'Tilladte filtyper der kan uploades:';
$_lang["uploadable_flash_message"] = 'Indtast en lister af filtyper der må uploades til \'assets/flash/\' med filbrowseren. Angiv endelserne på filtyperne adskilt af komma. (,).';
$_lang["uploadable_flash_title"] = 'Tilladte flash filtyper der kan uploades:';
$_lang["uploadable_images_message"] = 'Indtast en liste af filtyper der må uploades til \'assets/images/\' med filbrowseren. Angiv endelserne på filtyperne adskilt af komma. (,).';
$_lang["uploadable_images_title"] = 'Tilladte billede filtyper der kan uploades:';
$_lang["uploadable_media_message"] = 'Indtast en liste af filtyper der må uploades til \'assets/media/\' med filbrowseren. Angiv endelserne på filtyperne adskilt af komma.';
$_lang["uploadable_media_title"] = 'Tilladte media filtyper der kan uploades:';
$_lang["use_alias_path_message"] = 'Hvis dette aktiveres, vil der blive genereret en virtuel sti til ressourcen. Hvis f.eks. en ressource har aliaset "barn.html" og er placeret i en kontainer ressource med aliaset "foraeldre", vil den fulde sti blive "/foraeldre/barn.html".';
$_lang["use_alias_path_title"] = 'Brug søgevenlig alias sti:';
$_lang["use_editor_message"] = 'Aktiver formateringseditoren (Rich Text Editor). Denne indstilling gælder for alle ressourcer, men kan tilsidesættes i brugerindstillingerne.';
$_lang["use_editor_title"] = 'Aktiver formateringseditor:';
$_lang["use_global_tabs"] = 'Use global Tabs';

$_lang["valid_hostnames_message"] = 'Help prevent XSS exploits misusing the site_url system setting by providing a comma separated list of valid hostnames for this installation. This is important for some types of shared hosts or hosts direct accessible via an IP address. First hostname in the list is used if the HTTP_HOST does not match any valid hostname.';
$_lang["valid_hostnames_title"] = 'Valid hostnames';
$_lang["validate_referer_message"] = 'Valider HTTP_REFERER headers for at formindske risikoen for at CMS\'ets brugere bliver lokket til at udføre uønskede handlinger ved et CSRF (Cross Site Request Forgery) angreb. Nogle serverkonfigurationer understøtter ikke denne funktion, hvis de ikke kan sende HTTP_REFERER headers.';
$_lang["validate_referer_title"] = 'Valider HTTP_REFERER headers?';
$_lang["value"] = 'Værdi';
$_lang["version"] = 'Version';
$_lang["view"] = 'Se';
$_lang["view_child_resources_in_container"] = 'Se ressourcer i denne kontainer';
$_lang["view_log"] = 'Se log';
$_lang["view_logging"] = 'Bruger handlinger';
$_lang["view_sysinfo"] = 'System information';
$_lang["warning"] = 'Advarsel!';
$_lang["warning_not_saved"] = 'De ændringer, der er foretaget, er endnu ikke gemt. Du kan vælge at blive på nuværende side for at gemme ændringerne (\'Annuller\'), eller du kan forlade siden og miste ændringerne (\'OK\').';
$_lang["warning_visibility"] = 'Synlighed for konfigurationsadvarsler';
$_lang["warning_visibility_message"] = 'Kontrollerer synligheden af konfigurationsadvarsler, der bliver vist på velkomst siden i administrationsmodulet';
$_lang["web_access_permissions"] = 'Web adgangsrettigheder';
$_lang["web_access_permissions_user_groups"] = 'Webbruger grupper';
$_lang["web_permissions"] = 'Adgangstilladelser for webbrugere';
$_lang["web_user_management_msg"] = 'Vælg webbrugeren som der skal redigeres. Webbrugere kan kun logge ind i websitet';
$_lang["web_user_management_title"] = 'Administrer webbrugere';
$_lang["web_user_management_select_role"] = 'All roles';
$_lang["web_user_title"] = 'Opret eller rediger webbruger';
$_lang["web_users"] = 'Webbrugere';
$_lang["weblink"] = 'Weblink';
$_lang["webpwdreminder_message"] = 'Indtast beskeden, der bliver sent som e-mail til webbrugere, der ønsker et nyt kodeord. CMS\'et sender automatisk en e-mail indeholdende det nye kodeord samt information om aktivering. <br /><b>Bemærk:</b> De følgende pladsholdere bliver udskiftet af CMS\'et, når den enkelte e-mail bliver afsendt: <br /><br />[+sname+] - Navnet på websitet, <br />[+saddr+] - Websitets e-mail adresse, <br />[+surl+] - Websitets URL, <br />[+uid+] - Brugernavnet eller id, <br />[+pwd+] - Brugerens kodeord, <br />[+ufn+] - Brugerens fulde navn.<br /><br /><b>Husk at lade [+uid+] og [+pwd+] stå i e-mailen, idet brugeren ellers ikke modtager brugernavnet og kodeordet!</b>';
$_lang["webpwdreminder_title"] = 'Påmindelses e-mail til webbrugere:';
$_lang["websignupemail_message"] = 'Indtast beskeden, der bliver sent som e-mail til webbrugere, der opretter en konto. <br /><b>Bemærk:</b> De følgende pladsholdere bliver udskiftet af CMS\'et, når den enkelte e-mail bliver afsendt: <br /><br />[+sname+] - Navnet på websitet, <br />[+saddr+] - Websitets e-mail adresse, <br />[+surl+] - Websitets URL, <br />[+uid+] - Brugernavnet eller id, <br />[+pwd+] - Brugerens kodeord, <br />[+ufn+] - Brugerens fulde navn.<br /><br /><b>Husk at lade [+uid+] og [+pwd+] stå i e-mailen, idet brugeren ellers ikke modtager brugernavnet og kodeordet!</b>';
$_lang["websignupemail_title"] = 'E-mail om oprettelse af web bruger konto:';
$_lang["allow_multiple_emails_title"] = 'Duplicate Web User email address';
$_lang["allow_multiple_emails_message"] = 'Allows Web Users to share the same email address for situations when a member may not have their own email address or there is just one family email address.<br/>Note: Any password reminder and registration logic will need to account for this option if set to yes.';
$_lang["welcome_title"] = 'Velkommen til EVO Evolution Content Manager';
$_lang["which_editor_message"] = 'Vælg formateringseditoren der skal bruges (RTE). Du kan eventuelt hente og installere andre formateringseditorer fra EVO download side.';
$_lang["which_editor_title"] = 'Editor der skal bruges:';
$_lang["working"] = 'Arbejder...';
$_lang["wrap_lines"] = 'Ombryd linier';
$_lang["xhtml_urls_message"] = 'Udskift ampersand (&amp;) karakterer i urls som er genereret af EVO med det validerbare &amp;<!-- -->amp; htmlentity';
$_lang["xhtml_urls_title"] = 'XHTML URLs';
$_lang["yes"] = 'Ja';
$_lang["you_got_mail"] = 'Du har modtaget en besked';

$_lang["yourinfo_message"] = 'Dette område viser nogle informationer om dig:';
$_lang["yourinfo_previous_login"] = 'Dit sidste log ind:';
$_lang["yourinfo_role"] = 'Din rolle:';
$_lang["yourinfo_title"] = 'Information om dig';
$_lang["yourinfo_total_logins"] = 'Totalt antal log ind:';
$_lang["yourinfo_username"] = 'Du er logget ind som:';

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
$_lang["enable_filter_phx_warning"] = 'Når PHX plugin aktiveret, indbyggede filtre er som standard deaktiveret';

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
$_lang["bkmgr_restore_submit"] = 'Vend tilbage disse data';
$_lang["bkmgr_restore_confirm"] = 'Er du sikker på du vil vende tilbage backup\n[+filename+] ?';
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
