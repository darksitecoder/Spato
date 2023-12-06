<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'productName',
        'productQuantity',
        'productRateForNormalUsers',
        'productRateForB2BUsers',
        'productRateForB2CUsers',
        'description',
        'image',
    ];

    protected $table = 'products';
}
