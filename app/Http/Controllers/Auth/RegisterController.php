<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function adminRegisterView()
    {
        $data = [];

        return view('auth.admin-register', $data);
    }

    public function adminRegisterAction(Request $request)
    {
        $rules = [
            'email' => ['required', 'string', 'email', 'unique:App\Models\Admin,email'],
            'username' => ['required', 'string', 'unique:App\Models\Admin,username'],
            'nama' => ['required', 'string',],
            'password' => ['required','confirmed', 'string'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            \toastr()->error($validator->errors());
            return back()->withInput(['email','username','nama']);
        }

        $validatedData = $validator->validated();
        // dd($validatedData);

        $admin = Admin::create([
            'nama' => $validatedData['nama'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        \toastr()->success('Register berhasil!');
        return redirect()->intended('/login/admin');
    }
}
