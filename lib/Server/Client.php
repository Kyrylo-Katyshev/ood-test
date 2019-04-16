<?php
namespace App\Server;

use App\Server;
use App\Message;

interface Client
{
    /**
     * @param Server $server
     * @param Message $message
     * @return bool
     */
    public function sendMessage(Server $server, Message $message);

    /**
     * @param Formatter $formatter
     */
    public function setMessageFormatter(Formatter $formatter);
}