<?php
namespace App;

interface MessageSender {

    public function send(Message $message, array $servers);
}