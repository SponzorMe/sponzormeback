<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->longText('pitch')->nullable();
            $table->longText('newsletter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('logo');
            $table->dropColumn('website');
            $table->dropColumn('pitch');
            $table->dropColumn('newsletter');
        });
    }
}
