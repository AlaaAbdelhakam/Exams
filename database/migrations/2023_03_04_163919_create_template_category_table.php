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
        Schema::create('template_category', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_questions')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
            ->references('id')
            ->on('category')
            ->onDelete('cascade');
            $table->unsignedBigInteger('template_id');
            $table->foreign('template_id')
            ->references('id')
            ->on('template')
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
        Schema::dropIfExists('template_category');
    }
};