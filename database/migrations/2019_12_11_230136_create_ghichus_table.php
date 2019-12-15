<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGhichusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ghichus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('phong_id')->references('id')->on('phong')->onDelete('cascade')->nullable();
            $table->string('name');
            $table->string('note',4000);
            $table->string('tinhtrang',4000)->nullable();
            $table->string('day_create', 4000);
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
        Schema::dropIfExists('ghichus');
    }
}
