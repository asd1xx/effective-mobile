<?php

declare(strict_types=1);

$controller = $container->get('UserController');

if ($_SERVER['REQUEST_URI'] === '/users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->getUsers();
}
