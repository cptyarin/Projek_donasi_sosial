<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penerima_bantuans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('kategori_bantuan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penerima_bantuans');
    }
};