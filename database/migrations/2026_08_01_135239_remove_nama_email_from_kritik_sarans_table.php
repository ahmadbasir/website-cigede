<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('kritik_sarans')) {
            Schema::table('kritik_sarans', function (Blueprint $table) {
                if (Schema::hasColumn('kritik_sarans', 'nama')) {
                    $table->dropColumn('nama');
                }

                if (Schema::hasColumn('kritik_sarans', 'email')) {
                    $table->dropColumn('email');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('kritik_sarans')) {
            Schema::table('kritik_sarans', function (Blueprint $table) {
                if (!Schema::hasColumn('kritik_sarans', 'nama')) {
                    $table->string('nama')->nullable();
                }

                if (!Schema::hasColumn('kritik_sarans', 'email')) {
                    $table->string('email')->nullable();
                }
            });
        }
    }
};