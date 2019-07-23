<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Post;
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

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->words(3, true),
        'body' => $faker->realText(),
        'slug' => $faker->slug,
        'published' => $faker->boolean(),
        'author_id' => random_int(0, 9223372036854775807),
        'thumbnail_id' => random_int(0, 9223372036854775807)
    ];
});
