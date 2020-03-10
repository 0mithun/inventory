<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('sku');
            $table->string('platform');
            $table->boolean('on_hand')->default(0);
            $table->boolean('chi_on_hand')->default(0);
            $table->boolean('dal_on_hand')->default(0);
            $table->boolean('pa_on_hand')->default(0);
            $table->boolean('more_on_hand')->default(0);
            $table->boolean('active')->default(1);
            $table->boolean('digital')->default(0);
            $table->boolean('dangerous')->default(0);
            $table->boolean('lot')->default(1);
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
        Schema::dropIfExists('products');
    }
}
