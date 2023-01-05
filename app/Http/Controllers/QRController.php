<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrController extends Controller
{
   function view(){
        return response()->json("This is qr view function");
   } 
}
