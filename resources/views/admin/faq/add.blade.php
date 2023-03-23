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
        <li class="breadcrumb-item"><a href="/admin/faq">FAQ</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/faq/create">Create FAQ</a></li>
    </ol>
</div>
<h2 class="page-title">Frequently Asked Question</h2>
@endsection

@section('content')
<div class="row row-deck row-cards">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Tambah FAQ</h1>
                <div>
                    <form action="{{route('faq.store')}}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label" for="tanggal">Tanggal</label>
                            <div class="col">
                                <input type="date" class="form-control" name="tanggal" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label" for="pertanyaan">Pertanyaan</label>
                            <div class="col">
                                <input type="text" class="form-control" name="pertanyaan" placeholder="Pertanyaan" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label" for="jawaban">Jawaban</label>
                            <div class="col">
                                <textarea name="jawaban" class="form-control" cols="30" rows="6" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection