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
$_lang["about_title"] = 'Àcerca do EVO';

// days
$_lang["monday"] = 'Segunda-feira';
$_lang["tuesday"] = 'Terça-feira';
$_lang["wednesday"] = 'Quarta-feira';
$_lang["thursday"] = 'Quinta-feira';
$_lang["friday"] = 'Sexta-feira';
$_lang["saturday"] = 'Sábado';
$_lang["sunday"] = 'Domingo';

// templates
$_lang["template"] = 'Template';
$_lang["templates"] = 'Templates';
$_lang['templatecontroller'] = 'Template Controller';
$_lang["template_assignedtv_tab"] = 'Variáveis de Template atribuídas';
$_lang["template_code"] = 'Código HTML do Template';
$_lang["template_desc"] = 'Descrição';
$_lang["template_edit_tab"] = 'Editar Template';
$_lang["template_inuse"] = 'This template is in use. Please set the documents using the template to another template. Documents using this template:';
$_lang["template_management_msg"] = 'Aqui pode escolher que Template deseja editar.';
$_lang["template_msg"] = 'Criar e editar Templates. Templates novos ou modificados não serão visíveis nas páginas em cache até que esta seja esvaziada, no entanto pode usar a função de pré-visualização na página para ver o Template em acção.';
$_lang["template_name"] = 'Nome do Template';
$_lang["template_no_tv"] = 'Ainda não foi atribuída nenhuma Variável a este Template.';
$_lang["template_notassigned_tv"] = 'These Template Variables are available for assigning.';
$_lang["template_reset_all"] = 'Aplicar o Template padrão a todas as páginas';
$_lang["template_reset_specific"] = 'Aplicar apenas às páginas que usam o Template %s';
$_lang["template_assigned_blade_file"] = 'Arquivo blade correspondente';
$_lang["template_create_blade_file"] = 'Criar arquivo de modelo ao salvar';
$_lang["template_selectable"] = 'Template selectable when creating or editing ressources.';
$_lang["template_title"] = 'Criar/editar Template';
$_lang["template_tv_edit"] = 'Editar a ordem de ordenação das Variáveis de Template';
$_lang["template_tv_edit_message"] = 'Drag to reorder the Template Variables for this template.';
$_lang["template_tv_edit_title"] = 'Template Variable Sort Order';
$_lang["template_tv_msg"] = 'As Variáveis atribuídas a este Template estão listadas abaixo.';

// tmplvars
$_lang["tv"] = 'TV';
$_lang["tmplvar"] = 'Template Variable';
$_lang["tmplvars"] = 'Variáveis de Template';
$_lang["tmplvar_access_msg"] = 'Seleccione o grupo de documentos autorizados a fazer alterações ao conteúdo ou valor desta variável';
$_lang["tmplvar_change_template_msg"] = 'Alterar este Template implica recarregar para actualização todas as Variáveis. Todas as mudanças serão perdidas.\n\n De certeza que deseja alterar o Template?';
$_lang["tmplvar_inuse"] = 'Os seguintes documentos utilizam actualmente esta Variável de Template. Para continuar e apagar clique no botão Apagar, para cancelar clique em Cancelar.';
$_lang["tmplvar_tmpl_access"] = 'Acesso a Templates';
$_lang["tmplvar_tmpl_access_msg"] = 'Seleccione que Templates têm permissão para aceder e/ou processar esta variável';
$_lang["tmplvars_binding_msg"] = 'Este campo suporta ligação (binding) a fontes de dados usando comandos @';
$_lang["tmplvars_caption"] = 'Legenda';
$_lang["tmplvars_default"] = 'Valor Padrão';
$_lang["tmplvars_description"] = 'Descrição';
$_lang["tmplvars_elements"] = 'Opções de valores de entrada';
$_lang["tmplvars_inherited"] = 'Value inherited';
$_lang["tmplvars_management_msg"] = 'Aqui pode fazer a gestão de campos personalizados (Variáveis de Template) a utilizar nos seus documentos.';
$_lang["tmplvars_msg"] = 'Adicionar ou editar Variáveis de Template. Estas deverão ser atribuídas aos Templates para que sejam acessíveis pelos Snippets e Documentos.';
$_lang["tmplvars_name"] = 'Nome da Variável';
$_lang["tmplvars_novars"] = 'Nenhuma Variável de Template encontrada';
$_lang["tmplvars_rank"] = 'Ordem de utilização';
$_lang["tmplvars_rank_edit_message"] = 'Drag to reorder the Template Variables.';
$_lang["tmplvars_reset_params"] = 'Limpar parâmetros';
$_lang["tmplvars_title"] = 'Create/edit Template Variable';
$_lang["tmplvars_type"] = 'Tipo de entrada (input)';
$_lang["tmplvars_widget"] = 'Formato saída (widget)';
$_lang["tmplvars_widget_prop"] = 'Propriedades da estrutura a retonar (Widget)';
$_lang["role_no_tv"] = 'No Variables have been assigned to this Role yet.';
$_lang["role_notassigned_tv"] = 'These Variables are available for assigning.';
$_lang["role_tv_msg"] = 'The Variables assigned to this Role are listed below.';
$_lang["tmplvar_roles_access_msg"] = 'Select the Roles that are allowed to access/process this Template Variable';

// snippets
$_lang["snippet"] = 'Snippet';
$_lang["snippets"] = 'Snippets';
$_lang["snippet_code"] = 'Código do Snippet (php)';
$_lang["snippet_desc"] = 'Descrição';
$_lang["snippet_execonsave"] = 'Executar snippet depois de guardar.';
$_lang["snippet_management_msg"] = 'Aqui pode escolher qual o snippet que deseja editar.';
$_lang["snippet_msg"] = 'Aqui pode adicionar ou editar Snippets. Atenção que os Snippets são código PHP \'em bruto\': se espera que o resultado de um Snippet seja mostrado a uma certo ponto num Template, é necessário que um valor seja devolvido a partir do Snippet.';
$_lang["snippet_name"] = 'Nome do Snippet';
$_lang["snippet_properties"] = 'Propriedades padrão';
$_lang["snippet_title"] = 'Criar/editar Snippet';

// chunks
$_lang["htmlsnippet"] = 'Chunk';
$_lang["htmlsnippets"] = 'Chunks';
$_lang["htmlsnippet_desc"] = 'Descrição';
$_lang["htmlsnippet_management_msg"] = 'Aqui pode seleccionar qual o Chunk que deseja editar.';
$_lang["htmlsnippet_msg"] = 'Aqui pode adicionar/editar Chunks. Lembre-se, chunks são escritos em código HTML, pelo que código PHP NÃO SERÁ PROCESSADO (mas chamadas a snippets e TVs sim).';
$_lang["htmlsnippet_name"] = 'Nome do Chunk';
$_lang["htmlsnippet_title"] = 'Criar/editar Chunk';
$_lang["chunk"] = 'Chunk';
$_lang["chunk_code"] = 'Código do Chunk (html)';
$_lang["chunk_multiple_id"] = 'Error: Multiple Chunks share the same unique ID.';
$_lang["chunk_no_exist"] = 'Chunk does not exist.';

// plugins
$_lang["plugin"] = 'Plugin';
$_lang["plugins"] = 'Plugins';
$_lang["plugin_code"] = 'Código do Plugin (php)';
$_lang["plugin_config"] = 'Configuração do Plugin';
$_lang["plugin_desc"] = 'Descrição';
$_lang["plugin_disabled"] = 'Plugin Desactivado';
$_lang["plugin_event_msg"] = 'Seleccione os eventos que deseja monitorizar com este plugin.';
$_lang["plugin_management_msg"] = 'Aqui pode escolher qual o plugin que deseja editar.';
$_lang["plugin_msg"] = 'Aqui pode adicionar/editar plugins. Plugins são códigos PHP \'em bruto\' que são invocados sempre que os eventos seleccionados ocorrem.';
$_lang["plugin_name"] = 'Nome do Plugin';
$_lang["plugin_priority"] = 'Editar ordem de execução de Plugin por evento';
$_lang["plugin_priority_instructions"] = 'Drag to reorder the Plugins under each Event header. The first plugin to execute should go at the top.';
$_lang["plugin_priority_title"] = 'Plugin Execution Order';
$_lang["purge_plugin"] = 'Purge obsolete plugins';
$_lang["purge_plugin_confirm"] = 'Are you sure you want to purge obsolete plugins?';
$_lang["plugin_title"] = 'Criar/editar plugin';

// categories
$_lang["category"] = 'Category';
$_lang["categories"] = 'Categories';
$_lang["category_heading"] = 'Categoria';
$_lang["category_manager"] = 'Category Manager';
$_lang["category_management"] = 'Category management';
$_lang["category_msg"] = 'Aqui pode ver e editar todos os recursos agrupados por categoria.';

// file
$_lang["file_delete_file"] = 'Apagar Ficheiro';
$_lang["file_delete_folder"] = 'Apagar Pasta';
$_lang["file_deleted"] = 'Successo!';
$_lang["file_download_file"] = 'Baixar (Download) Ficheiro';
$_lang["file_download_unzip"] = 'Descompactar Ficheiro';
$_lang["file_folder_chmod_error"] = 'Não foi possível alterar as permissões, terá que o fazer fora do EVO.';
$_lang["file_folder_created"] = 'Pasta criada com sucesso!';
$_lang["file_folder_deleted"] = 'Pasta apagada com sucesso!';
$_lang["file_folder_not_created"] = 'Não foi possível criar a pasta';
$_lang["file_folder_not_deleted"] = 'Problema ao apagar pasta. Verifique se a pasta está vazia antes de apagá-la!';
$_lang["file_not_deleted"] = 'Falhou!';
$_lang["file_not_saved"] = 'Não foi possível gravar o ficheiro, verifique se o directório de destino tem permissão de escrita!';
$_lang["file_saved"] = 'Ficheiro actualizado com sucesso!';
$_lang["file_unzip"] = 'Descompactação realizada com sucesso!';
$_lang["file_unzip_fail"] = 'A descompactação falhou!';

// files
$_lang["files"] = 'Files';
$_lang["files_files"] = 'Ficheiros';
$_lang["files_access_denied"] = 'Acesso negado!';
$_lang["files_data"] = 'Dados';
$_lang["files_dir_listing"] = 'Listagem do directório:';
$_lang["files_directories"] = 'Directórios';
$_lang["files_directory_is_empty"] = 'This directory is empty.';
$_lang["files_dirwritable"] = 'Pasta editável?';
$_lang["files_editfile"] = 'Editar ficheiro';
$_lang["files_file_type"] = 'Tipo de ficheiro: ';
$_lang["files_filename"] = 'Nome do ficheiro';
$_lang["files_fileoptions"] = 'Opções';
$_lang["files_filesize"] = 'Tamanho';
$_lang["files_filetype_notok"] = 'Upload deste tipo de ficheiros não é permitido!';
$_lang["files_management"] = 'Manage Files';
$_lang["files_management_no_permission"] = 'You do not have enough permissions to view or edit these files. Ask the administrator to grant you access to <b>%s</b>.';
$_lang["files_modified"] = 'Modificado';
$_lang["files_top_level"] = 'Para nível de topo';
$_lang["files_up_level"] = 'Subir um nível';
$_lang["files_upload_copyfailed"] = 'Erro ao copiar o ficheiro para o directório escolhido - Falha no upload!';
$_lang["files_upload_error"] = 'Erro';
$_lang["files_upload_error0"] = 'Ocorreu um problema com o envio (upload).';
$_lang["files_upload_error1"] = 'O ficheiro que está a enviar é grande demais, tente reduzir o seu tamanho.';
$_lang["files_upload_error2"] = 'Este ficheiro também está grande demais, tente diminuir o seu tamanho.';
$_lang["files_upload_error3"] = 'O ficheiro que enviou foi enviado apenas parcialmente.';
$_lang["files_upload_error4"] = 'Seleccione um ficheiro a enviar';
$_lang["files_upload_error5"] = 'Ocorreu um problema com o envio (upload).';
$_lang["files_upload_inhibited_msg"] = '<b>Proibido enviar (upload) ficheiros</b> - Certifique-se de que os uploads são suportados e de que o directório tem permissão de escrita por PHP.<br />';
$_lang["files_upload_ok"] = 'Ficheiro enviado com sucesso!';
$_lang["files_upload_permissions_error"] = 'Possible permission problems - the directory you want to upload to needs to be writable by your webserver.';
$_lang["files_uploadfile"] = 'Enviar ficheiro (upload)';
$_lang["files_uploadfile_msg"] = 'Seleccione um ficheiro a enviar (upload):';
$_lang["files_uploading"] = 'Enviando <b>%s</b> para <b>%s/</b><br />';
$_lang["files_viewfile"] = 'Ver ficheiro';

// modules
$_lang["module"] = 'Module';
$_lang["modules"] = 'Módulos';
$_lang["module_code"] = 'Código do Módulo (php)';
$_lang["module_config"] = 'Configuração do Módulo';
$_lang["module_desc"] = 'Descrição';
$_lang["module_disabled"] = 'Módulo desactivado';
$_lang["module_edit_click_title"] = 'Clique aqui para editar este Módulo';
$_lang["module_group_access_msg"] = 'Seleccione os grupos de utilizadores que estão autorizados a executar este Módulo a partir do Gestor de Conteúdos.';
$_lang["module_management"] = 'Gerir Módulos';
$_lang["module_management_msg"] = 'Aqui pode escolher qual o módulo que deseja executar ou modificar. Para aceder às opções do módulo, clique no ícone ao lado do nome.';
$_lang["module_msg"] = 'Aqui pode Adicionar/Editar Módulos. Um Módulo é uma colecção de recursos (ex: plugins, snippets, etc).';
$_lang["module_name"] = 'Nome do Módulo';
$_lang["module_resource_msg"] = 'Aqui pode adicionar ou remover recursos dos quais este módulo depende. Para adicionar recursos clique nos botões a seguir.';
$_lang["module_resource_title"] = 'Dependências do Módulo';
$_lang["module_title"] = 'Criar/editar Módulo';
$_lang["module_viewdepend_msg"] = 'Aqui pode ver e definir recursos de que o módulo depende. Clique em \'Gestor de dependências\' para modificá-las';

