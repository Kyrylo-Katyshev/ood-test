<?php
namespace App;

use App\Server\ProtocolFactory;

class MessageSenderService implements MessageSender
{
    private $protocolFactory;

    private $clientStorage;

    private $logger;

    public function __construct(ProtocolFactory $protocolFactory, Logger $logger)
    {
        $this->protocolFactory = $protocolFactory;
        $this->clientStorage = $protocolFactory->createClientStorage();
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


    private function getProtocolClient($protocol)
    {
        if (!$this->clientStorage->hasClient($protocol)) {

            $client = $this->protocolFactory->createClient($protocol);
            $this->clientStorage->addClient($protocol, $client);
        }

        return $this->clientStorage->getClient($protocol);
    }
}