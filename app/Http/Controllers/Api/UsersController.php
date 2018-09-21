<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/26
 * Time: 23:07
 */

namespace App\Http\Controllers\Api;

use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //获取个人信息.
    public function me()
    {
        return $this->response->item($this->user(), new UserTransformer());
    }

    public function update(Request $request)
    {

    }
}