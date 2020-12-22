<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLayanan extends Model
{
    protected $table = 'layanan_orders';

    public function list_order()
    {
        return $this->belongsTo('App\Models\ListOrder', 'id','list_id');
    }
}
