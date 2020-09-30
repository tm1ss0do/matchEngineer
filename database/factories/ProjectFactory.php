<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;



$factory->define(Project::class, function (Faker $faker) {

    $status = [0,1];
    $type = ['revenue', 'single'];

    return [
        //
        'project_title' => $faker->realText(100),
        'project_status' => Arr::random($status),
        'project_type' => Arr::random($type),
        'project_reception_end' => $faker->dateTimeBetween($startDate = now() , $endDate = '+ 60 days')->format('Y-m-d'),
        'project_max_amount' => $faker->numberBetween(1, 10),
        'project_mini_amount' => $faker->numberBetween(10, 100),
        'project_detail_desc' => $faker->realText(2000),
        'created_at' => $faker->dateTimeBetween($startDate = '-110 days', $endDate = 'now')->format('Y-m-d'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-110 days', $endDate = 'now')->format('Y-m-d'),
        'deleted_at' => NULL,
        'user_id' => $faker->numberBetween(1, 10)
    ];
});
