<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductData;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ProductData::class, function (Faker $faker) {
    return [
         "product_name" => $faker->word,
        "product_price" => $faker->numberBetween(100,1000),
        "type" => 'item',
        "status" => '1',
        "adding_person" => function(){
            return \App\User::all()->random();    
            } 
    ];
});
