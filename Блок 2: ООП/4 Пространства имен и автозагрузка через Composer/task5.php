<?php

declare(strict_types=1);

require 'vendor/autoload.php';

$order = new App\Models\Order();
$order->log("Заказ создан");
// ✅ "[LOG]: Заказ создан"
