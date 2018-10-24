<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/10/24
 * Time: 13:39
 */

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'password',
    ];

    protected $hidden = [
        'password'
    ];
}