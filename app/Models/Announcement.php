<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['title', 'content', 'published_at'];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
