<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = BlogCategory::all();

        $data = [
            'nama' => $user->nama,
            'email' => $user->email,
            'categories' => $categories,
        ];

        return view('admin.blog.index', $data);
    }
}
