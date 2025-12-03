<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- ======== CUSTOM STYLE (TEMA MERAH MODERN) ======== -->
    <style>
        :root {
            --merah-primer: #d32f2f;
            --merah-gelap: #b71c1c;
            --merah-soft: #fce4ec;
            --bg-body: #f7f7f7;
        }

        body {
            background: var(--bg-body);
            font-family: 'Nunito', sans-serif;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(90deg, var(--merah-gelap), var(--merah-primer)) !important;
        }

        .navbar .nav-link {
            font-size: 1rem;
            transition: 0.2s;
        }

        .navbar .nav-link:hover {
            opacity: 0.85;
        }

        /* NAV BUTTONS TOP */
        .btn-outline-primary {
            border-color: var(--merah-primer) !important;
            color: var(--merah-primer) !important;
        }

        .btn-outline-primary:hover {
            background: var(--merah-primer) !important;
            color: white !important;
        }

        .btn-primary {
            background: var(--merah-primer) !important;
            border-color: var(--merah-gelap) !important;
        }

        .btn-primary:hover {
            background: var(--merah-gelap) !important;
        }

        /* ACTIVE PAGE */
        .btn.active, .btn.btn-primary.active {
            background: var(--merah-gelap) !important;
        }

        /* CARD / CONTAINER BEAUTIFY */
        main .container {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.08);
            margin-top: 10px;
        }

        /* NAVBAR DROPDOWN */
        .dropdown-menu {
            border-radius: 10px;
            border: none;
            overflow: hidden;
        }

        .dropdown-item:hover {
            background: var(--merah-soft);
        }

        .dropdown-item.text-danger:hover {
            background: #ffebee;
            color: var(--merah-gelap) !important;
        }

        /* Navigation Buttons */
        .container .btn {
            margin-right: 4px;
            margin-bottom: 4px;
        }

    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ url('/') }}">
                    <img src="azp.ico" alt="Logo" height="28">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('dashboard') ? 'active fw-semibold' : '' }}"
                                href="{{ url('/') }}">
                                Kasirku Azka
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-light text-primary px-3 mx-1"
                                       href="{{ route('login') }}">
                                        Login
                                    </a>
                                </li>
                            @endif

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fw-semibold"
                                   href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end shadow">
                                    <a class="dropdown-item" href="#">
                                        Profile
                                    </a>

                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}"
                                        method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <a href="{{ route('home') }}" wire:navigate class="btn {{ request()->routeIs('home') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Beranda
                        </a>

                        <a href="{{ route('user') }}" wire:navigate class="btn {{ request()->routeIs('user') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Pengguna
                        </a>

                        <a href="{{ route('produk') }}" wire:navigate class="btn {{ request()->routeIs('produk') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Produk
                        </a>

                        <a href="{{ route('transaksi') }}" wire:navigate class="btn {{ request()->routeIs('transaksi') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Transaksi
                        </a>

                        <a href="{{ route('laporan') }}" wire:navigate class="btn {{ request()->routeIs('laporan') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Laporan
                        </a>

                    </div>
                </div>
            </div>

            {{ $slot }}
        </main>
    </div>
</body>
</html>
