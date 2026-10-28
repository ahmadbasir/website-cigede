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
       HALAMAN REGISTRASI
    ========================== */

    .registration-section {
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

    .registration-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .registration-header h2 {
        color: var(--biru-tua);
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .registration-header p {
        color: var(--abu-teks);
        margin: 0;
    }


    /* =========================
       FORM CARD
    ========================== */

    .registration-card {
        max-width: 700px;
        margin: auto;
        background: white;
        border-radius: 14px;
        padding: 35px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }


    /* =========================
       FORM
    ========================== */

    .form-label {
        color: var(--biru-tua);
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control {
        border: 1px solid #CBD5E1;
        border-radius: 8px;
        padding: 12px 14px;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: var(--biru-air);
        box-shadow: 0 0 0 3px rgba(8, 126, 139, 0.15);
    }


    /* =========================
       ALERT
    ========================== */

    .alert-success {
        max-width: 700px;
        margin: 0 auto 25px;
        border: none;
        border-radius: 8px;
        background: #DCFCE7;
        color: #166534;
    }


    /* =========================
       TOMBOL
    ========================== */

    .btn-register {
        width: 100%;
        background: var(--biru-air);
        color: white;
        border: none;
        padding: 13px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 16px;
        transition: 0.3s;
    }

    .btn-register:hover {
        background: var(--biru-tua);
        color: white;
        transform: translateY(-2px);
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 768px) {

        .registration-section {
            padding: 40px 15px;
        }

        .registration-header h2 {
            font-size: 27px;
        }

        .registration-card {
            padding: 25px 20px;
        }

    }

</style>


<section class="registration-section">


    <!-- HEADER -->

    <div class="registration-header">

        <h2>
            Registrasi Kunjungan Wisata
        </h2>

        <p>
            Silakan isi data berikut untuk melakukan registrasi kunjungan ke Mata Air Cigede.
        </p>

    </div>


    <!-- PESAN SUKSES -->

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    <!-- FORM -->

    <div class="registration-card">

        <form action="/registrasi"
              method="POST">

            @csrf


            <!-- NAMA -->

            <div class="mb-3">

                <label class="form-label">
                    Nama
                </label>

                <input type="text"
                       name="nama"
                       class="form-control"
                       placeholder="Masukkan nama lengkap"
                       required>

            </div>


            <!-- NOMOR HP -->

            <div class="mb-3">

                <label class="form-label">
                    Nomor HP
                </label>

                <input type="text"
                       name="nomor_hp"
                       class="form-control"
                       placeholder="Masukkan nomor HP"
                       required>

            </div>


            <!-- ASAL DAERAH -->

            <div class="mb-3">

                <label class="form-label">
                    Asal Daerah
                </label>

                <input type="text"
                       name="asal_daerah"
                       class="form-control"
                       placeholder="Contoh: Garut"
                       required>

            </div>


            <!-- TANGGAL KUNJUNGAN -->

            <div class="mb-4">

                <label class="form-label">
                    Tanggal Kunjungan
                </label>

                <input type="date"
                       name="tanggal_kunjungan"
                       class="form-control"
                       required>

            </div>


            <!-- TOMBOL -->

            <button type="submit"
                    class="btn-register">

                <i class="bi bi-calendar-check"></i>

                Registrasi Kunjungan

            </button>

        </form>

    </div>

</section>

@endsection