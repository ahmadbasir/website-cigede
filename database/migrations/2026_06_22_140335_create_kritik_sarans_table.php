<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('kritik_sarans')) {
            Schema::create('kritik_sarans', function (Blueprint $table) {
                $table->id();
                $table->text('pesan');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('kritik_sarans');
    }
};