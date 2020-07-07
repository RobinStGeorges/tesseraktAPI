<?php
namespace App\Http\Controllers;

header("Access-Control-Allow-Origin: *");

use Illuminate\Support\Facades\DB;

class ExercicesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showAllExercices(){
        $results = DB::select("SELECT * FROM exercices");
        return $results;
    }

    public function showOneExerciceBy($id){
        $results = DB::select("SELECT * FROM exercices where id_exercice= ".$id);
        return $results;
    }


}
