@extends('home.layouts.base')

{{-- @section('head')
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection --}}

@section('title')
    <title>{{ $post->title }}</title>
@endsection

@section('header')
    @include('home.layouts.header')
@endsection

@section('content')
    <div class="container">
        <div class="my-5 row justify-content-center">
            <div class="col-sm-12 col-md-10">
                <div class="ql-container">
                    <div class="ql-editor">
                        <div class="text-center">
                            <h1 class="fw-bold">{{ $post->title }}</h1>
                            <div class="d-flex justify-content-center gap-4 m-0">
                                <a href="{{route('blog.category', $post->category->slug)}}" class="text-decoration-none">{{ $post->category->category }}</a>
                                <p class="text-muted">{{ $post->date }}</p>
                                <a href="{{url()->previous()}}" class="ms-auto text-decoration-none">Back</a>
                            </div>
                            <hr class="mt-0">
                        </div>
                        {!! $post->content_html !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection