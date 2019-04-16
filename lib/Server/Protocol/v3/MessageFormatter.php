<?php
namespace App\Server\Protocol\v3;

use App\Message;
use App\Server\Server;
use App\Server\Formatter;

class MessageFormatter implements Formatter
{
    /**
     * @param Message $message
     * @return string
     */
    public function format(Message $message)
    {
        return <<<XML
<message>
    <title>{$message->subject}</title>     
    <body>{$message->text}</body>
</message>
XML;
    }

    /**
     * @param string $protocol
     * @return boolean
     */
    public function isEligible($protocol)
    {
        return $protocol === Server::PROTOCOL_V3;
    }
}