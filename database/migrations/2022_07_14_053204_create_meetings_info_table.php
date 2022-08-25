<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings_info', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->integer('type');
            $table->string('start_time')->nullable();
            $table->integer('duration');
            $table->string('uuid');
            $table->bigInteger('m_id');
            $table->string('join_url');
            $table->string('host_id');
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
        Schema::dropIfExists('meetings_info');
    }
}
