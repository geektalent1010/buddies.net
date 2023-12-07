<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'last_read_request_id',
        'last_read_news_id',
        'last_read_event_id',
        'last_read_story_id',
        'last_read_trade_id',
        'last_read_deal_id',
        'last_read_job_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
