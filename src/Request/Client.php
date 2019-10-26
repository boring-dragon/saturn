<?php

namespace Jinas\Saturn\Request;

use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use Jinas\Saturn\Interfaces\IClient;

class Client implements IClient
{

    private $client;

    /**
     * __construct
     *
     * @param  mixed $client
     *
     * @return void
     */
    public function __construct(GuzzleClientInterface $client)
    {
        $this->client = $client;
    }
    /**
     * request
     *
     * @param  mixed $url
     *
     * @return void
     */
    public function request($url)
    {
        $response = $this->client->request('GET', $url);
        $data = $response->getBody();

        return $data;
    }
}
