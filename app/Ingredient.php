<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * List of the mass assignable inputs.
     * 
     * @param array
     */
    protected $fillable = [
        'product_name', 'ingredient',
    ];

    /**
     * Relationship for each products on ingredients.
     * 
     * @return void
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }

    /**
     * Relationship for each batch reports to count ingredients total.
     * 
     * @return void
     */
    public function batch()
    {
        return $this->belongsTo(ReportBatch::class, 'product_id', 'product_id');
    }
}
