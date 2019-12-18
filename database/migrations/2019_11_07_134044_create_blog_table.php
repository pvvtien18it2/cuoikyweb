<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_blog_table', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone',10);
            $table->string('email');
            $table->string('add',4000);
            $table->string('rooms');
            $table->string('come');
            $table->string('back');
            $table->string('people');
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
        Schema::dropIfExists('create_blog_table');
    }
}
 