<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/11/5
 * Time: 00:08
 */

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Proxy\TokenProxy;
use App\Transformers\DefaultTransformer;
use App\Http\Controllers\Api\Controller;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthorizationController extends Controller
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
        $token = app(TokenProxy::class)->issueToken('admins', $request->all(), 'password');
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
        $token = app(TokenProxy::class)->issueToken('admins', $request->all(), 'refresh_token');
        return $this->response->array($token, DefaultTransformer::class);
    }


    //logout.
    public function logout()
    {
        if(!\Auth::check()) {
            throw new UnauthorizedHttpException(get_class($this),
                'Unable to authenticate with invalid API key and token.');
        }

        $accessToken = $this->user()->token();

        app('db')->table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);

        $accessToken->revoke();

        return $this->response->noContent();
    }
}