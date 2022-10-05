<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissingProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missing_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('img');
            $table->unsignedBigInteger('news');
            $table->foreign('news')->references('id')->on('news');
            $table->unsignedBigInteger('products');
            $table->foreign('products')->references('id')->on('product');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missing_products');
    }
}
