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
        Schema::create('anggota_keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->references('id')->on('penduduks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kartu_keluarga_id')->references('id')->on('kartu_keluargas')->onUpdate('cascade')->onDelete('cascade');
            $table->string( 'status' );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_keluargas');
    }
};
