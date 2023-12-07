<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStudioImageTypesFromProfilesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->longtext('studio_image1')->change();
            $table->longtext('studio_image2')->change();
            $table->longtext('studio_image3')->change();
            $table->longtext('studio_image4')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->dropColumn('studio_image1');
            $table->dropColumn('studio_image2');
            $table->dropColumn('studio_image3');
            $table->dropColumn('studio_image4');
        });
    }
}
