@extends('admin.layouts.app')

@section('content')

<style>
    :root {
        --biru-tua: #0B3954;
        --biru-air: #087E8B;
        --abu-teks: #64748B;
    }

    .page-header {
        margin-bottom: 30px;
    }

    .page-header h1 {
        color: var(--biru-tua);
        font-size: 32px;
        font-weight: 700;
    }

    .page-header p {
        color: var(--abu-teks);
        margin-top: 8px;
    }

    .form-card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 5px 18px rgba(0,0,0,0.07);
        max-width: 850px;
    }

    .form-label {
        color: var(--biru-tua);
        font-weight: 600;
    }

    .form-control,
    .form-select {
        border-radius: 7px;
        padding: 12px 14px;
    }

    .btn-save {
        background: var(--biru-air);
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 7px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-save:hover {
        background: var(--biru-tua);
        color: white;
    }
</style>

<div class="container-fluid px-0">


<div class="page-header">
    <h1>Kelola Kondisi Wisata</h1>
    <p>Perbarui kondisi wisata terkini yang akan ditampilkan di halaman beranda.</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="form-card">

    <form action="/admin/kondisi/update" method="POST">
        @csrf

        <!-- STATUS AIR -->
        <div class="mb-4">
            <label class="form-label">Status Air</label>
            <select name="status_air" class="form-select">
                <option value="Jernih" {{ ($kondisi->status_air ?? '') == 'Jernih' ? 'selected' : '' }}>Jernih</option>
                <option value="Sedikit Keruh" {{ ($kondisi->status_air ?? '') == 'Sedikit Keruh' ? 'selected' : '' }}>Sedikit Keruh</option>
                <option value="Keruh" {{ ($kondisi->status_air ?? '') == 'Keruh' ? 'selected' : '' }}>Keruh</option>
            </select>
        </div>

        <!-- KONDISI CUACA -->
        <div class="mb-4">
            <label class="form-label">Kondisi Cuaca</label>
            <select name="kondisi_cuaca" class="form-select">
                <option value="Cerah" {{ ($kondisi->kondisi_cuaca ?? '') == 'Cerah' ? 'selected' : '' }}>Cerah</option>
                <option value="Mendung" {{ ($kondisi->kondisi_cuaca ?? '') == 'Mendung' ? 'selected' : '' }}>Mendung</option>
                <option value="Hujan" {{ ($kondisi->kondisi_cuaca ?? '') == 'Hujan' ? 'selected' : '' }}>Hujan</option>
            </select>
        </div>

        <!-- STATUS OPERASIONAL -->
        <div class="mb-4">
            <label class="form-label">Status Operasional</label>
            <select name="status_operasional" class="form-select">
                <option value="Buka" {{ ($kondisi->status_operasional ?? '') == 'Buka' ? 'selected' : '' }}>Buka</option>
                <option value="Tutup" {{ ($kondisi->status_operasional ?? '') == 'Tutup' ? 'selected' : '' }}>Tutup</option>
            </select>
        </div>

        <!-- INFORMASI KHUSUS -->
        <div class="mb-4">
            <label class="form-label">Informasi Khusus</label>
            <textarea name="informasi_khusus"
                      class="form-control"
                      rows="4"
                      placeholder="Contoh: Akses menuju lokasi sedang dalam perbaikan.">{{ $kondisi->informasi_khusus ?? '' }}</textarea>
        </div>

        <button type="submit" class="btn-save">
            <i class="bi bi-save"></i> Simpan Perubahan
        </button>

    </form>

</div>


</div>

@endsection
