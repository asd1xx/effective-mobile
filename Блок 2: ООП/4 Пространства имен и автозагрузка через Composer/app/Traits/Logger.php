<?php

declare(strict_types=1);

namespace App\Traits;

trait Logger
{
    public function log(string $text): void
    {
        print_r("[LOG]: {$text}" . PHP_EOL);
    }
}
