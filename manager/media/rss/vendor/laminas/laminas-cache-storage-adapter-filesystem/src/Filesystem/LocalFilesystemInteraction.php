<?php

declare(strict_types=1);

namespace Laminas\Cache\Storage\Adapter\Filesystem;

use Laminas\Cache\Exception\RuntimeException;
use Laminas\Cache\Storage\Adapter\Filesystem\Exception\MetadataException;
use Laminas\Cache\Storage\Adapter\Filesystem\Exception\UnlinkException;
use Laminas\Stdlib\ErrorHandler;

use function assert;
use function chmod;
use function clearstatcache;
use function decoct;
use function disk_free_space;
use function disk_total_space;
use function fclose;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function fileatime;
use function filectime;
use function filemtime;
use function filesize;
use function flock;
use function fopen;
use function ftruncate;
use function fwrite;
use function is_dir;
use function mkdir;
use function sprintf;
use function stream_get_contents;
use function strlen;
use function touch;
use function umask;
use function unlink;

use const LOCK_EX;
use const LOCK_NB;
use const LOCK_SH;
use const LOCK_UN;

/**
 * @internal
 */
final class LocalFilesystemInteraction implements FilesystemInteractionInterface
{
    public function delete(string $file): bool
    {
        ErrorHandler::start();
        $res = @unlink($file);
        $err = ErrorHandler::stop();

        if (! $res && file_exists($file)) {
            assert($err !== null);
            throw new UnlinkException($file, $err);
        }

        return true;
    }

    public function write(
        string $file,
        string $contents,
        ?int $umask,
        ?int $permissions,
        bool $lock,
        bool $block,
        ?bool &$wouldBlock
    ): bool {
        $nonBlocking = $lock && $block;
        $wouldBlock  = null;

        if ($umask !== null && $permissions !== null) {
            $permissions &= ~$umask;
        }

        ErrorHandler::start();

        // if locking and non blocking is enabled -> file_put_contents can't used
        if ($lock && $nonBlocking) {
            $umask = $umask !== null ? umask($umask) : null;

            $fp = fopen($file, 'cb');

            if ($umask) {
                umask($umask);
            }

            if (! $fp) {
                $err = ErrorHandler::stop();
                throw new RuntimeException("Error opening file '{$file}'", 0, $err);
            }

            if ($permissions !== null && ! chmod($file, $permissions)) {
                fclose($fp);
                $oct = decoct($permissions);
                $err = ErrorHandler::stop();
                throw new RuntimeException("chmod('{$file}', 0{$oct}) failed", 0, $err);
            }

            $wouldblockFromFileLock = null;
            if (! flock($fp, LOCK_EX | LOCK_NB, $wouldblockFromFileLock)) {
                fclose($fp);
                $err = ErrorHandler::stop();
                if ($wouldblockFromFileLock) {
                    $wouldBlock = true;

                    return false;
                }

                throw new RuntimeException("Error locking file '{$file}'", 0, $err);
            }

            if (fwrite($fp, $contents) === false) {
                flock($fp, LOCK_UN);
                fclose($fp);
                $err = ErrorHandler::stop();
                throw new RuntimeException("Error writing file '{$file}'", 0, $err);
            }

            if (! ftruncate($fp, strlen($contents))) {
                flock($fp, LOCK_UN);
                fclose($fp);
                $err = ErrorHandler::stop();
                throw new RuntimeException("Error truncating file '{$file}'", 0, $err);
            }

            flock($fp, LOCK_UN);
            fclose($fp);

            // else -> file_put_contents can be used
        } else {
            $flags = 0;
            if ($lock) {
                $flags |= LOCK_EX;
            }

            $umask = $umask !== null ? umask($umask) : null;

            $rs = file_put_contents($file, $contents, $flags);

            if ($umask) {
                umask($umask);
            }

            if ($rs === false) {
                $err = ErrorHandler::stop();
                throw new RuntimeException("Error writing file '{$file}'", 0, $err);
            }

            if ($permissions !== null && ! chmod($file, $permissions)) {
                $oct = decoct($permissions);
                $err = ErrorHandler::stop();
                throw new RuntimeException("chmod('{$file}', 0{$oct}) failed", 0, $err);
            }
        }

        ErrorHandler::stop();

        return true;
    }

