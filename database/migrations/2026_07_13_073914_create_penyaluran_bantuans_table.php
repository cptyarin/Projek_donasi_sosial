<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penyaluran_bantuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penerima_id')->constrained('penerima_bantuans')->onDelete('cascade');
            $table->foreignId('program_id')->constrained('program_donasis')->onDelete('cascade');
            $table->decimal('nominal', 15, 2);
            $table->date('tanggal_penyaluran');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penyaluran_bantuans');
    }
};