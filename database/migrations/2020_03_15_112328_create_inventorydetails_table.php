<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventorydetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventorydetails', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('inventory_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('quantity_to_send');
            $table->unsignedInteger('quantity_of_box');
            $table->unsignedInteger('quantity_per_box');

            
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
        Schema::dropIfExists('inventorydetails');
    }
}
