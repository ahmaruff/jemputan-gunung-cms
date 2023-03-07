<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {     
          $data = [
               'title'  => 'Jemputan Gunung',
          ];

          return view('home.trip',$data);
     }

   public function search(Request $request)
   {
        
   }
}
