<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitor_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nomor_hp');
            $table->string('asal_daerah');
            $table->date('tanggal_kunjungan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitor_registrations');
    }
};