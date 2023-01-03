<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    use HttpResponses;

    public function login(Request $request){
        $request->validated($request->all());

        return response()->json("This is Login function");
    } 
    
    public function register(StoreUserRequest $request){
        $request->validated($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $this->success([
            "user" => $user,
            "token" => $user->createToken('API TOKEN OF ' . $user->name)->plainTextToken
        ]);
        
    }

    public function logout(){
        return response()->json("This is logout function"); 
    }

}
    