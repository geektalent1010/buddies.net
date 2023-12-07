<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'description',
        'subject', 'content',
        'address',
        'event_date',
        'featured_image_url',
        'small_featured_image1_url', 'small_featured_image2_url', 'small_featured_image3_url', 'small_featured_image4_url',
        'followers',
        'type',
        'is_active',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
}
