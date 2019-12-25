<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {

    return [
        'user_id' => $faker->numberBetween(1, 20),
        'title' => $faker->jobTitle,
        'job_type' => $faker->randomElement(['Full-time', 'Part-time', 'Apprenticships']),
        'body' => $faker->paragraph($nbSentences = 60, $variableNbSentences = true),
        'likes' => $faker->numberBetween(-20, 150),

    ];
});
