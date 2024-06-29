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

$_lang["about_msg"] = 'Evolution CMS est un <a href="https://evo-cms.com/" target="_blank">Framework d’application PHP et un système de gestion de contenu</a> sous license <a href="https://www.gnu.org/licenses/gpl-3.0.html">GNU GPL</a>.';
$_lang["about_title"] = 'À propos de EVO';

// days
$_lang["monday"] = 'Lundi';
$_lang["tuesday"] = 'Mardi';
$_lang["wednesday"] = 'Mercredi';
$_lang["thursday"] = 'Jeudi';
$_lang["friday"] = 'Vendredi';
$_lang["saturday"] = 'Samedi';
$_lang["sunday"] = 'Dimanche';

// templates
$_lang["template"] = 'Modèle';
$_lang["templates"] = 'Modèles';
$_lang['templatecontroller'] = 'Contrôleur de modèle';
$_lang["template_assignedtv_tab"] = 'Variables de Modèle associées';
$_lang["template_code"] = 'Code source du Modèle (HTML)';
$_lang["template_desc"] = 'Description';
$_lang["template_edit_tab"] = 'Modifier le Modèle';
$_lang["template_inuse"] = 'Ce modèle est en cours d\'utilisation. Veuillez définir les documents utilisant le modèle sur un autre modèle. Documents utilisant ce modèle:';
$_lang["template_management_msg"] = 'Choisissez le Modèle que vous souhaitez modifier.';
$_lang["template_msg"] = 'Créer/modifier des Modèles. Les Modèles créés ou modifiés ne seront pas actualisés dans les pages en cache de votre site jusqu\'à ce que le cache soit vidé. Cependant, vous pouvez utiliser la fonction de prévisualisation d\'une page pour voir le nouveau Modèle en action.';
$_lang["template_name"] = 'Nom du Modèle';
$_lang["template_no_tv"] = 'Aucune Variable de Modèle n\'a été associée à ce Modèle pour le moment.';
$_lang["template_notassigned_tv"] = 'Ces variables de modèle sont prêt à être affectées.';
$_lang["template_reset_all"] = 'Utiliser le Modèle par défaut sur toutes les pages';
$_lang["template_reset_specific"] = 'Seulement sur les pages \'%s\'';
$_lang["template_assigned_blade_file"] = 'Fichier blade correspondant';
$_lang["template_create_blade_file"] = 'Créer un fichier modèle lors de l\'enregistrement';
$_lang["template_selectable"] = 'Modèle sélectionnable lors de la création ou de l\'édition de ressources.';
$_lang["template_title"] = 'Créer/modifier un Modèle';
$_lang["template_tv_edit"] = 'Modifier l\'ordre de tri des Variables de Modèle';
$_lang["template_tv_edit_message"] = 'Glissez et déposez les Variables de Modèle afin de les réordonner pour ce Modèle.';
$_lang["template_tv_edit_title"] = 'Ordre d\'affichage des Variables de Modèle';
$_lang["template_tv_msg"] = 'Les Variables de Modèle associées à ce Modèle sont listées ci-dessous.';

// tmplvars
$_lang["tv"] = 'Variable de Modèle';
$_lang["tmplvar"] = 'Variable de modèle';
$_lang["tmplvars"] = 'Variables de Modèle';
$_lang["tmplvar_access_msg"] = 'Sélectionnez les Groupes de Ressources ayant l\'autorisation de modifier le contenu ou la valeur de cette Variable de Modèle';
$_lang["tmplvar_change_template_msg"] = 'La modification de ce Modèle générera le rechargement des Variables de Modèles de la page. Les changements non enregistrés seront perdus.\n\n Voulez-vous vraiment modifier ce Modèle?';
$_lang["tmplvar_inuse"] = 'La(les) Ressource(s) suivante(s) utilise(nt) actuellement cette Variable de Modèle. Pour confirmer la suppression, cliquez sur le bouton «Supprimer». Dans le cas contraire, cliquez sur le bouton «Annuler».';
$_lang["tmplvar_tmpl_access"] = 'Accès au Modèle';
$_lang["tmplvar_tmpl_access_msg"] = 'Sélectionner les Modèles pouvant accéder à cette Variable de Modèle et l\'utiliser';
$_lang["tmplvars_binding_msg"] = 'Ce champ supporte les liens à une source de données en utilisant les commandes @';
$_lang["tmplvars_caption"] = 'Légende';
$_lang["tmplvars_default"] = 'Valeur par défaut';
$_lang["tmplvars_description"] = 'Description';
$_lang["tmplvars_elements"] = 'Valeurs optionnelles d\'entrée';
$_lang["tmplvars_inherited"] = 'Valeur héritée';
$_lang["tmplvars_management_msg"] = 'Gérez ici les Variables de Modèles pour vos Ressources.';
$_lang["tmplvars_msg"] = 'Ajoutez ou modifiez ici les Variables de Modèle. Les Variables de Modèle doivent être associées à des Modèles afin qu\'elles puissent être utilisées à partir de Snippets ou de Ressources.';
$_lang["tmplvars_name"] = 'Nom de la Variable de Modèle';
$_lang["tmplvars_novars"] = 'Aucune Variable de Modèle trouvée';
$_lang["tmplvars_rank"] = 'Ordre de tri';
$_lang["tmplvars_rank_edit_message"] = 'Faire glisser pour réorganiser les variables de modèle.';
$_lang["tmplvars_reset_params"] = 'Paramètres à zéro';
$_lang["tmplvars_title"] = 'Créer/modifier une Variable de Modèle';
$_lang["tmplvars_type"] = 'Type d\'entrée';
$_lang["tmplvars_widget"] = 'Widget';
$_lang["tmplvars_widget_prop"] = 'Propriétés du widget';
$_lang["role_no_tv"] = 'Aucune variable n\'a encore été attribuée à ce rôle.';
$_lang["role_notassigned_tv"] = 'Ces variables sont disponibles pour l\'affectation.';
$_lang["role_tv_msg"] = 'Les variables affectées à ce rôle sont répertoriées ci-dessous.';
$_lang["tmplvar_roles_access_msg"] = 'Sélectionnez les rôles autorisés à accéder/traiter cette variable de modèle';

// snippets
$_lang["snippet"] = 'Snippet';
$_lang["snippets"] = 'Snippets';
$_lang["snippet_code"] = 'Code source du Snippet (php)';
$_lang["snippet_desc"] = 'Description';
$_lang["snippet_execonsave"] = 'Lancer l\'exécution du Snippet après l\'enregistrement.';
$_lang["snippet_management_msg"] = 'Choisissez le Snippet que vous souhaitez modifier.';
$_lang["snippet_msg"] = 'Créer/modifier des Snippets. Attention, les Snippets sont codés en PHP «pur». Si vous souhaitez que l\'output du Snippet s\'affiche à un certain emplacement d\'un Modèle,  vous devez retourner une valeur au sein du Snippet.';
$_lang["snippet_name"] = 'Nom du Snippet';
$_lang["snippet_properties"] = 'Propriétés par défaut';
$_lang["snippet_title"] = 'Créer/modifier un Snippet';

// chunks
$_lang["htmlsnippet"] = 'Chunk';
$_lang["htmlsnippets"] = 'Chunks';
$_lang["htmlsnippet_desc"] = 'Description';
$_lang["htmlsnippet_management_msg"] = 'Choisissez le Chunk que vous souhaitez modifier.';
$_lang["htmlsnippet_msg"] = 'Ajoutez et modifiez des Chunks. Les chunks sont écrits en code HTML, le code PHP n\'y sera pas interprété.';
$_lang["htmlsnippet_name"] = 'Nom du Chunk';
$_lang["htmlsnippet_title"] = 'Créer/modifier un Chunk';
$_lang["chunk"] = 'Chunk';
$_lang["chunk_code"] = 'Code source du Chunk (HTML)';
$_lang["chunk_multiple_id"] = 'Erreur: Plusieurs Chunks possèdent le même ID.';
$_lang["chunk_no_exist"] = 'Le Chunk n\'existe pas.';

// plugins
$_lang["plugin"] = 'Plugin';
$_lang["plugins"] = 'Plugins';
$_lang["plugin_code"] = 'Code source du Plugin (php)';
$_lang["plugin_config"] = 'Réglages du Plugin';
$_lang["plugin_desc"] = 'Description';
$_lang["plugin_disabled"] = 'Plugin désactivé';
$_lang["plugin_event_msg"] = 'Sélection des Événements devant être pris en compte par ce Plugin.';
$_lang["plugin_management_msg"] = 'Choisissez le Plugin que vous souhaitez modifier.';
$_lang["plugin_msg"] = 'Créer/modifier des Plugins. Les Plugins sont des extraits de code PHP brut exécutés par EVO lorsque les Événements Système choisis sont détectés.';
$_lang["plugin_name"] = 'Nom du Plugin';
$_lang["plugin_priority"] = 'Éditer l\'ordre d\'exécution des plugins par Événements';
$_lang["plugin_priority_instructions"] = 'Glissez et déposez les Plugins sous chacun des titres d\'Événements pour modifier leur ordre d\'exécution. Le premier Plugin à exécuter doit être placé au-dessus des autres.';
$_lang["plugin_priority_title"] = 'Ordre d\'exécution des Plugins';
$_lang["purge_plugin"] = 'Purger les plugins obsolètes';
$_lang["purge_plugin_confirm"] = 'Êtes-vous sûr de vouloir purger les plugins obsolètes ?';
$_lang["plugin_title"] = 'Créer/modifier le Plugin';

// categories
$_lang["category"] = 'Catégorie';
$_lang["categories"] = 'Catégories';
$_lang["category_heading"] = 'Catégorie';
$_lang["category_manager"] = 'Gestionnaire de catégories';
$_lang["category_management"] = 'Gestion par catégorie';
$_lang["category_msg"] = 'Vous pouvez consulter et éditer ici tous les Éléments classés par catégorie.';

// file
$_lang["file_delete_file"] = 'Supprimer le fichier';
$_lang["file_delete_folder"] = 'Supprimer le répertoire';
$_lang["file_deleted"] = 'Succès!';
$_lang["file_download_file"] = 'Télécharger le fichier';
$_lang["file_download_unzip"] = 'Décompresser le fichier';
$_lang["file_folder_chmod_error"] = 'Impossible de modifier les permissions, vous allez devoir changer les permissions manuellement (par FTP ou SSH).';
$_lang["file_folder_created"] = 'Le répertoire a été créé!';
$_lang["file_folder_deleted"] = 'Le répertoire a été supprimé!';
$_lang["file_folder_not_created"] = 'Impossible de créer le répertoire';
$_lang["file_folder_not_deleted"] = 'Impossible de supprimer le répertoire. Veuillez vous assurer qu\'il est vide avant de le supprimer!';
$_lang["file_not_deleted"] = 'Échec!';
$_lang["file_not_saved"] = 'Impossible d\'enregistrer le fichier. Veuillez vous assurer qu\'il est possible d\'écrire dans le répertoire cible!';
$_lang["file_saved"] = 'Le fichier a été enregistré!';
$_lang["file_unzip"] = 'Les fichiers ont été décompressés!';
$_lang["file_unzip_fail"] = 'Les fichiers n\'ont pas pu être décompressés!';

// files
$_lang["files"] = 'Fichiers';
$_lang["files_files"] = 'Fichiers';
$_lang["files_access_denied"] = 'Accès interdit!';
$_lang["files_data"] = 'Données';
$_lang["files_dir_listing"] = 'Contenu du répertoire pour:';
$_lang["files_directories"] = 'Répertoires';
$_lang["files_directory_is_empty"] = 'Ce dossier est vide.';
$_lang["files_dirwritable"] = 'Accès en écriture?';
$_lang["files_editfile"] = 'Modifier le fichier';
$_lang["files_file_type"] = 'Type de fichier: ';
$_lang["files_filename"] = 'Nom du fichier';
$_lang["files_fileoptions"] = 'Options';
$_lang["files_filesize"] = 'Taille du fichier';
$_lang["files_filetype_notok"] = 'Télécharger ce type de fichier n\'est pas autorisé!';
$_lang["files_management"] = 'Gérer les fichiers';
$_lang["files_management_no_permission"] = 'Vous ne disposez pas de suffisamment d’autorisations pour afficher ou modifier ces fichiers. Demandez à l’administrateur de vous accorder l’accès à <b>%s</b>.';
$_lang["files_modified"] = 'Modification';
$_lang["files_top_level"] = 'Vers la racine';
$_lang["files_up_level"] = 'Niveau supérieur';
$_lang["files_upload_copyfailed"] = 'Le fichier n\'a pas pu être copié dans le répertoire de destination - le téléchargement a échoué!';
$_lang["files_upload_error"] = 'Erreur';
$_lang["files_upload_error0"] = 'Un problème est survenu lors de votre téléchargement.';
$_lang["files_upload_error1"] = 'Le fichier que vous tentez de télécharger est trop volumineux.';
$_lang["files_upload_error2"] = 'Le fichier que vous tentez de télécharger est trop volumineux.';
$_lang["files_upload_error3"] = 'Le fichier que vous tentez de télécharger n\'a été que partiellement téléchargé.';
$_lang["files_upload_error4"] = 'Veuillez sélectionner un fichier à télécharger.';
$_lang["files_upload_error5"] = 'Un problème est survenu lors de votre téléchargement.';
$_lang["files_upload_inhibited_msg"] = '<b>Le téléchargement est désactivé</b> - assurez-vous que votre serveur supporte le téléchargement et que PHP possède l\'autorisation d\'écrire dans le répertoire.<br />';
$_lang["files_upload_ok"] = 'Fichier téléchargé avec succès!';
$_lang["files_upload_permissions_error"] = 'Il y a probablement un problème de permissions - le répertoire où vous souhaitez envoyer un fichier doit être accessible en écriture par votre serveur.';
$_lang["files_uploadfile"] = 'Télécharger un fichier';
$_lang["files_uploadfile_msg"] = 'Sélectionnez un fichier à télécharger:';
$_lang["files_uploading"] = 'Téléchargement de <b>%s</b> dans <b>%s/</b><br />';
$_lang["files_viewfile"] = 'Afficher le fichier';

// modules
$_lang["module"] = 'Module';
$_lang["modules"] = 'Modules';
$_lang["module_code"] = 'Code source du Module (php)';
$_lang["module_config"] = 'Configuration du Module';
$_lang["module_desc"] = 'Description';
$_lang["module_disabled"] = 'Le Module est désactivé';
$_lang["module_edit_click_title"] = 'Cliquez ici pour modifier le Module';
$_lang["module_group_access_msg"] = 'Sélectionnez les Groupes d\'Utilisateurs ayant le droit de lancer ce Module depuis le Gestionnaire de Contenu.';
$_lang["module_management"] = 'Gestion des Modules';
$_lang["module_management_msg"] = 'Vous pouvez choisir ici le Module à lancer ou à modifier. Pour lancer le Module, cliquer sur l\'icône dans la grille. Pour modifier le Module, cliquez sur le nom du Module.';
$_lang["module_msg"] = 'Ajouter/modifier des Modules. Un Module est une collection d\'Éléments (Plugins, Snippets, etc.).';
$_lang["module_name"] = 'Nom du Module';
$_lang["module_resource_msg"] = 'Ajoutez ou supprimez des Éléments dont dépend ce module. Pour ajouter un nouvel Élément, cliquez sur l\'un des boutons ci-dessous.';
$_lang["module_resource_title"] = 'Dépendances du Module';
$_lang["module_title"] = 'Créer/modifier un Module';
$_lang["module_viewdepend_msg"] = 'Visualisez les Éléments dont dépend le fonctionnement du Module. Cliquer sur le bouton «Dépendances du Gestionnaire» pour modifier les dépendances';

// elements
$_lang["element"] = 'Élément';
$_lang["elements"] = 'Éléments';
$_lang["element_categories"] = 'Tous les Éléments';
$_lang["element_filter_msg"] = 'Écrire ici pour filtrer la liste';
$_lang["element_management"] = 'Gestion des Éléments';
$_lang["element_name"] = 'Nom de l\'Élément';
$_lang["element_selector_msg"] = 'Sélectionnez le/les Élément(s) dans la liste ci-dessous et cliquez sur le bouton «Insérer».';
$_lang["element_selector_title"] = 'Sélecteur d\'Éléments';

