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
$_lang["about_title"] = 'Om EVO';

// days
$_lang["monday"] = 'Mandag';
$_lang["tuesday"] = 'Tirsdag';
$_lang["wednesday"] = 'Onsdag';
$_lang["thursday"] = 'Torsdag';
$_lang["friday"] = 'Fredag';
$_lang["saturday"] = 'Lørdag';
$_lang["sunday"] = 'Søndag';

// templates
$_lang["template"] = 'Mal';
$_lang["templates"] = 'Templates';
$_lang['templatecontroller'] = 'Template Controller';
$_lang["template_assignedtv_tab"] = 'Assigned Template Variables';
$_lang["template_code"] = 'Mal-kode (html)';
$_lang["template_desc"] = 'Beskrivelse';
$_lang["template_edit_tab"] = 'Edit Template';
$_lang["template_inuse"] = 'This template is in use. Please set the documents using the template to another template. Documents using this template:';
$_lang["template_management_msg"] = 'Her kan du opprette en ny mal eller velge en allerede eksisterende mal for redigering.';
$_lang["template_msg"] = 'Her kan du opprette og redigere maler. Endrede og nye maler kommer ikke på cachede sider før cachen er tømt. Du kan derimot bruke forhåndsvisningen for å se hvordan den oppdaterte malen kommer til å se ut.';
$_lang["template_name"] = 'Navn på mal';
$_lang["template_no_tv"] = 'No Template Variables have been assigned to this Template yet.';
$_lang["template_notassigned_tv"] = 'These Template Variables are available for assigning.';
$_lang["template_reset_all"] = 'Tilbakestill alle sider så de bruker standardmalen';
$_lang["template_reset_specific"] = 'Tilbakestill bare \'%s\' sider';
$_lang["template_assigned_blade_file"] = 'Tilsvarende blade-fil';
$_lang["template_create_blade_file"] = 'Lag malfil ved lagring';
$_lang["template_selectable"] = 'Template selectable when creating or editing ressources.';
$_lang["template_title"] = 'Opprett/rediger maler - lei av oversetting';
$_lang["template_tv_edit"] = 'Edit the TV sort order';
$_lang["template_tv_edit_message"] = 'Drag to reorder the Template Variables for this template.';
$_lang["template_tv_edit_title"] = 'Template Variable Sort Order';
$_lang["template_tv_msg"] = 'The Template Variables assigned to this Template are listed below.';

// tmplvars
$_lang["tv"] = 'Malvariabel';
$_lang["tmplvar"] = 'Template Variable';
$_lang["tmplvars"] = 'Malvariabler';
$_lang["tmplvar_access_msg"] = 'Velg de dokumentgruppene som skal kunne modifisere innholdet eller verdien av denne variabelen';
$_lang["tmplvar_change_template_msg"] = 'Endrer du denne malen, kommer siden til å laste om om alle malvariabler. Alle ikke lagrede endringer kommer til å gå tapt.\n\nEr du sikker på at du vil endre denne malen?';
$_lang["tmplvar_inuse"] = 'Følgende dokument bruker for øyeblikket denne malvariablen. For å fortsette med denne fjerningsoperasjonen, klikk på knappen \'Fjern\'. Klikk på knappen \'Avbryt\' for å avbryte.';
$_lang["tmplvar_tmpl_access"] = 'Maladkomst';
$_lang["tmplvar_tmpl_access_msg"] = 'Velg malene som er avhengige av å bruke denne malvariabelen. ';
$_lang["tmplvars_binding_msg"] = 'Dette feltet tillater bindning av datakilder med @-kommandoen';
$_lang["tmplvars_caption"] = 'Rubrikk';
$_lang["tmplvars_default"] = 'Standardverdi';
$_lang["tmplvars_description"] = 'Beskrivelse';
$_lang["tmplvars_elements"] = 'Dataverdi';
$_lang["tmplvars_inherited"] = 'Value inherited';
$_lang["tmplvars_management_msg"] = 'Her kan du opprette nye malvariabler eller velge en eksisterene for redigering.';
$_lang["tmplvars_msg"] = 'Her kan du legge til og redigere malvariabler. Malvariablene må være påslått for valgte maler for at de skal kunne nås fra kodesnutter og dokument, akkurat som andre innholdsvariabler.';
$_lang["tmplvars_name"] = 'Veriabelnavn';
$_lang["tmplvars_novars"] = 'Ingen malvariabel funnet';
$_lang["tmplvars_rank"] = 'Sortering';
$_lang["tmplvars_rank_edit_message"] = 'Drag to reorder the Template Variables.';
$_lang["tmplvars_reset_params"] = 'Tilbakestill parametere';
$_lang["tmplvars_title"] = 'Create/edit Template Variable';
$_lang["tmplvars_type"] = 'Datatype';
$_lang["tmplvars_widget"] = 'Verktøy';
$_lang["tmplvars_widget_prop"] = 'Verktøyinstillinger';
$_lang["role_no_tv"] = 'No Variables have been assigned to this Role yet.';
$_lang["role_notassigned_tv"] = 'These Variables are available for assigning.';
$_lang["role_tv_msg"] = 'The Variables assigned to this Role are listed below.';
$_lang["tmplvar_roles_access_msg"] = 'Select the Roles that are allowed to access/process this Template Variable';

// snippets
$_lang["snippet"] = 'Kodesnutt';
$_lang["snippets"] = 'Snippets';
$_lang["snippet_code"] = 'Kodesnutt-kode (php)';
$_lang["snippet_desc"] = 'Beskrivelse';
$_lang["snippet_execonsave"] = 'Kjør kodesnutten etter den lagret.';
$_lang["snippet_management_msg"] = 'Her kan du opprette nye kodesnutter eller velge en allerede eksisterende for redigering.';
$_lang["snippet_msg"] = 'Her kan du opprette og redigere kodesnutter. Husk at kodesnutter er \'rå\' PHP-kode, og om du forventar deg at kodesnutten skal skrive noe i malen, så må du angi et returverdi i kodesnutten.';
$_lang["snippet_name"] = 'Navn på kodesnutt';
$_lang["snippet_properties"] = 'Standardegenskaper';
$_lang["snippet_title"] = 'Opprett/rediger kodesnutt';

// chunks
$_lang["htmlsnippet"] = 'Chunk';
$_lang["htmlsnippets"] = 'Chunks';
$_lang["htmlsnippet_desc"] = 'Beskrivelse';
$_lang["htmlsnippet_management_msg"] = 'Her kan du opprette nye htmlstykker eller redigere allerede eksisterende htmlstykker.';
$_lang["htmlsnippet_msg"] = 'Her kan du opprette og redigere htmlstykker. Husk at htmlstykker er \'rå\' HTML-kode, så ingen PHP-kode kommer til å kjøre.';
$_lang["htmlsnippet_name"] = 'Navn på htmlstykke';
$_lang["htmlsnippet_title"] = 'Opprett/rediger htmlstykke';
$_lang["chunk"] = 'Html-stykke';
$_lang["chunk_code"] = 'Htmlstykke-kode (html)';
$_lang["chunk_multiple_id"] = 'Error: Multiple Chunks share the same unique ID.';
$_lang["chunk_no_exist"] = 'Chunk does not exist.';

// plugins
$_lang["plugin"] = 'Plugin';
$_lang["plugins"] = 'Plugins';
$_lang["plugin_code"] = 'Plugin-kode (php)';
$_lang["plugin_config"] = 'Konfigurer plugin';
$_lang["plugin_desc"] = 'Beskrivelse';
$_lang["plugin_disabled"] = 'Denne pluginen er deaktivert';
$_lang["plugin_event_msg"] = 'Velg hendelsene denne plugin\'en skal reagere på.';
$_lang["plugin_management_msg"] = 'Her kan du opprette en ny plugin eller eller velge en eksisterede for redigering.';
$_lang["plugin_msg"] = 'Her kan du opprette og redigere pluginer. Pluginer er \'rå\' PHP-kode som kjøres når de valgte systemhendelsene kalles.';
$_lang["plugin_name"] = 'Pluginnavn';
$_lang["plugin_priority"] = 'Editer Plugin kjøre-order per hendelse';
$_lang["plugin_priority_instructions"] = 'Drag to reorder the Plugins under each Event header. The first plugin to execute should go at the top.';
$_lang["plugin_priority_title"] = 'Plugin Execution Order';
$_lang["purge_plugin"] = 'Purge obsolete plugins';
$_lang["purge_plugin_confirm"] = 'Are you sure you want to purge obsolete plugins?';
$_lang["plugin_title"] = 'Opprette/ redigere plugin.';

// categories
$_lang["category"] = 'Category';
$_lang["categories"] = 'Categories';
$_lang["category_heading"] = 'Kategori';
$_lang["category_manager"] = 'Category Manager';
$_lang["category_management"] = 'Category management';
$_lang["category_msg"] = 'Her kan du vise og redigere alle ressurser etter kategori.';

// file
$_lang["file_delete_file"] = 'Slett fil';
$_lang["file_delete_folder"] = 'Slett katalog';
$_lang["file_deleted"] = 'Suksess!';
$_lang["file_download_file"] = 'Laste ned fil';
$_lang["file_download_unzip"] = 'Pakke opp fil';
$_lang["file_folder_chmod_error"] = 'Unable to change permissions, you will need to change permissions outside of EVO.';
$_lang["file_folder_created"] = 'Mappe opprette!';
$_lang["file_folder_deleted"] = 'Mappen ble fjernet uten problemer!';
$_lang["file_folder_not_created"] = 'Kunne ikke opprette mappe';
$_lang["file_folder_not_deleted"] = 'Kunne ikke fjerne mappen. Pass på at den er tom innen fjerning skjer!';
$_lang["file_not_deleted"] = 'Mislyktes!';
$_lang["file_not_saved"] = 'Kan ikke lagre filen. Kontroller at målmappen er skrivbar!';
$_lang["file_saved"] = 'Filen ble oppdatert uten problemer!';
$_lang["file_unzip"] = 'Oppakking ferdig!';
$_lang["file_unzip_fail"] = 'Oppakkingen mislyktes!';

// files
$_lang["files"] = 'Files';
$_lang["files_files"] = 'Filer';
$_lang["files_access_denied"] = 'Tilgang nektet!';
$_lang["files_data"] = 'Data';
$_lang["files_dir_listing"] = 'Mappeliste for:';
$_lang["files_directories"] = 'Mappe';
$_lang["files_directory_is_empty"] = 'This directory is empty.';
$_lang["files_dirwritable"] = 'Er katalogen skrivbar?';
$_lang["files_editfile"] = 'Rediger fil';
$_lang["files_file_type"] = 'Filtype: ';
$_lang["files_filename"] = 'Filnavn';
$_lang["files_fileoptions"] = 'Alternativ';
$_lang["files_filesize"] = 'Filstørrelse';
$_lang["files_filetype_notok"] = 'Det er ikke tillatt å laste opp denne filtypen!';
$_lang["files_management"] = 'Manage Files';
$_lang["files_management_no_permission"] = 'You do not have enough permissions to view or edit these files. Ask the administrator to grant you access to <b>%s</b>.';
$_lang["files_modified"] = 'Endret';
$_lang["files_top_level"] = 'Til toppnivå';
$_lang["files_up_level"] = 'Opp et nivå';
$_lang["files_upload_copyfailed"] = 'Kunne ikke kopiere filen til målmappen - opplastingen mislyktes!';
$_lang["files_upload_error"] = 'Feil';
$_lang["files_upload_error0"] = 'En feil oppstod med din opplasting.';
$_lang["files_upload_error1"] = 'Filen du prøver å laste opp er for stor (1).';
$_lang["files_upload_error2"] = 'Filen du prøver å laste opp er for stor (2).';
$_lang["files_upload_error3"] = 'Filen du prøver å laste opp ble bare delvis lastet opp.';
$_lang["files_upload_error4"] = 'Du må velge en fil å laste opp.';
$_lang["files_upload_error5"] = 'En feil oppstod med din opplasting.';
$_lang["files_upload_inhibited_msg"] = '<b>Opplasting nektet</b> - særg for at opplastinger støttes og at PHP har skriverettigheter til den aktuelle mappen';
$_lang["files_upload_ok"] = 'Filen ble laster opp korrekt!';
$_lang["files_upload_permissions_error"] = 'Possible permission problems - the directory you want to upload to needs to be writable by your webserver.';
$_lang["files_uploadfile"] = 'Last opp fil';
$_lang["files_uploadfile_msg"] = 'Velg en fil å laste opp:';
$_lang["files_uploading"] = 'Laster opp <b>%s</b> til <b>%s/</b><br />';
$_lang["files_viewfile"] = 'Vis fil';

// modules
$_lang["module"] = 'Module';
$_lang["modules"] = 'Moduler';
$_lang["module_code"] = 'Modul-kode (php)';
$_lang["module_config"] = 'Modulinstillninger';
$_lang["module_desc"] = 'Beskrivelse';
$_lang["module_disabled"] = 'Modulen er slått av';
$_lang["module_edit_click_title"] = 'Klikk her for å redigere denne modulen';
$_lang["module_group_access_msg"] = 'Velg brukergruppene som har tilgang til å kjøre denne modulen fra inneholdshåndtereren.';
$_lang["module_management"] = 'Håndtere moduler';
$_lang["module_management_msg"] = 'Her kan du velge modulen du vil kjøre eller endre. Klikk på ikonet i tabellen for å kjøre modulen. Klikk på modulnavnet for å redigere modulen.';
$_lang["module_msg"] = 'Her kan du legge til og redigere moduler. En modul er en samling av ressurser (dvs pluginer, kodesnutter etc).';
$_lang["module_name"] = 'Modulnavn';
$_lang["module_resource_msg"] = 'Her kan du legge til eller fjerne ressurser som denne modulen er avhengig av. Klikk på en av \'Legg til\'-knappene nedenfor for å legge til en ny ressurs.';
$_lang["module_resource_title"] = 'Modulavhengigheter';
$_lang["module_title"] = 'Oprett/rediger modul';
$_lang["module_viewdepend_msg"] = 'Her kan du se hvilke ressurser modulen er avhengig av. Klikk på knappen \'Håndere avhengigheter\' for å endre avhengigheter.';

