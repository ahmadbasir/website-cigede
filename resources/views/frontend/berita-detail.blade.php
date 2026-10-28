@extends('layouts.app')

@section('content')

<div class="container py-5">

<a href="javascript:history.back()" class="btn btn-secondary mb-4">
    ← Kembali ke Berita
</a>

@if($berita->foto)
    <img src="{{ asset('berita/' . $berita->foto) }}"
         class="img-fluid rounded shadow mb-4"
         alt="{{ $berita->judul }}">
@endif

<h2 class="mb-3">{{ $berita->judul }}</h2>

<p class="text-muted">
    {{ $berita->created_at->format('d F Y') }}
</p>

<p style="text-align: justify; line-height: 1.8;">
    {{ $berita->isi }}
</p>

</div>

@endsection
