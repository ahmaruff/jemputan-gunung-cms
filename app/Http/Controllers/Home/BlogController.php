<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BlogCategory::all();

        $posts = BlogPost::where('draft', false)->get();

        $data = [
            'categories' => $categories,
            'posts' => $posts,
        ];
        

        return view('home.blog.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category, $id, $slug)
    {
        // $post = BlogPost::find($id);
        $post = BlogPost::where([
            ['id', $id],
            ['slug', $slug],
        ])->whereHas('category', function(Builder $query) use ($category){
            $query->where('slug', $category);
        })->firstOrFail();

        $data = [
            'post' => $post,
            'obf' => Str::mask($post->id,'p',0),
        ];

        return view('home.blog.show', $data);
    }

    public function category(String $category)
    {
        $posts = BlogPost::whereHas('category', function(Builder $query) use ($category){
            $query->where('slug', $category);
        })->get();

        $data = [
            'posts' => $posts,
        ];

        return view('home.blog.category', $data);
    }
}
