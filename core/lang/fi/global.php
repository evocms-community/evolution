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
$_lang["about_title"] = 'Tietoa MODX:stä';

// days
$_lang["monday"] = 'Maanantai';
$_lang["tuesday"] = 'Tiistai';
$_lang["wednesday"] = 'Keskiviikko';
$_lang["thursday"] = 'Torstai';
$_lang["friday"] = 'Perjantai';
$_lang["saturday"] = 'Lauantai';
$_lang["sunday"] = 'Sunnuntai';

// templates
$_lang["template"] = 'Sivupohja';
$_lang["templates"] = 'Templates';
$_lang['templatecontroller'] = 'Template Controller';
$_lang["template_assignedtv_tab"] = 'Määritetyt sivupohjan muuttujat';
$_lang["template_code"] = 'Lähdekoodi (html)';
$_lang["template_desc"] = 'Kuvaus';
$_lang["template_edit_tab"] = 'Muokkaa sivupohjaa';
$_lang["template_inuse"] = 'This template is in use. Please set the documents using the template to another template. Documents using this template:';
$_lang["template_management_msg"] = 'Muokkaa sivupohjia (template).';
$_lang["template_msg"] = 'Muokkaa sivupohjaa (template). Muokatut sivupohjat otetaan käyttöön vasta, kun välimuisti on tyhjennetty. Tätä ennen voit tarkastella muokattua sivupohjaa käytössä sivun esikatselutoiminnon avulla.';
$_lang["template_name"] = 'Nimi';
$_lang["template_no_tv"] = 'Tähän sivupohjaan ei ole määritelty muuttujia.';
$_lang["template_notassigned_tv"] = 'These Template Variables are available for assigning.';
$_lang["template_reset_all"] = 'Aseta kaikki sivut käyttämään oletussivupohjaa';
$_lang["template_reset_specific"] = 'Aseta vain oletussivupohjaa \'%s\' käyttävät sivut';
$_lang["template_assigned_blade_file"] = 'Vastaava blade-tiedosto';
$_lang["template_create_blade_file"] = 'Luo mallitiedosto tallennettaessa';
$_lang["template_selectable"] = 'Template selectable when creating or editing ressources.';
$_lang["template_title"] = 'Sivupohja';
$_lang["template_tv_edit"] = 'Muokkaa muuttujien järjestystä';
$_lang["template_tv_edit_message"] = 'Muuta sivupohjan muuttujien järjestystä vetämällä.';
$_lang["template_tv_edit_title"] = 'Sivupohjan muuttujien järjestys';
$_lang["template_tv_msg"] = 'Sivupohjaan liitetyt muuttujat.';

// tmplvars
$_lang["tv"] = 'Sivupohjan muuttuja';
$_lang["tmplvar"] = 'Template Variable';
$_lang["tmplvars"] = 'Sivupohjan muuttujat';
$_lang["tmplvar_access_msg"] = 'Valitse sivuryhmät, joilla on oikeus muuttaa sivupohjan muuttujan sisältöä tai arvoa.';
$_lang["tmplvar_change_template_msg"] = 'Sivupohjan muuttaminen aiheuttaa muuttujien lataamisen uudelleen. Kaikki tallentamattomat muutokset menetetään.\n\n Haluatko varmasti muuttaa käytettävän sivupohjan?';
$_lang["tmplvar_inuse"] = 'Seuraavat sivut käyttävät parhaillaan sivupohjan muuttujaa. Jatka poistamista napsauttamalla Poista -painiketta tai peruuta Peruuta -painikkeesta.';
$_lang["tmplvar_tmpl_access"] = 'Sivupohjat';
$_lang["tmplvar_tmpl_access_msg"] = 'Valitse sivupohjat, joissa muuttuja on käytössä.';
$_lang["tmplvars_binding_msg"] = 'Tietolähteiden tuonti / sitominen (bindings) on mahdollista @ -komennolla.';
$_lang["tmplvars_caption"] = 'Otsikko';
$_lang["tmplvars_default"] = 'Oletusarvo';
$_lang["tmplvars_description"] = 'Kuvaus';
$_lang["tmplvars_elements"] = 'Arvovaihtoehdot';
$_lang["tmplvars_inherited"] = 'Value inherited';
$_lang["tmplvars_management_msg"] = 'Muokkaa sivupohjan muuttujia (template variable).';
$_lang["tmplvars_msg"] = 'Muokkaa sivupohjan muuttujaa (template variable). Muista, että muuttujat täytyy yhdistää haluttuihin sivupohjiin.';
$_lang["tmplvars_name"] = 'Nimi';
$_lang["tmplvars_novars"] = 'Sivupohjan muuttujia ei löytynyt';
$_lang["tmplvars_rank"] = 'Järjestysnumero';
$_lang["tmplvars_rank_edit_message"] = 'Drag to reorder the Template Variables.';
$_lang["tmplvars_reset_params"] = 'Tyhjennä parametrit';
$_lang["tmplvars_title"] = 'Luo/muokkaa sivupohjan muuttuja';
$_lang["tmplvars_type"] = 'Tyyppi';
$_lang["tmplvars_widget"] = 'Toiminto (widget)';
$_lang["tmplvars_widget_prop"] = 'Toimintoasetukset (widget)';
$_lang["role_no_tv"] = 'No Variables have been assigned to this Role yet.';
$_lang["role_notassigned_tv"] = 'These Variables are available for assigning.';
$_lang["role_tv_msg"] = 'The Variables assigned to this Role are listed below.';
$_lang["tmplvar_roles_access_msg"] = 'Select the Roles that are allowed to access/process this Template Variable';

// snippets
$_lang["snippet"] = 'PHP-palanen';
$_lang["snippets"] = 'Snippets';
$_lang["snippet_code"] = 'Lähdekoodi (php)';
$_lang["snippet_desc"] = 'Kuvaus';
$_lang["snippet_execonsave"] = 'Suorita PHP-palanen tallennuksen jälkeen.';
$_lang["snippet_management_msg"] = 'Muokkaa PHP-palasia (snippet).';
$_lang["snippet_msg"] = 'Muokkaa PHP-palasta (snippet). Muista, että PHP-palaset  ovat PHP-koodia ja niitä käsitellään sen mukaisesti. PHP-palasen lopputulos täytyy siis myös muistaa palauttaa, esim. return $output;';
$_lang["snippet_name"] = 'Nimi';
$_lang["snippet_properties"] = 'Oletusasetukset';
$_lang["snippet_title"] = 'PHP-palanen';

// chunks
$_lang["htmlsnippet"] = 'Chunk';
$_lang["htmlsnippets"] = 'Chunks';
$_lang["htmlsnippet_desc"] = 'Kuvaus';
$_lang["htmlsnippet_management_msg"] = 'Muokkaa HTML-palasia (chunk).';
$_lang["htmlsnippet_msg"] = 'Muokkaa HTML-palasta (chunk). Huomaa, että HTML-palaset voivat sisältää muutakin kuin pelkkää HTML-koodia, mutta PHP-koodia ei kuitenkaan käsitellä mitenkään.';
$_lang["htmlsnippet_name"] = 'Nimi';
$_lang["htmlsnippet_title"] = 'HTML-palanen';
$_lang["chunk"] = 'Palanen';
$_lang["chunk_code"] = 'Lähdekoodi (html)';
$_lang["chunk_multiple_id"] = 'Virhe: Usealla HTML-palasella on sama yksilötunnus (ID).';
$_lang["chunk_no_exist"] = 'HTML-palasta ei ole.';

// plugins
$_lang["plugin"] = 'Liitännäinen';
$_lang["plugins"] = 'Plugins';
$_lang["plugin_code"] = 'Lähdekoodi (php)';
$_lang["plugin_config"] = 'Liitännäisen asetukset';
$_lang["plugin_desc"] = 'Kuvaus';
$_lang["plugin_disabled"] = 'Ota liitännäinen pois käytöstä';
$_lang["plugin_event_msg"] = 'Valitse järjestelmätapahtumat, jotka aktivoivat liitännäisen suorittamisen.';
$_lang["plugin_management_msg"] = 'Muokkaa liitännäisiä (plugin).';
$_lang["plugin_msg"] = 'Muokkaa liitännäistä (plugin). Liitännäiset ovat PHP-koodia, jotka aktivoituvat valittujen järjestelmätapahtumien yhteydessä.';
$_lang["plugin_name"] = 'Nimi';
$_lang["plugin_priority"] = 'Muokkaa liitännäisten suorittamisjärjestystä';
$_lang["plugin_priority_instructions"] = 'Muuta liitännäisten järjestystä vetämällä. Ensimmäisenä suoritettavan liitännäisen tulee olla ylimpänä.';
$_lang["plugin_priority_title"] = 'Liitännäisten suorittamisjärjestys';
$_lang["purge_plugin"] = 'Purge obsolete plugins';
$_lang["purge_plugin_confirm"] = 'Are you sure you want to purge obsolete plugins?';
$_lang["plugin_title"] = 'Liitännäinen';

// categories
$_lang["category"] = 'Category';
$_lang["categories"] = 'Categories';
$_lang["category_heading"] = 'Kategoria';
$_lang["category_manager"] = 'Category Manager';
$_lang["category_management"] = 'Category management';
$_lang["category_msg"] = 'Muokkaa elementtejä.';

// file
$_lang["file_delete_file"] = 'Poista tiedosto';
$_lang["file_delete_folder"] = 'Poista kansio';
$_lang["file_deleted"] = 'Onnistui!';
$_lang["file_download_file"] = 'Lataa tiedosto';
$_lang["file_download_unzip"] = 'Pura tiedosto';
$_lang["file_folder_chmod_error"] = 'Tiedoston oikeuksien vaihto ei onnistunut, joudut tekemään sen EVO:n ulkopuolella.';
$_lang["file_folder_created"] = 'Kansion luonti onnistui!';
$_lang["file_folder_deleted"] = 'Kansion poisto onnistui!';
$_lang["file_folder_not_created"] = 'Kansiota ei voida luoda';
$_lang["file_folder_not_deleted"] = 'Kansiota ei voida poistaa. Varmista että kansio on tyhjä ennen sen poistamista!';
$_lang["file_not_deleted"] = 'Epäonnistui!';
$_lang["file_not_saved"] = 'Tiedostoa ei voi tallentaa, varmista että kohde hakemistoon voidaan kirjoittaa!';
$_lang["file_saved"] = 'Tiedoston päivitys onnistui!';
$_lang["file_unzip"] = 'Purku onnistui!';
$_lang["file_unzip_fail"] = 'Purku epäonnistui!';

// files
$_lang["files"] = 'Files';
$_lang["files_files"] = 'Tiedostot';
$_lang["files_access_denied"] = 'Pääsy estetty!';
$_lang["files_data"] = 'Ominaisuudet';
$_lang["files_dir_listing"] = 'Kansio:';
$_lang["files_directories"] = 'Kansiot';
$_lang["files_directory_is_empty"] = 'This directory is empty.';
$_lang["files_dirwritable"] = 'Voiko kansioon kirjoittaa? ';
$_lang["files_editfile"] = 'Muokkaa tiedostoa';
$_lang["files_file_type"] = 'Tiedostotyyppi: ';
$_lang["files_filename"] = 'Nimi';
$_lang["files_fileoptions"] = 'Toiminnot';
$_lang["files_filesize"] = 'Koko';
$_lang["files_filetype_notok"] = 'Tämän tyyppisen tiedoston siirtoa ei ole sallittu!';
$_lang["files_management"] = 'Manage Files';
$_lang["files_management_no_permission"] = 'You do not have enough permissions to view or edit these files. Ask the administrator to grant you access to <b>%s</b>.';
$_lang["files_modified"] = 'Muokattu';
$_lang["files_top_level"] = 'Päätasolle';
$_lang["files_up_level"] = 'Yksi taso ylöspäin';
$_lang["files_upload_copyfailed"] = 'Tiedoston siirtäminen kohdekansioon ei onnistunut!';
$_lang["files_upload_error"] = 'Virhe';
$_lang["files_upload_error0"] = 'Ongelma tiedoston siirrossa.';
$_lang["files_upload_error1"] = 'Tiedosto, jota yrität siirtää, on liian suuri.';
$_lang["files_upload_error2"] = 'Tiedosto, jota yrität siirtää, on liian suuri.';
$_lang["files_upload_error3"] = 'Tiedosto, jota yritit siirtää, ei siirtynyt kokonaan.';
$_lang["files_upload_error4"] = 'Valitse siirrettävä tiedosto.';
$_lang["files_upload_error5"] = 'Ongelma tiedoston siirrossa.';
$_lang["files_upload_inhibited_msg"] = '<strong>Siirto-oikeuksia rajoitettu</strong>. Varmista tiedoston siirtojen tuki ja tarkista kansion kirjoitusoikeudet.';
$_lang["files_upload_ok"] = 'Tiedoston siirto onnistui!';
$_lang["files_upload_permissions_error"] = 'Mahdollinen käyttöoikeusongelma - palvelimella on oltava kirjoitusoikeudet kansioon, johon haluat ladata tiedostoja.';
$_lang["files_uploadfile"] = 'Siirrä';
$_lang["files_uploadfile_msg"] = 'Valitse kansioon siirrettävä tiedosto:';
$_lang["files_uploading"] = 'Siirtää <strong>%s</strong> kohteeseen <strong>%s/</strong>';
$_lang["files_viewfile"] = 'Näytä tiedosto';

// modules
$_lang["module"] = 'Module';
$_lang["modules"] = 'Moduulit';
$_lang["module_code"] = 'Lähdekoodi (php)';
$_lang["module_config"] = 'Moduulin kokoonpano';
$_lang["module_desc"] = 'Kuvaus';
$_lang["module_disabled"] = 'Ota moduuli pois käytöstä';
$_lang["module_edit_click_title"] = 'Muokkaa moduulia napsauttamalla tästä';
$_lang["module_group_access_msg"] = 'Valitse käyttäjäryhmät, joilla on oikeus suorittaa moduuli ylläpidosta käsin.';
$_lang["module_management"] = 'Moduulit';
$_lang["module_management_msg"] = 'Valitse suoritettava tai muokattava moduuli. Suorita, muokkaa, tee kopio tai poista moduuli napsauttamalla moduulin kuvaketta. Muokkaa moduulia napsauttamalla sen nimeä.';
$_lang["module_msg"] = 'Muokkaa moduulia. Moduuli on kokoelma elementtejä (esim. liitännäisiä, PHP-palasia jne.).';
$_lang["module_name"] = 'Moduulin nimi';
$_lang["module_resource_msg"] = 'Lisää tai poista elementtejä, joista moduuli on riippuvainen. Lisää uusi elementti, napsauttamalla yhtä alapuolella olevista lisää -painikkeista.';
$_lang["module_resource_title"] = 'Moduulin Riippuvuudet';
$_lang["module_title"] = 'Muokkaa moduulia';
$_lang["module_viewdepend_msg"] = 'Moduulista riippuvaiset elementit.';

