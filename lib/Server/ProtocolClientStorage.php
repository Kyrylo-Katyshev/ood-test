<?php
namespace App\Server;

class ProtocolClientStorage
{
    protected $_clients = [];
    /**
     * @param $protocol
     * @param Client $client
     * @return mixed
     */
    public function addClient($protocol, Client $client)
    {
        if (!$this->hasClient($protocol)) {
            $this->_clients[$protocol] = $client;
        }

        return true;
    }

    /**
     * @param $protocol
     * @return Client|null
     */
    public function getClient($protocol)
    {

        return $this->hasClient($protocol) ? $this->_clients[$protocol] : null;
    }

    /**
     * @param $protocol
     * @return bool
     */
    public function hasClient($protocol)
    {
        return array_key_exists($protocol, $this->_clients);
    }
}