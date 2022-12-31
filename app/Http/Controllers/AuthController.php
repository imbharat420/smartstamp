<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(){
        return "This is login function";
    }

     public function register(){
        return "This is register function";
    }

}
    