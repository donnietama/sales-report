<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchReport extends Model
{
    protected $fillable = [
        'store_id', 'green_tea_jasmine', 'black_tea', 'quan_yin', 'matcha', 'royal', 'coffee', 'choco', 'cheese',
    ];

    public function ingredients()
    {
        return $this->hasMany(ProductIngredient::class);
    }

    public function productName()
    {
        return $this->hasOne(ProductRegister::class, 'id', 'product_id');
    }

    public function userId()
    {
        return $this->hasOne(User::class, 'id', 'store_id');
    }
}
