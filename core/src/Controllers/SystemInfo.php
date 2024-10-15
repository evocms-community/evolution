<?php

namespace EvolutionCMS\Controllers;

use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Interfaces\ManagerThemeInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use PDO;

class SystemInfo extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.sysinfo';

    public function __construct(ManagerThemeInterface $managerTheme, array $data = [])
    {
        parent::__construct($managerTheme, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return evo()->hasPermission('logs');
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
        return match (DB::getDriverName()) {
            'pgsql' => DB::selectOne("SELECT * FROM pg_settings WHERE name='client_encoding'")->setting,
            'mysql' => DB::selectOne("show variables like 'character_set_database'")->Value,
            default => 'none',
        };
    }

    protected function resolveCollation()
    {
        return match (DB::getDriverName()) {
            'pgsql' => DB::selectOne("SELECT * FROM pg_settings WHERE name = 'lc_collate'")->setting,
            'mysql' => DB::selectOne("show variables like 'collation_database'")->Value,
            default => 'none',
        };
    }

    protected function parameterServerArr(): Collection
    {
        return new Collection([
            'modx_version' => [
                'is_lexicon' => true,
                'data' => implode(' ', [
                    evo()->getVersionData('version'),
                    evo()->getVersionData('new_version'),
                ]),
            ],
            'release_date' => [
                'is_lexicon' => true,
                'data' => evo()->getVersionData('release_date'),
            ],
            'PHP Version' => [
                'data' => phpversion(),
                'render' => 'manager::' . $this->getView() . '.phpversion',
            ],
            'servertime' => [
                'is_lexicon' => true,
                'data' => date('H:i:s', time()),
            ],
            'localtime' => [
                'is_lexicon' => true,
                'data' => date('H:i:s', time() + Config::get('global.server_offset_time')),
            ],
            'serveroffset' => [
                'is_lexicon' => true,
                'data' => Config::get('global.server_offset_time') / (60 * 60) . ' h',
            ],
            'database_name' => [
                'is_lexicon' => true,
                'data' => DB::getDatabaseName(),
            ],
            'database_server' => [
                'is_lexicon' => true,
                'data' => DB::getConfig('host'),
            ],
            'database_version' => [
                'is_lexicon' => true,
                'data' => DB::connection()->getPdo()->getAttribute(PDO::ATTR_SERVER_VERSION),
            ],
            'database_charset' => [
                'is_lexicon' => true,
                'data' => $this->resolveCharset(),
            ],
            'database_collation' => [
                'is_lexicon' => true,
                'data' => $this->resolveCollation(),
            ],
            'table_prefix' => [
                'is_lexicon' => true,
                'data' => DB::getTablePrefix(),
            ],
            'cfg_base_path' => [
                'is_lexicon' => true,
                'data' => MODX_BASE_PATH,
            ],
            'cfg_base_url' => [
                'is_lexicon' => true,
                'data' => MODX_BASE_URL,
            ],
            'cfg_manager_url' => [
                'is_lexicon' => true,
                'data' => MODX_MANAGER_URL,
            ],
            'cfg_manager_path' => [
                'is_lexicon' => true,
                'data' => MODX_MANAGER_PATH,
            ],
            'cfg_site_url' => [
                'is_lexicon' => true,
                'data' => MODX_SITE_URL,
            ],
        ]);
    }
}
