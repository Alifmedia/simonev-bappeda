<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTahapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahapan', function (Blueprint $table) {
            $table->unsignedBigInteger('konsultasi_id');
            $table->unsignedInteger('no');
            $table->primary(['konsultasi_id', 'no']);
            $table->string('nama');
            $table->string('keterangan')->nullable();
            $table->boolean('selesai')->default(0);

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
        Schema::dropIfExists('tahapans');
    }
}
