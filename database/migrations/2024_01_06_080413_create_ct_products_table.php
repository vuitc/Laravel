<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_products', function (Blueprint $table) {
            $table->unsignedBigInteger('idproduct');
            $table->unsignedBigInteger('idcolor');
            $table->unsignedBigInteger('idsize');
            $table->integer('price')->nullable();
            $table->integer('soluongton')->nullable();
            $table->string('image')->nullable();
            $table->integer('giamgia')->nullable();
            $table->timestamps();
            $table->primary(['idproduct', 'idcolor', 'idsize']);
            $table->foreign('idproduct')->references('id')->on('products');
            $table->foreign('idcolor')->references('id')->on('colors');
            $table->foreign('idsize')->references('id')->on('sizes');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ct-products');
    }
};
