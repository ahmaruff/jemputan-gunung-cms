@extends('auth.layouts.base')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">
        <div class="d-flex gap-3 justify-content-center align-items-center">
            <img src="/assets/images/logo.png" alt="Logo" class="img-fluid" width="75">
            <div class="vr"></div>
            <h3 class="fw-bold">Registrasi Admin Jemputan gunung</h3>
        </div>
        <hr>
        <div class="w-100 m-auto p-3">
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" required>
                    <div id="usernameHelp" class="form-text">Please use unique username</div>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <p class="mt-4">Sudah punya akun? <a href="/login/admin">klik login</a></p>
              </form>
        </div>
    </div>
</div>
@endsection