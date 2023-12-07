<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDarkenModeColumnsToProfileTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->boolean('darken_mode_1')->default(false);
            $table->boolean('darken_mode_2')->default(false);
            $table->boolean('darken_mode_3')->default(false);
            $table->boolean('darken_mode_4')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->dropColumn('darken_mode_1');
            $table->dropColumn('darken_mode_2');
            $table->dropColumn('darken_mode_3');
            $table->dropColumn('darken_mode_4');
        });
    }
}
