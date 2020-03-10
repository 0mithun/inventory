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
            $table->unsignedBigInteger('customer_id');
            $table->string('order_type');
            $table->string('order_number');

            $table->unsignedBigInteger('store_id')->nullable();
            $table->date('import_date')->nullable();
            $table->date('ship_date')->nullable();
            $table->string('source')->nullable();
            $table->float('fulfillment_cost',8,2)->default(0.0);

            $table->float('invoice_amount',8,2);
            $table->float('insurance_value',8,2)->default(0.0);
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('status');
            $table->string('label_type');
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
