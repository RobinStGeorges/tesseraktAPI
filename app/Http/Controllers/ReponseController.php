<?php

namespace App\Http\Controllers;

header("Access-Control-Allow-Origin: https://tesserakt-6980c.firebaseapp.com");

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
}

