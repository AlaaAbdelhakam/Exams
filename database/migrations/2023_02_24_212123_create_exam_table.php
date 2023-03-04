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
        Schema::create('exam', function (Blueprint $table) {
            $table->id();
            $table->string('score')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('template_id');
            $table->foreign('template_id')
            ->references('id')
            ->on('template')
            ->onDelete('cascade');
            $table->date('date');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam');
    }
};