// elements
$_lang["element"] = 'Element';
$_lang["elements"] = 'Elements';
$_lang["element_categories"] = 'Combined View';
$_lang["element_filter_msg"] = 'Type here to filter list';
$_lang["element_management"] = 'Manage Elements';
$_lang["element_name"] = 'Element name';
$_lang["element_selector_msg"] = 'Select the Elements(s) from the list below and click the \'Insert\' button.';
$_lang["element_selector_title"] = 'Element Selector';

// resource
$_lang["resource"] = 'Ressurs';
$_lang["resource_alias"] = 'Dokumentets alias';
$_lang["resource_alias_help"] = 'Her kan du angi et alias for dokumentet. Dette gjør dokumentet mulig å nå via: http://dinserver/alias Dette bare om du har tatt i bruk vanlige adresser';
$_lang["resource_content"] = 'Dokumentinnhold';
$_lang["resource_description"] = 'Beskrivelse';
$_lang["resource_description_help"] = 'Du kan skrive en valgfri beskrivelse av dokumentet her.';
$_lang["resource_duplicate"] = 'Duplicate Resource';
$_lang["resource_long_title_help"] = 'Her kan du skrive inn en lengre tittel for ditt dokument. Dette er bra for søkemotorer, og kan bedre beskrive ditt dokument.';
$_lang["resource_metatag_help"] = 'Velg META-tagger og nøkkelord du vil knytte til dette dokumentet. Hold ned Ctrl for å velge flere nøkkelord eller META-tagger.';
$_lang["resource_opt_contentdispo"] = 'Innholdsdisposisjon';
$_lang["resource_opt_contentdispo_help"] = 'Bruk innholdsdisposisjonsfeltet for å spesifisere hvordan dette dokumentet skal behandles av nettleseren. For filnedlalastinger velger du \'Vedlagt fil\'.';
$_lang["resource_opt_emptycache"] = 'Tøm cache';
$_lang["resource_opt_emptycache_help"] = 'Lar du dette feltet være markert, kommer EVO til å tømme cachen når du lagrer dokumentet. Det gjør at dine besøkende ikke kommer til å se en gammel versjon av dokumentet.';
$_lang["resource_opt_folder"] = 'Mappe';
$_lang["resource_opt_folder_help"] = 'Marker her om dokumentet skal oppføre seg som mappe for andre dokumenter. Du trenger ikke å bry deg så mye om dette, siden EVO vanligvis tar hånd om mappeinnstillinger automatisk.';
$_lang["resource_opt_menu_index"] = 'Menyindeks';
$_lang["resource_opt_menu_index_help"] = 'Menyindeks er et felt du kan bruke for å sortere dokumenter i din kodesnutt som bygger menyen. Du kan også bruke det for andre formål i dine kodesnutter.';
$_lang["resource_opt_menu_title"] = 'Menytittel';
$_lang["resource_opt_menu_title_help"] = 'Menytittel er et felt du kan bruke for å vise en kort tittel for dokumentet i dine menykodesnutter eller moduler.';
$_lang["resource_opt_published"] = 'Publisert';
$_lang["resource_opt_published_help"] = 'Marker dette feltet om dokumentet skal publiseres direkte når det lagres.';
$_lang["resource_opt_richtext"] = 'Riktekst';
$_lang["resource_opt_richtext_help"] = 'La denne være avkrysset for å bruke en riktekst-editor til dokumentredigering. Om dine dokumenter inneholder javascript eller formler, ta vekk denne for å redigere i HTML-modus så editoren ikke roter til dine dokumenter.';
$_lang["resource_opt_show_menu"] = 'Vis i meny';
$_lang["resource_opt_show_menu_help"] = 'Velg denne innstillingen for å vise dokumentet i en webmeny. Noter at enkelte menybyggerprogram kan velge å ikke bry seg om denne innstillingen.';
$_lang["resource_opt_trackvisit_help"] = 'Logg alle besøk på dette dokumentet.';
$_lang["resource_overview"] = 'Resource overview';
$_lang["resource_parent"] = 'Dokumenteier';
$_lang["resource_parent_help"] = 'Klikk på det ovenstående mappeikonet for å sette (eller fjerne) eiervalg. Klikk deretter på et dokument i dokumenttreet for å sette det som eier til dette dokumententet.';
$_lang["resource_permissions_error"] = 'Assign this Resource to at least one Resource Group to which you have access.';
$_lang["resource_setting"] = 'Dokumentinnstillinger';
$_lang["resource_summary"] = 'Sammendrag';
$_lang["resource_summary_help"] = 'Skriv et kort sammendrag av dokumentet';
$_lang["resource_title"] = 'Tittel';
$_lang["resource_title_help"] = 'Skriv navnet/tittelen på dokumentet her. Unngå skråstrek i navnet!';
$_lang["resource_to_be_moved"] = 'Dokumentet som skal flyttes';
$_lang["resource_type"] = 'Resource Type';
$_lang["resource_type_message"] = 'Weblinks reference Resources on the Internet including another Evolution CMS Resource, an external page, or an image or other file on the Internet. Weblinks should have a text/html Internet Media Type and Inline Content-Disposition.';
$_lang["resource_type_weblink"] = 'Weblink';
$_lang["resource_type_webpage"] = 'Web page';
$_lang["resource_weblink_help"] = 'Angi adressen til objektet du vil referere til med denne weblinken.';
$_lang["resources_in_container"] = 'Resources in this Container';
$_lang["resources_in_container_no"] = 'This Container does not have child-Resources.';

// role
$_lang["role"] = 'Role';
$_lang["role_about"] = 'Vise Om-siden';
$_lang["role_actionok"] = 'Vis \'Handling utført\'-siden';
$_lang["role_assets_images"] = 'Manage assets/images';
$_lang["role_assets_files"] = 'Manage assets/files';
$_lang["role_bk_manager"] = 'Bruke håndtereren for sikkerhetskopierng';
$_lang["role_cache_refresh"] = 'Tøm webplassens cache';
$_lang["role_category_manager"] = 'Use the Category Manager';
$_lang["role_change_password"] = 'Bytt passord';
$_lang["role_change_resourcetype"] = 'Endre ressurstype';
$_lang["role_chunk_management"] = 'Chunk management';
$_lang["role_config_management"] = 'Konfigurasjonshåndtering';
$_lang["role_content_management"] = 'Innholdshåndtering';
$_lang["role_create_chunk"] = 'Create new Chunks';
$_lang["role_create_doc"] = 'Opprett nytt dokument';
$_lang["role_create_plugin"] = 'Opprett ny pluginer';
$_lang["role_create_snippet"] = 'Opprett ny kodesnutter';
$_lang["role_create_template"] = 'Lag nye maler';
$_lang["role_credits"] = 'Vis krediteringssiden';
$_lang["role_delete_chunk"] = 'Delete Chunks';
$_lang["role_delete_doc"] = 'Fjern dokument';
$_lang["role_delete_eventlog"] = 'Slett hendelseslogg';
$_lang["role_delete_module"] = 'Slett modul';
$_lang["role_delete_plugin"] = 'Fjerne pluginer';
$_lang["role_delete_role"] = 'Fjern roller';
$_lang["role_delete_snippet"] = 'Fjern kodesnutter';
$_lang["role_delete_template"] = 'Ta bort maler';
$_lang["role_delete_user"] = 'Fjern brukere';
$_lang["role_delete_web_user"] = 'Slett webbrukere';
$_lang["role_edit_chunk"] = 'Edit Chunks';
$_lang["role_edit_doc"] = 'Rediger dokument';
$_lang["role_edit_doc_metatags"] = 'Redigere dokumentets META-tagger og nøkkelord';
$_lang["role_edit_module"] = 'Rediger modul';
$_lang["role_edit_plugin"] = 'Rediger pluginer';
$_lang["role_edit_role"] = 'Rediger roller';
$_lang["role_edit_settings"] = 'Endre webplassens instillinger';
$_lang["role_edit_snippet"] = 'Rediger kodesnutter';
$_lang["role_edit_template"] = 'Rediger maler';
$_lang["role_edit_user"] = 'Rediger brukere';
$_lang["role_edit_web_user"] = 'Rediger webbrukere';
$_lang["role_empty_trash"] = 'Permanently purge deleted Resources';
$_lang["role_errors"] = 'Vis feildialog';
$_lang["role_eventlog_management"] = 'Håndter hendelseslogger';
$_lang["role_export_static"] = 'Export Static HTML';
$_lang["role_file_management"] = 'File Management';
$_lang["role_file_manager"] = 'Bruk filhåndtereren';
$_lang["role_frames"] = 'Last sidehåndtereren';
$_lang["role_help"] = 'Vis hjelpesider';
$_lang["role_home"] = 'Last introduksjonssiden';
$_lang["role_import_static"] = 'Import HTML';
$_lang["role_logout"] = 'Logg ut fra sidehåndtereren';
$_lang["role_list_module"] = 'List Module';
$_lang["role_manage_metatags"] = 'Håndtere webplassens META-tagger og nøkkelord';
$_lang["role_management_msg"] = 'Her kan du opprette en ny rolle eller velge en allerede eksisterende rolle for redigering.';
$_lang["role_management_title"] = 'Rollehåndtering';
$_lang["role_messages"] = 'Les og send meldinger';
$_lang["role_module_management"] = 'Håndtere moduler';
$_lang["role_name"] = 'Rollenavn';
$_lang["role_new_module"] = 'Opprett ny modul';
$_lang["role_new_role"] = 'Opprett nye roller';
$_lang["role_new_user"] = 'Opprett nye brukere';
$_lang["role_new_web_user"] = 'Oprette nye webbrukere';
$_lang["role_plugin_management"] = 'Håndtere plugin';
$_lang["role_publish_doc"] = 'Publish Resources';
$_lang["role_remove_locks"] = 'Remove Locks';
$_lang["role_role_management"] = 'Rollehåndtering';
$_lang["role_run_module"] = 'Kjør modul';
$_lang["role_save_chunk"] = 'Save Chunks';
$_lang["role_save_doc"] = 'Lagre dokument';
$_lang["role_save_module"] = 'Lagre modul';
$_lang["role_save_password"] = 'Lagre passord';
$_lang["role_save_plugin"] = 'Lagre pluginer';
$_lang["role_save_role"] = 'Lagre roller';
$_lang["role_save_snippet"] = 'Lagre kodesnutter';
$_lang["role_save_template"] = 'Lagre maler';
$_lang["role_save_user"] = 'Lagre bruker';
$_lang["role_save_web_user"] = 'Lagre webbrukere';
$_lang["role_snippet_management"] = 'Kodesnuttshåntering';
$_lang["role_template_management"] = 'Malhåntering';
$_lang["role_title"] = 'Opprett/rediger rolle';
$_lang["role_udperms"] = 'Tilhørighetshåndtering';
$_lang["role_user_management"] = 'Brukerhåndtering';
$_lang["role_view_docdata"] = 'Vis dokumentdata';
$_lang["role_view_eventlog"] = 'Vis hendelseslogg';
$_lang["role_view_logs"] = 'Vis systemlogger';
$_lang["role_view_unpublished"] = 'Vis upubliserte dokumenter';
$_lang["role_web_access_persmissions"] = 'Rettigheter for webtilgang';
$_lang["role_web_user_management"] = 'Håndtere webbrukere';

// user
$_lang["user"] = 'Brukere';
$_lang["users"] = 'Brukere';
$_lang["user_block"] = 'Blokkert';
$_lang["user_blockedafter"] = 'Blokkert etter';
$_lang["user_blockeduntil"] = 'Blokkert til';
$_lang["user_changeddata"] = 'Your data has been changed. Please log in again.';
$_lang["user_country"] = 'Land';
$_lang["user_dob"] = 'Fødselsdato';
$_lang["user_doesnt_exist"] = 'Bruker finnes ikke';
$_lang["user_edit_self_msg"] = '<b>Etter du har lagret kan det hende du må logge ut og inn  igjen for at dine instillinger skal oppdateres fullstendig</b><br />Om du velger å generere et nytt passord til deg selv, kommer det til å sendes til din epostadresse.';
$_lang["user_email"] = 'Epostadresse';
$_lang["user_failedlogincount"] = 'Mislykkede inlogginger';
$_lang["user_fax"] = 'Faks';
$_lang["user_female"] = 'Kvinne';
$_lang["user_full_name"] = 'Fullstendig navn';
$_lang["user_first_name"] = 'First name';
$_lang["user_last_name"] = 'Last Name';
$_lang["user_middle_name"] = 'Middle Name';
$_lang["user_gender"] = 'Kjønn';
$_lang["user_is_blocked"] = 'Denne brukeren er blokkert!';
$_lang["user_logincount"] = 'Antall innlogginger';
$_lang["user_male"] = 'Mann';
$_lang["user_management_msg"] = 'Her kan du opprette nye brukere av innholdshåndtereren eller velge en allerede eksisterende bruker for redigering. Disse brukerne kan logge inn i innholdshåndtereren.';
$_lang["user_management_title"] = 'Håndtere brukere';
$_lang["user_mobile"] = 'Mobilnummer';
$_lang["user_phone"] = 'Telefonnummer';
$_lang["user_photo"] = 'Brukerfoto';
$_lang["user_photo_message"] = 'Skriv inn søkestien til bildene for denne brukeren, eller bruk \'Info\'-knappen for å åpne et nytt vindu der du kan velge et foto og laste det opp til serveren.';
$_lang["user_prevlogin"] = 'Siste inlogging';
$_lang["user_role"] = 'Brukerens rolle';
$_lang["no_user_role"] = 'No user role';
$_lang["user_state"] = 'Kommune';
$_lang["user_title"] = 'Opprett/rediger brukere';
$_lang["user_upload_message"] = ' If you wish to stop this User uploading any filetypes in this category, make sure that the \'Use Main Configuration Setting\' checkbox is not ticked and leave the field blank.';
$_lang["user_use_config"] = 'Use System Configuration Setting';
$_lang["user_verification"] = 'User is verified';
$_lang["user_zip"] = 'Postnummer';
$_lang["username"] = 'Brukernavn';
$_lang["username_unique"] = 'User name is already in use!';
$_lang["user_street"] = 'Street';
$_lang["user_city"] = 'City';
$_lang["user_other"] = 'Other';

