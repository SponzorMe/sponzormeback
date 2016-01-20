<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrasactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
          $table->increments('id');
          $table->string('txn_id');
          $table->integer('sponzorship_id')->unsigned();
          $table->float('amout');
          $table->integer('user_id');
          $table->string('item_name');
          $table->date('payment_date');
          $table->string('payment_status');
          $table->boolean('type');
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
        Schema::drop('transactions');
    }
}
