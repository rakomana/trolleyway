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
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('meta_description');
            $table->string('meta_title');
            $table->string('description');
            $table->string('old_price');
            $table->string('new_price');
            $table->string('quantity');
            $table->string('image');
            $table->string('youtube_link');
            $table->string('status');
            $table->string('name');
            $table->string('category');
            $table->string('url');
            $table->uuid('shop_id');
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
