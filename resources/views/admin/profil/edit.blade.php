@extends('admin.layouts.app')

@section('content')

<style>

    :root {
        --biru-tua: #0B3954;
        --biru-air: #087E8B;
        --biru-muda: #E8F8FC;
        --abu-teks: #64748B;
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
        margin-top: 8px;
    }


    /* =========================
       FORM CARD
    ========================== */

    .form-card {
        background: white;
        border: none;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
    }

    .form-label {
        color: var(--biru-tua);
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control {
        border: 1px solid #CBD5E1;
        border-radius: 7px;
        padding: 12px 14px;
    }

    .form-control:focus {
        border-color: var(--biru-air);
        box-shadow: 0 0 0 3px rgba(8, 126, 139, 0.15);
    }


    /* =========================
       TOMBOL
    ========================== */

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 25px;
    }

    .btn-update {
        background: var(--biru-air);
        color: white;
        border: none;
        padding: 12px 22px;
        border-radius: 7px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-update:hover {
        background: var(--biru-tua);
    }

    .btn-cancel {
        background: #E2E8F0;
        color: #475569;
        padding: 12px 22px;
        border-radius: 7px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-cancel:hover {
        background: #CBD5E1;
        color: #334155;
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 768px) {

        .page-header h1 {
            font-size: 27px;
        }

        .form-card {
            padding: 20px;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-update,
        .btn-cancel {
            width: 100%;
            text-align: center;
        }

    }

</style>


<div class="container-fluid px-0">


    <!-- HEADER -->

    <div class="page-header">

        <h1>
            Edit Profil Destinasi
        </h1>

        <p>
            Perbarui informasi utama mengenai destinasi wisata Mata Air Cigede.
        </p>

    </div>


    <!-- FORM -->

    <div class="form-card">

        <form action="/admin/profil/{{ $profile->id }}"
              method="POST">

            @csrf

            @method('PUT')


            <!-- NAMA DESTINASI -->

            <div class="mb-3">

                <label class="form-label">
                    Nama Destinasi
                </label>

                <input type="text"
                       name="nama_destinasi"
                       class="form-control"
                       value="{{ $profile->nama_destinasi }}"
                       required>

            </div>

        <!-- DESKRIPSI -->

        <div class="mb-3">

            <label class="form-label">
                Deskripsi
            </label>

            <textarea name="deskripsi"
                      class="form-control"
                      rows="8"
                      required>{{ old('deskripsi', $profile->deskripsi) }}</textarea>

         </div>

        <!-- SEJARAH -->

        <div class="mb-3">

            <label class="form-label">
                Sejarah
            </label>

            <textarea name="sejarah"
                      class="form-control"
                      rows="10"
                      required>{{ old('sejarah', $profile->sejarah) }}</textarea>

        </div>

            <!-- TOMBOL -->

            <div class="form-actions">

                <button type="submit"
                        class="btn-update">

                    <i class="bi bi-save"></i>

                    Simpan Perubahan

                </button>


                <a href="/admin/profil"
                   class="btn-cancel">

                    <i class="bi bi-arrow-left"></i>

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection