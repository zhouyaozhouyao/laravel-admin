<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/26
 * Time: 23:42
 */

$api->version('v1', [
    'namespace'  => 'App\Http\Controllers\Api\Admin',
    'middleware' => ['cors','api', 'auth:admin',  'serializer:array'],
//    'limit'      => config('api.rate_limits.sign.limit'),
//    'expires'    => config('api.rate_limits.sign.expires'),
], function($api) {

    //获取所有管理员
    $api->get('admins', 'AdminsController@index')
        ->name('admins.index');

    //新增
    $api->post('admins', 'AdminsController@store')
        ->name('admin.store');

    //查看
    $api->get('admins/{admin}', 'AdminsController@show')
        ->name('admins.show');

    //编辑
    $api->put('admins/{admin}', 'AdminsController@update')
        ->name('admin.update');

    //删除
    $api->delete('admins/{admin}', 'AdminsController@destroy')
        ->name('admins.destroy');

    //个人信息
    $api->get('admin/info', 'AdminsController@info')
        ->name('admin.info');

    // 当前登录用户权限
    $api->get('admin/permissions', 'AdminsController@permissions')
        ->name('admin.permissions');
});