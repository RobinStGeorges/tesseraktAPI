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
    return "Tesserakt PHP API";
});


//COURS
$router->get('/cours', 'CoursController@showAllCours'); //done
$router->get('getCours/{id}', 'CoursController@showOneCoursBy'); //done


//EXERCICE

//retourne tous les exercices
$router->get('/exercices', 'ExercicesController@showAllExercices'); //done
//retourne un exercice avec l'id
$router->get('getExercice/{id}', 'ExercicesController@showOneExerciceBy'); //done
//set is started and date start to now
$router->get('setIsStarted/{id}/{email}', 'ExercicesController@setIsStartedEtDateStart');
//    createNewUserDataEntry
$router->get('createuserdatarow/{id}/{email}', 'ExercicesController@createNewUserDataEntry');
//    met l'exercice a l'etat de is_finished
$router->get('exercicesSetIsFinished/{id}/{email}', 'ExercicesController@setIsFinished');

//REPONSE
$router->get('/isValidResponse/{email}/{id}', 'ReponseController@isValideResponse');


//USER

$router->get('isValid/{userMail}', 'UserController@getIsValide');
$router->get('isAdmin/{userMail}', 'UserController@getIsAdmin');
$router->get('getUserResponse/{userMail}', 'UserController@getUserResponseByMail');
$router->get('userdata/{userMail}/{id}', 'UserController@getuserDataByMailAndIdExercice');
$router->get('delete/{userMail}', 'UserController@deleteUserDataWithEmail');





