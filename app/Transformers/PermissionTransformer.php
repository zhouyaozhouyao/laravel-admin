<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/29
 * Time: 00:17
 */

namespace App\Transformers;

use App\Models\Permission;
use League\Fractal\TransformerAbstract;

class PermissionTransformer extends TransformerAbstract
{
    public function transform(Permission $permission)
    {
        return [
            'id'         => $permission->id,
            'name'       => $permission->name,
            'route'      => $permission->route,
            'parent_id'  => $permission->parent_id,
            'parent_name'  => optional(app(Permission::class)->where('id',$permission->parent_id)->first())->name,
            'is_hidden'  => $permission->is_hidden,
            'sort'       => $permission->sort,
            'created_at' => $permission->created_at->toDateTimeString(),
            'updated_at' => $permission->updated_at->toDateTimeString(),
        ];
    }
}