// add
$_lang["add"] = 'Legg til';
$_lang["add_chunk"] = 'Legg til html-stykke';
$_lang["add_doc"] = 'Legg til dokument';
$_lang["add_folder"] = 'Ny mappe';
$_lang["add_plugin"] = 'Legg til plugin';
$_lang["add_resource"] = 'Nytt dokument';
$_lang["add_snippet"] = 'Legg til kodesnutt';
$_lang["add_tag"] = 'Legg til tag';
$_lang["add_template"] = 'Legg til mal';
$_lang["add_tv"] = 'Legg til malvariabel';
$_lang["add_weblink"] = 'Ny weblink';

// new
$_lang["new_category"] = 'Ny Kategori';
$_lang["new_file_permissions_message"] = 'When uploading a new file in the File Manager, the File Manager will attempt to change the file permissions to those entered in this setting. This may not work on some setups, such as IIS, in which case you will need to manually change the permissions.';
$_lang["new_file_permissions_title"] = 'New File Permissions';
$_lang["new_folder_permissions_message"] = 'When creating a new directory in the File Manager, the File Manager will attempt to change the directory permissions to those entered in this setting. This may not work on some setups, such as IIS, in which case you will need to manually change the permissions.';
$_lang["new_folder_permissions_title"] = 'New Directory Permissions';
$_lang["new_permission"] = 'New Permission';
$_lang["new_htmlsnippet"] = 'Nytt htmlstykke';
$_lang["new_keyword"] = 'Legg til et nytt nøkkelord:';
$_lang["new_module"] = 'Ny modul';
$_lang["new_parent"] = 'Ny eier';
$_lang["new_plugin"] = 'Ny plugin';
$_lang["new_role"] = 'Opprette en ny rolle';
$_lang["new_snippet"] = 'Ny kodesnutt';
$_lang["new_template"] = 'Ny mal';
$_lang["new_tmplvars"] = 'Ny malvariabel';
$_lang["new_user"] = 'Ny bruker';
$_lang["new_web_user"] = 'Ny webbruker';
$_lang["new_resource"] = 'Nytt dokument';

// manage
$_lang["manage_categories"] = 'Manage Categories';
$_lang["manage_depends"] = 'Håndtere avhengigheter';
$_lang["manage_files"] = 'Håndtere filer';
$_lang["manage_htmlsnippets"] = 'Manage Chunks';
$_lang["manage_metatags"] = 'Håndtere META-tagger og nøkkelord';
$_lang["manage_modules"] = 'Håndtere moduler';
$_lang["manage_plugins"] = 'Manage Plugins';
$_lang["manage_snippets"] = 'Manage Snippets';
$_lang["manage_templates"] = 'Manage Templates';
$_lang["manage_documents"] = 'Manage Documents';
$_lang["manage_permission"] = 'Manage Permissions';

// move
$_lang["move"] = 'Flytt';
$_lang["move_resource"] = 'Flytt dokument';
$_lang["move_resource_message"] = 'Du kan flytte et dokument og alle underdokumenter ved å velge en ny eier i treet. Om du velger et dokument som ikke er en mappe, kommer det til å endres til en mappe. Klikk på den nye eieren i treet.';
$_lang["move_resource_new_parent"] = 'Velg en ny eier i dokumenttreet.';
$_lang["move_resource_title"] = 'Flytt dokument';

$_lang["access_permissions"] = 'Tilgangsinnstillinger';
$_lang["access_permission_denied"] = 'Du har ikke rettigheter til dette dokumentet.';
$_lang["access_permission_parent_denied"] = 'Du har ikke tilgang til å lage et dokument her!';
$_lang["access_permissions_add_resource_group"] = 'Lag ny dokumentgruppe';
$_lang["access_permissions_add_user_group"] = 'Lag ny brukergruppe';
$_lang["access_permissions_docs_message"] = 'Her kan du velge hvilke dokumentgrupper dette dokumentet skal tilhøre:';
$_lang["access_permissions_group_link"] = 'Create a new group link';
$_lang["access_permissions_introtext"] = 'Her kan du håndtere brukergruppene og dokumentgruppene som brukes for adgangskontroll. For å legge til en bruker til en gruppe, rediger brukeren og velge gruppene brukeren skal være medlem i. For å legge til et dokument til en brukergruppe, rediger dokumentet og velg de gruppene som det skal tilhøre.';
$_lang["access_permissions_link_to_group"] = 'to Resource Group';
$_lang["access_permissions_context"] = 'in context';
$_lang["access_permissions_link_user_group"] = 'Link User Group';
$_lang["access_permissions_links"] = 'Bruker/dokument -gruppelinker';
$_lang["access_permissions_links_tab"] = 'Her spesifiserer du hvilke brukergrupper som har tilgang til de ulike dokumentgruppene (dvs kan redigere eller opprette underdokument).  For å lenke en dokumentgruppe til en brukergruppe, velg gruppen fra menyen og klikk på \'Lenke\'. For for å fjerne linken til en gruppe, klikk på \'Fjern ->\'. Dette fjerner linken med en gang.';
$_lang["access_permissions_no_resources_in_group"] = 'Ingen.';
$_lang["access_permissions_no_users_in_group"] = 'Ingen.';
$_lang["access_permissions_off"] = '<span class="warning">Tilgangsinnstillinger er slått av.</span> Dette betyr at forandringer som gjøres ikke kommer til å ha noen effekt før tilgangsinnstillingene er aktiverte.';
$_lang["access_permissions_resource_groups"] = 'Dokumentgrupper';
$_lang["access_permissions_resources_in_group"] = '<b>Dokument i gruppen:</b> ';
$_lang["access_permissions_resources_tab"] = 'Her kan du se hvilke dokumentgrupper som har blitt konfigurert. Du kan til og med lage nye og bytte navn på grupper, samt se hvilke dokumenter som tilhører en spesifikk gruppe (hold musepekeren over dokumentets ID for å se navnet på dokumentet). For å legge til eller fjerne et dokument fra en gruppe, rediger dokumentet direkte.';
$_lang["access_permissions_user_toggle"] = 'Toggle access permissions';
$_lang["access_permissions_user_groups"] = 'Brukergrupper';
$_lang["access_permissions_user_message"] = 'Her kan du velge hvilke brukergrupper denne brukeren skal tilhøre:';
$_lang["access_permissions_users_in_group"] = '<b>Brukere i gruppen:</b> ';
$_lang["access_permissions_users_tab"] = 'Her kan du se hvilke brukergrupper som har blitt konfigurert. Du kan også opprette nye, bytte navn på og fjerne grupper, samt se hvilke brukere som er medlemmer i en spesifikk gruppe. For å legge til eller fjerne en bruker fra en gruppe, rediger brukeren direkte. Administratorer (som har rolle-id 1) har alltid tillgang til alle dokumenter, så de trenger ikke å legges til noen grupper.';

$_lang["users_list"] = 'Users list';
$_lang["documents_list"] = 'Resources list';

$_lang["account_email"] = 'Konto e-post';
$_lang["actioncomplete"] = '<b>Hendelsen er utført!</b><br /> - Vent mens EVO rydder opp.';
$_lang["activity_message"] = 'Denne listen viser de siste dokumentene som du har opprettet eller redigert:';
$_lang["activity_title"] = 'Nylig opprettede/redigerte dokumenter';

$_lang["administrator_role_message"] = 'Denne rollen kan ikke redigeres eller fjernes.';
$_lang["administrators"] = 'Administrators';
$_lang["after_saving"] = 'Etter lagring';
$_lang["alert_delete_self"] = 'Du kan ikke fjerne deg selv!';
$_lang["alias"] = 'Alias';
$_lang["all_doc_groups"] = 'Alle dokumentgrupper (offentlig)';
$_lang["all_events"] = 'Alle hendelser';
$_lang["all_usr_groups"] = 'Alle brukergrupper (offentlig)';
$_lang["allow_mgr_access"] = 'Adgang til håndtererens grensesnitt';
$_lang["allow_mgr_access_message"] = 'Bruk denne innstillingen for å tillate eller nekte tilgang til håndtererens grensesnitt.<br /><b>NB: Hvis denne innstillingen er satt til \'Nei\' kommer brukeren til å omdirigeres til innloggningssiden eller webplassens startside.</b>';
$_lang["already_deleted"] = 'er allerede slettet.';
$_lang["attachment"] = 'Vedlagt fil';
$_lang["author_infos"] = 'Author information';
$_lang["automatic_alias_message"] = 'Velg \'Ja\' for å la systemet automatiskt opprette et alias basert på dokumentets tittel når det lagres.';
$_lang["automatic_alias_title"] = 'Generere alias automatisk basert på tittel';
$_lang["backup"] = 'Sikkerhetskopi';
$_lang["bk_manager"] = 'Sikkerhetskopiering';
$_lang["block_message"] = 'Denne brukeren kommer til å blokkeres når brukerens data lagres!';
$_lang["blocked_minutes_message"] = 'Her kan du legge inn antall minutter som brukeren vil låses ute av systemet hvis de skriver inn feil passord flere ganger enn tillatt. Vennligst skriv inn denne verdien som et heltall (ingen komma, mellomrom, etc.)';
$_lang["blocked_minutes_title"] = 'Minutter blokkert:';
$_lang["cache_files_deleted"] = 'Følgende filer ble fjernet:';
$_lang["cancel"] = 'Avbryt';
$_lang["captcha_code"] = 'Sikkerhetskode';
$_lang["captcha_message"] = 'Bruk dette for å styrke sikkerheten ved å la brukere skrive inn en sikkerhetskode som er ulesbar for datamaskiner.';
$_lang["captcha_title"] = 'Bruk CAPTCHA-koder';
$_lang["captcha_words_default"] = 'MODX,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join(),Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote';
$_lang["captcha_words_message"] = 'Her kan du skrive en liste av CAPTCHA-ord som brukes hvis CAPTCHA er slått på. Separer ordene med et kommategn. Dette tekstfeltet er begrenset til 255 tegn.';
$_lang["captcha_words_title"] = 'CAPTCHA-ord';

$_lang["cfg_base_path"] = 'MODX_BASE_PATH';
$_lang["cfg_base_url"] = 'MODX_BASE_URL';
$_lang["cfg_manager_path"] = 'MODX_MANAGER_PATH';
$_lang["cfg_manager_url"] = 'MODX_MANAGER_URL';
$_lang["cfg_site_url"] = 'MODX_SITE_URL';

$_lang["change_name"] = 'Endre navn';
$_lang["change_password"] = 'Bytt passord';
$_lang["change_password_confirm"] = 'Bekreft passord';
$_lang["change_password_message"] = 'Skriv inn ditt nye passord, og gjør det en gang til for å bekrefte. Ditt passord må være mellon 6 og 15 tegn langt.';
$_lang["change_password_new"] = 'Nytt passord';
$_lang["charset_message"] = 'Velg tegnkodingen du ønsker å bruke i innholdsredigeringen.<br /><b>Obs: EVO har blitt testet med et antall av disse tegnkodingene, men ikke alle. For de fleste språk holder standardalternativet ISO-8859-1 utmerket.</b>';
$_lang["charset_title"] = 'Tegnkoding';

$_lang["cleaningup"] = 'Rydder opp';
$_lang["clean_uploaded_filename"] = 'Use Transliteration for File Uploads';
$_lang["clean_uploaded_filename_message"] = 'Use the default or transalias settings for the file name to clean special characters from uploaded file names, preserving dot-characters (periods)';
$_lang["clear_log"] = 'Tøm logg';
$_lang["click_to_context"] = 'Klikk for å komme til hurtigmenyen';
$_lang["click_to_edit_title"] = 'Klikk her for å redigere denne posten';
$_lang["click_to_view_details"] = 'Klikk her for å se detaljer';
$_lang["close"] = 'Lukk';
$_lang["code"] = 'Code';
$_lang["collapse_tree"] = 'Kollaps tre';
$_lang["comment"] = 'Kommentar';

