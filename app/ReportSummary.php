<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportSummary extends Model
{
    protected $fillable = [
        'store_id', 'date', 'gross', 'nett', 'voucher', 'cash', 'card', 'ticket',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
