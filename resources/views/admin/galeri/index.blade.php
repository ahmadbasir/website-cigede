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
       HEADER HALAMAN
    ========================== */

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
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

    .btn-add {
        background: var(--biru-air);
        color: white;
        text-decoration: none;
        padding: 12px 20px;
        border-radius: 7px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-add:hover {
        background: var(--biru-tua);
        color: white;
    }


    /* =========================
       CARD GALERI
    ========================== */

    .gallery-card {
        height: 100%;
        border: none;
        border-radius: 12px;
        overflow: hidden;
        background: white;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
        transition: 0.3s;
    }

    .gallery-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.13);
    }

    .gallery-image-wrapper {
        position: relative;
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

    .gallery-card-body {
        padding: 22px;
    }

    .gallery-card-body h5 {
        color: var(--biru-tua);
        font-weight: 700;
        margin-bottom: 12px;
    }

    .gallery-card-body p {
        color: var(--abu-teks);
        line-height: 1.6;
        margin-bottom: 0;
    }


    /* =========================
       TOMBOL AKSI
    ========================== */

    .gallery-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .btn-edit,
    .btn-delete {
        flex: 1;
        padding: 10px;
        border-radius: 6px;
        text-align: center;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-edit {
        background: var(--biru-muda);
        color: var(--biru-air);
    }

    .btn-edit:hover {
        background: var(--biru-air);
        color: white;
    }

    .btn-delete {
        background: #FEE2E2;
        color: #DC2626;
        border: none;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: #DC2626;
        color: white;
    }


    /* =========================
       EMPTY STATE
    ========================== */

    .empty-gallery {
        background: white;
        border: none;
        border-radius: 12px;
        padding: 50px 20px;
        text-align: center;
        color: var(--abu-teks);
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
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

        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
        }

        .page-header h1 {
            font-size: 27px;
        }

        .btn-add {
            width: 100%;
            text-align: center;
        }

    }

</style>


<div class="container-fluid px-0">


    <!-- HEADER -->

    <div class="page-header">

        <div>

            <h1>
                Kelola Galeri
            </h1>

            <p>
                Kelola foto dan dokumentasi wisata Mata Air Cigede.
            </p>

        </div>


        <a href="/admin/galeri/create"
           class="btn-add">

            <i class="bi bi-plus-lg"></i>

            Tambah Foto

        </a>

    </div>


    <!-- GALERI -->

    <div class="row g-4">

        @forelse($galeris as $galeri)

            <div class="col-md-4">

                <div class="gallery-card">


                    <!-- GAMBAR -->

                    <div class="gallery-image-wrapper">

                        <img src="{{ asset('galeri/' . $galeri->gambar) }}"
                             class="gallery-image"
                             alt="{{ $galeri->judul }}">

                    </div>


                    <!-- INFORMASI -->

                    <div class="gallery-card-body">

                        <h5>
                            {{ $galeri->judul }}
                        </h5>

                        <p>
                            {{ $galeri->deskripsi }}
                        </p>


                        <!-- TOMBOL AKSI -->

                        <div class="gallery-actions">


                            <!-- TOMBOL EDIT -->

                            <a href="/admin/galeri/{{ $galeri->id }}/edit"
                               class="btn-edit">

                                <i class="bi bi-pencil-square"></i>

                                Edit

                            </a>


                            <!-- TOMBOL HAPUS -->

                            <form action="/admin/galeri/{{ $galeri->id }}"
                                  method="POST"
                                  style="flex: 1;"
                                  onsubmit="return confirm('Apakah kamu yakin ingin menghapus foto ini?')">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn-delete"
                                        style="width: 100%;">

                                    <i class="bi bi-trash"></i>

                                    Hapus

                                </button>

                            </form>


                        </div>

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
                        Silakan tambahkan foto wisata melalui tombol Tambah Foto.
                    </p>

                </div>

            </div>


        @endforelse

    </div>

</div>

@endsection