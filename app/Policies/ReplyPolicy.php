<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Reply;
use App\Models\User;

class ReplyPolicy
{
    use HandlesAuthorization;

    /**
     * 刪除授權
     *
     * @param User $user
     * @param Reply $reply
     * @return bool
     */
    public function destroy(User $user, Reply $reply)
    {
        return $user->isAuthorOf($reply);
    }
}
