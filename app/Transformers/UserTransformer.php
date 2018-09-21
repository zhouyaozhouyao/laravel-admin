<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/28
 * Time: 10:43
 */

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['role'];

    /**
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id'                   => $user->id,
            'name'                 => $user->name,
            'email'                => $user->email,
            'phone'                => $user->phone,
            'gender'               => $user->gender,
            'github_name'          => $user->github_name,
            'github_url'           => $user->github_url,
            'city'                 => $user->city,
            'company'              => $user->company,
            'introduction'         => $user->introduction,
            'notification_count'   => $user->notification_count,
            'real_name'            => $user->real_name,
            'avatar'               => $user->avatar,
            'website'              => $user->website,
            'contribution_count'   => $user->contribution_count,
            'register_source'      => $user->register_source,
            'is_banned'            => $user->is_banned,
            'email_notify_enabled' => $user->email_notify_enabled,
            'last_actived_at'      => $user->last_actived_at,
            'created_at'           => $user->created_at->toDateTimeString(),
            'updated_at'           => $user->updated_at->toDateTimeString(),
        ];
    }

    public function includeRole(User $user)
    {
        return $this->item($user->role, new RoleTransformer());
    }
}