// resource
$_lang["resource"] = 'Ressource';
$_lang["resource_alias"] = 'Alias de la Ressource';
$_lang["resource_alias_help"] = 'Définissez un alias pour que la Ressource soit accessible à l\'adresse : http://exemple.com/alias. Cette fonctionnalité n\'est effective que si vous avez activé les URLs simples dans la configuration de votre site.';
$_lang["resource_content"] = 'Contenu de la Ressource';
$_lang["resource_description"] = 'Description';
$_lang["resource_description_help"] = 'Vous pouvez saisir ici une description de la Ressource (facultatif).';
$_lang["resource_duplicate"] = 'Dupliquer une Ressource';
$_lang["resource_long_title_help"] = 'Vous pouvez saisir ici un titre plus complet pour votre Ressource. Un tel titre peut être utile pour les moteurs de recherche, et offrira une meilleure description de votre Ressource.';
$_lang["resource_metatag_help"] = 'Sélectionnez les balises META et les mots-clés que vous souhaitez associer à cette Ressource. Vous pouvez sélectionner plusieurs mots-clés ou balises en gardant la touche CTRL enfoncée';
$_lang["resource_opt_contentdispo"] = 'Affichage du contenu';
$_lang["resource_opt_contentdispo_help"] = 'Utilisez le champ Affichage du contenu pour définir la manière dont la Ressource doit être traitée par le navigateur web. Pour les fichiers à télécharger, sélectionnez l\'option Annexe.';
$_lang["resource_opt_emptycache"] = 'Supprimer du cache?';
$_lang["resource_opt_emptycache_help"] = 'Cochez cette case si vous souhaitez que EVO supprime automatiquement la Ressource du cache après son enregistrement. Ainsi, vos visiteurs auront accès à la dernière version de la Ressource et non pas à la version en cache.';
$_lang["resource_opt_folder"] = 'Conteneur?';
$_lang["resource_opt_folder_help"] = 'Cochez cette case pour définir cette Ressource comme Conteneur d\'autres Ressources. Un «Conteneur» est similaire à un dossier, à la différence qu\'il peut également avoir du contenu.';
$_lang["resource_opt_menu_index"] = 'Index de menu';
$_lang["resource_opt_menu_index_help"] = 'L\'index de menu est un champ que vous pouvez utiliser pour trier les Ressources, notamment dans vos Snippets de menu. Vous pouvez également l\'utiliser dans vos Snippets pour une toute autre utilisation.';
$_lang["resource_opt_menu_title"] = 'Titre de menu';
$_lang["resource_opt_menu_title_help"] = 'Le titre de menu est un champ (optionnel) que vous pouvez utiliser pour afficher un bref intitulé dans vos Snippets de menu ou Modules.';
$_lang["resource_opt_published"] = 'Publié?';
$_lang["resource_opt_published_help"] = 'Cochez cette case pour publier cette Ressource immédiatement après son enregistrement.';
$_lang["resource_opt_richtext"] = 'Éditeur WYSIWYG?';
$_lang["resource_opt_richtext_help"] = 'Cochez cette case si vous souhaitez utiliser l\'éditeur WISIWYG pour modifier cette Ressource. Si la Ressource contient du JavaScript ou des formulaires, décochez la case pour modifier la Ressource en mode HTML, afin que l\'éditeur WYSIWYG ne la détériore pas.';
$_lang["resource_opt_show_menu"] = 'Afficher dans le menu';
$_lang["resource_opt_show_menu_help"] = 'Choisissez cette option pour afficher la Ressource dans un menu web. Certains scripts de construction de menus peuvent ignorer cette option.';
$_lang["resource_opt_trackvisit_help"] = 'Enregistrer les visites de chaque internaute sur cette Ressource';
$_lang["resource_overview"] = 'Résumé de la Ressource';
$_lang["resource_parent"] = 'Ressource parente';
$_lang["resource_parent_help"] = 'Cliquez sur l\'icône ci-dessus pour activer (ou désactiver) la sélection d\'une Ressource parente. Cliquez ensuite sur une Ressource dans l\'Arbre du Site pour la choisir comme parente.';
$_lang["resource_permissions_error"] = 'Assignez cette Ressource à au moins un Groupe de Ressources auquel vous avez accès.';
$_lang["resource_setting"] = 'Propriétés de la Ressource';
$_lang["resource_summary"] = 'Résumé';
$_lang["resource_summary_help"] = 'Rédigez un bref résumé de la Ressource';
$_lang["resource_title"] = 'Titre';
$_lang["resource_title_help"] = 'Entrez ici le nom/titre de la Ressource. Évitez d\'entrer des antislashs (\) dans ce champ.';
$_lang["resource_to_be_moved"] = 'Ressource à déplacer';
$_lang["resource_type"] = 'Type de Ressource';
$_lang["resource_type_message"] = 'Les Liens Web sont des références à des objets sur Internet. Ce peut être une Ressource dans EVO, une page sur un autre site, une image ou tout autre fichier accessible sur Internet. Les Liens Web doivent avoir l\'option Type de contenu réglée sur «text/html» et l\'Affichage du contenu défini comme «Élément en ligne»';
$_lang["resource_type_weblink"] = 'Lien Web';
$_lang["resource_type_webpage"] = 'Page Web';
$_lang["resource_weblink_help"] = 'Entrez ici l\'adresse (URL) de l\'objet que vous souhaitez référencer à ce Lien Web.';
$_lang["resources_in_container"] = 'Ressources dans ce Conteneur';
$_lang["resources_in_container_no"] = 'Ce Conteneur n\'a aucune Ressource enfant.';

// role
$_lang["role"] = 'Rôle';
$_lang["role_about"] = 'Consulter la page «À propos»';
$_lang["role_actionok"] = 'Accès à l\'écran de fin d\'action';
$_lang["role_assets_images"] = 'Gérer assets/images';
$_lang["role_assets_files"] = 'Gérer assets/files';
$_lang["role_bk_manager"] = 'Utiliser le Gestionnaire de Sauvegardes';
$_lang["role_cache_refresh"] = 'Purge du cache du site';
$_lang["role_category_manager"] = 'Utiliser le gestionnaire de catégories';
$_lang["role_change_password"] = 'Changement de mot de passe';
$_lang["role_change_resourcetype"] = 'Changer Type de ressources';
$_lang["role_chunk_management"] = 'Gestion des Chunks';
$_lang["role_config_management"] = 'Gestion de la configuration';
$_lang["role_content_management"] = 'Gestion du contenu';
$_lang["role_create_chunk"] = 'Créer de nouveaux Chunks';
$_lang["role_create_doc"] = 'Créer de nouvelles Ressources';
$_lang["role_create_plugin"] = 'Créer de nouveaux Plugins';
$_lang["role_create_snippet"] = 'Créer de nouveaux Snippets';
$_lang["role_create_template"] = 'Créer de nouveaux Modèles';
$_lang["role_credits"] = 'Accès aux crédits';
$_lang["role_delete_chunk"] = 'Supprimer des Chunks';
$_lang["role_delete_doc"] = 'Supprimer des Ressources';
$_lang["role_delete_eventlog"] = 'Supprimer l\'historique des événements';
$_lang["role_delete_module"] = 'Supprimer des Modules';
$_lang["role_delete_plugin"] = 'Supprimer des Plugins';
$_lang["role_delete_role"] = 'Supprimer des rôles';
$_lang["role_delete_snippet"] = 'Supprimer des Snippets';
$_lang["role_delete_template"] = 'Supprimer des Modèles';
$_lang["role_delete_user"] = 'Supprimer des Utilisateurs';
$_lang["role_delete_web_user"] = 'Supprimer des Utilisateurs Web';
$_lang["role_edit_chunk"] = 'Modifier des Chunks';
$_lang["role_edit_doc"] = 'Modifier des Ressources';
$_lang["role_edit_doc_metatags"] = 'Modifier les balises META et les mots-clés';
$_lang["role_edit_module"] = 'Modifier les Modules';
$_lang["role_edit_plugin"] = 'Modifier les Plugins';
$_lang["role_edit_role"] = 'Modifier les rôles';
$_lang["role_edit_settings"] = 'Modifier la configuration du site';
$_lang["role_edit_snippet"] = 'Modifier les Snippets';
$_lang["role_edit_template"] = 'Modifier les Modèles';
$_lang["role_edit_user"] = 'Modifier les Utilisateurs';
$_lang["role_edit_web_user"] = 'Modifier les Utilisateurs web';
$_lang["role_empty_trash"] = 'Purger définitivement les Ressources supprimées';
$_lang["role_errors"] = 'Accès aux annonces d\'erreurs';
$_lang["role_eventlog_management"] = 'Gestion de l\'historique des événements';
$_lang["role_export_static"] = 'Export en HTML statique';
$_lang["role_file_management"] = 'Gestion des fichiers';
$_lang["role_file_manager"] = 'Utiliser le Gestionnaire de Fichiers';
$_lang["role_frames"] = 'Accès aux cadres du Gestionnaire';
$_lang["role_help"] = 'Accès aux pages d\'aide';
$_lang["role_home"] = 'Accès à la page d\'introduction du gestionnaire';
$_lang["role_import_static"] = 'Importation HTML';
$_lang["role_logout"] = 'Déconnexion du Gestionnaire';
$_lang["role_list_module"] = 'Module de liste';
$_lang["role_manage_metatags"] = 'Gérer les balises META et les mots-clés du site';
$_lang["role_management_msg"] = 'Choisissez le rôle que vous souhaitez modifier.';
$_lang["role_management_title"] = 'Gestion des rôles';
$_lang["role_messages"] = 'Lire et envoyer des messages';
$_lang["role_module_management"] = 'Gestion des Modules';
$_lang["role_name"] = 'Nom du rôle ';
$_lang["role_new_module"] = 'Créer un nouveau Module';
$_lang["role_new_role"] = 'Créer de nouveaux rôles';
$_lang["role_new_user"] = 'Créer de nouveaux Utilisateurs';
$_lang["role_new_web_user"] = 'Créer de nouveaux Utilisateurs Web';
$_lang["role_plugin_management"] = 'Gestion des Plugins';
$_lang["role_publish_doc"] = 'Publier des Ressources';
$_lang["role_remove_locks"] = 'Supprimer des verrous';
$_lang["role_role_management"] = 'Gestion des rôles';
$_lang["role_run_module"] = 'Lancer des Modules';
$_lang["role_save_chunk"] = 'Enregistrer des Chunks';
$_lang["role_save_doc"] = 'Enregistrer des Ressources';
$_lang["role_save_module"] = 'Enregistrer des Modules';
$_lang["role_save_password"] = 'Enregistrer des mots de passe';
$_lang["role_save_plugin"] = 'Enregistrer des Plugins';
$_lang["role_save_role"] = 'Enregistrer des rôles';
$_lang["role_save_snippet"] = 'Enregistrer des Snippets';
$_lang["role_save_template"] = 'Enregistrer des Modèles';
$_lang["role_save_user"] = 'Enregistrer des Utilisateurs';
$_lang["role_save_web_user"] = 'Enregistrer des Utilisateurs Web';
$_lang["role_snippet_management"] = 'Gestion des Snippets';
$_lang["role_template_management"] = 'Gestion des Modèles';
$_lang["role_title"] = 'Créer/modifier un rôle';
$_lang["role_udperms"] = 'Gestion des autorisations';
$_lang["role_user_management"] = 'Gestion des Utilisateurs';
$_lang["role_view_docdata"] = 'Afficher les données d\'une Ressource';
$_lang["role_view_eventlog"] = 'Afficher l\'historique des événements';
$_lang["role_view_logs"] = 'Afficher les historiques du système';
$_lang["role_view_unpublished"] = 'Visualiser les Ressources non publiées';
$_lang["role_web_access_persmissions"] = 'Autorisations d\'accès web';
$_lang["role_web_user_management"] = 'Gestion des Utilisateurs Web';

// user
$_lang["user"] = 'Utilisateur';
$_lang["users"] = 'Utilisateurs';
$_lang["user_block"] = 'Bloqué';
$_lang["user_blockedafter"] = 'Bloqué après';
$_lang["user_blockeduntil"] = 'Bloqué jusqu\'au';
$_lang["user_changeddata"] = 'Vos données ont été actualisées. Merci de vous identifier à nouveau.';
$_lang["user_country"] = 'Pays';
$_lang["user_dob"] = 'Date de naissance';
$_lang["user_doesnt_exist"] = 'L\'Utilisateur n\'existe pas';
$_lang["user_edit_self_msg"] = '<b>Pour que les informations soient effectivement mises à jour, vous devrez vous déconnecter puis vous reconnecter.</b> Les nouveaux mots de passe seront envoyés par email ou affichés sur l\'écran.';
$_lang["user_email"] = 'Adresse email ';
$_lang["user_failedlogincount"] = 'Connexions échouées';
$_lang["user_fax"] = 'Fax';
$_lang["user_female"] = 'Féminin';
$_lang["user_full_name"] = 'Nom complet';
$_lang["user_first_name"] = 'Prénom';
$_lang["user_last_name"] = 'Nom';
$_lang["user_middle_name"] = 'Deuxième nom';
$_lang["user_gender"] = 'Sexe';
$_lang["user_is_blocked"] = 'Cet Utilisateur est bloqué!';
$_lang["user_logincount"] = 'Nombre de connexions';
$_lang["user_male"] = 'Masculin';
$_lang["user_management_msg"] = 'Choisissez les Utilisateurs du Gestionnaire de Contenu à modifier. Les Utilisateurs du Gestionnaire de Contenu sont les Utilisateurs qui peuvent se connecter au Gestionnaire de Contenu';
$_lang["user_management_title"] = 'Gestion des Utilisateurs';
$_lang["user_mobile"] = 'Téléphone mobile';
$_lang["user_phone"] = 'Téléphone';
$_lang["user_photo"] = 'Photo Utilisateur';
$_lang["user_photo_message"] = 'Entrez l\'URL de l\'image pour cet Utilisateur ou utilisez le bouton «Insérer» pour sélectionner ou télécharger une image sur le serveur.';
$_lang["user_prevlogin"] = 'Dernière connexion';
$_lang["user_role"] = 'Rôle de l\'Utilisateur';
$_lang["no_user_role"] = 'Aucun rôle d’utilisateur';
$_lang["user_state"] = 'État';
$_lang["user_title"] = 'Créer/modifier un Utilisateur';
$_lang["user_upload_message"] = 'Si vous souhaitez empêcher cet Utilisateur de déposer n\'importe quel type de fichier dans cette catégorie, assurez-vous que la case «Utiliser la configuration par défaut» n\'est pas cochée et laissez ce champ vide.';
$_lang["user_use_config"] = 'Utiliser la configuration par défaut';
$_lang["user_verification"] = 'Utilisateur vérifié';
$_lang["user_zip"] = 'Code postal';
$_lang["username"] = 'Nom d\'utilisateur ';
$_lang["username_unique"] = 'Nom d’utilisateur déjà utilisé !';
$_lang["user_street"] = 'Rue';
$_lang["user_city"] = 'Ville';
$_lang["user_other"] = 'Autre';

// add
$_lang["add"] = 'Ajouter';
$_lang["add_chunk"] = 'Ajouter un Chunk';
$_lang["add_doc"] = 'Ajouter une Ressource';
$_lang["add_folder"] = 'Nouveau répertoire';
$_lang["add_plugin"] = 'Ajouter un Plugin';
$_lang["add_resource"] = 'Nouvelle Ressource';
$_lang["add_snippet"] = 'Ajouter un Snippet';
$_lang["add_tag"] = 'Ajouter une balise';
$_lang["add_template"] = 'Ajouter un Modèle';
$_lang["add_tv"] = 'Ajouter une Variable de Modèle';
$_lang["add_weblink"] = 'Nouveau Lien Web';

// new
$_lang["new_category"] = 'Nouvelle Catégorie';
$_lang["new_file_permissions_message"] = 'Lorsque vous téléchargez un fichier via le Gestionnaire de Fichiers, ce dernier tentera de modifier automatiquement les permissions sur le réglage saisi ici. Il est possible que cela ne fonctionne pas sur certaines configurations de serveur, telle qu\'IIS, vous serez alors contraint de modifier les permissions manuellement.';
$_lang["new_file_permissions_title"] = 'Nouvelles permissions du fichier';
$_lang["new_folder_permissions_message"] = 'Lorsque vous créez un nouveau répertoire via le Gestionnaire de Fichiers, ce dernier tentera de modifier automatiquement les permissions sur le réglage saisi ici. Il est possible que cela ne fonctionne pas sur certaines configurations de serveur, telle qu\'IIS, vous serez alors contraint de modifier les permissions manuellement.';
$_lang["new_folder_permissions_title"] = 'Nouvelles permissions du répertoire';
$_lang["new_permission"] = 'Nouvelle autorisation';
$_lang["new_htmlsnippet"] = 'Nouveau Chunk';
$_lang["new_keyword"] = 'Ajouter un nouveau mot-clé:';
$_lang["new_module"] = 'Nouveau Module';
$_lang["new_parent"] = 'Nouveau parent';
$_lang["new_plugin"] = 'Nouveau Plugin';
$_lang["new_role"] = 'Créer un nouveau rôle';
$_lang["new_snippet"] = 'Nouveau Snippet';
$_lang["new_template"] = 'Nouveau Modèle';
$_lang["new_tmplvars"] = 'Nouvelle Variable de Modèle';
$_lang["new_user"] = 'Nouvel Utilisateur';
$_lang["new_web_user"] = 'Nouvel Utilisateur Web';
$_lang["new_resource"] = 'Nouvelle Ressource';

// manage
$_lang["manage_categories"] = 'Gérer les catégories';
$_lang["manage_depends"] = 'Gestion des Dépendances';
$_lang["manage_files"] = 'Gestion des Fichiers';
$_lang["manage_htmlsnippets"] = 'Gérer les chunks';
$_lang["manage_metatags"] = 'Gestion des balises META et des mots-clés';
$_lang["manage_modules"] = 'Gestion des Modules';
$_lang["manage_plugins"] = 'Gérer les plugins';
$_lang["manage_snippets"] = 'Gérer les snippets';
$_lang["manage_templates"] = 'Gérer les modèles';
$_lang["manage_documents"] = 'Gérer les documents';
$_lang["manage_permission"] = 'Gérer les autorisations';

// move
$_lang["move"] = 'Déplacer';
$_lang["move_resource"] = 'Déplacer la Ressource';
$_lang["move_resource_message"] = 'Vous pouvez déplacer une Ressource et tous ses enfants en choisissant un nouveau parent dans l\'Arbre du Site. Si cette Ressource n\'est pas un Conteneur, elle le deviendra ensuite. Veuillez cliquer sur le nouveau parent dans l\'Arbre du Site.';
$_lang["move_resource_new_parent"] = 'Veuillez choisir un nouveau parent dans l\'Arbre du Site.';
$_lang["move_resource_title"] = 'Déplacer la Ressource';

