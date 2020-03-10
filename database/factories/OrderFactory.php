<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'customer_id'   => function(){
            return factory(App\User::class)->create()->id;
        },
        'order_type'        =>  'consumer',
        'order_number'      =>  uniqid(),
        'invoice_amount'    =>  $faker->randomFloat(2,10,10000),
        'product_id'        =>  function(){
            return factory(App\Product::class)->create()->id;
        },
        'quantity'          =>  random_int(1,3),
        'status'            =>  1,
        'label_type'        =>  'ShipBob Labels',
        'delivery_method'   =>  'hand',
        'ship_option'       =>  'standard'
        
    ];
});
