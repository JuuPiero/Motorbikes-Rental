<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'motorbike_id',
    ];

    public function motorbike()
    {
        return $this->belongsTo(Motorbike::class);
    }
}
