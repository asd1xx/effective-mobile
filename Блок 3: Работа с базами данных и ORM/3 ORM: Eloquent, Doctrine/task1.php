<?php

declare(strict_types=1);

// Поставил уникальный неймспейс во избежании конфликтов с ранее созданными классами
namespace Block3Orm3Task1;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected string $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}

$user = new User();
$user->name = "Иван";
$user->email = "ivan@example.com";
$user->password = bcrypt("secret");
$user->save();
// ✅ Данные сохранены в базе