// elements
$_lang["element"] = 'Recurso';
$_lang["elements"] = 'Recursos';
$_lang["element_categories"] = 'Vista combinada';
$_lang["element_filter_msg"] = 'Type here to filter list';
$_lang["element_management"] = 'Gerir Recursos';
$_lang["element_name"] = 'Nome do Recurso';
$_lang["element_selector_msg"] = 'Seleccione o(s) recurso(s) na lista abaixo e clique no botão \'Inserir\'.';
$_lang["element_selector_title"] = 'Selector de Recursos';

// resource
$_lang["resource"] = 'Documento';
$_lang["resource_alias"] = 'Apelido (alias)';
$_lang["resource_alias_help"] = 'Aqui pode dar um apelido (alias) ao documento. Isto torna o documento mais acessível\n\nPor exemplo:\n\nhttp://seuendereco.algumacoisa/apelido\n\nEste recurso funciona apenas se estiver a utilizar URLs amigáveis.';
$_lang["resource_content"] = 'Conteúdo do documento';
$_lang["resource_description"] = 'Descrição';
$_lang["resource_description_help"] = 'Aqui pode indicar uma descrição do documento (opcional).';
$_lang["resource_duplicate"] = 'Duplicar Documento';
$_lang["resource_long_title_help"] = 'Aqui pode inserir o título longo para o seu documento. Isto torna mais fácil a localização por motores de busca e descreve melhor o seu documento.';
$_lang["resource_metatag_help"] = 'Seleccione as etiquetas (tags) META ou palavras-chave que deseja colocar neste documento. Segure a tecla CTRL para fazer selecções múltiplas.';
$_lang["resource_opt_contentdispo"] = 'Disposição do Conteúdo';
$_lang["resource_opt_contentdispo_help"] = 'Use a disposição do conteúdo para especificar como este documento será interpretado pelo navegador. Para download de ficheiros, seleccione a opção Anexo.';
$_lang["resource_opt_emptycache"] = 'Apagar cache?';
$_lang["resource_opt_emptycache_help"] = 'Deixando este campo marcado o EVO irá apagar a cache sempre que gravar este documento. Isto é importante para que os seus visitantes não vejam versões desactualizadas do documento.';
$_lang["resource_opt_folder"] = 'É Pasta?';
$_lang["resource_opt_folder_help"] = 'Seleccione aqui para usar o documento como pasta para outros documentos. Não precisa de se preocupar muito com isto, pois o EVO geralmente encarrega-se das configurações da pasta automaticamente.';
$_lang["resource_opt_menu_index"] = 'Índice nos menus';
$_lang["resource_opt_menu_index_help"] = 'O Índice nos Menus é um campo que poderá usar para ordenar o documento nos seus Snippets que geram menus. Poderá usá-lo para qualquer outro propósito nos seus Snippets.';
$_lang["resource_opt_menu_title"] = 'Título nos Menus';
$_lang["resource_opt_menu_title_help"] = 'O Título nos Menus é um campo que pode usar para mostrar um pequeno texto para o documento, dentro dos snippets ou módulos.';
$_lang["resource_opt_published"] = 'Publicado?';
$_lang["resource_opt_published_help"] = 'Marque este campo para ter o documento publicado imediatamente quando gravar.';
$_lang["resource_opt_richtext"] = 'Editor gráfico (estilo Word)?';
$_lang["resource_opt_richtext_help"] = 'Marque aqui para usar um editor de texto gráfico ao estilo do MS Word. Se o documento incluir elementos como scripts e formulários desmarque para usar HTML puro.';
$_lang["resource_opt_show_menu"] = 'Mostrar em menus';
$_lang["resource_opt_show_menu_help"] = 'Seleccione esta opção para mostrar o documento dentro do menu web.\n Alguns Construtores de Menu preferem ignorar esta opção.';
$_lang["resource_opt_trackvisit_help"] = 'Registar cada visita a esta página.';
$_lang["resource_overview"] = 'Resumo do documento';
$_lang["resource_parent"] = 'Document pai';
$_lang["resource_parent_help"] = 'Clique no ícone acima para activar (ou desactivar) a selecção do \'pai\' deste documento. Em seguida clique num documento da árvore para atribuir-lhe parentesco.';
$_lang["resource_permissions_error"] = 'Assign this Resource to at least one Resource Group to which you have access.';
$_lang["resource_setting"] = 'Configurações do documento';
$_lang["resource_summary"] = 'Introdução';
$_lang["resource_summary_help"] = 'Escreva um breve resumo do conteúdo do documento.';
$_lang["resource_title"] = 'Título';
$_lang["resource_title_help"] = 'Digite nome/título do documento aqui. Convém separar as palavras com uma underline(_)!';
$_lang["resource_to_be_moved"] = 'O Documento a ser movido';
$_lang["resource_type"] = 'Resource Type';
$_lang["resource_type_message"] = 'Weblinks reference Resources on the Internet including another Evolution CMS Resource, an external page, or an image or other file on the Internet. Weblinks should have a text/html Internet Media Type and Inline Content-Disposition.';
$_lang["resource_type_weblink"] = 'Weblink';
$_lang["resource_type_webpage"] = 'Web page';
$_lang["resource_weblink_help"] = 'Digite aqui o endereço do objecto ou documento a que deseja ligar.';
$_lang["resources_in_container"] = 'documentos nesta pasta';
$_lang["resources_in_container_no"] = 'Esta pasta não contém nenhum documento.';

// role
$_lang["role"] = 'Role';
$_lang["role_about"] = 'Ver a página \'Sobre...\'';
$_lang["role_actionok"] = 'Ver ecran de acção finalizada';
$_lang["role_assets_images"] = 'Manage assets/images';
$_lang["role_assets_files"] = 'Manage assets/files';
$_lang["role_bk_manager"] = 'Usar o gestor de Cópias de Segurança (Backups)';
$_lang["role_cache_refresh"] = 'Limpar a cache do site';
$_lang["role_category_manager"] = 'Use the Category Manager';
$_lang["role_change_password"] = 'Alterar a senha de acesso';
$_lang["role_change_resourcetype"] = 'Mudança de tipo de recurso';
$_lang["role_chunk_management"] = 'Chunk management';
$_lang["role_config_management"] = 'Gestão de configurações do sistema';
$_lang["role_content_management"] = 'Gestão de conteúdos';
$_lang["role_create_chunk"] = 'Create new Chunks';
$_lang["role_create_doc"] = 'Criar novos Documentos';
$_lang["role_create_plugin"] = 'Criar novos Plugins';
$_lang["role_create_snippet"] = 'Criar novos Snippets';
$_lang["role_create_template"] = 'Criar novos Templates para o site';
$_lang["role_credits"] = 'Ver créditos';
$_lang["role_delete_chunk"] = 'Delete Chunks';
$_lang["role_delete_doc"] = 'Apagar documentos';
$_lang["role_delete_eventlog"] = 'Apagar registo de eventos (logs)';
$_lang["role_delete_module"] = 'Apagar Módulo';
$_lang["role_delete_plugin"] = 'Apagar Plugins';
$_lang["role_delete_role"] = 'Apagar Perfis';
$_lang["role_delete_snippet"] = 'Apagar Snippets';
$_lang["role_delete_template"] = 'Apagar Templates';
$_lang["role_delete_user"] = 'Apagar utilizadores';
$_lang["role_delete_web_user"] = 'Apagar utilizadores web (externos)';
$_lang["role_edit_chunk"] = 'Editar Chunks';
$_lang["role_edit_doc"] = 'Editar um documento';
$_lang["role_edit_doc_metatags"] = 'Editar etiquetas (tags) META e palavras-chave de um documento';
$_lang["role_edit_module"] = 'Editar Módulos';
$_lang["role_edit_plugin"] = 'Editar Plugins';
$_lang["role_edit_role"] = 'Editar Perfis';
$_lang["role_edit_settings"] = 'Alterar configurações do site';
$_lang["role_edit_snippet"] = 'Editar Snippets';
$_lang["role_edit_template"] = 'Editar Templates';
$_lang["role_edit_user"] = 'Editar utilizadores';
$_lang["role_edit_web_user"] = 'Editar utilizadores web (externos)';
$_lang["role_empty_trash"] = 'Permanently purge deleted Resources';
$_lang["role_errors"] = 'Ver avisos de erros';
$_lang["role_eventlog_management"] = 'Gestão de registos de eventos';
$_lang["role_export_static"] = 'Exportar HTML Estático';
$_lang["role_file_management"] = 'File Management';
$_lang["role_file_manager"] = 'Usar o gestor de ficheiros';
$_lang["role_frames"] = 'Pedir áreas (frames) do Interface de Gestão';
$_lang["role_help"] = 'Ver páginas de ajuda';
$_lang["role_home"] = 'Pedir página de início do Interface de Gestão';
$_lang["role_import_static"] = 'Importar HTML';
$_lang["role_logout"] = 'Sair do Interface de Gestão';
$_lang["role_list_module"] = 'List Module';
$_lang["role_manage_metatags"] = 'Gerir etiquetas (tags) META e palavras-chave do site';
$_lang["role_management_msg"] = 'Aqui pode escolher qual o perfil que deseja alterar.';
$_lang["role_management_title"] = 'Perfis';
$_lang["role_messages"] = 'Ver e enviar mensagens';
$_lang["role_module_management"] = 'Gestão de Módulos';
$_lang["role_name"] = 'Nome do Perfil';
$_lang["role_new_module"] = 'Criar um novo Módulo';
$_lang["role_new_role"] = 'Criar novos Perfis';
$_lang["role_new_user"] = 'Criar novos utilizadores';
$_lang["role_new_web_user"] = 'Criar novos utilizadores web (externos)';
$_lang["role_plugin_management"] = 'Gestão de Plugins';
$_lang["role_publish_doc"] = 'Publicar documentos';
$_lang["role_remove_locks"] = 'Remove Locks';
$_lang["role_role_management"] = 'Perfis';
$_lang["role_run_module"] = 'Executar Módulo';
$_lang["role_save_chunk"] = 'Guardar Chunks';
$_lang["role_save_doc"] = 'Guardar documentos';
$_lang["role_save_module"] = 'Guardar Módulo';
$_lang["role_save_password"] = 'Guardar senha';
$_lang["role_save_plugin"] = 'Guardar Plugins';
$_lang["role_save_role"] = 'Guardar Perfis';
$_lang["role_save_snippet"] = 'Guardar Snippets';
$_lang["role_save_template"] = 'Guardar Templates';
$_lang["role_save_user"] = 'Guardar utilizadores';
$_lang["role_save_web_user"] = 'Guardar utilizadores web (externos)';
$_lang["role_snippet_management"] = 'Gestão de Snippets';
$_lang["role_template_management"] = 'Gestão de Templates';
$_lang["role_title"] = 'Criar/editar perfil';
$_lang["role_udperms"] = 'Gestão de Permissões';
$_lang["role_user_management"] = 'Gestão de utilizadores';
$_lang["role_view_docdata"] = 'Ver dados do documento';
$_lang["role_view_eventlog"] = 'Ver registo de eventos';
$_lang["role_view_logs"] = 'Ver registos (logs) e relatórios do sistema';
$_lang["role_view_unpublished"] = 'Ver documentos não publicados';
$_lang["role_web_access_persmissions"] = 'Permissões de acesso Web';
$_lang["role_web_user_management"] = 'Gestão de utilizadores web (externos)';

// user
$_lang["user"] = 'Utilizador';
$_lang["users"] = 'Utilizadores';
$_lang["user_block"] = 'Bloqueado';
$_lang["user_blockedafter"] = 'Bloqueado após';
$_lang["user_blockeduntil"] = 'Bloqueado até';
$_lang["user_changeddata"] = 'Os seus dados foram alterados. Por favor volte a entrar no Interface de Gestão.';
$_lang["user_country"] = 'País';
$_lang["user_dob"] = 'Data de nascimento';
$_lang["user_doesnt_exist"] = 'O utilizador não existe';
$_lang["user_edit_self_msg"] = '<b>Deve sair do sistema e aceder novamente para implementar todas as alterações.</b><br />Caso decida gerar uma nova senha para si, esta ser-lhe-à enviada por e-mail.';
$_lang["user_email"] = 'Endereço de E-mail';
$_lang["user_failedlogincount"] = 'Tentativas de acesso falhadas';
$_lang["user_fax"] = 'Fax';
$_lang["user_female"] = 'Mulher';
$_lang["user_full_name"] = 'Nome Completo';
$_lang["user_first_name"] = 'First name';
$_lang["user_last_name"] = 'Last Name';
$_lang["user_middle_name"] = 'Middle Name';
$_lang["user_gender"] = 'Sexo';
$_lang["user_is_blocked"] = 'Este utilizador está bloqueado!';
$_lang["user_logincount"] = 'Número de acessos';
$_lang["user_male"] = 'Homem';
$_lang["user_management_msg"] = 'Aqui pode escolher que utilizador da lista de manutenção do site deseja editar. Estes utilizadores são aqueles que têm autorização para aceder ao Interface de Gestão de Conteúdos';
$_lang["user_management_title"] = 'Utilizadores Internos';
$_lang["user_mobile"] = 'Telemóvel';
$_lang["user_phone"] = 'Telefone';
$_lang["user_photo"] = 'Fotografia do utilizador';
$_lang["user_photo_message"] = 'Indique o URL da imagem ou use o botão \'Inserir\' para enviar uma imagem para o servidor.';
$_lang["user_prevlogin"] = 'Último acesso';
$_lang["user_role"] = 'Perfil do utilizador';
$_lang["no_user_role"] = 'No user role';
$_lang["user_state"] = 'Estado (Província)';
$_lang["user_title"] = 'Criar/Editar utilizador';
$_lang["user_upload_message"] = ' Se deseja impedir este utilizador de enviar algum tipo de ficheiro nesta categoria, certifique-se de que a caixa \'Usar Opções de Configuração Padrão\' não se encontra marcada e deixe este campo em branco.';
$_lang["user_use_config"] = 'Usar Opções de Configuração Padrão';
$_lang["user_verification"] = 'User is verified';
$_lang["user_zip"] = 'Código postal';
$_lang["username"] = 'Username';
$_lang["username_unique"] = 'User name is already in use!';
$_lang["user_street"] = 'Street';
$_lang["user_city"] = 'City';
$_lang["user_other"] = 'Other';