    public function read(string $file, bool $lock, bool $block, ?bool &$wouldBlock): string
    {
        $wouldBlock = null;
        ErrorHandler::start();

        // if file locking enabled -> file_get_contents can't be used
        if ($lock) {
            $fp = fopen($file, 'rb');
            if ($fp === false) {
                $err = ErrorHandler::stop();
                throw new RuntimeException("Error opening file '{$file}'", 0, $err);
            }

            if ($block) {
                $wouldblockFromFileLock = null;
                $locked                 = flock($fp, LOCK_SH | LOCK_NB, $wouldblockFromFileLock);
                if ($wouldblockFromFileLock) {
                    fclose($fp);
                    ErrorHandler::stop();
                    $wouldBlock = true;

                    return '';
                }
            } else {
                $locked = flock($fp, LOCK_SH);
            }

            if (! $locked) {
                fclose($fp);
                $err = ErrorHandler::stop();
                throw new RuntimeException("Error locking file '{$file}'", 0, $err);
            }

            $res = stream_get_contents($fp);
            if ($res === false) {
                flock($fp, LOCK_UN);
                fclose($fp);
                $err = ErrorHandler::stop();
                throw new RuntimeException('Error getting stream contents', 0, $err);
            }

            flock($fp, LOCK_UN);
            fclose($fp);

            // if file locking disabled -> file_get_contents can be used
        } else {
            $res = file_get_contents($file, false);
            if ($res === false) {
                $err = ErrorHandler::stop();
                throw new RuntimeException("Error getting file contents for file '{$file}'", 0, $err);
            }
        }

        ErrorHandler::stop();

        return $res;
    }

    public function exists(string $file): bool
    {
        return file_exists($file);
    }

    public function lastModifiedTime(string $file): int
    {
        ErrorHandler::start();
        $mtime = filemtime($file);
        $error = ErrorHandler::stop();

        if ($mtime === false) {
            assert($error !== null);
            throw new MetadataException(MetadataException::METADATA_MTIME, $error);
        }

        return $mtime;
    }

    public function lastAccessedTime(string $file): int
    {
        ErrorHandler::start();
        $atime = fileatime($file);
        $error = ErrorHandler::stop();

        if ($atime === false) {
            assert($error !== null);

            throw new MetadataException(MetadataException::METADATA_ATIME, $error);
        }

        return $atime;
    }

    public function createdTime(string $file): int
    {
        ErrorHandler::start();
        $ctime = filectime($file);
        $error = ErrorHandler::stop();

        if ($ctime === false) {
            assert($error !== null);

            throw new MetadataException(MetadataException::METADATA_CTIME, $error);
        }

        return $ctime;
    }

    public function filesize(string $file): int
    {
        ErrorHandler::start();
        $filesize = filesize($file);
        $error    = ErrorHandler::stop();

        if ($filesize === false) {
            assert($error !== null);
            throw new MetadataException(MetadataException::METADATA_FILESIZE, $error);
        }

        return $filesize;
    }

    public function clearStatCache(): void
    {
        clearstatcache();
    }

    public function availableBytes(string $directory): int
    {
        ErrorHandler::start();
        $bytes = disk_free_space($directory);
        $error = ErrorHandler::stop();

        if ($bytes === false) {
            throw new RuntimeException(
                'Could not detect disk free space',
                0,
                $error
            );
        }

        return (int) $bytes;
    }

    public function totalBytes(string $directory): int
    {
        ErrorHandler::start();
        $bytes = disk_total_space($directory);
        $error = ErrorHandler::stop();

        if ($bytes === false) {
            throw new RuntimeException(
                'Could not detect disk total space',
                0,
                $error
            );
        }

        return (int) $bytes;
    }

    public function touch(string $file): bool
    {
        ErrorHandler::start();
        $touch = touch($file);
        $error = ErrorHandler::stop();
        if (! $touch) {
            throw new RuntimeException("Error touching file '{$file}'", 0, $error);
        }

        return true;
    }

    public function umask(int $umask): int
    {
        return umask($umask);
    }

    public function createDirectory(
        string $directory,
        int $permissions,
        bool $recursive = false,
        ?int $umask = null
    ): void {
        $umaskToRestore = null;

        if ($umask) {
            $umaskToRestore = umask($umask);
        }

        $created = mkdir($directory, $permissions, $recursive);
        $error   = ErrorHandler::stop();

        if ($umaskToRestore) {
            umask($umaskToRestore);
        }

        if ($created === false && ! is_dir($directory)) {
            throw new RuntimeException(
                sprintf('Could not create directory "%s"', $directory),
                0,
                $error
            );
        }

        ErrorHandler::start();
        if (! chmod($directory, $permissions)) {
            $oct   = decoct($permissions);
            $error = ErrorHandler::stop();
            throw new RuntimeException("chmod('{$directory}', 0{$oct}) failed", 0, $error);
        }

        ErrorHandler::stop();
    }
}
