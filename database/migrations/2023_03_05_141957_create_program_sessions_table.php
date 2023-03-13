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
        Schema::create('program_sessions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('instructor_id');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->text('class_topic');
            $table->tinyInteger('session_type')->default(1)->comment('1=Live, 2=Onsite');
            $table->date('date');
            $table->time('time');
            $table->string('duration')->comment('duration must be minutes');
            $table->mediumText('join_url')->nullable();
            $table->mediumText('start_url')->nullable();
            $table->string('meeting_id')->nullable();
            $table->string('meeting_password')->nullable();
            $table->string('meeting_host_name')->comment('zoom,bbb,jitsi')->nullable();
            $table->string('moderator_pw')->comment('use only for bbb')->nullable();
            $table->string('attendee_pw')->comment('use only for bbb')->nullable();
            $table->longText('description')->comment('use only for onsite session')->nullable();

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
        Schema::dropIfExists('program_sessions');
    }
};
