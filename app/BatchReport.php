<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchReport extends Model
{
    protected $fillable = [
        'store_id', 'product_id', 'quantity'
    ];
}
