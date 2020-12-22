<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderData extends Model
{
    protected $table = 'data_orders';

    public function list_order()
    {
        return $this->belongsTo('App\Models\ListOrder', 'id','list_id');
    }
}
