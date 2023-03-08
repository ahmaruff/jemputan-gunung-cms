<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use App\Models\Fasilitas;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $paket = Paket::all();
        $jml_paket = $paket->count();
        $jml_destinasi = Destinasi::all()->count();
        $jml_fasilitas = Fasilitas::all()->count();

        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'paket' => $paket,
            'jml_paket' => $jml_paket,
            'jml_destinasi' => $jml_destinasi,
            'jml_fasilitas' => $jml_fasilitas,
        ];

        return view('admin.trip', $data);
    }

    public function show()
    {
        $user = Auth::user();
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
        ];

        return view('admin.trip-detail', $data);
    }
    
}
