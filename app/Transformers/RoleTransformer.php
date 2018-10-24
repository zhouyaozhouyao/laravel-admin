<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/28
 * Time: 13:07
 */

namespace App\Transformers;

use App\Models\Role;
use League\Fractal\TransformerAbstract;

class RoleTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['permissions'];

    public function transform(Role $role)
    {
        return [
            'id'         => $role->id,
            'name'       => $role->name,
            'remark'     => $role->remark,
            'status'     => $role->status,
            'created_at' => $role->created_at->toDateTimeString(),
            'updated_at' => $role->updated_at->toDateTimeString(),
        ];
    }

    public function includePermissions(Role $role)
    {
        if ($role->permissions){
            return $this->collection($role->permissions, new PermissionTransformer());
        }
    }
}