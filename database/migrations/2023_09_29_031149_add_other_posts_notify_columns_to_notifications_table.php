<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherPostsNotifyColumnsToNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->integer('last_read_event_id')->nullable()->after('last_read_news_id');
            $table->integer('last_read_story_id')->nullable()->after('last_read_event_id');
            $table->integer('last_read_trade_id')->nullable()->after('last_read_story_id');
            $table->integer('last_read_deal_id')->nullable()->after('last_read_trade_id');
            $table->integer('last_read_job_id')->nullable()->after('last_read_deal_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn('last_read_event_id');
            $table->dropColumn('last_read_story_id');
            $table->dropColumn('last_read_trade_id');
            $table->dropColumn('last_read_deal_id');
            $table->dropColumn('last_read_job_id');
        });
    }
}
