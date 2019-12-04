<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDichvuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //'nuoisuoi','coca','pepsi','bohuc',biasaigon','biaheineken','biacorona','craven','nuoisuoi','baso','anuong','combo1','combo2','combo3','combo4'
        Schema::create('dichvu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('phong_id')->references('id')->on('phong')->onDelete('cascade');
            $table->integer('nuocsuoi')->default(0);
            $table->integer('coca')->default(0);
            $table->integer('pepsi')->default(0);
            $table->integer('bohuc')->default(0);
            $table->integer('biasaigon')->default(0);
            $table->integer('biaheineken')->default(0);
            $table->integer('biacorona')->default(0);
            $table->integer('craven')->default(0);
            $table->integer('baso')->default(0);
            $table->integer('anuong')->default(0);
            $table->integer('combo1')->default(0);
            $table->integer('combo2')->default(0);
            $table->integer('combo3')->default(0);
            $table->integer('combo4')->default(0);
            $table->integer('tongdichvu');
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
        Schema::dropIfExists('dichvu');
    }
}
