<?php

namespace App\Http\Controllers;

header("Access-Control-Allow-Origin: *");

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function testing(){
        return 'test reussi';
    }
    //
}
