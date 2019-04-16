<?php
namespace App\Server;

interface ClientRegistry
{
    /**
     * @param $protocol
     * @param Client $client
     * @return mixed
     */
    public function addProtocolClient($protocol, Client $client);

    /**
     * @param $key
     * @return Client
     */
    public function getProtocolClient($protocol);

    /**
     * @param $key
     * @return bool
     */
    public function hasProtocolClient($protocol);

}