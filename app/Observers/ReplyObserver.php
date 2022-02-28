<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\TopicReplied;

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

    /**
     * 回覆創建完後觸發的事件
     *
     * @param Reply $reply
     * @return void
     */
    public function created(Reply $reply)
    {
        if (! app()->runningInConsole()) {
            // 更新回覆數量
            $reply->recordReplyCount();
            // 通知該話題作者有新回覆
            $reply->topic->user->replyNotify(new TopicReplied($reply));
        }
    }
}
