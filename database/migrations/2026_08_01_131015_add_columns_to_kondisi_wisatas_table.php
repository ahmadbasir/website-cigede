<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kondisi_wisatas', function (Blueprint $table) {

            if (!Schema::hasColumn('kondisi_wisatas', 'cuaca')) {
                $table->string('cuaca')->nullable()->after('status_air');
            }

            if (!Schema::hasColumn('kondisi_wisatas', 'operasional')) {
                $table->string('operasional')->nullable()->after('cuaca');
            }

            if (!Schema::hasColumn('kondisi_wisatas', 'informasi_khusus')) {
                $table->text('informasi_khusus')->nullable()->after('operasional');
            }

        });
    }

    public function down(): void
    {
        Schema::table('kondisi_wisatas', function (Blueprint $table) {

            if (Schema::hasColumn('kondisi_wisatas', 'cuaca')) {
                $table->dropColumn('cuaca');
            }

            if (Schema::hasColumn('kondisi_wisatas', 'operasional')) {
                $table->dropColumn('operasional');
            }

        });
    }
};
