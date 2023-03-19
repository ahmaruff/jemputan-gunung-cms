<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use App\Models\Fasilitas;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TripController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $paket = Paket::all();
        $fasilitas = Fasilitas::all();
        $destinasi = Destinasi::all();

        $jml_paket = $paket->count();
        $jml_destinasi = $destinasi->count();
        $jml_fasilitas = $fasilitas->count();


        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'paket' => $paket,
            'destinasi' => $destinasi,
            'fasilitas' => $fasilitas,
            'jml_paket' => $jml_paket,
            'jml_destinasi' => $jml_destinasi,
            'jml_fasilitas' => $jml_fasilitas,
        ];

        return view('admin.trip.index', $data);
    }

    public function create()
    {
        $user = Auth::user();
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
        ];

        return view('admin.trip.add', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'judul' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'penjemputan' => ['required', 'string'],
            'durasi' => ['required', 'string'],
            'minimal_pax' => ['required', 'integer'],
            'harga' => ['required', 'integer'],
            'rencana_perjalanan' => ['required', 'string'],
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back()->withInput($request->all());
        }

        
        $validatedData = $validator->validated();

        // FALIDATING FILE UPLOAD
        $file_rules = [
            'thumbnail' => ['required', File::image()->max(2048)],
        ];
        
        $this->validate($request,$file_rules);
        
        $file = $request->file('thumbnail');

        if(!$file->isValid()){
            \toastr()->error($file->getErrorMessage());
            return back()->withInput($request->all());
        }
        // dd(Storage::disk('public'));

        try {
            $paket = new Paket();
            $paket->fill($validatedData);
            $paket->save();
             
            // moving files
            $file_ext = ($file->guessExtension() ?: $file->guessClientExtension());
            $thumbnail_name= $paket->id.'_thumbnail.'.$file_ext;

            $file->storeAs('public/trip/img',$thumbnail_name);

            // dd($thumbnail_name);
            $paket->thumbnail = $thumbnail_name;
            $paket->save();

            \toastr()->success('Trip berhasil ditambahkan!');
            return redirect()->to('/admin/trip');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
            return back();
        }
    }

    public function show($id)
    {
        $user = Auth::user();
        $paket = Paket::find($id);
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'paket' => $paket,
        ];

        return view('admin.trip.detail', $data);
    }

    public function update(Request $request)
    {
        # code...
    }

    public function destroy($id)
    {
        try {
            $isDeleted = Paket::find($id)->delete();
            \toastr()->success('Paket is deleted');
            return redirect()->to('/admin/trip');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
        }

        return redirect()->to('/admin/trip');
    }
}
