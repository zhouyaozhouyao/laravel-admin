<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/26
 * Time: 23:42
 */

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\Auth', 'middleware' => []], function ($api) {

    //注册用户
    $api->post('register', 'RegisterController@register')
        ->name('register');

});