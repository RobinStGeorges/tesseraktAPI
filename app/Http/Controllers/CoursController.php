<?php

namespace App\Http\Controllers;

header("Access-Control-Allow-Origin: *");

use Illuminate\Support\Facades\DB;

class CoursController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }



    public function showAllCours(){
        $results = DB::select("SELECT * FROM cours");
        $resultsArray = json_decode(json_encode($results), true);
        return $resultsArray;
    }

    public function showOneCoursBy($id){
        $results = DB::select("select * from cours where id_cours = ".$id);
        return $results;
    }


}
