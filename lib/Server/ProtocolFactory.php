<?php
namespace App\Server;

use App\Server;
use App\Server\Client\HttpClient;
use App\Server\Client\FtpClient;

class ProtocolFactory
{
    /**
     * @param string $protocol
     * @return Formatter|null
     */
    public function createMessageFormatter($protocol)
    {
        $className = sprintf("App\\Server\\Protocol\\%s\\MessageFormatter", $protocol);

        if (class_exists($className)) {
            return new $className;
        }
        return null;
    }

    /**
     * @param string $protocol
     * @return Client|null
     */
    public function createClient($protocol)
    {
        $client = null;

        switch ($protocol) {
            case Server::PROTOCOL_V1:
                $client = new HttpClient();
                break;
            case Server::PROTOCOL_V2:
                $client = new HttpClient();
                break;
            case Server::PROTOCOL_V3:
                $client = new FtpClient();
                break;
        }

        if ($client instanceof Client) {
            $formatter = $this->createMessageFormatter($protocol);
            $client->setMessageFormatter($formatter);
        }

        return $client;
    }
}