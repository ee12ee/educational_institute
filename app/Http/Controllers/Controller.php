<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public static function sendResponse($code=200,$msg=null,$data=null)
    {
       $response=
           ['status'=>$code,
               'msg'=>$msg,
               'data'=>$data

           ];
       return response()->json($response,$code);
    }
}
