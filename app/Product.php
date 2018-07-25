<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * List of the mass assignable entry.
     * 
     * @param array
     */
    protected $fillable = [
        'product_name',
    ];

    /**
     * Relationship for ingredient on each product.
     * 
     * @return void
     */
    public function ingredient()
    {
        return $this->hasMany(Ingredient::class, 'id', 'product_id');
    }
}
