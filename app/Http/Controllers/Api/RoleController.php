<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Transformers\RoleTransformer;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * 获取角色列表 (分页)
     * @param Role $role
     * @return \Dingo\Api\Http\Response
     */
    public function index(Role $role)
    {
        $roles = $role->paginate();

        return $this->response->paginator($roles, RoleTransformer::class);
    }


    /**
     * 获取全部角色列表
     * @param Role $role
     * @return \Dingo\Api\Http\Response
     */
    public function list(Role $role)
    {
        $roles = $role->get();

        return $this->response->collection($roles, RoleTransformer::class);
    }


    /**
     * 新建角色.
     * @param Request $request
     * @param Role    $role
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request,Role $role)
    {
        $this->validateRequest($request);
        $role->fill($request->all());
        $role->save();
        $role->permissions()->attach($request->get("permission_id"));

        return $this->response->item($role,RoleTransformer::class)->setStatusCode(201);
    }


    /**
     * 更新角色信息.
     * @param Request $request
     * @param Role    $role
     * @return \Dingo\Api\Http\Response
     */
    public function update(Request $request,Role $role)
    {
        $this->validateRequest($request);
        $role->fill($request->all());
        $role->save();

        return $this->response->noContent();
    }
}