$_lang["configcheck_admin"] = 'Kontakt en systemadministrator og si ifra om denne advarselen!';
$_lang["configcheck_cache"] = 'cache directory is not writable';
$_lang["configcheck_cache_msg"] = 'Evolution CMS cannot write to the cache directory. Evolution CMS will still function as expected, but no caching will take place. To solve this, make the \'cache\' directory writable.';
$_lang["configcheck_configinc"] = 'Konfigurasjonsfil er fortsatt skrivbar';
$_lang["configcheck_configinc_msg"] = 'En angriper kan potensielt ødelegge siden din og alt som er relatert til den. Vennligst fjern skriverettigheter til  konfigurasjonsfilen din (/[+MGR_DIR+]/includes/config.inc.php) for å være sikker!';
$_lang["configcheck_default_msg"] = 'En uspesifisert advarsel ble funnet. Dette skal vanligvis ikke forekomme.';
$_lang["configcheck_errorpage_unavailable"] = 'Your site\'s Error page is not available.';
$_lang["configcheck_errorpage_unavailable_msg"] = 'This means that your Error page is not accessible to normal web surfers or does not exist. This can lead to a recursive looping condition and many errors in your site logs. Make sure there are no Webuser Groups assigned to the page.';
$_lang["configcheck_errorpage_unpublished"] = 'Your site\'s Error page is not published or does not exist.';
$_lang["configcheck_errorpage_unpublished_msg"] = 'This means that your Error page is inaccessible to the general public. Publish the page or make sure it is assigned to an existing Resource in your Site Tree in the Tools &gt; Configuration menu.';
$_lang["configcheck_filemanager_path"] = 'The currently set <a href="index.php?a=17&tab=4">File Manager path</a> seems incorrect.';
$_lang["configcheck_filemanager_path_msg"] = 'This can happen for example by moving your installation to a different directory or server. Please check and update your Evolution CMS configuration.';
$_lang["configcheck_hide_warning"] = '<a href="javascript:hideConfigCheckWarning(\'%s\');"><em>Don\'t show this again.</em></a>';
$_lang["configcheck_images"] = 'Bildemappen er ikke skrivbar';
$_lang["configcheck_images_msg"] = 'Bildemappen er ikke skrivbar eller finnes ikke. Dette betyr at bildehånteringsfunksjonene i editoren ikke kommer til å fungere!';
$_lang["configcheck_installer"] = 'installasjonsprogrammet er fortsatt igjen';
$_lang["configcheck_installer_msg"] = 'Mappen install/ inneholdeir installasjonsprogrammet for EVO. Tenk hva som kan skjer om en angriper finner denne mappen og kjører installasjonen på nytt! Han kommer forhåpentligvis ikke så langt, ettersom databasen krever innlogging, men det er likevel best å fjerne katalogen fra serveren.';
$_lang["configcheck_lang_difference"] = 'feil antall fraser i språkfilen';
$_lang["configcheck_lang_difference_msg"] = 'Språket som nå er valgt har ett annet antall fraser en standardspråket. Dette trenger ikke å være ett problem, men kan bety at språkfilen trenger oppdatering.';
$_lang["configcheck_notok"] = 'En eller flere konfigurasjonsdetaljer er ikke OK: ';
$_lang["configcheck_ok"] = 'Kontroll utført OK - Ingen advarsler å rapportere.';
$_lang["configcheck_php_gdzip"] = 'GD and/or Zip PHP extensions not found';
$_lang["configcheck_php_gdzip_msg"] = 'Evolution CMS needs the GD and Zip extension enabled for PHP. While Evolution CMS will work without them, you will not be able to take full advantage of the built-in File Manager, Image Editor or Captcha for logins.';
$_lang["configcheck_rb_base_dir"] = 'The currently set <a href="index.php?a=17&tab=5">File base path</a> seems incorrect.';
$_lang["configcheck_rb_base_dir_msg"] = 'This can happen for example by moving your installation to a different directory or server. Please check and update your Evolution CMS configuration.';
$_lang["configcheck_register_globals"] = 'register_globals is set to ON in your php.ini configuration file';
$_lang["configcheck_register_globals_msg"] = 'This configuration makes your site much more susceptible to Cross Site Scripting (XSS) attacks. You should speak to your host about what you can do to disable this setting.';
$_lang["configcheck_title"] = 'Konfigurasjonskontroll';
$_lang["configcheck_templateswitcher_present"] = 'TemplateSwitcher Plugin detected';
$_lang["configcheck_templateswitcher_present_delete"] = '<a href="javascript:deleteTemplateSwitcher();">Delete TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_disable"] = '<a href="javascript:disableTemplateSwitcher();">Disable TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_msg"] = 'The TemplateSwitcher plugin has been found to cause caching and performance problems, and should be used only the functionality is required in your site.';
$_lang["configcheck_unauthorizedpage_unavailable"] = 'Your site\'s Unauthorized page is not published or does not exist.';
$_lang["configcheck_unauthorizedpage_unavailable_msg"] = 'This means that your Unauthorized page is not accessible to normal web surfers or does not exist. This can lead to a recursive looping condition and many errors in your site logs. Make sure there are no Webuser Groups assigned to the page.';
$_lang["configcheck_unauthorizedpage_unpublished"] = 'The Unauthorized page defined in the site configuration settings is not published.';
$_lang["configcheck_unauthorizedpage_unpublished_msg"] = 'This means that your Unauthorized page is inaccessible to the general public. Publish the page or make sure it is assigned to an existing Resource in your Site Tree in the Tools &gt; Configuration menu.';
$_lang["configcheck_validate_referer"] = 'Security Warning: HTTP Header Validation';
$_lang["configcheck_validate_referer_msg"] = 'The configuration setting <strong>Validate HTTP_REFERER headers?</strong> is Off. We recommend turning it On. <a href="index.php?a=17">Go to Configuration options</a>';
$_lang["configcheck_warning"] = 'Konfigurasjonsadvarsel:';
$_lang["configcheck_what"] = 'Hve betyr dette?';

$_lang["safe_mode_warning"] = 'Safe mode is enabled. Manager functionality is limited.';

$_lang["confirm_block"] = 'Er du sikker på at du vil blokkere denne brukeren?';
$_lang["confirm_delete_category"] = 'Are you sure you want to delete this category?';
$_lang["confirm_delete_eventlog"] = 'Er du sikker på at du vil slette denne hendelsesloggen?';
$_lang["confirm_delete_file"] = 'Er du sikker på at du vil fjerne denne filen?\n\nDette kan gjøre at din webplass slutter å virke! Fjern bare denne filen om du er helt sikker på at den ikke ødelegger noe.';
$_lang["confirm_delete_group"] = 'Are you sure you want to delete this group?';
$_lang["confirm_delete_htmlsnippet"] = 'Er du sikker på at du vil slette dette htmlstykket?';
$_lang["confirm_delete_keywords"] = 'Er du sikker på at du vil slette disse nøkkelordene?';
$_lang["confirm_delete_module"] = 'Er du sikker på at du vil fjerne denne modulen?';
$_lang["confirm_delete_plugin"] = 'Er du skkker på at du vil fjerne denne pluginen?';
$_lang["confirm_delete_record"] = 'Er du sikker på at du vil fjerne de valgte postene?';
$_lang["confirm_delete_resource"] = 'Er du sikker på at du vil slette dette dokumentet?\nEventuelle underdokumenter vil også slettes.';
$_lang["confirm_delete_role"] = 'Er du sikker på at du vil fjerne denne rollen?';
$_lang["confirm_delete_snippet"] = 'Er du sikker på at du vil fjerne denne kodesnutten?';
$_lang["confirm_delete_tags"] = 'Er du sikker på at du vil fjerne de valgte META-taggene?';
$_lang["confirm_delete_template"] = 'Vil du virkelig fjerne malen?';
$_lang["confirm_delete_tmplvars"] = 'Er du sikker på at du vil fjerne disse malvariabelene og alle deres lagrede verdier?';
$_lang["confirm_delete_user"] = 'Vil du virkelig fjerne denne brukeren?';

$_lang["delete_yourself"] = 'You can\'t delete yourself';
$_lang["delete_last_admin"] = 'You can\'t delete last admin user';

$_lang["confirm_delete_permission"] = 'Are you sure you want to delete this Permission?';
$_lang["confirm_duplicate_record"] = 'Er du sikker på at du vil duplisere denne posten?';
$_lang["confirm_empty_trash"] = 'Dette kommer til å permanent slette ALLE fjernede dokumenter!\n\nFortsett?';
$_lang["confirm_load_depends"] = 'Er du sikker på at du vil forlate siden \'Håndtere avhengigheter\' uten å lagre dine endringer?';
$_lang["confirm_name_change"] = 'Endring av brukernavnet kan påvirke andre programmer som er linket til innholdshåndtereren.\n\nEr du sikker på at du vil endre dette brukernavnet?';
$_lang["confirm_publish"] = '\n\nOm du publiserer dette dokumentet nå, kommer alle eventuelle (av)publiseringsdatoer til å fjernes. Om du vil beholde eller endre (av)publiseringsdato, velg å \'redigere\' dokumentet isteden.\n\nFortsett?';
$_lang["confirm_remove_locks"] = 'Iblant lukker brukers sin webleser mens de redigerer dokument, maler, kodesnutter eller håndterere, som kan sette dokumentet det gjelder i en låst tilstand. Ved å trykke OK, fjerner du ALLE nåværende låser.\n\nFortsett?';
$_lang["confirm_reset_sort_order"] = 'Are you sure you want to reset the \"sort order/index\" of all listed elements to 0 ?';
$_lang["confirm_resource_duplicate"] = 'Are you sure you want to duplicate this Resource? Any item(s) it contains will also be duplicated.';
$_lang["confirm_setting_language_change"] = 'You have modified the default value and will lose the changes. Proceed?';
$_lang["confirm_unblock"] = 'Er du sikker på at du vil fjerne blokkeringen av denne brukeren?';
$_lang["confirm_undelete"] = '\n\nEventuelle underdokumenter som ble fjernet samtidig som dette dokumentet kommer også til å bli tilbakestilt, men underdokumenter som ble fjernet tidigere kommer til å forbli fjernet.';
$_lang["confirm_unpublish"] = '\n\nOm du avpubliserer dette dokumentet nå, kommer alle eventuelle (av)publiseringsdatoer til å fjernes. Om du vil beholde eller endre (av)publiseringsdato, velg å \'redigere\' dokumentet istedet.\n\nFortsett?';
$_lang["confirm_unzip_file"] = 'Er du sikker på at du vil pakke opp denne filen?\n\nEksisterende filer kommer til å skrives over.';

$_lang["could_not_find_user"] = 'Kunne ikke finne bruker';

$_lang["create_folder_here"] = 'Opprett ny mappe her';
$_lang["create_resource_here"] = 'Opprett dokument her';
$_lang["create_resource_title"] = 'Create Resource';
$_lang["create_weblink_here"] = 'Opprett weblink her';
$_lang["createdon"] = 'Dato opprettet';
$_lang["create_new"] = 'Create new';

$_lang["credits"] = 'Anerkjennelser';
$_lang["credits_shouts_msg"] = '<p>EVO is managed and maintained at <a href="https://evo-cms.com//" target="_blank">evo-cms.com</a>.</p>';
$_lang["custom_contenttype_message"] = 'Her kan du legge til egne innholdstyper som kan brukes i dine dokumenter. Skriv inn innholdstypen i det øvre feltet og klikk på \'Legg til\' for å legg til en ny. Marker den innholdstypen i det nedre feltet som du vil fjerne og klikk på \'Fjern\'.';
$_lang["custom_contenttype_title"] = 'Egne innholdstyper';

$_lang["database_charset"] = 'Database Charset';
$_lang["database_collation"] = 'Database Collation Charset';
$_lang["database_name"] = 'Database name';
$_lang["database_overhead"] = '<b style="color:#990033;">Note:</b> Overhead is unused space reserved by MySQL. To free up this space, click on the table\'s overhead figure.';
$_lang["database_server"] = 'Database server';
$_lang["database_table_clickbackup"] = 'Backup &amp; download the selected tables';
$_lang["database_table_clickhere"] = 'Click here';
$_lang["database_table_datasize"] = 'Data size';
$_lang["database_table_droptablestatements"] = 'Generate DROP TABLE statements.';
$_lang["database_table_effectivesize"] = 'Effective size';
$_lang["database_table_indexsize"] = 'Index size';
$_lang["database_table_overhead"] = 'Overhead';
$_lang["database_table_records"] = 'Records';
$_lang["database_table_tablename"] = 'Table name';
$_lang["database_table_totals"] = 'Totals';
$_lang["database_table_totalsize"] = 'Total size';
$_lang["database_tables"] = 'Database tables';
$_lang["database_version"] = 'Database Version';

$_lang["date"] = 'Dato';
$_lang["datechanged"] = 'Endret dato';
$_lang["datepicker_offset"] = 'Datepicker offset';
$_lang["datepicker_offset_message"] = 'The number of years to show in the past on the datepicker.';
$_lang["datetime_format"] = 'Date format';
$_lang["datetime_format_message"] = 'The format for dates in the Manager.';

$_lang["default"] = 'Default:';
$_lang["defaultcache_message"] = 'Velg \'Ja\' for å gjøre alle nye dokumenter cachebare som standard.';
$_lang["defaultcache_title"] = 'Cachebare som standard';
$_lang["defaultmenuindex_message"] = 'Velg \'Ja\' for å skru på automatisk menyindeksering som standard.';
$_lang["defaultmenuindex_title"] = 'Meny indeksering standard';
$_lang["defaultpublish_message"] = 'Velg \'Ja\' for å gjøre alle nye dokumenter publiserte som standard.';
$_lang["defaultpublish_title"] = 'Publisert som standard';
$_lang["defaultsearch_message"] = 'Velg \'Ja\' for å gjøre alle nye dokumenter søkbare som standard.';
$_lang["defaultsearch_title"] = 'Søkbare som standard';
$_lang["defaulttemplate_message"] = 'Velg standardmalen du vil bruke for nye dokumenter. Du kan fremdeles velge en annen mal når du redigerer dokumentet. Denne innstillingen er kun standardvalget.';
$_lang["defaulttemplate_title"] = 'Standardmal';
$_lang["defaulttemplate_logic_title"] = 'Automatic Template Assignment';
$_lang["defaulttemplate_logic_general_message"] = 'New Resources will have the following templates, falling back to higher levels if not found:';
$_lang["defaulttemplate_logic_system_message"] = '<strong>System</strong>: the System Default Template.';
$_lang["defaulttemplate_logic_parent_message"] = '<strong>Parent</strong>: the same Template as the parent container.';
$_lang["defaulttemplate_logic_sibling_message"] = '<strong>Sibling</strong>: the same Template as other Resources in the same container.';

$_lang["delete"] = 'Fjern';
$_lang["delete_resource"] = 'Fjern dokument';
$_lang["delete_tags"] = 'Slett tagger';
$_lang["deleting_file"] = 'Fjerner filen `%s`: ';
$_lang["description"] = 'Beskrivelse';
$_lang["deselect_keywords"] = 'Fjern merking av nøkkelord';
$_lang["deselect_metatags"] = 'Fjern merking av META-tagger';
$_lang["disabled"] = 'Slått av';
$_lang["doc_data_title"] = 'Vis dokumentdata';
$_lang["documentation"] = 'Documentation';

$_lang["duplicate"] = 'Dupliser';
$_lang["duplicate_alias_found"] = 'Dokumentet \'%s\' bruker allerede aliaset \'%s\'. Angie et unikt alias.';
$_lang["duplicate_template_alias_found"] = 'Template \'%s\' is already using the URL alias \'%s\'. Please enter a unique alias.';
$_lang["duplicate_alias_message"] = 'Her kan du velge \'Ja\' for å tillate at duplikate alias lagres.<br /><b>NB: Denne innstillingen bør brukes med \'Vanlige aliasøkestier\'-innstillningen satt til \'Ja\' for å unngå problemer med refereringen av dokumenter.</b>';
$_lang["duplicate_alias_title"] = 'Tillat duplikate alias.';
$_lang["duplicate_name_found_general"] = 'There is already a %s named \'%s\'. Please enter a unique name.';
$_lang["duplicate_name_found_module"] = 'There is already a Module named \'%s\'. Please enter a unique name.';
$_lang["duplicated_el_suffix"] = 'Duplicate';

$_lang["edit"] = 'Rediger';
$_lang["edit_resource"] = 'Rediger dokument';
$_lang["edit_resource_title"] = 'Opprett/rediger dokument';
$_lang["edit_settings"] = 'Systeminnstillinger';
$_lang["editedon"] = 'Dato redigert';
$_lang["editing_file"] = 'Redigerer fil: ';
$_lang["editor_css_path_message"] = 'Skriv inn søkestien til CSS-filen du vil bruke i editoren. Den beste måten å angi søkestien på er å gjøre det fra serverens rot, f.eks /assets/site/style.css. La feltet stå tomt om du ikke vil laste en stilmal i editoren.';
$_lang["editor_css_path_title"] = 'Søkesti til CSS-fil';

$_lang["email"] = 'E-post';
$_lang["email_sent"] = 'E-post sent';
$_lang["email_unique"] = 'Email is already in use!';
$_lang["emailsender_message"] = 'Her kan du angi e-postadressen som som brukes til å sende brukernavn og passord til en bruker.';
$_lang["emailsender_title"] = 'E-postadresse';
$_lang["emailsubject_default"] = 'Your login details';
$_lang["emailsubject_message"] = 'Her kan du angi emnet for e-posten som sendes.';
$_lang["emailsubject_title"] = 'Emne for e-post';

$_lang["empty_folder"] = 'Denne mappen er tom';
$_lang["empty_recycle_bin"] = 'Slett fjernede dokumenter';
$_lang["empty_recycle_bin_empty"] = 'Det finnes ingen fjernede dokumenter å slette.';
$_lang["enable_resource"] = 'Bruk ressursfil.';
$_lang["enable_sharedparams"] = 'Bruk delte parametere';
$_lang["enable_sharedparams_msg"] = '<b>NB:</b> Ovenstående globalt unike ID (GUID) kommer til å brukes til å unikt identifisere denne modulen og dens delte parametere. GUIDen brukes også for å lenke mellom modulen og pluginer eller kodesnutter som bruker modulens delte parametere.';
$_lang["enabled"] = 'Enabled';
$_lang["error"] = 'Fil';
$_lang["error_sending_email"] = 'Feil ved sending av e-post';
$_lang["errorpage_message"] = 'Skriv inn ID til den siden du vil sende brukere til om de prøver å komme til et dokument som ikke finnes.<br /><b>OBS: Pass på at denne ID\'en tilhører et ekisterendende dokument, og at det er publisert!</b>';
$_lang["errorpage_title"] = 'Feilside';
$_lang["event_id"] = 'Hendelse-ID';
$_lang["eventlog"] = 'Hendelseslogg';
$_lang["eventlog_msg"] = 'Hendelsesloggen brukes for å vise informasjons-, advarsels- og feilmeldinger genererte av informasjonshåndtereren. Kildekolonnen viser i hvilken del av informasjonshenteren hendelsen inntraff.';
$_lang["eventlog_viewer"] = 'Vis hendelsesloggen';
$_lang["everybody"] = 'Everybody';
$_lang["existing_category"] = 'Eksisterende kategori';
$_lang["expand_tree"] = 'Utvid tre';
$_lang["failed_login_message"] = 'Her kan du skrive inn hvor mange ganger en bruker kan forsøke å logge inn før denne blir blokkert.';
$_lang["failed_login_title"] = 'Feilet innloggingsforsøk:';
$_lang["fe_editor_lang_message"] = 'Velg et språk editoren skal bruke når den blir brukt på forsiden.';
$_lang["fe_editor_lang_title"] = 'Fremsideeditorspråk:';

$_lang["filemanager_path_message"] = 'IIS fyller oftest ikke inn innstillingen document_root ordentlig. Denne brukes av filhåndtereren for å bestemme hva du får se. Hvis du har problemer med filhåndtereren, pass på at denne innstillingen peker til roten av din innstallasjon av EVO.';
$_lang["filemanager_path_title"] = 'Søkesti til filhåndtereren';

$_lang["folder"] = 'Mappe';
$_lang["forgot_password_email_fine_print"] = '* Adressen ovenfor vil utgå så fort du bytter passordet, eller dagen er slutt.';
$_lang["forgot_password_email_instructions"] = 'Derfra vil du kunne bytte passord fra \'My Account\'-menyen.';
$_lang["forgot_password_email_intro"] = 'Det er gjort en forespørsel om å bytte passord på kontoen din.';
$_lang["forgot_password_email_link"] = 'Klikk her for å ferdigstille prosessen.';
$_lang["forgot_your_password"] = 'Glemt passordet ditt?';
$_lang["friendly_alias_message"] = 'Hvis du bruker vanlige adresser og dokumentet har et alias, kommer aliaset alltid å prioriteres i den vanlige adressen. Ved å sette denne alternativet til \'Ja\', kommer den vanliga adressens prefiks og suffiks å legges til aliaset.<br /> Eksempel: om ditt dokument med ID 1 har aliaset \'introduksjon\', prefikset er satt til \'\', suffikset til \'.html\' og du setter denne innstillingen til \'Ja\', så kommer \'introduksjon.html\' å vises. Hvis det ikke finnes noe alias, kommer EVO å generere lenken \'1.html\'.';
$_lang["friendly_alias_title"] = 'Bruk vanlige adresser';
$_lang["friendlyurls_message"] = 'Dette lar deg bruke adresser som er vennlige mot søkemotorer. Merk at detta kun virker når EVO kjøres på Apache, og du må lage en .htaccess-fil for at det skal fungere. Se .htaccess-filen som fulgte med i distribusjonen for mer informasjon.';
$_lang["friendlyurls_title"] = 'Bruk vennlige adresser';
$_lang["friendlyurlsprefix_message"] = 'Her spesifiserer du prefikset som skal brukes for vanlige adresser. For eksempel om prefikset \'side\' settes, kommer adressen /index.php?id=2 til å konverteres til /side2.html (hvis suffikset er satt til .html). På dette måten kan du spesifisere hvilke linker dine brukere (og søkemotorene) ser.';
$_lang["friendlyurlsprefix_title"] = 'Prefiks for vanlige adresser';
$_lang["friendlyurlsuffix_message"] = 'Her angir du suffiks for vanlige adresser. Spesifiserer du \'.html\' kommer .html til å leggas til på alle dine vanlige adresser.';
$_lang["friendlyurlsuffix_title"] = 'Suffiks for vanlige adresser';
$_lang["functionnotimpl"] = 'Unnskyld!';
$_lang["functionnotimpl_message"] = 'Denne funksjonen er ikke implementert enda.';
$_lang["further_info"] = 'Further information';
$_lang["global_tabs"] = 'Global Tabs';
$_lang["go"] = 'Go';
$_lang["group_access_permissions"] = 'Brukergruppetilgang';
$_lang['group_tvs'] = 'Group TV';
$_lang["guid"] = 'GUID';
$_lang["help"] = 'Hjelp';
$_lang["help_msg"] = '<p>Besøk <a href="http://forums.modx.com/" target="_blank">EVO Forum</a> hvis du trenger hjelp med EVO. Der finnes også en voksende mengde <a href="http://rtfm.modx.com/evolution/1.0" target="blank">dokumentasjon og guider</a> som berører stort sett alle aspekter av EVO.</p><p>Vi planlegger også å tilby kommersielle supporttjenester. Send oss en <a href="mailto:hello@modx.com?subject=MODX Commercial Support Inquiry">e-postmelding om du er intressert</a>.';
$_lang["help_title"] = 'Hjelp';
$_lang["hide_tree"] = 'Gjem tre';
$_lang["home"] = 'Hjem';

$_lang["icon"] = 'Ikon';
$_lang["icon_description"] = 'CSS class value. e.g. fa&nbsp;fa-star';
$_lang["id"] = 'ID';
$_lang["illegal_parent_child"] = 'Eiertildeling:\n\nDokumentet er et hund til det valgte dokumentet.';
$_lang["illegal_parent_self"] = 'Eiertildeling:\n\nDet valgte dokumentet kan ikke tildeles til seg selv.';
$_lang["images_management"] = 'Manage Images';
$_lang["import_files_found"] = '<b>Fant %s dokumenter for importering...</b>';
$_lang["import_params"] = 'Importer en modules delte parametere';
$_lang["import_params_msg"] = 'Du kan importere parameterne eller innstillingene av en modul ved å velge modulens navn i ovenstående meny. <b>OBS:</b> For at moduler skal synes i menyen må denne pluginen/kodesnutten være med i modulens avhengighetsliste og modulen må være satt opp for parameterdeling.';
$_lang["import_parent_resource"] = 'Eierdokument';
$_lang["update_tree"] = 'Gjenoppbygg treet';
$_lang["update_tree_description"] = '<ul>
<li>Closure table database design pattern that makes working with the document tree more convenient and fast </li>
<li>If the data in the tree is updated not through models, then there is a possibility of an incorrect linking of documents in the database </li>
<li>This operation fixes the problem when site_content is not updated through the model (save, create) and the links (Closure table) are not updated </li>
<li>It is also possible to perform this operation in CLI mode via the \'php artisan closuretable: rebuild\' command </li>
</ul>';
$_lang["update_tree_danger"] = 'If you have more than 1000 resources, it is better to perform this operation in CLI mode using the \'php artisan closuretable: rebuild command\'';
$_lang["update_tree_time"] = 'Rebuild tree finished. Documents processed: <b>%s</b><br>Import took <b>%s</b> seconds to complete.';
$_lang["info"] = 'Informasjon';
$_lang["information"] = 'Informasjon';
$_lang["inline"] = 'Internt';
$_lang["insert"] = 'Sett inn';
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
$_lang["keyword"] = 'Nøkkelord';
$_lang["keywords"] = 'Nøkkelord';
$_lang["keywords_intro"] = 'For å endre et nøkkelord skriver du helt enkelt inn det nye nøkkelordet i feltet ved siden av nøkkelordet du vil endre. Kryss av for \'Fjern\' for det nøkkelordet du vil fjerne. Om du krysser av for \'Fjern\' og endrer nøkkelordets navn, kommer nøkkelordet til å fjernes uten å endre navn!';
$_lang["language_message"] = 'Velg hvilket språk du vil bruke i EVO publiseringshåndterer.';
$_lang["language_title"] = 'Språk';
$_lang["last_update"] = 'Last update';
$_lang["launch_site"] = 'Vis webplass';
$_lang["license"] = 'License';
$_lang["link_attributes"] = 'Link attributter';
$_lang["link_attributes_help"] = 'Her kan du legge inn attributter for linken til denne siden, for eksempel target= eller rel=.';
$_lang["list_mode"] = 'Skru på/av listlaget - benyttes for å liste alle poster i tabellen.';
$_lang["loading_doc_tree"] = 'Laster dokumenttre...';
$_lang["loading_menu"] = 'Laster meny...';
$_lang["loading_page"] = 'Vent mens EVO laster siden...';
$_lang["localtime"] = 'Local Time';

$_lang["lock_htmlsnippet"] = 'Lås htmlstykke for redigering';
$_lang["lock_htmlsnippet_msg"] = 'Bare administratorer (Rolle-ID 1) kan redigere dette htmlstykket.';
$_lang["lock_module"] = 'Lås modulen for redigering';
$_lang["lock_module_msg"] = 'Bare Administratorer (Rolle-ID 1) kan redigere denne modulen.';
$_lang["lock_msg"] = '%s redigerer akkurat nå den/det her %s. Vent til han eller hun er ferdig eller prøv igjen senere.';
$_lang["lock_plugin"] = 'Lås plugin for redigering';
$_lang["lock_plugin_msg"] = 'Bare administratorer (Rolle-ID 1) kan redigere denne pluginen.';
$_lang["lock_settings_msg"] = '%s redigerer akkurat nå disse innstillingene. Vent til han eller hun er ferdig eller prøv igjen senere.';
$_lang["lock_snippet"] = 'Lås kodesnutt for redigering';
$_lang["lock_snippet_msg"] = 'Bare administratorer (Rolle-ID 1) kan redigere denne kodsenutten.';
$_lang["lock_template"] = 'Lås mal for redigering';
$_lang["lock_template_msg"] = 'Bare administratorer (Rolle-ID 1) kan redigere denne malen.';
$_lang["lock_tmplvars"] = 'Lås variabel for redigering';
$_lang["lock_tmplvars_msg"] = 'Bare administratorer (Rolle-ID 1) kan redigere denne variabelen.';
$_lang["locked"] = 'Låst';

