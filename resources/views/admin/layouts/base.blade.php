<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="/assets/css/tabler.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    @yield('head')

    @if (isset($title))
        <title>{{ $title }}</title>
    @else
        <title>Jemputan Gunung</title>
    @endif
</head>
<body>
    <div class="page">
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex flex-column justify-content-center">
                    <h1 class="navbar-brand navbar-brand-autodark pb-0">
                        <a href="#" class="display-6">{{ $nama }}</a>
                    </h1>
                    <p class="text-muted text-center">{{ $email }}</p>
                </div>
                <div class="collapse navbar-collapse" id="sidebar-menu">
                    
                    @include('admin.layouts.sidebar')
                </div>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            @yield('page-header')
                        </div>
                        <div class="col-auto ms-auto">
                            <a href="/admin/profile" class="btn btn-outline-dark">
                                <i class="bi bi-person-fill"></i>
                                <span class="lead ms-2">Profile</span>
                            </a>
                            <a href="/logout" class="btn btn-dark">
                                <span class="lead">Logout</span>
                                <i class="bi bi-box-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>
    <script src="/assets/js/tabler.min.js" defer></script>
</body>
</html>