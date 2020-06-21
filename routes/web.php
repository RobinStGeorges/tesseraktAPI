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

//retourne tous les cours
$router->get('cours', 'CoursController@showAllCours');

//retourne un cours avec l'id
$router->get('cours/{id}', 'CoursController@showOneCoursBy');

//retourne tous les exercices
$router->get('exercices', 'ExercicesController@showAllExercices');

//retourne un cours avec l'id
$router->get('exercices/{id}', 'ExercicesController@showOneExerciceBy');

