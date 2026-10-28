<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilDestinasi;

class ProfilDestinasiController extends Controller
{
    public function index()
    {
        $profiles = ProfilDestinasi::latest()->get();

        return view('admin.profil.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_destinasi' => 'required',
            'deskripsi'      => 'required',
            'sejarah'        => 'required',
        ]);

        ProfilDestinasi::create([
            'nama_destinasi' => $request->nama_destinasi,
            'deskripsi'      => $request->deskripsi,
            'sejarah'        => $request->sejarah,
        ]);

        return redirect('/admin/profil')
            ->with('success', 'Profil destinasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $profile = ProfilDestinasi::findOrFail($id);

        return view('admin.profil.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = ProfilDestinasi::findOrFail($id);

        $request->validate([
            'nama_destinasi' => 'required',
            'deskripsi'      => 'required',
            'sejarah'        => 'required',
        ]);

        $profile->update([
            'nama_destinasi' => $request->nama_destinasi,
            'deskripsi'      => $request->deskripsi,
            'sejarah'        => $request->sejarah,
        ]);

        return redirect('/admin/profil')
            ->with('success', 'Profil destinasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $profile = ProfilDestinasi::findOrFail($id);

        $profile->delete();

        return redirect('/admin/profil')
            ->with('success', 'Profil destinasi berhasil dihapus.');
    }
}