// add
$_lang["add"] = 'Adicionar';
$_lang["add_chunk"] = 'Adicionar Chunk';
$_lang["add_doc"] = 'Adicionar Documento';
$_lang["add_folder"] = 'Nova Pasta';
$_lang["add_plugin"] = 'Adicionar Plugin';
$_lang["add_resource"] = 'Novo Documento';
$_lang["add_snippet"] = 'Adicionar Snippet';
$_lang["add_tag"] = 'Adicionar etiqueta (tag)';
$_lang["add_template"] = 'Adicionar Template';
$_lang["add_tv"] = 'Adicionar variável de Template (TV)';
$_lang["add_weblink"] = 'Novo Weblink';

// new
$_lang["new_category"] = 'Nova Categoria';
$_lang["new_file_permissions_message"] = 'Quando enviar um novo ficheiro no Gestor de Ficheiros, este irá tentar alterar as permissões do ficheiro para as que indicar nesta opção. Em algumas instalações isto poderá não funcionar (por exemplo em IIS), caso em que terá que alterar manualmente as permissões do ficheiro.';
$_lang["new_file_permissions_title"] = 'Permissões de ficheiros novos';
$_lang["new_folder_permissions_message"] = 'Quando criar uma nova pasta no Gestor de Ficheiros, este irá tentar alterar as permissões da pasta para as que indicar nesta opção. Em algumas instalações isto poderá não funcionar (por exemplo em IIS), caso em que terá que alterar manualmente as permissões da pasta.';
$_lang["new_folder_permissions_title"] = 'Permissões de pastas novas';
$_lang["new_permission"] = 'New Permission';
$_lang["new_htmlsnippet"] = 'Novo Chunk';
$_lang["new_keyword"] = 'Adicionar nova palavra-chave:';
$_lang["new_module"] = 'Novo Módulo';
$_lang["new_parent"] = 'Novo antecessor';
$_lang["new_plugin"] = 'Novo Plugin';
$_lang["new_role"] = 'Criar um novo perfil';
$_lang["new_snippet"] = 'Novo Snippet';
$_lang["new_template"] = 'Novo Template';
$_lang["new_tmplvars"] = 'Nova Variável de Template (TV)';
$_lang["new_user"] = 'Novo utilizador';
$_lang["new_web_user"] = 'Novo Utilizador Externo (Web)';
$_lang["new_resource"] = 'Novo Documento';

// manage
$_lang["manage_categories"] = 'Manage Categories';
$_lang["manage_depends"] = 'Gerir dependências';
$_lang["manage_files"] = 'Gerir Ficheiros';
$_lang["manage_htmlsnippets"] = 'Manage Chunks';
$_lang["manage_metatags"] = 'Gerir Etiquetas (tags) META e Palavras-chave';
$_lang["manage_modules"] = 'Gerir Módulos';
$_lang["manage_plugins"] = 'Manage Plugins';
$_lang["manage_snippets"] = 'Manage Snippets';
$_lang["manage_templates"] = 'Manage Templates';
$_lang["manage_documents"] = 'Manage Documents';
$_lang["manage_permission"] = 'Manage Permissions';

// move
$_lang["move"] = 'Mover';
$_lang["move_resource"] = 'Mover documento';
$_lang["move_resource_message"] = 'Pode mover o documento e todos os seus antecessores seleccionando um novo antecessor na árvore. Se seleccionar um documento que não esteja dentro de uma pasta, este documento será convertido para pasta automaticamente. Por favor seleccione um novo antecessor na árvore.';
$_lang["move_resource_new_parent"] = 'Por favor seleccione um novo antecessor na árvore de documentos.';
$_lang["move_resource_title"] = 'Mover documento';

$_lang["access_permissions"] = 'Permissões de Acesso';
$_lang["access_permission_denied"] = 'Não tem permissão para ver este documento.';
$_lang["access_permission_parent_denied"] = 'Não tem permissão para criar ou mover um documento para aqui! Por favor escolha outra localização.';
$_lang["access_permissions_add_resource_group"] = 'Criar um novo grupo de documentos';
$_lang["access_permissions_add_user_group"] = 'Criar um novo grupo de utilizadores';
$_lang["access_permissions_docs_message"] = 'Aqui pode seleccionar a que grupos pertence este documento';
$_lang["access_permissions_group_link"] = 'Create a new group link';
$_lang["access_permissions_introtext"] = 'Aqui pode gerir os grupos de utilizadores e de documentos usados para as permissões de acesso. Para adicionar um utilizador a um grupo de utilizadores, edite o utilizador e seleccione os grupos dos quais ele deve ser mebro. Para adicionar um documento a um grupo de utilizadores, edite o documento e seleccione os grupos a que este deve pertencer.';
$_lang["access_permissions_link_to_group"] = 'to Resource Group';
$_lang["access_permissions_context"] = 'in context';
$_lang["access_permissions_link_user_group"] = 'Link User Group';
$_lang["access_permissions_links"] = 'Links de grupos de Utilizador/Documentos';
$_lang["access_permissions_links_tab"] = 'Aqui pode especificar que grupos de utilizadores têm acesso (i.e. podem editar ou definir parentescos) aos grupos de documentos. Para ligar um grupo de documentos a um grupo de utilizadores, seleccione o grupo no menu e clique em \'Adicionar\'. Para remover uma ligação para um determinado grupo, clique em \'Remover ->\'. Isto remove imediatamente a ligação.';
$_lang["access_permissions_no_resources_in_group"] = 'Nenhum.';
$_lang["access_permissions_no_users_in_group"] = 'Nenhum.';
$_lang["access_permissions_off"] = '<span class=\'warning\'>As permissões de acesso não estão activas.</span> Qualquer mudança não será efectuada até que as permissões de acesso estejam activas.';
$_lang["access_permissions_resource_groups"] = 'Grupos de documentos';
$_lang["access_permissions_resources_in_group"] = '<b>Documentos no grupo:</b> ';
$_lang["access_permissions_resources_tab"] = 'Aqui pode ver que grupos de documentos estão definidos. Pode criar novos grupos, alterar o nome dos grupos, apagar grupos e ver que documentos pertencem aos diferentes grupos. Para adicionar ou remover um documento de um grupo, edite-o directamente.';
$_lang["access_permissions_user_toggle"] = 'Toggle access permissions';
$_lang["access_permissions_user_groups"] = 'Grupos de utilizadores';
$_lang["access_permissions_user_message"] = 'Aqui pode seleccionar a que grupos este utilizador pertence.';
$_lang["access_permissions_users_in_group"] = '<b>Utilizadores no grupo:</b> ';
$_lang["access_permissions_users_tab"] = 'Aqui pode ver que grupos de utilizadores estão definidos. Pode criar novos grupos, alterar o nome dos grupos, apagar grupos e ver quem são os membros dos diferentes grupos. Para adicionar ou remover um utilizador de um grupo, edite o utilizador directamente. Administradores (utilizadores a quem foi atribuído o perfil com ID 1) têm sempre acesso a todos os documentos e não precisam de ser adicionados a nenhum grupo.';

$_lang["users_list"] = 'Users list';
$_lang["documents_list"] = 'Resources list';

$_lang["account_email"] = 'Conta de E-mail';
$_lang["actioncomplete"] = '<b>Acção concluída!</b><br /> - Por favor aguarde enquanto o EVO refresca a página.';
$_lang["activity_message"] = 'Esta lista mostra os últimos documentos que foram criados ou editados:';
$_lang["activity_title"] = 'Documentos editados/criados recentemente';

$_lang["administrator_role_message"] = 'Este Perfil não pode ser editado ou apagado.';
$_lang["administrators"] = 'Administrators';
$_lang["after_saving"] = 'Depois de guardar';
$_lang["alert_delete_self"] = 'VNão pode apagar-se a si próprio!';
$_lang["alias"] = 'Apelido';
$_lang["all_doc_groups"] = 'Todos os grupos de documentos (Público)';
$_lang["all_events"] = 'Todos os Eventos';
$_lang["all_usr_groups"] = 'Todos os grupos de utilizadores (Público)';
$_lang["allow_mgr_access"] = 'Acesso ao Interface de gestão de Conteúdos';
$_lang["allow_mgr_access_message"] = 'Seleccione esta opção para permitir ou impedir o acesso ao Interface de Gestão de Conteúdos. <b>NOTA: se esta opção estiver marcada como \'Não\', o utilizador será redireccionado para a entrada do Interface de Gestão de Conteúdos ou para a página inicial do site.</b>';
$_lang["already_deleted"] = 'já foi apagado anteriormente.';
$_lang["attachment"] = 'Anexo';
$_lang["author_infos"] = 'Author information';
$_lang["automatic_alias_message"] = 'Seleccione \'sim\' para fazer com que o sistema gere automaticamente um apelido baseado no título da página quando estiver salvando.';
$_lang["automatic_alias_title"] = 'Gerar apelido automaticamente:';
$_lang["backup"] = 'Cópia de Segurança (Backup)';
$_lang["bk_manager"] = 'Cópia de Segurança (Backup)';
$_lang["block_message"] = 'Este utilizador será bloqueado logo após a salvaguarda dos seus dados!';
$_lang["blocked_minutes_message"] = 'Aqui pode indicar o número de minutos que um utilizador ficará bloqueado se atingir o número máximo de tentativas de login falhadas. Por favor indique um valor numérico (sem vírgulas, espaços, etc.)';
$_lang["blocked_minutes_title"] = 'Duração do bloqueio (min):';
$_lang["cache_files_deleted"] = 'Os seguintes ficheiros foram apagados:';
$_lang["cancel"] = 'Cancelar';
$_lang["captcha_code"] = 'Código de segurança';
$_lang["captcha_message"] = 'Active este recurso para exigir aos utilizadores a introdução de códigos que não são reconhecidos por máquinas (e scripts maliciosos de hackers).';
$_lang["captcha_title"] = 'Usar códigos de segurança (CAPTCHA):';
$_lang["captcha_words_default"] = 'MODX,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join(),Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote';
$_lang["captcha_words_message"] = 'Aqui pode introduzir uma lista de palavras a criptografar em imagens (CAPTCHA) quando este recurso estiver activado. Separe-as com vírgulas. Este campo está limitado a 255 caracteres.';
$_lang["captcha_words_title"] = 'Palavras encriptadas (CAPTCHA)';

$_lang["cfg_base_path"] = 'MODX_BASE_PATH';
$_lang["cfg_base_url"] = 'MODX_BASE_URL';
$_lang["cfg_manager_path"] = 'MODX_MANAGER_PATH';
$_lang["cfg_manager_url"] = 'MODX_MANAGER_URL';
$_lang["cfg_site_url"] = 'MODX_SITE_URL';

$_lang["change_name"] = 'Alterar nome';
$_lang["change_password"] = 'Alterar senha';
$_lang["change_password_confirm"] = 'Confirmar senha';
$_lang["change_password_message"] = 'Por favor digite a nova senha e repita novamente a senha para confirmar a mudança. A sua senha tem que ter no mínimo 6 caracteres e no máximo 15 caracteres de comprimento.';
$_lang["change_password_new"] = 'Nova senha';
$_lang["charset_message"] = 'Seleccione o tipo de codificação de caracteres padronizados em que é lido o sistema. Por favor note que o EVO foi testado com diversas codificações, mas não todas. Para a maioria dos idiomas, a escolha padrão ISO-8859-1 é suficiente.';
$_lang["charset_title"] = 'Codificação de caracteres:';

$_lang["cleaningup"] = 'Limpar';
$_lang["clean_uploaded_filename"] = 'Use Transliteration for File Uploads';
$_lang["clean_uploaded_filename_message"] = 'Use the default or transalias settings for the file name to clean special characters from uploaded file names, preserving dot-characters (periods)';
$_lang["clear_log"] = 'Limpar registo';
$_lang["click_to_context"] = 'Clique aqui para aceder ao menu de contexto';
$_lang["click_to_edit_title"] = 'Clique aqui para editar este registo';
$_lang["click_to_view_details"] = 'Clique aqui para ver detalhes';
$_lang["close"] = 'Fechar';
$_lang["code"] = 'Code';
$_lang["collapse_tree"] = 'Contrair árvore';
$_lang["comment"] = 'Comentário';

