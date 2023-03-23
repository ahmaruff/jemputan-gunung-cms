@extends('home.layouts.base')

@section('head')
    <style>
        .pagination li a {
            text-decoration: none;
            font-size: 1rem;
        }
    </style>
@endsection

@section('header')
    @include('home.layouts.header')
@endsection

@section('content')
<div class="container">
    <div class="my-5 row">
        <div class="col">
            <div class="card border-0" id="faq-list">
                <div class="card-header bg-white d-flex align-items-center">
                    <h3 class="card-title">Frequently Asked Question</h3>
                    <div class="ms-auto d-flex gap-2">
                        <input type="text" class="form-control fuzzy-search" placeholder="Search data">
                        <div class="dropdown">
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="bi bi-sort-down me-1"></i>
                                Sort by
                            </button>
                            <div class="dropdown-menu">
                                <button class="sort dropdown-item" data-sort="tanggal">Tanggal</button>
                                <button class="sort dropdown-item" data-sort="pertanyaan">Pertanyaan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="accordion">
                            <ul class="list list-unstyled">
                                @foreach ($faq as $item)
                                <li class="accordion-item">
                                    <h2 class="accordion-header" id="head{{$item->id}}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="false" aria-controls="collapse{{$item->id}}">
                                            <span class="text-muted tanggal">{{ $item->tanggal }}</span> <span class="vr mx-3"></span> <span class="fw-bold pertanyaan">{{ $item->pertanyaan }}</span>
                                        </button>
                                    </h2>
                                    <div id="collapse{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="head{{$item->id}}" data-bs-parent="#faq-list">
                                        <div class="accordion-body">
                                            <p>{{ $item->jawaban }}</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="w-25">
                            <span>Page</span>
                            <ul class="pagination m-0 p-0 d-flex gap-2 justify-content-start"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/libs/listjs-2.3.1/list.min.js"></script>

<script>
    var options = {
        valueNames:['tanggal', 'pertanyaan'],
        page:25,
        pagination: true,
    }

    faqList = new List('faq-list',options);   
</script>
@endsection