<?php
namespace App\Server;

use App\Server;
use App\Message;

class HttpClient implements Client
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

        $data = $this->formatter->format($message);

        return true;
    }
}