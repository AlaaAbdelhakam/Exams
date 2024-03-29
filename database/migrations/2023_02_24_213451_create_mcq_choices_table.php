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
        Schema::create('mcq_choices', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->unsignedBigInteger('question_id');

            $table->text('possible_answer');
            $table->foreign('question_id')
            ->references('id')
            ->on('questions')
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
        Schema::dropIfExists('mcq_choices');
    }
};