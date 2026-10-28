<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VisitorRegistration;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function create()
    {
        return view('frontend.registrasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_hp' => 'required',
            'asal_daerah' => 'required',
            'tanggal_kunjungan' => 'required|date'
        ]);

        VisitorRegistration::create([
            'nama' => $request->nama,
            'nomor_hp' => $request->nomor_hp,
            'asal_daerah' => $request->asal_daerah,
            'tanggal_kunjungan' => $request->tanggal_kunjungan
        ]);

        return redirect()->back()->with('success', 'Registrasi berhasil dilakukan');
    }
}