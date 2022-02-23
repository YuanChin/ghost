<?php

namespace App\Http\Controllers;

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
    public function edit()
    {
        return view('users.edit');
    }

    /**
     * Update the specified resource of the user in storage
     *
     * @return void
     */
    public function update()
    {

    }
}
