<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterAddColumnStatusInTouranmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('touranments', function (Blueprint $table) {
            $table->enum('status', ['upcoming', 'present', 'past'])->default('present')->after('country_id');
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
            $table->dropColumn('status');
        });
    }
}
