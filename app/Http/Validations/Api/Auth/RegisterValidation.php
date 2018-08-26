<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/26
 * Time: 23:32
 */

namespace App\Http\Validations\Api\Auth;

use Illuminate\Support\Facades\Auth;

class RegisterValidation
{
    public function register()
    {
        return [
            'rules' => [
                'name'         => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
                'email'        => 'email|required|unique:users,email,' . Auth::id(),
                'password'     => 'required|confirmed|min:6',
                'github_id'    => 'unique:users,github_id,' . Auth::id(),
                'github_name'  => 'nullable|string',
                'github_url'   => 'nullable|url',
                'real_name'    => 'nullable|between:3,25',
                'website'      => 'nullable|url',
                'company'      => 'nullable|string|max:40',
                'city'         => 'nullable|string|max:128',
                'avatar'       => 'nullable|mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200',
                'introduction' => 'nullable|max:200',
            ],

            'messages' => [
                'name.required'      => '用户名不能为空',
                'name.between'       => '用户名必须介于 3 - 25 个字符之间。',
                'name.regex'         => '用户名只支持中英文、数字、横杆和下划线。',
                'name.unique'        => '用户名已被占用，请重新填写',
                'email.email'        => '邮箱格式不正确',
                'email.required'     => '邮箱不能为空',
                'email.unique'       => '邮箱已经被人使用',
                'password.required'  => '密码不能为空',
                'password.confirmed' => '两次密码不一致',
                'password.min'       => '密码长度不能小于6位',
                'github_id.unique'   => '此Github账号已经被使用',
                'github_name.string' => 'Github名称必须是字符串',
                'github_name.max'    => 'Github名称最大60个字符',
                'github_url'         => 'Github地址格式不正确',
                'real_name.between'  => '称呼必须介于 3 - 25 个字符之间。',
                'website.url'        => '个人网址格式不正确',
                'company.string'     => '公司名称必须是字符串',
                'company.max'        => '公司名称最大40个字符',
                'city.string'        => '所在城市必须是字符串',
                'city.max'           => '所在城市最大128个字符',
                'avatar.mimes'       => '头像格式不支持,目前只支持jpeg,bmp,png,gif格式',
                'avatar.dimensions'  => '头像的清晰度不够，宽和高需要 200px 以上',
                'introduction'       => '自我介绍最大200个字符',
            ],
        ];
    }
}