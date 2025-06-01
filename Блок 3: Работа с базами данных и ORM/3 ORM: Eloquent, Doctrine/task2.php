<?php

declare(strict_types=1);

// Поставил уникальный неймспейс во избежании конфликтов с ранее созданными классами
namespace Block3Orm3Task2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Model
{
    protected string $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

}

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

$post = Post::find(1);
echo $post->user->name;
// ✅ Выводит имя автора поста
