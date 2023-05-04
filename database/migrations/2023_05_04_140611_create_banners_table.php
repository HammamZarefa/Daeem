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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->text('banner_mini_words_title')->nullable();
            $table->string('banner_first_line_title')->nullable();
            $table->string('banner_second_line_title')->nullable();
            $table->text('banner_second_line_changeable_words')->nullable();
            $table->string('banner_third_line_title')->nullable();
            $table->text('banner_subtitle')->nullable();
            $table->string('banner_button_name')->nullable();
            $table->text('banner_button_link')->nullable();
            $table->string('banner_image')->nullable();
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
        Schema::dropIfExists('banners');
    }
};
