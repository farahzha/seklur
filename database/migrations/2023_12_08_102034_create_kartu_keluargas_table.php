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
        Schema::create('kartu_keluargas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger( 'no_kk' )->unique();
            $table->string( 'alamat' );
            $table->string( 'kecamatan' );
            $table->string( 'kabupaten' );
            $table->string( 'provinsi' );
            $table->timestamps();
            
            $table->bigInteger( 'nik' )->unique();
            $table->foreign('nik')->references('nik')->on('penduduks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_keluargas');
    }
};
