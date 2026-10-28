@extends('admin.layouts.app')

@section('content')

<h1 class="mb-4">Edit Kontak</h1>

<div class="card">
    <div class="card-body">

        <form action="{{ route('admin.kontak.update', $kontak->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Email</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ $kontak->email }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Nomor HP / WhatsApp</label>
                <input type="text"
                       name="no_hp"
                       class="form-control"
                       value="{{ $kontak->no_hp }}"
                       required>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.kontak.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection