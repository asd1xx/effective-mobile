<?php

declare(strict_types=1);

namespace App\Models;

class User
{
    protected string $table = 'users';
    protected string $name;
    protected string $email;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $value): void
    {
        $this->name = $value;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $value): void
    {
        $this->email = $value;
    }
}
