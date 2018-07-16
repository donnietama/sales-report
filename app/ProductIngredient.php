<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductIngredient extends Model
{
    protected $fillable = [
        'product_name', 'ingredient',
    ];
}
