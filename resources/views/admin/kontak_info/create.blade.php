@extends('admin.layouts.app')

@section('content')

<h1 class="mb-4">Tambah Kontak</h1>

<div class="card">
    <div class="card-body">

        <form action="{{ route('admin.kontak.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nomor HP / WhatsApp</label>
                <input type="text" name="no_hp" class="form-control" required>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.kontak.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection