<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KritikSaran;

class KritikSaranController extends Controller
{
    public function index()
    {
        $komentar = KritikSaran::latest()->get();

        return view('admin.kritik.index', compact('komentar'));
    }

    public function destroy($id)
    {
        $komentar = KritikSaran::findOrFail($id);

        $komentar->delete();

        return redirect('/admin/kritik')
            ->with('success', 'Komentar berhasil dihapus.');
    }
}
