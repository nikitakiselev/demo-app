<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Quest::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
    ];
});
