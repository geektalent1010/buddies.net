<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventDateToPostsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table): void {
            $table->text('title')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->text('address')->nullable()->after('description');
            $table->string('event_date')->nullable()->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table): void {
            $table->text('title')->change();
            $table->text('description')->change();
            $table->dropColumn('address');
            $table->dropColumn('event_date');
        });
    }
}
