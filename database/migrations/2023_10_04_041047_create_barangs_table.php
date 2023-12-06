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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 50);
            $table->string('nama_barang', 150);
            $table->text('deskripsi');
            $table->string('satuan');
            $table->integer('stok');
            $table->integer('terjual')->nullable();
            $table->integer('harga');
            $table->string('path')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('slug');
            $table->string('flag')->nullable();
            $table->foreignId('unit_kerja_id')->references('id')->on('unit_kerja')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('supplier_id')->references('id')->on('suppliers')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
