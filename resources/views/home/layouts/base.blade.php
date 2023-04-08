<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="/assets/libs/bootstrap-5.2.2/css/bootstrap.min.css"> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    @yield('head')

    @if (isset($title))
        <title>{{ $title }}</title>
    @else
        <title>Jemputan Gunung</title>
    @endif
</head>
<body>
    
    @yield('header')

    <div style="min-height: 100vh">
        @yield('content', 'Content missing!')
    </div>

    @include('home.layouts.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    {{-- <script src="/assets/libs/bootstrap-5.2.2/js/bootstrap.bundle.min.js"></script> --}}
</body>
</html>