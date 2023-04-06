@extends('home.layouts.base')

@section('head')
    @livewireStyles
@endsection

@section('header')
    @include('home.layouts.header')
@endsection

@section('content')
    <div class="container">
        <div class="my-5 row">
            <div class="col">
                <h1 class="display-4 text-center my-4">Jemputan Gunung Blog</h1>
                <hr>
                <div class="container-fuild text-center">
                    <h4>Category</h4>
                    <div class="d-flex mt-1 mb-3 gap-2 align-items-center justify-content-center">
                        @foreach ($categories as $category)
                            <a href="{{route('blog.category', $category->slug)}}" class="btn btn-outline-primary btn-sm">{{ $category->category }}</a>
                        @endforeach
                    </div>
                </div>
                @livewire('home-blog')
                <hr>
            </div>
        </div>
    </div>
    @livewireScripts
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
@endsection