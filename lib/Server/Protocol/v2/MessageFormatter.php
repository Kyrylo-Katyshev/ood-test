<?php
namespace App\Server\Protocol\v2;

use App\Message;
use App\Server;
use App\Server\Formatter;

class MessageFormatter implements Formatter
{
    /**
     * @param Message $message
     * @return string
     */
    public function format(Message $message)
    {
        return json_encode([
            'author'    => $message->author,
            'subject'   => $message->subject,
            'text'      => $message->text,
        ]);
    }

    /**
     * @param string $protocol
     * @return boolean
     */
    public function isEligible($protocol)
    {
        return $protocol === Server::PROTOCOL_V2;
    }
}