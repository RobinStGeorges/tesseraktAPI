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
        //
    }

    //

    public function showAllCours(){
        $results = DB::select("SELECT * FROM cours");
        return $results;
    }

    public function showOneCoursBy($id){
        $results = DB::select("SELECT * FROM cours");
        return $results;
    }


}
