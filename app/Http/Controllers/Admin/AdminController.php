<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $jml_paket = Paket::all()->count();
        $jml_admin = Admin::all()->count();

        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'jml_paket' => $jml_paket,
            'jml_admin' => $jml_admin,
        ];

        return view('admin.dashboard', $data);
    }

    public function profile()
    {
        $user = Auth::user();
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
        ];

        return view('admin.profile', $data);
    }
}