// elements
$_lang["element"] = 'Elementti';
$_lang["elements"] = 'Elementit';
$_lang["element_categories"] = 'Yhdistetty näkymä';
$_lang["element_filter_msg"] = 'Type here to filter list';
$_lang["element_management"] = 'Elementit';
$_lang["element_name"] = 'Elementin nimi';
$_lang["element_selector_msg"] = 'Valitse elementit alapuolella olevasta listasta ja paina \'Tuo\' painiketta.';
$_lang["element_selector_title"] = 'Elementinvalitsin';

// resource
$_lang["resource"] = 'Sivu';
$_lang["resource_alias"] = 'Alias';
$_lang["resource_alias_help"] = 'Määrittelee sivun internet-selaimen osoitekentässä näkyvän osoitteen viimeisen osan, esim. http://www.kotisivu.fi/sivun-alias. HUOM! Sivun alias luodaan automaattisesti sivun otsikon perusteella, jos jätät aliaksen tyhjäksi.';
$_lang["resource_content"] = 'Sivun sisältö';
$_lang["resource_description"] = 'Kuvaus';
$_lang["resource_description_help"] = 'Vapaaehtoinen sivun kuvaus.';
$_lang["resource_duplicate"] = 'Tee kopio';
$_lang["resource_long_title_help"] = 'Sivun sisältöä paremmin kuvaava pitkä otsikko on hyödyllinen hakukoneille.';
$_lang["resource_metatag_help"] = 'Valitse sivun metatiedot ja avainsanat. Voit valita useita metatietoja ja avainsanoja pitämällä CTRL-näppäintä pohjassa.';
$_lang["resource_opt_contentdispo"] = 'Sisällön esitystapa';
$_lang["resource_opt_contentdispo_help"] = 'Sisällön luonne määrittelee, miten selain käsittelee sivua. Esim. tiedoston latauksia varten valitse Liite -valinta.';
$_lang["resource_opt_emptycache"] = 'Tyhjennä välimuisti?';
$_lang["resource_opt_emptycache_help"] = 'Määrittelee tyhjennetäänkö välimuisti sivun tallennuksen yhteydessä. Jos välimuistia ei tyhjennetä, muuttunut sisältö ei välttämättä näy vierailijoille.';
$_lang["resource_opt_folder"] = 'Kansio?';
$_lang["resource_opt_folder_help"] = 'Määrittele sivu kansioksi. Tästä ei normaalisti tarvitse huolehtia ollenkaan, koska sivu muuttuu automaattisesti kansioksi, jos sen alle lisätään toinen sivu.';
$_lang["resource_opt_menu_index"] = ' Järjestysnumero valikossa';
$_lang["resource_opt_menu_index_help"] = 'Sivujen keskinäinen järjestys valikoissa, esim. järjestys sivuston navigaatiovalikossa.';
$_lang["resource_opt_menu_title"] = 'Otsikko valikossa';
$_lang["resource_opt_menu_title_help"] = 'Sivun valikoissa näkyvä sivun otsikko. Jos valikon otsikko on tyhjä, valikoissa käytetään otsikkona sivun otsikkoa ';
$_lang["resource_opt_published"] = 'Julkaistu?';
$_lang["resource_opt_published_help"] = 'Julkaistaanko sivu heti tallennuksen jälkeen?';
$_lang["resource_opt_richtext"] = 'Sisältöeditori?';
$_lang["resource_opt_richtext_help"] = 'Määrittelee käytetäänko tekstinkäsittelyohjelmaa muistuttavaa sisältöeditoria (rich text editor) sivun siällön muokkaamiseen. Jos sivu sisältää JavaScriptiä tai lomakkeita, sisältöeditorin käyttäminen voi sotkea sisältöä.';
$_lang["resource_opt_show_menu"] = ' Näytä valikossa';
$_lang["resource_opt_show_menu_help"] = 'Näytetäänkö sivu valikoissa, esim. sivuston naviaatiovalikossa?';
$_lang["resource_opt_trackvisit_help"] = 'Kirjaa kävijöiden vierailut sivulla.';
$_lang["resource_overview"] = 'Yhteenveto';
$_lang["resource_parent"] = 'Sivun paikka';
$_lang["resource_parent_help"] = 'Napsauta ensin yllä olevaa kansiokuvaketta ja sitten sivukartasta sitä sivua, jonka alle tämä sivu sijoitetaan.';
$_lang["resource_permissions_error"] = 'Sijoita tämä sivu vähintään yhteen sivuryhmään, johon myös itselläsi on käyttöoikeudet.';
$_lang["resource_setting"] = 'Sivun asetukset';
$_lang["resource_summary"] = 'Yhteenveto';
$_lang["resource_summary_help"] = 'Sivun yhteenveto.';
$_lang["resource_title"] = 'Otsikko';
$_lang["resource_title_help"] = 'Sivun otsikko. Vältä kenoviivoja otsikon nimessä.';
$_lang["resource_to_be_moved"] = 'Siirrettävä sivu';
$_lang["resource_type"] = 'Sivun tyyppi';
$_lang["resource_type_message"] = 'Hyperlinkki on sivu, joka ei sisällä muuta kuin suoran linkin johonkin toiseen verkkosivuun, kuvaan tai muuhun tiedostoon.';
$_lang["resource_type_weblink"] = 'Hyperlinkki';
$_lang["resource_type_webpage"] = 'Sivu';
$_lang["resource_weblink_help"] = 'Hyperlinkin osoite, esim. www-sivun osoite. Voit myös valita hyperlinkiksi jonkin sivun napsauttamalla kansio-kuvaketta ja napsauttamalla tämän jälkeen sivukartasta haluamaasi sivua.';
$_lang["resources_in_container"] = 'Alasivut';
$_lang["resources_in_container_no"] = 'Sivulla ei ole yhtään alasivua.';

// role
$_lang["role"] = 'Rooli';
$_lang["role_about"] = 'Näytä ohjeet';
$_lang["role_actionok"] = 'Näytä "toiminto suoritettu" -viestit';
$_lang["role_assets_images"] = 'Manage assets/images';
$_lang["role_assets_files"] = 'Manage assets/files';
$_lang["role_bk_manager"] = 'Käytä varmuuskopiointia';
$_lang["role_cache_refresh"] = 'Tyhjennä sivuston välimuisti';
$_lang["role_category_manager"] = 'Use the Category Manager';
$_lang["role_change_password"] = 'Muuta salasana';
$_lang["role_change_resourcetype"] = 'Muuta Materiaalityyppi';
$_lang["role_chunk_management"] = 'HTML-palasten hallinta';
$_lang["role_config_management"] = 'Asetusten hallinta';
$_lang["role_content_management"] = 'Sisällönhallinta';
$_lang["role_create_chunk"] = 'Luo uusi HTML-palanen';
$_lang["role_create_doc"] = 'Luo uusi sivu';
$_lang["role_create_plugin"] = 'Luo uusi liitännäinen';
$_lang["role_create_snippet"] = 'Luo uusi PHP-palanen';
$_lang["role_create_template"] = 'Luo uusi sivupohja';
$_lang["role_credits"] = 'Näytä kunniamaininnat';
$_lang["role_delete_chunk"] = 'Poista HTML-palanen';
$_lang["role_delete_doc"] = 'Poista sivu';
$_lang["role_delete_eventlog"] = 'Tyhjennä tapahtumaloki';
$_lang["role_delete_module"] = 'Poista moduuli';
$_lang["role_delete_plugin"] = 'Poista liitännäinen';
$_lang["role_delete_role"] = 'Poista rooli';
$_lang["role_delete_snippet"] = 'Poista PHP-palanen';
$_lang["role_delete_template"] = 'Poista sivupohja';
$_lang["role_delete_user"] = 'Poista käyttäjä';
$_lang["role_delete_web_user"] = 'Poista web-käyttäjä';
$_lang["role_edit_chunk"] = 'Muokkaa HTML-palasta';
$_lang["role_edit_doc"] = 'Muokkaa sivua';
$_lang["role_edit_doc_metatags"] = 'Muokkaa sivun metatietoja ja avainsanoja';
$_lang["role_edit_module"] = 'Muokkaa moduulia';
$_lang["role_edit_plugin"] = 'Muokkaa liitännäisiä';
$_lang["role_edit_role"] = 'Muokkaa roolia';
$_lang["role_edit_settings"] = 'Muuta sivuston asetuksia';
$_lang["role_edit_snippet"] = 'Muokkaa PHP-palasta';
$_lang["role_edit_template"] = 'Muokkaa sivupohjaa';
$_lang["role_edit_user"] = 'Muokkaa käyttäjää';
$_lang["role_edit_web_user"] = 'Muokkaa web-käyttäjää';
$_lang["role_empty_trash"] = 'Poista pysyvästi poistetut sivut';
$_lang["role_errors"] = 'Näytä virheilmoitukset';
$_lang["role_eventlog_management"] = 'Tapahtumalokin hallinta';
$_lang["role_export_static"] = 'Vie staattinen HTML';
$_lang["role_file_management"] = 'File Management';
$_lang["role_file_manager"] = 'Käytä tiedostoselainta';
$_lang["role_frames"] = 'Näytä ylläpito';
$_lang["role_help"] = 'Näytä ohjesivut';
$_lang["role_home"] = 'Näytä aloitussivu';
$_lang["role_import_static"] = 'Tuo HTML';
$_lang["role_logout"] = 'Kirjaudu ulos ylläpidosta';
$_lang["role_list_module"] = 'List Module';
$_lang["role_manage_metatags"] = 'Hallitse sivuston metatietoja ja avainsanoja';
$_lang["role_management_msg"] = 'Muokkaa rooleja.';
$_lang["role_management_title"] = 'Roolit';
$_lang["role_messages"] = 'Lue ja lähetä viestejä';
$_lang["role_module_management"] = 'Moduulien hallinta';
$_lang["role_name"] = 'Nimi';
$_lang["role_new_module"] = 'Luo uusi moduuli';
$_lang["role_new_role"] = 'Luo uusi rooli';
$_lang["role_new_user"] = 'Luo uusi käyttää';
$_lang["role_new_web_user"] = 'Luo uusi web-käyttäjä';
$_lang["role_plugin_management"] = 'Liitännäisten hallinta';
$_lang["role_publish_doc"] = 'Julkaise sivu';
$_lang["role_remove_locks"] = 'Poista lukot';
$_lang["role_role_management"] = 'Roolien hallinta';
$_lang["role_run_module"] = 'Suorita moduuli';
$_lang["role_save_chunk"] = 'Tallenna HTML-palanen';
$_lang["role_save_doc"] = 'Tallenna sivu';
$_lang["role_save_module"] = 'Tallenna moduuli';
$_lang["role_save_password"] = 'Tallenna salasana';
$_lang["role_save_plugin"] = 'Tallenna liitännäisiä';
$_lang["role_save_role"] = 'Tallenna roolit';
$_lang["role_save_snippet"] = 'Tallenna PHP-palanen';
$_lang["role_save_template"] = 'Tallenna sivupohja';
$_lang["role_save_user"] = 'Tallenna käyttäjät';
$_lang["role_save_web_user"] = 'Tallenna web-käyttäjä';
$_lang["role_snippet_management"] = 'PHP-palasten hallinta';
$_lang["role_template_management"] = 'Sivupohjien hallinta';
$_lang["role_title"] = 'Muokkaa roolia';
$_lang["role_udperms"] = 'Käyttöoikeuksien hallinta';
$_lang["role_user_management"] = 'Käyttäjähallinta';
$_lang["role_view_docdata"] = 'Näytä sivun tiedot';
$_lang["role_view_eventlog"] = 'Näytä tapahtumaloki';
$_lang["role_view_logs"] = 'Näytä järjestelmän lokit';
$_lang["role_view_unpublished"] = 'Näytä julkaisemattomat / piilotetut sivut';
$_lang["role_web_access_persmissions"] = 'Web-käyttöoikeudet';
$_lang["role_web_user_management"] = 'Web-käyttäjän hallinta';

// user
$_lang["user"] = 'Käyttäjä';
$_lang["users"] = 'Turvallisuus';
$_lang["user_block"] = 'Kirjautuminen estetty';
$_lang["user_blockedafter"] = 'Kirjautumisen esto alkaa';
$_lang["user_blockeduntil"] = 'Kirjautumisen esto loppuu';
$_lang["user_changeddata"] = 'Tietojasi on muutettu. Kirjaudu uudestaan sisään.';
$_lang["user_country"] = 'Maa';
$_lang["user_dob"] = 'Syntymäaika';
$_lang["user_doesnt_exist"] = 'Käyttäjää ei ole olemassa';
$_lang["user_edit_self_msg"] = 'Omien tietojen muuttamisen jälkeen saatat joutua kirjautumaan uudestaan ylläpitoon.</b>';
$_lang["user_email"] = 'Sähköpostiosoite';
$_lang["user_failedlogincount"] = 'Epäonnistuneet kirjautumiset';
$_lang["user_fax"] = 'Faksi';
$_lang["user_female"] = 'Nainen';
$_lang["user_full_name"] = 'Koko nimi';
$_lang["user_first_name"] = 'First name';
$_lang["user_last_name"] = 'Last Name';
$_lang["user_middle_name"] = 'Middle Name';
$_lang["user_gender"] = 'Sukupuoli';
$_lang["user_is_blocked"] = 'Tämä käyttäjä on estetty!';
$_lang["user_logincount"] = 'Sisäänkirjautumisten lukumäärä';
$_lang["user_male"] = 'Mies';
$_lang["user_management_msg"] = 'Muokkaa ylläpidon käyttäjiä. Kaikilla ylläpidon käyttäjillä on oikeus kirjautua sisällönhallintajärjestelmän ylläpitoon (mutta ei kuitenkaan välttämättä käyttää ylläpitoa).';
$_lang["user_management_title"] = 'Ylläpidon käyttäjät';
$_lang["user_mobile"] = 'Matkapuhelimen numero';
$_lang["user_phone"] = 'Puhelinnumero';
$_lang["user_photo"] = 'Käyttäjän kuva';
$_lang["user_photo_message"] = 'Valitse kuva.';
$_lang["user_prevlogin"] = 'Viimeksi kirjautunut';
$_lang["user_role"] = 'Käyttäjän rooli';
$_lang["no_user_role"] = 'No user role';
$_lang["user_state"] = 'Lääni / alue';
$_lang["user_title"] = 'Muokkaa ylläpidon käyttäjää';
$_lang["user_upload_message"] = ' Jos käyttäjältä halutaan estää kategoriaan kuuluvien tiedostojen lataaminen, ota valinta pois kohdasta "Käytä järjestelmän asetusta". ';
$_lang["user_use_config"] = 'Käytä järjestelmän asetusta';
$_lang["user_verification"] = 'User is verified';
$_lang["user_zip"] = 'Postinumero';
$_lang["username"] = 'Käyttäjänimi';
$_lang["username_unique"] = 'User name is already in use!';
$_lang["user_street"] = 'Street';
$_lang["user_city"] = 'City';
$_lang["user_other"] = 'Other';

// add
$_lang["add"] = 'Lisää';
$_lang["add_chunk"] = 'Lisää HTML-palanen';
$_lang["add_doc"] = 'Lisää sivu';
$_lang["add_folder"] = 'Uusi kansio';
$_lang["add_plugin"] = 'Lisää liitännäinen';
$_lang["add_resource"] = 'Uusi sivu';
$_lang["add_snippet"] = 'Lisää PHP-palanen';
$_lang["add_tag"] = 'Lisää metatieto';
$_lang["add_template"] = 'Lisää sivupohja';
$_lang["add_tv"] = 'Lisää sivupohjan muuttuja';
$_lang["add_weblink"] = 'Uusi hyperlinkki';

