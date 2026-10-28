<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontakInfo;
use Illuminate\Http\Request;

class KontakInfoController extends Controller
{
    public function index()
    {
        $kontaks = KontakInfo::latest()->get();
        return view('admin.kontak_info.index', compact('kontaks'));
    }

    public function create()
    {
        return view('admin.kontak_info.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'no_hp' => 'required',
        ]);

        KontakInfo::create($request->all());

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Kontak berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kontak = KontakInfo::findOrFail($id);
        return view('admin.kontak_info.edit', compact('kontak'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'no_hp' => 'required',
        ]);

        $kontak = KontakInfo::findOrFail($id);
        $kontak->update($request->all());

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Kontak berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kontak = KontakInfo::findOrFail($id);
        $kontak->delete();

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Kontak berhasil dihapus.');
    }
}