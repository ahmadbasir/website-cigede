@extends('admin.layouts.app')

@section('content')

<style>

    :root {
        --biru-tua: #0B3954;
        --biru-air: #087E8B;
        --biru-muda: #E8F8FC;
        --abu-teks: #64748B;
    }

    .page-header {
        margin-bottom: 35px;
    }

    .page-header h1 {
        color: var(--biru-tua);
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .page-header p {
        color: var(--abu-teks);
        margin: 0;
    }

    .form-card {
        max-width: 850px;
        background: white;
        border: none;
        border-radius: 12px;
        padding: 35px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
    }

    .form-label {
        color: var(--biru-tua);
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control {
        border: 1px solid #D8E4E8;
        border-radius: 7px;
        padding: 12px 14px;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: var(--biru-air);
        box-shadow: 0 0 0 3px rgba(8, 126, 139, 0.12);
    }

    .upload-box {
        background: var(--biru-muda);
        border: 2px dashed #9ED8E3;
        border-radius: 8px;
        padding: 20px;
    }

    .upload-box small {
        display: block;
        color: var(--abu-teks);
        margin-top: 8px;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 30px;
    }

    .btn-save {
        background: var(--biru-air);
        color: white;
        border: none;
        padding: 11px 24px;
        border-radius: 7px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-save:hover {
        background: var(--biru-tua);
        color: white;
    }

    .btn-back {
        background: #EEF3F5;
        color: var(--biru-tua);
        text-decoration: none;
        padding: 11px 24px;
        border-radius: 7px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-back:hover {
        background: #DCE9ED;
        color: var(--biru-tua);
    }

    @media (max-width: 768px) {

        .page-header h1 {
            font-size: 27px;
        }

        .form-card {
            padding: 22px;
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
            Tambah Foto Galeri
        </h1>

        <p>
            Tambahkan foto dan informasi dokumentasi wisata Mata Air Cigede.
        </p>

    </div>


    <!-- FORM -->

    <div class="form-card">

        <form action="/admin/galeri/store"
              method="POST"
              enctype="multipart/form-data">

            @csrf


            <!-- JUDUL FOTO -->

            <div class="mb-4">

                <label class="form-label">
                    Judul Foto
                </label>

                <input type="text"
                       name="judul"
                       class="form-control"
                       placeholder="Masukkan judul foto"
                       required>

            </div>


            <!-- UPLOAD GAMBAR -->

            <div class="mb-4">

                <label class="form-label">
                    Upload Gambar
                </label>

                <div class="upload-box">

                    <input type="file"
                           name="gambar"
                           class="form-control"
                           required>

                    <small>
                        Pilih gambar yang akan ditambahkan ke galeri wisata.
                    </small>

                </div>

            </div>


            <!-- DESKRIPSI -->

            <div class="mb-4">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="5"
                          placeholder="Masukkan deskripsi foto"></textarea>

            </div>


            <!-- BUTTON -->

            <div class="form-actions">

                <button type="submit"
                        class="btn-save">

                    <i class="bi bi-check-lg"></i>

                    Simpan

                </button>

                <a href="/admin/galeri"
                   class="btn-back">

                    <i class="bi bi-arrow-left"></i>

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection