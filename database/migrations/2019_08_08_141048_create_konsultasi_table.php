<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonsultasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sektoral_id');
            $table->unsignedBigInteger('umum_id')->nullable();
            $table->unsignedBigInteger('hal_id');
            $table->string('no_registrasi');
            $table->text('risalah');
            $table->timestamps();

            $table->foreign('sektoral_id')
                  ->references('id')->on('sektoral');
            $table->foreign('umum_id')
                  ->references('id')->on('umum')
                  ->onDelete('set null');
            $table->foreign('hal_id')
                  ->references('id')->on('hal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsultasi');
    }
}