$_lang["configcheck_admin"] = 'Por favor contacte o adiminstrador do sistema e comunique este aviso!';
$_lang["configcheck_cache"] = 'cache directory is not writable';
$_lang["configcheck_cache_msg"] = 'Evolution CMS cannot write to the cache directory. Evolution CMS will still function as expected, but no caching will take place. To solve this, make the \'cache\' directory writable.';
$_lang["configcheck_configinc"] = 'Ficheiro de configuração ainda editável';
$_lang["configcheck_configinc_msg"] = 'Gente mal intencionada poderá eventualmente afectar seriamente o site e tudo o que lhe estiver associado. <strong>A sério.</strong> Por favor desligue as permissões de escrita no ficheiro de configuração (/[+MGR_DIR+]/includes/config.inc.php)!';
$_lang["configcheck_default_msg"] = 'Um erro não especificado foi encontrado. Contacte o suporte técnico.';
$_lang["configcheck_errorpage_unavailable"] = 'A página de erro do seu site não está disponível.';
$_lang["configcheck_errorpage_unavailable_msg"] = 'Isto significa que a Página de erro não está disponível a utilizadores normais da web ou não existe. Isto pode conduzir a um ciclo recursivo e a muitos erros nos registos do site. Certifique-se de que não existem grupos de webusers alocados a essa página.';
$_lang["configcheck_errorpage_unpublished"] = 'A página de erro do seu site não está publicada.';
$_lang["configcheck_errorpage_unpublished_msg"] = 'Isto significa que a sua Página de erro não está acessível para o público geral. Publique a página ou certifique-se de que esta está afectada a um documento existente na árvore de documentos no menu <b>Ferramentas &gt; Configuração</b>.';
$_lang["configcheck_filemanager_path"] = 'The currently set <a href="index.php?a=17&tab=4">File Manager path</a> seems incorrect.';
$_lang["configcheck_filemanager_path_msg"] = 'This can happen for example by moving your installation to a different directory or server. Please check and update your Evolution CMS configuration.';
$_lang["configcheck_hide_warning"] = '<a href="javascript:hideConfigCheckWarning(\'%s\');"><em>Don\'t show this again.</em></a>';
$_lang["configcheck_images"] = 'Directório de imagens sem permissão de escrita';
$_lang["configcheck_images_msg"] = 'O directório de imagens não tem permissão de escrita, ou não existe: as funções de gestão de imagens não podem funcionar!';
$_lang["configcheck_installer"] = 'Instalador continua presente';
$_lang["configcheck_installer_msg"] = 'O directório install/ contém o instalador do sistema. Acedendo ao instalador, qualquer pessoa mal intencionada pode tomar conta do site e apagar todo o seu trabalho até agora. Contacte o administrador para retirar o instalador o mais rápido possível!';
$_lang["configcheck_lang_difference"] = 'Número de entradas incorrectas no ficheiro de linguagem';
$_lang["configcheck_lang_difference_msg"] = 'A língua seleccionada tem um número de entradas diferente do ficheiro de língua padrão. Isto não é necessariamente um problema, mas os ficheiros de línguas deverão ser actualizados.';
$_lang["configcheck_notok"] = 'Um ou mais pontos de configuração não foram validados:';
$_lang["configcheck_ok"] = 'Aprovados com sucesso (OK) - nada a assinalar.';
$_lang["configcheck_php_gdzip"] = 'GD and/or Zip PHP extensions not found';
$_lang["configcheck_php_gdzip_msg"] = 'EVO needs the GD and Zip extension enabled for PHP. While EVO will work without them, you will not be able to take full advantage of the built-in File Manager, Image Editor or Captcha for logins.';
$_lang["configcheck_rb_base_dir"] = 'The currently set <a href="index.php?a=17&tab=5">File base path</a> seems incorrect.';
$_lang["configcheck_rb_base_dir_msg"] = 'This can happen for example by moving your installation to a different directory or server. Please check and update your Evolution CMS configuration.';
$_lang["configcheck_register_globals"] = 'register_globals está definido como ON no ficheiro de configuração php.ini';
$_lang["configcheck_register_globals_msg"] = 'Esta configuração torna o site muito mais suspceptível a ataques Cross Site Scripting (XSS). Aconselha-se que contacte o seu provedor de hosting para saber o que pode ser feito para desactivar esta opção.';
$_lang["configcheck_title"] = 'Verificar configuração';
$_lang["configcheck_templateswitcher_present"] = 'TemplateSwitcher Plugin detected';
$_lang["configcheck_templateswitcher_present_delete"] = '<a href="javascript:deleteTemplateSwitcher();">Delete TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_disable"] = '<a href="javascript:disableTemplateSwitcher();">Disable TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_msg"] = 'The TemplateSwitcher plugin has been found to cause caching and performance problems, and should be used only the functionality is required in your site.';
$_lang["configcheck_unauthorizedpage_unavailable"] = 'A página de \'acesso não autorizado\' do seu site não está disponível.';
$_lang["configcheck_unauthorizedpage_unavailable_msg"] = 'Isto significa que a Página de \'acesso não autorizado\' não está disponível a utilizadores normais da web ou não existe. Isto pode conduzir a um ciclo recursivo e a muitos erros nos registos do site. Certifique-se de que não existem grupos de webusers alocados a essa página.';
$_lang["configcheck_unauthorizedpage_unpublished"] = 'A página de \'acesso não autorizado\' do seu site não está publicada.';
$_lang["configcheck_unauthorizedpage_unpublished_msg"] = 'Isto significa que a sua página de \'acesso não autorizado\' não está acessível para o público geral. Publique a página ou certifique-se de que esta está afectada a um documento existente na árvore de documentos no menu <b>Ferramentas &gt; Configuração</b>.';
$_lang["configcheck_validate_referer"] = 'Security Warning: HTTP Header Validation';
$_lang["configcheck_validate_referer_msg"] = 'The configuration setting <strong>Validate HTTP_REFERER headers?</strong> is Off. We recommend turning it On. <a href="index.php?a=17">Go to Configuration options</a>';
$_lang["configcheck_warning"] = 'Avisos de configuração:';
$_lang["configcheck_what"] = 'O que significa isto?';

$_lang["safe_mode_warning"] = 'Safe mode is enabled. Manager functionality is limited.';

$_lang["confirm_block"] = 'De certeza que deseja bloquear este utilizador?';
$_lang["confirm_delete_category"] = 'Are you sure you want to delete this category?';
$_lang["confirm_delete_eventlog"] = 'De certeza que quer apagar este registo (log) de evento?';
$_lang["confirm_delete_file"] = 'De certeza que deseja apagar o ficheiro?\n\nIsto poderá provocar erros no funcionamento do site ou até mesmo fazer com que o este deixe de funcionar! Apenas faça isso se tiver certeza que não irá afectar nada no site.';
$_lang["confirm_delete_group"] = 'Are you sure you want to delete this group?';
$_lang["confirm_delete_htmlsnippet"] = 'Tem certeza que deseja apagar este Chunk?';
$_lang["confirm_delete_keywords"] = 'De certeza que deseja apagar estas palavras-chave?';
$_lang["confirm_delete_module"] = 'De certeza que deseja apagar este módulo?';
$_lang["confirm_delete_plugin"] = 'De certeza que deseja apagar este plugin?';
$_lang["confirm_delete_record"] = 'De certeza que deseja apagar o(s) registo(s) seleccionado(s)?';
$_lang["confirm_delete_resource"] = 'De certeza que deseja apagar este documento?\nQualquer documento dependente deste também será apagado.';
$_lang["confirm_delete_role"] = 'De certeza que deseja apagar este perfil?';
$_lang["confirm_delete_snippet"] = 'De certeza que deseja apagar este snippet?';
$_lang["confirm_delete_tags"] = 'De certeza que deseja apagar a(s) etiqueta(s) META seleccionada(s)?';
$_lang["confirm_delete_template"] = 'De certeza que deseja apagar este Template?';
$_lang["confirm_delete_tmplvars"] = 'De certeza que deseja apagar esta variável e todos os valores guardados?';
$_lang["confirm_delete_user"] = 'De certeza que deseja apagar este utilizador?';

$_lang["delete_yourself"] = 'You can\'t delete yourself';
$_lang["delete_last_admin"] = 'You can\'t delete last admin user';

$_lang["confirm_delete_permission"] = 'Are you sure you want to delete this Permission?';
$_lang["confirm_duplicate_record"] = 'De certeza que deseja duplicar este registo?';
$_lang["confirm_empty_trash"] = 'Isto vai apagar permanentemente TODOS os documentos.\n\nDeseja Continuar?';
$_lang["confirm_load_depends"] = 'De certeza que deseja abrir o gestor de dependências antes de gravar sua modificações?';
$_lang["confirm_name_change"] = 'Mudar o username pode afectar outras aplicações que estão relacionadas com o Gestor de Conteúdos.\n\n De certeza que quer mudar o username?';
$_lang["confirm_publish"] = 'Publicar este documento agora apaga todas as datas que tenham sido definidas. Se deseja manter as datas de publicação e retirada do documento, por favor escolha a opção \'Editar\'.\n\nDeseja continuar?';
$_lang["confirm_remove_locks"] = 'Por vezes os utilizadores fecham os seus navegadores enquanto criam ou editam alguns documentos, Templates, Snippets ou parsers, possivelmente deixando items bloqueados. Pressionando OK, remove TODOS os bloqueios.\n\nDeseja continuar?';
$_lang["confirm_reset_sort_order"] = 'Are you sure you want to reset the \"sort order/index\" of all listed elements to 0 ?';
$_lang["confirm_resource_duplicate"] = 'De certeza que deseja duplicar este documento? Quaisquer items que o mesmo contenha serão igualmente duplicados.';
$_lang["confirm_setting_language_change"] = 'You have modified the default value and will lose the changes. Proceed?';
$_lang["confirm_unblock"] = 'Tem a certeza que deseja desbloquear este utilizador?';
$_lang["confirm_undelete"] = 'Qualquer documento dependente que tenha sido apagado ao mesmo tempo será recuperado. Documentos que tenham sido apagados anteriormente não serão recuperados.';
$_lang["confirm_unpublish"] = 'Retirar publicação a este documento agora apaga todas as datas que tenham sido definidas. Se deseja manter as datas de publicação e retirada do documento, por favor escolha a opção \'Editar\'.\n\nDeseja continuar?';
$_lang["confirm_unzip_file"] = 'Tem certeza que deseja descompactar (unzip) este ficheiro?\n\nFicheiros existentes serão sobrescritos.';

$_lang["could_not_find_user"] = 'Utilizador não encontrado';

$_lang["create_folder_here"] = 'Criar pasta aqui';
$_lang["create_resource_here"] = 'Criar documento aqui';
$_lang["create_resource_title"] = 'Create Resource';
$_lang["create_weblink_here"] = 'Criar Weblink aqui';
$_lang["createdon"] = 'Data de criação';
$_lang["create_new"] = 'Create new';

$_lang["credits"] = 'Créditos';
$_lang["credits_shouts_msg"] = '<p>EVO é gerenciado e mantido em <a href="https://evo-cms.com//" target="_blank">evo-cms.com</a>.</p>';
$_lang["custom_contenttype_message"] = 'Aqui pode adicionar tipos de conteúdos personalizados para usar nos seus documentos. Para adicionar uma nova entrada, digite o tipo de conteúdo na caixa de texto e clique no botão \'Adicionar\'.';
$_lang["custom_contenttype_title"] = 'Tipos de conteúdos personalizados:';

$_lang["database_charset"] = 'Database Charset';
$_lang["database_collation"] = 'Database Collation Charset';
$_lang["database_name"] = 'Nome da Base de Dados';
$_lang["database_overhead"] = '<b style=\'color:#990033\'>Nota:</b> A \'folga\' (overhead) consiste num espaço não utilizado mas reservado pelo MySQL. Para libertar este espaço, clique no valor de folga da tabela.';
$_lang["database_server"] = 'Servidor da Base de Dados';
$_lang["database_table_clickbackup"] = 'para criar Cópia de Segurança (Backup) e descarregar as tabelas seleccionadas';
$_lang["database_table_clickhere"] = 'Clique aqui';
$_lang["database_table_datasize"] = 'Tamanho de dados';
$_lang["database_table_droptablestatements"] = 'Gerar instruções DROP TABLE (substitui tabelas existentes numa BD de destino)';
$_lang["database_table_effectivesize"] = 'Tamanho efectivo';
$_lang["database_table_indexsize"] = 'Tamamho do índice';
$_lang["database_table_overhead"] = 'Folga (overhead)';
$_lang["database_table_records"] = 'Registos';
$_lang["database_table_tablename"] = 'Nome da tabela';
$_lang["database_table_totals"] = 'Totais:';
$_lang["database_table_totalsize"] = 'Tamanho total';
$_lang["database_tables"] = 'Tabelas da Base de Dados';
$_lang["database_version"] = 'Database Version';

$_lang["date"] = 'Data';
$_lang["datechanged"] = 'Data alteração';
$_lang["datepicker_offset"] = 'Datepicker offset';
$_lang["datepicker_offset_message"] = 'The number of years to show in the past on the datepicker.';
$_lang["datetime_format"] = 'Date format';
$_lang["datetime_format_message"] = 'The format for dates in the Manager.';

$_lang["default"] = 'Default:';
$_lang["defaultcache_message"] = 'Seleccione \'Sim\' para activar a cache por defeito em todos os documentos.';
$_lang["defaultcache_title"] = 'Cache Padrão';
$_lang["defaultmenuindex_message"] = 'Seleccione \'Sim\' para ligar por defeito a indexação automática e incremental dos menus.';
$_lang["defaultmenuindex_title"] = 'Indexação Padrão';
$_lang["defaultpublish_message"] = 'Seleccione \'Sim\' para fazer com que todos os novos documentos sejam publicados por defeito.';
$_lang["defaultpublish_title"] = 'Publicação Padrão';
$_lang["defaultsearch_message"] = 'Seleccione \'Sim\' para activar por defeito a procura nos documentos.';
$_lang["defaultsearch_title"] = 'Procura Padrão';
$_lang["defaulttemplate_message"] = 'Seleccione o Template padrão que deseja utilizar em novos documentos. Pode seleccionar um Template diferente no editor de documentos. Esta opção apenas selecciona o Template a utilizar por defeito.';
$_lang["defaulttemplate_title"] = 'Template Padrão';
$_lang["defaulttemplate_logic_title"] = 'Automatic Template Assignment';
$_lang["defaulttemplate_logic_general_message"] = 'New Resources will have the following templates, falling back to higher levels if not found:';
$_lang["defaulttemplate_logic_system_message"] = '<strong>System</strong>: the System Default Template.';
$_lang["defaulttemplate_logic_parent_message"] = '<strong>Parent</strong>: the same Template as the parent container.';
$_lang["defaulttemplate_logic_sibling_message"] = '<strong>Sibling</strong>: the same Template as other Resources in the same container.';

$_lang["delete"] = 'Apagar';
$_lang["delete_resource"] = 'Apagar documento';
$_lang["delete_tags"] = 'Apagar etiquetas (tags)';
$_lang["deleting_file"] = 'Apagando ficheiro(s) `%s`: ';
$_lang["description"] = 'Descrição';
$_lang["deselect_keywords"] = 'Limpar palavras-chave';
$_lang["deselect_metatags"] = 'Limpar etiquetas (tags) META';
$_lang["disabled"] = 'Desactivado';
$_lang["doc_data_title"] = 'Ver dados do documento';
$_lang["documentation"] = 'Documentation';

