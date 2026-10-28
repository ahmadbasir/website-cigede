@extends('admin.layouts.app')

@section('content')

<style>
    :root {
        --biru-tua: #0B3954;
        --biru-air: #087E8B;
        --abu-teks: #64748B;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .page-header h1 {
        color: var(--biru-tua);
        font-size: 30px;
        font-weight: 700;
        margin: 0;
    }

    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--biru-air);
        color: white;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-add:hover {
        background: var(--biru-tua);
        color: white;
    }

    .table-card {
        background: white;
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
        overflow: hidden;
    }

    .table thead {
        background: #F1F5F9;
    }

    .table thead th {
        color: var(--biru-tua);
        font-weight: 600;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .action-buttons a,
    .action-buttons form {
        flex: 1;
    }

    .btn-edit,
    .btn-delete {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 10px 14px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.25s ease;
        cursor: pointer;
        border: none;
    }

    /* Edit - biru pias */
    .btn-edit {
        background: rgba(8, 126, 139, 0.12);
        color: #087E8B;
    }

    .btn-edit:hover,
    .btn-edit:focus,
    .btn-edit:active {
        background: #087E8B;
        color: white;
    }

    /* Hapus - merah pias */
    .btn-delete {
        background: rgba(220, 38, 38, 0.12);
        color: #DC2626;
    }

    .btn-delete:hover,
    .btn-delete:focus,
    .btn-delete:active {
        background: #DC2626;
        color: white;
    }
</style>

<div class="page-header">

<h1>Kelola Lokasi</h1>

<a href="{{ route('admin.lokasi.create') }}" class="btn-add">
    <i class="bi bi-plus"></i>
    Tambah Lokasi
</a>

</div>

@if(session('success')) <div class="alert alert-success">
{{ session('success') }} </div>
@endif

<div class="table-card">
    <div class="card-body">

    <table class="table table-bordered align-middle mb-0">
        <thead>
            <tr>
                <th width="60">No</th>
                <th>Nama Lokasi</th>
                <th>Alamat</th>
                <th width="220">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($lokasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_lokasi }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>

                        <div class="action-buttons">

                            <!-- TOMBOL EDIT -->
                            <a href="{{ route('admin.lokasi.edit', $item->id) }}"
                               class="btn-edit">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>

                            <!-- TOMBOL HAPUS -->
                            <form action="{{ route('admin.lokasi.delete', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Apakah kamu yakin ingin menghapus lokasi ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-delete">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                </button>
                            </form>

                        </div>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">
                        Belum ada data lokasi.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</div>

@endsection
