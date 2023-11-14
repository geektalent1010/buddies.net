<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherAvatarUrlToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('other_avatar_url7')->nullable()->after('other_avatar_url6');
            $table->string('other_avatar_url8')->nullable()->after('other_avatar_url7');
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
            $table->dropColumn('other_avatar_url7');
            $table->dropColumn('other_avatar_url8');
        });
    }
}