$_lang["duplicate"] = 'Duplicar';
$_lang["duplicate_alias_found"] = 'O Documento \'%s\' já utiliza o apelido (alias) \'%s\'. Por favor indique um apelido único.';
$_lang["duplicate_template_alias_found"] = 'Template \'%s\' is already using the URL alias \'%s\'. Please enter a unique alias.';
$_lang["duplicate_alias_message"] = 'Aqui pode seleccionar \'Sim\' para permitir que apelidos sejam duplicados quando salvos. <b>NOTA: esta opção deverá ser usada com a opção \'Usar caminho completo com o apelido (alias)\' activa para evitar problemas quando referenciar um documento.</b>';
$_lang["duplicate_alias_title"] = 'Permitir apelidos duplicados:';
$_lang["duplicate_name_found_general"] = 'There is already a %s named \'%s\'. Please enter a unique name.';
$_lang["duplicate_name_found_module"] = 'There is already a Module named \'%s\'. Please enter a unique name.';
$_lang["duplicated_el_suffix"] = 'Duplicate';

$_lang["edit"] = 'Editar';
$_lang["edit_resource"] = 'Editar documento';
$_lang["edit_resource_title"] = 'Criar/editar documento';
$_lang["edit_settings"] = 'Configuração';
$_lang["editedon"] = 'Data de Edição';
$_lang["editing_file"] = 'Editando o ficheiro: ';
$_lang["editor_css_path_message"] = 'Digite o caminho para o ficheiro CSS que quer usar dentro do editor. A melhor forma de digitar o caminho é usando o caminho da raiz do servidor, por exemplo: /assets/site/style.css. Se não deseja utilizar estilos CSS no editor gráfico (estilo Word), deixe este campo em branco.';
$_lang["editor_css_path_title"] = 'Caminho para o ficheiro CSS:';

$_lang["email"] = 'E-mail';
$_lang["email_sent"] = 'Email enviado';
$_lang["email_unique"] = 'Email is already in use!';
$_lang["emailsender_message"] = 'Aqui pode especificar o endereço de e-mail que será usado para enviar usernames e senhas aos utilizadores.';
$_lang["emailsender_title"] = 'Endereço de e-mail:';
$_lang["emailsubject_default"] = 'Your login details';
$_lang["emailsubject_message"] = 'Aqui pode especificar o assunto do e-mail de inscrição no site.';
$_lang["emailsubject_title"] = 'Assunto do e-mail:';

$_lang["empty_folder"] = 'Esta pasta está vazia';
$_lang["empty_recycle_bin"] = 'Purgar documentos apagados';
$_lang["empty_recycle_bin_empty"] = 'Não existem documentos apagados para purgar.';
$_lang["enable_resource"] = 'Activar recurso';
$_lang["enable_sharedparams"] = 'Activar partilha de parâmetros';
$_lang["enable_sharedparams_msg"] = '<b>Importante:</b> A ID global a seguir (GUID) será usada para identificar unicamente este módulo nos recursos partilhados. A GUID pode ser usada para ligar o módulo com snippets e plugins e seus parâmetros partilhados. ';
$_lang["enabled"] = 'Activado';
$_lang["error"] = 'Erro';
$_lang["error_sending_email"] = 'Error no envio de e-mail';
$_lang["errorpage_message"] = 'Introduza a ID do documento que deseja que apareça quando um página não for encontrada ou existirem erros no documento (ex: se o documento não estiver publicado). <b>NOTA: Certifique-se de que esta ID corresponde a um documento existente e publicado!</b>';
$_lang["errorpage_title"] = 'Página de Erro:';
$_lang["event_id"] = 'ID do evento';
$_lang["eventlog"] = 'Registo de eventos';
$_lang["eventlog_msg"] = 'O registo de eventos é usado para mostrar informação, avisos e mensagens de erro gerados pelo Gestor de Conteúdos. A coluna \'Fonte\' mostra a sessão em que se originou cada evento.';
$_lang["eventlog_viewer"] = 'Eventos do Sistema';
$_lang["everybody"] = 'Everybody';
$_lang["existing_category"] = 'Categoria existente';
$_lang["expand_tree"] = 'Expandir árvore';
$_lang["failed_login_message"] = 'Aqui pode indicar o número de tentativas de login falhadas que são admitidas até que o utilizador seja bloqueado.';
$_lang["failed_login_title"] = 'Tentativas de Login falhadas:';
$_lang["fe_editor_lang_message"] = 'Escolha um idioma para o editor usar quando utilizado como editor de \'front-end\'';
$_lang["fe_editor_lang_title"] = 'Idioma do editor \'front-end\':';

$_lang["filemanager_path_message"] = 'Frequentemente, o IIS não interpreta correctamente a opção document_root utilizada pelo Gestor de Ficheiros para determinar o que o utilizador pode ver. Se tiver problemas ao usar o Gestor de Ficheiros, certifique-se de que este caminho aponta para a raiz da instalação do sistema EVO.';
$_lang["filemanager_path_title"] = 'Caminho do Gestor de Ficheiros:';

$_lang["folder"] = 'Pasta';
$_lang["forgot_password_email_fine_print"] = '* O URL acima irá expirar ao fim de um dia ou assim que alterar a password.';
$_lang["forgot_password_email_instructions"] = 'A partir daí poderá alterar a sua password através do menu A Minha Conta.';
$_lang["forgot_password_email_intro"] = 'Foi feito um pedido para alterar a senha da sua conta.';
$_lang["forgot_password_email_link"] = 'Clique aqui para completar o processo.';
$_lang["forgot_your_password"] = 'Esqueceu a sua senha?';
$_lang["friendly_alias_message"] = 'Se estiver a utilizar o recurso de URLs amigáveis e o documento tiver um apelido, o apelido terá sempre preferência. Se deixar esta opção em \'SIM\', ao link com apelido será ainda aplicado o prefixo e o sufixo. Por exemplo, se tem um documento com o ID 1, com o apelido \'paginainicial\', o prefixo for \'xx\' e o sufixo \'.html\', colocando esta opção como \'SIM\' será gerado \'xxpaginainicial.html\'. Se estiver marcado como \'Não\', o EVO irá gerar \'xx1.html\' como link.';
$_lang["friendly_alias_title"] = 'Usar endereços (URLs) amigáveis com apelido (alias)';
$_lang["friendlyurls_message"] = 'Isto permite que sejam usados endereços (URLs) mais fáceis para os motores de busca (Google, Yahoo, etc...). <b>NOTA: apenas funciona em instalações do EVO que corram em Apache. Veja o arquivo .htaccess incluído com a distribuição do EVO. Contacte o seu provedor de acesso (hosting) em caso de dúvidas.</b>';
$_lang["friendlyurls_title"] = 'Usar endereços (URLs) amigáveis:';
$_lang["friendlyurlsprefix_message"] = 'Aqui pode especificar o prefixo a usar nos URLs amigáveis. Por exemplo, se atribuir um prefixo \'pagina\', o URL /index.php?id=2 transforma-se em /pagina2.html (assumindo que o sufixo indicado é .html). Dessa forma, pode especificar o que os utilizadores e os motores de busca verão como links no seu site.';
$_lang["friendlyurlsprefix_title"] = 'Prefixo para URLs amigáveis:';
$_lang["friendlyurlsuffix_message"] = 'Aqui pode especificar o sufixo que será usado nos URLs amigáveis. Especificando \'.html\' será adicionado .html no final de todos os URLs. amigáveis.';
$_lang["friendlyurlsuffix_title"] = 'Sufixo para URLs amigáveis:';
$_lang["functionnotimpl"] = 'Desculpe!';
$_lang["functionnotimpl_message"] = 'Função não implementada até o momento.';
$_lang["further_info"] = 'Further information';
$_lang["global_tabs"] = 'Global Tabs';
$_lang["go"] = 'Iniciar!';
$_lang["group_access_permissions"] = 'Permissões de acesso do grupo';
$_lang['group_tvs'] = 'Group TV';
$_lang["guid"] = 'GUID';
$_lang["help"] = 'Ajuda';
$_lang["help_msg"] = '<p>Pode obter ajuda gratuitamente junto da <a href="http://forums.modx.com/" target="_blank">comunidade que suporta o EVO. Existe igualmente um conjunto crescente de <a href="http://rtfm.modx.com/evolution/1.0" target="_blank">Documentação e Guias</a> que cobrem muitos aspectos do EVO.</p><p>Contamos igualmente oferecer suporte técnico especializado para o EVO. Por favor <a href="mailto:hello@modx.com?subject=MODX Commercial Support Inquiry">contacte-nos se estiver interessado</a>.</p><p><b>Atenção:</b> actualmente a maior parte da documentação encontra-se apenas disponível em Inglês. Pode contactar alguns falantes de Português que utilizam o EVO <a href=\'http://forums.modx.com/index.php/board,40.0.html\' target=\'_blank\'>na secção sobre Internacionalização do forum EVO</a>.</p>';
$_lang["help_title"] = 'Ajuda';
$_lang["hide_tree"] = 'Ocultar árvore';
$_lang["home"] = 'Início';

$_lang["icon"] = 'Ícone';
$_lang["icon_description"] = 'CSS class value. e.g. fa&nbsp;fa-star';
$_lang["id"] = 'ID';
$_lang["illegal_parent_child"] = 'Atribuição de antecessor inválido:\n\nO documento é filho dos documentos seleccionados.';
$_lang["illegal_parent_self"] = 'Atribuição de antecessor inválido:\n\nO documento seleccionado não pode ter parentesco com ele mesmo.';
$_lang["images_management"] = 'Manage Images';
$_lang["import_files_found"] = '<b>Encontrados %s documentos para importação...</b>';
$_lang["import_params"] = 'Importar parâmetros partilhados do módulo';
$_lang["import_params_msg"] = 'Pode importar os parâmetros ou configurações de um módulo seleccionando-o no menu acima.<b>NOTA:</b> Para que o módulo pretendido apareça neste menu, o plugin/snippet deve fazer parte de uma dependência da listagem de módulos e o módulo deve ter a partilha de parâmetros activa.';
$_lang["import_parent_resource"] = 'Documento Antecessor:';
$_lang["update_tree"] = 'Reconstruir a árvore';
$_lang["update_tree_description"] = '<ul>
<li>Closure table database design pattern that makes working with the document tree more convenient and fast </li>
<li>If the data in the tree is updated not through models, then there is a possibility of an incorrect linking of documents in the database </li>
<li>This operation fixes the problem when site_content is not updated through the model (save, create) and the links (Closure table) are not updated </li>
<li>It is also possible to perform this operation in CLI mode via the \'php artisan closuretable: rebuild\' command </li>
</ul>';
$_lang["update_tree_danger"] = 'If you have more than 1000 resources, it is better to perform this operation in CLI mode using the \'php artisan closuretable: rebuild command\'';
$_lang["update_tree_time"] = 'Rebuild tree finished. Documents processed: <b>%s</b><br>Import took <b>%s</b> seconds to complete.';
$_lang["info"] = 'Informações';
$_lang["information"] = 'Informação';
$_lang["inline"] = 'Em linha';
$_lang["insert"] = 'Inserir';
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
$_lang["keyword"] = 'Palavra-chave';
$_lang["keywords"] = 'Palavras-chave';
$_lang["keywords_intro"] = 'Para editar uma palavra-chave, simplesmente digite na caixa de texto em frente da palavra-chave que quer alterar. Para apagar uma palavra-chave, marque o campo \'Apagar\' para aquela palavra. Se marcar o campo apagar e alterar a palavra, ainda assim a palavra será apagada!';
$_lang["language_message"] = 'Seleccione em que idioma deseja utilizar o Gestor de Conteúdos EVO.';
$_lang["language_title"] = 'Idioma:';
$_lang["last_update"] = 'Last update';
$_lang["launch_site"] = 'Ver Site';
$_lang["license"] = 'License';
$_lang["link_attributes"] = 'Atributos de link';
$_lang["link_attributes_help"] = 'Aqui pode indicar atributos para a hiper-ligação desta página, como target= ou rel=.';
$_lang["list_mode"] = 'Liga/desliga o modo de listagem - usado para listar todos os dados da tabela.';
$_lang["loading_doc_tree"] = 'Carregando a árvore de documentos...';
$_lang["loading_menu"] = 'Carregando o menu...';
$_lang["loading_page"] = 'Aguarde um momento enquanto o EVO carrega a página...';
$_lang["localtime"] = 'Hora Local';

$_lang["lock_htmlsnippet"] = 'Bloquear Chunk contra edição';
$_lang["lock_htmlsnippet_msg"] = 'Apenas administradores (Perfil ID 1) podem editar este Chunk.';
$_lang["lock_module"] = 'Bloquear Módulo contra edição';
$_lang["lock_module_msg"] = 'Apenas administradores (Perfil ID 1) podem editar este Módulo.';
$_lang["lock_msg"] = '%s encontra-se actualmente a editar %s.  Aguarde até que o utilizador termine a edição e tente novamente.';
$_lang["lock_plugin"] = 'Bloquear Plugin contra edição';
$_lang["lock_plugin_msg"] = 'Apenas administradores (Perfil ID 1) podem editar este Plugin.';
$_lang["lock_settings_msg"] = '%s está actualmente a editar estas opções. Aguarde até que o utilizador termine a edição e tente novamente.';
$_lang["lock_snippet"] = 'Bloquear Snippet contra edição';
$_lang["lock_snippet_msg"] = 'Apenas administradores (Perfil ID 1) podem editar este Snippet.';
$_lang["lock_template"] = 'Bloquear Template contra edição';
$_lang["lock_template_msg"] = 'Apenas administradores (Perfil ID 1) podem editar este Template.';
$_lang["lock_tmplvars"] = 'Bloquear Variável contra edição';
$_lang["lock_tmplvars_msg"] = 'Apenas administradores (Perfil ID 1) podem editar esta Variável.';
$_lang["locked"] = 'Bloqueado';

