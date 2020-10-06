<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\DirectMsgs;
use Faker\Generator as Faker;

$factory->define(DirectMsgs::class, function (Faker $faker) {
    return [
        //
        //
        'send_date' => $faker->dateTimeBetween($startDate = now() , $endDate = '+ 60 days')->format('Y-m-d'),
        'content' => $faker->realText(1000),
        'created_at' => $faker->dateTimeBetween($startDate = '-110 days', $endDate = 'now')->format('Y-m-d'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-110 days', $endDate = 'now')->format('Y-m-d'),
        'deleted_at' => NULL,
        'sender_id' => $faker->numberBetween(1, 10),
        'board_id' => $faker->numberBetween(1, 10)

    ];
});
