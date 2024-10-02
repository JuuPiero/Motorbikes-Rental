<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorbike extends Model
{
    use HasFactory;
    const IMAGE_UPLOAD_PATH = 'uploads/motorbike';

    protected $table = 'motorbikes';
    protected $fillable = [
        'license_plate',
        'brand',
        'model',
        'description',
        'price_per_day',
        'status'
    ];


    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }
    
}
