<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oldorder extends Model
{
    //
    protected $table = 'old_orders';
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'id','customer_id');
    }
}
