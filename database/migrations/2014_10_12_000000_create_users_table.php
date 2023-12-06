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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 35)->unique();
            $table->string('password');
            // $table->string('telepon', 15)->nullable();
            // $table->text('alamat')->nullable();
            $table->string('jabatan', 150)->nullable();

            $table->string('path')->nullable();
            $table->string('foto')->nullable();

            $table->string('role', 35)->nullable();
            $table->string('slug')->nullable();
            $table->string('flag')->nullable();

            $table->foreignId('unit_kerja_id')->references('id')->on('unit_kerja')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
