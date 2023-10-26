<?php declare(strict_types=1);

namespace Heise\Shariff\Backend;

use Psr\Http\Message\RequestInterface;

/**
 * Interface ServiceInterface.
 */
interface ServiceInterface
{
    public function getRequest(string $url): RequestInterface;

    public function extractCount(array $data): int;

    public function getName(): string;

    public function filterResponse(string $content): string;

    public function setConfig(array $config): void;
}
