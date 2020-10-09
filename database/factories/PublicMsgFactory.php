<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\PublicMsg;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


$factory->define(PublicMsg::class, function (Faker $faker) {


    return [
        //
        'content' => $faker->realText(1000),
        'send_date' => $faker->dateTimeBetween($startDate = now() , $endDate = '+ 60 days')->format('Y-m-d'),
        'created_at' => $faker->dateTimeBetween($startDate = '-110 days', $endDate = 'now')->format('Y-m-d'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-110 days', $endDate = 'now')->format('Y-m-d'),
        'deleted_at' => NULL,
        'sender_id' => $faker->numberBetween(1, 10),
        'project_id' => $faker->numberBetween(1, 10)
    ];
});
