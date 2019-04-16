<?php
namespace App;

use App\Server\Client;
use App\Server\ClientRegistry;
use App\Server\ProtocolFactory;

class MessageSenderService implements MessageSender, ClientRegistry
{
    private $protocolFactory;

    private $logger;

    private $clients = [];

    public function __construct(ProtocolFactory $protocolFactory, Logger $logger)
    {
        $this->protocolFactory = $protocolFactory;
        $this->logger = $logger;
    }

    public function send(Message $message, array $servers)
    {
        foreach ($servers as $server) {
            /** @var Server $server */
            try {
                $client = $this->getProtocolClient($server->getProtocol());
                $client->sendMessage($server, $message);
            } catch (\Exception $e) {
                $this->logger->log($e->getMessage());
            }
        }
    }

    public function addProtocolClient($protocol, Client $client)
    {
        if (!$this->hasProtocolClient($protocol)) {
            $this->clients[$protocol] = $client;
        }

        return true;
    }

    public function hasProtocolClient($protocol)
    {

        return array_key_exists($protocol, $this->clients);
    }

    public function getProtocolClient($protocol)
    {
        if (!$this->hasProtocolClient($protocol)) {

            $client = $this->protocolFactory->createClient($protocol);
            $this->addProtocolClient($protocol, $client);
        }

        return $this->clients[$protocol];
    }
}