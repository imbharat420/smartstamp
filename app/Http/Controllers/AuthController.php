<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(){
        return response()->json("This is Login function");
    } 
    
    public function register(StoreUserRequest $request){
        
        return response()->json("This is register function");
    }

    public function logout(){
        return response()->json("This is logout function"); 
    }

}
    