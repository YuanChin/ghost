<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Topic;
use App\Models\User;

class TopicPolicy
{
    use HandlesAuthorization;

    /**
     * 更新授權
     *
     * @param User $user
     * @param Topic $topic
     * @return bool
     */
    public function update(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
    }

    /**
     * 刪除授權
     *
     * @param User $user
     * @param Topic $topic
     * @return bool
     */
    public function destroy(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
    }
}
