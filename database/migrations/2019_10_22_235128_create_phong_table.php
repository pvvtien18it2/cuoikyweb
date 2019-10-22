<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('maP')->unique();
            $table->string('tenP')->unique();
            $table->string('loaiP')->unique();
            $table->integer('giaP/hour');
            $table->integer('giaP/day');
            $table->string('tinhtrang');
            $table->string('maDV');
            $table->string('maNV');
            $table->integer('trong');
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
        Schema::dropIfExists('phong');
    }
}
