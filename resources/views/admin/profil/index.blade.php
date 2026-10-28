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
       CARD PROFIL
    ========================== */

    .profile-container {
        background: white;
        border: none;
        border-radius: 12px;
        padding: 10px 30px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
    }

    .profile-item {
        padding: 28px 0;
        border-bottom: 1px solid #E5EDF0;
    }

    .profile-item:last-child {
        border-bottom: none;
    }

    .profile-item h4 {
        color: var(--biru-tua);
        font-size: 23px;
        font-weight: 700;
        margin-bottom: 14px;
    }

    .profile-item p {
        color: var(--abu-teks);
        line-height: 1.8;
        margin: 0;
    }


    /* =========================
       TOMBOL AKSI
    ========================== */

    .profile-actions {
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

    .empty-profile {
        padding: 55px 20px;
        text-align: center;
        color: var(--abu-teks);
    }

    .empty-profile i {
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

        .profile-container {
            padding: 10px 20px;
        }

        .profile-actions {
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
                Kelola Profil Destinasi
            </h1>

            <p>
                Kelola informasi utama mengenai destinasi wisata Mata Air Cigede.
            </p>

        </div>


        <a href="/admin/profil/create"
           class="btn-add">

            <i class="bi bi-plus-lg"></i>

            Tambah Profil

        </a>

    </div>


    <!-- DAFTAR PROFIL -->

    <div class="profile-container">

        @forelse($profiles as $item)

            <div class="profile-item">

                <h4>
                    {{ $item->nama_destinasi }}
                </h4>

                <p>
                    {{ $item->deskripsi }}
                </p>


                <!-- TOMBOL AKSI -->

                <div class="profile-actions">


                    <!-- TOMBOL EDIT -->

                    <a href="/admin/profil/{{ $item->id }}/edit"
                       class="btn-edit">

                        <i class="bi bi-pencil-square"></i>

                        Edit

                    </a>


                    <!-- TOMBOL HAPUS -->

                    <form action="/admin/profil/{{ $item->id }}"
                          method="POST"
                          onsubmit="return confirm('Apakah kamu yakin ingin menghapus profil ini?')">

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


        @empty


            <div class="empty-profile">

                <i class="bi bi-building"></i>

                <h5>
                    Belum Ada Profil Destinasi
                </h5>

                <p class="mb-0">
                    Silakan tambahkan profil destinasi melalui tombol Tambah Profil.
                </p>

            </div>


        @endforelse

    </div>

</div>

@endsection