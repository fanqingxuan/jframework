<?php

/** @var \JFramework\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell application the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get("/home", "HomeController@index");
$router->get("/list", "HomeController@list");
$router->get("/test_event", "HomeController@test_event");
$router->get("/test_redis", "HomeController@test_redis");


$router->get("/hello", "HelloController@index");
