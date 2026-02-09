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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            // Relasi ke guru, mapel, ruangan
            $table->foreignId('guru_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ruangan_id')->constrained()->cascadeOnDelete();

            // Relasi ke hari & jam
            $table->foreignId('hari_id')->constrained()->cascadeOnDelete();
            $table->foreignId('waktu_id')->constrained()->cascadeOnDelete();

            $table->foreignId('kelas_id')->constrained()->cascadeOnDelete(); // X IPA 1, XI IPS 2, dst

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
