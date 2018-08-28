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
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class LoginController extends Controller
{
    /**
     * get access_token.
     * @param Request $request
     * @return mixed
     * @throws \ErrorException
     */
    public function login(Request $request)
    {
        $this->validateRequest($request);
        $token = app(TokenProxy::class)->issueToken($request->all(), 'password');
        return $this->response->array($token, DefaultTransformer::class);
    }


    /**
     * refresh access_token.
     * @param Request $request
     * @return mixed
     * @throws \ErrorException
     */
    public function refresh(Request $request)
    {
        $this->validateRequest($request);
        $token = app(TokenProxy::class)->issueToken($request->all(), 'refresh_token');
        return $this->response->array($token, DefaultTransformer::class);
    }


    //rm access_token.
    public function revoke()
    {
        if(!\Auth::check()){
            throw new UnauthorizedHttpException(get_class($this), 'Unable to authenticate with invalid API key and token.');
        }

        $this->user()->token()->revoke();

        return $this->response->noContent();
    }
}