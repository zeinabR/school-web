<?php

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

$factory->define(App\Models\Users\web_admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$M4Mafw/eo7zJi59UuxHWEu4CjijiaJ96ckvGqUUkP6rZWEpIrUpye', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Users\school_admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$M4Mafw/eo7zJi59UuxHWEu4CjijiaJ96ckvGqUUkP6rZWEpIrUpye', // secret
        'phone'=> $faker->phoneNumber,
        'address' => $faker->address,
        'web_id' => function () {
            return factory(App\Models\Users\web_admin::class)->create()->id;
        },
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Users\s_parent::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$M4Mafw/eo7zJi59UuxHWEu4CjijiaJ96ckvGqUUkP6rZWEpIrUpye', // secret
        'phone'=> $faker->phoneNumber,
        'address' => $faker->address,
        'j_name' => $faker->name,
        'j_phone' =>'01878675654',
        'j_address' =>$faker->address,
        'remember_token' => str_random(10),
    ];
});

// $factory->define(App\Models\Users\class::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => '$2y$10$M4Mafw/eo7zJi59UuxHWEu4CjijiaJ96ckvGqUUkP6rZWEpIrUpye', // secret
//         'phone'=> $faker->phone,
//         'address' => $faker->address,
//         'j_name' => $faker->name,
//         'j_phone' =>$faker->phone,
//         'remember_token' => str_random(10),
//     ];
// });

$factory->define(App\Models\Users\student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$M4Mafw/eo7zJi59UuxHWEu4CjijiaJ96ckvGqUUkP6rZWEpIrUpye', // secret
        'phone'=> $faker->phoneNumber,
        'address' => $faker->address,
        'gender' => 'female',
        'DOB' =>$faker->date,
        'parent_id' => function () {
            return factory(App\Models\Users\s_parent::class)->create()->id;
        },
        'class_id' => function () {
            return factory(App\ClassModel::class)->create()->id;
        },
        'remember_token' => str_random(10),
    ];
});


