<ul class="ms-3 navbar-nav pt-lg-3">
    <li class="nav-item">
        <a href="/admin" class="nav-link">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <i class="bi bi-house-door-fill"></i>
            </span>
            <span class="nav-link-title">Home</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="/admin/account" class="nav-link">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <i class="bi bi-person-fill"></i>
            </span>
            <span class="nav-link-title">Admin Account</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">         
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <i class="bi bi-pin-angle-fill"></i>
            </span>
            <span class="nav-link-title">
              Trip
            </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" href="/admin/trip">
                        Data Trip
                    </a>
                    <a class="dropdown-item" href="/admin/trip/create">
                        Tambah Trip
                    </a>
                    <a class="dropdown-item" href="/admin/trip/destinasi">
                        Destinasi
                    </a>
                    <a class="dropdown-item" href="/admin/trip/fasilitas">
                        Fasilitas
                    </a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">         
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <i class="bi bi-newspaper"></i>
            </span>
            <span class="nav-link-title">
              Blog
            </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" href="/admin/blog">
                        Data Blog
                    </a>
                    <a class="dropdown-item" href="/admin/blog/create">
                        Tambah Blog
                    </a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">         
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <i class="bi bi-question-circle-fill"></i>
            </span>
            <span class="nav-link-title">
              FAQ
            </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" href="/admin/faq">
                        Data FAQ
                    </a>
                    <a class="dropdown-item" href="/admin/faq/create">
                        Tambah FAQ
                    </a>
                </div>
            </div>
        </div>
    </li>
    @yield('sidebar-menu')
</ul>