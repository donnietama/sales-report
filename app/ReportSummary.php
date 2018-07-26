<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportSummary extends Model
{
    protected $fillable = [
        'store_id', 'date', 'gross', 'nett', 'voucher', 'cash', 'card', 'ticket',
    ];

    /**
     * Relationship between user and this report.
     * 
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'store_id');
    }
}