$_lang["access_permissions"] = 'Autorisations d\'accès';
$_lang["access_permission_denied"] = 'Vous n\'avez pas les autorisations nécessaires pour modifier cette Ressource.';
$_lang["access_permission_parent_denied"] = 'Vous n\'avez pas l\'autorisation de créer ou de déplacer une Ressource ici! Veuillez choisir une autre destination.';
$_lang["access_permissions_add_resource_group"] = 'Créer un nouveau Groupe de Ressources';
$_lang["access_permissions_add_user_group"] = 'Créer un nouveau Groupe d\'Utilisateurs';
$_lang["access_permissions_docs_message"] = 'Veuillez sélectionner les Groupes de Ressources auxquels cette Ressource doit appartenir';
$_lang["access_permissions_group_link"] = 'Créer un nouveau groupe de liens';
$_lang["access_permissions_introtext"] = 'Cette section vous permet de gérer les Groupes d\'Utilisateurs et les Groupes de Ressources utilisés pour les autorisations d\'accès. Pour ajouter un utilisateur à un Groupe d\'Utilisateurs, modifier l\'utilisateur et cocher les groupes auxquels il doit appartenir. Pour ajouter une Ressource à un Groupe d\'Utilisateurs, modifiez la Ressource et cochez les groupes auxquels il doit appartenir.';
$_lang["access_permissions_link_to_group"] = 'au Groupe de Ressources.';
$_lang["access_permissions_context"] = 'dans le contexte';
$_lang["access_permissions_link_user_group"] = 'Lien Groupe d\'Utilisateurs';
$_lang["access_permissions_links"] = 'Liens Groupe d\'Utilisateurs/de Ressources';
$_lang["access_permissions_links_tab"] = 'Le tableau ci-dessous indique les Groupes d\'Utilisateurs ayant accès (c\'est-à-dire pouvant modifier ou créer des enfants) à des Groupes de Ressources. Pour lier un Groupe de Ressources à un Groupe d\'Utilisateurs, choisissez le groupe à partir du menu déroulant, et cliquez sur «Ajouter». Pour retirer un groupe, cliquez sur «Retirer». Le lien sera immédiatement supprimé.';
$_lang["access_permissions_no_resources_in_group"] = 'Néant.';
$_lang["access_permissions_no_users_in_group"] = 'Néant.';
$_lang["access_permissions_off"] = '<span class="warning">Les autorisations d\'accès ne sont pas activées.</span> Les modifications faites ici n\'auront aucun effet jusqu\'à ce que les autorisations d\'accès soient activées.';
$_lang["access_permissions_resource_groups"] = 'Groupes de Ressources';
$_lang["access_permissions_resources_in_group"] = '<b>Ressources dans le groupe:</b> ';
$_lang["access_permissions_resources_tab"] = 'Les Groupes de Ressources actuels sont affichés ci-dessous. Vous pouvez en créer de nouveaux, les renommer, les supprimer et voir quelles Ressources appartiennent aux différents groupes (le survol par le pointeur de l\'ID de la Ressource en affichera le nom). Pour ajouter une Ressource à un groupe ou pour l\'en retirer, modifiez directement la Ressource.';
$_lang["access_permissions_user_toggle"] = 'Basculer les autorisations d\'accès';
$_lang["access_permissions_user_groups"] = 'Groupes d\'Utilisateurs';
$_lang["access_permissions_user_message"] = 'Vous pouvez choisir ici les Groupes d\'Utilisateurs auxquels cet utilisateur appartient';
$_lang["access_permissions_users_in_group"] = 'Utilisateurs dans le groupe:';
$_lang["access_permissions_users_tab"] = 'Les Groupes d\'Utilisateurs actuels sont affichés ci-dessous. Vous pouvez en créer de nouveaux, les renommer, les supprimer et voir quels utilisateurs sont membres des différents groupes. Pour ajouter un nouvel utilisateur à un groupe ou pour l\'en retirer, modifiez directement l\'utilisateur. Les administrateurs ont toujours accès à toutes les Ressources. Il n\'est donc pas nécessaire de les ajouter à un groupe en particulier.';

$_lang["users_list"] = 'Liste des utilisateurs';
$_lang["documents_list"] = 'Liste des ressources';

$_lang["account_email"] = 'Email du compte utilisateur';
$_lang["actioncomplete"] = '<b>L\'action a été accomplie avec succès!</b><br /> - Veuillez patienter un instant.';
$_lang["activity_message"] = 'Cette liste contient les Ressources que vous avez modifiée ou créé récemment:';
$_lang["activity_title"] = 'Ressources éditées/créées récemment';

$_lang["administrator_role_message"] = 'Ce rôle ne peut être ni modifié, ni supprimé.';
$_lang["administrators"] = 'Administrateurs';
$_lang["after_saving"] = 'Après l\'enregistrement';
$_lang["alert_delete_self"] = 'Vous ne pouvez pas supprimer votre propre compte!';
$_lang["alias"] = 'Alias';
$_lang["all_doc_groups"] = 'Tous les Groupes de Ressources (Public)';
$_lang["all_events"] = 'Tous les Événements';
$_lang["all_usr_groups"] = 'Tous les Groupes d\'Utilisateurs (Public)';
$_lang["allow_mgr_access"] = 'Accès à l\'interface du Gestionnaire';
$_lang["allow_mgr_access_message"] = 'Sélectionnez cette option pour permettre ou non l\'accès à l\'interface du Gestionnaire.<br /><b>ATTENTION ! Si vous avez désactivé cette option, l\'utilisateur sera redirigé automatiquement vers la page de connexion au Gestionnaire ou vers la page d\'accueil du site web.</b>';
$_lang["already_deleted"] = 'a déjà été supprimé.';
$_lang["attachment"] = 'Annexe';
$_lang["author_infos"] = 'Information sur l’auteur';
$_lang["automatic_alias_message"] = 'Sélectionnez «Oui» pour que le système génère automatiquement un alias à partir du titre de la page lors de son enregistrement.';
$_lang["automatic_alias_title"] = 'Générer automatiquement les alias:';
$_lang["backup"] = 'Sauvegarde';
$_lang["bk_manager"] = 'Sauvegarde';
$_lang["block_message"] = 'Une fois ces données enregistrées, cet utilisateur sera bloqué!';
$_lang["blocked_minutes_message"] = 'Vous pouvez saisir ici le nombre de minutes durant lesquelles un utilisateur sera bloqué s\'il atteint le nombre maximum de tentatives de connexion. Veillez à ne saisir qu\'une valeur numérique (pas de virgule, d\'espace, etc.)';
$_lang["blocked_minutes_title"] = 'Durée de blocage (en minutes):';
$_lang["cache_files_deleted"] = 'Les fichiers suivants ont été supprimés:';
$_lang["cancel"] = 'Annuler';
$_lang["captcha_code"] = 'Code de sécurité';
$_lang["captcha_message"] = 'Activer les codes CAPTCHA permet de renforcer la sécurité en exigeant des utilisateurs d\'écrire un code illisible par des machines (automates).';
$_lang["captcha_title"] = 'Utiliser les codes CAPTCHA:';
$_lang["captcha_words_default"] = 'MODX,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join(),Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote';
$_lang["captcha_words_message"] = 'Veuillez saisir une liste de mots à utiliser si CAPTCHA est activé. Séparez les mots par des virgules. Ce champ est limité à 255 caractères.';
$_lang["captcha_words_title"] = 'Mots CAPTCHA';

$_lang["cfg_base_path"] = 'MODX_BASE_PATH';
$_lang["cfg_base_url"] = 'MODX_BASE_URL';
$_lang["cfg_manager_path"] = 'MODX_MANAGER_PATH';
$_lang["cfg_manager_url"] = 'MODX_MANAGER_URL';
$_lang["cfg_site_url"] = 'MODX_SITE_URL';

$_lang["change_name"] = 'Modifier le nom';
$_lang["change_password"] = 'Modifier le mot de passe';
$_lang["change_password_confirm"] = 'Saisir à nouveau le mot de passe';
$_lang["change_password_message"] = 'Veuillez saisir votre nouveau mot de passe, puis le saisir à nouveau pour confirmation. Votre mot de passe doit contenir entre 6 et 15 caractères.';
$_lang["change_password_new"] = 'Nouveau mot de passe';
$_lang["charset_message"] = 'Veuillez choisir l\'encodage de caractères par défaut pour la variable de système [(modx_charset)]. Ceci n\'affectera pas le Gestionnaire.';
$_lang["charset_title"] = 'Encodage des caractères:';

$_lang["cleaningup"] = 'Nettoyage';
$_lang["clean_uploaded_filename"] = 'Utiliser la translittération lors du chargement de fichier';
$_lang["clean_uploaded_filename_message"] = 'Utiliser le paramétrage transalias ou la valeur par défaut pour nettoyer les caractères spéciaux des noms de fichiers téléchargés. Conserve le caractère point.';
$_lang["clear_log"] = 'Vider l\'historique';
$_lang["click_to_context"] = 'Cliquer pour accéder au menu contextuel';
$_lang["click_to_edit_title"] = 'Cliquer ici pour modifier cet enregistrement';
$_lang["click_to_view_details"] = 'Cliquer ici pour afficher les détails';
$_lang["close"] = 'Fermer';
$_lang["code"] = 'Code';
$_lang["collapse_tree"] = 'Réduire l\'Arbre du Site';
$_lang["comment"] = 'Commentaire';

$_lang["configcheck_admin"] = 'Veuillez contacter un administrateur et lui communiquer le contenu de ce message!';
$_lang["configcheck_cache"] = 'répertoire cache non modifiable';
$_lang["configcheck_cache_msg"] = 'EVO ne peut pas écrire dans le répertoire cache. EVO continuera à fonctionner normalement, mais le cache ne fonctionnera pas. Pour corriger ce problème, veuillez donner les droits en écriture au répertoire /_cache/.';
$_lang["configcheck_configinc"] = 'Le fichier de configuration est encore accessible en écriture';
$_lang["configcheck_configinc_msg"] = 'Des personnes mal intentionnées pourraient modifier la configuration de votre site. <strong>Modifiez immédiatement</strong> les permissions de votre fichier de configuration (/[+MGR_DIR+]/includes/config.inc.php) pour qu\'il reste en lecture seule!';
$_lang["configcheck_default_msg"] = 'Une erreur inconnue est survenue. Étrange.';
$_lang["configcheck_errorpage_unavailable"] = 'La page d\'erreur de votre site n\'est pas définie.';
$_lang["configcheck_errorpage_unavailable_msg"] = 'Cela signifie que votre page d\'erreur n\'est pas accessible à vos visiteurs ou qu\'elle n\'existe pas. Cela peut provoquer une boucle infinie, générer des erreurs dans vos logs. Assurez-vous qu\'aucun Groupe d\'Utilisateurs Web n\'est associé à cette page.';
$_lang["configcheck_errorpage_unpublished"] = 'La page d\'erreur de votre site n\'est pas publiée ou n\'existe pas.';
$_lang["configcheck_errorpage_unpublished_msg"] = 'Cela signifie que votre page d\'erreur n\'est pas accessible au public. Publiez cette page ou assurez-vous qu\'elle est associée à une Ressource existante dans votre Arbre de Site dans le menu Outils &gt; Configuration.';
$_lang["configcheck_filemanager_path"] = 'Le <a href="/[+MGR_DIR+]/?a=17&amp;tab=4">chemin du Gestionnaire de fichiers</a> actuel semble incorrect.';
$_lang["configcheck_filemanager_path_msg"] = 'Cela peut se produire, par exemple, en déplaçant votre installation vers un autre répertoire ou serveur. Veuillez vérifier et mettre à jour votre configuration Evolution CMS.';
$_lang["configcheck_hide_warning"] = '<a href="javascript:hideConfigCheckWarning(\'%s\');"><em>Ne plus afficher de nouveau.</em></a>';
$_lang["configcheck_images"] = 'Le répertoire d\'images n\'est pas accessible en écriture';
$_lang["configcheck_images_msg"] = 'Le répertoire des images n\'est pas accessible en écriture ou n\'existe pas. Par conséquent, les fonctions de gestion d\'images de l\'éditeur WYSIWYG ne fonctionneront pas!';
$_lang["configcheck_installer"] = 'L\'installateur est encore présent';
$_lang["configcheck_installer_msg"] = 'Le répertoire install/ contient l\'installateur de EVO. Imaginez un instant ce qui pourrait arriver à votre site si une personne mal intentionnée trouve ce répertoire et exécute l\'installateur! Il n\'irait probablement pas bien loin, parce qu\'il devrait saisir les informations de l\'utilisateur de la base de données, mais il est bien plus sûr de supprimer ce répertoire de votre serveur.';
$_lang["configcheck_lang_difference"] = 'Nombre incorrect de variables dans le fichier de langue';
$_lang["configcheck_lang_difference_msg"] = 'La langue actuellement choisie a un nombre de variables différent de la langue par défaut. Ceci n\'est pas nécessairement un problème, mais peut signifier que le fichier de langue doit être mis à jour.';
$_lang["configcheck_notok"] = 'Un ou plusieurs détails de configuration ne sont pas valides:';
$_lang["configcheck_ok"] = 'Le contrôle s\'est bien passé - aucun avertissement rapporté.';
$_lang["configcheck_php_gdzip"] = 'Extensions PHP, GD et/ou ZIP non trouvée(s)';
$_lang["configcheck_php_gdzip_msg"] = 'EVO n\a pas détecté les extensions PHP, GD et ZIP. Même si EVO sait travailler sans, vous ne tirerez pas pleinement profit du gestionnaire de fichiers, de l\'éditeur d\'images ou de Captcha pour les logins.';
$_lang["configcheck_rb_base_dir"] = 'Le <a href="/[+MGR_DIR+]/?a=17&amp;tab=5">chemin de base des Fichiers </a> semble incorrect.';
$_lang["configcheck_rb_base_dir_msg"] = 'Cela peut se produire, par exemple, en déplaçant votre installation vers un autre répertoire ou serveur. Veuillez vérifier et mettre à jour votre configuration Evolution CMS.';
$_lang["configcheck_register_globals"] = 'register_globals est sur "ON" dans votre fichier de configuration PHP (php.ini)';
$_lang["configcheck_register_globals_msg"] = 'Cette configuration rend votre site vulnérable aux attaques <a href="http://www.commentcamarche.net/contents/50-xss-cross-site-scripting">XCSS</a> (cross site scripting). Consultez votre hébergeur sur la marche à suivre pour désactiver ce réglage.';
$_lang["configcheck_title"] = 'Contrôle de configuration';
$_lang["configcheck_templateswitcher_present"] = 'Plugin TemplateSwitcher détecté';
$_lang["configcheck_templateswitcher_present_delete"] = '<a href="javascript:deleteTemplateSwitcher();">Supprime TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_disable"] = '<a href="javascript:disableTemplateSwitcher();">Désactive TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_msg"] = 'Le plugin TemplateSwitcher peut causer des problèmes de performance et de cache. Il devrait être utilisé que si la fonctionnalité est requise pour votre site.';
$_lang["configcheck_unauthorizedpage_unavailable"] = 'La page "Accès non autorisé" n\'est pas publiée ou n\'existe pas.';
$_lang["configcheck_unauthorizedpage_unavailable_msg"] = 'Cela signifie que la page "Accès non autorisé" n\'est pas accessible à vos visiteurs ou n\'existe pas. Cela peut provoquer une boucle infinie, générer des erreurs dans vos logs. Assurez-vous qu\'aucun Groupe d\'Utilisateurs Web n\'est associé à cette page.';
$_lang["configcheck_unauthorizedpage_unpublished"] = 'La page "Accès non autorisé" définie dans la configuration du site n\'est pas publiée.';
$_lang["configcheck_unauthorizedpage_unpublished_msg"] = 'Cela signifie que la page "Accès non autorisé" n\'est pas accessible au public. Publiez cette page ou assurez-vous qu\'elle est associée à une Ressource existante dans votre Arbre de Site dans le menu Outils &gt; Configuration.';
$_lang["configcheck_validate_referer"] = 'Avertissement de sécurité: validation des en-têtes HTTP';
$_lang["configcheck_validate_referer_msg"] = 'Le paramètre de configuration <strong>Valider les en-têtes HTTP_REFERER?</strong> est désactivé. Nous vous recommandons de l\'activer. <a href="index.php?a=17">Aller aux options de configuration</a><br /><a href="javascript:hideHeaderVerificationWarning();"><em>Ne plus afficher ce message.</em></a>';
$_lang["configcheck_warning"] = 'Avertissement de configuration:';
$_lang["configcheck_what"] = 'Que signifie ceci?';

$_lang["safe_mode_warning"] = 'Le mode sans échec est activé. Les fonctionnalités du gestionnaire sont limitées.';

$_lang["confirm_block"] = 'Voulez-vous vraiment bloquer cet utilisateur?';
$_lang["confirm_delete_category"] = 'Êtes-vous sûr de vouloir supprimer cette catégorie ?';
$_lang["confirm_delete_eventlog"] = 'Voulez-vous vraiment supprimer cet historique?';
$_lang["confirm_delete_file"] = 'Voulez-vous vraiment supprimer ce fichier?\n\nUne telle opération pourrait empêcher votre site de fonctionner correctement! Ne supprimez ce fichier que si vous êtes absolument certain de ne rien casser.';
$_lang["confirm_delete_group"] = 'Êtes-vous sûr de vouloir supprimer ce groupe ?';
$_lang["confirm_delete_htmlsnippet"] = 'Voulez-vous vraiment supprimer ce Chunk?';
$_lang["confirm_delete_keywords"] = 'Voulez-vous vraiment supprimer ces mots-clés?';
$_lang["confirm_delete_module"] = 'Voulez-vous vraiment supprimer ce Module?';
$_lang["confirm_delete_plugin"] = 'Voulez-vous vraiment supprimer ce Plugin?';
$_lang["confirm_delete_record"] = 'Voulez-vous vraiment supprimer les enregistrements sélectionnés?';
$_lang["confirm_delete_resource"] = 'Voulez-vous vraiment supprimer cette Ressource?\nToutes les Ressources enfants seront également supprimées.';
$_lang["confirm_delete_role"] = 'Voulez-vous vraiment supprimer ce rôle?';
$_lang["confirm_delete_snippet"] = 'Voulez-vous vraiment supprimer ce Snippet?';
$_lang["confirm_delete_tags"] = 'Voulez-vous vraiment supprimer les balises META sélectionnées?';
$_lang["confirm_delete_template"] = 'Voulez-vous vraiment supprimer ce Modèle?';
$_lang["confirm_delete_tmplvars"] = 'Voulez-vous vraiment supprimer cette Variable de Modèle et toutes ses valeurs enregistrées?';
$_lang["confirm_delete_user"] = 'Voulez-vous vraiment supprimer cet Utilisateur?';

$_lang["delete_yourself"] = 'Vous ne pouvez pas vous supprimer vous-même.';
$_lang["delete_last_admin"] = 'Vous ne pouvez pas supprimer le dernier administrateur.';

