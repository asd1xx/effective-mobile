<?php

declare(strict_types=1);

use App\Classes\Database;
use App\Controllers\UserController;
use App\Providers\UserServiceProvider;
use App\Repositories\UserRepository;
use App\Services\UserService;
use DI\Container;

$container = new Container();

$container->set('DatabaseInterface', function() {
    return new Database();
});
$container->set('UserRepositoryInterface', function($c) {
    return new UserRepository($c->get('DatabaseInterface'));
});
$container->set('UserServiceInterface', function($c) {
    return new UserService($c->get('UserRepositoryInterface'));
});
$container->set('UserController', function($c) {
    return new UserController($c->get('UserServiceInterface'));
});
$container->set('UserServiceProvider', function($c) {
    return (new UserServiceProvider())->register($c);
});
