@extends('home.layouts.base')

@section('header')
    @include('home.layouts.header')
@endsection

@section('content')
<section class="bg-light">
    <div class="container text-center py-5">
        <h1 class="display-4 fw-bold">Kontak</h1>
    </div>
</section>
<section class="my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <form action="#" method="post" enctype="text/plain">
                    @csrf
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="name" class="form-label lead">Fullname</label>
                            <input type="text" class="form-control" id="name" placeholder="John doe" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label lead">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label lead">Subject</label>
                        <input type="text" class="form-control" id="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label lead">Message</label>
                        <textarea class="form-control" id="message" rows="8" required></textarea>
                    </div>
                    <div class="my-4 d-grid">
                        <button type="submit" class="btn btn-lg btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection