<?php
namespace App\Server;

use App\Message;

interface Formatter
{

    /**
     * @param Message $message
     * @return string
     */
    public function format(Message $message);

    /**
     * @param string $protocol
     * @return boolean
     */
    public function isEligible($protocol);

 }