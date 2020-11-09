<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'nama', 'kapasitas','deskripsi','biaya_langganan','biaya_instalasi'
    ];

    public function order()
    {
        return $this->hasMany('App\Models\Order', 'customer_id','id');
    }
}
