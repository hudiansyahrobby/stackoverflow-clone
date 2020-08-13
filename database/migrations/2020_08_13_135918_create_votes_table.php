<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('upvote')->default(0); // 0 means false, 1 means true
            $table->tinyInteger('downvote')->default(0); // 0 means false, 1 means true
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('answer_id')->nullable(); // can be null
            $table->foreign('answer_id')->references('id')->on('answers');
            $table->unsignedBigInteger('question_id')->nullable(); // can be null
            $table->foreign('question_id')->references('id')->on('questions');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
