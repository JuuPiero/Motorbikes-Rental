<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';

    protected $fillable = [
        'user_id',
        'motorbike_id',
        'rating',
        'comment'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function motorbike() {
        return $this->belongsTo(Motorbike::class);
    }

}
