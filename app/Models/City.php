<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'active',
        'state_id',
    ];

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }
}
