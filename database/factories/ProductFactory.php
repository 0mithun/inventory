<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'      =>  $faker->name(),
        'sku'       =>  uniqid(),
        'platform'  =>  $faker->randomElement(['Upload','Excel']),
        'user_id'     =>  function(){
            return factory(App\User::class)->create()->id;
        }
    ];
});
