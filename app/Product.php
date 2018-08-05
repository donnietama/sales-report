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
        'slug', 'product_name', 'preview_url', 'product_size', 'product_description',
    ];

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
