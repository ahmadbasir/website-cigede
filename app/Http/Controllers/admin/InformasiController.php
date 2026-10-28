<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::latest()->get();

        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi'   => 'required',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi'   => $request->isi,
        ];

        if ($request->hasFile('foto')) {
            $namaFoto = time() . '_' . $request->file('foto')->getClientOriginalName();

            $request->file('foto')->move(public_path('berita'), $namaFoto);

            $data['foto'] = $namaFoto;
        }

        Informasi::create($data);

        return redirect('/admin/informasi')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);

        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'isi'   => 'required',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi'   => $request->isi,
        ];

        if ($request->hasFile('foto')) {

            // Hapus foto lama jika ada
            if ($informasi->foto && file_exists(public_path('berita/' . $informasi->foto))) {
                unlink(public_path('berita/' . $informasi->foto));
            }

            $namaFoto = time() . '_' . $request->file('foto')->getClientOriginalName();

            $request->file('foto')->move(public_path('berita'), $namaFoto);

            $data['foto'] = $namaFoto;
        }

        $informasi->update($data);

        return redirect('/admin/informasi')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);

        // Hapus foto jika ada
        if ($informasi->foto && file_exists(public_path('berita/' . $informasi->foto))) {
            unlink(public_path('berita/' . $informasi->foto));
        }

        $informasi->delete();

        return redirect('/admin/informasi')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
