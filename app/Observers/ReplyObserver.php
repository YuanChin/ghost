<?php

namespace App\Observers;

use App\Models\Reply;

class ReplyObserver
{
    /**
     * 回覆保存時觸發的事件
     *
     * @param Reply $reply
     * @return void
     */
    public function saving(Reply $reply)
    {
        // 過濾輸入數據避免XSS注入攻擊
        $reply->content = clean($reply->content, 'user_topic_body');
    }
}
