@extends('admin.layouts.base')

@section('page-header')
<div class="mb-1">
    <ol class="breadcrumb" aria-label="breadcrumbs">
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin">Home</a></li>
    </ol>
</div>

<h2 class="page-title">Dashboard</h2>
@endsection

@section('content')
<div class="row row-deck row-cards">
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <p class="text-muted m-0">Jumlah paket trip</p>
                <h2 class="display-2">{{ $jml_paket }}</h2>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <p class="text-muted m-0">Jumlah Blog</p>
                <h2 class="display-2">7</h2>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <p class="text-muted m-0">FAQ</p>
                <h2 class="display-2">7</h2>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <p class="text-muted m-0">Admin</p>
                <h2 class="display-2">{{ $jml_admin}}</h2>
            </div>
        </div>
    </div>
</div>
@endsection