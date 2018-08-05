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

    /**
     * Relationship for batches report.
     * 
     * @return void
     */
    public function batches()
    {
        return $this->belongsTo(\App\ReportBatch::class, 'id', 'product_id');
    }

    /**
     * Relationship for product sold.
     * 
     * @return void
     */
    public function sold()
    {
        return $this->belongsTo(\App\ReportProductSold::class, 'id', 'product_id');
    }
}
