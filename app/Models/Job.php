<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'created_by',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function descriptions(): HasMany
    {
        return $this->hasMany('App\Models\Description');
    }
}
