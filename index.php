<?php
namespace App;

use App\Message;
use App\Server;
use App\Server\ProtocolFactory;

require __DIR__ . '/vendor/autoload.php';

$message = new Message();
list($message->author, $message->subject, $message->text) = ["I", "say", "Hello World!"];

$servers = [
    new Server('http://lorem.ipsum.com/api/v1.2/gateway', Server::PROTOCOL_V2),
    new Server('ftp://lorem.ipsum.com', Server::PROTOCOL_V3),
    new Server('http://api.example.com', Server::PROTOCOL_V1),
];

$broadcast = new MessageSenderService(new ProtocolFactory(), new Logger());

$broadcast->send($message, $servers);