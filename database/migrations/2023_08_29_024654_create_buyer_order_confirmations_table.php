<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerOrderConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_order_confirmations', function (Blueprint $table) {
            $table->id('confirmation_id');
            $table->unsignedBigInteger('order_id');
            $table->timestamp('confirmation_date');
            $table->string('status', 50);
            $table->timestamps();

            $table->foreign('order_id')->references('order_id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyer_order_confirmations');
    }
}
