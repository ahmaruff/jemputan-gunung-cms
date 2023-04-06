<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $faq = Faq::orderBy('tanggal', 'DESC')->get();

        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'faq' => $faq,
        ];

        return view('admin.faq.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        
        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
        ];

        return view('admin.faq.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'tanggal' => ['required', 'date'],
            'pertanyaan' => ['required', 'string'],
            'jawaban' => ['required', 'string'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back()->withInput($request->all());
        }

        $validatedData = $validator->validated();
        // dd($validatedData);

        try {
            $isCreated = Faq::create($validatedData);
            \toastr()->success('New FAQ is created');
            return redirect()->to('/admin/faq');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
        }

        return redirect()->to('/admin/faq');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $user = Auth::user();

        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'faq' => $faq,
        ];

        return view('admin.faq.detail', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $rules = [
            'tanggal' => ['sometimes', 'date'],
            'pertanyaan' => ['sometimes', 'string'],
            'jawaban' => ['sometimes', 'string'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back()->withInput($request->all());
        }

        $validatedData = $validator->validated();
        // dd($validatedData);

        try {
            $isCreated = $faq->update($validatedData);
            \toastr()->success('FAQ is updated');
            return redirect()->to('/admin/faq');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
        }

        return redirect()->to('/admin/faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        try {
            $faq->delete();
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
            return back();
        }
  
        \toastr()->success('FAQ telah dihapus!');
        return redirect()->to('/admin/faq');
    }
}
