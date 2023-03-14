<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fasilitas;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

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

    public function create()
    {
        $user = Auth::user();
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
        ];
        
        return view('admin.fasilitas.add', $data);
    }
    
    public function store(Request $request)
    {
        $rules = [
            'nama' => ['required', 'string'],
            'keterangan' => ['required', 'string'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back()->withInput(['nama', 'keterangan']);
        }

        $validatedData = $validator->validated();
        // dd($validatedData);

        try {
            $isCreated = Fasilitas::create($validatedData);
            \toastr()->success('New fasilitas is created');
            return redirect()->to('/admin/trip/fasilitas');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
        }

        return redirect()->to('/admin/trip/fasilitas');
    }

    public function show($id)
    {
        $user = Auth::user();
        $fasilitas = Fasilitas::find($id);
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'fasilitas' => $fasilitas,
        ];
        
        return view('admin.fasilitas.detail', $data);
    }
    
    public function update(Request $request)
    {
        $rules = [
            'id' => ['required', 'integer'],
            'nama' => ['required', 'string'],
            'keterangan' => ['required', 'string'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back()->withInput(['nama', 'keterangan']);
        }

        $validatedData = $validator->validated();
        // dd($validatedData);

        try {
            $fasilitas = Fasilitas::find($validatedData['id']);
            $isUpdated = $fasilitas->update($validatedData);
            \toastr()->success('New fasilitas is created');
            return redirect()->to('/admin/trip/fasilitas');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
        }

        return redirect()->to('/admin/trip/fasilitas');
    }

    public function destroy($id)
    {
        try {
            $isDeleted = Fasilitas::find($id)->delete();
            \toastr()->success('Fasilitas is deleted');
            return redirect()->to('/admin/trip/fasilitas');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
        }

        return redirect()->to('/admin/trip/fasilitas');
    }
}
