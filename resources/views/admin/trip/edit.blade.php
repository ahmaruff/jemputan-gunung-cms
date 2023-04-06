@extends('admin.layouts.base')

@section('title')
    Edit Trip - JG
@endsection

@section('page-header')
<div class="mb-1">
    <ol class="breadcrumb" aria-label="breadcrumbs">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/trip">Trip</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/trip/{{$paket->id}}/edit">Edit Trip</a></li>
    </ol>
</div>
<h2 class="page-title">Edit Trip</h2>
@endsection

@section('content')
<div class="row row-deck row-cards">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div>
                    <h1 class="card-title">Edit Trip</h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{$paket->id}}">
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label" for="judul">Judul</label>
                            <div class="col">
                                <input type="text" class="form-control" name="judul" placeholder="Judul Trip" value="{{old('judul', $paket->judul)}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label" for="deskripsi">Deskripsi</label>
                            <div class="col">
                                <textarea name="deskripsi" class="form-control" rows="6" placeholder="deskripsi trip">{{old('deskripsi', $paket->deskripsi)}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12 col-md-6">
                                <div class="row align-items-center">
                                    <label class="col-sm-12 col-md-4 form-label" for="penjemputan">Penjemputan</label>
                                    <div class="col">
                                        <select class="form-select" aria-label="Pilih area penjemputan" name="penjemputan">
                                            <option selected="" value="{{old('penjemputan', $paket->penjemputan)}}">{{old('penjemputan', $paket->penjemputan)}}</option>
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
                                        <select class="form-select" aria-label="Pilih durasi" name="durasi">
                                            <option selected="" value="{{old('durasi', $paket->durasi)}}">{{old('durasi', $paket->durasi)}}</option>
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
                                            <option selected="" value="{{old('minimal_pax', $paket->minimal_pax)}}">{{old('minimal_pax', $paket->minimal_pax)}} orang</option>
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
                                            <input type="text" class="form-control" placeholder="Harga satuan" name="harga" autocomplete="off" value="{{old('harga', $paket->harga)}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12 col-md-6">
                                <div class="row">
                                    <label for="fasilitas" class="col-sm-12 col-md-4">Fasilitas</label>
                                    <div class="col">
                                        @foreach ($paket->fasilitas as $fas )
                                        <label class="form-check">
                                            <input type="checkbox" class="form-check-input" name="fasilitas[]" value="{{$fas->id}}" checked disabled>
                                            <span class="form-check-label">{{ $fas->nama }}</span>
                                        </label>
                                        @endforeach
                                        @foreach ($list_fasilitas as $f )
                                        <label class="form-check">
                                            <input type="checkbox" class="form-check-input" name="" value="{{$f->id}}">
                                            <span class="form-check-label">{{ $f->nama }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="row">
                                    <label for="destinasi" class="col-sm-12 col-md-3">Destinasi</label>
                                    <div class="col">
                                        @foreach ($paket->destinasi as $des )
                                        <label class="form-check">
                                            <input type="checkbox" class="form-check-input" name="" value="{{$des->id}}" checked disabled>
                                            <span class="form-check-label">{{ $des->nama }}</span>
                                        </label>
                                        @endforeach
                                        @foreach ($list_destinasi as $d )
                                        <label class="form-check">
                                            <input type="checkbox" class="form-check-input" name="destinasi[]" value="{{$d->id}}">
                                            <span class="form-check-label">{{ $d->nama }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12 col-md-6">
                                <div class="row align-items-center">
                                    <label class="col-sm-12 col-md-4 form-label" for="thumbnail">Thumbnail Image</label>
                                    <div class="col">
                                        <input type="file" class="form-control" name="thumbnail">
                                        <div class="feedback text-sm mt-1 text-muted">*maksimal ukuran file 2MB</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="row align-items-center">
                                    <label class="col-sm-12 col-md-3 form-label" for="rencana_perjalanan">Rencana Perjalanan</label>
                                    <div class="col">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                              https://
                                            </span>
                                            <input type="text" class="form-control" placeholder="URL data rencana perjalanan" name="rencana_perjalanan" autocomplete="off" value="{{$paket->rencana_perjalanan}}">
                                        </div>
                                        <div class="feedback text-sm mt-1 text-muted">*link  dokumen rencana perjalanan (google drive)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Trip</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection