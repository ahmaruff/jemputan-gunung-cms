<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use App\Models\Fasilitas;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $paket = Paket::all();
        $fasilitas = Fasilitas::all();
        $destinasi = Destinasi::all();

        $jml_paket = $paket->count();
        $jml_destinasi = $destinasi->count();
        $jml_fasilitas = $fasilitas->count();


        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'paket' => $paket,
            'destinasi' => $destinasi,
            'fasilitas' => $fasilitas,
            'jml_paket' => $jml_paket,
            'jml_destinasi' => $jml_destinasi,
            'jml_fasilitas' => $jml_fasilitas,
        ];

        return view('admin.trip.index', $data);
    }

    public function show()
    {
        $user = Auth::user();
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
        ];

        return view('admin.trip.trip-detail', $data);
    }
}
