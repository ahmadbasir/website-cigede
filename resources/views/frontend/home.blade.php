@extends('layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')

<style>
    :root {
        --biru-tua: #0B3954;
        --biru-air: #087E8B;
        --biru-cerah: #20A4F3;
        --biru-muda: #E8F8FC;
        --abu-teks: #64748B;
    }

    /* =========================
       HERO SECTION
    ========================== */

        .hero-section {
        min-height: 560px;
        width: 100%;
        position: relative;
        background: linear-gradient(
        rgba(4, 43, 64, 0.62),
        rgba(4, 43, 64, 0.62)
        ),
        url('/images/cigede.jpeg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        }


        .hero-overlay {
        width: 100%;
        text-align: center;
        padding: 60px 20px;
        }

        .hero-content {
        max-width: 900px;
        margin: auto;
        color: white;
        text-align: center;
        }

        .hero-content h1 {
        font-size: 58px;
        font-weight: 700;
        margin-bottom: 20px;
        }

        .hero-content p {
        max-width: 750px;
        margin: 0 auto 32px;
        font-size: 20px;
        line-height: 1.7;
        }

        .hero-button {
        display: inline-block;
        background: var(--biru-air);
        color: white;
        text-decoration: none;
        padding: 15px 30px;
        border-radius: 8px;
        font-weight: 700;
        transition: 0.3s;
        }

        .hero-button:hover {
        background: var(--biru-tua);
        color: white;
        }


    /* =========================
       SECTION UMUM
    ========================== */

    .home-section {
        padding: 70px 0;
    }

    .section-title {
        color: var(--biru-tua);
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 35px;
    }

    .section-title::after {
        content: "";
        display: block;
        width: 55px;
        height: 4px;
        background: var(--biru-air);
        margin-top: 12px;
    }


    /* =========================
       KONDISI WISATA
    ========================== */

    .info-card {
        height: 100%;
        border: none;
        border-radius: 10px;
        padding: 28px;
        background: white;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding: 15px 0;
        border-bottom: 1px solid #eeeeee;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-label {
        font-weight: 600;
        color: var(--abu-teks);
    }

    .info-value {
        font-weight: 700;
        color: var(--biru-air);
        text-align: right;
    }


    /* =========================
       CROWD METER
    ========================== */

    .crowd-card {
        height: 100%;
        border: none;
        border-radius: 10px;
        padding: 40px 25px;
        background: var(--biru-tua);
        color: white;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
    }

    .crowd-card h3 {
        font-size: 42px;
        font-weight: 700;
        color: #8ee7ff;
        margin: 25px 0;
    }

    .crowd-number {
        font-size: 18px;
    }


    /* =========================
       FASILITAS
    ========================== */

    .facility-card {
        border: none;
        border-radius: 10px;
        padding: 30px 15px;
        text-align: center;
        background: white;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
        transition: 0.3s;
        height: 100%;
    }

    .facility-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }

    .facility-icon {
        font-size: 35px;
        color: var(--biru-air);
        margin-bottom: 15px;
    }

    .facility-card h5 {
        color: var(--biru-tua);
        font-weight: 700;
    }


    /* =========================
       GALERI
    ========================== */

    .gallery-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        height: 100%;
        background: white;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.08);
        transition: 0.3s;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
    }

    .gallery-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: 0.4s;
    }

    .gallery-card:hover img {
        transform: scale(1.05);
    }

    .gallery-card-body {
        padding: 20px;
    }

    .gallery-card-body h5 {
        color: var(--biru-tua);
        font-weight: 700;
    }


    /* =========================
       BERITA
    ========================== */

    .news-card {
        height: 100%;
        border: none;
        border-radius: 10px;
        padding: 25px;
        background: white;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.08);
        transition: 0.3s;
    }

    .news-card:hover {
        transform: translateY(-5px);
    }

    .news-card h5 {
        color: var(--biru-tua);
        font-weight: 700;
    }

    .news-card p {
        color: var(--abu-teks);
        line-height: 1.7;
    }


    /* =========================
        PROFIL DESTINASI
    ========================== */

        .profile-card {
        border: none;
        border-radius: 12px;
        padding: 35px;
        background: white;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .profile-card h3 {
        color: var(--biru-tua);
        font-weight: 700;
        margin-bottom: 20px;
        }

        .profile-card h5 {
        color: var(--biru-tua);
        font-weight: 700;
        margin-top: 28px;
        margin-bottom: 12px;
        }

        .profile-card p {
        color: var(--abu-teks);
        line-height: 1.9;
        text-align: justify;
        margin-bottom: 18px;
        }

    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 768px) {

        .hero-section {
            min-height: 480px;
        }

        .hero-content h1 {
            font-size: 38px;
        }

        .hero-content p {
            font-size: 17px;
        }

        .section-title {
            font-size: 27px;
        }

        .info-item {
            flex-direction: column;
            gap: 5px;
        }

        .info-value {
            text-align: left;
        }

    }
    /* =========================
        BUTTON UTAMA
    ========================== */

    .btn-cigede {
        background: var(--biru-air);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-cigede:hover {
        background: var(--biru-tua);
        color: white;
        transform: translateY(-2px);
    }

</style>


<!-- =========================
     HERO SECTION
========================== -->

<section class="hero-section">

    <div class="hero-overlay">

        <div class="hero-content">

            <h1>
                Wisata Mata Air Cigede
            </h1>

            <p>
                Nikmati segarnya mata air alami di Cigede! Wisata alam yang sejuk, akses jalan yang bagus, dan pastinya gratis tanpa biaya masuk.
            </p>

            <a href="{{ url('/registrasi') }}" class="btn btn-cigede">
                Registrasi Kunjungan
            </a>

        </div>

    </div>

</section>


<!-- =========================
     KONDISI WISATA DAN CROWD METER
========================== -->

<section class="home-section">

<div class="container">

    <div class="row g-4">

        <!-- KONDISI WISATA TERKINI -->
        <div class="col-md-6">

            <h2 class="section-title">
                Kondisi Wisata Terkini
            </h2>

            <div class="info-card">

                <div class="info-item">
                    <span class="info-label">Status Air</span>
                    <span class="info-value">{{ $kondisi->status_air ?? '-' }}</span>
                </div>

                <div class="info-item">
                    <span class="info-label">Cuaca</span>
                    <span class="info-value">{{ $kondisi->kondisi_cuaca ?? '-' }}</span>
                </div>

                <div class="info-item">
                    <span class="info-label">Operasional</span>
                    <span class="info-value">{{ $kondisi->status_operasional ?? '-' }}</span>
                </div>

                <div class="info-item">
                    <span class="info-label">Informasi Khusus</span>
                    <span class="info-value">{{ $kondisi->informasi_khusus ?? '-' }}</span>
                </div>

            </div>

        </div>

        <!-- CROWD METER -->
        <div class="col-md-6">

            <h2 class="section-title">
                Crowd Meter
            </h2>

            <div class="crowd-card">

                <p>
                    Kondisi jumlah pengunjung saat ini
                </p>

                <h3>
                    {{ $statusCrowd }}
                </h3>

                <div class="crowd-number">
                    <strong>
                        Jumlah Pengunjung:
                    </strong>

                    {{ $pengunjungHariIni }}
                </div>

            </div>

        </div>

    </div>

</div>

</section>


<!-- =========================
     FASILITAS
========================== -->

<section class="home-section" style="background: #F7FBFD;">

    <div class="container">

        <h2 class="section-title">
            Fasilitas Wisata
        </h2>

        <div class="row g-4">

            <div class="col-md-3 col-6">
                <div class="facility-card">
                    <div class="facility-icon">🚗</div>
                    <h5>Area Parkir</h5>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="facility-card">
                    <div class="facility-icon">🚿</div>
                    <h5>Ruang Ganti</h5>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="facility-card">
                    <div class="facility-icon">🚻</div>
                    <h5>Toilet</h5>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="facility-card">
                    <div class="facility-icon">🍜</div>
                    <h5>Warung</h5>
                </div>
            </div>

        </div>

    </div>


</section>

<!-- =========================
     KRITIK & SARAN
========================== -->

<section id="kritik" class="home-section">


<div class="container">

    <h2 class="section-title text-center">
        Kritik & Saran
    </h2>

    <p class="text-center mb-4">
        Bantu kami meningkatkan kualitas destinasi wisata Mata Air Cigede dengan memberikan kritik atau saran Anda.
    </p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm mx-auto" style="max-width: 700px;">
        <div class="card-body p-4">

            <form action="{{ url('/kritik-saran') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <textarea
                        name="pesan"
                        class="form-control"
                        rows="5"
                        placeholder="Tulis kritik atau saran Anda di sini..."
                        required
                    ></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-cigede">
                        Kirim Komentar
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>


</section>


<!-- =========================
     GALERI WISATA
========================== -->

<section id="galeri" class="home-section">

    <div class="container">

        <h2 class="section-title">
            Galeri Wisata
        </h2>

        <div class="row g-4">

           @forelse($galeris as $galeri)

            <div class="col-md-4">

                <div class="gallery-card">

                    <a href="{{ route('galeri.show', $galeri->id) }}">

                        <img src="{{ asset('galeri/' . $galeri->gambar) }}"
                            alt="{{ $galeri->judul }}">

                    </a>

                    <div class="gallery-card-body">

                        <a href="{{ route('galeri.show', $galeri->id) }}"
                        class="text-decoration-none text-dark">

                            <h5>
                                {{ $galeri->judul }}
                            </h5>

                            <p class="mb-0">
                                {{ \Illuminate\Support\Str::limit($galeri->deskripsi, 80) }}
                            </p>

                        </a>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">

                <div class="alert alert-warning text-center">

                    Belum ada galeri wisata.

                </div>

            </div>

            @endforelse

        </div>

    </div>

</section>


<!-- =========================
     BERITA
========================== -->

<section id="berita" class="home-section" style="background: #F7FBFD;">

    <div class="container">

        <h2 class="section-title">
            Berita
        </h2>

        <div class="row g-4">

           @forelse($informasi as $item)

            <div class="col-md-4">

                <div class="news-card">

                    @if($item->foto)

                        <a href="{{ route('berita.show', $item->id) }}">

                            <img src="{{ asset('berita/' . $item->foto) }}"
                                class="img-fluid rounded mb-3"
                                style="height:200px;width:100%;object-fit:cover;">

                        </a>

                    @endif

                    <a href="{{ route('berita.show', $item->id) }}"
                    class="text-decoration-none text-dark">

                        <h5>
                            {{ $item->judul }}
                        </h5>

                        <p class="mb-0">
                            {{ Str::limit($item->isi, 120) }}
                        </p>

                    </a>

                </div>

            </div>

            @empty

            <div class="col-12">

                <div class="alert alert-warning text-center">

                    Belum ada informasi terbaru.

                </div>

            </div>

            @endforelse

        </div>

    </div>

</section>


<!-- =========================
     PROFIL DESTINASI
========================== -->

<section id="profil-destinasi" class="home-section">

    <div class="container">

        <h2 class="section-title">
            Profil Destinasi
        </h2>
        @if($profil)

            <div class="profile-card">

            <h3>{{ $profil->nama_destinasi }}</h3>

            <p>{{ $profil->deskripsi }}</p>

            <h5>Sejarah</h5>
            
            <p>{!! nl2br(e($profil->sejarah)) !!}</p>

            </div>

            @else

            <p>
                Profil destinasi belum tersedia.
            </p>

        @endif

    </div>

</section>
<!-- =========================
     KONTAK
========================== -->

<section id="kontak" class="home-section" style="background:#F7FBFD;">

<div class="container">

    <h2 class="section-title">Kontak</h2>

    <p style="color: var(--abu-teks); margin-bottom:35px;">
        Hubungi pengelola Mata Air Cigede melalui kontak berikut.
    </p>

    @if($kontakInfo)

        <div class="row">

            <div class="col-lg-6">

                <div class="contact-card">

                    <div class="contact-item">

                        <div class="contact-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>

                        <div>
                            <h5>Email</h5>
                            <p class="mb-0">
                                {{ $kontakInfo->email }}
                            </p>
                        </div>

                    </div>

                    <div class="contact-item">

                        <div class="contact-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>

                        <div>
                            <h5>No. HP</h5>
                            <p class="mb-3">
                                {{ $kontakInfo->no_hp }}
                            </p>

                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $kontakInfo->no_hp) }}"
                               target="_blank"
                               class="btn btn-success">

                                <i class="bi bi-whatsapp me-2"></i>
                                Hubungi via WhatsApp

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @else

        <div class="alert alert-info">
            Kontak belum tersedia.
        </div>

    @endif

