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
                                <input type="text" class="form-control" name="judul" value="{{old('judul')}}" placeholder="Judul Trip" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label" for="deskripsi">Deskripsi</label>
                            <div class="col">
                                <textarea name="deskripsi" class="form-control" rows="6" required placeholder="deskripsi trip">{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12 col-md-6">
                                <div class="row align-items-center">
                                    <label class="col-sm-12 col-md-4 form-label" for="penjemputan">Penjemputan</label>
                                    <div class="col">
                                        <select class="form-select" aria-label="Pilih area penjemputan" name="penjemputan" required>
                                            <option selected="">Open this select menu</option>
                                            <option value="Jabodetabek" {{ (old('penjemputan') == 'Jabodetabek') ? 'selected' : ''}}>Jabodetabek</option>
                                            <option value="Bandung" {{ (old('penjemputan') == 'Bandung') ? 'selected' : ''}}>Bandung</option>
                                            <option value="Tasikmalaya" {{ (old('penjemputan') == 'Tasikmalaya') ? 'selected' : ''}}>Tasikmalaya</option>
                                            <option value="Lombok" {{ (old('penjemputan') == 'Lombok') ? 'selected' : ''}}>Lombok</option>
                                            <option value="Jambi" {{ (old('penjemputan') == 'Jambi') ? 'selected' : ''}}>Jambi</option>
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
                                            <option value="1 Hari" {{ (old('durasi') == '1 Hari') ? 'selected' : ''}}>1 Hari</option>
                                            <option value="2 Hari 1 Malam" {{ (old('durasi') == '2 Hari 1 Malam') ? 'selected' : ''}}>2 Hari 1 Malam</option>
                                            <option value="3 Hari 2 Malam" {{ (old('durasi') == '3 Hari 2 Malam') ? 'selected' : ''}}>3 Hari 2 Malam</option>
                                            <option value="4 Hari 3 Malam" {{ (old('durasi') == '4 Hari 3 Malam') ? 'selected' : ''}}>4 Hari 3 Malam</option>
                                            <option value="5 Hari 4 Malam" {{ (old('durasi',) == '5 Hari 4 Malam') ? 'selected' : ''}}>5 Hari 4 Malam</option>
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
                                        <select class="form-select" aria-label="Minimal Pax" name="minimal_pax" required>
                                            <option selected="">Open this select menu</option>
                                            <option value="1" {{ (old('minimal_pax') == '1') ? 'selected' : ''}}>1 Orang</option>
                                            <option value="2" {{ (old('minimal_pax') == '2') ? 'selected' : ''}}>2 Orang</option>
                                            <option value="3" {{ (old('minimal_pax') == '3') ? 'selected' : ''}}>3 Orang</option>
                                            <option value="4" {{ (old('minimal_pax') == '4') ? 'selected' : ''}}>4 Orang</option>
                                            <option value="5" {{ (old('minimal_pax') == '5') ? 'selected' : ''}}>5 Orang</option>
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
                                            <input type="text" class="form-control" placeholder="Harga satuan" name="harga" value="{{ old('harga') }}" required>
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
                                        @foreach ($list_fasilitas as $fas )
                                        <label class="form-check">
                                            <input type="checkbox" class="form-check-input" name="fasilitas[]" value="{{$fas->id}}">
                                            <span class="form-check-label">{{ $fas->nama }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="row">
                                    <label for="destinasi" class="col-sm-12 col-md-3">Destinasi</label>
                                    <div class="col">
                                        @foreach ($list_destinasi as $des )
                                        <label class="form-check">
                                            <input type="checkbox" class="form-check-input" name="destinasi[]" value="{{$des->id}}">
                                            <span class="form-check-label">{{ $des->nama }}</span>
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
                                        <input type="file" class="form-control" name="thumbnail" required>
                                    </div>
                                    <div class="feedback text-sm mt-1 text-muted">*maksimal ukuran file 2MB</div>
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
                                            <input type="text" class="form-control" placeholder="URL data rencana perjalanan" name="rencana_perjalanan" autocomplete="off" required>
                                        </div>
                                        <div class="feedback text-sm mt-1 text-muted">*link  dokumen rencana perjalanan (google drive)</div>
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