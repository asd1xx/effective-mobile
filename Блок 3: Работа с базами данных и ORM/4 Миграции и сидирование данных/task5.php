<?php

declare(strict_types=1);

// Поставил уникальный неймспейс во избежании конфликтов с ранее созданными классами
namespace Block3Migrations4Task5;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class User extends Model
{
    use HasFactory;

    protected string $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'),
        ];
    }
}

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();
    }
}

// php artisan db:seed
// ✅ В `users` добавилось 10 пользователей
