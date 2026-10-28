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

    .preview-image {
        width: 180px;
        border-radius: 10px;
        margin-bottom: 12px;
        border: 1px solid #D8E4E8;
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
        Edit Berita
    </h1>

    <p>
        Perbarui berita terbaru mengenai Mata Air Cigede.
    </p>

</div>


<!-- FORM -->

<div class="form-card">

    <form action="/admin/informasi/{{ $informasi->id }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')


        <!-- JUDUL -->

        <div class="mb-4">

            <label class="form-label">
                Judul Berita
            </label>

            <input type="text"
                   name="judul"
                   class="form-control"
                   value="{{ $informasi->judul }}"
                   required>

        </div>


        <!-- FOTO BERITA -->

        <div class="mb-4">

            <label class="form-label">
                Foto Berita
            </label>

            @if($informasi->foto)
                <div>
                    <img src="{{ asset('berita/' . $informasi->foto) }}"
                         alt="Foto Berita"
                         class="preview-image">
                </div>
            @endif

            <input type="file"
                   name="foto"
                   class="form-control"
                   accept="image/*">

            <small class="text-muted">
                Kosongkan jika tidak ingin mengganti foto.
            </small>

        </div>


        <!-- ISI -->

        <div class="mb-4">

            <label class="form-label">
                Isi Berita
            </label>

            <textarea name="isi"
                      class="form-control"
                      rows="7"
                      required>{{ $informasi->isi }}</textarea>

        </div>


        <!-- TOMBOL -->

        <div class="form-actions">

            <button type="submit"
                    class="btn-update">

                <i class="bi bi-save"></i>

                Simpan Perubahan

            </button>


            <a href="/admin/informasi"
               class="btn-cancel">

                <i class="bi bi-arrow-left"></i>

                Batal

            </a>

        </div>

    </form>

</div>


</div>

@endsection
