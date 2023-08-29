<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('order_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('item_id');
            $table->timestamp('order_date');
            $table->timestamp('delivery_date')->nullable();

            $table->enum('customer_confirmation_status', ['accepted', 'rejected','padding'])->default('padding');
            $table->enum('owner_confirmation_status', ['accepted', 'rejected','padding'])->default('padding');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('item_id')->references('id')->on('items');

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
