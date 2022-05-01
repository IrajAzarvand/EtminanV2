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
            $table->foreignId('ptype_id')->nullable()->references('id')->on('ptypes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('weight_id')->nullable()->references('id')->on('weights')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('flavor_id')->nullable()->references('id')->on('flavors')->cascadeOnUpdate()->cascadeOnDelete();
            $table->longText('p_img')->nullable();
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