<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/26
 * Time: 23:07
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function me(Request $request)
    {
        dd($this->user());
    }
}