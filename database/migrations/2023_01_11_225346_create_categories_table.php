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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('slug');
            $table->longText('description');
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('popular')->default('0');
            $table->String('image');
            $table->String('meta_title');
            $table->String('meta_descrip');
            $table->String('meta_keywords');
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
        Schema::dropIfExists('categories');
    }
};
