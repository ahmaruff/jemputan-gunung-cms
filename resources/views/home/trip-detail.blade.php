@extends('home.layouts.base')

@section('header')
    @include('home.layouts.header')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-sm-12 col-md-9 col-lg-8">
                <div class="card border-0 shadow-sm">
                    <img src="{{asset('storage/trip/img/'.$paket->thumbnail)}}" class="card-img-top" alt="thumbnail">
                    <div class="card-body">
                        <h1 class="display-3 fw-bold">{{ $paket->judul }}</h1>
                        <h3 class="fw-bold">Rp. {{ $paket->harga }} <span class="text-muted fw-light">/orang</span></h3>
                        <hr>
                        <div class="row lead">
                            <div class="col-sm-12 col-md-4 border-start">
                                <p class="m-0">Minimal Pax <span class="fw-bold">{{ $paket->minimal_pax }} orang</span></p>
                            </div>
                            <div class="col-sm-12 col-md-4 border-start">
                                <p class="m-0">Durasi <span class="fw-bold">{{ $paket->durasi }}</span></p>
                            </div>
                            <div class="col-sm-12 col-md-4 border-start">
                                <p class="m-0">Penjemputan <span class="fw-bold">{{ $paket->penjemputan }}</span></p>
                            </div>
                        </div>
                        <hr>
                        <p class="text-muted">{{ $paket->deskripsi }}</p>
                        <div class="row justify-content-between">
                            <div class="col-sm-12 col-md-4">
                                <h3>Destinasi</h3>
                                <ol>
                                    @foreach ($paket->destinasi as $d)
                                        <li>{{ $d->nama }}</li>
                                    @endforeach
                                </ol>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <h3>Fasilitas</h3>
                                <ul>
                                    @foreach ($paket->fasilitas as $f)
                                        <li>{{ $f->nama }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-grid m-1">
                                <a href="{{$paket->rencana_perjalanan}}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-lg">Unduh Rencana Perjalanan</a>
                            </div>
                            <div class="col d-grid m-1">
                                <a href="https://api.whatsapp.com/send/?phone=6289613268434&text=Halo%20Admin%20Jemputan%20Gunung!%2C%0Asaya%20ingin%20memesan%20paket%20trip%20{{ urlencode(url("/trip/$paket->id")) }}%0A&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-lg">Pesan Sekarang!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection