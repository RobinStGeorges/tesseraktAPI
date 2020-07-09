<?php
use App\Http\Controllers\CoursController as CC;
header("Access-Control-Allow-Origin: *");
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

header("Access-Control-Allow-Origin: *");

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
//set is started and date start to now
    $router->get('setIsStarted/{id}/{email}', 'ExercicesController@setIsStartedEtDateStart');
//    createNewUserDataEntry
    $router->get('createuserdatarow/{id}/{email}', 'ExercicesController@createNewUserDataEntry');
});

//REPONSE
$router->group(['prefix' => 'reponse'], function($router){
//retourne true/false si la reponse est bonne/fausse
    $router->get('{email}/{id}', 'ReponseController@isValideResponse');
});

//USER
$router->group(['prefix' => 'user'], function($router){
    $router->get('isValid/{userMail}', 'UserController@getIsValide');
    $router->get('isAdmin/{userMail}', 'UserController@getIsAdmin');
    $router->get('response/{userMail}', 'UserController@getUserResponseByMail');
    $router->get('userdata/{userMail}/{id}', 'UserController@getuserDataByMailAndIdExercice');
    $router->get('delete/{userMail}', 'UserController@deleteUserDataWithEmail');

});




