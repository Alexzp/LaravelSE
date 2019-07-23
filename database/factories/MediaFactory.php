<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Media;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;

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

$factory->define(Media::class, function (Faker $faker) {
    return [
        'filename' => $faker->sentence(),
        'origin_filename' => $faker->sentence(),
        'mime_type' => $faker->sentence(),
        'mediable' => DATATYPE_NOT_IMPLEMENTED_YET
    ];
});
