<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
   public function dashboard(){
    return view('page.dashboard');
   }
}
