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
    Fasilitas Trip - JG
@endsection

@section('page-header')
<div class="mb-1">
    <ol class="breadcrumb" aria-label="breadcrumbs">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/trip">Trip</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/trip/fasilitas">Fasilitas</a></li>
    </ol>
</div>
<h2 class="page-title">Fasilitas</h2>
@endsection

{{-- di load disini karean section dibawah butuh inisiasi list.js terlebih dahulu SEE @INCLUDE --}}
<script src="/assets/libs/listjs-2.3.1/list.min.js"></script>

@section('content')
<div class="row row-deck row-cards">
    <div class="col">
        @include('admin.partials.fasilitas')
    </div>
</div>
@endsection
