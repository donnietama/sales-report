<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRegister extends Model
{
    protected $fillable = [
        'product_name',
    ];

    public function ingredients()
    {
        return $this->hasMany(ProductIngredient::class);
    }
}
