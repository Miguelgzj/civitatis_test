<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Activity;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'title' => $faker->text(40),
        'description' => $faker->text(150),
        'start_at' => $faker->dateTimeBetween('-10 days', '+15 days'),
        'finish_at' => $faker->dateTimeBetween('+15 days', '+30 days'),
        'price' => $faker->numberBetween(5,100),
        'popularity'=> $faker->numberBetween(0, 1000)
    ];
});

