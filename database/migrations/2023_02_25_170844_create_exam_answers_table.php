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
        Schema::create('exam_answers', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')
            ->references('id')
            ->on('questions')
            ->onDelete('cascade');
            $table->text('answer');
            $table->text('candidate_answer')->nullable();
            $table->unsignedBigInteger('exam_id');
            $table->foreign('exam_id')->references('id')->on('exam')

            ->onDelete('cascade');
            
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
        Schema::dropIfExists('exam_answers');
    }
};