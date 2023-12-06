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
        Schema::create('pesanan_details', function (Blueprint $table) {
          $table->id();
          $table->integer('quantity');
          $table->integer('total_harga_barang');
          $table->foreignId('pesanan_id')->references('id')->on('pesanan')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
          $table->foreignId('barang_id')->references('id')->on('barang')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_details');
    }
};
