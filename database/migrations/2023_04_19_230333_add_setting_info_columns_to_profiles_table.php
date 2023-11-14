<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSettingInfoColumnsToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('distance')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('interest_based')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('distance');
            $table->dropColumn('gender');
            $table->dropColumn('age');
            $table->dropColumn('interest_based');
        });
    }
}
