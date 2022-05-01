<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocaleContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locale_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page')->nullable()->default('');
            $table->string('section');
            $table->unsignedBigInteger('element_id');
            $table->string('locale');
            $table->string('element_title')->nullable();
            $table->longText('element_content')->nullable();
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
        Schema::dropIfExists('locale_contents');
    }
}