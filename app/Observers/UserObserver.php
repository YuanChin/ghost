<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * 用戶保存時觸發的事件
     *
     * @param User $user
     * @return void
     */
    public function saving(User $user)
    {
        if (empty($user->avatar)) {
            $user->avatar = 'https://ghost.test/uploads/images/avatars/202202/24/1_1645707437_gGL3xOAPfx.jpg';
        }
    }
}
