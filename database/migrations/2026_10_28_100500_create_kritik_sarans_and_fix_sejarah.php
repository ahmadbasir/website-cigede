<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('kritik_sarans')) {
            Schema::create('kritik_sarans', function (Blueprint $table) {
                $table->id();
                $table->text('pesan');
                $table->timestamps();
            });
        }

        if (Schema::hasTable('profil_destinasis')) {
            DB::statement('ALTER TABLE profil_destinasis MODIFY sejarah TEXT NULL');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('profil_destinasis')) {
            DB::statement('ALTER TABLE profil_destinasis MODIFY sejarah VARCHAR(255) NULL');
        }
    }
};

