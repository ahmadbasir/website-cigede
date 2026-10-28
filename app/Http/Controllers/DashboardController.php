<?php

namespace App\Http\Controllers;

use App\Models\VisitorRegistration;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPengunjung = VisitorRegistration::count();

        $pengunjungHariIni = VisitorRegistration::whereDate(
            'tanggal_kunjungan',
            now()->toDateString()
        )->count();

        if ($pengunjungHariIni <= 20) {
            $crowdMeter = 'Sepi';
        } elseif ($pengunjungHariIni <= 50) {
            $crowdMeter = 'Ramai';
        } else {
            $crowdMeter = 'Sangat Ramai';
        }

        return view('dashboard', compact(
            'totalPengunjung',
            'pengunjungHariIni',
            'crowdMeter'
        ));
    }
}