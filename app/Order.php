<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =[
        'recipent_id','order_type','order_number','invoice_amount','insurance_value','product_id',
        'quantity','status','label_type','delivery_method','ship_option','address','email','city','state','zip_code','phone','country'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function customer(){
        return $this->belongsTo(User::class);
    }
}
