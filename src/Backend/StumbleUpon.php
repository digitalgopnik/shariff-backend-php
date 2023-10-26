<?php declare(strict_types=1);

namespace Heise\Shariff\Backend;

use Psr\Http\Message\RequestInterface;

/**
 * Class StumbleUpon.
 */
class StumbleUpon extends Request implements ServiceInterface
{
    public function getName(): string
    {
        return 'stumbleupon';
    }

    public function getRequest(string $url): RequestInterface
    {
        return new \GuzzleHttp\Psr7\Request(
            'GET',
            'https://www.stumbleupon.com/services/1.01/badge.getinfo?url=' . urlencode($url)
        );
    }

    public function extractCount(array $data): int
    {
        return (isset($data['result']['views'])) ? $data['result']['views'] + 0 : 0;
    }
}
