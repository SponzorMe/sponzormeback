<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ratings', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('organizer_id')->unsigned();
  			$table->foreign('organizer_id')->references('id')->on('users')->onDelete('cascade');
        $table->integer('sponzor_id')->unsigned();
  			$table->foreign('sponzor_id')->references('id')->on('users')->onDelete('cascade');
        $table->integer('sponzorship_id')->unsigned();
  			$table->foreign('sponzorship_id')->references('id')->on('sponzorships')->onDelete('cascade');
        $table->boolean('type');
        $table->string('question0');
        $table->string('question1');
        $table->string('question2');
        $table->string('question3');
        $table->string('question4');
        $table->string('question5');
        $table->string('question6');
        $table->string('question7');
        $table->string('question8');
        $table->string('question9');
        $table->string('question10');
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
        Schema::drop('ratings');
    }
}
