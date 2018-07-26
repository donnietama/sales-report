<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportProductSold extends Model
{
    /**
     * List input yang bisa diisi secara Mass Assign.
     * 
     * @return array
     */
    protected $fillable = [
        'store_id', 'date', 'product_id', 'quantity',
    ];

    /**
     * Relasi antar laporan dengan produk.
     * 
     * @return void
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    /**
     * Relasi antar laporan dengan user penginput.
     * 
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'store_id', 'id');
    }
}
