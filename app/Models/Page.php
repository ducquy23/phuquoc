<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'template',
        'body',
        'extra',
        'hero_image_url',
        'is_home',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'extra' => 'array',
        'is_home' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];
}


