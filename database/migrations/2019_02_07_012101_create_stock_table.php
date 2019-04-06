<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_ID')->unique();
            $table->string('item_name');
            $table->float('item_price');
            $table->integer('item_quantity');
            $table->unsignedInteger('supplier_ID');
            $table->timestamps();

            $table->foreign('supplier_ID')->references('id')->on('supplier');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('stock');
    }
}
