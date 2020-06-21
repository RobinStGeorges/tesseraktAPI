<?php
use App\Http\Controllers\CoursController as CC;
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

use FastRoute\Route;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//$router->group(['prefix' => 'api'], function($router){
//    $router->get('cours', 'CoursController@showCours');
//});

//$router->get('/cours/{id}', function ($id) use ($router) {
//    return ;
//});

$router->get('cours/{id}', 'CoursController@showAllCours');
//Route::get('cours', array('uses' => 'CoursController@showAllCours'));
