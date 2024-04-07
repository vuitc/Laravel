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
        Schema::create('ct_bills', function (Blueprint $table) {
            $table->unsignedBigInteger('idproduct');
            $table->unsignedBigInteger('idsize');
            $table->unsignedBigInteger('idcolor');
            $table->unsignedBigInteger('masohd');
            $table->unsignedInteger('soluongmua');
            $table->decimal('thanhtien', 10, 2);
            $table->timestamps();
            $table->primary(['idproduct', 'idsize', 'idcolor', 'masohd']);
            $table->foreign('masohd')->references('id')->on('bills');
            $table->foreign('idproduct')->references('id')->on('products');
            $table->foreign('idsize')->references('id')->on('sizes');
            $table->foreign('idcolor')->references('id')->on('colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ct_bills');
    }
};
