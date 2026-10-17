<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'title',
        'author',
        'year',
        'genre',
        'is_completed',
        'description',
    ];

    protected function casts(): array
    {
        return [
            
            'is_completed' => 'boolean',
            'year' => 'integer',
        ];
    }
    //
}
