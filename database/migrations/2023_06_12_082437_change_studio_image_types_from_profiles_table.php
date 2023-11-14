<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStudioImageTypesFromProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->longtext('studio_image1')->change();
            $table->longtext('studio_image2')->change();
            $table->longtext('studio_image3')->change();
            $table->longtext('studio_image4')->change();
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
            $table->dropColumn('studio_image1');
            $table->dropColumn('studio_image2');
            $table->dropColumn('studio_image3');
            $table->dropColumn('studio_image4');
        });
    }
}
