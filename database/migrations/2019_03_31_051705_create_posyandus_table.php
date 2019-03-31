<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosyandusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posyandus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rw_id')->unsigned();
            $table->text('deskripsi');
            $table->datetime('tanggal');
            $table->string('phone');
            $table->string('kesehatanibuanak')->comment('1 iya 0 tidak')->default(0);
            $table->string('KB')->comment('1 iya 0 tidak')->default(0);
            $table->string('imun')->comment('1 iya 0 tidak')->default(0);
            $table->string('gizi')->comment('1 iya 0 tidak')->default(0);
            $table->string('diare')->comment('1 iya 0 tidak')->default(0);
            $table->string('sanitasidasar')->comment('1 iya 0 tidak')->default(0);
            $table->string('penyediaanobat')->comment('1 iya 0 tidak')->default(0);
            $table->timestamps();

            $table->foreign('rw_id')->references('id')->on('rw');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posyandus');
    }
}
