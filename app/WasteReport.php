<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WasteReport extends Model
{
    protected $fillable = [
        'store_id', 'green_tea_jasmine', 'black_tea', 'quan_yin', 'matcha', 'royal', 'coffee', 'choco', 'cheese',
    ];
}
