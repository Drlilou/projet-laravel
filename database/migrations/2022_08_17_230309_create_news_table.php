<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *news
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('titre');
            $table->string('image');
            $table->string('description');
            $table->unsignedBigInteger('id_zone');
            $table->foreign('id_zone')->references('id')->on('zones');

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
        Schema::dropIfExists('news');
    }
}
