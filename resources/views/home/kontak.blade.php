@extends('home.layouts.base')

@section('header')
    @include('home.layouts.header')
@endsection

@section('head')
    <style>
        .contact-icon {
            height: 48px;
            width: 48px;
        }
    </style>
@endsection

@section('content')
<section class="bg-light">
    <div class="container text-center py-5">
        <h1 class="display-4 fw-bold">Kontak</h1>
    </div>
</section>
<section class="my-5">
    <div class="container">
        <div class="row justify-content-center">
            {{-- <div class="col-md-8 col-lg-6">
                <form action="mailto:ahmadmaruf2701@gmail.com" method="post" enctype="text/plain">
                    @csrf
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="name" class="form-label lead">Fullname</label>
                            <input type="text" class="form-control" id="name" placeholder="John doe" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label lead">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label lead">Subject</label>
                        <input type="text" class="form-control" id="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label lead">Message</label>
                        <textarea class="form-control" id="message" rows="8" required></textarea>
                    </div>
                    <div class="my-4 d-grid">
                        <button type="submit" class="btn btn-lg btn-primary">Send</button>
                    </div>
                </form>
            </div> --}}
            <div class="col-md-8 col-lg-6">
                <div class="alamat">
                    <h3 class="lead fw-bold">Head Office</h3>
                    <p>Perumahan Griya Asri 2 H.15/26, Sumber Jaya Kec. Tambun Selatan, Bekasi, Jawa Barat. Kode Pos 17510</p>
                </div>
                <div class="mt-5">
                    <div class="d-flex my-3 gap-3 align-items-center">
                        <img src="/assets/images/svg/whatsapp.svg" class="img-fluid contact-icon" alt="Whatsapp">
                        <div class="">
                            <a href="https://api.whatsapp.com/send/?phone=6289613268434&text=Halo%20Admin%20Jemputan%20Gunung!%2C%0A&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="lead text-dark text-decoration-none">+62 896 1326 8434 </a> <span class="lead">atau</span>
                            <a href="https://api.whatsapp.com/send/?phone=6285880435120&text=Halo%20Admin%20Jemputan%20Gunung!%2C%0A&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="lead text-dark text-decoration-none">+62 858 8043 5120</a>
                        </div>
                    </div>
                    <div class="d-flex my-3 gap-3 align-items-center">
                        <img src="/assets/images/svg/facebook.svg" class="img-fluid contact-icon" alt="Facebook">
                        <div class="mb-2">
                            <a href="https://www.facebook.com/jemputangunung" target="_blank" rel="noopener noreferrer" class="lead text-dark text-decoration-none">&nbsp;jemputangunung</a>
                        </div>
                    </div>
                    <div class="d-flex my-3 gap-3 align-items-center">
                        <img src="/assets/images/svg/instagram.svg" class="img-fluid contact-icon" alt="Instagram">
                        <div class="mb-2">
                            <a href="https://www.instagram.com/jemputangunung/" target="_blank" rel="noopener noreferrer" class="lead text-dark text-decoration-none">@jemputangunung</a>
                        </div>
                    </div>
                    <div class="d-flex my-3 gap-3 align-items-center">
                        <img src="/assets/images/svg/tiktok.svg" class="img-fluid contact-icon" alt="Tiktok">
                        <div class="mb-2">
                            <a href="https://www.tiktok.com/@jemputangunung1" target="_blank" rel="noopener noreferrer" class="lead text-dark text-decoration-none">@jemputangunung1</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection