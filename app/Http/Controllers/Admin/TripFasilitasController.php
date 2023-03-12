<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fasilitas;

class TripFasilitasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $fasilitas = Fasilitas::all();

        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'fasilitas' => $fasilitas,
        ];
        
        return view('admin.fasilitas.index', $data);
    }
}
