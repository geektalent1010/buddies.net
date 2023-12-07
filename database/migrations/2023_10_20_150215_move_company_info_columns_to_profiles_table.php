<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MoveCompanyInfoColumnsToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->string('phone')->nullable()->after('birthday');
            $table->string('company_name')->nullable()->after('phone');
            $table->string('site_url')->nullable()->after('company_name');
            $table->string('vat_number')->nullable()->after('site_url');
        });
        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn('name');
            $table->dropColumn('phone');
            $table->dropColumn('site_url');
            $table->dropColumn('vat_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->dropColumn('phone');
            $table->dropColumn('site_url');
            $table->dropColumn('user_type');
        });
        Schema::table('users', function (Blueprint $table): void {
            $table->string('name')->nullable()->after('sponsor_id');
            $table->string('phone')->nullable()->after('email');
            $table->string('site_url')->nullable()->after('phone');
            $table->string('vat_number')->nullable()->after('site_url');
        });
    }
}
