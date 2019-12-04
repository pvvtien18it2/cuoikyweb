<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuanlyphongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quanlyphongs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('phong_id')->references('id')->on('phong')->onDelete('cascade');
            $table->integer('number_cmnd');
            $table->string('name');
            $table->integer('people');
            $table->string('day_create' , 4000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quanlyphongs');
    }
}
