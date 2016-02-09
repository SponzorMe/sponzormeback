<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRatedOrganizerSponzor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sponzorships', function (Blueprint $table) {
            $table->boolean('rated_organizer')->default(0);
            $table->boolean('rated_sponzor')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sponzorships', function (Blueprint $table) {
          $table->dropColumn('rated_organizer');
          $table->dropColumn('rated_sponzor');
        });
    }
}
