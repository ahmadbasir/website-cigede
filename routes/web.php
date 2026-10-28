<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| FRONTEND CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\GaleriController;
use App\Http\Controllers\Frontend\BeritaController;
use App\Http\Controllers\Frontend\VisitorController;
use App\Http\Controllers\Frontend\KritikSaranController;
use App\Http\Controllers\Admin\LokasiController;
use App\Http\Controllers\Admin\KontakInfoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KondisiWisataController;
use App\Http\Controllers\Admin\KritikSaranController as AdminKritikSaranController;


/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\ProfilDestinasiController;
use App\Http\Controllers\Admin\AiController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\VisitorRegistrationController;


/*
|--------------------------------------------------------------------------
| OTHER CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/


Route::get('/', [HomeController::class, 'index']);

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

Route::get('/galeri/{id}', [GaleriController::class, 'show'])->name('galeri.show');

Route::get('/berita', [BeritaController::class, 'index']);

Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/registrasi', [VisitorController::class, 'create']);

Route::post('/registrasi', [VisitorController::class, 'store']);

Route::post('/kritik-saran', [KritikSaranController::class, 'store']);

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/


Route::middleware(['auth'])->group(function () {


    /*
    |--------------------------------------------------------------------------
    | KELOLA GALERI
    |--------------------------------------------------------------------------
    */


    Route::get('/admin/galeri', [
        AdminGaleriController::class,
        'index'
    ]);

    Route::get('/admin/galeri/create', [
        AdminGaleriController::class,
        'create'
    ]);

    Route::post('/admin/galeri/store', [
        AdminGaleriController::class,
        'store'
    ]);

    Route::get('/admin/galeri/{id}/edit', [
        AdminGaleriController::class,
        'edit'
    ]);

    Route::put('/admin/galeri/{id}', [
        AdminGaleriController::class,
        'update'
    ]);

    Route::delete('/admin/galeri/{id}', [
        AdminGaleriController::class,
        'destroy'
    ]);


    /*
    |--------------------------------------------------------------------------
    | KELOLA INFORMASI
    |--------------------------------------------------------------------------
    */


    Route::get('/admin/informasi', [
        InformasiController::class,
        'index'
    ]);

    Route::get('/admin/informasi/create', [
        InformasiController::class,
        'create'
    ]);

    Route::post('/admin/informasi/store', [
        InformasiController::class,
        'store'
    ]);

    Route::get('/admin/informasi/{id}/edit', [
        InformasiController::class,
        'edit'
    ]);

    Route::put('/admin/informasi/{id}', [
        InformasiController::class,
        'update'
    ]);

    Route::delete('/admin/informasi/{id}', [
        InformasiController::class,
        'destroy'
    ]);


    /*
    |--------------------------------------------------------------------------
    | KELOLA PROFIL DESTINASI
    |--------------------------------------------------------------------------
    */


    Route::get('/admin/profil', [
        ProfilDestinasiController::class,
        'index'
    ]);

    Route::get('/admin/profil/create', [
        ProfilDestinasiController::class,
        'create'
    ]);

    Route::post('/admin/profil/store', [
        ProfilDestinasiController::class,
        'store'
    ]);

    Route::get('/admin/profil/{id}/edit', [
        ProfilDestinasiController::class,
        'edit'
    ]);

    Route::put('/admin/profil/{id}', [
        ProfilDestinasiController::class,
        'update'
    ]);

    Route::delete('/admin/profil/{id}', [
        ProfilDestinasiController::class,
        'destroy'
    ]);


   /*
|--------------------------------------------------------------------------
| DATA PENGUNJUNG
|--------------------------------------------------------------------------
*/

Route::get('/admin/pengunjung', [
    VisitorRegistrationController::class,
    'index'
]);

Route::get('/admin/pengunjung/export-pdf', [
    VisitorRegistrationController::class,
    'exportPdf'
]);

    /*
    |--------------------------------------------------------------------------
    | AI GENERATE ARTICLE
    |--------------------------------------------------------------------------
    */


    Route::post('/generate-article', [
        AiController::class,
        'generate'
    ]);

    /*
    |--------------------------------------------------------------------------
    | KELOLA LOKASI
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/lokasi', [LokasiController::class, 'index'])->name('admin.lokasi.index');
    Route::get('/admin/lokasi/create', [LokasiController::class, 'create'])->name('admin.lokasi.create');
    Route::post('/admin/lokasi/store', [LokasiController::class, 'store'])->name('admin.lokasi.store');
    Route::get('/admin/lokasi/edit/{id}', [LokasiController::class, 'edit'])->name('admin.lokasi.edit');
    Route::put('/admin/lokasi/update/{id}', [LokasiController::class, 'update'])->name('admin.lokasi.update');
    Route::delete('/admin/lokasi/delete/{id}', [LokasiController::class, 'destroy'])->name('admin.lokasi.delete');

    /*
    |--------------------------------------------------------------------------
    | KELOLA KONTAK
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/kontak', [KontakInfoController::class, 'index'])->name('admin.kontak.index');
    Route::get('/admin/kontak/create', [KontakInfoController::class, 'create'])->name('admin.kontak.create');
    Route::post('/admin/kontak/store', [KontakInfoController::class, 'store'])->name('admin.kontak.store');
    Route::get('/admin/kontak/edit/{id}', [KontakInfoController::class, 'edit'])->name('admin.kontak.edit');
    Route::put('/admin/kontak/update/{id}', [KontakInfoController::class, 'update'])->name('admin.kontak.update');
    Route::delete('/admin/kontak/delete/{id}', [KontakInfoController::class, 'destroy'])->name('admin.kontak.delete');

    /*
    |--------------------------------------------------------------------------
    | KELOLA AKUN
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/akun', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/akun/update', [UserController::class, 'update'])->name('admin.users.update');

    /*
    |--------------------------------------------------------------------------
    | KELOLA KONDISI WISATA
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/kondisi', [KondisiWisataController::class, 'index']);
    Route::post('/admin/kondisi/update', [KondisiWisataController::class, 'update']);

    /*
    |--------------------------------------------------------------------------
    | KRITIK & SARAN
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/kritik', [AdminKritikSaranController::class, 'index']);
    Route::delete('/admin/kritik/{id}', [AdminKritikSaranController::class, 'destroy']);

});

require __DIR__.'/auth.php';