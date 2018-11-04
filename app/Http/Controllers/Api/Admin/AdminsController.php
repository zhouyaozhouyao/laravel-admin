<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/11/4
 * Time: 22:06
 */

namespace App\Http\Controllers\Api\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Transformers\AdminsTransformer;
use App\Http\Controllers\Api\Controller;

class AdminsController extends Controller
{

    /**
     * @param Admin $admin
     * @return \Dingo\Api\Http\Response
     */
    public function index(Admin $admin)
    {
        return $this->response->collection($admin->paginate(), AdminsTransformer::class);
    }

    /**
     * 新增管理员
     * @param Request $request
     * @param Admin   $admin
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request, Admin $admin)
    {
        $this->validateRequest($request);
        $admin->fill($request->all());
        $admin->password = bcrypt($request->get('password'));
        $admin->save();

        return $this->response->item($admin, AdminsTransformer::class)->setStatusCode('201');
    }
}