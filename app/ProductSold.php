<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSold extends Model
{
    protected $fillable = [
        'store_id', 'date', 'product_id', 'quantity',
    ];

    public function productName()
    {
        return $this->hasOne(ProductRegister::class, 'id', 'product_id');
    }

    public function userId()
    {
        return $this->hasOne(User::class, 'id', 'store_id');
    }
}
