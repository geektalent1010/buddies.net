<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'about_us',
        'qualifications',
        'skills',
        'offer',
        'closing_text',
        'followers',
        'type',
        'is_active',
        'created_by'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function descriptions() {
        return $this->hasMany('App\Description');
    }
}
