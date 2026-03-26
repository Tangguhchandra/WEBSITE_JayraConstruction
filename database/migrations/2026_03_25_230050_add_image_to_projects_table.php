<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // PENTING: Pakai Schema::table, bukan Schema::create
        Schema::table('projects', function (Blueprint $table) {
            // Menambahkan kolom image setelah kolom client_name
            $table->string('image')->nullable()->after('client_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Menghapus kolom jika sewaktu-waktu migrasi di-rollback
            $table->dropColumn('image');
        });
    }
};