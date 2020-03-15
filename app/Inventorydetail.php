<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventorydetail extends Model
{
    
    protected $fillable = [
        'quantity_to_send','quantity_of_box', 'quantity_per_box',  'inventory_id', 'product_id'
    ];

    public function inventory(){
        return $this->belongsTo(Inventory::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    protected $with = ['product'];
}
