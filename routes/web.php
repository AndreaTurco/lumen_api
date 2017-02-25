<?php

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

$app->get('/', function () use ($app) {
    return $app->version();
});
$app->get('/foo', function (){
    return "foooooooooo";
});

/**
 * product management
 */
//$app->group(['middleware' => 'auth'], function () use ($app) {
$app->get('/api/products','ProductController@index');
$app->post('api/products','ProductController@add');
$app->put('api/products/{id}','ProductController@update');
$app->delete('api/products/{id}','ProductController@delete');
//});

/**
 * $app->group(['prefix' => 'api','namespace' => 'App\Http\Controllers'], function($app){
$app->get('products','ProductController@index');
$app->post('products','ProductController@add');
$app->put('products/{id}','ProductController@update');
$app->delete('products/{id}','ProductController@delete');
});
 */