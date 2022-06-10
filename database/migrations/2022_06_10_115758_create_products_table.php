<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->timestamps();
            $table->string("name");
            $table->unsignedDecimal("price", 5);
            $table->foreignUuid("category_id")->nullable()->references('id')->on('product_categories');
            $table->foreignUuid("seller_id")->references('id')->on('sellers');
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
};