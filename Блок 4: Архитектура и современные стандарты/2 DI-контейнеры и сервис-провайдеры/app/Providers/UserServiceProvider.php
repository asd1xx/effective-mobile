<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\UserService;
use App\Repositories\UserRepository;
use DI\Container;

class UserServiceProvider
{
    public function register(Container $container): void
    {
        $container->set('UserRepositoryInterface', function($c) {
            return new UserRepository($c->get('DatabaseInterface'));
        });
        $container->set('UserServiceInterface', function($c) {
            return new UserService($c->get('UserRepositoryInterface'));
        });
    }
}
