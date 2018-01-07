<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transformers\UserTransformer;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
           'email' => [
               'required',
               'exists:users',
           ],
           'password' => 'required | string | min:6 | max:20',
        ];
        // 验证参数，如果验证失败，则会抛出 ValidationException 的异常
        $params = $this->validate($request, $rules);
        // 使用 auth 登录用户，如果登陆成功，则返回201 的code 和 token，如果登录失败则返回
        return ($token = Auth::guard('api')->attempt($params))
            ? response(['token' => 'bearer' . $token], 201)
            : response(['error' => '账号或密码错误'], 400);
    }
 
    /**
     * 处理用户登出逻辑
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return response(['message' => '退出成功']);
    }
}
