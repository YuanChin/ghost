<?php

namespace App\Http\Controllers;

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
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource of the user
     *
     * @return void
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource of the user in storage
     *
     * @return void
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->only(['name', 'email', 'introduction', 'avatar']));
        return redirect()->route('users.show', $user->id)->with('success', '個人資料已經更新成功!');
    }
}
