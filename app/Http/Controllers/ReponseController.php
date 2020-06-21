<?php

namespace App\Http\Controllers;

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
        $userResponse = DB::select("SELECT * FROM userresponse where email like '".$email."'");
        return  $userResponse[0]->response;
    }

//    compare la réponse de l'exercice à la dernière reponse du cube amster
    public function isValideResponse($email, $id){
        $isCorrect = 0;
        $emailDecoded = str_replace('%point', '.',str_replace('%40', '@', $email));
        $exerciceReponse = DB::select("SELECT * FROM reponse where id =".$id);
        $userResponse = $this->getLastuserResponse($emailDecoded);
        if($exerciceReponse[0]->responseValue == $userResponse){
            $isCorrect = 1;
        }
        return $isCorrect;
    }



    //
}