$_lang["login_allowed_days"] = 'Tillatte dager';
$_lang["login_allowed_days_message"] = 'Velg de dagene denne brukeren kan logge inn.';
$_lang["login_allowed_ip"] = 'Tillatt IP-adresse';
$_lang["login_allowed_ip_message"] = 'Angi IP-adressene som denne brukeren kan logge inn fra.<br /><b>NB: Separer flere IP-adresser med kommategn (,)</b>';
$_lang["login_button"] = 'Logg inn';
$_lang["login_cancelled_install_in_progress"] = 'Install/update of this site is currently in progress. Please retry in a couple of minutes!';
$_lang["login_cancelled_site_was_updated"] = 'Install/update on this site was executed, please login again!';
$_lang["login_captcha_message"] = 'En administrator har slått på Captcha, så du må skrive inn sikkerhetskoden. Hvis du har problemer, klikk på selve koden og det genereres en ny.';
$_lang["login_homepage"] = 'Startside etter innlogging';
$_lang["login_homepage_message"] = 'Angi ID til det dokumentet du vil sende brukeren til etter han/hun har logget inn.<br /><b>OBS: Se til at den ID\'en du skrev inn tilhører et eksisterende dokument, at det har blitt publisert og kan nås av brukeren!</b>';
$_lang["login_message"] = 'Fyll inn innloggningsinformasjon for å starte din sesjon. Det skilles mellom store og små bokstaver i ditt brukernavn og passord.';
$_lang["logo_slogan"] = 'Lag og gjør mer med mindre - EVO innholdshåndterer';
$_lang["logout"] = 'Logg ut';
$_lang["long_title"] = 'Lang tittel';

$_lang["manager"] = 'Håndterere';
$_lang["manager_lockout_message"] = 'You are currently logged into the Content Manager. If you would like to close your login session please click the "Logout" button. <p />To go to your startup or home page click the "Home" button.';
$_lang["manager_permissions"] = 'Rettigheter for håndtereren';
$_lang["manager_theme"] = 'Tema for håndtereren';
$_lang["manager_theme_message"] = 'Velg tema for innholdshåntereren.';
$_lang["manager_theme_mode"] = 'Color Scheme:';
$_lang["manager_theme_mode1"] = 'everything is light';
$_lang["manager_theme_mode2"] = 'the header is dark';
$_lang["manager_theme_mode3"] = 'header and sidebar are dark';
$_lang["manager_theme_mode4"] = 'everything is dark';
$_lang['manager_theme_mode_message'] = 'This setting is used as the "default" and can be overridden by the manager when using the theme color mode switch button in the Resource Tree: <i class="fa fa-lg fa-adjust"></i>';
$_lang['manager_theme_mode_title'] = 'Theme color mode switch';

$_lang["meta_keywords"] = 'META-nøkkelord';
$_lang["metatag_intro"] = 'På denne siden kan du opprette, redigere eller fjerne META-tagger. For å lenke META-tagger til dokumentet klikker du på fliken for META-nøkkelord når du redigerer dokumentet og velger de ønskede META-taggene og nøkklordene. Hvis du vil legge inn en ny tag skriver du inn  navnet og verdien og klikker på \'Legg til tag\'. Klikk på taggens navn i tabellen for å redigere den.';
$_lang["metatag_notice"] = 'You may wish to reference the <a href="http://www.html-reference.com/META.asp" target="_blank">HTML Reference Guide</a> site for more information. This is not a complete list of possible Meta Tags.';
$_lang["metatags"] = 'META-tagger';
$_lang["mgr_access_permissions"] = 'Tilgangsrettigheter i håndtereren';
$_lang["mgr_login_start"] = 'Startside etter inloggning i håndtereren';
$_lang["mgr_login_start_message"] = 'Angi ID for det dokumentet du vil brukeren skal komme til til når han/hun har logget inn. <b>OBS: Se til at den ID\'en du skrev inn tilhører et eksisterende dokument, at det har blitt publisert og kan nås av brukeren!</b>';

$_lang["mgrlog_action"] = 'Action';
$_lang["mgrlog_actionid"] = 'Action ID';
$_lang["mgrlog_anyall"] = 'Any/All';
$_lang["mgrlog_datecheckfalse"] = 'checkdate() returned false.';
$_lang["mgrlog_datefr"] = 'Date from';
$_lang["mgrlog_dateinvalid"] = 'Invalid date format.';
$_lang["mgrlog_dateto"] = 'Date to';
$_lang["mgrlog_emptysrch"] = 'Your search query returned an empty result set (i.e. not matching logs found).';
$_lang["mgrlog_field"] = 'Field';
$_lang["mgrlog_itemid"] = 'Item ID';
$_lang["mgrlog_itemname"] = 'Item name';
$_lang["mgrlog_msg"] = 'Message';
$_lang["mgrlog_noquery"] = 'No search query entered yet.';
$_lang["mgrlog_qresults"] = 'Query results';
$_lang["mgrlog_query"] = 'Query logging';
$_lang["mgrlog_query_msg"] = 'Please make a selection for viewing the logs. You can select log entries by date, but be aware that the dates you enter are not inclusive - to select every log entry for 01-01-2004, set \'date from\' to 01-01-2004 and \'date to\' to 02-01-2004.<br /><br />Message and action are usually the same. If you\'re searching for a specific message, it\'s best to set action to \'Any/All\'.';
$_lang["mgrlog_results"] = 'No. of results';
$_lang["mgrlog_searchlogs"] = 'Search logs';
$_lang["mgrlog_sortinst"] = 'Sort the table by clicking on the column headers. If the logs are too large, <a href="index.php?a=55">empty the log file</a> to remove all log entries up to now. This cannot be undone!';
$_lang["mgrlog_time"] = 'Time';
$_lang["mgrlog_user"] = 'User';
$_lang["mgrlog_username"] = 'Username';
$_lang["mgrlog_value"] = 'Value';
$_lang["mgrlog_view"] = 'View manager logs';

$_lang["modx_news"] = 'EVO News Notices';
$_lang["modx_news_tab"] = 'EVO News';
$_lang["modx_news_title"] = 'EVO News';
$_lang["modx_security_notices"] = 'EVO Security Notices';
$_lang["modx_version"] = 'EVO version';

$_lang["name"] = 'Navn';

$_lang["no"] = 'Nei';
$_lang["no_active_users_found"] = 'No active users found.';
$_lang["no_activity_message"] = 'Du har enda ikke opprettet eller redigert noen dokumenter.';
$_lang["no_category"] = 'ukategorisert';
$_lang["no_docs_pending_publishing"] = 'Ingen dokumenter venter på publisering.';
$_lang["no_docs_pending_pubunpub"] = 'Ingen aktiviteter funnet';
$_lang["no_docs_pending_unpublishing"] = 'Ingen dokumenter venter på upublisering.';
$_lang["no_edits_creates"] = 'No edits or creates found.';
$_lang["no_groups_found"] = 'Ingen grupper funnet.';
$_lang["no_keywords_found"] = 'Det finnes ingen nøkkelord enda.';
$_lang["no_records_found"] = 'Ingen poster funnet.';
$_lang["no_results"] = 'Ingen resultater funnet';
$_lang["nologentries_message"] = 'Angi hvor mange loggposter som vises per side når du utforsker granskningsloggen.';
$_lang["nologentries_title"] = 'Antall loggposter';
$_lang["none"] = 'None';
$_lang["noresults_message"] = 'Angi antallet resultater som vises når listinger og søkeresultat presenteres.';
$_lang["noresults_title"] = 'Antall resultater';
$_lang["not_deleted"] = 'ble ikke slettet.';
$_lang["not_set"] = 'Ikke satt';

$_lang["offline"] = 'Offline';

$_lang["online"] = 'Online';
$_lang["onlineusers_action"] = 'Handling';
$_lang["onlineusers_actionid"] = 'Action-ID';
$_lang["onlineusers_ipaddress"] = 'Brukerens IP-adresse';
$_lang["onlineusers_lasthit"] = 'Siste treff';
$_lang["onlineusers_message"] = 'Denne listen viser alle brukere som har vært aktive de siste 20 minuttene (nåværende tid er ';
$_lang["onlineusers_title"] = 'Innloggede brukere';
$_lang["onlineusers_user"] = 'Brukere';
$_lang["onlineusers_userid"] = 'Brukerens ID';

$_lang["optimize_table"] = 'Klikk her for å optimisere denne tabellen';

$_lang["page_data_alias"] = 'Alias';
$_lang["page_data_cacheable"] = 'Cachebar';
$_lang["page_data_cacheable_help"] = 'Om detta feltet markeres, kommer dokumentet til å lagres i cachen. Pass på at feltet ikke er avmerket om dokumentet inneholder kodesnutter.';
$_lang["page_data_cached"] = '<b>Kilde hentet fra cache:</b>';
$_lang["page_data_changes"] = 'Endringer';
$_lang["page_data_contentType"] = 'Innholdstype';
$_lang["page_data_contentType_help"] = 'Velg innholdstype for dette dokumentet. Hvis du ikke er sikker på hvilken innholdstype dokumentet skal ha, la den stå som text/html.';
$_lang["page_data_created"] = 'Oprettet';
$_lang["page_data_edited"] = 'Redigert';
$_lang["page_data_editor"] = 'Rediger med en riktekst-editor';
$_lang["page_data_folder"] = 'Dokumentet er en mappe';
$_lang["page_data_general"] = 'Allment';
$_lang["page_data_markup"] = 'Oppmerking/struktur';
$_lang["page_data_mgr_access"] = 'Tilgang til håndtereren';
$_lang["page_data_notcached"] = 'Dokumentet har (enda) ikke blitt cachet.';
$_lang["page_data_publishdate"] = 'Publiseringsdato';
$_lang["page_data_publishdate_help"] = 'Om du setter en publiseringsdato, kommer dokumentet til å publiseres så snart datoen er nådd. Klikk på kalenderikonet for å velge en dato, eller ikonet vedsidenav for å fjerne datoen. Om datoen fjernes , vil dokumentet aldri bli publisert automatisk.';
$_lang["page_data_published"] = 'Publisert';
$_lang["page_data_searchable"] = 'Søkbar';
$_lang["page_data_searchable_help"] = 'Om dette felt markeres, vil dokumentet bli søkbart. Du kan også bruke det for andre formål i dine kodesnutter.';
$_lang["page_data_source"] = 'Kilde';
$_lang["page_data_status"] = 'Status';
$_lang["page_data_template"] = 'Bruker mal';
$_lang["page_data_template_help"] = 'Her kan du velge hvilken mal dokumentet skal bruke.';
$_lang["page_data_title"] = 'Sidedata';
$_lang["page_data_unpublishdate"] = 'Upubliseringsdato';
$_lang["page_data_unpublishdate_help"] = 'Om du setter en upubliseringsdato, kommer dokumentet til å upubliseres så snart datoen er nådd. Klikk på kalenderikonet for å velge en dato, eller ikonet vedsidenav for å fjerne datoen. Om datoen fjernes , vil dokumentet aldri bli upublisert automatisk.';
$_lang["page_data_unpublished"] = 'Upublisert';
$_lang["page_data_web_access"] = 'Webtilgang';

$_lang["pagetitle"] = 'Dokumentets tittel';
$_lang["pagination_table_first"] = 'First';
$_lang["pagination_table_gotopage"] = 'Go to page';
$_lang["pagination_table_last"] = 'Last';
$_lang["paging_first"] = 'first';
$_lang["paging_last"] = 'last';
$_lang["paging_next"] = 'next';
$_lang["paging_prev"] = 'prev';
$_lang["paging_showing"] = 'Showing';
$_lang["paging_to"] = 'to';
$_lang["paging_total"] = 'total';
$_lang["parameter"] = 'Parameter';
$_lang["parse_docblock"] = 'Parse DocBlock';
$_lang["parse_docblock_msg"] = 'Attention (!): <b>Resets</b> actual name, configuration, description and category to install-defaults by parsing the source code.';

$_lang["password"] = 'Passord';
$_lang["password_change_request"] = 'Password change request';
$_lang["password_confirmed"] = 'Passwords doesn\'t match';
$_lang["password_gen_gen"] = 'Lat EVO generere et passord';
$_lang["password_gen_length"] = 'Passordet du spesifiserer må være minst 6 bokstaver langt.';
$_lang["password_gen_method"] = 'Ny passordsmetode';
$_lang["password_gen_specify"] = 'La meg spesifisere et passord:';
$_lang["password_method"] = 'Metode for tillkjennegiving av passord';
$_lang["password_method_email"] = 'Semd det nye passordet med epost.';
$_lang["password_method_screen"] = 'Vis det nye passordet på skjermen.';
$_lang["password_msg"] = 'Det nye passordet <b>:username</b> er <b>:password</b><br>';

$_lang["php_version_check"] = 'MODX er kompatibelt med PHP version 7.4 eller høyere. Du må oppgradere din versjon av PHP!';

$_lang["preview"] = 'Forhåndsvis';
$_lang["preview_msg"] = 'Dette er en forhåndsvisning av dine siste endringer. Klikk her for å <a href="javascript:;" onclick="saveRefreshPreview();">lagre og laste om</a> dine nåværende endringer';
$_lang["preview_resource"] = 'Preview Resource';

$_lang["private"] = 'Privat';
$_lang["public"] = 'Offentlig';
$_lang["publish_date"] = 'Publiseringsdato';
$_lang["publish_events"] = 'Publiser hendelser';
$_lang["publish_resource"] = 'Publiser dokument';

