<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
        ];

        return view('admin.dashboard', $data);
    }
}
