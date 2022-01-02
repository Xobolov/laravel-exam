<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('content', 255)->unique()->nullable();
            $table->string('choice', 255)->unique()->nullable();
            $table->unsignedBigInteger('test_booklet_id')->nullable();
            $table->unsignedBigInteger('exam_id')->nullable();

            $table->timestamps();

            // $table->foreign('test_booklet_id')->references('id')->on('test_booklets');
            // $table->foreign('exam_id')->references('id')->on('exams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
