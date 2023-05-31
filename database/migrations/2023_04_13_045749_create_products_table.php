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
            $table->id();
            $table->text('photo');
            $table->text('product_title');
            $table->text('selling_price');
            $table->text('discount_rate');
            $table->text('discount_price');
            $table->text('short_description')->nullable();
            $table->text('type')->nullable();
            $table->text('sku_no')->nullable();
            $table->text('mfg')->nullable();
            $table->text('lifetime')->nullable();
            $table->integer('stock')->nullable();
            $table->text('long_description')->nullable();
            $table->text('is_featured')->nullable();
            $table->text('category_id');
            $table->text('vendor_id')->default('0');
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
};
