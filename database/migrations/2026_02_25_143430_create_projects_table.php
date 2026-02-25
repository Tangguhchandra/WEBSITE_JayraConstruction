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
    Schema::create('projects', function (Blueprint $table) {
        $table->id(); // Primary Key otomatis
        $table->string('project_code')->unique(); // Contoh: PJ-001
        $table->string('name'); // Nama Proyek
        $table->string('client_name'); // Nama Klien
        $table->text('location'); // Lokasi/Alamat Proyek
        $table->bigInteger('budget'); // Pakai bigInteger karena budget konstruksi biasanya besar
        $table->integer('progress')->default(0); // Angka 0-100
        $table->enum('status', ['Perencanaan', 'Proses', 'Selesai'])->default('Perencanaan'); 
        $table->timestamps(); // create_at & updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
