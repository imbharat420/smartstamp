<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qr;

class QrController extends Controller
{
   function view(){
      return Qr::all();
   } 
}
