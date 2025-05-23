<?php

declare(strict_types=1);

namespace App\Models;

class User
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

$user = new User("Иван");
echo $user->getName() . PHP_EOL;
// ✅ "Иван"
