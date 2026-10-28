@extends('admin.layouts.app')

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
       HEADER DASHBOARD
    ========================== */

    .dashboard-header {
        margin-bottom: 35px;
    }

    .dashboard-header h1 {
        color: var(--biru-tua);
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .dashboard-header p {
        color: var(--abu-teks);
        margin: 0;
    }


    /* =========================
       STATISTIK
    ========================== */

    .stat-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        background: white;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
        transition: 0.3s;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }

    .stat-card-body {
        padding: 25px;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background: var(--biru-muda);
        color: var(--biru-air);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        flex-shrink: 0;
    }

    .stat-card h6 {
        color: var(--abu-teks);
        margin-bottom: 8px;
        font-weight: 600;
    }

    .stat-card h2 {
        color: var(--biru-tua);
        font-weight: 700;
        margin: 0;
    }


    /* =========================
       MENU CARD
    ========================== */

    .menu-card {
        height: 100%;
        border: none;
        border-radius: 12px;
        background: white;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
        transition: 0.3s;
    }

    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }

    .menu-card-body {
        padding: 28px;
    }

    .menu-icon {
        width: 55px;
        height: 55px;
        border-radius: 10px;
        background: var(--biru-muda);
        color: var(--biru-air);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
        margin-bottom: 18px;
    }

    .menu-card h3 {
        color: var(--biru-tua);
        font-size: 21px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .menu-card p {
        color: var(--abu-teks);
        min-height: 48px;
        line-height: 1.6;
    }

    .btn-admin {
        display: inline-block;
        background: var(--biru-air);
        color: white;
        text-decoration: none;
        padding: 10px 18px;
        border-radius: 6px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-admin:hover {
        background: var(--biru-tua);
        color: white;
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 768px) {

        .dashboard-header h1 {
            font-size: 27px;
        }

        .stat-card-body {
            padding: 20px;
        }

        .menu-card-body {
            padding: 22px;
        }

    }

</style>


<div class="container-fluid px-0">


    <!-- HEADER DASHBOARD -->

    <div class="dashboard-header">

        <h1>
            Dashboard Admin
        </h1>

        <p>
            Kelola informasi dan konten wisata Mata Air Cigede melalui dashboard admin.
        </p>

    </div>


    <!-- STATISTIK -->

    <div class="row g-4 mb-5">


        <!-- TOTAL PENGUNJUNG -->

        <div class="col-md-4">

            <div class="stat-card">

                <div class="stat-card-body">

                    <div class="stat-icon">
                        👥
                    </div>

                    <div>

                        <h6>
                            Total Pengunjung
                        </h6>

                        <h2>
                            {{ $totalPengunjung }}
                        </h2>

                    </div>

                </div>

            </div>

        </div>


        <!-- PENGUNJUNG HARI INI -->

        <div class="col-md-4">

            <div class="stat-card">

                <div class="stat-card-body">

                    <div class="stat-icon">
                        📅
                    </div>

                    <div>

                        <h6>
                            Pengunjung Hari Ini
                        </h6>

                        <h2>
                            {{ $pengunjungHariIni }}
                        </h2>

                    </div>

                </div>

            </div>

        </div>


        <!-- CROWD METER -->

        <div class="col-md-4">

            <div class="stat-card">

                <div class="stat-card-body">

                    <div class="stat-icon">
                        📊
                    </div>

                    <div>

                        <h6>
                            Crowd Meter
                        </h6>

                        <h2>
                            {{ $crowdMeter }}
                        </h2>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- INFORMASI DASHBOARD -->

<div class="row">

    <div class="col-12">

        <div class="menu-card">

            <div class="menu-card-body">

                <div class="menu-icon">
                    👋
                </div>

                <h3>
                    Selamat Datang di Dashboard Admin
                </h3>

                <p>
                    Dashboard ini digunakan untuk mengelola seluruh informasi
                    Destinasi Wisata Mata Air Cigede. Melalui menu navigasi di
                    sebelah kiri, admin dapat mengelola berbagai data yang akan
                    ditampilkan pada website.
                </p>

                <hr>

                <h5 class="fw-bold mb-3" style="color: var(--biru-tua);">
                    Fitur yang dapat dikelola
                </h5>

                <div class="row">

                    <div class="col-md-6">

                        <ul class="list-unstyled">

                            <li class="mb-2">✔ Kelola Galeri</li>

                            <li class="mb-2">✔ Kelola Berita</li>

                            <li class="mb-2">✔ Kelola Kondisi Wisata</li>

                            <li class="mb-2">✔ Kelola Profil Destinasi</li>

                        </ul>

                    </div>

                    <div class="col-md-6">

                        <ul class="list-unstyled">

                            <li class="mb-2">✔ Data Pengunjung</li>

                            <li class="mb-2">✔ Kritik & Saran</li>

                            <li class="mb-2">✔ Kelola Lokasi</li>

                        </ul>

                    </div>

                </div>

                <div class="alert alert-info mt-4 mb-0">

                    <strong>Petunjuk:</strong>
                    Gunakan menu navigasi di sebelah kiri untuk mengelola data
                    dan informasi Destinasi Wisata Mata Air Cigede.

                </div>

            </div>

        </div>

    </div>

</div>

    </div>

</div>

@endsection