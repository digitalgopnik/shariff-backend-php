<?php declare(strict_types=1);

namespace Heise\Shariff\Backend;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Class Request.
 */
abstract class Request
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var array
     */
    protected $config;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function filterResponse(string $content): string
    {
        return $content;
    }

    public function setConfig(array $config): void
    {
        $this->config = $config;
    }

    /**
     * @deprecated This method is not used anymore and will be removed with version 6.
     *             Use \GuzzleHttp\Psr7\Request directly instead
     */
    protected function createRequest(string $url, string $method = 'GET'): RequestInterface
    {
        trigger_error('This method is not used anymore and will be removed with version 6.'
            . ' Use \GuzzleHttp\Psr7\Request directly instead.', E_USER_DEPRECATED);

        return new \GuzzleHttp\Psr7\Request($method, $url);
    }
}
