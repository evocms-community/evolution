<?php namespace EvolutionCMS\Console;

use EvolutionCMS\Facades\Console;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

/**
 * @see: https://github.com/laravel-zero/foundation/blob/5.6/src/Illuminate/Foundation/Console/ClearCompiledCommand.php
 */
class SiteUpdateCommand extends Command
{
    protected $currentVersion = '';
    protected $updateData = [];

    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'make:update {version? : Version to install} {--force : Force update download}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Searching and installing Evolution CMS updates';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $currentVersion = evo()->getVersionData();
        $this->currentVersion = $currentVersion['version'];
        $this->currentVersion = '3.1.25';
    }

    public function handle()
    {
        $this->getUpdateData();
        if(empty($this->updateData)) {
            $this->error('No updates found');

            return Command::FAILURE;
        }

        if($this->checkUpdate() && $this->update()) {
            return;
        } else {
            return Command::FAILURE;
        }
    }

    protected function getUpdateData()
    {
        $updateVersion = $this->argument('version');
        $_currentVersion = explode('.', $this->currentVersion);
        $info = cache()->store('updater')->remember('updatedata', 3600, function() {
            $updateRepository = evo()->getConfig('UpgradeRepository', 'evocms-community/evolution');
            $response = Http::get('https://api.github.com/repos/' . $updateRepository . '/releases');
            if (!$response->successful() || empty($response->json())) {

                return [];
            }
            return $response->json();
        });
        if (empty($info)) {
            $this->error("Failed to receive releases list");
            $this->newLine();

            return;
        }

        if(!empty($updateVersion)) {
            $this->info('Searching for ' . $updateVersion);
            $this->newLine();
            foreach ($info as $item) {
                if (!empty($updateVersion) && $updateVersion == $item['tag_name']) {
                    $this->updateData = [
                        'version' => $updateVersion,
                        'url'     => $item['zipball_url'],
                    ];

                    return;
                }
            }
        } else {
            $this->info('Searching for the latest update...');
            foreach ($info as $item) {
                $_version = explode('.', $item['tag_name']);
                if ($_version[0] !== $_currentVersion[0] || $_version[1] !== $_currentVersion[1]) {
                    continue;
                }
                if (strpos($item['tag_name'], 'alpha') !== false || strpos($item['tag_name'],
                        'beta') !== false || strpos($item['tag_name'], 'RC') !== false) {
                    continue;
                }
                if (version_compare($this->currentVersion, $item['tag_name'], '<')) {
                    $this->updateData = [
                        'version' => $item['tag_name'],
                        'url'     => $item['zipball_url'],
                    ];
                    $this->info('Found ' . $item['tag_name']);
                    $this->newLine();

                    return;
                }
            }
        }
    }

    protected function checkUpdate()
    {
        if($this->argument('version')) {
            $updateVersion = $this->argument('version');
            $_updateVersion = explode('.', $updateVersion);
            $_currentVersion = explode('.', $this->currentVersion);
            if(count($_updateVersion) < 3) {
                $this->error('Failed to install ' . $updateVersion);

                return false;
            }
            if(strpos($updateVersion, 'alpha') !== false || strpos($updateVersion, 'beta') !== false || strpos($updateVersion, 'RC') !== false)  {
                $this->warn('You are going to install unstable version');
            }


            if($_updateVersion[0] > $_currentVersion[0] || $_updateVersion[1] > $_currentVersion[1]) {
                $this->warn('You are going to install major update. Please, read the release notes.');
            }
        } else {
            $updateVersion = $this->updateData['version'];
        }

        if(version_compare($this->currentVersion, $updateVersion, '>=')) {
            $this->error('You have a newer version of Evolution CMS (' . $this->currentVersion . ')');

            return false;
        }

        return true;
    }

    protected function update()
    {
        $this->info("Downloading {$this->updateData['version']}...");
        $updateZip = MODX_BASE_PATH . $this->updateData['version'] . '.zip';
        if(!file_exists($updateZip) || !is_readable($updateZip) || $this->option('force')) {
            $response = Http::sink($updateZip)->get($this->updateData['url']);
            if ($response->failed()) {
                $this->error('Failed to download ' . $this->updateData['version']);

                return false;
            }
        }
        $this->info("Unpacking {$this->updateData['version']}...");
        $temp_dir = MODX_BASE_PATH . '_temp' . md5($this->updateData['version']);
        SELF::rmdirs($temp_dir);

        //run unzip and install
        $zip = new \ZipArchive;
        if($zip->open($updateZip) && $zip->extractTo($temp_dir) && $zip->close()) {
            if ($handle = opendir($temp_dir)) {
                while (false !== ($name = readdir($handle))) {
                    if ($name != '.' && $name != '..') $dir = $name;
                }
                closedir($handle);
            }
        }
        if(!isset($dir)) {
            $this->error('Failed to unpack update');

            return false;
        }

        $this->newLine();
        //run migrations
        $this->info('Running migrations...');
        if (Console::call('migrate', ['--path' => $temp_dir . '/' . $dir . '/install/stubs/migrations', '--force' => true])) {
            $this->error('Failed to run migrations');

            return false;
        };

        //run seeds
        $this->info('Running seeders...');
        $namespace = 'EvolutionCMS\\Installer\\Update\\';
        foreach (glob($temp_dir . '/' . $dir . '/install/stubs/seeds/{$folder}/*.php') as $filename) {
            include_once $filename;
            $class = $namespace . basename($filename, '.php');
            if (class_exists($class) && is_subclass_of($class, 'Illuminate\\Database\\Seeder')) {
                if(Console::call('db:seed', ['--class' => '\\' . $class])) {
                    $this->error('Failed to run seeders');

                    return false;
                };
            }
        }
        $delete_file = $temp_dir . '/' . $dir . '/install/stubs/file_for_delete.txt';
        if (file_exists($delete_file)) {
            $files = explode("\n", file_get_contents($delete_file));
            foreach ($files as $file) {
                $file = str_replace('{core}', EVO_CORE_PATH, $file);
                if (file_exists($file)) {
                    if (is_dir($file)) {
                        SELF::rmdirs($file);
                    } else {
                        unlink($file);
                    }
                }
            }
        }

        //cleanup
        $this->newLine();
        $this->info('Cleaning up...');
        $this->newLine();
        SELF::rmdirs(EVO_CORE_PATH . 'src/');
        SELF::rmdirs(EVO_CORE_PATH . 'modifiers/');
        SELF::rmdirs(EVO_CORE_PATH . 'lang/');
        SELF::rmdirs(EVO_CORE_PATH . 'includes/');
        SELF::rmdirs(EVO_CORE_PATH . 'functions/');
        SELF::rmdirs(EVO_CORE_PATH . 'factory/');

        SELF::moveFiles($temp_dir . '/' . $dir, MODX_BASE_PATH);
        SELF::rmdirs($temp_dir);
        unlink($updateZip);

        $this->warn("Run 'composer update --no-dev' to finish update");
    }

    static public function moveFiles($src, $dest)
    {
        $path = realpath($src);
        $dest = realpath($dest);
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
        foreach ($objects as $name => $object) {
            $startsAt = substr(dirname($name), strlen($path));
            self::mmkDir($dest . $startsAt);
            if ($object->isDir()) {
                self::mmkDir($dest . substr($name, strlen($path)));
            }

            if (is_writable($dest . $startsAt) && $object->isFile()) {
                rename((string)$name, $dest . $startsAt . '/' . basename($name));
            }
        }
    }

    static public function rmdirs($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir . "/" . $object) && !is_link($dir . "/" . $object))
                        self::rmdirs($dir . "/" . $object);
                    else
                        unlink($dir . "/" . $object);
                }
            }
            rmdir($dir);
        }
    }

    static public function mmkDir($folder, $perm = 0777)
    {
        if (!is_dir($folder)) {
            mkdir($folder, $perm);
        }
    }
}
