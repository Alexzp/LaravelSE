<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Comment;
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

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->realText(),
        'published' => $faker->boolean(),
        'post_id' => random_int(1, 10),
        'author_id' => random_int(0, 9223372036854775807),
        'reply_id' => random_int(0, 9223372036854775807),
        'commentable' => DATATYPE_NOT_IMPLEMENTED_YET
    ];
});
