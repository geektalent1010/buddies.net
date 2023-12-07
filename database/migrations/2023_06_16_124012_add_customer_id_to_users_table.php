<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->integer('customer_id')->nullable()->after('id');
            $table->integer('sponsor_id')
                ->unsigned()
                ->default(0)
                ->after('customer_id');
            $table->string('vat_number')->nullable()->after('site_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn('customer_id');
            $table->dropColumn('sponsor_id');
            $table->dropColumn('vat_number');
        });
    }
}
