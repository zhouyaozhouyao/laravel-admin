<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/28
 * Time: 13:13
 */

namespace App\Http\Validations\Api;

use Illuminate\Validation\Rule;

class RoleValidation
{
    public function store()
    {
        return [
            'rules' => [
                'name'   => 'required|string|max:10|unique:roles',
                'remark' => 'nullable|string|max:500',
            ],

            'messages' => [
                'name.required' => '名称不能为空',
                'name.string'   => '名称必须是字符串',
                'name.max'      => '名称不能超过10个字符',
                'name.unique'   => '名称已经被使用',
                'remark.string' => '名称必须是字符串',
                'remark.max'    => '名称不能超过500个字符',
            ]
        ];
    }


    public function update()
    {
        return [
            'rules' => [
                'name'   => [
                    'nullable',
                    'string',
                    'max:10',
                    Rule::unique('roles')->ignore(request()->route('role.id'))
                ],
                'remark' => 'nullable|string|max:500',
            ],

            'messages' => [
                'name.required' => '名称不能为空',
                'name.string'   => '名称必须是字符串',
                'name.max'      => '名称不能超过10个字符',
                'name.unique'   => '名称已经被使用',
                'remark.string' => '名称必须是字符串',
                'remark.max'    => '名称不能超过500个字符',
            ]
        ];
    }
}