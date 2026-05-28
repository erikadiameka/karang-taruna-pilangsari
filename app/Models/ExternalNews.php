<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalNews extends Model
{
    protected $table = 'external_news';

    protected $fillable = [
        'title', 'slug', 'summary', 'source', 'url', 'image', 'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
