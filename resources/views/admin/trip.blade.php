@extends('admin.layouts.base')

@section('head')
    <style>
        .pagination li a {
            text-decoration: none;
            font-size: 1rem;
        }
    </style>
@endsection

@section('page-header')
<div class="mb-1">
    <ol class="breadcrumb" aria-label="breadcrumbs">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/trip">Trip</a></li>
    </ol>
</div>
<h2 class="page-title">Trip</h2>
@endsection

@section('content')
<div class="row row-deck row-cards">
    <div class="col-sm-6 col-lg-4">
        <div class="card">
            <div class="card-status-top bg-primary"></div>
            <div class="card-body text-center">
                <h3 class="text-muted">Jumlah paket Trip</h3>
                <h1 class="display-2">{{ $jml_paket }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card">
            <div class="card-status-top bg-success"></div>
            <div class="card-body text-center">
                <h3 class="text-muted">Jumlah Destinasi</h3>
                <h1 class="display-2">{{ $jml_destinasi }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-status-top bg-info"></div>
            <div class="card-body text-center">
                <h3 class="text-muted">Fasilitas</h3>
                <h1 class="display-2">{{ $jml_fasilitas }}</h1>
            </div>
        </div>
    </div>
</div>

<div class="row row-deck row-cards my-2">
    <div class="col">
        <div class="card" id="trip-list">
            <div class="card-header d-flex">
                <h1 class="card-title">Data Paket Trip</h1>
                <div class="ms-auto d-flex gap-2">
                    <input type="text" class="form-control fuzzy-search" placeholder="Search data">
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="bi bi-sort-down me-1"></i>
                            Sort by
                        </button>
                        <div class="dropdown-menu">
                            <button class="sort dropdown-item" data-sort="id">ID</button>
                            <button class="sort dropdown-item" data-sort="judul">Judul</button>
                            <button class="sort dropdown-item" data-sort="penjemputan">Penjemputan</button>
                            <button class="sort dropdown-item" data-sort="durasi">Durasi</button>
                            <button class="sort dropdown-item" data-sort="harga">Harga</button>
                            <button class="sort dropdown-item" data-sort="minimal">Minimal</button>
                        </div>
                    </div>
                    <a href="/admin/trip/create" class="btn btn-primary">
                        <i class="bi bi-plus me-1"></i>
                        Tambah Trip
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Penjemputan</th>
                                <th>Durasi</th>
                                <th>Destinasi</th>
                                <th>Rencana Perjalanan</th>
                                <th>Harga/pax</th>
                                <th>Minimal Pax</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($paket as $item)
                                <tr>
                                    <td class="id">{{ $item->id }}</td>
                                    <td class="judul">{{ $item->judul }}</td>
                                    <td class="penjemputan">{{ $item->penjemputan }}</td>
                                    <td class="durasi">{{ $item->durasi }}</td>
                                    <td class="destinasi">
                                        <ul class="m-0">
                                            @foreach ($item->destinasi as $destinasi)
                                            <li class="m-0">{{ $destinasi->nama }}</li>                                            
                                        @endforeach
                                        </ul>   
                                    </td>
                                    <td>
                                        <a href="{{$item->rencana_perjalanan}}">Unduh</a>
                                    </td>
                                    <td class="harga">{{ $item->harga }}</td>
                                    <td class="minimal">{{ $item->minimal_pax }}</td>
                                    <td>
                                        <div class="btn-list">
                                            <a href="/admin/trip/{{$item->id}}" class="btn btn-primary btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="/admin/trip/{{$item->id}}/edit" class="btn btn-warning btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i class="bi bi-pen-fill"></i>
                                            </a>
                                            <a href="/admin/trip/{{$item->id}}/delete" class="btn btn-danger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
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
<script src="/assets/libs/listjs-2.3.1/list.min.js"></script>
<script>
    var options = {
        valueNames: ['id','judul', 'penjemputan', 'durasi', 'harga', 'minimal'],
        page: 30,
        pagination: true,
    }

    var tripList = new List('trip-list', options);
</script>
@endsection