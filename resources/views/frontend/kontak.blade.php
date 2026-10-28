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
       HALAMAN KONTAK
    ========================== */

    .contact-section {
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

    .contact-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .contact-header h1 {
        color: var(--biru-tua);
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .contact-header p {
        color: var(--abu-teks);
        margin: 0;
    }


    /* =========================
       CARD KONTAK
    ========================== */

    .contact-card {
        max-width: 850px;
        margin: auto;
        background: white;
        border: none;
        border-radius: 14px;
        padding: 35px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }


    /* =========================
       ITEM KONTAK
    ========================== */

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 18px;
        padding: 20px 0;
        border-bottom: 1px solid #E5EDF0;
    }

    .contact-item:last-of-type {
        border-bottom: none;
    }

    .contact-icon {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        background: var(--biru-muda);
        color: var(--biru-air);
        border-radius: 10px;
        font-size: 21px;
    }

    .contact-item h4 {
        color: var(--biru-tua);
        font-size: 18px;
        font-weight: 700;
        margin: 0 0 6px;
    }

    .contact-item p {
        color: var(--abu-teks);
        margin: 0;
        line-height: 1.6;
    }


    /* =========================
       TOMBOL MAPS
    ========================== */

    .map-button-wrapper {
        margin-top: 25px;
    }

    .btn-map {
        display: inline-block;
        background: var(--biru-air);
        color: white;
        text-decoration: none;
        padding: 13px 22px;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-map:hover {
        background: var(--biru-tua);
        color: white;
        transform: translateY(-2px);
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 768px) {

        .contact-section {
            padding: 40px 15px;
        }

        .contact-header h1 {
            font-size: 27px;
        }

        .contact-card {
            padding: 25px 20px;
        }

        .contact-item {
            gap: 14px;
        }

    }

</style>


<section class="contact-section">


    <!-- HEADER -->

    <div class="contact-header">

        <h1>
            Kontak & Lokasi Wisata
        </h1>

        <p>
            Temukan informasi kontak dan lokasi Wisata Mata Air Cigede.
        </p>

    </div>


    <!-- CARD KONTAK -->

    <div class="contact-card">


        <!-- ALAMAT -->

        <div class="contact-item">

            <div class="contact-icon">

                <i class="bi bi-geo-alt-fill"></i>

            </div>

            <div>

                <h4>
                    Alamat
                </h4>

                <p>
                    Mata Air Cigede, Kabupaten Garut
                </p>

            </div>

        </div>


        <!-- NOMOR HP -->

        <div class="contact-item">

            <div class="contact-icon">

                <i class="bi bi-telephone-fill"></i>

            </div>

            <div>

                <h4>
                    No. HP
                </h4>

                <p>
                    08xxxxxxxxxx
                </p>

            </div>

        </div>


        <!-- INSTAGRAM -->

        <div class="contact-item">

            <div class="contact-icon">

                <i class="bi bi-instagram"></i>

            </div>

            <div>

                <h4>
                    Instagram
                </h4>

                <p>
                    @mataaircigede
                </p>

            </div>

        </div>

    <!-- GOOGLE MAPS -->

    <div class="contact-item">

        <div class="contact-icon">

            <i class="bi bi-map-fill"></i>

        </div>

        <div>

            <h4>Google Maps</h4>

            <p>Lihat lokasi Wisata Mata Air Cigede melalui Google Maps.</p>

        </div>

    </div>

    <!-- PETA GOOGLE MAPS -->

    <div class="map-button-wrapper">

        <iframe
            src="https://www.google.com/maps?q=-7.1542168,107.9150946&z=16&output=embed"
            width="100%"
            height="350"
            style="border:0; border-radius:10px;"
            allowfullscreen
            loading="lazy">
        </iframe>

    </div>

    <!-- TOMBOL LOKASI -->

    <div class="map-button-wrapper mt-3">

        <a href="https://www.google.com/maps?q=-7.1542168,107.9150946"
           target="_blank"
           class="btn-map">

            <i class="bi bi-geo-alt"></i>

            Buka di Google Maps

        </a>

    </div>

</section>

@endsection