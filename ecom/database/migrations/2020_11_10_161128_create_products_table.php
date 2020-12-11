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
            $table->increments('id');
            $table->string('product_title');
            $table->text('product_description');
            $table->string('product_slug');
            $table->integer('product_brand_id');
            $table->integer('product_category_id');
            $table->integer('product_quantity')->default(1);
            $table->integer('product_price');
            $table->integer('product_offer_price')->nullable();
            $table->integer('product_status')->default(0);
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
