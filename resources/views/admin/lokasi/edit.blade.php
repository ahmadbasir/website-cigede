@extends('admin.layouts.app')

@section('content')

<h1 class="mb-4">Edit Lokasi</h1>

<div class="card">
    <div class="card-body">

        <form action="{{ route('admin.lokasi.update', $lokasi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Lokasi</label>
                <input type="text"
                       name="nama_lokasi"
                       class="form-control"
                       value="{{ $lokasi->nama_lokasi }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat"
                          class="form-control"
                          rows="3"
                          required>{{ $lokasi->alamat }}</textarea>
            </div>

            <div class="mb-3">
                <label>Google Maps Embed</label>
                <textarea name="google_maps_embed"
                          class="form-control"
                          rows="4"
                          required>{{ $lokasi->google_maps_embed }}</textarea>
            </div>

            <div class="mb-3">
                <label>Google Maps Link</label>
                <input type="text"
                       name="google_maps_link"
                       class="form-control"
                       value="{{ $lokasi->google_maps_link }}"
                       required>
            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('admin.lokasi.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection