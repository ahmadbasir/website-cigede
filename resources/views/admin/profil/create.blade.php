@extends('admin.layouts.app')

@section('content')

<style>

    :root {
        --biru-tua: #0B3954;
        --biru-air: #087E8B;
        --biru-muda: #E8F8FC;
        --abu-teks: #64748B;
        --border: #DCE7EB;
    }


    /* =========================
       HEADER HALAMAN
    ========================== */

    .page-header {
        margin-bottom: 35px;
    }

    .page-header h1 {
        color: var(--biru-tua);
        font-size: 32px;
        font-weight: 700;
        margin: 0;
    }

    .page-header p {
        color: var(--abu-teks);
        margin: 8px 0 0;
    }


    /* =========================
       FORM CARD
    ========================== */

    .form-container {
        background: white;
        border-radius: 12px;
        padding: 35px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
    }


    /* =========================
       LABEL
    ========================== */

    .form-label {
        color: var(--biru-tua);
        font-weight: 600;
        margin-bottom: 8px;
    }


    /* =========================
       INPUT & TEXTAREA
    ========================== */

    .form-control {
        border: 1px solid var(--border);
        border-radius: 7px;
        padding: 12px 14px;
        color: #334155;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: var(--biru-air);
        box-shadow: 0 0 0 3px rgba(8, 126, 139, 0.12);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }


    /* =========================
       BUTTON
    ========================== */

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 25px;
    }

    .btn-save {
        background: var(--biru-air);
        color: white;
        border: none;
        padding: 12px 22px;
        border-radius: 7px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-save:hover {
        background: var(--biru-tua);
        color: white;
    }

    .btn-back {
        background: #F1F5F9;
        color: var(--abu-teks);
        text-decoration: none;
        padding: 12px 22px;
        border-radius: 7px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-back:hover {
        background: #E2E8F0;
        color: var(--biru-tua);
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 768px) {

        .page-header h1 {
            font-size: 27px;
        }

        .form-container {
            padding: 25px 20px;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-save,
        .btn-back {
            width: 100%;
            text-align: center;
        }

    }

</style>


<div class="container-fluid px-0">


    <!-- HEADER -->

    <div class="page-header">

        <h1>
            Tambah Profil Destinasi
        </h1>

        <p>
            Tambahkan informasi utama mengenai destinasi wisata Mata Air Cigede.
        </p>

    </div>


    <!-- FORM -->

    <div class="form-container">

        <form action="/admin/profil/store" method="POST">

            @csrf


            <!-- NAMA DESTINASI -->

            <div class="mb-4">

                <label class="form-label">
                    Nama Destinasi
                </label>

                <input type="text"
                       name="nama_destinasi"
                       class="form-control"
                       placeholder="Masukkan nama destinasi"
                       value="{{ old('nama_destinasi') }}">

            </div>


            <!-- DESKRIPSI -->

            <div class="mb-4">

                <label class="form-label">
                    Deskripsi Destinasi
                </label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="5"
                          placeholder="Masukkan deskripsi destinasi">{{ old('deskripsi') }}</textarea>

            </div>


            <!-- SEJARAH -->

            <div class="mb-4">

                <label class="form-label">
                    Sejarah Destinasi
                </label>

                <textarea name="sejarah"
                          class="form-control"
                          rows="5"
                          placeholder="Masukkan sejarah destinasi">{{ old('sejarah') }}</textarea>

            </div>

            <!-- ACTION -->

            <div class="form-actions">

                <button type="submit"
                        class="btn-save">

                    <i class="bi bi-check-lg"></i>

                    Simpan Profil

                </button>


                <a href="/admin/profil"
                   class="btn-back">

                    <i class="bi bi-arrow-left"></i>

                    Kembali

                </a>

            </div>


        </form>

    </div>

</div>

@endsection