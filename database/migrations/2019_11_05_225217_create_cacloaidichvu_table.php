<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCacloaidichvuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cacloaidichvu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenDV');
            $table->integer('giaDV');
            $table->string('loai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cacloaidichvu');
    }
}
