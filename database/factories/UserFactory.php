<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use SON\Models\User;
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

$factory->define(User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'password' => $password ?: $password = bcrypt('admin'),
        'remember_token' => Str::random(10),
        'enrolment' => Str::random(6),
    ];
});

$factory->define(SON\Models\UserProfile::class, function (Faker $faker){
    return [
        'address'       => $faker->address,
        'cep'           => $faker->randomNumber(8),
        'number'        => rand(1,100),
        'complement'    => 'casa',
        'city'          => $faker->city,
        'neighborhood'  => $faker->city,
        'state'         => collect(SON\Models\State::$states)->random(),
    ];
});

$factory->define(SON\Models\Subjects::class, function(\Faker\Generator $faker){
   return [
       'name' => $faker->word,
   ];
});

$factory->define(SON\Models\ClassInformation::class, function(\Faker\Generator $faker){
   return [
     'date_start'   => $faker->date(),
     'date_end'     => $faker->date(),
     'cycle'        => rand(1,8),
     'subdivision'  => rand(1,16),
     'semester'     => rand(1,2),
     'year'         => rand(2017,2030),
   ];
});
