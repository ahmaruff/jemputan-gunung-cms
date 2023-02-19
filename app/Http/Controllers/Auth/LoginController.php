<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{   
    public function adminLoginView()
    {
        $data = [];
        return view('auth.admin-login',$data);
    }

    public function adminLoginAction(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            \toastr()->success('Login success!');
            return redirect('/admin');
        }

        \toastr()->warning('Username/password salah!');
        return back()->onlyInput('username');
    }
}
