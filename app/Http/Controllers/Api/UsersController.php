<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/26
 * Time: 23:07
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transformers\UserTransformer;
use App\Transformers\PermissionTransformer;

class UsersController extends Controller
{
    //获取个人信息.
    public function me()
    {
        return $this->response->item($this->user(), new UserTransformer());
    }




    public function update(Request $request)
    {

    }
}