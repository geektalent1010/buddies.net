<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchSettings extends Model
{
    protected $fillable = [
        'user_id',
        'distance',
        'address',
        'gender',
        'age',
        'categories',
        'interest_based',
        'type'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
