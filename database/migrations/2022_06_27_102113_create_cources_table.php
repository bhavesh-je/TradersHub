<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cources', function (Blueprint $table) {
            $table->id();
            $table->string('course_name')->nullable();
            $table->text('course_content')->nullable();
            $table->string('course_video_link')->nullable();
            $table->double('course_price', 8, 2)->nullable();
            $table->double('course_sale_price', 8, 2)->nullable();
            $table->tinyInteger('expiration')->default(0);
            $table->integer('course_expiration_day')->nullbale();
            $table->tinyInteger('Active')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign('created_by');
        Schema::dropIfExists('cources');
    }
}
