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
            $table->string('maP');
            $table->string('tenP')->unique();
            $table->string('loaiP');
            $table->integer('songuoi');
            $table->integer('hour');
            $table->integer('day');
            $table->integer('tinhtrang');
            $table->string('maDV');
            $table->string('maNV');
            $table->integer('trong');
            $table->integer('tang');
            $table->integer('countPhong')->default(0);
            $table->integer('countDichVu')->default(0);
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
