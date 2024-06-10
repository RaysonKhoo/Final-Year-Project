<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback'; // Make sure it matches your table name

    protected $fillable = [
        'name', 'email', 'subject', 'message','phone_number','reply',
    ];
}
