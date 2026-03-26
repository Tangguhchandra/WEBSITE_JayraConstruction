<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); 
            $table->string('project_code')->unique(); 
            $table->string('name'); 
            $table->string('client_name'); 
            $table->string('category')->nullable(); // Kategori / Layanan Terkait
            $table->text('location'); 
            $table->bigInteger('budget'); 
            $table->date('completion_date')->nullable(); // Tgl Selesai
            $table->integer('progress')->default(0); 
            $table->enum('status', ['Perencanaan', 'Proses', 'Selesai'])->default('Perencanaan'); 
            $table->text('background')->nullable(); // Latar Belakang Proyek
            $table->text('challenge_solution')->nullable(); // Tantangan & Solusi
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};