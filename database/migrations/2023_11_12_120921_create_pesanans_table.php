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
        Schema::create('pesanan', function (Blueprint $table) {
          $table->id();
          $table->string('kode_pesanan', 50);
          $table->date('tanggal_pesanan');
          $table->integer('total_harga');
          $table->enum('status_pesanan', ['belum dipesan', 'proses', 'disetujui', 'ditolak']);
          $table->string('pemesan')->nullable();
          $table->text('keterangan')->nullable();
          $table->foreignId('unit_kerja_id')->references('id')->on('unit_kerja')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
          $table->foreignId('user_id')->references('id')->on('users')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
