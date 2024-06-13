<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddColumnInTouranmentsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('touranments', function (Blueprint $table) {
            $table->string('date')->nullable()->after('title');
            $table->string('age')->nullable()->after('date');
            $table->string('organiser')->nullable()->after('age');
            $table->string('country_id')->nullable()->after('organiser');
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
            $table->dropColumn('date');
            $table->dropColumn('age');
            $table->dropColumn('organiser');
            $table->dropColumn('country_id');
        });
    }
}
