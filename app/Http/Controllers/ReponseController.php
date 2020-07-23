<?php

namespace App\Http\Controllers;


use DateTime;
use Illuminate\Support\Facades\DB;

class ReponseController extends Controller
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

//    retourne la dernière combinaison detecté par le cube master
    private function getLastuserResponse($email){
        $emailDecoded = str_replace('%point', '.',str_replace('%40', '@', $email));
        $userResponse = DB::select("SELECT * FROM userresponse where email like '".$emailDecoded."'");
        return  json_decode(json_encode($userResponse, true));
    }

    private function getExerciceresponseById($id){
        $exerciceReponse = DB::select("SELECT * FROM reponse where id_exercice =".$id);
        return $exerciceReponse[0]->value;
    }

    public function getTimeToSolve($email){
        $emailDecoded = str_replace('%point', '.',str_replace('%40', '@', $email));
        $result = DB::select("SELECT id_exercice, date_start, date_end FROM userdata where email like'".$emailDecoded."'");
        $arrayTimeToSolve = [];

        foreach($result as $r){

            if($r->date_start != NULL && $r->date_end != NULL){
                try {
                    $datetimeStart = new DateTime($r->date_start);
                } catch (\Exception $e) {
                }
                try {
                    $datetimeEnd = new DateTime($r->date_end);
                } catch (\Exception $e) {
                }
                $interval = $datetimeStart->diff($datetimeEnd);
                $year = intval($interval->format('%Y'));
                $month = intval($interval->format('%m'));
                $days = intval($interval->format('%d'));
                $hours = intval($interval->format('%H'));
                $tmpTotal = 8760*$year + 730*$month + 24*$days + $hours;
                array_push($arrayTimeToSolve, $tmpTotal);
            }
        }
        return json_encode($arrayTimeToSolve);
    }

    private function getJsonFromuserResponse($userResponse){
        $array = array();
        foreach ($userResponse as $response){
//            creer un json avec les données de chaques réponses
            $array[''.$response->coord_x.''.$response->coord_y] = ''.$response->id_box;
        }
        return json_encode($array);
    }

//    compare la réponse de l'exercice par id à la dernière reponse du cube master
    public function isValideResponse($email, $id){
        $userResponse = $this->getLastuserResponse($email);
        $exerciceResponse = $this->getExerciceresponseById($id);
        $jsonUserResponse = $this->getJsonFromUserResponse($userResponse);
        if($exerciceResponse === $jsonUserResponse){
            return true;
        }
        else{
            return false;
        }
    }

    public function setCubesValues($value){
        $tabVal = explode(';',  ltrim($value, ';'));
        for ($i = 0; $i< sizeof($tabVal);$i = $i + 2){
            $tabi = $tabVal[$i];
            $tabiplusun = '"'.$tabVal[$i+1].'"';
            if (empty(DB::select("SELECT * FROM idcudetoaction where id_cube = ".$tabi))){
                $result = DB::insert('insert into idcudetoaction (id_cube, action) values ('.$tabi.', '.$tabiplusun.')');
            }
            else{
                $result = DB::update('update idcudetoaction set action = '.$tabiplusun.' where id_cube = ?', [$tabi]);
            }
        }
        return $result;
    }

}

