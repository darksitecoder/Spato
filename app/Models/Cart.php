<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'productName',
        'productQuantity',
        'calculatedAmount',
        'userEmail',
       
    ];

    protected $table = 'carts';
}
