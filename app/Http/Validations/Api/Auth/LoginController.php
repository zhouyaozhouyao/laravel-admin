<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/27
 * Time: 00:15
 */

namespace App\Http\Validations\Api\Auth;

class LoginController
{
    public function login()
    {
        return [
            'rules' => [
                'name'     => 'required|string',
                'password' => 'required|string',
            ],

            'messages' => [
                'name.required'     => '用户名不能为空',
                'name.string'       => '用户名必须是字符串',
                'password.required' => '密码不能为空',
                'password.string'   => '密码必须是字符串',
            ]
        ];
    }
}