<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameInterestsInSearchSettingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('search_settings', function (Blueprint $table): void {
            $table->renameColumn('interests', 'categories');
            $table->integer('type')->nullable()->default(0)->after('interest_based');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('search_settings', function (Blueprint $table): void {
            $table->renameColumn('categories', 'interests');
            $table->dropColumn('type');
        });
    }
}
