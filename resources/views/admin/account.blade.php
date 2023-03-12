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
    Admin Account - JG
@endsection

@section('page-header')
<div class="mb-1">
    <ol class="breadcrumb" aria-label="breadcrumbs">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/account">Account</a></li>
    </ol>
</div>
<h2 class="page-title">Admin Account</h2>
@endsection

@section('content')
<div class="row row-deck row-cards">
    <div class="col">
        <div class="card" id="account-list">
            <div class="card-header d-flex align-items-center">
                <h1 class="card-title">Account</h1>
                <div class="ms-auto d-flex gap-2">
                    <input type="text" class="form-control fuzzy-search" placeholder="Search data">
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="bi bi-sort-down me-1"></i>
                            Sort by
                        </button>
                        <div class="dropdown-menu">
                            <button class="sort dropdown-item" data-sort="id">ID</button>
                            <button class="sort dropdown-item" data-sort="email">Email</button>
                            <button class="sort dropdown-item" data-sort="username">Username</button>
                            <button class="sort dropdown-item" data-sort="nama">Nama</button>
                        </div>
                    </div>
                    <a href="/admin/account/create" class="btn btn-primary">
                        <i class="bi bi-plus me-1"></i>
                        Tambah
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tabel-vcenter">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($admins as $item)
                                <tr>
                                    <td class="id">{{ $item->id }}</td>
                                    <td class="email">{{ $item->email }}</td>
                                    <td class="username">{{ $item->username }}</td>
                                    <td class="nama">{{ $item->nama }}</td>
                                    <td>
                                        <div class="btn-list">
                                            <a href="/admin/account/{{$item->id}}" class="btn btn-primary btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="/admin/account/{{$item->id}}/delete" class="btn btn-danger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="hr-text hr-text-left">
                        <span>Page</span>
                        <ul class="pagination m-0 p-0 d-flex gap-2 justify-content-center"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/libs/listjs-2.3.1/list.min.js"></script>

<script>
    var options = {
        valueNames:['id', 'email', 'username', 'nama'],
        page:25,
        pagination: true,
    }

    destinasiList = new List('account-list',options);   
</script>
@endsection
