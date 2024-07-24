<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author',
    ];

    //converting the data type of the attributes to strings
    protected function castAttribute($key, $value)
    {
        return match ($key) {
            'title', 'content', 'author' => (string) $value,
            default => $value,
        };
    }
}