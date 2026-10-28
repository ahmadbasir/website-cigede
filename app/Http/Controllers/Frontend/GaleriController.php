<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();

        return view('frontend.galeri', compact('galeris'));
    }

    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('frontend.galeri-detail', compact('galeri'));
    }
}
