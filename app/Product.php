<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','sku','platform','on_hand','chi_on_hand','dal_on_hand','pa_on_hand','more_on_hand','active','digital','dangerous','lot'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function inventory(){
        return $this->hasMany(Inventory::class);
    }
}
