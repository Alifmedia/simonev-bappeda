<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSektoralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sektoral', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bagian_id');
            $table->string('nama');
            $table->string('pic');
            $table->string('no_handphone')->nullable();

            $table->foreign('bagian_id')
                  ->references('id')->on('bagian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sektorals');
    }
}
