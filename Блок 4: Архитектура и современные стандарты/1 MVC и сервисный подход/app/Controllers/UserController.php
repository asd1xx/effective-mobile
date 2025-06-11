<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Interfaces\UserServiceInterface;

class UserController
{
    private UserServiceInterface $service;

    public function __construct(UserServiceInterface $service)
    {
        $this->service = $service;
    }

    public function getUsers()
    {
        $users = $this->service->getUsers();
        require "../app/Views/user.php";
    }
}
