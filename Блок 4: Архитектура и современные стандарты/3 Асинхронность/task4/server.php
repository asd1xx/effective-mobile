<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use React\Http\HttpServer;
use React\Socket\SocketServer;
use Psr\Http\Message\ServerRequestInterface;

$server = new HttpServer(function (ServerRequestInterface $request) {
    return new React\Http\Message\Response(
        200,
        ['Content-Type' => 'text/plain'],
        "Hello from ReactPHP!"
    );
});

$socket = new SocketServer('127.0.0.1:8080');
$server->listen($socket);

echo "Сервер запущен на http://127.0.0.1:8080\n";
