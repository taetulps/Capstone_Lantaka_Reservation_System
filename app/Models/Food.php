<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    // You must specify the primary key if it is not 'id'
    protected $primaryKey = 'food_id';

    // THESE ARE THE MAGIC LINES: 
    // This tells Laravel it is safe to save data into these columns.
    protected $fillable = [
        'food_name',
        'food_category',
        'food_price',
        'status',
    ];
}