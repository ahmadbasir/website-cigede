@extends('admin.layouts.app')

@section('content')

<style>
    :root {
        --biru-tua: #0B3954;
        --biru-air: #087E8B;
        --abu-teks: #64748B;
    }

    .page-header {
        margin-bottom: 25px;
    }

    .page-header h2 {
        color: var(--biru-tua);
        font-size: 30px;
        font-weight: 700;
        margin: 0;
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

    .btn-search {
        background: var(--biru-air);
        color: white;
        border: none;
        transition: 0.3s;
    }

    .btn-search:hover {
        background: var(--biru-tua);
        color: white;
    }

    .btn-reset {
        background: #E2E8F0;
        color: #475569;
        border: none;
        transition: 0.3s;
    }

    .btn-reset:hover {
        background: #CBD5E1;
        color: #334155;
    }

    .btn-export {
        background: rgba(220, 38, 38, 0.12);
        color: #DC2626;
        border: none;
        transition: 0.3s;
    }

    .btn-export:hover {
        background: #DC2626;
        color: white;
    }
</style>

<div class="container-fluid px-0">

<div class="page-header">
    <h2>Data Pengunjung</h2>
</div>

<!-- Form Pencarian + Filter + Export PDF -->
<form action="{{ url('/admin/pengunjung') }}" method="GET" class="mb-3">

    <div class="row g-2 align-items-center">

        <div class="col-md-5">
            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Cari nama, nomor HP, asal daerah, atau tanggal kunjungan..."
                   value="{{ $search ?? '' }}">
        </div>

        <div class="col-md-3">
            <select name="filter" class="form-select">
                <option value="harian" {{ request('filter') == 'harian' ? 'selected' : '' }}>
                    Per Hari
                </option>

                <option value="mingguan" {{ request('filter') == 'mingguan' ? 'selected' : '' }}>
                    Per Minggu
                </option>

                <option value="bulanan" {{ request('filter', 'bulanan') == 'bulanan' ? 'selected' : '' }}>
                    Per Bulan
                </option>

                <option value="tahunan" {{ request('filter') == 'tahunan' ? 'selected' : '' }}>
                    Per Tahun
                </option>
            </select>
        </div>

        <div class="col-md-4 text-end">
            <button type="submit" class="btn btn-search">
                Cari
            </button>

            <a href="{{ url('/admin/pengunjung') }}" class="btn btn-reset">
                Reset
            </a>

            <a href="{{ url('/admin/pengunjung/export-pdf?filter=' . request('filter', 'bulanan')) }}"
               class="btn btn-export">
                Export PDF
            </a>
        </div>

    </div>

</form>

<div class="table-card">
    <div class="card-body">

        <table class="table table-bordered align-middle mb-0">

            <thead>
                <tr>
                    <th width="60">No</th>
                    <th>Nama</th>
                    <th>Nomor HP</th>
                    <th>Asal Daerah</th>
                    <th>Tanggal Kunjungan</th>
                </tr>
            </thead>

            <tbody>

                @forelse($pengunjung as $item)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nomor_hp }}</td>
                        <td>{{ $item->asal_daerah }}</td>
                        <td>{{ $item->tanggal_kunjungan }}</td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center py-4">
                            Data pengunjung tidak ditemukan.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>
</div>

</div>

@endsection