$_lang["confirm_delete_permission"] = 'Êtes-vous sûr de vouloir supprimer cette autorisation ?';
$_lang["confirm_duplicate_record"] = 'Voulez-vous vraiment dupliquer cet enregistrement?';
$_lang["confirm_empty_trash"] = 'Vous allez supprimer de manière permanente TOUTES les Ressources que vous avez mis à la corbeille!\n\nVoulez-vous vraiment continuer?';
$_lang["confirm_load_depends"] = 'Voulez-vous vraiment charger la page du Gestionnaire des Dépendances sans enregistrer vos modifications?';
$_lang["confirm_name_change"] = 'La modification du nom d\'un utilisateur peut avoir un impact sur d\'autres applications liées au Gestionnaire de Contenu.\n\nVoulez-vous vraiment modifier le nom de cet utilisateur?';
$_lang["confirm_publish"] = '\n\nSi vous publiez cette Ressource maintenant, vous en supprimerez toutes les dates de (dé)publication ayant été définies. Si vous souhaitez définir ou modifier les dates de (dé)publication, veuillez plutôt choisir de «Modifier» la Ressource.\n\nVoulez-vous vraiment continuer?';
$_lang["confirm_remove_locks"] = 'Les utilisateurs ferment parfois leur navigateur alors qu\'ils modifient des Ressources, Modèles, Snippets ou analyseurs. Ils laissent ainsi parfois verrouillé l\'Élément en cours d\'édition. En cliquant sur OK, vous pouvez enlever TOUS les verrous actuellement en place.\n\nVoulez-vous vraiment continuer?';
$_lang["confirm_reset_sort_order"] = 'Êtes-vous sûr de vouloir réinitialiser \"trier ordre/index\" de tous les éléments listés à 0 ?';
$_lang["confirm_resource_duplicate"] = 'Voulez-vous vraiment dupliquer cette Ressource?\nLes éléments qu\'elle contient seront également dupliqués.';
$_lang["confirm_setting_language_change"] = 'Vous avez modifié la valeur par défaut et allez perdre vos modifications. Voulez-vous continuer?';
$_lang["confirm_unblock"] = 'Voulez-vous vraiment débloquer cet utilisateur?';
$_lang["confirm_undelete"] = '\n\nToutes les Ressources enfants supprimées avec cette Ressource seront rétablies, mais les Ressources enfants supprimées plus tôt seront encore marquées comme supprimées.';
$_lang["confirm_unpublish"] = '\n\nSi vous dépubliez cette Ressource maintenant, vous en supprimerez toutes les dates de (dé)publication ayant été définies. Si vous souhaitez définir ou modifier les dates de (dé)publication, veuillez plutôt choisir de «Modifier» la Ressource.\n\nVoulez-vous vraiment continuer?';
$_lang["confirm_unzip_file"] = 'Voulez-vous vraiment décompresser ce fichier?\n\nLes fichiers existants seront écrasés.';

$_lang["could_not_find_user"] = 'Impossible de trouver cet utilisateur';

$_lang["create_folder_here"] = 'Créer un Conteneur ici';
$_lang["create_resource_here"] = 'Créer une Ressource ici';
$_lang["create_resource_title"] = 'Créer une Ressource';
$_lang["create_weblink_here"] = 'Créer un Lien Web ici';
$_lang["createdon"] = 'Date de création';
$_lang["create_new"] = 'Créer un nouveau';

$_lang["credits"] = 'Crédits';
$_lang["credits_shouts_msg"] = 'EVO est développé et maintenu par <a href="https://evo-cms.com//" target="_blank">evo-cms.com</a>.</p>';
$_lang["custom_contenttype_message"] = 'Vous pouvez ajouter ici des types de contenu personnalisés pour vos Ressources. Pour ajouter un nouveau type, saisissez-le dans le champ, puis cliquez sur le bouton «Ajouter».';
$_lang["custom_contenttype_title"] = 'Types de contenu personnalisés:';

$_lang["database_charset"] = 'Jeu de caractères de la base de données';
$_lang["database_collation"] = 'Collation de la base de données';
$_lang["database_name"] = 'Nom de la base de données';
$_lang["database_overhead"] = '<b style="color:#990033;">NOTE:</b> L\'overhead est un espace réservé par MySQL et qui est inutilisé. Pour libérer cet espace, cliquez sur le chiffre dans la colonne overhead.';
$_lang["database_server"] = 'Serveur de la base de données';
$_lang["database_table_clickbackup"] = 'pour sauvegarder et télécharger les tables sélectionnées.';
$_lang["database_table_clickhere"] = 'Cliquez ici';
$_lang["database_table_datasize"] = 'Taille';
$_lang["database_table_droptablestatements"] = 'Générer les déclarations DROP TABLE.';
$_lang["database_table_effectivesize"] = 'Taille réelle';
$_lang["database_table_indexsize"] = 'Taille de l\'index';
$_lang["database_table_overhead"] = 'Overhead';
$_lang["database_table_records"] = 'Enregistrements';
$_lang["database_table_tablename"] = 'Nom de la table';
$_lang["database_table_totals"] = 'Totaux:';
$_lang["database_table_totalsize"] = 'Taille totale';
$_lang["database_tables"] = 'Tables de la base de données';
$_lang["database_version"] = 'Version de la base de données:';

$_lang["date"] = 'Date';
$_lang["datechanged"] = 'Date de modification';
$_lang["datepicker_offset"] = 'Décalage du contrôle de saisie de la date: ';
$_lang["datepicker_offset_message"] = 'Le nombre d\'années dans le passé à montrer sur le contrôle de saisie de la date.';
$_lang["datetime_format"] = 'Format de la date:';
$_lang["datetime_format_message"] = 'Le format des dates dans le Gestionnaire.';

$_lang["default"] = 'Par défaut:';
$_lang["defaultcache_message"] = 'Choisissez «Oui» pour que les nouvelles Ressources soient mises en cache par défaut.';
$_lang["defaultcache_title"] = 'À mettre en cache par défaut';
$_lang["defaultmenuindex_message"] = 'Choisissez «Oui» pour activer l\'auto-incrémentation de l\'index de menu par défaut.';
$_lang["defaultmenuindex_title"] = 'Auto-incrémentation de l\'index de menu';
$_lang["defaultpublish_message"] = 'Choisissez «Oui» pour que toutes les nouvelles Ressources soient publiées par défaut.';
$_lang["defaultpublish_title"] = 'Publié par défaut';
$_lang["defaultsearch_message"] = 'Choisissez «Oui» pour rendre toutes les nouvelles Ressources recherchables par défaut.';
$_lang["defaultsearch_title"] = 'Recherchable par défaut';
$_lang["defaulttemplate_message"] = 'Sélectionnez le Modèle que vous souhaitez utiliser par défaut pour les nouvelles Ressources. Vous pourrez choisir un Modèle différent lors de la modification de la Ressource. Ce réglage indique simplement le Modèle sélectionné initialement.';
$_lang["defaulttemplate_title"] = 'Modèle par défaut';
$_lang["defaulttemplate_logic_title"] = 'Assignation automatique du template';
$_lang["defaulttemplate_logic_general_message"] = 'Les nouvelles ressources auront les templates suivants, en prenant ceux des niveaux supérieurs si non trouvés:';
$_lang["defaulttemplate_logic_system_message"] = '<strong>Système</strong>: le template système par défaut.';
$_lang["defaulttemplate_logic_parent_message"] = '<strong>Parent</strong>: le même template que le template du parent.';
$_lang["defaulttemplate_logic_sibling_message"] = '<strong>Frères</strong>: le même template que les autres ressources du conteneur.';

$_lang["delete"] = 'Supprimer';
$_lang["delete_resource"] = 'Supprimer la Ressource';
$_lang["delete_tags"] = 'Supprimer les balises';
$_lang["deleting_file"] = 'Suppression du fichier `%s`: ';
$_lang["description"] = 'Description';
$_lang["deselect_keywords"] = 'Supprimer les mots-clés';
$_lang["deselect_metatags"] = 'Retirer les balises META';
$_lang["disabled"] = 'Désactivé';
$_lang["doc_data_title"] = 'Afficher les données de la Ressource';
$_lang["documentation"] = 'Documentation';

$_lang["duplicate"] = 'Dupliquer';
$_lang["duplicate_alias_found"] = 'La Ressource «%s» utilise déjà l\'alias «%s». Veuillez entrer un alias unique.';
$_lang["duplicate_template_alias_found"] = 'Le modèle \'%s\' utilise déjà l’alias d’URL \'%s\'. Veuillez utiliser un alias unique.';
$_lang["duplicate_alias_message"] = 'Choisissez «Oui» pour autoriser la création d\'alias identiques. <b>NOTE: Pour éviter des problèmes de référencement des Ressources, cette option ne doit être activée que si l\'option «Chemin d\'accès pour les alias simples» est également activée.</b>';
$_lang["duplicate_alias_title"] = 'Autoriser les doublons d\'alias:';
$_lang["duplicate_name_found_general"] = 'Il existe déjà un %s appelé «%s». Veuillez entrer un nom unique.';
$_lang["duplicate_name_found_module"] = 'Il existe déjà un Module appelé «%s». Veuillez entrer un nom unique.';
$_lang["duplicated_el_suffix"] = 'Dupliquer';

$_lang["edit"] = 'Modifier';
$_lang["edit_resource"] = 'Modifier la Ressource';
$_lang["edit_resource_title"] = 'Créer/modifier une Ressource';
$_lang["edit_settings"] = 'Configuration';
$_lang["editedon"] = 'Date de modification';
$_lang["editing_file"] = 'Modification du fichier: ';
$_lang["editor_css_path_message"] = 'Entrez le chemin du fichier CSS que vous souhaitez utiliser dans l\'éditeur. La meilleure façon de saisir le chemin est de le définir à partir de la racine de votre serveur, par exemple /assets/site/style.css. Si vous ne souhaitez pas charger de feuille de style dans l\'éditeur, laissez ce champ vide.';
$_lang["editor_css_path_title"] = 'Chemin vers le fichier CSS:';

$_lang["email"] = 'Email';
$_lang["email_sent"] = 'Email envoyé';
$_lang["email_unique"] = 'Cet email est déjà utilisé !';
$_lang["emailsender_message"] = 'Indiquez l\'adresse email à utiliser pour envoyer aux nouveaux utilisateurs leurs login et mot de passe.';
$_lang["emailsender_title"] = 'Adresse email:';
$_lang["emailsubject_default"] = 'Vos identifiants de connexion';
$_lang["emailsubject_message"] = 'Entrez ici le sujet du message envoyé par email aux nouveaux utilisateurs.';
$_lang["emailsubject_title"] = 'Sujet de l\'email:';

$_lang["empty_folder"] = 'Ce Conteneur est vide';
$_lang["empty_recycle_bin"] = 'Vider la corbeille';
$_lang["empty_recycle_bin_empty"] = 'La corbeille ne contient aucune Ressource à purger.';
$_lang["enable_resource"] = 'Activer le fichier d\'Élément.';
$_lang["enable_sharedparams"] = 'Activer le partage des paramètres';
$_lang["enable_sharedparams_msg"] = '<b>NOTE:</b> L\'identifiant unique global (GUID) ci-dessus ne sera utilisé que pour distinguer ce Module et ses paramètres partagés. Le GUID est également utilisé pour former un lien entre le Module et les Plugins ou Snippets qui accèdent à ses paramètres partagés. ';
$_lang["enabled"] = 'Activé';
$_lang["error"] = 'Erreur';
$_lang["error_sending_email"] = 'Erreur durant l\'envoi de l\'email';
$_lang["errorpage_message"] = 'Entrez ici l\'ID d\'une Ressource – publiée et accessible publiquement – que vous souhaitez afficher aux utilisateurs s\'ils font appel à une Ressource inexistante.';
$_lang["errorpage_title"] = 'Page d\'erreur:';
$_lang["event_id"] = 'ID événement';
$_lang["eventlog"] = 'Historique des événements';
$_lang["eventlog_msg"] = 'L\'historique des événements est utilisé pour afficher des informations, des messages d\'avertissements ou d\'erreurs générés par le Gestionnaire de Contenu. La colonne «source» indique la section d\'où provient le message.';
$_lang["eventlog_viewer"] = 'Événements système';
$_lang["everybody"] = 'Tout le monde';
$_lang["existing_category"] = 'Catégorie existante';
$_lang["expand_tree"] = 'Développer l\'Arbre du Site';
$_lang["failed_login_message"] = 'Précisez ici le nombre de tentatives de connexion infructueuses avant qu\'un utilisateur ne soit bloqué.';
$_lang["failed_login_title"] = 'Tentatives de connexion infructueuses:';
$_lang["fe_editor_lang_message"] = 'Choisissez une langue pour l\'éditeur (utilisé pour l\'édition en ligne, côté Front-end).';
$_lang["fe_editor_lang_title"] = 'Langue de l\'éditeur Front-End:';

$_lang["filemanager_path_message"] = 'Souvent, IIS ne remplit pas correctement le réglage document_root, qui est utilisé par le Gestionnaire de Fichiers pour déterminer ce que vous pouvez voir. Si vous rencontrez des problèmes avec le Gestionnaire de Fichiers, assurez-vous que ce chemin pointe bien vers la racine de votre installation EVO.';
$_lang["filemanager_path_title"] = 'Chemin du Gestionnaire de Fichiers:';

$_lang["folder"] = 'Répertoire';
$_lang["forgot_password_email_fine_print"] = '* L\'URL ci-dessus expirera dès que vous changerez votre mot de passe, ou à défaut, le jour suivant.';
$_lang["forgot_password_email_instructions"] = 'A partir d\'ici, vous serez en mesure de changer votre mot de passe depuis le menu Mon Compte';
$_lang["forgot_password_email_intro"] = 'Une demande de changement de mot de passe a été émise pour votre compte utilisateur.';
$_lang["forgot_password_email_link"] = 'Cliquez ici pour finaliser le changement de mot de passe.';
$_lang["forgot_your_password"] = 'Mot de passe oublié ?';
$_lang["friendly_alias_message"] = 'Si vous utilisez les URLs simples et si la Ressource possède un alias, l\'alias aura toujours la priorité sur l\'ID de la Ressource. En spécifiant «Oui» pour ce réglage, le préfixe et le suffixe de l\'URL seront appliqués à l\'alias. Par exemple, si votre Ressource avec l\'ID 1 possède l\'alias "introduction" et si le préfixe est "" (vide) et le suffixe ".html", l\'URL générée pour cette Ressource sera "introduction.html". Si la Ressource ne possède pas d\'alias, l\'URL deviendra "1.html".';
$_lang["friendly_alias_title"] = 'Utiliser les alias simples:';
$_lang["friendlyurls_message"] = 'Utiliser des URLs compatibles avec les moteurs de recherche, sur un serveur Apache ou IIS équipé des plugins adéquats. Pour plus d\'informations, consultez le fichier .htaccess inclus dans la distribution.';
$_lang["friendlyurls_title"] = 'Utiliser les URLs simples:';
$_lang["friendlyurlsprefix_message"] = 'Si le préfixe est "page", l\'URL "/index.php?id=2" sera transformée en l\'URL simple "/page2.html" (pour autant que le suffixe soit .html).';
$_lang["friendlyurlsprefix_title"] = 'Préfixe des URLs simples:';
$_lang["friendlyurlsuffix_message"] = 'Tous les suffixes fonctionnent, y compris l\'absence de suffixe. En indiquant ".aspx", toutes vos URLs simples se termineront par .aspx.';
$_lang["friendlyurlsuffix_title"] = 'Suffixe des URLs simples:';
$_lang["functionnotimpl"] = 'Désolé!';
$_lang["functionnotimpl_message"] = 'Cette fonction n\'a pas encore été implémentée.';
$_lang["further_info"] = 'Informations complémentaires';
$_lang["global_tabs"] = 'Onglets généraux';
$_lang["go"] = 'Exécuter';
$_lang["group_access_permissions"] = 'Accès des Groupes d\'Utilisateurs';
$_lang['group_tvs'] = 'Groupe de TV';
$_lang["guid"] = 'GUID';
$_lang["help"] = 'Aide';
$_lang["help_msg"] = '<p>Vous pouvez obtenir de l\'aide en <a href="http://forums.modx.com" target="_blank">consultant les forums de EVO. Il existe également <a href="http://rtfm.modx.com/evolution/1.0" target="_blank">une documentation et des guides pour EVO qui abordent tous les aspects de l\'utilisation de EVO.</p><p>De plus, nous proposerons bientôt des offres de support commercial. Veuillez <a href="mailto:hello@modx.com?subject=MODX Commercial Support Inquiry">nous envoyer un email si vous êtes intéressés</a>.';
$_lang["help_title"] = 'Aide';
$_lang["hide_tree"] = 'Cacher l\'Arbre du Site';
$_lang["home"] = 'Accueil';

$_lang["icon"] = 'Icône';
$_lang["icon_description"] = 'Class CSS ex. fa&nbsp;fa-star';
$_lang["id"] = 'ID';
$_lang["illegal_parent_child"] = 'Choix du parent:\n\nla Ressource est un enfant de la Ressource sélectionnée.';
$_lang["illegal_parent_self"] = 'Choix du parent:\n\nla Ressource sélectionnée ne peut pas être assignée à elle-même.';
$_lang["images_management"] = 'Gérer les images';
$_lang["import_files_found"] = '<b>%s Ressources trouvées pour importation...</b>';
$_lang["import_params"] = 'Importer les paramètres partagés du Module';
$_lang["import_params_msg"] = 'Vous pouvez importer les paramètres ou réglages d\'un Module en sélectionnant le nom du Module dans le menu déroulant ci-dessus. <b>NOTE:</b> Pour que les Modules apparaissent dans le menu, ce Plugin/Snippet doit faire partie des dépendances du Module et le partage des paramètres doit être activé pour ce Module. ';
$_lang["import_parent_resource"] = 'Ressource parente:';
$_lang["update_tree"] = 'Reconstruisez l\'arbre';
$_lang["update_tree_description"] = '<ul>
                   <li> - Closure table database design pattern rend le travail avec l\'arborescence des documents plus pratique et plus rapide </li>
                     <li> - Si les données de l\'arborescence ne sont pas mises à jour par le biais de modèles, il est possible d\'établir un lien incorrect entre les documents de la base de données. </li>
                     <li> - Cette opération corrige le problème lorsque site_content n\'est pas mis à jour via le modèle (enregistrer, créer) et que les liens (Table de fermeture) ne sont pas mis à jour. </li>
                     <li> - Il est également possible d\'effectuer cette opération en mode CLI via la commande \'php artisan closuretable: rebuild \' </li>
                     </ul>';
