<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('blog.home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::all();
        $data = [
            'categories' => $categories,
        ];

        return view('admin.blog.post.create', $data);
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
            'title' => ['required', 'string'],
            'date' => ['required', 'date'],
            'category_id' => ['required', 'integer'],
            'draft' => ['required', 'string'],
            'content_html' => ['required', 'string'],
            'content_delta' => ['required', 'json'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back();
        }

        $validatedData = $validator->validated();
        // dd($validatedData);

        //SET DRAFT value (default: true)
        $validatedData['draft'] = true;

        if($validatedData['draft'] == 'false') {
            $validatedData['draft'] = false;
        }

        $slug = Str::slug($validatedData['title']);
        $validatedData['slug'] = $slug;

        // dd($validatedData);

        try {
            $isCreated = BlogPost::create($validatedData);
            \toastr()->success('New Post is created');
            return redirect()->to('/admin/blog');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
        }

        return redirect()->to('/admin/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show($params)
    {  
        $post = BlogPost::where('id', $params)->orWhere('slug', $params)->firstOrFail();
        $data = [
            'post' => $post,
        ];

        return view('admin.blog.post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BlogPost::find($id);
        $categories = BlogCategory::all();
        $data = [
            'post' => $post,
            'categories' => $categories,
        ];

        return view('admin.blog.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = BlogPost::find($id);

        $rules = [
            'title' => ['sometimes', 'string'],
            'date' => ['sometimes', 'date'],
            'category_id' => ['sometimes', 'integer'],
            'draft' => ['sometimes', 'string'],
            'content_html' => ['sometimes', 'string'],
            'content_delta' => ['sometimes', 'json'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            // dd($validator->errors());
            foreach( $validator->errors()->all() as $message) {
                \toastr()->error($message);
            }
            return back();
        }

        $validatedData = $validator->validated();
        // dd($validatedData);

        if($validatedData['draft'] == "false") {
            $validatedData['draft'] = false;
        } else {
            $validatedData['draft'] = true;
        }

        $slug = Str::slug($validatedData['title']);
        $validatedData['slug'] = $slug;

        // dd($validatedData);

        try {
            $isUpdated = $post->update($validatedData);
            \toastr()->success('New Post is updated');
            return redirect()->to('/admin/blog');
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
        }

        return redirect()->to('/admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = BlogPost::find($id);
            $p = $post->delete();
        //    $p =  $blogPost->delete();
        } catch (QueryException $e) {
            \toastr()->error($e->getMessage());
            return back();
        }
    
        \toastr()->success('Post telah dihapus!');
        return redirect()->to('/admin/blog');
    }
}
