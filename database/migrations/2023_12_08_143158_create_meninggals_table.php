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
        Schema::create('meninggals', function (Blueprint $table) {
            $table->id();
            $table->date( 'tanggal' );
            $table->longText( 'keterangan' );
            $table->timestamps();

            $table->foreignId( 'penduduk_id' )->references( 'id' )->on( 'penduduks' )->onUpdate( 'cascade' )->onDelete( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meninggals');
    }
};
