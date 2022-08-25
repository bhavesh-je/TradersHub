<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSettingsToTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topics', function (Blueprint $table) {
            //
            $table->string('duration_measure')->nullable()->after('topic_name');
            $table->double('duration', 8, 2)->nullable()->after('duration_measure');
            $table->double('passing_grade', 8,2)->nullable()->after('duration');
            $table->string('re_take_cut')->nullable()->after('passing_grade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topics', function (Blueprint $table) {
            //
        });
    }
}
