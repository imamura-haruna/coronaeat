<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->boolean('question1')->default(false);
            $table->boolean('question2')->default(false);
            $table->boolean('question3')->default(false);
            $table->boolean('question4')->default(false);
            $table->boolean('question5')->default(false);
            $table->boolean('question6')->default(false);
            $table->boolean('question7')->default(false);
            $table->boolean('question8')->default(false);
            $table->boolean('question9')->default(false);
            $table->boolean('question10')->default(false);
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
        Schema::dropIfExists('questions');
    }
}
