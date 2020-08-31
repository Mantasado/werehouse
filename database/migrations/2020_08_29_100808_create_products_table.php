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
            $table->string('name', 50);
            $table->bigInteger('ean');
            $table->unsignedBigInteger('product_type_id')->unsigned();
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->string('color', 20);
            $table->boolean('active')->default(0);
            $table->string('image', 100)->default('public/no_image.png');
            $table->boolean('is_deleted')->default(0);
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
