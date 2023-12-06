<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function dashboard(){
    return view('index');
   }

   public function print(){
    
    return view('print');
}
}


