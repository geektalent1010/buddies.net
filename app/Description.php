<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $fillable = [
        'job_id',
        'hours',
        'employees',
        'category',
        'area',
        'is_active'
    ];

    public function job() {
        return $this->belongsTo('App\Job');
    }
}
