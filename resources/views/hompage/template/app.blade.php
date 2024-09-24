<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pakuwon @yield('title')</title>
    <link href="{{ asset('template2/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/style.css') }}" rel="stylesheet">
</head>
<style>
    body{
        background-image: url({{asset('images/download.jpg')}})
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <div class="container-fluid">
            <a href="#" class="navbar-brand d-flex align-items-center py-0 px-4 px-lg-5">
                <img src="{{ asset('images/j.png') }}" alt="Logo">
            </a>
            
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                <div class="navbar-nav mx-auto p-4 p-lg-0 d-flex justify-content-center">
                    <a href="{{ route('home') }}" class="nav-item nav-link">Beranda</a>
                    <a href="{{ route('layanan') }}" class="nav-item nav-link">Layanan Warga</a>
                </div>
                <div class="d-flex align-items-center mt-3">
                    @if (Route::has('login'))
                        @auth
                        <ul class="navbar-nav w-100 justify-content-center text-center">
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin keluar?')) document.getElementById('logout-form').submit();">Logout</a>
                                </div>
                            </li>
                        </ul>
                        
                        @else
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-item nav-link ms-3">Register</a>
                                @endif
                            </div>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
