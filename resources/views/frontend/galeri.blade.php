@extends('layouts.app')

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
       HALAMAN GALERI
    ========================== */

    .gallery-section {
        min-height: calc(100vh - 80px);
        padding: 60px 20px;
        background: linear-gradient(
            135deg,
            var(--biru-muda),
            #ffffff
        );
    }


    /* =========================
       HEADER
    ========================== */

    .gallery-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .gallery-header h1 {
        color: var(--biru-tua);
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .gallery-header p {
        color: var(--abu-teks);
        margin: 0;
    }


    /* =========================
       CARD GALERI
    ========================== */

    .gallery-card {
        height: 100%;
        border: none;
        border-radius: 14px;
        overflow: hidden;
        background: white;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: 0.3s;
    }

    .gallery-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.14);
    }


    /* =========================
       GAMBAR
    ========================== */

    .gallery-image-wrapper {
        overflow: hidden;
    }

    .gallery-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: 0.4s;
    }

    .gallery-card:hover .gallery-image {
        transform: scale(1.05);
    }


    /* =========================
       ISI CARD
    ========================== */

    .gallery-card-body {
        padding: 22px;
    }

    .gallery-card-body h5 {
        color: var(--biru-tua);
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .gallery-card-body p {
        color: var(--abu-teks);
        line-height: 1.7;
        margin: 0;
    }


    /* =========================
       EMPTY STATE
    ========================== */

    .empty-gallery {
        max-width: 700px;
        margin: auto;
        padding: 45px 20px;
        text-align: center;
        border: none;
        border-radius: 12px;
        background: white;
        color: var(--abu-teks);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .empty-gallery i {
        display: block;
        font-size: 50px;
        color: var(--biru-air);
        margin-bottom: 15px;
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 768px) {

        .gallery-section {
            padding: 40px 15px;
        }

        .gallery-header h1 {
            font-size: 27px;
        }

    }

</style>


<section class="gallery-section">


    <!-- HEADER -->

    <div class="gallery-header">

        <h1>
            Galeri Wisata Mata Air Cigede
        </h1>

        <p>
            Lihat berbagai dokumentasi keindahan Wisata Mata Air Cigede.
        </p>

    </div>


    <!-- DAFTAR GALERI -->

    <div class="row g-4">

        @forelse($galeris as $galeri)

<div class="col-md-4">

    <div class="gallery-card">

        <!-- GAMBAR -->

        <div class="gallery-image-wrapper">

            <a href="{{ route('galeri.show', $galeri->id) }}">

                <img src="{{ asset('galeri/' . $galeri->gambar) }}"
                     class="gallery-image"
                     alt="{{ $galeri->judul }}">

            </a>

        </div>

        <!-- INFORMASI -->

        <div class="gallery-card-body">

            <a href="{{ route('galeri.show', $galeri->id) }}"
               class="text-decoration-none text-dark">

                <h5>
                    {{ $galeri->judul }}
                </h5>

                <p>
                    {{ \Illuminate\Support\Str::limit($galeri->deskripsi, 80) }}
                </p>

            </a>

        </div>

    </div>

</div>

@empty

<div class="col-12">

    <div class="empty-gallery">

        <i class="bi bi-images"></i>

        <h5>
            Belum Ada Data Galeri
        </h5>

        <p class="mb-0">
            Belum ada dokumentasi foto wisata yang tersedia.
        </p>

    </div>

</div>

@endforelse

    </div>

</section>

@endsection