$_lang["update_tree_danger"] = 'Si vous disposez de plus de 1000 ressources, il est préférable d’effectuer cette opération en mode CLI en utilisant la commande \'php artisan closuretable: rebuild\'';
$_lang["update_tree_time"] = 'La reconstruction de la table est terminée. Documents traités: <b>%s</b><br>L’importation a pris <b>%s</b> secondes.';
$_lang["info"] = 'Informations';
$_lang["information"] = 'Information';
$_lang["inline"] = 'Élément en ligne';
$_lang["insert"] = 'Insérer';
$_lang["maxImageWidth"] = 'Largeur maximum de l\'image';
$_lang["maxImageHeight"] = 'Hauteur maximum de l\'image';
$_lang["clientResize"] = 'Redimensionner les images côté client.';
$_lang["clientResize_message"] = 'Si cette option est activée, les images seront redimensionnées par le navigateur avant d’être téléchargées sur le serveur.';
$_lang["noThumbnailsRecreation"] = 'Créer uniquement des vignettes lors du téléchargement';
$_lang["noThumbnailsRecreation_message"] = 'Le navigateur de fichiers créera des vignettes uniquement lors du téléchargement ; s\'il n\'y a pas de vignettes pour certaines images, elles ne seront pas créées.';
$_lang["thumbWidth"] = 'Largeur maximum de la miniature';
$_lang["thumbHeight"] = 'Hauteur maximum de la miniature';
$_lang["thumbsDir"] = 'Chemin du répertoire des miniatures';
$_lang["jpegQuality"] = 'Compression JPEG';
$_lang["denyZipDownload"] = 'Interdire le téléchargement des archives ZIP';
$_lang["denyExtensionRename"] = 'Interdire le changement des extensions des fichiers';
$_lang["maxImageWidth_message"] = 'Si la largeur de l\'image est supérieure à cette valeur elle sera automatiquement retaillée. Indiquer 0 pour désactiver ce traitement.';
$_lang["maxImageHeight_message"] = 'Si la hauteur de l\'image est supérieure à cette valeur elle sera automatiquement retaillée. Indiquer 0 pour désactiver ce traitement.';
$_lang["thumbWidth_message"] = 'Largeur maximum de la miniature.';
$_lang["thumbHeight_message"] = 'Hauteur maximum de la miniature.';
$_lang["thumbsDir_message"] = 'Chemin du répertoire des miniatures.';
$_lang["jpegQuality_message"] = 'Niveau de compression JPEG pour les miniatures et les images retaillées';
$_lang["showHiddenFiles"] = 'Afficher les fichiers cachés dans l\'explorateur';
$_lang["keyword"] = 'Mot-clé';
$_lang["keywords"] = 'Mots-clés';
$_lang["keywords_intro"] = 'Pour modifier un mot-clé, entrez un nouveau mot-clé dans le champ à côté du mot-clé à modifier. Pour supprimer un mot-clé, cochez la case «Supprimer» de ce mot-clé. Si vous cochez cette case et modifiez également le mot-clé, celui-ci sera effacé et le changement de nom ne sera pas effectué!';
$_lang["language_message"] = 'Sélectionnez la langue du Gestionnaire de Contenu EVO.';
$_lang["language_title"] = 'Langue:';
$_lang["last_update"] = 'Dernière mise-à-jour';
$_lang["launch_site"] = 'Voir le site';
$_lang["license"] = 'License';
$_lang["link_attributes"] = 'Attributs des liens';
$_lang["link_attributes_help"] = 'Vous pouvez indiquer ici des attributs pour les liens, tels que target=&quot;_blank&quot; or rel=&quot;external&quot;.';
$_lang["list_mode"] = 'Mode liste actif/inactif - permet d\'afficher dans la grille tous les enregistrements.';
$_lang["loading_doc_tree"] = 'Chargement de l\'Arbre du Site...';
$_lang["loading_menu"] = 'Chargement du menu...';
$_lang["loading_page"] = 'Veuillez patienter pendant le chargement de la page...';
$_lang["localtime"] = 'Heure locale';

$_lang["lock_htmlsnippet"] = 'Verrouiller ce Chunk';
$_lang["lock_htmlsnippet_msg"] = 'Seuls les Administrateurs (Rôle ID 1) peuvent modifier ce Chunk.';
$_lang["lock_module"] = 'Verrouiller ce Module';
$_lang["lock_module_msg"] = 'Seuls les Administrateurs (Rôle ID 1) peuvent modifier ce Module.';
$_lang["lock_msg"] = '%s modifie actuellement ce %s. Veuillez patienter jusqu\'à ce que l\'autre utilisateur ait terminé et essayez à nouveau.';
$_lang["lock_plugin"] = 'Verrouiller ce Plugin';
$_lang["lock_plugin_msg"] = 'Seuls les Administrateurs (Rôle ID 1) peuvent modifier ce Plugin.';
$_lang["lock_settings_msg"] = '%s modifie actuellement ces réglages. Veuillez patienter jusqu\'à ce que l\'autre utilisateur ait terminé et essayez à nouveau.';
$_lang["lock_snippet"] = 'Verrouiller ce Snippet';
$_lang["lock_snippet_msg"] = 'Seuls les Administrateurs (Rôle ID 1) peuvent modifier ce Snippet.';
$_lang["lock_template"] = 'Verrouiller ce Modèle';
$_lang["lock_template_msg"] = 'Seuls les Administrateurs (Rôle ID 1) peuvent modifier ce Modèle.';
$_lang["lock_tmplvars"] = 'Verrouiller la Variable de Modèle';
$_lang["lock_tmplvars_msg"] = 'Seuls les Administrateurs (Rôle ID 1) peuvent modifier cette Variable de Modèle.';
$_lang["locked"] = 'Verrouillé';

$_lang["login_allowed_days"] = 'Jours autorisés';
$_lang["login_allowed_days_message"] = 'Choisissez les jours durant lesquels l\'utilisateur a l\'autorisation de se connecter.';
$_lang["login_allowed_ip"] = 'Adresses IP autorisées';
$_lang["login_allowed_ip_message"] = 'Entrez ici les adresses IP d\'où l\'utilisateur a l\'autorisation de se connecter. <b>NOTE: Séparez les différentes adresses IP par une virgule (,)</b>';
$_lang["login_button"] = 'Connexion';
$_lang["login_cancelled_install_in_progress"] = 'L\'installation du site est actuellement en cours. Merci de ré-essayer dans quelques minutes!';
$_lang["login_cancelled_site_was_updated"] = 'Installation/mise à jour effectuée. Veuillez vous connecter à nouveau!';
$_lang["login_captcha_message"] = 'Veuillez saisir le code de sécurité tel qu\'affiché sur le graphique. Si vous ne pouvez pas lire le code, cliquez sur l\'image pour en générer un nouveau ou contactez votre administrateur.';
$_lang["login_homepage"] = 'Connexion page d\'accueil';
$_lang["login_homepage_message"] = 'Entrez l\'ID de la Ressource où envoyer l\'utilisateur après qu\'il se soit connecté. <b>NOTE: Assurez-vous que cet ID est bien celui d\'une Ressource existante et que celle-ci est publiée et accessible par cet utilisateur!</b>';
$_lang["login_message"] = 'Veuillez vous identifier afin d\'accéder au Gestionnaire de Contenu de votre site. Votre login et votre mot de passe sont sensibles à la casse. Entrez-les donc avec précaution!';
$_lang["logo_slogan"] = 'Faire plus avec moins - Gestionnaire de Contenu EVO';
$_lang["logout"] = 'Déconnexion';
$_lang["long_title"] = 'Titre long';

$_lang["manager"] = 'Gestionnaire';
$_lang["manager_lockout_message"] = 'Vous êtes déjà connecté au Gestionnaire de Contenu. Si vous souhaitez fermer votre session, merci de bien vouloir utiliser le bouton «Déconnexion». <br />Pour aller à la page d\'accueil, cliquez sur le bouton «Accueil».';
$_lang["manager_permissions"] = 'Autorisations du Gestionnaire';
$_lang["manager_theme"] = 'Thème du Gestionnaire:';
$_lang["manager_theme_message"] = 'Sélectionnez le Thème pour le Gestionnaire de Contenu.';
$_lang["manager_theme_mode"] = 'Schéma de couleurs :';
$_lang["manager_theme_mode1"] = 'tout est clair';
$_lang["manager_theme_mode2"] = 'l’entête est sombre';
$_lang["manager_theme_mode3"] = 'l’entête et la bare latérale sont sombres';
$_lang["manager_theme_mode4"] = 'tout est sombre';
$_lang['manager_theme_mode_message'] = 'Ce paramètre est utilisé « Par défaut » et peut être remplacé par le gestionnaire lors de l’utilisation du bouton de changement de mode couleur du thème dans l’arborescence des ressources : <i class="fa fa-lg fa-adjust"></i>';
$_lang['manager_theme_mode_title'] = 'Commutateur de mode couleur du thème';

$_lang["meta_keywords"] = 'Balises META et mots-clés';
$_lang["metatag_intro"] = 'Sur cette page, vous pouvez supprimer, créer ou modifier des balises META. Pour associer des balises META à des Ressources, sélectionnez l\'onglet <u>Mots-clés</u> lors de l\'édition de la Ressource, et sélectionnez les balises META et les mots-clés adéquats. Pour ajouter une nouvelle balise, entrez son nom et sa valeur, puis cliquez sur le bouton «Ajouter la balise». Pour modifier une balise, cliquez sur son nom dans la grille de données.';
$_lang["metatag_notice"] = 'Merci de consulter le <a href="http://www.html-reference.com/META.htm" target="_blank">Guide de référence HTML</a> pour plus d\'informations. Liste non exhaustive.';
$_lang["metatags"] = 'Balises META';
$_lang["mgr_access_permissions"] = 'Autorisations d\'accès au Gestionnaire';
$_lang["mgr_login_start"] = 'Ressource de départ';
$_lang["mgr_login_start_message"] = 'Entrez ici l\'ID de la Ressource que vous souhaitez faire afficher à l\'utilisateur une fois qu\'il est connecté au Gestionnaire. <b>NOTE: Assurez-vous que cet ID est bien celui d\'une Ressource existante, que celle-ci est publiée et que cet utilisateur a les autorisations pour y accéder!</b>';

$_lang["mgrlog_action"] = 'Action';
$_lang["mgrlog_actionid"] = 'ID de l\'action';
$_lang["mgrlog_anyall"] = 'Certaines/Toutes';
$_lang["mgrlog_datecheckfalse"] = 'checkdate() a retourné false.';
$_lang["mgrlog_datefr"] = 'Date du';
$_lang["mgrlog_dateinvalid"] = 'Format de date incorrect.';
$_lang["mgrlog_dateto"] = 'Date au';
$_lang["mgrlog_emptysrch"] = 'Votre recherche n\'a donné aucun résultat (aucun "log" ne correspond).';
$_lang["mgrlog_field"] = 'Champ';
$_lang["mgrlog_itemid"] = 'ID de l\'item';
$_lang["mgrlog_itemname"] = 'Nom de l\'item';
$_lang["mgrlog_msg"] = 'Message';
$_lang["mgrlog_noquery"] = 'Aucune recherche effectuée.';
$_lang["mgrlog_qresults"] = 'Résultats de la recherche';
$_lang["mgrlog_query"] = 'Enregistrement des requêtes';
$_lang["mgrlog_query_msg"] = 'Merci d\'effectuer une sélection pour visualiser les logs. Vous pouvez effectuer une sélection par date, mais faites bien attention: les dates saisies ne sont pas inclusives – pour sélectionner les logs du 1/1/2004 vous devez sélectionner les logs du 1/1/2004 au 2/1/2004.<br /><br />Message et action ont habituellement les mêmes valeurs. Si vous recherchez un message spécifique, il vaut mieux sélectionner l\'action sur «Certaines/Toutes».';
$_lang["mgrlog_results"] = 'Nombre de résultats';
$_lang["mgrlog_searchlogs"] = 'Rechercher les logs';
$_lang["mgrlog_sortinst"] = 'Vous pouvez trier les tables en cliquant sur l\'en-tête de colonne. Si les logs deviennent trop volumineux, vous pouvez <a href="index.php?a=55">les vider</a>. Cela supprimera tous les logs et ne pourra pas être annulé!';
$_lang["mgrlog_time"] = 'Heure';
$_lang["mgrlog_user"] = 'Utilisateur';
$_lang["mgrlog_username"] = 'Nom d\'utilisateur';
$_lang["mgrlog_value"] = 'Valeur';
$_lang["mgrlog_view"] = 'Voir les logs du Gestionnaire';

$_lang["modx_news"] = 'Annonces d\'actualité de EVO';
$_lang["modx_news_tab"] = 'Actualités EVO';
$_lang["modx_news_title"] = 'Actualités de EVO';
$_lang["modx_security_notices"] = 'Bulletins de sécurité EVO';
$_lang["modx_version"] = 'Version de EVO';

$_lang["name"] = 'Nom';

$_lang["no"] = 'Non';
$_lang["no_active_users_found"] = 'Aucun utilisateur actif trouvé.';
$_lang["no_activity_message"] = 'Vous n\'avez pas encore créé ou modifié de Ressources.';
$_lang["no_category"] = 'Non catégorisé';
$_lang["no_docs_pending_publishing"] = 'Aucune Ressource en attente de publication.';
$_lang["no_docs_pending_pubunpub"] = 'Aucun Événement trouvé';
$_lang["no_docs_pending_unpublishing"] = 'Aucune Ressource en attente de dépublication.';
$_lang["no_edits_creates"] = 'Aucune édition ou création trouvées.';
$_lang["no_groups_found"] = 'Aucun groupe trouvé.';
$_lang["no_keywords_found"] = 'Le site n\'a actuellement aucun mot-clé.';
$_lang["no_records_found"] = 'Aucun enregistrement trouvé.';
$_lang["no_results"] = 'Aucun résultat trouvé';
$_lang["nologentries_message"] = 'Spécifiez le nombre d\'entrées de l\'historique affichées par page lors de l\'affichage de l\'historique.';
$_lang["nologentries_title"] = 'Nombre d\'entrées de l\'historique:';
$_lang["none"] = 'Aucun';
$_lang["noresults_message"] = 'Entrez ici le nombre de résultats à afficher dans la grille de données lors de l\'affichage de listes et de résultats de recherches.';
$_lang["noresults_title"] = 'Nombre de résultats:';
$_lang["not_deleted"] = 'n\'a pas été supprimé.';
$_lang["not_set"] = 'Non défini';

$_lang["offline"] = 'Hors ligne';

$_lang["online"] = 'En ligne';
$_lang["onlineusers_action"] = 'Action';
$_lang["onlineusers_actionid"] = 'ID de l\'action';
$_lang["onlineusers_ipaddress"] = 'Adresse IP de l\'utilisateur';
$_lang["onlineusers_lasthit"] = 'Dernière requête';
$_lang["onlineusers_message"] = 'La liste ci-dessous affiche les utilisateurs actifs durant les 20 dernières minutes (il est actuellement ';
$_lang["onlineusers_title"] = 'Utilisateurs en ligne';
$_lang["onlineusers_user"] = 'Utilisateur';
$_lang["onlineusers_userid"] = 'ID de l\'utilisateur';

$_lang["optimize_table"] = 'Cliquez ici pour optimiser cette table';

$_lang["page_data_alias"] = 'Alias';
$_lang["page_data_cacheable"] = 'À placer en cache';
$_lang["page_data_cacheable_help"] = 'Ceci autorise la mise en cache de la Ressource. Si votre Ressource contient des Snippets, assurez-vous que cette case ne soit pas cochée.';
$_lang["page_data_cached"] = '<b>Source tirée du cache:</b>';
$_lang["page_data_changes"] = 'Modifications';
$_lang["page_data_contentType"] = 'Type de contenu';
$_lang["page_data_contentType_help"] = 'Sélectionnez le type de contenu de cette Ressource. Si vous n\'êtes pas sûr du type de votre Ressource, sélectionnez simplement text/html.';
$_lang["page_data_created"] = 'Créé le';
$_lang["page_data_edited"] = 'Modifié le';
$_lang["page_data_editor"] = 'Modifier avec l\'éditeur WYSIWYG';
$_lang["page_data_folder"] = 'La Ressource est un Conteneur';
$_lang["page_data_general"] = 'Général';
$_lang["page_data_markup"] = 'Disposition/structure';
$_lang["page_data_mgr_access"] = 'Accès au Gestionnaire';
$_lang["page_data_notcached"] = 'Cette Ressource n\'a pas (encore) été mise en cache.';
$_lang["page_data_publishdate"] = 'Date de publication';
$_lang["page_data_publishdate_help"] = 'Si vous choisissez une date de publication, la Ressource sera publiée lorsque cette date sera atteinte. Cliquez sur l\'icône du calendrier pour choisir une date, ou sur l\'icône à côté pour supprimer la date de publication. Dans ce cas, la Ressource ne sera pas publiée automatiquement.';
$_lang["page_data_published"] = 'Publié';
$_lang["page_data_searchable"] = 'Recherchable';
$_lang["page_data_searchable_help"] = 'Cochez cette case si vous souhaitez que la Ressource puisse être retrouvée par la fonction de recherche. Vous pouvez également utiliser ce champ dans vos Snippets pour une tout autre utilisation.';
$_lang["page_data_source"] = 'Source';
$_lang["page_data_status"] = 'Statut';
$_lang["page_data_template"] = 'Modèle utilisé';
$_lang["page_data_template_help"] = 'Sélectionnez le Modèle à utiliser pour cette Ressource.';
$_lang["page_data_title"] = 'Données de page';
$_lang["page_data_unpublishdate"] = 'Date de fin de publication';
$_lang["page_data_unpublishdate_help"] = 'Si vous choisissez une date de fin de publication, la Ressource sera dépubliée lorsque cette date sera atteinte. Cliquez sur l\'icône du calendrier pour choisir une date, ou sur l\'icône à côté pour supprimer la date de fin de publication. Dans ce cas, la Ressource ne sera pas dépubliée automatiquement.';
$_lang["page_data_unpublished"] = 'Non publié';
$_lang["page_data_web_access"] = 'Accès web';

$_lang["pagetitle"] = 'Titre de la Ressource';
$_lang["pagination_table_first"] = 'Début';
$_lang["pagination_table_gotopage"] = 'Aller à la page';
$_lang["pagination_table_last"] = 'Fin';
$_lang["paging_first"] = 'première';
$_lang["paging_last"] = 'dernière';
$_lang["paging_next"] = 'suivant';
$_lang["paging_prev"] = 'précédent';
$_lang["paging_showing"] = 'Affichées';
$_lang["paging_to"] = 'à';
$_lang["paging_total"] = 'total';
$_lang["parameter"] = 'Paramètre';
$_lang["parse_docblock"] = 'Analyser DocBlock';
$_lang["parse_docblock_msg"] = 'Attention (!): <b>Réinitialise</b> l’actuel nom, configuration, description et categorie pour remplacer par les valeurs par défaut en analysant le code source.';

