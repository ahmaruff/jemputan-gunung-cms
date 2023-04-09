@extends('admin.layouts.base')

@section('page-header')
<div class="mb-1">
    <ol class="breadcrumb" aria-label="breadcrumbs">
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin">Home</a></li>
    </ol>
</div>

<h2 class="page-title">Dashboard</h2>
@endsection

@section('content')
<div class="row row-deck row-cards">
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <p class="text-muted m-0">Jumlah paket trip</p>
                <h2 class="display-2">{{ $jml_paket }}</h2>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <p class="text-muted m-0">Jumlah Blog</p>
                <h2 class="display-2">{{ $jml_blog }}</h2>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <p class="text-muted m-0">FAQ</p>
                <h2 class="display-2">{{ $jml_faq }}</h2>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <p class="text-muted m-0">Admin</p>
                <h2 class="display-2">{{ $jml_admin}}</h2>
            </div>
        </div>
    </div>
</div>
<div class="row row-deck row-cards mt-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Latest Trip</h1>
                @if ($paket)
                <div class="row border p-2">
                    <div class="col">
                        <p class="text-primary m-0">Rp. {{ $paket->harga }}/pax</p>
                        <h3>{{ $paket->judul }}</h3>
                        <p class="text-muted text-truncate">{{ $paket->deskripsi }}</p>
                        <a href="/admin/trip/{{$paket->id}}" class="btn btn-outline-primary">Detail</a>
                    </div>
                    {{-- <div class="col-sm-6 col-lg-2" style="background-image: url('{{asset('storage/trip/img/'.$paket->thumbnail)}}'); background-size: cover;">
                    </div> --}}
                </div>
                @else
                <h3>Belum ada paket yang dibuat!</h3>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row row-deck row-cards mt-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Latest Blog</h1>
                @if ($blog)
                <div class="row border p-2">
                    <div class="col">
                        <p class="text-primary m-0">{{ $blog->category->category }}</p>
                        <h3>{{ $blog->title }}</h3>
                        {{-- <p class="text-muted text-truncate">{{!! $blog->content_html !!}}</p> --}}
                        <a href="{{route('post.show', $blog->id)}}" class="btn btn-outline-primary">Detail</a>
                    </div>
                </div>
                @else
                    <h3>Belum ada blog yang dibuat!</h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection