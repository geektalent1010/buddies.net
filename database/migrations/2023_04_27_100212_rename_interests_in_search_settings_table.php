<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameInterestsInSearchSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('search_settings', function (Blueprint $table) {
            $table->renameColumn('interests', 'categories');
            $table->integer('type')->nullable()->default(0)->after('interest_based');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('search_settings', function (Blueprint $table) {
            $table->renameColumn('categories', 'interests');
            $table->dropColumn('type');
        });
    }
}
