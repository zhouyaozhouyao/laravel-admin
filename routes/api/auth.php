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

    $api->post('login','LoginController@login')
        ->name('login');
});