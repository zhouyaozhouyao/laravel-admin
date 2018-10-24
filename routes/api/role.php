<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/28
 * Time: 13:11
 */

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api', 'middleware' => ['cors','bindings'],
], function ($api) {

    //角色列表 (分页)
    $api->get('roles','RoleController@index')
        ->name('roles.index');

    //角色列表
    $api->get('roles/list','RoleController@list')
        ->name('roles/list');

    //新建角色.
    $api->post('roles','RoleController@store')
        ->name('roles.store');

    //获取某个角色信息
    $api->get('roles/{role}','RoleController@show')
        ->name('roles.show');

    //更新角色
    $api->put('roles/{role}','RoleController@update')
        ->name('roles.update');
});