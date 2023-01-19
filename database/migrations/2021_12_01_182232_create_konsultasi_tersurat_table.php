<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonsultasiTersuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('konsultasi_tersurat');
        Schema::create('konsultasi_tersurat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sektoral_id');
            $table->unsignedBigInteger('umum_id');
            $table->unsignedBigInteger('hal_id');
            $table->unsignedBigInteger('status_id');
            $table->String('no_registrasi')->nullable;
            $table->String('risalah')->nullable;
            $table->String('lokasi_file')->nullable;
            $table->String('lokasi_file_jawab')->nullable;
            $table->String('email')->nullable;
            $table->timestamps();

            $table->foreign('sektoral_id')->references('id')->on('sektoral');
            $table->foreign('umum_id')->references('id')->on('umum');
            $table->foreign('hal_id')->references('id')->on('hal');
            $table->foreign('status_id')->references('id')->on('status_konsultasiter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsultasi_tersurat');
    }
}
