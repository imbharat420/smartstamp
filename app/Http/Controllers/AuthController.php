<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(){
        return response()->json("This is Login function");
    }
    
    public function register(){
        $request->-validate)'all';_
        validate([
            "name"=>["required","string","max:255"],
            "email"=>["required","string","email","max:255","unique:users"],
            "password"=>["required","confirm",Ruleset::password :],
        ]);
        return response()->json("This is register function");
    }

    public function logout(){
        return response()->json("This is logout function"); 
    }

}
    