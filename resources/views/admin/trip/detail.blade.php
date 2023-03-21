@extends('admin.layouts.base')

@section('title')
    Detail Trip - JG
@endsection

@section('page-header')
<div class="mb-1">
    <ol class="breadcrumb" aria-label="breadcrumbs">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/trip">Trip</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/trip/{{$paket->id}}">Detail</a></li>
    </ol>
</div>
<h2 class="page-title">{{ $paket->judul }}</h2>
@endsection

@section('content')
    <div class="row row-deck row-cards mb-2">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <img src="{{asset('storage/trip/img/'.$paket->thumbnail)}}" alt="thumbnail" class="img-fluid">
                        </div>
                        <div class="col">
                            <div class="datagrid" style="font-size:18px;">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Judul</div>
                                    <div class="datagrid-content"><h1>{{ $paket->judul }}</h1></div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Deskripsi</div>
                                    <div class="datagrid-content">{{ $paket->deskripsi }}</div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h3>Destinasi Wisata</h3>
                                <ol>
                                    @foreach ($paket->destinasi as $d_item)
                                        <li>{{ $d_item->nama }}</li>
                                    @endforeach
                                </ol>
                            </div>
                            <hr>
                            <div>
                                <h3>Fasilitas</h3>
                                <ul>
                                    @foreach ($paket->fasilitas as $f_item)
                                        <li>{{ $f_item->nama }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            <div class="datagrid" style="font-size:18px;">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Penjemputan</div>
                                    <div class="datagrid-content">{{ $paket->penjemputan }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Durasi</div>
                                    <div class="datagrid-content">{{ $paket->durasi }}</div>
                                </div>
                                
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Harga</div>
                                    <div class="datagrid-content">{{ $paket->harga }}</div>
                                </div>
                                
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Minimal Pax</div>
                                    <div class="datagrid-content">{{ $paket->minimal_pax }} orang</div>
                                </div>
                                
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Rencana Perjalanan</div>
                                    <div class="datagrid-content"><a href="{{ $paket->rencana_perjalanan }}" target="_blank" rel="noopener noreferrer">Open</a></div>
                                </div>
                            </div>
                            <hr>
                            <div class="mt-2 row w-50">
                                <a href="/admin/trip/{{$paket->id}}/edit" class="btn btn-outline-warning">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection