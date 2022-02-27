<?php

namespace App\Observers;

use App\Models\Topic;

class TopicObserver
{
    /**
     * 話題保存時觸發的事件
     *
     * @param Topic $topic
     * @return void
     */
    public function saving(Topic $topic)
    {
        // 獲取片段內容作為摘記
        $topic->excerpt = make_excerpt($topic->body);

        // 過濾輸入數據避免XSS注入攻擊
        $topic->body = clean($topic->body, 'user_topic_body');
    }
}
