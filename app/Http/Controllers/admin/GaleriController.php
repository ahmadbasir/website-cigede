<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();

        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $gambar = $request->file('gambar');

        $namaGambar = time() . '.' . $gambar->extension();

        $gambar->move(public_path('galeri'), $namaGambar);

        Galeri::create([
            'judul' => $request->judul,
            'gambar' => $namaGambar,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/admin/galeri');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $galeri = Galeri::findOrFail($id);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $gambar = $request->file('gambar');

            $namaGambar = time() . '.' . $gambar->extension();

            $gambar->move(public_path('galeri'), $namaGambar);

            $data['gambar'] = $namaGambar;
        }

        $galeri->update($data);

        return redirect('/admin/galeri');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        $galeri->delete();

        return redirect('/admin/galeri');
    }
}