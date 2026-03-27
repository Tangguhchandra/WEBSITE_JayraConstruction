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
    Schema::create('services', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('category');
        $table->integer('price'); // Pakai integer agar bisa diformat Rp di tampilan User
        $table->text('short_description')->nullable();
        $table->text('full_description')->nullable();
        
        // Spesifikasi (Cakupan Pekerjaan)
        $table->string('spec_1')->nullable(); // Misal: Struktur Bawah
        $table->string('spec_2')->nullable(); // Misal: Struktur Atas
        $table->string('spec_3')->nullable(); // Misal: Rangka Atap
        $table->string('spec_4')->nullable(); // Misal: MEP & Finishing
        
        // Multi Image (Maksimal 3 foto sesuai desain)
        $table->string('image_1')->nullable(); 
        $table->string('image_2')->nullable(); 
        $table->string('image_3')->nullable(); 
        
        $table->enum('status', ['Aktif', 'Draft'])->default('Aktif');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
