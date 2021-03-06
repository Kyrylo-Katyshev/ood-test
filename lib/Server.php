<?php
namespace App;

class Server
{
    const PROTOCOL_V1 = 'v1';
    const PROTOCOL_V2 = 'v2';
    const PROTOCOL_V3 = 'v3';

    private $url;

    private $protocol;

    /**
     * Server constructor.
     * @param string $url
     * @param string $protocol
     */
    public function __construct($url, $protocol)
    {
        $this->url = $url;
        $this->protocol = $protocol;
    }

    public function getUrl(){
        return $this->url;
    }

    public function getProtocol(){
        return $this->protocol;
    }
}