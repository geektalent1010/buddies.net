<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStudioInfosToProfileTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->text('studio_header1')->nullable();
            $table->text('studio_content1')->nullable();
            $table->text('studio_footer1')->nullable();
            $table->string('studio_image1')->nullable();
            $table->text('studio_header2')->nullable();
            $table->text('studio_content2')->nullable();
            $table->text('studio_footer2')->nullable();
            $table->string('studio_image2')->nullable();
            $table->text('studio_header3')->nullable();
            $table->text('studio_content3')->nullable();
            $table->text('studio_footer3')->nullable();
            $table->string('studio_image3')->nullable();
            $table->text('studio_header4')->nullable();
            $table->text('studio_content4')->nullable();
            $table->text('studio_footer4')->nullable();
            $table->string('studio_image4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->dropColumn('studio_header1');
            $table->dropColumn('studio_content1');
            $table->dropColumn('studio_footer1');
            $table->dropColumn('studio_image1');
            $table->dropColumn('studio_header2');
            $table->dropColumn('studio_content2');
            $table->dropColumn('studio_footer2');
            $table->dropColumn('studio_image2');
            $table->dropColumn('studio_header3');
            $table->dropColumn('studio_content3');
            $table->dropColumn('studio_footer3');
            $table->dropColumn('studio_image3');
            $table->dropColumn('studio_header4');
            $table->dropColumn('studio_content4');
            $table->dropColumn('studio_footer4');
            $table->dropColumn('studio_image4');
        });
    }
}