$_lang["rb_base_dir_message"] = 'Angi den søkestien til ressursens katalog. Denne isntillingen gjøre vanligvis automatisk, men om du bruker IIS er det mulig EVO ikke kan regne ut søkestien selv, som fører til en feilmelding.  I såfall kan du skrive inn søkestien manuellt her.(søkestien som vises i Utforskeren).<br /><b> OBS: Ressurskatalogen må inneholde underkatalogene images, files, flash og media for at ressursleseren skal fungere korrekt.</b>';
$_lang["rb_base_dir_title"] = 'Søkesti til ressurser';
$_lang["rb_base_url_message"] = 'Angi den virtuelle søkestien til bildekatalogen her. Denne instillingen gjøres vanlivis automatisk, men om du bruker IIS er det mulig EVO ikke kan regne ut adressen selv, som fører til en feil i ressursleseren.  Isåfall kan du skrive inn adressen til bildekatalogen her (adressen som om du skulle skrive den i Internet Explorer).';
$_lang["rb_base_url_title"] = 'Ressursenes adresse';
$_lang["rb_message"] = 'Velg \'Ja\' for å bruke ressursleseren. Dette lar dine brukere lese og laste opp bilder-, flash- og mediafiler til serveren.';
$_lang["rb_title"] = 'Bruk ressursleser';
$_lang["rb_webuser_message"] = 'Do you want to allow a web user the ability to use the file browser? <b>WARNING:</b> Allowing web users the use of the file browser exposes the files available to manager users.  Only use this option for trusted web users.';
$_lang["rb_webuser_title"] = 'Web Users?';
$_lang["recent_docs"] = 'Siste dokumenter';
$_lang["recommend_setting_change_title"] = 'Recommended Setting Change';
$_lang["recommend_setting_change_description"] = 'Your site is not configured to validate the HTTP_REFERER of incoming requests to the Manager. We strongly recommend enabling this setting to reduce the risk of a CSRF (Cross Site Request Forgery) attack.';
$_lang["references"] = 'References';
$_lang["refresh_cache"] = 'Cache: Fant <b>%s</b> filer i cachemapen, slettet <b>%d</b> cachefiler. <p>Nye cachefiler kommer automatisk til å lagres når sidene hentes';
$_lang["refresh_published"] = '<b>%s</b> dokument ble publisert.';
$_lang["refresh_site"] = 'Oppdater webplass';
$_lang["refresh_title"] = 'Oppdater webplass';
$_lang["refresh_tree"] = 'Oppdater tre';
$_lang["refresh_unpublished"] = '<b>%s</b> dokument ble upublisert.';
$_lang["release_date"] = 'Release date';
$_lang["remember_last_tab"] = 'Remember tabs';
$_lang["remember_last_tab_message"] = 'Tabbed Manager pages load with the last tab viewed instead of defaulting to the first tab';
$_lang["remember_username"] = 'Husk meg';
$_lang["remove"] = 'Slett';
$_lang["remove_date"] = 'Fjern dato';
$_lang["remove_locks"] = 'Fjern lås';
$_lang["rename"] = 'Bytt navn';
$_lang["reports"] = 'Rapporter';
$_lang["report_issues"] = 'Report issues';
$_lang["required_field"] = 'Field :field is required';
$_lang["require_tagname"] = 'Et navn på taggen kreves';
$_lang["require_tagvalue"] = 'En verdi på taggen kreves';
$_lang["reserved_name_warning"] = 'You have used a reserved name.';
$_lang["reset"] = 'Tilbakestill';
$_lang["reset_failedlogins"] = 'nullstill';
$_lang["reset_sort_order"] = 'Reset sort order';

$_lang["manager_access_permissions"] = 'Manager access permission';
$_lang["manage_groups"] = 'Manage document and user groups';
$_lang["manage_document_permissions"] = 'Manage document permissions';
$_lang["manage_module_permissions"] = 'Manage module permissions';
$_lang["manage_tv_permissions"] = 'Manage TV permissions';

$_lang["rss_url_news_default"] = 'https://github.com/evocms-community/evolution/releases.atom';
$_lang["rss_url_news_message"] = 'Enter the URL for the Evolution CMS News Feed.';
$_lang["rss_url_news_title"] = 'RSS News Feed';
$_lang["rss_url_security_default"] = 'https://github.com/extras-evolution/security-fix/releases.atom';
$_lang["rss_url_security_message"] = 'Enter the URL for the Evolution CMS Security Feed.';
$_lang["rss_url_security_title"] = 'RSS Security Feed';

$_lang["run_module"] = 'Kjør modul';
$_lang["save"] = 'Lagre';
$_lang["save_all_changes"] = 'Lagre alle endringer';
$_lang["save_tag"] = 'Lagre tag';
$_lang["saving"] = 'Lagrer, vennligst vent...';

$_lang["search"] = 'Søk';
$_lang["search_criteria"] = 'Søkekriterier';
$_lang["search_criteria_content"] = 'Søk etter innhold';
$_lang["search_criteria_content_msg"] = 'Finn samtlige dokumenter med søketeksten i innholdet.';
$_lang["search_criteria_id"] = 'Søk etter ID';
$_lang["search_criteria_id_msg"] = 'Skriv dokumentets ID for å kjapt lokalisere dokumentet.';
$_lang["search_criteria_top"] = 'Search in main fields';
$_lang["search_criteria_top_msg"] = 'Pagetitle, Longtitle, Alias, ID';
$_lang["search_criteria_template_id"] = 'Search by template ID';
$_lang["search_criteria_template_id_msg"] = 'Find all Resources using the specified template.';
$_lang["search_criteria_url_msg"] = 'Find Resource by exact URL.';
$_lang["search_criteria_longtitle"] = 'Søk etter lang tittel';
$_lang["search_criteria_longtitle_msg"] = 'Finn alle dokument med søkteksten i den lange tittelen.';
$_lang["search_criteria_title"] = 'Søk etter tittel';
$_lang["search_criteria_title_msg"] = 'Finn samtlige dokumenter med søkteksten i tittelen.';
$_lang["search_empty"] = 'Ditt søk ga ingen resultater. Utvid dine søkekriterier og prøv igjen.';
$_lang["search_item_deleted"] = 'Denne posten har blitt fjernet';
$_lang["search_results"] = 'Søkeresultat';
$_lang["search_results_returned_desc"] = 'Beskrivelse';
$_lang["search_results_returned_id"] = 'ID';
$_lang["search_results_returned_msg"] = 'Your search criteria returned <b>%s</b> Resources. If a lot of results are being returned, try to enter a more specific search.';
$_lang["search_results_returned_title"] = 'Tittel';
$_lang["search_view_docdata"] = 'Vis denne posten';

$_lang["security"] = 'Sikkerhet';
$_lang["security_notices_tab"] = 'Security Notices';
$_lang["security_notices_title"] = 'Security Notices';

$_lang["select_date"] = 'Velg dato';
$_lang["send"] = 'Send';
$_lang["server_protocol_http"] = 'http';
$_lang["server_protocol_https"] = 'https';
$_lang["server_protocol_message"] = 'Spesifiser her om din side bruker en http- eller en https-tilkobling.';
$_lang["server_protocol_title"] = 'Servertype';
$_lang["serveroffset"] = 'Server offset';
$_lang["serveroffset_message"] = 'Velg antall timer som skiller mellon deg og serveren. Nåværende tid på serveren er <b>[%s]</b>, og den nåværende tiden med modifiseringen er <b>[%s]</b>.';
$_lang["serveroffset_title"] = 'Serverens tidsforskyvning';
$_lang["servertime"] = 'Server Time';
$_lang["set_automatic"] = 'Set automatic';
$_lang["set_default"] = 'Set default';
$_lang["set_default_all"] = 'Set defaults';

$_lang["settings_after_install"] = 'Etter som dette er en ny installasjom, må du gå igjennom disse instillingene og endre det du vil. Når du har kontrollert alle instillingene, klikk på \'Lagre\' for å oppdatere instillingsdatabasen.<br /><br />';
$_lang["settings_config"] = 'Konfigurasjon';
$_lang["settings_dependencies"] = 'Avhengigheter';
$_lang["settings_events"] = 'Systemhendelse';
$_lang["settings_furls"] = 'Vanlige adresser';
$_lang["settings_general"] = 'Generelle';
$_lang["settings_group_tv_message"] = 'Choose if Template Variables should be grouped in sections or tabs (named by TV category) when editing a Resource';
$_lang["settings_group_tv_options"] = 'No,Sections in General tab,Tabs in General tab,Sections in new tab,Tabs in new tab,New tabs';
$_lang["settings_misc"] = 'Øvrig';
$_lang["settings_security"] = 'Security';
$_lang["settings_KC"] = 'File Browser';
$_lang["settings_page_settings"] = 'Sideinstillinger';
$_lang["settings_photo"] = 'Foto';
$_lang["settings_properties"] = 'Egenskaper';
$_lang["settings_site"] = 'Webplassen';
$_lang["settings_strip_image_paths_message"] = 'Settes dette på, kommer EVO til å skrive om bilders søkestier så de bli relative istede for absolutte. Dette er veldig hendig hvis du får behov for å flytte din EVO-installasjon (for eksempel fra en testserver til et produksjonsmiljø). Hvis du ikke har noen anelse om hva dette betyr, la det bare stå igjen som \'Nei\'.';
$_lang["settings_strip_image_paths_title"] = 'Skriv om søkestier til bilder?';
$_lang["settings_templvars"] = 'Malvariabler';
$_lang["settings_title"] = 'Systeminstillinger';
$_lang["settings_ui"] = 'Grensesnitt & editor';
$_lang["settings_users"] = 'Brukere';
$_lang["settings_email_templates"] = 'Email & Templates';

$_lang["show_fullscreen_btn_message"] = 'Show Menu toggle Fullscreen button';
$_lang["show_newresource_btn_message"] = 'Show Menu New Resource button';
$_lang["settings_show_picker_message"] = 'Customize manager theme and save to localstorage';
$_lang["show_fullscreen_btn"] = 'Toggle Fullscreen button';
$_lang["show_newresource_btn"] = 'New Resource button';

$_lang["show_meta"] = 'Show META Keywords tab';
$_lang["show_meta_message"] = 'Show the deprecated META Keywords tab when editing Resources in the Manager.';
$_lang["show_tree"] = 'Vis tre';
$_lang["show_picker"] = 'Show Color Switcher';
$_lang["showing"] = 'Viser';
$_lang["signupemail_message"] = 'Her kan du angi beskjeden som sendes til brukere når du oppretter en konto for dem og lar EVO sende epost til dem med deres brukernavn og passord.<br /><b>Obs!:</b> Følgende begrep erstattes av innholdshåndtereren når meldingen sendes:<br /><br />[+sname+] - Navnet på din webplass<br />[+saddr+] - webplassens epostadresse<br />[+surl+] - webplassens adresse<br />[+uid+] - Brukerens login eller ID<br />[+pwd+] - Brukerens passord<br />[+ufn+] - Brukerens navn<br /><br /><b>La [+uid+] og [+pwd+] bli igjen i meldingen, ellers inneholder eposten ikke brukernavn og passord, som gjør at dine brukere ikke kan logge inn!</b>';
$_lang["signupemail_title"] = 'Registreringsbeskjed';
$_lang["site"] = 'Webplass';
$_lang["site_schedule"] = 'Webplass hendelser';
$_lang["sitename_message"] = 'Skriv inn navnet på din webplass her.';
$_lang["sitename_title"] = 'Webplassens navn';
$_lang["sitestart_message"] = 'Skriv inn ID til dokumentet du vil ha som startside her.<br /><b>OBS: Pass på at denne ID\'en tillhører et eksisterende dokument, og at det er publisert!</b>';
$_lang["sitestart_title"] = 'Startside';
$_lang["sitestatus_message"] = 'Velg \'Online\' for å publisere din webplass. Velger du \'Offline\', kommer dine besøkende til å se meldingen \'webplassen er ikke tilgjengelig\' og kommer ikke til å kunne besøke siden.';
$_lang["sitestatus_title"] = 'Webplassens status';
$_lang["siteunavailable_message"] = 'Meldingen som vises når webplassen er offline, eller når noe feil har intruffet.<br /><b>OBS: Denne meldingen vises bare om ingen \'webplassen er ikke tilgjengelig\'-side er satt.</b>';
$_lang["siteunavailable_message_default"] = 'The site is currently unavailable.';
$_lang["siteunavailable_page_message"] = 'Angi ID for dokumentet du vil bruke som offline-side her. <br /><b>OBS: Se til at den ID\'en du skrev inn tilhører et eksisterende dokument, at det har blitt publisert og kan nås av brukeren!</b>';
$_lang["siteunavailable_page_title"] = 'Side for<br />\'Webplassen er ikke tilgjengelig\'';
$_lang["siteunavailable_title"] = 'Melding for<br />\'Webbplassen er ikke tilgjengelig\'';
$_lang["controller_namespace"] = 'Controller Namespace';
$_lang["controller_namespace_message"] = 'Specify the full Namespace from which it is worth taking controllers, for example: <b>EvolutionCMS\\Main\\Controllers\\</b>';
$_lang["update_repository"] = 'GitHub repository path';
$_lang["update_repository_message"] = 'Enter GitHub repository path for example: <b>evocms-community/evolution</b>';

$_lang["sort_alphabetically"] = 'Sort alphabetically';
$_lang["sort_asc"] = 'Økende';
$_lang["sort_desc"] = 'Synkende';
$_lang["sort_menuindex"] = 'Sort menu index';
$_lang["sort_tree"] = 'Sorter treet';
$_lang['sort_updating'] = 'Updating ...';
$_lang['sort_updated'] = 'Updated!';
$_lang['sort_nochildren'] = 'Parent does not have any children';
$_lang["sort_elements_msg"] = 'Drag to reorder the listed elements.';

