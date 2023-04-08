@extends('home.layouts.base')

@section('header')
    @include('home.layouts.header')
@endsection

@section('content')
<section class="bg-light">
    <div class="container text-center py-5">
        <h1 class="display-4 fw-bold">Tentang Kami</h1>
    </div>
</section>
<section class="py-5 my-5">
    <div class="container text-center">
        <p class="lead">
            <strong>Jemputan Gunung</strong> merupakan <em>Travel Agent</em> terpercaya dengan segudang pengalaman yang berbasis di Bekasi.
            Melayani perjalanan traveling ke berbagai tempat di Indonesia. Berfokus pada segmen kalangan muda-mudi yang senang berpetualangan,
            menjelajahi gunung, pantai, dsb. <br>
            Kami percaya masih banyak sudut Indonesia yang perlu diapresiasi. Dengan semangat alam lestari, kami ingin memberi pesan bahwa
            mengagumi keindahan alam juga harus disertai dengan ikut andil dalam melestarikannya
        </p>
        <h6 class="mt-5">
            <a href="https://api.whatsapp.com/send/?phone=6285880435120&text=Halo%20Admin%20Jemputan%20Gunung!%2C%0A&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="text-decoration-none">Info lebih lanjut, hubungi kami</a>
        </h6>
    </div>
</section>

<section class="d-flex flex-row justify-content-center gap-0 m-0">
    <div style="background: url(/assets/images/bg-sh-1.jpg) no-repeat center; width:25%; height: 15rem;"></div>
    <div style="background: url(/assets/images/bg-sh-2.jpg) no-repeat center; width:25%; height: 15rem;"></div>
    <div style="background: url(/assets/images/bg-sh-3.jpg) no-repeat center; width:25%; height: 15rem;"></div>
    <div style="background: url(/assets/images/bg-sh-4.jpg) no-repeat center; width:25%; height: 15rem;"></div>
</section>
@endsection