<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemangkuKonsultasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemangku_konsultasi', function (Blueprint $table) {
          $table->unsignedBigInteger('pemangku_id');
          $table->unsignedBigInteger('konsultasi_id');
          $table->timestamps();

          $table->foreign('pemangku_id')
                ->references('id')->on('pemangku')
                ->onDelete('cascade');
          $table->foreign('konsultasi_id')
                ->references('id')->on('konsultasi')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemangku_konsultasis');
    }
}
