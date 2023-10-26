<?php declare(strict_types=1);

namespace Heise\Shariff;

/**
 * Generic Cache Interface.
 *
 * @author Markus Klein <markus.klein@typo3.org>
 */
interface CacheInterface
{
    /**
     * Set cache entry.
     */
    public function setItem(string $key, string $content): void;

    /**
     * Get cache entry.
     */
    public function getItem(string $key): string;

    /**
     * Check if cache entry exists.
     */
    public function hasItem(string $key): bool;
}
