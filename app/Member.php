<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'group_id',
        'user_id',
        'is_banned',
    ];

    public function group() {
        return $this->belongsTo('App\Group');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
