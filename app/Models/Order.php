<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'originating','terminating','customer_id','nama_product','biaya_langganan','biaya_instalasi','kapasitas'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'id','customer_id');
    }
}