// new
$_lang["new_category"] = 'Uusi kategoria';
$_lang["new_file_permissions_message"] = 'Tiedostoselaimen kautta tuotavalle tiedostolle asetettavat luku- ja kirjoitusoikeudet. Asetus ei toimi automaattisesti kaikissa järjestelmissä, esim. IIS:ssä.';
$_lang["new_file_permissions_title"] = 'Uusien tiedostojen oikeudet';
$_lang["new_folder_permissions_message"] = 'Tiedostoselaimen kautta luotavalle kansiolle asetettavat luku- ja kirjoitusoikeudet. Asetus ei toimi automaattisesti kaikissa järjestelmissä, esim. IIS:ssä.';
$_lang["new_folder_permissions_title"] = 'Uusien kansioiden oikeudet';
$_lang["new_permission"] = 'New Permission';
$_lang["new_htmlsnippet"] = 'Uusi HTML-palanen';
$_lang["new_keyword"] = 'Lisää uusi avainsana:';
$_lang["new_module"] = 'Uusi moduuli';
$_lang["new_parent"] = 'Uusi pääryhmä';
$_lang["new_plugin"] = 'Uusi liitännäinen';
$_lang["new_role"] = 'Uusi rooli';
$_lang["new_snippet"] = 'Uusi PHP-palanen';
$_lang["new_template"] = 'Uusi sivupohja';
$_lang["new_tmplvars"] = 'Uusi sivupohjan muuttuja';
$_lang["new_user"] = 'Uusi ylläpidon käyttäjä';
$_lang["new_web_user"] = 'Uusi web-käyttäjä';
$_lang["new_resource"] = 'Uusi sivu';

// manage
$_lang["manage_categories"] = 'Manage Categories';
$_lang["manage_depends"] = 'Muokkaa riippuvuuksia';
$_lang["manage_files"] = 'Tiedostot';
$_lang["manage_htmlsnippets"] = 'Manage Chunks';
$_lang["manage_metatags"] = 'Metatiedot ja avainsanat';
$_lang["manage_modules"] = 'Moduulit';
$_lang["manage_plugins"] = 'Manage Plugins';
$_lang["manage_snippets"] = 'Manage Snippets';
$_lang["manage_templates"] = 'Manage Templates';
$_lang["manage_documents"] = 'Manage Documents';
$_lang["manage_permission"] = 'Manage Permissions';

// move
$_lang["move"] = 'Siirrä';
$_lang["move_resource"] = 'Siirrä';
$_lang["move_resource_message"] = 'Siirrä sivu ja sivun kaikki alasivut uuteen paikkaan napsauttamlla haluttua kohtaa sivukartasta. Siirrettävät sivun sijoitetaan valitun sivun alle.';
$_lang["move_resource_new_parent"] = 'Valitse sivukartasta uusi paikka.';
$_lang["move_resource_title"] = 'Siirrä';

$_lang["access_permissions"] = 'Käyttöoikeudet';
$_lang["access_permission_denied"] = 'Ei käyttöoikeuksia tähän sivuun.';
$_lang["access_permission_parent_denied"] = 'Ei käyttöoikeuksia luoda sivua tähän!';
$_lang["access_permissions_add_resource_group"] = 'Uusi sivuryhmä';
$_lang["access_permissions_add_user_group"] = 'Uusi käyttäjäryhmä';
$_lang["access_permissions_docs_message"] = 'Valitse sivun käyttöoikeudet:';
$_lang["access_permissions_group_link"] = 'Luo uusi yhteys';
$_lang["access_permissions_introtext"] = 'Muokkaa käyttäjä- ja sivuryhmiä.';
$_lang["access_permissions_link_to_group"] = 'sivuryhmään';
$_lang["access_permissions_context"] = 'in context';
$_lang["access_permissions_link_user_group"] = 'Yhdistä käyttäjäryhmä';
$_lang["access_permissions_links"] = 'Käyttäjä- ja sivuryhmien yhteydet';
$_lang["access_permissions_links_tab"] = 'Yhdistä käyttäjäryhmät ja sivuryhmät toisiinsa. Määrittele käyttäjäryhmien oikeudet lisäämällä kunkin käyttäjäryhmän alaisuuteen tarvittavat sivuryhmät.';
$_lang["access_permissions_no_resources_in_group"] = 'Ei yhtään.';
$_lang["access_permissions_no_users_in_group"] = 'Ei yhtään.';
$_lang["access_permissions_off"] = '<span class="warning">Käyttöoikeuksia ei ole aktivoitu.</span> Tämän vuoksi yhdelläkään tässä tehdyllä ei ole vaikutusta ennenkuin käyttöoikeudet on aktivoitu.';
$_lang["access_permissions_resource_groups"] = 'Sivuryhmät';
$_lang["access_permissions_resources_in_group"] = '<strong>Sivut ryhmässä:</strong> ';
$_lang["access_permissions_resources_tab"] = 'Muokkaa sivuryhmiä. Lisää yksittäinen sivu ryhmään tai poista yksittäinen sivu ryhmästä muokkaamalla suoraan kyseistä sivua.';
$_lang["access_permissions_user_toggle"] = 'Toggle access permissions';
$_lang["access_permissions_user_groups"] = 'Ylläpidon käyttäjäryhmät';
$_lang["access_permissions_user_message"] = 'Valitse käyttäjän käyttäjäryhmät:';
$_lang["access_permissions_users_in_group"] = '<strong>Käyttäjiä ryhmässä:</strong> ';
$_lang["access_permissions_users_tab"] = 'Muokkaa käyttäjäryhmiä. Lisää yksittäinen käyttäjä ryhmään tai poista yksittäinen käyttäjä ryhmästä muokkaamalla suoraan kyseistä käyttäjää. Käyttäjillä, joiden rooli on pääkäyttäjä (Adminstrator), on aina oikeudet kaikkiin sivuihin.';

$_lang["users_list"] = 'Users list';
$_lang["documents_list"] = 'Resources list';

$_lang["account_email"] = 'Käyttäjän sähköpostiosoite';
$_lang["actioncomplete"] = '<strong>Toiminto onnistui!</strong><br /> - Odota hetki...';
$_lang["activity_message"] = 'Lista viimeksi luoduista tai muokatuista sivuista';
$_lang["activity_title"] = 'Viimeisimmät sivut';

$_lang["administrator_role_message"] = 'Pääkäyttäjän roolia ei voi muokata tai poistaa.';
$_lang["administrators"] = 'Pääkäyttäjät';
$_lang["after_saving"] = 'Tallennuksen jälkeen';
$_lang["alert_delete_self"] = 'Et voi poistaa itseäsi!';
$_lang["alias"] = 'Alias';
$_lang["all_doc_groups"] = 'Kaikki sivuryhmät (julkinen sivu)';
$_lang["all_events"] = 'Kaikki tapahtumat';
$_lang["all_usr_groups"] = 'Kaikki käyttäjäryhmät';
$_lang["allow_mgr_access"] = 'Pääsy ylläpitoon';
$_lang["allow_mgr_access_message"] = 'Sallitaanko käyttäjälle pääsy ylläpitoon vai vain sivuston muokkaaminen esikatselutilassa. <strong>HUOMAA:</strong> Jos pääsyä ylläpitoon ei ole, käyttäjä ohjataan aloitussivulle.';
$_lang["already_deleted"] = 'on jo poistettu.';
$_lang["attachment"] = 'Liite';
$_lang["author_infos"] = 'Author information';
$_lang["automatic_alias_message"] = 'Sivun alias voidaan luoda automaattisesti sivun otsikon perusteella tallennuksen yhteydessä.';
$_lang["automatic_alias_title"] = 'Luo sivun alias automaattisesti:';
$_lang["backup"] = 'Varmuuskopiointi';
$_lang["bk_manager"] = 'Varmuuskopiointi';
$_lang["block_message"] = 'Tämä käyttäjä estetään käyttäjätietojen tallennuksen jälkeen!';
$_lang["blocked_minutes_message"] = 'Kuinka moneksi minuutiksi käyttäjän tunnus lukitaan, kun epäonnistuneita kirjautumisyrityksiä tulee likaa. Anna arvo pelkkinä numeroina, ei pilkkuja, pisteitä tms.';
$_lang["blocked_minutes_title"] = 'Lukittu minuuteiksi:';
$_lang["cache_files_deleted"] = 'Seuraavat tiedostot poistettiin:';
$_lang["cancel"] = 'Peruuta';
$_lang["captcha_code"] = 'Varmistuskoodi';
$_lang["captcha_message"] = 'Ota varmistuskoodit (CAPTCHA) käyttöön turvallisuuden parantamiseksi. Tällöin ylläpitoon kirjautumisen yhteydessä on syötettävä myös kuvassa näkyvä varmistukoodi.';
$_lang["captcha_title"] = 'Käytä varmistuskoodeja:';
$_lang["captcha_words_default"] = 'MODX,Todellisuus,Oikeus,Turvallisuus,Koodi,Palanen,Parempi,Kuvaus,Voitto,Edistynyt,Nauti,Osoite,Ohjain,Geneettinen,Valo,Kevyt,Mukavuus,Suomi,Internet,Kysely,Sivupohja,Usein,Nettisivut,Tatuointi,Keltainen,Punainen,Sininen,Ruskea,Musta,Valkoinen,Oranssi,Nauru,Mukana,Laskuvarjo,Uinti,Fantasia,Palindromi,Rehellisyys,Nopea,Ihminen,Tietokone,Palapeli,Monitori,Ikkuna,Valinta,Painike';
$_lang["captcha_words_message"] = 'Lista varmistuskoodeina (CAPTCHA) käytetävistä sanoista. Erottele sanat pilkuilla. Kenttään mahtuu enintään 255 merkkiä.';
$_lang["captcha_words_title"] = 'Varmistuskoodi -sanat (CAPTCHA):';

$_lang["cfg_base_path"] = 'MODX_BASE_PATH';
$_lang["cfg_base_url"] = 'MODX_BASE_URL';
$_lang["cfg_manager_path"] = 'MODX_MANAGER_PATH';
$_lang["cfg_manager_url"] = 'MODX_MANAGER_URL';
$_lang["cfg_site_url"] = 'MODX_SITE_URL';

$_lang["change_name"] = 'Muuta nimi';
$_lang["change_password"] = 'Muuta salasana';
$_lang["change_password_confirm"] = 'Varmista salasana';
$_lang["change_password_message"] = 'Syötä uusi salasana ja varmista salasana (uusi salasana toiseen kertaan). Salasanan tulee olla 6-15 merkkiä pitkä.';
$_lang["change_password_new"] = 'Uusi salasana';
$_lang["charset_message"] = 'Valitse käytettävä merkistö [(modx_charset)] asetukselle. Tällä valinnalla ei ole merkitystä EVO ylläpidon merkistökoodaukseen. Monet kolmannen osapuolen resurssit käyttävät [(modx_charset)] asetusta oletusmerkistönä.';
$_lang["charset_title"] = 'Merkistö:';

$_lang["cleaningup"] = 'Odota hetki...';
$_lang["clean_uploaded_filename"] = 'Use Transliteration for File Uploads';
$_lang["clean_uploaded_filename_message"] = 'Use the default or transalias settings for the file name to clean special characters from uploaded file names, preserving dot-characters (periods)';
$_lang["clear_log"] = 'Tyhjennä loki';
$_lang["click_to_context"] = 'Napsauta päästäksesi kontekstivalikkoon';
$_lang["click_to_edit_title"] = 'Muokkaa napsauttamalla tästä';
$_lang["click_to_view_details"] = 'Näytä yksityiskohdat napsauttamalla tästä';
$_lang["close"] = 'Sulje';
$_lang["code"] = 'Lähdekoodi';
$_lang["collapse_tree"] = 'Kutista';
$_lang["comment"] = 'Kommentti';

