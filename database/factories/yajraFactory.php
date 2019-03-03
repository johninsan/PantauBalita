<?php

use App\Model\yajra;
use Faker\Generator as Faker;

$factory->define(App\Model\yajra::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'phone' =>  $faker->numberBetween(2,13),
        'alamat' => $faker->paragraph,
    ];
});
