<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherAvatarUrlToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->string('other_avatar_url7')->nullable()->after('other_avatar_url6');
            $table->string('other_avatar_url8')->nullable()->after('other_avatar_url7');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->dropColumn('other_avatar_url7');
            $table->dropColumn('other_avatar_url8');
        });
    }
}