$_lang["configcheck_admin"] = 'Ole ystävällinen ja ota yhteyttä sivuston pääkäyttäjään ja varoita häntä tästä viestistä!';
$_lang["configcheck_cache"] = 'cache directory is not writable';
$_lang["configcheck_cache_msg"] = 'Evolution CMS cannot write to the cache directory. Evolution CMS will still function as expected, but no caching will take place. To solve this, make the \'cache\' directory writable.';
$_lang["configcheck_configinc"] = 'Asetustiedostoon voi yhä kirjoittaa';
$_lang["configcheck_configinc_msg"] = 'Pahantahtoiset henkilöt voivat hyödyntää tätä murtautuakseen sivustollesi. Korjaa ongelma poistamalla tiedostosta (/[+MGR_DIR+]/includes/config.inc.php) kirjoitusoikeudet!';
$_lang["configcheck_default_msg"] = 'Määrittelemätön varoitus on löytynyt. Outoa.';
$_lang["configcheck_errorpage_unavailable"] = 'Virhesivua ei ole saatavilla.';
$_lang["configcheck_errorpage_unavailable_msg"] = 'Virhesivulle ei ole käyttöoikeutta tai sitä ei ole olemassa. Tämä voi aiheuttaa ongelmia sivustolla. Varmista, ettei sivulle ole määritetty web-käyttäjäryhmää.';
$_lang["configcheck_errorpage_unpublished"] = 'Virhesivua ei ole julkaistu tai se ei ole olemassa.';
$_lang["configcheck_errorpage_unpublished_msg"] = 'Virhesivulle ei ole käyttöoikeutta. Julkaise kyseinen sivu ja/tai varmista, että sivun ID on järjestelmän asetuksissa oikein.';
$_lang["configcheck_filemanager_path"] = 'The currently set <a href="index.php?a=17&tab=4">File Manager path</a> seems incorrect.';
$_lang["configcheck_filemanager_path_msg"] = 'This can happen for example by moving your installation to a different directory or server. Please check and update your Evolution CMS configuration.';
$_lang["configcheck_hide_warning"] = '<a href="javascript:hideConfigCheckWarning(\'%s\');"><em>Don\'t show this again.</em></a>';
$_lang["configcheck_images"] = 'Images-kansioon ei voi kirjoittaa';
$_lang["configcheck_images_msg"] = 'Images-kansioon ei voi kirjoittaa tai kansiota ei ole olemassa. Tämä tarkoittaa sitä, että kuvanhallintatoiminnot eivät toimi!';
$_lang["configcheck_installer"] = 'asennusohjelma on yhä tallella';
$_lang["configcheck_installer_msg"] = 'Install-kansio sisältää EVO:n asennusohjelman. Kuvittele, mitä voi tapahtua, jos pahantahtoinen henkilö löytää kansion ja ajaa asennusohjelman! Korjaa ongelma poistamalla kansio palvelimeltasi.';
$_lang["configcheck_lang_difference"] = 'Virheellinen määrä merkintöjä kielitiedostossa';
$_lang["configcheck_lang_difference_msg"] = 'Tällä hetkellä valittuna oleva kieli sisältää eri määrän merkintöjä kuin oletuskieli. Tämä ei välttämättä ole ongelma, mutta voi tarkoittaa sitä, että kielitiedosto pitäisi päivittää.';
$_lang["configcheck_notok"] = 'Varoitukset: ';
$_lang["configcheck_ok"] = 'Tarkistus onnistui - ei varoituksia.';
$_lang["configcheck_php_gdzip"] = 'GD ja/tai Zip PHP-laajennuksia ei löytynyt';
$_lang["configcheck_php_gdzip_msg"] = 'EVO vaatii GD ja Zip PHP-laajennukset toimiakseen täydellisesti. EVO toimii ilmankin kyseisiä laajennuksia, mutta tiedostoselaimen, kuvaeditorin ja Captcha -varmistuskoodien kaikki ominaisuudet eivät ole käytettävissä.';
$_lang["configcheck_rb_base_dir"] = 'The currently set <a href="index.php?a=17&tab=5">File base path</a> seems incorrect.';
$_lang["configcheck_rb_base_dir_msg"] = 'This can happen for example by moving your installation to a different directory or server. Please check and update your Evolution CMS configuration.';
$_lang["configcheck_register_globals"] = 'Palvelimen php.ini-tiedossa register_globals on asetettu päälle ';
$_lang["configcheck_register_globals_msg"] = 'Tämä asetus tekee sivuston alttiiksi Cross Site Scripting- eli XSS-hyökkäyksille. Kysy palveluntarjoajaltasi, miten asia voitaisiin ratkaista.';
$_lang["configcheck_title"] = 'Asetusten tarkistus';
$_lang["configcheck_templateswitcher_present"] = 'TemplateSwitcher Plugin detected';
$_lang["configcheck_templateswitcher_present_delete"] = '<a href="javascript:deleteTemplateSwitcher();">Delete TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_disable"] = '<a href="javascript:disableTemplateSwitcher();">Disable TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_msg"] = 'The TemplateSwitcher plugin has been found to cause caching and performance problems, and should be used only the functionality is required in your site.';
$_lang["configcheck_unauthorizedpage_unavailable"] = '"Pääsy kielletty" -sivua ei ole julkaistu.';
$_lang["configcheck_unauthorizedpage_unavailable_msg"] = '"Pääsy kielletty" -sivulle ei joko päästä tai sitä ei ole olemassa. Tämä voi johtaa ongelmiin sivustollasi. Varmista, ettei sivulle ole määritetty web-käyttäjäryhmää.';
$_lang["configcheck_unauthorizedpage_unpublished"] = '"Pääsy kielletty" -sivua ei ole julkaistu.';
$_lang["configcheck_unauthorizedpage_unpublished_msg"] = '"Pääsy kielletty" -sivu ei ole julkinen. Varmista, että sivu on julkaistu ja sivun ID-tunnus on oikein.';
$_lang["configcheck_validate_referer"] = 'Tietoturvavaroitus: HTTP Header Validation';
$_lang["configcheck_validate_referer_msg"] = 'Järjestelmän asetus <strong>Tarkasta HTTP_REFERER tunnisteet?</strong> on poissa päältä. On suositeltavaa ottaa asetus käyttöön. <a href="index.php?a=17">Järjestelmän asetukset</a><br /><a href="javascript:hideHeaderVerificationWarning();"><em>Älä näytä tätä ilmoitusta uudelleen.</em></a>';
$_lang["configcheck_warning"] = 'Varoitus:';
$_lang["configcheck_what"] = 'Mitä tämä tarkoittaa?';

$_lang["safe_mode_warning"] = 'Safe mode is enabled. Manager functionality is limited.';

$_lang["confirm_block"] = 'Haluatko varmasti estää käyttäjän?';
$_lang["confirm_delete_category"] = 'Are you sure you want to delete this category?';
$_lang["confirm_delete_eventlog"] = 'Haluatko varmasti poistaa?';
$_lang["confirm_delete_file"] = 'Haluatko varmasti poistaa?';
$_lang["confirm_delete_group"] = 'Are you sure you want to delete this group?';
$_lang["confirm_delete_htmlsnippet"] = 'Haluatko varmasti poistaa?';
$_lang["confirm_delete_keywords"] = 'Haluatko varmasti poistaa?';
$_lang["confirm_delete_module"] = 'Haluatko varmasti poistaa?';
$_lang["confirm_delete_plugin"] = 'Haluatko varmasti poistaa?';
$_lang["confirm_delete_record"] = 'Haluatko varmasti poistaa?';
$_lang["confirm_delete_resource"] = 'Haluatko varmasti poistaa?\nKaikki sivun (kansion) alasivut poistetaan myös.';
$_lang["confirm_delete_role"] = 'Haluatko varmasti poistaa?';
$_lang["confirm_delete_snippet"] = 'Haluatko varmasti poistaa?';
$_lang["confirm_delete_tags"] = 'Haluatko varmasti poistaa?';
$_lang["confirm_delete_template"] = 'Haluatko varmasti poistaa?';
$_lang["confirm_delete_tmplvars"] = 'Haluatko varmasti poistaa?';
$_lang["confirm_delete_user"] = 'Haluatko varmasti poistaa?';

$_lang["delete_yourself"] = 'You can\'t delete yourself';
$_lang["delete_last_admin"] = 'You can\'t delete last admin user';

$_lang["confirm_delete_permission"] = 'Are you sure you want to delete this Permission?';
$_lang["confirm_duplicate_record"] = 'Haluatko varmasti tehdä kopion?';
$_lang["confirm_empty_trash"] = 'Tämä tuhoaa pysyvästi KAIKKI poistetut sivut. \n\nJatka?';
$_lang["confirm_load_depends"] = 'Haluatko varmasti ladata hallitse riippuvaisuuksia näkymän tallentamatta tehtyjä muutoksia?';
$_lang["confirm_name_change"] = 'Käyttäjänimen muuttaminen voi vaikuttaa muiden sisällönhallintajärjestelmään yhdistettyjen ohjelmien toimintaan. \n\n Oletko varma että haluat muuttaa tätä käyttäjänimeä?';
$_lang["confirm_publish"] = '\n\Sivun julkaiseminen poistaa kaikki sivuun asetetut julkaisu- ja piilotuspäiväykset. \n\nJatka?';
$_lang["confirm_remove_locks"] = 'Joskus käyttäjät sulkevat selaimensa esimerkiksi kesken sivun muokkaamisen. Tällöin muokattava kohde saattaa jäädä lukittuun tilaan. Poista kaikki lukot napsauttamalla OK.\n\nJatka?';
$_lang["confirm_reset_sort_order"] = 'Are you sure you want to reset the \"sort order/index\" of all listed elements to 0 ?';
$_lang["confirm_resource_duplicate"] = 'Haluatko varmasti tehdä kopion?';
$_lang["confirm_setting_language_change"] = 'Olet vaihtanut oletusarvoa ja muutokset menetetään, jatketaanko?';
$_lang["confirm_unblock"] = 'Haluatko varmasti poistaa käyttäjän eston?';
$_lang["confirm_undelete"] = '\n\nMyös jokainen sivun kanssa yhtä aikaa poistettu alasivu palautetaan.';
$_lang["confirm_unpublish"] = '\n\nSivun piilottaminen poistaa myös kaikki sivuun asetetut julkaisu- ja piilotuspäiväykset.\n\nJatka?';
$_lang["confirm_unzip_file"] = 'Haluatko varmasti purkaa tiedoston??\n\nOlemassa olevat tiedostot tullaan ylikirjoittamaan.';

$_lang["could_not_find_user"] = 'Käyttäjää ei löytynyt';

$_lang["create_folder_here"] = 'Uusi kansio tähän';
$_lang["create_resource_here"] = 'Uusi sivu tähän';
$_lang["create_resource_title"] = 'Uusi sivu';
$_lang["create_weblink_here"] = 'Uusi hyperlinkki tähän';
$_lang["createdon"] = 'Luonti päivämäärä';
$_lang["create_new"] = 'Create new';

$_lang["credits"] = 'Kunniamaininnat';
$_lang["credits_shouts_msg"] = '<p>EVO:n kehittäjät ja ylläpitäjät:<a href="https://evo-cms.com/" target="_blank"> evo-cms.com</a>.</p>';
$_lang["custom_contenttype_message"] = 'Muokkaa sivuissa käytettäviä sisältötyyppejä.';
$_lang["custom_contenttype_title"] = 'Sisältötyypit:';

$_lang["database_charset"] = 'Tietokannan merkistö';
$_lang["database_collation"] = 'Tietokannan koontimerkistö (collation charset)';
$_lang["database_name"] = 'Tietokannan nimi';
$_lang["database_overhead"] = '<strong>Huomaa:</strong> Hukkatila on tietokannan varaamaa tyhjää tilaa. Vapauta tyhjä tila napsauttamalla taulun Hukkatila-sarakkeen linkkiä.';
$_lang["database_server"] = 'Tietokantapalvelin';
$_lang["database_table_clickbackup"] = ' <strong>Valitse ensin varmuuskopioitavat tietokannan taulut. Voit valita kaikki taulut rastittamalla valinnan "Taulun nimi".</strong>';
$_lang["database_table_clickhere"] = 'Aloita varmuuskopionti.';
$_lang["database_table_datasize"] = 'Tietojen koko';
$_lang["database_table_droptablestatements"] = 'Lisää myös taulujen poistokomennot (DROP TABLE).';
$_lang["database_table_effectivesize"] = 'Todellinen koko';
$_lang["database_table_indexsize"] = 'Indeksin koko';
$_lang["database_table_overhead"] = 'Hukkatila';
$_lang["database_table_records"] = 'Tietueita';
$_lang["database_table_tablename"] = 'Taulun nimi';
$_lang["database_table_totals"] = 'Yhteensä:';
$_lang["database_table_totalsize"] = 'Kokonaiskoko';
$_lang["database_tables"] = 'Tietokannan taulut';
$_lang["database_version"] = 'Tietokannan versio:';

$_lang["date"] = 'Päiväys';
$_lang["datechanged"] = 'Päiväys muuttui';
$_lang["datepicker_offset"] = 'Päivämäärävalinnan rajat: ';
$_lang["datepicker_offset_message"] = 'Kuinka monta vuotta näytetään taaksepäin kalentereissa, kun valitaan päivämääriä.';
$_lang["datetime_format"] = 'Päivämäärän muoto:';
$_lang["datetime_format_message"] = 'Päivämäärien muoto ylläpidossa.';

$_lang["default"] = 'Oletus:';
$_lang["defaultcache_message"] = 'Määrittele tallennetaanko uudet sivut oletusarvoisesti välimuistiin.';
$_lang["defaultcache_title"] = 'Välimuisti -oletus:';
$_lang["defaultmenuindex_message"] = 'Määrittele annetaanko uusille sivuille automaattisesti kasvava valikon järjestysnumero.';
$_lang["defaultmenuindex_title"] = 'Valikon oletusjärjestys:';
$_lang["defaultpublish_message"] = 'Määrittele ovatko uudet sivut oletusarvoisesti julkaistu vai piilotettu.';
$_lang["defaultpublish_title"] = 'Julkaistu -oletus:';
$_lang["defaultsearch_message"] = 'Määrittele ovatko uudet sivut oletusrvoisesti haettavissa sivuston sisäisellä haulla.';
$_lang["defaultsearch_title"] = 'Haettavissa -oletus:';
$_lang["defaulttemplate_message"] = 'Valitse oletussivupohja uusille sivuille. Käytettävän sivupohjan voi vaihtaa sivun luomisen tai muokkaamisen yhteydessä. Oletussivupohja vain esivalitsee yhden sivupohjan.';
$_lang["defaulttemplate_title"] = 'Oletussivupohja:';
$_lang["defaulttemplate_logic_title"] = 'Automatic Template Assignment';
$_lang["defaulttemplate_logic_general_message"] = 'New Resources will have the following templates, falling back to higher levels if not found:';
$_lang["defaulttemplate_logic_system_message"] = '<strong>System</strong>: the System Default Template.';
$_lang["defaulttemplate_logic_parent_message"] = '<strong>Parent</strong>: the same Template as the parent container.';
$_lang["defaulttemplate_logic_sibling_message"] = '<strong>Sibling</strong>: the same Template as other Resources in the same container.';

$_lang["delete"] = 'Poista';
$_lang["delete_resource"] = 'Poista';
$_lang["delete_tags"] = 'Poista metatiedot';
$_lang["deleting_file"] = 'Poistaa tiedostoa `%s`: ';
$_lang["description"] = 'Kuvaus';
$_lang["deselect_keywords"] = 'Tyhjennä avainsanat';
$_lang["deselect_metatags"] = 'Tyhjennä metatiedot';
$_lang["disabled"] = 'Estetty';
$_lang["doc_data_title"] = 'Sivu';
$_lang["documentation"] = 'Documentation';

$_lang["duplicate"] = 'Tee kopio';
$_lang["duplicate_alias_found"] = 'Sivu nimeltä \'%s\' käyttää jo aliasta \'%s\'. Anna sivulle jokin muu alias.';
$_lang["duplicate_template_alias_found"] = 'Template \'%s\' is already using the URL alias \'%s\'. Please enter a unique alias.';
$_lang["duplicate_alias_message"] = 'Sallitaanko saman nimisten aliaksien käyttö useassa eri sivuissa. <strong>HUOMAA:</strong> Asetuksen käyttö on turvallista vain jos samanaikaisesti käytetään myös selkokielisiä aliaspolkuja.';
$_lang["duplicate_alias_title"] = 'Salli saman nimiset aliakset:';
$_lang["duplicate_name_found_general"] = 'Kohde %s nimeltä \'%s\' on jo olemassa. Anna jokin toinen nimi.';
$_lang["duplicate_name_found_module"] = 'Moduuli nimeltä \'%s\' on jo olemassa. Anna jokin toinen nimi.';
$_lang["duplicated_el_suffix"] = 'Duplicate';

$_lang["edit"] = 'Muokkaa';
$_lang["edit_resource"] = 'Muokkaa';
$_lang["edit_resource_title"] = 'Muokkaa';
$_lang["edit_settings"] = 'Järjestelmän asetukset';
$_lang["editedon"] = 'Muokkaa päivämäärä';
$_lang["editing_file"] = 'Muokataan tiedostoa: ';
$_lang["editor_css_path_message"] = 'Syötä polku sisältöeditorissa käyttämääsi CSS-tiedostoon. Paras tapa syöttää polku on käyttää polkua palvelimen juuresta lähtien, esim: /assets/site/style.css. Jos et halua ladata tyylisivua editoriin, jätä kenttä tyhjäkäksi.';
$_lang["editor_css_path_title"] = 'Polku CSS-tiedostoon:';

$_lang["email"] = 'Sähköposti';
$_lang["email_sent"] = 'Sähköposti lähetetty';
$_lang["email_unique"] = 'Email is already in use!';
$_lang["emailsender_message"] = 'Määrittele sähköpostiosoite, jota käytetään käyttäjien käyttäjänimen ja salasanan lähettämisen yhteydessä.';
$_lang["emailsender_title"] = 'Sähköpostiosoite:';
$_lang["emailsubject_default"] = 'Kirjautumistietosi';
$_lang["emailsubject_message"] = 'Määrittele uusille käyttäjille lähetettävän liittymissähköpostin aihe.';
$_lang["emailsubject_title"] = 'Liittymissähköpostin aihe:';

