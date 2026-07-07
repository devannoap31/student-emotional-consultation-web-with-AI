<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'title',
        'type',
        'url',
        'category',
        'description',
        'thumbnail_url'
    ];
}
