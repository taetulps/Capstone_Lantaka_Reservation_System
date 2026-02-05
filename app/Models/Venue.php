<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name', // Remember: Venues have 'name', Rooms have 'room_number/type'
        'capacity',
        'price',
        'external_price',
        'status',
        'description',
        'image'
    ];
}