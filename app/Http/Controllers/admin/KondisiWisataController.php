<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KondisiWisata;

class KondisiWisataController extends Controller
{
    public function index()
    {
        $kondisi = KondisiWisata::first();

        return view('admin.kondisi.index', compact('kondisi'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'status_air' => 'required',
            'kondisi_cuaca' => 'required',
            'status_operasional' => 'required',
            'informasi_khusus' => 'nullable',
        ]);

        $kondisi = KondisiWisata::first();

        if (!$kondisi) {

            $kondisi = new KondisiWisata();

        }

        $kondisi->status_air = $request->status_air;
        $kondisi->kondisi_cuaca = $request->kondisi_cuaca;
        $kondisi->status_operasional = $request->status_operasional;
        $kondisi->informasi_khusus = $request->informasi_khusus;

        $kondisi->save();

        return redirect('/admin/kondisi')
            ->with('success', 'Kondisi wisata berhasil diperbarui.');
    }
}
