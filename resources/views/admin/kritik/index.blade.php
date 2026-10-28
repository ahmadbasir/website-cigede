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

    .table-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 5px 18px rgba(0,0,0,0.07);
    }

    .table thead {
        background: #F1F7F9;
    }

    .table thead th {
        color: var(--biru-tua);
        font-weight: 700;
        border: none;
    }

    .table td {
        vertical-align: middle;
    }

    .btn-delete {
        background: #FEE2E2;
        color: #DC2626;
        border: none;
        padding: 8px 14px;
        border-radius: 6px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-delete:hover {
        background: #DC2626;
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 50px 20px;
        color: var(--abu-teks);
    }

    .empty-state i {
        font-size: 48px;
        color: var(--biru-air);
        margin-bottom: 15px;
        display: block;
    }
</style>

<div class="container-fluid px-0">


<div class="page-header">
    <div>
        <h1>Kritik & Saran</h1>
        <p>Daftar komentar yang dikirim oleh pengunjung website.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-card">

    @if($komentar->count() > 0)

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>
                    <tr>
                        <th width="70">No</th>
                        <th>Komentar</th>
                        <th width="180">Tanggal</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($komentar as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $item->pesan }}</td>

                            <td>
                                {{ $item->created_at->format('d M Y H:i') }}
                            </td>

                            <td>

                                <form action="/admin/kritik/{{ $item->id }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus komentar ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-delete">
                                        <i class="bi bi-trash"></i>
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="empty-state">

            <i class="bi bi-chat-left-text"></i>

            <h5>Belum Ada Komentar</h5>

            <p class="mb-0">
                Komentar dari pengunjung akan muncul di halaman ini.
            </p>

        </div>

    @endif

</div>


</div>

@endsection
