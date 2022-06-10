<?php

declare(strict_types=1);

namespace Laminas\Cache\Storage\Adapter\Filesystem;

use Laminas\Cache\Exception\RuntimeException;
use Laminas\Cache\Storage\Adapter\Filesystem\Exception\MetadataException;
use Laminas\Cache\Storage\Adapter\Filesystem\Exception\UnlinkException;

interface FilesystemInteractionInterface
{
    /**
     * @throws UnlinkException If the file could not be deleted and still exists.
     */
    public function delete(string $file): bool;

    /**
     * @throws RuntimeException
     */
    public function write(
        string $file,
        string $contents,
        ?int $umask,
        ?int $permissions,
        bool $lock,
        bool $block,
        ?bool &$wouldBlock
    ): bool;

    /**
     * @throws RuntimeException
     */
    public function read(string $file, bool $lock, bool $block, ?bool &$wouldBlock): string;

    public function exists(string $file): bool;

    /**
     * @throws MetadataException
     */
    public function lastModifiedTime(string $file): int;

    /**
     * @throws MetadataException
     */
    public function lastAccessedTime(string $file): int;

    /**
     * @throws MetadataException
     */
    public function createdTime(string $file): int;

    /**
     * @throws MetadataException
     */
    public function filesize(string $file): int;

    public function clearStatCache(): void;

    /**
     * @throws RuntimeException
     */
    public function availableBytes(string $directory): int;

    /**
     * @throws RuntimeException
     */
    public function totalBytes(string $directory): int;

    public function touch(string $file): bool;

    /**
     * @return int The previous set umask.
     */
    public function umask(int $umask): int;

    public function createDirectory(
        string $directory,
        int $permissions,
        bool $recursive,
        ?int $umask = null
    ): void;
}
