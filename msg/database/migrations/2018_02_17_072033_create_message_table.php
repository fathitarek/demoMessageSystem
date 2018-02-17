<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('from_id');
          $table->integer('to_id');
          $table->string('content');
          $table->timestamps();
          //$table->foreign('from_id')->references('id')->on('users')->onDelete('cascade');
          //$table->foreign('to_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('message', function (Blueprint $table) {
              Schema::dropIfExists('message');
        });
    }
}
