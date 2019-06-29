<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('balita_id')->unsigned();
            $table->string('umur')->nullable();
            $table->string('beratbadan');
            $table->string('hasil');
            $table->string('jk');
            $table->text('foto')->nullable();
            $table->text('urlfoto')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
            $table->foreign('balita_id')->references('id')->on('balitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitors');
    }
}
