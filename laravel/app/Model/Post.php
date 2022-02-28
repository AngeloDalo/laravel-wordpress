<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'eyelet',
        'title',
        'content',
        'slug',
        'created_at',
        'updated_at',
    ];
}
