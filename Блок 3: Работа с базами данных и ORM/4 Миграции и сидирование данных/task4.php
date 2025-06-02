<?php

declare(strict_types=1);

// Поставил уникальный неймспейс во избежании конфликтов с ранее созданными классами
namespace Block3Migrations4Task4;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'Admin', 'email' => 'admin@example.com', 'password' => Hash::make('password')],
            ['name' => 'Max', 'email' => 'max@max.com', 'password' => Hash::make('max')],
            ['name' => 'John', 'email' => 'john@john.com', 'password' => Hash::make('john')],
            ['name' => 'Leo', 'email' => 'leo@leo.com', 'password' => Hash::make('leo')],
            ['name' => 'Kami', 'email' => 'kami@kami.com', 'password' => Hash::make('kami')],
        ]);
    }
}

// php artisan db:seed --class=UserSeeder  
print_r(DB::table('users')->get());
// ✅ В таблице `users` появилось 5 пользователей
