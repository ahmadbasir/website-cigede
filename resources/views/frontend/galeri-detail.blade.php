@extends('layouts.app')

@section('content')

<div class="container py-5">

<a href="javascript:history.back()" class="btn btn-secondary mb-4">
    ← Kembali ke Galeri
</a>

<img src="{{ asset('galeri/' . $galeri->gambar) }}"
     class="img-fluid rounded shadow mb-4"
     alt="{{ $galeri->judul }}">

<h2 class="mb-3">{{ $galeri->judul }}</h2>

<p class="text-muted">
    {{ $galeri->created_at->format('d F Y') }}
</p>

<p style="text-align: justify;">
    {{ $galeri->deskripsi }}
</p>

</div>

@endsection
