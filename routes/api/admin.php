<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/26
 * Time: 23:42
 */

$api->version('v1', [
    'namespace'  => 'App\Http\Controllers\Api\Admin',
    'middleware' => ['cors', 'api.throttle'],
    'limit'      => config('api.rate_limits.sign.limit'),
    'expires'    => config('api.rate_limits.sign.expires'),
], function($api) {

    $api->get('admins', 'AdminsController@index')
        ->name('admins.index');

    $api->post('admins', 'AdminsController@store')
        ->name('admin.store');

    $api->put('admins/{admin}', 'AdminsController@update')
        ->name('admin.update');

    $api->delete('admins/{admin}', 'AdminsController@destroy')
        ->name('admins.destroy');
});