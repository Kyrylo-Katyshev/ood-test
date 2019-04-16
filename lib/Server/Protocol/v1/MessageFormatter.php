<?php
namespace App\Server\Protocol\v1;

use App\Message;
use App\Server\Server;
use App\Server\Formatter;

class MessageFormatter implements Formatter
{
    private $protocol = Server::PROTOCOL_V1;

    /**
     * @param Message $message
     * @return string
     */
    public function format(Message $message)
    {
        return json_encode([
            'name' => $message->author,
            'value' => $message->subject
        ]);
    }

    /**
     * @param string $protocol
     * @return boolean
     */
    public function isEligible($protocol)
    {
        return $protocol === Server::PROTOCOL_V1;
    }
}