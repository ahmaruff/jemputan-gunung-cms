@extends('admin.layouts.base')

@section('title')
    Edit Category - JG
@endsection

@section('page-header')
<div class="mb-1">
    <ol class="breadcrumb" aria-label="breadcrumbs">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/blog">Blog</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('category.edit', $category->id)}}">Edit Category</a></li>
    </ol>
</div>
<h2 class="page-title">Category</h2>
@endsection

@section('content')
<div class="row row-deck row-cards">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Edit Kategori</h1>
                <div>
                    <form action="{{route('category.update', $category->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label" for="category">Kategori</label>
                            <div class="col">
                                <input type="text" class="form-control" name="category" placeholder="category" value="{{$category->category}}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection