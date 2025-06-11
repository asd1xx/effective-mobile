<?php

declare(strict_types=1);

use App\Classes\Database;
use App\Controllers\UserController;
use App\Repositories\UserRepository;
use App\Services\UserService;

$database = new Database();
$repository = new UserRepository($database);
$service = new UserService($repository);
$controller = new UserController($service);

if ($_SERVER['REQUEST_URI'] === '/users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->getUsers();
}
