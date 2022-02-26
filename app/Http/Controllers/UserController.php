<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the specified resource of the user
     *
     * @return void
     */
    public function show(User $user)
    {
        $topics = $user->topics()->recent()->paginate(5);
        return view('users.show', [
            'user'   => $user,
            'topics' => $topics
        ]);
    }

    /**
     * Show the form for editing the specified resource of the user
     *
     * @return void
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource of the user in storage
     *
     * @return void
     */
    public function update(UserRequest $request, User $user, ImageUploadHandler $uploader)
    {
        $this->authorize('update', $user);
        // 允許的請求欄位
        $data = $request->only(['name', 'email', 'introduction', 'avatar']);

        // 如果有上傳圖片
        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id, 416);

            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

        $user->update($data);
        
        return redirect()->route('users.show', $user->id)->with('success', '個人資料已經更新成功!');
    }
}