$_lang["login_allowed_days"] = 'Dias com autorização';
$_lang["login_allowed_days_message"] = 'Indique os dias em que o utilizador pode aceder ao sistema.';
$_lang["login_allowed_ip"] = 'Endereços IP permitidos';
$_lang["login_allowed_ip_message"] = 'Digite o(s) endereço(s) IP a partir dos quais este utilizador tem permissão para aceder ao sistema. <b>Importante: Separe múltiplos endereços IP com vírgulas (,)</b>';
$_lang["login_button"] = 'Entrar';
$_lang["login_cancelled_install_in_progress"] = 'A Instalação/actualização deste site encontra-se actualmente a decorrer. <br />Por favor tente aceder novamente dentro de alguns minutos!<br />';
$_lang["login_cancelled_site_was_updated"] = 'Install/update on this site was executed, please login again!<br />';
$_lang["login_captcha_message"] = 'Por favor digite o código de segurança mostrado na figura. Se não consegue ler o código, clique na figura para gerar um novo ou contacte o administrador do site.';
$_lang["login_homepage"] = 'Acesso  - Página Principal';
$_lang["login_homepage_message"] = 'Digite a ID do documento que deseja que o utilizador veja após aceder ao sistema (login). <b>Importante: Certifique-se que a ID do documento está certa e que o mesmo existe e está publicado para evitar possíveis páginas de erros no site!</b>';
$_lang["login_message"] = 'Por favor digite o seu username e senha para aceder ao Interface de Gestão de Conteúdos. Ambos são sensíveis a maiúsculas e minúsculas, digite-os cuidadosamente!';
$_lang["logo_slogan"] = 'Gestor de Conteúdos EVO - \nCrie e faça mais com menos';
$_lang["logout"] = 'Sair';
$_lang["long_title"] = 'Título longo';

$_lang["manager"] = 'Administrador';
$_lang["manager_lockout_message"] = 'Está actualmente ligado no Gestor de Conteúdos. Se deseja fechar a sua sessão, por favor clique no botão \'Sair\'. <br />Para ir para a sua página inicial clique no botão \'Início\'';
$_lang["manager_permissions"] = 'Permissões (no Interface de Gestão)';
$_lang["manager_theme"] = 'Tema (template) do Interface de Gestão:';
$_lang["manager_theme_message"] = 'Seleccione o Tema para o Interface de Gestão de Conteúdos.';
$_lang["manager_theme_mode"] = 'Color Scheme:';
$_lang["manager_theme_mode1"] = 'everything is light';
$_lang["manager_theme_mode2"] = 'the header is dark';
$_lang["manager_theme_mode3"] = 'header and sidebar are dark';
$_lang["manager_theme_mode4"] = 'everything is dark';
$_lang['manager_theme_mode_message'] = 'This setting is used as the "default" and can be overridden by the manager when using the theme color mode switch button in the Resource Tree: <i class="fa fa-lg fa-adjust"></i>';
$_lang['manager_theme_mode_title'] = 'Theme color mode switch';

$_lang["meta_keywords"] = 'Palavras-Chave / META';
$_lang["metatag_intro"] = 'Nesta página pode apagar, criar ou editar etiquetas (tags) META. Para ligar etiquetas META aos documentos, clique na aba <b>Palavras-Chave / META</b> quando estiver a editar um documento e seleccione as etiquetas META e Palavras-chave relevantes. Para adicionar uma nova etiqueta, digite o nome e valor e clique no botão \'Adicionar Etiqueta\'. Para editar uma etiqueta, clique no seu nome na tabela abaixo.';
$_lang["metatag_notice"] = 'Poderá querer consultar o site <a href=\'http://www.html-reference.com/META.asp\' target=\'_blank\'>HTML Reference Guide</a> (em inglês) para mais informações. Esta não é uma lista completa de etiquetas (tags) META.';
$_lang["metatags"] = 'Etiquetas (tags) META';
$_lang["mgr_access_permissions"] = 'Permissões de acesso ao Interface de Gestão';
$_lang["mgr_login_start"] = 'Página inicial no Interface de Gestão';
$_lang["mgr_login_start_message"] = 'Digite a ID do documento que mostrar ao utilizador logo que este aceda ao Interface de Gestão de Conteúdos. <b>NOTA: certifique-se de que a ID que digita pertence a um documento existente, que foi publicado e é acessível por este utilizador!</b>';

$_lang["mgrlog_action"] = 'Acção';
$_lang["mgrlog_actionid"] = 'ID da Acção';
$_lang["mgrlog_anyall"] = 'Qualquer/Tudo';
$_lang["mgrlog_datecheckfalse"] = 'Resultado de checkdate(): false.';
$_lang["mgrlog_datefr"] = 'Data a partir de';
$_lang["mgrlog_dateinvalid"] = 'Formato de data Inválido.';
$_lang["mgrlog_dateto"] = 'Date até';
$_lang["mgrlog_emptysrch"] = 'Os critérios da sua procura não produziram resultados (não foram encontrados registos conformes).';
$_lang["mgrlog_field"] = 'Campo';
$_lang["mgrlog_itemid"] = 'ID do item';
$_lang["mgrlog_itemname"] = 'Nome do Item';
$_lang["mgrlog_msg"] = 'Mensagem';
$_lang["mgrlog_noquery"] = 'Não foram indicados critérios de procura.';
$_lang["mgrlog_qresults"] = 'Resultados da pequisa';
$_lang["mgrlog_query"] = 'Registar pedidos à BD (Queries)';
$_lang["mgrlog_query_msg"] = 'Por favor escolha uma opção para ver os registos. Pode seleccionar registos por data, mas atenção que as datas que indicar não são inclusivas - para seleccionar todos os registos para 01-01-2004, indique \'Data a partir de\' como 01-01-2004 e \'Data até\' como 02-01-2004.<br /><br />Mensagem e Acção são normalmente o mesmo. Se está à procura de uma mensagem específica, é melhor escolher para Acção \'Qualquer/Tudo\'.';
$_lang["mgrlog_results"] = 'No. de resultados';
$_lang["mgrlog_searchlogs"] = 'Procurar registos';
$_lang["mgrlog_sortinst"] = 'Pode ordenar a tabela clicando nos cabeçalhos de cada coluna. Se os registos se tornarem demasiado grandes, pode <a href=\'index.php?a=55\'>limpar</a> registos. Isto removerá todos os registos até ao momento, e é irreversível!';
$_lang["mgrlog_time"] = 'Hora';
$_lang["mgrlog_user"] = 'Utilizador';
$_lang["mgrlog_username"] = 'Username';
$_lang["mgrlog_value"] = 'Valor';
$_lang["mgrlog_view"] = 'Ver registos do Interface de Gestão';

$_lang["modx_news"] = 'EVO News Notices';
$_lang["modx_news_tab"] = 'EVO News';
$_lang["modx_news_title"] = 'EVO News';
$_lang["modx_security_notices"] = 'EVO Security Notices';
$_lang["modx_version"] = 'EVO versão';

$_lang["name"] = 'Nome';

$_lang["no"] = 'Não';
$_lang["no_active_users_found"] = 'No active users found.';
$_lang["no_activity_message"] = 'Até agora não foi criado ou editado nenhum documento.';
$_lang["no_category"] = 'não classificado';
$_lang["no_docs_pending_publishing"] = 'Não existem documentos a aguardar publicação.';
$_lang["no_docs_pending_pubunpub"] = 'Nenhum evento encontrado';
$_lang["no_docs_pending_unpublishing"] = 'Não existem documentos a aguardar retirada do site.';
$_lang["no_edits_creates"] = 'No edits or creates found.';
$_lang["no_groups_found"] = 'Nenhum grupo encontrado.';
$_lang["no_keywords_found"] = 'Actualmente não existem palavras-chave.';
$_lang["no_records_found"] = 'Nenhum registo encontrado.';
$_lang["no_results"] = 'Nenhum resultado encontrado';
$_lang["nologentries_message"] = 'Indique o número de entradas no registo do sistema visíveis por página.';
$_lang["nologentries_title"] = 'Número de entradas no registo do sistema:';
$_lang["none"] = 'Nenhum(a)';
$_lang["noresults_message"] = 'Digite o número de resultados a mostrar em tabelas quando visualizar listas e resultados de procuras.';
$_lang["noresults_title"] = 'Número de resultados:';
$_lang["not_deleted"] = 'não foi apagado.';
$_lang["not_set"] = 'Não definido';

$_lang["offline"] = 'Desligado (Offline)';

$_lang["online"] = 'Ligado (Online)';
$_lang["onlineusers_action"] = 'Acção';
$_lang["onlineusers_actionid"] = 'ID da Acção';
$_lang["onlineusers_ipaddress"] = 'Endereço IP do utilizador';
$_lang["onlineusers_lasthit"] = 'Último acesso (hit)';
$_lang["onlineusers_message"] = 'Esta lista mostra todos os utilizadores activos nos últimos 20 minutos (a hora actual é ';
$_lang["onlineusers_title"] = 'Utilizadores ligados (Online)';
$_lang["onlineusers_user"] = 'Utilizador';
$_lang["onlineusers_userid"] = 'ID do utilizador';

$_lang["optimize_table"] = 'Clique aqui para optimizar esta tabela';

$_lang["page_data_alias"] = 'Alias';
$_lang["page_data_cacheable"] = 'Usar Cache';
$_lang["page_data_cacheable_help"] = 'Marque esta opção para colocar o documento em cache, agilizando o sistema. Não active este campo se o seu documento contém Snippets.';
$_lang["page_data_cached"] = '<b>Código fonte recuperado da cache:</b>';
$_lang["page_data_changes"] = 'Alterações';
$_lang["page_data_contentType"] = 'Tipo de conteúdo';
$_lang["page_data_contentType_help"] = 'Seleccione o tipo de conteúdo deste documento. Se não tem certeza do tipo de documento, deixe-o ficar como text/html.';
$_lang["page_data_created"] = 'Criado';
$_lang["page_data_edited"] = 'Editado';
$_lang["page_data_editor"] = 'Editar com editor gráfico (tipo Word)';
$_lang["page_data_folder"] = 'Documento é pasta';
$_lang["page_data_general"] = 'Geral';
$_lang["page_data_markup"] = 'Tipo/estrutura';
$_lang["page_data_mgr_access"] = 'Acesso ao Interface de Gestão';
$_lang["page_data_notcached"] = 'Este documento ainda não foi carregado na cache.';
$_lang["page_data_publishdate"] = 'Data de publicação';
$_lang["page_data_publishdate_help"] = 'Se definir uma data de publicação, o documento será publicado assim que esta data for atingida.\nClique no ícone do calendário para seleccionar uma data em que deseja que o documento seja publicado ou no ícone ao lado para remover a data de publicação.\n\nTenha cuidado com a data que escolher porque poderá fazer com que o documento nunca seja publicado.';
$_lang["page_data_published"] = 'Publicado';
$_lang["page_data_searchable"] = 'Activar procura na página';
$_lang["page_data_searchable_help"] = 'Marque este campo para activar procuras no documento. Poderá também usar este campo para outra finalidade nos seus Snippets.';
$_lang["page_data_source"] = 'Código fonte';
$_lang["page_data_status"] = 'Estado';
$_lang["page_data_template"] = 'Usa Template';
$_lang["page_data_template_help"] = 'Aqui pode seleccionar qual o Template que o documento utiliza.';
$_lang["page_data_title"] = 'Dados da página';
$_lang["page_data_unpublishdate"] = 'Data de retirada do site';
$_lang["page_data_unpublishdate_help"] = 'Se definir uma data de retirada, o documento deixará de estar publicado quando esta data for alcançada.\nClique no ícone do calendário para seleccionar a data desejada, ou no ícone ao lado para apagar a data de retirada.\n\nTenha cuidado com a data que escolher pois o documento poderá manter-se publicado!';
$_lang["page_data_unpublished"] = 'Não publicado';
$_lang["page_data_web_access"] = 'Acesso Web';

$_lang["pagetitle"] = 'Título do documento';
$_lang["pagination_table_first"] = 'Primeiro';
$_lang["pagination_table_gotopage"] = 'Ir para página';
$_lang["pagination_table_last"] = 'Último';
$_lang["paging_first"] = 'primeiro';
$_lang["paging_last"] = 'último';
$_lang["paging_next"] = 'próximo';
$_lang["paging_prev"] = 'anterior';
$_lang["paging_showing"] = 'Mostrando';
$_lang["paging_to"] = 'até';
$_lang["paging_total"] = 'total';
$_lang["parameter"] = 'Par&acirc;metro';
$_lang["parse_docblock"] = 'Parse DocBlock';
$_lang["parse_docblock_msg"] = 'Attention (!): <b>Resets</b> actual name, configuration, description and category to install-defaults by parsing the source code.';

$_lang["password"] = 'Senha';
$_lang["password_change_request"] = 'Pedido de alteração de senha';
$_lang["password_confirmed"] = 'Passwords doesn\'t match';
$_lang["password_gen_gen"] = 'Deixar o EVO gerar uma senha.';
$_lang["password_gen_length"] = 'A senha que indicar deve ter pelo menos 6 caracteres.';
$_lang["password_gen_method"] = 'Método de geração de senha nova';
$_lang["password_gen_specify"] = 'Quero definir a senha:';
$_lang["password_method"] = 'Método de notificação da senha';
$_lang["password_method_email"] = 'Enviar a nova senha por e-mail.';
$_lang["password_method_screen"] = 'Mostrar a nova senha no ecran.';
$_lang["password_msg"] = 'A nova senha para <b>:username</b> é <b>:password</b><br>';

$_lang["php_version_check"] = 'O MODX é compatível com PHP versão 7.4 ou superior. Por favor actualize a sua instalação de PHP!';

$_lang["preview"] = 'Prever Site';
$_lang["preview_msg"] = 'Esta é uma pré-visualização das últimas alterações guardadas. Clique aqui para <a href="javascript:;" onclick="saveRefreshPreview();">Guardar e actualizar</a> as alterações mais recentes';
$_lang["preview_resource"] = 'Prever documento';

