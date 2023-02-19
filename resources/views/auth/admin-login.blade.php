@extends('auth.layouts.base')

@section('content')
<div class="card text-center shadow-sm">
    <div class="card-body">
        <div class="d-flex gap-3 justify-content-center align-items-center w-100 mt-4">
            <img src="/assets/images/logo.png" alt="Logo" class="img-fluid" width="75">
            <div class="vr"></div>
            <div>
                <h3 class="fw-bold text-start">Please Log in</h3>
                <p class="lead text-start">Admin Jemputan gunung</p>
            </div>
          </div>
        <main class="w-100 m-auto p-3">
            <form action="" method="post">
                {{ csrf_field() }}
              <div class="form-floating my-2">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="myusername">
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating my-2">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
          
              <button class="w-100 btn btn-lg btn-primary my-2" type="submit" name="submit">Log in</button>
              <p class="mt-4">Belum punya akun? <a href="/register/admin">Daftar sekarang!</a></p>
            </form>
        </main>
    </div>
</div>
@endsection