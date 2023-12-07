<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyInfoColumnsToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->string('logo_url')->nullable()->after('other_avatar_url8');
            $table->string('street')->nullable()->after('country');
            $table->string('postal_code')->nullable()->after('street');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->dropColumn('logo_url');
            $table->dropColumn('street');
            $table->dropColumn('postal_code');
        });
    }
}
