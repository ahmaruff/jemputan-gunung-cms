@extends('admin.layouts.base')

@section('head')
    <style>
        .pagination li a {
            text-decoration: none;
            font-size: 1rem;
        }
    </style>
@endsection

@section('title')
    FAQ - JG
@endsection

@section('page-header')
<div class="mb-1">
    <ol class="breadcrumb" aria-label="breadcrumbs">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/faq">FAQ</a></li>
    </ol>
</div>
<h2 class="page-title">Frequently Asked Question</h2>
@endsection

@section('content')
<div class="row row-deck row-cards">
    <div class="col">
        <div class="card" id="faq-list">
            <div class="card-header d-flex align-items-center">
                <h1 class="card-title">FAQ</h1>
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
                    <a href="/admin/faq/create" class="btn btn-primary">
                        <i class="bi bi-plus me-1"></i>
                        Tambah
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="accordion">
                    <ul class="list list-unstyled">
                        @foreach ($faq as $item)
                        <li class="accordion-item">
                            <h2 class="accordion-header" id="head{{$item->id}}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                    <span class="text-muted tanggal">{{ $item->tanggal }}</span> <span class="vr mx-3"></span> <span class="fw-bold pertanyaan">{{ $item->pertanyaan }}</span>
                                </button>
                            </h2>
                            <div id="collapse{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="head{{$item->id}}" data-bs-parent="#faq-list">
                                <div class="accordion-body">
                                    <p>{{ $item->jawaban }}</p>
                                    <div class="btn-list">
                                        <a href="{{route('faq.edit', $item->id)}}" class="btn btn-warning btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat">
                                            <i class="bi bi-pen-fill"></i>
                                        </a>
                                        <form action="{{route('faq.destroy', $item->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="hr-text hr-text-left">
                    <span>Page</span>
                    <ul class="pagination m-0 p-0 d-flex gap-2 justify-content-center"></ul>
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