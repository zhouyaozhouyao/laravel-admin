<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email','gender', 'real_name', 'password', 'github_id', 'github_name', 'github_url', 'city', 'company', 'website', 'introduction', 'avatar', 'register_source',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
}
