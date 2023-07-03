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
        Schema::table('program_session_reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('reviewable_id')->after('user_id');
            $table->string('reviewable_type')->after('reviewable_id');
            $table->dropColumn('program_session_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_session_reviews', function (Blueprint $table) {
            $table->dropColumn('program_session_id');
            $table->dropColumn('reviewable_id');
            $table->dropColumn('reviewable_type');
        });
    }
};