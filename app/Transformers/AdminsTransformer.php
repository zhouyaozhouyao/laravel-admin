<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/11/4
 * Time: 22:25
 */

namespace App\Transformers;

use App\Models\Admin;
use League\Fractal\TransformerAbstract;

class AdminsTransformer extends TransformerAbstract {

    public function transform(Admin $admin)
    {
        return [
            'name'            => $admin->name,
            'email'           => $admin->email,
            'avatr'           => $admin->avatr,
            'login_count'     => $admin->login_count,
            'create_ip'       => $admin->create_ip,
            'last_login_ip'   => $admin->last_login_ip,
            'last_actived_at' => $admin->last_actived_at->toDateTimeString(),
            'status'          => $admin->status,
            'role_id'         => $admin->role_id,
        ];
    }
}