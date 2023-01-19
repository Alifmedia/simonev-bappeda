<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUmumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umum', 
                        function (Blueprint $table) 
                        {
                        $table->bigIncrements('id');
                        $table->unsignedBigInteger('user_id')->unique();
                        $table->unsignedBigInteger('unsur_id');
                        $table->unsignedBigInteger('gampong_id')->nullable();
                        $table->string('nama');
                        $table->string('nik');
                        $table->boolean('jenis_kelamin')->comment('1 => Laki-Laki, 0 => Perempuan');
                        $table->string('alamat');
                        $table->string('tempat_lahir');
                        $table->date('tanggal_lahir');
                        $table->string('no_handphone');
                        $table->string('ktp');



                        $table->foreign('user_id')
                              ->references('id')->on('users')
                              ->onDelete('cascade');
                        $table->foreign('unsur_id')
                              ->references('id')->on('unsur');
                        $table->foreign('gampong_id')
                              ->references('id')->on('gampong');
                        }
                     );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('umums');
    }
}
