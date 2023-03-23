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
                <h1 class="display-4 text-center mt-4 mb-2">Paket Trip Jemputan Gunung</h1>
                <div class="container">
                    @livewire('home-trip')
                </div>
            </div>
        </div>
    </div>
@endsection
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
