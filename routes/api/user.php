<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/26
 * Time: 22:35
 */

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api', 'middleware' => ['cors','api.auth', 'serializer:array']],
    function($api) {

        //获取用户的个人信息
        $api->get('user', 'UsersController@me')
            ->name('user.show');

        // 当前登录用户权限
        $api->get('user/permissions', 'UsersController@permissions')
            ->name('user.permissions');
    });
