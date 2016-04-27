<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Nuummite\Followable\FeedMessage::class, function (Faker\Generator $faker) {
    return [
        'message' => $faker->paragraph
    ];
});
