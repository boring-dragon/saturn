<?php

namespace Jinas\Saturn\Interfaces;

use GuzzleHttp\ClientInterface as GuzzleClientInterface;

interface IClient
{
    /**
     * __construct
     *
     * @param  mixed $client
     *
     * @return void
     */
    public function __construct(GuzzleClientInterface $client);
    /**
     * request
     *
     * @param  mixed $url
     *
     * @return void
     */
    public function request($url);
}
