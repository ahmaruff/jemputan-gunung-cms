@extends('admin.layouts.base')

@section('title')
    Tambah Trip - JG
@endsection

@section('page-header')
<div class="mb-1">
    <ol class="breadcrumb" aria-label="breadcrumbs">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/trip">Trip</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/trip/create">Tambah Trip</a></li>
    </ol>
</div>
<h2 class="page-title">Tambah Trip</h2>
@endsection

@section('content')
<div class="row row-deck row-cards">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div>
                    <h1 class="card-title">Tambah Trip</h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label" for="judul">Judul</label>
                            <div class="col">
                                <input type="text" class="form-control" name="judul" placeholder="Judul Trip" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label" for="deskripsi">Deskripsi</label>
                            <div class="col">
                                <textarea name="deskripsi" class="form-control" rows="6" required placeholder="deskripsi trip"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12 col-md-6">
                                <div class="row align-items-center">
                                    <label class="col-sm-12 col-md-4 form-label" for="penjemputan">Penjemputan</label>
                                    <div class="col">
                                        <select class="form-select" aria-label="Pilih area penjemputan" name="penjemputan" required>
                                            <option selected="">Open this select menu</option>
                                            <option value="Jabodetabek">Jabodetabek</option>
                                            <option value="Bandung">Bandung</option>
                                            <option value="Tasikmalaya">Tasikmalaya</option>
                                            <option value="Lombok">Lombok</option>
                                            <option value="Jambi">Jambi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="row align-items-center">
                                    <label class="col-sm-12 col-md-3 form-label" for="durasi">Durasi</label>
                                    <div class="col">
                                        <select class="form-select" aria-label="Pilih durasi" name="durasi" required>
                                            <option selected="">Open this select menu</option>
                                            <option value="1 Hari">1 Hari</option>
                                            <option value="2 Hari 1 Malam">2 Hari 1 Malam</option>
                                            <option value="3 Hari 2 Malam">3 Hari 2 Malam</option>
                                            <option value="4 Hari 3 Malam">4 Hari 3 Malam</option>
                                            <option value="5 Hari 4 Malam">5 Hari 4 Malam</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12 col-md-6">
                                <div class="row align-items-center">
                                    <label class="col-sm-12 col-md-4 form-label" for="minimal_pax">Minimal Pax</label>
                                    <div class="col">
                                        <select class="form-select" aria-label="Minimal Pax" name="minimal_pax">
                                            <option selected="">Open this select menu</option>
                                            <option value="1">1 Orang</option>
                                            <option value="2">2 Orang</option>
                                            <option value="3">3 Orang</option>
                                            <option value="4">4 Orang</option>
                                            <option value="5">5 Orang</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="row align-items-center">
                                    <label class="col-sm-12 col-md-3 form-label" for="harga">Harga</label>
                                    <div class="col">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                              Rp.
                                            </span>
                                            <input type="text" class="form-control" placeholder="Harga satuan" name="harga" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12 col-md-6">
                                <div class="row align-items-center">
                                    <label class="col-sm-12 col-md-4 form-label" for="thumbnail">Thumbnail Image</label>
                                    <div class="col">
                                        <input type="file" class="form-control" name="thumbnail" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="row align-items-center">
                                    <label class="col-sm-12 col-md-3 form-label" for="rencana_perjalanan">Rencana Perjalanan</label>
                                    <div class="col">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                              Https://
                                            </span>
                                            <input type="text" class="form-control" placeholder="URL data rencana perjalanan" name="rencana_perjalanan" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Trip</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection