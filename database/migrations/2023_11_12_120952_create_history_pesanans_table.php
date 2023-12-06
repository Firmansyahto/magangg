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
        Schema::create('history_pesanan', function (Blueprint $table) {
          $table->id();
          $table->enum('status_pesanan', ['disetujui', 'ditolak']);
          $table->text('keterangan');
          $table->foreignId('pesanan_id')->references('id')->on('pesanan')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_pesanan');
    }
};
