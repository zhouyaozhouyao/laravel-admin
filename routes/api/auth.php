<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/26
 * Time: 23:42
 */

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api\Auth', 'middleware' => ['api.throttle'],
    'limit' => config('api.rate_limits.sign.limit'),
    'expires' => config('api.rate_limits.sign.expires'),
], function ($api) {

    //注册用户
    $api->post('register', 'RegisterController@register')
        ->name('register');

    //登录获取 access_token
    $api->post('login','LoginController@login')
        ->name('login');

    // 根据refresh_token 换取access_token
    $api->post('token/refresh','LoginController@refresh')
        ->name('refresh');
});