<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkboxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('checkbox1')->nullable();
            $table->integer('checkbox2')->nullable();
            $table->integer('checkbox3')->nullable();
            $table->integer('checkbox4')->nullable();
            $table->integer('checkbox5')->nullable();
            $table->integer('checkbox6')->nullable();
            $table->integer('checkbox7')->nullable();
            $table->integer('checkbox8')->nullable();
            $table->integer('checkbox9')->nullable();
            $table->integer('checkbox10')->nullable();
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
        Schema::dropIfExists('checkboxes');
    }
}
