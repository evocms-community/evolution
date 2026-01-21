<?php

namespace EvolutionCMS\Console\Commands;

use EvolutionCMS\Core;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeCommandCommand extends GeneratorCommand
{
    protected $name = 'make:command';
    protected $description = 'Create a new EvolutionCMS command';
    protected $type = 'Command';

    protected function getStub()
    {
        return __DIR__ . '/stubs/command.stub';
    }

    protected function getPath($name)
    {
        $rootNamespace = $this->getCleanRootNamespace();
        $name = Str::replaceFirst($rootNamespace, '', $name);
        $name = ltrim($name, '\\');

        if ($rootNamespace === 'EvolutionCMS') {
            return EVO_CORE_PATH . 'src/' . str_replace('\\', '/', $name) . '.php';
        } else {
            return $this->resolveCustomPath($rootNamespace, $name);
        }
    }

    protected function getCleanRootNamespace()
    {
        $evo = Core::getInstance();
        $namespace = $evo->getConfig('ControllerNamespace');
        
        if (empty($namespace) || trim($namespace) === '') {
            return 'EvolutionCMS';
        }
        $namespace = rtrim($namespace, '\\');
        $namespace = str_replace('\Controllers', '', $namespace);
        
        return $namespace;
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        $cleanNamespace = $this->getCleanRootNamespace();
        return $cleanNamespace . '\Console\Commands';
    }

    protected function rootNamespace()
    {
        return $this->getCleanRootNamespace();
    }
    
    protected function resolveCustomPath($namespace, $className)
    {
        $parts = explode('\\', $namespace);
        if (count($parts) >= 2) {
            $packageName = $parts[1];
            $basePath = EVO_CORE_PATH . 'custom/packages/' . strtolower($packageName) . '/src/';
        } else {
            $basePath = EVO_CORE_PATH . 'custom/commands/';
        }
        $fullPath = $basePath . str_replace('\\', '/', $className) . '.php';
        $directory = dirname($fullPath);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
        return $fullPath;
    }
    
    protected function qualifyClass($name)
    {
        $name = ltrim($name, '\\/');
        $name = str_replace('/', '\\', $name);

        $rootNamespace = $this->rootNamespace();

        if (Str::startsWith($name, $rootNamespace)) {
            return $name;
        }
        return $this->getDefaultNamespace($rootNamespace) . '\\' . $name;
    }
}