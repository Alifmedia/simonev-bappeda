<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeraturanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peraturan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jenis_peraturan_id');
            $table->unsignedBigInteger('hal_id');
            $table->string('nama');
            $table->date('tanggal_pengesahan');
            $table->string('lokasi_file');
            $table->timestamps();

            $table->foreign('jenis_peraturan_id')
                  ->references('id')->on('jenis_peraturan');
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
        Schema::dropIfExists('peraturans');
    }
}
