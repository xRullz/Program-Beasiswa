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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('full_name')->nullable();   // Nama Lengkap
            $table->string('address')->nullable();   // Alamat
            $table->string('phone')->nullable();     // Nomor telepon
            $table->date('birthdate')->nullable();   // Tanggal lahir
            $table->string('school')->nullable();   // Nama Sekolah
            $table->string('major')->nullable();   // Jurusan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
