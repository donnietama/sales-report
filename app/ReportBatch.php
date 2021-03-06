<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportBatch extends Model
{
    /**
     * Input list that mass assignable.
     * 
     * @return array
     */
    protected $fillable = [
        'store_id', 'date', 'product_id', 'quantity',
    ];

    /**
     * Relationship between product and this report.
     * 
     * @return void
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    /**
     * Relationship between user and this report.
     * 
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'store_id', 'id');
    }

    /**
     * Relationship between product and ingredient.
     * 
     * @return void
     */
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class, 'product_id', 'product_id');
    }
}
