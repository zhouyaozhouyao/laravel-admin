<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/11/5
 * Time: 00:15
 */

$api->version('v1', [
    'namespace'  => 'App\Http\Controllers\Api\Admin',
    'middleware' => ['cors', 'api.throttle', 'serializer:array'],
    'limit'      => config('api.rate_limits.sign.limit'),
    'expires'    => config('api.rate_limits.sign.expires'),
], function($api) {
    //登录
    $api->post('admin/login', 'AuthorizationController@login')
        ->name('admin.login');
});