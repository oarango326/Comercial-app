<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Fabricante;
use Faker\Generator as Faker;

$factory->define(Fabricante::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->name,
    ];
});
