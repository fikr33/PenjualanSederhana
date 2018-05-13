<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
             $table->increments('id');
            $table->integer('id_supplier')->unsigned();
            $table->integer('id_barang')->unsigned();
            $table->date('tanggal');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->integer('total_harga');
            $table->foreign('id_supplier')->references('id')->on('suppliers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_barang')->references('id')->on('barangs')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('pembelians');
    }
}
