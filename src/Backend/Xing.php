<?php declare(strict_types=1);

namespace Heise\Shariff\Backend;

use Psr\Http\Message\RequestInterface;

/**
 * Class Xing.
 */
class Xing extends Request implements ServiceInterface
{
    public function getName(): string
    {
        return 'xing';
    }

    public function getRequest(string $url): RequestInterface
    {
        return new \GuzzleHttp\Psr7\Request(
            'POST',
            'https://www.xing-share.com/spi/shares/statistics?url=' . urlencode($url)
        );
    }

    public function extractCount(array $data): int
    {
        return $data['share_counter'] ?? 0;
    }
}
