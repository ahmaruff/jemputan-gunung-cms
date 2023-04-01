<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;


class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
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

        return view('admin.blog.add-category', $data);
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
            'category' => ['required', 'string'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back()->withInput(['category']);
        }

        $validatedData = $validator->validated();
        // dd($validatedData);

        try {
            $isCreated = BlogCategory::create($validatedData);
            \toastr()->success('New Category is created');
            return redirect()->to('/admin/blog');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
        }

        return redirect()->to('/admin/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategory $category)
    {
        $user = Auth::user();

        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'category' => $category,
        ];

        return view('admin.blog.detail-category', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogCategory $category)
    {
        $rules = [
            'category' => ['required', 'string'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back()->withInput(['category']);
        }

        $validatedData = $validator->validated();
        // dd($validatedData);

        try {
            $isUpdated = $category->update($validatedData);
            \toastr()->success('Category is updated');
            return redirect()->to('/admin/blog');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
        }

        return redirect()->to('/admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $category)
    {
        try {
            $category->delete();
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
            return back();
        }
  
        \toastr()->success('Category telah dihapus!');
        return redirect()->to('/admin/blog');
    }
}
