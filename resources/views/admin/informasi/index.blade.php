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
       CARD BERITA
    ========================== */

    .information-container {
        background: white;
        border: none;
        border-radius: 12px;
        padding: 10px 30px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
    }

    .information-item {
        display: flex;
        gap: 20px;
        padding: 25px 0;
        border-bottom: 1px solid #E5EDF0;
    }

    .information-item:last-child {
        border-bottom: none;
    }

    .information-image {
        width: 170px;
        height: 110px;
        border-radius: 10px;
        object-fit: cover;
        border: 1px solid #D8E4E8;
        flex-shrink: 0;
    }

    .information-content {
        flex: 1;
    }

    .information-item h4 {
        color: var(--biru-tua);
        font-size: 21px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .information-item p {
        color: var(--abu-teks);
        line-height: 1.7;
        margin: 0;
    }


    /* =========================
       TOMBOL AKSI
    ========================== */

    .information-actions {
        display: flex;
        gap: 10px;
        margin-top: 18px;
    }

    .btn-edit,
    .btn-delete {
        padding: 9px 16px;
        border-radius: 6px;
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

    .empty-information {
        padding: 55px 20px;
        text-align: center;
        color: var(--abu-teks);
    }

    .empty-information i {
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

        .information-container {
            padding: 10px 20px;
        }

        .information-item {
            flex-direction: column;
        }

        .information-image {
            width: 100%;
            height: 200px;
        }

        .information-actions {
            flex-direction: column;
        }

        .btn-edit,
        .btn-delete {
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
            Kelola Berita
        </h1>

        <p>
            Kelola berita terbaru mengenai Mata Air Cigede.
        </p>

    </div>


    <a href="/admin/informasi/create"
       class="btn-add">

        <i class="bi bi-plus-lg"></i>

        Tambah Berita

    </a>

</div>


<!-- DAFTAR BERITA -->

<div class="information-container">

    @forelse($informasi as $item)

        <div class="information-item">

            @if($item->foto)
                <img src="{{ asset('berita/' . $item->foto) }}"
                     alt="Foto Berita"
                     class="information-image">
            @else
                <img src="https://via.placeholder.com/170x110?text=Berita"
                     alt="Tidak ada foto"
                     class="information-image">
            @endif


            <div class="information-content">

                <h4>
                    {{ $item->judul }}
                </h4>

                <p>
                    {{ Str::limit($item->isi, 180) }}
                </p>


                <!-- TOMBOL AKSI -->

                <div class="information-actions">

                    <!-- TOMBOL EDIT -->

                    <a href="/admin/informasi/{{ $item->id }}/edit"
                       class="btn-edit">

                        <i class="bi bi-pencil-square"></i>

                        Edit

                    </a>


                    <!-- TOMBOL HAPUS -->

                    <form action="/admin/informasi/{{ $item->id }}"
                          method="POST"
                          onsubmit="return confirm('Apakah kamu yakin ingin menghapus berita ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn-delete">

                            <i class="bi bi-trash"></i>

                            Hapus

                        </button>

                    </form>

                </div>

            </div>

        </div>


    @empty


        <div class="empty-information">

            <i class="bi bi-newspaper"></i>

            <h5>
                Belum Ada Data Berita
            </h5>

            <p class="mb-0">
                Silakan tambahkan berita terbaru melalui tombol Tambah Berita.
            </p>

        </div>


    @endforelse

</div>


</div>

@endsection
