<?php declare(strict_types=1);

namespace Heise\Shariff\Backend;

use Psr\Http\Message\RequestInterface;

/**
 * Class Pinterest.
 */
class Pinterest extends Request implements ServiceInterface
{
    public function getName(): string
    {
        return 'pinterest';
    }

    public function getRequest(string $url): RequestInterface
    {
        return new \GuzzleHttp\Psr7\Request(
            'GET',
            'https://api.pinterest.com/v1/urls/count.json?callback=x&url=' . urlencode($url)
        );
    }

    public function filterResponse(string $content): string
    {
        return mb_substr($content, 2, mb_strlen($content) - 3);
    }

    public function extractCount(array $data): int
    {
        return $data['count'] ?? 0;
    }
}
