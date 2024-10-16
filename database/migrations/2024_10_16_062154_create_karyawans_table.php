<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('nomor_karyawan')->unique();
            $table->string('email')->unique();
            $table->string('departemen');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}