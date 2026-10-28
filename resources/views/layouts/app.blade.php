<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>@yield('title', 'Mata Air Cigede')</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    :root {
        --biru-tua: #0B3954;
        --biru-air: #087E8B;
        --biru-cerah: #20A4F3;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #ffffff;
    }

    /* TOP BAR */
    .top-bar {
        height: 48px;
        background: var(--biru-tua);
        color: white;
        display: flex;
        align-items: center;
        font-size: 13px;
        font-weight: 600;
    }

    .top-bar-content {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 30px;
    }

    .top-bar a {
        color: white;
        text-decoration: none;
        transition: 0.3s;
    }

    .top-bar a:hover {
        color: #8ee7ff;
    }

    /* NAVBAR */
    .main-navbar {
        height: 90px;
        background: white;
        border-bottom: 1px solid #eeeeee;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .brand {
        text-decoration: none;
        color: var(--biru-tua);
        font-size: 22px;
        font-weight: 700;
        line-height: 1.1;
    }

    .brand small {
        display: block;
        font-size: 10px;
        color: var(--biru-air);
        font-weight: 500;
        letter-spacing: 1px;
    }

    .main-menu {
        display: flex;
        align-items: center;
        gap: 28px;
    }

    .main-menu a {
        position: relative;
        color: #3f4b56;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        padding: 34px 0;
        transition: 0.3s;
    }

    .main-menu a:hover {
        color: var(--biru-air);
    }

    .main-menu a::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 4px;
        background: var(--biru-air);
        transition: 0.3s;
    }

    .main-menu a:hover::after {
        width: 100%;
    }

    .register-button {
        background: var(--biru-air);
        color: white !important;
        padding: 12px 18px !important;
        border-radius: 4px;
    }

    .register-button::after {
        display: none;
    }

    .register-button:hover {
        background: var(--biru-tua);
    }

    /* CONTENT */
    .main-content {
        width: 100%;
    }

    /* RESPONSIVE */
    @media (max-width: 991px) {

        .top-bar {
            height: auto;
            padding: 10px 0;
        }

        .top-bar-content {
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .main-navbar {
            height: auto;
            padding: 20px 0;
        }

        .main-menu {
            margin-top: 20px;
            flex-direction: column;
            align-items: flex-start;
            gap: 0;
        }

        .main-menu a {
            padding: 10px 0;
        }

        .main-menu a::after {
            display: none;
        }

        .register-button {
            margin-top: 10px;
        }
    }
    html {
    scroll-behavior: smooth;
}
</style>

</head>

<body>

{{-- NAVBAR --}}
<nav class="main-navbar">
    <div class="container h-100 d-flex align-items-center justify-content-between">

        {{-- LOGO / BRAND --}}
        <a href="{{ url('/') }}" class="brand">
            Mata Air Cigede
            <small>DESTINASI WISATA ALAM GARUT</small>
        </a>

        {{-- MENU --}}
        <div class="main-menu">

            <a href="{{ url('/') }}">
                Beranda
            </a>
<a href="{{ url('/') }}#profil-destinasi">
    Profil Destinasi
</a>
            {{-- Scroll ke bagian Galeri di halaman Beranda --}}
            <a href="{{ url('/') }}#galeri">
                Galeri
            </a>

            {{-- Scroll ke bagian Berita di halaman Beranda --}}
            <a href="{{ url('/') }}#berita">
                Berita
            </a>

            <a href="#kritik" class="nav-link">Kritik & Saran</a>

            <a href="{{ url('/#kontak') }}">
                Kontak
            </a>
           
    <a class="nav-link" href="#lokasi">Lokasi</a>


            @guest
                <a href="{{ route('login') }}">
                    Login
                </a>
            @endguest

            @auth
                <a href="{{ url('/dashboard') }}">
                    Dashboard
                </a>
            @endauth

        </div>

    </div>
</nav>

{{-- CONTENT --}}
<main class="main-content">
    @yield('content')
</main>

</body>
</html>
