<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
      $paket = Paket::all()->sortByDesc('id')->take(3);
      // dd($paket);  
      $data = [
         'title'  => 'Jemputan Gunung',
         'paket' => $paket, 
      ];

      return view('home.index',$data);
   }

   public function cariTrip(Request $request)
   {
      return redirect()->route('home.trip',['judul' => $request->cari]);
   }

   public function kontak()
   {
      $data = [
         'title' => 'Kontak | Jemputan Gunung',
      ];

      return view('home.kontak', $data);
   }

   public function tentang()
   {
      $data = [
         'title' => 'Tentang Kami | Jemputan Gunung',
      ];

      return view('home.tentang', $data);
   }

   public function sendMail(Request $request)
   {
      $rules = [
         'name' => ['required', 'string'],
         'email' => ['required'. 'email'],
         'subject' => ['required', 'string'],
         'message' => ['required'],
      ];

      $request->validate($rules);

      $to = 'jemputangunung@gmail.com';

      $name = $request->input('name');
      $emailAddress = $request->input('email');
      $subject = $request->input('subject');
      $message = $request->input('message');
      
   }
}
