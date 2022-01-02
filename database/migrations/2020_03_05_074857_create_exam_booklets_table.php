<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamBookletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_booklets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("exam_id");
            $table->unsignedBigInteger("test_booklet_id");
            $table->timestamps();

            // $table->foreign('exam_id')->references('id')->on('exams');
            // $table->foreign('test_booklet_id')->references('id')->on('test_booklets');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_booklets');
    }
}
