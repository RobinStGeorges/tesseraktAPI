<?php
namespace App\Http\Controllers;

header("Access-Control-Allow-Origin: *");

use Illuminate\Support\Facades\DB;

class UserController extends Controller
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

    public function getIsValide($userMail){
        $emailDecoded = str_replace('%point', '.',str_replace('%40', '@', $userMail));
        $user = DB::select("SELECT * FROM users where email like '".$emailDecoded."'");
        $isValid = $user[0]->is_valid;
        return $isValid;
    }

    public function getIsAdmin($userMail){
        $emailDecoded = str_replace('%point', '.',str_replace('%40', '@', $userMail));
        $user = DB::select("SELECT * FROM users where email like '".$emailDecoded."'");
        $isAdmin = $user[0]->is_admin;
        return $isAdmin;
    }

    public function getUserResponseByMail($userMail){
        $emailDecoded = str_replace('%point', '.',str_replace('%40', '@', $userMail));
        $userresponse = DB::select("SELECT * FROM userresponse where email like '".$emailDecoded."'");
        $response = $userresponse[0]->response;
        return $response;
    }

    public function getuserDataByMailAndIdExercice($userMail, $id){
        $emailDecoded = str_replace('%point', '.',str_replace('%40', '@', $userMail));
        $response = DB::select("SELECT * FROM userdata where email like '".$emailDecoded."' and id_exercice = ".$id);
        return $response;
    }

    public function deleteUserDataWithEmail($userMail){
        $emailDecoded = str_replace('%point', '.',str_replace('%40', '@', $userMail));
        $response = DB::delete ("DELETE FROM userdata where email like '".$emailDecoded."'");
        return $response;
    }


}
