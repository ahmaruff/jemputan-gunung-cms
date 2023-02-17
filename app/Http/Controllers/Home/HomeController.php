<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
        $data = [
         'title'  => 'Jemputan Gunung',
         'h1'     => 'test, hola' 
        ];

        return view('home.index',$data);
   }
}
