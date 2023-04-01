@extends('admin.layouts.base')

@section('head')
    <style>
        .pagination li a {
            text-decoration: none;
            font-size: 1rem;
        }
    </style>
@endsection

@section('title')
    Blog Management - JG
@endsection

@section('page-header')
<div class="mb-1">
    <ol class="breadcrumb" aria-label="breadcrumbs">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/blog">Blog</a></li>
    </ol>
</div>
<h2 class="page-title">Blog</h2>
@endsection

@section('content')
<div class="row row-deck row-cards my-2">
    <div class="col">
        <div class="card" id="category-list">
            <div class="card-header d-flex">
                <h1 class="card-title">Blog Category</h1>
                <div class="ms-auto d-flex gap-2">
                    <input type="text" class="form-control fuzzy-search" placeholder="Search data">
                    <a href="/admin/blog/category/create" class="btn btn-primary">
                        <i class="bi bi-plus me-1"></i>
                        Tambah Kategori
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="id">{{ $category->id }}</td>
                                    <td class="category">{{ $category->category }}</td>
                                    <td>
                                        <div class="btn-list">
                                            <a href="{{route('category.edit', $category->id)}}" class="btn btn-warning btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i class="bi bi-pen-fill"></i>
                                            </a>
                                            <form action="{{route('category.destroy', $category->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="hr-text hr-text-left">
                        <span>Page</span>
                        <ul class="pagination m-0 p-0 d-flex gap-2 justify-content-center"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- 
<div class="row row-deck row-cards my-2">
    <div class="col">
        <div class="card" id="post-list">
            <div class="card-header d-flex">
                <h1 class="card-title">Blog Post</h1>
                <div class="ms-auto d-flex gap-2">
                    <input type="text" class="form-control fuzzy-search" placeholder="Search data">
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="bi bi-sort-down me-1"></i>
                            Sort by
                        </button>
                        <div class="dropdown-menu">
                            <button class="sort dropdown-item" data-sort="tanggal">Tanggal</button>
                            <button class="sort dropdown-item" data-sort="category">Kategori</button>
                            <button class="sort dropdown-item" data-sort="judul">Judul</button>
                        </div>
                    </div>
                    <a href="/admin/blog/post/create" class="btn btn-primary">
                        <i class="bi bi-plus me-1"></i>
                        Tambah Post
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="id">{{ $post->id }}</td>
                                    <td class="tanggal">{{ $post->tanggal }}</td>
                                    <td class="category">{{ $post->category }}</td>
                                    <td class="judul">{{ $post->judul }}</td>
                                    <td>
                                        <div class="btn-list">
                                            <a href="{{route('post.show', $post->id)}}" class="btn btn-primary btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="{{route('post.edit', $post->id)}}" class="btn btn-warning btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i class="bi bi-pen-fill"></i>
                                            </a>
                                            <form action="{{route('post.destroy', $post->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="hr-text hr-text-left">
                        <span>Page</span>
                        <ul class="pagination m-0 p-0 d-flex gap-2 justify-content-center"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<script src="/assets/libs/listjs-2.3.1/list.min.js"></script>
<script>
    var categoryOptions = {
        valueNames: ['id','category'],
        page: 5,
        pagination: true,
    }

    var postOptions = {
        valueNames: ['id','category', 'judul'],
        page: 10,
        pagination: true,
    }

    var categoryList = new List('category-list', categoryOptions);  
    var postList = new List('post-list', postOptions);  
</script>
@endsection