<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('crowd_meters', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_pengunjung');
            $table->enum('status', [
                'Sepi',
                'Ramai',
                'Sangat Ramai'
            ]);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crowd_meters');
    }
};