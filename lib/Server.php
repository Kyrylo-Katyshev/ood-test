<?php
namespace App;

class Server
{
    const PROTOCOL_V1 = 'v1';
    const PROTOCOL_V2 = 'v2';
    const PROTOCOL_V3 = 'v3';
    const PROTOCOL_V4 = 'v4';

    private $url;

    private $protocol;

    public function getUrl(){
        return $this->url;
    }

    public function getProtocol(){
        return $this->protocol;
    }
}