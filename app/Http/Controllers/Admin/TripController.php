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

        $fasilitas = Fasilitas::all();
        $destinasi = Destinasi::all();
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'list_fasilitas'=> $fasilitas,
            'list_destinasi' => $destinasi,
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
            'rencana_perjalanan' => ['required', 'url'],
        ];

        $link = parse_url($request->input('rencana_perjalanan'),PHP_URL_SCHEME) ? $request->input('rencana_perjalanan') : 'http://'.$request->input('rencana_perjalanan');

        $request->merge(['rencana_perjalanan' => $link]);

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back()->withInput($request->all());
        }

        
        $validatedData = $validator->validated();

        // dd($validatedData);
      
        $file_rules = [
            'thumbnail' => ['sometimes', File::image()->max(2048)],
        ];
        
        $this->validate($request,$file_rules);
        
        $file = $request->file('thumbnail');

        if($file && !$file->isValid()){
            \toastr()->error($file->getErrorMessage() ?: 'File Error!');
            return back()->withInput($request->all());
        }

        // FASILITAS 
        $fasilitas = $request->post('fasilitas');
        
        // DESTINASI
        $destinasi = $request->post('destinasi');

        // dd($fasilitas, $destinasi);

        try {
            $paket = new Paket();
            $paket->fill($validatedData);
            $paket->save();
             
            // Saving files
            $file_ext = ($file->guessExtension() ?: $file->guessClientExtension());
            $thumbnail_name= $paket->id.'_thumbnail.'.$file_ext;

            $file->storeAs('public/trip/img',$thumbnail_name);
            //storage/ap/public/trip/img/

            $paket->thumbnail = $thumbnail_name;
            $paket->save();

            // FASILITAS
            foreach($fasilitas as $fas_id){
                DB::table('fasilitas_paket')->insert([
                    'fasilitas_id' => $fas_id,
                    'paket_id' => $paket->id,
                ]);
            }

            // Destinasi
            foreach($destinasi as $des_id){
                DB::table('destinasi_paket')->insert([
                    'destinasi_id' => $des_id,
                    'paket_id' => $paket->id,
                ]);
            }

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

    public function edit($id)
    {
        $user = Auth::user();

        $paket = Paket::find($id);
        $fasilitas = Fasilitas::all();
        $destinasi = Destinasi::all();
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'paket' => $paket,
            'list_fasilitas' => $fasilitas,
            'list_destinasi' => $destinasi,
        ];

        return view('admin.trip.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $rules = [
            'id'    => ['required'],
            'judul' => ['sometimes', 'string'],
            'deskripsi' => ['sometimes', 'string'],
            'penjemputan' => ['sometimes', 'string'],
            'durasi' => ['sometimes', 'string'],
            'minimal_pax' => ['sometimes', 'integer'],
            'harga' => ['sometimes', 'integer'],
            'rencana_perjalanan' => ['sometimes', 'string'],
        ];

        $link = parse_url($request->input('rencana_perjalanan'),PHP_URL_SCHEME) ? $request->input('rencana_perjalanan') : 'http://'.$request->input('rencana_perjalanan');

        $request->merge(['rencana_perjalanan' => $link]);


        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back()->withInput($request->all());
        }

        
        $validatedData = $validator->validated();

        // VALIDATING FILE UPLOAD
        $file_rules = [
            'thumbnail' => ['sometimes', File::image()->max(2048)],
        ];
        
        $this->validate($request,$file_rules);
        
        $file = $request->file('thumbnail');

        if($file && !$file->isValid()){
            \toastr()->error($file->getErrorMessage() ?: 'File Error!' );
            return back()->withInput($request->all());
        }

        // FASILITAS 
        $fasilitas = $request->post('fasilitas');
        
        // DESTINASI
        $destinasi = $request->post('destinasi');

        try {
            $paket = Paket::where(['id' => $validatedData['id']])->update($validatedData);
       
            // Saving files
            if($file) {
                $file_ext = ($file->guessExtension() ?: $file->guessClientExtension());
                $thumbnail_name= $paket->id.'_thumbnail.'.$file_ext;

                $file->storeAs('public/trip/img',$thumbnail_name);
                //storage/app/public/trip/img/

                $paket = Paket::where(['id' => $validatedData['id']])->update(['thumbnail' => $thumbnail_name]);
            }

            // FASILITAS
            if(isset($fasilitas)){
                foreach($fasilitas as $fas_id){
                    if(!DB::table('fasilitas_paket')->where('paket_id','=', $validatedData['id'])->where('fasilitas_id' , '=', $fas_id)->get()) {
                        DB::table('fasilititas_paket')->insert([
                            'fasilititas_id' => $fas_id,
                            'paket_id' => $validatedData['id'],
                        ]);
                    }
                    
                }
            }

            // Destinasi
            if(isset($destinasi)){
                foreach($destinasi as $des_id){
                    if(!DB::table('destinasi_paket')->where('paket_id','=', $validatedData['id'])->where('destinasi_id' , '=', $des_id)->get()) {
                        DB::table('fasilititas_paket')->insert([
                            'fasilititas_id' => $des_id,
                            'paket_id' => $validatedData['id'],
                        ]);
                    }
                }
            }

            \toastr()->success('Trip berhasil diubah!');
            return redirect()->to('/admin/trip/'.$id);
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
            return back();
        }
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
