<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'sponsor_id',
        'username',
        'email',
        'password',
        'is_admin',
        'user_type',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(): HasOne
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function channels(): HasMany
    {
        return $this->hasMany('App\Models\Channel');
    }

    public function posts(): HasMany
    {
        return $this->hasMany('App\Models\Post');
    }

    public function jobs(): HasMany
    {
        return $this->hasMany('App\Models\Job');
    }

    public function referrers(): HasMany
    {
        return $this->hasMany('App\Models\User', 'sponsor_id');
    }

    public function referrals(): HasMany
    {
        return $this->hasMany(User::class, 'sponsor_id');
    }

    public function isAdmin(): bool
    {
        return (bool) (1 === $this->is_admin);

    }

    public function isIndividual(): bool
    {
        return (bool) (1 !== $this->user_type);

    }

    public function isCompany(): bool
    {
        return (bool) (1 === $this->user_type);

    }

    public function getMono(): string
    {
        if (1 === $this->user_type) {
            return isset($this->profile->company_name) ? mb_substr($this->profile->company_name, 0, 1) : 'C';
        }

        return mb_substr($this->profile->first_name, 0, 1);

    }

    public function getFullname()
    {
        if (1 === $this->user_type) {
            return $this->profile->company_name ?? 'Company Name' . $this->id;
        }

        return $this->profile->first_name . ' ' . $this->profile->last_name;

    }

    public function groups(): HasMany
    {
        return $this->hasMany('App\Models\Group');
    }

    public function groupMembers(): HasMany
    {
        return $this->hasMany('App\Models\Member');
    }

    public function searchSettings(): HasMany
    {
        return $this->hasMany('App\Models\SearchSettings');
    }

    public function notification(): HasOne
    {
        return $this->hasOne('App\Models\Notification');
    }

    public function getSponsor()
    {
        if ($sponser = User::find($this->sponsor_id)) {
            return $sponser->username;
        }

        return '-';

    }
}
