<?php
namespace App\Server\Client;

use App\Server;
use App\Message;
use App\Server\Client;
use App\Server\Formatter;

class FtpClient implements Client
{
    private $formatter;

    /**
     * @param Formatter $formatter
     */
    public function setMessageFormatter(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @param Server $server
     * @param Message $message
     * @return bool
     */
    public function sendMessage(Server $server, Message $message)
    {
        //TODO: Implement sendMessage() method.

        echo sprintf("%s\n", $this->formatter->format($message));

        return true;
    }
}