$_lang["private"] = 'Privado';
$_lang["public"] = 'Público';
$_lang["publish_date"] = 'Data de Publicação';
$_lang["publish_events"] = 'Eventos de Publicação';
$_lang["publish_resource"] = 'Publicar documento';

$_lang["rb_base_dir_message"] = 'Indique o caminho físico para a pasta de Recursos. Esta configuração normalmente é gerada automaticamente. Contudo, se estiver a utilizar o IIS, o EVO pode não conseguir descobrir o caminho sozinho, fazendo com que o Navegador de Recursos mostre um erro. Neste caso, pode digitar o caminho para a pasta correcta aqui (o caminho como o veria no Windows Explorer). <b>NOTA: A pasta de recursos deve conter os subdirectórios images, files, flash e media para que funcione correctamente.</b>';
$_lang["rb_base_dir_title"] = 'Caminho dos recursos:';
$_lang["rb_base_url_message"] = 'Indique o caminho virtual para a pasta de recursos. Esta configuração normalmente é gerada automaticamente. Contudo, se estiver a utilizar o IIS, o EVO pode não conseguir descobrir o caminho sozinho, fazendo com que o Navegador de Recursos mostre um erro. Nesse caso, pode digitar o URL para a pasta de recursos aqui (o URL como o veria no Internet Explorer).';
$_lang["rb_base_url_title"] = 'URL de recursos:';
$_lang["rb_message"] = 'Seleccione \'Sim\' para activar o Navegador de Recursos. Isto permitirá que os utilizadores naveguem e enviem recursos como imagens, arquivos Flash e outros conteúdos multimedia para o servidor.';
$_lang["rb_title"] = 'Activar Navegador de Recursos:';
$_lang["rb_webuser_message"] = 'Do you want to allow a web user the ability to use the file browser? <b>WARNING:</b> Allowing web users the use of the file browser exposes the files available to manager users.  Only use this option for trusted web users.';
$_lang["rb_webuser_title"] = 'Web Users?';
$_lang["recent_docs"] = 'Documentos recentes';
$_lang["recommend_setting_change_title"] = 'Recommended Setting Change';
$_lang["recommend_setting_change_description"] = 'Your site is not configured to validate the HTTP_REFERER of incoming requests to the Manager. We strongly recommend enabling this setting to reduce the risk of a CSRF (Cross Site Request Forgery) attack.';
$_lang["references"] = 'References';
$_lang["refresh_cache"] = 'Cache: Foram encontrados <b>%s</b> arquivo(s) no directório da cache e foram apagados <b>%d</b> ficheiro(s) da cache.<p>Os novos ficheiros de cache serão criados quando as páginas forem acedidas.';
$_lang["refresh_published"] = '<b>%s</b> documentos foram publicados.';
$_lang["refresh_site"] = 'Limpar Cache';
$_lang["refresh_title"] = 'Actualizar site';
$_lang["refresh_tree"] = 'Actualizar árvore';
$_lang["refresh_unpublished"] = '<b>%s</b> documentos foram retirados.';
$_lang["release_date"] = 'Release date';
$_lang["remember_last_tab"] = 'Remember tabs';
$_lang["remember_last_tab_message"] = 'Tabbed Manager pages load with the last tab viewed instead of defaulting to the first tab';
$_lang["remember_username"] = 'Lembrar em acessos futuros';
$_lang["remove"] = 'Remover';
$_lang["remove_date"] = 'Remover data';
$_lang["remove_locks"] = 'Remover bloqueios';
$_lang["rename"] = 'Mudar o nome';
$_lang["reports"] = 'Relatórios';
$_lang["report_issues"] = 'Report issues';
$_lang["required_field"] = 'Field :field is required';
$_lang["require_tagname"] = 'Obrigatório indicar um nome para a etiqueta';
$_lang["require_tagvalue"] = 'Obrigatório indicar um valor para a etiqueta';
$_lang["reserved_name_warning"] = 'You have used a reserved name.';
$_lang["reset"] = 'Limpar';
$_lang["reset_failedlogins"] = 'limpar';
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

$_lang["run_module"] = 'Executar Módulo';
$_lang["save"] = 'Guardar';
$_lang["save_all_changes"] = 'Guardar todas as alterações';
$_lang["save_tag"] = 'Guardar etiqueta';
$_lang["saving"] = 'Guardando, por favor aguarde...';

$_lang["search"] = 'Procurar';
$_lang["search_criteria"] = 'Critérios de procura';
$_lang["search_criteria_content"] = 'Procurar por conteúdo';
$_lang["search_criteria_content_msg"] = 'Encontrar todos os documentos que contenham o texto indicado no seu <b>conteúdo</b>.';
$_lang["search_criteria_id"] = 'Procurar por ID';
$_lang["search_criteria_id_msg"] = 'Indique a ID de um documento para o localizar rapidamente.';
$_lang["search_criteria_top"] = 'Search in main fields';
$_lang["search_criteria_top_msg"] = 'Pagetitle, Longtitle, Alias, ID';
$_lang["search_criteria_template_id"] = 'Search by template ID';
$_lang["search_criteria_template_id_msg"] = 'Find all Resources using the specified template.';
$_lang["search_criteria_url_msg"] = 'Find Resource by exact URL.';
$_lang["search_criteria_longtitle"] = 'Procurar por título longo';
$_lang["search_criteria_longtitle_msg"] = 'Encontrar todos os documentos que contenham o texto indicado no seu <b>título longo</b>.';
$_lang["search_criteria_title"] = 'Procurar por título';
$_lang["search_criteria_title_msg"] = 'Encontrar todos os documentos que contenham o texto indicado no seu <b>título</b>.';
$_lang["search_empty"] = 'A sua procura não produziu resultados. Por favor alargue os critérios de pesquisa e tente novamente.';
$_lang["search_item_deleted"] = 'Este item foi apagado';
$_lang["search_results"] = 'Resultados da procura';
$_lang["search_results_returned_desc"] = 'Descrição';
$_lang["search_results_returned_id"] = 'ID';
$_lang["search_results_returned_msg"] = 'Your search criteria returned <b>%s</b> Resources. If a lot of results are being returned, try to enter a more specific search.';
$_lang["search_results_returned_title"] = 'Título';
$_lang["search_view_docdata"] = 'Ver este item';

$_lang["security"] = 'Segurança';
$_lang["security_notices_tab"] = 'Security Notices';
$_lang["security_notices_title"] = 'Security Notices';

$_lang["select_date"] = 'Seleccione uma data';
$_lang["send"] = 'Enviar';
$_lang["server_protocol_http"] = 'http';
$_lang["server_protocol_https"] = 'https';
$_lang["server_protocol_message"] = 'Se o site se encontra numa ligação https, por favor indique-o aqui.';
$_lang["server_protocol_title"] = 'Tipo de servidor:';
$_lang["serveroffset"] = 'Diferença de hora para o Servidor';
$_lang["serveroffset_message"] = 'Seleccione o número de horas de diferença entre o local em que se encontra e o local do servidor. A hora actual no servidor é <b>[%s]</b>, a hora no servidor com a diferença indicada é <b>[%s]</b>.';
$_lang["serveroffset_title"] = 'Diferença de hora do Servidor:';
$_lang["servertime"] = 'Hora no Servidor';
$_lang["set_automatic"] = 'Set automatic';
$_lang["set_default"] = 'Set default';
$_lang["set_default_all"] = 'Set defaults';

$_lang["settings_after_install"] = 'Esta é uma nova instalação, pelo que terá que editar as configurações que desejar. Quando terminar esta configuração, pressione \'Guardar\' para actualizar a base de dados.<br /><br />';
$_lang["settings_config"] = 'Configuração';
$_lang["settings_dependencies"] = 'Dependências';
$_lang["settings_events"] = 'Eventos do sistema';
$_lang["settings_furls"] = 'URLs amigáveis';
$_lang["settings_general"] = 'Geral';
$_lang["settings_group_tv_message"] = 'Choose if Template Variables should be grouped in sections or tabs (named by TV category) when editing a Resource';
$_lang["settings_group_tv_options"] = 'No,Sections in General tab,Tabs in General tab,Sections in new tab,Tabs in new tab,New tabs';
$_lang["settings_misc"] = 'Diversos';
$_lang["settings_security"] = 'Security';
$_lang["settings_KC"] = 'File Browser';
$_lang["settings_page_settings"] = 'Configurações da página';
$_lang["settings_photo"] = 'Fotografia';
$_lang["settings_properties"] = 'Propriedades';
$_lang["settings_site"] = 'Configurações do site';
$_lang["settings_strip_image_paths_message"] = 'Se a opção escolhida for \'Não\', o EVO irá escrever os caminhos (src=\'...\') de imagens e ficheiros como URLs absolutos. URLs relativos são úteis se desejar mover a sua instalação de EVO, por exemplo de um servidor de testes para o definitivo. Se não sabe do que se trata, é melhor escolher \'Sim\'.';
$_lang["settings_strip_image_paths_title"] = 'Reescrever caminhos de ficheiros?';
$_lang["settings_templvars"] = 'Variáveis de Template (TV\'s)';
$_lang["settings_title"] = 'Configuração do Sistema';
$_lang["settings_ui"] = 'Interface e Editores';
$_lang["settings_users"] = 'Utilizador';
$_lang["settings_email_templates"] = 'Email & Templates';

$_lang["show_fullscreen_btn_message"] = 'Show Menu toggle Fullscreen button';
$_lang["show_newresource_btn_message"] = 'Show Menu New Resource button';
$_lang["settings_show_picker_message"] = 'Customize manager theme and save to localstorage';
$_lang["show_fullscreen_btn"] = 'Toggle Fullscreen button';
$_lang["show_newresource_btn"] = 'New Resource button';

$_lang["show_meta"] = 'Show META Keywords tab';
$_lang["show_meta_message"] = 'Show the deprecated META Keywords tab when editing Resources in the Manager.';
$_lang["show_tree"] = 'Mostrar árvore';
$_lang["show_picker"] = 'Show Color Switcher';
$_lang["showing"] = 'Mostrando';
$_lang["signupemail_message"] = 'Crie aqui o e-mail que é enviado para um utilizador quando este criar uma conta. O EVO envia o nome de utilizador e a senha. <br /><b>Importante:</b> Os seguintes marcadores serão substituídos quando o sistema EVO enviar o e-mail, use-os da forma que quiser: <br /><br />[+sname+] - O nome do site, <br />[+saddr+] - Endereço de e-mail do site, <br />[+surl+] - O URL do site, <br />[+uid+] - O login ou a identificação \'ID\' do utilizador, <br />[+pwd+] - A senha do utilizador, <br />[+ufn+] - O nome completo do utilizador. <br /><br /><b>Insira SEMPRE o  [+uid+] e a [+pwd+] neste e-mail, senão os seus utilizadores não saberão qual o seu nome de utilizador e senha de acesso!</b>';
$_lang["signupemail_title"] = 'E-mail de inscrição:';
$_lang["site"] = 'Site';
$_lang["site_schedule"] = 'Calendário de tarefas do site';
$_lang["sitename_message"] = 'Indique o nome do site aqui.';
$_lang["sitename_title"] = 'Nome do site:';
$_lang["sitestart_message"] = 'Introduza a ID do documento que deseja usar como entrada do site (página principal). <b>NOTA: Certifique-se de que esta ID corresponde a um documento existente e publicado!</b>';
$_lang["sitestart_title"] = 'Início do site:';
$_lang["sitestatus_message"] = 'Seleccione \'Online\' para publicar o site na internet. Se seleccionar \'Offline\', os seus visitantes irão ver a mensagem \'Site não disponível\' e não poderão navegar pelo site.';
$_lang["sitestatus_title"] = 'Estado do site:';
$_lang["siteunavailable_message"] = 'Mensagem a mostrar quando o site está em manutenção ou está desactivado. <b>NOTA: Esta mensagem apenas será mostrada se não for indicada uma página ou documento para informar que o site está indisponível.</b>';
$_lang["siteunavailable_message_default"] = 'The site is currently unavailable.';
$_lang["siteunavailable_page_message"] = 'Indique a ID do documento que quer mostrar quando o site estiver offline (ex: em manutenção). <b>NOTA: Assegure-se de que a ID corresponde a um documento que existe e está publicado para evitar erro de página não encontrada!</b>';
$_lang["siteunavailable_page_title"] = 'Página de site não disponível:';
$_lang["siteunavailable_title"] = 'Mensagem para \'Site não disponível\':';
$_lang["controller_namespace"] = 'Controller Namespace';
$_lang["controller_namespace_message"] = 'Specify the full Namespace from which it is worth taking controllers, for example: <b>EvolutionCMS\\Main\\Controllers\\</b>';
$_lang["update_repository"] = 'GitHub repository path';
$_lang["update_repository_message"] = 'Enter GitHub repository path for example: <b>evocms-community/evolution</b>';

$_lang["sort_alphabetically"] = 'Sort alphabetically';
$_lang["sort_asc"] = 'Ascendente';
$_lang["sort_desc"] = 'Descendente';
$_lang["sort_menuindex"] = 'Sort menu index';
$_lang["sort_tree"] = 'Ordenar a árvore';
$_lang['sort_updating'] = 'Updating ...';
$_lang['sort_updated'] = 'Updated!';
$_lang['sort_nochildren'] = 'Parent does not have any children';
$_lang["sort_elements_msg"] = 'Drag to reorder the listed elements.';

$_lang["source"] = 'Código fonte';
$_lang["stay"] = 'Continuar edição';
$_lang["stay_new"] = 'Adicionar outro';
$_lang["submit"] = 'Submeter';
$_lang["sys_alert"] = 'Alerta do Sistema';
$_lang["sysinfo_activity_message"] = 'Esta lista mostra quais os documentos que foram recentemente editados pelos seus utilizadores.';
$_lang["sysinfo_userid"] = 'Utilizador';
$_lang["system"] = 'System';
$_lang["system_email_signup"] = 'Hello [+uid+]

Here are your login details for [+sname+] Content Manager:

Username: [+uid+]
Password: [+pwd+]

