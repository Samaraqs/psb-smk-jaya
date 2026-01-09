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
Schema::create('nilai_seleksis', function (Blueprint $table) {
    $table->id();
    $table->foreignId('pendaftaran_id')->constrained();
    $table->float('nilai_rapor');
    $table->float('nilai_tes');
    $table->float('nilai_akhir');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_seleksis');
    }
};
