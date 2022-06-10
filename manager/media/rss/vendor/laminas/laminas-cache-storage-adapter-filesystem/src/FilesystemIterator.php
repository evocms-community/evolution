<?php

declare(strict_types=1);

namespace Laminas\Cache\Storage\Adapter;

use GlobIterator;
use Laminas\Cache\Storage\IteratorInterface;
use ReturnTypeWillChange;

use function strlen;
use function substr;

final class FilesystemIterator implements IteratorInterface
{
    /**
     * The Filesystem storage instance
     *
     * @var Filesystem
     */
    protected $storage;

    /**
     * The iterator mode
     *
     * @var int
     */
    protected $mode = IteratorInterface::CURRENT_AS_KEY;

    /**
     * The GlobIterator instance
     *
     * @var GlobIterator
     */
    protected $globIterator;

    /**
     * The namespace sprefix
     *
     * @var string
     */
    protected $prefix;

    /**
     * String length of namespace prefix
     *
     * @var int
     */
    protected $prefixLength;

    /**
     * Constructor
     *
     * @param string      $path
     * @param string      $prefix
     */
    public function __construct(Filesystem $storage, $path, $prefix)
    {
        $this->storage      = $storage;
        $this->globIterator = new GlobIterator($path, GlobIterator::KEY_AS_FILENAME);
        $this->prefix       = $prefix;
        $this->prefixLength = strlen($prefix);
    }

    /**
     * Get storage instance
     *
     * @return Filesystem
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * Get iterator mode
     *
     * @return int Value of IteratorInterface::CURRENT_AS_*
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set iterator mode
     *
     * @param int $mode
     * @return FilesystemIterator Provides a fluent interface
     */
    public function setMode($mode)
    {
        $this->mode = (int) $mode;
        return $this;
    }

    /* Iterator */

    /**
     * Get current key, value or metadata.
     *
     * @return mixed
     */
    #[ReturnTypeWillChange]
    public function current()
    {
        if ($this->mode === IteratorInterface::CURRENT_AS_SELF) {
            return $this;
        }

        $key = $this->key();

        if ($this->mode === IteratorInterface::CURRENT_AS_VALUE) {
            return $this->storage->getItem($key);
        } elseif ($this->mode === IteratorInterface::CURRENT_AS_METADATA) {
            return $this->storage->getMetadata($key);
        }

        return $key;
    }

    /**
     * Get current key
     */
    public function key(): string
    {
        $filename = $this->globIterator->key();

        // return without namespace prefix and file suffix
        return substr($filename, $this->prefixLength, -4);
    }

    /**
     * Move forward to next element
     */
    public function next(): void
    {
        $this->globIterator->next();
    }

    /**
     * Checks if current position is valid
     */
    public function valid(): bool
    {
        return $this->globIterator->valid();
    }

    /**
     * Rewind the Iterator to the first element.
     */
    public function rewind(): void
    {
        $this->globIterator->rewind();
    }
}
