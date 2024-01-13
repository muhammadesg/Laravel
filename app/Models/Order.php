<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'telephone',
        'address',
        'total_price',
        'status',
        'products',
    ];

    protected $casts = [
        'products' => 'json',
    ];
}
