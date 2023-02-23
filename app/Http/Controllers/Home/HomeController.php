<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
         $paket = Paket::all(['id','judul', 'deskripsi','durasi','penjemputan','harga'])->sortByDesc('id')->take(3);
         // dd($paket);  
         $data = [
            'title'  => 'Jemputan Gunung',
            'paket' => $paket, 
         ];

         return view('home.index',$data);
   }
}
