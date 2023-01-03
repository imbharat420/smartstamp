<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginUserRequest $request){
        $request->validated($request->all());

        if(!auth()->attempt($request->only('email', 'password'))){
            return $this->error("Invalid Credentials", 401);
        }

        $user = User::where('email', $request->email)->first();

        return $this->success([
            "user" => $user,
            "token" => $user->createToken('API TOKEN OF ' . $user->name)->plainTextToken
        ]);
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
    