<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSettingInfoColumnsToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->string('distance')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('interest_based')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->dropColumn('distance');
            $table->dropColumn('gender');
            $table->dropColumn('age');
            $table->dropColumn('interest_based');
        });
    }
}
