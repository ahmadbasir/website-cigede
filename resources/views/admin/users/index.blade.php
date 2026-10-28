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

    .page-header h1 {
        color: var(--biru-tua);
        font-size: 30px;
        font-weight: 700;
        margin: 0;
    }

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

    .btn-save {
        background: var(--biru-air);
        color: white;
        border: none;
        padding: 12px 22px;
        border-radius: 8px;
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
    <h1>Kelola Akun</h1>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="form-card">

    <form action="{{ route('admin.users.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ $user?->email }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password Baru</label>
            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Kosongkan jika tidak ingin mengganti password">
        </div>

        <div class="mb-4">
            <label class="form-label">Konfirmasi Password Baru</label>
            <input type="password"
                   name="password_confirmation"
                   class="form-control"
                   placeholder="Ulangi password baru">
        </div>

        <button type="submit" class="btn-save">
            Simpan Perubahan
        </button>

    </form>

</div>

</div>

@endsection
