<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notification;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = true;
    protected $fillable = [
        'name',
        'email',
        'password',
        'verify_key',
        'role',
        'gender', // Add the new fields here
        'room_number',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function reviews()
    {
        return Review::whereHas('parcel', function ($query) {
            $query->where('user_id', $this->id);
        })->get();
    }
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}
