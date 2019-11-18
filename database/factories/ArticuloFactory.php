<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Articulo;
use Faker\Generator as Faker;

$factory->define(Articulo::class, function (Faker $faker) {
    return [
        //
        'codigo'=>$faker->unique()->numberBetween($min = 100000, $max = 1000000),
        'ean'=>$faker->unique()->numberBetween($min = 10000000, $max = 200000000),
        'nombre'=>$faker->name,
        'img_src'=>$faker->imageUrl($width = 400, $height = 400),
        'fabricante_id'=>1,
        'categoria_id'=>1

        //'fabricante_id'=>$faker->fabricante_id,
        //'categoria_id'=>$faker->categoria_id
    ];
});
