<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Destinasi;

class TripDestinasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $destinasi = Destinasi::all();

        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'destinasi' => $destinasi,
        ];

        return view('admin.destinasi.index', $data);
    }
}
