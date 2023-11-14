<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherFeaturedImagesUrlToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('small_featured_image1_url')->nullable()->after('featured_image_url');
            $table->string('small_featured_image2_url')->nullable()->after('small_featured_image1_url');
            $table->string('small_featured_image3_url')->nullable()->after('small_featured_image2_url');
            $table->string('small_featured_image4_url')->nullable()->after('small_featured_image3_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('small_featured_image1_url');
            $table->dropColumn('small_featured_image2_url');
            $table->dropColumn('small_featured_image3_url');
            $table->dropColumn('small_featured_image4_url');
        });
    }
}
