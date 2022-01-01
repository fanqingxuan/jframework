<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Middleware\ExampleMiddleware;
use Illuminate\Http\Request;

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
    return $router->app->version();
});


$router->get('/index','HomeController@index');
$router->get('/home',['middleware'=>'test',function(Request $request) {
    return response($request->all());
}]);
$router->get('/list',['middleware'=>'test','uses'=>'HomeController@list']);