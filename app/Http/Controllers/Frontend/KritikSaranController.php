<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KritikSaran;

class KritikSaranController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pesan' => 'required|min:5',
        ]);

        KritikSaran::create([
            'pesan' => $request->pesan,
        ]);

        return redirect('/')
            ->with('success', 'Terima kasih, komentar Anda berhasil dikirim.');
    }
}
