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
    Create Fasilitas Trip - JG
@endsection

@section('page-header')
<div class="mb-1">
    <ol class="breadcrumb" aria-label="breadcrumbs">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/trip">Trip</a></li>
        <li class="breadcrumb-item"><a href="/admin/trip/fasilitas">Fasilitas</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/trip/fasilitas/{{$fasilitas->id}}">Detail</a></li>
    </ol>
</div>
<h2 class="page-title">Fasilitas</h2>
@endsection

@section('content')
<div class="row row-deck row-cards">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Detail Fasilitas</h1>
                <div>
                    <form action="" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{$fasilitas->id}}">
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label" for="nama">Detail Fasilitas</label>
                            <div class="col">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Fasilitas" value="{{$fasilitas->nama}}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label" for="keterangan">Keterangan</label>
                            <div class="col">
                                <textarea name="keterangan" class="form-control" cols="30" rows="5" required>{{$fasilitas->keterangan}}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
