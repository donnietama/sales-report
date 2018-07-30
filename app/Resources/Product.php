<?php

namespace App\Resources;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Relationship for ingredient on each product.
     * 
     * @return void
     */
    public function ingredient()
    {
        return $this->hasMany(Ingredient::class, 'product_id', 'id');
    }
}
