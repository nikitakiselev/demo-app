<?php

use App\Models\Booking;
use Faker\Generator as Faker;

$factory->define(App\Models\Booking::class, function (Faker $faker) {
    return [
        'quest_id' => function () {
            return factory(\App\Models\Quest::class)->create()->id;
        },
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'status' => $faker->randomElement([
            Booking::BOOKING_NEW,
            Booking::BOOKING_NOT_VERIFIED,
            Booking::BOOKING_CONFIRMED,
            Booking::BOOKING_CLOSED,
            Booking::BOOKING_CANCELED,
        ]),
        'date' => $faker->dateTimeBetween('-1 year', '+1 month'),
        'price' => $faker->randomFloat(2, 100, 10000),
        'comment' => $faker->text,
    ];
});
