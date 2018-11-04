<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/11/4
 * Time: 22:45
 */

namespace App\Http\Validations\Api\Admin;

class AdminsValidation
{
    public function store()
    {
        return [
            'rules' => [
                'name'            => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:admins,name,' . \Auth::id(),
                'password'        => 'required|confirmed|min:6',
                'email'           => 'nullable|email|unique:admins,email,' . \Auth::id(),
                'avatar'          => 'nullable|mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200',
                'login_count'     => 'nullable|integer',
                'create_ip'       => 'nullable|string',
                'last_login_ip'   => 'nullable|string',
                'last_actived_at' => 'nullable|date',
                'role_id'         => 'nullable|integer',
                'status'          => 'nullable|integer',
            ],

            'messages' => [
                'name.required'      => '名称不能为空',
                'name.between'       => '名称必须介于 3 - 25 个字符之间。',
                'name.regex'         => '名称只支持中英文、数字、横杆和下划线。',
                'name.unique'        => '名称已被占用，请重新填写',
                'password.required'  => '密码不能为空',
                'password.confirmed' => '两次密码不一致',
                'password.min'       => '密码长度不能小于6位',
                'email.email'        => '邮箱格式不正确',
                'email.unique'       => '邮箱已经被使用',
                'avatar.mimes'       => '头像格式不支持,目前只支持jpeg,bmp,png,gif格式',
                'avatar.dimensions'  => '头像的清晰度不够，宽和高需要 200px 以上',
            ]
        ];
    }
}