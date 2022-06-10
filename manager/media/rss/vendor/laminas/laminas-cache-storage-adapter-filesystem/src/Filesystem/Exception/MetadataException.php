<?php

declare(strict_types=1);

namespace Laminas\Cache\Storage\Adapter\Filesystem\Exception;

use ErrorException;
use Laminas\Cache\Exception\RuntimeException;
use Laminas\Cache\Storage\Adapter\Filesystem;

use function sprintf;

final class MetadataException extends RuntimeException
{
    public const METADATA_ATIME    = Filesystem::METADATA_ATIME;
    public const METADATA_CTIME    = Filesystem::METADATA_CTIME;
    public const METADATA_MTIME    = Filesystem::METADATA_MTIME;
    public const METADATA_FILESIZE = Filesystem::METADATA_FILESIZE;

    /** @var ErrorException */
    private $error;

    /**
     * @psalm-param MetadataException::METADATA_* $metadata
     */
    public function __construct(string $metadata, ErrorException $error)
    {
        parent::__construct(sprintf('Could not detected metadata "%s"', $metadata), 0, $error);
        $this->error = $error;
    }

    public function getErrorSeverity(): int
    {
        return $this->error->getSeverity();
    }

    public function getErrorMessage(): string
    {
        return $this->error->getMessage();
    }

    public function getErrorFile(): string
    {
        return $this->error->getFile();
    }

    public function getErrorLine(): int
    {
        return $this->error->getLine();
    }
}
