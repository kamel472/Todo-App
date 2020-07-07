<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use App\User;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        
        'name' => $faker->word,
        'dead_line' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'user_id' => function(){

            return User::all()->random();
        }
    ];
});
