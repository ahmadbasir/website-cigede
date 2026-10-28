<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Informasi;

class BeritaController extends Controller
{
    public function index()
    {
        $informasi = Informasi::latest()->get();

        return view('frontend.berita', compact('informasi'));
    }

    public function show($id)
    {
        $berita = Informasi::findOrFail($id);

        return view('frontend.berita-detail', compact('berita'));
    }
}
