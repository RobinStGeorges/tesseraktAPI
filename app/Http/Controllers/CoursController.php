<?php

namespace App\Http\Controllers;


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
        return json_decode(json_encode($results), true);
    }

    public function showOneCoursBy($id){
        return DB::select("select * from cours where id_cours = ".$id);
    }


}
