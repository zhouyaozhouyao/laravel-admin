<?php

namespace App\Http\Controllers\Api;

use App\Models\Permission;
use App\Transformers\PermissionTransformer;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    /**
     * 获取权限列表 (分页).
     * @param Permission $permission
     * @return \Dingo\Api\Http\Response
     */
    public function index(Permission $permission)
    {
        $permissions = $permission->paginate();
        $collection = collect([1, 2, 3, 4, 5]);

        $groups = $collection->split(3);

        $groups->toArray();
        return $this->response->paginator($permissions, PermissionTransformer::class);
    }


    /**
     * 获取全部权限列表.
     * @param Permission $permission
     * @return \Dingo\Api\Http\Response
     */
    public function list(Permission $permission)
    {
        $permissions = $permission->get();

        return $this->response->collection($permissions, PermissionTransformer::class);
    }


    /**
     * 添加权限.
     * @param Request    $request
     * @param Permission $permission
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request,Permission $permission)
    {
        $this->validateRequest($request);
        $permission->fill($request->all());
        $permission->save();

        return $this->response->item($permission,PermissionTransformer::class)->setStatusCode(201);
    }


    /**
     * 修改权限信息.
     * @param Request    $request
     * @param Permission $permission
     * @return \Dingo\Api\Http\Response
     */
    public function update(Request $request,Permission $permission)
    {
        $this->validateRequest($request);
        $permission->fill($request->all());
        $permission->save();

        return $this->response->noContent();
    }
}
