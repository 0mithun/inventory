<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');

            $table->string('shipping_type');
            $table->string('send_to_location');
            $table->string('inventory_configure');
            $table->unsignedInteger('quantity_to_send');
            $table->unsignedInteger('quantity_of_box');
            $table->unsignedInteger('quantity_per_box');
            $table->date('estimated_date_of_arrival_shipment');

            $table->unsignedInteger('status')->default(1);


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
        Schema::dropIfExists('inventories');
    }
}
