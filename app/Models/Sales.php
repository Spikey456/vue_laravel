<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = "sales";
    public $timestamps = true;

    protected $fillable =[
        'prod_name', 'price', 'qty', 'total'
    ];
}
