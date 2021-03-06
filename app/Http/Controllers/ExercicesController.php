<?php
namespace App\Http\Controllers;

use DateTime;
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
        return DB::select("SELECT * FROM exercices");
    }

    public function showOneExerciceBy($id){
        return DB::select("SELECT * FROM exercices where id_exercice= ".$id);
    }

    public function createNewUserDataEntry($id, $email){
        $emailDecoded = str_replace('%point', '.',str_replace('%40', '@', $email));

        $date = new DateTime();
        $results = DB::update("insert into userdata (id_exercice, email) values (?, ?)", [$id, $emailDecoded] );
        return $results;
    }

    public function setIsStartedEtDateStart($id, $email){
        $emailDecoded = str_replace('%point', '.',str_replace('%40', '@', $email));
        $results = DB::update("update userdata set is_started = true, date_start = CURRENT_TIMESTAMP where id_exercice = ".$id." and email like '".$emailDecoded."'");
        return $results;
    }

    public function setIsFinished($id, $email){
        $emailDecoded = str_replace('%point', '.',str_replace('%40', '@', $email));
        $results = DB::update("update userdata set is_finished = true, date_end = CURRENT_TIMESTAMP where id_exercice = ".$id." and email like '".$emailDecoded."'");

        return $results;
    }

}