$_lang["password"] = 'Mot de passe';
$_lang["password_change_request"] = 'Demande de modification de mot de passe';
$_lang["password_confirmed"] = 'Non concordance des mots de passe';
$_lang["password_gen_gen"] = 'Laisser EVO générer un mot de passe.';
$_lang["password_gen_length"] = 'Le mot de passe doit contenir au moins 6 caractères.';
$_lang["password_gen_method"] = 'Nouvelle méthode pour le mot de passe';
$_lang["password_gen_specify"] = 'Me laisser spécifier le mot de passe:';
$_lang["password_method"] = 'Méthode de notification du mot de passe';
$_lang["password_method_email"] = 'Envoyer le nouveau mot de passe par email.';
$_lang["password_method_screen"] = 'Afficher le nouveau mot de passe à l\'écran.';
$_lang["password_msg"] = 'Le nouveau mot de passe de <b>:username</b> est <b>:password</b><br>';

$_lang["php_version_check"] = 'MODX est compatible avec PHP version 7.4 ou ultérieure. Veuillez mettre à jour votre installation de PHP!';

$_lang["preview"] = 'Prévisualiser';
$_lang["preview_msg"] = 'Voici la prévisualisation de vos derniers changements enregistrés. Cliquer ici pour <a href="javascript:;" onclick="saveRefreshPreview();">Enregistrer et Afficher</a> vos modifications actuelles';
$_lang["preview_resource"] = 'Prévisualiser';

$_lang["private"] = 'Privé';
$_lang["public"] = 'Public';
$_lang["publish_date"] = 'Date de publication';
$_lang["publish_events"] = 'Événements de publication';
$_lang["publish_resource"] = 'Publier la Ressource';

$_lang["rb_base_dir_message"] = 'Entrez ici le chemin physique vers le répertoire de l\'Explorateur de Fichiers. Normalement, ce réglage est généré automatiquement. Cependant, si vous utilisez IIS, EVO ne pourra pas détecter le chemin et l\'Explorateur de Fichiers affichera une erreur. Dans ce cas, vous pouvez préciser ici le chemin du répertoire images (le chemin tel que vous le voyez dans l\'explorateur Windows). <b>NOTE:</b> Le répertoire de l\'Explorateur de Fichiers doit contenir les sous-dossiers images, fichiers, flash et media afin que l\'Explorateur de Fichiers puisse fonctionner correctement.';
$_lang["rb_base_dir_title"] = 'Chemin vers le répertoire des fichiers:';
$_lang["rb_base_url_message"] = 'Entrez ici le chemin virtuel vers le répertoire du Gestionnaire de Fichiers. Normalement, ce réglage est généré automatiquement. Cependant, si vous utilisez IIS, EVO ne pourra pas détecter le chemin et l\'Explorateur de Fichiers affichera une erreur. Dans ce cas, vous pouvez saisir ici l\'URL du répertoire images (l\'URL tel que vous la saisiriez dans votre navigateur web).';
$_lang["rb_base_url_title"] = 'URL de l\'Explorateur de Fichiers:';
$_lang["rb_message"] = 'Sélectionnez «Oui» pour activer l\'Explorateur de Fichiers. Une fois activé, vos utilisateurs pourront consulter et télécharger des fichiers, par exemple des images, des fichiers flash et tout autre média sur le serveur.';
$_lang["rb_title"] = 'Activer l\'Explorateur de Fichiers:';
$_lang["rb_webuser_message"] = 'Souhaitez-vous autoriser un Utilisateur Web à utiliser l\'Explorateur de Fichiers? <b>NOTE:</b> Laisser les Utilisateurs Web utiliser l\'Explorateur de Fichiers rend les fichiers disponibles aux Utilisateurs de l\'Explorateur. Utilisez cette option uniquement avec des Utilisateurs Web de confiance.';
$_lang["rb_webuser_title"] = 'Utilisateurs Web?';
$_lang["recent_docs"] = 'Ressources récentes';
$_lang["recommend_setting_change_title"] = 'Changement de configuration recommandé';
$_lang["recommend_setting_change_description"] = 'Votre site n\'est pas configuré pour valider les en-têtes HTTP_REFERER des requêtes provenant du gestionnaire. Nous vous recommandons vivement d\'activer cette option afin de limiter les risques d\'attaques de type CSRF (Cross Site Request Forgery).';
$_lang["references"] = 'Références';
$_lang["refresh_cache"] = 'Cache: <b>%s</b> fichier(s) en cache trouvés et <b>%d</b> d\'entre eux ont été supprimés.<p>De nouveaux fichiers seront mis en cache au fur et à mesure que les pages seront visitées.';
$_lang["refresh_published"] = '<b>%s</b> Ressources ont été publiées.';
$_lang["refresh_site"] = 'Vider le cache';
$_lang["refresh_title"] = 'Recharger le site';
$_lang["refresh_tree"] = 'Recharger l\'Arbre du Site';
$_lang["refresh_unpublished"] = '<b>%s</b> Ressources ont été dépubliées.';
$_lang["release_date"] = 'Date de version';
$_lang["remember_last_tab"] = 'Rappel du dernier onglet:';
$_lang["remember_last_tab_message"] = 'Pages du manager chargées avec le dernier onglet vu plutôt que l\'onglet par défaut';
$_lang["remember_username"] = 'Se souvenir de moi';
$_lang["remove"] = 'Retirer';
$_lang["remove_date"] = 'Retirer la date';
$_lang["remove_locks"] = 'Supprimer les verrous';
$_lang["rename"] = 'Renommer';
$_lang["reports"] = 'Rapports';
$_lang["report_issues"] = 'Signaler des problèmes';
$_lang["required_field"] = 'Le champ :field est requis';
$_lang["require_tagname"] = 'Un nom de balise est requis';
$_lang["require_tagvalue"] = 'Une valeur est requise pour la balise';
$_lang["reserved_name_warning"] = 'Vous avez utilisé un nom réservé.';
$_lang["reset"] = 'Vider';
$_lang["reset_failedlogins"] = 'Mise à zéro';
$_lang["reset_sort_order"] = 'Réinitialiser l’ordre de tri';

$_lang["manager_access_permissions"] = 'Autorisation d\'accès du gestionnaire';
$_lang["manage_groups"] = 'Gérer les documents et les groupes d\'utilisateurs';
$_lang["manage_document_permissions"] = 'Gérer les autorisations des documents';
$_lang["manage_module_permissions"] = 'Gérer les autorisations de modules';
$_lang["manage_tv_permissions"] = 'Gérer les autorisations des TV';

$_lang["rss_url_news_default"] = 'https://github.com/evocms-community/evolution/releases.atom';
$_lang["rss_url_news_message"] = 'Entrez l\'URL du flux pour les actualités EVO.';
$_lang["rss_url_news_title"] = 'Flux RSS des actualités';
$_lang["rss_url_security_default"] = 'https://github.com/extras-evolution/security-fix/releases.atom';
$_lang["rss_url_security_message"] = 'Entrez l\'URL du flux pour les bulletins de sécurité EVO.';
$_lang["rss_url_security_title"] = 'Flux RSS des bulletins de sécurité';

$_lang["run_module"] = 'Lancer le Module';
$_lang["save"] = 'Enregistrer';
$_lang["save_all_changes"] = 'Enregistrer tous les changements';
$_lang["save_tag"] = 'Enregistrer la balise';
$_lang["saving"] = 'En cours d\'enregistrement, veuillez patienter...';

$_lang["search"] = 'Recherche';
$_lang["search_criteria"] = 'Critères de recherche';
$_lang["search_criteria_content"] = 'Recherche par contenu';
$_lang["search_criteria_content_msg"] = 'Rechercher les Ressources dont le contenu contient ce texte';
$_lang["search_criteria_id"] = 'Recherche par ID';
$_lang["search_criteria_id_msg"] = 'Entrez l\'ID d\'une Ressource pour la localiser rapidement';
$_lang["search_criteria_top"] = 'Recherche dans les principaux champs';
$_lang["search_criteria_top_msg"] = 'Pagetitle, Longtitle, Alias, ID';
$_lang["search_criteria_template_id"] = 'Search by template ID';
$_lang["search_criteria_template_id_msg"] = 'Find all Resources using the specified template.';
$_lang["search_criteria_url_msg"] = 'Trouvez la ressource par son URL exacte.';
$_lang["search_criteria_longtitle"] = 'Recherche par titre long';
$_lang["search_criteria_longtitle_msg"] = 'Rechercher les Ressources dont le titre long contient ce texte';
$_lang["search_criteria_title"] = 'Recherche par titre';
$_lang["search_criteria_title_msg"] = 'Rechercher les Ressources dont le titre contient ce texte';
$_lang["search_empty"] = 'Votre recherche n\'a donné aucun résultat. Veuillez essayer de nouveau en élargissant vos critères de recherche.';
$_lang["search_item_deleted"] = 'Cet enregistrement a été supprimé';
$_lang["search_results"] = 'Résultats de recherche';
$_lang["search_results_returned_desc"] = 'Description';
$_lang["search_results_returned_id"] = 'ID';
$_lang["search_results_returned_msg"] = 'Vos critères de recherche ont permis de trouver <b>%s</b> Ressources. Si un trop grand nombre de fichiers sont trouvés, essayez de choisir des critères plus spécifiques.';
$_lang["search_results_returned_title"] = 'Titre';
$_lang["search_view_docdata"] = 'Afficher cet Élément';

$_lang["security"] = 'Sécurité';
$_lang["security_notices_tab"] = 'Annonces de sécurité';
$_lang["security_notices_title"] = 'Annonces de sécurité';

$_lang["select_date"] = 'Choisir une date';
$_lang["send"] = 'Envoyer';
$_lang["server_protocol_http"] = 'http';
$_lang["server_protocol_https"] = 'https';
$_lang["server_protocol_message"] = 'Si votre site est sur un serveur sécurisé (HTTPS), veuillez l\'indiquez ici.';
$_lang["server_protocol_title"] = 'Type de serveur:';
$_lang["serveroffset"] = 'Décalage horaire du serveur';
$_lang["serveroffset_message"] = 'Choisissez le nombre d\'heures de décalage entre le lieu où vous êtes et celui où se trouve le serveur. L\'heure sur le serveur est actuellement <b>[%s]</b>, l\'heure sur le serveur en tenant compte du décalage est <b>[%s]</b>.';
$_lang["serveroffset_title"] = 'Décalage horaire du serveur:';
$_lang["servertime"] = 'Heure du serveur';
$_lang["set_automatic"] = 'Régler automatiquement';
$_lang["set_default"] = 'Définir la valeur par défaut';
$_lang["set_default_all"] = 'Définir les valeurs par défaut';

$_lang["settings_after_install"] = 'Puisqu\'il s\'agit d\'une nouvelle installation, vous devez contrôler ces réglages et effectuer les modifications nécessaires. Cliquez ensuite sur «Enregistrer» afin de sauvegarder les réglages dans la base de données.';
$_lang["settings_config"] = 'Configuration';
$_lang["settings_dependencies"] = 'Dépendances';
$_lang["settings_events"] = 'Événements système';
$_lang["settings_furls"] = 'URLs simples';
$_lang["settings_general"] = 'Général';
$_lang["settings_group_tv_message"] = 'Choisissez si les variables de modèle doivent être regroupées en sections ou en onglets (nommés par catégorie TV) lors de l’édition d\'une ressource';
$_lang["settings_group_tv_options"] = 'Non,Sections dans l\'onglet Général,Onglets dans l\'onglet Général,Sections dans un nouvel onglet,Onglets dans un nouvel onglet,Nouveaux onglets';
$_lang["settings_misc"] = 'Gestionnaire de Fichiers';
$_lang["settings_security"] = 'Sécurité';
$_lang["settings_KC"] = 'File Browser';
$_lang["settings_page_settings"] = 'Réglages de la page';
$_lang["settings_photo"] = 'Photo';
$_lang["settings_properties"] = 'Propriétés';
$_lang["settings_site"] = 'Site';
$_lang["settings_strip_image_paths_message"] = 'L\'activation de cette option permet à EVO de changer les liens vers les images et les fichiers en chemins relatifs au lieu de chemins absolus. C\'est très pratique si vous souhaitez déplacer votre installation de EVO (par exemple d\'un site en développement à un site en production). Si vous ne savez pas de quoi il s\'agit, il est préférable de ne pas l\'activer.';
$_lang["settings_strip_image_paths_title"] = 'Chemins relatifs?';
$_lang["settings_templvars"] = 'Variables de Modèle';
$_lang["settings_title"] = 'Configuration du système';
$_lang["settings_ui"] = 'Interface et fonctionnalités';
$_lang["settings_users"] = 'Utilisateur';
$_lang["settings_email_templates"] = 'Email & Modèles';

$_lang["show_fullscreen_btn_message"] = 'Afficher le bouton Basculer en plein écran dans le menu';
$_lang["show_newresource_btn_message"] = 'Afficher le bouton Nouvelle ressource dans le menu';
$_lang["settings_show_picker_message"] = 'Personnaliser le thème du gestionnaire et enregistrer en local';
$_lang["show_fullscreen_btn"] = 'Bouton Basculer en plein écran';
$_lang["show_newresource_btn"] = 'Boutton Nouvelle ressource';

$_lang["show_meta"] = 'Afficher l\'onglet Balises META et mots-clés:';
$_lang["show_meta_message"] = 'Afficher l\'onglet de gestion des balises META et des mots-clés lors de l\'édition des Ressources.';
$_lang["show_tree"] = 'Afficher l\'Arbre du Site';
$_lang["show_picker"] = 'Afficher le sélecteur de couleur';
$_lang["showing"] = 'Affichage';
$_lang["signupemail_message"] = 'Entrez ici le message envoyé à vos utilisateurs lors de la création de leur compte, y compris le nom d\'utilisateur et le mot de passe. <br /><b>NOTE:</b> Les Placeholders suivants seront remplacés par le Gestionnaire de Contenu lorsque le message sera envoyé: <br /><br />[+sname+] - Nom du site web, <br />[+saddr+] - L\'adresse email principale du site web, <br />[+surl+] - L\'URL du site, <br />[+uid+] - Nom d\' utilisateur ou ID de l\'utilisateur, <br />[+pwd+] - Mot de passe de l\'utilisateur, <br />[+ufn+] - Nom complet de l\'utilisateur. <br /><br /><b>Ne retirez pas les champs [+uid+] et [+pwd+] du message, sans quoi le nom d\'utilisateur et le mot de passe ne seront pas envoyés et vos utilisateurs ne pourront pas se connecter!</b>';
$_lang["signupemail_title"] = 'Email d\'inscription:';
$_lang["site"] = 'Site';
$_lang["site_schedule"] = 'Programme du site';
$_lang["sitename_message"] = 'Entrez ici le nom de votre site.';
$_lang["sitename_title"] = 'Nom du site:';
$_lang["sitestart_message"] = 'Entrez ici l\'ID de la Ressource que vous souhaitez utiliser comme page d\'accueil. <b>NOTE: Assurez-vous que cet ID est bien celui d\'une Ressource existante et que celle-ci est publiée!</b>';
$_lang["sitestart_title"] = 'Accueil du site:';
$_lang["sitestatus_message"] = 'Choisissez «En ligne» pour publier votre site sur le web. Si vous choisissez «Hors ligne», vos visiteurs se verront afficher le message d\'indisponibilité et ne pourront pas visiter le site.';
$_lang["sitestatus_title"] = 'Statut du site:';
$_lang["siteunavailable_message"] = 'Ce message est affiché lorsque le site est hors ligne ou si une erreur se produit. <b>NOTE: Ce message ne sera affiché que si l\'option «Page site indisponible» n\'est pas activée.</b>';
$_lang["siteunavailable_message_default"] = 'Le site est actuellement indisponible.';
$_lang["siteunavailable_page_message"] = 'Entrez ici l\'ID de la Ressource que vous souhaitez utiliser comme page à afficher lorsque le site est indisponible. <b>NOTE: Assurez-vous que cet ID appartient à une Ressource existante et que celle-ci est publiée!</b>';
$_lang["siteunavailable_page_title"] = 'Page site indisponible:';
$_lang["siteunavailable_title"] = 'Message d\'indisponibilité:';
$_lang["controller_namespace"] = 'Contrôleur Espace de noms';
$_lang["controller_namespace_message"] = 'Spécifiez l’Espace de noms complet à partir duquel sont gérés les contrôleurs, par exemple : <b>EvolutionCMS\\Main\\Controllers\\</b>';
$_lang["update_repository"] = 'Chemin du dépôt GitHub';
$_lang["update_repository_message"] = 'Renseignez le chemin du dépôt GitHub par exemple : <b>evocms-community/evolution</b>';

$_lang["sort_alphabetically"] = 'Trier par ordre alphabétique';
$_lang["sort_asc"] = 'Ascendant';
$_lang["sort_desc"] = 'Descendant';
$_lang["sort_menuindex"] = 'Trier par index de menu';
$_lang["sort_tree"] = 'Trier';
$_lang['sort_updating'] = 'Mise à jour…';
$_lang['sort_updated'] = 'Mis à jour !';
$_lang['sort_nochildren'] = 'Parent n’ayant pas d’enfants';
$_lang["sort_elements_msg"] = 'Faites glisser pour réorganiser les éléments listés.';

$_lang["source"] = 'Source';
$_lang["stay"] = 'Continuer l\'édition';
$_lang["stay_new"] = 'Ajouter un autre';
$_lang["submit"] = 'Envoyer';
$_lang["sys_alert"] = 'Alerte système';
$_lang["sysinfo_activity_message"] = 'Cette liste affiche les Ressources ayant été récemment éditées par vos utilisateurs.';
$_lang["sysinfo_userid"] = 'Utilisateur';
$_lang["system"] = 'Système';
$_lang["system_email_signup"] = 'Bonjour [+uid+]

Voici vos paramètres de connexion pour le Gestionnaire de Contenu de [+sname+]:

Nom d\'utilisateur: [+uid+]
Mot de passe: [+pwd+]

Une fois connecté au Gestionnaire de Contenu ([+surl+]), vous pourrez changer votre mot de passe.

Salutations, 
L\'administrateur du site';
$_lang["system_email_webreminder"] = 'Bonjour [+uid+]\n\nPour activer votre nouveau mot de passe, cliquez sur le lien suivant:\n\n[+surl+]\n\nSi tout se passe normalement, vous pourrez utiliser le mot de passe suivant pour vous identifier:\n\nMot de passe:[+pwd+]\n\nSi vous n\'aviez pas demandé cet email, alors n\'en tenez pas compte.\n\nSalutations,\nL\'administrateur du site';
$_lang["system_email_websignup"] = 'Bonjour [+uid+] \n\nVoici vos paramètres de connexion pour [+sname+]:\n\nNom d\'utilisateur: [+uid+]\nMot de passe: [+pwd+]\n\nUne fois connecté en tant que [+sname+] ([+surl+]), vous pourrez changer votre mot de passe.\n\nSalutations,\nL\'administrateur du site';
$_lang["table_hoverinfo"] = 'Passez le curseur de la souris sur un nom de table pour voir une courte description de sa fonction (toutes les tables n\'en disposent pas).';
$_lang["table_prefix"] = 'Préfixe de la table';
$_lang["tag"] = 'Balise';

