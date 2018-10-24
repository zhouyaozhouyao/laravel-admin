<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\Permission;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use App\Transformers\RoleTransformer;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
    public function store(Request $request, Role $role)
    {
        $this->validateRequest($request);
        $permission_ids = $request->get("permission_ids");
        $this->permissionExist($permission_ids);

        $role->fill($request->all());
        $role->save();

        $role->permissions()->attach($request->get("permission_ids"));

        return $this->response->item($role, RoleTransformer::class)->setStatusCode(201);
    }


    /**
     * 获取某个角色信息.
     * @param Request $request
     * @param Role    $role
     * @return \Dingo\Api\Http\Response
     */
    public function show(Request $request,Role $role)
    {
        return $this->response->item($role,RoleTransformer::class)->setStatusCode(200);
    }


    /**
     * 更新角色信息.
     * @param Request $request
     * @param Role    $role
     * @return \Dingo\Api\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validateRequest($request);
        $permission_ids = $request->get("permission_ids");
        $this->permissionExist($permission_ids);

        $role->fill($request->all());
        $role->save();
        $role->permissions()->sync($permission_ids);

        return $this->response->noContent();
    }

    /**
     * @param array $permission_ids
     */
    protected function permissionExist(array $permission_ids): void
    {
        collect($permission_ids)->map(function($item, $key) {

            if(!app(Permission::class)->find($item)) {
                throw new HttpException(422, "权限id不存在");
            }
        });
    }
}
