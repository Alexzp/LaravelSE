<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
* Snippet for a quick route reference
*/
Route::get('/', function (Router $router) {
    return collect($router->getRoutes()->getRoutesByMethod()["GET"])->map(function($value, $key) {
        return url($key);
    })->values();   
});

Route::resource('roles', 'RoleAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('walls', 'WallAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('posts', 'PostAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('categories', 'CategoryAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('tags', 'TagAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('comments', 'CommentAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('likes', 'LikeAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('ratings', 'RatingAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('media', 'MediaAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('users', 'UserAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);