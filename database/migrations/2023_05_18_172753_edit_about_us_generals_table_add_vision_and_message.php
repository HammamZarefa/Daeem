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
        Schema::table('about_us_generals', function (Blueprint $table) {
            $table->string('our_vision_title')->after('our_history_subtitle')->nullable();
            $table->text('our_vision_subtitle')->after('our_vision_title')->nullable();
            $table->string('our_message_title')->after('our_vision_subtitle')->nullable();
            $table->text('our_message_subtitle')->after('our_message_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
