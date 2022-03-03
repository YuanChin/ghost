<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthorizationRequest;

use Exception;

class AuthorizationController extends Controller
{
    /**
     * 登入API
     *
     * @param AuthorizationRequest $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function store(AuthorizationRequest $request)
    {
        $credential = [
            'email'    => $request->username,
            'password' => $request->password
        ];

        if (! $token = Auth::guard('api')->attempt($credential)) {
            throw new Exception('用戶名或密碼錯誤');
        }

        return $this->responseWithToken($token)->setStatusCode(201);
    }

    /**
     * Refresh token
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function update()
    {
        $token = auth('api')->refresh();

        return $this->responseWithToken($token);
    }

    /**
     * Delete token
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function destroy()
    {
        auth('api')->logout();

        return response(null, 204);
    }

    /**
     * Append the token to the response
     *
     * @param string $token
     * @return @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    private function responseWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'expires_in'   => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