$_lang["to"] = 'à';
$_lang["toggle_fullscreen"] = 'Passer en plein écran';
$_lang["tools"] = 'Outils';
$_lang["top_howmany_message"] = 'Lors de l\'affichage des statistiques, combien d\'enregistrements avec les plus hautes statistiques doivent être affichés dans les listes?';
$_lang["top_howmany_title"] = 'Lignes à afficher';
$_lang["total"] = 'total';
$_lang["track_visitors_message"] = 'Cette case à cocher permet d\'activer ou non un hook pour les Plugins de suivi de statistiques. Ceci peut être utilisé pour contrôler si les visites des pages doivent être comptabilisées.';
$_lang["track_visitors_title"] = 'Activer le Suivi Statistique';
$_lang["tree_page_click"] = 'Comportement du click sur une page:';
$_lang["tree_page_click_message"] = 'Comportement par défaut lorsqu\'on clique sur une page de l\'arborescence.';
$_lang["use_breadcrumbs"] = 'Afficher la navigation';
$_lang["use_breadcrumbs_message"] = 'Afficher la navigation lors de la création ou de la modification d\'une ressource dans le gestionnaire';
$_lang["tree_show_protected"] = 'Afficher les pages protégées:';
$_lang["tree_show_protected_message"] = 'Lorsque cette option est sur «Non», les Ressources protégées (et toutes leurs Ressources enfants) ne seront pas visibles dans l\'Arbre du Site. «Non» est le réglage par défaut pour EVO.';
$_lang["truncate_table"] = 'Cliquez ici pour tronquer cette table';
$_lang["type"] = 'Type';
$_lang["udperms_allowroot_message"] = 'Voulez-vous autoriser vos Utilisateurs à créer de nouvelles Ressources à la racine du site?';
$_lang["udperms_allowroot_title"] = 'Accès racine:';
$_lang["udperms_message"] = 'Contrôlez l\'accès à vos Ressources par le biais des Groupes d\'Utilisateurs et des Groupes de Ressources.';
$_lang["udperms_title"] = 'Utiliser les autorisations d\'accès:';
$_lang["unable_set_link"] = 'Impossible de définir le lien!';
$_lang["unable_set_parent"] = 'Impossible de définir le nouveau parent!';
$_lang["unauthorizedpage_message"] = 'Entrez ici l\'ID d\'une Ressource — existante, publiée et accessible publiquement – que vous souhaitez afficher aux Utilisateurs s\'ils demandent une Ressource sécurisée/non autorisée.';
$_lang["unauthorizedpage_title"] = 'Page non autorisée:';
$_lang["unblock_message"] = 'Une fois ces données enregistrées, cet Utilisateur sera débloqué.';
$_lang["undelete_resource"] = 'Rétablir la Ressource';
$_lang["unpublish_date"] = 'Date de dépublication';
$_lang["unpublish_events"] = 'Dépublication(s)';
$_lang["unpublish_resource"] = 'Dépublier la Ressource';
$_lang["untitled_resource"] = 'Ressource sans titre';
$_lang["untitled_weblink"] = 'Lien Web sans titre';
$_lang["update_params"] = 'Mettre à jour l\'affichage des paramètres';
$_lang["update_settings_from_language"] = 'Remplacer l\'actuel avec:';

$_lang["upload_maxsize_message"] = 'Entrez ici la taille maximale des fichiers pouvant être téléchargés à l\'aide du Gestionnaire de Fichiers. La taille doit être spécifiée en octets. <b>NOTE: Les fichiers volumineux peuvent être longs à télécharger!</b>';
$_lang["upload_maxsize_title"] = 'Taille maximale de téléchargement';
$_lang["uploadable_files_message"] = 'Entrez une liste des types de fichiers pouvant être déposés dans le répertoire \'assets/files/\' via l\'Explorateur de Fichiers. Veuillez entrer les extensions correspondant aux types de fichiers, séparées par des virgules.';
$_lang["uploadable_files_title"] = 'Types de fichiers autorisés:';
$_lang["uploadable_flash_message"] = 'Entrez une liste des types de fichiers pouvant être déposés dans \'assets/flash/\' via l\'Explorateur de Fichiers. Veuillez entrer les extensions pour les fichiers flash, séparées par des virgules.';
$_lang["uploadable_flash_title"] = 'Types flash autorisés:';
$_lang["uploadable_images_message"] = 'Entrez une liste des types de fichiers pouvant être déposés dans \'assets/images/\' via l\'Explorateur de Fichiers. Veuillez entrer les extensions pour les fichiers image, séparées par des virgules.';
$_lang["uploadable_images_title"] = 'Types d\'image autorisés:';
$_lang["uploadable_media_message"] = 'Entrez une liste des types de fichiers pouvant être déposés dans \'assets/media/\' via l\'Explorateur de Fichiers. Veuillez entrer les extensions pour les fichiers multimédia, séparées par des virgules.';
$_lang["uploadable_media_title"] = 'Types de contenu multimédia autorisés:';
$_lang["use_alias_path_message"] = 'Activer cette option génère un chemin virtuel vers la Ressource. Par exemple, si une Ressource "enfant.html" est placée dans un Conteneur "parent", le chemin d\'accès complet sera "/parent/enfant.html".';
$_lang["use_alias_path_title"] = 'Chemin d\'accès pour les alias simples:';
$_lang["use_editor_message"] = 'Voulez-vous activer l\'éditeur WYSIWYG. Ce paramètre s\'applique à toutes les Ressources, mais peut être redéfini dans les paramètres utilisateurs.';
$_lang["use_editor_title"] = 'Activer l\'éditeur:';
$_lang["use_global_tabs"] = 'Utiliser les onglets généraux';

$_lang["valid_hostnames_message"] = 'Une liste de nom(s) d\'hôte(s) valide(s) séparé(s) des virgules, aide à prévenir les attaques XSS. Ceci est important pour les serveurs mutualisés qui hébergent plusieurs domaines pour une même adresse IP. Le premier nom d\'hôte sera utilisé si le "HTTP_HOST" ne correspond pas à un nom de serveur valide.';
$_lang["valid_hostnames_title"] = 'Nom(s) d\'hôte(s) valide(s)';
$_lang["validate_referer_message"] = 'Valider les en-têtes HTTP_REFERER réduit le risque que les éditeurs de contenu soient piégés en effectuant des actions non autorisées, en étant victimes d\'attaques CSRF (Cross Site Request Forgery). Si le serveur n\'envoie pas d\'en-tête HTTP_REFERER, il est possible que sur certaines configurations, cette option ne puisse pas être activée.';
$_lang["validate_referer_title"] = 'Valider les en-têtes HTTP_REFERER?';
$_lang["value"] = 'Valeur';
$_lang["version"] = 'Version';
$_lang["view"] = 'Afficher';
$_lang["view_child_resources_in_container"] = 'Afficher les enfants';
$_lang["view_log"] = 'Afficher l\'historique';
$_lang["view_logging"] = 'Actions du Gestionnaire';
$_lang["view_sysinfo"] = 'Informations système';
$_lang["warning"] = 'Attention!';
$_lang["warning_not_saved"] = 'Les changements que vous avez effectués n\'ont pas encore été enregistrés. Vous pouvez choisir de rester sur cette page pour enregistrer vos modifications («Annuler»), ou vous pouvez quitter cette page, et perdrez ainsi toutes les modifications que vous avez effectuées («OK»).';
$_lang["warning_visibility"] = 'Visibilité des alertes de configuration:';
$_lang["warning_visibility_message"] = 'Contrôle la visibilité des alertes de configuration montrées sur la page d\'accueil du Manager';
$_lang["web_access_permissions"] = 'Autorisations d\'accès web';
$_lang["web_access_permissions_user_groups"] = 'Groupes d\'Utilisateurs Web';
$_lang["web_permissions"] = 'Autorisations Web';
$_lang["web_user_management_msg"] = 'Choisissez quel Utilisateur Web vous souhaitez modifier. Les Utilisateurs Web sont ceux qui ne peuvent se connecter que sur le site web.';
$_lang["web_user_management_title"] = 'Gestion des Utilisateurs Web';
$_lang["web_user_management_select_role"] = 'Tous les rôles';
$_lang["web_user_title"] = 'Créer/modifier un Utilisateur Web';
$_lang["web_users"] = 'Utilisateurs Web';
$_lang["weblink"] = 'Lien Web';
$_lang["webpwdreminder_message"] = 'Entrez ici le message envoyé à vos Utilisateurs Web lorsqu\'ils demandent un nouveau mot de passe. Le Gestionnaire de Contenu leur enverra un message avec leur nouveau mot de passe et les informations d\'activation. <br /><b>NOTE:</b> Le Gestionnaire de Contenu remplacera les Placeholders suivants avant l\'envoi du message: <br /><br />[+sname+] - Nom de votre site web, <br />[+saddr+] - Adresse email du site web, <br />[+surl+] - URL de votre site web, <br />[+uid+] - Nom d\'utilisateur ou ID, <br />[+pwd+] - Mot de passe, <br />[+ufn+] - Nom complet de l\'utilisateur. <br /><br /><b>Ne pas retirer les Placeholders [+uid+] et [+pwd+] du message, sans quoi le nom d\'utilisateur et le mot de passe ne seront pas envoyés et vos Utilisateurs ne pourront pas se connecter!</b>';
$_lang["webpwdreminder_title"] = 'Message pour un nouveau mot de passe:';
$_lang["websignupemail_message"] = 'Entrez ici le message envoyé à vos Utilisateurs Web lorsque vous leur créez un compte. Le système leur enverra par email leur nom d\'utilisateur et leur mot de passe. <br /><b>NOTE:</b> Le Gestionnaire de Contenu remplacera les Placeholders suivants avant l\'envoi du message: <br /><br />[+sname+] - Nom de votre site web, <br />[+saddr+] - Adresse email du site web, <br />[+surl+] - URL de votre site web, <br />[+uid+] - Nom d\'utilisateur, <br />[+pwd+] - Mot de passe, <br />[+ufn+] - Nom complet de l\'utilisateur. <br /><br /><b>Ne pas retirer les Placeholders [+uid+] et [+pwd+] du message, sans quoi le nom d\'utilisateur et le mot de passe ne seront pas envoyés et vos Utilisateurs ne pourront pas se connecter!</b>';
$_lang["websignupemail_title"] = 'Message pour l\'inscription web:';
$_lang["allow_multiple_emails_title"] = 'Dupliquer l\'adresse email de l\'utilisateur web';
$_lang["allow_multiple_emails_message"] = 'Permet aux utilisateurs Web de partager la même adresse e-mail dans les situations où un membre n\'a pas sa propre adresse e-mail ou s\'il n\'y a qu\'une seule adresse e-mail familiale.<br/>Remarque : Tout rappel de mot de passe et toute logique d\'enregistrement devront tenir compte de cette option si elle est définie sur Oui.';
$_lang["welcome_title"] = 'Bienvenue dans votre Gestionnaire de Contenu EVO';
$_lang["which_editor_message"] = 'Choisissez l\'éditeur WYSIWYG que vous souhaitez utiliser. D\'autres éditeurs WYSIWYG à installer sont disponibles sur la page de téléchargement de EVO.';
$_lang["which_editor_title"] = 'Éditeur WYSIWYG à utiliser:';
$_lang["working"] = 'Patience...';
$_lang["wrap_lines"] = 'Retour à la ligne';
$_lang["xhtml_urls_message"] = 'Remplace les ampersand (&amp;) dans les URLs par des entités HTML valides &amp;<!-- -->amp;';
$_lang["xhtml_urls_title"] = 'URLs XHTML';
$_lang["yes"] = 'Oui';
$_lang["you_got_mail"] = 'Vous avez un message';

$_lang["yourinfo_message"] = 'Informations sur votre compte utilisateur:';
$_lang["yourinfo_previous_login"] = 'Votre dernière connexion:';
$_lang["yourinfo_role"] = 'Votre rôle:';
$_lang["yourinfo_title"] = 'Vos informations';
$_lang["yourinfo_total_logins"] = 'Nombre total de connexions:';
$_lang["yourinfo_username"] = 'Connecté sous le nom:';

$_lang["a17_error_reporting_title"] = 'Niveau de rapport d\'erreurs PHP';
$_lang["a17_error_reporting_msg"] = 'Fixe le niveau de rapport d\'erreurs PHP.';
$_lang["a17_error_reporting_opt0"] = 'Tout ignorer';
$_lang["a17_error_reporting_opt1"] = 'Ignorer les erreurs de faible niveau (<a href="https://www.google.com/search?q=E_DEPRECATED+E_STRICT" target="_blank">E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT</a>)';
$_lang["a17_error_reporting_opt2"] = 'Détection des toutes les erreurs sauf E_NOTICE and E_USER_DEPRECATED';
$_lang["a17_error_reporting_opt99"] = 'Détection des toutes les erreurs sauf E_USER_DEPRECATED';
$_lang["a17_error_reporting_opt199"] = 'Tout détecter';

$_lang["pwd_hash_algo_title"] = 'Algorithme "Hash"';
$_lang["pwd_hash_algo_message"] = 'Algorithme "Hash" pour les mots de passe.';

$_lang["enable_bindings_title"] = 'Activer les commandes @Bindings';
$_lang["enable_bindings_message"] = 'Interdit l\'exécution de code PHP via les @Bindings des TVs. Utile si vous avez des utilisateurs qui doivent pourvoir créer ou éditer des des TVs mais ne doivent pas pouvoir créer de code PHP. Le résultat des TVs contenant un @Binding sera "@Bindings is disabled".';
$_lang["enable_filter_title"] = 'Activer les filtres';
$_lang["enable_filter_message"] = 'Les filtres vous permettent de manipuler la manière dont les données sont présentées ou analysées dans une balise. Ils vous permettent de modifier les valeurs depuis l\'intérieur de vos modèles. Ceci est analogue à PHx. <a href="https://github.com/modxcms/evolution/issues/623" target="ext_help">Plus d\'informations</a>'; // todo: change link to documentation
$_lang["enable_filter_phx_warning"] = 'Lorsque pHx plug-in activé, les filtres intégrés sont désactivés par défaut';

$_lang["enable_at_syntax_title"] = 'Activer &lt;@SYNTAX&gt;';
$_lang["enable_at_syntax_message"] = '&lt;@SYNTAX&gt;(atmark syntax) est une syntaxe de modèle simple et légère. Ceci est conçu pour prendre en compte la coexistence avec les balises HTML et les chaînes de contenu.';

$_lang["bkmgr_alert_mkdir"] = 'Un fichier n\'a pu être créé dans un répertoire. Veuillez vérifier les droits de [+snapshot_path+]';
$_lang["bkmgr_restore_msg"] = '<p>Un site peut être restauré via un fichier SQL. </p>';
$_lang["bkmgr_restore_title"] = 'Restaurer';
$_lang["bkmgr_import_ok"] = 'La restauration SQL s\'est déroulée normalement.';
$_lang["bkmgr_snapshot_ok"] = 'Le "snapshot" a été sauvegardé normalement.';
$_lang["bkmgr_run_sql_file_label"] = 'Exécuter via un fichier SQL';
$_lang["bkmgr_run_sql_direct_label"] = 'Exécuter des commandes SQL';
$_lang["bkmgr_run_sql_submit"] = 'Exécution de la restauration';
$_lang["bkmgr_run_sql_result"] = 'Résultat';
$_lang["bkmgr_snapshot_title"] = 'Sauvegarde et restauration des "Snapshots"';
$_lang["bkmgr_snapshot_msg"] = '<p>Le contenu de la base est sauvegardé et restauré sur un serveur.<br />Emplacement : [+snapshot_path+] ($modx->config[\'snapshot_path\'])</p>';
$_lang["bkmgr_snapshot_submit"] = 'Ajouter un "snapshot"';
$_lang["bkmgr_snapshot_list_title"] = 'Liste des "snapshots"';
$_lang["bkmgr_restore_submit"] = 'Inverser cette donnée';
$_lang["bkmgr_restore_confirm"] = 'Voulez-vous vraiment annuler la sauvegarde\n[+filename+] ?';
$_lang["bkmgr_snapshot_nothing"] = 'Aucun "snapshot"';

$_lang["files.dynamic.php1"] = 'Créer un fichier texte';
$_lang["files.dynamic.php2"] = 'Ce dossier ne peut être affiché.';
$_lang["files.dynamic.php3"] = 'Il y a un problème dans le nom du fichier.';
$_lang["files.dynamic.php4"] = 'Le fichier texte a été crée.';
$_lang["files.dynamic.php5"] = 'Le fichier n\'a pas pu être dupliqué.';
$_lang["files.dynamic.php6"] = 'Impossible de renommer le fichier ou le répertoire.';
$_lang["files_dynamic_new_folder_name"] = 'Saisissez un nouveau nom de dossier :';
$_lang["files_dynamic_new_file_name"] = 'Saisissez un nouveau nom de fichier :';
$_lang["not_readable_dir"] = 'Dossier illisible.';
$_lang["confirm_delete_dir"] = 'Confirmez-vous la suppression de ce dossier ?';
$_lang["confirm_delete_dir_recursive"] = 'Confirmez-vous la suppression de ce dossier ?\n\nTout ses contenus seront aussi supprimés.';

$_lang["make_folders_title"] = 'Slash en fin d\'URL des dossiers';
$_lang["make_folders_message"] = 'Ajouter un slash en fin d\'URL des dossiers en mode URLs simples.';

$_lang["check_files_onlogin_title"] = 'Vérifier les fichiers du système à la connexion';
$_lang["check_files_onlogin_message"] = 'En activant cette option, les fichiers importants du système seront vérifiés à chaque connexion. Une modification peut être le signe d\'une attaque de votre site. Ceci n\'est pas une garantie complète, mais peut vous indiquer une possible altération ou attaque';

$_lang["configcheck_sysfiles_mod"] = 'D\'importants fichiers du système ont été modifiés.';
$_lang["configcheck_sysfiles_mod_msg"] = 'Nous avons détecté que des fichiers importants du système ont été modifiés. Cela ne signifie pas nécessairement que votre site a été attaqué. Nous vous conseillons néanmoins de vérifier les fichiers : index.php, .htaccess, [+MGR_DIR+]/index.php, [+MGR_DIR+]/includes/config.inc.php';

