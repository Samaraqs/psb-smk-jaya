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
Schema::create('berkas_pendaftarans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('pendaftaran_id')->constrained();
    $table->string('jenis_berkas');
    $table->string('file');
    $table->enum('status_verifikasi',['menunggu','diterima','ditolak'])->default('menunggu');
    $table->text('catatan')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_pendaftarans');
    }
};
