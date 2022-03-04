<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display the specified resource of the user
     *
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Display the specified resource of the current user
     *
     * @param Request $request
     * @return void
     */
    public function current(Request $request)
    {
        return (new UserResource($request->user()))->showSensitiveInformation();
    }
}
