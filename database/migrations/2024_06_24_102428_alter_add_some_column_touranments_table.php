<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddSomeColumnTouranmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('touranments', function (Blueprint $table) {
            // Add columns with 'after' and 'nullable' options
            $table->string('city')->after('country_id')->nullable();
            $table->string('playing_time')->after('date')->nullable();
            $table->integer('number_of_players')->after('playing_time')->nullable();
            $table->string('play_field')->nullable()->after('number_of_players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('touranments', function (Blueprint $table) {
            // Drop added columns in reverse order
            $table->dropColumn('play_field');
            $table->dropColumn('number_of_players');
            $table->dropColumn('playing_time');
            $table->dropColumn('city');
        });
    }
}
