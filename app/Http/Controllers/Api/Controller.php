<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/8/26
 * Time: 22:42
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController{
    use Helpers;

    protected function validateRequest(Request $request,string $name = null)
    {
        if(!$validator = $this->getValidator($request, $name)) {
            return;
        }

        $rules = array_get($validator, 'rules', []);
        $messages = array_get($validator, 'messages', []);
        $this->validate($request, $rules, $messages);
    }

    private function getValidator(Request $request,string $name = null)
    {
        list($controller, $method) = explode('@', $request->route()->action['uses']);
        $method = $name ?: $method;
        $class = str_replace('Controller', 'Validation', $controller);
        if(!class_exists($class) || !method_exists($class, $method)) {
            return false;
        }
        return call_user_func([new $class, $method]);
    }
}