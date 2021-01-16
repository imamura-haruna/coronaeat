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
            $table->integer('checkbox1');
            $table->integer('checkbox2');
            $table->integer('checkbox3');
            $table->integer('checkbox4');
            $table->integer('checkbox5');
            $table->integer('checkbox6');
            $table->integer('checkbox7');
            $table->integer('checkbox8');
            $table->integer('checkbox9');
            $table->integer('checkbox10');
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