</div>

</section>
<!-- ========================= 
        LOKASI 
 ========================== -->

<section id="lokasi" class="home-section">

<div class="container">

    <h2 class="section-title">Lokasi Wisata</h2>

    <p style="color: var(--abu-teks); margin-bottom:35px;">
        Temukan lokasi Mata Air Cigede melalui peta di bawah ini.
    </p>

    <div class="row g-4 align-items-start">

        <div class="col-lg-5">

            <div class="location-card">

                <h5>{{ $lokasi ? $lokasi->nama_lokasi : 'Lokasi Mata Air Cigede' }}</h5>

                <p>
                    {{ $lokasi ? $lokasi->alamat : '-' }}
                </p>

                @if($lokasi && $lokasi->google_maps_link)
                    <a href="{{ $lokasi->google_maps_link }}"
                       target="_blank"
                       class="btn btn-cigede">
                        Buka di Google Maps
                    </a>
                @endif

            </div>

        </div>

        <div class="col-lg-7">

            <div class="ratio ratio-16x9 shadow rounded overflow-hidden">

                @if($lokasi && $lokasi->google_maps_embed)
                    {!! $lokasi->google_maps_embed !!}
                @else
                    <div class="d-flex align-items-center justify-content-center h-100 bg-light text-muted">
                        <p class="m-0">Peta lokasi belum tersedia.</p>
                    </div>
                @endif

            </div>

        </div>

    </div>

</div>

</section>

<!-- =========================
     FOOTER
========================== -->

<div class="text-center mt-5 mb-3">

    <p>
        © 2026 Mata Air Cigede
    </p>

</div>

@endsection