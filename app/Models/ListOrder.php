<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListOrder extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'id';
    /**
     * Sets the UUID value for the primary key field.
     */
    protected function setUUID()
    {
        $this->id = preg_replace('/\./', '', uniqid('bpm', true));
    }

    protected $table = 'list_orders';

    public function fb()
    {
        return $this->belongsTo(FB::class, 'fb_id');
    }
    public function order_layanan()
    {
        return $this->hasMany('App\Models\OrderLayanan', 'list_id','id');
    }
    public function order_data()
    {
        return $this->hasOne('App\Models\OrderData', 'list_id','id');
    }
}
