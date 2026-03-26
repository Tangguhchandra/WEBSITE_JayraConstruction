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
    Schema::create('company_profiles', function (Blueprint $table) {
        $table->id();
        $table->string('company_name')->default('CV. DARMING JAYA ABADI');
        $table->text('about_description')->nullable();
        $table->string('experience_years')->default('15+');
        $table->string('projects_completed')->default('200+');
        $table->text('vision')->nullable();
        $table->text('mission')->nullable(); // Kita simpan misi pakai format enter per baris
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->text('address')->nullable();
        $table->string('about_image')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
