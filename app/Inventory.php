<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'shipping_type','send_to_location','inventory_configure','quantity_to_send','quantity_of_box',
        'quantity_per_box','quantity_to_send','estimated_date_of_arrival_shipment','status'
    ];


    public function product(){
        return $this->belongsTo(Product::class);
    }
}
