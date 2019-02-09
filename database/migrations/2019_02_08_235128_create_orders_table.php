<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_ID');
            $table->unsignedInteger('items_ordered');
            $table->boolean('outForDelivery')->default(false);
            $table->boolean('delivered')->default(false);
            $table->timestamps();

            $table->foreign('customer_ID')->references('id')->on('users');
            $table->foreign('items_ordered')->references('item_ID')->on('stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
