<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->integer('amount')->default(1);
            $table->unsignedBigInteger('related_product_id');
            $table->integer('discount');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('related_product_id')->references('id')->on('products');
            $table->unique(['product_id','related_product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