$_lang["empty_folder"] = 'Kansio on tyhjä';
$_lang["empty_recycle_bin"] = 'Tyhjennä roskakori';
$_lang["empty_recycle_bin_empty"] = 'Poistettavia sivuja ei ole.';
$_lang["enable_resource"] = 'Ota käyttöön elementtitiedosto.';
$_lang["enable_sharedparams"] = 'Mahdollista parametrien jako';
$_lang["enable_sharedparams_msg"] = '<strong>HUOMAA:</strong> Globaalia yksilöllinen ID-tunnusta (GUID) käytetään moduulin tunnistautumiseen ja jaettuihin parametreihin. ';
$_lang["enabled"] = 'Käytössä';
$_lang["error"] = 'Virhe';
$_lang["error_sending_email"] = 'Virhe sähköpostin lähetyksessä';
$_lang["errorpage_message"] = 'Syötä virhesivuna käytettävän sivun ID. Virhesivu näytetään, jos pyydettyä sivua ei syystä tai toisesta löydy. <strong>HUOMAA:</strong> Varmista, että ID on olemassa ja, että kyseinen sivu on julkaistu!';
$_lang["errorpage_title"] = 'Virhesivu:';
$_lang["event_id"] = 'Tapahtuman ID';
$_lang["eventlog"] = 'Tapahtumaloki';
$_lang["eventlog_msg"] = 'Tapahtumaloki sisältää sisällönhallintajärjestelmän luomia merkintöjä sekä varoitus- ja virheilmoituksia.';
$_lang["eventlog_viewer"] = 'Tapahtumaloki';
$_lang["everybody"] = 'Kaikki';
$_lang["existing_category"] = 'Kategoria';
$_lang["expand_tree"] = 'Laajenna';
$_lang["failed_login_message"] = 'Kuinka monen epäonnistuneen kirjautumisyrityksen jälkeen käyttäjätunnus lukitaan.';
$_lang["failed_login_title"] = 'Epäonnistuneita kirjautumisia:';
$_lang["fe_editor_lang_message"] = 'Valitse esikatselutilassa käytettävän sisältöeditorin kieli.';
$_lang["fe_editor_lang_title"] = 'Esikatselutilan sisältöeditorin kieli:';

$_lang["filemanager_path_message"] = 'IIS ei useinkaan muokkaa tiedostonhallintajärjestelmän käyttämää document_root asetusta oikein. Tätä asetusta käytetään määrittämään, mitä tiedostoja käyttäjä voi katsella. Jos tiedostonhallintajärjestelmän käytössä on vaikeuksia, huolehdi siitä, että polku osoittaa EVO-asennuksen juureen.';
$_lang["filemanager_path_title"] = 'Ylläpidon tiedostoselaimen polku:';

$_lang["folder"] = 'Kansio';
$_lang["forgot_password_email_fine_print"] = '* Ylläoleva linkki vanhenee heti, kun olet vaihtanut salasanasi tai vuorokauden vaihtuessa.';
$_lang["forgot_password_email_instructions"] = 'Voit vaihtaa salasanasi oman käyttäjänimesi kohdalta.';
$_lang["forgot_password_email_intro"] = 'Vastaanotettiin pyyntö vaihtaa tilisi salasana.';
$_lang["forgot_password_email_link"] = 'Napsauta tähän jatkaaksesi salasanan vaihtoa.';
$_lang["forgot_your_password"] = 'Unohtuiko salasana?';
$_lang["friendly_alias_message"] = 'Jos käytät selkokielisiä osoitteita, alias on aina etusijalla. Selkokielisten osoitteiden etu- ja takaliitteitä käytetään myös aliaksessa. Esim. sivun ID on 1 ja alias on "esittely". Lisäksi takaliitteeksi on asetettu ".html" ja etuliite on jätetty tyhjäksi. Tällöin asetuksen ollessa "kyllä" luodaan aliaksen perusteella osoite "esittely.html". Jos asetus on "ei", luodaan sivun ID:n perusteella osoite "1.html".';
$_lang["friendly_alias_title"] = 'Käytä selkokielisiä aliaksia:';
$_lang["friendlyurls_message"] = 'Ihmisille selkeät ja hakukoneille ystävälliset osoitteet. Toimii ilman ylimääräistä säätämistä ainoastaan Apache-palvelimella. Vaatii .htaccess -tiedoston käyttöönoton, joka löytyy sivuston juuresta nimellä ht.access.';
$_lang["friendlyurls_title"] = 'Käytä selkokielisiä osoitteita:';
$_lang["friendlyurlsprefix_message"] = 'Määrittele selkokielisten osoitteiden etuliite. Esim. etuliite "sivu" muuttaa osoitteen /index.php?id=2 selkokieliseksi osoitteeksi /sivu2.';
$_lang["friendlyurlsprefix_title"] = 'Etuliite selkokielisille osoitteille:';
$_lang["friendlyurlsuffix_message"] = 'Määrittele tiedostopääte selkokielisille osoitteille. Esim. tiedostopääte ".html" lisää kaikkien selkokielisten osoitteiden perään html-päätteen.';
$_lang["friendlyurlsuffix_title"] = 'Tiedostopääte selkokielisille osoitteille:';
$_lang["functionnotimpl"] = 'Anteeksi!';
$_lang["functionnotimpl_message"] = 'Tätä funktiota ei ole vielä toteutettu.';
$_lang["further_info"] = 'Further information';
$_lang["global_tabs"] = 'Global Tabs';
$_lang["go"] = 'OK';
$_lang["group_access_permissions"] = 'Käyttäjäryhmän oikeudet';
$_lang['group_tvs'] = 'Group TV';
$_lang["guid"] = 'GUID';
$_lang["help"] = 'Ohjeet';
$_lang["help_msg"] = '<p>Ongelmatilanteissa tutustu <a href="http://forums.modx.com" target="_blank">MODX:n keskustelufoorumeihin</a>. Lisäksi kannattaa tutustua <a href="http://rtfm.modx.com/evolution/1.0" target="_blank">EVO:n ohjeisiin ja oppaisiin</a> sekä <a href="http://wiki.modx.com/index.php/Main_Page" target="_blank">EVO Wikiin</a>.</p><p>Suunnitteilla on myös kaupallisen EVO-tuen tarjoaminen - ota <a href="mailto:hello@modx.com?subject=MODX Commercial Support Inquiry">yhteyttä</a>, jos olet kiinnostunut.</p>';
$_lang["help_title"] = 'Ohjeet';
$_lang["hide_tree"] = 'Piilota sivukartta';
$_lang["home"] = 'Alkuun';

$_lang["icon"] = 'Kuvake';
$_lang["icon_description"] = 'CSS class value. e.g. fa&nbsp;fa-star';
$_lang["id"] = 'ID';
$_lang["illegal_parent_child"] = 'Pääryhmäluokitus:\n\nSivu on valitun sivun alasivu.';
$_lang["illegal_parent_self"] = 'Pääryhmäluokitus:\n\nValittu sivu ei voi olla itsensä alasivu.';
$_lang["images_management"] = 'Manage Images';
$_lang["import_files_found"] = '<strong>Löytyi %s sivua tuotavaksi...</strong><p/>';
$_lang["import_params"] = 'Tuo jaetut parametrit';
$_lang["import_params_msg"] = 'Tuotavat parametrit tai moduulin asetukset. <strong>HUOMAA:</strong> Moduulit ovat valittavissa vain, jos liitännäinen / PHP-palanen on osa moduulin riippuvuuslistaa ja moduulin parametrien jako on käytössä. ';
$_lang["import_parent_resource"] = 'Pääryhmän sivu:';
$_lang["update_tree"] = 'Rakenna puu uudelleen';
$_lang["update_tree_description"] = '<ul>
<li>Closure table database design pattern that makes working with the document tree more convenient and fast </li>
<li>If the data in the tree is updated not through models, then there is a possibility of an incorrect linking of documents in the database </li>
<li>This operation fixes the problem when site_content is not updated through the model (save, create) and the links (Closure table) are not updated </li>
<li>It is also possible to perform this operation in CLI mode via the \'php artisan closuretable: rebuild\' command </li>
</ul>';
$_lang["update_tree_danger"] = 'If you have more than 1000 resources, it is better to perform this operation in CLI mode using the \'php artisan closuretable: rebuild command\'';
$_lang["update_tree_time"] = 'Rebuild tree finished. Documents processed: <b>%s</b><br>Import took <b>%s</b> seconds to complete.';
$_lang["info"] = 'Info';
$_lang["information"] = 'Informaatio';
$_lang["inline"] = 'Normaali';
$_lang["insert"] = 'Selaa';
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
$_lang["keyword"] = 'Avainsana';
$_lang["keywords"] = 'Avainsanat';
$_lang["keywords_intro"] = 'Muokkaa avainsanoja (keyword). Lisää uusi avainsana syöttämällä se uuden avainsanan kenttään. Muokkaa avainsanaa kirjoittamalla korvaava avainsana. Poista avainsanoja valitsemalla poistettavat sanat.';
$_lang["language_message"] = 'Valitse ylläpidon oletuskieli.';
$_lang["language_title"] = 'Kieli:';
$_lang["last_update"] = 'Last update';
$_lang["launch_site"] = 'Avaa sivusto';
$_lang["license"] = 'License';
$_lang["link_attributes"] = 'Linkki';
$_lang["link_attributes_help"] = 'Linkin ominaisuudet, esim. target=&quot;_blank&quot; tai rel=&quot;external&quot;.';
$_lang["list_mode"] = 'Näytä kaikki tiedot / Näytä tiedot jaettuina sivuihin';
$_lang["loading_doc_tree"] = 'Lataa sivukarttaa...';
$_lang["loading_menu"] = 'Lataa valikkoa...';
$_lang["loading_page"] = 'Lataa sivua...';
$_lang["localtime"] = 'Paikallinen aika';

$_lang["lock_htmlsnippet"] = 'Lukitse muokkaamisen ajaksi.';
$_lang["lock_htmlsnippet_msg"] = 'Vain pääkäyttäjät (Administrator) voivat muokata tätä.';
$_lang["lock_module"] = 'Lukitse muokkaamisen ajaksi.';
$_lang["lock_module_msg"] = 'Vain pääkäyttäjät (Administrator) voivat muokata tätä.';
$_lang["lock_msg"] = 'Toinen käyttäjä muokkaa tätä sivua parhaillaan. Odota kunnes käyttäjä lopettaa muokkaamisen ja yritä sitten uudelleen.';
$_lang["lock_plugin"] = 'Lukitse muokkaamisen ajaksi.';
$_lang["lock_plugin_msg"] = 'Vain pääkäyttäjät (Administrator) voivat muokata tätä.';
$_lang["lock_settings_msg"] = '%s muokkaa näitä asetuksia parhaillaan. Odota kunnes käyttäjä lopettaa muokkaamisen ja yritä sitten uudelleen.';
$_lang["lock_snippet"] = 'Lukitse muokkaamisen ajaksi.';
$_lang["lock_snippet_msg"] = 'Vain pääkäyttäjät (Administrator) voivat muokata tätä.';
$_lang["lock_template"] = 'Lukitse muokkaamisen ajaksi.';
$_lang["lock_template_msg"] = 'Vain pääkäyttäjät (Administrator) voivat muokata tätä.';
$_lang["lock_tmplvars"] = 'Lukitse muokkaamisen ajaksi.';
$_lang["lock_tmplvars_msg"] = 'Vain pääkäyttäjät (Administrator) voivat muokata tätä.';
$_lang["locked"] = 'Lukittu';

$_lang["login_allowed_days"] = 'Sallitut päivät';
$_lang["login_allowed_days_message"] = 'Valitse päivät, jolloin käytäjällä on lupa kirjautua sisään.';
$_lang["login_allowed_ip"] = 'Sallitut IP-osoitteet';
$_lang["login_allowed_ip_message"] = 'Syötä IP-osoitteet, joista käyttäjällä on lupa kirjautua sisään. <strong>HUOMAA:</strong> Erottele useammat IP-osoitteet pilkuilla (,).';
$_lang["login_button"] = 'Kirjaudu sisään';
$_lang["login_cancelled_install_in_progress"] = 'Sivuston asennus / päivitys on edelleen käynnissä. Koita uudelleen parin minuutin kuluttua!';
$_lang["login_cancelled_site_was_updated"] = 'Sivustolle on suoritettu asennus / päivitys. Ole hyvä ja kirjaudu sisään uudelleen!';
$_lang["login_captcha_message"] = '<strong>Syötä kuvassa näkyvä varmistuskoodi.</strong> Jos et jostain syystä näe kuvaa kunnolla, napsauta kuvan päällä, niin saat uuden varmistuskoodin.';
$_lang["login_homepage"] = 'Aloitussivu';
$_lang["login_homepage_message"] = 'Anna sen sivun ID-tunnus, joka näytetään automaattisesti ensimmäisenä käyttäjän kirjauduttua sisään. <strong>HUOMAA:</strong> Tarkista, että ID on olemassa ja kyseisen käyttäjän käytettävissä.';
$_lang["login_message"] = 'Kirjaudu ylläpitoon. Isoilla ja pienillä kirjaimilla on merkitystä, joten kirjoita käyttäjänimi ja salasana huolella.';
$_lang["logo_slogan"] = 'EVO Sisällönhallintajärjestelmä - \nLuo ja tee enemmän vähemmällä';
$_lang["logout"] = 'Kirjaudu ulos';
$_lang["long_title"] = 'Pitkä otsikko';

$_lang["manager"] = 'Ylläpito';
$_lang["manager_lockout_message"] = 'Olet kirjautuneena ylläpitoon. Jos haluat kirjautua ulos, napsauta "Kirjaudu ulos" -painiketta.<p />';
$_lang["manager_permissions"] = 'Ylläpidon käyttöoikeudet';
$_lang["manager_theme"] = 'Ylläpidon ulkoasu:';
$_lang["manager_theme_message"] = 'Valitse ylläpidon ulkoasu.';
$_lang["manager_theme_mode"] = 'Color Scheme:';
$_lang["manager_theme_mode1"] = 'everything is light';
$_lang["manager_theme_mode2"] = 'the header is dark';
$_lang["manager_theme_mode3"] = 'header and sidebar are dark';
$_lang["manager_theme_mode4"] = 'everything is dark';
$_lang['manager_theme_mode_message'] = 'This setting is used as the "default" and can be overridden by the manager when using the theme color mode switch button in the Resource Tree: <i class="fa fa-lg fa-adjust"></i>';
$_lang['manager_theme_mode_title'] = 'Theme color mode switch';

