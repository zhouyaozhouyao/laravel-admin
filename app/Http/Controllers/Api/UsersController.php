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


    /**
     * 获取某个用户的所有权限列表.
     * @return \Dingo\Api\Http\Response
     */
    public function permissions()
    {
        $permissions = Auth::user()->getAllPermissions();

        return $this->response->collection($permissions, PermissionTransformer::class);
    }

    public function update(Request $request)
    {

    }
}