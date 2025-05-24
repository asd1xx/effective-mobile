<?php

declare(strict_types=1);

require 'vendor/autoload.php';

$user = new App\Models\User("Анна");
echo $user->getName() . PHP_EOL;  
// ✅ "Анна"
