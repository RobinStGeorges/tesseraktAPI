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

//COURS
$router->group(['prefix' => 'cours'], function($router){
    //retourne tous les cours
    $router->get('/', 'CoursController@showAllCours');

//retourne un cours avec l'id
    $router->get('{id}', 'CoursController@showOneCoursBy');
});

//EXERCICE
$router->group(['prefix' => 'exercices'], function($router){
    //retourne tous les exercices
    $router->get('/', 'ExercicesController@showAllExercices');

//retourne un exercice avec l'id
    $router->get('{id}', 'ExercicesController@showOneExerciceBy');
});

//REPONSE
$router->group(['prefix' => 'reponse'], function($router){
//retourne true/false si la reponse est bonne/fausse
    $router->get('{email}/{id}', 'ReponseController@isValideResponse');
});




