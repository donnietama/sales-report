<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalReport extends Model
{
    public function product()
    {
        return $this->hasOne(ProductRegister::class, 'id', 'product_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'store_id');
    }
}
