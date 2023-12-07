<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'user_id',
        'channel_unique_name',
        'name',
        'description',
        'logo',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function members()
    {
        return $this->hasMany('App\Models\Member');
    }
}