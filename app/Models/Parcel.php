<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    protected $table = 'parcels'; // Make sure it matches your table name
    protected $fillable = [
        'date_received', 'tracking_number', 'name','phone_number','room_number','courier_name','status','collect_date','location','selection_date','photos'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'phone_number', 'phone_number');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'parcel_id');
    }
}
