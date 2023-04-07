@extends('home.layouts.base')

@section('head')
    <link rel="stylesheet" href="/assets/css/style.css">
@endsection

@section('content')
    <header class="jumbotron">
        <div class="navigation">
            @include('home.layouts.header-trns')
        </div>
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="text-center text-white">
                        <h1 class="fw-bold display-4">Mau healing ke gunung?, gak usah bingung!</h1>
                        <p class="lead my-4">Jemputan Gunung hadir untuk menemani petualanganmu</p>
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-9 col-xl-7">
                                <form action="/cari" method="get">
                                    <div class="row">
                                        <div class="col">
                                            <input class="form-control form-control-lg" type="text" name="cari" id="cari" placeholder="Cari trip impianmu">
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-lg btn-primary">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="features bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mx-auto px-2 my-5 py-md-5">
                        <h3 class="fw-bold">Experience</h3>
                    <p class="lead">Lepaskan jiwa petualangmu bersama kami, Menyatu dengan alam, mengukir pengalaman tak terlupakan</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto px-2 my-5 py-md-5">
                        <h3 class="fw-bold">Spirit</h3>
                    <p class="lead">Kami hadir berkat semangat kami, menebarkan rasa cinta demi mewujudkan alam lestari</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto px-2 my-5 py-md-5">
                        <h3 class="fw-bold">Affordable</h3>
                    <p class="lead">Biaya trip yang terjangkau bagi berbagai kalangan. Karena kami percaya, semua orang perlu <em>healing</em></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('/assets/images/bg-sh-5.jpg')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2 class="fw-bold">People</h2>
                    <p class="lead">Bertemu, berbagi rasa, Merasakan suasana berbeda bersama orang-orang terdekat</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('/assets/images/bg-sh-4.jpg')"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2 class="fw-bold">Journey</h2>
                    <p class="lead">Perjalanan yang tak sekadar diukur dengan waktu. Menjauh sebentar dari hiruk pikuk rutinitas harian</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('/assets/images/bg-sh-2.jpg')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2 class="fw-bold">Culture</h2>
                    <p class="lead">Merasakan budaya yang berbeda, menghargai keberagaman</p>
                </div>
            </div>
        </div>
    </section>
    <section class="home-card-trip bg-light">
        <div class="container">
            <h1 class="display-5 text-center mb-5">Jadwal Trip Terbaru</h1>
            <div class="d-flex gap-5 flex-wrap justify-content-center align-items-center">
                @foreach ($paket as $item)
                <div class="card border-0 shadow-sm" style="width: 18rem;">
                    <div class="card-img-top" style="background-image: url('{{asset('storage/trip/img/'.$item->thumbnail)}}'); height: 180px; background-size: cover;"></div>
                    {{-- <img src=".." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h3 class="card-tit mb-0">{{ $item->judul }}</h3>
                        <p class="text-success mb-1 fw-bold">IDR. {{ $item->harga }}/pax</p>
                        <p class="card-text text-muted text-truncate">{{ $item->deskripsi }}</p>
                        <p class="m-0 fw-bold">Destinasi:</p>
                        <ul>
                        @foreach ($item->destinasi as $destinasi)
                            <li>{{ $destinasi->nama }}</li>    
                        @endforeach
                        </ul>
                       <div class="d-flex gap-3">
                            <a href="/trip/{{$item->id}}" class="btn btn-outline-primary">Detail</a>
                            <a href="https://api.whatsapp.com/send/?phone=6289613268434&text=Halo%20Admin%20Jemputan%20Gunung!%2C%0Asaya%20ingin%20memesan%20paket%20trip%20{{ urlencode(url("/trip/$item->id")) }}%0A&type=phone_number&app_absent=0" target='_blank' class="btn btn-success">Pesan Sekarang!</a>
                       </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-center mt-5 d-flex no-wrap">
            <div class="center-line"></div>
            <a href="/trip" class="btn btn-outline-secondary text-nowrap">More trip</a>
            <div class="center-line"></div>
        </div>
    </section>
    <section class="call-to-action text-white text-center">
        <div class="container position-relative">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <h2 class="display-6 mb-4 fw-bold">Siap berpetualang?</h2>
                    <div class="d-grid">
                        <a href="#" class="btn btn-lg btn-outline-info">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection