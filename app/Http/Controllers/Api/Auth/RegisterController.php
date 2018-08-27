<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/26
 * Time: 23:20
 */

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Transformers\DefaultTransformer;
use App\Http\Controllers\Api\Controller;

class RegisterController extends Controller
{

    /**
     * Create a new user instance after a valid registration.
     * @param Request $request
     * @param User    $user
     * @return \Dingo\Api\Http\Response
     */
    public function register(Request $request,User $user)
    {
        $this->validateRequest($request);

        $user->fill($request->all());
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return $this->response->item($user, DefaultTransformer::class);
    }
}