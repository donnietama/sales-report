<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductIngredient extends Model
{
    protected $fillable = [
    'product_name', 'ingredient',
    ];

    public function batch()
    {
        return $this->belongsTo(BatchReport::class, 'id', 'product_id');
    }

    public function products()
    {
        return $this->belongsTo(ProductRegister::class);
    }
}
