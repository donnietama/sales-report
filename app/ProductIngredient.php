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
        return $this->belongsTo(BatchReport::class);
    }
}
