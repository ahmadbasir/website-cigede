<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kondisi_wisatas', function (Blueprint $table) {
            $table->id();
            $table->enum('status_air', [
                'Jernih',
                'Sedikit Keruh',
                'Keruh'
            ]);
            $table->string('kondisi_cuaca');
            $table->enum('status_operasional', [
                'Buka',
                'Tutup'
            ]);
            $table->text('informasi_khusus')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kondisi_wisatas');
    }
};