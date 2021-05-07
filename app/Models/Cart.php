<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";
    public $timestamps = true;

    protected $fillable =[
        'prod_name', 'price', 'qty', 'total_price'
    ];
}
