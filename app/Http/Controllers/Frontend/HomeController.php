<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Informasi;
use App\Models\ProfilDestinasi;
use App\Models\KondisiWisata;
use App\Models\VisitorRegistration;
use App\Models\Lokasi;
use App\Models\KontakInfo;

class HomeController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();
        $informasi = Informasi::latest()->get();
        $profil = ProfilDestinasi::latest()->first();
        $lokasi = Lokasi::latest()->first();
        $kontakInfo = KontakInfo::first();
        $kondisi = KondisiWisata::latest()->first();

        // Hitung jumlah pengunjung berdasarkan registrasi hari ini
        $pengunjungHariIni = VisitorRegistration::whereDate(
            'tanggal_kunjungan',
            now()->toDateString()
        )->count();

        // Tentukan status crowd meter
        if ($pengunjungHariIni <= 10) {
            $statusCrowd = 'Sepi';
        } elseif ($pengunjungHariIni <= 25) {
            $statusCrowd = 'Ramai';
        } else {
            $statusCrowd = 'Sangat Ramai';
        }

        return view('frontend.home', compact(
            'galeris',
            'informasi',
            'profil',
            'lokasi',
            'kontakInfo',
            'kondisi',
            'pengunjungHariIni',
            'statusCrowd'
        ));
    }
}
