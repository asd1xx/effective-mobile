<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use React\Http\Browser;

$browser = new Browser();

$browser->get('https://jsonplaceholder.typicode.com/users')
    ->then(function (Psr\Http\Message\ResponseInterface $response) {
        echo $response->getBody();
    });

echo "Запрос отправлен, ждем ответа...\n";
