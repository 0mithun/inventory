<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'shipping_type', 'send_to_location','inventory_configure',
        
        'estimated_date_of_arrival_shipment','status'
    ];


    

    public function inventorydetails(){
        return $this->hasMany(Inventorydetail::class);
    }

    public function getInventoryConfigureAttribute($inventory_configure){
        return ucwords(str_replace('_', ' ', $inventory_configure));

    }

    public function getShippingTypeAttribute($shipping_type){
        return ucwords(str_replace('_', ' ', $shipping_type));
    }
}
