<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pesan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode', 100);
            $table->integer('pengirim_id')->unsigned();
            $table->integer('penerima_id')->unsigned();
            $table->string('judul');
            $table->text('pesan');
            $table->timestamps();
            $table->foreign('pengirim_id')->references('id')->on('users');
            $table->foreign('penerima_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
