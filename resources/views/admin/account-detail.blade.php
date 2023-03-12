@extends('admin.layouts.base')

@section('title')
    Account - {{ $nama }}
@endsection

@section('page-header')
<div class="mb-1">
    <ol class="breadcrumb" aria-label="breadcrumbs">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/account">Account</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/{{$admin->id}}">Detail</a></li>
    </ol>
</div>
<h2 class="page-title">Profile</h2>
@endsection

@section('content')
    <div class="row row-deck row-cards">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Admin Profile</h1>
                    <form action="" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id", value="{{$admin->id}}">
                        <div class="mb-3 row align-items-center">
                            <label class="col-sm-2 form-label">Email</label>
                            <div class="col">
                                <input type="text" class="form-control-plaintext" name="email" placeholder="Email" value="{{ $admin->email }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label class="col-sm-2 form-label">Nama</label>
                            <div class="col">
                                <input type="text" class="form-control" name="nama" placeholder="Admin name" value="{{ $admin->nama }}">
                            </div>    
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label class="col-sm-2 form-label">Username</label>
                            <div class="col">
                                <input type="text" class="form-control" name="username" placeholder="Email" value="{{ $admin->username }}">
                            </div>
                        </div>
                        <br>
                        <h1 class="card-title">Ubah password</h1>
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label">Password Lama</label>
                            <div class="col">
                                <input type="password" class="form-control" name="old_password" placeholder="Current password">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label">Password Baru</label>
                            <div class="col">
                                <input type="password" class="form-control" name="password" placeholder="New password">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label">Konfirmasi Password</label>
                            <div class="col">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
