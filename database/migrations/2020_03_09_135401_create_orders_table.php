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
            $table->id();
            $table->unsignedBigInteger('recipent_id');
            $table->string('order_type');
            $table->string('order_number');
            $table->unsignedInteger('invoice_amount');
            $table->unsignedInteger('insurance_value');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('status');
            $table->string('level_type');
            $table->string('delivery_method');
            $table->string('ship_option');
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
        Schema::dropIfExists('orders');
    }
}
