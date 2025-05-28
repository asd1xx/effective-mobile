<?php

declare(strict_types=1);

require 'vendor/autoload.php';

$service = new App\Services\UserService();
echo $service->getUserGreeting("Олег") . PHP_EOL;
// ✅ "Привет, Олег!"
