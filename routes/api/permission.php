<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/29
 * Time: 00:23
 */

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api', 'middleware' => ['cors','bindings'],
], function ($api) {

    //权限列表 (分页)
    $api->get('permissions','PermissionController@index')
        ->name('permissions.index');

    //权限列表
    $api->get('permissions/list','PermissionController@list')
        ->name('permissions/list');

    //新建权限.
    $api->post('permissions','PermissionController@store')
        ->name('permissions.store');

    //更新权限
    $api->put('permissions/{role}','PermissionController@update')
        ->name('permissions.update');
});