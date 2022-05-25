<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\brand;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(brand::class, function (Faker $faker) {

    $name = ['bajaj', 'honda', 'tvs', 'yamaha', 'bmw'];
    $word = ucwords($faker->word);

    return [
        'code'=>(brand::count()+1),
        'name'=>$name[rand(0,4)],
        // 'slug'=>Str::slug($name),
        'slug'=> Str::slug($word),
        'description'=>$word,
        
    ];
    
});