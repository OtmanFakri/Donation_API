<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnerOrderConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_order_confirmations', function (Blueprint $table) {
            $table->id('confirmation_id');
            $table->unsignedBigInteger('order_id');
            $table->timestamp('confirmation_date');
            $table->enum('status', ['accepted', 'rejected','padding'])->default('padding');
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
        Schema::dropIfExists('seller_order_confirmations');
    }
}