$_lang["source"] = 'Kilde';
$_lang["stay"] = 'Fortsett å redigere';
$_lang["stay_new"] = 'Legg til enda en';
$_lang["submit"] = 'Submit';
$_lang["sys_alert"] = 'Systemalarm';
$_lang["sysinfo_activity_message"] = 'Denne listen viser hvilke doumenter som nylig har blitt redigert av dine brukere.';
$_lang["sysinfo_userid"] = 'Brukere';
$_lang["system"] = 'System';
$_lang["system_email_signup"] = 'Hello [+uid+]

Here are your login details for [+sname+] Content Manager:

Username: [+uid+]
Password: [+pwd+]

Once you log into the Content Manager ([+surl+]), you can change your password.

Regards,
Site Administrator';
$_lang["system_email_webreminder"] = 'Hei [+uid+]\n\nKlikk på følgende link for å aktivere ditt nye passord:\n\n[+surl+]\n\nnHvis alt går bra bruker du følgende passord for å logge inn:\n\nPassord:[+pwd+]\n\nHvis du ikke har bedt om denne eposten kan du bare se bort ifra den.\n\nMed vennlig hilsen\nWebmaster';
$_lang["system_email_websignup"] = 'Hei [+uid+]\n\nHer kommer dine innloggnings-opplysninger for [+sname+] ([+surl+]) innholdshåndterer:\n\nBrukernavn: [+uid+]\nPassord: [+pwd+]\n\nDu kan endre ditt passord når du har logget inn i innholdshåndtereren.\n\nV Med vennlig hilsen\nWebmaster';
$_lang["table_hoverinfo"] = 'Hover the mouse cursor over a table\'s name to see a short description of the table\'s function (not all tables have <i>comments</i> set).';
$_lang["table_prefix"] = 'Table prefix';
$_lang["tag"] = 'Tag';

$_lang["to"] = 'til';
$_lang["toggle_fullscreen"] = 'Toggle Fullscreen';
$_lang["tools"] = 'Verktøy';
$_lang["top_howmany_message"] = 'Når rapporter vises, hvor lange skal \'Topp ...\' listene være?';
$_lang["top_howmany_title"] = 'Hvor mange i toppen';
$_lang["total"] = 'totalt';
$_lang["track_visitors_message"] = 'Hvis du logger besøk kan du vise statistikk for din webplass, men logging sinker sidehåndtereren litt. Hvis du ikke bryr deg om besøksstatistikk, kan du uten problem slå av dette og dra nytte av en liten hastighetsøkning.';
$_lang["track_visitors_title"] = 'Logge besøk';
$_lang["tree_page_click"] = 'Page Click Behavior';
$_lang["tree_page_click_message"] = 'The default behavior when clicking on a page in the site tree.';
$_lang["use_breadcrumbs"] = 'Show navigation';
$_lang["use_breadcrumbs_message"] = 'Show the navigation when creating or editing Resource in the Manager';
$_lang["tree_show_protected"] = 'Show protected pages';
$_lang["tree_show_protected_message"] = 'When set to "No", Protected Resources (and all their child-Resources) do not appear in the Site Tree menu. "No" is the legacy setting for Evolution CMS.';
$_lang["truncate_table"] = 'Klikk her for å avkorte denne tabellen  ';
$_lang["type"] = 'Type';
$_lang["udperms_allowroot_message"] = 'Vil du tillate dine brukere å lage nye dokumenter og mapper på roten av webplassen? ';
$_lang["udperms_allowroot_title"] = 'Tillat rot:';
$_lang["udperms_message"] = 'Tilgangsrettigheter tillater deg å spesifisere hvilke sider dine brukere har tilgang til å redigere. Du må tildele brukergrupper til dine brukere, gruppere dokumentene i dokumentgrupper og til slutt spesifisere hvilke brukergrupper som har tilgang til hvilke dokumentgrupper. Når du først slår på dette, kommer kun administratorer til å kunne redigere dokumenter.';
$_lang["udperms_title"] = 'Bruk tilgangsgrettigheter';
$_lang["unable_set_link"] = 'Kunne ikke sette link!';
$_lang["unable_set_parent"] = 'Kunne ikke sette ny eier!';
$_lang["unauthorizedpage_message"] = 'Angi ID til det dokumentet du vil sende brukere til om de har spurt etter et sikkert eller ikke tillat dokument.<br /> <b>OBS: Se til at den ID\'en du skrev inn tilhører et eksisterende dokument, at det har blitt publisert og kan nås av brukeren!</b>';
$_lang["unauthorizedpage_title"] = 'Ikke tillatt side';
$_lang["unblock_message"] = 'Denne brukeren kommer ikke lengre til å blokkeres når brukerens data lagres.';
$_lang["undelete_resource"] = 'Tilbakestill dokument';
$_lang["unpublish_date"] = 'Upubliser Dato';
$_lang["unpublish_events"] = 'Upubliser hendelser';
$_lang["unpublish_resource"] = 'Upubliser dokument';
$_lang["untitled_resource"] = 'Navnløst dokument';
$_lang["untitled_weblink"] = 'Navnløs weblink';
$_lang["update_params"] = 'Oppdater parametervisningen';
$_lang["update_settings_from_language"] = 'Replace current with:';

$_lang["upload_maxsize_message"] = 'Skriv den største filstørrelsen som kan lastes opp via filhåndtereren. Størelsen må angis i bytes.<br /><b>OBS: Store filer kan ta veldig lang tid å laste opp!</b>';
$_lang["upload_maxsize_title"] = 'Max størrelse for opplastinger';
$_lang["uploadable_files_message"] = 'Her kan du skrive inn en liste med filtyper som kan lastes opp med filhåndtereren. Skriv inn fil-ending for filtypene, separert med komma.';
$_lang["uploadable_files_title"] = 'Opplastbare filtyper:';
$_lang["uploadable_flash_message"] = 'Her kan du skrive en liste over filer som kan bli opplastet i \'assets/flash/\' ved bruk av Resource Manager. Skriv inn fil-ending for flash typene, separert med kommaer.';
$_lang["uploadable_flash_title"] = 'Opplastbare Flash Typer:';
$_lang["uploadable_images_message"] = 'Her kan du skrive en liste over filer som kan bli opplastet i \'assets/images/\' ved bruk av Resource Manager. Skriv inn fil-ending for bilde typene, separert med kommaer.';
$_lang["uploadable_images_title"] = 'Opplastbare Bilde Typer:';
$_lang["uploadable_media_message"] = 'Her kan du skrive en liste over filer som kan bli opplastet i \'assets/media/\' ved bruk av Resource Manager. Skriv inn fil-ending for media typene, separert med kommaer.';
$_lang["uploadable_media_title"] = 'Opplastbare Media Typer:';
$_lang["use_alias_path_message"] = 'Settes dette valget til \'Ja\', kommer hele søkestien til dokumentet å vises hvis dokumentet har et alias. For eksempel, hvis et dokument med aliaset \'barn\' befinner seg i en mappe med aliaset \'foreldre\', kommer hele søkestien til å vises som \'/foreldre/barn.html\'.<br /><b>Obs: Når dette settes til \'Ja\' (slår på alias-søkestier), må du referere objekt (som bilder, css, javascript etc) med en absolutt søkesti. Eksempel: \'/assets/images\' istedet for \'assets/images\'. Gjennom å gjøre det forhindrer du at webleseren (eller webserveren) legger til den relative søkestien til alias-søkestien.</b>';
$_lang["use_alias_path_title"] = 'Bruk vanlige aliassøkestier';
$_lang["use_editor_message"] = 'Vil du aktivere en riktekst-editor? Hvis du trives bedre med å skrive HTML, kan du slå av editoren ved å endre denne instillingen.<br /><b>OBS: Denne instillingen gjelder for samtlige dokument og brukere!</b>';
$_lang["use_editor_title"] = 'Aktivere editor';
$_lang["use_global_tabs"] = 'Use global Tabs';

$_lang["valid_hostnames_message"] = 'Help prevent XSS exploits misusing the site_url system setting by providing a comma separated list of valid hostnames for this installation. This is important for some types of shared hosts or hosts direct accessible via an IP address. First hostname in the list is used if the HTTP_HOST does not match any valid hostname.';
$_lang["valid_hostnames_title"] = 'Valid hostnames';
$_lang["validate_referer_message"] = 'Validate the HTTP_REFERER headers to reduce the risk of your content editors being tricked into performing unintended actions in the manager as victims of a CSRF (Cross Site Request Forgery) attack. Some configurations may not be able to use this option if the server is not sending HTTP_REFERER headers.';
$_lang["validate_referer_title"] = 'Validate HTTP_REFERER headers?';
$_lang["value"] = 'Verdi';
$_lang["version"] = 'Version';
$_lang["view"] = 'View';
$_lang["view_child_resources_in_container"] = 'View children';
$_lang["view_log"] = 'Vis logg';
$_lang["view_logging"] = 'Revideringsspor';
$_lang["view_sysinfo"] = 'Vis systeminformasjon';
$_lang["warning"] = 'Advarsel!';
$_lang["warning_not_saved"] = 'Endringene du har gjort har enda ikke blitt lagret. Du kan velge å bli igjen på denne siden og lagre endringene (\'Avbryt\'), eller du kan forlate den, og miste alle endringer du har gjort (\'OK\').';
$_lang["warning_visibility"] = 'Configuration Warnings visible to';
$_lang["warning_visibility_message"] = 'Control the visibility of the configuration warnings shown on the Manager welcome page';
$_lang["web_access_permissions"] = 'Rettigheter for webtilgang';
$_lang["web_access_permissions_user_groups"] = 'Webbrukergrupper:';
$_lang["web_permissions"] = 'Rettigheter for webtilgang';
$_lang["web_user_management_msg"] = 'Her kan du opprette nye webbrukere eller velge en eksisterende for redigering. Webbrukere er de som bare kan logge inn til webplassen.';
$_lang["web_user_management_title"] = 'Håndtere webbrukere';
$_lang["web_user_management_select_role"] = 'All roles';
$_lang["web_user_title"] = 'Opprett/rediger webbrukere';
$_lang["web_users"] = 'Webbrukere';
$_lang["weblink"] = 'Weblink';
$_lang["webpwdreminder_message"] = 'Skriv en medlding som sendes til dine webbrukere når de har bedt om et nytt passord via epost. Innholdshåndtereren kommer til å sende en epostmelding med det nye passorded og aktiveringsinformasjon.<br /> <b>Obs:</b> Følgende plassholdere erstattes av innholdshåndtereren når meldingen sendes:<br /><br />[+sname+] - Navnet på din webplass<br />[+saddr+] -  Epostadressen til din webplass<br />[+surl+] - Adressen til din webplass <br />[+uid+] - Brukerens inloggingsnavn eller ID<br />[+pwd+] - Brukerens passord <br />[+ufn+] - Brukerens navn<br /><br /><b>La [+uid+] og [+pwd+] blir igjen i meldingen, ellers får ikke mottageren sitt brukernavn og passord!</b>';
$_lang["webpwdreminder_title"] = 'Epost for webpåminnelse';
$_lang["websignupemail_message"] = 'Her kan du angi meldingen som sendes til dine webbrukere når du oppretter en webkonto til dem  og lar innholdshåndtereren sende en epostmelding med brukernavn og passord. <br /><b>Obs:</b> Følgende plassholdere erstattes av innholdshåndtereren når meldingen sendes:<br /><br />[+sname+] - Navnet på din webplass<br />[+saddr+] -  Epostadressen til din webplass<br />[+surl+] - Adressen til din webplass <br />[+uid+] - Brukerens inloggingsnavn eller ID<br />[+pwd+] - Brukerens passord <br />[+ufn+] - Brukerens navn<br /><br /><b>La [+uid+] og [+pwd+] blir igjen i meldingen, ellers får ikke mottageren sitt brukernavn og passord!</b>';
$_lang["websignupemail_title"] = 'Epost for webregistreringer';
$_lang["allow_multiple_emails_title"] = 'Duplicate Web User email address';
$_lang["allow_multiple_emails_message"] = 'Allows Web Users to share the same email address for situations when a member may not have their own email address or there is just one family email address.<br/>Note: Any password reminder and registration logic will need to account for this option if set to yes.';
$_lang["welcome_title"] = 'Velkommen till EVO webpubliseringsverktøy';
$_lang["which_editor_message"] = 'Her kan du velge hvilken riktekst-editor du vil bruke. Du kan laste ned og installere flere riktekst-editorer fra EVO sin nedlastingsside.';
$_lang["which_editor_title"] = 'Editor å bruke';
$_lang["working"] = 'Jobber...';
$_lang["wrap_lines"] = 'Bryt linjer';
$_lang["xhtml_urls_message"] = 'Replaces ampersand (&amp;) characters in urls that are generated by EVO with the validating &amp;<!-- -->amp; htmlentity';
$_lang["xhtml_urls_title"] = 'XHTML URLs';
$_lang["yes"] = 'Ja';
$_lang["you_got_mail"] = 'Du har fått epost';

$_lang["yourinfo_message"] = 'Denne seksjonen viser informasjon om deg:';
$_lang["yourinfo_previous_login"] = 'Din siste inlogging:';
$_lang["yourinfo_role"] = 'Din rolle er:';
$_lang["yourinfo_title"] = 'Din informasjon';
$_lang["yourinfo_total_logins"] = 'Totalt antall inlogginger:';
$_lang["yourinfo_username"] = 'Du er inlogget som:';

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
$_lang["enable_filter_phx_warning"] = 'Når PHX plugin aktivert, innebygde filtre er deaktivert som standard';

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
$_lang["bkmgr_restore_submit"] = 'Tilbakestill disse dataene';
$_lang["bkmgr_restore_confirm"] = 'Er du sikker på at du vil tilbakestille backup\n[+filename+] ?';
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
