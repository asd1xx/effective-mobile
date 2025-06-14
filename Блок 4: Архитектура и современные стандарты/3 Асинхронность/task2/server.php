<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Swoole\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;

$server = new Server("127.0.0.1", 9501);

$server->on("request", function (Request $request, Response $response) {
    Swoole\Timer::after(5000, function () {
        echo "Каждые 5 секунд выводится сообщение\n";
    });

});

$server->start();
