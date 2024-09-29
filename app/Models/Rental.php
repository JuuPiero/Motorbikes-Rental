<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    const IMAGE_UPLOAD_PATH = 'uploads/rental';

    protected $fillable = [
        'user_id',
        'motorbike_id',
        'start_time',
        'end_time',
        'note',
        'status',
        'total_amount',
        'pick_up_location',
        'drop_off_location',
        'pre_rental_image',
        'driver_license'

    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function motorbike() {
        return $this->belongsTo(Motorbike::class);
    }


    // public function accessories() {
    //     return $this->belongsToMany(Accessory::class);
    // }
}
