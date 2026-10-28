<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasi = Lokasi::latest()->get();
        return view('admin.lokasi.index', compact('lokasi'));
    }

    public function create()
    {
        return view('admin.lokasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required',
            'alamat' => 'required',
            'google_maps_embed' => 'required',
            'google_maps_link' => 'required',
        ]);

        Lokasi::create($request->all());

        return redirect()->route('admin.lokasi.index')
            ->with('success', 'Lokasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lokasi' => 'required',
            'alamat' => 'required',
            'google_maps_embed' => 'required',
            'google_maps_link' => 'required',
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($request->all());

        return redirect()->route('admin.lokasi.index')
            ->with('success', 'Lokasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        return redirect()->route('admin.lokasi.index')
            ->with('success', 'Lokasi berhasil dihapus.');
    }
}