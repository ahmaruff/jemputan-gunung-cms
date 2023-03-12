@extends('admin.layouts.base')

@section('title')
    Add Account
@endsection

@section('page-header')
<div class="mb-1">
    <ol class="breadcrumb" aria-label="breadcrumbs">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/account">Account</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/account/create">Create</a></li>
    </ol>
</div>
<h2 class="page-title">Account</h2>
@endsection

@section('content')
<div class="row row-deck row-cards">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Tambah Akun admin Baru</h1>
                <form action="" method="post">
                    @csrf
                    <div class="mb-3 row align-items-center">
                        <label class="col-sm-2 form-label">Email</label>
                        <div class="col">
                            <input type="text" class="form-control" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="mb-3 row align-items-center">
                        <label class="col-sm-2 form-label">Nama</label>
                        <div class="col">
                            <input type="text" class="form-control" name="nama" placeholder="Admin name" required>
                        </div>    
                    </div>
                    <div class="mb-3 row align-items-center">
                        <label class="col-sm-2 form-label">Username</label>
                        <div class="col">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 form-label">Password</label>
                        <div class="col">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <small class="form-hint">Minimal berjumlah 6 karakter</small>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 form-label">Konfirmasi Password</label>
                        <div class="col">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Tambah Admin</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection