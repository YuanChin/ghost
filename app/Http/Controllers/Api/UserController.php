<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\Image;
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
     * Update the specified resource in storage
     *
     * @param UserRequest $request
     * @return void
     */
    public function update(UserRequest $request)
    {
        // 當前請求用戶
        $user = $request->user();

        $attributes = $request->only([
            'name', 'email', 'introduction'
        ]);

        if ($request->avatar_image_id) {
            $image = Image::find($request->avatar_image_id);
            $attributes['avatar'] = $image->path;
        }

        $user->update($attributes);

        return (new UserResource($user))->showSensitiveInformation();
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
