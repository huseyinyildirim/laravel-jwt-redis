<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    echo "<center> Welcome </center>";
});

$router->get('/version', function () use ($router) {
    return $router->app->version();
});

Route::group(['prefix' => 'api'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('profile', 'AuthController@profile');

    Route::get("/document", 'DocumentController@getAll');
    Route::get("/document/{id}", 'DocumentController@getById');
    Route::post("/document", 'DocumentController@create');
    Route::put("/document/{id}", 'DocumentController@update');
    Route::delete("/document/{id}", 'DocumentController@delete');

    Route::get("/document/elastic", 'DocumentController@elastic');
});
