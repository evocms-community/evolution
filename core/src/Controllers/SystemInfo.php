<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Interfaces\ManagerThemeInterface;
use Illuminate\Support\Collection;

class SystemInfo extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.sysinfo';

    /**
     * @var \EvolutionCMS\Interfaces\DatabaseInterface
     */
    protected $database;

    public function __construct(ManagerThemeInterface $managerTheme, array $data = [])
    {
        parent::__construct($managerTheme, $data);
        $this->database = ManagerTheme::getCore()->getDatabase();
    }

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return ManagerTheme::getCore()->hasPermission('logs');
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters(array $params = []): array
    {
        return [
            'serverArr' => $this->parameterServerArr(),
        ];
    }

    protected function resolveCharset()
    {
        switch ($this->database->getConfig()['driver']) {
            case 'pgsql':
                $result = $this->database->query("SELECT * FROM pg_settings WHERE name='client_encoding'");
                $charset = $this->database->getRow($result, 'num');
                return $charset[1];
                break;
            case 'mysql':
                $res = $this->database->query("show variables like 'character_set_database'");
                $charset = $this->database->getRow($res, 'num');

                return $charset[1];
                break;
            default :
                return 'none';
        }
    }

    protected function resolveCollation()
    {
        switch ($this->database->getConfig()['driver']) {
            case 'pgsql':
                $result = $this->database->query("SELECT * FROM pg_settings WHERE name = 'lc_collate'");
                $charset = $this->database->getRow($result, 'num');
                return $charset[1];
                break;
            case 'mysql':
                $res = $this->database->query("show variables like 'collation_database'");
                $collation = $this->database->getRow($res, 'num');

                return $collation[1];
                break;
            default :
                return 'none';
        }

    }

    protected function parameterServerArr(): Collection
    {
        return new Collection([
            'modx_version'       => [
                'is_lexicon' => true,
                'data'       => implode(' ', [
                    ManagerTheme::getCore()->getVersionData('version'),
                    ManagerTheme::getCore()->getVersionData('new_version')
                ])
            ],
            'release_date'       => [
                'is_lexicon' => true,
                'data'       => ManagerTheme::getCore()->getVersionData('release_date')
            ],
            'PHP Version'        => [
                'data'   => phpversion(),
                'render' => 'manager::' . $this->getView() . '.phpversion'
            ],
            'access_permissions' => [
                'is_lexicon' => true,
                'data'       => __('global.' . (ManagerTheme::getCore()->getConfig('use_udperms') ? 'enabled' : 'disabled'))
            ],
            'servertime'         => [
                'is_lexicon' => true,
                'data'       => date('H:i:s', time())
            ],
            'localtime'          => [
                'is_lexicon' => true,
                'data'       => date('H:i:s', time() + ManagerTheme::getCore()->getConfig('server_offset_time'))
            ],
            'serveroffset'       => [
                'is_lexicon' => true,
                'data'       => ManagerTheme::getCore()->getConfig('server_offset_time') / (60 * 60) . ' h'
            ],
            'database_name'      => [
                'is_lexicon' => true,
                'data'       => ManagerTheme::getCore()->getService('config')->get('database.connections.default.database')
            ],
            'database_server'    => [
                'is_lexicon' => true,
                'data'       => ManagerTheme::getCore()->getService('config')->get('database.connections.default.host')
            ],
            'database_version'   => [
                'is_lexicon' => true,
                'data'       => $this->database->getVersion()
            ],
            'database_charset'   => [
                'is_lexicon' => true,
                'data'       => $this->resolveCharset()
            ],
            'database_collation' => [
                'is_lexicon' => true,
                'data'       => $this->resolveCollation()
            ],
            'table_prefix'       => [
                'is_lexicon' => true,
                'data'       => ManagerTheme::getCore()->getService('config')->get('database.connections.default.prefix')
            ],
            'cfg_base_path'      => [
                'is_lexicon' => true,
                'data'       => MODX_BASE_PATH
            ],
            'cfg_base_url'       => [
                'is_lexicon' => true,
                'data'       => MODX_BASE_URL
            ],
            'cfg_manager_url'    => [
                'is_lexicon' => true,
                'data'       => MODX_MANAGER_URL
            ],
            'cfg_manager_path'   => [
                'is_lexicon' => true,
                'data'       => MODX_MANAGER_PATH
            ],
            'cfg_site_url'       => [
                'is_lexicon' => true,
                'data'       => MODX_SITE_URL
            ]
        ]);
    }
}
