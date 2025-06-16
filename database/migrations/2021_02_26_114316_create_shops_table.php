<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('shop_name');
            $table->string('shop_description');
            $table->string('shop_email');
            $table->string('shop_phone_number');
            $table->string('shop_category');
            $table->string('shop_document');
            $table->string('shop_logo');
            $table->string('status')->nullable();
            $table->string('company_reg');
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
        Schema::dropIfExists('shops');
    }
}
