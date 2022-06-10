<?php

declare(strict_types=1);

namespace LaminasBench\Cache;

use Laminas\Cache\Storage\Adapter\Benchmark\AbstractStorageAdapterBenchmark;
use Laminas\Cache\Storage\Adapter\Filesystem;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use PhpBench\Benchmark\Metadata\Annotations\Warmup;

/**
 * @Revs(100)
 * @Iterations(10)
 * @Warmup(1)
 */
class FilesystemStorageAdapterBench extends AbstractStorageAdapterBenchmark
{
    public function __construct()
    {
        parent::__construct(new Filesystem());
    }
}