$_lang["meta_keywords"] = 'Metatiedot ja avainsanat';
$_lang["metatag_intro"] = 'Muokkaa metatietoja (META-tag). Lisää metatietoja sivuihin napsauttamalla <u>Metatiedot ja avainsanat</u> -välilehteä sivun muokkaamisen yhteydessä. Valitse välilehdeltä sivuun liitettävät metatiedot ja avainsanat. Lisää uusi metatieto syöttämällä nimi ja arvo sekä valitsemalla metatiedon tyyppi. Muokkaa metatietoa napsauttamalla metatiedon nimeä. Poista metatietoja valitsemalla poistettavat tiedot.';
$_lang["metatag_notice"] = 'Ohjeita metatiedoista: <a href="http://www.html-reference.com/META.asp" target="_blank">HTML Reference Guide</a>.';
$_lang["metatags"] = 'Metatiedot';
$_lang["mgr_access_permissions"] = 'Ylläpidon käyttöoikeudet';
$_lang["mgr_login_start"] = 'Aloitussivu';
$_lang["mgr_login_start_message"] = 'Anna sen sivun ID-tunnus, joka näytetään automaattisesti ensimmäisenä käyttäjän kirjautuessa ylläpitoon. <strong>HUOMAA:</strong> Tarkista, että ID on olemassa ja kyseisen käyttäjän käytettävissä.';

$_lang["mgrlog_action"] = 'Toiminto';
$_lang["mgrlog_actionid"] = 'Toiminnon ID';
$_lang["mgrlog_anyall"] = 'Kaikki';
$_lang["mgrlog_datecheckfalse"] = 'checkdate() on epätosi.';
$_lang["mgrlog_datefr"] = 'Alkamispäivä';
$_lang["mgrlog_dateinvalid"] = 'Ajan muoto ei kelpaa.';
$_lang["mgrlog_dateto"] = 'Päättymispäivä';
$_lang["mgrlog_emptysrch"] = 'Haku ei tuottanut tuloksia.';
$_lang["mgrlog_field"] = 'Kenttä';
$_lang["mgrlog_itemid"] = 'Kohteen ID';
$_lang["mgrlog_itemname"] = 'Kohteen nimi';
$_lang["mgrlog_msg"] = 'Viesti';
$_lang["mgrlog_noquery"] = 'Ei hakutuloksia.';
$_lang["mgrlog_qresults"] = 'Hakutulokset';
$_lang["mgrlog_query"] = 'Toimintojen jäljitys';
$_lang["mgrlog_query_msg"] = 'Jäljitä tehtyjä toimintoja lokitiedostosta. HUOM! Jos haluat hakea toimintoja yhdeltä päivältä, on päättymispäiväksi annettava haettavaa päivää seuraava päivä.';
$_lang["mgrlog_results"] = 'Tulosten lukumäärä';
$_lang["mgrlog_searchlogs"] = 'Hae lokeista';
$_lang["mgrlog_sortinst"] = 'Järjestä hakutulokset uudelleen napsauttamalla sarakkeen otsikkoa. Tyhjennä kaikki lokitiedot välittömästi <a href="index.php?a=55">napsauttamalla tästä</a>.';
$_lang["mgrlog_time"] = 'Aika';
$_lang["mgrlog_user"] = 'Käyttäjä';
$_lang["mgrlog_username"] = 'Käyttäjänimi';
$_lang["mgrlog_value"] = 'Arvo';
$_lang["mgrlog_view"] = 'Toimintojen jäljitys lokitiedostoista';

$_lang["modx_news"] = 'EVO Uutiset';
$_lang["modx_news_tab"] = 'Uutiset';
$_lang["modx_news_title"] = 'EVO Uutiset';
$_lang["modx_security_notices"] = 'EVO Tietoturvatiedotteet';
$_lang["modx_version"] = 'EVO:n versio';

$_lang["name"] = 'Nimi';

$_lang["no"] = 'Ei';
$_lang["no_active_users_found"] = 'Ei aktiivisia käyttäjiä.';
$_lang["no_activity_message"] = 'Ei luotu tai muokattu yhtään sivua.';
$_lang["no_category"] = 'luokittelematon';
$_lang["no_docs_pending_publishing"] = 'Ei julkaisua odottavia sivuja.';
$_lang["no_docs_pending_pubunpub"] = 'Ei löytynyt tapahtumia';
$_lang["no_docs_pending_unpublishing"] = 'Ei piilottamista odottavia sivuja.';
$_lang["no_edits_creates"] = 'Ei luonteja tai muokkauksia.';
$_lang["no_groups_found"] = 'Ei ryhmiä.';
$_lang["no_keywords_found"] = 'Avainsanoja ei vielä ole.';
$_lang["no_records_found"] = 'Ei merkintöjä.';
$_lang["no_results"] = 'Ei tuloksia';
$_lang["nologentries_message"] = 'Näytettävien lokimerkintöjen lukumäärä toimintoja jäljitettäessä.';
$_lang["nologentries_title"] = 'Lokitietomerkintöjen lukumäärä:';
$_lang["none"] = 'Ei yhtään';
$_lang["noresults_message"] = 'Tuloksien lukumäärä listauksia ja hakutuloksia selatessa.';
$_lang["noresults_title"] = 'Tulosten lukumäärä:';
$_lang["not_deleted"] = 'ei ole poistettu.';
$_lang["not_set"] = 'Ei asetettu';

$_lang["offline"] = 'Poissa käytöstä';

$_lang["online"] = 'Käytössä';
$_lang["onlineusers_action"] = 'Toiminto';
$_lang["onlineusers_actionid"] = 'Toiminnon ID';
$_lang["onlineusers_ipaddress"] = 'Käyttäjän IP-osoite';
$_lang["onlineusers_lasthit"] = 'Kello';
$_lang["onlineusers_message"] = 'Lista käyttäjistä jotka ovat olleet aktiivisia viimeisen 20 minuutin aikana (kello on nyt ';
$_lang["onlineusers_title"] = 'Kirjautuneet käyttäjät';
$_lang["onlineusers_user"] = 'Käyttäjä';
$_lang["onlineusers_userid"] = 'Käyttäjän ID';

$_lang["optimize_table"] = 'Optimoi taulu';

$_lang["page_data_alias"] = 'Alias';
$_lang["page_data_cacheable"] = 'Välimuistiin?';
$_lang["page_data_cacheable_help"] = 'Tallennetaanko sivu välimuistiin?';
$_lang["page_data_cached"] = '<strong>Välimuistista haettu lähdekoodi:</strong>';
$_lang["page_data_changes"] = 'Muutokset';
$_lang["page_data_contentType"] = 'Sisältötyyppi';
$_lang["page_data_contentType_help"] = 'Määrittelee sivun sisältötyypin. Jos et ole varma, mikä sisältötyypi sivulla tulisi olla, jätä se arvoon text/html.';
$_lang["page_data_created"] = 'Luotu';
$_lang["page_data_edited"] = 'Muokattu';
$_lang["page_data_editor"] = 'Muokkaus sisältöeditorilla';
$_lang["page_data_folder"] = 'Sivu on kansio';
$_lang["page_data_general"] = 'Yleiset';
$_lang["page_data_markup"] = 'Rakenne';
$_lang["page_data_mgr_access"] = ' Ylläpito-käyttöoikeus';
$_lang["page_data_notcached"] = 'Sivua ei ole (vielä) haettu välimuistiin.';
$_lang["page_data_publishdate"] = 'Julkaisupäiväys';
$_lang["page_data_publishdate_help"] = 'Julkaisupäiväys määrittelee, koska sivu julkaistaan. Valitse julkaisupäiväys napsauttamalla kalenteri-kuvaketta. Poista julkaisupäiväys napsauttamalla kalenterikielto-kuvaketta. Jätä julkaisupäiväys tyhjäksi, jos haluat julkaista sivun heti.';
$_lang["page_data_published"] = 'Julkaistu';
$_lang["page_data_searchable"] = 'Haettavissa?';
$_lang["page_data_searchable_help"] = 'Onko sivu löydettävissä sivuston omalla hakukoneella?';
$_lang["page_data_source"] = 'Lähdekoodi';
$_lang["page_data_status"] = 'Tila';
$_lang["page_data_template"] = 'Sivupohja';
$_lang["page_data_template_help"] = 'Sivun käyttämä sivupohja.';
$_lang["page_data_title"] = 'Sivun tiedot';
$_lang["page_data_unpublishdate"] = 'Piiloituspäiväys';
$_lang["page_data_unpublishdate_help"] = 'Julkaisun piiloituspäiväys määrittelee, koska sivu piiloitetaan eli otetaan pois julkaisusta. Valitse piiloituspäiväys napsauttamalla kalenteri-kuvaketta. Poista piiloituspäiväys napsauttamalla kalenterikielto-kuvaketta. Jätä piiloituspäiväys tyhjäksi, jos haluat, että sivua ei piiloiteta automaattisesti.';
$_lang["page_data_unpublished"] = 'Julkaisematon / piiloitettu';
$_lang["page_data_web_access"] = ' Web-käyttöoikeus';

$_lang["pagetitle"] = 'Sivun otsikko';
$_lang["pagination_table_first"] = 'Ensimmäinen';
$_lang["pagination_table_gotopage"] = 'Siirry sivulle';
$_lang["pagination_table_last"] = 'Viimeinen';
$_lang["paging_first"] = 'ensimmäinen';
$_lang["paging_last"] = 'viimeinen';
$_lang["paging_next"] = 'seuraava';
$_lang["paging_prev"] = 'edellinen';
$_lang["paging_showing"] = 'Näytetään';
$_lang["paging_to"] = '-';
$_lang["paging_total"] = 'yhteensä';
$_lang["parameter"] = 'Parametri';
$_lang["parse_docblock"] = 'Parse DocBlock';
$_lang["parse_docblock_msg"] = 'Attention (!): <b>Resets</b> actual name, configuration, description and category to install-defaults by parsing the source code.';

$_lang["password"] = 'Salasana';
$_lang["password_change_request"] = 'Pyydä salasanan vaihtamista';
$_lang["password_confirmed"] = 'Passwords doesn\'t match';
$_lang["password_gen_gen"] = 'Luo salasana automaattisesti.';
$_lang["password_gen_length"] = 'Salasanan täytyy olla vähintään 6 merkkiä pitkä. Salasana ei saa sisältää ääkkösiä eikä erikoismerkkejä (+, -, ? jne.).';
$_lang["password_gen_method"] = 'Uusi salasana';
$_lang["password_gen_specify"] = 'Anna salasana itse:';
$_lang["password_method"] = 'Salasanan tiedonanto';
$_lang["password_method_email"] = 'Lähetä uusi salasana sähköpostilla.';
$_lang["password_method_screen"] = 'Näytä uusi salasana ruudulla.';
$_lang["password_msg"] = 'Uusi salasana käyttäjälle <strong>:username</strong> on <strong>:password</strong><br>';

$_lang["php_version_check"] = 'MODX on yhteensopiva PHP versio 7.4 tai paremman kanssa. Ole hyvä ja päivitä PHP asennuksesi!';

$_lang["preview"] = 'Esikatselu';
$_lang["preview_msg"] = 'Esikatselunäkymä viimeksi tallennetuista muutoksista. Napsauta <a href="javascript:;" onclick="saveRefreshPreview();">tästä tallentaaksesi ja päivittääksesi</a> tämän hetkiset muutokset';
$_lang["preview_resource"] = 'Esikatsele';

$_lang["private"] = 'Yksityinen';
$_lang["public"] = 'Julkinen';
$_lang["publish_date"] = 'Julkaisupäiväys';
$_lang["publish_events"] = 'Julkaistavien sivujen aikataulu';
$_lang["publish_resource"] = 'Julkaise';

$_lang["rb_base_dir_message"] = 'Syötä tiedostoselaimen kansion todellinen (physical path) osoite. Osoite luodaan yleensä automaattisesti. Poikkeuksena on esim. IIS. Jos EVO ei onnistu löytämään oikeaa osoitetta ilman apua ja tiedostoselain ilmoittaa virheestä, korjaa virhe syöttämällä images-kansion osoite. <strong>HUOMAA:</strong> Tiedostoselaimen kansion täytyy sisältää alikansiot: images, files, flash ja media, jotta tiedostoselain toimii oikein.';
$_lang["rb_base_dir_title"] = 'Tiedostoselaimen osoite:';
$_lang["rb_base_url_message"] = 'Syötä tiedostoselaimen kansion suhteellinen (virtual path) osoite. Osoite luodaan yleensä automaattisesti. Poikkeuksena on esim. IIS. Jos EVO ei onnistu löytämään oikeaa osoitetta ilman apua ja tiedostoselain ilmoittaa virheestä, korjaa virhe syöttämällä images-kansion osoite.';
$_lang["rb_base_url_title"] = 'Tiedostoselaimen osoite (URL):';
$_lang["rb_message"] = 'Tiedostoselain antaa käyttäjille mahdollisuuden selata ja siirtää palvelimelle tiedostoja kuten kuvia, flash- ja muita mediatiedostoja.';
$_lang["rb_title"] = 'Ota käyttöön tiedostoselain:';
$_lang["rb_webuser_message"] = 'Sallitaanko web-käyttäjille tiedostoselaimen käyttö? <b>VAROITUS:</b>Käytön salliminen mahdollistaa normaalisti vain ylläpidon käyttäjille tarkoitettujen tiedostojen hallinnan. Käytä vain, jos luotat varmasti web-käyttäjiin.';
$_lang["rb_webuser_title"] = 'Web-käyttäjät?';
$_lang["recent_docs"] = 'Viimeisimmät sivut';
$_lang["recommend_setting_change_title"] = 'Suositeltava asetusten muutos';
$_lang["recommend_setting_change_description"] = 'Sivustolla ei ole käytössä ylläpidon HTTP_REFERER tunnisteiden tarkistusta. On suositeltavaa ottaa tarkistus käyttöön CSFR-verkkohyökkäysten (Cross Site Request Forgery) estämiseksi.';
$_lang["references"] = 'References';
$_lang["refresh_cache"] = 'Välimuisti: Välimuistikansiosta löytyi <strong>%s</strong> tiedostoa ja <strong>%d</strong> välimuistitiedostoa.<p>Uudet välimuistisivut luodaan sivujen lataamisen yhteydessä.';
$_lang["refresh_published"] = '<strong>%s</strong> sivua julkaistiin.';
$_lang["refresh_site"] = 'Tyhjennä välimuisti';
$_lang["refresh_title"] = 'Välimuisti tyhjennetty';
$_lang["refresh_tree"] = 'Päivitä';
$_lang["refresh_unpublished"] = '<strong>%s</strong> sivua piilotettiin.';
$_lang["release_date"] = 'Release date';
$_lang["remember_last_tab"] = 'Muista välilehdet';
$_lang["remember_last_tab_message"] = 'Viimeksi käytetty välilehti latautuu ensin oletuksena ensimmäisenä olevan välilehden sijaan.';
$_lang["remember_username"] = 'Muista minut';
$_lang["remove"] = 'Poista';
$_lang["remove_date"] = 'Poista päiväys';
$_lang["remove_locks"] = 'Poista lukot';
$_lang["rename"] = 'Nimeä uudelleen';
$_lang["reports"] = 'Raportit';
$_lang["report_issues"] = 'Report issues';
$_lang["required_field"] = 'Field :field is required';
$_lang["require_tagname"] = 'Metatiedon nimi on välttämätön';
$_lang["require_tagvalue"] = 'Metatiedon arvo on välttämätön';
$_lang["reserved_name_warning"] = 'You have used a reserved name.';
$_lang["reset"] = 'Tyhjennä';
$_lang["reset_failedlogins"] = 'tyhjennä';
$_lang["reset_sort_order"] = 'Reset sort order';

