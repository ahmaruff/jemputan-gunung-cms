<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BlogCategory;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = BlogCategory::all();
        $posts = BlogPost::all();

        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'categories' => $categories,
            'posts' => $posts,
        ];

        return view('admin.blog.index', $data);
    }
}
