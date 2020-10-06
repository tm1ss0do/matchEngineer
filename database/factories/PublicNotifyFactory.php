<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\PublicNotify;
use Faker\Generator as Faker;


$factory->define(PublicNotify::class, function (Faker $faker) {
    return [
        //
        'public_board_id' => $faker->numberBetween(1, 10),
        'user_id' => $faker->numberBetween(1, 10),
        'deleted_at' => NULL,
        'read_flg' => 1
    ];
});
