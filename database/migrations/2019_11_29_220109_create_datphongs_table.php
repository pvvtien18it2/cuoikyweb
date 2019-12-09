<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatphongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datphongs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('phong_id')->references('id')->on('phong')->onDelete('cascade')->nullable();
            $table->string('name');
            $table->string('token');
            $table->integer('number_cmnd');
            $table->integer('phone');
            $table->integer('people');
            $table->string('dayBookRoom',4000);
            $table->string('dayOutRoom',4000);
            $table->string('day_create', 4000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datphongs');
    }
}