Once you log into the Content Manager ([+surl+]), you can change your password.

Regards,
Site Administrator';
$_lang["system_email_webreminder"] = 'Olá [+uid+]

Para activar a sua nova senha, clique no seguinte link:

[+surl+]

Pode usar a seguinte senha para aceder:

Senha:[+pwd+]

Se não pediu este email, por favor ignore-o.

Cumprimentos,
O Administrador [+sname+]';
$_lang["system_email_websignup"] = 'Olá [+uid+]

Aqui estão seus detalhes para aceder a [+sname+]:

Login: [+uid+]
Senha: [+pwd+]

Uma vez que entrar como [+sname+] ([+surl+]), pode alterar sua senha.

Cumprimentos,
O Administrador [+sname+]';
$_lang["table_hoverinfo"] = 'Passe o cursor do rato sobre o nome da tabela para ver uma curta descrição da função da tabela (<i>nem todas as tabelas têm comentários activos</i>).';
$_lang["table_prefix"] = 'Prefixo da Tabela';
$_lang["tag"] = 'Etiqueta (Tag)';

$_lang["to"] = 'para';
$_lang["toggle_fullscreen"] = 'Toggle Fullscreen';
$_lang["tools"] = 'Ferramentas';
$_lang["top_howmany_message"] = 'Quando visualizar relatórios, de que tamanho deverão ser as listas \'Top ...\' ?';
$_lang["top_howmany_title"] = 'Top n';
$_lang["total"] = 'total';
$_lang["track_visitors_message"] = 'Esta opção não tem nenhum efeito a menos que exista um recurso de seguimento de visitantes (tracking) ou de estatísticas instalado e que suporte esta opção. Fazer um relatório de visitas permite analisar estatísticas sobre a utilização do site.';
$_lang["track_visitors_title"] = 'Manter relatório de visitantes';
$_lang["tree_page_click"] = 'Page Click Behavior';
$_lang["tree_page_click_message"] = 'The default behavior when clicking on a page in the site tree.';
$_lang["use_breadcrumbs"] = 'Show navigation';
$_lang["use_breadcrumbs_message"] = 'Show the navigation when creating or editing Resource in the Manager';
$_lang["tree_show_protected"] = 'Mostrar páginas protegidas';
$_lang["tree_show_protected_message"] = 'Quando marcado como "Não", as Páginas Protegidas (e todos os documentos seus descendentes) não aparecem na árvore de documentos. "Não" é a opção por defeito do EVO para compatibilidade com versões antigas.';
$_lang["truncate_table"] = 'Clique aqui para truncar esta tabela';
$_lang["type"] = 'Tipo';
$_lang["udperms_allowroot_message"] = 'Deseja permitir que os seus utilizadores criem novos documentos/pastas na raiz (directório principal) do site? ';
$_lang["udperms_allowroot_title"] = 'Permitir acesso à raiz do site (root):';
$_lang["udperms_message"] = 'As permissões de acesso permitem especificar quais as páginas que os seus utilizadores podem editar. É necessário definir grupos para os utilizadores, grupos de documentos para os documentos, e finalmente quais os grupos de utilizadores que terão acessos a cada grupo de documentos. Quando activar isto pela primeira vez, apenas os administradores poderão editar documentos.';
$_lang["udperms_title"] = 'Usar permissões de acesso:';
$_lang["unable_set_link"] = 'Não é possível atribuir a ligação!';
$_lang["unable_set_parent"] = 'Não é possível atribuir novo antecessor!';
$_lang["unauthorizedpage_message"] = 'Digite a ID do documento que deseja que o utilizador veja no caso do mesmo requisitar uma página ou documento proibido. <b>NOTA: Assegure-se de que a ID corresponde a um documento que existe e está publicado para evitar erro de página não encontrada!</b>';
$_lang["unauthorizedpage_title"] = 'Página \'Não autorizado\':';
$_lang["unblock_message"] = 'Este utilizador não será bloqueado depois de guardar os seus dados.';
$_lang["undelete_resource"] = 'Recuperar documento';
$_lang["unpublish_date"] = 'Data de retirada do site';
$_lang["unpublish_events"] = 'Eventos de retirada de documentos';
$_lang["unpublish_resource"] = 'Retirar documento';
$_lang["untitled_resource"] = 'Documento sem título';
$_lang["untitled_weblink"] = 'Weblink sem título';
$_lang["update_params"] = 'Actualizar parâmetros';
$_lang["update_settings_from_language"] = 'Replace current with:';

$_lang["upload_maxsize_message"] = 'Digite o tamanho máximo que um ficheiro pode ter para ser enviado via Gestor de Ficheiros. Este valor deve ser digitado em bytes. <b>Importante: Ficheiros muito grandes podem demorar muito tempo a ser transferidos!</b>';
$_lang["upload_maxsize_title"] = 'Tamanho máximo de envio (upload)';
$_lang["uploadable_files_message"] = 'Aqui pode listar os ficheiros aceites pelo Gestor de Ficheiros do site no directório \'assets/files/\'. Digite as extensões para os tipos de ficheiros, separados por vírgulas.';
$_lang["uploadable_files_title"] = 'Extensões permitidas em ficheiros a enviar (Upload):';
$_lang["uploadable_flash_message"] = 'Aqui pode listar os ficheiros aceites pelo Gestor de Ficheiros do site no directório \'assets/flash/\'. Digite as extensões para os tipos de ficheiros Flash, separados por vírgulas.';
$_lang["uploadable_flash_title"] = 'Extensões permitidas em ficheiros Flash a enviar (Upload):';
$_lang["uploadable_images_message"] = 'Aqui pode listar os ficheiros aceites pelo Gestor de Ficheiros do site no directório \'assets/images/\'. Digite as extensões para os tipos de ficheiros de imagens, separados por vírgulas.';
$_lang["uploadable_images_title"] = 'Extensões permitidas em ficheiros de imagens a enviar (Upload):';
$_lang["uploadable_media_message"] = 'Aqui pode listar os ficheiros aceites pelo Gestor de Ficheiros do site no directório \'assets/media/\'. Digite as extensões para os tipos de ficheiros multimedia, separados por vírgulas.';
$_lang["uploadable_media_title"] = 'Extensões permitidas em ficheiros multimedia a enviar (Upload):';
$_lang["use_alias_path_message"] = 'Se escolher \'Sim\' será mostrado o caminho completo do documento caso este tenha um apelido (alias). Por exemplo, se o documento com apelido se chamar \'reporter\' e estiver localizado dentro de uma pasta chamada \'artigos\', o caminho completo será \'/artigos/reporter.html\'.<br /><b>Importante: quando esta opção está activa, terá que referenciar as suas imagens e objectos nas páginas usando o caminho absoluto: por ex., \'/assets/images\' em vez de \'assets/images\'. Desta forma evita-se que o browser (ou o servidor web) adicionem o caminho relativo ao caminho do apelido.</b>';
$_lang["use_alias_path_title"] = 'Usar caminho completo com o apelido (alias)';
$_lang["use_editor_message"] = 'Deseja disponibilizar um editor gráfico (tipo Word) para edição de texto? Se costuma usar HTML para editar os seus documentos será melhor não usar o editor de texto. IMPORTANTE: a escolha de um editor afecta todos os documentos e utilizadores do site!';
$_lang["use_editor_title"] = 'Activar editor:';
$_lang["use_global_tabs"] = 'Use global Tabs';

$_lang["valid_hostnames_message"] = 'Help prevent XSS exploits misusing the site_url system setting by providing a comma separated list of valid hostnames for this installation. This is important for some types of shared hosts or hosts direct accessible via an IP address. First hostname in the list is used if the HTTP_HOST does not match any valid hostname.';
$_lang["valid_hostnames_title"] = 'Valid hostnames';
$_lang["validate_referer_message"] = 'Validate the HTTP_REFERER headers to reduce the risk of your content editors being tricked into performing unintended actions in the manager as victims of a CSRF (Cross Site Request Forgery) attack. Some configurations may not be able to use this option if the server is not sending HTTP_REFERER headers.';
$_lang["validate_referer_title"] = 'Validate HTTP_REFERER headers?';
$_lang["value"] = 'Valor';
$_lang["version"] = 'Version';
$_lang["view"] = 'Ver';
$_lang["view_child_resources_in_container"] = 'Ver descendentes (\'filhos\')';
$_lang["view_log"] = 'Ver registos';
$_lang["view_logging"] = 'Ver registos do sistema';
$_lang["view_sysinfo"] = 'Informações do sistema';
$_lang["warning"] = 'Atenção!';
$_lang["warning_not_saved"] = 'As alterações efectuadas ainda não foram guardadas. Pode escolher manter-se na página actual para guardar as alterações (\'Cancelar\'), ou pode deixar esta página, perdendo quaisquer alterações que tenha feito (\'OK\').';
$_lang["warning_visibility"] = 'Configuration Warnings visible to';
$_lang["warning_visibility_message"] = 'Control the visibility of the configuration warnings shown on the Manager welcome page';
$_lang["web_access_permissions"] = 'Permissões de acesso Web';
$_lang["web_access_permissions_user_groups"] = 'Grupos de utilizadores Externos (Web)';
$_lang["web_permissions"] = 'Permissões para Web';
$_lang["web_user_management_msg"] = 'Aqui pode escolher quais os utilizadores externos (acesso pela Web) que deseja editar. Utilizadores Externos (Web) são aqueles que apenas podem aceder ao site (não ao Interface de Gestão)';
$_lang["web_user_management_title"] = 'Utilizadores Externos (Web)';
$_lang["web_user_management_select_role"] = 'All roles';
$_lang["web_user_title"] = 'Criar/editar Utilizador Externo (Web)';
$_lang["web_users"] = 'Utilizadores Web (externos)';
$_lang["weblink"] = 'Weblink';
$_lang["webpwdreminder_message"] = 'Aqui pode definir a mensagem que será enviada quando um utilizador se esquece do seu username e/ou senha e pede o reenvio desses dados através do site. <br /><b>Importante:</b> Os seguintes marcadores serão substituídos pelo EVO quando a mensagem for enviada: <br /><br />[+sname+] - Nome do site, <br />[+saddr+] - endereço de email do site, <br />[+surl+] - Endereço do site, <br />[+uid+] - Login do utilizador, <br />[+pwd+] - Senha do utilizador, <br />[+ufn+] - Nome completo do utilizador. <br /><br /><b>Insira SEMPRE [+uid+] e a [+pwd+] neste e-mail, senão os seus utilizadores não saberão qual o seu nome de utilizador e senha de acesso!</b>';
$_lang["webpwdreminder_title"] = 'Email de envio de senha:';
$_lang["websignupemail_message"] = 'Aqui pode definir a mensagem que será enviada quando um visitante se inscrever no site, contendo o seu nome de utilizador e senha de acesso. <br /><b>Importante:</b> Os seguintes marcadores serão substituídos pelo EVO quando a mensagem for enviada: <br /><br />[+sname+] - Nome do site, <br />[+saddr+] - endereço de email do site, <br />[+surl+] - Endereço do site, <br />[+uid+] - Nome do utilizador (username), <br />[+pwd+] - Senha do utilizador, <br />[+ufn+] - Nome completo do utilizador. <br /><br /><b>Insira SEMPRE o  [+uid+] e a [+pwd+] neste e-mail, senão os seus utilizadores não saberão qual o seu nome de utilizador e senha de acesso!</b>';
$_lang["websignupemail_title"] = 'E-mail de criação de conta web:';
$_lang["allow_multiple_emails_title"] = 'Duplicate Web User email address';
$_lang["allow_multiple_emails_message"] = 'Allows Web Users to share the same email address for situations when a member may not have their own email address or there is just one family email address.<br/>Note: Any password reminder and registration logic will need to account for this option if set to yes.';
$_lang["welcome_title"] = 'Bem Vindo ao Interface de Gestão de Conteúdos do EVO!';
$_lang["which_editor_message"] = 'Aqui pode escolher qual o editor gráfico (tipo Word) de texto que deseja utilizar. Pode fazer download de editores adicionais a partir da página de downloads do EVO.';
$_lang["which_editor_title"] = 'Editor a utilizar:';
$_lang["working"] = 'Processando, aguarde...';
$_lang["wrap_lines"] = 'Quebra de linhas automática';
$_lang["xhtml_urls_message"] = 'Subtitui os caracteres "i comercial" (&amp;) nos urls que são gerados pelo EVO pela sintaxe conforme aos standards W3C &<!-- -->amp; (entidade html)';
$_lang["xhtml_urls_title"] = 'URLs XHTML';
$_lang["yes"] = 'Sim';
$_lang["you_got_mail"] = 'Tem E-mail novo!';

$_lang["yourinfo_message"] = 'Esta secção mostra alguma informação sobre si:';
$_lang["yourinfo_previous_login"] = 'Último acesso:';
$_lang["yourinfo_role"] = 'O seu Perfil é:';
$_lang["yourinfo_title"] = 'Os seus dados';
$_lang["yourinfo_total_logins"] = 'Número total de acessos:';
$_lang["yourinfo_username"] = 'Está ligado como:';

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
$_lang["bkmgr_restore_submit"] = 'Reverter estes dados';
$_lang["bkmgr_restore_confirm"] = 'Tem certeza de que deseja reverter o backup\n[+filename+] ?';
$_lang["bkmgr_snapshot_nothing"] = 'No snapshots available';

$_lang["files.dynamic.php1"] = 'New File';
$_lang["files.dynamic.php2"] = 'This directory cannot be displayed.';
$_lang["files.dynamic.php3"] = 'There is a problem in a file name.';
$_lang["files.dynamic.php4"] = 'The text file was created.';
$_lang["files.dynamic.php5"] = 'File could not be duplicated.';
$_lang["files.dynamic.php6"] = 'File or directory could not be renamed.';
$_lang["files_dynamic_new_folder_name"] = 'Digite o novo nome do diretório:';
$_lang["files_dynamic_new_file_name"] = 'Digite o novo nome do arquivo:';
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
$_lang['resource_opt_is_published'] = 'Publicado';

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
