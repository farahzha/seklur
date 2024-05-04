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
        Schema::create('lahirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->timestamps();

            $table->foreignId( 'kartu_keluarga_id' )->references( 'id' )->on( 'kartu_keluargas' )->onUpdate( 'cascade' )->onDelete( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lahirs');
    }
};
