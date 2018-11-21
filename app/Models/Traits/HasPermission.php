<?php

namespace App\Models\Traits;

use App\Exceptions\AuthorizeException;
use Auth;

trait HasPermission{

    /**
     * 检验权限
     * @param $route
     * @return bool
     */
    public function checkPermission($route)
    {
        //Todo 验证是否已经登录.
        if(!Auth::guard('admin')->check()){
            throw new AuthorizeException('Unable to authenticate with invalid API key and token.');
        }

        //Todo 获取用户角色验证权限.
        $user = Auth::guard('admin')->user();
        if($user::getRole() && in_array($user::getRole()->id , config('permission.WHITE_ROLES'))){
            return true;
        }

        return in_array($route, $user->getAllPermissions()->pluck('route')->toArray());
    }

}