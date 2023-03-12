<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Paket;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            'user' => $user,
            'nama' => $user->nama,
            'email' => $user->email,
        ];

        return view('admin.profile', $data);
    }

    public function profileUpdateAction(Request $request)
    {
        $user = Auth::user();

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
}
