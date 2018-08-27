<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/27
 * Time: 00:13
 */

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Proxy\TokenProxy;
use App\Transformers\DefaultTransformer;
use App\Http\Controllers\Api\Controller;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     * @throws \ErrorException
     * @throws \HttpException
     */
    public function login(Request $request)
    {
        $this->validateRequest($request);
        $token = app(TokenProxy::class)->issueToken($request->all(), 'password');
        return $this->response->array($token, DefaultTransformer::class);
    }
}