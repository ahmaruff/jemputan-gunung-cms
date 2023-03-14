<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Destinasi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

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

    public function create()
    {
        $user = Auth::user();
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
        ];
        
        return view('admin.destinasi.add', $data);
    }
    
    public function store(Request $request)
    {
        $rules = [
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back()->withInput(['nama', 'alamat', 'deskripsi']);
        }

        $validatedData = $validator->validated();
        // dd($validatedData);

        try {
            $isCreated = Destinasi::create($validatedData);
            \toastr()->success('New destination is created');
            return redirect()->to('/admin/trip/destinasi');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
        }

        return redirect()->to('/admin/trip/destinasi');
    }

    public function show($id)
    {
        $user = Auth::user();
        $destinasi = Destinasi::find($id);
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'destinasi' => $destinasi,
        ];
        
        return view('admin.destinasi.detail', $data);
    }
    
    public function update(Request $request)
    {
        $rules = [
            'id' => ['required', 'integer'],
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back()->withInput(['id','nama', 'alamat','deskripsi']);
        }

        $validatedData = $validator->validated();
        // dd($validatedData);

        try {
            $destinasi = Destinasi::find($validatedData['id']);
            $isUpdated = $destinasi->update($validatedData);
            \toastr()->success('New destination is updated');
            return redirect()->to('/admin/trip/destinasi');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
        }

        return redirect()->to('/admin/trip/destinasi');
    }

    public function destroy($id)
    {
        try {
            $isDeleted = Destinasi::find($id)->delete();
            \toastr()->success('Destination is deleted');
            return redirect()->to('/admin/trip/destinasi');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
        }

        return redirect()->to('/admin/trip/destinasi');
    }
}
