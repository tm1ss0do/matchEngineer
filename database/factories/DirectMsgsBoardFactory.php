<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\DirectMsgsBoard;
use Faker\Generator as Faker;

$factory->define(DirectMsgsBoard::class, function (Faker $faker) {
    return [
        //
        'reciever_id' => $faker->numberBetween(1, 10),
        'sender_id' => $faker->numberBetween(1, 10),
        'project_id' => NULL,
        'created_at' => $faker->dateTimeBetween($startDate = '-110 days', $endDate = 'now')->format('Y-m-d'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-110 days', $endDate = 'now')->format('Y-m-d'),
        'deleted_at' => NULL,

    ];
});
