<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // These must match your Migration columns exactly
    protected $fillable = [
        'user_id',
        'room_number',
        'room_type',
        'capacity',
        'price',
        'external_price',
        'status',
        'description',
        'image'
    ];
}