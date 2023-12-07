<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    protected $fillable = [
        'group_id',
        'user_id',
        'is_banned',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }
}
