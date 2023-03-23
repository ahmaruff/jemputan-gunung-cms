<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use App\Models\Paket;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {     
          $paket = Paket::all();
          $destinasi = Destinasi::all();
          $data = [
               'title'  => 'Jemputan Gunung',
               'paket' => $paket,
               'destinasi' => $destinasi,
          ];

          return view('home.trip',$data);
     }

     public function show($id)
     {
          $paket = Paket::find($id);

          $data = [
               'title' => $paket->judul,
               'paket' => $paket,
          ];

          return view('home.trip-detail', $data);
     }

     public function search(Request $request)
     {
          if ($request->post() == null) {
               return redirect('/trip');
          }

          $paket = Paket::query();
          $paket->orWhere('judul', 'like', '%'.$request->judul.'%')
          ->orWhere('penjemputan', 'like', '%'.$request->penjemputan.'%');

          $destinasi = Destinasi::all();
          $data = [
               'title'  => 'Jemputan Gunung',
               'paket' => $paket->get(),
               'destinasi' => $destinasi,
          ];

          return view('home.trip',$data);
     }
}
