@extends('home.layouts.base')

@section('header')
    @include('home.layouts.header')
@endsection

@section('content')
    <div class="container">
        <div class="my-5 row">
            <div class="col">
                <h1 class="display-4 text-center mt-4">Paket Trip Jemputan Gunung</h1>
                {{-- <div class="card bg-dark text-white shadow-sm border-0 p-3">
                    <div class="card-body">
                        <div class="my-5">
                            <form action="/trip/search" method="post" class="form-inline">
                                @csrf
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-sm-12 col-md-4">
                                        <label for="judul" class="form-label lead">Judul</label>
                                        <input type="text" name="judul" id="" class="form-control">
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label for="penjemputan" class="form-label lead">Penjemputan</label>
                                        <select class="form-select" aria-label="Pilih area penjemputan" name="penjemputan">
                                            <option selected="">Open this select menu</option>
                                            <option value="Jabodetabek">Jabodetabek</option>
                                            <option value="Bandung">Bandung</option>
                                            <option value="Tasikmalaya">Tasikmalaya</option>
                                            <option value="Lombok">Lombok</option>
                                            <option value="Jambi">Jambi</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label for="destinasi" class="form-label lead">Destinasi</label>
                                        <select class="form-select" aria-label="Pilih Destinasi" name="destinasi" id="">\
                                                <option selected="">Open this select menu</option>
                                            @foreach ($destinasi as $d)
                                                <option value="{{$d->id}}">{{ $d->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-4">
                                    <div class="col-sm-12 col-md-4 text-center d-grid">
                                        <button type="submit" class="btn btn-info btn-lg">Cari trip</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" data-masonry='{"percentPosition": true }'>
                @foreach ($paket as $item)
                    <div class="card m-3 border-0 shadow-sm" style="width: 20rem;">
                        <div class="card-img-top" style="height:12rem; background-image: url('{{asset('storage/trip/img/'.$item->thumbnail)}}'); background-size:cover"></div>
                        {{-- <img src="{{asset('storage/trip/img/'.$item->thumbnail)}}" class="card-img-top" alt="thumbnail"> --}}
                        <div class="card-body">
                            <a href="/trip/{{$item->id}}" class="text-decoration-none link-dark">
                                <h3 class="fw-bold">{{ $item->judul }}</h3>
                            </a>
                            <div class="d-flex justify-content-between mb-1 pb-2 border-bottom">
                                <p class="m-0">
                                    {{ $item->durasi }}
                                </p>
                                <h5 class="fw-bold m-0 text-primary text-end">
                                    Rp. {{ $item->harga }} <span class="text-muted text-sm fw-light fs-6">/org</span>
                                </h5>
                            </div>
                            
                            <p class="text-muted text-truncate py-2">{{ $item->deskripsi }}</p>
                            <div class="">
                                <ul class="nav nav-tabs nav-fill" id="myTab{{$item->id}}" role="tablist">
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link active" id="destinasi-list-tab{{$item->id}}" data-bs-toggle="tab" data-bs-target="#destinasi-tab-pane{{$item->id}}" type="button" role="tab" aria-controls="destinasi-tab-pane{{$item->id}}" aria-selected="true">Destinasi</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="fasilitas-list-tab{{$item->id}}" data-bs-toggle="tab" data-bs-target="#fasilitas-tab-pane{{$item->id}}" type="button" role="tab" aria-controls="fasilitas-tab-pane{{$item->id}}" aria-selected="false">Fasilitas</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTab{{$item->id}}Content">
                                    <div class="tab-pane fade show active" id="destinasi-tab-pane{{$item->id}}" role="tabpanel" aria-labelledby="destinasi-list-tab{{$item->id}}" tabindex="0">
                                        <ul>
                                            @foreach ($item->destinasi as $des)
                                                <li>{{ $des->nama }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="fasilitas-tab-pane{{$item->id}}" role="tabpanel" aria-labelledby="fasilitas-list-tab{{$item->id}}" tabindex="0">
                                        <ul>
                                            @foreach ($item->fasilitas as $fas)
                                                <li>{{ $fas->nama }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                  </div> 
                            </div>
                        </div>
                        <div class="card-footer d-grid bg-white">
                            <a href="#" class="btn btn-success">Pesan Sekarang!</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
