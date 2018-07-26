<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relationship between users table with summaries.
     * 
     * @return void
     */
    public function summaries()
    {
        return $this->hasMany(ReportSummary::class, 'store_id', 'id');
    }

    /**
     * Relationship between users table with batches.
     * 
     * @return void
     */
    public function batch()
    {
        return $this->hasMany(ReportBatch::class, 'store_id', 'id');
    }

    /**
     * Relationship between users table with product sold.
     * 
     * @return void
     */
    public function productSold()
    {
        return $this->hasMany(ReportProductSold::class, 'store_id', 'id');
    }

    /**
     * Relationship between users table with waste.
     * 
     * @return void
     */
    public function waste()
    {
        return $this->hasMany(ReportWaste::class, 'store_id', 'id');
    }

    /**
     * Relationship between users table with additional.
     * 
     * @return void
     */
    public function additional()
    {
        return $this->hasMany(ReportAdditional::class, 'store_id', 'id');
    }
}
