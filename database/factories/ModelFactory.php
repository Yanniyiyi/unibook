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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Book::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'university_id' => rand(1,43),
        'description' => 'test',
        'user_id' => 1,
    'images' => json_encode([]),
                'phone' => $faker->e164PhoneNumber,
                'email' => $faker->email,
        'price' => $faker->randomFloat(2,10,50)
    ];
});
