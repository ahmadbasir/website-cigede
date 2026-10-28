<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitorRegistration;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class VisitorRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $pengunjung = VisitorRegistration::when($search, function ($query, $search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('nomor_hp', 'like', "%{$search}%")
                  ->orWhere('asal_daerah', 'like', "%{$search}%")
                  ->orWhere('tanggal_kunjungan', 'like', "%{$search}%");
        })
        ->latest()
        ->get();

        return view('admin.pengunjung.index', compact('pengunjung', 'search'));
    }

    public function exportPdf(Request $request)
    {
        $filter = $request->filter ?? 'bulanan';

        $query = VisitorRegistration::query();

        if ($filter == 'mingguan') {
            $query->whereBetween('tanggal_kunjungan', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ]);
        } elseif ($filter == 'bulanan') {
            $query->whereMonth('tanggal_kunjungan', now()->month)
                  ->whereYear('tanggal_kunjungan', now()->year);
        } elseif ($filter == 'tahunan') {
            $query->whereYear('tanggal_kunjungan', now()->year);
        }

        $pengunjung = $query->latest()->get();

        $pdf = Pdf::loadView('admin.pengunjung.pdf', [
            'pengunjung' => $pengunjung,
            'filter' => $filter
        ]);

        return $pdf->download('Laporan_Data_Pengunjung_Mata_Air_Cigede.pdf');
    }
}
