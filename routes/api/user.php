<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/26
 * Time: 22:35
 */

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api', 'middleware' => []], function ($api) {

    //注册用户
    $api->get('user', 'UsersController@me')
        ->name('user');


});
