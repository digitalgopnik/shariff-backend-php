<?php declare(strict_types=1);

namespace Heise\Shariff\Backend;

use Psr\Http\Message\RequestInterface;

/**
 * Class Facebook.
 */
class Facebook extends Request implements ServiceInterface
{
    public function getName(): string
    {
        return 'facebook';
    }

    public function setConfig(array $config): void
    {
        if (empty($config['app_id']) || empty($config['secret'])) {
            throw new \InvalidArgumentException('The Facebook app_id and secret must not be empty.');
        }
        parent::setConfig($config);
    }

    public function getRequest(string $url): RequestInterface
    {
        $accessToken = urlencode($this->config['app_id']) . '|' . urlencode($this->config['secret']);
        $query = 'https://graph.facebook.com/v18.0/?id='
            . urlencode($url)
            . '&fields=og_object%7Bengagement%7D&access_token='
            . $accessToken;

        return new \GuzzleHttp\Psr7\Request('GET', $query);
    }

    public function extractCount(array $data): int
    {
        if (isset($data['og_object']['engagement']['count'])) {
            return $data['og_object']['engagement']['count'];
        }

        return 0;
    }
}