$_lang["manager_access_permissions"] = 'Manager access permission';
$_lang["manage_groups"] = 'Manage document and user groups';
$_lang["manage_document_permissions"] = 'Manage document permissions';
$_lang["manage_module_permissions"] = 'Manage module permissions';
$_lang["manage_tv_permissions"] = 'Manage TV permissions';

$_lang["rss_url_news_default"] = 'https://github.com/evocms-community/evolution/releases.atom';
$_lang["rss_url_news_message"] = 'Anna EVO-uutisten osoite (RSS-syöte).';
$_lang["rss_url_news_title"] = 'RSS / Uutiset';
$_lang["rss_url_security_default"] = 'https://github.com/extras-evolution/security-fix/releases.atom';
$_lang["rss_url_security_message"] = 'Anna EVO-tietoturvatiedotteiden osoite (RSS-syöte).';
$_lang["rss_url_security_title"] = 'RSS / Tietoturvatiedotteet';

$_lang["run_module"] = 'Suorita moduuli';
$_lang["save"] = 'Tallenna';
$_lang["save_all_changes"] = 'Tallenna kaikki muutokset';
$_lang["save_tag"] = 'Tallenna metatieto';
$_lang["saving"] = 'Tallentaa, odota hetki...';

$_lang["search"] = 'Haku';
$_lang["search_criteria"] = 'Hakuehto';
$_lang["search_criteria_content"] = 'Sisältö';
$_lang["search_criteria_content_msg"] = 'Hae sivut, joiden sisällöstä löytyy syötetty teksti.';
$_lang["search_criteria_id"] = 'ID';
$_lang["search_criteria_id_msg"] = 'Hae sivu ID-tunnuksella.';
$_lang["search_criteria_top"] = 'Search in main fields';
$_lang["search_criteria_top_msg"] = 'Pagetitle, Longtitle, Alias, ID';
$_lang["search_criteria_template_id"] = 'Sivupohjan ID';
$_lang["search_criteria_template_id_msg"] = 'Hae sivut, jotka käyttävät annettua sivupohjaa.';
$_lang["search_criteria_url_msg"] = 'Find Resource by exact URL.';
$_lang["search_criteria_longtitle"] = 'Pitkä otsikko';
$_lang["search_criteria_longtitle_msg"] = 'Hae sivut, joiden pitkästä otsikosta löytyy syötetty teksti.';
$_lang["search_criteria_title"] = 'Otsikko';
$_lang["search_criteria_title_msg"] = 'Hae sivut, joiden otsikosta löytyy syötetty teksti.';
$_lang["search_empty"] = 'Hakusi ei tuottanut tulosta. Laajenna hakuehtoja ja yritä uudelleen.';
$_lang["search_item_deleted"] = 'Tämä kohde on poistettu';
$_lang["search_results"] = 'Haun tulokset';
$_lang["search_results_returned_desc"] = 'Kuvaus';
$_lang["search_results_returned_id"] = 'ID';
$_lang["search_results_returned_msg"] = 'Your search criteria returned <b>%s</b> Resources. If a lot of results are being returned, try to enter a more specific search.';
$_lang["search_results_returned_title"] = 'Otsikko';
$_lang["search_view_docdata"] = 'Näytä tämä kohde';

$_lang["security"] = 'Käyttäjät';
$_lang["security_notices_tab"] = 'Tietoturvatiedotteet';
$_lang["security_notices_title"] = 'EVO Tietoturvatiedotteet';

$_lang["select_date"] = 'Valitse päiväys';
$_lang["send"] = 'Lähetä';
$_lang["server_protocol_http"] = 'http';
$_lang["server_protocol_https"] = 'https';
$_lang["server_protocol_message"] = 'Määrittele käytetäänkö salattua https-yhteyttä.';
$_lang["server_protocol_title"] = 'Palvelimen tyyppi:';
$_lang["serveroffset"] = 'Palvelimen aikaero';
$_lang["serveroffset_message"] = 'Valitse sivuston käyttäjien ja palvelimen välinen aikaero tunneissa. Nykyinen aika palvelimella on  <strong>[%s]</strong> ja nykyinen palvelimen aika tämän hetkistä aikaeroa käyttäen on <strong>[%s]</strong>.';
$_lang["serveroffset_title"] = 'Palvelimen aikaero:';
$_lang["servertime"] = 'Palvelimen aika';
$_lang["set_automatic"] = 'Set automatic';
$_lang["set_default"] = 'Set default';
$_lang["set_default_all"] = 'Set defaults';

$_lang["settings_after_install"] = 'Koska tämä on uusi asennus, tulee tarkistaa nämä asetukset ja muuttaa niitä tarpeesi mukaan. Kun olet tarkistanut asetukset, paina "Tallenna" päivittääksesi muutokset tietokantaan.';
$_lang["settings_config"] = 'Asetukset';
$_lang["settings_dependencies"] = 'Riippuvuudet';
$_lang["settings_events"] = 'Järjestelmätapahtumat';
$_lang["settings_furls"] = 'Selkokieliset osoitteet';
$_lang["settings_general"] = 'Yleiset';
$_lang["settings_group_tv_message"] = 'Choose if Template Variables should be grouped in sections or tabs (named by TV category) when editing a Resource';
$_lang["settings_group_tv_options"] = 'No,Sections in General tab,Tabs in General tab,Sections in new tab,Tabs in new tab,New tabs';
$_lang["settings_misc"] = 'Sekalaiset asetukset';
$_lang["settings_security"] = 'Security';
$_lang["settings_KC"] = 'File Browser';
$_lang["settings_page_settings"] = 'Julkaisuasetukset';
$_lang["settings_photo"] = 'Kuva';
$_lang["settings_properties"] = 'Asetukset';
$_lang["settings_site"] = 'Sivuston asetukset';
$_lang["settings_strip_image_paths_message"] = 'Mahdollistaa tiedostojen osoitteiden (kuvat, flash ja muut tiedostot) uudelleenkirjoittamisen. Asetus "Ei" jättää osoitteen kiinteäksi. Osoitteiden uudellenkirjoittaminen on erittäin kätevää, jos sivusto on tarkoitus siirtää palvelimelta toiselle (esim. testisivustolta tuotantosivustolle). Jos et tiedä mitä tämä asetus oikeastaan tekee, on parasta jättää valinta kohtaan "Kyllä".';
$_lang["settings_strip_image_paths_title"] = 'Uudelleenkirjoita tiedostojen polut?';
$_lang["settings_templvars"] = 'Sivun sisältö (sivupohjan muokattavat kohdat)';
$_lang["settings_title"] = 'Järjestelmän asetukset';
$_lang["settings_ui"] = 'Käyttöliittymän ja editorin asetukset';
$_lang["settings_users"] = 'Käyttäjäasetukset';
$_lang["settings_email_templates"] = 'Email & Templates';

$_lang["show_fullscreen_btn_message"] = 'Show Menu toggle Fullscreen button';
$_lang["show_newresource_btn_message"] = 'Show Menu New Resource button';
$_lang["settings_show_picker_message"] = 'Customize manager theme and save to localstorage';
$_lang["show_fullscreen_btn"] = 'Toggle Fullscreen button';
$_lang["show_newresource_btn"] = 'New Resource button';

$_lang["show_meta"] = 'Näytä META-avainsanat välilehti';
$_lang["show_meta_message"] = 'Näytä META-avainsanat välilehti sivujen muokkaamisen yhteydessä.';
$_lang["show_tree"] = 'Näytä sivukartta';
$_lang["show_picker"] = 'Show Color Switcher';
$_lang["showing"] = 'Näytetään';
$_lang["signupemail_message"] = 'Määrittele uusille käyttäjille lähetettävän liittymissähköpostin sisältö, esim. uuden käyttäjän käyttäjänimi ja salasana. <br /><strong>HUOMAA:</strong> Sisällönhallintajärjestelmä korvaa seuraavat kohdat, kun viesti on lähetetty: <br /><br />[+sname+] - Sivuston nimi, <br />[+saddr+] - Sivuston sähköpostiosoite, <br />[+surl+] - Sivuston osoite, <br />[+uid+] - Käyttäjän kirjautumisnimi tai id, <br />[+pwd+] - Käyttäjän salasana, <br />[+ufn+] - Käyttäjän koko nimi. <br /><br /><strong>Jätä ainakin [+uid+] ja [+pwd+] sähköpostiviestiin, koska muuten käyttäjä ei saa tietoonsa omaa käyttäjänimeään ja salasanaa!</strong>';
$_lang["signupemail_title"] = 'Liittymissähköposti:';
$_lang["site"] = 'Sivusto';
$_lang["site_schedule"] = 'Sivuston aikataulu';
$_lang["sitename_message"] = 'Anna sivustolle nimi. Nimeä käytetään mm. kirjautumisen yhteydessä';
$_lang["sitename_title"] = 'Sivuston nimi:';
$_lang["sitestart_message"] = 'Syötä aloitussivuna käytettävän sivun ID. <strong>HUOMAA:</strong> Varmista, että ID on olemassa ja, että kyseinen sivu on julkaistu!';
$_lang["sitestart_title"] = 'Aloitussivu:';
$_lang["sitestatus_message"] = 'Jos sivusto on käytössä, kaikki voivat selata sivustoa normaalisti. Jos sivusto on poissa käytöstä (esim. huoltokatko tms.), tavalliset käyttäjät näkevät ainoastaan "sivusto poissa käytössä" -viestin. Ylläpitoon kirjautuneet käyttäjät voivat edelleen selata sivustoa normaalisti.';
$_lang["sitestatus_title"] = 'Sivuston tila:';
$_lang["siteunavailable_message"] = 'Viesti näytetään, kun sivusto on poissa käytöstä. <strong>HUOMAA:</strong> Viesti näytetään vain jos "Sivusto poissa käytöstä" -sivua ei ole asetettu.';
$_lang["siteunavailable_message_default"] = 'Sivusto on tällähetkellä poissa käytöstä.';
$_lang["siteunavailable_page_message"] = 'Syötä sivusto poissa käytöstä -sivuna käytettävän sivun ID. Sivu näytetään, jos sivuston tila on poissa käytöstä. <strong>HUOMAA:</strong> Varmista, että ID on olemassa ja, että kyseinen sivu on julkaistu!';
$_lang["siteunavailable_page_title"] = 'Sivusto poissa käytöstä -sivu:';
$_lang["siteunavailable_title"] = 'Sivusto poissa käytöstä -viesti:';
$_lang["controller_namespace"] = 'Controller Namespace';
$_lang["controller_namespace_message"] = 'Specify the full Namespace from which it is worth taking controllers, for example: <b>EvolutionCMS\\Main\\Controllers\\</b>';
$_lang["update_repository"] = 'GitHub repository path';
$_lang["update_repository_message"] = 'Enter GitHub repository path for example: <b>evocms-community/evolution</b>';

$_lang["sort_alphabetically"] = 'Sort alphabetically';
$_lang["sort_asc"] = 'Nouseva';
$_lang["sort_desc"] = 'Laskeva';
$_lang["sort_menuindex"] = 'Sort menu index';
$_lang["sort_tree"] = 'Järjestä';
$_lang['sort_updating'] = 'Updating ...';
$_lang['sort_updated'] = 'Updated!';
$_lang['sort_nochildren'] = 'Parent does not have any children';
$_lang["sort_elements_msg"] = 'Drag to reorder the listed elements.';

$_lang["source"] = 'Lähde';
$_lang["stay"] = 'Jatka muokkausta';
$_lang["stay_new"] = 'Lisää toinen';
$_lang["submit"] = 'OK';
$_lang["sys_alert"] = 'Järjestelmähälytys';
$_lang["sysinfo_activity_message"] = 'Lista viimeksi muokatuista sivuista.';
$_lang["sysinfo_userid"] = 'Käyttäjä';
$_lang["system"] = 'System';
$_lang["system_email_signup"] = 'Hello [+uid+]

Here are your login details for [+sname+] Content Manager:

Username: [+uid+]
Password: [+pwd+]

Once you log into the Content Manager ([+surl+]), you can change your password.

Regards,
Site Administrator';
$_lang["system_email_webreminder"] = 'Hei [+uid+]

Aktivoidaksesi uuden salasanasi, napsauta linkkiä:

[+surl+]

Jos toiminto onnistuu, voit käyttää seuraavaa salasanaa kirjautuaksesi sisään:

Salasana:[+pwd+]
Jos et tilannut tätä sähköpostiviestiä, älä HUOMAAi tätä.

Terveisin,
Sivuston Ylläpitäjä';
$_lang["system_email_websignup"] = 'Hei [+uid+]

Tässä ovat kirjautumistiedot henkilölle [+sname+]:

Käyttäjänimi: [+uid+]
Salasana: [+pwd+]

Kun olet kirjautunut Sisällönhallintajärjestelmään, voit muuttaa salasanasi.

Terveisin,
Sivuston Ylläpitäjä';
$_lang["table_hoverinfo"] = 'Katso taulun tarkempi selitysteksti viemällä hiiren osoitin taulun nimen päälle. Kaikissa tauluissa ei ole selitystekstiä.';
$_lang["table_prefix"] = 'Taulun etuliite';
$_lang["tag"] = 'Metatiedon tyyppi';

$_lang["to"] = '-';
$_lang["toggle_fullscreen"] = 'Toggle Fullscreen';
$_lang["tools"] = 'Työkalut';
$_lang["top_howmany_message"] = 'Aseta "Top..." -listojen pituus.';
$_lang["top_howmany_title"] = 'Top-listat:';
$_lang["total"] = 'yhteensä';
$_lang["track_visitors_message"] = 'EVO ei sisällä oletuksena kävijäseurantaa, joten valinnalla ei ole vaikutusta ellei erillistä kävijäseurantaa ole asennettu.';
$_lang["track_visitors_title"] = 'Kävijäseuranta:';
$_lang["tree_page_click"] = 'Sivun napsautus';
$_lang["tree_page_click_message"] = 'Oletustoiminto napsautettaessa sivua sivukartassa.';
$_lang["use_breadcrumbs"] = 'Show navigation';
$_lang["use_breadcrumbs_message"] = 'Show the navigation when creating or editing Resource in the Manager';
$_lang["tree_show_protected"] = 'Näytä suojatut sivut:';
$_lang["tree_show_protected_message"] = 'Näytetäänkö suojatut sivut (ja kaikki alisivut) sivukartassa.';
$_lang["truncate_table"] = 'Tyhjää taulukko napsauttamalla';
$_lang["type"] = 'Tyyppi';
$_lang["udperms_allowroot_message"] = 'Sallitaanko käyttäjille mahdollisuus luoda uusia sivuja sivuston juureen? ';
$_lang["udperms_allowroot_title"] = 'Salli juuri:';
$_lang["udperms_message"] = 'Käyttöoikeudet määrittävät mm. mitä sivuja käyttäjillä on mahdollisuus muokata. Käyttöoikeudet määritellään käyttäjä- ja sivuryhmien avulla. Käyttäjäryhmille annetaan tarvittavat oikeudet sivuryhmiin. Pääkäytttäjillä (Administrator) on käyttöoikeuksista riippumatta aina täydet oikeudet kaikkiin sivuihin.';
$_lang["udperms_title"] = 'Käytä käyttöoikeuksia:';
$_lang["unable_set_link"] = 'Linkin asettaminen ei onnistunut!';
$_lang["unable_set_parent"] = 'Uuden pääryhmän asettaminen epäonnistui!';
$_lang["unauthorizedpage_message"] = 'Syötä pääsy kielletty -sivuna käytettävän sivun ID. Sivu näytetään, jos käyttäjä yrittää päästä käyttöoikeuksiltaan rajoitettuun sivuun, johon kyseisellä käyttäjälle ei ole oikeuksia. <strong>HUOMAA:</strong> Varmista, että ID on olemassa ja, että kyseinen sivu on julkaistu!';
$_lang["unauthorizedpage_title"] = 'Pääsy kielletty -sivu:';
$_lang["unblock_message"] = 'Tämä käyttäjä ei ole estetty käyttäjätietojen tallentamisen jälkeen.';
$_lang["undelete_resource"] = 'Palauta';
$_lang["unpublish_date"] = 'Piilotuspäiväys';
$_lang["unpublish_events"] = 'Piilotettavien sivujen aikataulu';
$_lang["unpublish_resource"] = 'Piilota';
$_lang["untitled_resource"] = 'Nimetön sivu';
$_lang["untitled_weblink"] = 'Nimetön hyperlinkki';
$_lang["update_params"] = 'Päivitä parametrit';
$_lang["update_settings_from_language"] = 'Korvaa nykyinen:';

