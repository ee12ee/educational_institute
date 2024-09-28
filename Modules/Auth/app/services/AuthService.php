<?php

namespace Modules\Auth\services;
class AuthService{

public function register($request,$model){
    $data= $request->validated();
    $user=$model::create($data);
    $accessToken = $user->createToken('Personal Aceess Token')->plainTextToken;
    return $accessToken;
}
public function login($request,string $guard){
        if(auth($guard)->attempt($request->validated())){
        $user=auth($guard)->user();
        $accessToken = $user->createToken('Personal Acess Token')->plainTextToken;
        return $accessToken;
     
    }}
}
