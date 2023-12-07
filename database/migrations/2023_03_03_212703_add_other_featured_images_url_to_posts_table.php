<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherFeaturedImagesUrlToPostsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table): void {
            $table->string('small_featured_image1_url')->nullable()->after('featured_image_url');
            $table->string('small_featured_image2_url')->nullable()->after('small_featured_image1_url');
            $table->string('small_featured_image3_url')->nullable()->after('small_featured_image2_url');
            $table->string('small_featured_image4_url')->nullable()->after('small_featured_image3_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table): void {
            $table->dropColumn('small_featured_image1_url');
            $table->dropColumn('small_featured_image2_url');
            $table->dropColumn('small_featured_image3_url');
            $table->dropColumn('small_featured_image4_url');
        });
    }
}