$_lang["upload_maxsize_message"] = 'Enimmäiskoko tiedostoselaimen kautta siirrettäville tiedostoille. Tiedostokoko tulee ilmoittaa tavuina. <strong>HUOMAA:</strong> Suurien tiedostojen siirrossa voi kestää erittäin kauan!';
$_lang["upload_maxsize_title"] = 'Siirrettävän tiedoston enimmäiskoko';
$_lang["uploadable_files_message"] = 'Lista tiedostoista joita voidaan siirtää palvelimelle tiedostoselaimella. Erottele tiedostomuotojen päätteet pilkuilla.';
$_lang["uploadable_files_title"] = 'Siirrettävät tiedostot:';
$_lang["uploadable_flash_message"] = 'Luettele tiedostomuodot, joita käyttäjä voi ladata kansioon "assets/flash/". Erottele tunnisteet pilkuilla.';
$_lang["uploadable_flash_title"] = 'Ladattavat Flash-tiedostot:';
$_lang["uploadable_images_message"] = 'Luettele tiedostomuodot, joita käyttäjä voi ladata kansioon "assets/images/". Erottele tunnisteet pilkuilla.';
$_lang["uploadable_images_title"] = 'Ladattavat kuvatiedostot:';
$_lang["uploadable_media_message"] = 'Luettele tiedostomuodot, joita käyttäjä voi ladata kansioon "assets/media/". Erottele tunnisteet pilkuilla.';
$_lang["uploadable_media_title"] = 'Ladattavat mediatiedostot:';
$_lang["use_alias_path_message"] = 'Näyttää koko polun sivuun jos sivulla on alias. Esim. sivun alias on "alaryhma" ja se sijaitsee kansiossa, jonka alias on "ylaryhma". Tällöin aliaspoluksi luodaan "/ylaryhma/alaryhma.html".<br /><strong>HUOMAA:</strong> Jos selkokieliset aliaspolut ovat käytössä, kohteisiin (kuten kuvat, css, javaskriptit jne.) täytyy viitata käyttämällä todellista osoitetta:  esim. "/assets/images" ei "assets/images". Näin estetään selainta (tai palvelinta) lisäämästä suhteellista polkua aliaspolkuun.';
$_lang["use_alias_path_title"] = 'Käytä selkokielistä aliaspolkua:';
$_lang["use_editor_message"] = 'Käytetäänkö teksinkäsittelyohjelmaa muistuttavaa sisältöeditoria (rich text editor)? Jos kirjoitat mieluummin suoraan HTML:ää, poista editori käytöstä. Valinta kohdistuu kaikkiin sivuihin ja käyttäjiin!';
$_lang["use_editor_title"] = 'Käytä sisältöeditoria:';
$_lang["use_global_tabs"] = 'Use global Tabs';

$_lang["valid_hostnames_message"] = 'Auta estämään site_url järjestelmäasetusta hyväksikäyttäviä XSS haavoittuvuuksia antamalla pilkuilla eroteltu lista hyväksytyistä palvelimen nimistä (hostname) tälle asennukselle. Tämä on tärkeää tietyn tyyppisissä jaetuissa palvelinympäristöissä tai palvelimilla joita voidaan käyttää myös suoraan IP-osoitteen avulla. Jos HTTP_HOST arvo ei täsmää mihinkään hyväksyttyyn nimeen, käytetään listan ensimmäistä nimeä.';
$_lang["valid_hostnames_title"] = 'Hyväksytyt palvelimen nimet (hostname)';
$_lang["validate_referer_message"] = 'Tarkasta HTTP_REFERER tunnisteet vähentääksesi mahdollisuutta, että ylläpidon käyttäjiä huijataan suorittamaan tietämättään ei-toivottuja toimintoja (Cross Site Request Forgery Attack). Asetusta ei mahdollisesti voida käyttää, jos palvelin ei lähetä HTTP_REFERER tunnistetta.';
$_lang["validate_referer_title"] = 'Tarkasta HTTP_REFERER tunnisteet?';
$_lang["value"] = 'Arvo';
$_lang["version"] = 'Version';
$_lang["view"] = 'Näytä';
$_lang["view_child_resources_in_container"] = 'Näytä alasivut';
$_lang["view_log"] = 'Näytä loki';
$_lang["view_logging"] = 'Toimintojen jäljitys';
$_lang["view_sysinfo"] = 'Järjestelmän tiedot';
$_lang["warning"] = 'Varoitus!';
$_lang["warning_not_saved"] = 'Muutoksia ei ole vielä tallennettu. Voit pysyä nykyisellä sivulla ja tallentaa muutokset (\'Peruuta\'), tai voit lähteä tältä sivulta, menettäen kaikki tekemäsi muutokset (\'OK\')';
$_lang["warning_visibility"] = 'Ylläpidon asetusvaroitusten näkyvyys';
$_lang["warning_visibility_message"] = 'Muuta ylläpidon asetusvaroitusten näkyvyyttä ylläpidon Tervetuloa -sivulla.';
$_lang["web_access_permissions"] = 'Web-käyttöoikeudet';
$_lang["web_access_permissions_user_groups"] = 'Web-käyttäjäryhmät';
$_lang["web_permissions"] = 'Web-käyttöoikeudet';
$_lang["web_user_management_msg"] = 'Muokkaa Web-käyttäjiä. Web-käyttäjillä ei ole oikeuksia kirjautua sisällönhallintajärjestelmän ylläpitoon. Web-käyttäjät voivat kuitenkin kirjautua sivuston suojatuille sivuille, esim. asiakassivut, extranet jne.';
$_lang["web_user_management_title"] = 'Web-käyttäjät';
$_lang["web_user_management_select_role"] = 'All roles';
$_lang["web_user_title"] = 'Muokkaa web-käyttäjää';
$_lang["web_users"] = 'Web-käyttäjät';
$_lang["weblink"] = 'Hyperlinkki';
$_lang["webpwdreminder_message"] = 'Määrittele muistutuksena (esim. unohtunut salasana) käyttäjille lähetettävän liittymissähköpostin sisältö, esim. käyttäjän käyttäjänimi ja salasana. <br /><strong>HUOMAA:</strong> Sisällönhallintajärjestelmä korvaa seuraavat kohdat, kun viesti on lähetetty: <br /><br />[+sname+] - Sivuston nimi, <br />[+saddr+] - Sivuston sähköpostiosoite, <br />[+surl+] - Sivuston osoite, <br />[+uid+] - Käyttäjän kirjautumisnimi tai id, <br />[+pwd+] - Käyttäjän salasana, <br />[+ufn+] - Käyttäjän koko nimi. <br /><br /><strong>Jätä ainakin [+uid+] ja [+pwd+] sähköpostiviestiin, koska muuten käyttäjä ei saa tietoonsa omaa käyttäjänimeään ja salasanaa!</strong>';
$_lang["webpwdreminder_title"] = 'Muistutussähköposti:';
$_lang["websignupemail_message"] = 'Määrittele uusille web-käyttäjille lähetettävän liittymissähköpostin sisältö, esim. uuden käyttäjän käyttäjänimi ja salasana. <br /><strong>HUOMAA:</strong> Sisällönhallintajärjestelmä korvaa seuraavat kohdat, kun viesti on lähetetty: <br /><br />[+sname+] - Sivuston nimi, <br />[+saddr+] - Sivuston sähköpostiosoite, <br />[+surl+] - Sivuston osoite, <br />[+uid+] - Käyttäjän kirjautumisnimi tai id, <br />[+pwd+] - Käyttäjän salasana, <br />[+ufn+] - Käyttäjän koko nimi. <br /><br /><strong>Jätä ainakin [+uid+] ja [+pwd+] sähköpostiviestiin, koska muuten käyttäjä ei saa tietoonsa omaa käyttäjänimeään ja salasanaa!</strong>';
$_lang["websignupemail_title"] = 'Web-liittymissähköposti:';
$_lang["allow_multiple_emails_title"] = 'Duplicate Web User email address';
$_lang["allow_multiple_emails_message"] = 'Allows Web Users to share the same email address for situations when a member may not have their own email address or there is just one family email address.<br/>Note: Any password reminder and registration logic will need to account for this option if set to yes.';
$_lang["welcome_title"] = 'Tervetuloa!';
$_lang["which_editor_message"] = 'Valitse käytettävä sisältöeditori (rich text editor).';
$_lang["which_editor_title"] = 'Käytettävä sisältöeditori:';
$_lang["working"] = 'Odota hetki...';
$_lang["wrap_lines"] = 'Automaattinen rivitys';
$_lang["xhtml_urls_message"] = 'Korvaa EVO:n luomat &amp; -merkkijonot osoitteissa validilla &amp;<!-- -->amp; html-entiteetillä';
$_lang["xhtml_urls_title"] = 'XHTML-osoitteet';
$_lang["yes"] = 'Kyllä';
$_lang["you_got_mail"] = 'Sinulle on viesti / viestejä';

$_lang["yourinfo_message"] = 'Olet kirjautuneena sisään seuraavilla tiedoilla:';
$_lang["yourinfo_previous_login"] = 'Viimeisin sisäänkirjautuminen:';
$_lang["yourinfo_role"] = 'Rooli:';
$_lang["yourinfo_title"] = 'Info';
$_lang["yourinfo_total_logins"] = 'Sisäänkirjautumisia yhteensä:';
$_lang["yourinfo_username"] = 'Käyttäjänimi:';

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
$_lang["enable_filter_phx_warning"] = 'Kun PHX laajennusta asennettuna, sisäänrakennettu suodattimet ovat oletuksena poissa käytöstä';

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
$_lang["bkmgr_restore_submit"] = 'Palauta näyttölaite';
$_lang["bkmgr_restore_confirm"] = 'Oletko varma, että haluat palauttaa varmuuskopion\n[+filename+] ?';
$_lang["bkmgr_snapshot_nothing"] = 'No snapshots available';

$_lang["files.dynamic.php1"] = 'New File';
$_lang["files.dynamic.php2"] = 'This directory cannot be displayed.';
$_lang["files.dynamic.php3"] = 'There is a problem in a file name.';
$_lang["files.dynamic.php4"] = 'The text file was created.';
$_lang["files.dynamic.php5"] = 'File could not be duplicated.';
$_lang["files.dynamic.php6"] = 'File or directory could not be renamed.';
$_lang["files_dynamic_new_folder_name"] = 'Syötä uuden hakemiston nimi:';
$_lang["files_dynamic_new_file_name"] = 'Syötä uusi tiedostonimi:';
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

$_lang["resource_opt_alvisibled"] = 'Käytä nykyistä aliasta aliaspolussa';
$_lang["resource_opt_alvisibled_help"] = 'Sivun alias tulee osaksi osoitteen selkokielistä aliaspolkua';
$_lang['resource_opt_is_published'] = 'Julkaistu';

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

$_lang["mutate_settings.dynamic.php6"] = 'Lähetä sähköpostia kun EVO kohtaa virheen';
$_lang["mutate_settings.dynamic.php7"] = 'älä huomauta';
$_lang["mutate_settings.dynamic.php8"] = 'EVO virheen sattuessa, tieto virheen alkuperä lähetetään sähköpostilla vastaanottajalle [(emailsender)] ([+emailsender+]). Virheen yksityiskohdat voidaan nähdä EVO järjestelmän tapahtumalokista.';

$_lang["error_no_privileges"] = "Sinulla ei ole tarvittavia käyttöoikeuksia tämän toiminnon suorittamiseksi!";
$_lang["error_no_optimise_tablename"] = "Pyynnöstä puuttui optimoitavaksi valittu taulukko!";
$_lang["error_no_truncate_tablename"] = "Pyynnöstä puuttui tyhjennettäväksi valittu taulukko!";
$_lang["error_double_action"] = "Toiminto annettu kahteen kertaan (GET & POST)!";
$_lang["error_no_id"] = "Pyynnöstä puuttuu ID numero!";
$_lang["error_id_nan"] = "Pyyntöön sisältyvä ID ei ole numeerinen!";
$_lang["error_parent_deleted"] = "Failed because resource parent is deleted!";
$_lang["error_no_parent"] = "Ylemmän tason sivunimeä ei löytynyt!";
$_lang["error_many_results"] = "Tietokanta palautti liikaa tuloksia!";
$_lang["error_no_results"] = "Tietokanta palautti liian vähän tai ei ollenkaan tuloksia!";
$_lang["error_no_user_selected"] = "Yhtään käyttäjää ei valittu tämän viestin vastaanottajaksi!";
$_lang["error_no_group_selected"] = "Yhtään ryhmää ei valittu tämän viestin vastaanottajaksi!";
$_lang["error_movedocument1"] = "Sivua ei voi asettaa itsensä alle!";
$_lang["error_movedocument2"] = "Pyynnöstä puuttui sivun ID numero!";
$_lang["error_movedocument3"] = "Pyynnöstä puuttui uuden ylätason/pääryhmän valinta!";
$_lang["error_internet_connection"] = "Server isn't available. Check your internet connection!";

$_lang["login_processor_unknown_user"] = "Virheellinen käyttäjätunnus tai salasana!";
$_lang["login_processor_wrong_password"] = "Virheellinen käyttäjätunnus tai salasana!";
$_lang["login_processor_many_failed_logins"] = "Kirjautumisesi on estetty liian monen epäonnistuneen kirjautumisyrityksen johdosta!";
$_lang["login_processor_verified"] = "User verification required!";
$_lang["login_processor_blocked1"] = "Et voi kirjautua sisään, koska kirjautumisesi on estetty!";
$_lang["login_processor_blocked2"] = "Et voi kirjautua sisään, koska kirjautumisesi on estetty! Ole hyvä ja yritä myöhemmin uudelleen.";
$_lang["login_processor_blocked3"] = "You are blocked automatic after a specified date and you cannot log in anymore!";
$_lang["login_processor_bad_code"] = "Syöttämäsi varmistuskoodi oli virheellinen! Ole hyvä ja yritä uudelleen!";
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
