<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $admins = Admin::all();
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'admins' => $admins,
        ];

        return view('admin.account', $data);
    }

    public function show($id)
    {
        $user = Auth::user();
        $admin = Admin::find($id);
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'admin' => $admin,
        ];

        return view('admin.account-detail', $data);
    }

    // view
    public function create()
    {
        $user = Auth::user();
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
        ];

        return view('admin.account-add', $data);
    }

    // action
    public function store(Request $request)
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
            return redirect()->to('/admin');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
            return back();
        }
    }

    //view
    public function edit()
    {
        $user = Auth::user();
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
        ];

        return view('admin.account-edit', $data);
    }

    //action
    public function update(Request $request)
    {
        $user = Admin::find($request->post('id'));

        $rules = [
            'id' => ['required'],
            'nama' => ['sometimes', 'string'],
            'username' => ['sometimes', 'string', 'unique:App\Models\Admin,username'],
        ];

        $passwordRules = [
            'old_password' => ['required'],
            'password' => ['required', 'confirmed','min:6']
        ];

        
        if($request->filled('password')) {
            $rules = array_merge($rules, $passwordRules);
        }

        // dd($rules);

        // CHECK IF USERNAME SAME AS LOGGED IN USER;
        if($user->username == $request->post('username')) {
            $requestData = $request->except('username');
        } else {
            $requestData = $request->post();
        }

        $validator = Validator::make($requestData,$rules);

        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back()->withInput(['username','nama']);
        }

        $validatedData = $validator->validated();
        // dd($validatedData);

        // CHECK OLD PASSWORD IS NOT CORRECT (not same as user)
        if(isset($validatedData['old_password'])) {
            if($validatedData['old_password'] != $user->getAuthPassword()) {
                \toastr()->error('Old Password is incorrect, please try again!');
                return back();
            }
        }
        // dd($validatedData);

        try {
            $admin = Admin::find($validatedData['id']);
            $admin->update($validatedData);
            \toastr()->success('Update success!');
            return redirect()->to('/admin/profile');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
            return back();
        }

    }

    public function destroy($id)
    {
        try {
          $admin = Admin::find($id)->delete();
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
            return back();
        }

        \toastr()->success('Akun telah dihapus!');
        return redirect()->to('/admin');
    }
}
