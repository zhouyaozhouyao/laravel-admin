<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/27
 * Time: 00:21
 */

namespace App\Http\Proxy;

use GuzzleHttp\Client;
use Symfony\Component\HttpKernel\Exception\HttpException;

class TokenProxy
{

    /**
     *  获取令牌.
     * @param array  $params
     * @param string $grant_type
     * @return mixed
     */
    public function issueToken(array $params, string $grant_type)
    {
        //oauth/token
        $data = [
            'client_id'     => env('PASSPORT_CLIENT_ID'),
            'client_secret' => env('PASSPORT_CLIENT_SECRET'),
            'grant_type'    => $grant_type,
        ];

        $data = array_merge($data, $params);
        $response = app(Client::class)->post(url('oauth/token'), [
            'form_params' => $data,
            'http_errors' => false,
        ]);

        $resp = json_decode((string)$response->getBody(), true);
        if($response->getStatusCode() != 200) {
            throw new HttpException(422, "账号或密码错误");
        }

        return $resp;
    }

}