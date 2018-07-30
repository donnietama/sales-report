<?php

namespace App\Resources;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * Relationship for each products on ingredients.
     * 
     * @return void
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
