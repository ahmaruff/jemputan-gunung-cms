<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Database\QueryException;
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
            'password' => ['required','confirmed', 'string', 'min:6'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back()->withInput(['email','username','nama']);
        }

        $validatedData = $validator->validated();
        // dd($validatedData);

        try {
            $admin = Admin::create([
                'nama' => $validatedData['nama'],
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
    
            \toastr()->success('Register berhasil!');
            return redirect()->intended('/login/admin');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
            return back();
        }
    }
}