$_lang['email_method_title'] = 'Méthode à utiliser pour l\'envoi des e-mails';
$_lang['email_method_mail'] = 'via la fonction mail() de PHP';
$_lang['email_method_smtp'] = 'via un serveur SMTP';
$_lang['smtp_auth_title'] = 'Authentification SMTP';
$_lang['smtp_autotls_title'] = 'SMTPAutoTLS';
$_lang['smtp_host_title'] = 'Serveur SMTP';
$_lang['smtp_secure_title'] = 'Encrypted SMTP';
$_lang['smtp_username_title'] = 'Utilisateur SMTP';
$_lang['smtp_password_title'] = 'Mot de passe SMTP';
$_lang['smtp_port_title'] = 'Port SMTP';

$_lang["setting_resource_tree_node_name"] = 'Nom des éléments dans l\'arbre des ressources';
$_lang["setting_resource_tree_node_name_desc"] = 'Permet de définir le champ du document à utiliser dans l\'arbre. Par défaut ce champ est "pagetitle", mais tous les champs peuvent être utilisés comme "menutitle", "alias"...';
$_lang["setting_resource_tree_node_name_desc_add"] = 'Remarque : depuis Evolution CMS 1.1, vous pouvez modifier ce nom d\'affichage dans l\'option de tri de l\'arborescence des ressources. Ce paramètre est utilisé lorsque le nom d\'affichage dans l\'arborescence des ressources est défini sur &quot;Par défaut&quot;.';

$_lang["resource_opt_alvisibled"] = 'Utiliser l\'alias du document dans chemin d\'alias';
$_lang["resource_opt_alvisibled_help"] = 'L\'alias de ce document sera utilisé dans le chemin d\'alias';
$_lang['resource_opt_is_published'] = 'Publié';

$_lang["enable_cache_title"] = 'Mise en cache des documents';
$_lang["disable_chunk_cache_title"] = 'Désactiver la mise en cache des chunks';
$_lang["disable_snippet_cache_title"] = 'Désactiver la mise en cache des snippets';
$_lang["disable_plugins_cache_title"] = 'Désactiver la mise en cache des plugins';
$_lang["disabled_at_login"] = 'Désactivé à la connexion';

$_lang["cache_type_title"] = 'Type de cache des documents';
$_lang["cache_type_1"] = 'Le cache est basé sur l\'ID du document (standard)';
$_lang["cache_type_2"] = 'Le cache est basé sur l\'ID du document et les paramètres $_GET';
$_lang["seostrict_title"] = 'Utiliser le format "SEO Strict" pour les URLs';
$_lang["seostrict_message"] = 'Forcer le format "SEO Strict" pour les URLs afin d\'éviter les contenus dupliqués';

$_lang["alias_listing_title"] = 'Utiliser le cache AliasListing';
$_lang["alias_listing_message"] = 'La mise en cache des alias de page doit être désactivée si un site dispose d\'une grande quantité de ressources. « Désactivé » réduit la consommation de mémoire lorsque le site dispose d\'un grand nombre de ressources.';
$_lang["alias_listing_disabled"] = 'Désactivé';
$_lang["alias_listing_folders"] = 'Uniquement pour les dossiers';
$_lang["alias_listing_enabled"] = 'Activé';

$_lang["settings_friendlyurls_alert"] = 'Il est nécessaire de renommer le fichier ht.access de EVO en .htaccess pour être en mesure d\'utiliser les "URLs simples".';
$_lang["settings_friendlyurls_alert2"] = 'L\'installation ayant été réalisée dans un sous répertoire, il est nécessaire de modifier la directive "RewriteBase" dans votre fichier .htaccess.';

$_lang["mutate_settings.dynamic.php6"] = 'Envoyer un e-mail en cas d\'erreur EVO';
$_lang["mutate_settings.dynamic.php7"] = 'Ne pas notifier';
$_lang["mutate_settings.dynamic.php8"] = 'Si une erreur EVO survient un e-mail contenant l\'origine de l\'erreur sera envoyé à [(emailsender)] ([+emailsender+]). Le détail de l\'erreur pourra être consulté dans l\'historique des événements EVO.';

$_lang["error_no_privileges"] = "Vous ne disposez pas de suffisamment de droits pour effectuer cette opération !";
$_lang["error_no_optimise_tablename"] = "Nom de la table à optimiser non trouvé dans la requête !";
$_lang["error_no_truncate_tablename"] = "Nom de la table à vider non trouvé dans la requête !";
$_lang["error_double_action"] = "Double action (GET & POST) demandée !";
$_lang["error_no_id"] = "ID du document non passé dans la requête !";
$_lang["error_id_nan"] = "l'ID du document passé dans la requête est invalide !";
$_lang["error_parent_deleted"] = "Échec car le parent de la ressource est supprimé !";
$_lang["error_no_parent"] = "Impossible de trouver le nom du document parent !";
$_lang["error_many_results"] = "Trop de résultats ont été retournés par la base de données !";
$_lang["error_no_results"] = "Pas assez de résultats ont été retournés par la base de données !";
$_lang["error_no_user_selected"] = "Aucun utilisateur n'est destinataire de ce message !";
$_lang["error_no_group_selected"] = "Aucun groupe n'est destinataire de ce message !";
$_lang["error_movedocument1"] = "Un document ne peut pas être son propre parent !";
$_lang["error_movedocument2"] = "ID du document non passé dans la requête !";
$_lang["error_movedocument3"] = "Nouveau parent non défini dans la requête !";
$_lang["error_internet_connection"] = "Le serveur n'est pas disponible. Vérifiez votre connexion internet !";

$_lang["login_processor_unknown_user"] = "Identifiant ou mot de passe invalide !";
$_lang["login_processor_wrong_password"] = "Identifiant ou mot de passe invalide !";
$_lang["login_processor_many_failed_logins"] = "Votre compte a été verrouillé en raison de trop nombreuses tentatives.";
$_lang["login_processor_verified"] = "Vérification de l'utilisateur requise !";
$_lang["login_processor_blocked1"] = "Votre compte a été verrouillé, vous ne pouvez plus vous connecter.";
$_lang["login_processor_blocked2"] = "Votre compte a été verrouillé, vous ne pouvez plus vous connecter. Veuillez réessayer plus tard.";
$_lang["login_processor_blocked3"] = "Votre compte a été verrouillé, vous ne pouvez plus vous connecter.";
$_lang["login_processor_bad_code"] = "Le code de sécurité que vous avez entré est invalide ! Veuillez essayer à nouveau.";
$_lang["login_processor_remotehost_ip"] = "Le nom de votre machine et son adresse IP ne sont pas compatibles !";
$_lang["login_processor_remote_ip"] = "Vous n'êtes pas autorisé à vous connecter depuis ce poste.";
$_lang["login_processor_date"] = "Vous n'êtes - pour l'instant - pas autorisé à vous connecter. Veuillez réessayer plus tard.";
$_lang["login_processor_captcha_config"] = "Les Captcha ne sont pas correctement configurés.";

$_lang["dp_dayNames"] = "['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi']";
$_lang["dp_monthNames"] = "['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre']";
$_lang["dp_startDay"] = "1";

$_lang["check_all"] = "Tout sélectionner";
$_lang["check_none"] = "Ne rien sélectionner";
$_lang["check_toggle"] = "Basculer la sélection";

$_lang["version_notices"] = "Avis de version";

$_lang["em_button_shift"] = "(Maj-Clic pour ouvrir plusieurs fenêtres)";

$_lang["reset_sysfiles_checksum_button"] = "Reconstruire les Checksums";
$_lang["reset_sysfiles_checksum_alert"] = "Voulez-vous vraiment réinitialiser les checksums des fichiers système ?";

$_lang["file_browser_disabled_msg"] = "La fonction de navigateur de fichiers n'est pas activée.";
$_lang["which_browser_default_title"] = "Navigateur de fichiers par défaut";
$_lang["which_browser_default_msg"] = "Choisissez le navigateur de fichiers que vous préférez par défaut. Dans Paramètres utilisateur, vous pouvez choisir un navigateur personnalisé par utilisateur ou le laisser sur &quot;Par défaut&quot;.";
$_lang["which_browser_title"] = "Navigateur de fichiers";
$_lang["which_browser_msg"] = "Vous pouvez choisir un navigateur de fichiers personnalisé pour cet utilisateur. Pour utiliser le navigateur par défaut du système, laissez-le sur &quot;Par défaut&quot;.";
$_lang["option_default"] = "Par défaut";
$_lang["position"] = "Position";
$_lang["are_you_sure"] = "Êtes-vous sûr ?";

$_lang['evo_downloads_title'] = "Téléchargements du CMS Evolution";
$_lang['help_translating_title'] = "Aide à la traduction d'Evolution CMS";
$_lang['download'] = "Téléchargement";
$_lang['downloads'] = "Téléchargements";
$_lang["previous_releases"] = "Versions précédentes";
$_lang["extras"] = "Extras";

$_lang["display_locks"] = "Afficher les verrous";
$_lang["role_display_locks"] = "Afficher les verrous";
$_lang["session_timeout"] = "Expiration de la session";
$_lang["session_timeout_msg"] = "Evolution CMS enverra un ping au serveur, si le dernier ping dépasse ce paramètre, la session associée sera considérée comme invalide et tous les verrous associés seront automatiquement supprimés. Définir la valeur en minutes (> 2 min, 15 min par défaut).";
$_lang["unlock_element_id_warning"] = "Êtes-vous sûr de vouloir déverrouiller [+element_type+] (ID [+id+])?";
$_lang["lock_element_type_1"] = "Modèle";
$_lang["lock_element_type_2"] = "Variable de modèle";
$_lang["lock_element_type_3"] = "Chunk";
$_lang["lock_element_type_4"] = "Snippet";
$_lang["lock_element_type_5"] = "Plugin";
$_lang["lock_element_type_6"] = "Module";
$_lang["lock_element_type_7"] = "Ressource";
$_lang["lock_element_type_8"] = "Rôle";
$_lang["lock_element_editing"] = "Vous modifiez [+element_type+] depuis\n[+lasthit_df+]";
$_lang["lock_element_locked_by"] = "Ce [+element_type+] est vérouillé par \n[+username+] depuis [+lasthit_df+]";

$_lang["minifyphp_incache_title"] = 'Réduire le code php dans le cache du site';
$_lang["minifyphp_incache_message"] = 'Réduire le code php (snippets et plugins) et le stocker dans le fichier cache du site, ref:<a href="https://github.com/modxcms/evolution/issues/938" target="_blank">#938</a>';

$_lang["logout_reminder_msg"] = "Rappel : Il semble que le [+date+] vous ayez oublié de vous déconnecter. Veuillez faire attention à l'avenir à le faire une fois votre travail terminé.";

$_lang["allow_eval_title"] = "Évaluer le code php dans l'appel du snippet";
$_lang["allow_eval_msg"] = "Pour les développeurs : veuillez utiliser \$modx-&gt;safeEval().";
$_lang["allow_eval_with_scan"] = "Exécuter uniquement les fonctions autorisées";
$_lang["allow_eval_with_scan_at_post"] = "Exécutez tout. Cependant, au POST, seules les fonctions autorisées.";
$_lang["allow_eval_everytime_eval"] = "Illimité (à utiliser uniquement pour le débogage)";
$_lang["allow_eval_dont_eval"] = "Ne pas autoriser toutes les fonctions";

$_lang["safe_functions_at_eval_title"] = "Fonctions pour permettre l'évaluation";
$_lang["safe_functions_at_eval_msg"] = "Liste séparée par des virgules";

$_lang["multiple_sessions_msg"] = "Information : Plusieurs sessions utilisateur actives ([+total+] au total) trouvées pour l'utilisateur <b>[+username+]</b>.";
$_lang["iconv_not_available"] = "Il est important d'installer/d'activer l'extension iconv. Veuillez contacter votre hébergeur si vous ne savez pas comment l'activer.";

$_lang["cm_create_new_category"] = "Créer la nouvelle catégorie";
$_lang["cm_category_name"] = "Nom de la catégorie";
$_lang["cm_category_position"] = "Position de la catégorie";
$_lang["cm_no_x_assigned"] = "Aucun %s affecté";
$_lang["cm_save_categorization"] = "Enregistrer la catégorisation";
$_lang["cm_update_categories"] = "Mettre à jour les catégories";
$_lang["cm_assigned_elements"] = "Éléments affectés";
$_lang["cm_edit_name"] = "Éditer le nom";
$_lang["cm_mark_for_deletion"] = "Marquer pour suppression";
$_lang["cm_delete_now"] = "Supprimer immédiatement";
$_lang["cm_delete_element_x_now"] = "Supprimer &quot;%s&quot; immédiatement";
$_lang["cm_select_element_group"] = "Sélectionnez un groupe d'éléments";
$_lang["cm_global_messages"] = "Messages globaux";
$_lang["cm_add_new_category"] = "Ajouter une nouvelle catégorie";
$_lang["cm_edit_categories"] = "Éditer une catégorie";
$_lang["cm_sort_categories"] = "Trier les catégories";
$_lang["cm_categorize_elements"] = "Catégoriser les éléments";
$_lang["cm_translation"] = "Traduction";
$_lang["cm_translations"] = "Traductions";
$_lang["cm_categorize_x"] = "Catégoriser <span class=\"highlight\">%s</span>";
$_lang["cm_unknown_error"] = "Quelque chose s'est mal passé.";
$_lang["cm_x_assigned_to_category_y"] = "<span class=\"highlight\">%s(%s)</span> a été affecté à la catégorie <span class=\"highlight\">%s(%s)</span>";
$_lang["cm_no_categorization"] = "Aucune catégorisation faite.";
$_lang["cm_no_changes"] = "Rien à changer, donc aucune modification apportée.";
$_lang["cm_x_changes_made"] = "<span class=\"highlight\">%s</span> changements faits.";
$_lang["cm_enter_name_for_category"] = "Veuillez entrer un nom pour la nouvelle catégorie.";
$_lang["cm_category_x_exists"] = "La catégorie <span class=\"highlight\">%s</span> existe déjà.";
$_lang["cm_category_x_saved_at_position_y"] = "La nouvelle catégorie <span class=\"highlight\">%s</span> a été enregistrée à la position <span class=\"highlight\">%s</span>.";
$_lang["cm_category_x_moved_to_position_y"] = "La catégorie <span class=\"highlight\">%s</span> a été déplacé à la position <span class=\"highlight\">%s</span>";
$_lang["cm_category_x_deleted"] = "La catégorie <span class=\"highlight\">%s</span> a été supprimée";
$_lang["cm_category_x_renamed_to_y"] = "La catégorie <span class=\"highlight\">%s</span> a été renommée <span class=\"highlight\">%s</span>";
$_lang["cm_translation_for_x_empty"] = "La traduction pour <span class=\"highlight\">%s</span> était vide";
$_lang["cm_translation_for_x_to_y_success"] = "La traduction de <span class=\"highlight\">%s</span> pour <span class=\"highlight\">%s</span> a été enregistré avec succès";
$_lang["cm_save_new_sorting"] = "Enregistrer le nouveau tri";
$_lang["cm_translate_phrases"] = "Traduire des phrases";
$_lang["cm_translate_module_phrases"] = "Traduire des phrases de module";
$_lang["cm_native_phrase"] = "Phrase native";

$_lang["btn_view_options"] = 'Voir les options';
$_lang["view_options_msg"] = 'L\'affichage et la liste des éléments peuvent être personnalisés via le bouton &quot;Options d\'affichage&quot;. Les paramètres sont enregistrés et restaurés par navigateur à l\'aide du stockage local de HTML5.';
$_lang["viewopts_title"] = 'Options d\'affichage';
$_lang["viewopts_cb_buttons"] = 'Boutons';
$_lang["viewopts_cb_descriptions"] = 'Descriptions';
$_lang["viewopts_cb_icons"] = 'Icônes';
$_lang["viewopts_radio_list"] = 'Liste';
$_lang["viewopts_radio_inline"] = 'En ligne';
$_lang["viewopts_radio_flex"] = 'Flex';
$_lang["viewopts_fontsize"] = 'Taille des polices';
$_lang["viewopts_cb_alltabs"] = 'Tous les onglets';

$_lang['email_sender_method'] = 'L\'expéditeur de l\'enveloppe du message';
$_lang['auto'] = 'Auto-détection';
$_lang['use_emailsender'] = 'Utiliser la valeur [(emailsender)]';
$_lang['email_sender_method_message'] = 'L\'expéditeur de l\'enveloppe du message. Cela sera généralement transformé en un en-tête Return-Path par le récepteur, et c\'est l\'adresse à laquelle les rebonds seront envoyés. La détection automatique fonctionnera dans la plupart des cas.';

$_lang['login_form_position_title'] = 'Position du formulaire de connexion';
$_lang['login_form_position_left'] = 'gauche';
$_lang['login_form_position_center'] = 'centre';
$_lang['login_form_position_right'] = 'droite';
$_lang["login_form_style"] = 'Style de formulaire de connexion :';
$_lang["login_form_style_dark"] = 'sombre';
$_lang["login_form_style_light"] = 'lumineux';
$_lang['login_logo_title'] = 'Image du logo de la page de connexion';
$_lang['login_logo_message'] = 'Largeur d\'image du logo de connexion recommandée : 360 px, type .png';
$_lang['login_bg_title'] = 'Image d\'arrière-plan de la page de connexion';
$_lang['login_bg_message'] = 'Largeur recommandée de l\'image d\'arrière-plan de la page de connexion : 1920 pixels';

$_lang['manager_menu_position_title'] = 'Position du menu principal';
$_lang['manager_menu_position_top'] = 'haut';
$_lang['manager_menu_position_left'] = 'gauche';

$_lang['invalid_event_response'] = 'L\'événement %s a une sortie non valide';

$_lang['chunk_processor'] = 'Classe de traitement des chunks';

$_lang["permission_title"] = 'Créer / éditer les permissions';
$_lang["groups_permission_title"] = 'Créer / éditer les catégories';
$_lang["lang_key_desc"] = 'Clé de language du tableau $_lang';
$_lang["key_desc"] = 'Clé pour autorisation cochée';

$_lang["setting_from_file"] = '<strong class="text-danger">La valeur du paramètre est définie dans core/custom/config/cms/settings</strong>';
$_lang['disable'] = 'Désactiver';
$_lang['enable'] = 'Activer';

return $_lang;
